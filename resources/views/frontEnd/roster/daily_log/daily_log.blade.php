<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title', 'Daily Log')
@section('content')

@include('frontEnd.roster.common.roster_header')
<style>
    ul.trendClass-list {
        max-height: 300px;
        overflow-y: auto;
        min-height: 100px;
    }

    .scrollDailyCheck {
        height: 60vh;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .timelineTab .layoutTab {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 6px 16px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: 0.2s;
    }

    .timelineTab .layoutTab.activeClass {
        background: #474751;
        color: #fff;
        border-color: #474751;
    }
</style>
<main class="page-content">
    <div class="container-fluid">

        <div class="topHeaderCont">
            <div>
                <h1>Daily Log</h1>
                <p class="header-subtitle">Record visitors, appointments, and activities</p>
            </div>
            <div class="header-actions addnewicons">
                <button class="btn allBtnUseColor addFirstEntryModal" data-toggle="modal"
                    data-target="#AddFirstEntry"><i class='bxdm  bx-plus'></i> Add Entry</button>
            </div>
        </div>


        <div class="sectionWhiteBgAllUse">
            <div class="dailyLogsdateSec">
                <div class="date-slider">
                    <button class="nav-btn prev-btn"><i class='bx  bx-chevron-left'></i> Previous</button>

                    <div class="changeDateSlide">
                        <div class="date-display">
                            <div class="date-inner">
                                <span class="dateIcon"><i class='bx  bx-calendar'></i> </span>
                                <span class="day-text">{{date('l')}}</span>,
                                <span class="full-date">{{date('F d, Y')}}</span>
                            </div>
                        </div>
                        <input type="date" class="date-picker form-control dateSearch">
                    </div>

                    <button class="nav-btn next-btn">Next <i class='bx  bx-chevron-right'></i> </button>

                </div>
            </div>
        </div>


        <div class="rota_dashboard-cards simpleCard">
            <div class="rota_dash-card blue">
                <div class="rota_dash-left">
                    <p class="rota_title">Total Entries</p>
                    <h2 class="rota_count" id="total">0</h2>
                </div>
            </div>

            <div class="rota_dash-card orangeClr">
                <div class="rota_dash-left">
                    <p class="rota_title">Visitors</p>
                    <h2 class="rota_count greenText" id="visitorsCount">0</h2>
                </div>
            </div>

            <div class="rota_dash-card green">
                <div class="rota_dash-left">
                    <p class="rota_title">Outings</p>
                    <h2 class="rota_count orangeText" id="outingsCount">0</h2>
                </div>
            </div>

            <div class="rota_dash-card redClr">
                <div class="rota_dash-left">
                    <p class="rota_title">Follow-ups Required</p>
                    <h2 class="rota_count" id="followUpCount">0</h2>
                </div>
            </div>

        </div>


        <div class="calendarTabs leaveRequesttabs m-t-20">
            <div class="tabs">
                <div class="input-group searchWithtabs">
                    <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control searchDailyLog" placeholder="Search entries...">
                </div>
                <button class="tab active" data-tab="dailyLogAllAddEntry">
                    All
                </button>
                <button class="tab" data-tab="dailyLogVisitors">
                    Visitors
                </button>
                <button class="tab" data-tab="dailyLogOutings">
                    Outings
                </button>
                <button class="tab" data-tab="dailyLogMedical">
                    Medical
                </button>
                <button class="tab" data-tab="dailyLogFamily">
                    Family
                </button>
                <div class="timelineTab">
                    <button class="layoutTab activeClass" data-design="1">
                        Timeline
                    </button>
                    <button class="layoutTab" data-design="2" data-tab="inactiveCarer">
                        List
                    </button>
                </div>
            </div>

            <div class="tab-content carertabcontent">
                <div class="content active" id="dailyLogAllAddEntry">
                    <div class="leave-card addEntryDetails">
                        <div class="carePlanWrapper" id="renderAllHtmlData">
                            <div class="planCard" style="background:#ecfeff ;border: 1px solid #a5f3fc;">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon blueLightclr" style="color:#0e7490; background:#cffafe;"> <i class="bx bx-pulse"></i></span>Arjun Kumar
                                        <span class="roundBtntag blueLightclr" style="color:#0e7490; background:#cffafe;">
                                            General Visitor
                                        </span>

                                        <div class="inORoutTime">
                                            <span><i class="bx bx-clock"></i></span>
                                            <span class="gayClrIcon">Left:</span>
                                            <span>11:06</span>
                                            <span class="gayClrIcon"><i class="bx bx-arrow-right"></i></span>
                                            <span class="gayClrIcon">Returned:</span>
                                            <span>00:06</span>
                                        </div>
                                    </div>

                                    <div class="planActions">
                                        <button type="button" class="editRosterDailyLog" data-id="10" data-date="2026-02-16" data-visitor_name="Arjun Kumar" data-entry_type_id="1" data-org_company="mobApps" data-purpose_visit="for development of web" data-client_id="155" data-arrival_time="11:06:00" data-departure_time="00:06:00" data-notes="gsdrg" data-available_for_overtime="0" data-follow_details="" data-destination="" data-transport_id="" data-risk_assessment="0" data-outing_summary="" data-is_outing="0" data-accompanying_staffs="[]">
                                            <i class="bx bx-pencil"></i>
                                        </button>

                                        <button class="danger delete_rosterDailyLog" type="button" data-id="10">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="AddFirstDetailsEntry">
                                    <div class="planFooter mb-3">
                                        <span>Travel</span>
                                    </div>
                                    <div class=" mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                <p class="textGray fs13 mb-0"><i class="bx bx-location fs16 me-1 cyanText"></i>India</p>
                                            </div>
                                            <div>
                                                <p class="textGray fs13 mb-0"><i class="bx bx-car fs16  me-1 cyanText"></i>walking</p>

                                            </div>
                                            <div>
                                                <span class="careBadg greenbadges"> <i class="bx bx-check fs16"></i> Risk Assessed</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="planFooter mb-3">
                                        <span class="italicFont">Outing Outcome</span>
                                    </div>
                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                        <span class="font700 middleAlign">Follow-up required :
                                        </span><span class="middleAlign">Hello</span>
                                    </p>
                                </div>
                            </div>
                            <div class="planCard" style="background:#ecfeff ;border: 1px solid #a5f3fc;">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon blueLightclr" style="color:#dc2626; background:#fee2e2; padding-top:9px"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stethoscope w-6 h-6">
                                                <path d="M11 2v2"></path>
                                                <path d="M5 2v2"></path>
                                                <path d="M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"></path>
                                                <path d="M8 15a6 6 0 0 0 12 0v-3"></path>
                                                <circle cx="20" cy="10" r="2"></circle>
                                            </svg></span>Arjun Kumar
                                        <span class="roundBtntag blueLightclr" style="color:#dc2626; background:#fee2e2;">
                                            General Visitor
                                        </span>

                                        <div class="inORoutTime">
                                            <span><i class="bx bx-clock"></i></span>
                                            <span class="gayClrIcon">In:</span>
                                            <span>11:06</span>
                                            <span class="gayClrIcon"><i class="bx bx-arrow-right"></i></span>
                                            <span class="gayClrIcon">Out:</span>
                                            <span>00:06</span>
                                        </div>
                                    </div>

                                    <div class="planActions">
                                        <button type="button" class="editRosterDailyLog" data-id="10" data-date="2026-02-16" data-visitor_name="Arjun Kumar" data-entry_type_id="1" data-org_company="mobApps" data-purpose_visit="for development of web" data-client_id="155" data-arrival_time="11:06:00" data-departure_time="00:06:00" data-notes="gsdrg" data-available_for_overtime="0" data-follow_details="" data-destination="" data-transport_id="" data-risk_assessment="0" data-outing_summary="" data-is_outing="0" data-accompanying_staffs="[]">
                                            <i class="bx bx-pencil"></i>
                                        </button>

                                        <button class="danger delete_rosterDailyLog" type="button" data-id="10">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="AddFirstDetailsEntry">
                                    <div class="planFooter mb-3">
                                        <span>Travel</span>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                <p class="textGray fs13 mb-0"><i class="bx bx-location fs16 me-1 cyanText"></i>India</p>
                                            </div>
                                            <div>
                                                <p class="textGray fs13 mb-0"><i class="bx bx-car fs16  me-1 cyanText"></i>walking</p>

                                            </div>
                                            <div>
                                                <span class="careBadg greenbadges"> <i class="bx bx-check fs16"></i> Risk Assessed</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="planFooter mb-3">
                                        <span class="italicFont">Outing Outcome</span>
                                    </div>
                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                        <span class="font700 middleAlign">Follow-up required :
                                        </span><span class="middleAlign">Hello</span>
                                    </p>
                                </div>
                            </div>
                            <div class="planCard">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon blueLightclr" style="color:#7e22ce; background:#f3e8ff;"> <i class="bx bx-user-check"></i> </span>Arjun Kumar
                                        <span class="roundBtntag blueLightclr" style="color:#7e22ce; background:#f3e8ff;">
                                            General Visitor
                                        </span>

                                        <div class="bg-green-70 rounded8 px-3 py-2" style="border: unset;">
                                            <div class="d-flex gap-3 align-items-center">
                                                <div>
                                                    <span><i class="bx bx-clock darkGreenTextp"></i></span>
                                                    <span class="gayClrIcon">In:</span>
                                                    <span class="darkGreenTextp">11:31</span>
                                                </div>
                                                <div>
                                                    <span class="careBadg redDarkGreenAni onSiteHov">On Site
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="planActions">
                                        <button type="button" class="editRosterDailyLog" data-id="10" data-date="2026-02-16" data-visitor_name="Arjun Kumar" data-entry_type_id="1" data-org_company="mobApps" data-purpose_visit="for development of web" data-client_id="155" data-arrival_time="11:06:00" data-departure_time="00:06:00" data-notes="gsdrg" data-available_for_overtime="0" data-follow_details="" data-destination="" data-transport_id="" data-risk_assessment="0" data-outing_summary="" data-is_outing="0" data-accompanying_staffs="[]">
                                            <i class="bx bx-pencil"></i>
                                        </button>

                                        <button class="danger delete_rosterDailyLog" type="button" data-id="10">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="AddFirstDetailsEntry">
                                    <div class="planFooter mb-3">
                                        <span>Travel</span>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                <p class="textGray fs13 mb-0"><i class="bx bx-location fs16 me-1 cyanText"></i>India</p>
                                            </div>
                                            <div>
                                                <p class="textGray fs13 mb-0"><i class="bx bx-car fs16  me-1 cyanText"></i>walking</p>

                                            </div>
                                            <div>
                                                <span class="careBadg greenbadges"> <i class="bx bx-check fs16"></i> Risk Assessed</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="planFooter mb-3">
                                        <span>Outing Outcome</span>
                                    </div>
                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                        <span class="font700 middleAlign">Follow-up required :
                                        </span><span class="middleAlign">Hello</span>
                                    </p>
                                </div>
                            </div>
                            <!-- only in time enter -->
                            <div class="planCard" style="background:#ecfeff ;border: 1px solid #a5f3fc;">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon blueLightclr" style="color:#334155; background:#f1f5f9;"><i class="bx bx-car"></i> </span>Arjun Kumar
                                        <span class="roundBtntag blueLightclr" style="color:#334155; background:#f1f5f9;">
                                            General Visitor
                                        </span>

                                        <div class="bg-yellow-70 rounded8 px-3 py-2" style="border: unset;">
                                            <div class="d-flex gap-3 align-items-center">
                                                <div>
                                                    <span><i class="bx bx-clock darkOrangeTextp"></i></span>
                                                    <span class="gayClrIcon">Returned:</span>
                                                    <span class="darkOrangeTextp">11:31</span>
                                                </div>
                                                <div>
                                                    <span class="careBadg yellowDarkAni onSiteHov">On Site</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="planActions">
                                        <button type="button" class="editRosterDailyLog" data-id="10" data-date="2026-02-16" data-visitor_name="Arjun Kumar" data-entry_type_id="1" data-org_company="mobApps" data-purpose_visit="for development of web" data-client_id="155" data-arrival_time="11:06:00" data-departure_time="00:06:00" data-notes="gsdrg" data-available_for_overtime="0" data-follow_details="" data-destination="" data-transport_id="" data-risk_assessment="0" data-outing_summary="" data-is_outing="0" data-accompanying_staffs="[]">
                                            <i class="bx bx-pencil"></i>
                                        </button>

                                        <button class="danger delete_rosterDailyLog" type="button" data-id="10">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="AddFirstDetailsEntry">
                                    <div class="planFooter mb-3">
                                        <span>Travel</span>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                <p class="textGray fs13 mb-0"><i class="bx bx-location fs16 me-1 cyanText"></i>India</p>
                                            </div>
                                            <div>
                                                <p class="textGray fs13 mb-0"><i class="bx bx-car fs16  me-1 cyanText"></i>walking</p>

                                            </div>
                                            <div>
                                                <span class="careBadg greenbadges"> <i class="bx bx-check fs16"></i> Risk Assessed</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="planFooter mb-3">
                                        <span class="italicFont">Outing Outcome</span>
                                    </div>
                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                        <span class="font700 middleAlign">Follow-up required :
                                        </span><span class="middleAlign">Hello</span>
                                    </p>
                                </div>
                            </div>
                            <!-- out time only -->
                            <div class="planCard">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon blueLightclr" style="color:#7e22ce; background:#f3e8ff;"> <i class="bx bx-user-check"></i> </span>Arjun Kumar
                                        <span class="roundBtntag blueLightclr" style="color:#7e22ce; background:#f3e8ff;">
                                            General Visitor
                                        </span>

                                        <div class="inORoutTime">
                                            <span><i class="bx bx-clock"></i></span>
                                            <span class="gayClrIcon">Out:</span>
                                            <span>00:06</span>
                                        </div>
                                    </div>

                                    <div class="planActions">
                                        <button type="button" class="editRosterDailyLog" data-id="10" data-date="2026-02-16" data-visitor_name="Arjun Kumar" data-entry_type_id="1" data-org_company="mobApps" data-purpose_visit="for development of web" data-client_id="155" data-arrival_time="11:06:00" data-departure_time="00:06:00" data-notes="gsdrg" data-available_for_overtime="0" data-follow_details="" data-destination="" data-transport_id="" data-risk_assessment="0" data-outing_summary="" data-is_outing="0" data-accompanying_staffs="[]">
                                            <i class="bx bx-pencil"></i>
                                        </button>

                                        <button class="danger delete_rosterDailyLog" type="button" data-id="10">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="AddFirstDetailsEntry">
                                    <div class="planFooter mb-3">
                                        <span>Travel</span>
                                    </div>

                                    <div class="planFooter mb-3">
                                        <span>Organization / Company</span>
                                        <span>Purpose of Visit</span>
                                        <span>Purpose of Visit notes

                                        </span>
                                    </div>
                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                        <span class="font700 middleAlign">Follow-up required :
                                        </span><span class="middleAlign">Hello</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="allPagination"></div>
                    </div>
                </div>

                <div class="content" id="dailyLogVisitors">
                    <div class="leave-card addEntryDetails">
                        <div class="carePlanWrapper" id="renderVisitorHtmlData">
                            <!-- pink -->
                            <div class="p-4 rtcozCardInDe rounded8 bgWhite mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-4 w100">
                                        <div class="bgIconStaffT rounded50 pinkBadges">
                                            <i class="fa fa-archive f20"></i>
                                        </div>
                                        <div class="flex1">
                                            <div class="d-flex justify-content-between align-items-center">

                                                <h6 class="h6Head mb-0">
                                                    John Milton
                                                </h6>
                                                <div class="d-flex gap-3">
                                                    <div>
                                                        <span class="careBadg pinkBadges">outing activity/ day trp
                                                        </span>
                                                    </div>
                                                    <div class="planActions">
                                                        <button type="button" class="editRosterDailyLog ms-0">
                                                            <i class="bx bx-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <div class="planActions">

                                                        <button class="danger delete_rosterDailyLog ms-0">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="textGray fs13">
                                                He is the ceo of the company
                                            </p>

                                            <div class="d-flex gap-3 mb-3 align-items-center">
                                                <div class="inORoutTime">
                                                    <span><i class="bx bx-clock fs16"></i></span>
                                                    <span class="gayClrIcon">In:</span>
                                                    <span>11:31</span>
                                                    <span class="gayClrIcon"><i class="bx bx-arrow-right"></i></span>
                                                    <span class="gayClrIcon">Out:</span>
                                                    <span>00:31</span>
                                                </div>
                                                <p class="textGray fs13 mb-0">
                                                    <i class="bx bx-user"></i>
                                                    Mrs Eleanor Margaret Vance
                                                </p>
                                            </div>
                                            <div>
                                                <p class="fs13"> <span class="font700 fas13">Purpose :</span> <span
                                                        class="textGray">Study matterial content searching</span> </p>
                                                <p class="textGray fs13">ther eis problem when i research</p>
                                                <div class="bg-orange-50 p-3 rounded8" style="width: 90%;">
                                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                                        <span class="font700 middleAlign">Follow-up required :
                                                        </span><span class="middleAlign"> Follow us for more detail</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- blue -->
                            <div class="p-4 rtcozCardInDe rounded8 bgWhite mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-4 w100">
                                        <div class="bgIconStaffT rounded50 careBadg">
                                            <i class="bx bx-group f20 blueText"></i>
                                        </div>
                                        <div class="flex1">
                                            <div class="d-flex justify-content-between align-items-center">

                                                <h6 class="h6Head mb-0">
                                                    John Milton
                                                </h6>
                                                <div class="d-flex gap-3">
                                                    <div>
                                                        <span class="careBadg">Visiters
                                                        </span>
                                                    </div>
                                                    <div class="planActions">
                                                        <button type="button" class="editRosterDailyLog ms-0">
                                                            <i class="bx bx-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <div class="planActions">

                                                        <button class="danger delete_rosterDailyLog ms-0">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="textGray fs13">
                                                He is the ceo of the company
                                            </p>

                                            <div class="d-flex gap-3 mb-3 align-items-center">
                                                <div class="inORoutTime">
                                                    <span><i class="bx bx-clock fs16"></i></span>
                                                    <span class="gayClrIcon">In:</span>
                                                    <span>11:31</span>
                                                    <span class="gayClrIcon"><i class="bx bx-arrow-right"></i></span>
                                                    <span class="gayClrIcon">Out:</span>
                                                    <span>00:31</span>
                                                </div>
                                                <p class="textGray fs13 mb-0">
                                                    <i class="bx bx-user"></i>
                                                    Mrs Eleanor Margaret Vance
                                                </p>
                                            </div>
                                            <div>
                                                <p class="fs13"> <span class="font700 fas13">Purpose :</span> <span
                                                        class="textGray">Study matterial content searching</span> </p>
                                                <p class="textGray fs13">ther eis problem when i research</p>
                                                <div class="bg-orange-50 p-3 rounded8" style="width: 90%;">
                                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                                        <span class="font700 middleAlign">Follow-up required :
                                                        </span><span class="middleAlign"> Follow us for more detail</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- cyan -->
                            <div class="p-4 rtcozCardInDe rounded8 bgWhite mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-4 w100">
                                        <div class="bgIconStaffT rounded50 cyanBadg">
                                            <i class="bx bx-pulse f20 cyanText"></i>
                                        </div>
                                        <div class="flex1">
                                            <div class="d-flex justify-content-between align-items-center">

                                                <h6 class="h6Head mb-0">
                                                    John Milton
                                                </h6>
                                                <div class="d-flex gap-3">
                                                    <div>
                                                        <span class="careBadg cyanBadg">Activity Outgoing
                                                        </span>
                                                    </div>
                                                    <div class="planActions">
                                                        <button type="button" class="editRosterDailyLog ms-0">
                                                            <i class="bx bx-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <div class="planActions">

                                                        <button class="danger delete_rosterDailyLog ms-0">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="textGray fs13">
                                                He is the ceo of the company
                                            </p>

                                            <div class="d-flex gap-3 mb-3 align-items-center">
                                                <div class="inORoutTime">
                                                    <span><i class="bx bx-clock fs16"></i></span>
                                                    <span class="gayClrIcon">Left:</span>
                                                    <span>11:31</span>
                                                    <span class="gayClrIcon"><i class="bx bx-arrow-right"></i></span>
                                                    <span class="gayClrIcon">Returned:</span>
                                                    <span>00:31</span>
                                                </div>

                                            </div>
                                            <div>
                                                <p class="fs13"> <span class="font700 fas13">Purpose :</span> <span
                                                        class="textGray">Study matterial content searching</span> </p>
                                                <p class="textGray fs13">ther eis problem when i research</p>
                                                <div class="bg-cyan-50 p-3 rounded8 mb-3" style="width: 90%;">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div>

                                                            <p class="textGray fs13 mb-0"><i class="bx bx-location fs16 me-1 cyanText"></i>India</p>
                                                        </div>
                                                        <div>
                                                            <p class="textGray fs13 mb-0"><i class="bx bx-car fs16  me-1 cyanText"></i>walking</p>

                                                        </div>
                                                        <div>
                                                            <span class="careBadg greenbadges">Risk Assessed</span>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="muteBg p-3 rounded8 mb-3" style="width: 90%;">
                                                    <p class="fs13 mb-0">
                                                        <span class="font700 middleAlign">Outcome:
                                                        </span><span class="middleAlign"> outing outcome</span>
                                                    </p>
                                                </div>
                                                <div class="bg-orange-50 p-3 rounded8" style="width: 90%;">
                                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                                        <span class="font700 middleAlign">Follow-up required :
                                                        </span><span class="middleAlign"> Follow us for more detail</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- red -->
                            <div class="p-4 rtcozCardInDe rounded8 bgWhite mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-4 w100">
                                        <div class="bgIconStaffT rounded50 redbadges">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stethoscope w-6 h-6">
                                                <path d="M11 2v2"></path>
                                                <path d="M5 2v2"></path>
                                                <path d="M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"></path>
                                                <path d="M8 15a6 6 0 0 0 12 0v-3"></path>
                                                <circle cx="20" cy="10" r="2"></circle>
                                            </svg>
                                        </div>
                                        <div class="flex1">
                                            <div class="d-flex justify-content-between align-items-center">

                                                <h6 class="h6Head mb-0">
                                                    John Milton
                                                </h6>
                                                <div class="d-flex gap-3">
                                                    <div>
                                                        <span class="careBadg redbadges">GP/Clinic </span>
                                                    </div>
                                                    <div class="planActions">
                                                        <button type="button" class="editRosterDailyLog ms-0">
                                                            <i class="bx bx-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <div class="planActions">

                                                        <button class="danger delete_rosterDailyLog ms-0">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="textGray fs13">
                                                He is the ceo of the company
                                            </p>

                                            <div class="d-flex gap-3 mb-3 align-items-center">
                                                <div class="inORoutTime">
                                                    <span><i class="bx bx-clock fs16"></i></span>
                                                    <span class="gayClrIcon">Left:</span>
                                                    <span>11:31</span>
                                                    <span class="gayClrIcon"><i class="bx bx-arrow-right"></i></span>
                                                    <span class="gayClrIcon">Returned:</span>
                                                    <span>00:31</span>
                                                </div>

                                            </div>
                                            <div>
                                                <p class="fs13"> <span class="font700 fas13">Purpose :</span> <span
                                                        class="textGray">Study matterial content searching</span> </p>
                                                <p class="textGray fs13">ther eis problem when i research</p>
                                                <div class="bg-cyan-50 p-3 rounded8 mb-3" style="width: 90%;">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div>

                                                            <p class="textGray fs13 mb-0"><i class="bx bx-location fs16 me-1 cyanText"></i>India</p>
                                                        </div>
                                                        <div>
                                                            <p class="textGray fs13 mb-0"><i class="bx bx-car fs16  me-1 cyanText"></i>walking</p>

                                                        </div>
                                                        <div>
                                                            <span class="careBadg greenbadges">Risk Assessed</span>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="muteBg p-3 rounded8 mb-3" style="width: 90%;">
                                                    <p class="fs13 mb-0">
                                                        <span class="font700 middleAlign">Outcome:
                                                        </span><span class="middleAlign"> outing outcome</span>
                                                    </p>
                                                </div>
                                                <div class="bg-orange-50 p-3 rounded8" style="width: 90%;">
                                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                                        <span class="font700 middleAlign">Follow-up required :
                                                        </span><span class="middleAlign"> Follow us for more detail</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- onsite -->
                            <div class="p-4 rtcozCardInDe rounded8 bgWhite mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-4 w100">
                                        <div class="bgIconStaffT rounded50 careBadg">
                                            <i class="bx bx-group f20 blueText"></i>
                                        </div>
                                        <div class="flex1">
                                            <div class="d-flex justify-content-between align-items-center">

                                                <h6 class="h6Head mb-0">
                                                    John Milton
                                                </h6>
                                                <div class="d-flex gap-3">
                                                    <div>
                                                        <span class="careBadg">Visiters
                                                        </span>
                                                    </div>
                                                    <div class="planActions">
                                                        <button type="button" class="editRosterDailyLog ms-0">
                                                            <i class="bx bx-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <div class="planActions">

                                                        <button class="danger delete_rosterDailyLog ms-0">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="textGray fs13">
                                                He is the ceo of the company
                                            </p>

                                            <div class="d-flex gap-3 mb-3 align-items-center  flexWrap">
                                                <div class="bg-green-70 rounded8 px-3 py-2" style="border: unset;">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div>
                                                            <span><i class="bx bx-clock darkGreenTextp"></i></span>
                                                            <span class="gayClrIcon">In:</span>
                                                            <span class="darkGreenTextp">11:31</span>
                                                        </div>
                                                        <div>
                                                            <span class="careBadg redDarkGreenAni">On Site
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <p class="textGray fs13 mb-0">
                                                    <i class="bx bx-user"></i>
                                                    Logan Jones
                                                </p>
                                            </div>
                                            <div>
                                                <p class="fs13"> <span class="font700 fas13">Purpose :</span> <span
                                                        class="textGray">Study matterial content searching</span> </p>
                                                <p class="textGray fs13">ther eis problem when i research</p>
                                                <div class="bg-orange-50 p-3 rounded8" style="width: 90%;">
                                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                                        <span class="font700 middleAlign">Follow-up required :
                                                        </span><span class="middleAlign"> Follow us for more detail</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--outing return time  -->
                            <div class="p-4 rtcozCardInDe rounded8 bgWhite mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-4 w100">
                                        <div class="bgIconStaffT  redbadges rounded50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stethoscope w-6 h-6">
                                                <path d="M11 2v2"></path>
                                                <path d="M5 2v2"></path>
                                                <path d="M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"></path>
                                                <path d="M8 15a6 6 0 0 0 12 0v-3"></path>
                                                <circle cx="20" cy="10" r="2"></circle>
                                            </svg>
                                        </div>
                                        <div class="flex1">
                                            <div class="d-flex justify-content-between align-items-center">

                                                <h6 class="h6Head mb-0">
                                                    John Milton
                                                </h6>
                                                <div class="d-flex gap-3">
                                                    <div>
                                                        <span class="careBadg redbadges"> GP/Clinic</span>
                                                    </div>
                                                    <div class="planActions">
                                                        <button type="button" class="editRosterDailyLog ms-0">
                                                            <i class="bx bx-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <div class="planActions">

                                                        <button class="danger delete_rosterDailyLog ms-0">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-3 mb-3 align-items-center  flexWrap">
                                                <div class="bg-yellow-70 rounded8 px-3 py-2" style="border: unset;">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div>
                                                            <span><i class="bx bx-clock darkOrangeTextp"></i></span>
                                                            <span class="gayClrIcon">Returned:</span>
                                                            <span class="darkOrangeTextp">11:31</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="bg-cyan-50 p-3 rounded8 mb-3" style="width: 90%;">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div>

                                                        <p class="textGray fs13 mb-0"><i class="bx bx-location fs16 me-1 cyanText"></i>India</p>
                                                    </div>
                                                    <div>
                                                        <p class="textGray fs13 mb-0"><i class="bx bx-car fs16  me-1 cyanText"></i>walking</p>

                                                    </div>
                                                    <div>
                                                        <span class="careBadg greenbadges">Risk Assessed</span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--  -->
                            <div class="p-4 rtcozCardInDe rounded8 bgWhite mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-4 w100">
                                        <div class="bgIconStaffT rounded50 redbadges">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stethoscope w-6 h-6">
                                                <path d="M11 2v2"></path>
                                                <path d="M5 2v2"></path>
                                                <path d="M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"></path>
                                                <path d="M8 15a6 6 0 0 0 12 0v-3"></path>
                                                <circle cx="20" cy="10" r="2"></circle>
                                            </svg>
                                        </div>
                                        <div class="flex1">
                                            <div class="d-flex justify-content-between align-items-center">

                                                <h6 class="h6Head mb-0">
                                                    John Milton
                                                </h6>
                                                <div class="d-flex gap-3">
                                                    <div>
                                                        <span class="careBadg redbadges">GP/Clinic </span>
                                                    </div>
                                                    <div class="planActions">
                                                        <button type="button" class="editRosterDailyLog ms-0">
                                                            <i class="bx bx-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <div class="planActions">

                                                        <button class="danger delete_rosterDailyLog ms-0">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="textGray fs13">
                                                He is the ceo of the company
                                            </p>

                                            <div class="d-flex gap-3 mb-3 align-items-center">
                                                <div class="bg-yellow-70 rounded8 px-3 py-2" style="border: unset;">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div>
                                                            <span><i class="bx bx-clock darkOrangeTextp"></i></span>
                                                            <span class="gayClrIcon">Returned:</span>
                                                            <span class="darkOrangeTextp">11:31</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div>
                                                <p class="fs13"> <span class="font700 fas13">Purpose :</span> <span class="textGray">Study matterial content searching</span> </p>
                                                <p class="textGray fs13">ther eis problem when i research</p>
                                                <div class="bg-cyan-50 p-3 rounded8 mb-3" style="width: 90%;">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div>

                                                            <p class="textGray fs13 mb-0"><i class="bx bx-location fs16 me-1 cyanText"></i>India</p>
                                                        </div>
                                                        <div>
                                                            <p class="textGray fs13 mb-0"><i class="bx bx-car fs16  me-1 cyanText"></i>walking</p>

                                                        </div>
                                                        <div>
                                                            <span class="careBadg greenbadges">Risk Assessed</span>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="muteBg p-3 rounded8 mb-3" style="width: 90%;">
                                                    <p class="fs13 mb-0">
                                                        <span class="font700 middleAlign">Outcome:
                                                        </span><span class="middleAlign"> outing outcome</span>
                                                    </p>
                                                </div>
                                                <div class="bg-orange-50 p-3 rounded8" style="width: 90%;">
                                                    <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle fs16"></i>
                                                        <span class="font700 middleAlign">Follow-up required :
                                                        </span><span class="middleAlign"> Follow us for more detail</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="visitorsPagination"></div>
                    </div>
                </div>
                <div class="content" id="dailyLogOutings">
                    <div class="leave-card addEntryDetails">
                        <div class="carePlanWrapper" id="renderOutingsHtmlData">

                        </div>
                        <div id="outingsPagination"></div>
                    </div>
                </div>
                <div class="content" id="dailyLogMedical">
                    <div class="leave-card addEntryDetails">
                        <div class="carePlanWrapper" id="renderMedicalHtmlData">

                        </div>
                        <div id="medicalsPagination"></div>
                    </div>
                </div>
                <div class="content" id="dailyLogFamily">
                    <div class="leave-card addEntryDetails">
                        <div class="carePlanWrapper" id="renderFamilyHtmlData">

                        </div>
                        <div id="familiesPagination"></div>
                    </div>
                </div>
            </div>
        </div>







    </div>












    <!-- AddFirstEntry -->

    <!-- add Carer Modal -->
    <div class="modal fade leaveCommunStyle" id="AddFirstEntry" tabindex="1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="logEntryModalTitle">Add Log Entry</h4>
                </div>
                <div class="modal-body approveLeaveModal">
                    <div class="carer-form">
                        <form id="dailyLogForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date</label>
                                    <input type="date" class="form-control" id="entry_date" name="date">
                                </div>
                                <div class="col-md-6">
                                    <label>Entry Type *</label>
                                    <div class="trendClass-select small" id="entryTypeDiv" tabindex="0">
                                        <span class="current" id="entry_type_id" name="entry_type_id">Select</span>
                                        <ul class="trendClass-list">
                                            @foreach($categorys as $category)
                                            <li class="trendClass-option" disabled>— {{ $category->category }} —</li>
                                            @foreach($category->subCategorys as $sub)
                                            <?php if ($sub->daily_cat_id == 2) {
                                                $outingForm = 1;
                                            } else {
                                                $outingForm = 0;
                                            } ?>
                                            <li class="trendClass-option {{$outingForm}}" data-value="{{ $sub->id }}"
                                                data-icon="{{ $sub->icon }}" data-color="{{ $sub->color }}" data-formtype="{{$outingForm}}">
                                                {{ $sub->sub_cat }}
                                            </li>
                                            @endforeach

                                            @endforeach
                                        </ul>
                                    </div>
                                    <input type="hidden" id="formCheck" value="0">
                                </div>
                                <!-- blue form -->
                                <div class="col-lg-12" style="display:none" id="blueForm">
                                    <div class="outgoingForm">
                                        <div class="bg-blue-50 blueDailyForm p-4 rounded8 m-t-10">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h6 class="h6Head darkBlueTextp">
                                                        Outing Details
                                                    </h6>

                                                </div>
                                                <div class="col-lg-12 m-t-10">
                                                    <label>Client *
                                                    </label>
                                                    <div class="trendClass-select small has-value" id="outingClientDiv">
                                                        <span class="current" id="outingClient" name="outingClient">Select client</span>
                                                        <ul class="trendClass-list">
                                                            @foreach($client as $clientVal1)
                                                            <li class="trendClass-option" data-value="{{$clientVal1->id}}">
                                                                {{$clientVal1->name}}
                                                            </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 m-t-5">
                                                    <label>Destination</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="e.g., Dr Smith's Surgery, ABC School, Town Centre" name="destination" id="destination">
                                                </div>
                                                <div class="col-lg-12 m-t-10">
                                                    <label>Transport </label>
                                                    <div class="trendClass-select small has-value">
                                                        <span class="current" id="transport_id" name="transport_id">
                                                            Select...
                                                        </span>
                                                        <ul class="trendClass-list">
                                                            <li class="trendClass-option" disabled="">- Select -</li>
                                                            <li class="trendClass-option" data-value="1">Walking</li>
                                                            <li class="trendClass-option" data-value="2">car</li>
                                                            <li class="trendClass-option" data-value="3">Taxi</li>
                                                            <li class="trendClass-option" data-value="4">Bus</li>
                                                            <li class="trendClass-option" data-value="5">Minibus</li>
                                                            <li class="trendClass-option" data-value="6">Wheelchair Transport</li>
                                                            <li class="trendClass-option" data-value="7">Ambulance</li>
                                                            <li class="trendClass-option" data-value="8">Other</li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 m-t-10">
                                                    <label>Accompanying Staff </label>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="scrollDailyCheck">
                                                        <div class="row">
                                                            @php $i=1; @endphp
                                                            @foreach($accompanying_staff as $staff)
                                                            <div class="col-lg-6 m-t-10">
                                                                <div class="addDailyCheck">
                                                                    <label for="acc{{$i}}">
                                                                        <input type="checkbox" id="acc{{$i}}" value="{{$staff->id}}" name="accompanyingstaff_id[]" class="accompanyingStaffCheckbox">
                                                                        {{$staff->name}}</label>
                                                                </div>
                                                            </div>
                                                            @php $i++; @endphp
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 m-t-10">
                                                    <div class="addDailyCheck">
                                                        <label for="risk1">
                                                            <input type="checkbox" id="risk1" name="risk_assessment" value="0">
                                                            <strong>Risk assessment completed for this
                                                                outing</strong></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12  m-t-10">
                                                    <label>Outing Outcome / Summary</label>
                                                    <textarea class="form-control" rows="3" cols="20"
                                                        placeholder="How did the outing go? Any issues or concerns?"
                                                        maxlength="1000" name="outing_summary" id="outing_summary"></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                            <div class="col-lg-6 m-t-10">
                                                <label for="">Departure Time (Left)</label>
                                                <input type="time" class="form-control">
                                            </div>
                                            <div class="col-lg-6 m-t-10">
                                                <label for="">Return Time (Back)</label>
                                                <input type="time" class="form-control">
                                            </div>
                                            <div class="col-lg-12 m-t-10">
                                                <label for="">Purpose of outing</label>
                                                <input type="text" class="form-control" placeholder="Reason for the outing">
                                            </div>
                                        </div> -->
                                </div>

                                <!-- blue form end-->
                                <div class="col-md-12 mt-5 showHideData">
                                    <label>Visitor Name *</label>
                                    <input type="text" id="visitor_name" name="visitor_name"
                                        class="form-control">
                                </div>
                                <div class="col-md-12  m-t-10 showHideData">
                                    <label>Organization / Company</label>
                                    <input type="text" id="org_company" name="org_company"
                                        class="form-control">
                                </div>
                                <div class="col-md-12  m-t-10 showHideData">
                                    <label>Related Client (optional)</label>
                                    <div class="trendClass-select small" id="clientDiv" tabindex="0">
                                        <span class="current" id="client_id" name="client_id">Select</span>
                                        <ul class="trendClass-list">
                                            @foreach($client as $clientVal)
                                            <li class="trendClass-option" data-value="{{$clientVal->id}}">
                                                {{$clientVal->name}}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6  m-t-10">
                                    <label id="timeTextInLabel">Arrival Time (In)</label>
                                    <input type="time" class="form-control" id="arrival_time" name="arrival_time">
                                </div>
                                <div class="col-md-6  m-t-10">
                                    <label id="timeTextOutLabel">Departure Time (Out)</label>
                                    <input type="time" class="form-control" id="departure_time" name="departure_time">
                                </div>
                                <div class="col-md-12  m-t-10">
                                    <label id="visitLabel">Purpose of Visit</label>
                                    <input type="text" class="form-control" id="purpose_visit" name="purpose_visit"
                                        placeholder="Reason for the visit">
                                </div>
                                <div class="col-md-12  m-t-10">
                                    <label>Notes</label>
                                    <textarea name="notes" id="notes" class="form-control" rows="5" cols="20"
                                        placeholder="Additional notes or observations" maxlength="1000"></textarea>
                                </div>
                            </div>

                            <div class="overtime followUpAction ">
                                <label>
                                    <input type="checkbox" name="available_for_overtime" id="available_for_overtime"
                                        value="0"> Follow-up action required
                                </label>
                                <div class="extraHours12 followUpDetails" style="display: none;">
                                    <label>Follow-up Details</label>
                                    <textarea name="follow_details" id="follow_details" class="form-control" rows="2"
                                        cols="20" placeholder="What needs to be done?" maxlength="1000"></textarea>
                                </div>
                            </div>

                            <div class="actions">
                                <input type="hidden" id="dailylog_id" name="id">
                                <button type="button" class="cancel" data-dismiss="modal"
                                    aria-hidden="true">Cancel</button>
                                <button type="button" class="submit submit_EntryData">Add Entry</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

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

    <script>
        let currentDate = new Date();
        const dayText = document.querySelector(".day-text");
        const fullDate = document.querySelector(".full-date");
        const dateInner = document.querySelector(".date-inner");
        const datePicker = document.querySelector(".date-picker");

        function formatDate(date) {
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const parts = date.toLocaleDateString('en-US', options).split(',');
            return {
                day: parts[0],
                full: parts.slice(1).join(',').trim()
            };
        }

        function updateDate(direction = "next") {
            dateInner.style.transform = direction === "next" ?
                "translateX(-100%)" :
                "translateX(100%)";
            dateInner.style.opacity = "0";

            setTimeout(() => {
                let new_date = currentDate.toLocaleDateString('en-CA');
                $(".searchDailyLog").val('');
                $('.dateSearch').val(new_date);
                loadDailyLogs(undefined, new_date);
                const formatted = formatDate(currentDate);
                console.log(formatted)
                dayText.textContent = formatted.day;
                fullDate.textContent = formatted.full;

                dateInner.style.transform = "translateX(0)";
                dateInner.style.opacity = "1";
            }, 300);
        }

        document.querySelector(".next-btn").addEventListener("click", () => {
            currentDate.setDate(currentDate.getDate() + 1);
            updateDate("next");
        });

        document.querySelector(".prev-btn").addEventListener("click", () => {
            currentDate.setDate(currentDate.getDate() - 1);
            updateDate("prev");
        });

        datePicker.addEventListener("change", function() {
            currentDate = new Date(this.value);
            updateDate();
        });
    </script>

    <script>
        document.querySelectorAll('.step-item').forEach((item, index) => {
            if (index === 1) {
                item.classList.add('active');
            }
        });
    </script>

    <!-- select js -->
    <script>
        document.querySelectorAll(".trendClass-select").forEach(select => {
            const current = select.querySelector(".current");
            const options = select.querySelectorAll(".trendClass-option");

            // 🔹 initial state (muted if Select)
            if (current.textContent.trim().toLowerCase() === "select") {
                select.classList.remove("has-value");
            }

            // Toggle dropdown
            select.addEventListener("click", e => {
                select.classList.toggle("open");
            });

            // Option click
            options.forEach(option => {
                option.addEventListener("click", e => {
                    e.stopPropagation();
                    // if (option.classList.contains("disabled")) return;
                    if (option.hasAttribute("disabled")) return;

                    options.forEach(o => o.classList.remove("selected"));
                    option.classList.add("selected");

                    current.innerHTML = option.innerHTML;
                    current.setAttribute('data-id', option.getAttribute('data-value'));
                    if (option.hasAttribute("data-formtype")) {
                        if (option.getAttribute('data-formtype') == 1) {
                            $("#blueForm").show();
                            $(".showHideData").hide();
                            $("#timeTextInLabel").text('Departure Time (Left)');
                            $("#timeTextOutLabel").text('Return Time (Back)');
                            $("#visitLabel").text('Purpose of Outing');
                            $("#formCheck").val(1);
                        } else {
                            $("#blueForm").hide();
                            $(".showHideData").show();
                            $("#timeTextInLabel").text('Arrival Time (In)');
                            $("#timeTextOutLabel").text('Departure Time (Out)');
                            $("#visitLabel").text('Purpose of Visit');
                            $("#formCheck").val(0);
                        }
                    }
                    if (current.textContent.trim().toLowerCase() === "select") {
                        select.classList.remove("has-value");
                    } else {
                        select.classList.add("has-value");
                    }

                    select.classList.remove("open");
                });
            });
        });
        document.addEventListener("click", e => {
            document.querySelectorAll(".trendClass-select.open").forEach(openSelect => {
                if (!openSelect.contains(e.target)) {
                    openSelect.classList.remove("open");
                }
            });
        });
    </script>

    <!-- select end -->
    <script>
        $(document).on('click', '#available_for_overtime', function() {
            if ($('#available_for_overtime').is(':checked')) {
                $('.followUpDetails').show();
                $('#available_for_overtime').val(1);
            } else {
                var dailylogid = $("#dailylog_id").val();
                $('.followUpDetails').hide();
                if (!dailylogid) {
                    $("#follow_details").val('');
                }
                $("#available_for_overtime").val(0);
            }
        });
        $(document).on('click', '.submit_EntryData', function(e) {
            e.preventDefault();
            let entry_type_id = $("#entry_type_id").attr('data-id');
            let transport_id = $("#transport_id").attr('data-id');
            var formCheck = $("#formCheck").val();
            var visitor_name = $("#visitor_name").val();
            var client_id = null;
            if (formCheck == 1) {
                client_id = $("#outingClient").attr('data-id');
            } else {
                client_id = $("#client_id").attr('data-id');
            }
            let dailylog_id = $("#dailylog_id").val();
            if (entry_type_id == '' || entry_type_id == undefined) {
                $("#entryTypeDiv").css('border', '1px solid red').focus();
                return false;
            } else if (client_id == '' || client_id == undefined && formCheck == 1) {
                $("#entryTypeDiv").css('border', '');
                $("#outingClientDiv").css('border', '1px solid red').focus();
                return false;
            } else if (visitor_name == '' && formCheck == 0) {
                $("#outingClientDiv").css('border', '');
                $("#entryTypeDiv").css('border', '');
                $("#visitor_name").css('border', '1px solid red').focus();
                return false;
            } else {
                $("#entryTypeDiv").css('border', '');
                $("#outingClientDiv").css('border', '');
                let form = $('#dailyLogForm')[0];
                let formData = new FormData(form);
                formData.append('entry_type_id', entry_type_id);
                if (client_id != undefined) {
                    formData.append('client_id', client_id);
                }
                if (transport_id != undefined) {
                    formData.append('transport_id', transport_id);
                }
                var rosterDailylog_id = $("#dailylog_id").val();
                var url = "{{ url('/roster/save-daily-log') }}";
                if (rosterDailylog_id) {
                    url = "{{ url('/roster/edit-daily-log') }}";
                }
                $(".submit_EntryData").attr('disabled', 'disabled');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        console.log(res);
                        if (typeof isAuthenticated === "function") {
                            if (isAuthenticated(res) == false) {
                                return false;
                            }
                        }
                        if (res.success == false) {
                            alert(res.errors);
                        } else if (res.success == true) {
                            location.reload();
                        } else {
                            alert("Something went wrong");
                        }
                    }
                });
            }
        });
        $(document).on('click', '.editRosterDailyLog', function() {
            $("#logEntryModalTitle").text("Edit Log Entry");
            $(".submit_EntryData").text("Edit Entry");
            $("#AddFirstEntry").modal("show");
            var id = $(this).data('id');
            var date = $(this).data('date');
            var visitor_name = $(this).data('visitor_name');
            var entry_type_id = $(this).data('entry_type_id');
            var org_company = $(this).data('org_company');
            var purpose_visit = $(this).data('purpose_visit');
            var client_id = $(this).data('client_id');
            var arrival_time = $(this).data('arrival_time');
            var departure_time = $(this).data('departure_time');
            var notes = $(this).data('notes');
            var available_for_overtime = $(this).data('available_for_overtime');
            var follow_details = $(this).data('follow_details');
            var is_outing = $(this).data('is_outing');
            var destination = $(this).data('destination');
            var transport_id = $(this).data('transport_id');
            var risk1 = $(this).data('risk_assessment');
            var outing_summary = $(this).data('outing_summary');
            $("#risk1").val(risk1);
            $("#formCheck").val(0);
            if (is_outing == 1) {
                $("#formCheck").val(1);
                $("input[name='accompanyingstaff_id[]']").prop('checked', false);
                let accStaffs = $(this).data('accompanying_staffs');

                if (accStaffs && accStaffs.length > 0) {
                    accStaffs.forEach(function(staffId) {
                        $("input[name='accompanyingstaff_id[]'][value='" + staffId + "']")
                            .prop('checked', true);
                    });
                }
                let outingClient = document.getElementById('outingClient');
                let outingclientList = outingClient.nextElementSibling;
                let outingclient_idElment = $("#outingClient");
                dropdownSelect(outingclientList, client_id, outingclient_idElment);

                let outingTransportId = document.getElementById('transport_id');
                let outingTransportList = outingTransportId.nextElementSibling;
                let outingTransportElment = $("#transport_id");
                dropdownSelect(outingTransportList, transport_id, outingTransportElment);
                $("#blueForm").show();
                $(".showHideData").hide();
                $("#timeTextInLabel").text('Departure Time (Left)');
                $("#timeTextOutLabel").text('Return Time (Back)');
                $("#visitLabel").text('Purpose of Outing');
                $("#destination").val(destination);
                $("#outing_summary").text(outing_summary);
                if (risk1 == 1) {
                    $("#risk1").prop('checked', true);
                } else {
                    $("#risk1").prop('checked', false);
                }
            } else {
                let relatedClient = document.getElementById('client_id');
                let clientList = relatedClient.nextElementSibling;
                let client_idElment = $("#client_id");
                dropdownSelect(clientList, client_id, client_idElment);
                $("#blueForm").hide();
                $(".showHideData").show();
                $("#timeTextInLabel").text('Arrival Time (In)');
                $("#timeTextOutLabel").text('Departure Time (Out)');
                $("#visitLabel").text('Purpose of Visit');
            }
            $("#dailylog_id").val(id);
            $("#entry_date").val(date);
            let entryType = document.getElementById('entry_type_id');
            let entryTypeList = entryType.nextElementSibling;
            var entry_type_idElement = $("#entry_type_id");
            dropdownSelect(entryTypeList, entry_type_id, entry_type_idElement);

            $("#visitor_name").val(visitor_name);
            $("#org_company").val(org_company);

            $("#arrival_time").val(arrival_time);
            $("#departure_time").val(departure_time);
            $("#purpose_visit").val(purpose_visit);
            $("#notes").val(notes);
            $("#available_for_overtime").val(available_for_overtime);
            if (available_for_overtime == 1) {
                $('.followUpDetails').show();
                $("#available_for_overtime").prop('checked', true);
            } else {
                $('.followUpDetails').hide();
                $("#available_for_overtime").prop('checked', false);
            }

            $("#follow_details").val(follow_details);

        });

        function dropdownSelect(list, selectedId, elementDiv) {
            list.querySelectorAll('.trendClass-option[data-value]').forEach(function(el) {
                if (el.dataset.value == selectedId) {
                    elementDiv.attr('data-id', selectedId)
                    elementDiv.text(el.innerText.trim());
                }
            });
        }
        // $('#entry_date').datepicker({
        //     format: 'dd-mm-yyyy'
        // });
        $(document).on('click', '.addFirstEntryModal', function() {
            $("#dailyLogForm")[0].reset();
            $("#entry_type_id").removeAttr('data-id').text("Select");
            $("#client_id").removeAttr('data-id').text("Select");
            $("#available_for_overtime").val(0).prop('checked', false);
            $(".followUpDetails").hide();
            $("#logEntryModalTitle").text("Add Log Entry");
            $(".submit_EntryData").text("Add Entry");
            let selected_date = $('.dateSearch').val();
            $("#entry_date").val(selected_date);
            $("#blueForm").hide();
            $(".showHideData").show();
            $("#timeTextInLabel").text('Arrival Time (In)');
            $("#timeTextOutLabel").text('Departure Time (Out)');
            $("#visitLabel").text('Purpose of Visit');
            $("#formCheck").val(0);
        });
        $(document).on('click', '.delete_rosterDailyLog', function() {
            if (confirm("Are you sure to delete?")) {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ url('/roster/daily-log-delete') }}",
                    type: "post",
                    data: {
                        id: id,
                        _token: "{{csrf_token()}}"
                    },
                    success: function(res) {
                        console.log(res);
                        if (typeof isAuthenticated === "function") {
                            if (isAuthenticated(res) == false) {
                                return false;
                            }
                        }
                        if (res.success == false) {
                            alert(res.errors);
                        } else {
                            location.reload();
                        }
                    }
                });
            }
        });
        $(document).on('keyup', '.searchDailyLog', function() {
            loadDailyLogs(undefined, undefined, $(this).val());
        });
        $(document).on('change', '.dateSearch', function() {
            $(".searchDailyLog").val('');
            loadDailyLogs(undefined, $(this).val());
        })
    </script>
    <script>
        $(document).ready(function() {
            let today = new Date().toISOString().split('T')[0];
            $(".dateSearch").val(today);
            // loadDailyLogs();
        });
        var old_date = '';
        var old_search = '';
        var old_tab = 0;

        function loadDailyLogs(pageUrl = '{{ url("/roster/daily-log-loadData") }}', date = null, search = null, tab = 1) {
            if (date) {
                old_date = date;
            }
            if (old_date) {
                date = old_date;
            }
            if (old_tab) {
                tab = old_tab;
            }
            // if(search){
            //     old_search = search;
            // }
            // if(old_search){
            //     search=old_search;
            // }
            $.ajax({
                url: pageUrl,
                type: "post",
                data: {
                    date: date,
                    search_dailyLog: search,
                    tab: tab,
                    _token: "{{csrf_token()}}"
                },
                success: function(res) {
                    console.log(res);
                    if (typeof isAuthenticated === "function") {
                        if (isAuthenticated(res) == false) {
                            return false;
                        }
                    }
                    if (res.success == false) {
                        alert(res.errors);
                    } else {
                        $("#total").text(res.total);
                        $("#visitorsCount").text(res.visitorsCount);
                        $("#outingsCount").text(res.outingsCount);
                        $("#followUpCount").text(res.followUpCount);
                        var allHtmlData = res.allHtmlData;
                        var visitorsHtmlData = res.visitorsHtmlData;
                        var outingsHtmlData = res.outingsHtmlData;
                        var medicalHtmlData = res.medicalHtmlData;
                        var falmilyHtmlData = res.falmilyHtmlData;
                        var no_data = `<div class="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="leave-card">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="leavebanktabCont blankdesign">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <i class="fa fa-calendar-o"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <h4>No entries for this day</h4>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <p>Record visitors, appointments, and other activities</p>                       
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <button class="btn allbuttonDarkClr addFirstEntryModal"  data-toggle="modal" data-target="#AddFirstEntry"><i class="bxdm  bx-plus"></i>  Add First Entry</button>                               
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>`;
                        if (allHtmlData.length == 0) {
                            $("#renderAllHtmlData").html(no_data);
                        } else {
                            $("#renderAllHtmlData").html(allHtmlData);
                            renderPagination('all', res.pagination.all_pagination);
                        }
                        if (visitorsHtmlData.length == 0) {
                            $("#renderVisitorHtmlData").html(no_data);
                        } else {
                            $("#renderVisitorHtmlData").html(visitorsHtmlData);
                            renderPagination('visitors', res.pagination.visitors_pagination);
                        }
                        if (outingsHtmlData.length == 0) {
                            $("#renderOutingsHtmlData").html(no_data);
                        } else {
                            $("#renderOutingsHtmlData").html(outingsHtmlData);
                            renderPagination('outings', res.pagination.outings_pagination);
                        }
                        if (medicalHtmlData.length == 0) {
                            $("#renderMedicalHtmlData").html(no_data);
                        } else {
                            $("#renderMedicalHtmlData").html(medicalHtmlData);
                            renderPagination('medicals', res.pagination.medical_pagination);
                        }
                        if (falmilyHtmlData.length == 0) {
                            $("#renderFamilyHtmlData").html(no_data);
                        } else {
                            $("#renderFamilyHtmlData").html(falmilyHtmlData);
                            renderPagination('families', res.pagination.family_pagination);
                        }

                    }
                }
            });
        }

        function renderPagination(tab, pagination) {
            var paginationControls = $("#" + tab + "Pagination");
            paginationControls.empty();
            if (pagination.prev_page_url) {
                paginationControls.append('<button class="profileDrop" onclick="loadDailyLogs( \'' + pagination.prev_page_url + '\')">Previous</button>');
            }
            if (pagination.next_page_url) {
                paginationControls.append('<button class="profileDrop" onclick="loadDailyLogs( \'' + pagination.next_page_url + '\')">Next</button>');
            }
        }

        $(document).on('change', '#risk1', function() {
            $(this).val(0);
            if ($(this).is(':checked')) {
                $(this).val(1);
            }
        });
        $(document).on('click', '.layoutTab', function() {
            $('.layoutTab').removeClass('activeClass');
            $(this).addClass('activeClass');
            let design = $(this).data('design');
            // code need to comment when it's on live -> from here to
            if (design == 1) {
                $("#dailyLogAllAddEntry").addClass('active');
                $("#dailyLogVisitors").removeClass('active');
            } else {
                $("#dailyLogAllAddEntry").removeClass('active');
                $("#dailyLogVisitors").addClass('active');
            }
            // here
            old_tab = design;
            // loadDailyLogs(undefined, undefined, undefined, old_tab);
        });
    </script>
    @endsection
</main>