<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCataloguePrice extends Model
{
    use HasFactory;
    protected $table="product_catalogue_prices";
    protected $fillable=['product_catalogue_id', 'product_id', 'product_code', 'product_name', 'default_price', 'catalogue_price', 'product_type','status'];

    public static function productCatalogueSave($data){
        return self::updateOrCreate(
             ['id' => $data['id'] ?? null],
             $data
         );
    }
    public function productCatalogue(){
        return $this->belongsTo(ProductCatalogue::class, 'product_catalogue_id')->whereNull('deleted_at');
    }
}
