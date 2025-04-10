<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth;

class PreInvoiceController extends Controller
{
    public function index(Request $request, $service_user_id){
        $data['service_user_id']=$service_user_id;
        $data['child'] = DB::table('service_user')->where('id', $service_user_id)->where('is_deleted', '0')->first();
        // echo "<pre>";print_r($data['child']);die;
        return view('frontEnd.salesAndFinance.pre_invoice.pre_invoice',$data);
    }
    public function preinvoice_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $loggedUserId=Auth::user()->id;
        $home_id=Auth::user()->home_id;
        $child_id=$request->child_id;
        if(isset($request->currentRateStart_date) && count($request->currentRateStart_date) > 0){
            for($i=0;$i<count($request->currentRateStart_date);$i++){
                $data=[
                    'loggedUserId'  =>  $loggedUserId,
                    'home_id'       =>  $home_id,
                    'child_id'=>$child_id,
                    'start_date'=>$request->currentRateStart_date[$i],
                    'end_date'=>$request->currentRateEnd_date[$i],
                    'no_of_days'=>$request->currentRateNo_of_days[$i],
                    'rate'=>$request->currentRateWeekly_rate[$i],
                    'total_cost'=>$request->currentRateTotalCost[$i],
                    'type'=>1,
                ];
                echo "<pre>";print_r($data);die;
            }
        }
    }
}
