<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session,DB;
use App\Models\Job;
use App\Models\Product;
use App\Models\Project;
use App\Models\Country;
use App\Models\Job_type;
use App\Models\Work_flow;
use App\Models\Job_recurring;
use App\Models\Product_category;
use App\Models\Construction_tax_rate;
use App\Models\Workflow_notification;
use App\Models\Construction_account_code;
use App\Models\Construction_product_supplier_list;

class JobsController extends Controller
{
    public function jobs_list(Request $request){
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $jobs_query=DB::table('jobs as job')
            ->select('job.*','service.id as service_id','service.home_id','service.name','service.user_name','service.phone_no','service.section','service.email','type.id as job_type_id','type.name as type_name','type.default_days')
            ->join('service_user as service','job.customer_id','service.id')
            ->join('job_types as type','job.job_type','type.id')
            ->where('job.status','!=',2);

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
                $jobs_query = $jobs_query->where('type.name','like','%'.$search.'%');
            }
            $jobs = $jobs_query->paginate($limit);
        }
        $data['jobs']=$jobs;
        $data['limit']=$limit;
        $data['search']=$search;
        $data['page']='jobs_list';
        return view('backEnd.jobs_management.list',$data);
    }
    public function job_status_change(Request $request){
        $id=base64_decode($request->id);
        $status=$request->status;
        $table=Job::find($id);
        $table->status=$status;
        $table->save();
        Session::flash('success','Status Change Successfully Done');
        echo "done";
    }
    public function job_delete(Request $request){
        $id=base64_decode($request->id);
        $table=Job::find($id);
        $table->status=2;
        $table->save();
        Session::flash('success','Job Deleted Successfully Done');
        echo "done";
    }
    public function job_add(Request $request){
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['task']=$task;
        $data['page']='jobs_list';
        $data['del_status']=0;
        $data['projects']=Project::where('status',1)->get();
        $data['product_details1']=DB::table('products as pr')->select('pr.*','cat.id as cat_id','cat.name')->join('product_categories as cat','cat.id','=','pr.cat_id')->get();
        return view('backEnd.jobs_management.job_form',$data);
    }
    public function search_value(Request $request){
        $search_value = $request->search_value;
        $data = Product::where('product_name', 'like', "%{$search_value}%")->get();  
        foreach($data as $val){
            $cat_name=Product_category::find($val->cat_id);
            echo '<tr onclick="selectProduct(this)">
                            <td>'.$val->id.'</td>
                            <td>'.$cat_name->name.'</td>
                            <td>'.$val->product_name.'</td>
                            <td>'.$val->description.'</td>
                        </tr>';
        }
    }
    public function job_save_data(Request $request){
        echo "<pre>";print_r($request->all());die;
        $customer_id=$request->customer_id;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        $project_id=$request->project_id;
        $contact_id=$request->contact_id;
        $name=$request->name;
        $email=$request->email;
        $telephone=$request->telephone;
        $mobile=$request->mobile;
        $address=$request->address;
        $city=$request->city;
        $country=$request->country;
        $pincode=$request->pincode;
        $site_id=$request->site_id;
        $region=$request->region;
        $company_id=$request->company_id;
        $conatact_name=$request->conatact_name;
        $site_email=$request->site_email;
        $site_telephone=$request->site_telephone;
        $site_mobile=$request->site_mobile;
        $site_address=$request->site_address;
        $site_city=$request->site_city;
        $site_country=$request->site_country;
        $site_pincode=$request->site_pincode;
        $notes=$request->notes;
        $cust_ref=$request->cust_ref;
        $cust_job_ref=$request->cust_job_ref;
        $order_ref=$request->order_ref;
        $job_type=$request->job_type;
        $priority=$request->priority;
        $alert_cust=$request->alert_cust;
        $sms=$request->sms;
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        $tags=$request->tags;
        $description=$request->description;

    }
    public function jobs_type_list(Request $request){
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query=Job_type::whereNot('status',2);

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
            $jobs_type = $query->paginate($limit);
        }
        $data['jobs_type']=$jobs_type;
        $data['limit']=$limit;
        $data['search']=$search;
        $data['page']='jobs_type_list';
        return view('backEnd.jobs_management.job_type_list',$data);
    }
    public function job_type_status_change(Request $request){
        $id=base64_decode($request->id);
        $status=$request->status;
        $table=Job_type::find($id);
        $table->status=$status;
        $table->save();
        Session::flash('success','Status Change Successfully Done');
        echo "done";
    }
    public function job_type_delete(Request $request){
        $id=base64_decode($request->id);
        $table=Job_type::find($id);
        $table->status=2;
        $table->save();
        Session::flash('success','Deleted Successfully Done');
        echo "done";
    }
    public function job_type_add(Request $request){
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['job_type']=Job_type::find($key);
        $data['task']=$task;
        $data['page']='jobs_type_list';
        $data['del_status']=0;
        return view('backEnd.jobs_management.job_type_form',$data);
    }
    public function job_type_save_data(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        $name=$request->name;
        $days=$request->days;
        if($request->visible == ''){
            $visible=0;
        }else {
            $visible=1;
        }
        $appointment=$request->appointment;
        if($request->id == ''){
            $table=new Job_type;
            $table->home_id=$home_id;
            $table->name=$name;
            $table->default_days=$days;
            $table->customer_visible=$visible;
            $table->appointment_id=$appointment;
            $table->save();
            Session::flash('success','Added Successfully Done');
            return redirect('admin/jobs_type_list');
        }else {
            $table=Job_type::find($request->id);
            $table->home_id=$home_id;
            $table->name=$name;
            $table->default_days=$days;
            $table->customer_visible=$visible;
            $table->appointment_id=$appointment;
            $table->save();
            Session::flash('success','Updated Successfully Done');
            return redirect('admin/jobs_type_list');
        }
        
    }
    public function work_flow_list(Request $request){
        // echo 1;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query=Work_flow::whereNot('status',2);

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
                $query = $query->where('flow_name','like','%'.$search.'%');
            }
            $flow = $query->paginate($limit);
        }
        $data['flow']=$flow;
        $data['limit']=$limit;
        $data['search']=$search;
        $data['page']='work_flow_list';
        return view('backEnd.jobs_management.work_flow_list',$data);
    }
    public function wrok_flow_status_change(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $id=base64_decode($request->id);
        $status=$request->status;
        $table=Work_flow::find($id);
        $table->status=$status;
        $table->save();
        Session::flash('success','Status Change Successfully Done');
        echo "done";
    }
    public function wrok_flow_delete(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $id=base64_decode($request->id);
        $table=Work_flow::find($id);
        $table->status=2;
        $table->save();
        Session::flash('success','Deleted Change Successfully Done');
        echo "done";
    }
    public function work_flow_add(Request $request){
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['flow']=Work_flow::find($key);
        $data['task']=$task;
        $data['page']='work_flow_list';
        $data['del_status']=0;
        return view('backEnd.jobs_management.work_flow_form',$data);
    }
    public function workflow_save_data(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        $job_type_id=$request->job_type_id;
        $appointment_id=$request->appointment_id;
        // echo "<pre>";print_r($appointment_id);die;
        $row_count=$request->row_count;
        // $name=$request->name;
        // if($request->id == ''){
        //     $table=new Work_flow;
        //     $table->flow_name=$namw;
        //     $table->save();
        //     Session::flash('success','Added Change Successfully Done');
        //     return redirect('admin/work_flow_list');
        // }else {
        //     $table=Work_flow::find($request->id);
        //     $table->flow_name=$namw;
        //     $table->save();
        //     Session::flash('success','Updated Change Successfully Done');
        //     return redirect('admin/work_flow_list');
        // }
        for($i=0;$i<count($appointment_id);$i++){
            $table=new Work_flow;
            $table->home_id=$home_id;
            $table->job_type_id=$job_type_id;
            $table->appointment_id=$appointment_id[$i];
            $table->save();
            
        }
        Session::flash('success','Added Successfully Done');
        return redirect('admin/jobs_type_list');
    }
    // Workflow_notification
    public function Workflow_notification_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $job_type_id_noti=$request->job_type_id_noti;
        $row_id_noti=$request->row_id_noti;
        $emailsend=$request->emailsend;
        $om_complete=$request->om_complete;
        $om_change=$request->om_change;
        $sms=$request->sms;
        $om_complete_noti=$request->om_complete_noti;
        $who_noti=$request->who_noti[0];
        // echo "<pre>";print_r(count($who_noti));die;
        $count=0;
        for($i=0;$i < count($who_noti);$i++){
            $table=new Workflow_notification;
            $table->job_type_id=$job_type_id_noti;
            $table->row_id=$row_id_noti;
            $table->notify_when_on_complete=$om_complete;
            $table->notify_when_on_change=$om_change;
            $table->notify_who=$who_noti[$i];
            $table->notify_customer_on_complete=$om_complete_noti;
            $table->sendas=$emailsend;
            $table->sms=$sms;
            $table->save();
            $count++;
        }
        // echo $count;
        if($count == count($who_noti)){
            echo "done";
        }else {
            echo "error";
        }
        
    }
    public function product_category(Request $request){
        // echo 1 ;die;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query = Product_category::with('parent', 'children')->where('status', '!=', 2)->orderBy('id', 'ASC');
            $search = '';
    
            if (isset($request->limit)) {
                $limit = $request->limit;
                Session::put('page_record_limit', $limit);
            } else {
                if (Session::has('page_record_limit')) {
                    $limit = Session::get('page_record_limit');
                } else {
                    $limit = 20;
                }
            }
    
            if (isset($request->search)) {
                $search = trim($request->search);
                $query = $query->where('name', 'like', '%' . $search . '%');
            }
    
            // $cat = $query->paginate($limit);
            $cat = $query->paginate($limit);
        }
        $data['cat']=$cat;
        // echo "<pre>";print_r($data['cat']);die;
        // $data['category']=Product_category::where('status',1)->get();
        // $product_category=Product_category::all();
        // echo "<pre>";print_r($product_category);die;
        $data['limit']=$limit;
        $data['search']=$search;
        $data['page']='product_category';
        return view('backEnd.jobs_management.product_category_list',$data);
    }
    public function product_cat_status_change(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $id=base64_decode($request->id);
        $status=$request->status;
        $table=Product_category::find($id);
        $table->status=$status;
        $table->save();
        Session::flash('success','Status Change Successfully Done');
        echo "done";
    }
    public function product_cat_delete(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $id=base64_decode($request->id);
        $table=Product_category::find($id);
        $table->status=2;
        $table->save();
        Session::flash('success','Deleted Successfully Done');
        echo "done";
    }
    public function product_category_add(Request $request){
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['cat']=Product_category::find($key);
        $data['category']=Product_category::with('parent', 'children')->where('status',1)->get();
        $data['task']=$task;
        $data['page']='product_category';
        $data['del_status']=0;
        return view('backEnd.jobs_management.product_category_form',$data);
    }
    public function product_cat_save_data(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($request->id == ''){
            $table=new Product_category;
            $table->home_id=$home_id;
            $table->name=$request->name;
            $table->cat_id=$request->catetgory_id;
            $table->save();
            Session::flash('success','Added Successfully Done');
            echo "done";
        }else {
            $table=Product_category::find($request->id);
            $table->home_id=$home_id;
            $table->name=$request->name;
            $table->save();
            Session::flash('success','Updated Successfully Done');
            echo "done";
        }
    }
    public function product_list(Request $request){
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query=Product::whereNot('status',2);

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
                $query = $query->where('product_name','like','%'.$search.'%');
            }
            $product = $query->paginate($limit);
        }
        $data['product']=$product;
        $data['limit']=$limit;
        $data['search']=$search;
        $data['page']='product_list';
        return view('backEnd.jobs_management.product_list',$data);
    }
    public function product_status_change(Request $request){
        $id=base64_decode($request->id);
        $status=$request->status;
        $table=Product::find($id);
        $table->status=$status;
        $table->save();
        Session::flash('success','Status Change Successfully Done');
        echo "done";
    }
    public function product_delete(Request $request){
        $id=base64_decode($request->id);
        $table=Product::find($id);
        $table->status=2;
        $table->save();
        Session::flash('success','Deleted Successfully Done');
        echo "done";  
    }
    public function account_codes(Request $request){
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query=Construction_account_code::whereNot('status',2);

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
            $acc_code = $query->paginate($limit);
        }
        $data['acc_code']=$acc_code;
        $data['limit']=$limit;
        $data['search']=$search;
        $data['page']='account_codes';
        return view('backEnd.jobs_management.account_list',$data);
    }
    public function account_code_add(Request $request){
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['account']=Construction_account_code::find($key);
        $data['task']=$task;
        $data['page']='account_codes';
        $data['del_status']=0;
        return view('backEnd.jobs_management.account_form',$data);
    }
    public function account_save_data(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        $name=$request->name;
        $code=$request->code;
        if($request->id == ''){
            $table=new Construction_account_code;
            $table->home_id=$home_id;
            $table->name=$name;
            $table->departmental_code=$code;
            $table->save();
            Session::flash('success','Added Successfully Done');
            echo "done";
        }else {
            $table=Construction_account_code::find($request->id);
            $table->home_id=$home_id;
            $table->name=$name;
            $table->departmental_code=$code;
            $table->save();
            Session::flash('success','Updated Successfully Done');
            echo "done";
        }
    }
    public function account_status_change(Request $request){
        $id=base64_decode($request->id);
        $status=$request->status;
        $table=Construction_account_code::find($id);
        $table->status=$status;
        $table->save();
        Session::flash('success','Status Change Successfully Done');
        echo "done";
    }
    public function account_delete(Request $request){
        $id=base64_decode($request->id);
        $table=Construction_account_code::find($id);
        $table->status=2;
        $table->save();
        Session::flash('success','Deleted Successfully Done');
        echo "done";
    }
    public function tax_rate(Request $request){
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query=Construction_tax_rate::whereNot('status',2);

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
            $tax = $query->paginate($limit);
        }
        $data['tax']=$tax;
        $data['limit']=$limit;
        $data['search']=$search;
        $data['page']='tax_rate';
        return view('backEnd.jobs_management.tax_list',$data);
    }
    public function tax_add(Request $request){
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['tax']=Construction_tax_rate::find($key);
        $data['task']=$task;
        $data['page']='tax_rate';
        $data['del_status']=0;
        return view('backEnd.jobs_management.tax_form',$data);
    }
    public function tax_save_data(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($request->id == '')
        {
            $table=new Construction_tax_rate;
            $table->home_id=$home_id;
            $table->name=$request->name;
            $table->tax_rate=$request->tax_rate;
            $table->tax_code=$request->tax_code;
            $table->exp_date=$request->exp_date;
            $table->save();
            Session::flash('success','Addedd Successfully Done');
            echo "done";
        }else {
            $table=Construction_tax_rate::find($request->id);
            $table->home_id=$home_id;
            $table->name=$request->name;
            $table->tax_rate=$request->tax_rate;
            $table->tax_code=$request->tax_code;
            $table->exp_date=$request->exp_date;
            $table->save();
            Session::flash('success','Updated Successfully Done');
            echo "done";
        }
    }
    public function tax_status_change(Request $request){
        $id=base64_decode($request->id);
        $status=$request->status;
        $table=Construction_tax_rate::find($id);
        $table->status=$status;
        $table->save();
        Session::flash('success','Status Change Successfully Done');
        echo "done";
    }
    public function tax_delete(Request $request){
        $id=base64_decode($request->id);
        $table=Construction_tax_rate::find($id);
        $table->status=2;
        $table->save();
        Session::flash('success','Deleted Successfully Done');
        echo "done";
    }
    public function product_add(Request $request){
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['product']=Product::find($key);
        // $data['product_category']=Product_category::where('status',1)->get();
        $data['product_category']=Product_category::with('parent', 'children')->where('status',1)->get();
        // echo "<pre>";print_r($data['product_category']);die;
        $data['tax']=Construction_tax_rate::where('status',1)->get();
        $data['acc_code']=Construction_account_code::where('status',1)->get();
        $data['supplier']=Construction_product_supplier_list::where('product_id',$key)->get();
        // echo "<pre>";print_r($data['supplier']);die;
        $data['task']=$task;
        $data['page']='product_list';
        $data['del_status']=0;
        $data['product_count']=Product::count();
        $data['data']=['Ram','Deena','Harsh'];
        // echo "<pre>";print_r($data['product_count']);die;
        return view('backEnd.jobs_management.product_form',$data);
    }
    public function product_save_data(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        $supplier_id=$request->supplier_id;
        $part_number=$request->part_number;
        $cost_price_supplier=$request->cost_price_supplierl;
        if ($request->hasFile('attachment')) {
            $imageName = time().'.'.$request->attachment->extension();      
            $request->attachment->move(public_path('images/jobs'), $imageName);
        } else {
            $imageName=$request->old_image; 
        }
        if($request->id == ''){
            $table= new Product;
            $table->home_id=$home_id;
            $table->adder_id=$request->Customer_id;
            $table->cat_id=$request->product_category;
            $table->product_name=$request->name;
            $table->cost_price=$request->cost_price;
            $table->margin=$request->markup;
            $table->price=$request->price;
            $table->tax_rate=$request->tax_rate;
            $table->description=$request->description;
            $table->product_code=$request->product_code;
            $table->show_temp=$request->show_temp;
            $table->bar_code=$request->bar_code;
            $table->tax_id=$request->tax_id;
            $table->nominal_code=$request->nominal_code;
            $table->sales_acc_code=$request->sales_acc_code;
            $table->purchase_acc_code=$request->purchase_acc_code;
            $table->expense_acc_code=$request->expense_acc_code;
            $table->location=$request->location;
            $table->attachment=$imageName;
            $table->save();
            for($i=0;$i<count($supplier_id);$i++){
                $productsupplier_table=new Construction_product_supplier_list;
                $productsupplier_table->product_id=$table->id;
                $productsupplier_table->supplier_id=$supplier_id[$i];
                $productsupplier_table->part_number=$request->part_number[$i];
                $productsupplier_table->cost_price_supplier=$request->cost_price_supplier[$i];
                $productsupplier_table->save();
            }
            Session::flash('success','Added Successfully Done');
            echo "done";
        }else {
            // echo "<pre>";print_r($request->all());die;
            $table=Product::find($request->id);
            $table->home_id=$home_id;
            $table->adder_id=$request->Customer_id;
            $table->cat_id=$request->product_category;
            $table->product_name=$request->name;
            $table->cost_price=$request->cost_price;
            $table->margin=$request->markup;
            $table->price=$request->price;
            $table->tax_rate=$request->tax_rate;
            $table->description=$request->description;
            $table->product_code=$request->product_code;
            $table->show_temp=$request->show_temp;
            $table->bar_code=$request->bar_code;
            $table->tax_id=$request->tax_id;
            $table->nominal_code=$request->nominal_code;
            $table->sales_acc_code=$request->sales_acc_code;
            $table->purchase_acc_code=$request->purchase_acc_code;
            $table->expense_acc_code=$request->expense_acc_code;
            $table->location=$request->location;
            $table->attachment=$imageName;
            $table->save();
            for($i=0;$i<count($supplier_id);$i++){
                $productsupplier_table=new Construction_product_supplier_list;
                $productsupplier_table->product_id=$request->id;
                $productsupplier_table->supplier_id=$supplier_id[$i];
                $productsupplier_table->part_number=$request->part_number[$i];
                $productsupplier_table->cost_price_supplier=$request->cost_price_supplier[$i];
                $productsupplier_table->save();
            }
            Session::flash('success','Updated Successfully Done');
            echo "done";
        }
    }
    public function supplier_result(Request $request){
        $data=['Ram','Deena','Harsh'];
        $res= '<tr>
                <td>
                    <select id="supplier_id" name="supplier_id[]" class="form-control">
                        <option selected disabled>Select Supplier</option>';
                    $inc=1;
                    for($i=0;$i<count($data);$i++){
                       $res.='<option value="'.$inc.'">'.$data[$i].'</option>'; 
                       $inc++;
                    }
                   $res.='</select>
                </td>
                <td><input type="text" id="part_number" name="part_number[]"></td>
                <td><span class="currency">£</span><input type="text" id="cost_price_supplier" name="cost_price_supplier[]"></td>
                <td class="delete_row">X</td>
            </tr>';
        echo $res;
    }
    public function customer_list(Request $request){
        echo 1;die;
    }
    public function project_list(Request $request){
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query=Project::whereNot('status',2)->orderBy('id','DESC');

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
                $query = $query->where('project_name','like','%'.$search.'%');
            }
            $project = $query->paginate($limit);
        }
        $data['project']=$project;
        $data['limit']=$limit;
        $data['search']=$search;
        $data['page']='project_list';
        return view('backEnd.jobs_management.project_list',$data);
    }
    public function project_add(Request $request){
        $key=base64_decode($request->key);
        if($key){
            $task='Edit';
        }else{
            $task='Add';
        }
        $data['project']=Project::find($key);
        $data['project_count']=Project::count();
        $data['task']=$task;
        $data['page']='project_list';
        $data['del_status']=0;
        return view('backEnd.jobs_management.project_form',$data);
    }
    public function project_save_data(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($request->id == ''){
            $project_ref="PRO-000";
            if($request->project_count > 9){
                $project_ref="PRO-00";
            }else if($request->project_count > 99){
                $project_ref="PRO-0";
            }else if($request->project_count > 999){
                $project_ref="PRO-";
            }
            $table=new Project;
            $table->home_id=$home_id;
            $table->project_name=$request->name;
            $table->project_ref=$project_ref.$request->project_count;
            $table->customer_name=$request->Customer_id;
            $table->start_date=$request->start_date;
            $table->end_date=$request->end_date;
            $table->project_value=$request->project_value;
            $table->description=$request->description;
            $table->catalogue_id=$request->catalogue_id;
            $table->save();
            Session::flash('success','Added Successfully Done');
            echo "done";
        }else {
            $table=Project::find($request->id);
            $table->home_id=$home_id;
            $table->project_name=$request->name;
            $table->project_ref=$request->project_count;
            $table->customer_name=$request->Customer_id;
            $table->start_date=$request->start_date;
            $table->end_date=$request->end_date;
            $table->project_value=$request->project_value;
            $table->description=$request->description;
            $table->catalogue_id=$request->catalogue_id;
            $table->save();
            Session::flash('success','Updated Successfully Done');
            echo "done";
        }
    }
    public function project_status_change(Request $request){
        $id=base64_decode($request->id);
        $status=$request->status;
        $table=Project::find($id);
        $table->status=$status;
        $table->save();
        Session::flash('success','Status Change Successfully Done');
        echo "done";
    }
    public function project_delete(Request $request){
        $id=base64_decode($request->id);
        $table=Project::find($id);
        $table->status=2;
        $table->save();
        Session::flash('success','Deleted Successfully Done');
        echo "done";
    }
    public function job_recurring_list(Request $request){
        // echo 1;die;
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        if($home_id){
            $query=Job_recurring::whereNot('status',2)->orderBy('id','DESC');

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
                $query = $query->where('project_name','like','%'.$search.'%');
            }
            $recurring = $query->paginate($limit);
        }
        $data['recurring']=$recurring;
        $data['limit']=$limit;
        $data['search']=$search;
        $data['page']='project_list';
        return view('backEnd.jobs_management.recurring_job_list',$data);
    }
}
