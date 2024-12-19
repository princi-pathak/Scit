<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Department extends Model
{
    use HasFactory;
    protected $table="departments";
    protected $fillable=['home_id','title','status'];

    public static function getAllDepartment($home_id){
        $data = self::whereNull('deleted_at')->where(['home_id'=>$home_id])->get();
        return $data;
    }

    public static function save_Department($data){
        $department=self::updateOrCreate(['id' => $data['id'] ?? null],$data);
        return $department;
    }
}
