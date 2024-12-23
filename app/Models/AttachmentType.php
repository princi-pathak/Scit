<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'home_id', 'status'];

    public static function getAttachmentType(){
        $data = AttachmentType::where('status', 1)->where('deleted_at', null)->get();
        return $data;
    }

    public static function getAttachmentTypeName($id){
        $title = AttachmentType::where('id', $id)->value('title');
        return $title;
    }

    public static function formatSizeUnits($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $index = 0;

        while ($size >= 1024 && $index < count($units) - 1) {
            $size /= 1024;
            $index++;
        }

        return round($size, $precision) . ' ' . $units[$index];
    }

    public static function saveAttachment($data)
    {
        $AttachmentType=self::updateOrCreate(['id' => $data['id'] ?? null],$data);
        return $AttachmentType;
    }
    public static function getAllAttachmentType(){
        $data = self::whereNull('deleted_at')->get();
        return $data;
    }

    public static function getActiveAttachmentType($home_id){
        $data = AttachmentType::where('status', 1)->where('home_id', $home_id)->where('deleted_at', null)->get();
        return $data;
    }

    public function quoteAttachment()
    {
        return $this->belongsTo(QuoteAttachment::class, 'attachment_type', 'id'); // Assuming 'attachment_type' is the foreign key
    }
    public function poAttachments(){
        return $this->hasMany(PoAttachment::class, 'attachment_type','id');
    }

}


