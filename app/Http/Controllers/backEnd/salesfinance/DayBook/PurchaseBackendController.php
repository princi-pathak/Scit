<?php

namespace App\Http\Controllers\backEnd\salesfinance\DayBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use App\Models\Construction_tax_rate;
use App\Models\PurchaseExpenses;
use Illuminate\Support\Carbon;
use App\Http\Requests\Daybook\PurchaseDayBookRequest;
use App\Models\DayBook\PurchaseDayBook;
use App\Home;
use App\Models\DayBook\SalesDayBook;
class PurchaseBackendController extends Controller
{
    public function index()
    {
        $data['page'] = "dayBook";
        return view('backEnd.salesFinance.DayBook.purchase_day_book', $data);
    }
    public function purchase_type()
    {
        $data['page'] = "purchaseExpenese";
        $data['purchase_expenses'] = PurchaseExpenses::where('deleted_at', null)->get();
        return view('backEnd.salesFinance.DayBook.purchase_expenses', $data);
    }
    public function create()
    {
        $data['page'] = "dayBook";
        return view('backEnd.salesFinance.DayBook.purchase_day_book_form', $data);
    }
    public function purchase_type_add()
    {
        $data['page'] = "purchaseExpenese";
        return view('backEnd.salesFinance.DayBook.purchase_expenses_form', $data);
    }

    public function save_purchase_expenses_type(Request $request)
    {
        $data['page'] = "purchaseExpenese";

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $data = PurchaseExpenses::updateOrCreate(['id' => $request['purchase_expense_id']], $validatedData);

        if (empty($request['purchase_expense_id'])) {
            if ($data) {
                return redirect()->route('backend.purchase_expenses_type')->with('success', 'Purchase expenses type added successfully!');
            } else {
                return redirect()->route('backend.purchase_expenses_type_add')->with('error', 'Failed to save purchase expenses type');
            }
        } else {
            if ($data) {
                return redirect()->route('backend.purchase_expenses_type')->with('success', 'Purchase expenses type edited successfully!');
            } else {
                return redirect()->route('backend.purchase_expenses_type_add')->with('error', 'Failed to edit purchase expenses type');
            }
        }
    }

    public function changeStatus(Request $request)
    {
        $data = PurchaseExpenses::find($request->id);
        if ($data) {
            $data->status = !$data->status;
            $data->save();
            return response()->json(['success' => true, 'message' => 'Status changed successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to change status']);
        }
    }

    public function deletePurchaseExpensesType($id)
    {
        try {
            $expense = PurchaseExpenses::findOrFail($id); // Ensure the record exists
            $expense->delete(); // Delete the record
            return redirect()->back()->with('success', 'Purchase expense type deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete purchase expense type.');
        }
    }
    public function editPurchaseExpensesType($id)
    {
        $data['page'] = "dayBook";
        $data['purchase_expenses'] = PurchaseExpenses::findOrFail($id);
        return view('backEnd.salesFinance.DayBook.purchase_expenses_form', $data);
    }

    public function getSupplierData(){
        $data = Supplier::getActiveSuppliers(Auth::user()->home_id, Auth::user()->id);

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data'
        ]);
    }

    public function getPurchaseExpense(){
        $data = PurchaseExpenses::where('deleted_at', null)->where('status', true)->get();
        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data'
        ]);
    }

    public function getActiveTaxRate(){
        $data = Construction_tax_rate::getAllTax_rate(Auth::user()->home_id, "Active");

        return response()->json([
            'success' => (bool) $data,
            'data' => $data ? $data : 'No data.'
        ]);
    }

    public function store(PurchaseDayBookRequest $request)
    {
        $data = $request->validated();
        $data['page'] = "dayBook";
        $convertedDate = Carbon::createFromFormat('d-m-Y', $data['date'])->format('Y-m-d');
        $data['date'] = $convertedDate;
        $data['home_id'] = Auth::user()->home_id;
        $response = PurchaseDayBook::updateOrCreate(['id' => $data['purchase_day_book_id'] ?? null], $data);

        if ($response->wasRecentlyCreated) {
            return response()->json([  'success' => true, 'message' => 'Purchase day book record created successfully!', 'data' => $response], 201);
        } elseif ($response->wasChanged()) {
            return response()->json([  'success' => true, 'message' => 'Purchase day book record updated successfully!', 'data' => $response], 200);
        } else {
            return response()->json([  'success' => false, 'message' => 'No changes made.', 'data' => $response], 200);
        }
    }

    public function purchase_day_book_reclaim_per(){
        return Home::where('id', Auth::user()->home_id)->value('is_registered');
    }
    
    public function reclaimPercantage(){

        $excepmt = SalesDayBook::Where('Vat', 1)->whereNull('deleted_at')->sum('netAmount');
        $standard = SalesDayBook::Where('Vat', 2)->whereNull('deleted_at')->sum('netAmount');

        $residual = (($standard) / ($standard + $excepmt))*100;
        // $reclaim  = round($residual, 2); 

        return response()->json([
            'success' => (bool) $excepmt,
            'data' => $residual ? $residual : 0
        ]);
    }  
    
}
