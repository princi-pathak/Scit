<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Auth;
use App\Models\Currency;
use App\Models\Country;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(Request $request){
        echo 1;
    }
    public function supplier_add(Request $request){
        $key=base64_decode($request->key);
        $data['key']=$key;
        $data['supplier']=Supplier::find($key);
        $data['currency']=Currency::where(['status'=>1,'deleted_at'=>null])->get();
        $data['country']=Country::all_country_list();
        return view('frontEnd.salesAndFinance.supplier.add_supplier',$data);
    }
    public function supplier_save(Request $request){
        // echo "<>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact_name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try {
            $requestData=$request->all();
            $requestData['home_id']=$home_id;
            $requestData['user_id']=$user_id;
            $supplier=Supplier::supplierSave($requestData);
            if($request->id == ''){
                return response()->json(['success' => true,'message'=>'The Supplier has been saved succesfully.', 'supplier' => $supplier]);
            }else{
                return response()->json(['success' => true,'message'=>'The Supplier has been updated succesfully.', 'supplier' => $supplier]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function supplier_list(Request $request, $status){
        if (!in_array($status, ['Active', 'Inactive'])) {
            abort(404);
        }
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $table_status=($status === 'Active' ? 1 : 0);
        $supplier_list=Supplier::allGetSupplier($home_id,$user_id)->where('status',$table_status)->get();
        echo "<pre>";print_r($supplier_list);die;
    }
}
