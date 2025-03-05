<?php

namespace App\Http\Controllers\frontEnd\salesFinance\asset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepreciationType;
use App\Models\AssetCategory;
use App\Models\AssetRegistration;
use Validator;

class AssetController extends Controller
{
    public function asset_category(Request $request){
        $data['page']='assets';
        $data['list']=AssetCategory::getAllAssetCategory()->get();
        return view('frontEnd.salesAndFinance.asset.assetCategoryList',$data);
    }
    public function asset_register(Request $request){
        $data['page']='assets';
        $data['list']=AssetRegistration::getAllAssetRegistration()->get();
        return view('frontEnd.salesAndFinance.asset.assetRegisterList',$data);
    }
    public function asset_regiser_add(Request $request){
        $data['page']='assets';
        return view('frontEnd.salesAndFinance.asset.assetRegisterForm',$data);
    }
    public function asset_regiser_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'asset_name'=>'required',
            'asset_type'=>'required',
            'date'=>'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        
        try {
            
            $asset_registration=AssetRegistration::saveAssetRegistration($request->all());
            if($request->id == ''){
                return response()->json(['success' => true,'message'=>'The Aseet Registration has been saved succesfully.', 'data' => $asset_registration]);
            }else{
                return response()->json(['success' => true,'message'=>'The Aseet Registration has been updated succesfully.', 'data' => $asset_registration]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function depreciation_type(Request $request){
        $data['page']='assets';
        return view('frontEnd.salesAndFinance.asset.depreciation_typeList',$data);
    }
}
