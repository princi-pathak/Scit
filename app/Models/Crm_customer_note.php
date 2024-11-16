<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm_customer_note extends Model
{
    use HasFactory;
    protected $table="crm_customer_notes";
    protected $fillable=['home_id', 'customer_id', 'contact', 'crm_section_type_id', 'notes', 'notify', 'notification', 'user_id', 'sms', 'email', 'customer_visibility'];

    public static function save_customer_note($data){
        return self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    }
    public static function getAllcrmNotes($id){
        return self::where('customer_id',$id);
    }
}
