<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_customer_login extends Model
{
    use HasFactory;
    protected $table = 'construction_customer_logins';
    protected $fillable = [
        'customer_id',
        'email',
        'password_type',
        'name',
        'telephone',
        'access_rights',
        'projects',
        'notes',
        'status',
    ];

    public static function saveCustomerAdditional(array $data)
    {
        if (isset($data['access_rights'])) {
            $data['access_rights'] = implode(',',$data['access_rights']);
        }
        $insert=self::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
        return $insert->id;
    }
}
