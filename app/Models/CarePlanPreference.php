<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarePlanPreference extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['home_id','user_id','client_id','overview_id','likes','dislikes','hobbies_interests','food_preferences','personal_care_preferences','communication_preferences','social_preferences','deleted_at'];
}
