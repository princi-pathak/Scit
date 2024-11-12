<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Construction_tax_rate;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'home_id', 'adder_id', 'customer_only', 'cat_id','product_type', 'product_name', 'cost_price', 'margin', 'price', 'tax_rate', 'qty', 'description', 'product_code', 'show_temp', 'bar_code', 'tax_id', 'nominal_code', 'sales_acc_code', 'purchase_acc_code', 'expense_acc_code', 'location', 'attachment', 'status','deleted_at'
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

    public static function saveProductdata(array $data, $productID = null){        
        $data['home_id'] = Auth::user()->home_id;
        $data['adder_id'] = Auth::user()->id;
        // if(isset($data['attachment'])){
        //     $imageName = time().'.'.$data['attachment']->extension();      
        //     $data['attachment']->move(public_path('product'), $imageName); 
        // }else{
        //     $imageName = "";
        // }
        // $data['attachment'] = $imageName;   
        return self::updateOrCreate(['id' => $productID], $data);
    }
    public static function changeProductStatus($productID,$status)
    {
        $product = self::find($productID);
        $product->status = $status;
        return $product->save();
    }

    public static function deleteProduct(array $productID)
    {
        $product = self::whereIn('id', $productID)->update(['deleted_at' => now()]);
        //$productCategory->deleted_at = date('Y-m-d H:i:s');
        return $product;
    }

    public static function getProductList($type){
        return self::join('product_categories', 'products.cat_id', '=','product_categories.id')->where('product_type', $type)->select('products.id','products.cat_id', 'products.product_code', 'products.product_name', 'product_categories.name', 'products.description')->get();
    }
}
