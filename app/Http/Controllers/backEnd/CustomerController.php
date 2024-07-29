<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session,DB;
use App\Customer;
use App\Models\Country;
use App\Models\Job_title;
use App\Models\Customer_type;
use App\Models\Constructor_customer_site;
use App\Models\Construction_customer_login;
use App\Models\Constructor_additional_contact;

class CustomerController extends Controller
{
    public function customers(Request $request){
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query=Customer::whereNot('status',2)->where('is_converted', 1)->orderBy('id','DESC');

            $search = '';

            if(isset($request->limit)) {
                $limit = $request->limit;
                Session::put('page_record_limit',$limit);
            } else {

                if(Session::has('page_record_limit')){
                    $limit = Session::get('page_record_limit');
                } else{
                    $limit = 20;
                }
            }
            if(isset($request->search))
            {
                $search      = trim($request->search);
                $query = $query->where('name','like','%'.$search.'%');
            }
            $customers = $query->paginate($limit);
            
            $data['customers']=$customers;
            $data['limit']=$limit;
            $data['search']=$search;
            $data['page']='customers';
            return view('backEnd.jobs_management.customers',$data);
        }else {
            return redirect('admin/')->with('error',NO_HOME_ERR);
        }
    }
    public function customer_add(Request $request){
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $admin   = Session::get('scitsAdminSession');
        $data['home_id'] = $admin->home_id;
        $data['rejection']=Customer::find($key);
        $data['task']=$task;
        $data['page']='customers';
        $data['del_status']=0;
        $data['customer_type']=Customer_type::where('status',1)->get();
        $data['job_title']=Job_title::where('status',1)->get();
        $data['country']=Country::where('status',1)->get();
        return view('backEnd.jobs_management.customers_form',$data);
    }
    public function customer_type(Request $request){
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query=Customer_type::whereNot('status',2)->orderBy('id','DESC');

            $search = '';

            if(isset($request->limit)) {
                $limit = $request->limit;
                Session::put('page_record_limit',$limit);
            } else {

                if(Session::has('page_record_limit')){
                    $limit = Session::get('page_record_limit');
                } else{
                    $limit = 20;
                }
            }
            if(isset($request->search))
            {
                $search      = trim($request->search);
                $query = $query->where('name','like','%'.$search.'%');
            }
            $customer_type = $query->paginate($limit);
            
            $data['customer_type']=$customer_type;
            $data['limit']=$limit;
            $data['search']=$search;
            $data['page']='customer_type';
            return view('backEnd.jobs_management.customer_type',$data);
        }else {
            return redirect('admin/')->with('error',NO_HOME_ERR);
        }
    }
    public function customer_type_add(Request $request){
        $key=base64_decode($request->key);
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['type']=Customer_type::find($key);
        $data['task']=$task;
        $data['page']='customer_type';
        $data['del_status']=0;
        $data['home_id']=$home_id;
        return view('backEnd.jobs_management.customer_type_form',$data);
    }
    public function customer_type_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        Customer_type::updateOrCreate(['id' => $request->id], $request->all());
        if(isset($request->id)){
            Session::flash('success','Updated Successfully Done');
        } else {
            Session::flash('success','Added Successfully Done');
        }
        
        echo "done";
    }
    public function customer_type_status_change(Request $request){
        $id=base64_decode($request->id);
        $status=$request->status;
        $table=Customer_type::find($id);
        $table->status=$status;
        $table->save();
        Session::flash('success','Status Change Successfully Done');
        echo "done";
    }
    public function customer_type_delete(Request $request){
        $id=base64_decode($request->id);
        $table=Customer_type::find($id);
        $table->status=2;
        $table->save();
        Session::flash('success','Deleted Successfully Done');
        echo "done";
    }
    public function customer_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $customer = Customer::saveCustomer($request->all());
        echo $customer;
    }
    public function customer_contact_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
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
    public function customer_site_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
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
    public function customer_login_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
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
}
