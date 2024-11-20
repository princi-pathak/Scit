<?php

namespace App\Http\Controllers\frontend\salesFinance\item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductGroup;
use App\Models\ProductGroupProduct;


class ProductGroupController extends Controller
{
    public function productGroupList(){
        $data = array();
        return view('frontEnd.salesAndFinance.Item.product_group', $data);
    }

    public function saveProductGroup(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        parse_str($request->input('FormData'), $formData);
        $productsData = json_decode($request->input('products'), true);
        // dd($productsData);

        $saveData = ProductGroup:: saveProductGroup($formData, Auth::user()->home_id, Auth::user()->id );

        $saveProduct = ProductGroupProduct::saveProductGroupData($saveData->id, $productsData);

        return response()->json([
            'success' => (bool) $saveProduct,
            'message' => $saveProduct ? 'Product group added successfully.' :'Product Group does not added.'
        ]);
    }

   
}
