<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CRMLeadTask extends Model
{
    use HasFactory;

    protected $table = 'crm_lead_tasks';

    protected $fillable = [
        'home_id',
        'lead_id',
        'user_id',
        'title',
        'task_type_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'is_recurring',
        'notify',
        'notification',
        'email',
        'sms',
        'task_date',
        'task_time',
        'notes'
    ];

    public static function getCRMLeadTaskData($lead_id, $home_id){
        return DB::table('crm_lead_tasks')
        ->join('lead_tasks', 'lead_tasks.id', '=', 'crm_lead_tasks.task_type_id')
        ->select('crm_lead_tasks.*', 'lead_tasks.title as lead_task_title')
        ->where(['crm_lead_tasks.lead_id'=> $lead_id, 'crm_lead_tasks.home_id' => $home_id])
        ->get();

    }

}
