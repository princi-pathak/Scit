<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table="projects";
    protected $fillable=[
        'home_id',
        'project_name',
        'project_ref',
        'customer_name',
        'start_date',
        'end_date',
        'project_value',
        'description',
        'catalogue_id',
        'status',
    ];
    public static function saveProject(array $data)
    {
        $project_count=self::count();
        $project_ref="PRO-000";
        if($project_count > 9){
            $project_ref="PRO-00";
        }else if($project_count > 99){
            $project_ref="PRO-0";
        }else if($project_count > 999){
            $project_ref="PRO-";
        }
            $data['project_ref'] = $project_ref.$project_count;
        
        // echo "<pre>";print_r($data);die;
        try {
            $insert=self::updateOrCreate(
                ['id' => $data['id'] ?? null],
                $data
            );
        } catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
        }
        return $insert;
    }
    public static function getAllProject($customer_id){
        return self::where(['customer_name'=>$customer_id,'status'=>1])->get();
    }
}
