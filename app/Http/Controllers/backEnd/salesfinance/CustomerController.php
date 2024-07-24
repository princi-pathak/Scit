<?php

namespace App\Http\Controllers\backEnd\salesfinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request){
        $page = 'Customers';
        return view('backEnd.salesFinance.customers.form', compact('page'));
    }
    public function create(Request $request){
        $page = 'Customers';
        return view('backEnd.salesFinance.customers.form', compact('page'));
    }

    public function store(Request $request){
        $page = 'Customers';
        return view('backEnd.salesFinance.customers.form', compact('page'));
    }

}
