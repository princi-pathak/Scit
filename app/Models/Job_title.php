<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_title extends Model
{
    use HasFactory;
    protected $table = 'job_titles';

    protected $fillable = [
        'home_id',
        'name',
        'status',
    ];

    public static function getCustomerJobTitle(){
        return self::where('deleted_at', null)->where('status', 1)->get();
    } 

    public static function saveJobTitle(array $data, $home_id){
        return self::updateOrCreate(['id' => $data['job_title_id'] ], array_merge($data, ['home_id' =>  $home_id]));
    }
}
