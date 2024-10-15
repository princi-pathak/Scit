<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expenses(){
        return view('frontEnd.salesAndFinance.expenses.expense');
    }
}
