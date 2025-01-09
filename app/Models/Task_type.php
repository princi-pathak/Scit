<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Task_type extends Model
{
    use HasFactory;
    protected $table="task_types";
    protected $fillable=['home_id','title','status'];

    public function quoteTask()
    {
        return $this->hasOne(QuoteTask::class, 'task_type_id');
    }

    public static function getAllTask_type($home_id){
        $data = self::whereNull('deleted_at')->where('home_id',$home_id)->get();
        return $data;
    }

    public static function saveTask_type($data){
        try {
            $Task_type=self::updateOrCreate(['id' => $data['id'] ?? null],$data);
            return $Task_type;
        }catch (\Exception $e) {
            Log::error('Error saving Payment Type: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to save Payment Type. Please try again.']);
        }
    }
    public static function saveTaskTypeData($request, $home_id){
        return self::updateOrCreate(['id' => $request['task_type_id']], array_merge($request, ['home_id' => $home_id]));
    }

    public static function getAllAciveTask_type($home_id){
        $data = self::whereNull('deleted_at')->where('status', 1)->where('home_id',$home_id)->get();
        return $data;
    }
}
