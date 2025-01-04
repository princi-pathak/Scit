<?php

namespace App\Models\Quotes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRejectReasons extends Model
{
    use HasFactory;

    protected $fillable = ['quote_id', 'reject_type_id', 'reject_reasons'];

    public function rejectType()
    {
        return $this->belongsTo(QuoteRejectType::class);
    }
}
