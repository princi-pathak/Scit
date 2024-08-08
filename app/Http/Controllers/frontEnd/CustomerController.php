<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session,DB,Auth;
use App\traits\CountryTrait;
use App\traits\ActionTrait;
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
    use CountryTrait;use ActionTrait;
    public function customer_add_edit(Request $request){
        // echo "<pre>";print_r(Auth::user()->home_id);die;
        $key=base64_decode($request->key);
        if($key){
            $task='Edited';
        }else{
            $task='Added';
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
        // echo "<pre>";print_r($data['customer']);die;
        return view('frontEnd.jobs.add_customer',$data);
    }
    public function customer_add_edit_save(Request $request){
        
        // echo "<pre>";print_r($request->all());die;
        $customer = Customer::saveCustomer($request->all());
        return response()->json($customer);
    }
    public function default_address(Request $request){
        // $login_customer_id=$request->login_customer_id;
        $country=$this->all_country_trait();
        $address_details=Customer::find($request->login_customer_id);
        $result='';
        if($request->check == 1){
            $result.='<option value="" selected disabled>None</option>';
                    foreach($country as $country_codev){
                        $select=($country_codev->id == $address_details->country_code)?"selected":"";
                        $result.='<option value="'.$country_codev->code.'" '.$select.'>'.$country_codev->name.' ('.$country_codev->code.')</option>';
                    }
        }else {
            $result.='<option value="" selected disabled>None</option>';
                    foreach($country as $country_codev){
                        $result.='<option value="'.$country_codev->code.'">'.$country_codev->name.' ('.$country_codev->code.')</option>';
                    }
        }
        $data['reslut']=$result;
        $data['details']=$address_details;
        return response()->json($data);
    }
    public function save_contact(Request $request){
        $customer=Constructor_additional_contact::saveCustomerAdditional($request->all());
        // echo "<pre>";print_r($customer);die;
        $data=Constructor_additional_contact::find($customer);
        $job_title=Job_title::find($data->job_title_id);
        $result='<tr class="active">
                    <td><input type="checkbox" value="'.$data->id.'" class="checkboxContactId"></td>
                    <td>'.$data->contact_name.'</td>
                    <td>'.$job_title->name.'</td>
                    <td>'.$data->email.'</td>
                    <td>'.$data->telephone.'</td>
                    <td>'.$data->mobile.'</td>
                    <td>'.$data->address.'</td>
                    <td>'.$data->city.'</td>
                    <td>'.$data->country.'</td>
                    <td>'.$data->postcode.'</td>
                    <td>Yes </td>

                </tr>';
        echo $result;
    }
    public function save_site(Request $request){
        $customer=Constructor_customer_site::saveCustomerAdditional($request->all());
        $data=Constructor_customer_site::find($customer);
        $job_title=Job_title::find($data->title_id);
        $result='<tr class="active">
                    <td><input type="checkbox" value="'.$data->id.'" class="checkboxContactId"></td>
                    <td>'.$data->site_name.'</td>
                    <td>'.$job_title->name.'</td>
                    <td>'.$data->email.'</td>
                    <td>'.$data->telephone.'</td>
                    <td>'.$data->mobile.'</td>
                    <td>'.$data->address.'</td>
                    <td>'.$data->city.'</td>
                    <td>'.$data->country.'</td>
                    <td>'.$data->post_code.'</td>
                    <td>Yes </td>

                </tr>';
        echo $result;
    }
    public function save_login(Request $request){
        $customer=Construction_customer_login::saveCustomerAdditional($request->all());
        $data=Construction_customer_login::find($customer);
        $job_title=Job_title::find($data->title_id);
                $result = '<tr class="active">
                <td>#</td>
                <td>'.$data->name.'</td>
                <td>'.$data->email.'</td>
                <td>'.$data->email.'</td>
                <td>'.$data->telephone.'</td>
                <td>29/07/2024</td>
                <td>Active</td>
            </tr>';

        echo $result;
    }
    public function active_customer(Request $request){
        $home_id=Auth::user()->home_id;
        $data['customer']=Customer::get_customer_list_Attribute($home_id,$request->list_mode);
        $data['list_mode']=$request->list_mode;
        $data['active_customer']=Customer::getConvertedCustomersCount($home_id);
        $data['inactive_customer']=Customer::where(['is_converted'=>1,'status'=>0,'home_id'=>$home_id])->count();
        return view('frontEnd.jobs.active_customer',$data);
    }
    public function status_change(Request $request){
       $status= $this->status_change_trait($request->all());
        echo $status;
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
