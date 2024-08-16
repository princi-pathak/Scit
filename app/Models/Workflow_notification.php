<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow_notification extends Model
{
    use HasFactory;
    protected $table = 'workflow_notifications';

    protected $fillable = [
        'job_type_id',
        'row_id',
        'notify_when_on_complete',
        'notify_when_on_change',
        'notify_who',
        'notify_customer_on_complete',
        'sendas',
        'sms',
        'status',
    ];
   public static function work_flow_notification_save($data){
    // echo "<pre>";print_r($data['job_type_id']);die;
        try {
            $appointment_id=count($data['notify_who']);
            for($i=0;$i<$appointment_id;$i++){
                $insert=self::updateOrCreate(
                    ['id' => $data['id'] ?? null,
                    'job_type_id'=>$data['job_type_id_noti'] ?? null,
                    'row_id'=>$data['row_id_noti'] ?? null,
                    'notify_when_on_complete'=>$data['notify_when_on_complete'] ?? null,
                    'notify_when_on_change'=>$data['notify_when_on_change'] ?? null,
                    'notify_customer_on_complete'=>$data['notify_customer_on_complete'] ?? null,
                    'sendas'=>$data['sendas'] ?? null,
                    'sms'=>$data['sms'] ?? null,
                    'notify_who'=> $data['notify_who'][$i] ?? null]
                );
            }
            
        } catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
        }
        return true;
    }
}
