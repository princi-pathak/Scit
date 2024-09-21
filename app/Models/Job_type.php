<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work_flow;

class Job_type extends Model
{
    use HasFactory;
    protected $table = 'job_types';

    protected $fillable = [
        'home_id',
        'name',
        'default_days',
        'customer_visible',
        'appointment_id',
        'status',
    ];
   public static function job_type_save_data($data){
        try {
            $insert=self::updateOrCreate(
                ['id' => $data['id'] ?? null],
                $data
            );
        } catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
        }
        return $insert->id;
    }
    
}
