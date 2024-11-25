<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ProductGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_id',
        'user_id',
        'name',
        'description',
        'code',
        'cost',
        'price',
        'status',
    ];

    public static function saveProductGroup($data, $home_id, $user_id){
        return self::updateOrCreate(['id'=> $data->id ?? null],array_merge($data, ['home_id' => $home_id, 'user_id' => $user_id]));
    }

    public static function getProductGroupData($home_id){
        return self::where('home_id', $home_id)->where('deleted_at', null)->get();
    }
}
