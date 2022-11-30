<?php

namespace App\Http\Controllers\Admin\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index() {
        $order = DB::table('order')->join('partner','partner.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')
        ->where('state','New')
        ->select('*','order.id as oid','order.name as odname','partner.name as ptname','employee.name as epname')->paginate(4);
        $title = __('lang.orders');
        $action = 'order_create';
        return view('/admin/order/order', compact('order','title','action'));
    }

    public function show($id)
    {
        $orders = DB::table('order')->join('partner','partner.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')
        ->where('order.id','=',$id)
        ->select('*','order.id as oid','order.name as odname','partner.name as ptname','employee.name as epname')->first();
        $lines = DB::table('order_line')->join('product','product.id','=','order_line.product_id')->where('order_id','=',$id)
        ->select('*','order_line.id as olid','product.name as pname','order_line.volume as ovolume');
        $lines = $lines->get();
        $title = __('lang.orders');
        $action = 'order_create';
        return view('/admin/order/order_detail', compact('orders','lines','title','action'));
    }

    public function create()
    {
        $partners = DB::table('partner')->select('*');
        $partners = $partners->get();
        $employees = DB::table('employee')->select('*');
        $employees = $employees->get();
        $title='Order Create';
        return view('/admin/order/create', compact('partners','employees','title'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['name']='Oder';
        $data['create_date']=date('Y-m-d');
        $order = Order::create($data);
        if ($data['type']=='import'){
            $order->update(['name'=>'Order Import ST: '.$order->id]);
        }
        else if ($data['type']=='export'){
            $order->update(['name'=>'Order Export ST: '.$order->id]);
        }
        return redirect('/order/'.$order->id.'');
    }

    public function edit($id)
    {
        $partners = DB::table('partner')->select('*');
        $partners = $partners->get();
        $employees = DB::table('employee')->select('*');
        $employees = $employees->get();
        $order = Order::findOrFail($id);
        $title = 'Order edit';

        return view('admin/order/edit', compact('order','partners','employees','title'));
    }

    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $orders = Order::findOrFail($id);

        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();

        $orders->update($data);

        return $this -> show($id);
        //return redirect('order');
    }

    public function create_invoice($id){
        $order_line =DB::table('order_line')->where('order_id','=',$id)->select('*')->get();
        $invoice = new Invoice;
        $order = Order::findOrFail($id);
        if($order->type=='import'){
            echo'<script>alert("Hóa đơn chỉ được tạo khi xuất hàng")</script>';
            return redirect('/order/'.$order->id.'');
        }
        else{
        $title = 'Invoice';
        $invoice1 = Invoice::where('order_id',$id)->get();
        if ($invoice1->value('id') == null){
            $invoice -> name = 'Invoice of '.$order->name;
            $invoice ->partner_id = $order->partner_id;
            $invoice->create_date = date('Y-m-d');
            $invoice->date_payment = '2022-11-17 20:06:0';
            $invoice->payment_term = $order->payment_term;
            $invoice->order_id = $id;
            $invoice->total_payment = $order->total_payment * 0.05 + $order->total_payment;
            $invoice->state= 'New';
            $invoice->save();

            foreach($order_line as $row){
                $invoice_line = new InvoiceLine;
                $invoice_line->product_id = $row->product_id;
                $invoice_line->invoice_id = $invoice->id;
                $invoice_line->total_money = $row->amount*$row->price * 0.05 +$row->amount*$row->price;
                $invoice_line->amount = $row->amount;
                $invoice_line->unit_price = $row->price;
                $invoice_line->note='a';
                $invoice_line->save();
            }
            return app('App\Http\Controllers\Admin\Invoice\InvoiceController')->show($invoice->id);
        }
        else{
            echo'<script>alert("Order has been invoice")</script>';
            return $this->show($id);
            }
        }
    }

    public function delete($id){
        // Tìm đến đối tượng muốn xóa
        $order = Order::findOrFail($id);
        $orderline = DB::table('order_line')->where('order_id','=',$id)->select('id');
        $invoice = DB::table('invoice')->where('order_id','=',$id)->select('id');
        $invoiceline = DB::table('invoice_line')->where('invoice_id','=',$invoice->value('id'))->select('id');
        $invoiceline->delete();
        $invoice->delete();
        $orderline->delete();
        $order->delete();
        return redirect('order');
    }
    public function search(Request $request){
        $data = $request->all();
        $search = $data['search'];
        $order = DB::table('order')->join('partner','partner.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')
        ->where('order.name','like',"%${search}%")
        ->select('*','order.id as oid','order.name as odname','partner.name as ptname','employee.name as epname')->paginate(4);
        $title = __('lang.orders');
        $action = 'order_create';
        if ($order->value('id') != null){
            return view('/admin/order/order', compact('order','title','action'));}
        else{
            echo'<script>alert("Not found")</script>';
            return $this->index();
            }
    }

    public function viewall(){
        $order = DB::table('order')->join('partner','partner.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')
        ->select('*','order.id as oid','order.name as odname','partner.name as ptname','employee.name as epname')->paginate(4);
        $title = __('lang.orders');
        return view('/admin/order/order', compact('order','title'));
    }
}
