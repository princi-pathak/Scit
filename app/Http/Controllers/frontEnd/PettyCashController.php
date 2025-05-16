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
        $data['previous_month_data']=$this->previous_month_data($home_id,$user_id);
        $data['expendCardLastData'] = ExpendCard::getAllExpendCard($home_id, $user_id)
        ->whereMonth('expend_date', now()->month)
        ->whereYear('expend_date', now()->year)
        ->orderBy('id','desc')->first();
        // echo "<pre>";print_r($data['previous_month_data']);die;
        return view('frontEnd.petty_cash.expend_card',$data);
    }
    public function petty_cash(){
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        // $data['cash']=Cash::getAllCash($home_id,$user_id)->get();
        $data['cash']=Cash::getAllCash($home_id,$user_id)
        ->whereMonth('cash_date', now()->month)
        ->whereYear('cash_date', now()->year)
        ->get();
        $data['previous_Cash_month_data']=$this->previous_Cash_month_data($home_id,$user_id);
        $data['cashLastId'] = Cash::getAllCash($home_id, $user_id)
        ->whereMonth('cash_date', now()->month)
        ->whereYear('cash_date', now()->year)
        ->orderBy('id','desc')->first();
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
        $data['previous_month_data']=$this->previous_month_data($home_id,$user_id);
        // echo "<pre>";print_r($data['previous_month_data']);die;
        return view('frontEnd.petty_cash.expend_card_form',$data);
    }
    public function petty_cash_add(){
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $data['previous_Cash_month_data']=$this->previous_Cash_month_data($home_id,$user_id);
        $data['cash'] = Cash::getAllCash($home_id, $user_id)
        ->whereMonth('cash_date', now()->month)
        ->whereYear('cash_date', now()->year)
        ->orderBy('id','desc')->first();
        // echo "<pre>";print_r($data['previous_Cash_month_data']);die;
        return view('frontEnd.petty_cash.petty_cash_form',$data);
    }
    public function child_register_add(){
        return view('frontEnd.petty_cash.child_register_form');
    }
    public function saveExpend(Request $request){
        echo "<pre>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $id=$request->id;
        $rules = [
            'expend_date'     => 'required',
        ];
        
        
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
        $id=$request->id;
        $array=[
            'cash_date'=>'required',
            'balance_bfwd'=>'required',
            'petty_cashIn'=>'required',
            'cash_out'=>'required',
            'card_details'=>'required',
            'dext'=>'required',
            'invoice_la'=>'required',
            'initial'=>'required',
            
        ]; 
        if($id == ''){
            $array= [
                'receipt'=>'required',
            ];
        }
        
        $validator = Validator::make($request->all(), $array);
        
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
    private function previous_month_data($home_id,$user_id,$endDate=null){
        $previousMonth = Carbon::now()->subMonth();
        if(!empty($endDate)){
            $previousMonth = Carbon::parse($endDate)->subMonth();
        }
        $previous_data = ExpendCard::getAllExpendCard($home_id, $user_id)
                ->whereMonth('expend_date', $previousMonth->month)
                // ->whereYear('expend_date', now()->year)
                ->orderBy('id', 'desc')
                ->get();
        // return count($previous_data);
        if(count($previous_data) == 0){
            $data=[
                'previousbalanceOnCard'=>0,
                'previousfundAmount'=>0,
                'prvious_date'=>'',

            ];
            return $data;
        }
        $cash=Cash::getAllCash($home_id,$user_id)
                ->whereMonth('cash_date',$previousMonth->month)
                // ->whereYear('cash_date', now()->year)
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
    private function previous_Cash_month_data($home_id,$user_id,$startDate=null,$endDate=null){
        $previousMonth = Carbon::now()->subMonth();
        // $previousYear = Carbon::now()->subYear();
        if(!empty($endDate)){
            $previousMonth = Carbon::parse($endDate)->subMonth();
            // $previousYear = Carbon::parse($endDate)->subYear();
        }
        $cash=Cash::getAllCash($home_id,$user_id)
                ->whereMonth('cash_date',$previousMonth->month)
                // ->whereYear('cash_date', $previousYear->year)
                ->get();
        $total_balance=0;
        $cash_out=0;
        $balance_bfwd=0;
        $petty_cashIn=0;
        foreach($cash as $val){
            $total_balance=$total_balance+$val->balance_bfwd+$val->petty_cashIn;
            $cash_out=$cash_out+$val->cash_out;
            
        }
        $total_balanceInCash=$total_balance-$cash_out;
        $data=['total_balanceInCash'=>$total_balanceInCash];
        return $data;

    }
    public function cash_filter(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $startDate=Carbon::parse($request->startDate)->format('Y-m-d');
        $endDate=Carbon::parse($request->endDate)->format('Y-m-d');
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $query = Cash::getAllCash($home_id,$user_id);
        // ->whereMonth('cash_date', now()->month)
        // ->whereYear('cash_date', now()->year);
        if ($request->filled('startDate') && $request->filled('endDate')) {
            $query->whereBetween('cash_date', [$startDate, $endDate]);
        }
        $search_data = $query->get();
        // echo "<pre>";print_r($search_data);die;
        $previous_Cash_month_data=$this->previous_Cash_month_data($home_id,$user_id,$startDate,$endDate);
        // echo "<pre>";print_r($previous_Cash_month_data);die;
        $total_balance=0;
        $cash_out=0;
        $count=0;
        $balance_bfwd=0;
        $petty_cashIn=0;
        $html_data='';
        $date=null;
        foreach($search_data as $key=>$val){
            $cash_out=$cash_out+$val->cash_out;
            $petty_cashIn=$petty_cashIn+$val->petty_cashIn;
            if($count == 0){
                $count=1;
                $balance_bfwd=$val->balance_bfwd;
                $total_balance=$val->balance_bfwd;
            }
            $total_balance=$total_balance+$val->petty_cashIn;
            $dext='';
            $invoice_la='';
            if($val->dext == 1){ $dext= "Yes";}else{ $dext= "No"; }
            if($val->invoice_la == 1){ $invoice_la= "Yes"; }else{ $invoice_la= "No" ;}
            $db_date=date('m',strtotime($val->cash_date));
            $html_data.='<tr>
                            <td>'. ++$key .'</td>
                            <td>'. date("Y-m-d",strtotime($val->cash_date)) .'</td>';
                            if($date != $db_date || $date == null){$date=$db_date;
                                $html_data.='<td>£'. $val->balance_bfwd .'</td>';
                            }else{
                                $html_data.='<td></td>';
                            }
                            $html_data.='<td>£'. $val->petty_cashIn .'</td>
                            <td>£'. $val->cash_out .'</td>
                            <td>'. $val->card_details .'</td>
                            <td><a href="'.url("public/images/finance_cash/".$val->receipt) .'" target="_blank"><i class="fa fa-eye"></i></a></td>
                            <td>'. $dext .'</td>
                            <td>'. $invoice_la .'</td>
                            <td>'. $val->initial .'</td>
                            <td><a href="javascript:void(0)" class="openModalBtn" data-toggle="modal" data-target="#petty_cash" data-action="edit" data-id="'.$val->id.'" data-cash_date="'.$val->cash_date.'" data-balance_bfwd="'.$val->balance_bfwd.'" data-petty_cashin="'.$val->petty_cashIn.'" data-cash_out="'.$val->cash_out.'" data-card_details="'.$val->card_details.'" data-receipt="'.$val->receipt.'" data-dext="'.$val->dext.'" data-invoice_la="'.$val->invoice_la.'" data-initial="'.$val->initial.'" id=""><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="javascript:void(0)" class="deleteBtn" data-id="'.$val->id.'"><i class="fa fa-trash radStar" aria-hidden="true"></i></a></td>
                        </tr>';

        }
        $total_balanceInCash=$total_balance-$cash_out;
        return response()->json(['success'=>true,'message'=>'Filtered Data','data'=>$search_data,'html_data'=>$html_data,'total_balance'=>$balance_bfwd,'cash_out'=>$cash_out,'balance_bfwd'=>$balance_bfwd,'petty_cashIn'=>$petty_cashIn,'total_balanceInCash'=>$total_balanceInCash]);
    }
    public function expand_card_filter(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $startDate=Carbon::parse($request->startDate)->format('Y-m-d');
        $endDate=Carbon::parse($request->endDate)->format('Y-m-d');
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;

        $cash=Cash::getAllCash($home_id,$user_id)
        ->whereMonth('cash_date', now()->month)
        // ->whereYear('cash_date', now()->year)
        ->sum('petty_cashIn');
        // echo "<pre>";print_r($cash);die;
        $query = ExpendCard::getAllExpendCard($home_id, $user_id);
        // ->whereMonth('expend_date', now()->month)
        // ->whereYear('expend_date', now()->year);
        if ($request->filled('startDate') && $request->filled('endDate')) {
            $query->whereBetween('expend_date', [$startDate, $endDate]);
        }
        $search_data = $query->get();
        $previous_month_data=$this->previous_month_data($home_id,$user_id,$endDate);
        // return $previous_month_data;
        // echo "<pre>";print_r($search_data);die;
        $html_data='';
        $enterInLoop=0;
        $index=0;
        $sumBalanceFund=0;
        $sumPurchaseCashIn=0;
        $totalBalancebfwd=0;   
        $totalBalanceFund=0; 
        $date=null;
        foreach($search_data as $val){
            $sumPurchaseCashIn=$sumPurchaseCashIn+$val->purchase_amount;
            $totalBalanceFund=$totalBalanceFund+$val->fund_added;
            if($enterInLoop == 0){
                $totalBalancebfwd=$val->balance_bfwd;
                $enterInLoop=1;
            }
            $db_date=date('m',strtotime($val->expend_date));
            if($val->dext == 1){ $dext= "Yes";}else{ $dext= "No"; }
            if($val->invoice_la == 1){ $invoice_la= "Yes"; }else{ $invoice_la= "No" ;}
            $html_data.='<tr>
                <td>'. ++$index .'</td>
                <td class="white_space_nowrap">'. date("Y-m-d",strtotime($val->expend_date)) .'</td>';
                if($date != $db_date || $date == null){$date=$db_date;
                    $html_data.='<td>£'. $val->balance_bfwd .'</td>';
                 }else{
                    $html_data.='<td></td>';
                 }
                 $fund_added='';
                 if(isset($val->fund_added) && $val->fund_added !=''){$fund_added= '£'.$val->fund_added;}
                 $html_data.='<td>'. $fund_added .'</td>
                <td>£'. $val->purchase_amount .'</td>
                <td>'. $val->card_details .'</td>
                <td><a href="'. url("public/images/finance_petty_cash/".$val->receipt) .'" target="_blank"><i class="fa fa-eye"></i></a></td>
                <td>'. $dext .'</td>
                <td>'. $invoice_la .'</td>
                <td>'. $val->initial .'</td>
                <td><a href="javascript:void(0)" class="openModalBtn" data-toggle="modal" data-target="#expend_card" data-action="edit" data-id="'.$val->id.'" data-expend_date="'.$val->expend_date.'" data-balance_bfwd="'.$val->balance_bfwd.'" data-fund_added="'.$val->fund_added.'" data-purchase_amount="'.$val->purchase_amount.'" data-card_details="'.$val->card_details.'" data-receipt="'.$val->receipt.'" data-dext="'.$val->dext.'" data-invoice_la="'.$val->invoice_la.'" data-initial="'.$val->initial.'" id=""><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="javascript:void(0)" class="deleteBtn" data-id="'.$val->id.'"><i class="fa fa-trash radStar" aria-hidden="true"></i></a></td>
            </tr>';
        }
        if($totalBalancebfwd == 0){
            $sum=$totalBalanceFund+$previous_month_data['previousbalanceOnCard'];
        }else{
            $sum=$totalBalanceFund+$totalBalancebfwd;
        }
        $calculation=$sum-$sumPurchaseCashIn;
        if(count($search_data) > 0){
            $balanceOnCard=$calculation-$cash;
        }else{
            $balanceOnCard=0;
        }
        // echo "<pre>";print_r($html_data);die;
        return response()->json(['success'=>true,'message'=>'Filtered Data','data'=>$search_data,'html_data'=>$html_data,'balanceOnCard'=>$balanceOnCard,'totalBalancebfwd'=>($totalBalancebfwd) ? $totalBalancebfwd: $previous_month_data['previousbalanceOnCard'],'totalBalanceFund'=>$totalBalanceFund,'sumPurchaseCashIn'=>$sumPurchaseCashIn]);
    }
    public function getAllExpendCash(){
        try{
            $home_id=Auth::user()->home_id;
            $user_id=Auth::user()->id;
            $data['previous_month_data']=$this->previous_month_data($home_id,$user_id);
            $data['expendCard'] = ExpendCard::getAllExpendCard($home_id, $user_id)
            ->whereMonth('expend_date', now()->month)
            // ->whereYear('expend_date', now()->year)
            ->get();

            $data['cash']=Cash::getAllCash($home_id,$user_id)
            ->whereMonth('cash_date', now()->month)
            ->whereYear('cash_date', now()->year)
            ->sum('petty_cashIn');
            return response()->json(['success'=>true,'message'=>'Expend card data','data'=>$data]);
        } catch (\Exception $e) {
            return response()->json(['success'=>false,'error' => $e->getMessage()], 500);
        }
    }
    public function cash_delete(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $validator = Validator::make($request->all(), ['id'=>'required|integer|exists:cashes,id']);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'message' => $validator->errors()->first(),'data'=>array()]);
        }
        $cash=Cash::find($request->id);
        if($cash){
            $cash->update(['deleted_at' => Carbon::now()]);
            return response()->json(['success'=>true,'message'=>'Cash deleted successfully done','data'=>array()]);
        }else{
            return response()->json(['success'=>false,'message'=>'Invalid Id given','data'=>array()]);
        }
    }
    public function expend_delete(Request $request){
        $validator = Validator::make($request->all(), ['id'=>'required|integer|exists:expend_cards,id']);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'message' => $validator->errors()->first(),'data'=>array()]);
        }
        $expendCard=ExpendCard::find($request->id);
        if($expendCard){
            $expendCard->update(['deleted_at' => Carbon::now()]);
            return response()->json(['success'=>true,'message'=>'Expend Card deleted successfully done','data'=>array()]);
        }else{
            return response()->json(['success'=>false,'message'=>'Invalid Id given','data'=>array()]);
        }
    }
}
