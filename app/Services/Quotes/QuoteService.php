<?php

namespace App\Services\Quotes;

use App\Models\Quote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\QuoteCallBack;
use App\Models\QuoteTask;
use App\User;
use App\Models\Quotes\QuoteRejectReasons;
use App\Models\Quotes\QuoteCustomerDeposit;


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
        return Quote::updateOrCreate(['id' => $data['quote_id']], array_merge(['home_id' => $homeId, 'quote_ref' => $quoteRefId], $data));
    }

    public static function getQuoteData($lastSegment, $homeId)
    {
        if($lastSegment == "draft"){
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
            ->where('quotes.status', "Draft")
            ->orderByDesc('created_at')
            ->get();
        } elseif($lastSegment == "accepted"){
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
            ->where('quotes.status', "Accepted")
            ->orderByDesc('created_at')
            ->get();
        } elseif ($lastSegment == "actioned"){
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
            ->where('quotes.status', "Processed")
            ->orderByDesc('created_at')
            ->get();
        } elseif ($lastSegment == "rejected"){
            $quotes =  Quote::with(['customer'])
            ->leftJoin('constructor_customer_sites', 'constructor_customer_sites.id', '=', 'quotes.site_add_id')
            ->leftJoin('customers', 'customers.id', '=', 'quotes.customer_id')
            ->leftJoin('quote_reject_reasons', 'quote_reject_reasons.quote_id', '=', 'quotes.id')
            ->leftJoin('quote_reject_types', 'quote_reject_types.id', '=', 'quote_reject_reasons.reject_type_id')
            ->where('quotes.home_id', $homeId)
            ->select(
                'quotes.*',
                'constructor_customer_sites.address as site_address',
                'quote_reject_reasons.reject_reasons', 'quote_reject_reasons.reject_type_id',
                'quote_reject_types.title',
                DB::raw("CASE 
                        WHEN quotes.customer_id = quotes.site_add_id THEN customers.address 
                        ELSE constructor_customer_sites.address 
                    END as customer_address")
            )
            ->where('quotes.status', "Rejected")
            ->orderByDesc('created_at')
            ->get();
        }
     
        // dd($quotes);

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
            $quote['status'] = $quote->status;
            array_push($quoteArr, $quote);
        }
        return $quoteArr;
    }

    public function getQuoteDataOnId($id)
    {
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
            'project_id' => $quote->project_id,
            'quota_type' => $quote->quota_type,
            'quota_date' => $quote->quota_date,
            'quota_date_deposit' => Carbon::create($quote->quota_date)->format('d/m/Y'),
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
                'customer.id' => $quote->customer_id,
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


    public function saveCallBack($data)
    {

        $record = [
            'quote_id' => $data['quote_id'],
            'call_back_date' => $data['call_back_date'],
            'call_back_time' => $data['call_back_time'],
            'contact_name' => $data['contact_name'],
            'contact_phone' => $data['contact_phone'],
            'notify' => $data['notify'] ?? null,
            'notify_date' => $data['notify_date'],
            'notify_time' => $data['notify_time'],
            'nottify_who' => $data['nottify_who'],
            'notification' => $data['notification'] ?? null,
            'email' => $data['email'] ?? null,
            'sms' => $data['sms'] ?? null,
            'notes' => $data['notes'],
        ];

        Quote::where('id', $data['quote_id'])->update(['status' => "Call Back"]);

        return QuoteCallBack::create($record);
    }

    public static function getQuoteCallBack($lastSegment, $homeId)
    {

        $quotes =  Quote::with(['customer', 'callBack'])
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
            ->where('quotes.status', "Call Back")
            ->orderByDesc('created_at')
            ->get();

        $quoteArr = array();
        foreach ($quotes as $quote) {

            $date = $quote->callBack->call_back_date; // e.g., '20/12/2024'
            $time = $quote->callBack->call_back_time;
            // $callbackDate = Carbon::createFromFormat('d/m/Y', $date);
            // $callbackTime = Carbon::createFromFormat('h:i:s', $time);    

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
            $quote['callBack_dateTime'] = $quote->callBack->call_back_date;
            $quote['outstanding'] = $quote->outstanding;
            array_push($quoteArr, $quote);
        }
        return $quoteArr;
    }

    public function saveQuoteTaskData($validatedData){
        return  QuoteTask::updateOrCreate(['id' => $validatedData['edit_quote_task_id']], $validatedData);
    }

    public function getQuoteTaskList($quote_id){
        $quoteTaskData =   QuoteTask::with('taskType')->where('quote_id', $quote_id)->get();
        $record = [];
        
        foreach($quoteTaskData as $value){
            $data = [];
            $data['id'] = $value->id;
            $data['quote_ref'] = Quote::where('id', $value->quote_id)->value('quote_ref');
            $data['userName'] = User::where('id',$value->user_id)->value('name');
            $data['title'] = $value->title;
            $data['task_type_id'] = $value->taskType->title;
            $data['start_date'] = $value->start_date;
            $data['start_time'] = $value->start_time;
            $data['end_date'] = $value->end_date;
            $data['end_time'] = $value->end_time;
            $data['notify'] = $value->notify;
            $data['notify_date'] = $value->notify_date;
            $data['notify_time'] = $value->notify_time;
            $data['notification'] = $value->notification;
            $data['email'] = $value->email;
            $data['sms'] = $value->sms;
            $data['is_recurring'] = $value->is_recurring;
            $data['is_completed'] = $value->is_completed;
            $data['notes'] = $value->notes;
            $data['created_at'] = $value->created_at;

            $record[] = $data;
        }
        // dd($record);
        return $record;
     
    }

    public function updateQuoteStatus($quote_id, $status){
        return Quote::where('id', $quote_id)->update(['status' => $status]);
    }

    public function saveQuoteRejectReasons($data)
    {
        $quoteRejectReason =  QuoteRejectReasons::updateOrCreate(['id' => $data['quote_reject_reason_id']], $data);

        $this->updateQuoteStatus($data['quote_id'], 'Rejected');
        return $quoteRejectReason;
    }

    public function saveQuoteCredit($data)
    {
        return QuoteCustomerDeposit::updateOrCreate(['id' => $data['quote_deposit_id']], $data);
    }

    public function getDepositeData($data){
       return QuoteCustomerDeposit::where('quote_id', $data->quote_id)->get();
    }
}
 