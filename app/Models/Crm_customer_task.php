<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm_customer_task extends Model
{
    use HasFactory;
    protected $table="crm_customer_tasks";
    protected $fillable=['home_id', 'customer_id', 'user_id', 'title', 'task_type_id', 'start_date', 'start_time', 'end_date', 'end_time', 'is_recurring', 'notify', 'notification', 'email', 'sms', 'notify_date', 'notify_time', 'notes'];

    public static function save_customer_task($data){
        return self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    }
    public static function getAllcrmTask($id){
        return self::where('customer_id',$id);
    }
}
