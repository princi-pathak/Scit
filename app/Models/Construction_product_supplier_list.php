<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_product_supplier_list extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id', 'supplier_id', 'part_number', 'cost_price_supplier'
    ];
}
