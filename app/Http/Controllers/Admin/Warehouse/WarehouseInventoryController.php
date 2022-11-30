<?php

namespace App\Http\Controllers\Admin\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Warehouse_Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseInventoryController extends Controller
{
    public function index() {

        $wis = DB::table('warehouse_inventory')
            ->join('template', 'template.id', '=' ,'warehouse_inventory.template_id')
            ->join('employee', 'employee.id', '=' , 'warehouse_inventory.employee_id')
            ->select('warehouse_inventory.*', 'template.name as tpname', 'employee.name as epname');
        
        $wis = $wis->get();
        $header = $breadcrumb_item = $title = "Inventory";
        
        return view('/admin/warehouse/warehouse_inventory', 
        compact('title', 'header', 'breadcrumb_item', 'wis'));
        }


    public function create() {
        // lấy dữ liệu employee để lưu nhân viên kiểm kê kho
        // $employees = DB::table('employee')->select('id as epid, name as epname');
        $employees = DB::table('employee')->select('*');
        $employees = $employees->get();
        // lấy dữ liệu template để lưu số lượng hàng và tên mẫu sp
        // $templates = DB::table('template')->select('id as tpid, name as tpname, category_id as tpcate', 'state as tpstate');
        $templates = DB::table('template')->select('*');
        $templates = $templates->get();
        $header = $breadcrumb_item = $title = "Inventory";
        return view('/admin/warehouse/warehouse_inventory_create', compact('title', 'header', 'breadcrumb_item', 'employees', 'templates'));
        return view('/admin/warehouse/warehouse_inventory_create', [
            'title' => $title, 
            'header' => $header, 
            'breadcrumb_item' => $breadcrumb_item, 
            'employees' => $employees, 
            'templates' => $templates,
        ]);
    }


    public function addWarehouse_inventory($data) {
        $aRR = [
            'template_id' => $data['template_id'],
            'employee_id' => $data['employee_id'],
            'actual_number' => $data['quantity_checked'],
            'date' => $data['date'],
        ];
        return Warehouse_Inventory::create([
            'template_id' => $data['template_id'],
            'employee_id' => $data['employee_id'],
            'actual_number' => $data['actual_number'],
            'quantity_checked' => $data['quantity_checked'],
            'date' => $data['date'],
            'history' => json_encode($aRR),
            'note' => $data['note'],
            'deviant' => $data['deviant'],
            'state' => $data['state'],
        ]);
    }
    
    
    public function store(Request $request) {
        $data = $request->all();
        $this->addWarehouse_inventory($data);
        return redirect('/warehouseinventory');

    }
        
        
}
