<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmCustomerComplaint extends Model
{
    use HasFactory;
    protected $table="crm_customer_complaints";
    protected $fillable=['home_id', 'customer_id', 'contact', 'crm_section_type_id', 'notes', 'notify', 'user_id', 'notification', 'sms', 'email','customer_visibility'];

    public static function save_customer_complaint($data){
        return self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    }
    public static function getAllcrmComplaint($id){
        return self::where('customer_id',$id)->get();
    }
}
