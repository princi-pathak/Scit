<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Construction_tax_rate;

class Product extends Model
{
    use HasFactory;
    public static function product_detail($id){
        $data=DB::table('products as pr')
        ->select('pr.*','cat.id as cat_id','cat.name')
        ->join('product_categories as cat','cat.id','=','pr.cat_id')
        ->where('pr.id',$id)->first();
        return $data;
    }
    public static function tax_detail($home_id){
        return Construction_tax_rate::where('home_id',$home_id)->get();
    }
}
