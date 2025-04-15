<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB,Auth;
use Carbon\Carbon;
use App\Models\PreInvoiceVat;
use App\Models\PreInvoice;
use App\Models\PreSubsInvoice;
use App\Models\PreInvoiceAdditionalHour;
use App\Models\PreInvoiceExtrasWeekly;

class PreInvoiceController extends Controller
{
    public function index(Request $request, $service_user_id){
        $data['service_user_id']=$service_user_id;
        $data['child'] = DB::table('service_user')->where('id', $service_user_id)->where('is_deleted', '0')->first();
        $data['PreInvoiceVat']=PreInvoiceVat::whereNull('deleted_at')->orderBy('id','desc')->first();
        $data['PreInvoiceList']=PreInvoice::where('child_id',$service_user_id)->whereNull('deleted_at')->get();
        // echo "<pre>";print_r($data['child']);die;
        return view('frontEnd.salesAndFinance.pre_invoice.pre_invoice',$data);
    }
    public function preinvoice_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $loggedUserId=Auth::user()->id;
        $home_id=Auth::user()->home_id;
        $child_id=$request->child_id;
        $validator = Validator::make($request->all(), [
            'currentRateStart_date' => 'required|array',
            'currentRateStart_date.*' => 'required|string',
            'currentRateEnd_date' => 'required|array',
            'currentRateEnd_date.*' => 'required|string',
            'currentRateNo_of_days' => 'required|array',
            'currentRateNo_of_days.*' => 'required|string',
            'currentRateWeekly_rate' => 'required|array',
            'currentRateWeekly_rate.*' => 'required|string',
            'currentRateTotalCost' => 'required|array',
            'currentRateTotalCost.*' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        if(isset($request->currentRateStart_date) && count($request->currentRateStart_date) > 0){
            for($i=0;$i<count($request->currentRateStart_date);$i++){
                $data1=[
                    'loggedUserId'  =>  $loggedUserId,
                    'home_id'       =>  $home_id,
                    'child_id'      =>  $child_id,
                    'start_date'    =>  Carbon::createFromFormat('d/m/Y', $request->currentRateStart_date[$i])->format('Y-m-d'),
                    'end_date'      =>  Carbon::createFromFormat('d/m/Y', $request->currentRateEnd_date[$i])->format('Y-m-d'),
                    'no_of_days'    =>  $request->currentRateNo_of_days[$i],
                    'current_rate'  =>  $request->currentRateWeekly_rate[$i],
                    'total_cost'    =>  $request->currentRateTotalCost[$i],
                ];
                try {
                    $PreInvoice1= PreInvoice::savePreInvoice($data1);
                    $PreInvoice2=$this->saveSubs($request->all(),$loggedUserId,$home_id,$child_id,$PreInvoice1->id);
                    $PreInvoice3=$this->saveAdditionalHour($request->all(),$loggedUserId,$home_id,$child_id,$PreInvoice1->id);
                    $PreInvoice4=$this->saveExtrasWeekly($request->all(),$loggedUserId,$home_id,$child_id,$PreInvoice1->id);
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            }
        }
        // $PreInvoice5=$this->saveExtrasOneOff($request->all(),$loggedUserId,$home_id,$child_id);
        return response()->json(['success'=>true,'message'=>'Pre-Invoice Added Successfully']);
    }
    public function saveSubs($data,$loggedUserId,$home_id,$child_id,$current_id){
        // echo "<pre>";print_r($data);die;
        if(isset($data['subsEnd_date']) && count($data['subsEnd_date']) > 0){
            for($i2=0;$i2<count($data['subsEnd_date']);$i2++){
                $data2=[
                    'loggedUserId'  =>  $loggedUserId,
                    'home_id'       =>  $home_id,
                    'child_id'      =>  $child_id,
                    'current_id'    =>  $current_id,
                    'subs_start_date'    =>  Carbon::createFromFormat('d/m/Y', $data['subsStart_date'][$i2])->format('Y-m-d'),
                    'subs_end_date'      =>  Carbon::createFromFormat('d/m/Y', $data['subsEnd_date'][$i2])->format('Y-m-d'),
                    'subs_no_of_days'    =>  $data['subsNo_of_days'][$i2],
                    'subs_rate'          =>  $data['subsWeeklyRate'][$i2],
                    'subs_total_cost'    =>  $data['subsTotalCost'][$i2],
                ];
                try {
                    $PreInvoice2= PreSubsInvoice::savePreSubsInvoice($data2);
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            }
            return $PreInvoice2;
        }
        return 0;
    }
    public function saveAdditionalHour($data,$loggedUserId,$home_id,$child_id,$current_id){
        if(isset($data['additionalHours_End_date']) && count($data['additionalHours_End_date']) > 0){
            for($i3=0;$i3<count($data['additionalHours_End_date']);$i3++){
                $data3=[
                    'loggedUserId'          =>  $loggedUserId,
                    'home_id'               =>  $home_id,
                    'child_id'              =>  $child_id,
                    'current_id'            =>  $current_id,
                    'addHour_start_date'    =>  Carbon::createFromFormat('d/m/Y', $data['additionalHours_Start_date'][$i3])->format('Y-m-d'),
                    'addHour_end_date'      =>  Carbon::createFromFormat('d/m/Y', $data['additionalHours_End_date'][$i3])->format('Y-m-d'),
                    'addHour_no_of_days'    =>  $data['additionalHours_No_of_days'][$i3],
                    'addHour_rate'          =>  $data['additionalHours_Hourly_rate'][$i3],
                    'addHour_total_cost'    =>  $data['additionalHours_TotalCost'][$i3],
                    'additional_per_week'   =>  $data['additionalHours_HoursPerWeek'][$i3],
                ];
                // echo "<pre>";print_r($data3);die;
                try {
                    $PreInvoice3= PreInvoiceAdditionalHour::savePreInvoiceAdditionalHour($data3);
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            }
            return $PreInvoice3;
        }
        return 0;
    }
    public function saveExtrasWeekly($data,$loggedUserId,$home_id,$child_id,$current_id){
        // echo "<pre>";print_r(count($data['additionalExtrasWeekly_ExpenditureType']));die;
        if(isset($data['additionalExtrasWeekly_End_date']) && count($data['additionalExtrasWeekly_End_date']) > 0){
            for($i4=0;$i4<count($data['additionalExtrasWeekly_End_date']);$i4++){
                $data4=[
                    'loggedUserId'      =>  $loggedUserId,
                    'home_id'           =>  $home_id,
                    'child_id'          =>  $child_id,
                    'current_id'        => $current_id,
                    'extras_weekly_start_date'        =>  Carbon::createFromFormat('d/m/Y', $data['additionalExtrasWeekly_Start_date'][$i4])->format('Y-m-d'),
                    'extras_weekly_end_date'          =>  Carbon::createFromFormat('d/m/Y', $data['additionalExtrasWeekly_End_date'][$i4])->format('Y-m-d'),
                    'extras_weekly_no_of_days'        =>  $data['additionalExtrasWeekly_No_of_Days'][$i4],
                    'extras_weekly_amount'            =>  $data['additionalExtrasWeekly_Weekly_amount'][$i4],
                    'extras_weekly_total_cost'        =>  $data['additionalExtrasWeekly_Total_Cost'][$i4],
                    'extras_weekly_expenditure_type'  =>  $data['additionalExtrasWeekly_ExpenditureType'][$i4],
                ];
                // echo "<pre>";print_r($data4);die;
                try {
                    $PreInvoice4= PreInvoiceExtrasWeekly::savePreInvoiceExtrasWeekly($data4);
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            }
            return $PreInvoice4;
        }
        return 0;
    }
    public function saveExtrasOneOff($data,$loggedUserId,$home_id,$child_id){
        if(isset($data['additionalExtrasOneOff_Start_date']) && count($data['additionalExtrasOneOff_Start_date']) > 0){
            for($i5=0;$i5<count($data['additionalExtrasOneOff_Start_date']);$i5++){
                $data5=[
                    'loggedUserId'      =>  $loggedUserId,
                    'home_id'           =>  $home_id,
                    'child_id'          =>  $child_id,
                    'start_date'        =>  Carbon::createFromFormat('d/m/Y', $data['additionalExtrasOneOff_Start_date'][$i5])->format('Y-m-d'),
                    'rate'              =>  $data['additionalExtrasOneOff_Amount'][$i5],
                    'total_cost'        =>  $data['additionalExtrasOneOff_Total_cost'][$i5],
                    'expenditure_type'  =>  $data['additionalExtrasOneOff_Expediture_type'][$i5],
                    'type'              =>  5,
                ];
                // echo "<pre>";print_r($data5);die;
                try {
                    $PreInvoice5= PreInvoice::savePreInvoice($data5);
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            }
            return $PreInvoice5;
        }
        return 0;
    }
    public function preview(){
        echo 12;
    }
}
