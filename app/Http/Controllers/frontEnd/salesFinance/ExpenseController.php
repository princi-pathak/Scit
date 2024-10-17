<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,Validator,File;
use App\Models\Construction_tax_rate;
use App\User;
use App\Customer;
use App\Models\Expense;
use App\Models\Project;
use App\Models\Job;

class ExpenseController extends Controller
{
    public function expenses(){
        $home_id=Auth::user()->home_id;
        $data['user_id']=Auth::user()->id;
        $data['users'] = User::getHomeUsers($home_id);
        $data['rate']=Construction_tax_rate::getAllTax_rate($home_id,'Active');
        $data['customer']=Customer::get_customer_list_Attribute($home_id,'ACTIVE');
        $data['home_id']=$home_id;
        $data['expense']=Expense::getAllExpense($home_id);
        // echo "<pre>";print_r($data['expense']);die;
        return view('frontEnd.salesAndFinance.expenses.expense',$data);
    }
    public function find_project(Request $request){
        $customer_id=$request->customer_id;
        $project=Project::getAllProject($customer_id);
        return response()->json(['project'=>$project]);
    }
    public function find_appointment(Request $request){
        $id=$request->id;
        $customer_id=Project::find($id)->customer_name;
        $job_appoint=Job::getAllAppointment($customer_id);
        return response()->json(['job_appoint'=>$job_appoint]);
    }
    public function expense_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
            $validator = Validator::make($request->all(), [
                'home_id' => 'required',
                'title' => 'required',
                'amount' => 'required',
                'vat' => 'required',
                'gross_amount' => 'required',
                'expense_date' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['vali_error' => $validator->errors()->first()]);
            }
        

        if ($request->hasFile('attachments')) {
            $imageName = time().'.'.$request->attachments->extension();      
            $request->attachments->move(public_path('images/expense'), $imageName);
            $requestData = $request->all();
            $requestData['attachments'] = $imageName;
        } else {
            $requestData = $request->all();
        }
        return $expense=Expense::expense_save($requestData);
    }
    public function expense_image_delete(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $expense_record=Expense::find($request->id);
        $expense_record->attachments='';
        // $expense_record->save();
        try {
            @unlink('images/expense/'.$expense_record->attachments);
            // File::delete(public_path('images/expense/' . $expense_record->attachments));
        }
        catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
        }
        // if($expense_record){
        //     return true;
        // }else{
        //     return false;
        // }
    }
}
