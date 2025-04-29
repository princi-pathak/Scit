<?php

namespace App\Http\Controllers\Rota;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Exception;

use App\Http\Requests\Rota\StaffWorkerRequest;

use App\Services\Rota\StaffWorkerService;

use Illuminate\Support\Facades\Auth;



class StaffController extends Controller
{

    protected $staffWorkerService;
    public function __construct(StaffWorkerService $staffWorkerService)
    {
        $this->staffWorkerService = $staffWorkerService;
    }
    public function index(){
        $homeId = Auth::user()->home_id;
        $data['staffWorkers'] = $this->staffWorkerService->getStaffWorkerData($homeId);

        return view('rotaStaff.staff.index', $data);
    }

    
    public function store(StaffWorkerRequest $request){
        $validated = $request->validated();

        try {
            $this->staffWorkerService->saveStaffWorkerData($validated, Auth::user()->home_id);
            // $response = StaffWorker::create($validated);
            return response()->json(['status' => 'success', 'message' => 'Form submitted successfully!']);
        } catch (Exception $e) {
            Log::error('Form submission failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Something went wrong while saving. Please try again.']);
        }

    }
}
