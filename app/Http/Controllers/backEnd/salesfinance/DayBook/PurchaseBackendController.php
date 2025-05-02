<?php

namespace App\Http\Controllers\backEnd\salesfinance\DayBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseBackendController extends Controller
{
    public function index(){
        $data['page'] = "dayBook";
        return view('backEnd.salesFinance.DayBook.purchase_day_book', $data);
    }
    public function purchase_type(){
        $data['page'] = "purchaseExpenese";
        return view('backEnd.salesFinance.DayBook.purchase_expenses', $data);
    }
    public function create(){
        $data['page'] = "dayBook";
        return view('backEnd.salesFinance.DayBook.purchase_day_book_form', $data);
    }
    public function purchase_type_add(){
        $data['page'] = "purchaseExpenese";
        return view('backEnd.salesFinance.DayBook.purchase_expenses_form', $data);
    }
}
