<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Lead;

class LeadNote extends Model
{
    use HasFactory;

    protected $fillable = ['lead_id', 'notes_type_id', 'home_id', 'notes'];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function leadNoteType(): HasOne
    {
        return $this->hasOne(LeadNoteType::class);
    }
}
