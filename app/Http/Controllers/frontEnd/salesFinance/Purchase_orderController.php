<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Customer;
use App\Models\Department;
use App\Models\Project;
use App\Models\Country;
use App\Models\Tag;
use App\Models\Customer_type;
use App\Models\Constructor_additional_contact;
use App\Models\Job_title;
use App\Models\Region;
use App\Models\Product_category;
use App\Models\Construction_tax_rate;
use App\Models\Construction_account_code;
use App\Models\Construction_job_appointment_type;
use App\Models\Constructor_customer_site;
use App\Models\Job;
use App\Models\Job_type;
use App\Models\Product;

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
    public function purchase_order(Request $request){
        $home_id = Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $key=base64_decode($request->key);
        $data['key']=$key;
        $job_details=Job::find($key);
        $customerId = optional($job_details)->customer_id;
        $data['customers']=Customer::get_customer_list_Attribute($home_id,'ACTIVE');
        $data['projects']=Project::where(['status'=>1,'home_id'=>$home_id])->get();
        $data['additional_contact'] = Constructor_additional_contact::where('home_id', $home_id)->get();
        $data['country']=Country::all_country_list();
        $data['tag'] = Tag::getAllTag($home_id);
        $data['customer_types']=Customer_type::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['job_title']=Job_title::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['region']=Region::where(['home_id'=>$home_id,'status'=>1,'deleted_at'=>null])->get();
        $data['category']=Product_category::with('parent', 'children')->where('status',1)->get();
        $data['sales_tax']=Construction_tax_rate::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['account_code']=Construction_account_code::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['appointment_type']=Construction_job_appointment_type::where('home_id',$home_id)->get();
        $data['site']=Constructor_customer_site::where('customer_id',$customerId)->get();
        $data['job_type']=Job_type::where('status',1)->get();
        $data['product_count']=Product::count();
        // echo "<pre>";print_r($data['country']);die;
        return view('frontEnd.salesAndFinance.purchase_order.new_purchase_order',$data);
    }
}
