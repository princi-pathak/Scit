<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoAttachment extends Model
{
    use HasFactory;
    protected $table="po_attachments";
    protected $fillable=['po_id', 'Purchase_ref', 'attachment_type', 'title', 'description', 'file', 'original_file_name', 'mime_type', 'size', 'deleted_at'];

    public static function savePoAttachment($data){
        return self::updateOrCreate(['id' => $data['id'] ?? null], $data);
    }
    public static function getAllAttachment(){
        return self::whereNull('deleted_at');
    }
    public function purchaseOrder(){
        return $this->belongsTo(PurchaseOrder::class, 'po_id','id');
    }
    public function attachmentType(){
        return $this->belongsTo(AttachmentType::class, 'attachment_type','id')->whereNull('deleted_at');
    }
}
