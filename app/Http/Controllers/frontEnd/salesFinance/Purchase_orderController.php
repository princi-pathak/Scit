<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\NewTaskRequest;
use Auth,Log;
use App\Customer;
use App\Models\Department;
use App\Models\Project;
use App\Models\Country;
use App\Models\Tag;
use App\Models\Customer_type;
use App\Models\Constructor_additional_contact;
use App\Models\Job_title;
use App\Models\Region;
use App\Models\Product_category;
use App\Models\Construction_tax_rate;
use App\Models\Construction_account_code;
use App\Models\Construction_job_appointment_type;
use App\Models\Constructor_customer_site;
use App\Models\Job;
use App\Models\Job_type;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Supplier;
use App\Home;
use App\Admin;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderProduct;
use App\Models\AttachmentType;
use App\Models\PoAttachment;
use App\Models\PrucahseOrderNewTask;
use App\Models\Task_type;
use App\User;

class Purchase_orderController extends Controller
{
    public function departments(Request $request){
        $home_id = Auth::user()->home_id;
        $data['department']=Department::getAllDepartment($home_id);
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.department',$data);
    }

    public function save_department(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try {
            $home_id = Auth::user()->home_id;
            $requestData=$request->all();
            $requestData['home_id']=$home_id;
            $data=Department::save_Department($requestData);
            if($request->id == ''){
                return response()->json(['success'=>true,'message'=>'Department Added Successfully Done','data' => $data]);
            }else{
                return response()->json(['success'=>true,'message'=>'Department Updated Successfully Done','data' => $data]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }
    public function purchase_order(Request $request){
        // echo "<pre>";print_r(Auth::user());die;
        $home_id = Auth::user()->home_id;
        $user_id=Auth::user()->id;
        $home_table=Home::find($home_id);
        $data['company_name']=Admin::find($home_table->admin_id)->company;
        $key=base64_decode($request->key);
        $data['key']=$key;
        $purchase_orders=PurchaseOrder::find($key);
        $site=array();
        $contact_name=array();
        $attachments=array();
        if($key){
            $site=Constructor_customer_site::where('customer_id',$purchase_orders->customer_id)->get();
            $contact_name=Customer::find($purchase_orders->customer_id);
        }
        $data['purchase_orders']=$purchase_orders;
        $data['attachments']=$attachments;
        $data['site']=$site;
        $data['projects']=Project::where(['status'=>1,'home_id'=>$home_id])->get();
        $data['customers']=Customer::get_customer_list_Attribute($home_id,'ACTIVE');
        $data['additional_contact'] = Constructor_additional_contact::where(['home_id'=> $home_id,'userType'=>2,'customer_id'=>$key,'deleted_at'=>null])->get();
        $data['country']=Country::all_country_list();
        $data['tag'] = Tag::getAllTag($home_id);
        $data['currency']=Currency::where(['status'=>1,'deleted_at'=>null])->get();
        $data['suppliers']=Supplier::allGetSupplier($home_id,$user_id)->where('status',1)->get();
        $data['department']=Department::getAllDepartment($home_id);
        $data['job_title']=Job_title::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['customer_types']=Customer_type::where(['home_id'=>$home_id,'status'=>1])->get();
        $data['region']=Region::where(['home_id'=>$home_id,'status'=>1,'deleted_at'=>null])->get();
        $data['contact_name']=$contact_name;
        $data['product_categories'] = Product_category::with('parent', 'children')->where('home_id',Auth::user()->home_id)->where('status',1)->where('deleted_at',NULL)->get();
        // echo "<pre>";print_r($data['attachments']);die;
        return view('frontEnd.salesAndFinance.purchase_order.new_purchase_order',$data);
    }
    public function purchase_order_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $user_id=Auth::user()->id;
        
        $validator = Validator::make($request->all(), [
            'supplier_id'=>'required',
            'name'=>'required',
            'address'=>'required',
            'user_name'=>'required',
            'user_address'=>'required',
            'purchase_date'=>'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try {
            if ($request->hasFile('attachment')) {
                $imageName = time().'.'.$request->attachment->extension();      
                $request->attachment->move(public_path('images/purchase_order'), $imageName);
                $original_name=$request->attachment->getClientOriginalName();
                $requestData = $request->all();
                $requestData['attachment'] = $imageName;
                $requestData['file_original_name'] = $original_name;
            } else {
                $requestData = $request->all();
            }
            if($request->id == ''){
                $order_ref=$this->create_purchase_order_ref();
                $requestData['purchase_order_ref'] = $order_ref;
            }
            $requestData['home_id'] = $home_id;
            $requestData['user_id'] = $user_id;
            
            // echo "<pre>";print_r($requestData);die;
            $purchaseOrder=PurchaseOrder::savePurchaseOrder($requestData);
            if(!empty($request->product_id) && count($request->product_id)>0){
                $requestData['purchase_order_id'] = $purchaseOrder->id;
                $PurchaseOrderProduct=$this->savePurchaseOrderProduct($requestData);
                $responseData = $PurchaseOrderProduct->getData(true);
                if (empty($responseData['success']) || $responseData['success'] === false) {
                    return response()->json(['success' => false,'message' => 'Something went wrong.','data' => [],]);
                }
            }
            if($request->id == ''){
                return response()->json(['success' => true,'message'=>'The Purchase Order has been saved succesfully.', 'data' => $purchaseOrder]);
            }else{
                return response()->json(['success' => true,'message'=>'The Purchase Order has been updated succesfully.', 'data' => $purchaseOrder]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    private function create_purchase_order_ref(){
        $order_count=PurchaseOrder::count();
        if($order_count == 0 || $order_count <10){
           return $order_ref='PO-00'.$order_count+1;
        }else if($order_count >=10 && $order_count<100){
           return $order_ref='PO-0'.$order_count+1;
        }else{
            return $order_ref='PO-'.$order_count+1;
        }
    }
    public function getPurchaesOrderProductDetail(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_id=Auth::user()->home_id;
        $purchase_order_products = PurchaseOrder::with(['purchaseOrderProducts'])->where(['id'=> $request->id,'deleted_at'=>null])->orderBy('id', 'desc')->paginate(10);
        // return $purchase_order_products;
        $tax=Product::tax_detail($home_id);
        $all_job=Job::getAllJob($home_id)->where('status',1)->get();
        $accountCode=Construction_account_code::getActiveAccountCode($home_id);
        $data_array = [];
        foreach ($purchase_order_products as $purchase_order) {
            $product=$purchase_order->purchaseOrderProducts->toArray();
            $product_details = $purchase_order->toArray();
            foreach($product as $val){
                // return $val['product_id'];
                $purchase_order_products_detail = Product::product_detail($val['product_id']);

                $data_array[] = [
                    'product_details' => $product_details,
                    'tax'=>$tax,
                    'all_job'=>$all_job,
                    'accountCode'=>$accountCode,
                    'purchase_order_products_detail'=>$purchase_order_products_detail
                ];
            }
            
        }
        // return $data_array;
        return response()->json([
            'success' => true, 'data' => $data_array, 
            'pagination' => [
                    'total' => $purchase_order_products->total(),
                    'current_page' => $purchase_order_products->currentPage(),
                    'last_page' => $purchase_order_products->lastPage(),
                    'per_page' => $purchase_order_products->perPage(),
                    'next_page_url' => $purchase_order_products->nextPageUrl(),
                    'prev_page_url' => $purchase_order_products->previousPageUrl(),
                ]
        ]);
    }
    public function vat_tax_details(Request $request){
        // echo "<pre>";print_r($request->all());
        $dataVat=Construction_tax_rate::getTaxRateOnId($request->vat_id);
        return response()->json(['success'=>true,'data'=>$dataVat]);

    }
    public function savePurchaseOrderProduct($data){
        // echo "<pre>";print_r($data);die;
        try {
            $product_ids = $data['product_id'];
            $success = 0;

            for ($i = 0; $i < count($product_ids); $i++) {
                $productData = [
                    'id'=>$data['purchase_product_id'][$i] ?? null,
                    'user_id'=>Auth::user()->id,
                    'userType'=>2,
                    'purchase_order_id' => $data['purchase_order_id'],
                    'product_id' => $product_ids[$i],
                    'description' => $data['description'][$i] ?? null,
                    'accountCode_id' => $data['accountCode_id'][$i] ?? null,
                    'qty' => $data['qty'][$i] ?? 0,
                    'price' => $data['price'][$i] ?? 0,
                    'vat_id' => $data['vat_id'][$i] ?? null,
                    'vat' => $data['vat'][$i] ?? 0,
                ];
                // echo "<pre>";print_r($productData);die;
                $PurchaseOrderProduct = PurchaseOrderProduct::savePurchaseOrderProduct($productData);
                if ($PurchaseOrderProduct) {
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
    public function purchase_order_attachment_save(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'file' => 'required|file',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        try{
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imageName = time() . '.' . $file->extension();      
                $file->move(public_path('images/purchase_order'), $imageName);
        
                $original_name = $file->getClientOriginalName();
                $mime_type = $file->getMimeType();
                $file_size_bytes = $file->getSize();

                if ($file_size_bytes >= 1073741824) {
                    $file_size = round($file_size_bytes / 1073741824, 2) . ' GB';
                } elseif ($file_size_bytes >= 1048576) { 
                    $file_size = round($file_size_bytes / 1048576, 2) . ' MB';
                } elseif ($file_size_bytes >= 1024) { 
                    $file_size = round($file_size_bytes / 1024, 2) . ' KB';
                } else {
                    $file_size = $file_size_bytes . ' Bytes';
                }

                $requestData = $request->all();
                $requestData['file'] = $imageName;
                $requestData['original_file_name'] = $original_name;
                $requestData['mime_type'] = $mime_type;
                $requestData['size'] = $file_size;
            } else {
                $requestData = $request->all();
            }
            // echo "<pre>";print_r($requestData);die;
            $attachment=PoAttachment::savePoAttachment($requestData);
            if($request->id == ''){
                return response()->json(['success'=>true,'message'=>"Attachment Added Successfully Done",'data'=>$attachment]);
            }else{
                return response()->json(['success'=>true,'message'=>"Attachment Updated Successfully Done",'data'=>$attachment]);
            }
        }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getAllAttachmens(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $purchase_orders = PurchaseOrder::with(['poAttachments.attachmentType'])->where(['id'=> $request->id,'deleted_at'=>null])->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'success' => true, 'data' => $purchase_orders, 
            'pagination' => [
                    'total' => $purchase_orders->total(),
                    'current_page' => $purchase_orders->currentPage(),
                    'last_page' => $purchase_orders->lastPage(),
                    'per_page' => $purchase_orders->perPage(),
                    'next_page_url' => $purchase_orders->nextPageUrl(),
                    'prev_page_url' => $purchase_orders->previousPageUrl(),
                ]
        ]);

    }
    public function delete_po_attachment(Request $request){
        $id=$request->id;
        try{
            PoAttachment::find($id)->update(['deleted_at' => now()]);
            return response()->json(['success'=>true,'message'=>'Deleted Successfully done']);
        }catch (\Exception $e) {
            Log::error('Error saving Tag: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function purchase_productsDelete(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $id=$request->id;
        try{
            PurchaseOrderProduct::find($id)->update(['deleted_at' => now()]);
            return response()->json(['success'=>true,'message'=>'Deleted Successfully done']);
        }catch (\Exception $e) {
            Log::error('Error saving Tag: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function purchase_order_new_task_save(NewTaskRequest $request){
        // echo "<pre>";print_r($request->all());die;
        $validatedData = $request->validated();
        try{
            if ($request->notify == 1) {
                $notification = $request->has('notification') ? 1 : 0;
                $sms = $request->has('sms') ? 1 : 0;
                $email = $request->has('email') ? 1 : 0;
            }
    
            if (!isset($notification) || !isset($sms) || !isset($email)) {
                $notification = $sms = $email = null;
            }
            $values = [
                'id'=>$request->id,
                'po_id'=>$request->task_po_id,
                'home_id' => Auth::user()->home_id,
                'supplier_id' => $request->task_supplier_id,
                'user_id' => $request->user_id ?? $request->user_id_timer,
                'title' => $request->title ?? $request->title_timer,
                'task_type_id' => $request->task_type_id ?? $request->task_type_timer_id,
                'start_date' => $request->start_date ?? Carbon::now()->toDateString(),
                'start_time' => $request->start_time ?? Carbon::now()->toTimeString(),
                'end_date' => $request->end_date,
                'end_time' => $request->end_time,
                'is_recurring' => $request->is_recurring ?? false,
                'notify' => $request->notify,
                'notification' => $notification,
                'sms' => $sms,
                'email' => $email,
                'notify_date' => $request->notify_date,
                'notify_time' => $request->notify_time,
                'notes' => $request->notes ?? $request->notes_timer
            ];
            $data=PrucahseOrderNewTask::savePurchaseOrderNewTask($values);
            if($request->id == ''){
                return response()->json(['success'=>true,'message'=>'New Task Successfully Added','data'=>$data]);
            }else{
                return response()->json(['success'=>true,'message'=>'New Task Successfully Updated','data'=>$data]);
            }
            
        }catch (\Exception $e) {
            Log::error('Error saving Tag: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getAllNewTaskList(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $data_newTask=PrucahseOrderNewTask::where(['po_id'=> $request->id,'deleted_at'=>null])->orderBy('id', 'desc')->paginate(10);
        $data_array=[];
        foreach($data_newTask as $val){
            $ref=PurchaseOrder::find($val->po_id);
            $user=User::find($val->user_id);
            $type=Task_type::find($val->task_type_id);
            $data_array[]=[
                'date'=>$val->start_date,
                'ref'=>$ref->purchase_order_ref,
                'user'=>$user->name,
                'type'=>$type->title,
                'title'=>$val->title,
                'notes'=>$val->notes,
                'created_at'=>$val->created_at,
                'executed'=>$val->start_date,
                'id'=>$val->id,
                'po_id'=>$val->po_id,
                'supplier_id'=>$val->supplier_id,
                'user_id'=>$val->user_id,
                'task_type_id'=>$val->task_type_id,
                'start_time'=>$val->start_time,
                'end_date'=>$val->end_date,
                'end_time'=>$val->end_time,
                'is_recurring'=>$val->is_recurring,
                'notify'=>$val->notify,
                'notify_date'=>$val->notify_date,
                'notify_time'=>$val->notify_time,
                'notification'=>$val->notification,
                'email'=>$val->email,
                'sms'=>$val->sms,

            ];
        }
        return response()->json([
            'success' => true, 'data' => $data_array, 
            'pagination' => [
                    'total' => $data_newTask->total(),
                    'current_page' => $data_newTask->currentPage(),
                    'last_page' => $data_newTask->lastPage(),
                    'per_page' => $data_newTask->perPage(),
                    'next_page_url' => $data_newTask->nextPageUrl(),
                    'prev_page_url' => $data_newTask->previousPageUrl(),
                ]
        ]);
    }
    public function draft_purchase_order(Request $request){
        $lastSegment = $request->list_mode;
        $segment_check=$this->check_segment_purchaseOrder($lastSegment);
        // echo "<pre>"; print_r($segment_check);die;
        $data['list']=PurchaseOrder::with('suppliers','purchaseOrderProducts')->where(['user_id'=>Auth::user()->id,'deleted_at'=>null,'status'=>$segment_check['status']])->get();
        $data['status']=$segment_check;
        $data['draftCount']=PurchaseOrder::where(['user_id'=>Auth::user()->id,'deleted_at'=>null,'status'=>1])->count();
        $data['awaitingApprovalCount']=PurchaseOrder::where(['user_id'=>Auth::user()->id,'deleted_at'=>null,'status'=>2])->count();
        $data['approvedCount']=PurchaseOrder::where(['user_id'=>Auth::user()->id,'deleted_at'=>null,'status'=>3])->count();
        $data['rejectedCount']=PurchaseOrder::where(['user_id'=>Auth::user()->id,'deleted_at'=>null,'status'=>8])->count();
        $data['actionedCount']=PurchaseOrder::where(['user_id'=>Auth::user()->id,'deleted_at'=>null,'status'=>4])->count();
        $data['paidCount']=PurchaseOrder::where(['user_id'=>Auth::user()->id,'deleted_at'=>null,'status'=>5])->count();
        return view('frontEnd.salesAndFinance.purchase_order.purchase_order_list',$data);
    }
    private function check_segment_purchaseOrder($lastSegment=null){
        if($lastSegment === 'AwaitingApprivalPurchaseOrders'){
            return ['status'=>2,'list_status'=>'Awaiting Approval Purchase Oreders'];
        }else if($lastSegment === 'Approved'){
            return ['status'=>3,'list_status'=>'Approved'];
        }else if($lastSegment === 'Rejected'){
            return ['status'=>8,'list_status'=>'Rejected'];
        }else if($lastSegment === 'Actioned'){
            return ['status'=>4,'list_status'=>'Actioned'];
        }else if($lastSegment === 'Paid'){
            return ['status'=>5,'list_status'=>'Paid'];
        }else{
            return ['status'=>1,'list_status'=>'Draft'];
        }
    }
    public function searchPurchaseOrders(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $po_ref=$request->po_ref;
        $department=$request->department;
        $tag=$request->tag;
        $supplier=$request->supplier;
        $edd_startDate=$request->edd_startDate;
        $edd_endDate=$request->edd_endDate;
        $po_startDate=$request->po_startDate;
        $po_endDate=$request->po_endDate;
        $customer=$request->customer;
        $created_by=$request->created_by;
        $po_posted=$request->po_posted;
        $project=$request->project;
        $keywords=$request->keywords;
        $delivery_status=$request->delivery_status;
        $key=$request->key;
        $value=$request->value;
        $status=$request->status;
        $list_status=$request->list_status;
        $selectedDeptId=$request->selectedDeptId;
        $selectedTagtId=$request->selectedTagtId;
        $selectedsupplierId=$request->selectedsupplierId;
        $selectedCustomerId=$request->selectedCustomerId;
        $selectedcreatedById=$request->selectedcreatedById;
        $selectedProjectId=$request->selectedProjectId;
        $home_id=Auth::user()->home_id;
        $query = PurchaseOrder::with('suppliers','purchaseOrderProducts')->where(['deleted_at'=>null,'status'=>$status]);
        // echo "<pre>";print_r($query->get());die;
        if ($request->filled('po_ref')) {
            $query->where('purchase_order_ref', $po_ref);
        }
        
        if ($request->filled('department')) {
            $query->where('department_id', $selectedDeptId);
        }

        if ($request->filled('tag')) {
            $query->where('tag_id', $selectedTagtId);
        }
        if ($request->filled('supplier')) {
            $query->where('supplier_id', $selectedsupplierId);
        }
        if ($request->filled('edd_startDate') && $request->filled('edd_endDate')) {
            $query->whereBetween('expected_deleveryDate', [$edd_startDate, $edd_endDate]);
        }
        if ($request->filled('po_startDate') && $request->filled('po_endDate')) {
            $query->whereBetween('purchase_date', [$po_startDate, $po_endDate]);
        }
        if ($request->filled('customer')) {
            $query->where('customer_id', $selectedCustomerId);
        }
        if ($request->filled('created_by')) {
            $query->where('user_id', $selectedcreatedById);
        }
        if ($request->filled('project')) {
            $query->where('project_id', $selectedProjectId);
        }
        if ($request->filled('keywords')) {
            $query->where(function ($q) use ($keywords) {
                $q->where('purchase_order_ref', 'LIKE', '%' . $keywords . '%')
                ->orWhere('name', 'LIKE', '%' . $keywords . '%')
                ->orWhere('qoute_ref', 'LIKE', '%' . $keywords . '%')
                ->orWhere('job_ref', 'LIKE', '%' . $keywords . '%')
                ->orWhere('invoice_ref', 'LIKE', '%' . $keywords . '%')
                ->orWhere('reference', 'LIKE', '%' . $keywords . '%');
            });
        }
        // echo $query->toSql();
        // print_r($query->getBindings());
        // die;
        $search_data = $query->where('user_id',Auth::user()->id)->get();
        // echo "<pre>";print_r($search_data);die;
        $array_data='';
        $all_subTotalAmount=0;
        $all_vatTotalAmount=0;
        $all_TotalAmount=0;
        foreach($search_data as $key=>$val){
            $customer=Customer::find($val->customer_id);
            $sub_total_amount=0;
            $total_amount=0;
            $vat_amount=0;
            foreach($val->purchaseOrderProducts as $product){
                $qty=$product->qty*$product->price;
                $sub_total_amount=$sub_total_amount+$qty;
                $vat=$product->vat+$sub_total_amount;
                $total_amount=$total_amount+$vat;
                $vat_amount=$vat_amount+$product->vat;

                $all_subTotalAmount=$all_subTotalAmount+$sub_total_amount;
                $all_vatTotalAmount=$all_vatTotalAmount+$vat_amount;
                $all_TotalAmount=$all_TotalAmount+$total_amount;
            }
            
            $array_data .= '<tr>
                        <td><input type="checkbox" class="delete_checkbox" value="' . $val->id . '"></td>
                        <td>' . ++$key . '</td>
                        <td>' . $val->purchase_order_ref . '</td>
                        <td>' . htmlspecialchars($val->purchase_date) . '</td>
                        <td>' . $val->suppliers->name . '</td>
                        <td>' . ($customer->name ?? '') . '</td>
                        <td>' . $val->city . '</td>
                        <td>£' . $sub_total_amount . '</td>
                        <td>£' . $vat_amount . '</td>
                        <td>£' . $total_amount . '</td>
                        <td>£' . $total_amount . '</td>
                        <td>' . $list_status . '</td>
                        <td>-</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <div class="nav-item dropdown">
                                    <a href="#!" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <div class="dropdown-menu fade-up m-0">
                                        <a href="'.url('purchase_order_edit?key=').''.base64_encode($val->id).'" class="dropdown-item">Edit</a>
                                        <a href="#!" class="dropdown-item">Preview</a>
                                        <a href="#!" class="dropdown-item">Duplicate</a>
                                        <a href="#!" class="dropdown-item">Approve</a>
                                        <a href="#!" class="dropdown-item">CRM / History</a>
                                        <a href="#!" class="dropdown-item">Start Timer</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>';
        }

        return response()->json(['data' => $array_data,'all_subTotalAmount'=>$all_subTotalAmount,'all_vatTotalAmount'=>$all_vatTotalAmount,'all_TotalAmount'=>$all_TotalAmount]);
    }
    public function searchDepartment(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $query = $request->input('search_deptquery');  
        $home_id = Auth::user()->home_id;

        $DeptSearchData = Department::where('title', 'LIKE', "%$query%")
            ->where('home_id', $home_id)
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->take(10)
            ->get();

        return response()->json(['data' => $DeptSearchData]);
    }
    public function searchTag(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $query = $request->input('search_tagquery');  
        $home_id = Auth::user()->home_id;

        $TagSearchData = Tag::where('title', 'LIKE', "%$query%")
            ->where('home_id', $home_id)
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->take(10)
            ->get();

        return response()->json(['data' => $TagSearchData]);
    }
    public function searchSupplier(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $query = $request->input('search_supplierquery');  
        $home_id = Auth::user()->home_id;

        $SupplierSearchData = Supplier::where('name', 'LIKE', "%$query%")
            ->where('home_id', $home_id)
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->take(10)
            ->get();

        return response()->json(['data' => $SupplierSearchData]);
    }
    public function searchCreatedBy(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $query = $request->input('search_createdbyquery');  
        $home_id = Auth::user()->home_id;

        $CreatedBySearchData = User::where('name', 'LIKE', "%$query%")
            ->where('home_id', $home_id)
            ->where('status', 1)
            ->where('is_deleted',0)
            ->take(10)
            ->get();

        return response()->json(['data' => $CreatedBySearchData]);
    }
    public function searchProject(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $query = $request->input('search_projectquery');  
        $home_id = Auth::user()->home_id;

        $ProjectSearchData = Project::where('project_name', 'LIKE', "%$query%")
            ->where('home_id', $home_id)
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->take(10)
            ->get();

        return response()->json(['data' => $ProjectSearchData]);
    }
}
