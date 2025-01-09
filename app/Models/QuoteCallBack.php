<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteCallBack extends Model
{
    use HasFactory;

    // protected $table="quote_callbacks"; 

    protected $fillable = [
        'quote_id',
        'call_back_date',
        'call_back_time',
        'contact_name',
        'contact_phone',
        'notify',
        'notify_date',
        'notify_time',
        'nottify_who',
        'notification',
        'email',
        'sms',
        'notes',
    ];

    public function quoteCall()
    {
        return $this->belongsTo(Quote::class, 'id');
    }

}
