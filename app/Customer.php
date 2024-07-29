<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'home_id',
        'name',
        'customer_type_id',
        'contact_name',
        'job_title',
        'email',
        'telephone',
        'mobile',
        'fax',
        'website',
        'catalogue_id',
        'region',
        'address',
        'city',
        'country',
        'postal_code',
        'country_code',
        'site_notes',
        'currency',
        'credit_limit',
        'discount',
        'discount_type',
        'saga_ref',
        'company_reg',
        'vat_tax_no',
        'payment_terms',
        'assigned_product',
        'notes',
        'product_tax',
        'service_tax',
        'is_converted',
        'show_msg',
        'msg',
        'section_id',
        'status',
    ];

    public static function getConvertedCustomersCount(){
        $all = Customer::where(['is_converted' => '1', 'status' => 1])->count();
        return $all;
       
    }
    public static function saveCustomer(array $data)
    {
        if (isset($data['section_id'])) {
            $data['section_id'] = implode(',',$data['section_id']);
        }
        $insert=self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
        return $insert->id;
    }
    
}
