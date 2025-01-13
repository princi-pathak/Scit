<?php

namespace App\Models\Quotes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDepositInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id', 
        'customer_id',
        'invoice_id',
        'invoice_date',
        'due_date',
        'line_item',
        'description', 
        'deposit_percantage',
        'sub_total',
        'discount',
        'VAT',
        'total'
    ];
}
