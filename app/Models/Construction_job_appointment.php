<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_job_appointment extends Model
{
    use HasFactory;
    protected $table = 'construction_job_appointments';

    protected $fillable = [
        'home_id',
        'job_id',
        'user_id',
        'appointment_type_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'notes',
        'alert_by',
        'priority',
        'appointment_checkbox',
        'appointment_time',
        'appointment_status',
        'status',
    ];
}
