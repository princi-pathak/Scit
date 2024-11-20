<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroupProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_group_id',
        'product_id',
        'product_code',
        'product_name',
        'cost_price',
        'price',
        'quantity',
        'status'
    ];
    public static function saveProductGroupData(){
        
    }
}
