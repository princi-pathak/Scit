<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PettyCashController extends Controller
{
    public function index(){
        return view('frontEnd.petty_cash.index');
    }
    public function expend_card(){
        return view('frontEnd.petty_cash.expend_card');
    }
    public function petty_cash(){
        return view('frontEnd.petty_cash.petty_cash');
    }
    public function child_register(){
        return view('frontEnd.petty_cash.child_register');
    }
    public function expend_card_add(){
        return view('frontEnd.petty_cash.expend_card_form');
    }
    public function petty_cash_add(){
        return view('frontEnd.petty_cash.petty_cash_form');
    }
    public function child_register_add(){
        return view('frontEnd.petty_cash.child_register_form');
    }
}
