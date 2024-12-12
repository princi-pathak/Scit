<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierAttachment extends Model
{
    use HasFactory;
    protected $table="supplier_attachments";
    protected $fillable=['supplier_id', 'type_id', 'title', 'description', 'reminder', 'reminder_date', 'reminder_before_days', 'reminder_email', 'attachment', 'file_original_name', 'deleted_at'];

    public static function supplierAttachmentSave($data){
        // echo "<pre>";print_r($data);die;
        return self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );

    }
    public static function getAllSupplierAttachment(){
        return self::where('deleted_at',null);
    }
}
