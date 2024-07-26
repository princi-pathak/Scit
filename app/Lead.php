<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LeadNote;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';

    protected $fillable = [
        'home_id',
        'customer_id',
        'lead_ref',
        'assign_to',
        'source',
        'status',
        'prefer_date',
        'prefer_time',
    ];

    public static function getAllLeadCount(){
        $all = Lead::whereNotIn('assign_to', [0])->whereNotIn('leads.status', ['6'])->count();
        return $all;
    }

    public static function getUnassignedCount(){
        $all = Lead::where('assign_to', 0)->count();
        return $all;
    }
    
    public static function getRejectedCount(){
        $all = Lead::where('status', '6')->count();
        return $all;
    }

    public function notes()
    {
        return $this->hasMany(LeadNote::class);
    }
}
