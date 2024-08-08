<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Job extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $fillable = [
        'home_id',
        'customer_id',
        'job_ref',
        'project_id',
        'name',
        'contact',
        'telephone',
        'email',
        'short_decinc',
        'description',
        'address',
        'city',
        'country',
        'pincode',
        'site_id',
        'region',
        'company',
        'conatact_name',
        'site_email',
        'site_telephone',
        'site_mobile',
        'site_address',
        'site_city',
        'site_country',
        'site_pincode',
        'notes',
        'customer_ref',
        'cust_job_ref',
        'pay_amount',
        'purchase_order_ref',
        'job_type',
        'priorty',
        'alert_customer',
        'on_route_sms',
        'start_date',
        'complete_by',
        'tags',
        'product_id',
        'customer_notes',
        'internal_notes',
        'attachments',
        'status',
    ];
    public static function getCustomerDetailsAttribute($customer_id){
        $data=DB::table('customers as cust')->select('cust.*','con.id as contact_id','con.customer_id','con.contact_name as con_name','con.job_title_id','pro.home_id as pro_home_id','pro.project_name','pro.customer_name as pro_customer_id','site.id as site_id','site.customer_id as site_customer_id','site.site_name','site.contact_name as site_contact_name','site.company_name','site.email as site_email','site.telephone as site_telephone','site.mobile as site_mobile','site.fax as site_fax','site.address as site_address','site.city as site_city','site.country as site_country','site.post_code as site_post_code','site.country_id as site_country_id','site.notes as site_notes')
        ->join('constructor_additional_contacts as con','cust.id','=','con.customer_id')
        ->join('projects as pro','cust.id','=','pro.customer_name')
        ->join('constructor_customer_sites as site','cust.id','=','site.customer_id')
        ->where('cust.id',$customer_id)
        ->where('cust.is_converted',1)
        ->where('cust.status',1)
        ->get();
        return $data;
    }
}
