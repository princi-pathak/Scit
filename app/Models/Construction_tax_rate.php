<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Construction_tax_rate extends Model
{
    use HasFactory;
    protected $table="construction_tax_rates";
    protected $fillable=[
        'home_id',
        'name',
        'tax_rate',
        'tax_code',
        'exp_date',
        'status',
    ];

    public static function getAllTax_rate($home_id,$mode){
        $status = ($mode == 'Active') ? 1 : 0;
        if($mode){
            $data = self::whereNull('deleted_at')->where(['home_id'=>$home_id,'status'=>$status])->get();
        }else{
            $data = self::whereNull('deleted_at')->where(['home_id'=>$home_id])->get();
        }
        
        return $data;
    }

    public static function saveTax_rate($data){
        try {
            $Task_type=self::updateOrCreate(['id' => $data['id'] ?? null],$data);
            return $Task_type;
        }catch (\Exception $e) {
            Log::error('Error saving Payment Type: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to save Payment Type. Please try again.']);
        }
    }
}
