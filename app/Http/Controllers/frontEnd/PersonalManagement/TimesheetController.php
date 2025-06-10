<?php

namespace App\Http\Controllers\frontEnd\PersonalManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonalManagement\TimeSheet;
use App\Http\Requests\PersonalManagement\TimeSheetRequest;

class TimesheetController extends Controller
{
    public function save(TimeSheetRequest $request){
        
        $validated = $request->validated();
        
        TimeSheet::create($validated);

         return response()->json([
            'message' => 'Time sheet saved successfully.',
            'data' => $validated
        ]);
    }
}


