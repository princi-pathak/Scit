<?php

namespace App\Http\Controllers\backend\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Lead;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Str;
class LeadController extends Controller
{
    public function index(){
        $page = "Leads";
        $customers = DB::table('customers')
                ->join('leads', 'customers.id', '=', 'leads.customer_id')
                ->select('customers.*', 'leads.*')
                ->orderBy('leads.created_at', 'desc')
                ->get();
      
        return view('backEnd/salesFinance/leads', compact('page', 'customers'));
    }
    public function create(){
        $page = "Leads";
        $users = User::where('home_id', Session::get('scitsAdminSession')->home_id)->get();
        return view('backEnd/salesFinance/leads_form',compact('page','users'));
    }

    public function store(Request $request){

        try {

            $website = $request->input('website');
            if ($website && !preg_match('/^http/', $website)) {
                $website = 'http://' . $website;
            }

            $customer = Customer::updateOrCreate(  ['id' => $request->customer_id],[
                'home_id' => 1,
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
                // Create the lead using the customer ID
                $lead = Lead::updateOrCreate(['id' => $request->lead_id],[
                    'home_id' => 1,
                    'lead_ref' => Str::uuid(),
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

        
                return redirect()->route('leads.index')->with('success', $message);
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
        $page = 'Leads';
        $lead = DB::table('customers')
        ->join('leads', 'customers.id', '=', 'leads.customer_id')
        ->select('customers.*', 'leads.*')
        ->where('leads.id', $id)
        ->first();
        $users = User::where('home_id', Session::get('scitsAdminSession')->home_id)->get();
        return view('backEnd/salesFinance/leads_form', compact('lead', 'users', 'page'));   
    }

}
