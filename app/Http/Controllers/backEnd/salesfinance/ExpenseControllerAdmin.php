<?php

namespace App\Http\Controllers\backEnd\salesfinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,Validator,File,Session,DB;
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
    public function index(Request $request){
        $page = 'Expense';
        $admin   = Session::get('scitsAdminSession');
        $home_id = $admin->home_id;
        // echo $home_id;
        $key=$request->key;
        $value=$request->value;
        if($home_id){
            if(isset($key) && isset($value)){
                if($key === 'authorised' && $value == 1){
                    $expense_query=Expense::getAllExpense($home_id)->where(["$key"=>$value,'paid'=>0]);
                }else{
                    $expense_query=Expense::getAllExpense($home_id)->where("$key",$value);
                }
                
            }else{
                $expense_query=Expense::getAllExpense($home_id);
            }
            // $expense_query=Expense::getAllExpense($home_id);
            $search = '';

            if(isset($request->limit)) {
                $limit = $request->limit;
                Session::put('page_record_limit',$limit);
            } else {

                if(Session::has('page_record_limit')){
                    $limit = Session::get('page_record_limit');
                } else{
                    $limit = 20;
                }
            }
            if(isset($request->search))
            {
                $search      = trim($request->search);
                $expense_query = $expense_query->where('type.name','like','%'.$search.'%');
            }
            $expense = $expense_query->paginate($limit);
            $data['authorisedCount']=Expense::getAllExpense($home_id)->where('authorised',1)->count();
            $data['unauthorisedCount']=Expense::getAllExpense($home_id)->where('authorised',0)->count();
            $data['rejectCount']=Expense::getAllExpense($home_id)->where('reject',1)->count();
            $data['paidCount']=Expense::getAllExpense($home_id)->where('paid',1)->count();
            $data['paidWithAuthCount']=Expense::getAllExpense($home_id)->where(['paid'=>1,'authorised'=>1])->count();
            $data['expenseCount']=Expense::getAllExpense($home_id)->count();
            $data['expense']=$expense;
            $data['limit']=$limit;
            $data['search']=$search;
            $data['page']='Expense';
        }
        return view('backEnd.salesFinance.expense.expense',$data);
    }
}
