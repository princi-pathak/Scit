<?php

namespace App\Http\Controllers\frontEnd\salesFinance\item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session, DB;
use Carbon\Carbon;
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
        $catalogues = ProductCatalogue::withCount('productCataloguePrices')->where(['home_id' => Auth::user()->home_id,'deleted_at'=>null])->get();
        // echo "<pre>";print_r($catalogues);die;
        return view('frontEnd.salesAndFinance.item.catalogues', compact('product_categories', 'page', 'lastSegment', 'users', 'product_categories_list', 'catalogues'));
    }
    public function catalogues_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
            if($request->TabId == 0){
                $catlogueTable=['id'=>$request->catalogue_id ?? null,'home_id'=>Auth::user()->home_id,'user_id'=>Auth::user()->id,'name'=>$request->productname,'description'=>$request->description,'catalogue_type'=>$request->type,'status'=>$request->status];
                // echo "<pre>";print_r($catlogueTable);die;
                try {
                    $catlogueSave=ProductCatalogue::CatalogueSave($catlogueTable);
                    // $catlogueSave=['id'=>1];
                    return response()->json(['success' => true, 'data' => $catlogueSave]);
                }catch (\Exception $e) {
                    return response()->json(['success' => false, 'message' => $e->getMessage()]);
                }
            }else{
                // echo count($request->tableData);die;
                $cataloguePriceResults = [];
                foreach($request->tableData as $val){
                     $cataloguePriceTable=[
                            'id'=>$val['id'] ?? null,
                            'product_catalogue_id'=>$request->catalogue_id,
                            'product_id'=>$val['product_id'],
                            'product_code'=>$val['product_code'],
                            'product_name'=>$val['product_name'],
                            'default_price'=>$val['price'],
                            'catalogue_price'=>$val['custom_price'],
                            'product_type'=>$val['product_type'],
                            'status'=>1
                        ];
                    try {
                            $cataloguePriceSave=ProductCataloguePrice::productCatalogueSave($cataloguePriceTable);
                            $cataloguePriceResults[] = $cataloguePriceSave;
                    }catch (\Exception $e) {
                        return response()->json(['success' => false, 'message' => $e->getMessage()]);
                    }
                    
                }
                return response()->json(['success' => true, 'data' => $cataloguePriceResults]);
                
            }
            
        
    }
    public function ProductCataloguePriceList(Request $request){
        $catalogues = ProductCataloguePrice::where(['product_catalogue_id'=>$request->cat_id,'status'=>1,'deleted_at'=>null])->get();
        return response()->json(['data'=>$catalogues]);
    }
    public function ProductCataloguePriceDelete(Request $request){
        $delete=ProductCataloguePrice::where('id', $request->id)->update(['deleted_at' => Carbon::now()]);
        echo "done";
    }
}
