<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
