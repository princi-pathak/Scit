<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor_customer_site extends Model
{
    use HasFactory;
    protected $table = 'constructor_customer_sites';

    protected $fillable = [
        'customer_id',
        'site_name',
        'contact_name',
        'title_id',
        'company_name',
        'email',
        'telephone_country_code',
        'telephone',
        'mobile_country_code',
        'mobile',
        'fax',
        'region',
        'address',
        'city',
        'country',
        'post_code',
        'country_id',
        'catalogue',
        'notes',
        'status',
    ];

    public static function saveCustomerAdditional(array $data)
    {
        $insert=self::updateOrCreate(['id' => $data['id'] ?? null], $data);
        return $insert->id;
    }

    public static function getCustomerSiteAddress($id){
        return self::where('customer_id', $id)->select('id', 'site_name')->get();
    }

   

    public static function getCustomerSiteDetails($id) {
        return self::where('id', $id)->get();
    }

}
