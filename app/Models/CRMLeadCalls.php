<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CRMLeadCalls extends Model
{
    use HasFactory;
    protected $table = 'crm_lead_calls';

    protected $fillable = [
        'home_id',
        'lead_id',
        'direction',
        'telephone',
        'crm_type_id',
        'notes',
        'notify',
        'user_id',
        'notification',
        'sms',
        'email',
        'customer_visibility'
    ];

    public static function getCRMLeadCallsData($lead_ref, $home_id){
    //    return CRMLeadCalls::where('lead_id', $lead_ref)->where('home_id', $home_id)->get();

      return DB::table('crm_lead_calls')
       ->join('crm_section_types', 'crm_section_types.id', '=', 'crm_lead_calls.crm_type_id')
       ->select('crm_lead_calls.*', 'crm_section_types.title')
       ->where(['crm_lead_calls.lead_id'=> $lead_ref, 'crm_lead_calls.home_id' => $home_id])
       ->get();


    }

    

}
