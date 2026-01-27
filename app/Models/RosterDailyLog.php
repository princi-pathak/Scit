<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RosterDailyLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['home_id','user_id','date','visitor_name','entry_type_id','org_company','purpose_visit','client_id','arrival_time','departure_time','notes','available_for_overtime','follow_details','destination','transport_id','risk_assessment','outing_summary','deleted_at'];

    public function subCategorys(){
        return $this->belongsTo(DailyLogSubCategory::class, 'entry_type_id' , 'id');
    }
}
