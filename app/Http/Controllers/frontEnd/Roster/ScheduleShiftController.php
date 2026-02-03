<?php

namespace App\Http\Controllers\frontEnd\Roster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyDepartment;
use App\Services\ServiceUser\ServiceUserServices;

class ScheduleShiftController extends Controller
{
    protected $serviceUserService;

    public function __construct(ServiceUserServices $serviceUserService)
    {
        $this->serviceUserService = $serviceUserService;
    }

    public function index(){
        $data['company_department'] = CompanyDepartment::getActiveCompanyDepartment();
        $data['service_users'] = $this->serviceUserService->getAllserviceUser();
        // dd($data['service_user']);
        return view('frontEnd.roster.schedule.schedule_shift', $data);   
    }
}
