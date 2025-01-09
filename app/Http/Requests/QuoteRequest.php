<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
        $rules = [
            'customer_id' => 'required|exists:customers,id',
            'quota_date' => 'required|date',
        ];

        // Check if 'item' is present in the request
        if ($this->has('products')) {
            $rules['products.*.title.item_title'] = 'nullable|string|max:255';
            $rules['products.*.title.item_desc'] = 'nullable|string';
            $rules['products.*.description.item_description'] = 'nullable|string';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => 'Customer is required.',
            'quota_date.required' => 'Quote date is required.',
            'products.*.title.item_title.string' => 'Item title must be a string.',
        ];
    }
}
