<?php

namespace App\Models\PersonalManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    use HasFactory;

     protected $fillable = [
                'home_id',
                'user_id',
                'date',
                'hours',
                'sleep', 
                'wake_night',
                'disturbance', 
                'annual_leave', 
                'on_call', 
                'comments', 
                'deleted_at'
            ];

}