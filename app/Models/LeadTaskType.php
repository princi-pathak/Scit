<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LeadTaskType extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'status', 'home_id'];

    public static function getAllLeadTask(){
        return LeadTaskType::where('deleted_at', null)->get();
    }

    public static function getLeadTaskType(){
        return LeadTaskType::where(['deleted_at'=> null, 'status' => 1])->get();
    }

    public static function deleteLeadTaskType($id){
        return LeadTaskType::where('id', $id)->update(['deleted_at' => Carbon::now()]);
    }
}
