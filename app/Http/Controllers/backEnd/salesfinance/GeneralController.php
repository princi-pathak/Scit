<?php

namespace App\Http\Controllers\backEnd\salesfinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttachmentType;
use Illuminate\Support\Facades\Session;
use Validator;
use Carbon\Carbon;

class GeneralController extends Controller
{
    // Attachment Types
    public function attachment_types_index(){
        $page = 'attachment_types';
        $attachment_types = AttachmentType::where('deleted_at', null)->get();
        return view('backEnd/salesFinance/general/attachment_types', compact('page', 'attachment_types'));
    }

    public function saveAttachmentType(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        AttachmentType::updateOrCreate(['id' => $request->attachment_type_id], array_merge($request->all(), ['home_id' =>  Session::get('scitsAdminSession')->home_id]));

        if(isset($request->attachment_type_id)){
            return response()->json(['message' => 'Record updated successfully!']);
        } else {
            return response()->json(['message' => 'Attachment Type added successfully!']);
        }
    }
    public function delete_attachment_type($id){
        $affectedRows  = AttachmentType::where('id', $id)->update(['deleted_at' => Carbon::now()]);
        if($affectedRows ){
            return redirect()->route('attachment_types.view')->with('success', "Record deleted successfully");
        } else {
            return redirect()->route('attachment_types.view')->with('error', "Record not found");
        }
    }

}
