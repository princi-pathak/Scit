<?php

namespace App\Http\Controllers\frontEnd\salesFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\CRMSectionType;
use  App\Models\CRMSection;

class CrmSectionController extends Controller
{
    public function complaint_type(){
        $data['page'] = "crm_section_type";
        $data['crm_sections'] = CRMSectionType::getCRMSectionTypes();
        $data['crmSec'] = CRMSection::getCRMSectionData();
        return view('frontEnd.jobs.complaint_type',$data);
        // return view('frontEnd.jobs.lead.CRM_section_type', compact('page', 'crm_sections', 'crmSec'));
    }
}
