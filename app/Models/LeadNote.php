<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
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

    public static function getLeadNoteFromLeadId($id){
        return LeadNote::where('lead_id', $id)->where('status', 1)->get();
    }

    public static function getLeadNoteFromleadNoteType($id){
        return DB::table('lead_notes')
        ->join('lead_note_types', 'lead_note_types.id', '=', 'lead_notes.notes_type_id')
        ->select('lead_notes.*', 'lead_note_types.*')
        ->where('lead_notes.lead_id', $id)
        ->get();
    }
}
