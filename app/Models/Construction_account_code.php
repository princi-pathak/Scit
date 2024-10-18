<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


class Construction_account_code extends Model
{
    use HasFactory;
    protected $table="construction_account_codes";
    protected $fillable=['home_id','name','departmental_code','status'];

    public static function getAllAccount_Codes($home_id){
        $data = self::whereNull('deleted_at')->where('home_id',$home_id)->get();
        return $data;
    }

    public static function saveAccount_Codes($data){
        
            $Task_type=self::updateOrCreate(['id' => $data['id'] ?? null],$data);
            return $Task_type;
    }
}
