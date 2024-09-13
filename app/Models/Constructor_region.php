<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor_region extends Model
{
    use HasFactory;
    protected $table="constructor_regions";
    protected $fillable=[
        'home_id',
        'user_id',
        'name',
        'status'
    ];
}
