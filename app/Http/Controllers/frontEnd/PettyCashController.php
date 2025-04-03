<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Auth;
use App\Models\petty_cash\ExpendCard;
use App\Models\petty_cash\Cash;

class PettyCashController extends Controller
{
    public function index(){
        return view('frontEnd.petty_cash.index');
    }
    public function expend_card(){
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $data['expendCard']=ExpendCard::getAllExpendCard($home_id,$user_id)->get();
        $data['cash']=Cash::getAllCash($home_id,$user_id)->sum('petty_cashIn');
        // echo "<pre>";print_r($data['cash']);die;
        return view('frontEnd.petty_cash.expend_card',$data);
    }
    public function petty_cash(){
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $data['cash']=Cash::getAllCash($home_id,$user_id)->get();
        return view('frontEnd.petty_cash.petty_cash',$data);
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
    public function saveExpend(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'expend_date'=>'required',
            'balance_bfwd'=>'required',
            'fund_added'=>'required',
            'purchase_amount'=>'required',
            'card_details'=>'required',
            'dext'=>'required',
            'invoice_la'=>'required',
            'initial'=>'required',
            'receipt'=>'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try {
            if ($request->hasFile('receipt')) {
                $imageName = time().'.'.$request->receipt->extension();      
                $request->receipt->move(public_path('images/finance_petty_cash'), $imageName);
                $original_name=$request->receipt->getClientOriginalName();
                $requestData = $request->all();
                $requestData['receipt'] = $imageName;
                $requestData['fileName'] = $original_name;
            } else {
                $requestData = $request->all();
            }
            
            $requestData['home_id'] = $home_id;
            $requestData['loginUserId'] = $user_id;
            // echo "<pre>";print_r($requestData);die;
            $expendCard=ExpendCard::saveExpenseCard($requestData);
            
            if($request->id == ''){
                return response()->json(['success' => true,'message'=>'The Expend Card has been saved succesfully.', 'data' => $expendCard]);
            }else{
                return response()->json(['success' => true,'message'=>'The Expend Card has been updated succesfully.', 'data' => $expendCard]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function saveCash(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'cash_date'=>'required',
            'balance_bfwd'=>'required',
            'petty_cashIn'=>'required',
            'cash_out'=>'required',
            'card_details'=>'required',
            'dext'=>'required',
            'invoice_la'=>'required',
            'initial'=>'required',
            'receipt'=>'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try {
            if ($request->hasFile('receipt')) {
                $imageName = time().'.'.$request->receipt->extension();      
                $request->receipt->move(public_path('images/finance_cash'), $imageName);
                $original_name=$request->receipt->getClientOriginalName();
                $requestData = $request->all();
                $requestData['receipt'] = $imageName;
                $requestData['fileName'] = $original_name;
            } else {
                $requestData = $request->all();
            }
            
            $requestData['home_id'] = $home_id;
            $requestData['loginUserId'] = $user_id;
            // echo "<pre>";print_r($requestData);die;
            $cash=Cash::saveCash($requestData);
            
            if($request->id == ''){
                return response()->json(['success' => true,'message'=>'The Cash has been saved succesfully.', 'data' => $cash]);
            }else{
                return response()->json(['success' => true,'message'=>'The Cash has been updated succesfully.', 'data' => $cash]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
