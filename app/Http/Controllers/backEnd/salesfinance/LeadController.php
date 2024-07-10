<?php

namespace App\Http\Controllers\backend\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(){

    }
    public function create(){
        $page = "Leads";
        return view('backEnd/salesFinance/leads_form',compact('page'));
    }

}
