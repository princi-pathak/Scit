<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_title extends Model
{
    use HasFactory;
    protected $table = 'job_titles';

    protected $fillable = [
        'home_id',
        'name',
        'status',
    ];
}
