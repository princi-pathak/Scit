<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public static function getCountriesNameCode(){
        return Country::where('status', 1)->select('code', 'name')->get();
    }
}
