<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\DashBoard\DashBoardController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\TemplateController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Order\OrderLineController;
use App\Http\Controllers\Admin\Invoice\InvoiceController;
use App\Http\Controllers\Admin\Invoice\InvoiceLineController;
use App\Http\Controllers\Admin\Warehouse\WarehouseController;
use App\Http\Controllers\Admin\IP_EP\IpEpController;
use App\Http\Controllers\Admin\Warehouse\WarehouseInventoryController;
use App\Http\Controllers\Admin\Repair\RepairController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\Partner\PartnerController;
use App\Http\Controllers\Portal\PortalController;
use App\Http\Controllers\SearchAmountController;

// trả về view đăng nhập

Route::get('login', [
    LoginController::class,
    'index'
])->name('login');



/*
khi click button login, phương thức post lấy dữ liệu email
và password của người dùng để LoginController check
*/
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');


Route::get('registration', [
    LoginController::class,
    'register'
])->name("register");

Route::post('post-registration', [
    LoginController::class,
    'postRegistration'
])->name("register.post");


// đăng nhập thành công chạy về dashboard
Route::get('/', [LoginController::class, 'dashboard']);

Route::get('dashboard', [
    DashBoardController::class,
    'index'
]);
Route::get('product', [
    ProductController::class,
    'index'
]);

Route::get('product/{id}', [
    ProductController::class,
    'show'
]);

Route::get('template_view', [
    TemplateController::class,
    'index'
]);

Route::get('template/{id}', [
    TemplateController::class,
    'show'
]);

Route::get('template_create', [
    TemplateController::class,
    'create'
]);

Route::post('template/store', [
    TemplateController::class,
    'store'
]);

Route::get('category', [
    CategoryController::class,
    'index'
]);

Route::get('category_create', [
    CategoryController::class,
    'create'
])->name('category.create');

Route::post('category/create', [
    CategoryController::class,
    'store'
])->name('category.store');

Route::get('order', [
        OrderController::class,
        'index'
]);

Route::get('order/{id}', [
    OrderController::class,
    'show'
]);

Route::post('order_update/{id}', [
    OrderController::class,
    'update'
]);

Route::get('order_edit/{id}', [
    OrderController::class,
    'edit'
]);

Route::post('orderline_update/{id}', [
    OrderLineController::class,
    'update'
]);

Route::get('template_edit/{id}', [
    TemplateController::class,
    'edit'
]);

Route::post('template_update/{id}', [
    TemplateController::class,
    'update'
]);

Route::get('product_edit/{id}', [
    ProductController::class,
    'edit'
]);

Route::post('product_update/{id}', [
    ProductController::class,
    'update'
]);

Route::get('orderline_edit/{id}', [
    OrderLineController::class,
    'edit'
]);

Route::get('order_create', [
    OrderController::class,
    'create'
]);


Route::post('order/store', [
    OrderController::class,
    'store'
]);

Route::get('product_create/{id}', [
    ProductController::class,
    'create'
]);


Route::post('product/store', [
    ProductController::class,
    'store'
]);

Route::get('orderline_create/{id}', [
    OrderLineController::class,
    'create'
]);

Route::post('order_line/store',[
    OrderLineController::class,
    'store'
]);

Route::get('ipep', [
    IpEpController::class,
    'index'
]);

Route::get('ipep/{id}', [
    IpEpController::class,
    'show'
]);

Route::get('ipep_delete/{id}', [
    IpEpController::class,
    'delete'
]);
Route::get('invoice', [
    InvoiceController::class,
    'index'
]);

Route::get('invoice/create', [
    InvoiceController::class,
    'create'
]);

Route::post('invoice/create', [
    InvoiceController::class,
    'store'
]);

Route::get('invoice/edit/{id}', [
    InvoiceController::class,
    'edit'
]);

Route::post('invoice/update/{id}', [
    InvoiceController::class,
    'update'
]);

Route::get('invoice/{id}', [
    InvoiceController::class,
    'show'
]);

Route::get('create_invoice_from_order/{oid}',[
    OrderController::class,
    'create_invoice'
]);

Route::get('/admin/invoice/edit/{id}', [
    InvoiceController::class,
    'edit'
]);

Route::get('invoice/update/{id}', [
    InvoiceController::class,
    'update'
]);

Route::get('invoice_done/{id}', [
    InvoiceController::class,
    'action_done'
]);

Route::get('invoice/unlink/{id}', [
    InvoiceController::class,
    'destroy'
]);

Route::get('invoice_line', [
    InvoiceLineController::class,
    'index'
]);

Route::get('partner', [
    PartnerController::class,
    'index'
]);

Route::get('employee', [
    EmployeeController::class,
    'index'
]);
Route::get('partner', [
    PartnerController::class,
    'index'
]);

Route::get('partner_create', [
    PartnerController::class,
    'create'
])->name('partner.create');

Route::post('partner/create', [
    PartnerController::class,
    'store'
])->name('partner.store');

Route::get('warehouse', [
    WarehouseController::class,
    'index'
]);

Route::get('warehouseinventory', [
    WarehouseInventoryController::class,
    'index'
]);

Route::get('warehouseinventory_create', [
    WarehouseInventoryController::class,
    'create'
]);

Route::post('warehouseinventory_store', [
    WarehouseInventoryController::class,
    'store'
])->name('warehouseinventory.store');


Route::get('/getamount', [
    SearchAmountController::class,
    'getamount'
]);

Route::get('/invoice_delete/{id}', [
    InvoiceController::class,
    'delete'
]);

Route::get('/invoiceline_delete/{id}', [
    InvoiceLineController::class,
    'delete'
]);

Route::get('/order_delete/{id}', [
    OrderController::class,
    'delete'
]);

Route::get('/create_ipep/{id}', [
    IpEpController::class,
    'create'
]);

// Route::post('/ipep/create', [
//     IpEpController::class,
//     'store'
// ]);

Route::get('/orderline_delete/{id}', [
    OrderLineController::class,
    'delete'
]);

Route::post('admin/users/login/store', [
    LoginController::class,
    'store'
]);


Route::get('order_done/{id}', [
    IpEpController::class,
    'action_done'
]);

Route::post('/ipepstore', [
    IpEpController::class,
    'store_ipep'
]);

Route::get('/ipep_done/{id}', [
    IpEpController::class,
    'done'
]);

Route::get('/fail/{id}',[
    IpEpController::class,
    'fail'
]);

Route::post('/fail_save/{id}',[
    IpEpController::class,
    'fail_save'
]);

Route::get('lang/{locale}', [App\Http\Controllers\LanguageController::class, 'index']);

Route::get('/search/', [
    OrderController::class,
    'search']);

Route::get('/portal', [
    PortalController::class,
    'index'
]);

Route::get('/product_delete/{id}', [
    ProductController::class,
    'delete'
]);

Route::get('/template_delete/{id}', [
    TemplateController::class,
    'delete'
]);
Route::get('/order_view_all', [
    OrderController::class,
    'viewall'
]);
Route::get('/product_fail', [
    ProductController::class,
    'view_product_fail'
]);
Route::get('save/{id}',[
    IpEpController::class,
    'import'
]);
Route::get('template_save/{id}', [
    TemplateController::class,
    'template_save'
]);
Route::get('/product_stored', [
    ProductController::class,
    'view_product_stored'
]);
Route::get('/templatereload/{$id}', [
    TemplateController::class,
    'action_refresh'
]);
