<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Auth;
use Carbon\Carbon;
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
        // $data['expendCard']=ExpendCard::getAllExpendCard($home_id,$user_id)->get();
        $data['previous_month_data']=$this->previous_month_data($home_id,$user_id);
        $data['expendCard'] = ExpendCard::getAllExpendCard($home_id, $user_id)
        ->whereMonth('expend_date', now()->month)
        ->whereYear('expend_date', now()->year)
        ->orderBy('id','desc')->first();
        $data['expendCard'] = ExpendCard::getAllExpendCard($home_id, $user_id)
        ->whereMonth('expend_date', now()->month)
        ->whereYear('expend_date', now()->year)
        ->get();

        $data['cash']=Cash::getAllCash($home_id,$user_id)
        ->whereMonth('cash_date', now()->month)
        ->whereYear('cash_date', now()->year)
        ->sum('petty_cashIn');
        
        // echo "<pre>";print_r($data['previous_month_data']);die;
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
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $data['expendCard'] = ExpendCard::getAllExpendCard($home_id, $user_id)
        ->whereMonth('expend_date', now()->month)
        ->whereYear('expend_date', now()->year)
        ->orderBy('id','desc')->first();
        // echo "<pre>";print_r($data);die;
        return view('frontEnd.petty_cash.expend_card_form',$data);
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
        $rules = [
            'expend_date'     => 'required',
            // 'fund_added'      => 'required',
            'purchase_amount' => 'required',
            'card_details'    => 'required',
            'dext'            => 'required',
            'invoice_la'      => 'required',
            'initial'         => 'required',
            'receipt'         => 'required',
        ];
        
        if ($request->last_id == '') {
            $rules['balance_bfwd'] = 'required';
        }
        
        $validator = Validator::make($request->all(), $rules);
        
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
    private function previous_month_data($home_id,$user_id){
        $previousMonth = Carbon::now()->subMonth();
        $previous_data = ExpendCard::getAllExpendCard($home_id, $user_id)
                ->whereMonth('expend_date', $previousMonth->month)
                ->whereYear('expend_date', $previousMonth->year)
                ->orderBy('id', 'desc')
                ->get();
        $cash=Cash::getAllCash($home_id,$user_id)
                ->whereMonth('cash_date',$previousMonth->month)
                ->whereYear('cash_date', $previousMonth->year)
                ->sum('petty_cashIn');
        $sumPurchaseCashIn=0;  
        $totalBalanceFund=0; 
        $fundAmount=0; 
        $count=0;
        $date=null;
        $prvious_date=null;
        foreach($previous_data as $val){
            $sumPurchaseCashIn=$sumPurchaseCashIn+$val->purchase_amount;
            $totalBalanceFund=$totalBalanceFund+$val->fund_added;
            if($count == 0){
                $fundAmount=$val->fund_added;
                $prvious_date=$val->expend_date;
                $count=1;
            }
            $db_date=date('m',strtotime($val->expend_date));
            if($date != $db_date || $date == null){$date=$db_date;}
        }   
        $sum=$totalBalanceFund+$totalBalanceFund;
        $calculation=$sum-$sumPurchaseCashIn;
        $balanceOnCard=$calculation-$cash;
        $data=[
            'previousbalanceOnCard'=>$balanceOnCard,
            'previousfundAmount'=>$fundAmount,
            'prvious_date'=>$prvious_date,

        ];
        return $data;
    }
}
