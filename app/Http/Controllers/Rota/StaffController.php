<?php

namespace App\Http\Controllers\Rota;

use App\Http\Requests\Rota\StaffWorkerRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rota\StaffWorker;

class StaffController extends Controller
{
    public function index(){
        return view('rotaStaff.staff.index');
    }

    public function store(StaffWorkerRequest $request){

    }
}
