<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{

    public function dashboard(){
        $data['page'] = "quotes";
        return view('frontEnd.salesAndFinance.quote.dashboard', $data);
    }
    public function create(){
        $data['page'] = "quotes";
        $data['customers'] = Customer::getConvertedCustomers(Auth::user()->home_id);
        return view('frontEnd.salesAndFinance.quote.quote_form', $data);
    }
    public function index(){
        $data['page'] = "quotes";
        return view('frontEnd.salesAndFinance.quote.draft', $data);
    }
}
