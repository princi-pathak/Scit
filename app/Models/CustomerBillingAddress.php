<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBillingAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'default_billing',
        'contact_name',
        'job_title_id', 
        'email',
        'telephone',
        'mobile',
        'fax',
        'same_as_default',
        'address',
        'city',
        'county',
        'pincode',
        'country'
    ];

    public static function saveCustomerContactDetails(array $data){
        return self::updateOrCreate(['id' => $data['customer_id']], $data);
    }
}
