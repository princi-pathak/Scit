<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'home_id',
        'name',
        'customer_type_id',
        'contact_name',
        'job_title',
        'email',
        'telephone',
        'mobile',
        'fax',
        'website',
        'catalogue_id',
        'region',
        'address',
        'city',
        'country',
        'postal_code',
        'country_code',
        'site_notes',
        'currency',
        'credit_limit',
        'discount',
        'discount_type',
        'saga_ref',
        'company_reg',
        'vat_tax_no',
        'payment_terms',
        'assigned_product',
        'notes',
        'product_tax',
        'service_tax',
        'is_converted',
        'show_msg',
        'msg',
        'section_id',
        'status',
    ];

    public static function getConvertedCustomersCount($home_id){
        return Customer::where(['is_converted' => '1', 'status' => 1])->where('home_id', $home_id)->count();
    }

    public static function converToCustomer($id){
        return Customer::where('id', $id)->update(['is_converted' => 1]);
    }
    public static function saveCustomer(array $data)
    {
        if (isset($data['section_id'])) {
            $data['section_id'] = implode(',',$data['section_id']);
        }
        // echo "<pre>";print_r($data);die;
        try {
        $insert=self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    } catch (\Exception $e) {
        return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
    }
        $data=['id'=>$insert->id,'name'=>$insert->name];
        return $data;
    }
    public static function getCustomerWithLeads($lastSegment, $home_id){

        $query = DB::table('customers')
        ->join('leads', 'customers.id', '=', 'leads.customer_id')
        ->select('customers.*', 'leads.*')
        ->orderBy('leads.created_at', 'desc')
        ->where('leads.home_id', $home_id);
   
        if ($lastSegment ===  "leads") {
            return $query->whereNotIn('assign_to', [0])->whereNotIn('leads.status', ['6','7'])->get();
        } else if ($lastSegment === "unassigned"){
            return $query->where('assign_to', 0)->get();
        } else if ($lastSegment === "rejected"){
            return $query->where('leads.status', '6')->get();
        } else if ($lastSegment === "converted"){
            return $query->where('customers.is_converted', 1)->where('customers.status', 1)->get();
        } else if ($lastSegment === "myLeads"){
            return $query->where('user_id', Auth::user()->id)->whereNotIn('leads.status', [7])->get();
        } else if ($lastSegment === "authorization"){
            return $query->where('leads.status', 7)->get();
        } else if ($lastSegment === "actioned") {
            return DB::table('customers')
                ->join('leads', 'leads.customer_id', '=','customers.id')
                ->join('lead_tasks', 'lead_tasks.lead_ref', '=', 'leads.lead_ref')
                ->select('leads.*', 'customers.*','leads.')
                ->orderBy('leads.created_at', 'desc')
                ->where('leads.home_id', $home_id)
                ->distinct()
                ->get();

                // return $query->get();
    
        }
    }

    public static function getCustomerLeads($id){
        return DB::table('customers')
        ->join('leads', 'customers.id', '=', 'leads.customer_id')
        ->select('customers.*', 'leads.*')
        ->where('leads.id', $id)
        ->first();
    }
    public static function get_customer_list_Attribute($home_id,$list_mode){
        $status = ($list_mode == 'ACTIVE') ? 1 : 0;
        return Customer::where(['is_converted' => '1', 'status' => $status,'home_id'=>$home_id])->get();
    }
    
}
