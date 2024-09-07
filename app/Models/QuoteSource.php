<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteSource extends Model
{
    use HasFactory;

    protected $fillable = ['title' ,'status', 'home_id'];

    public static function getAllQuoteSources(){
        return QuoteSource::where('deleted_at', null)->get();
    }
}
