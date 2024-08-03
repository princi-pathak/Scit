<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Lead;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\LeadRejectType;
use App\Models\LeadRejectReason;
use App\Models\AttachmentType;
use App\Models\LeadAttachment;
use App\Models\LeadStatus;
use App\Models\LeadTask;
use App\Models\LeadSource;
use App\Models\LeadTaskType;
use App\Models\LeadNoteType;
use App\Models\LeadNote;
use Illuminate\Support\Facades\Session;

class LeadController extends Controller
{
    public function index(){
        $page = "leads";
        $customers = DB::table('customers')
        ->join('leads', 'customers.id', '=', 'leads.customer_id')
        ->select('customers.*', 'leads.*')
        ->orderBy('leads.created_at', 'desc')
        ->whereNotIn('assign_to', [0])
        ->whereNotIn('leads.status', ['6'])
        ->where('leads.home_id', Auth::user()->home_id)
        ->get();

        // $path = $request->path();
        // $segments = explode('/', $path);
        // $lastSegment = end($segments);
        $lastSegment= "leads";
        $customers = Customer::getCustomerWithLeads($lastSegment);
        $leadRejectTypes = LeadRejectType::getLeadRejectType();


        return view('frontEnd.salesAndFinance.lead.leads', compact('customers', 'page'));

    }
    public function create(){
        $page = "leads";
        $users = User::getHomeUsers(Auth::user()->home_id);
        $status = LeadStatus::getLeadStatus();
        $sources = LeadSource::getLeadSources();
        return view('frontEnd.salesAndFinance.lead.lead_form', compact('page','users', 'status', 'sources'));
    }
    public function store(Request $request){
        try {

            $website = $request->input('website');
            if ($website && !preg_match('/^http/', $website)) {
                $website = 'http://' . $website;
            }

            $customer = Customer::updateOrCreate(  ['id' => $request->customer_id],[
                'home_id' => Auth::user()->home_id,
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

                // Create the lead using the customer ID
                $lead = Lead::updateOrCreate(['id' => $request->lead_id],[
                    'home_id' => Auth::user()->home_id,
                    'lead_ref' => $lead_refid,
                    'customer_id' => $customer_id,
                    'assign_to' => $request->input('assign_to'),
                    'source' => $request->input('source'),
                    'status' => $request->input('status'),
                    'prefer_date' => $request->input('prefer_date'),
                    'prefer_time' => $request->input('prefer_time'),
                ]);

                if ($lead->wasRecentlyCreated) {
                    $message =  'Lead created successfully.';
                    return redirect()->route('lead.edit', ['id' => $lead->id])->with('success', $message);
                } else {
                    $message =  'Lead updated successfully.';
                    return redirect()->route('leads.index')->with('success', $message);
                }
            } else {
                // Handle the error case where the customer was not created successfully
                return redirect()->route('lead.index')->with('error', 'Failed to create customer.');
            }
  
        } catch (\Exception $e) {
            \Log::error('Error saving lead: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Failed to save lead. Please try again.']);
        }
    }

    public function edit($id){

        $page = 'leads';
        $lead = Customer::getCustomerLeads($id);  
        $users = User::getHomeUsers(Auth::user()->home_id);
        $status = LeadStatus::getLeadStatus();
        $sources = LeadSource::getLeadSources();
        $notes_type = LeadNoteType::getLeadNoteTypeWithHomeId(Auth::user()->home_id);
        $leadTask = LeadTaskType::getLeadTaskType();
        $attachment_type = AttachmentType::getAttachmentType();
        $lead_notes_data = LeadNote::getLeadNoteFromleadNoteType($id); 
        $lead_task =  LeadTask::getLeadTaskTypeUser($lead->lead_ref); 
        $lead_attachment = LeadAttachment::getLeadAttachments($id);
        return view('frontEnd.salesAndFinance.lead.lead_form', compact('lead', 'users', 'page','sources', 'status', 'notes_type', 'lead_notes_data', 'leadTask', 'lead_task', 'attachment_type', 'lead_attachment'));           
    }

    // Lead Note Types start
    public function lead_notes_type(){
        $page = "lead_notes_type";
        $lead_notes_type = LeadNoteType::getAllLeadNoteType();
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
        
        LeadNoteType::updateOrCreate(['id' => $request->lead_notes_type_id], array_merge($request->all(), ['home_id' =>  Auth::user()->home_id]));

        if(isset($request->lead_notes_type_id)){
            return response()->json(['message' => 'Record updated successfully!']);
        } else {
            return response()->json(['message' => 'Notes Type added successfully!']);
        }
    }

    public function lead_note_type_delete($id){
        if(LeadNoteType::deleteLeadNoteType($id) ){
            return redirect()->route('leads.lead_notes_type')->with('success', "Record deleted successfully");
        } else {
            return redirect()->route('leads.lead_notes_type')->with('error', "Record not found");
        } 
    }
    // Lead Notes Type End


    public function save_lead_notes(Request $request){
        $save = LeadNote::create(array_merge($request->all(), ['home_id' =>  Auth::user()->home_id]));
        if( $save ){
            return response()->json(['message' => 'Record added successfully!']);
        } else {
            return response()->json(['message' => "Error ! Notes doesn't save!"]);
        }
    }

}
