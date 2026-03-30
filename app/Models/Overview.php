<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Overview extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['home_id','user_id','client_id','care_setting','plan_type','assessment_date','review_date','assessed_by','status','preferred_name','language','religion','cultural_needs','morning','afternoon','evening','night','deleted_at'];

    public function objectives()
    {
        return $this->hasMany(Objective::class, 'overview_id' ,'id');
    }

    public function tasks()
    {
        return $this->hasMany(CarePlanTask::class, 'overview_id', 'id');
    }

    public function medications()
    {
        return $this->hasMany(CarePlanMedication::class, 'overview_id', 'id');
    }
    public function risks()
    {
        return $this->hasMany(CarePlanRisk::class, 'overview_id', 'id');
    }
    public function pharmacy()
    {
        return $this->hasOne(CarePlanPharmacy::class, 'overview_id', 'id');
    }

    public function preferences()
    {
        return $this->hasOne(CarePlanPreference::class, 'overview_id', 'id');
    }

    public function emergencyInfo()
    {
        return $this->hasOne(CarePlanEmergencyInformation::class, 'overview_id', 'id');
    }
}
