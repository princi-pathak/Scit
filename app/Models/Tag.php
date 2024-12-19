<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Tag extends Model
{
    use HasFactory;
    protected $table="tags";
    protected $fillable=['home_id','title','status'];

    public static function getAllTag($home_id){
        return self::whereNull('deleted_at')->where('home_id',$home_id)->get();   
    }

    public static function saveTag($data){
        return self::updateOrCreate(['id' => $data['id'] ?? null],$data);
    }

}
