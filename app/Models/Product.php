<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Construction_tax_rate;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'home_id', 'adder_id', 'customer_only', 'cat_id', 'product_name', 'cost_price', 'margin', 'price', 'tax_rate', 'qty', 'description', 'product_code', 'show_temp', 'bar_code', 'tax_id', 'nominal_code', 'sales_acc_code', 'purchase_acc_code', 'expense_acc_code', 'location', 'attachment', 'status'
    ];
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

    public static function genrateproductcode($product_name){ 
        $check = self::where('product_code', 'like', '%' . $product_name . '%');
        if($check->count()==0){
            return $product_name."-0001";
        }else{
            $getlastvalue = self::where('product_code', 'like', '%' . $product_name . '%')->orderBy('product_code', 'desc')->skip(0)->take(1)->first();
            return $getlastvalue->product_code+1;
        }
         
    } 
}
