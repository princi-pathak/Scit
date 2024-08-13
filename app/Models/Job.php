<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Project;
use App\Customer;
use App\Models\Constructor_additional_contact;
class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';

    protected $fillable = [
        'home_id',
        'customer_id',
        'job_ref',
        'contact_id',
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
        'site_country_id',
        'country_id',
        'user_id',
        'status',
    ];
    public static function job_save($data){
        $last_id=$data['last_job_id'];
        if($last_id == ''){
            $job_ref="JOB-1";    
        }else {
            $job_ref="JOB-".$last_id+1;
        }
        $data['job_ref'] = $job_ref;
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
    
}
