<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteAttachmentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'quote_id',
        'attachment_type',
        'image_path',
        'title',
        'decritption',
        'mobile_user_visible'
    ];
}
