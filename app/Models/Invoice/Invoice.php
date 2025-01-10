<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'project_id',
        'site_delivery_add_id',
        'invoice_ref',
        'invoice_type',
        'customer_ref',
        'customer_job_ref',
        'purchase_order_ref',
        'invoice_date',
        'payment_terms',
        'due_date',
        'status',
        'tags',
        'customer_notes', 
        'terms',
        'internal_notes'
    ];

}
