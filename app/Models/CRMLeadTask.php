<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        ->join('user', 'user.id','=','crm_lead_tasks.user_id')
        ->select('crm_lead_tasks.*', 'lead_tasks.title as lead_task_title','user.name as userName')
        ->where(['crm_lead_tasks.lead_id'=> $lead_id, 'crm_lead_tasks.home_id' => $home_id])
        ->get();

    }

    public static function getCRMTaskDataToday($lead_id, $home_id){
        return DB::table('crm_lead_tasks')
        ->join('lead_tasks', 'lead_tasks.id', '=', 'crm_lead_tasks.task_type_id')
        ->select('crm_lead_tasks.*', 'lead_tasks.title as lead_task_title')
        ->where(['crm_lead_tasks.lead_id'=> $lead_id, 'crm_lead_tasks.home_id' => $home_id])
        ->whereDate('start_date', Carbon::today())
        ->get();
    }

    public static function getCRMTaskDataWeek($lead_id, $home_id){

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        return DB::table('crm_lead_tasks')
        ->join('lead_tasks', 'lead_tasks.id', '=', 'crm_lead_tasks.task_type_id')
        ->select('crm_lead_tasks.*', 'lead_tasks.title as lead_task_title')
        ->where(['crm_lead_tasks.lead_id'=> $lead_id, 'crm_lead_tasks.home_id' => $home_id])
        ->whereBetween('start_date',[$startOfWeek, $endOfWeek])
        ->get();
    }

    public static function getCRMTaskDataOverdue($lead_id, $home_id){
        return DB::table('crm_lead_tasks')
        ->join('lead_tasks', 'lead_tasks.id', '=', 'crm_lead_tasks.task_type_id')
        ->select('crm_lead_tasks.*', 'lead_tasks.title as lead_task_title')
        ->where([
            ['crm_lead_tasks.lead_id', '=', $lead_id],
            ['crm_lead_tasks.home_id', '=', $home_id],
            ['crm_lead_tasks.is_completed', '=', 0]
        ])
        ->whereDate('start_date', '<', Carbon::today())
        ->get();
    }

    public static function getCRMTaskDataComplete($lead_id, $home_id) {
        return DB::table('crm_lead_tasks')
        ->join('lead_tasks', 'lead_tasks.id', '=', 'crm_lead_tasks.task_type_id')
        ->select('crm_lead_tasks.*', 'lead_tasks.title as lead_task_title')
        ->where([
            ['crm_lead_tasks.lead_id', '=', $lead_id],
            ['crm_lead_tasks.home_id', '=', $home_id],
            ['crm_lead_tasks.is_completed', '=', 1]
        ])
        ->get();
    }

    public static function getCRMTaskDataRecurring($lead_id, $home_id) {
        return DB::table('crm_lead_tasks')
        ->join('lead_tasks', 'lead_tasks.id', '=', 'crm_lead_tasks.task_type_id')
        ->join('crm_lead_task_recurrences', 'crm_lead_task_recurrences.crm_lead_task_id', '=', 'crm_lead_tasks.id')
        ->select('crm_lead_tasks.*', 'lead_tasks.title as lead_task_title', 'crm_lead_task_recurrences.*')
        ->where([
            ['crm_lead_tasks.lead_id', '=', $lead_id],
            ['crm_lead_tasks.home_id', '=', $home_id],
            ['crm_lead_tasks.is_recurring', '=', 1]
        ])
        ->get();
    }

    public static function getLeadDataWithRecurrence($id){
        return CRMLeadTask::where('crm_lead_tasks.id', $id)->get();
    }

}
