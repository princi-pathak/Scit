<?php

namespace App\Http\Controllers\backEnd\salesfinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request){
        print_r("hello");
        $page = 'Customers';
        return view('backEnd.salesFinance.customer_form', compact('page'));
    }
}
