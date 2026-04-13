<?php

namespace App\Http\Controllers\frontend\Roster\general;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditTemplateController extends Controller
{
    function index()
    {
        return view('frontEnd.roster.general.audit_templates');
    }
}
