<?php

namespace App\Http\Controllers\backend\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Lead;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Models\LeadRejectType;
use App\Models\LeadRejectReason;
use App\Models\LeadStatus;
use App\Models\LeadTask;

use App\Models\LeadSource;
use App\Models\LeadTaskType;
use App\Models\LeadNoteType;
use App\Models\LeadNote;
use Carbon\Carbon;

class LeadController extends Controller
{
    public function index(Request $request){

        $page = "Leads";
        $path = $request->path();
        $segments = explode('/', $path);
        $lastSegment = end($segments);
   
        if($lastSegment ===  "leads") {
            $customers = DB::table('customers')
            ->join('leads', 'customers.id', '=', 'leads.customer_id')
            ->select('customers.*', 'leads.*')
            ->orderBy('leads.created_at', 'desc')
            ->whereNotIn('assign_to', [0])
            ->whereNotIn('leads.status', ['6'])
            ->get();
        } 
        else if($lastSegment === "unassigned"){
            $customers = DB::table('customers')
            ->join('leads', 'customers.id', '=', 'leads.customer_id')
            ->select('customers.*', 'leads.*')
            ->orderBy('leads.created_at', 'desc')
            ->where('assign_to', 0)
            ->get();
        } else if($lastSegment === "rejected"){
            $customers = DB::table('customers')
            ->join('leads', 'customers.id', '=', 'leads.customer_id')
            ->select('customers.*', 'leads.*')
            ->orderBy('leads.created_at', 'desc')
            ->where('leads.status', '6')
            ->get();
        } else if($lastSegment === "converted"){
            $customers = DB::table('customers')
            ->join('leads', 'customers.id', '=', 'leads.customer_id')
            ->select('customers.*', 'leads.*')
            ->orderBy('leads.created_at', 'desc')
            ->where('customers.is_converted', 1)
            ->get();
        }

        // dd($customers);
        $leadRejectTypes = LeadRejectType::where('deleted_at', null)->where('status', 1)->get();

        return view('backEnd/salesFinance/leads/leads', compact('page', 'customers', 'leadRejectTypes'));
    }
    public function create(){
        // dd("data");
        $page = "Leads";
        $users = User::where('home_id', Session::get('scitsAdminSession')->home_id)->get();
        $status = LeadStatus::where('deleted_at', null)->where('status', 1)->get();
        $sources = LeadSource::where('deleted_at', null)->where('status', 1)->get();
      
        return view('backEnd/salesFinance/leads/leads_form',compact('page','users', 'status', 'sources'));
    }

    public function store(Request $request){
        // dd($request);
        try {
            $website = $request->input('website');
            if ($website && !preg_match('/^http/', $website)) {
                $website = 'http://' . $website;
            }   

            $customer = Customer::updateOrCreate(['id' => $request->customer_id],[
                'home_id' => Session::get('scitsAdminSession')->home_id,
                'name' => $request->company_name,
                'contact_name' => $request->name,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'mobile' => $request->mobile,
                'website' => $website,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
            ]);
            $customer_id = $customer->id;

            if ($customer && $customer->id) {

                $lastLead = Lead::orderBy('id', 'desc')->first();
                $nextId = $lastLead ? $lastLead->id + 1 : 1;
                $lead_refid = 'LEAD-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

                $admin   = Session::get('scitsAdminSession');
                // Create the lead using the customer ID
                $lead = Lead::updateOrCreate(['id' => $request->lead_id],[
                    'home_id' => $admin->home_id,
                    'lead_ref' => $lead_refid,
                    'customer_id' => $customer_id,
                    'assign_to' => $request->input('assign_to'),
                    'source' => $request->input('source'),
                    'status' => $request->input('status'),
                    'prefer_date' => $request->input('prefer_date'),
                    'prefer_time' => $request->input('prefer_time'),
                ]);

                if ($lead->wasRecentlyCreated) {
                    // New record was created
                    $message =  'Lead created successfully.';
                    return redirect()->route('leads.edit', ['id' => $lead->id])->with('success', $message);
                } else {
                    // Existing record was updated
                    $message =  'Lead updated successfully.';
                    return redirect()->route('leads.index')->with('success', $message);
                }

            } else {
                // Handle the error case where the customer was not created successfully
                return redirect()->route('leads.index')->with('error', 'Failed to create customer.');
            }
  
        } catch (\Exception $e) {
            \Log::error('Error saving lead: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Failed to save lead. Please try again.']);
        }
    }

    public function edit($id){

        // dd($id);
        $page = 'Leads';
        $lead = DB::table('customers')
        ->join('leads', 'customers.id', '=', 'leads.customer_id')
        ->select('customers.*', 'leads.*')
        ->where('leads.id', $id)
        ->first();
        // dd($lead);
        $users = User::where('home_id', Session::get('scitsAdminSession')->home_id)->get();
        $status = LeadStatus::where('deleted_at', null)->where('status', 1)->get();
        $sources = LeadSource::where('deleted_at', null)->where('status', 1)->get();
        $notes_type = LeadNoteType::where(['deleted_at'=> null, 'status' => 1, 'home_id' => Session::get('scitsAdminSession')->home_id])->get();
        $lead_notes = LeadNote::where('lead_id', $id)->get();
        $leadTask = LeadTaskType::where(['deleted_at'=> null, 'status' => 1])->get();

        $lead_notes_data = DB::table('lead_notes')
        ->join('lead_note_types', 'lead_note_types.id', '=', 'lead_notes.notes_type_id')
        ->select('lead_notes.*', 'lead_note_types.*')
        ->where('lead_notes.lead_id', $id)
        ->get();

        // dd($lead_notes_data);
        $lead_task =  DB::table('lead_tasks')
        ->join('lead_task_types', 'lead_task_types.id', '=', 'lead_tasks.lead_task_type_id')
        ->join('user', 'user.id', '=', 'lead_tasks.user_id')
        ->select('lead_tasks.*', 'lead_task_types.title as task_type_title','user.name')
        ->where('lead_tasks.lead_ref', $lead->lead_ref)
        ->where('lead_tasks.deleted_at', null)
        ->get();

        // dd($lead_task);
        return view('backEnd/salesFinance/leads/leads_form', compact('lead', 'users', 'page','sources', 'status', 'notes_type', 'lead_notes', 'lead_notes_data', 'leadTask', 'lead_task'));   
    }

    // Lead Reject Type
    public function lead_reject_type(){
        $page = "Lead Reject Type";
        $lead_rejects = LeadRejectType::where('deleted_at', null)->get();
        return view('backEnd/salesFinance/leads/lead_reject_type', compact('lead_rejects', 'page'));   
    }

    public function saveLeadRejectType(Request $request){
       
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Save form data to the database
        LeadRejectType::updateOrCreate(['id' => $request->lead_reject_id], array_merge($request->all(), ['home_id' => Session::get('scitsAdminSession')->home_id]));

        if(isset($request->lead_reject_id)){
            return response()->json(['message' => 'Record updated successfully!']);
        } else {
            return response()->json(['message' => 'Lead Reject Type added successfully!']);
        }
    }
    
    public function lead_reject_type_delete($id){
        $affectedRows  = LeadRejectType::where('id', $id)->update(['deleted_at' => Carbon::now()]);
        if($affectedRows ){
            return redirect()->route('leads.lead_reject_type')->with('success', "Record deleted successfully");
        } else {
            return redirect()->route('leads.lead_reject_type')->with('error', "Record not found");
        }
    }

    public function saveLeadRejectReason(Request $request){

        $validator = Validator::make($request->all(), [
            'lead_ref' => 'required',
            'reject_type_id' => 'required',
            'reject_reason' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        Lead::where('lead_ref', $request->lead_ref)->update(['status' => 6]);

        // Save form data to the database
        LeadRejectReason::updateOrCreate(['id' => $request->lead_reject_id], $request->all());

        if(isset($request->lead_reject_id)){
            return response()->json(['message' => 'Record updated successfully!']);
        } else {
            return response()->json(['message' => 'Lead Rejected added successfully!']);
        }
    }

    // Lead Status 
    public function lead_status(){
        $page = "Lead Status";
        $lead_status = LeadStatus::where('deleted_at', null)->get();
        return view('backEnd/salesFinance/leads/lead_status', compact('page', 'lead_status'));
    }

    public function saveLeadStatus(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        LeadStatus::updateOrCreate(['id' => $request->lead_status_id], array_merge($request->all(), ['home_id' => Session::get('scitsAdminSession')->home_id]));

        if(isset($request->lead_status_id)){
            return response()->json(['message' => 'Record updated successfully!']);
        } else {
            return response()->json(['message' => 'Lead Status added successfully!']);
        }
    }

    public function lead_status_delete($id){
        $affectedRows  = LeadStatus::where('id', $id)->update(['deleted_at' => Carbon::now()]);
        if($affectedRows ){
            return redirect()->route('leads.lead_status')->with('success', "Record deleted successfully");
        } else {
            return redirect()->route('leads.lead_status')->with('error', "Record not found");
        }
    }

    // Lead Sources
    public function lead_sources(){
        $page = "Lead Sources";
        $lead_sources = LeadSource::where('deleted_at', null)->get();
        return view('backEnd/salesFinance/leads/lead_sources', compact('page', 'lead_sources'));
    }

    public function saveLeadSource(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        LeadSource::updateOrCreate(['id' => $request->lead_source_id], array_merge($request->all(), ['home_id' =>  Session::get('scitsAdminSession')->home_id]));

        if(isset($request->lead_source_id)){
            return response()->json(['message' => 'Record updated successfully!']);
        } else {
            return response()->json(['message' => 'Lead Source added successfully!']);
        }
    }

    public function lead_source_delete($id){
        $affectedRows  = LeadSource::where('id', $id)->update(['deleted_at' => Carbon::now()]);
        if($affectedRows ){
            return redirect()->route('leads.lead_sources')->with('success', "Record deleted successfully");
        } else {
            return redirect()->route('leads.lead_sources')->with('error', "Record not found");
        } 
    }

    // Lead Task Type
    public function lead_task_type(){
        $page = "lead_task_type";
        $lead_task_type = LeadTaskType::where('deleted_at', null)->get();
        return view('backEnd/salesFinance/leads/lead_task_type', compact('page', 'lead_task_type'));
    }

    public function saveLeadTaskType(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        LeadTaskType::updateOrCreate(['id' => $request->lead_task_type_id], array_merge($request->all(), ['home_id' =>  Session::get('scitsAdminSession')->home_id]));

        if(isset($request->lead_task_type_id)){
            return response()->json(['message' => 'Record updated successfully!']);
        } else {
            return response()->json(['message' => 'Task Type added successfully!']);
        }
    }

    public function lead_task_type_delete($id){
        $affectedRows  = LeadTaskType::where('id', $id)->update(['deleted_at' => Carbon::now()]);
        if($affectedRows ){
            return redirect()->route('leads.lead_task_type')->with('success', "Record deleted successfully");
        } else {
            return redirect()->route('leads.lead_task_type')->with('error', "Record not found");
        } 
    }

    // Lead Note Types
    public function lead_notes_type(){
        $page = "lead_notes_type";
        $lead_notes_type = LeadNoteType::where('deleted_at', null)->get();
        return view('backEnd/salesFinance/leads/lead_notes_type', compact('page', 'lead_notes_type'));
    }

    public function saveLeadNotesType(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        LeadNoteType::updateOrCreate(['id' => $request->lead_notes_type_id], array_merge($request->all(), ['home_id' =>  Session::get('scitsAdminSession')->home_id]));

        if(isset($request->lead_notes_type_id)){
            return response()->json(['message' => 'Record updated successfully!']);
        } else {
            return response()->json(['message' => 'Notes Type added successfully!']);
        }
    }

    public function lead_note_type_delete($id){
        $affectedRows  = LeadNoteType::where('id', $id)->update(['deleted_at' => Carbon::now()]);
        if($affectedRows ){
            return redirect()->route('leads.lead_notes_type')->with('success', "Record deleted successfully");
        } else {
            return redirect()->route('leads.lead_notes_type')->with('error', "Record not found");
        } 
    }

    public function convert_to_customer($id){
        $customer = Customer::where('id', $id)->update(['is_converted' => 1]);
        if($customer ){
            return redirect()->route('leads.index')->with('success', "Customer converted successfully");
        } else {
            return redirect()->route('leads.index')->with('error', "Record not found");
        } 
    }

    public function save_lead_notes(Request $request){
        $save = LeadNote::create(array_merge($request->all(), ['home_id' =>  Session::get('scitsAdminSession')->home_id]));
            
        if( $save ){
            return response()->json(['message' => 'Record added successfully!']);
        } else {
            return response()->json(['message' => "Error ! Notes doesn't save!"]);
        }
    }

    public function save_lead_tasks(Request $request){
        // dd($request);
        $validator = Validator::make($request->all(), [
            'lead_task_type_id' => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        LeadTask::updateOrCreate(['id' => $request->lead_task_id], $request->all());

        if(isset($request->lead_task_id)){
            return response()->json(['message' => 'Record updated successfully!']);
        } else {
            return response()->json(['message' => 'Task added successfully!']);
        }
    }

    public function lead_task_delete($taskId, $leadId){
        $affectedRows  = LeadTask::where('id', $taskId)->update(['deleted_at' => Carbon::now()]);
    
        if($affectedRows ){
            // return redirect()->route('leads.lead_notes_type')->with('success', "Record deleted successfully");
            return redirect()->route('leads.edit', ['id' => $leadId])->with('success', 'Lead Taks deleted successfully');
        } else {
            // return redirect()->route('leads.lead_notes_type')->with('error', "Record not found");
            return redirect()->route('leads.edit', ['id' => $leadId])->with('fails', 'Error in Lead task deletion');
        } 
    }

}
