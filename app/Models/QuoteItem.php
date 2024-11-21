<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'quote_id',
        'type',
        'section_type',
        'product_id',
        'title',
        'decritption',
        'account_code',
        'quantity',
        'cost_price',
        'price',
        'markup',
        'VAT',
        'discount',
        'amount',
        'profit'
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
