<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LeadRejectType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status','home_id'];

    public static function getAllLeadRjectType(){
        return LeadRejectType::where('deleted_at', null)->get();
    } 

    public static function getLeadRejectType(){
        return LeadRejectType::where('deleted_at', null)->where('status', 1)->get();
    }

    public static function deleteLeadRejectType($id){
        return LeadRejectType::where('id', $id)->update(['deleted_at' => Carbon::now()]);
    } 
}
