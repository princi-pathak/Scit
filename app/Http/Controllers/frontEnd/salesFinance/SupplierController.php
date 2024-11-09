<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request){
        echo 1;
    }
    public function supplier_add(Request $request){

        return view('frontEnd.salesAndFinance.jobs.add_supplier');
    }
}
