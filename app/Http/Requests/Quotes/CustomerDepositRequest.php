<?php

namespace App\Http\Requests\Quotes;

use Illuminate\Foundation\Http\FormRequest;

class CustomerDepositRequest extends FormRequest
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
            'quote_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'reference' => 'required|string',
            'deposit_percantage'=> 'required|integer|max:100',
            'amount' => 'required|string',
            'description' => 'required|string',
            'quote_deposit_id' => 'nullable|integer',
            'payment_type' => 'nullable|integer',
            'deposit_date' => 'nullable|date'
        ];
    }
}
