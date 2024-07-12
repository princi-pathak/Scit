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

            $customer = Customer::create([
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
                Lead::create([
                    'home_id' => 1,
                    'lead_ref' => Str::uuid(),
                    'customer_id' => $customer_id,
                    'assign_to' => $request->input('assign_to'),
                    'source' => $request->input('source'),
                    'status' => $request->input('status'),
                    'prefer_date' => $request->input('prefer_date'),
                    'prefer_time' => $request->input('prefer_time'),
                ]);
        
                return redirect()->route('leads.index')->with('success', 'Lead created successfully.');
            } else {
                // Handle the error case where the customer was not created successfully
                return redirect()->route('leads.index')->with('error', 'Failed to create customer.');
            }
  
        } catch (\Exception $e) {
            \Log::error('Error saving lead: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Failed to save lead. Please try again.']);
        }
    }

}
