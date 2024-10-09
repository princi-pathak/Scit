<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session, DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Customer;
use App\Models\Region;
use App\Models\Country;
use App\Models\Job_title;
use App\Models\Customer_type;
use App\Models\Construction_currency;
use App\Models\Construction_tax_rate;
use App\Models\Constructor_customer_site;
use App\Models\Construction_customer_login;
use App\Models\Constructor_additional_contact;
use App\Models\CustomerBillingAddress;

class CustomerController extends Controller
{
    public function customer_add_edit(Request $request)
    {
        // echo "<pre>";print_r(Auth::user()->home_id);die;
        // $key = base64_decode($request->key);
        $key = $request->key;
        if ($key) {
            $task = 'Edited';
        } else {
            $task = 'Added';
        }
        $data['customer'] = Customer::find($key);
        $data['task'] = $task;
        $data['page'] = 'customers';
        $data['del_status'] = 0;
        $data['customer_type'] = Customer_type::whereNull('deleted_at')->where('status', 1)->get();
        $data['job_title'] = Job_title::whereNull('deleted_at')->where('status', 1)->get();
        $data['contact'] = Constructor_additional_contact::whereNull('deleted_at')->where('customer_id', $key)->get();
        $data['site'] = Constructor_customer_site::whereNull('deleted_at')->where('customer_id', $key)->get();
        $data['login'] = Construction_customer_login::whereNull('deleted_at')->where('customer_id', $key)->get();
        $data['country'] = Country::all_country_list();
        $data['country_code']=Country::getCountriesNameCode();
        $home_id=Auth::user()->home_id;
        $data['home_id'] =$home_id; 
        $data['key']=$key;
        $data['region']=Region::where(['home_id'=>$home_id,'status'=>1,'deleted_at'=>null])->get();
        $data['tax']=Construction_tax_rate::getAllTax_rate($home_id,'Active');
        // echo "<pre>";print_r($data['country_code']);die;
        return view('frontEnd.salesAndFinance.jobs.add_customer', $data);
    }
    public function customer_add_edit_save(Request $request)
    {

        // echo "<pre>";print_r($request->all());die;
        if($request->email !=''){
            $validator = Validator::make($request->all(), [
                'email' => [Rule::unique('customers')->ignore($request->id)],
            ]);
            if ($validator->fails()) {
                return response()->json(['vali_error' => $validator->errors()->first()]);
            }
        }
        
        $customer = Customer::saveCustomer($request->all());
        return response()->json($customer);
    }
    public function default_address(Request $request)
    {
        // echo $customer_id=$request->customer_id;die;

        $country = Country::all_country_list();
        $address_details = Customer::find($request->customer_id);
        $result = '';
        if ($request->check == 1) {
            $result .= '<option value="" selected disabled>None</option>';
            foreach ($country as $country_codev) {
                $select = ($country_codev->id == $address_details->country_code) ? "selected" : "";
                $result .= '<option value="' . $country_codev->code . '" ' . $select . '>' . $country_codev->name . ' (' . $country_codev->code . ')</option>';
            }
        } else {
            $result .= '<option value="" selected disabled>None</option>';
            foreach ($country as $country_codev) {
                $result .= '<option value="' . $country_codev->code . '">' . $country_codev->name . ' (' . $country_codev->code . ')</option>';
            }
        }
        $data['reslut'] = $result;
        $data['details'] = $address_details;
        return response()->json($data);
    }
    public function save_contact(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $customer = Constructor_additional_contact::saveCustomerAdditional($request->all());
        // echo "<pre>";print_r($customer);die;
        if($customer){
            echo "done";
        }else{
            echo "error";
        }
    }
    public function delete_contact(Request $request ){
        // echo "<pre>";print_r($request->all());die;
        $delete= Constructor_additional_contact::where('id', $request->id)->update(['deleted_at' => Carbon::now()]);
    }
    public function save_site(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $customer = Constructor_customer_site::saveCustomerAdditional($request->all());
        if($customer){
            echo "done";
        }else{
            echo "error";
        }
    }
    public function delete_site(Request $request){
        $delete= Constructor_customer_site::where('id', $request->id)->update(['deleted_at' => Carbon::now()]);
        echo "done";
    }
    public function save_login(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $customer = Construction_customer_login::saveCustomerAdditional($request->all());
        if($customer){
            echo "done";
        }else{
            echo "error";
        }
    }
    public function delete_login(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $delete= Construction_customer_login::where('id', $request->id)->update(['deleted_at' => Carbon::now()]);
    }
    public function active_customer(Request $request)
    {
        $home_id = Auth::user()->home_id;
        $data['customer'] = Customer::get_customer_list_Attribute($home_id, $request->list_mode);
        $data['list_mode'] = $request->list_mode;
        $data['active_customer'] = Customer::getConvertedCustomersCount($home_id);
        $data['inactive_customer'] = Customer::where(['is_converted' => 1, 'status' => 0, 'home_id' => $home_id])->count();
        return view('frontEnd.salesAndFinance.jobs.active_customer', $data);
    }
    public function customer_type()
    {
        $home_id = Auth::user()->home_id;
        $data['customer_type'] = Customer_type::whereNUll('deleted_at')->get();
        $data['home_id'] = $home_id;
        // echo "<pre>";print_r($customer_type);die;
        return view('frontEnd.salesAndFinance.jobs.customer_type', $data);
    }
    public function customer_type_edit_form(Request $request)
    {
        $data = Customer_type::find($request->id);
        return $data;
    }
    public function save_customer_type(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $home_id = Auth::user()->home_id;

        $insert = '';
        $table = new Customer_type;
        try {
            $insert = $table::updateOrCreate(
                ['id' => $request->id ?? null],
                $request->all(),
            );
        } catch (\Exception $e) {
            return response()->json(['success' => 'false', 'message' => $e->getMessage()], 500);
        }
        // echo "<pre>";print_r($insert);die;
        if ($insert) {
            if ($insert->status == 1) {
                echo '<option value="' . $insert->id . '">' . $insert->title . '</option>';
            }
        } else {
            echo "error";
        }
    }
    public function add_currency(Request $request)
    {
        $all_country = Country::all();
        foreach ($all_country as $val) {
            $table = new Construction_currency;
            $table->country_id = $val->id;
            $table->currency_code = $val->currency_code;
            $table->save();
        }
        $currecny = Construction_currency::all();
        echo "<pre>";
        print_r($currecny);
        die;
    }

    public function SaveCustomerData(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'telephone' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Call the model's method to save customer data
        $saveData = Customer::saveCustomerData($request->all(), $request->customer_id);

        // Return the appropriate response
        return response()->json([
            'success' => (bool) $saveData,
            'message' => $saveData ? 'Customer added successfully.' : 'Customer could not be created.'
        ]);
    }

    public function getCustomerList()
    {
        $data =  Customer::getCustomerList();

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function getCustomerDetails(Request $request){

        $data =  Customer::getCustomerDetails($request->id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function SaveCustomerContactData(Request $request) {
        $validator = Validator::make($request->all(), [
            'contact_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'telephone' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $sameAsDefault =  ['same_as_default' => $request->has('same_as_default') ? '1' : '0'];  
        $data =  CustomerBillingAddress::saveCustomerContactDetails(array_merge($sameAsDefault, $request->all()));

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? "Customer Contact added successfully" : 'Customer contact could not be added.'
        ]);
    }

    public function getCustomerJobTitle(){
        $data =  Job_title::getCustomerJobTitle();

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function saveJobTitle(Request $request){
        $data = Job_title::saveJobTitle($request->all(),  Auth::user()->home_id);

        if($request->job_title_id == null){ 
            return response()->json([
                'success' => (bool) $data,
                'message' => $data ? "Job Title added successfully" : 'Job Title could not be added.'
            ]); 
        } else {
            return response()->json([
                'success' => (bool) $data,
                'message' => $data ? "Job Title edited successfully" : 'Job Title could not be edited.'
            ]);  
        }
    }

    public function saveCustomerSiteAddress(Request $request){

        $validator = Validator::make($request->all(), [
            'site_name' => 'required',
            'contact_name' => 'required',
            'company_name' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $data = Constructor_customer_site::saveCustomerAdditional($request->all());
        return response()->json([
            'success' => (bool) $data,
            'message' => $data ? "Site Address added successfully" : 'Site Address could not be added.'
        ]);
    }

    public function getCustomerBillingAddress(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = CustomerBillingAddress::getCustomerBillingAddress($request->id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);

    }

    public function getCustomerBillingAddressData(Request $request){
        
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = CustomerBillingAddress::getCustomerBillingAddressData($request->id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }
   
}
