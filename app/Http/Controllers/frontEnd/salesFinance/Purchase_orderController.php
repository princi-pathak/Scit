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
use App\Models\Currency;
use App\Models\Supplier;
use App\Home;
use App\Admin;
use App\Models\PurchaseOrder;

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
        // echo "<pre>";print_r(Auth::user());die;
        $home_id = Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $home_table=Home::find($home_id);
        $data['company_name']=Admin::find($home_table->admin_id)->company;
        $key=base64_decode($request->key);
        $data['key']=$key;
        $purchase_orders=PurchaseOrder::find($key);
        $site=array();
        if($key){
            $site=Constructor_customer_site::where('customer_id',$purchase_orders->customer_id)->get();  
        }
        $data['purchase_orders']=$purchase_orders;
        $data['site']=$site;
        $data['projects']=Project::where(['status'=>1,'home_id'=>$home_id])->get();
        $data['customers']=Customer::get_customer_list_Attribute($home_id,'ACTIVE');
        $data['additional_contact'] = Constructor_additional_contact::where(['home_id'=> $home_id,'userType'=>2,'customer_id'=>$key,'deleted_at'=>null])->get();
        $data['country']=Country::all_country_list();
        $data['tag'] = Tag::getAllTag($home_id);
        $data['currency']=Currency::where(['status'=>1,'deleted_at'=>null])->get();
        $data['suppliers']=Supplier::allGetSupplier($home_id,$user_id)->where('status',1)->get();
        $data['department']=Department::getAllDepartment($home_id);
        $data['job_title']=Job_title::where(['home_id'=>$home_id,'status'=>1])->get();
        // echo "<pre>";print_r($data['additional_contact']);die;
        return view('frontEnd.salesAndFinance.purchase_order.new_purchase_order',$data);
    }
    public function purchase_order_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        
        $validator = Validator::make($request->all(), [
            'supplier_id'=>'required',
            'name'=>'required',
            'address'=>'required',
            'user_name'=>'required',
            'user_address'=>'required',
            'purchase_date'=>'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try {
            if ($request->hasFile('attachment')) {
                $imageName = time().'.'.$request->attachment->extension();      
                $request->attachment->move(public_path('images/purchase_order'), $imageName);
                $original_name=$request->attachment->getClientOriginalName();
                $requestData = $request->all();
                $requestData['attachment'] = $imageName;
                $requestData['file_original_name'] = $original_name;
            } else {
                $requestData = $request->all();
            }
            if($request->id == ''){
                $order_ref=$this->create_purchase_order_ref();
                $requestData['purchase_order_ref'] = $order_ref;
            }
            $requestData['home_id'] = $home_id;
            $requestData['user_id'] = $user_id;
            
            // echo "<pre>";print_r($requestData);die;
            $purchaseOrder=PurchaseOrder::savePurchaseOrder($requestData);
            if($request->id == ''){
                return response()->json(['success' => true,'message'=>'The Purchase Order has been saved succesfully.', 'data' => $purchaseOrder]);
            }else{
                return response()->json(['success' => true,'message'=>'The Purchase Order has been updated succesfully.', 'data' => $purchaseOrder]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    private function create_purchase_order_ref(){
        $order_count=PurchaseOrder::count();
        if($order_count == 0 || $order_count <10){
           return $order_ref='PO-00'.$order_count+1;
        }else if($order_count >=10 && $order_count<100){
           return $order_ref='PO-0'.$order_count+1;
        }else{
            return $order_ref='PO-'.$order_count+1;
        }
    }
}
