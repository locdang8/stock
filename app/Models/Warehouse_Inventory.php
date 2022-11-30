<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse_Inventory extends Model
{
    use HasFactory;

    protected $table = "warehouse_inventory";
    
    protected $fillable = [
      'template_id',
      'employee_id',
      'actual_number',
      'quantity_checked',
      'date',
      'history',
      'note',
      'deviant',
      'state'
    ];

    
    public $timestamps = false;

}
