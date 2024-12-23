<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'home_id', 'status'];

    public static function getAttachmentType()
    {
        return AttachmentType::where('status', 1)->where('deleted_at', null)->get();
    }

    public static function getAttachmentTypeName($id)
    {
        return AttachmentType::where('id', $id)->value('title');
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
        return self::updateOrCreate(['id' => $data['id'] ?? null],$data);
    }
    public static function getAllAttachmentType()
    {
        return self::whereNull('deleted_at')->get();     
    }

    public static function getActiveAttachmentType($home_id)
    {
        return AttachmentType::where('status', 1)->where('home_id', $home_id)->where('deleted_at', null)->get();
    }

    public function quoteAttachment()
    {
        return $this->belongsTo(QuoteAttachment::class, 'attachment_type', 'id'); // Assuming 'attachment_type' is the foreign key
    }

}


