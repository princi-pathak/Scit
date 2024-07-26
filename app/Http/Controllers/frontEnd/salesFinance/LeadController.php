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
use App\Models\LeadStatus;
use App\Models\LeadSource;
use App\Models\LeadTaskType;
use App\Models\LeadNoteType;
use App\Models\LeadNote;
use Carbon\Carbon;

class LeadController extends Controller
{
    public function index(){

        $customers = DB::table('customers')
        ->join('leads', 'customers.id', '=', 'leads.customer_id')
        ->select('customers.*', 'leads.*')
        ->orderBy('leads.created_at', 'desc')
        ->whereNotIn('assign_to', [0])
        ->whereNotIn('leads.status', ['6'])
        ->where('leads.home_id', Auth::user()->home_id)
        ->get();

        return view('frontEnd.salesAndFinance.leads', compact('customers'));

    }
    public function create(){
        $page = "Leads";
        $users = User::where('home_id', Auth::user()->home_id)->get();
        $status = LeadStatus::where('deleted_at', null)->where('status', 1)->get();
        $sources = LeadSource::where('deleted_at', null)->where('status', 1)->get();
        return view('frontEnd.salesAndFinance.lead_form', compact('page','users', 'status', 'sources'));
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

                // $admin   = Session::get('scitsAdminSession');
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
                    // New record was created
                    $message =  'Lead created successfully.';
                } else {
                    // Existing record was updated
                    $message =  'Lead updated successfully.';
                }

        
                return redirect()->route('lead.index')->with('success', $message);
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
        $page = 'Leads';
        $lead = DB::table('customers')
        ->join('leads', 'customers.id', '=', 'leads.customer_id')
        ->join('lead_notes', 'lead_notes.lead_id', '=', 'leads.id')
        ->select('customers.*', 'leads.*')
        ->where('leads.id', $id)
        ->first();
        $users = User::where('home_id', Auth::user()->home_id)->get();
        $status = LeadStatus::where('deleted_at', null)->where('status', 1)->get();
        $sources = LeadSource::where('deleted_at', null)->where('status', 1)->get();
        $notes_type = LeadNoteType::where(['deleted_at'=> null, 'status' => 1, 'home_id' => Auth::user()->home_id])->get();
        $lead_notes = LeadNote::where('lead_id', $id)->get();
        return view('frontEnd.salesAndFinance.lead_form', compact('lead', 'users', 'page','sources', 'status', 'notes_type', 'lead_notes'));   
    }


}
