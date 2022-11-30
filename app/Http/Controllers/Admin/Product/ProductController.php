<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Template;
use App\Models\Orderline;
use App\Models\Order;
class ProductController extends Controller
{
    public function index() {
        $title = __('lang.product');
        $products = DB::table('product')
        ->join('template','template.id','product.template_id')
        ->join('partner','partner.id','product.partner_id')
        ->select('*', 'product.id as pid', 'template.name as tname','partner.name as pname','product.state as pstate','product.note as pnote','product.amount as pamount','product.name as productname')->paginate(5);
        $title = 'Product Fail';
        return view('/admin/product/product', compact('products', 'title'));
    }

    public function show($id)
    {
        $products = Product::
        join('template','template.id','product.template_id')
        ->join('partner','partner.id','product.partner_id')
        ->where('product.id', '=', $id)->select('*','template.name as tname','product.id as pid','product.state as pstate','product.note as pnote','partner.name as pname');
        $products = $products->get();
        $title = __('lang.product_detail');
        $action = 'order_create';
        return view('/admin/product/productdetail', compact('products','title','action'));
    }

    public function create($id)
    {
        $title = 'Create Product';
        return view('/admin/product/product_create', compact('title','id'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['state']= 'New';
        $template = Template::findOrFail($data['template_id']);
        $data['name']= $template->name;
        $data['volume'] = $data['height']*$data['width']*$data['length'];
        $product = Product::create($data);
        //tìm ra order line chứa template để cập nhật amount và volume
        $order_line = Orderline::where('product_id',$product->id);

        $order_line->update(['volume' => $product->volume]);
        return redirect('template/'.$product->template_id.'');
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        $template = Template::findOrFail($product->template_id);
        $product->delete();
        $template->amount = Product::where('template_id',$id)->count();
        $template->save();
        return app('App\Http\Controllers\Admin\Product\TemplateController')->show($id);
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $template = DB::table('template')->select('*');
        $template = $template->get();
        $title = 'EDIT';
        return view('/admin/product/product_edit', compact('template','title','id','product'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $product = Product::findOrFail($id);
        $product->update($data);
        $template = Template::findOrFail($product->template_id);
        $template->amount = Product::where('template_id',$template->id)->count();
        $template->save();
        $orderline  = Orderline::where('template_id',$template->id);
        $orderline->update(['amount' => Product::where('template_id',$template->id)->count()]);
        $orderline->update(['volume'=>Product::where('template_id',$template->id)->sum('volume')]);

        //
        return $this->show($id);
    }
    public function view_product_fail(){
        $products = DB::table('product')
        ->join('template','template.id','product.template_id')
        ->join('partner','partner.id','product.partner_id')
        ->where('product.state','Fail')
        ->select('*', 'product.id as pid', 'template.name as tname','partner.name as pname','product.state as pstate','product.note as pnote','product.amount as pamount',
                 'product.name as productname')->paginate(5);
        $title = 'Product Fail';
        return view('/admin/product/product', compact('products', 'title'));
    }
    public function view_product_stored(){
        $products = DB::table('product')
        ->join('template','template.id','product.template_id')
        ->join('partner','partner.id','product.partner_id')
        ->where('product.state','Stored')
        ->select('*', 'product.id as pid', 'template.name as tname','partner.name as pname','product.state as pstate','product.note as pnote','product.amount as pamount','product.name as productname')->paginate(5);
        $title = 'Product Stored';
        return view('/admin/product/product', compact('products', 'title'));
    }
}
