<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
        return Lead::whereNotIn('assign_to', [0])->whereNotIn('leads.status', ['6'])->count();
    }

    public static function getUnassignedCount(){
        return Lead::where('assign_to', 0)->count();
    }
    
    public static function getRejectedCount(){
        return Lead::where('status', '6')->count();
    }

    public function notes()
    {
        return $this->hasMany(LeadNote::class);
    }

    public static function getLeadByUser(){
        return Lead::where('user_id', Auth::user()->id)->where('home_id', Auth::user()->home_id)->count();
    } 

    public static function getAuthorizationCount(){
        return Lead::where('authorization_status', 1)->count();
    }

    public static function leadForAdminAuthorization($id){
        return Lead::where('id', $id)->update(['authorization_status' => 1]);
    }

    public static function LeadAuthorizedAdmin($id){
        return Lead::where('id', $id)->update(['authorization_status' => 2]);
    } 
}
