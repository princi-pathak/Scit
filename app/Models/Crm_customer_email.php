<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm_customer_email extends Model
{
    use HasFactory;
    protected $table="crm_customer_emails";
    protected $fillable=['home_id', 'customer_id', 'to', 'cc', 'subject', 'message', 'attachments', 'notify', 'user_id', 'notification', 'sms', 'email', 'customer_visibility', 'type'];

    public static function save_customer_email($data){
        return self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    }

    public static function getAllcrmEmail($id){
        return self::where('customer_id',$id);
    }
}
