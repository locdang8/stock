<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;


class InvoiceController extends Controller
{
    public function index() {
        $invoices = DB::table('invoice')->select('*');
        $invoices = $invoices->get();
        $title = 'Invoices';
        return view('/admin/invoice/invoice', compact('invoices', 'title'));
    }
    
    public function show($id)
    {
        $invoices = DB::table('invoice')->where('id', '=', $id)->select('*')->first();
        $lines = DB::table('invoice_line')->where('invoice_id','=', $id)->select('*');
        $lines = $lines->get();
        $title = 'Invoices';
        return view('/admin/invoice/invoice_detail', compact('invoices', 'lines','title'));
    }

    public function create()
    {
        return view('/admin/invoice/invoice_create');
    }

    public function store(Request $request)
    {
        $invoices = new Invoice;
        $invoices->name = $request->name;
        $invoices->partner_id = $request->partner_id;
        $invoices->create_date = $request->create_date;
        $invoices->date_payment = $request->date_payment;
        $invoices->payment_term = $request->payment_term;
        $invoices->total_payment = $request->total_payment;
        $invoices->state = $request->state;

        $invoices->save();
        return redirect()->action('Admin\Invoice\InvoiceController@create');
    }

    public function edit($id)
    {
        $invoices = invoice::findOrFail($id);
        $title = 'Invoices - Update';
        return view('/admin/invoice/invoices_update', compact('invoices', 'pageName'));
    }
    
    public function update(Request $request, $id)
    {
        $invoices = invoice::find($id);
        $invoices->name = $request->name;
        $invoices->partner_id = $request->partner_id;
        $invoices->create_date = $request->create_date;
        $invoices->date_payment = $request->date_payment;
        $invoices->payment_term = $request->payment_term;
        $invoices->total_payment = $request->total_payment;
        $invoices->state = $request->state;
        
        $invoices->save();
        return redirect()->action('Admin\Invoice\InvoiceController@index');
    }

    public function destroy($id)
    {
        $invoices = invoice::find($id);
        
        $invoices->delete();
        return redirect()->action('Admin\Invoice\InvoiceController@index')->with('success','Data removed.');
    }
}
