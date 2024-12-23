<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id', 
        'user_id',
        'title',
        'task_type_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'notify',
        'notify_date',
        'notify_time',
        'notification',
        'email',
        'sms',
        'is_recurring',
        'is_comleted',
        'notes'
    ];
}
