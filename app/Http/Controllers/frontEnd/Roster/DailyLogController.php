<?php

namespace App\Http\Controllers\frontEnd\Roster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyLogController extends Controller
{
    public function index(){
        return view('frontEnd.roster.daily_log.daily_log');
    }
}
