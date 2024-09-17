<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRMLeadTaskReccurence extends Model
{
    use HasFactory;
    protected $table = 'crm_lead_task_recurrences';

    protected $fillable = [
        'crm_lead_task_id', 
        'task_end_repe_date',
        'no_of_repetitations', 
        'task_end_date', 
        'task_frequency', 
        'daily_days', 
        'daily_weekday', 
        'weekly_days', 
        'weekly_weekday', 
        'weekly_weeks', 
        'monthly_days', 
        'monthly_month',
        'every_month_day',
        'every_monthly_month',
        'every_month_of_month'
    ];

    public static function getRecurrenceDataFromTaskType($id){
        return CRMLeadTaskReccurence::where('crm_lead_task_id', $id)->get();
    }
}
