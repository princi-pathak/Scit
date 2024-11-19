<?php

namespace App\Http\Controllers\backEnd\salesfinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,Validator,File,Session;
use Illuminate\Support\Facades\Log;
use App\Models\Construction_tax_rate;
use App\User;
use App\Customer;
use App\Models\Expense;
use App\Models\Project;
use App\Models\Job;
use App\Models\Construction_job_appointment;

class ExpenseControllerAdmin extends Controller
{
    public function index(){
        $page = 'Expense';
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        echo $home_id;
    }
}
