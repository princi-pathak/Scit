<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarePlanMedication extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['home_id','user_id','client_id','overview_id','pharmacy_id','medi_name','does','frequency','purpose','prn','special_instructions','deleted_at'];
}
