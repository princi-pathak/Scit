<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_job_appointment extends Model
{
    use HasFactory;
    protected $table = 'construction_job_appointments';

    protected $fillable = [
        'home_id',
        'job_id',
        'user_id',
        'appointment_type_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'notes',
        'floating_appointment',
        'travel_time',
        'email',
        'sms',
        'priority',
        'single_appointment',
        'appointment_time',
        'appointment_status',
        'status',
    ];
    public static function save_appointement($data){
        // echo "<pre>";print_r($data);die;
        $loop = count($data['user_id']);
    
    for ($i = 0; $i < $loop; $i++) {
            $appointmentData = [
                'user_id' => $data['user_id'][$i],
                'home_id' => $data['home_id'],
                'job_id' => $data['job_id'] ?? 1,
                'appointment_type_id' => $data['appointment_type_id'][$i] ?? null,
                'start_date' => $data['start_date'][$i] ?? null,
                'start_time' => $data['start_time'][$i] ?? null,
                'end_date' => $data['end_date'][$i] ?? null,
                'end_time' => $data['end_time'][$i] ?? null,
                'floating_appointment' => $data['floating_appointment'][$i] ?? 0,
                'single_appointment' => $data['single_appointment'][$i] ?? 0,
                'email' => $data['email'][$i] ?? 0,
                'sms' => $data['sms'][$i] ?? 0,
                'appointment_status' => $data['appointment_status'][$i] ?? null,
                'appointment_time' => $data['appointment_time'][$i] ?? null,
                'travel_time' => $data['appointment_time'][$i] ?? null,
                'priority'=>$data['priority'][$i] ?? null,
                'notes'=>$data['notes'][$i] ?? null,
            ];
            $insert = self::updateOrCreate(
                ['id' => $data['id'][$i] ?? null],
                $appointmentData
            );      
        }
        $result=['id'=>$insert->id];
                return $result;
    }
}
