<?php

namespace App\Http\Requests\Quotes;

use Illuminate\Foundation\Http\FormRequest;

class QuoteTaskRequest extends FormRequest
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
        return [
            'quote_id' => 'required|integer|exists:quotes,id',
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'task_type_id' => 'required|integer|exists:task_types,id',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_date' => 'required|date',
            'end_time' => 'required',
            'is_recurring' => 'nullable|boolean',
            'yesOn' => 'nullable|boolean',
            'notify_date' => 'nullable|date',
            'notify_time' => 'nullable',
            'notification' => 'nullable|boolean',
            'email' => 'nullable|boolean',
            'sms' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ];
    }
}
