<?php

namespace App\Http\Controllers\Rota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        return view('rotaStaff.staff.index');
    }
}
