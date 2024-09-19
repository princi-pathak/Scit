<?php

namespace App\Http\Controllers\jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\ServiceUser;
use App\Models\Job;
use App\Models\Quote;
use App\Models\Product;
use App\Models\Project;
use App\Models\Country;
use App\Models\Job_type;
use App\Models\Work_flow;
use App\Models\QuoteType;
use App\Models\Job_title;
use App\Models\Job_recurring;
use App\Models\Customer_type;
use App\Models\Product_category;
use App\Models\Constructor_region;
use App\Models\Quote_product_detail;
use App\Models\Workflow_notification;
use App\Models\Recurrence_pattern_rule;
use App\Models\Recurring_product_detail;
use App\Models\Constructor_customer_site;
use App\Models\Construction_job_appointment;
use App\Models\Construction_jobassign_product;
use App\Models\Constructor_additional_contact;
use App\Models\Construction_job_appointment_type;
use App\Models\construction_appointment_rejection_category;
use DB,Auth,Session,Validator;

class JobController extends Controller
{
    public function index(){
        $data['header_title']="Active Jobs";
        $data['job_type']=Job_type::where('status',1)->get();
        $data['ServiceUser']=ServiceUser::where('status',1)->get();
        $data['job']=Job::where('status',1)->get();
        $data['work_flow']=Work_flow::where('status',1)->get();
        $data['category']=Product_category::where('status',1)->get();
        $data['all_product']=Product::where('status',1)->get();
        $data['quote']=Quote::where('status',1)->get();
        $data['project']=Project::where('status',1)->get();
        $data['product_details1']=DB::table('products as pr')->select('pr.*','cat.id as cat_id','cat.name')->join('product_categories as cat','cat.id','=','pr.cat_id')->get();
        $data['job_recurring']=Job_recurring::where('status',1)->get();
        $data['quote_type']=QuoteType::where('status',1)->get();
        // echo "<pre>";print_r($data['product_details']);die;
        // for listing
        $data['job_type_list']=Job_type::whereNot('status',2)->get();
        $data['work_flow_list']=Work_flow::whereNot('status',2)->get();
        $data['category_list']=Product_category::whereNot('status',2)->get();
        $data['product_list']=Product::whereNot('status',2)->get();
        $data['quote_list']=Quote::whereNot('status',2)->get();
        $data['project_list']=Project::whereNot('status',2)->get();
        $data['job_recurring_list']=Job_recurring::whereNot('status',2)->get();
        $data['job_list']=Job::whereNot('status',2)->get();
        $data['quote_type_list']=QuoteType::whereNot('status',2)->get();
        $data['page']="job_index";
        return view('frontEnd.jobs.index',$data);
    }
    public function job_list(){
        $data['job']=Job::where('status',1)->get();
        $data['access_rights']=$this->access_rights();
        // echo "<pre>";print_r($data['access_rights']);die;
        return view('frontEnd.jobs.job',$data);
    }
    public function job_type(Request $request){
        $home_id = Auth::user()->home_id;
        $data['job_type']=Job_type::whereNot('status',2)->get();
        $data['access_rights']=$this->access_rights();
        $data['appointment_type']=Construction_job_appointment_type::where('home_id',$home_id)->get();
        $data['home_id']=$home_id;
        $data['customers']=Customer::get_customer_list_Attribute($home_id,'ACTIVE');

        // echo "<pre>";print_r($data['workflow']);die;
        return view('frontEnd.jobs.job_type',$data);
    }
    
    public function job_type_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id = Auth::user()->home_id;
       $data= Job_type::job_type_save_data($request->all());
       if($data){
        if(isset($request->key) && $request->key != ''){
            $result=Job_type::find($data);
            $html='<option value="'.$result->id.'">'.$result->name.'</option>';
            return $html;
        }else{
            $all_data=Job_type::where(['home_id'=>$home_id,'status'=>1])->get();
            $html = '';
            foreach($all_data as $key=>$val){
                $html.='<tr>
                            <td></td>
                            <td>'.++$key.'</td>
                            <td>'.$val->name.'</td>
                        <td>' . (($val->status == 1) ? "Yes" : "No") . '</td>
                            <td>'.$val->default_days.'</td>
                            <td><span class="grayCheck"><i class="fa-solid fa-circle-check"></i></span></td>
                            <td>-</td>
                            <td><span class="grencheck"><i class="fa-solid fa-circle-check"></i></span></td>
                            <td> <div class="d-inline-flex align-items-center ">
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown">
                                            Action
                                        </a>
                                        <div class="dropdown-menu fade-up m-0">
                                            <a href="javascript:void(0)" onclick="get_model_with_id('.$val->id.')" class="dropdown-item">Edit Details</a>
                                            <hr class="dropdown-divider">
                                            <a href="#!" class="dropdown-item">Manage Workflow</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>';

            }
            return response()->json(['success'=>'true','message' => "Successfully  Done",'html_result'=>$html], 200);
        }
       } else {
        return response()->json(['success'=>'true','message' => "Successfully  Done",'data'=>$html], 200);
       }
    }
    public function job_type_edit_form(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $data=Job_type::find($request->id);
        return response()->json($data);
    }
    public function workflow_save_data(Request $request){
        // echo "<pre>";print_r($request->all());
        $ex=explode(',',$request->delete_ids_array);
        // print_r(count($ex));die;
        if($request->delete_ids_array !='' && count($ex) > 0 && count($request->appointment_id) > 0){
            echo 111;die;
        } else if(count($ex) > 0) {
            echo 222;die;
        } else {
            echo 333;die;
        }
        $data=Work_flow::work_flow_save($request->all());
        return $data;

    }
    public function workflow_list_job(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id = Auth::user()->home_id;
        $data=Work_flow::where(['home_id'=>$home_id, 'job_type_id'=>$request->id,'status'=>1])->get();
        // echo "<pre>";print_r($data);die;
        
        $appointment_type=Construction_job_appointment_type::where('home_id',$home_id)->get();
        $html='';
        foreach($data as $val){
            $html .='<tr>
                <input type="hidden" value="'.$val->id.'" name="row_count" id="row_count">
                
                <td></td>
                <td>
                    <select class="form-select" name="appointment_id[]" multiselect-search="false" multiselect-select-all="true" multiselect-max-items="4" multiple="multiple">';
                    foreach($appointment_type as $type){
                        if($type->id == $val->appointment_id){
                            $selected='selected';
                        }else {
                            $selected='';
                        }
                        $html .='<option value="'.$type->id.'" '.$selected.'>'.$type->name.'</option>';
                    }
                    $html .='</select>
                </td>
                <td>
                    <a href="javascript:void(0)" class="text-primary" onclick="set_rules('.$request->id.','.$val->id.')">Set Rule</a>
                </td>
                <td>
                    <a href="javascript:void(0)" class="text-danger delete-row">X</a>
                </td>
                </tr>';
        }
        return response()->json($html);
    }
    public function workflow_list_add(Request $request){
        $home_id = Auth::user()->home_id;
        $data=Work_flow::where(['home_id'=>$home_id, 'job_type_id'=>$request->job_type_id,'status'=>1])->count();
        
        $appointment_type=Construction_job_appointment_type::where('home_id',$home_id)->get();
        if($data == 0){
            $row_count=1;
        }else {
            $row_count=$data+1;
        }
        $html='';
            $html .='<tr>
                <input type="hidden" value="'.$row_count.'" name="row_count">
                <td></td>
                <td>
                    <select class="form-select" name="appointment_id[]" multiselect-search="false" multiselect-select-all="true" multiselect-max-items="4" multiple="multiple">';
                    foreach($appointment_type as $type){
                       
                        $html .='<option value="'.$type->id.'">'.$type->name.'</option>';
                    }
                    $html .='</select>
                </td>
                <td>
                    <a href="javascript:" class="text-primary" onclick="set_rules('.$request->id.','.$row_count.')">Set Rule</a>
                </td>
                <td>
                    <a href="javascript:" class="text-danger delete-row">X</a>
                </td>
                </tr>';
                return response()->json($html);
    }
    public function Workflow_notification_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $data=Workflow_notification::work_flow_notification_save($request->all());
        return $data;
    }
    
    public function planner_day(){
        echo "<h1 style='color:red'>It's under working</h1>";die;
    }
    private function access_rights(){
        $rights = User::where('id', Auth::user()->id)->where('is_deleted', 0)->first()->access_rights;
        $access_rights=explode(',',$rights);
        return $access_rights;

    }
    public function jobs_create(Request $request){
        // echo 1;die;
        // echo "<pre>";print_r(Auth::user());die;
        if($request->key == '') {
            $task="Added";
        }else {
            $task="Eddited";
        }
        $key=$request->key;
        $data['task']=$task;
        $data['page']='jobs_list';
        $data['del_status']=0;
        $data['projects']=Project::where('status',1)->get();
        $data['last_job_id']=Job::orderBy('id','DESC')->first();
        $data['job_details']=Job::find($key);
        $data['jobassign_products']=Construction_jobassign_product::where(['job_id'=>$key,'status'=>1])->get();
        $data['job_type']=Job_type::where('status',1)->get();
        $data['country']=Country::all_country_list();
        // echo "<pre>";print_r($data['country']);die;
        $home_id = Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $data['product_details1']=DB::table('products as pr')->select('pr.*','cat.id as cat_id','cat.name')
        ->join('product_categories as cat','cat.id','=','pr.cat_id')
        ->where(['pr.home_id'=>$home_id,'pr.adder_id'=>$user_id])->get();
        $data['customers']=Customer::get_customer_list_Attribute($home_id,'ACTIVE');
        $data['home_id']=$home_id;
        $data['users']=User::where('is_deleted',0)->get();
        $data['appointment_type']=Construction_job_appointment_type::where('home_id',$home_id)->get();
        $data['customer_types']=Customer_type::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['job_title']=Job_title::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['region']=Constructor_region::where(['home_id'=>$home_id,'status'=>1])->get();
        // $data['site']=Constructor_customer_site::where('customer_id',$user_id)->get();
        // echo "<pre>";print_r($data['site']);die;
        return view('frontEnd.jobs.add_job',$data);
    }
    public function job_add_edit_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        if ($request->hasFile('attachments')) {
            $imageName = time().'.'.$request->attachments->extension();      
            $request->attachments->move(public_path('images/jobs'), $imageName);

            $data=[
                'id'=>$request->id,
                'last_job_id'=>$request->last_job_id,
                'attachments'=>$imageName,
            ];
            $job_id=Job::job_save($data);
        } else {
            $job_id=Job::job_save($request->all());
        }
        
        return response()->json($job_id);

    }
    public function get_customer_details_front(Request $request){
        $customer_id=$request->customer_id;
        $customers = Customer::with('sites','additional_contact','customer_project','customer_profession')->where('id', $customer_id)->get();
        // echo "<pre>";print_r($customers);die;
        return response()->json($customers);
    }
    public function search_value_front(Request $request){
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
    public function result_product_calculation(Request $request){
        $home_id = Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $product_details=Product::product_detail($request->id);
        $tax=Product::tax_detail($home_id);
        echo '
                <td>'.$product_details->product_code.'</td>
                <td>'.$product_details->product_name.'</td>
                <td>'.$product_details->description.'</td>
                <td><input type="text" class="" value="'.$product_details->qty.'" name="quantity[]" id="quantity"></td>
                <td>'.$product_details->cost_price.'</td>
                <td>'.$product_details->price.'</td>
                <td><input type="text" class="" value="0" name="discount[]"></td>';

        echo '<td>';
        foreach($tax as $taxv){
        echo '<select id="" name="">
                    <option value="'.$taxv->id.'">'.$taxv->name.'</option>  
               </select>';
        }
        echo '</td>
                <td id="pre_total_amount">'.$product_details->price.'<input type="hidden" name="final_amount" id="final_amount" value="'.$product_details->price.'"></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow('.$product_details->id.')">Delete<input type="hidden" value="'.$product_details->id.'" name="product_detail_id[]" id="product_detail_id"></button></td>
            ';
    }
    public function save_job_product(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $quantity=$request->quantity;
        for($i=0;$i<count($quantity);$i++){
            $table=new Construction_jobassign_product;
            $table->job_id=$request->id;
            $table->product_id=$request->product_detail_id[$i];
            $table->qty=$request->quantity[$i];
            $table->save();
        }
        
        $job_table=Job::find($request->id);
        $job_table->pay_amount=$request->final_amount;
        $job_table->save();
        echo "done";
    }
    public function get_save_appointment(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $data=[
            'user_id'=>$request->user_id,
            'home_id'=>$request->home_id,
            'job_id'=>$request->last_job_id,
            'appointment_type_id'=>$request->appointment_type_id,
            'start_date'=>$request->appointment_start_date,
            'start_time'=>$request->start_time,
            'end_date'=>$request->end_date,
            'end_time'=>$request->end_time,
            'appointment_checkbox'=>$request->appointment_checkbox,
            'appointment_status'=>$request->appointment_status,
            'appointment_time'=>$request->appointment_time,
            'priority'=>$request->priority,
            'alert_by'=>$request->alert_by,
            'notes'=>$request->appointment_notes
        ];
        // echo "<pre>";print_r($data);die;
        $result= Construction_job_appointment::save_appointement($data);
        return response()->json($result);
        
    }
    public function new_appointment_add_section(Request $request){
        $home_id = Auth::user()->home_id;
        $count_number = $request->count_number + 1;
        $users = User::where('is_deleted', 0)->get();
        $appointment_type = Construction_job_appointment_type::where('home_id', $home_id)->get();
    
        $html = '<tr>
                    <td>
                        <div class="d-flex">
                            <p class="leftNum">'.$count_number.'</p>
                            <select class="form-control editInput selectOptions" id="user_id" name="user_id[]">
                                <option selected disabled>Select user</option>';
                                foreach($users as $user){
                                    $html .= '<option value="'.$user->id.'">'.$user->name.'</option>';
                                }
        $html .=         '</select>
                            <a href="#!" class="callIcon"><i class="fa-solid fa-square-phone"></i></a>
                        </div>
                        <div class="alertBy">
                            <label><strong>Alert By:</strong></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="alert_by_check_1" value="0">
                                <label class="form-check-label" for="inlineCheckbox1">SMS</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="alert_by_check_2" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Email</label>
                            </div>
                            <input type="hidden" name="alert_by[]" id="alert_by" class="alert_by">
                        </div>
                    </td>
                    <td class="col-2">
                        <div class="appoinment_type">
                            <select class="form-control editInput selectOptions" id="appointment_type_id" name="appointment_type_id[]">
                                <option selected disabled>Select Appointment Type</option>';
                                foreach($appointment_type as $appointmentv){
                                    $html .= '<option value="'.$appointmentv->id.'">'.$appointmentv->name.'</option>';
                                }
        $html .=         '</select>
                        </div>
                        <div class="Priority">
                            <label>Priority :</label>
                            <select class="form-control editInput selectOptions" id="priority" name="priority[]">
                                <option selected disabled>Select Priority</option>
                                <option>Default</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="addDateAndTime">
                            <div class="startDate">
                                <input type="date" name="appointment_start_date[]" class="editInput">
                                <input type="time" name="start_time[]" class="editInput">
                            </div>
                            <span class="p-2">To</span>
                            <div class="endDate">
                                <input type="date" name="end_date[]" class="editInput">
                                <input type="time" name="end_time[]" class="editInput">
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="appointment_checkbox1" value="option1">
                                <label class="form-check-label" for="singleAppointment">Single Appointment</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="appointment_checkbox2" value="option2">
                                <label class="form-check-label" for="floatingAppointment">Floating Appointment</label>
                            </div>
                            <input type="hidden" name="appointment_checkbox[]" id="appointment_checkbox" class="appointment_checkbox">
                        </div>
                    </td>
                    <td>
                        <div class="addTextarea">
                            <textarea cols="40" rows="5" id="appointment_notes" name="appointment_notes[]"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="statuswating">
                            <select class="form-control editInput selectOptions" id="appointment_status" name="appointment_status[]">
                                <option selected disabled>Select Status</option>
                                <option value="1">Awaiting</option>
                                <option value="2">Received</option>
                                <option value="3">Accepted</option>
                                <option value="4">Declined</option>
                                <option value="5">on Route</option>
                                <option value="6">On Site</option>
                                <option value="7">Completed</option>
                                <option value="8">Follow On</option>
                                <option value="9">Abandoned</option>
                                <option value="10">No Access</option>
                                <option value="11">Cancelled</option>
                                <option value="12">On Hold</option>
                            </select>
                            <a href="javascript:void(0)" onclick="deleteRow(this)"><i class="fa-solid fa-circle-xmark"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="Priority">
                            <label><strong>Travel Time
                                    -</strong></label>
                            <input type="text"
                                class="form-control editInput"
                                id="input_time1"
                                placeholder="" onkeyup="get_time()"><label>
                                Mins</label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div class="Priority">
                            <label><strong>Appointment Time
                                    -</strong></label>
                            <input type="text"
                                class="form-control editInput"
                                id="input_time2"
                                placeholder="" onkeyup="get_time()"><label> Mins
                                <strong>Total Time -</strong><font id="time_show">0h
                                0mins</font> </label>
                        </div>
                        <input type="hidden" id="appointment_time" class="appointment_time" name="appointment_time[]">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="Priority p-0">
                            <label class="p-0"><strong>Assigned
                                    Products: </strong><a
                                    href="#!">All</a> None</label>
                        </div>
                    </td>
                    <td>
                        <div class="pageTitleBtn p-0">
                            <a href="#" class="profileDrop">Asign
                                Product</a>
                        </div>
                    </td>
                    <td></td>
                    <td colspan="2">
                        <div class="pageTitleBtn p-0">
                            <a href="#" class="profileDrop">Add
                                Title</a>
                            <a href="#" class="profileDrop">Show
                                Variations</a>
                            <a href="#"
                                class="profileDrop bg-secondary">Export</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="padingtableBottom"></td>
                </tr>';
        
        return $html;
    }
    public function job_appointment_type_list(Request $request){
        $home_id = Auth::user()->home_id;
        $data['appointment_type']=Construction_job_appointment_type::where('home_id',$home_id)->get();
        // echo "<pre>";print_r($data['appointment_type']);die;
        $data['home_id']=$home_id;
        $data['users']=User::all();
        // echo "<pre>";print_r($data['users']);die;
        return view('frontEnd.jobs.job_appointment_type',$data);
    }
    public function job_type_appointment_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        if(isset($request->notify) && $request->notify == 1){
            $data=[
                'id'=>$request->id,
                'document'=>$request->document,
                'notify'=>$request->notify,
                'on_complete'=>$request->on_complete,
                'on_change'=>$request->on_change,
                'notify_who'=>implode(',',$request->notify_who),
                'notification'=>$request->notification,
                'sms'=>$request->sms,
                'email'=>$request->email,
                'notify_customer'=>$request->notify_customer
            ];
            // echo "<pre>";print_r($data);die;
            echo $result=Construction_job_appointment_type::SaveJobAppointmentType($data);
        }else {
            echo $result=Construction_job_appointment_type::SaveJobAppointmentType($request->all());
        }
        
    }
    public function job_appointment_type_edit_form(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $data=Construction_job_appointment_type::find($request->id);
        return response()->json($data);
    }
    public function appointment_rejection_cat_list(){
        $data['rejection']=construction_appointment_rejection_category::whereNot('status',2)->get();
        $home_id = Auth::user()->home_id;
        $data['home_id']=$home_id;
        // echo "<pre>";print_r($data['rejection']);die;
        return view('frontEnd.jobs.appointment_rejection_cat',$data);
        
    }
    public function appointment_rejection_cat_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        echo construction_appointment_rejection_category::SaveAppointmentRejectionCategory($request->all());
    }
    public function job_appointment_rejection_edit_form(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $data=construction_appointment_rejection_category::find($request->id);
        return response()->json($data);
    }
    public function save_job_title(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $insert='';
        $table=new job_title;
        try {
            $insert=$table::updateOrCreate(
                ['id' => $request->id ?? null],
                $request->all(),
            );
        } catch (\Exception $e) {
            // return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
            $error=$e->getMessage();
        }
        if($insert){
            if($insert->status ==1){
                echo '<option value="'.$insert->id.'">'.$insert->name.'</option>';
            }
        }else{
            echo "error";
        }
    }
    public function save_region(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $insert='';
        $table=new Constructor_region;
        try {
            $insert=$table::updateOrCreate(
                ['id' => $request->id ?? null],
                $request->all(),
            );
        } catch (\Exception $e) {
            // return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
            $error=$e->getMessage();
        }
        if($insert){
            if($insert->status ==1){
                echo '<option value="'.$insert->id.'">'.$insert->name.'</option>';
            }
        }else{
            echo "error";
        }
    }

    public function project_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        
        $insert=Project::saveProject($request->all());
        if($insert){
            if($insert->status ==1){
                echo '<option value="'.$insert->id.'">'.$insert->project_name.'</option>';
            }
        }else{
            echo "error";
        }
    }
    public function contact_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $insert=Constructor_additional_contact::saveCustomerAdditional($request->all());
        $data=Constructor_additional_contact::find($insert);
        if($data){
            if($data->status ==1){
                echo '<option value="'.$data->id.'">'.$data->contact_name.'</option>';
            }
        }else{
            echo "error";
        }
    }
    public function site_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $result=Constructor_customer_site::saveCustomerAdditional($request->all());
        $data=Constructor_customer_site::find($result);
        if($data){
            if($data->status ==1){
                echo '<option value="'.$data->id.'">'.$data->site_name.'</option>';
            }
        }else{
            echo "error";
        }
    }

    public function job_save_all(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $form_id=$request->form_id;
        
        if($form_id == 1){
            if ($request->hasFile('attach')) {
                $imageName = time().'.'.$request->attach->extension();      
                $request->attach->move(public_path('images/jobs'), $imageName);
            } else {
                $imageName=$request->old_image; 
            }
            if($request->job_id == ''){
                $validator=Validator::make($request->all(),
            [
                'customer'=>'required',
                'project' => 'required',
                'contact'=>'required',
                'country'=>'required',
                'customer_ref'=>'required',
                'amount'=>'required',
                'purchase_order'=>'required',
                'job_type'=>'required',
                'priority'=>'required',
                'sms'=>'required',
                'start_date'=>'required',
                'complete_by'=>'required',
                'tags'=>'required',
                'product_id'=>'required',
                'attach'=>'required',

            ]);
            if($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()->first()]);
            }
                $table_job= new Job;
            } else {
                $table_job=Job::find($request->job_id);
            }
            $table_job->customer_id=$request->customer;
            $table_job->project_id=$request->project;
            $table_job->contact=$request->contact;
            $table_job->country=$request->country;
            $table_job->customer_ref=$request->customer_ref;
            $table_job->pay_amount=$request->amount;
            $table_job->purchase_order_ref=$request->purchase_order;
            $table_job->job_type=$request->job_type;
            $table_job->priorty=$request->priority;
            $table_job->alert_customer=$request->alert_customer;
            $table_job->on_route_sms=$request->sms;
            $table_job->start_date=$request->start_date;
            $table_job->complete_by=$request->complete_by;
            $table_job->tags=$request->tags;
            $table_job->product_id=$request->product_id;
            $table_job->attachments=$imageName;
            $table_job->save();
            if($request->job_id == ''){
                $job_ref="#_".$table_job->id;
                $table_update= Job::find($table_job->id);
                $table_update->job_ref=$job_ref;
                $table_update->save();
            }
            echo "done";
        } else if($form_id == 2){
            $name=$request->name;
            $days=$request->days;
            if($request->job_type_id == ''){
            $validator=Validator::make($request->all(),
            [
                'name'=>'required',
                'days' => 'required',
            ]);
            if($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()->first()]);
            }
                $table_job_type= new Job_type;
            } else {
                $table_job_type= Job_type::find($request->job_type_id);
            }
            $table_job_type->name=$name;
            $table_job_type->default_days=$days;
            $table_job_type->save();
            echo "done";

        } else if($form_id == 3){
            $job_type=$request->job_type;
            $work_flow=$request->work_flow;
            if($request->work_flow_id == ''){
            $validator=Validator::make($request->all(),
            [
                'job_type'=>'required',
                'work_flow' => 'required',
            ]);
            if($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()->first()]);
            }
                $table_work_flow=new Work_flow;
            } else {
                $table_work_flow= Work_flow::find($request->work_flow_id);
            }
            // $table_work_flow->job_type_id=$job_type;
            $table_work_flow->flow_name=$work_flow;
            $table_work_flow->save();
            echo "done";

        } else if($form_id == 5){
            $name=$request->name;
            if($request->category_id == ''){
            $validator=Validator::make($request->all(),
            [
                'name'=>'required',
            ]);
            if($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()->first()]);
            }
                $table_category= new Product_category;
            } else {
                $table_category= Product_category::find($request->category_id);
            }
            // echo "<per>";print_r($table_category);die;
            $table_category->name=$name;
            $table_category->save();
            echo "done";
        } else if($form_id == 6){
            $cat_id=$request->cat_id;
            $name=$request->name;
            if($request->product_id == ''){
            $validator=Validator::make($request->all(),
            [
                'cat_id'=>'required',
                'name'=>'required',
            ]);
            if($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()->first()]);
            }
                $table_product = new Product;
            } else {
                $table_product= Product::find($request->product_id);
            }
            $table_product->cat_id=$cat_id;
            $table_product->product_name=$name;
            $table_product->save();
            echo "done";
        } else if($form_id == 7){
            // echo "<pre>";print_r($request->all());die;
            $quote_ref=$request->quote_ref;
            $quote_customer=$request->quote_customer;
            $quote_project=$request->quote_project;
            $quotes_date=$request->quotes_date;
            $quotes_expiry=$request->quotes_expiry;
            $customer_ref_quote=$request->customer_ref_quote;
            $customer_jobref_quote=$request->customer_jobref_quote;
            $purchase_ref_quote=$request->purchase_ref_quote;
            $source=$request->source;
            $status=$request->status;
            $extra_information=$request->extra_information;
            $customer_notes=$request->customer_notes;
            $tearms=$request->tearms;
            $internal_notes=$request->internal_notes;
            
            if ($request->hasFile('attachment3')) {
                $imageName3 = time().'.'.$request->attachment3->extension();      
                $request->attachment3->move(public_path('images/jobs'), $imageName3);
            } else {
                $imageName3=$request->old_image3; 
            }

            $quantity=$request->quantity;
            $product_detail_id=$request->product_detail_id;
            if($request->quotes_id == ''){
            // $validator=Validator::make($request->all(),
            // [
            //     'job_ref_id'=>'required',
            //     'quotes_name'=>'required',
            // ]);
            // if($validator->fails())
            // {
            //     return response()->json(['error'=>$validator->errors()->first()]);
            // }
                $table_quotes= new Quote;
                $table_quotes->quote_ref=$quote_ref;
                $table_quotes->customer_id=$quote_customer;
                $table_quotes->project_id=$quote_project;
                $table_quotes->site_id=1;
                $table_quotes->quota_type=1;
                $table_quotes->quota_date=$quotes_date;
                $table_quotes->expiry_date=$quotes_expiry;
                $table_quotes->customer_ref=$customer_ref_quote;
                $table_quotes->customer_job_ref=$customer_jobref_quote;
                $table_quotes->purchase_order_ref=$purchase_ref_quote;
                $table_quotes->source=$source;
                $table_quotes->performed_job_date=date('Y-m-d');
                $table_quotes->period='';
                $table_quotes->tags='#tag';
                $table_quotes->title='';
                $table_quotes->title_description='';
                $table_quotes->price=100;
                $table_quotes->vat='No Vat';
                $table_quotes->extra_information=$extra_information;
                $table_quotes->customer_notes=$customer_notes;
                $table_quotes->tearms=$tearms;
                $table_quotes->internal_notes=$internal_notes;
                $table_quotes->attachments=$imageName3;
                $table_quotes->status=$status;
                $table_quotes->save();
                for($i=0;$i<count($product_detail_id);$i++){
                    $table_quote_product_detail=new Quote_product_detail;
                    $table_quote_product_detail->quotes_id=$table_quotes->id;
                    $table_quote_product_detail->product_id=$product_detail_id[$i];
                    $table_quote_product_detail->description="testing";
                    $table_quote_product_detail->save();
                }
            } else {
                $table_quotes= Quote::find($request->quotes_id);
                $table_quotes->customer_id=$quote_customer;
                $table_quotes->project_id=$quote_project;
                $table_quotes->site_id=1;
                $table_quotes->quota_type=1;
                $table_quotes->quota_date=$quotes_date;
                $table_quotes->expiry_date=$quotes_expiry;
                $table_quotes->customer_ref=$customer_ref_quote;
                $table_quotes->customer_job_ref=$customer_jobref_quote;
                $table_quotes->purchase_order_ref=$purchase_ref_quote;
                $table_quotes->source=$source;
                $table_quotes->performed_job_date=$table_quotes->performed_job_date;
                $table_quotes->period='';
                $table_quotes->tags='#tag';
                $table_quotes->title='';
                $table_quotes->title_description='';
                $table_quotes->price=100;
                $table_quotes->vat='No Vat';
                $table_quotes->extra_information=$extra_information;
                $table_quotes->customer_notes=$customer_notes;
                $table_quotes->tearms=$tearms;
                $table_quotes->internal_notes=$internal_notes;
                $table_quotes->attachments=$imageName3;
                $table_quotes->status=$status;
                $table_quotes->save();
                for($i=0;$i<count($product_detail_id);$i++){
                    $table_quote_product_detail=Quote_product_detail::find($product_detail_id[$i]);
                    $table_quote_product_detail->quotes_id=$table_quotes->id;
                    $table_quote_product_detail->product_id=$product_detail_id[$i];
                    $table_quote_product_detail->description="testing";
                    $table_quote_product_detail->save();
                }
            }
            
            echo "done";
        } else if($form_id == 8){
            $customer_name=$request->customer_name;
            $project_name=$request->project_name;
            if($request->project_id == ''){
                $count_project=Project::count();
                // echo $count_project;die;
                $ref_pattern="Pro_".$count_project+1;
                $validator=Validator::make($request->all(),
                [
                    'customer_name'=>'required',
                    'project_name' => 'required',
                ]);
                if($validator->fails())
                {
                    return response()->json(['error'=>$validator->errors()->first()]);
                }
                $table_project= new Project;
            } else {
                $ref_pattern=$request->project_ref;
                $table_project= Project::find($request->project_id);
            }
            $table_project->project_name=$project_name;
            $table_project->customer_name=$customer_name;
            $table_project->project_ref=$ref_pattern;
            // echo "<pre>";print_r($table_project);die;
            $table_project->save();
            echo "done";
        } else if($form_id == 9){
            // echo "<pre>";print_r($request->all());die;
            $users=$request->users;
            $site=$request->site;
            $mobile=$request->mobile;
            $sms_number=$request->sms_number;
            $customer_ref=$request->customer_ref;
            $amount=$request->amount;
            $purchase_order=$request->purchase_order;
            $job_types=$request->job_types;
            $priority=$request->priority;
            $alert_customer=$request->alert_customer;
            $sms1=$request->sms1;
            $tags1=$request->tags1;
            $short_des=$request->short_des;
            $instruction=$request->instruction;

            $inc=$request->inc;
            $user_id=$request->user_id;
            $recurringjob_start_date=$request->recurringjob_start_date;
            $count_repetition=$request->count_repetition;
            $job_frequency_name=$request->job_frequency_name;
            $day1=$request->day1;
            $month1=$request->month1;
            $every1=$request->every1;
            $day2=$request->day2;
            $every2=$request->every2;
            $quantity=$request->quantity;
            $create_before=7;
            $end=1;

            $product_detail_id=$request->product_detail_id;

            $job_recurring_id=$request->job_recurring_id;
            if ($request->hasFile('attach1')) {
                $imageName1 = time().'.'.$request->attach1->extension();      
                $request->attach1->move(public_path('images/job_ercurring'), $imageName1);
            } else {
                $imageName1=$request->old_image1; 
            }
            if($job_recurring_id == ''){
                $table_job_recurring= new Job_recurring;
                $table_recurrence_pattern_rule= new Recurrence_pattern_rule;
                $table_recurring_product_detail= new Recurring_product_detail;

                $table_job_recurring->job_type=$job_types;
                $table_job_recurring->customer_id=$users;
                $table_job_recurring->mobile=$mobile;
                $table_job_recurring->site_id=$site;
                $table_job_recurring->mobile_sms=$sms_number;
                $table_job_recurring->sms_alert=$sms1;
                $table_job_recurring->customer_ref=$customer_ref;
                $table_job_recurring->amount=$amount;
                $table_job_recurring->purchase_orderref=$purchase_order;
                $table_job_recurring->priority=$priority;
                $table_job_recurring->customer_alert=$request->alert_customer1;
                $table_job_recurring->tags=$tags1;
                $table_job_recurring->short_des=$short_des;
                $table_job_recurring->instruction=$instruction;
                $table_job_recurring->attachments=$imageName1;
                $table_job_recurring->save();
                // echo "<pre>";print_r($table_job_recurring);die;
    
                for($i=0;$i<count($inc);$i++){
                    $table_recurrence_pattern_rule->job_recurring_id=$table_job_recurring->id;
                    $table_recurrence_pattern_rule->user_id=$user_id[$i];
                    $table_recurrence_pattern_rule->job_create=$create_before;
                    $table_recurrence_pattern_rule->start_date=$recurringjob_start_date[$i];
                    $table_recurrence_pattern_rule->end_radio=$end;
                    $table_recurrence_pattern_rule->repetition=$count_repetition[$i];
                    $table_recurrence_pattern_rule->range_day_first=$day1[$i];
                    $table_recurrence_pattern_rule->range_every_first=$month1[$i];
                    $table_recurrence_pattern_rule->range_every_sec=$every1[$i];
                    $table_recurrence_pattern_rule->range_day_sec=$day2[$i];
                    $table_recurrence_pattern_rule->range_every_third=$every2[$i];
                    $table_recurrence_pattern_rule->job_frequency=$job_frequency_name[$i];
                    // echo "<pre>";print_r($table_recurrence_pattern_rule);die;
                    $table_recurrence_pattern_rule->save();
                }
    
                for($ii=0;$ii<count($product_detail_id);$ii++){
                    $table_recurring_product_detail->job_recurring_id=$table_job_recurring->id;
                    $table_recurring_product_detail->product_id=$product_detail_id[$ii];
                    $table_recurring_product_detail->qty=$quantity[$ii];
                    // echo "<pre>";print_r($table_recurring_product_detail);die;
                    $table_recurring_product_detail->save();
                }
            } else {
                $table_job_recurring= Job_recurring::find($job_recurring_id);

                $table_job_recurring->job_type=$job_types;
                $table_job_recurring->customer_id=$users;
                $table_job_recurring->mobile=$mobile;
                $table_job_recurring->site_id=$site;
                $table_job_recurring->mobile_sms=$sms_number;
                $table_job_recurring->sms_alert=$sms1;
                $table_job_recurring->customer_ref=$customer_ref;
                $table_job_recurring->amount=$amount;
                $table_job_recurring->purchase_orderref=$purchase_order;
                $table_job_recurring->priority=$priority;
                $table_job_recurring->customer_alert=$request->alert_customer1;
                $table_job_recurring->tags=$tags1;
                $table_job_recurring->short_des=$short_des;
                $table_job_recurring->instruction=$instruction;
                $table_job_recurring->attachments=$imageName1;
                $table_job_recurring->save();
                // echo "<pre>";print_r($table_job_recurring);die;
    
                for($i=0;$i<count($inc);$i++){
                    // echo "<pre>";print_r($request->all());die;
                    $table_recurrence_pattern_rule= Recurrence_pattern_rule::find($request->rules_id[$i]);
                    // echo "<pre>";print_r($table_recurrence_pattern_rule);die;
                    $table_recurrence_pattern_rule->job_recurring_id=$request->job_recurring_id;
                    $table_recurrence_pattern_rule->user_id=$user_id[$i];
                    $table_recurrence_pattern_rule->job_create=$create_before;
                    $table_recurrence_pattern_rule->start_date=$recurringjob_start_date[$i];
                    $table_recurrence_pattern_rule->end_radio=$end;
                    $table_recurrence_pattern_rule->repetition=$count_repetition[$i];
                    $table_recurrence_pattern_rule->range_day_first=$day1[$i];
                    $table_recurrence_pattern_rule->range_every_first=$month1[$i];
                    $table_recurrence_pattern_rule->range_every_sec=$every1[$i];
                    $table_recurrence_pattern_rule->range_day_sec=$day2[$i];
                    $table_recurrence_pattern_rule->range_every_third=$every2[$i];
                    $table_recurrence_pattern_rule->job_frequency=$job_frequency_name[$i];
                    // echo "<pre>";print_r($table_recurrence_pattern_rule);die;
                    $table_recurrence_pattern_rule->save();
                }
    
                for($ii=0;$ii<count($product_detail_id);$ii++){
                    $table_recurring_product_detail= Recurring_product_detail::find($request->product_detail_id[$ii]);
                    $table_recurring_product_detail->job_recurring_id=$request->job_recurring_id;
                    $table_recurring_product_detail->product_id=$product_detail_id[$ii];
                    $table_recurring_product_detail->qty=$quantity[$ii];
                    // echo "<pre>";print_r($table_recurring_product_detail);die;
                    $table_recurring_product_detail->save();
                }
            }
           
            echo "done";

        } else if($form_id == 10){
            $type_name=$request->type_name;
            if($request->type_id == ''){
                $table_quote_type = new QuoteType;
            } else {
                $table_quote_type = QuoteType::find($request->type_id);
            }
            $table_quote_type->name=$type_name;
            $table_quote_type->save();
            echo "done";

        }
    }
    public function status_change(Request $request){
        echo "<pre>";print_r($request->all());die;
        $form_id=$request->form_id;
        if($form_id == 1){
            $table = Job::find($request->id);
        } else if($form_id == 2){
            $table = Job_type::find($request->id);
        } else if($form_id == 3){
            $table = Work_flow::find($request->id);
        } else if($form_id == 5){
            $table= Product_category::find($request->id);
        } else if($form_id == 6){
            $table=Product::find($request->id);
        } else if($form_id == 7){
            $table=Quote::find($request->id);
        } else if($form_id == 8){
            $table=Project::find($request->id);
        } else if($form_id == 9){
            $table=Job_recurring::find($request->id);
        } else if($form_id == 10){
            $table=QuoteType::find($request->id);
        }
        // echo "<pre>";print_r($table);die;
        $table->status=$request->status;
        $table->save();
        echo "done";
    }
    public function delete_function(Request $request){
        echo "<pre>";print_r($request->all());die;
        $form_id=$request->form_id;
        if($form_id == 1){
            $table = Job::find($request->id);
        } else if($form_id == 2){
            $table = Job_type::find($request->id);
        } else if($form_id == 3){
            $table = Work_flow::find($request->id);
        } else if($form_id == 5){
            $table= Product_category::find($request->id);
        } else if($form_id == 6){
            $table=Product::find($request->id);
        } else if($form_id == 7){
            $table=Quote::find($request->id);
        } else if($form_id == 8){
            $table=Project::find($request->id);
        } else if($form_id == 9){
            $table=Job_recurring::find($request->id);
        } else if($form_id == 10){
            $table=QuoteType::find($request->id);
        }
        // echo "<pre>";print_r($table);die;
        $table->status=2;
        $table->save();
        echo "done";
    }
    public function edit_job(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $form_id=$request->form_id;
        if($form_id == 1){
            $table = Job::find($request->id);
            $table['form_id']=$form_id;
        } else if($form_id == 2){
            $table = Job_type::find($request->id);
            $table['form_id']=$form_id;
        } else if($form_id == 3){
            $table = Work_flow::find($request->id);
            $table['form_id']=$form_id;
        } else if($form_id == 5){
            $table= Product_category::find($request->id);
            $table['form_id']=$form_id;
        } else if($form_id == 6){
            $table=Product::find($request->id);
            $table['form_id']=$form_id;
        } else if($form_id == 7){
            // echo "<pre>";print_r($request->all());die;
            $table=Quote::find($request->id);
            $table['form_id']=$form_id;
            $quote_product_detail=Quote_product_detail::where('quotes_id',$request->id)->get();
            // echo "<pre>";print_r($quote_product_detail);die;
            $data_product='';
            foreach($quote_product_detail as $k=>$details){
                $data_product.='<tr>
                            <td>'.++$k.'</td>
                            <td>QU-'.$table->quote_ref.'</td>
                            <td>job_ref_123</td>
                            <td></td>
                            <td></td>
                            <td>100</td>
                            <td>vat</td>
                            <td>100</td>
                            <td>-</td>
                            <td>-</td>
                            <td>In-active</td>
                            <input type="hidden" value="'.$details->product_id.'" name="product_detail_id[]">
                            <input type="hidden" value="'.$details->qty.'" name="quantity[]">
                            </tr>';
            }
            $table['product_data']=$data_product;
        } else if($form_id == 8){
            $table=Project::find($request->id);
            $table['form_id']=$form_id;
        } else if($form_id == 9){
            $table=Job_recurring::find($request->id);
            $Recurrence_pattern_rule=Recurrence_pattern_rule::where('job_recurring_id',$request->id)->get();
            $Recurring_product_detail=Recurring_product_detail::where('job_recurring_id',$request->id)->get();
            $data='';
            $inc=1;
            foreach($Recurrence_pattern_rule as $value){
                $user_details=ServiceUser::where('id',$value->user_id)->first();
                if($value->job_frequency == 1){
                    $frequency="Yearly";
                } else if($value->job_frequency == 2){
                    $frequency="Monthly";
                } else {
                    $frequency="Daily";
                }
                $data.='<tr>
                            <td>'.$inc.'<input type="hidden" value="'.$inc.'" id="inc" name="inc[]"></td>
                            <td>'.$user_details->name.'<input type="hidden" value="'.$user_details->id.'" name="user_id[]"></td>
                            <td>'.$value->start_date.'<input type="hidden" value="'.$value->start_date.'" name="recurringjob_start_date[]"></td>
                            <td>'.$value->repetition.'<input type="hidden" value="'.$value->repetition.'" name="count_repetition[]"></td>
                            <td>2024/08/20</td><td>'.$frequency.'<input type="hidden" value="'.$value->job_frequency.'" name="job_frequency_name[]"></td>
                            <input type="hidden" value="'.$value->range_day_first.'" name="day1[]">
                            <input type="hidden" value="'.$value->range_every_first.'" name="month1[]">
                            <input type="hidden" name="every1[]" value="'.$value->range_every_sec.'">
                            <input type="hidden" value="'.$value->range_day_sec.'" name="day2[]">
                            <input type="hidden" value="'.$value->range_every_third.'" name="every2[]">
                            <input type="hidden" value="'.$value->id.'" name="rules_id[]"
                        </tr>';
                $inc++;
            }
            $i=1;
            $data1='';
            foreach($Recurring_product_detail as $val){
                $product_details=Product::find($val->product_id);
                $data1.='<tr>
                            <td>'.$product_details->product_name.'</td>
                            <td>'.$product_details->description.'</td>
                            <td><input type="number" class="form-control" value="'.$val->qty.'" name="quantity[]"></td>
                            <td><button class="btn btn-danger" onclick="removeRow(this)">Delete<input type="hidden" value="'.$val->id.'" name="product_detail_id[]"></button></td>
                        </tr>';
            }
            // echo "<pre>";print_r($data1);die;
            $table['form_id']=$form_id;
            $val_data['table']=$table;
            $val_data['rule']=$data;
            $val_data['product']=$data1;
            return response()->json($val_data);

        } else if($form_id == 10){
            $table=QuoteType::find($request->id);
            $table['form_id']=$form_id;
        }
        return response()->json($table);
    }
    public function search_value(Request $request){
        // echo "<pre>";print_r($request->all());die;
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
    public function save_get_ajax(Request $request){
        // echo "<pre>";print_r($request->all());die;
        // $productDetailIds=$request->productDetailIds;
        // $all_product=Product::whereIn('id',$productDetailIds)->get();
        // echo "<pre>";print_r(count($all_product));die;
        $quote_ref=rand(100,9999999);
        if($request->status == 0){
            $status = "In-active";
        } else if($request->status == 1){
            $status = "Active";
        } else if($request->status == 3){
            $status = "Draft";
        }
            $data='<tr>
            <td>1</td>
            <td>QU-'.$quote_ref.'</td>
            <td>job_ref_123</td>
            <td>'.$request->start_date.'</td>
            <td>'.$request->end_date.'</td>
            <td>100</td>
            <td>vat</td>
            <td>100</td>
            <td>-</td>
            <td>-</td>
            <td>'.$status.'</td>
            </tr>
            <input type="hidden" value="'.$quote_ref.'"  name="quote_ref">
            <input type="hidden" value="100" name="quote_price">
            ';
        // return $data;
        echo $data;
    }
}
