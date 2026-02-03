<?php

namespace App\Http\Controllers\frontEnd\Roster\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupervisionController extends Controller
{
    public function index()
    {
        return view("frontEnd/roster/staff/supervision_management");
    }
}
