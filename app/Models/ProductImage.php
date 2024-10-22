<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_images';

    protected $fillable = [
        'productID',
        'imagename'        
    ];

    public static function getallproductimage($productID = NULL){
        return self::where('productID',$productID)->get();

    }

    public static function saveproductimages(array $data){ 
        if(isset($data['imagename'])){
            $imageName = time().'.'.$data['imagename']->extension();      
            $data['imagename']->move(public_path('product'), $imageName); 
        }else{
            $imageName = "";
        }
        $data['imagename'] = $imageName;              
        return self::Create($data);
    }

    public static function deleteproductimage($productimageid = NULL){
        return self::destroy($productimageid);
    }
}
