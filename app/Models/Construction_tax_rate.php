<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_tax_rate extends Model
{
    use HasFactory;
    protected $fillable=[
        'home_id',
        'name',
        'tax_rate',
        'tax_code',
        'exp_date',
        'status',
    ];
}
