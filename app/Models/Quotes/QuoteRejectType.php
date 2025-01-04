<?php

namespace App\Models\Quotes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRejectType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'home_id'];

    public function rejectReasons()
    {
        return $this->belongsTo(QuoteRejectReasons::class, );
    }

    public static function getAllQuoteRejectType($home_id)
    {
        return QuoteRejectType::where('deleted_at', null)->where('home_id', $home_id)->get();
    }

    public static function getActiveQuoteRejectType($home_id)
    {
        return QuoteRejectType::where('deleted_at', null)->where('status', 1)->where('home_id', $home_id)->orderByDesc('created_at')->get();
    }
}
