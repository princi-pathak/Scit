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

    public static function saveProductSupplierList($data){
        // echo "<pre>";print_r($data);die;
        return self::updateOrCreate(['id' => $data['id'] ?? null], $data);
    }
}
