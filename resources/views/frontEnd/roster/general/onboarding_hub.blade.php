<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title','Onboarding Hub')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="staffHeaderp flexWrap gap-3">
                    <div>
                        <h1 class="mainTitlep">Onboarding Hub</h1>
                        <p class="header-subtitle mb-0">Regulatory compliance and onboarding management
                        </p>
                    </div>
                    <div>
                        <button class="borderBtn" type="button" data-toggle="modal" data-target="#addOnboarding"><i class="bx bx-school"></i>Organisation Setup</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt20 card-row gap-0">
            <div class="col-md-4 col-sm-6 mb15">
                <div class="emergencyMain p-4 h100                                                            ">
                    <div class="flexBw">
                        <div>
                            <p class="muteText">Total Staff</p>
                            <h3 class="fs30 font700 mb-0 mt-0">35</h3>
                        </div>
                        <div>
                            <i class="bx bx-group fs35 blueText"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb15 pX">
                <div class="emergencyMain p-4 h100                                                            ">
                    <div class="flexBw">
                        <div>
                            <p class="muteText">Fit to Work</p>
                            <h3 class="fs30 font700 mb-2 mt-0">0/35</h3>
                            <span class="careBadg darkGreenBadges">0% compliant</span>
                        </div>
                        <div>
                            <i class="bx bx-lock-open fs35 greenTextp "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb15">
                <div class="emergencyMain p-4 h100                                                            ">
                    <div class="flexBw">
                        <div>
                            <p class="muteText">DBS Expiring Soon</p>
                            <h3 class="fs30 font700 mb-2 mt-0">0</h3>
                        </div>
                        <div>
                            <i class="bx bx-alert-triangle fs35 orangeText "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <div class="calendarTabs onBoardConTabHor">
                    <div class="tabs p-1 ">
                        <div class="dFlexGap onBoardTabBtn">
                            <button class="tab configureBtn active" data-tab="dailyLogAllAddEntry"> <i class="bx bx-group f18"></i> Staff Onboarding </button>
                            <button class="tab configureBtn" data-tab="dailyLogVisitors"> <i class="bx bx-user-circle f18"></i> Client Onboarding </button>
                        </div>
                    </div>
                    <div class="tab-content carertabcontent">
                        <div class="content active" id="dailyLogAllAddEntry">
                            <!-- staff on board -->
                            <!-- search bar -->
                            <div class="row mt20">
                                <div class="col-md-12">
                                    <div class="input-group searchWithtabs flex1 lightShadow w100">
                                        <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                                        <input type="text" class="form-control searchDailyLog" placeholder="Search staff by name or email...">
                                    </div>
                                </div>
                            </div>
                            <!--  all staff stripe  -->
                            <div class="row mt20">
                                <div class="col-md-12">
                                    <div class="virtGap">
                                        <div class="emergencyMain p-3 AllStaffTabC ">
                                            <div class="flexBw align-items-center flexWrap">
                                                <div class="dFlexGap">
                                                    <i class="bx bx-lock fs23 orangeText"> </i>
                                                    <div>
                                                        <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                                        <p class="mb-0 textGray500 fs13 mt-2">jwake@gmail.co.uk</p>
                                                    </div>
                                                </div>
                                                <div class="dFlexGap">

                                                    <div class="text-right">
                                                        <p class="fs13 font700 mb-2 blackText">0%</p>
                                                        <p class="fs13 mb-2 textGray500">0/5 complete</p>

                                                    </div>
                                                    <div>
                                                        <span class="careBadg darkOrangeBadg">Onboarding
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class="borderBtn" data-toggle="modal" data-target="#manageModal">
                                                            <i class="bx bx-eye me-2 f18"></i>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="emergencyMain p-3 AllStaffTabC ">
                                            <div class="flexBw align-items-center flexWrap">
                                                <div class="dFlexGap">
                                                    <i class="bx bx-lock fs23 orangeText"> </i>
                                                    <div>
                                                        <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                                        <p class="mb-0 textGray500 fs13 mt-2">jwake@gmail.co.uk</p>
                                                    </div>
                                                </div>
                                                <div class="dFlexGap">

                                                    <div class="text-right">
                                                        <p class="fs13 font700 mb-2 blackText">0%</p>
                                                        <p class="fs13 mb-2 textGray500">0/5 complete</p>

                                                    </div>
                                                    <div>
                                                        <span class="careBadg darkOrangeBadg">Onboarding
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class="borderBtn" data-toggle="modal" data-target="#manageModal">
                                                            <i class="bx bx-eye me-2 f18"></i>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="emergencyMain p-3 AllStaffTabC ">
                                            <div class="flexBw align-items-center flexWrap">
                                                <div class="dFlexGap">
                                                    <i class="bx bx-lock fs23 orangeText"> </i>
                                                    <div>
                                                        <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                                        <p class="mb-0 textGray500 fs13 mt-2">jwake@gmail.co.uk</p>
                                                    </div>
                                                </div>
                                                <div class="dFlexGap">

                                                    <div class="text-right">
                                                        <p class="fs13 font700 mb-2 blackText">0%</p>
                                                        <p class="fs13 mb-2 textGray500">0/5 complete</p>

                                                    </div>
                                                    <div>
                                                        <span class="careBadg darkOrangeBadg">Onboarding
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class="borderBtn" data-toggle="modal" data-target="#manageModal">
                                                            <i class="bx bx-eye me-2 f18"></i>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- manage doc detail modal -->
                                        <div class="modal fade leaveCommunStyle" id="manageModal" tabindex="1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg pModalScroll">
                                                <div class="modal-content">
                                                    <div class="modal-header p24">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"> <i class="bx bx-user-check blueText blueText fs23"></i>Staff Onboarding: Sarah Johnson </h4>
                                                    </div>
                                                    <div class="modal-body heightScrollModal p24" style="height: unset;">
                                                        <!-- main modal content-->
                                                        <div class="staffOnBoardMain" style="display: block;">
                                                            <div class="row row-equal">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="shadowp p-5 lightBorderp rounded8 h100" style="border-color: #9333ea33;">
                                                                        <h5 class="h5Head purpleTextp mb-4"> <i class="bx bx-sparkles me-2 f20"></i>AI Personalized Onboarding Plan
                                                                        </h5>
                                                                        <p class="fs13 textGray">Generate a customized 30-60-90 day onboarding plan tailored to Sarah Johnson's role and background</p>
                                                                        <button class="bgBtn purpleBgBtn w100"><i class="bx bx-sparkles me-2 f18 "></i> Generate Personalized Plan</button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="shadowp p-5 lightBorderp h100 rounded8" style="border-color: #bfdbfe;">
                                                                        <h5 class="h5Head blueText mb-4"> <i class="bx bx-file-detail me-2 f20"></i> AI Welcome Packet</h5>
                                                                        <p class="fs13 textGray">Generate a personalized welcome packet with company info, team introductions, and first-week tasks for Jane Wakefield.</p>
                                                                        <button class="bgBtn w100"><i class="bx bx-sparkles me-2 f18 "></i> Generate Welcome Packet</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 mt20">
                                                                    <div class="bg-blue-50 rounded8 shadowp p-4">
                                                                        <div class="occupancyBox">
                                                                            <div class="topRow">
                                                                                <span class="fs16 font600">Onboarding Progress</span>
                                                                                <span class="value f20" style="color: #3376f2;">8/50</span>
                                                                            </div>
                                                                            <div class="progressBar">
                                                                                <div class="progressFill" style="width:16%; background:#3376f2"></div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="textGray500 fs13">
                                                                            0 of 5 stages completed </p>
                                                                        <p class="mb-0 fs12 blueText">
                                                                            👉 Click on any stage below to complete it
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mt20">
                                                                    <div class="bg-yellow-50 rounded8 shadowp p-4">
                                                                        <div class="dFlexGap">
                                                                            <div>
                                                                                <i class="bx bx-lock fs23 yellowText"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h6 class="h6Head darkOrangeTextp mb-2">Onboarding In Progress </h6>
                                                                                <p class="fs13 mb-0 darkOrangeTextp">Cannot be assigned to clients until all stages are complete</p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mt-5">
                                                                    <p class="font700 fs13 textGray">Complete these stages in order:</p>
                                                                    <div class="flexRow mt-3">
                                                                        <div class="shadowp rounded8 p-4 lightBorderp pt-5 ">
                                                                            <div class="flexBw">
                                                                                <div class="dFlexGap">
                                                                                    <div>
                                                                                        <span class="circleFill blackText fs16 font700" style="background-color: #e5e7eb;">1</span>
                                                                                    </div>
                                                                                    <h6 class="h6Head mb-0">
                                                                                        Pre-Employment Compliance
                                                                                    </h6>
                                                                                </div>
                                                                                <div>
                                                                                    <button class="bgBtn blackBtn btnInterview">Continue</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="shadowp rounded8 p-4 lightBorderp pt-5 ">
                                                                            <div class="flexBw">
                                                                                <div class="dFlexGap">
                                                                                    <div>
                                                                                        <span class="circleFill blackText fs16 font700" style="background-color: #e5e7eb;">1</span>
                                                                                    </div>
                                                                                    <h6 class="h6Head mb-0">
                                                                                        Pre-Employment Compliance
                                                                                    </h6>
                                                                                </div>
                                                                                <div>
                                                                                    <button class="bgBtn blackBtn btnInterview">Continue</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="shadowp rounded8 p-4 lightBorderp pt-5 ">
                                                                            <div class="flexBw">
                                                                                <div class="dFlexGap">
                                                                                    <div>
                                                                                        <span class="circleFill blackText fs16 font700" style="background-color: #e5e7eb;">1</span>
                                                                                    </div>
                                                                                    <h6 class="h6Head mb-0">
                                                                                        Pre-Employment Compliance
                                                                                    </h6>
                                                                                </div>
                                                                                <div>
                                                                                    <button class="bgBtn blackBtn btnInterview">Continue</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="shadowp rounded8 p-4 lightBorderp pt-5 ">
                                                                            <div class="flexBw">
                                                                                <div class="dFlexGap">
                                                                                    <div>
                                                                                        <span class="circleFill blackText fs16 font700" style="background-color: #e5e7eb;">2</span>
                                                                                    </div>
                                                                                    <h6 class="h6Head mb-0">
                                                                                        Pre-Employment Compliance
                                                                                    </h6>
                                                                                </div>
                                                                                <div>
                                                                                    <button class="bgBtn blackBtn btnInterview">Continue</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="shadowp rounded8 p-4 lightBorderp pt-5 ">
                                                                            <div class="flexBw">
                                                                                <div class="dFlexGap">
                                                                                    <div>
                                                                                        <span class="circleFill blackText fs16 font700" style="background-color: #e5e7eb;">3</span>
                                                                                    </div>
                                                                                    <h6 class="h6Head mb-0"> Pre-Employment Compliance</h6>
                                                                                </div>
                                                                                <div>
                                                                                    <button class="borderBtn btnInterview">Start</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- main modal content end -->
                                                        <!-- continue part -->
                                                        <div class="interViewMain" style="display: none;">
                                                            <button class="hoverBtn backToOriginal" style="border: unset;"><i class="bx bx-arrow-left-stroke f18 me-2"></i> Back to Overview</button>
                                                            <div>
                                                                <form action="">
                                                                    <div class="shadowp rounded8  p24 mt-4 lightBorderp">
                                                                        <div class="dFlexGap">
                                                                            <div>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-audio w-5 h-5">
                                                                                    <path d="M17.5 22h.5a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3"></path>
                                                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                                    <path d="M2 19a2 2 0 1 1 4 0v1a2 2 0 1 1-4 0v-4a6 6 0 0 1 12 0v4a2 2 0 1 1-4 0v-1a2 2 0 1 1 4 0"></path>
                                                                                </svg>
                                                                            </div>
                                                                            <h6 class="h6Head mb-0"> Interview Analysis </h6>
                                                                            <div>
                                                                                <i class="bx bx-sparkles me-2 f18 yellowText"></i>
                                                                            </div>
                                                                        </div>
                                                                        <!-- recording uploaded -->
                                                                        <div class="bg-greenp-50 p-3 rounded5 mt-4 recordUploadSec">
                                                                            <div class="flexBw">
                                                                                <div>
                                                                                    <p class="mb-0 fs13 blackText"><i class="bx bx-check-circle f20 me-1 greenText"></i>Recording uploaded</p>
                                                                                </div>
                                                                                <div>
                                                                                    <a href="" class="blueText fs13">View</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-4">
                                                                            <button class="bgBtn blackBtn w100"><i class="bx bx-sparkles me-2 f18"></i> Transcribe & Analyze with AI </button>
                                                                        </div>
                                                                        <!-- without uploading video -->
                                                                        <div>
                                                                            <div class="uploadBox mt-4 mb-2 recordingPart">
                                                                                <p class="fs13 mb-0"> <i class='bx bx-arrow-from-bottom'></i> Upload Interview Recording (Audio/Video)</p>
                                                                                <input type="file">
                                                                            </div>
                                                                            <span class="fs12 textGray500">Supported formats: MP3, MP4, WAV, M4A, WebM</span>
                                                                        </div>
                                                                        <!-- end -->
                                                                    </div>
                                                                    <div class="shadowp rounded8  p24 mt20 lightBorderp">
                                                                        <div class="dFlexGap">
                                                                            <div>
                                                                                <i class="bx bx-file-detail fs23 blueText"></i>
                                                                            </div>
                                                                            <h6 class="h6Head mb-0"> Pre-Employment Compliance Checks
                                                                            </h6>

                                                                        </div>
                                                                        <div class="mt20 preEmpMain">
                                                                            <div class="flexBw gap-3">
                                                                                <div class="flex1">
                                                                                    <label for="">Photo ID (Passport / Driving Licence) *</label>
                                                                                    <div class="uploadBox mb-2 text-center muteHover">
                                                                                        <i class='bx bx-arrow-from-bottom'></i>
                                                                                        <p class="fs13 mb-0 textGray500"> Upload Photo ID</p>
                                                                                        <input type="file">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex1">
                                                                                    <label for="">Proof of Address *</label>
                                                                                    <div class="uploadBox mb-2 text-center muteHover">
                                                                                        <i class='bx bx-arrow-from-bottom'></i>
                                                                                        <p class="fs13 mb-0 textGray500"> Upload Proof of Address</p>
                                                                                        <input type="file">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="flexBw gap-3 mt-3">
                                                                                <div class="flex1">
                                                                                    <label for="">Right to Work Document</label>
                                                                                    <div class="uploadBox mb-2 text-center muteHover">
                                                                                        <i class='bx bx-arrow-from-bottom'></i>
                                                                                        <p class="fs13 mb-0 textGray500">Upload RTW Document</p>
                                                                                        <input type="file">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex1">
                                                                                    <label for="">Application Form / CV</label>
                                                                                    <div class="uploadBox mb-2 text-center muteHover">
                                                                                        <i class='bx bx-arrow-from-bottom'></i>
                                                                                        <p class="fs13 mb-0 textGray500">Upload Application</p>
                                                                                        <input type="file">
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="mb-0 greenText fs14"><i class="bx bx-check-circle f20"></i>Uploaded</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-4 bg-blue-50 p-3 rounded5" style="border: unset;">
                                                                                <label for="workRight">
                                                                                    <div class="dFlexGap" style="cursor:pointer">
                                                                                        <div>
                                                                                            <input type="checkbox" id="workRight" class="checkBoxHw">
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6 class="h6Head mb-0">
                                                                                                I confirm this person has the right to work in the UK *
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                            <div class="mt-4 bg-blue-50 p-3 rounded5" style="border: unset;">
                                                                                <label for="hisVerify">
                                                                                    <div class="dFlexGap" style="cursor:pointer">
                                                                                        <div>
                                                                                            <input type="checkbox" id="hisVerify" class="checkBoxHw">
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6 class="h6Head mb-0">
                                                                                                Employment history verified (gaps explained)
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                            <div class="mt-4">
                                                                                <label for="">Notes</label>
                                                                                <textarea name="notes" class="form-control" rows="3" cols="15" placeholder="Any additional notes or comments..."></textarea>
                                                                            </div>
                                                                            <button class="bgBtn w100 mt-4"><i class="bx bx-check-circle f18"></i>Save & Continue</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- red form section DBS Check Details start -->
                                                            <div>
                                                                <div class="shadowp rounded8  p24 mt20 lightBorderp">
                                                                    <div class="dFlexGap">
                                                                        <div>
                                                                            <i class="bx bx-shield redText fs23 "></i>
                                                                        </div>
                                                                        <h6 class="h6Head mb-0">DBS Check & Employment References </h6>
                                                                    </div>
                                                                    <form action="" class="mt-4">
                                                                        <div class="mt-4 bg-red-50 p-4 rounded5 dbsFormMain" style="border: none;">

                                                                            <h6 class="h6Head">DBS Check Details
                                                                            </h6>

                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label for="">DBS Level *</label>
                                                                                    <select name="" id="" class="form-control">
                                                                                        <option value="">Basic </option>
                                                                                        <option value="">Standard </option>
                                                                                        <option value="">Enhanced </option>

                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label for="">DBS Status *</label>
                                                                                    <select name="" id="" class="form-control">
                                                                                        <option value="">Pending </option>
                                                                                        <option value="">Clear </option>
                                                                                        <option value="">Conditional </option>

                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 m-t-10">
                                                                                    <label for="">DBS Certificate Number</label>
                                                                                    <input type="number" class="form-control" placeholder="001234567890">
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 m-t-10">
                                                                                    <label for="">DBS Issue Date</label>
                                                                                    <input type="date" class="form-control">
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 m-t-10">
                                                                                    <label for="">DBS Review Date (Auto: +3 years)</label>
                                                                                    <input type="date" class="form-control">
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 m-t-10">
                                                                                    <label for="" style="visibility: hidden;">DBS Review Date (Auto: +3 years)</label>
                                                                                    <div class="dFlexGap">
                                                                                        <div>
                                                                                            <input type="checkbox" class="checkboxHw">
                                                                                        </div>
                                                                                        <p class="fs13 mb-0  font600">Subscribed to DBS Update Service</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 m-t-10">
                                                                                    <label for="">DBS Certificate (Upload Scan)</label>
                                                                                    <div class="uploadBox mb-2 text-center">
                                                                                        <i class="bx bx-arrow-from-bottom"></i>
                                                                                        <p class="fs13 mb-0 textGray500"> Upload DBS Certificate </p>
                                                                                        <input type="file">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt20">
                                                                            <h6 class="h6Head">Employment References (Minimum 2 Required)</h6>
                                                                            <p class="muteText mb-0">Enter referee details and send automated requests, or manually upload reference documents.</p>
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-4">
                                                                                    <label for="">Referee Name *</label>
                                                                                    <input type="text" class="form-control" placeholder=" Full Name">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Organisation</label>
                                                                                    <input type="text" class="form-control" placeholder="Company Name">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Email Address</label>
                                                                                    <input type="email" class="form-control" placeholder="referee@email.com">
                                                                                </div>
                                                                                <div class="col-md-12 m-t-10">
                                                                                    <div class="shadowp rounded8 p24 lightBorderp">
                                                                                        <p class="fs13 font600">Reference 2 * </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-4">
                                                                                    <label for="">Referee Name *</label>
                                                                                    <input type="text" class="form-control" placeholder=" Full Name">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Organisation</label>
                                                                                    <input type="text" class="form-control" placeholder="Company Name">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Email Address</label>
                                                                                    <input type="email" class="form-control" placeholder="referee@email.com">
                                                                                </div>
                                                                                <div class="col-md-12 m-t-10">
                                                                                    <div class="shadowp rounded8  p24 lightBorderp">
                                                                                        <p class="fs13 font600">Reference 2 * </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-4">
                                                                                    <label for="">Referee Name *</label>
                                                                                    <input type="text" class="form-control" placeholder=" Full Name">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Organisation</label>
                                                                                    <input type="text" class="form-control" placeholder="Company Name">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Email Address</label>
                                                                                    <input type="email" class="form-control" placeholder="referee@email.com">
                                                                                </div>
                                                                                <div class="col-md-12 m-t-10">
                                                                                    <div class="shadowp rounded8  p24 lightBorderp">
                                                                                        <p class="fs13 font600">Reference 2 * </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="bg-greenp-50 p-3" style="border: none;">
                                                                                        <div class="dFlexGap">
                                                                                            <div>
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                            </div>
                                                                                            <p class="mb-0 fs13 font600">
                                                                                                All references received and satisfactory *
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 mt20">
                                                                                    <label for="">Verification Notes</label>
                                                                                    <textarea name="notes" class="form-control" rows="3" cols="15" placeholder="Any additional notes or comments..."></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <button class="bgBtn w100 mt-4 pgreenBtn"><i class="bx bx-check-circle f18"></i>Save DBS & References</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- red form section DBS Check Details end -->

                                                            <!-- Induction & Competency Assessment start -->
                                                            <div>
                                                                <div class="shadowp rounded8  p24 mt20 lightBorderp">
                                                                    <div class="dFlexGap">
                                                                        <div>
                                                                            <i class="bx bx-user-check purpleTextp fs23 "></i>
                                                                        </div>
                                                                        <h6 class="h6Head mb-0">Induction & Competency Assessment</h6>
                                                                    </div>
                                                                    <form action="">
                                                                        <div class="appendContainer">

                                                                            <div class="mt20 mb-4">
                                                                                <div class="flexBw">
                                                                                    <h5 class="font600 fs15 mb-0">Shadow Shifts</h5>
                                                                                    <div>
                                                                                        <button class="bgBtn blackBtn appendBtn" type="button"> <i class="bx bx-plus f18 me-2"></i> Add Shift</button>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="shadowp lightBorderp p-3 appendRow rounded5">
                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <label for="">Shift Date</label>
                                                                                        <input type="date" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <label for="">Shadowed Staff</label>
                                                                                        <input type="text" class="form-control" placeholder="Staff Name">
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <label for="">Performance</label>
                                                                                        <select name="" id="" class="form-control">
                                                                                            <option value="">Excellent</option>
                                                                                            <option value="">Good</option>
                                                                                            <option value="">Satisfactory</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-12 m-t-10">
                                                                                        <textarea name="notes" class="form-control" rows="3" cols="15" placeholder="Feedback from shadow shift..."></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="dFlexGap mt-3">
                                                                            <div class="progressBar flex1">
                                                                                <div class="progressFill" style="width:16%; background:#3376f2"></div>
                                                                            </div>
                                                                            <div>
                                                                                <p class="fs13">4/3</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-4">
                                                                            <h5 class="font600 fs15 mb-0">Induction Checklist</h5>
                                                                            <div class="inductionChecklist">

                                                                                <div class="progressBar flex1 mt-3">
                                                                                    <div class="progressFill indProgress" style="width:0%; background:#3376f2"></div>
                                                                                </div>

                                                                                <div class="checkItem muteBg p-2 mt-3 rounded5" style="border: none;">
                                                                                    <div class="dFlexGap">
                                                                                        <div>
                                                                                            <input type="checkbox" class="checkBoxHw">
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="fs13 mb-0">
                                                                                                Introduction to organisation values and mission
                                                                                            </p>
                                                                                            <p class="mb-0 fs12 textGray500 completedDate" style="display:none;">Completed: 10/03/2026 </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>



                                                                                <div class="checkItem muteBg p-2 mt-3 rounded5" style="border: none;">
                                                                                    <div class="dFlexGap">
                                                                                        <div>
                                                                                            <input type="checkbox" class="checkBoxHw">
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="fs13 mb-0">Safeguarding policy and procedures</p>
                                                                                            <p class="mb-0 fs12 textGray500 completedDate" style="display:none;">Completed: 10/03/2026</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="checkItem muteBg p-2 mt-3 rounded5" style="border: none;">
                                                                                    <div class="dFlexGap">
                                                                                        <div>
                                                                                            <input type="checkbox" class="checkBoxHw">
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="fs13 mb-0">Lone working policy</p>
                                                                                            <p class="mb-0 fs12 textGray500 completedDate" style="display:none;">Completed: 10/03/2026</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="checkItem muteBg p-2 mt-3 rounded5" style="border: none;">
                                                                                    <div class="dFlexGap">
                                                                                        <div>
                                                                                            <input type="checkbox" class="checkBoxHw">
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="fs13 mb-0">Medication policy</p>
                                                                                            <p class="mb-0 fs12 textGray500 completedDate" style="display:none;">Completed: 10/03/2026</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="checkItem muteBg p-2 mt-3 rounded5" style="border: none;">
                                                                                    <div class="dFlexGap">
                                                                                        <div>
                                                                                            <input type="checkbox" class="checkBoxHw">
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="fs13 mb-0">Recording and documentation standards</p>
                                                                                            <p class="mb-0 fs12 textGray500 completedDate" style="display:none;">Completed: 10/03/2026</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt20 bg-blue-50 rounded5 p-4 dbsFormMain">
                                                                            <h6 class="h6Head">Competency Assessment</h6>

                                                                            <div class="row mt-4">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label for="">Assessment Result *</label>
                                                                                    <select name="" id="" class="form-control">
                                                                                        <option value="">Pending </option>
                                                                                        <option value="">Pass </option>
                                                                                        <option value="">Fail </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label for="">Assessment Date</label>
                                                                                    <input type="date" class="form-control">
                                                                                </div>
                                                                                <div class="col-md-12 m-t-10">
                                                                                    <label for="">Assessed By (Supervisor)</label>
                                                                                    <input type="date" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button class="bgBtn purpleBgBtn mt-4 w100"><i class="bx bx-check-circle f18"></i> Save Induction Record</button>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Induction & Competency Assessment end -->
                                                            <!-- start test -->
                                                            <div class="shadowp rounded8  p24 mt20 lightBorderp">
                                                                <div class="dFlexGap">
                                                                    <div>
                                                                        <i class="bx bx-education purpleTextp fs23 "></i>
                                                                    </div>
                                                                    <h6 class="h6Head mb-0">Mandatory Training (0/8)
                                                                    </h6>
                                                                </div>
                                                                <div class="mt20">
                                                                    <div class="progressBar flex1 mt-3 mb-4">
                                                                        <div class="progressFill" style="width:0%; background:#3376f2"></div>
                                                                    </div>
                                                                    <div>

                                                                        <div class="recordSec mt-3">
                                                                            <div class="recordCard">
                                                                                <div class="recordHeader muteBg lightBorderp p-4 rounded5">
                                                                                    <div class="flexBw">
                                                                                        <div>
                                                                                            <div class="dFlexGap">
                                                                                                <div class="muteCircle">
                                                                                                    <i class="bx bx-circle f20 textGray400"></i>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <h6 class="h6Head mb-0">Safeguarding Adults</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <button class="bgBtn blackBtn recordBtn">
                                                                                                <i class="bx bx-plus fs16 me-2"></i> Record
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="recordContent mt-3">
                                                                                    <div class="bg-blue-50 rounded5 p-4">
                                                                                        <p class="fs13 font600">Completion Date</p>
                                                                                        <div class="dFlexGap">
                                                                                            <div class="flex1">
                                                                                                <input type="date" class="shadowp form-control">
                                                                                            </div>
                                                                                            <div>
                                                                                                <div class="dFlexGap">
                                                                                                    <button class="bgBtn blackBtn"><i class="bx bx-check-circle f18"></i></button>
                                                                                                    <button class="borderBtn cancelRecord" type="button">Cancel</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="recordCard">
                                                                                <div class="recordHeader muteBg lightBorderp p-4 rounded5">
                                                                                    <div class="flexBw">
                                                                                        <div>
                                                                                            <div class="dFlexGap">
                                                                                                <div class="muteCircle">
                                                                                                    <i class="bx bx-circle f20 textGray400"></i>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <h6 class="h6Head mb-0">Health & Safety

                                                                                                    </h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <button class="bgBtn blackBtn recordBtn">
                                                                                                <i class="bx bx-plus fs16 me-2"></i> Record
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="recordContent mt-3">
                                                                                    <div class="bg-blue-50 rounded5 p-4">
                                                                                        <p class="fs13 font600">Completion Date</p>
                                                                                        <div class="dFlexGap">
                                                                                            <div class="flex1">
                                                                                                <input type="date" class="shadowp form-control">
                                                                                            </div>
                                                                                            <div>
                                                                                                <div class="dFlexGap">
                                                                                                    <button class="bgBtn blackBtn"><i class="bx bx-check-circle f18"></i></button>
                                                                                                    <button class="borderBtn cancelRecord" type="button">Cancel</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- start test end-->
                                                            </div>
                                                            <!-- continue part end  -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- manage document modal end -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- staff on board end-->
                        </div>
                        <div class="content" id="dailyLogVisitors">
                            <!-- client onboarding -->
                            <!-- search bar -->
                            <div class="row mt20">
                                <div class="col-md-12">
                                    <div class="input-group searchWithtabs lightShadow w100">
                                        <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                                        <input type="text" class="form-control searchDailyLog" placeholder="Search clients...">
                                    </div>
                                </div>
                            </div>
                            <!--  all staff stripe  -->
                            <div class="row mt20">
                                <div class="col-md-12">
                                    <div class="virtGap">
                                        <!-- residential -->
                                        <div class="emergencyMain p-3 AllStaffTabC ">
                                            <div class="flexBw align-items-center flexWrap gap-3">
                                                <div class="dFlexGap">
                                                    <i class="bx bx-user-circle  fs23 blueText"> </i>
                                                    <div>
                                                        <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                                        <p class="muteText mb-0">L15 3JH</p>
                                                    </div>
                                                </div>
                                                <div class="dFlexGap">

                                                    <div class="text-right">
                                                        <p class="fs13 font700 mb-2 blackText">0%</p>
                                                        <p class="fs13 mb-2 textGray500">0/1 stages</p>

                                                    </div>
                                                    <div>
                                                        <span class="careBadg darkGreenBadges">Active
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class="borderBtn" data-toggle="modal" data-target="#manageModalClient">
                                                            <i class="bx bx-eye me-2 f18"></i>
                                                            Manage
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="emergencyMain p-3 AllStaffTabC ">
                                            <div class="flexBw align-items-center flexWrap gap-3">
                                                <div class="dFlexGap">
                                                    <i class="bx bx-user-circle  fs23 blueText"> </i>
                                                    <div>
                                                        <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                                        <p class="muteText mb-0">L15 3JH</p>
                                                    </div>
                                                    <span class="careBadg greenbadges"> consent </span>
                                                </div>
                                                <div class="dFlexGap">

                                                    <div class="text-right">
                                                        <p class="fs13 font700 mb-2 blackText">0%</p>
                                                        <p class="fs13 mb-2 textGray500">0/1 stages</p>

                                                    </div>
                                                    <div>
                                                        <span class="careBadg darkGreenBadges">Active
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class="borderBtn" data-toggle="modal" data-target="#manageModalClient">
                                                            <i class="bx bx-eye me-2 f18"></i>
                                                            Manage
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="emergencyMain p-3 AllStaffTabC ">
                                            <div class="flexBw align-items-center flexWrap gap-3">
                                                <div class="dFlexGap">
                                                    <i class="bx bx-user-circle  fs23 blueText"> </i>
                                                    <div>
                                                        <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                                        <p class="muteText mb-0">L15 3JH</p>
                                                    </div>
                                                    <span class="careBadg greenbadges"> consent </span>
                                                </div>
                                                <div class="dFlexGap">

                                                    <div class="text-right">
                                                        <p class="fs13 font700 mb-2 blackText">0%</p>
                                                        <p class="fs13 mb-2 textGray500">0/1 stages</p>

                                                    </div>
                                                    <div>
                                                        <span class="careBadg darkGreenBadges">Active
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class="borderBtn" data-toggle="modal" data-target="#manageModalClient">
                                                            <i class="bx bx-eye me-2 f18"></i>
                                                            Manage
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="emergencyMain p-3 AllStaffTabC ">
                                            <div class="flexBw align-items-center flexWrap gap-3">
                                                <div class="dFlexGap">
                                                    <i class="bx bx-user-circle  fs23 blueText"> </i>
                                                    <div>
                                                        <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                                        <p class="muteText mb-0">L15 3JH</p>
                                                    </div>
                                                    <span class="careBadg greenbadges"> consent </span>
                                                </div>
                                                <div class="dFlexGap">

                                                    <div class="text-right">
                                                        <p class="fs13 font700 mb-2 blackText">0%</p>
                                                        <p class="fs13 mb-2 textGray500">0/1 stages</p>

                                                    </div>
                                                    <div>
                                                        <span class="careBadg darkGreenBadges">Active
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class="borderBtn" data-toggle="modal" data-target="#manageModalClient">
                                                            <i class="bx bx-eye me-2 f18"></i>
                                                            Manage
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="noData">
                                            <div>
                                                <i class="bx bx-user-circle"></i>
                                                <p class="mb-0">No clients found</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade leaveCommunStyle" id="manageModalClient" tabindex="1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg pModalScroll">
                                    <div class="modal-content">
                                        <div class="modal-header p24">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"> <i class="bx bx-user-circle purpleTextp fs23"></i>Client Onboarding: Logan Jones
                                            </h4>
                                        </div>
                                        <div class="modal-body heightScrollModal p24" style="height: unset;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="bg-blue-50 rounded8 shadowp p-4">
                                                        <div class="occupancyBox" style="border: none;">
                                                            <div class="topRow">
                                                                <span class="fs16 font600">Onboarding Progress</span>
                                                                <span class="value f20" style="color: #3376f2;">75%</span>
                                                            </div>
                                                            <div class="progressBar">
                                                                <div class="progressFill" style="width:75%; background:#3376f2"></div>
                                                            </div>
                                                        </div>
                                                        <p class="textGray500 fs13">
                                                            3/4 required stages complete
                                                        </p>
                                                    </div>
                                                    <div class="recordSec">
                                                        <div class="recordCard">
                                                            <div class="rounded8 shadowp p24 mt20 recordBtn cursorPointer" style="border: 1px solid #86efac;" type="button">
                                                                <div class="flexBw">
                                                                    <div>
                                                                        <div class="dFlexGap mb-3 align-items-start">
                                                                            <div>
                                                                                <i class="bx bx-check-circle fs23 greenText"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h6 class="h6Head">Consent & Mental Capacity <span class="careBadg redbadges ms-2">Required</span></h6>
                                                                                <p class="muteText mb-0">Obtain consent and assess mental capacity</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="careBadg darkGreenBadges">Complete</span>
                                                                    </div>
                                                                </div>
                                                                <div class="recordContent">
                                                                    <h6 class="fs13 font600">Mental Capacity Assessment</h6>
                                                                    <form action="">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="mentalCheckParent">
                                                                                    <div class="dFlexGap">
                                                                                        <input type="checkbox" class="checkBoxHw mentalCheckIn">
                                                                                        <p class="fs13 font600 mb-0">Mental capacity assessment completed</p>
                                                                                    </div>
                                                                                    <div class="mentalCapacitySelect" style="display: none;">
                                                                                        <select name="mentalCapacity" class="form-control m-t-10">

                                                                                            <option value="full">Has capacity</option>
                                                                                            <option value="partial">Lacks capacity</option>
                                                                                            <option value="none">Fluctuating Capacity</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 m-t-10">
                                                                                <label for="">Consent Given By *</label>
                                                                                <input type="text" placeholder="Name" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 m-t-10">
                                                                                <label for="">Relationship * </label>
                                                                                <select name="relationship" id="relationship" class="form-control">
                                                                                    <option value="full">Self(Client)</option>
                                                                                    <option value="partial">LPA(Health and Welfare)</option>
                                                                                    <option value="none">Power of Attorney</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <label for="">Consent Types *</label>
                                                                                <div class="flexBw">
                                                                                    <div class="flex1">
                                                                                        <div class="virtGap gap-2">
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Care provision</p>
                                                                                            </div>
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Information sharing</p>
                                                                                            </div>
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Medical treatment</p>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="flex1">
                                                                                        <div class="virtGap gap-2">
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Data processing</p>
                                                                                            </div>
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Photography</p>
                                                                                            </div>
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Personal Care</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <label for="">Signed Consent Form</label>
                                                                                <div class="uploadBox mb-2 text-center muteHover">
                                                                                    <i class="bx bx-arrow-from-bottom"></i>
                                                                                    <p class="fs13 mb-0 textGray500">Upload Consent Form</p>
                                                                                    <input type="file">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <button class="bgBtn blueBtn w100"><i class="bx bx-check-circle f18 me-2"></i> Save Consent Record</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="recordCard">
                                                            <div class="rounded8 shadowp p24 mt20 recordBtn cursorPointer" style="border: 1px solid #86efac;" type="button">
                                                                <div class="flexBw">
                                                                    <div>
                                                                        <div class="dFlexGap mb-3 align-items-start">
                                                                            <div>
                                                                                <i class="bx bx-check-circle fs23 greenText"></i>
                                                                            </div>
                                                                            <div>

                                                                                <h6 class="h6Head">2. Care Assessment <span class="careBadg redbadges ms-2">Required</span></h6>
                                                                                <p class="muteText mb-0">Complete comprehensive care needs assessment</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="careBadg darkGreenBadges">Complete</span>
                                                                    </div>
                                                                </div>
                                                                <div class="recordContent">
                                                                    <form action="">

                                                                        <div class="row">
                                                                            <div class="col-md-6 col-sm-6">
                                                                                <label for="">Assessment Date *</label>
                                                                                <input type="date" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6">
                                                                                <label for="">Completed By *</label>
                                                                                <input type="text" class="form-control" placeholder="Assessor name">
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <label for="">Health Needs</label>
                                                                                <textarea name="notes" class="form-control" rows="3" cols="15" placeholder="Physical and mental health needs..."></textarea>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <label for="">Mobility & Transfer Needs</label>
                                                                                <textarea name="notes" class="form-control" rows="3" cols="15" placeholder="Mobility assessment and support requirements..."></textarea>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <label for="">Medication Requirements</label>
                                                                                <textarea name="notes" class="form-control" rows="3" cols="15" placeholder="Current medications, administration support needed..."></textarea>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <label for="">Safeguarding Risks Identified</label>
                                                                                <textarea name="notes" class="form-control" rows="3" cols="15" placeholder="Any vulnerabilities or safeguarding concerns..."></textarea>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <label for="">Personal Preferences & Routines</label>
                                                                                <textarea name="notes" class="form-control" rows="3" cols="15" placeholder="Daily routines, likes/dislikes, preferences..."></textarea>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <button class="bgBtn pgreenBtn w100"><i class="bx bx-check-circle f18 me-2"></i> Complete Assessment</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rounded8 shadowp p24 mt20" style="border: 1px solid #86efac;">
                                                            <div class="flexBw">
                                                                <div>
                                                                    <div class="dFlexGap mb-3 align-items-start">
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 greenText"></i>
                                                                        </div>
                                                                        <div>

                                                                            <h6 class="h6Head">3. Care Plan<span class="careBadg redbadges ms-2">Required</span></h6>
                                                                            <p class="muteText mb-0">Create and approve care plan</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <span class="careBadg darkGreenBadges">Complete</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <p class="muteText mb-2">Create care plan from the client profile page using the Care Plan Manager</p>
                                                                <div class="bg-greenp-50 p-3 rounded5" style="border: unset;">
                                                                    <p class="mb-0 fs13 greenText"> <i class="bx bx-heart f18"></i> Care plan approved on 17/02/2026 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rounded8 shadowp p24 mt20 lightBorderp">
                                                            <div class="flexBw">
                                                                <div>
                                                                    <div class="dFlexGap mb-3 align-items-start">
                                                                        <div class="muteCircle">
                                                                            <i class="bx bx-circle f20 textGray400"></i>
                                                                        </div>
                                                                        <div>

                                                                            <h6 class="h6Head">4. Risk Assessment<span class="borderBadg ms-2">Optional</span></h6>
                                                                            <p class="muteText mb-0">Complete environmental and care risk assessments</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <span class="careBadg darkMuteBadg">Pending</span>
                                                                </div>
                                                            </div>
                                                            <p class="muteText mt-4 mb-0">Complete risk assessment from the client profile page</p>
                                                        </div>
                                                        <div class="recordCard">
                                                            <div class="rounded8 shadowp p24 mt20 recordBtn cursorPointer lightBorderp" type="button">
                                                                <div class="flexBw">
                                                                    <div>
                                                                        <div class="dFlexGap mb-3 align-items-start">
                                                                            <div class="muteCircle">
                                                                                <i class="bx bx-circle f20 textGray400"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h6 class="h6Head">Test Stage <span class="careBadg redbadges ms-2">Required</span></h6>
                                                                                <p class="muteText mb-0">No need to this.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="careBadg darkGreenBadges">Complete</span>
                                                                    </div>
                                                                </div>
                                                                <div class="recordContent">
                                                                    <h6 class="fs13 font600">Mental Capacity Assessment</h6>
                                                                    <form action="">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="mentalCheckParent">
                                                                                    <div class="dFlexGap">
                                                                                        <input type="checkbox" class="checkBoxHw mentalCheckIn">
                                                                                        <p class="fs13 font600 mb-0">Mental capacity assessment completed</p>
                                                                                    </div>
                                                                                    <div class="mentalCapacitySelect" style="display: none;">
                                                                                        <select name="mentalCapacity" class="form-control m-t-10">

                                                                                            <option value="full">Has capacity</option>
                                                                                            <option value="partial">Lacks capacity</option>
                                                                                            <option value="none">Fluctuating Capacity</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 m-t-10">
                                                                                <label for="">Consent Given By *</label>
                                                                                <input type="text" placeholder="Name" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 m-t-10">
                                                                                <label for="">Relationship * </label>
                                                                                <select name="relationship" id="relationship" class="form-control">
                                                                                    <option value="full">Self(Client)</option>
                                                                                    <option value="partial">LPA(Health and Welfare)</option>
                                                                                    <option value="none">Power of Attorney</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <label for="">Consent Types *</label>
                                                                                <div class="flexBw">
                                                                                    <div class="flex1">
                                                                                        <div class="virtGap gap-2">
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Care provision</p>
                                                                                            </div>
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Information sharing</p>
                                                                                            </div>
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Medical treatment</p>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="flex1">
                                                                                        <div class="virtGap gap-2">
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Data processing</p>
                                                                                            </div>
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Photography</p>
                                                                                            </div>
                                                                                            <div class="dFlexGap align-items-center">
                                                                                                <input type="checkbox" class="checkBoxHw">
                                                                                                <p class="fs13 font600 mb-0">Personal Care</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <label for="">Signed Consent Form</label>
                                                                                <div class="uploadBox mb-2 text-center muteHover">
                                                                                    <i class="bx bx-arrow-from-bottom"></i>
                                                                                    <p class="fs13 mb-0 textGray500">Upload Consent Form</p>
                                                                                    <input type="file">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 m-t-10">
                                                                                <button class="bgBtn blueBtn w100"><i class="bx bx-check-circle f18 me-2"></i> Save Consent Record</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- client onboarding end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- notesModal -->
        <div class="modal fade leaveCommunStyle" id="addOnboarding" tabindex="1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg pModalScroll">
                <div class="modal-content">
                    <div class="modal-header p24">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Organisation Setup </h4>
                    </div>
                    <div class="modal-body heightScrollModal p24" style="height: unset;">
                        <div class="dFlexGap mb-2">
                            <i class="blueText bx bx-school fs30"></i>
                            <h2 class="fs23 font700 my-0">Organisation Regulatory Setup </h2>
                        </div>
                        <p class="fs14 textGray600 mb-0">Configure your organisation profile for CQC/Ofsted compliance
                        </p>
                        <div class="emergencyMain p24 mt20" style="border-color: #bfdbfe;">
                            <div class="flexBw">
                                <h5 class="h5Head mb-0">Organisation Details</h5>
                                <span class="careBadg darkOrangeBadg">incomplete</span>
                            </div>
                            <form action="">
                                <div class="row mt20">
                                    <div class="col-md-12">
                                        <label for="">Organisation Name *</label>
                                        <input type="text" class="form-control" placeholder="Legal organisation name">
                                    </div>
                                    <div class="col-md-12 m-t-10">
                                        <label for="">Care Settings Operated *</label>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="dFlexGap">
                                                    <input type="checkbox" class="checkBoxHW">
                                                    <label class="mb-0" for="">Domiciliary</label>
                                                </div>
                                                <div class="dFlexGap m-t-10">
                                                    <input type="checkbox" class="checkBoxHW">
                                                    <label class="mb-0" for="">Supported Living </label>
                                                </div>
                                                <div class="dFlexGap m-t-10">
                                                    <input type="checkbox" class="checkBoxHW">
                                                    <label class="mb-0" for="">Day Centre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="dFlexGap">
                                                    <input type="checkbox" class="checkBoxHW">
                                                    <label class="mb-0" for="">Residential</label>
                                                </div>
                                                <div class="dFlexGap m-t-10">
                                                    <input type="checkbox" class="checkBoxHW">
                                                    <label class="mb-0" for=""> Children Services</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 m-t-10">
                                        <label for="">Regulators *</label>
                                        <div class="dFlexGap gap-5">
                                            <div class="dFlexGap">
                                                <input type="checkbox" class="checkBoxHW">
                                                <label class="mb-0" for="">CQC</label>
                                            </div>
                                            <div class="dFlexGap">
                                                <input type="checkbox" class="checkBoxHW">
                                                <label class="mb-0" for="">Ofsted</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 m-t-10">
                                        <label for="">CQC Registration Number</label>
                                        <input type="text" class="form-control" placeholder="1-123456789">
                                    </div>
                                    <div class="col-md-6 col-sm-6 m-t-10">
                                        <label for="">Ofsted URN</label>
                                        <input type="text" class="form-control" placeholder="URN number">
                                    </div>
                                    <div class="col-md-6 col-sm-6 m-t-10">
                                        <label for="">Registered Manager Name *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-sm-6 m-t-10">
                                        <label for="">Registered Manager Email *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12 m-t-10">
                                        <label for="">Policy Document (PDF) *</label>
                                        <div class="uploadSec">
                                            <div class="uploadBox p24 mb-2 text-center muteHover py5">
                                                <i class="bx bx-arrow-from-bottom" style="font-size: 30px;"></i>
                                                <p class="muteText mb-0"> Upload Statement of Purpose </p>
                                                <input type="file">
                                            </div>
                                            <div class="dFlexGap m-t-10">
                                                <p class="fs13 greenTextp dFlexGap mb-0"> <i class="bx bx-check-circle fs16"></i><span> Document uploaded</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <button class="bgBtn w100"> <i class="bx bx-check-circle"></i> Save Organisation Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="emergencyMain p24 mt20">
                            <div class="dFlexGap">
                                <i class="bx bx-book-open purpleTextp f20"></i>
                                <h5 class="h5Head mb-0">Mandatory Policy Library</h5>
                            </div>
                            <div class="progressBar mt20 mb-4">
                                <div class="progressFill" style="width:20%; background:#3376f2"></div>
                            </div>
                            <p class="muteText mb-0">1 of 8 mandatory policies uploaded </p>
                            <div class="mt-4">
                                <div class="lightBorderp bottomSpace rounded5 p-3">
                                    <div class="flexBw">
                                        <div class="dFlexGap">
                                            <i class="bx bx-check-circle f18 greenTextp"></i>
                                            <p class="fs14 mb-0">Safeguarding Adults</p>
                                        </div>
                                        <div>
                                            <span class="careBadg darkGreenBadges">Uploaded</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lightBorderp bottomSpace rounded5 p-3">
                                    <div class="flexBw">
                                        <div class="dFlexGap">
                                            <i class="bx bx-file-detail f18 textGray400"></i>
                                            <p class="fs14 mb-0">Safeguarding Children</p>
                                        </div>
                                        <div>
                                            <span class="careBadg darkMuteBadg">Requrired</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lightBorderp bottomSpace rounded5 p-3">
                                    <div class="flexBw">
                                        <div class="dFlexGap">
                                            <i class="bx bx-file-detail f18 textGray400"></i>
                                            <p class="fs14 mb-0">Health Safety</p>
                                        </div>
                                        <div>
                                            <span class="careBadg darkMuteBadg">Requrired</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lightBorderp bottomSpace rounded5 p-3">
                                    <div class="flexBw">
                                        <div class="dFlexGap">
                                            <i class="bx bx-file-detail f18 textGray400"></i>
                                            <p class="fs14 mb-0">Infection Control</p>
                                        </div>
                                        <div>
                                            <span class="careBadg darkMuteBadg">Requrired</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lightBorderp bottomSpace rounded5 p-3">
                                    <div class="flexBw">
                                        <div class="dFlexGap">
                                            <i class="bx bx-file-detail f18 textGray400"></i>
                                            <p class="fs14 mb-0">Medication Management </p>
                                        </div>
                                        <div>
                                            <span class="careBadg darkMuteBadg">Requrired</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lightBorderp bottomSpace rounded5 p-3">
                                    <div class="flexBw">
                                        <div class="dFlexGap">
                                            <i class="bx bx-file-detail f18 textGray400"></i>
                                            <p class="fs14 mb-0">Gdpr Confidentiality</p>
                                        </div>
                                        <div>
                                            <span class="careBadg darkMuteBadg">Requrired</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lightBorderp bottomSpace rounded5 p-3">
                                    <div class="flexBw">
                                        <div class="dFlexGap">
                                            <i class="bx bx-file-detail f18 textGray400"></i>
                                            <p class="fs14 mb-0">Complaints</p>
                                        </div>
                                        <div>
                                            <span class="careBadg darkMuteBadg">Requrired</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lightBorderp bottomSpace rounded5 p-3">
                                    <div class="flexBw">
                                        <div class="dFlexGap">
                                            <i class="bx bx-file-detail f18 textGray400"></i>
                                            <p class="fs14 mb-0">Whistleblowing</p>
                                        </div>
                                        <div>
                                            <span class="careBadg darkMuteBadg">Requrired</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4 muchsmallText">Upload policies from the Compliance Hub → Policy Library</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- notesModal end -->
        <!-- tab  -->
        <script>
            const tabs = document.querySelectorAll(".tab");
            const contents = document.querySelectorAll(".content");

            tabs.forEach(tab => {
                tab.addEventListener("click", () => {

                    document.querySelector(".tab.active")?.classList.remove("active");
                    tab.classList.add("active");

                    let tabName = tab.getAttribute("data-tab");

                    contents.forEach(content => {
                        content.classList.remove("active");
                    });

                    document.getElementById(tabName).classList.add("active");
                });
            });
        </script>
        <!-- staff js -->
        <script>
            const interViewMain = document.querySelector(".interViewMain");
            const staffOnBoardMain = document.querySelector(".staffOnBoardMain");

            // Show Interview section
            document.querySelectorAll(".btnInterview").forEach(btn => {
                btn.addEventListener("click", () => {
                    if (interViewMain.style.display !== "block") {
                        interViewMain.style.display = "block";
                        staffOnBoardMain.style.display = "none";
                    }
                });
            });
            // Back to Overview button inside Interview section
            document.querySelectorAll(".backToOriginal").forEach(btn => {
                btn.addEventListener("click", () => {
                    interViewMain.style.display = "none";
                    staffOnBoardMain.style.display = "block";
                });
            });
        </script>
        <!-- append -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll(".appendBtn").forEach(button => {
                    button.addEventListener("click", function(e) {
                        e.preventDefault();
                        const container = button.closest(".appendContainer");
                        if (!container) return;
                        const templateRow = container.querySelector(".appendRow");
                        if (!templateRow) return;
                        const newRow = templateRow.cloneNode(true);
                        newRow.style.display = "block"; // show the row
                        newRow.querySelectorAll("input").forEach(input => input.value = "");
                        newRow.querySelectorAll("select").forEach(select => select.selectedIndex = 0);
                        newRow.querySelectorAll("textarea").forEach(txt => txt.value = "");
                        container.appendChild(newRow);
                    });
                });
                document.addEventListener("click", function(e) {
                    const del = e.target.closest(".deleteIcon");
                    if (del) {
                        const row = del.closest(".appendRow");
                        if (row) row.remove();
                    }
                });
            });
        </script>
        <!-- progress bar -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const checklist = document.querySelector(".inductionChecklist");
                const items = checklist.querySelectorAll(".checkItem");
                const indProgress = checklist.querySelector(".indProgress");

                items.forEach(item => {
                    const checkbox = item.querySelector(".checkBoxHw");
                    const dateEl = item.querySelector(".completedDate");

                    checkbox.addEventListener("change", function() {
                        if (checkbox.checked) {
                            item.classList.remove("muteBg");
                            item.classList.add("bg-greenp-50");
                            dateEl.style.display = "block";
                        } else {
                            item.classList.remove("bg-greenp-50");
                            item.classList.add("muteBg");
                            dateEl.style.display = "none";
                        }
                        const total = items.length;
                        const completed = checklist.querySelectorAll(".checkBoxHw:checked").length;
                        const percentage = (completed / total) * 100;
                        indProgress.style.width = `${percentage}%`;
                    });
                });
            });
        </script>
        <!-- FIXED Record Section JavaScript - Works in multiple modals -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.addEventListener('click', function(event) {
                    const recordBtn = event.target.closest('.recordBtn');
                    if (recordBtn) {
                        const card = recordBtn.closest('.recordCard');
                        if (!card) return;
                        const content = card.querySelector('.recordContent');
                        if (!content) return;
                        document.querySelectorAll('.recordContent').forEach(c => c.style.display = 'none');
                        content.style.display = 'block';
                        return;
                    }
                    const cancelBtn = event.target.closest('.cancelRecord');
                    if (cancelBtn) {
                        const card = cancelBtn.closest('.recordCard');
                        if (!card) return;
                        const content = card.querySelector('.recordContent');
                        if (content) content.style.display = 'none';
                    }
                });
            });
        </script>
        <!-- record sec  -->

        <!-- checkToggle-->
        <script>
            const mentalCheckin = document.querySelector(".mentalCheckIn");
            const mentalCapacitySelect = document.querySelector(".mentalCapacitySelect");
            mentalCheckin.addEventListener("change", () => {
                if (mentalCheckin.checked) {
                    mentalCapacitySelect.style.display = "block"
                } else {
                    mentalCapacitySelect.style.display = "none"
                }
            })
        </script>
</main>
@endsection