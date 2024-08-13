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
use App\Models\Job_type;
use App\Models\Work_flow;
use App\Models\Quote_type;
use App\Models\Job_recurring;
use App\Models\Product_category;
use App\Models\Quote_product_detail;
use App\Models\Recurrence_pattern_rule;
use App\Models\Recurring_product_detail;
use App\Models\Construction_jobassign_product;
use DB,Auth,Session,Validator;
use App\traits\CountryTrait;

class JobController extends Controller
{
    use CountryTrait;
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
        $data['quote_type']=Quote_type::where('status',1)->get();
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
        $data['quote_type_list']=Quote_type::whereNot('status',2)->get();
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
        $data['job_type']=Job_type::whereNot('status',2)->get();
        $data['access_rights']=$this->access_rights();
        // echo "<pre>";print_r($data['access_rights']);die;
        return view('frontEnd.jobs.job_type',$data);
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
        $data['country']=$this->all_country_trait();
        $home_id = Auth::user()->home_id;
        $data['product_details1']=DB::table('products as pr')->select('pr.*','cat.id as cat_id','cat.name')->join('product_categories as cat','cat.id','=','pr.cat_id')->get();
        $data['customers']=Customer::get_customer_list_Attribute($home_id,'ACTIVE');
        $data['home_id']=$home_id;
        // echo "<pre>";print_r($data['country']);die;
        return view('frontEnd.jobs.add_job',$data);
    }
    public function job_add_edit_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $job_id=Job::job_save($request->all());
        return response()->json($job_id);

    }
    public function get_customer_details_front(Request $request){
        $customer_id=$request->customer_id;
        $customers = Customer::with('sites','additional_contact','customer_project')->where('id', $customer_id)->get();
        // echo "<pre>";print_r($customers);die;
        return response()->json($customers);
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
                $table_quote_type = new Quote_type;
            } else {
                $table_quote_type = Quote_type::find($request->type_id);
            }
            $table_quote_type->name=$type_name;
            $table_quote_type->save();
            echo "done";

        }
    }
    public function status_change(Request $request){
        // echo "<pre>";print_r($request->all());die;
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
            $table=Quote_type::find($request->id);
        }
        // echo "<pre>";print_r($table);die;
        $table->status=$request->status;
        $table->save();
        echo "done";
    }
    public function delete_job(Request $request){
        // echo "<pre>";print_r($request->all());die;
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
            $table=Quote_type::find($request->id);
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
            $table=Quote_type::find($request->id);
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
