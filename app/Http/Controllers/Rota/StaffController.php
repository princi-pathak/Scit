<?php

namespace App\Http\Controllers\Rota;

use App\Http\Requests\Rota\StaffWorkerRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Exception;


use App\Models\Rota\StaffWorker;

class StaffController extends Controller
{
    public function index(){
        return view('rotaStaff.staff.index');
    }

    
    public function store(StaffWorkerRequest $request){

        $validated = $request->validate();

        
        try {
            $response = StaffWorker::create($validated);
            return response()->json(['status' => 'success', 'message' => 'Form submitted successfully!']);
        } catch (Exception $e) {
            Log::error('Form submission failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Something went wrong while saving. Please try again.']);
        }

        // dd($request->all());
    }
}
