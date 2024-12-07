<?php
namespace App\Services;

use App\Models\Quote;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerBillingAddress;
use App\Models\Constructor_customer_site;
use App\Models\QuoteProduct;

class QuoteService
{
    public function generateQuoteRef()
    {
        $lastQuote = Quote::orderBy('id', 'desc')->first();
        $nextId = $lastQuote ? $lastQuote->id + 1 : 1;
        return 'QU-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    public function saveQuoteData(array $data, string $quoteRefId, int $homeId): Quote
    {
        return Quote::updateOrCreate( ['id' => $data['quote_id']], array_merge(['home_id' => $homeId, 'quote_ref' => $quoteRefId], $data));
    }

    public static function getQuoteData($lastSegment, $homeId)
    {

        $quotes =  Quote::with(['customer'])
            ->leftJoin('constructor_customer_sites', 'constructor_customer_sites.id', '=', 'quotes.site_add_id')
            ->leftJoin('customers', 'customers.id', '=', 'quotes.customer_id')
            ->where('quotes.home_id', $homeId)
            ->select(
                'quotes.*',
                'constructor_customer_sites.address as site_address',
                DB::raw("CASE 
                        WHEN quotes.customer_id = quotes.site_add_id THEN customers.address 
                        ELSE constructor_customer_sites.address 
                    END as customer_address")
            )
            ->orderByDesc('created_at')
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

    public function getQuoteDataOnId($id){
        $quote = Quote::with(['customer', 'products'])->find($id);
        // dd($quote);
        if (!$quote) {
            return null; // Handle case when quote is not found
        }

        return [
            'id' => $quote->id,
            'quote_ref' => $quote->quote_ref,
            'billing_add_id' => $quote->billing_add_id,
            'site_add_id' => $quote->site_add_id,
            'site_delivery_add_id' => $quote->site_delivery_add_id,
            'project_id' =>$quote->project_id,
            'quota_type' => $quote->quota_type,
            'quota_date' => $quote->quota_date,
            'expiry_date' => $quote->expiry_date,
            'customer_ref' => $quote->customer_ref,
            'customer_job_ref' => $quote->customer_job_ref,
            'purchase_order_ref' => $quote->purchase_order_ref,
            'source' => $quote->source,
            'performed_job_date' => $quote->performed_job_date,
            'period' => $quote->period,
            'tags' => $quote->tags,
            'extra_information' => $quote->extra_information,
            'customer_notes' => $quote->customer_notes,
            'tearms' => $quote->tearms,
            'internal_notes' => $quote->internal_notes,
            'sub_total' => $quote->sub_total,
            'vat_amount' => $quote->vat_amount,
            'total_amount' => $quote->total,
            'deposit' => $quote->deposit,
            'outstanding' => $quote->outstanding,
            'status' => $quote->status,
            'created_date' => $quote->created_at->format('Y-m-d'),
            'customer' => [
                'customer.id'=> $quote->customer_id,
                'name' => $quote->customer->name,
                'contact_name' => $quote->customer->contact_name,
                'telephone_country_code' => $quote->customer->telephone_country_code,
                'telephone' => $quote->customer->telephone,
                'mobile_country_code' => $quote->customer->mobile_country_code,
                'mobile' => $quote->customer->mobile,
                'email' => $quote->customer->email,
                'address' => $quote->customer->address,
                'postal_code' => $quote->customer->postal_code,
                'city' => $quote->customer->city,
                'country' => $quote->customer->country,
                'country_code' => $quote->customer->country_code,
            ],
            'products' => $quote->products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'product_id' => $product->product_id,
                    'title' => $product->name,
                    'description' => $product->description,
                    'account_code' => $product->account_code,
                    'price' => $product->price,
                    'quantity' => $product->quantity,
                    'cost_price' => $product->cost_price,
                    'price' => $product->price,
                    'markup' => $product->markup,
                    'VAT' => $product->VAT,
                    'discount' => $product->discount
                ];
            })->toArray(),
            'total' => $quote->total_amount,
        ];
    }
   
}
