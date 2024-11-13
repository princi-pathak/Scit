<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor_additional_contact extends Model
{
    use HasFactory;
    protected $table = 'constructor_additional_contacts';

    protected $fillable = [
        'customer_id',
        'contact_name',
        'job_title_id',
        'email',
        'telephone',
        'mobile',
        'address',
        'city',
        'country',
        'postcode',
        'default_billing',
        'fax',
        'country_id',
        'status',
    ];

    public static function saveCustomerAdditional(array $data)
    {
        $insert=self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
        return $insert->id;
    }
    public static function getAllcrmContacts($id){
        return self::where('customer_id',$id)->get();
    }
}
