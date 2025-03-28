<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use PDF;
use App\Models\Construction_account_code;
use App\Models\Construction_tax_rate;
use App\Models\Country;
use App\Models\Customer_type;
use App\Models\Job_title;
use App\Models\Currency;
use App\Models\Region;
use App\Models\Product_category;
use App\Models\Invoice\Invoice;
use App\Models\Invoice\InvoiceProduct;
use App\Admin;
use App\Models\Project;
use App\Models\Constructor_additional_contact;
use App\Models\Constructor_customer_site;

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

    public function create(Request $request,CustomerController $customer){
        // echo "<pre>";print_r($request->all());die;
        $id=base64_decode($request->key);
        $data['page'] = "invoice";
        $home_id = Auth::user()->home_id;
        $invoice=Invoice::find($id);
        $projects=array();
        $additional_contact=array();
        $site=array();
        if($invoice){
            $projects=Project::where(['status'=>1,'home_id'=>$home_id])->get();
            $additional_contact = Constructor_additional_contact::where(['home_id'=> $home_id,'userType'=>1,'customer_id'=>$invoice->customer_id,'deleted_at'=>null])->get();
            $site=Constructor_customer_site::where('customer_id',$invoice->customer_id)->get();
        }
        $data['projects']=$projects;
        $data['additional_contact']=$additional_contact;
        $data['site']=$site;
        $data['customers'] =  $customer->getAllCustomerList()->getData()->data;
        $data['countries'] = Country::getCountriesNameCode();
        $data['customer_types']=Customer_type::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['job_title']=Job_title::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['country']=Country::all_country_list();
        $data['currency']=Currency::where(['status'=>1,'deleted_at'=>null])->get();
        $data['region']=Region::where(['home_id'=>$home_id,'status'=>1,'deleted_at'=>null])->get();
        $data['product_categories'] = Product_category::with('parent', 'children')->where('home_id',Auth::user()->home_id)->where('status',1)->where('deleted_at',NULL)->get();
        $data['invoice']=$invoice;
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
        if(empty($request->product_id) && !isset($request->product_id)){
            return response()->json(['vali_error' => 'Please add at least one product for purchase order.']);
        }
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
            $requestData['outstanding'] = 0;
            // $requestData['invoice_date'] = Carbon::createFromFormat('d/m/Y', $request->invoice_date)->format('Y-m-d');
            // $requestData['due_date'] = Carbon::createFromFormat('d/m/Y', $request->due_date)->format('Y-m-d');
            
            // echo "<pre>";print_r($requestData);die;
            $invoice=Invoice::saveInvoice($requestData);
            if(!empty($request->product_id) && count($request->product_id)>0){
                $requestData['invoice_id'] = $invoice->id;
                $InvoiceProduct=$this->saveInvoiceProduct($requestData);
                $responseData = $InvoiceProduct->getData(true);
                if (empty($responseData['success']) || $responseData['success'] === false) {
                    return response()->json(['success' => false,'message' => 'Something went wrong.','data' => [],]);
                }
            }
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
    public function saveInvoiceProduct($data){
        // echo "<pre>";print_r($data);die;
        try {
            $product_ids = $data['product_id'];
            $success = 0;
            $outstandignAmount=0;
            for ($i = 0; $i < count($product_ids); $i++) {
                $sub_total=$data['qty'][$i]*$data['price'][$i];
                $vatPercentage=$sub_total*$data['vat_ratePercentage'][$i]/100;
                $outstandignAmount=$outstandignAmount+$sub_total+$vatPercentage;
                $productData = [
                    'id'=>$data['purchase_product_id'][$i] ?? null,
                    'home_id'=>Auth::user()->home_id,
                    'customer_id'=>$data['customer_id'],
                    'invoice_id' => $data['invoice_id'],
                    'product_id' => $product_ids[$i],
                    'description' => $data['description'][$i] ?? null,
                    'code' => $data['code'][$i] ?? null,
                    'accountCode_id' => $data['accountCode_id'][$i] ?? null,
                    'qty' => $data['qty'][$i] ?? 0,
                    'price' => $data['price'][$i] ?? 0,
                    'vat_id' => $data['vat_id'][$i] ?? null,
                    'vat' => $data['vat_ratePercentage'][$i] ?? 0,
                    'discount' => $data['discount'][$i] ?? 0,
                    'discount_type' => $data['discount_type'][$i] ?? 0,
                ];
                Invoice::find($data['invoice_id'])->update(['outstanding' => $outstandignAmount]);
                // echo "<pre>";print_r($productData);die;
                $InvoiceProduct = InvoiceProduct::saveInvoiceProduct($productData);
                if ($InvoiceProduct) {
                    $success++;
                }
            }
            if ($success === count($product_ids)) {
                return response()->json(['success' => true, 'message' => 'All products saved successfully.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Some products could not be saved.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function invoice(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $data['key_mode']=$request->key;
        $data['invoice']=Invoice::with('customers','invoiceProducts','sites')->where('status',$request->key)->whereNull('deleted_at')->get();
        $data['draft_invoice']=Invoice::getAllInvoices(Auth::user()->home_id)->where('status','Draft')->count();
        $data['outstanding_invoice']=Invoice::getAllInvoices(Auth::user()->home_id)->where('status','Outstanding')->count();
        $data['overdue_invoice']=Invoice::getAllInvoices(Auth::user()->home_id)->where('status','Overdue')->count();
        $data['paid_invoice']=Invoice::getAllInvoices(Auth::user()->home_id)->where('status','Paid')->count();
        // echo "<pre>";print_r($data['invoice']);die;
        return view('frontEnd.salesAndFinance.invoice.invoice_list', $data);
    }
    public function preview(Request $request){
        // echo "<pre>";print_r(Auth::user());die;
        // echo "<pre>";print_r($request->all());die;
        try{
            $invoice_id=base64_decode($request->key);
            if($request->url === 'print'){
                $invoice_table=Invoice::find($invoice_id);
                $invoice_table->is_printed=1;
                $invoice_table->save();
            }
            die;
            $invoice_details=Invoice::with('customers','invoiceProducts')->where(['id' => $invoice_id, 'deleted_at' => null])
            ->first();
            // $site_detail=Customer::find($invoice_details->customer_id);
			// echo "<pre>";print_r($site_detail);die;
            // echo "<pre>";print_r($invoice_details);die;
            
            $data=[
                'email'=>Auth::user()->email,
                'phone_no'=>Auth::user()->phone_no,
                'job_title'=>Auth::user()->job_title,
                'current_location'=>Auth::user()->current_location,
                'company'=>Admin::find(Auth::user()->company_id)->company ?? "",
                'invoice_details'=>$invoice_details,
            ];
            // echo "<pre>";print_r($data);die;
            $pdf = PDF::loadView('frontEnd.salesAndFinance.purchase_order.purchaseOrderPDF',$data);
            return $pdf->stream('frontEnd.salesAndFinance.purchase_order.purchaseOrderPDF');
            // return $pdf->download('purchaseOrderPDF.pdf');
        }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    
}
