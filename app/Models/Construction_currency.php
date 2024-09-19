<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_currency extends Model
{
    use HasFactory;
    protected $table = 'construction_currencies';
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
