<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_id',
        'quote_ref',
        'customer_id',
        'billing_add_id',
        'site_add_id',
        'site_delivery_add_id',
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
        'sub_total',
        'vat_amount',
        'total',
        'deposit',
        'outstanding',
        'profit',
        'extra_information',
        'customer_notes',
        'tearms',
        'internal_notes',
        'converted_to',
        'status'
    ];

    // public function items()
    // {
    //     return $this->hasMany(QuoteItem::class);
    // }

    // public static function saveQuoteData($request, $quote_refid, $home_id){
    //     $quoteData = [
    //         'home_id'=> $home_id,
    //         'customer_id' => $request['customer_id'],
    //         'quote_ref' => $quote_refid,
    //         'billing_add_id' => $request['billing_add_id'],
    //         'site_add_id' => $request['site_add_id'],
    //         'site_delivery_add_id' => $request['site_delivery_add_id'],
    //         'project_id', $request['project_id'],
    //         'quote_type' => $request['quote_type'],
    //         'quota_date' =>  $request['quota_date'],
    //         'expiry_date' => $request['expiry_date'],
    //         'customer_ref' => $request['customer_ref'],
    //         'customer_job_ref' => $request['customer_job_ref'],
    //         'purchase_order_ref' => $request['purchase_order_ref'],
    //         'source' => $request['source'],
    //         'performed_job_date'=> $request['performed_job_date'],
    //         'period' => $request['period'],
    //         'status' => $request['status'],
    //         'tags' => $request['tags'],
    //         'extra_information' => $request['extra_information'],
    //         'customer_notes' => $request['customer_notes'],
    //         'tearms' => $request['tearms'],
    //         'internal_notes' => $request['internal_notes'],
    //         'sub_total' => $request['sub_total'],
    //         'vat_amount' => $request['vat_amount'],
    //         'total' => $request['total'],
    //         'deposit' => $request['deposit'],
    //         'profit' => $request['profit'],
    //         'outstanding' => $request['outstanding'],
    //         'converted_to' => $request['converted_to'],
    //         'status' => $request['status']
    //     ];

    //    return Quote::updateOrCreate(['id' => $request['customer_id']] , $quoteData);
    // }

    public function products()
    {
        return $this->hasMany(QuoteProduct::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    // public function siteAddress()
    // {
    //     return $this->belongsTo(Constructor_customer_site::class, 'site_add_id');
    // }

    public static function getQuoteData($lastSegment, $homeId)
    {
        
        $quotes =  Quote::with(['customer'])
        ->leftJoin('constructor_customer_sites', 'constructor_customer_sites.id', '=', 'quotes.site_add_id')
        ->leftJoin('customers', 'customers.id', '=', 'quotes.customer_id')
        ->where('quotes.home_id', $homeId)
        ->select('quotes.*', 'constructor_customer_sites.address as site_address', 
                 DB::raw("CASE 
                        WHEN quotes.customer_id = quotes.site_add_id THEN customers.address 
                        ELSE constructor_customer_sites.address 
                    END as customer_address")
                )
        ->get();

        $quoteArr = array();
        foreach ($quotes as $quote) {
                $quote['id'] = $quote->id;
                $quote['quote_ref'] = $quote->quote_ref;
                $quote['quote_date'] = $quote->quote_date;
                $quote['name'] = $quote->customer->name;
            if ($quote->customer_id == $quote->site_add_id) {
                // Logic if customer_id equals site_add_id
                $quote['address'] =  $quote->customer_address; // or whatever processing needed
            } else {
                // Logic if they are different
                $quote['address'] =  $quote->site_address; // or whatever processing needed
            }
            $quote['sub_total'] = $quote->sub_total;
            $quote['vat_amount'] = $quote->vat_amount;
            $quote['total'] = $quote->total;
            $quote['deposit'] = $quote->deposit;
            $quote['profit'] = $quote->profit;
            $quote['outstanding'] = $quote->outstanding;
            array_push($quoteArr, $quote);
        }
        return $quoteArr;

    }
}
