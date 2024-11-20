<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogHistory extends Model
{
    use HasFactory;
    protected $table="log_histories";
    protected $fillable=['home_id', 'taskId', 'userId', 'userType', 'type', 'notes', 'status', 'modelName'];

    public static function saveLogHistory(array $data)
    {
        $insert=self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
        return $insert;
    }
}
