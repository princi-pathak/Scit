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
        // echo "<pre>";print_r($products);die;
        foreach ($products as $product) {
            $data=  self::updateOrCreate(
                ['id' => $product['id'] ?? null],
                [
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
        return $data;
    }
    public static function getProductGroupProductData($home_id){
        return self::where('deleted_at', null);
    }
    public function productGroup(){
        return $this->belongsTo(ProductGroup::class, 'product_group_id')->whereNull('deleted_at');
    }
}
