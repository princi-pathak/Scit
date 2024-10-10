<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_type extends Model
{
    use HasFactory;
    protected $table = 'customer_types';

    protected $fillable = [
        'home_id',
        'title',
        'status'
    ];

    public static function getCustomerType($home_id){
        return Customer_type::where('home_id', $home_id)->select('id','title')->where('status', 1)->get();
    }
}
