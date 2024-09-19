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
        'alert_by',
        'priority',
        'appointment_checkbox',
        'appointment_time',
        'appointment_status',
        'status',
    ];
    public static function save_appointement($data){
        // echo "<pre>";print_r($data);die;
        $loop = count($data['user_id']);
    
    for ($i = 0; $i < $loop; $i++) {
        try {
            $appointmentData = [
                'user_id' => $data['user_id'][$i],
                'home_id' => $data['home_id'],
                'job_id' => $data['job_id'] ?? 1,
                'appointment_type_id' => $data['appointment_type_id'][$i] ?? null,
                'start_date' => $data['start_date'][$i] ?? null,
                'start_time' => $data['start_time'][$i] ?? null,
                'end_date' => $data['end_date'][$i] ?? null,
                'end_time' => $data['end_time'][$i] ?? null,
                'appointment_checkbox' => $data['appointment_checkbox'][$i] ?? null,
                'appointment_status' => $data['appointment_status'][$i] ?? null,
                'appointment_time' => $data['appointment_time'][$i] ?? null,
                'priority'=>$data['priority'][$i] ?? null,
                'notes'=>$data['notes'][$i] ?? null,
            ];
            $insert = self::updateOrCreate(
                ['id' => $data['id'][$i] ?? null],
                $appointmentData
            );

        } catch (\Exception $e) {
            return response()->json(['success' => 'false', 'message' => $e->getMessage()], 500);
        }

                $result=['id'=>$insert->id];
                return $result;
        }
    }
}
