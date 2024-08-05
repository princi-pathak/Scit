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

    public static function getConvertedCustomersCount(){
        return Customer::where(['is_converted' => '1', 'status' => 1])->count();
    }

    public static function converToCustomer($id){
        return Customer::where('id', $id)->update(['is_converted' => 1]);
    }
    public static function saveCustomer(array $data)
    {
        if (isset($data['section_id'])) {
            $data['section_id'] = implode(',',$data['section_id']);
        }
        $insert=self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
        return $insert->id;
    }
    public static function getCustomerWithLeads($lastSegment, $home_id){

        $query = DB::table('customers')
        ->join('leads', 'customers.id', '=', 'leads.customer_id')
        ->select('customers.*', 'leads.*')
        ->orderBy('leads.created_at', 'desc')
        ->where('leads.home_id', $home_id);
   
        if($lastSegment ===  "leads") {
            return $query->whereNotIn('assign_to', [0])->whereNotIn('leads.status', ['6'])->whereNotIn('leads.authorization_status', [1])->get();
        } else if($lastSegment === "unassigned"){
            return $query->where('assign_to', 0)->get();
        } else if($lastSegment === "rejected"){
            return $query->where('leads.status', '6')->get();
        } else if($lastSegment === "converted"){
            return $query->where('customers.is_converted', 1)->where('customers.status', 1)->get();
        } else if ($lastSegment === "myLeads"){
            return $query->where('user_id', Auth::user()->id)->get();
        }else if($lastSegment === "authorization"){
            return $query->where('leads.authorization_status', 1)->get();
        }
    }

    public static function getCustomerLeads($id){
        return DB::table('customers')
        ->join('leads', 'customers.id', '=', 'leads.customer_id')
        ->select('customers.*', 'leads.*')
        ->where('leads.id', $id)
        ->first();
    }
    
}
