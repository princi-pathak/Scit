<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadTask extends Model
{
    use HasFactory;

    protected $fillable = ['lead_ref', 'user_id','lead_task_type_id', 'title', 'notification', 'email_notify', 'sms_notify', 'notify_date', 'notify_time', 'notes'];
}
