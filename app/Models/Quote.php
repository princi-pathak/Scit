<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_id',
        'quote_ref',
        'customer_id',
        'site_id',
        'project_id',
        'quota_type',
        'quota_date',
        'expiry_date',
        'customer_ref', 
        'customer_job_ref', 
        'purchase_order_ref',
        'source',
        'performed_job_date',
        'period',
        'tags',
        'title',
        'title_description',
        'price',
        'vat',
        'extra_information',
        'customer_notes',
        'tearms',
        'internal_notes',
        'attachments',
        'quotes',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(QuoteItem::class);
    }

    public static function saveQuoteData($request, $quote_refid, $home_id){
        $quoteData = [
            'home_id'=> $home_id,
            'customer_id' => $request['customer_id'],
            'quote_ref' => $quote_refid,
            'quote_type' => $request['quote_type'],
            'quota_date' =>  $request['quota_date'],
            'expiry_date' => $request['expiry_date'],
            'customer_ref' => $request['customer_ref'],
            'customer_job_ref' => $request['customer_job_ref'],
            'purchase_order_ref' => $request['purchase_order_ref'],
            'source' => $request['source'],
            'performed_job_date'=> $request['performed_job_date'],
            'period' => $request['period'],
            'status' => $request['status'],
            'tags' => $request['tags'],
            'extra_information' => $request['extra_information'],
            'customer_notes' => $request['customer_notes'],
            'tearms' => $request['tearms'],
            'internal_notes' => $request['internal_notes'],
        ];

       return Quote::updateOrCreate(['id' => $request['customer_id']] , $quoteData);
    }

    public function products()
    {
        return $this->hasMany(QuoteProduct::class);
    }
}
