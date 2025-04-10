<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreInvoiceController extends Controller
{
    public function index(){
        return view('frontEnd.salesAndFinance.pre_invoice.pre_invoice');
    }
    public function preinvoice_save(Request $request){
        echo "<pre>";print_r($request->all());die;
    }
}
