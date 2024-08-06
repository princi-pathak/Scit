<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class LeadNoteType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'home_id'];

    public function leadNote(): BelongsTo
    {
        return $this->belongsTo(LeadNote::class);
    }

    public static function getAllLeadNoteType(){
        return LeadNoteType::where('deleted_at', null)->get();
    } 

    public static function getLeadNoteTypeWithHomeId($home_id){
        return LeadNoteType::where(['deleted_at'=> null, 'status' => 1, 'home_id' => $home_id])->get();
    }

    public static function deleteLeadNoteType($id){
        return LeadNoteType::where('id', $id)->update(['deleted_at' => Carbon::now()]);
    } 

}

