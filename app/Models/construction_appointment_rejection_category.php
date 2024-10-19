<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class construction_appointment_rejection_category extends Model
{
    use HasFactory;
    protected $table = 'construction_appointment_rejection_categories';

    protected $fillable = [
        'home_id',
        'user_id',
        'appointment_status',
        'category',
        'status',
    ];
    public static function SaveAppointmentRejectionCategory($data){
        // echo "<pre>";print_r($data);die;
        
            $insert=self::updateOrCreate(
                ['id' => $data['id'] ?? null],
                $data
            );
        
        return $insert;
    }
}
