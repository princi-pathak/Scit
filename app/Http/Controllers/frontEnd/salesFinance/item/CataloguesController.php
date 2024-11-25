<?php

namespace App\Http\Controllers\frontEnd\salesFinance\item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session, DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\ProductCatalogue;
use App\Models\ProductCataloguePrice;
use App\User;
use App\Models\Product_category;
use App\Models\Product;

class CataloguesController extends Controller
{
    public function index(Request $request){
        $page = "item";
        $path = $request->path();
        $segments = explode('/', $path);
        $lastSegment = end($segments);
        $users = User::getHomeUsers(Auth::user()->home_id);
        $product_categories = Product_category::with('parent', 'children')->where('home_id',Auth::user()->home_id)->where('status',1)->where('deleted_at',NULL)->get();
        $product_category = Product_category::with('parent', 'children')->where('home_id',Auth::user()->home_id)->where('deleted_at',NULL)->get();
        // print_r($product_categories);
        // die;->where('deleted_at',"NULL")
        $productcategory_array = array();
        foreach($product_category as $value){
            $arr['id'] = $value->id;
            $arr['home_id'] = $value->home_id;
            $arr['product_name'] = $value->name;
            $arr['level'] = $value->full_category;
            $arr['cat_id'] = $value->cat_id;
            $arr['status'] = $value->status;
            $arr['number_of_products'] = 0;
            $arr['number_of_children'] = Product_category::where('home_id',Auth::user()->home_id)->where('cat_id',$value->id)->where('deleted_at',NULL)->count();
            array_push($productcategory_array,$arr);
        }
        $product_categories_list = $productcategory_array;
        return view('frontEnd.salesAndFinance.item.catalogues', compact('product_categories', 'page', 'lastSegment', 'users', 'product_categories_list'));
    }
    public function catalogues_save(Request $request){
        echo "<pre>";print_r($request->all());die;
            if(empty($request->tableData)){
                $catlogueTable=['home_id'=>Auth::user()->home_id,'user_id'=>Auth::user()->id,'name'=>$request->productname,'description'=>$request->description,'catalogue_type'=>$request->type,'status'=>$request->status];
                try {
                    $catlogueSave=ProductCatalogue::CatalogueSave($catlogueTable);
                    return response()->json(['success' => true, 'data' => $catlogueSave]);
                }catch (\Exception $e) {
                    return response()->json(['success' => false, 'message' => $e->getMessage()]);
                }
            }else{
                foreach($request->tableData as $val){
                     $cataloguePriceTable=[
                            'product_catalogue_id'=>$request->catalogue_id,
                            'product_id'=>$val['id'],
                            'product_code'=>$val['product_code'],
                            'product_name'=>$val['product_name'],
                            'default_price'=>$val['price'],
                            'catalogue_price'=>$val['custom_price'],
                            'product_type'=>$val['product_type'],
                            'status'=>1
                        ];
                    try {
                        $cataloguePriceSave=ProductCataloguePrice::ProductCatalogueSave($cataloguePriceTable);
                        return response()->json(['success' => true, 'data' => $cataloguePriceSave]);
                    }catch (\Exception $e) {
                    return response()->json(['success' => false, 'message' => $e->getMessage()]);
                }
                    
                }
                
            }
            
        
    }
}
