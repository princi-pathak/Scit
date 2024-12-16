<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor_additional_contact extends Model
{
    use HasFactory;
    protected $table = 'constructor_additional_contacts';

    protected $fillable = [
        'home_id',
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
        'userType',
        'status',
    ];

    public static function saveCustomerAdditional(array $data)
    {
        $insert=self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
        return $insert;
    }
    public static function getAllcrmContacts($id){
        return self::where(['customer_id'=>$id,'deleted_at'=>null])->whereNotNull('customer_id');
    }
    public function suppliers(){
        return $this->belongsTo(Supplier::class, 'id');
    }
}
