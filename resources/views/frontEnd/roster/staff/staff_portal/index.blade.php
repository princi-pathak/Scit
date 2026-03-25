@extends('frontEnd.layouts.master')
@section('title', 'Staff Portal')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row d-flex align-items-center">
            <div class="col-md-5">
                <div class="staffHeaderp">
                    <div>
                        <h1 class="mainTitlep">Staff Portal</h1>
                        <p class="header-subtitle mb-0">Welcome back, vipin </p>
                    </div>

                </div>
            </div>
            <div class="col-lg-7">
                <div class="staffPortanEmer">
                    <div class="clntalertheader p24 rounded8">
                        <h5 class="mb-0 h5Head"> <i class="bx bx-shield fs23 darkRedText"></i> Emergency</h5>
                    </div>
                    <div class="p24">
                        <p class="fs13 textGray500">If you need immediate assistance, press the SOS button. This will alert all managers with your location. </p>
                        <button class="bgBtn bgRedBtn py-4 w100" data-toggle="modal" data-target="#requestHelpModal"> <i class="bx bx-shield f18"></i> SOS - Request Help</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <!-- main tab -->
                <div class="tabContainerp mainTabstaffPortal">
                    <div class="shadowp lightBorderp rounded12">
                        <div class="stfPlMainTabHeader p-3 scrollTabX">
                            <div class="tabs p-1">
                                <button class="tab active" data-tab="myShiftsTab"><i class="bx bx-calendar-week"></i> My Shifts</button>
                                <button class="tab" data-tab="careTasksTab"><i class="bx bx-heart"></i> Care Tasks</button>
                                <button class="tab" data-tab="clockTab"><i class="bx bx-clock"></i> Clock</button>
                                <button class="tab" data-tab="availabilityTab"><i class="bx bx-calendar-week"></i> Availability</button>
                                <button class="tab" data-tab="leaveTab"><i class="bx bx-calendar-week"></i> Leave</button>
                                <button class="tab" data-tab="requestsTab"><i class="bx bx-message"></i> Requests</button>
                                <button class="tab" data-tab="payslipsTab"><i class="bx bx-pound"></i> Payslips</button>
                                <button class="tab" data-tab="safeguardingTab"><i class="bx bx-shield"></i> Safeguarding</button>
                                <button class="tab" data-tab="confidentialTab"><i class="bx bx-lock"></i> Confidential</button>
                                <button class="tab" data-tab="updatesTab"><i class="bx bx-send"></i> Updates</button>
                                <button class="tab" data-tab="photosTab"><i class="bx bx-camera"></i> Photos</button>
                                <button class="tab" data-tab="offlineTab"><i class="bx bx-wifi"></i> Offline</button>
                            </div>
                        </div>
                        <!-- tab content -->
                        <div class="tab-content p24 bgWhite rounded12">
                            <div class="content active" id="myShiftsTab">
                                <!-- shift content -->
                                <div class="shadowp rounded8 lightBorderp bgWhite">
                                    <div class="careTaskheader p24 rounded8TR">
                                        <h2 class=""><i class="bx bx-calendar-week me-2"></i>My Shift</h2>
                                    </div>
                                    <div class="p24">
                                        <div class="noData py-5" style="border: unset; box-shadow: unset;">
                                            <div>
                                                <i class="bx bx-calendar-week"></i>
                                                <p class="mb-0">No shifts assigned yet</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end shift content -->
                            </div>
                            <div class="content" id="careTasksTab">
                                <!--  care tasks content -->
                                <div class="noData">
                                    <div>
                                        <i class="bx bx-heart"></i>
                                        <p class="mb-0">No shifts or visits scheduled for today</p>
                                    </div>
                                </div>
                                <!-- end care tasks content -->
                            </div>
                            <div class="content" id="clockTab">
                                <!--  clock content -->
                                <div class="noData py-5" style="border: unset; box-shadow: unset;">
                                    <div>
                                        <i class="bx bx-clock"></i>
                                        <h5 class="h5Head font600 textGray500 mt-4 mb-3">No active shift selected </h5>
                                        <p class="mb-0">Select a shift from "My Shifts" to clock in/out</p>
                                    </div>
                                </div>
                                <!-- end clock content -->
                            </div>
                            <div class="content" id="availabilityTab">

                                <!--  availability content -->
                                <div class="noData">
                                    <div>
                                        <i class="bx bx-alert-circle"></i>
                                        <p class="mb-0">Loading your availability...</p>
                                    </div>
                                </div>
                                <!-- end availability content -->

                            </div>
                            <div class="content" id="leaveTab">
                                <!--  leave content -->
                                <div class="noData">
                                    <div>
                                        <i class="bx bx-calendar-week"></i>
                                        <h6 class="mt-4 mb-3 textGray500 fs16">No leave requests yet</h6>
                                        <p class="mb-0">Click "Request Leave" to create your first request</p>
                                    </div>
                                </div>
                                <!-- end leave content -->

                            </div>
                            <div class="content" id="requestsTab">
                                <!--  requests content -->
                                <div class="flexBw">
                                    <h2>My Shifts Requests</h2>
                                    <span class="borderBadg">0 Pending</span>
                                </div>
                                <!-- no data -->
                                <div class="noData mt20">
                                    <div>
                                        <i class="bx bx-calendar-week"></i>
                                        <h6 class="mt-4 mb-3 blackText fs16 font600">No Shift Requests </h6>
                                        <p class="mb-0">You don't have any shift requests at the moment</p>
                                    </div>
                                </div>
                                <!-- end requests content -->
                            </div>
                            <div class="content" id="payslipsTab">
                                <!--pay  slip data-->
                                <div class="noData py-5" style="border: unset; box-shadow: unset;">
                                    <div>
                                        <i class="bx bx-file-detail"></i>
                                        <h6 class="mb-3 mt-4 blackText fs16 font600">No Shift Requests </h6>
                                        <p class="mb-0">Your payslips will appear here once processed</p>
                                    </div>
                                </div>
                                <!-- end payslip data -->

                            </div>
                            <div class="content" id="safeguardingTab">
                                <!-- safeguarding content -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="flexBw">
                                            <h2><i class="bx bx-shield me-2 purpleTextp"></i>Safeguarding</h2>
                                            <div>
                                                <button class="bgBtn grayBtn cancelConnBtn" style="display: none;"> <i class="bx bx-alert-triangle me-2"></i> Cancel</button>
                                                <button class="bgBtn bgRedBtn addReportBtn"> <i class="bx bx-alert-triangle"></i> Report a Concern</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- danger red section start-->
                                    <div class="col-lg-12">
                                        <div class="bBorderCard mt20 urReqSec ">
                                            <div class="d-flex gap-3 urReqCon">
                                                <div>
                                                    <i class="bx  bx-alert-triangle"></i>
                                                </div>
                                                <div>
                                                    <h6 class="h6Head darkRedText">If Someone is in Immediate Danger</h6>
                                                    <div class="d-flex gap-4 mt-3 urReqDetails">

                                                        <span>Call 999 immediately. Do not wait. Then inform your manager and complete a safeguarding referral. </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end danger section -->
                                    <div class="col-lg-12">
                                        <div class="safeGuardConForm mt20 shadowp" style="display: none;">
                                            <div class="bg-purple-50 p24 rounded8TR" style="border: none;">
                                                <h5 class="h5Head mb-0">Report a Safeguarding Concern</h5>
                                            </div>
                                            <div class="p-4">
                                                <form action="">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label for="" class="formLabel"> Type of Concern *</label>
                                                            <select name="" id="" class="form-control">
                                                                <option value="">Physical Abuse</option>
                                                                <option value="">Emotional and psychological Abuse</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12 m-t-10">
                                                            <label for="" class="formLabel">Person at Risk</label>
                                                            <input type="text" class="form-control" placeholder="Name of person you are concerned about">
                                                        </div>
                                                        <div class="col-lg-12 m-t-10">
                                                            <label for="" class="formLabel">Description of Concern *</label>
                                                            <textarea class="form-control" rows="3" cols="15" placeholder="Describe what you have seen, heard or been told. Include dates, times and any witnesses if known."></textarea>
                                                        </div>
                                                        <div class="col-lg-12 m-t-10">
                                                            <label for="" class="formLabel">Any Witnesses? </label>
                                                            <input type="text" class="form-control" placeholder="Names of any witnesses (optional)">
                                                        </div>
                                                        <div class="col-lg-12 m-t-10">
                                                            <div class="dFlexGap">
                                                                <input type="checkbox" class="checkBoxHW" id="immediateDanger">
                                                                <label for="immediateDanger" class="formLabel mb-0" style="color: #a41d1d;">This person is in immediate danger</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 m-t-10">
                                                            <button class="w100 bgBtn purpleBgBtn"> <i class="bx bx-send f18 me-2"></i> Submit Safeguarding Concern</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mt20 emergencyMain p-4">
                                            <h5 class="h5Head mt-4"> <i class="bx bx-phone f20 blueText me-2"></i>Key Contacts</h5>
                                            <div class="mt20 pt-4">
                                                <div class="muteBg rounded8 p-3 bottomSpace">
                                                    <div class="flexBw gap-3">
                                                        <div>
                                                            <h6 class="h6Head">Safeguarding Lead</h6>
                                                            <p class="fs13 textGray500 mb-0">For all safeguarding concerns during office hours</p>
                                                        </div>
                                                        <div>
                                                            <span class="borderBadg">Internal </span>
                                                            <h6 class="h6Head blueText mt-3 mb-0">Extension 101</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="muteBg rounded8 p-3 bottomSpace">
                                                    <div class="flexBw gap-3">
                                                        <div>
                                                            <h6 class="h6Head">Safeguarding Lead</h6>
                                                            <p class="fs13 textGray500 mb-0">For all safeguarding concerns during office hours</p>
                                                        </div>
                                                        <div>
                                                            <span class="borderBadg">Internal </span>
                                                            <h6 class="h6Head blueText mt-3 mb-0">07XXX XXXXXX</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="muteBg rounded8 p-3 bottomSpace">
                                                    <div class="flexBw gap-3">
                                                        <div>
                                                            <h6 class="h6Head">Safeguarding Lead</h6>
                                                            <p class="fs13 textGray500 mb-0">For all safeguarding concerns during office hours</p>
                                                        </div>
                                                        <div>
                                                            <span class="borderBadg">Internal </span>
                                                            <h6 class="h6Head blueText mt-3 mb-0">0XXX XXX XXXX</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt20 emergencyMain p-4">
                                            <h5 class="h5Head mt-4"> My Submitted Concerns </h5>
                                            <div class="mt20 pt-4">
                                                <div class="lightBorderp p-4 rounded8">
                                                    <div class="flexBw">
                                                        <p class="mb-0 fs13 textGray500">3/24/2026</p>
                                                        <div>
                                                            <span class="careBadg yellowBadges">Reported</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt20 emergencyMain p-4">
                                            <h5 class="h5Head mt-4"> <i class="bx bx-file-detail f20 textGray600 me-2"></i> Safeguarding Resources</h5>
                                            <div class="row mt20 careRow pt-4">
                                                <div class="col-lg-6">
                                                    <div class="emergencyMain p-4 hoverBg cursorPointer lightShadow ">
                                                        <div class="dFlexGap">
                                                            <i class="bx bx-file-detail f18 blueText"></i>
                                                            <div>
                                                                <h6 class="h6Head mb-2">Safeguarding Policy</h6>
                                                                <p class="mb-0 fs13 textGray500 font600">Read our full policy document</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="emergencyMain p-4 hoverBg cursorPointer lightShadow ">
                                                        <div class="dFlexGap">
                                                            <i class="bx bx-file-detail f18 greenTextp"></i>
                                                            <div>
                                                                <h6 class="h6Head mb-2">Safeguarding Policy</h6>
                                                                <p class="mb-0 fs13 textGray500 font600">Read our full policy document</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="emergencyMain p-4 hoverBg cursorPointer lightShadow ">
                                                        <div class="dFlexGap">
                                                            <i class="bx bx-file-detail f18 purpleTextp"></i>
                                                            <div>
                                                                <h6 class="h6Head mb-2">Safeguarding Policy</h6>
                                                                <p class="mb-0 fs13 textGray500 font600">Read our full policy document</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="emergencyMain p-4 hoverBg cursorPointer lightShadow ">
                                                        <div class="dFlexGap">
                                                            <i class="bx bx-arrow-out-up-right-square f18 orangeText"></i>
                                                            <div>
                                                                <h6 class="h6Head mb-2">Safeguarding Policy</h6>
                                                                <p class="mb-0 fs13 textGray500 font600">Read our full policy document</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- safeguarding form section -->

                                    <!--end safeguarding form section -->
                                </div>
                                <!-- no data -->
                                <div class="noData mt20">
                                    <div>
                                        <i class="bx bx-shield"></i>
                                        <h6 class="mt-4 mb-3 blackText fs16 font600">No Safeguarding Issues</h6>
                                        <p class="mb-0">You don't have any safeguarding issues at the moment</p>
                                    </div>
                                </div>
                                <!-- end safeguarding content -->
                            </div>
                            <div class="content" id="confidentialTab">
                                <!-- confidential tab content -->
                                <div>
                                    <h2><i class="bx bx-lock me-2 violetText"></i>Raise a Confidential Issue</h2>
                                    <!-- violet part -->
                                    <div class="mt20 bg-violet-70 rounded12 lightBorderp borderLeftThick p-4" style="border-color: #6366f1">
                                        <div class="dFlexGap violetText align-items-start">
                                            <div>
                                                <i class="bx bx-shield fs23"></i>
                                            </div>
                                            <div>
                                                <h6 class="h6Head violetText">Your Privacy is Protected</h6>
                                                <p class="mb-0 fs13 ">All issues raised here are treated with strict confidentiality. Only the designated recipient will have access to your submission. You can choose to remain anonymous if you prefer.</p>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end violet part -->
                                    <!-- confidential form -->
                                    <div class="emergencyMain p-4 mt20">
                                        <h5 class="h5Head mt-4">Submit Your Concern</h5>
                                        <form action="">
                                            <div class="row mt20 pt-4">
                                                <div class="col-lg-12">
                                                    <label class="formLabel">Category of Issue *</label>
                                                    <div class="heathOff">
                                                        <select name="" id="" class="form-control">
                                                            <option value="">Select Category of Issue</option>
                                                            <option value="1">Bullying or harassment</option>
                                                            <option value="2">Discrimination</option>
                                                            <option value="3"> Concerns About Management</option>
                                                        </select>
                                                        <div class="bg-blue-50 p-4 rounded8 m-t-10 heathOffCon shadowp" style="display: none;">
                                                            <h6 class="h6Head darkBlueTextp mb-2"><i class="bx bx-user-check me-2 blueText f18"></i> This will be sent to: Health & Safety Officer</h6>
                                                            <p class="mb-0 blueText fs13">Health and safety concerns for investigation</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 m-t-10">
                                                    <label class="formLabel">Subject *</label>
                                                    <input type="text" class="form-control" placeholder="Brief subject line for your issue">
                                                </div>
                                                <div class="col-lg-12 m-t-10">
                                                    <label class="formLabel">Subject *</label>
                                                    <textarea name="notes" id="" placeholder="Please provide as much detail as possible. Include dates, times, names, and any evidence you may have." class="form-control"></textarea>
                                                </div>
                                                <div class="col-lg-6 m-t-10">
                                                    <label class="formLabel">Urgency</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Normal</option>
                                                        <option value="">Urgent</option>

                                                    </select>
                                                </div>
                                                <div class="col-lg-6 m-t-10">
                                                    <label class="formLabel">Preferred Contact Method</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Email</option>
                                                        <option value="">Phone Call</option>
                                                        <option value="">In-Person Meeting</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12 m-t-10">
                                                    <div class="muteBg rounded5 p-3">
                                                        <div class="dFlexGap">
                                                            <div>
                                                                <input type="checkbox" id="submitAnony" class="checkBoxHW submitAnonyC">
                                                            </div>
                                                            <div>
                                                                <label class="formLabel cursorPointer" for="submitAnony"> <i class="bx f18 eyesBtn"></i> Submit anonymously</label>
                                                            </div>
                                                            <div>
                                                                <span class="careBadg muteBadges confidentialBadg" style="display: none;">Your identity will be hidden</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-4">
                                                    <button class="w100 bgBtn inidgoBtn"> <i class="bx bx-send f18 me-2"></i> Submit Confidentially</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt20 emergencyMain p-4">
                                        <h5 class="h5Head mt-4">External Support & Advice</h5>
                                        <div class="mt20 pt-4">
                                            <p class="fs13 textGray500">If you don't feel comfortable raising an issue internally, or need independent advice, these external organisations can help: </p>
                                            <div class="muteBg rounded8 p-3 bottomSpace mt-4">
                                                <div class="flexBw gap-3">
                                                    <div>
                                                        <h6 class="h6Head">ACAS </h6>
                                                        <p class="fs13 textGray500 mb-0">For all safeguarding concerns during office hours</p>
                                                    </div>
                                                    <div>
                                                        <h6 class="h6Head blueText mb-0">Extension 101</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="muteBg rounded8 p-3 bottomSpace">
                                                <div class="flexBw gap-3">
                                                    <div>
                                                        <h6 class="h6Head">Protect (Whistleblowing Charity)</h6>
                                                        <p class="fs13 textGray500 mb-0">For all safeguarding concerns during office hours</p>
                                                    </div>
                                                    <div>
                                                        <h6 class="h6Head blueText mb-0">07XXX XXXXXX</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="muteBg rounded8 p-3 bottomSpace">
                                                <div class="flexBw gap-3">
                                                    <div>
                                                        <h6 class="h6Head">CQC</h6>
                                                        <p class="fs13 textGray500 mb-0">For all safeguarding concerns during office hours</p>
                                                    </div>
                                                    <div>
                                                        <h6 class="h6Head blueText mb-0">0XXX XXX XXXX</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end  confidential form-->
                                </div>
                                <!-- no data -->
                                <div class="noData mt20">
                                    <div>
                                        <i class="bx bx-lock"></i>
                                        <h6 class="mt-4 mb-3 blackText fs16 font600">No Confidential Information</h6>
                                        <p class="mb-0">You don't have any confidential information at the moment</p>
                                    </div>
                                </div>
                                <!-- end confidential tab content -->

                            </div>
                            <div class="content" id="updatesTab">
                                <div class="flexBw mb-4">
                                    <div>
                                        <h6 class="h6Head">Today's Schedule</h6>

                                    </div>
                                    <div>
                                        <button class="hoverBtn"><i class="bx bx-refresh-cw me-2 fs16"></i> Refresh</button>
                                    </div>
                                </div>

                                <!-- no data -->
                                <div class="noData mt20" style="background-color: #f9fafb;">
                                    <div>
                                        <i class="bx bx-clock"></i>
                                        <p class=" mb-0">No shifts scheduled for today</p>
                                    </div>
                                </div>
                                <!-- end no data -->
                                <!-- real time update -->
                                <div class="shadowp aIInsightsheader p-4 rounded8 mt20" style="border: 1px solid #ddd;">
                                    <div class="dFlexGap purpleTextp align-items-start">
                                        <div>
                                            <i class="bx bx-pulse purpleTextp fs23"></i>
                                        </div>
                                        <div>
                                            <h6 class="h6Head darkPurpleTextp">Real-Time Updates</h6>
                                            <p class="fs13 mb-0">Updates are automatically shared with the care team and management. Use quick buttons for common updates or write custom notes for detailed information.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content" id="photosTab">Photos Data</div>
                            <div class="content" id="offlineTab">Offline Data</div>

                        </div>
                        <!-- end tab content -->
                    </div>
                </div>
                <!-- main tab end -->
            </div>
        </div>
        <!-- request help modal -->
        <div class="modal fade leaveCommunStyle in" id="requestHelpModal" tabindex="-1" role="dialog" aria-labelledby="requestHelpModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="">
                        <div class="modal-header p24 " style="border-bottom: unset;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h5 class="fs16 darkRedText font600"> <i class="bx bx-alert-triangle redtext f20"></i> Emergency Assistance</h5>
                        </div>
                        <div class="modal-body p24 pt-0">
                            <p class="fs15 font600 textGray600">This will immediately alert all managers to your location and situation.</p>
                            <div>
                                <label>You can add additional notes if needed:</label>
                                <textarea rows="3" cols="20" placeholder="Optional: Describe the situation..." class="form-control m-t-10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer p24 pt-0 dFlexGap justify-content-end" style="border-top: unset;">
                            <button class="borderBtn" data-dismiss="modal"> Cancel</button>
                            <button type="button" class="bgBtn bgRedBtn"> <i class="bx bx-shield f18 me-2"></i>Confirm SOS</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- end request help modal -->
        <!-- js for tab -->
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

        <!-- js for safe guarding  -->
        <script>
            const addReportBtn = document.querySelector(".addReportBtn");
            const cancelConnBtn = document.querySelector(".cancelConnBtn");
            const safeGuardConForm = document.querySelector(".safeGuardConForm");
            addReportBtn.addEventListener("click", () => {
                safeGuardConForm.style.display = "block";
                addReportBtn.style.display = "none";
                cancelConnBtn.style.display = "inline-block";
            })
            cancelConnBtn.addEventListener("click", () => {
                cancelConnBtn.style.display = "none";
                addReportBtn.style.display = "inline-block";
                safeGuardConForm.style.display = "none";
            })
        </script>
        <script>
            const checkbox = document.querySelector(".submitAnonyC");
            const badge = document.querySelector(".confidentialBadg");
            const eyesBtn = document.querySelector(".eyesBtn");
            console.log(eyesBtn);

            checkbox.addEventListener("change", function() {

                if (checkbox.checked) {
                    badge.style.display = "inline-block";
                    eyesBtn.classList.add("bx-eye-slash")

                    eyesBtn.classList.remove("bx-eye");
                } else {
                    badge.style.display = "none";
                    eyesBtn.classList.add("bx-eye")
                    eyesBtn.classList.remove("bx-eye-slash")

                }

            });
        </script>
        <script>
            const select = document.querySelector(".heathOff select");
            const box = document.querySelector(".heathOffCon");
            select.addEventListener("change", function() {
                if (this.value !== "") {
                    box.style.display = "block";
                } else {
                    box.style.display = "none";
                }

            });
        </script>
    </div>

</main>
@endsection