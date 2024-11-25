<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCataloguePrice extends Model
{
    use HasFactory;
    protected $table="product_catalogue_prices";
    protected $fillable=['product_catalogue_id', 'product_id', 'product_code', 'product_name', 'default_price', 'catalogue_price', 'product_type','status'];

    public static function ProductCatalogueSave($data){
        return self::updateOrCreate(
             ['id' => $data['id'] ?? null],
             $data
         );
    }
    public static function GetAllCataloguePrice($home_id){
        return self::where(['home_id'=>$home_id,'deleted_at'=>null]);
    }
}
