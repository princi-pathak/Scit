<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor_additional_contact extends Model
{
    use HasFactory;
    protected $table = 'constructor_additional_contacts';

    protected $fillable = [
        'contact_name',
        'job_title_id',
        'email',
        'telephone',
        'mobile',
        'address',
        'city',
        'country',
        'postcode',
        'default_billing',
        'fax',
        'country_id',
        'status',
    ];
}
