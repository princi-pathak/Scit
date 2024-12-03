<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\QuoteType;
use App\Models\Quote;
use App\Models\QuoteProduct;

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

use App\Services\QuoteService;
use App\Services\QuoteProductService;

use App\Http\Requests\QuoteRequest;

class QuoteController extends Controller
{

    protected $quoteService;
    protected $itemService;

    public function __construct(QuoteService $quoteService, QuoteProductService $itemService)
    {
        $this->quoteService = $quoteService;
        $this->itemService = $itemService;
    }

    public function dashboard()
    {
        $data['page'] = "quotes";
        return view('frontEnd.salesAndFinance.quote.dashboard', $data);
    }
    public function create()
    {
        $data['page'] = "quotes";
        $data['quoteSource'] = QuoteSource::getAllQuoteSourcesHome(Auth::user()->home_id);
        $data['countries'] = Country::getCountriesNameCode();
        $data['product_categories'] = Product_category::with('parent', 'children')->where('home_id', Auth::user()->home_id)->where('status', 1)->where('deleted_at', NULL)->get();
        // dd($data['product_categories']);
        return view('frontEnd.salesAndFinance.quote.quote_form', $data);
    }
    public function index()
    {
        $data['page'] = "quotes";
        $data['quotes'] = Quote::getQuoteData(Auth::user()->home_id);
        // dd($data['quotes']);
        return view('frontEnd.salesAndFinance.quote.draft', $data);
    }

    // Quote Type
    public function quote_type()
    {
        $data['page'] = "setting";
        $data['quote_type'] = QuoteType::getAllQuoteType(Auth::user()->home_id);
        return view('frontEnd.salesAndFinance.quote.quote_type', $data);
    }

    public function saveQuoteType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        QuoteType::updateOrCreate(['id' => $request->quote_type_id],  array_merge($request->all(), ['home_id' => Auth::user()->home_id]));
        if (isset($request->quote_type_id)) {
            return response()->json(['success' => true, 'message' => 'Quote Type updated successfully']);
        } else {
            return response()->json(['success' => true, 'message' => 'Quote Type added successfully.']);
        }
    }

    public function deleteQuoteType(Request $request)
    {
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
    public function quote_sources()
    {
        $data['page'] = "setting";
        $data['quote_sources'] = QuoteSource::getAllQuoteSources();
        return view('frontEnd.salesAndFinance.quote.quote_sources', $data);
    }

    public function saveQuoteSources(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        QuoteSource::updateOrCreate(['id' => $request->quote_source_id],  array_merge($request->all(), ['home_id' => Auth::user()->home_id]));
        if (isset($request->quote_source_id)) {
            return response()->json(['success' => true, 'message' => 'Quote Sources updated successfully.']);
        } else {
            return response()->json(['success' => true, 'message' => 'Quote Sources added successfully.']);
        }
    }

    public function deleteQuoteSource(Request $request)
    {
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
    public function quote_reject_type()
    {
        $data['page'] = "setting";
        $data['quote_reject_type'] = QuoteRejectType::getAllQuoteRejectType();
        return view('frontEnd.salesAndFinance.quote.quote_reject_type', $data);
    }

    public function saveQuoteRejectType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        QuoteRejectType::updateOrCreate(['id' => $request->quote_reject_type_id],  array_merge($request->all(), ['home_id' => Auth::user()->home_id]));
        if (isset($request->quote_reject_type_id)) {
            return response()->json(['success' => true, 'message' => 'Quote Reject Type updated successfully.']);
        } else {
            return response()->json(['success' => true, 'message' => 'Quote Reject Type added successfully.']);
        }
    }

    public function deleteQuoteRejectType(Request $request)
    {
        $record = QuoteRejectType::find($request->id);
        if ($record) {
            $record->deleted_at = now();
            $record->save();  // Save the updated record
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Record not found']);
        }
    }

    public function saveCustomerType(Request $request)
    {

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

    public function getCustomerType()
    {
        $data = Customer_type::getCustomerType(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function saveRegion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $saveData = Region::updateOrCreate(['id' => $request->id ?? null], array_merge($request->all(), ['home_id' => Auth::user()->home_id]));

        return response()->json([
            'success' => (bool) $saveData,
            'message' => $saveData ? 'Region added successfully.' : 'Error in region add.'
        ]);
    }

    public function getRegions()
    {
        $data = Region::getRegions(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function getCurrencyData()
    {
        $data = Currency::getCurrencyData();

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function getQuoteTypes()
    {
        $data = QuoteType::getActiveQuoteType(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function store(QuoteRequest $request)
    {       
        try {
            $qutRef = $request->quote_ref ?? $this->quoteService->generateQuoteRef();
            $quote = $this->quoteService->saveQuoteData($request->all(), $qutRef, Auth::user()->home_id);

            if ($request->has('products')) {
                $item = $this->itemService->saveItems($request->input('products'), $quote->id);
            }

            if ($quote->wasRecentlyCreated) {
                $message =  'Quote created successfully.';
                return redirect()->route('quote.edit', ['id' => $quote->id])->with('success', $message);
            } else {
                $message =  'Quote updated successfully.';
                return redirect()->route('quotes.quotes')->with('success', $message);
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

    public function edit($id)
    {
        $data['page'] = "quotes";
        $data['quoteSource'] = QuoteSource::getAllQuoteSourcesHome(Auth::user()->home_id);
        $data['countries'] = Country::getCountriesNameCode();
        $data['product_categories'] = Product_category::with('parent', 'children')->where('home_id', Auth::user()->home_id)->where('status', 1)->where('deleted_at', NULL)->get();
        // dd($data['product_categories']);
        return view('frontEnd.salesAndFinance.quote.quote_form', $data);
    }
    public function getUsersList()
    {
        $data = User::getHomeUsers(Auth::user()->home_id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }
    public function details(){
        return view('frontEnd.salesAndFinance.quote.add_quote');
    }
}
