<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth;
use App\Models\PreInvoiceVat;

class PreInvoiceController extends Controller
{
    public function index(Request $request, $service_user_id){
        $data['service_user_id']=$service_user_id;
        $data['child'] = DB::table('service_user')->where('id', $service_user_id)->where('is_deleted', '0')->first();
        $data['PreInvoiceVat']=PreInvoiceVat::whereNull('deleted_at')->orderBy('id','desc')->first();
        // echo "<pre>";print_r($data['child']);die;
        return view('frontEnd.salesAndFinance.pre_invoice.pre_invoice',$data);
    }
    public function preinvoice_save(Request $request){
        echo "<pre>";print_r($request->all());die;
        $loggedUserId=Auth::user()->id;
        $home_id=Auth::user()->home_id;
        $child_id=$request->child_id;
        if(isset($request->currentRateStart_date) && count($request->currentRateStart_date) > 0){
            for($i=0;$i<count($request->currentRateStart_date);$i++){
                $data=[
                    'loggedUserId'  =>  $loggedUserId,
                    'home_id'       =>  $home_id,
                    'child_id'      =>  $child_id,
                    'start_date'    =>  $request->currentRateStart_date[$i],
                    'end_date'      =>  $request->currentRateEnd_date[$i],
                    'no_of_days'    =>  $request->currentRateNo_of_days[$i],
                    'rate'          =>  $request->currentRateWeekly_rate[$i],
                    'total_cost'    =>  $request->currentRateTotalCost[$i],
                    'type'          =>  1,
                ];
                echo "<pre>";print_r($data);die;
            }
        }
        if(isset($request->subsStart_date) && count($request->subsStart_date) > 0){
            for($ii=0;$ii<count($request->subsStart_date);$ii++){
                $data=[
                    'loggedUserId'  =>  $loggedUserId,
                    'home_id'       =>  $home_id,
                    'child_id'      =>  $child_id,
                    'start_date'    =>  $request->subsStart_date[$ii],
                    'end_date'      =>  $request->subsEnd_date[$ii],
                    'no_of_days'    =>  $request->subsNo_of_days[$ii],
                    'rate'          =>  $request->subsWeeklyRate[$ii],
                    'total_cost'    =>  $request->subsTotalCost[$ii],
                    'type'          =>  2,
                ];
                echo "<pre>";print_r($data);die;
            }
        }
        if(isset($request->additionalHours_HoursPerWeek) && count($request->additionalHours_HoursPerWeek) > 0){
            for($iii=0;$iii<count($request->additionalHours_HoursPerWeek);$iii++){
                $data=[
                    'loggedUserId'  =>  $loggedUserId,
                    'home_id'       =>  $home_id,
                    'child_id'      =>  $child_id,
                    'start_date'    =>  $request->additionalHours_Start_date[$iii],
                    'end_date'      =>  $request->additionalHours_End_date[$iii],
                    'no_of_days'    =>  $request->additionalHours_No_of_days[$iii],
                    'rate'          =>  $request->additionalHours_Hourly_rate[$iii],
                    'total_cost'    =>  $request->additionalHours_TotalCost[$iii],
                    'hours_per_week'=>  $request->additionalHours_HoursPerWeek[$iii],
                    'type'          =>  3,
                ];
                echo "<pre>";print_r($data);die;
            }
        }
        if(isset($request->additionalExtrasWeekly_ExpenditureType) && count($request->additionalExtrasWeekly_ExpenditureType) > 0){
            for($iiii=0;$iiii<count($request->additionalExtrasWeekly_ExpenditureType);$iiii){
                $data=[
                    'loggedUserId'  =>  $loggedUserId,
                    'home_id'       =>  $home_id,
                    'child_id'      =>  $child_id,
                    'start_date'    =>  $request->additionalExtrasWeekly_Start_date[$iiii],
                    'end_date'      =>  $request->additionalExtrasWeekly_End_date[$iiii],
                    'no_of_days'    =>  $request->additionalExtrasWeekly_No_of_Days[$iiii],
                    'rate'          =>  $request->additionalExtrasWeekly_Weekly_amount[$iiii],
                    'total_cost'    =>  $request->additionalExtrasWeekly_Total_Cost[$iiii],
                    'expenditure_type'=>  $request->additionalExtrasWeekly_ExpenditureType[$iiii],
                    'type'          =>  4,
                ];
                echo "<pre>";print_r($data);die;
            }
        }
        if(isset($request->additionalExtrasOneOff_Expediture_type) && count($request->additionalExtrasOneOff_Expediture_type)){
            for($iiiii=0;$iiiii<count($request->additionalExtrasOneOff_Expediture_type);$iiiii++){
                $data=[
                    'loggedUserId'  =>  $loggedUserId,
                    'home_id'       =>  $home_id,
                    'child_id'      =>  $child_id,
                    'start_date'    =>  $request->additionalExtrasOneOff_Start_date[$iiii],
                    'rate'          =>  $request->additionalExtrasWeekly_Weekly_amount[$iiii],
                    'total_cost'    =>  $request->additionalExtrasOneOff_Total_cost[$iiii],
                    'expenditure_type'=>  $request->additionalExtrasOneOff_Expediture_type[$iiii],
                    'type'          =>  4,
                ];
                echo "<pre>";print_r($data);die;
            }
        }
    }
}
