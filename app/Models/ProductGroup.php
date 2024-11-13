<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_id',
        'user_id',
        'home_id',
        'name',
        'description',
        'code',
        'cost',
        'price',
        'status',
    ];
}
