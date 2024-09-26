<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\AttachmentType;

class GeneralSectionController extends Controller
{
    public function attachments_types(Request $request){
        $home_id = Auth::user()->home_id;
        $data['attachmentType']=AttachmentType::getAllAttachmentType();
        $data['home_id']=$home_id;
        return view('frontEnd.salesAndFinance.jobs.attachment_type',$data);
    }

    public function save_attachment_type(Request $request){
        echo "<pre>";print_r($request->all());die;
        $data=AttachmentType::saveAttachment($request->all());
        return $data;
    }
}
