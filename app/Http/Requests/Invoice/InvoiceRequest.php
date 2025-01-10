<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            // 'customer_id' => 'required|integer|exists:customers,id',
            // 'project_id' => 'required|integer',
            // 'site_delivery_add_id'=> 'required|integer',
            // 'invoice_ref' => 'required|string',
            // 'invoice_type' => 'required|integer',
            // 'customer_ref' => 'nullable|string',
            // 'customer_job_ref' => 'nullable|string',
            // 'purchase_order_ref' => 'nullable|string',
            // 'invoice_date' => 'required|date',
            // 'payment_terms' => 'nullable|integer',
            // 'due_date' => 'required|date',
            // 'status' => 'required|string',
            // 'tags' => 'nullable|integer|tags,id',
            // 'customer_notes' => 'nullable|string',
            // 'terms' => 'nullable|string',
            // 'internal_notes' => 'nullable|string',
            'quote_id' => 'required|integer|exists:quotes,id',
            'customer_id' => 'required|integer|exists:customers,id',
            // 'invoice_id'=> 'required|integer|exists:invoices,id',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date',
            'line_item' => 'required|string',
            'description' => 'required|string',
            'desposit_perceantage' => 'required|integer',
            'sub_total' => 'required|integer',
            'discount' => 'required|integer',
            'VAT' => 'required|integer',
            'total' => 'required|integer'
        ];
    }
}
