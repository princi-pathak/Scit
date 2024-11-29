<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\QuoteType; 
use App\Models\Quote; 
use App\Models\QuoteSource;
use App\Models\QuoteRejectType;
use App\Models\Customer_type;
use App\Models\Region;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Product_category;
use Illuminate\Database\QueryException;
use App\User;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\QuoteRequest;

class QuoteController extends Controller
{

    public function dashboard(){
        $data['page'] = "quotes";
        return view('frontEnd.salesAndFinance.quote.dashboard', $data);
    }
    public function create(){
        $data['page'] = "quotes";
        $data['quoteSource'] = QuoteSource::getAllQuoteSourcesHome(Auth::user()->home_id);
        $data['countries'] = Country::getCountriesNameCode();
        $data['product_categories'] = Product_category::with('parent', 'children')->where('home_id',Auth::user()->home_id)->where('status',1)->where('deleted_at',NULL)->get();
        // dd($data['product_categories']);
        return view('frontEnd.salesAndFinance.quote.quote_form', $data);
    }
    public function index(){
        $data['page'] = "quotes";
        return view('frontEnd.salesAndFinance.quote.draft', $data);
    }

    // Quote Type
    public function quote_type(){
        $data['page'] = "setting";
        $data['quote_type'] = QuoteType::getAllQuoteType(Auth::user()->home_id);
        return view('frontEnd.salesAndFinance.quote.quote_type', $data);
    }

    public function saveQuoteType(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        QuoteType::updateOrCreate(['id' => $request->quote_type_id],  array_merge($request->all() , ['home_id' => Auth::user()->home_id]));
        if ( isset($request->quote_type_id)) {
            return response()->json(['success' => true, 'message' => 'Quote Type updated successfully']);
        } else {
            return response()->json(['success' => true, 'message' => 'Quote Type added successfully.']);
        }
    }

    public function deleteQuoteType(Request $request){
        $record = QuoteType::find($request->id);
        if ($record) {
            $record->deleted_at = now();
            $record->save();  // Save the updated record
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Record not found']);
        }
    }

    // Quote Sources
    public function quote_sources(){
        $data['page'] = "setting";
        $data['quote_sources'] = QuoteSource::getAllQuoteSources();
        return view('frontEnd.salesAndFinance.quote.quote_sources', $data);
    }

    public function saveQuoteSources(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        QuoteSource::updateOrCreate(['id' => $request->quote_source_id],  array_merge($request->all() , ['home_id' => Auth::user()->home_id]));
        if ( isset($request->quote_source_id)) {
            return response()->json(['success' => true, 'message' => 'Quote Sources updated successfully.']);
        } else {
            return response()->json(['success' => true, 'message' => 'Quote Sources added successfully.']);
        }
    }

    public function deleteQuoteSource(Request $request){
        $record = QuoteSource::find($request->id);
        if ($record) {
            $record->deleted_at = now();
            $record->save();  // Save the updated record
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Record not found']);
        }
    }

    
    // Quote Reject Type
    public function quote_reject_type(){
        $data['page'] = "setting";
        $data['quote_reject_type'] = QuoteRejectType::getAllQuoteRejectType();
        return view('frontEnd.salesAndFinance.quote.quote_reject_type', $data);
    }

    public function saveQuoteRejectType(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        QuoteRejectType::updateOrCreate(['id' => $request->quote_reject_type_id],  array_merge($request->all() , ['home_id' => Auth::user()->home_id]));
        if ( isset($request->quote_reject_type_id)) {
            return response()->json(['success' => true, 'message' => 'Quote Reject Type updated successfully.']);
        } else {
            return response()->json(['success' => true, 'message' => 'Quote Reject Type added successfully.']);
        }
    }

    public function deleteQuoteRejectType(Request $request){
        $record = QuoteRejectType::find($request->id);
        if ($record) {
            $record->deleted_at = now();
            $record->save();  // Save the updated record
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Record not found']);
        }
    }

    public function saveCustomerType(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $saveData = Customer_type::create(array_merge($request->all(), ['home_id' => Auth::user()->home_id]));
        if ($saveData) {
            return response()->json(['success' => true, 'message' => 'Customer Type added successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Error in customer Creation.']);
        }
    } 

    public function getCustomerType(){
        $data = Customer_type::getCustomerType(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function saveRegion(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $saveData = Region::updateOrCreate(['id'=>$request->id ?? null],array_merge($request->all(), ['home_id' => Auth::user()->home_id]));

        return response()->json([
            'success' => (bool) $saveData,
            'message' => $saveData ? 'Region added successfully.' :'Error in region add.'
        ]);


        // if ($saveData) {
        //     return response()->json(['success' => true, 'message' =>'Region added successfully.' ]);
        // } else {
        //     return response()->json(['success' => false, 'message' => 'Error in region add.']);
        // }
    }

    public function getRegions(){
        $data = Region::getRegions(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function getCurrencyData(){
        $data = Currency::getCurrencyData();
        
        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    } 

    public function getQuoteTypes(){
        $data = QuoteType::getActiveQuoteType(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function store(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'customer_id' => 'required',
                'quota_date' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if (!isset($request->quote_ref)) {
                $lastQuote = Quote::orderBy('id', 'desc')->first();
                $nextId = $lastQuote ? $lastQuote->id + 1 : 1;
                $quote_refid = 'QU-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
            } else {
                $quote_refid = $request->quote_ref;
            }

            $titleArr = [];

            $quote = Quote::saveQuoteData($request->all(), $quote_refid, Auth::user()->home_id);
            // dd($request->input('item'));
            foreach ($request->input('item') as $itemData ) {
                // dd($itemData);
                if (isset($itemData['title']['item_title']) && isset($itemData['title']['item_desc'])) {
                    $titleData = [
                        'quote_id' => $quote->id,  // Assuming you have a Quote model
                        'type' => 1,  // Define the type if necessary
                        'section_type' => 'title',  // Section type is 'title'
                        'title' => $itemData['title']['item_title'],
                        'description' => $itemData['title']['item_desc'],
                    ];
                    dd($titleData);
                    // Save both fields (item_title and item_desc) in the same row
                    $quote->items()->create($titleData);
                }
        
                // Handle description (item_description)
                if (isset($itemData['description']['item_description'])) {
                    $descriptionData = [
                        'quote_id' => $quote->id,  // Assuming you have a Quote model
                        'type' => 1,  // Define the type if necessary
                        'section_type' => 'description',  // Section type is 'description'
                        'title' => '',  // No title for description
                        'description' => $itemData['description']['item_description'],
                    ];
        
                    // Save the description in a separate row
                    $quote->items()->create($descriptionData);
                }

         
                // 'quote_id' => $quote->id,
                // 'type' => 1,
                // 'section_type' => $itemData['itemDetails'],
                // 'product_id' => $itemData['product_id'],
                // 'title' => $itemData['item_title'],
                // 'decritption' => $itemData['item_desc'],
                // 'account_code' => $itemData['account_code'],
                // 'quantity' => $itemData['quantity'],
                // 'cost_price' => $itemData['cost_price'],
                // 'price' => $itemData['price'],
                // 'markup' => $itemData['markup'],
                // 'VAT' => $itemData['VAT'],
                // 'discount' => $itemData['discount'],
                // 'amount' => $itemData['amount'],
                // 'profit' => $itemData['profit']

                // if(!empty($itemData["title"]["item_title"])){
                //     $title = [
                //         'quote_id' => $quote->id,
                //         'type' => 1,
                //         'section_type' => "title",
                //         'title' => $itemData["title"]["item_title"],
                //         'description' => $itemData["title"]["item_desc"] 
                //     ];
                //     // dd($title);
                //     $quote->items()->create($title);
                // } 

                // if(!empty($itemData["description"]["item_description"])){
                //     $description = [
                //         'quote_id' => $quote->id,
                //         'type' => 1,
                //         'section_type' => "description",
                //         'description' => $itemData["description"]["item_description"]
                //     ];

                //     // dd($description);
                //     $quote->items()->create($description);
                // } 
            }


            Log::info('This is an informational message.', [$quote]);
            $data = array();
            return view('frontEnd.salesAndFinance.quote.draft', $data);
    
        } catch (QueryException $e) {
            // Handle database error
            Log::error('This is an error message from db.', [$e->getMessage()]);
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            // Handle general errors
            Log::error('This is an error message.', [$e->getMessage()]);
            return response()->json(['error' => 'An error occurred: ' . $e], 500);
        }
    }
    public function getUsersList(){
        $data = User::getHomeUsers(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);

    }
}
