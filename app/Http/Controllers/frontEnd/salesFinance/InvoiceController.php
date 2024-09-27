<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Construction_account_code;
use App\Models\Construction_tax_rate;

class InvoiceController extends Controller
{
    public function account_codes(Request $request){
        $home_id = Auth::user()->home_id;
        $data['account_codes']=Construction_account_code::getAllAccount_Codes($home_id);
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.account_code',$data);
    }

    public function save_account_code(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }

        $data=Construction_account_code::saveAccount_Codes($request->all());
        return response()->json(['data' => $data]);
    }

    public function tax_rate(Request $request){
        $mode=$request->mode;
        $home_id = Auth::user()->home_id;
        $data['tax_rate']=Construction_tax_rate::getAllTax_rate($home_id,$mode);
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.tax_rate',$data);
    }

    public function save_tax_rate(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tax_rate' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }

        $data=Construction_tax_rate::saveTax_rate($request->all());
        return response()->json(['data' => $data]);
    }
}
