<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title', 'Staff Onboadrding')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="staffHeaderp">
                    <div>
                        <div class="d-flex gap-2 mb-3">
                            <div>
                                <i class="bx bx-group blueText" style="font-size: 30px;"></i>
                            </div>

                            <h1 class="mainTitlep mb-0"> Staff Onboarding Management </h1>
                        </div>
                        <p class="header-subtitle mb-0">Pre-employment checks, DBS, training, and induction tracking</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
        <div class="row mt20">
            <div class="col-lg-12">
                <div class="card-row">
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-group fs30 blueText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">32</h2>
                            <p class=" fs13 textGray">Total Staff</p>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-lock-open fs30 greenText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">0</h2>
                            <p class=" fs13 textGray">Fit to Work</p>
                            <div>
                                <span class="careBadg darkGreenBadges">0%</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-lock fs30 orangeText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">0</h2>
                            <p class=" fs13 textGray">In Progress</p>

                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-shield fs30 orangeText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">0</h2>
                            <p class=" fs13 textGray">DBS Expiring</p>

                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div class="mb-3">
                                <i class="bx bx-alert-triangle redtext fs30"></i>
                            </div>
                            <h2 class="cardBoldTitle mt-0 mb-0  ">0</h2>
                            <p class="fs13 textGray">DBS Expired </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search bar -->
        <div class="row mt20">
            <div class="col-lg-12">
                <div class="dFlexGap">
                    <div class="input-group searchWithtabs flex1 shadowp">
                        <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control searchDailyLog" placeholder="Search staff by name or email...">
                    </div>
                    <div><select class="form-control">
                            <option>All Staff</option>
                            <option>Approved Only</option>
                            <option>In Progress</option>
                            <option>Not Started</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--  all staff stripe  -->
        <div class="row mt20">
            <div class="col-lg-12">
                <div class="virtGap">
                    <div class="emergencyMain p-3 AllStaffTabC ">
                        <div class="flexBw align-items-center">
                            <div class="dFlexGap flex1">

                                <i class="bx bx-lock fs23 orangeText"> </i>
                                <div>
                                    <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                    <p class="mb-0 textGray500 fs13">jwake@gmail.co.uk</p>
                                </div>
                            </div>
                            <div class="dFlexGap flex1">
                                <div class="flex1">
                                    <div class="progressBar" style="width:150px;px;; margin-left:auto;">
                                        <div class="progressFill" style="width:16%; background:#3376f2"></div>
                                    </div>
                                </div>
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
                                        Manage
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="emergencyMain p-3 AllStaffTabC ">
                        <div class="flexBw align-items-center">
                            <div class="dFlexGap flex1">

                                <i class="bx bx-lock fs23 orangeText"> </i>
                                <div>
                                    <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                    <p class="mb-0 textGray500 fs13">jwake@gmail.co.uk</p>
                                </div>
                            </div>
                            <div class="dFlexGap flex1">
                                <div class="flex1">
                                    <div class="progressBar" style="width:150px;px;; margin-left:auto">
                                        <div class="progressFill" style="width:16%; background:#3376f2"></div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="fs13 font700 mb-2 blackText">0%</p>
                                    <p class="fs13 mb-2 textGray500">0/5 complete</p>

                                </div>
                                <div>
                                    <span class="careBadg darkOrangeBadg">Onboarding
                                    </span>
                                </div>
                                <div>
                                    <button class="borderBtn">
                                        <i class="bx bx-eye me-2 f18"></i>
                                        Manage
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="emergencyMain p-3 AllStaffTabC ">
                        <div class="flexBw align-items-center">
                            <div class="dFlexGap flex1">

                                <i class="bx bx-lock fs23 orangeText"> </i>
                                <div>
                                    <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                    <p class="mb-0 textGray500 fs13">jwake@gmail.co.uk</p>
                                </div>
                            </div>
                            <div class="dFlexGap flex1">
                                <div class="flex1">
                                    <div class="progressBar" style="width:150px;px;; margin-left:auto">
                                        <div class="progressFill" style="width:16%; background:#3376f2"></div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="fs13 font700 mb-2 blackText">0%</p>
                                    <p class="fs13 mb-2 textGray500">0/5 complete</p>

                                </div>
                                <div>
                                    <span class="careBadg darkOrangeBadg">Onboarding
                                    </span>
                                </div>
                                <div>
                                    <button class="borderBtn">
                                        <i class="bx bx-eye me-2 f18"></i>
                                        Manage
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="emergencyMain p-3 AllStaffTabC ">
                        <div class="flexBw align-items-center">
                            <div class="dFlexGap flex1">

                                <i class="bx bx-lock fs23 orangeText"> </i>
                                <div>
                                    <h6 class="h6Head mb-2">Jane Wakefield </h6>
                                    <p class="mb-0 textGray500 fs13">jwake@gmail.co.uk</p>
                                </div>
                            </div>
                            <div class="dFlexGap flex1">
                                <div class="flex1">
                                    <div class="progressBar" style="width:150px;px;; margin-left:auto">
                                        <div class="progressFill" style="width:16%; background:#3376f2"></div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="fs13 font700 mb-2 blackText">0%</p>
                                    <p class="fs13 mb-2 textGray500">0/5 complete</p>

                                </div>
                                <div>
                                    <span class="careBadg darkOrangeBadg">Onboarding
                                    </span>
                                </div>
                                <div>
                                    <button class="borderBtn">
                                        <i class="bx bx-eye me-2 f18"></i>
                                        Manage
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
                                    <h4 class="modal-title"> <i class="bx bx-user-check blueText blueText fs23 me-2"></i>Staff Onboarding: Sarah Johnson </h4>
                                </div>
                                <div class="modal-body heightScrollModal p24" style="height: unset;">

                                    <div class="row row-equal">
                                        <div class="col-lg-6">
                                            <div class="shadowp p-5 lightBorderp rounded8" style="border-color: #9333ea33;">
                                                <h5 class="h5Head purpleTextp mb-4"> <i class="bx bx-sparkles me-2 f20"></i>AI Personalized Onboarding Plan
                                                </h5>
                                                <p class="fs13 textGray">Generate a customized 30-60-90 day onboarding plan tailored to Sarah Johnson's role and background</p>
                                                <button class="bgBtn purpleBgBtn w100"><i class="bx bx-sparkles me-2 f18 "></i> Generate Personalized Plan</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="shadowp p-5 lightBorderp rounded8" style="border-color: #bfdbfe;">
                                                <h5 class="h5Head blueText mb-4"> <i class="bx bx-file-detail me-2 f20"></i> AI Welcome Packet</h5>
                                                <p class="fs13 textGray">Generate a personalized welcome packet with company info, team introductions, and first-week tasks for Jane Wakefield.</p>
                                                <button class="bgBtn w100"><i class="bx bx-sparkles me-2 f18 "></i> Generate Welcome Packet</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt20">
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
                                        <div class="col-lg-12 mt20">
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
                                        <div class="col-lg-12 mt-5">
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
                                                            <button class="bgBtn blackBtn">Continue</button>
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
                                                            <button class="bgBtn blackBtn">Continue</button>
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
                                                            <button class="borderBtn">Start</button>
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
                    <!-- manage document modal end -->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection