<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session,DB,Auth;
use App\traits\CountryTrait;
use App\Customer;
use App\Models\Country;
use App\Models\Job_title;
use App\Models\Customer_type;
use App\Models\Construction_currency;
use App\Models\Constructor_customer_site;
use App\Models\Construction_customer_login;
use App\Models\Constructor_additional_contact;

class CustomerController extends Controller
{
    use CountryTrait;
    public function customer_add_edit(Request $request){
        // echo "<pre>";print_r(Auth::user()->home_id);die;
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['customer']=Customer::find($key);
        $data['task']=$task;
        $data['page']='customers';
        $data['del_status']=0;
        $data['customer_type']=Customer_type::where('status',1)->get();
        $data['job_title']=Job_title::where('status',1)->get();
        $data['contact']=Constructor_additional_contact::where('customer_id',$key)->get();
        $data['site']=Constructor_customer_site::where('customer_id',$key)->get();
        $data['login']=Construction_customer_login::where('customer_id',$key)->get();
        $data['country']=$this->all_country_trait();
        $data['home_id']=Auth::user()->home_id;
        // echo "<pre>";print_r($data['country']);die;
        return view('frontEnd.jobs.add_customer',$data);
    }
    public function customer_add_edit_save(Request $request){
        
        // echo "<pre>";print_r($request->all());die;
        $customer = Customer::saveCustomer($request->all());
        return response()->json($customer);
    }


    public function add_currency(Request $request){
        $all_country=Country::all();
        foreach($all_country as $val){
            $table= new Construction_currency;
            $table->country_id=$val->id;
            $table->currency_code=$val->currency_code;
            $table->save();
        }
        $currecny=Construction_currency::all();
        echo "<pre>";print_r($currecny);die;

    }
}
