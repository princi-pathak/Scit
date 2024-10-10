<?php

namespace App\Http\Controllers\frontEnd\salesFinance\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session, DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Product_category;
use App\User;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = "item";
        $path = $request->path();
        $segments = explode('/', $path);
        $lastSegment = end($segments);
        $users = User::getHomeUsers(Auth::user()->home_id);
        $product_categories = Product_category::with('parent', 'children')->where('home_id',Auth::user()->home_id)->where('status',1)->get();
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
        return view('frontEnd.salesAndFinance.Item.product_category', compact('product_categories', 'page', 'lastSegment', 'users', 'product_categories_list'));
    }
    //add product category
    function saveProductCategoryData(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Call the model's method to save product category data
        if(Product_category::checkproductcategoryname($request->name)==0){
            $saveData = Product_category::saveProductCategoryData($request->all(), $request->productCategoryID);
            // Return the appropriate response
            return response()->json([
                'success' => (bool) $saveData,
                'message' => $saveData ? 'Product category added successfully.' : 'Product category could not be created.'
            ]);
        }else{
            return response()->json([
                'success' => 0,
                'message' => 'This Product category already exist.'
            ]);
        }
        
    }

    function changeProductCategoryStatus(Request $request){
        $changestatus = Product_category::changeProductCategoryStatus($request->id, $request->status);
        return response()->json([
            'success' => (bool) $changestatus,
            'message' => $changestatus ? 'Product category status changed successfully.' : 'Product category status could not be changed.'
        ]);
    }
   
}
