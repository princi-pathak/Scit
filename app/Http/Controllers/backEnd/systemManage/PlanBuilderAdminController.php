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
}
