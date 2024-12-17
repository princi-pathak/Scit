<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Auth;
use App\Models\Currency;
use App\Models\Country;
use App\Models\Supplier;
use App\Models\Job_title;
use App\Models\SupplierAttachment;
use App\Models\Constructor_additional_contact;

class SupplierController extends Controller
{
    public function index(Request $request){
        echo 1;
    }
    public function supplier_add(Request $request){
        $key=base64_decode($request->key);
        $home_id=Auth::user()->home_id;
        $data['supplier']=Supplier::find($key);
        $data['currency']=Currency::where(['status'=>1,'deleted_at'=>null])->get();
        $data['country']=Country::all_country_list();
        $data['job_title']=Job_title::where(['home_id'=>$home_id,'status'=>1])->get();
        // echo "<pre>";print_r($data['job_title']);die;
        return view('frontEnd.salesAndFinance.supplier.add_supplier',$data);
    }
    public function supplier_save(Request $request){
        // echo "<>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact_name' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try {
            $requestData=$request->all();
            $requestData['home_id']=$home_id;
            $requestData['user_id']=$user_id;
            $supplier=Supplier::supplierSave($requestData);
            if($request->id == ''){
                return response()->json(['success' => true,'message'=>'The Supplier has been saved succesfully.', 'supplier' => $supplier]);
            }else{
                return response()->json(['success' => true,'message'=>'The Supplier has been updated succesfully.', 'supplier' => $supplier]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function supplier_list(Request $request){
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $table_status=($request->list_mode === 'ACTIVE' ? 1 : 0);
        $data['supplier_list']=Supplier::allGetSupplier($home_id,$user_id)->where('status',$table_status)->get();
        $data['CountActiveSupplier']=Supplier::allGetSupplier($home_id,$user_id)->where('status',1)->count();
        $data['CountInactiveSupplier']=Supplier::allGetSupplier($home_id,$user_id)->where('status',0)->count();
        // echo "<pre>";print_r($data['supplier_list']);die;
        $data['table_status']=$table_status;
        return view('frontEnd.salesAndFinance.supplier.supplier',$data);
    }
    public function supplier_attachment_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        if($request->attachment_id !=''){
            $array=[
                'supplier_id' => 'required',
                'title' => 'required',
            ];
        }else{
            $array=[
                'supplier_id' => 'required',
                'title' => 'required',
                'attachment' => 'required',
            ]; 
            if($request->reminder == 1){
                $array= [
                    'supplier_id' => 'required',
                    'reminder_date' => 'required',
                    'reminder_email' => 'required',
                    'attachment' => 'required',
                    'title' => 'required',
                ];
            }
        }
        $validator = Validator::make($request->all(), $array);
        
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try {
            if ($request->hasFile('attachment')) {
                $imageName = time().'.'.$request->attachment->extension();      
                $request->attachment->move(public_path('images/supplier_attachments'), $imageName);
                $original_name=$request->attachment->getClientOriginalName();
                $requestData = $request->all();
                $requestData['attachment'] = $imageName;
                $requestData['file_original_name'] = $original_name;
            } else {
                $requestData = $request->all();
            }
            $requestData['id']=$request->attachment_id ?? null;
            // echo "<pre>";print_r($requestData);die;
            $supplier_attachment=SupplierAttachment::supplierAttachmentSave($requestData);
            if($request->attachment_id == ''){
                return response()->json(['success' => true,'message'=>'The Attachment has been saved succesfully.', 'attachment' => $supplier_attachment]);
            }else{
                return response()->json(['success' => true,'message'=>'The Attachment has been updated succesfully.', 'attachment' => $supplier_attachment]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getAllSupplierAttachment(Request $request){
        $supplier_id=$request->supplier_id;
        $all_data=SupplierAttachment::getAllSupplierAttachment()->where('supplier_id',$supplier_id)->orderBy('id', 'desc')
        ->paginate(10);
        return response()->json([
            'success' => true, 'data' => $all_data, 
            'pagination' => [
                    'total' => $all_data->total(),
                    'current_page' => $all_data->currentPage(),
                    'last_page' => $all_data->lastPage(),
                    'per_page' => $all_data->perPage(),
                    'next_page_url' => $all_data->nextPageUrl(),
                    'prev_page_url' => $all_data->previousPageUrl(),
                ]
        ]);
    }
    public function supplier_attachment_image_delete(request $request){
        // echo "<pre>";print_r($request->all());die;
        try {
            $attachment=SupplierAttachment::find($request->id)->update(['deleted_at' => now()]); 
            return true;
        }
        catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
        }
    }
    public function get_supplier_details(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $supplier_id=$request->supplier_id;
        $data=Supplier::with('contacts')->where('id',$supplier_id)->first();
        return response()->json(['success'=>true,'data'=>$data]);
    }
    
}
