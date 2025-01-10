<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDepositInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id', 
        'customer_id',
        'deposit_percantage',
        'amount',
        'reference', 
        'description', 
        'payment_type', 
        'deposit_date'
    ];
}
