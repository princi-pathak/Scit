<?php

namespace App\Http\Controllers\frontEnd\salesFinance\leave_tracker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveTrackerController extends Controller
{
    public function leave_tracker(){
        return view('frontEnd.salesAndFinance.leave_tracker.leave_tracker');
    }
}
