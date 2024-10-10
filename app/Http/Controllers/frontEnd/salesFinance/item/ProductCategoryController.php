<?php

namespace App\Http\Controllers\frontEnd\salesFinance\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $product_categories = Product_category::with('parent', 'children')->whereIn('home_id',[0,Auth::user()->home_id])->where('deleted_at',NULL)->get();
        // print_r($product_categories);
        // die;->where('deleted_at',"NULL")
        $productcategory_array = array();
        foreach($product_categories as $value){
            $arr['id'] = $value->id;
            $arr['home_id'] = $value->home_id;
            $arr['product_name'] = $value->name;
            $arr['level'] = $value->full_category;
            $arr['cat_id'] = $value->cat_id;
            $arr['status'] = $value->status;
            $arr['number_of_products'] = 0;
            $arr['number_of_children'] = Product_category::whereIn('home_id',[0,Auth::user()->home_id])->where('cat_id',$value->id)->count();
            array_push($productcategory_array,$arr);
        }
        $product_categories_list = $productcategory_array;
        return view('frontEnd.salesAndFinance.Item.product_category', compact('product_categories', 'page', 'lastSegment', 'users', 'product_categories_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
