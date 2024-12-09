<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_jobassign_product extends Model
{
    use HasFactory;
    protected $fillable=[
        'job_id',
        'product_id',
        'qty',
        'product_name',
        'vat',
        'discount',
        'price',
        'cost_price',
        'description',
        'code',
        'status',
        'deleted_at'
    ];
}
