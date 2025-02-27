<?php

namespace App\Http\Controllers\frontend\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Construction_tax_rate;

class SalesController extends Controller
{
    public function index(){
        $data['page'] = "dayBook";
        return view('frontEnd.salesAndFinance.sales.sales_day_book', $data); 
    }                       

    public function create(){   
        $data['page'] = "dayBook";
        $data['customers'] = Customer::get_customer_list_Attribute(Auth::user()->home_id,'ACTIVE');
        $data['taxRates'] = Construction_tax_rate::getAllTax_rate(Auth::user()->home_id, "Active");
        return view('frontEnd.salesAndFinance.sales.sales_day_book_form', $data); 
    }

    public function store(Request $request){

        dd($request);
        $data['page'] = "dayBook";
        // QuoteType::updateOrCreate(['id' => $request->quote_type_id],  array_merge($request->all(), ['home_id' => Auth::user()->home_id]));
    }
}
