<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_job_appointment_type extends Model
{
    use HasFactory;
    protected $table = 'construction_job_appointment_types';

    protected $fillable = [
        'home_id',
        'name',
        'hours',
        'minute',
        'auth',
        'notify_who',
        'notify_customer',
        'email',
        'sms',
        'notification',
        'on_change',
        'on_complete',
        'notify',
        'document',
        'status',
    ];
    public static function SaveJobAppointmentType($data){
        // echo "<pre>";print_r($data);die;
        try {
            $insert=self::updateOrCreate(
                ['id' => $data['id'] ?? null],
                $data
            );
        } catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
        }
        return "done";
    }
}
