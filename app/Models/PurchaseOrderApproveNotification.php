<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderApproveNotification extends Model
{
    use HasFactory;
    protected $table="purchase_order_approve_notifications";
    protected $fillable=['po_id', 'notify_user_id', 'notification', 'sms', 'email', 'deleted_at'];
}
