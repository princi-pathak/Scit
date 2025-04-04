<?php

namespace App\Http\Controllers\frontend\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CouncilTax;

use App\Http\Requests\CouncilTaxRequests;

class CouncilTaxController extends Controller
{
    
    public function index(){    
         return view('frontend/salesAndFinance/council_tax/council_tax');
    }

    public function saveCouncilTaxData(CouncilTaxRequests $req){
        // dd($req);

        $data = CouncilTax::updateOrCreate(
            ['id' => $req->council_tax_id], 
            $req->validated() 
        );

        if ($data->wasRecentlyCreated) {
            return response()->json([  'success' => true, 'message' => 'Council Tax record created successfully!', 'data' => $data], 201);
        } elseif ($data->wasChanged()) {
            return response()->json([  'success' => true, 'message' => 'Council Tax record updated successfully!', 'data' => $data], 200);
        } else {
            return response()->json([  'success' => false, 'message' => 'No changes made.', 'data' => $data], 200);
        }

    }   
}
