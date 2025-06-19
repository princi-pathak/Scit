<?php

namespace App\Http\Controllers\backEnd\salesfinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeSheetBackendController extends Controller
{
    public function index(){
        $data['page'] = "time_sheet"; 
        return view('backEnd.salesFinance.time_sheet.time_sheet', $data);    
    }

    public function create(){
        $data['page'] = "time_sheet"; 
        return view('backEnd.salesFinance.time_sheet.time_sheet_form', $data);    
    }
}
