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
    public static function saveProductGroupData($group_id, $productData){

        $products = $productData['products'];

        foreach ($products as $product) {
            return  self::create([
                'product_group_id' => $group_id,
                'product_id' => $product['product_id'],
                'product_code' => $product['code'],
                'product_name' => $product['product'],
                'cost_price' => $product['cost_price'],
                'price' => $product['price'],
                'quantity' => $product['qty'],
                'status' => 1,
            ]);
        }
    }
}
