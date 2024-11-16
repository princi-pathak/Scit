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

class CataloguesController extends Controller
{
    public function index(){
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
}
