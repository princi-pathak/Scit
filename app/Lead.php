<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';

    protected $fillable = [
        'home_id',
        'customer_id',
        'lead_ref',
        'assign_to',
        'source',
        'status',
        'prefer_date',
        'prefer_time',
    ];
    
}
