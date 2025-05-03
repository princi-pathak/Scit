<?php

namespace App\Http\Controllers\backEnd\salesfinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouncilBackendController extends Controller
{
    public function index(){
        $data['page']="council_tax";
        return view('backEnd.salesFinance.council_tax.council_tax',$data);
    }
    public function create(){
        $data['page']="council_tax";
        return view('backEnd.salesFinance.council_tax.council_tax_form',$data);
    }
}
