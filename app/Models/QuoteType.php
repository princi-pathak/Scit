<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'number_of_days' ,'status', 'home_id'];

    public static function getAllQuoteType(){
        return QuoteType::where('deleted_at', null)->get();
    }

    public static function getActiveQuoteType(){
        return QuoteType::where('deleted_at', null)->where('status', 1)->get();
    }

}
