<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreditNotes;
use Auth,Log;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Job_title;
use App\Models\Supplier;
use App\Models\Product_category;
use App\Models\CreditNote;
use App\Models\CreditNoteProduct;

class CreditNotesController extends Controller
{
    public function credit_notes(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $lastSegment = $request->list_mode;
        $segment_check=$this->check_segment_CreditNote($lastSegment);
        // echo "<pre>"; print_r($segment_check);die;
        $data['list']=CreditNote::with('suppliers','creditNoteProducts')->where(['loginUserId'=>Auth::user()->id,'deleted_at'=>null,'status'=>$segment_check['status']])->get();
        $data['status']=$segment_check;
        $data['approvedtCount']=CreditNote::where(['loginUserId'=>Auth::user()->id,'deleted_at'=>null,'status'=>1])->count();
        $data['paidCount']=CreditNote::where(['loginUserId'=>Auth::user()->id,'deleted_at'=>null,'status'=>2])->count();
        $data['cancelledCount']=CreditNote::where(['loginUserId'=>Auth::user()->id,'deleted_at'=>null,'status'=>0])->count();
       
        // $data['users'] = User::where('home_id', $home_id)->select('id', 'name','email','phone_no')->where('is_deleted', 0)->get();
        
        // echo "<pre>";print_r($data['list']);die;
        // $data['list']=array();
        return view('frontEnd.salesAndFinance.credit_notes.credit_notes_list',$data);
    }
    private function check_segment_CreditNote($lastSegment=null){
        if($lastSegment === 'Approved'){
            return ['status'=>1,'list_status'=>'Approved'];
        }else if($lastSegment === 'Paid'){
            return ['status'=>2,'list_status'=>'Paid'];
        }else{
            return ['status'=>0,'list_status'=>'Cancelled'];
        }
    }
    public function new_credit_notes(Request $request){
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $data['home_id']=$home_id;
        $key=base64_decode($request->key);
        // $purchase_orders=CreditNote::find($key);
        // $data['purchase_orders']=$purchase_orders;
        $data['country']=Country::all_country_list();
        $data['currency']=Currency::where(['status'=>1,'deleted_at'=>null])->get();
        $data['job_title']=Job_title::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['suppliers']=Supplier::allGetSupplier($home_id,$user_id)->where('status',1)->get();
        $data['product_categories'] = Product_category::with('parent', 'children')->where('home_id',Auth::user()->home_id)->where('status',1)->where('deleted_at',NULL)->get();
        return view('frontEnd.salesAndFinance.credit_notes.new_credit_notes',$data);
    }
    public function credit_notes_save(CreditNotes $request){
        $validated = $request->validated();
        // echo "<pre>";print_r($request->all());die;
        if(empty($request->product_id) && !isset($request->product_id)){
            return response()->json(['vali_error' => 'Please add at least one product for Credit Note.']);
        }
        try {
            $requestData=$request->all();
            if($request->id == ''){
                $credit_ref=$this->create_credit_ref();
                $requestData['credit_ref'] = $credit_ref;
            }
            // echo "<pre>";print_r($requestData);die;
            $requestData['home_id']=Auth::user()->home_id;
            $requestData['loginUserId']=Auth::user()->id;
            $credit_notes=CreditNote::saveCreditNotes($requestData);
            if(!empty($request->product_id) && count($request->product_id)>0){
                $requestData['credi_note_id'] = $credit_notes->id;
                $credit_notesProduct=$this->savecredit_notesProduct($requestData);
                $responseData = $credit_notesProduct->getData(true);
                if (empty($responseData['success']) || $responseData['success'] === false) {
                    return response()->json(['success' => false,'message' => 'Something went wrong.','data' => $responseData,]);
                }
            }
            if($request->id == ''){
                return response()->json(['success' => true,'message'=>'The Credit Note has been saved succesfully.', 'data' => $credit_notes]);
            }else{
                return response()->json(['success' => true,'message'=>'The Credit Note has been updated succesfully.', 'data' => $credit_notes]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    private function create_credit_ref(){
        $credit_count=CreditNote::count();
        if($credit_count == 0 || $credit_count <10){
           return $credit_ref='CN-00'.$credit_count+1;
        }else if($credit_count >=10 && $credit_count<100){
           return $credit_ref='CN-0'.$credit_count+1;
        }else{
            return $credit_ref='CN-'.$credit_count+1;
        }
    }
    public function savecredit_notesProduct($data){
        // echo "<pre>";print_r($data);die;
        try {
            $product_ids = $data['product_id'];
            $success = 0;

            for ($i = 0; $i < count($product_ids); $i++) {
                $productData = [
                    'id'=>$data['purchase_product_id'][$i] ?? null,
                    'user_id'=>Auth::user()->id,
                    'userType'=>2,
                    'credi_note_id' => $data['credi_note_id'],
                    'product_id' => $product_ids[$i],
                    'description' => $data['description'][$i] ?? null,
                    'accountCode_id' => $data['accountCode_id'][$i] ?? null,
                    'qty' => $data['qty'][$i] ?? 0,
                    'price' => $data['price'][$i] ?? 0,
                    'vat_id' => $data['vat_id'][$i] ?? null,
                    'vat' => $data['vat_ratePercentage'][$i] ?? 0,
                    'outstanding_amount'=>0
                ];
                // echo "<pre>";print_r($productData);die;
                $credit_notesProduct = CreditNoteProduct::saveCreditProduct($productData);
                if ($credit_notesProduct) {
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
}
