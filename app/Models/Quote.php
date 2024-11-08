<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_id',
        'quote_ref',
        'customer_id',
        'site_id',
        'project_id',
        'quota_type',
        'quota_date',
        'expiry_date',
        'customer_ref', 
        'customer_job_ref', 
        'purchase_order_ref',
        'source',
        'performed_job_date',
        'period',
        'tags',
        'title',
        'title_description',
        'price',
        'vat',
        'extra_information',
        'customer_notes',
        'tearms',
        'internal_notes',
        'attachments',
        'quotes',
        'status'
    ];

}
