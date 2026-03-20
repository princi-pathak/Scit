<?php

namespace App\Http\Controllers\frontend\Roster\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnboardingConfigurationController extends Controller
{
    public function index()
    {
        return view('frontEnd/roster/staff/onboarding_config/index');
    }
}
