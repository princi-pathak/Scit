<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttachmentType;
use Carbon\Carbon;

class LeadAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['lead_id', 'attachment_type_id', 'image', 'mime_type', 'size_in_bytes' ,'title','description', ];

    public static function getLeadAttachments($id){
        $LeadAttachment = LeadAttachment::where(['lead_id'=> $id, 'deleted_at' => null])->orderBy('id', 'desc')->get();
        $record = array();

        foreach($LeadAttachment as $value){
            $data['id'] = $value->id;
            $data['type'] = AttachmentType::getAttachmentTypeName($value->attachment_type_id);
            $data['title'] = $value->title;
            $data['description'] = $value->description;
            $fileName = basename($value->image);
            $data['filename'] = $fileName;
            $data['mime_type'] = $value->mime_type;
            $data['size'] = AttachmentType::formatSizeUnits($value->size_in_bytes);
            $data['created_at'] = \Carbon\Carbon::parse($value->created_at)->format('d/m/Y h:i') ;
         
            array_push($record, $data);
        }
        return $record;
    }

    public static function deleteLeadAttachment($id){
        return LeadAttachment::where('id', $id)->update(['deleted_at' => Carbon::now()]);
    }

  
}
