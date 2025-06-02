<?php

namespace App\Http\Controllers\backEnd\rota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffWorkerController extends Controller
{
    public function index(){
        $data['page'] = "rota";
        return view('backEnd/rota/staff_worker', $data );
    }

    public function create(){
        $data['page'] = "rota";
        return view('backEnd/rota/staff_worker_form', $data );
    }
}
