<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'quote_id',
        'attachment_type',
        'title',
        'description',
        'original_name',
        'timestamp_name',
        'mime_type',
        'size',
        'mobile_user_visible',
        'customer_visible',
    ];

    public function quoteAttachment()
    {
        return $this->belongsTo(Quote::class);
    }

    public function attachmentType()
    {
        return $this->hasOne(AttachmentType::class, 'id', 'attachment_type'); // Assuming 'attachment_type' is the foreign key in 'quote_attachments' table
    }

   
}
