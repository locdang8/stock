<?php

namespace App\Http\Controllers\Admin\IP_EP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\IpEp;
use App\Models\Product;
use App\Models\Template;
use App\Models\Orderline;

class IpEpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ipep = DB::table('import__export')->select('*');
        $ipep = $ipep->get();
        $title = 'Import/Export';
        return view('/admin/import_export/ip_ep', compact('ipep','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_ipep(Request $request)
    {
        $data = $request->all();
        $order = Order::findOrFail($data['order_id']);
        $orderline = Orderline::where('order_id','=',$order->id)->select('*');
        $orderline = $orderline->get();
        $array = array();
        foreach($orderline as $row){
            array_push($array, Product::findOrFail($row->product_id));
        }
        $data['name']='IPEP'.$order->id;
        $data['partner_id'] = $order->partner_id;
        $data['status'] = 'New';
        $ipep = IpEp::create($data);
        return redirect('/ipep/'.$ipep->id.'');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ipeps = DB::table('import__export')->where('id', '=', $id)->select('*')->first();
        $title = 'Import/Export Detail';
        $order = Order::findOrFail($ipeps->order_id);
        $orderline = Orderline::where('order_id','=',$order->id)->select('*');
        $orderline = $orderline->get();
        $array = array();
        foreach($orderline as $row){
            array_push($array, Product::findOrFail($row->product_id));
        }
        return view('/admin/import_export/detail', compact('ipeps','title','array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Tìm đến đối tượng muốn xóa
        $ipep = IpEp::findOrFail($id);
        $ipep->delete();
        return redirect('ipep');
    }
    public function done(Request $request, $id){
        $ipep = IpEp::findOrFail($id);
        $order = Order::findOrFail($ipep->order_id);
        $order_line = DB::table('order_line')->where('order_id','=',$order->id)->select('*');
        foreach($order_line->get() as $row){
            $product = Template::findOrFail($row->product_id);
            if ($product->state == 'New'){
            $product->state='Stored';
            $product->save();}
        }
        $ipep->status = 'Done';
        $ipep->save();
        $order->state = 'Done';
        $order->save();
        return redirect('ipep');
    }
    public function action_done($id){
        $order = Order::findOrFail($id);
        if ($order->type=='export'){
             echo'<script>alert("Nhập hàng chỉ dành cho đơn hàng loại nhập")</script>';
             return redirect()->back();
        }
        else{
            $order->update(['state'=>'Created IP/EP']);
            $ipep = DB::table('import__export')->where('order_id',$id)->select('*');
            $title = 'Ipep create';
            if ($ipep->count('id') == 0){
                return view('/admin/import_export/ipep_create', compact('id','title'));}
            else{
                echo'<script>alert("Order has been shipped")</script>';
                return app('App\Http\Controllers\Admin\Order\OrderController')->show($id);
                }
            }
        }

    public function fail($id){
        $product = Product::findOrFail($id);
        if ($product->state == 'Fail'){
            echo'<script>alert("Order has been shipped")</script>';
        }
        $title = 'Reason';
        return view('/admin/import_export/ipepcheck', compact('id','title'));
    }
    public function fail_save(Request $request, $id){
        $data = $request->all();
        $product = Product::findOrFail($id);
        $product_fail = $product->replicate();
        $product_fail->note = $data['note'];
        $product_fail->amount = $data['amount'];
        $product_fail->state = 'Fail';
        $product_fail->name = $product->name.' Fail';
        $product_fail->import_date = date('Y-m-d H:i:s');
        $product_fail->save();
        $product->amount = $product->amount - $data['amount'];
        //$product->state = 'Stored';
        $product->save();
        return redirect('ipep');
    }
    public function import($id){
        $product = Product::findOrFail($id);
        $product->state = 'Stored';
        $product->import_date = date('Y-m-d H:i:s');
        $product->save();
        return redirect('ipep');
    }
}
