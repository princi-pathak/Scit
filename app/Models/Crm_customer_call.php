<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm_customer_call extends Model
{
    use HasFactory;
    protected $table="crm_customer_calls";
    protected $fillable=['home_id', 'customer_id', 'contact_id', 'direction', 'telephone', 'crm_type_id', 'notes', 'notify', 'user_id', 'notification', 'sms', 'email', 'customer_visibility'];

    public static function save_customer_call($data){
        return self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    }
    public static function getAllcrmlist($id){
        return self::where('customer_id', $id);
    }
    
}
