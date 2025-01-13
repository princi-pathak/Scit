<?php

namespace App\Services\Invoice;

use App\Models\Invoice\Invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

// use App\Models\QuoteCallBack;



class InvoiceService
{

    public function generateInvoiceRef()
    {
        $lastInvoice = Invoice::orderBy('id', 'desc')->first();
        $nextId = $lastInvoice ? $lastInvoice->id + 1 : 1;
        return 'INV-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    public function saveInvoiceData($data, $request, $home_id){

    $invoice = [
        'home_id' => $home_id,
        'customer_id' =>  $data['customer_id'], 
        'project_id' =>  $data['project_id'],
        'site_delivery_add_id' =>   $data['site_delivery_add_id'],
        'invoice_ref' => $this->generateInvoiceRef(),
        'invoice_type' => $data['invoice_type'],
        'customer_ref' => $data['customer_ref'],
        'invoice_date' => $data['invoice_date'],
        'customer_job_ref' => $data['customer_job_ref'],
        'purchase_order_ref' => $data['purchase_order_ref'],
        'invoice_date' => $request['invoice_date'],
        'payment_terms' => $data['payment_terms'],
        'due_date' => $request['due_date'],
        'status' => 'Draft',
        'tags' => $data['tags'],
        'customer_notes' => $data['customer_notes'],    
        'terms' => $data['tearms'],
        'internal_notes' => $data['internal_notes'],
        'sub_total' => $request['sub_total'],
        'VAT'=> $request['VAT'],
        'Total' => $request['total'],
        'outstanding' => $request['outstanding'],
        'terms' => $request['terms'],
        'internal_notes' => $request['internal_notes']
    ];

    return Invoice::create($invoice);
       
}
}
 