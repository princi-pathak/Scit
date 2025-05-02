<?php

namespace App\Http\Controllers\backEnd\salesfinance\DayBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesBackendController extends Controller
{
    public function index(){
        $data['page'] = "salesDayBook";
        // dd($data);
        return view('backEnd.salesFinance.sales.sales_day_book', $data);
    }
    public function create(){
        $data['page'] = "salesDayBook";
        return view('backEnd.salesFinance.sales.sales_day_book_form', $data);
    }
}
