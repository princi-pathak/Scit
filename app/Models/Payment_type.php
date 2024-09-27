<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Payment_type extends Model
{
    use HasFactory;
    protected $table="payment_types";
    protected $fillable=['home_id','title','mobile_visible','status'];

    public static function getAllPayment_type(){
        $data = self::whereNull('deleted_at')->get();
        return $data;
    }

    public static function savePayment_type($data)
    {
        try {
            $AttachmentType=self::updateOrCreate(['id' => $data['id'] ?? null],$data);
            return $AttachmentType;
        }catch (\Exception $e) {
            Log::error('Error saving Payment Type: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to save Payment Type. Please try again.']);
        }
    }
}
