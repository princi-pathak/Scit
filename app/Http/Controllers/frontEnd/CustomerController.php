<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session,DB;
use App\Customer;
use App\Models\Country;
use App\Models\Job_title;
use App\Models\Customer_type;
use App\Models\Constructor_customer_site;
use App\Models\Construction_customer_login;
use App\Models\Constructor_additional_contact;

class CustomerController extends Controller
{
    public function customer_add_edit(Request $request){
        // echo 12;die;
        return view('frontEnd.jobs.add_customer');
    }
}
