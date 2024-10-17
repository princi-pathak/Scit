<?php

namespace App\Http\Controllers\frontEnd\salesFinance\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session, DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Product_category;
use App\Models\Product;
use App\Models\Construction_tax_rate;
use App\Models\Construction_account_code;
use App\User;

class ProductController extends Controller
{
    function productlist(Request $request){
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
        return view('frontEnd.salesAndFinance.Item.product', compact('product_categories', 'page', 'lastSegment', 'users', 'product_categories_list'));
    }

    function productcategorylist(Request $request){
        $product_categories = Product_category::with('parent', 'children')
        ->where('home_id', Auth::user()->home_id)
        ->where('status', 1)
        ->where('deleted_at', NULL)
        ->get();
        return response()->json($product_categories);
    }

    function taxratelist(Request $request){
        $taxrate = Construction_tax_rate::where('home_id', Auth::user()->home_id)
        ->where('status', 1)
        ->where('deleted_at', NULL)
        ->get();
        return response()->json($taxrate);
    }
    function account_code(Request $request){
        $account_code = Construction_account_code::where('home_id', Auth::user()->home_id)
        ->where('status', 1)
        ->where('deleted_at', NULL)
        ->get();
        return response()->json($account_code);
    }

    function generateproductcode(Request $request){
        $product_name = strtoupper($request->productname);
        $pro_name = Product::genrateproductcode($product_name);
        return response()->json($pro_name);
    }

    function saveTaxrateData(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        //echo Product_category::checkproductcategoryname($request->name,$request->productCategoryID);
        //die;
       // Call the model's method to save product category data
        if(Construction_tax_rate::checkTaxRatename($request->taxratename,$request->taxrateID)==0){
            $saveData = Construction_tax_rate::saveTaxRateData($request->all(), $request->taxrateID);
            // Return the appropriate response
            return response()->json([
                'success' => 1,
                'message' => $saveData ? 'The Tax Rate has been saved successfully.' : 'Tax Rate could not be created.',
                'lastid' => $saveData
            ]);
        }else{
            return response()->json([
                'success' => 0,
                'message' => 'This Tax Rate already exist.',
                'lastid' => 0
            ]);
        }
        
    }
    function saveproductdata(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        //echo Product_category::checkproductcategoryname($request->name,$request->productCategoryID);
        //die;
       // Call the model's method to save product category data
        //if(Product::checkTaxRatename($request->taxratename,$request->taxrateID)==0){
            $saveData = Product::saveProductdata($request->all(), $request->productID);
            // Return the appropriate response
            return response()->json([
                'success' => 1,
                'message' => $saveData ? 'The Product has been saved successfully.' : 'Product could not be created.',
                'lastid' => $saveData
            ]);
        // }else{
        //     return response()->json([
        //         'success' => 0,
        //         'message' => 'This Tax Rate already exist.',
        //         'lastid' => 0
        //     ]);
        // }
        
    }

}
