<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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

    public static function saveTaxRateData(array $data, $taxRateID = null)
    {
        $data['home_id'] = Auth::user()->home_id;
        $taxRate = self::updateOrCreate(['id' => $taxRateID], $data);
        // Return the ID of the created or updated product category
        return $taxRate->id;
    }
    public static function checkTaxRatename($taxrate_name,$taxRateID = null)
    {
        $homeId = Auth::user()->home_id;

        // If no product category ID is provided, count categories with the same name
        if (empty($taxRateID)) {
            return self::where(['home_id' => $homeId, 'name' => $taxrate_name])->count();
        } else {
            // Check for a category with the same name and the provided ID
            $checkName = self::where(['home_id' => $homeId, 'name' => $taxrate_name])
                ->where('id', '!=', $taxRateID)
                ->first();

            // If a category with the same name exists and it's not the current one, return 1
            if ($checkName) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    public static function changeTaxRateStatus($taxRateID,$status)
    {
        $taxRate = self::find($taxRateID);
        $taxRate->status = $status;
        return $taxRate->save();
    }
}
