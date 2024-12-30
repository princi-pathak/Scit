<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $formType = $this->input('form_type');
        
        if($formType === 'task_form'){
            // echo $this->input('po_id');die;
            return [
                'task_po_id'=>'required',
                'task_supplier_id'=>'required',
                'user_id'=>'required',
                'title' => 'required|string|max:255',
                'task_type_id' => 'required',
                'start_date' => 'required|date',
                'start_time' => 'required',
                'end_date' => 'required|date|after_or_equal:start_date',
                'end_time' => 'required',
            ];
        }else{
            return [
                'form_type'=>'required',
                'task_po_id '=>'required',
                'task_supplier_id'=>'required',
                'user_id_timer'=>'required',
                'title_timer' => 'required|string|max:255',
                'task_type_id' => 'required',
                'notes_timer' => 'required|date',
                'start_time_timer' => 'required',
            ];
        }
        
    }
}
