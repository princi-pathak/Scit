@extends('frontEnd.layouts.master')
@section('title', 'Incident Management')
@section('content')

@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <!-- main page -->
    <div class="container-fluid" id="mainIncidentPage">
        <div class="row">
            <div class="col-lg-12">
                <div class="staffHeaderp">
                    <div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <i class=" mainTitleIcon bx bx-shield"></i>
                            <h1 class="mainTitlep mb-0"> CQC Incident Management</h1>
                        </div>


                        <p class="header-subtitle mb-0"> Record, investigate, and report incidents in line with CQC
                            regulations </p>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div>

                            <button class="borderBtn"><i class=' f18 bx  bx-arrow-in-up-square-half me-2'></i>
                                Export</button>
                        </div>
                        <div>
                            <button class="borderBtn pupleBorderBtn" type="button"
                                onclick="window.location.href='{{url('roster/incident-ai-prevention')}}'"><i
                                    class='f18 bx  bx-sparkles me-2'></i> AI Prevention</button>

                        </div>
                        <div>
                            <button class="bgBtn bgRedBtn" type="button" onclick="showAddReportInc()"><i
                                    class='f18 bx  bx-plus me-2'></i> Report
                                Incident</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="bBorderCard mt-5 urReqSec ">
                    <div class="d-flex gap-3 align-items-center urReqCon">
                        <div>
                            <i class='bx  bx-alert-triangle'></i>
                        </div>
                        <div>
                            <h5 class="h5Head">Urgent Action Required</h5>
                            <div class="d-flex gap-4 mt-3 urReqDetails">

                                <span>• 6 incidents require CQC notification</span>
                                <span>• 2 critical incidents open</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="rota_dashboard-cards simpleCard mt-5 pRotaCard">
                    <div class="rota_dash-card bg-blue-50 p-4">
                        <div class="rota_dash-left">
                            <p class="rota_title"> <i class='bx  bx-file-detail me-2'></i> Total</p>
                            <h2 class="rota_count">37</h2>
                        </div>
                    </div>
                    <div class="rota_dash-card bg-orange-50">
                        <div class="rota_dash-left">
                            <p class="rota_title"> <i class='bx  bx-clock me-2'></i> Open</p>
                            <h2 class="rota_count orangeText">6</h2>
                        </div>
                    </div>
                    <div class="rota_dash-card bg-red-50">
                        <div class="rota_dash-left">
                            <p class="rota_title"> <i class="bx bx-shield me-2"></i> Safeguarding</p>
                            <h2 class="rota_count">36</h2>
                        </div>
                    </div>
                    <div class="rota_dash-card bg-purple-50">
                        <div class="rota_dash-left">
                            <p class="rota_title"><i class="bx  bx-alert-triangle me-2"></i> CQC Pending</p>
                            <h2 class="rota_count">1</h2>
                        </div>
                    </div>


                    <div class="rota_dash-card bg-greenp-50">
                        <div class="rota_dash-left">
                            <p class="rota_title"> <i class="bx  bx-check-circle me-2"></i> Resolved</p>
                            <h2 class="rota_count greenTextp">0</h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="emergencyMain p-4">
                    <div class="carer-form">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 ">
                                <div class="input-group searchWithtabs" style="width: 100%;">
                                    <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search entries...">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <input type="date" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <input type="date" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <select class="form-control">
                                    <option value="">All types</option>
                                    <option value="">Safe Guarding</option>
                                    <option value="">Accident</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-sm-6 mb-2">
                                <select class="form-control">
                                    <option value="">All Status</option>
                                    <option value="">Reported</option>
                                    <option value="">Resolved</option>
                                </select>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="d-flex gap-3 align-items-center">
                                    <div>
                                        <div class="checkboxp">
                                            <input type="checkbox" id="safeguarding">
                                            <label for="safeguarding">
                                                Safeguarding Risk (Will notify Registered Manager)
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="borderBtn">Reset Filters</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="bBorderCard mt-4 urReqSec">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <h5 class="h5Head m-0">Fall</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <span class="careBadg redbadges">reported</span>
                                    </div>

                                    <div>
                                        <span class="careBadg muteBadges">reported</span>
                                    </div>
                                    <div>
                                        <span class="careBadg redDarkBadgesAni">SAFEGUARDING</span>
                                    </div>
                                    <div>
                                        <span class="careBadg purpleBadgesDark">CQC NOTIFICATION REQUIRED</span>
                                    </div>
                                    <div class="userMum">
                                        <span class="title mt-0">
                                            <span>Ref: </span> INC-20260114-0007
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="fallRedCon">
                                <div class="d-flex align-items-center gap-3 mt-3">
                                    <p class="para text-sm"> <span>Wednesday, January 14, 2026 at 14:35</span></p>
                                    <p class="para text-sm"><i class="bxr  bx-user"></i>About: <span>Sarah
                                            Mitchell</span></p>
                                </div>
                                <div>
                                    <h6 class="mt-3 h6Head my-3"><span>Client</span>: Ruby Donavan</h6>
                                    <p class="para text-sm"> <span>Write your Title here</span></p>
                                    <div class="footerRedFall">
                                        <div class="d-flex gap-4">
                                            <div>

                                                <span class="muchsmallText">Location: Noida</span>
                                            </div>
                                            <div>
                                                <a class="greenText" style="font-size: 11px;">• Action taken</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <button class="borderBtn"><i class='bx  bx-eye fs18 me-3 '></i> View</button>
                        </div>
                    </div>

                </div>
                <div class="bBorderCard mt-4 urReqSec">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <h5 class="h5Head m-0">Fall</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <span class="careBadg redbadges">Critial</span>
                                    </div>

                                    <div>
                                        <span class="careBadg muteBadges">reported</span>
                                    </div>
                                    <div>
                                        <span class="careBadg redDarkBadgesAni">SAFEGUARDING</span>
                                    </div>
                                    <div>
                                        <span class="careBadg purpleBadgesDark">CQC NOTIFICATION REQUIRED</span>
                                    </div>
                                    <div class="userMum">
                                        <span class="title mt-0">
                                            <span>Ref: </span> INC-20260114-0007
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="fallRedCon">
                                <div class="d-flex align-items-center gap-3 mt-3">
                                    <p class="para text-sm"> <span>Wednesday, January 14, 2026 at 14:35</span></p>
                                    <p class="para text-sm"><i class="bxr  bx-user"></i>About: <span>Sarah
                                            Mitchell</span></p>
                                </div>
                                <div>
                                    <h6 class="mt-3 h6Head my-3"><span>Client</span>: Ruby Donavan</h6>
                                    <p class="para text-sm"> <span>Write your Title here</span></p>
                                    <div class="footerRedFall">
                                        <div class="d-flex gap-4">
                                            <div>

                                                <span class="muchsmallText">Location: Noida</span>
                                            </div>
                                            <div>
                                                <a class="greenText muchsmallText ">• Action taken</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <button class="borderBtn"><i class='bx  bx-eye fs18 me-3 '></i> View</button>
                        </div>
                    </div>

                </div>
                <div class="bBorderCard mt-4">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <h5 class="h5Head m-0">Fall</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <span class="careBadg yellowBadges">Medium</span>
                                    </div>

                                    <div>
                                        <span class="careBadg muteBadges">reported</span>
                                    </div>
                                    <div>
                                        <span class="careBadg redDarkBadgesAni">SAFEGUARDING</span>
                                    </div>
                                    <div>
                                        <span class="careBadg purpleBadgesDark">CQC NOTIFICATION REQUIRED</span>
                                    </div>
                                    <div class="userMum">
                                        <span class="title mt-0">
                                            <span>Ref: </span> INC-20260114-0007
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="fallRedCon">
                                <div class="d-flex align-items-center gap-3 mt-3">
                                    <p class="para text-sm"> <span>Wednesday, January 14, 2026 at 14:35</span></p>
                                    <p class="para text-sm"><i class="bxr  bx-user"></i>About: <span>Sarah
                                            Mitchell</span></p>
                                </div>
                                <div>
                                    <h6 class="mt-3 h6Head my-3"><span>Client</span>: Ruby Donavan</h6>
                                    <p class="para text-sm"> <span>Write your Title here</span></p>
                                    <div class="footerRedFall">
                                        <div class="d-flex gap-4">
                                            <div>

                                                <span class="muchsmallText">Location: Noida</span>
                                            </div>
                                            <div>
                                                <a class="greenText muchsmallText ">• Action taken</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <button class="borderBtn"><i class='bx  bx-eye fs18 me-3 '></i> View</button>
                        </div>
                    </div>

                </div>
                <div class="bBorderCard mt-4 ">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <h5 class="h5Head m-0">Fall</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <span class="careBadg yellowBadges">Medium</span>
                                    </div>

                                    <div>
                                        <span class="careBadg greenbadges">Resolved</span>
                                    </div>
                                    <div>
                                        <span class="careBadg redDarkBadgesAni">SAFEGUARDING</span>
                                    </div>
                                    <div>
                                        <span class="careBadg purpleBadgesDark">CQC NOTIFICATION REQUIRED</span>
                                    </div>
                                    <div class="userMum">
                                        <span class="title mt-0">
                                            <span>Ref: </span> INC-20260114-0007
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="fallRedCon">
                                <div class="d-flex align-items-center gap-3 mt-3">
                                    <p class="para text-sm"> <span>Wednesday, January 14, 2026 at 14:35</span></p>
                                    <p class="para text-sm"><i class="bxr  bx-user"></i>About: <span>Sarah
                                            Mitchell</span></p>
                                </div>
                                <div>
                                    <h6 class="mt-3 h6Head my-3"><span>Client</span>: Ruby Donavan</h6>
                                    <p class="para text-sm"> <span>Write your Title here</span></p>
                                    <div class="footerRedFall">
                                        <div class="d-flex gap-4">
                                            <div>

                                                <span class="muchsmallText">Location: Noida</span>
                                            </div>
                                            <div>
                                                <a class="greenText muchsmallText ">• Action taken</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <button class="borderBtn"><i class='bx  bx-eye fs18 me-3 '></i> View</button>
                        </div>
                    </div>

                </div>
                <div class="bBorderCard mt-4 orangeIncident ">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <h5 class="h5Head m-0">Fall</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <span class="careBadg highBadges">High</span>
                                    </div>

                                    <div>
                                        <span class="careBadg lightGreenBadges">Resolved</span>
                                    </div>
                                    <div>
                                        <span class="careBadg redDarkBadgesAni">SAFEGUARDING</span>
                                    </div>
                                    <div>
                                        <span class="careBadg purpleBadgesDark">CQC NOTIFICATION REQUIRED</span>
                                    </div>
                                    <div class="userMum">
                                        <span class="title mt-0">
                                            <span>Ref: </span> INC-20260114-0007
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="fallRedCon">
                                <div class="d-flex align-items-center gap-3 mt-3">
                                    <p class="para text-sm"> <span>Wednesday, January 14, 2026 at 14:35</span></p>
                                    <p class="para text-sm"><i class="bxr  bx-user"></i>About: <span>Sarah
                                            Mitchell</span></p>
                                </div>
                                <div>
                                    <h6 class="mt-3 h6Head my-3"><span>Client</span>: Ruby Donavan</h6>
                                    <p class="para text-sm"> <span>Write your Title here</span></p>
                                    <div class="footerRedFall">
                                        <div class="d-flex gap-4">
                                            <div>

                                                <span class="muchsmallText">Location: Noida</span>
                                            </div>
                                            <div>
                                                <a class="greenText muchsmallText ">• Action taken</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <button class="borderBtn"><i class='bx  bx-eye fs18 me-3 '></i> View</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!--  report new incident form -->
    <div class="container-fluid" id="incidentAddForm" style="display:none">
        <div class="row justify-content-center d-flex">
            <div class="col-lg-10">
                <div class="emergencyMain">
                    <div class="emergencyHeader">
                        <div class="emeregencyParent align-items-center">
                            <div class="emergencyContent">
                                <div class="gap-3 d-flex align-items-center radIconClr">
                                    <i class="bx bx-shield f20"></i>
                                    <h3>Report New Incident

                                    </h3>
                                </div>

                            </div>
                            <div class="emergencyBtn">
                                <i onclick=showMainIncident() class='bx  bx-x'></i>
                            </div>
                        </div>
                    </div>
                    <div class="p24">

                        <div class="purpleBox p-4 reportRedBox">
                            <div class="d-flex gap-3">
                                <div>
                                    <input type="checkbox" id="safeguarding">
                                </div>
                                <div class="">
                                    <p class="mb-2" for="safeguarding"> <strong>This is a SAFEGUARDING concern</strong>
                                    </p>
                                    <p class="mb-0">Click "Generate Care Plan" to automatically create care plan,
                                        medications, and risk assessments from uploaded documents
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="carer-form mt20">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Incident Type *</label>
                                    <select class="form-control">
                                        <option>Accident</option>
                                        <option>Spot Check</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Severity *</label>
                                    <select class="form-control">
                                        <option>Assessment</option>
                                        <option>Spot Check</option>
                                    </select>
                                </div>
                                <div class="col-lg-6  m-t-10">
                                    <label>Client *</label>
                                    <select class="form-control">
                                        <option>Personal Care</option>
                                        <option>Spot Check</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 m-t-10">
                                    <label> Incident Date & Time *</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-lg-6 m-t-10">
                                    <label> Location *</label>
                                    <input type="text" class="form-control"
                                        placeholder="e.g., Client's home, Day centre">
                                </div>
                                <div class="col-lg-6 m-t-10">
                                    <label>Location Detail</label>
                                    <input type="text" class="form-control" placeholder="e.g., Bathroom, Bedroom">
                                </div>
                                <div class="col-lg-12 mt20">
                                    <div class="purpleBox p-4 reportRedBox">
                                        <div class="d-flex gap-3">
                                            <div>
                                                <i class=" darkRedC bx bx-shield f20"></i>
                                            </div>
                                            <div class="">
                                                <h6 class="mb-2 h6Head"> <strong style="font-size:15px">Safeguarding
                                                        Detail</strong>
                                                </h6>
                                                <p class="mb-0"> Select all types of safeguarding concerns that apply:
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row addReportCheck">
                                            <div class="col-lg-6 m-t-10">

                                                <div class="checkboxp">
                                                    <input type="checkbox" id="physicalAbuse">
                                                    <label for="physicalAbuse">
                                                        Physical Abuse
                                                    </label>
                                                </div>

                                                <div class="checkboxp">
                                                    <input type="checkbox" id="twoPerson">
                                                    <label for="twoPerson">

                                                        Emotional/Psychological Abuse
                                                    </label>
                                                </div>

                                                <div class="checkboxp">
                                                    <input type="checkbox" id="neglect">
                                                    <label for="neglect">
                                                        Neglect
                                                    </label>
                                                </div>
                                                <div class="checkboxp">
                                                    <input type="checkbox" id="domesticAbuse">
                                                    <label for="domesticAbuse">
                                                        Domestic Abuse
                                                    </label>
                                                </div>
                                                <div class="checkboxp mb-0">
                                                    <input type="checkbox" id="selfNeglec">
                                                    <label for="selfNeglec">
                                                        Self-Neglect
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 m-t-10">
                                                <div class="checkboxp">
                                                    <input type="checkbox" id="sexualAbuse">
                                                    <label for="sexualAbuse">Sexual Abuse</label>
                                                </div>

                                                <div class="checkboxp">
                                                    <input type="checkbox" id="financialAbuse">
                                                    <label for="financialAbuse">Financial Abuse</label>
                                                </div>

                                                <div class="checkboxp">
                                                    <input type="checkbox" id="discriminatoryAbuse">
                                                    <label for="discriminatoryAbuse">Discriminatory Abuse</label>
                                                </div>

                                                <div class="checkboxp">
                                                    <input type="checkbox" id="modernSlavery">
                                                    <label for="modernSlavery">Modern Slavery</label>
                                                </div>

                                                <div class="checkboxp">
                                                    <input type="checkbox" id="organisationalAbuse">
                                                    <label for="organisationalAbuse">Organisational Abuse</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-lg-12  m-t-10">
                                    <label>What Happened? * (Factual account)</label>
                                    <textarea class="form-control" rows="3" cols="20"
                                        placeholder="Provide a detailed factual account of what happened..."></textarea>
                                    <small class="formIns">Task will appear for carer during this shift </small>
                                </div>
                                <div class="col-lg-12  m-t-10">
                                    <label>Immediate Action Taken *</label>
                                    <textarea class="form-control" rows="3" cols="20"
                                        placeholder="What immediate actions were taken? (e.g., first aid given, ambulance called)"></textarea>

                                </div>
                                <div class="col-lg-4 m-t-10">
                                    <label for="familyNotify">
                                        <div class="checkFamilyNoti">
                                            <div class="d-flex gap-2 align-items-center">

                                                <input type="checkbox" id="familyNotify">
                                                <div class="cqcCheck">
                                                    Family Notified
                                                </div>
                                            </div>

                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-4 m-t-10">
                                    <label for="cqcNotification">
                                        <div class="checkFamilyNoti bg-purple-50">
                                            <div class="d-flex gap-2 align-items-center">
                                                <input type="checkbox" id="cqcNotification">
                                                <div class="cqcCheck pupleTextp">
                                                    CQC Notification Required
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="col-lg-4 m-t-10">
                                    <label for="policeInvolved">
                                        <div class="checkFamilyNoti bg-red-50">
                                            <div class="d-flex gap-2 align-items-center">
                                                <input type="checkbox" id="policeInvolved">
                                                <div class="cqcCheck textRedp">
                                                    Police Involved
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="col-lg-12 m-t-10">
                                    <div class="purpleBox p-4 reportyellowBox">
                                        <div class="d-flex gap-3">
                                            <div>
                                                <i class='darkyellowIc bx  bx-alert-triangle f20'></i>
                                            </div>
                                            <div class="">
                                                <p class="mb-2" for="safeguarding"> <strong>This is a SAFEGUARDING
                                                        concern</strong>
                                                </p>

                                            </div>
                                        </div>
                                        <ul class="addIncidentList">
                                            <li>All safeguarding concerns must be reported to local authority within 24
                                                hours</li>
                                            <li>CQC must be notified of serious incidents without delay</li>
                                            <li>Deaths, serious injuries, and safeguarding concerns require statutory
                                                notifications</li>
                                            <li>Ensure all relevant parties have been informed as per your policy</li>
                                        </ul>
                                    </div>


                                </div>
                                <div class="col-lg-12 m-t-10">
                                    <hr class="hrLinep">
                                    <div class="d-flex gap-3 incidentAddFooter">
                                        <div>
                                            <button style="width:100%" class="bgBtn bgRedBtn"><i
                                                    class="bx bx-save f18"></i>Submit
                                                Incident
                                                Report</button>
                                        </div>
                                        <div>
                                            <button class="borderBtn" onclick=showMainIncident()>
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- report new end -->
    <script>
    const showAddReportInc = () => {

        document.getElementById("incidentAddForm").style.display = "block";
        document.getElementById("mainIncidentPage").style.display = "none";
    };
    const showMainIncident = () => {
        document.getElementById("incidentAddForm").style.display = "none";
        document.getElementById("mainIncidentPage").style.display = "block";
    }
    </script>
</main>

@endsection