<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRMSection extends Model
{
    use HasFactory;
    protected $table = 'crm_sections';

    public static function getCRMSectionData(){
        return CRMSection::get();
    }
}
