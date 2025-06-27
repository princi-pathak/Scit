<?php

namespace App\Http\Controllers\Rota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AnnualLeaveController extends Controller
{
    public function index(){

        $data['users'] = User::getHomeUsers(Auth::user()->home_id);
        return view('rotaStaff.annualLeave.annual_leave_tracker', $data);
    }
}
