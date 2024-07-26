<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeadNoteType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'home_id'];

    public function leadNote(): BelongsTo
    {
        return $this->belongsTo(LeadNote::class);
    }

}

