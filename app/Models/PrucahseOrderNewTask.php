<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrucahseOrderNewTask extends Model
{
    use HasFactory;
    protected $table="purchase_order_new_tasks";
    protected $fillable=['home_id', 'po_id', 'supplier_id', 'user_id', 'title', 'task_type_id', 'start_date', 'start_time', 'end_date', 'end_time', 'is_recurring', 'notify', 'notify_date', 'notify_time', 'notification', 'email', 'sms', 'notes', 'deleted_at'];

    public static function savePurchaseOrderNewTask($data){
        return self::updateOrCreate(['id'=>$data['id'] ?? null],$data);
    }
}
