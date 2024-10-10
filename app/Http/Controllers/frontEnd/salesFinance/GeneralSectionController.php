<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\AttachmentType;
use App\Models\Payment_type;
use App\Models\Region;
use App\Models\Task_type;
use App\Models\Tag;

class GeneralSectionController extends Controller
{
    public function attachments_types(Request $request){
        $home_id = Auth::user()->home_id;
        $data['attachmentType']=AttachmentType::getAllAttachmentType();
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.attachment_type',$data);
    }

    public function save_attachment_type(Request $request){
        $data=AttachmentType::saveAttachment($request->all());
        return $data;
    }

    public function Payment_type(Request $request){
        $home_id = Auth::user()->home_id;
        $data['payment_type']=Payment_type::getAllPayment_type();
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.payment_type',$data);
    }

    public function save_payment_type(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }
        $data=Payment_type::savePayment_type($request->all());
        return response()->json(['data' => $data]);
    }

    public function regions(Request $request){
        $home_id = Auth::user()->home_id;
        $data['region']=Region::getAllRegion($home_id);
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.region',$data);
    }

    public function task_types(Request $request){
        $home_id = Auth::user()->home_id;
        $data['task_type']=Task_type::getAllTask_type($home_id);
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.task_type',$data);
    }

    public function save_task_type(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }

        $data=Task_type::saveTask_type($request->all());
        return response()->json(['data' => $data]);
    }

    public function tags(Request $request){
        $home_id = Auth::user()->home_id;
        $data['tags']=Tag::getAllTag($home_id);
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.tag',$data);
    }

    public function save_tag(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                Rule::unique('tags')->ignore($request->id),
            ],
        ]);
        if ($validator->fails()) {
            return response()->json(['vali_error' => $validator->errors()->first()]);
        }

        $data=Tag::saveTag($request->all());
        return response()->json(['data' => $data]);
    }
}
