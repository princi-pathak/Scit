<?php

namespace App\traits;

use Illuminate\Http\Request;

use DB;
use Session;
trait CountryTrait 

{
    public function all_country_trait()
    {
        $country=DB::table('countries as country')->select('country.*','currency.id as currency_id','currency.country_id','currency.currency_code')
        ->join('construction_currencies as currency','country.id','=','currency.country_id')
        ->where('country.status',1)
        ->get();
        return $country;

    }

}