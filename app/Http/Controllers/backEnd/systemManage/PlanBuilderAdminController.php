<?php

namespace App\Http\Controllers\backEnd\systemManage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\PlanBuilder;

class PlanBuilderAdminController extends Controller
{
    public function index(){
        $page='appointmen_plans';
        $limit = '10';
        $home_id = Session::get('scitsAdminSession')->home_id;
        $appointments = PlanBuilder::where('home_id',$home_id)->where('is_deleted','0');
        $search = '';
        if(isset($_POST['search']))	{  
            //editing the records
            $data = $_POST;
            
            $plan_builder = $appointments->where('title','like','%'.$_POST['search'].'%')->orderBy('id','desc')->get();  

        } else  {
            $plan_builder = $appointments->orderBy('id','desc')->get();
        }
        // echo "<pre>";print_r($plan_builder);die;
        return view('backEnd.systemManage.appointment_plan.appointment_plan',compact('page','limit','search','plan_builder'));
    }
    public function plan_add(){
        $page='appointmen_plans';
        return view('backEnd.systemManage.appointment_plan.appointment_plan_form',compact('page'));
    }
    public function store(Request $request){
        // echo "<pre>";print_r($request->all());die;
        if($request->isMethod('post'))	{
			$data = $request->input();

			if(isset($data['formdata']))	{
				$data['formdata'] = array_values($data['formdata']);
			} else  {
				echo 'empty'; die;
			}
			// echo '<pre>'; print_r($data['formdata']); die;
			$plan 			= new PlanBuilder;
			$plan->home_id 	= Session::get('scitsAdminSession')->home_id;
			$plan->title 	= $data['plan_title'];
			$plan->pattern 	= json_encode($data['formdata']);
			$plan->icon 	= $data['plan_icon'];
			$plan->detail   = $data['plan_detail'];
			if($plan->save()){
				echo 'true';
			} else{
				echo 'false';
			}
		} 
    }
}
