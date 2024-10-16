<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table="expenses";
    protected $fillable=[
       'home_id', 'job_id', 'title', 'amount', 'vat', 'vat_amount', 'gross_amount', 'expense_date', 'user_id', 'reference', 'customer_id', 'project_id', 'job', 'job_appointment_id', 'authorised', 'billable', 'paid', 'reject', 'notes', 'attachments', 'deleted_at'
    ];

    public static function expense_save($data){
        // echo "<pre>";print_r($data);
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
    public static function getAllExpense($home_id){
        return self::where(['home_id'=>$home_id,'deleted_at'=>null])->get();
    }
}
