<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatalogue extends Model
{
    use HasFactory;
    protected $table="product_catalogues";
    protected $fillable=['home_id', 'user_id', 'name', 'description', 'catalogue_type', 'status'];

    public static function CatalogueSave($data){
        return self::updateOrCreate(
             ['id' => $data['id'] ?? null],
             $data
         );
    }
    public static function getAllCatalogue($home_id){
        return self::where(['home_id'=>$home_id,'deleted_at'=>null]);
    }
    public function productCataloguePrices(){
        return $this->hasMany(ProductCataloguePrice::class, 'product_catalogue_id')->whereNull('deleted_at');
    }
}
