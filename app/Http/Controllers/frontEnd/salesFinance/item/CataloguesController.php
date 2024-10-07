<?php

namespace App\Http\Controllers\frontEnd\salesFinance\item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CataloguesController extends Controller
{
    public function index(){
        $data['page'] = "item";
        return view('frontEnd.salesAndFinance.item.catalogues', $data);
    }
}
