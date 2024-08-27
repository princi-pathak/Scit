<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CRMLeadNotes extends Model
{
    use HasFactory;

    protected $table = 'crm_leads_notes';

    protected $fillable = [
        'home_id',
        'lead_id',
        'crm_section_type_id',
        'notes',
        'notify',
        'user_id',
        'notification',
        'sms',
        'email',
        'customer_visibility'
    ];


    public static function getCRMLeadNotesData($lead_id, $home_id){

        return DB::table('crm_leads_notes')
        ->join('crm_section_types', 'crm_section_types.id', '=', 'crm_leads_notes.crm_section_type_id')
        ->select('crm_leads_notes.*', 'crm_section_types.title')
        ->where(['crm_leads_notes.lead_id'=> $lead_id, 'crm_leads_notes.home_id' => $home_id])
        ->get();


    }

}
