<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class CRMLeadComplaint extends Model
{
    use HasFactory;
    protected $table = 'crm_lead_complaints';

    protected $fillable = [
        'home_id',
        'lead_id',
        'crm_section_type_id',
        'notes',
        'notify',
        'user_id',
        'notification',
        'sms',
        'email'
    ];

    public static function getCRMLeadComplaintData($lead_id, $home_id){
        return DB::table('crm_lead_complaints')
        ->join('crm_section_types', 'crm_section_types.id', '=', 'crm_lead_complaints.crm_section_type_id')
        ->select('crm_lead_complaints.*', 'crm_section_types.title')
        ->where(['crm_lead_complaints.lead_id'=> $lead_id, 'crm_lead_complaints.home_id' => $home_id])
        ->get();

    }

}
