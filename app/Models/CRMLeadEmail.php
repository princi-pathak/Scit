<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRMLeadEmail extends Model
{
    use HasFactory;

    protected $table = 'crm_lead_emails';

    protected $fillable = [
        'home_id',
        'lead_id',
        'to',
        'cc',
        'subject',
        'message',
        'attachment',
        'notify',
        'notify_user',
        'notification',
        'sms',
        'email',
        'customer_visible'
    ];

    public static function getCRMLeadEmailsData($lead_id, $home_id){
        return CRMLeadEmail::where(['lead_id'=> $lead_id, 'home_id'=> $home_id])->get();
    }

}
