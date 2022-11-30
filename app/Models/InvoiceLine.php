<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    protected $table = 'invoice_line';
    protected $fillable = [
        'name',
        'product_id',
        'invoice_id',
        'total_money',
        'amount',
        'volume',
        'note',
    ];
    public $timestamps = False;
}
