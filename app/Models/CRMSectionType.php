<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CRMSectionType extends Model
{
    use HasFactory;

    protected $table = 'crm_section_types';

    protected $fillable = ['home_id','title', 'crm_section', 'color_code', 'status'];

    public static function getCRMSectionTypes(){
        return CRMSectionType::where('deleted_at', null)->get();
    }

    public static function deleteCRMSectionType($id){
        return CRMSectionType::where('id', $id)->update(['deleted_at' => Carbon::now()]);
    }

}
