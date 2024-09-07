<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRejectType extends Model
{
    use HasFactory;
    
    protected $fillable = ['title' ,'status', 'home_id'];

    public static function getAllQuoteRejectType(){
        return QuoteRejectType::where('deleted_at', null)->get();
    }
}
