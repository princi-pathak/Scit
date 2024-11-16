<?php

namespace App\Http\Controllers\frontend\salesFinance\item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductGroup;

class ProductGroupController extends Controller
{
    public function productGroupList(){
        $data = array();
        return view('frontEnd.salesAndFinance.Item.product_group', $data);
    }

    public function saveProductGroup(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $saveData = ProductGroup:: saveProductGroup($request->all(), Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $saveData,
            'message' => $saveData ? 'Product group added successfully.' :'Product Group does not added.'
        ]);
    }
}
