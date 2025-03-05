<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepreciationType extends Model
{
    use HasFactory;
    protected $table="depreciation_types";
    protected $fillable=['name','percentage','status','deleted_at'];
}
