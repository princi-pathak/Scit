<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Department;

class Purchase_orderController extends Controller
{
    public function departments(Request $request){
        $home_id = Auth::user()->home_id;
        $data['department']=Department::getAllDepartment($home_id);
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.department',$data);
    }

    public function save_department(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }

        $data=Department::save_Department($request->all());
        return response()->json(['data' => $data]);
    }
}
