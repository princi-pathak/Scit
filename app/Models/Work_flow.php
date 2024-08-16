<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_flow extends Model
{
    use HasFactory;
    protected $table = 'work_flows';

    protected $fillable = [
        'home_id',
        'job_type_id',
        'flow_name',
        'appointment_id',
        'status',
    ];
   public static function work_flow_save($data){
    // echo "<pre>";print_r($data['job_type_id']);die;
        try {
            $appointment_id=count($data['appointment_id']);
            for($i=0;$i<$appointment_id;$i++){
                $insert=self::updateOrCreate(
                    ['id' => $data['id'] ?? null,
                    'home_id'=>$data['home_id'] ?? null,
                    'job_type_id'=>$data['job_type_id'] ?? null,
                    'appointment_id'=> $data['appointment_id'][$i] ?? null]
                );
            }
            
        } catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
        }
        return true;
    }
}
