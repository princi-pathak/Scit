<?php

namespace App\Http\Controllers\frontEnd\Roster\general;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyLibraryController extends Controller
{
    public function index()
    {
        return view('frontEnd.roster.general.policy_library');
    }
}
