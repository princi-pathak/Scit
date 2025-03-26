<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Construction_account_code;
use App\Models\Construction_tax_rate;
use App\Models\Country;
use App\Models\Customer_type;
use App\Models\Job_title;
use App\Models\Currency;
use App\Models\Region;
use App\Models\Product_category;
use App\Models\Invoice\Invoice;

use App\Http\Controllers\frontEnd\salesFinance\CustomerController;

class InvoiceController extends Controller
{

    public function dashboard(){
        return view('frontEnd.salesAndFinance.invoice.dashboard');
    }
    public function account_codes(Request $request){
        $home_id = Auth::user()->home_id;
        $data['account_codes']=Construction_account_code::getAllAccount_Codes($home_id);
        $data['home_id']=$home_id;
        $data['page']='setting';
        return view('frontEnd.salesAndFinance.jobs.account_code',$data);
    }

    public function save_account_code(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try {
            $data=Construction_account_code::saveAccount_Codes(array_merge(['home_id' => Auth::user()->home_id], $request->all()));
            return response()->json(['data' => $data,  'message' => $data ? "Account Code save succcessfully" : 'Account Code could not be added.']);
        } catch (\Exception $e) {
            Log::error('Error saving Tag: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to save Tag. Please try again.'], 500);
        }
    }

    public function tax_rate(Request $request){
        $mode=$request->mode;
        $home_id = Auth::user()->home_id;
        $data['tax_rate'] = Construction_tax_rate::getAllTax_rate($home_id,$mode);
        $data['home_id'] = $home_id;
        $data['page']='setting';
        return view('frontEnd.salesAndFinance.jobs.tax_rate',$data);
    }

    public function save_tax_rate(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:construction_tax_rates,name|string',
            'tax_rate' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try{
            $data=Construction_tax_rate::saveTax_rate($request->all());
            if($request->id == ''){
                return response()->json(['success'=>true,'message'=>'Tax Rate added successfully done','data' => $data]);
            }else{
                return response()->json(['success'=>true,'message'=>'Tax Rate updated successfully done','data' => $data]);
            }
        }catch (\Exception $e) {
            Log::error('Error saving Tag: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }

    public function getAccountCode(){
        $data =  Construction_account_code::getAllAccount_Codes(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function getActiveAccountCode(){
        $data =  Construction_account_code::getActiveAccountCode(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function getActiveTaxRate(){
        $data = Construction_tax_rate::getAllTax_rate(Auth::user()->home_id, "Active");

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function getTaxRateOnTaxId(Request $request){

        $data = Construction_tax_rate::getTaxRateOnId($request->id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function create(CustomerController $customer){
        $data['page'] = "invoice";
        $home_id = Auth::user()->home_id;
        $data['customers'] =  $customer->getAllCustomerList()->getData()->data;
        $data['countries'] = Country::getCountriesNameCode();
        $data['customer_types']=Customer_type::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['job_title']=Job_title::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['country']=Country::all_country_list();
        $data['currency']=Currency::where(['status'=>1,'deleted_at'=>null])->get();
        $data['region']=Region::where(['home_id'=>$home_id,'status'=>1,'deleted_at'=>null])->get();
        $data['product_categories'] = Product_category::with('parent', 'children')->where('home_id',Auth::user()->home_id)->where('status',1)->where('deleted_at',NULL)->get();
        // dd($data);
        return view('frontEnd.salesAndFinance.invoice.invoice_form', $data);
    }
    public function invoice_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        
        $validator = Validator::make($request->all(), [
            'customer_id'=>'required',
            'name'=>'required',
            'address'=>'required',
            'invoice_date'=>'required',
            'due_date'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        // if(empty($request->product_id) && !isset($request->product_id)){
        //     return response()->json(['vali_error' => 'Please add at least one product for purchase order.']);
        // }
        try {
            // if(!empty($request->purchaseattachment_id)){
            //     $purchaseattachment_id=$request->purchaseattachment_id;
            //     for($i=0;$i<count($purchaseattachment_id);$i++){
            //         $poTable=PoAttachment::find($purchaseattachment_id[$i]);
            //         $poTable->title=$request->purchaseattachment_title[$i];
            //         $poTable->save();
            //     }
            // }
            
            $requestData = $request->all();
            if($request->id == ''){
                $inv_ref=$this->create_invoice_ref();
                $requestData['invoice_ref'] = $inv_ref;
            }
            $requestData['home_id'] = $home_id;
            $requestData['sub_total'] = 0;
            $requestData['deposit_percentage'] = 0;
            $requestData['VAT_id'] = 0;
            $requestData['VAT_amount'] = 0;
            $requestData['Total'] = 0;
            // $requestData['invoice_date'] = Carbon::createFromFormat('d/m/Y', $request->invoice_date)->format('Y-m-d');
            // $requestData['due_date'] = Carbon::createFromFormat('d/m/Y', $request->due_date)->format('Y-m-d');
            
            // echo "<pre>";print_r($requestData);die;
            $invoice=Invoice::saveInvoice($requestData);
            // if(!empty($request->product_id) && count($request->product_id)>0){
            //     $requestData['purchase_order_id'] = $invoice->id;
            //     $PurchaseOrderProduct=$this->savePurchaseOrderProduct($requestData);
            //     $responseData = $PurchaseOrderProduct->getData(true);
            //     if (empty($responseData['success']) || $responseData['success'] === false) {
            //         return response()->json(['success' => false,'message' => 'Something went wrong.','data' => [],]);
            //     }
            // }
            if($request->id == ''){
                return response()->json(['success' => true,'message'=>'The Invoice has been saved succesfully.', 'data' => $invoice]);
            }else{
                return response()->json(['success' => true,'message'=>'The Invoice has been updated succesfully.', 'data' => $invoice]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    
    }
    private function create_invoice_ref(){
        $invoice_count=Invoice::count();
        if($invoice_count == 0 || $invoice_count <10){
           return $invoice_ref='Inv-00'.$invoice_count+1;
        }else if($invoice_count >=10 && $invoice_count<100){
           return $invoice_ref='Inv-0'.$invoice_count+1;
        }else{
            return $invoice_ref='Inv-'.$invoice_count+1;
        }
    }

    
}
