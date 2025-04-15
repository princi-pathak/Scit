<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreInvoice extends Model
{
    use HasFactory;
    protected $table="pre_invoices";
    protected $fillable=['loggedUserId', 'home_id', 'child_id', 'start_date', 'end_date', 'no_of_days', 'current_rate', 'total_cost', 'vat','deleted_at'];

    public static function savePreInvoice($data){
        return self::updateOrCreate(['id' => $data['id'] ?? null], $data);
    }
}
