<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    public function currencies()
    {
        return $this->hasMany(Construction_currency::class, 'country_id', 'id');
    }
    public static function all_country_list()
    {
        $countries = self::with(['currencies' => function($query) {
            $query->select('id', 'country_id', 'currency_code');
        }])
        ->where('status', 1)
        ->get();

        return $countries;

    }
}
