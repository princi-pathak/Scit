<?php

namespace App\Http\Controllers\backEnd\systemManage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanBuilderAdminController extends Controller
{
    public function index(){
        $page='appointmen_plans';
        $limit = '10';
        $search='';
        return view('backEnd.systemManage.appointment_plan.appointment_plan',compact('page','limit','search'));
    }
    public function plan_add(){
        $page='appointmen_plans';
        return view('backEnd.systemManage.appointment_plan.appointment_plan_form',compact('page'));
    }
}
