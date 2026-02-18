@extends('frontEnd.layouts.master')
@section('title','Manage Dashboard')
@section('content')


@include('frontEnd.roster.common.roster_header')


<main class="page-content">
    <div class="container-fluid">

        <div class="topHeaderCont">
            <div>
                <h1>Manager Dashboard</h1>
                <p class="header-subtitle">Operational overview and key metrics</p>
            </div>
            <div class="header-actions">
                <button class="btn allBtnUseColor">📊 Export</button>
                <button class="btn">⚙️ Customize</button>
            </div>
        </div>

        <div class="rota_dashboard-cards simpleCard">

            <div class="rota_dash-card blue">
                <div class="rota_dash-left">
                    <p class="rota_title">Active Carers</p>
                    <h2 class="rota_count">11</h2>
                </div>
                <div class="rota_dash-icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>

            <div class="rota_dash-card green">
                <div class="rota_dash-left">
                    <p class="rota_title">Active Clients</p>
                    <h2 class="rota_count">9</h2>
                </div>
                <div class="rota_dash-icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>

            <div class="rota_dash-card purple">
                <div class="rota_dash-left">
                    <p class="rota_title">Today's Shifts</p>
                    <h2 class="rota_count">3</h2>
                </div>
                <div class="rota_dash-icon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>

            <div class="rota_dash-card orangeClr">
                <div class="rota_dash-left">
                    <p class="rota_title">Unfilled Shifts</p>
                    <h2 class="rota_count">307</h2>
                </div>
                <div class="rota_dash-icon">
                    <i class="fa fa-exclamation-circle"></i>
                </div>
            </div>

        </div>

        <!-- Alerts  by arjun-->
        <!-- 
        <div class="sectionWhiteBgAllUse">
            <div class="section-header">
                <h2 class="section-title">System Alerts</h2>
            </div>

            <div class="rota_alerts m-b-0">
                <div class="rota_alert">
                    <div class="rota_alert-icon"><i class="fa fa-bell-o"></i></div>
                    <div class="rota_alert-content">
                        <div class="rota_alert-title">Mixed Shift - 09:30</div>
                        <div class="rota_alert-description">Ron contacted for PDA one can I have contact No one assigned</div>
                        <div class="rota_alert-bottmDescription"> <i class="fa fa-bolt"></i> Contact care immediately and verify shift status</div>
                    </div>
                    <div class="rota_alert-badge">High</div>
                </div>

                <div class="rota_alert">
                    <div class="rota_alert-icon"><i class="fa fa-bell-o"></i></div>
                    <div class="rota_alert-content">
                        <div class="rota_alert-title">Mixed Shift</div>
                        <div class="rota_alert-description">Ron contacted for PDA one can I have contact No one assigned</div>
                        <div class="rota_alert-bottmDescription"> <i class="fa fa-bolt"></i> Contact care immediately and verify shift status</div>
                    </div>
                    <div class="rota_alert-badge">High</div>
                </div>

                <div class="rota_alert">
                    <div class="rota_alert-icon"><i class="fa fa-bell-o"></i></div>
                    <div class="rota_alert-content">
                        <div class="rota_alert-title">Unfilled Shift in Next 24 Hours</div>
                        <div class="rota_alert-description">May 12, 2025: 16:30 at All or Care Home assigned care! Check Margaret Smith</div>
                        <div class="rota_alert-bottmDescription"> <i class="fa fa-bolt"></i> Assign a qualified carer to this shift urgently</div>
                    </div>
                    <div class="rota_alert-badge">High</div>
                </div>

                <div class="rota_alert">
                    <div class="rota_alert-icon"><i class="fa fa-bell-o"></i></div>
                    <div class="rota_alert-content">
                        <div class="rota_alert-title">Mixed Shift</div>
                        <div class="rota_alert-description">Ron contacted for PDA one can I have contact No one assigned</div>
                        <div class="rota_alert-bottmDescription"> <i class="fa fa-bolt"></i> Contact care immediately and verify shift status</div>
                    </div>
                    <div class="rota_alert-badge">High</div>
                </div>

                <div class="rota_alert">
                    <div class="rota_alert-icon"><i class="fa fa-bell-o"></i></div>
                    <div class="rota_alert-content">
                        <div class="rota_alert-title">Unfilled Shift in Next 24 Hours</div>
                        <div class="rota_alert-description">May 12, 2025: 16:30 at All or Care Home assigned care! Check Margaret Smith</div>
                        <div class="rota_alert-bottmDescription"> <i class="fa fa-bolt"></i> Assign a qualified carer to this shift urgently</div>
                    </div>
                    <div class="rota_alert-badge">High</div>
                </div>

                <div class="rota_view-all m-b-0">+ 15 More Alert →</div>
            </div>
        </div> -->
        <!-- system allert start -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="emergencyMain">
                    <div id="emergencyAller" class="notificationSysAllert">
                        <div class="emergencyHeader">
                            <div class="emeregencyParent">
                                <div class="emergencyContent">
                                    <div class="gap-3 d-flex align-items-center radIconClr">
                                        <i class="bx bx-alert-triangle f20 me-2"></i>
                                        <h5 class="h5Head mb-0">System Alerts </h5>
                                        <div>
                                            <span class="careBadg redDarkBadges">9 Active</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="emergencyBtn">
                                    <div class="addDailyCheck">
                                        <label for="selectAll" class="lightBorderp fs13 py-2">
                                            <input type="checkbox" id="selectAll">
                                            Select All</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <!-- blue suggestation -->
                            <div class="bg-blue-50 p-3  rounded8 mb-3" id="actionBox" style="display:none">
                                <div class="d-flex justify-content-between flexWrap ">
                                    <div class="fs13">
                                        <p class="mb-2 darkBlueTextp  font600"> 9 selected </p>
                                        <p class="mb-0 blueText ">Critical & safeguarding/medication/allergy alerts require individual review</p>
                                    </div>
                                    <div>
                                        <div class="d-flex flexWrap gap-2 align-items-center">
                                            <div class="userMum">
                                                <span class="title mt-0 bgWhite50"><i class="bx bx-check-circle f18 me-2"></i> Acknowledge</span>
                                            </div>
                                            <div>
                                                <span class="careBadg darkGreenBadges">Resolve (9)</span>
                                            </div>
                                            <div>
                                                <i class='bx bx-x-circle f18 ms-2'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- High orange part start -->
                            <div class="bg-orange-50 rounded8 p-3 manageDSysAlrt">
                                <div class="d-flex gap-3">
                                    <div>
                                        <div>
                                            <div class="d-flex gap-3">
                                                <div class="pt-1">
                                                    <input class="checkBoxHW trans alertCheck" type="checkbox">
                                                </div>
                                                <div>
                                                    <i class="bx bx-bell f18 orangeText"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w100">
                                        <div class="d-flex justify-content-between mb-2">

                                            <p class="font600 darkOrangeTextp fs13 mb-0">Missed Shift - 09:00</p>

                                            <div>
                                                <span class="careBadg darkOrangeBadg">High</span>
                                            </div>
                                        </div>
                                        <div class="darkOrangeTextp fs12 w100">
                                            <p class="mb-2 fs12">Shift scheduled for 09:00 has not been started. No carer assigned</p>
                                            <div class="p-2 bgWhite50 rounded8 mb-2">
                                                <p class="fs12 blackText mb-0 font600"> ⚡ Contact carer immediately and verify shift status</p>
                                            </div>
                                            <p class="mb-2 textGray verticalCenter"> <i class="bx bx-clock  me-1"></i>Feb 6, 11:11</p>

                                            <div class="dFlexGap">
                                                <div class="userMum ">
                                                    <span class="title bgWhite50 hoverBg mt-0 "><i class="bx bx-check-circle f18 me-2"></i>Acknowledge</span>
                                                </div>
                                                <div class="userMum ">
                                                    <span class="title bgWhite50 mt-0 hoverBg"><i class="bx bx-x f18 me-2"></i> Resolve</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- acknowledge button -->
                            <div class="bg-orange-50 rounded8 p-3 manageDSysAlrt">
                                <div class="d-flex gap-3">
                                    <div>
                                        <div>
                                            <div class="d-flex gap-3">
                                                <div class="pt-1">
                                                    <input class="checkBoxHW trans alertCheck" type="checkbox">
                                                </div>
                                                <div>
                                                    <i class="bx bx-bell f18 orangeText"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w100">
                                        <div class="d-flex justify-content-between mb-2">

                                            <p class="font600 darkOrangeTextp fs13 mb-0">Missed Shift - 09:00</p>

                                            <div>
                                                <span class="careBadg darkOrangeBadg">High</span>
                                            </div>
                                        </div>
                                        <div class="darkOrangeTextp fs12 w100">
                                            <p class="mb-2 fs12">Shift scheduled for 09:00 has not been started. No carer assigned</p>
                                            <div class="p-2 bgWhite50 rounded8 mb-2">
                                                <p class="fs12 blackText mb-0 font600"> ⚡ Contact carer immediately and verify shift status</p>
                                            </div>
                                            <p class="mb-2 textGray verticalCenter"> <i class="bx bx-clock  me-1"></i>Feb 6, 11:11</p>
                                            <p class="darkGreenTextp verticalCenter  mb-2"> <i class="bx bx-check-circle  me-1"></i>Acknowledged
                                            </p>
                                            <div class="userMum">
                                                <span class="title bgWhite50 mt-0 hoverBg"><i class="bx bx-x fs16 me-2"></i> Resolve</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- medium card yellow part-->
                            <div class="bg-yellow-50 rounded8 p-3 manageDSysAlrt">
                                <div class="d-flex gap-3">
                                    <div>
                                        <div>
                                            <div class="d-flex gap-3">
                                                <div class="pt-1">
                                                    <input class="checkBoxHW trans alertCheck" type="checkbox">
                                                </div>
                                                <div>
                                                    <i class="bx bx-alert-circle f18 yellowText"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w100">
                                        <div class="d-flex justify-content-between mb-2">
                                            <p class="font600 darkOrangeTextp fs13 mb-0">Missed Shift - 09:00</p>
                                            <div>
                                                <span class="careBadg darkYellowBadg">Medium</span>
                                            </div>
                                        </div>
                                        <div class="darkOrangeTextp fs12 w100">
                                            <p class="mb-2 fs12">Shift scheduled for 09:00 has not been started. No carer assigned</p>
                                            <div class="p-2 bgWhite50 rounded8 mb-2">
                                                <p class="fs12 blackText mb-0 font600"> ⚡ Contact carer immediately and verify shift status</p>
                                            </div>
                                            <p class="mb-2 textGray verticalCenter"> <i class="bx bx-clock  me-1"></i>Feb 6, 11:11</p>
                                            <p class="darkGreenTextp verticalCenter  mb-2"> <i class="bx bx-check-circle  me-1"></i>Acknowledged
                                            </p>
                                            <div class="userMum">
                                                <span class="title bgWhite50 mt-0"><i class="bx bx-x fs16 me-2"></i> Resolve</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- critical card red part-->
                            <div class="bg-red-50 rounded8 p-3 manageDSysAlrt">
                                <div class="d-flex gap-3">
                                    <div>
                                        <div>
                                            <div class="d-flex gap-3">
                                                <div class="pt-1">
                                                    <input class="checkBoxHW trans alertCheck" type="checkbox">
                                                </div>
                                                <div>
                                                    <i class="bx bx-pill f18 redText"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w100">
                                        <div class="d-flex justify-content-between mb-2">
                                            <p class="font600 darkRedText fs13 mb-0">Missed Shift - 09:00</p>
                                            <div>
                                                <span class="careBadg redDarkBadges">Critical</span>
                                            </div>
                                        </div>
                                        <div class="fs12 w100">
                                            <p class="mb-2 fs12 darkRedText">Shift scheduled for 09:00 has not been started. No carer assigned</p>
                                            <div class="p-2 bgWhite50 rounded8 mb-2">
                                                <p class="fs12 blackText mb-0 font600"> ⚡ Contact carer immediately and verify shift status</p>
                                            </div>
                                            <div class="m-t-10 mb10">
                                                <span class="careBadg yellowBorderLight yellowHoverUnset">
                                                    Requires Individual Review
                                                </span>
                                            </div>
                                            <p class="mb-2 textGray verticalCenter"> <i class="bx bx-clock  me-1"></i>Feb 6, 11:11</p>

                                            <div class="dFlexGap">
                                                <div class="userMum ">
                                                    <span class="title bgWhite50 hoverBg mt-0 "><i class="bx bx-check-circle f18 me-2"></i>Acknowledge</span>
                                                </div>
                                                <div class="userMum ">
                                                    <span class="title bgWhite50 mt-0 hoverBg"><i class="bx bx-x f18 me-2"></i> Resolve</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- low card blue part-->
                            <div class="bg-blue-50 rounded8 p-3 manageDSysAlrt">
                                <div class="d-flex gap-3">
                                    <div>
                                        <div>
                                            <div class="d-flex gap-3">
                                                <div class="pt-1">
                                                    <input class="checkBoxHW trans alertCheck" type="checkbox">
                                                </div>
                                                <div>
                                                    <i class="bx bx-alert-circle f18 blueText"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w100">
                                        <div class="d-flex justify-content-between mb-2">
                                            <p class="font600 darkBlueTextp fs13 mb-0">Missed Shift - 09:00</p>
                                            <div>
                                                <span class="careBadg darkBlueBadg">Low</span>
                                            </div>
                                        </div>
                                        <div class=" fs12 w100">
                                            <p class="mb-2 fs12 darkBlueTextp">Shift scheduled for 09:00 has not been started. No carer assigned</p>
                                            <div class="p-2 bgWhite50 rounded8 mb-2">
                                                <p class="fs12 blackText mb-0 font600"> ⚡ Contact carer immediately and verify shift status</p>
                                            </div>

                                            <p class="mb-2 textGray verticalCenter"> <i class="bx bx-clock  me-1"></i>Feb 6, 11:11</p>

                                            <div class="dFlexGap">
                                                <div class="userMum ">
                                                    <span class="title bgWhite50 hoverBg mt-0 "><i class="bx bx-check-circle f18 me-2"></i>Acknowledge</span>
                                                </div>
                                                <div class="userMum ">
                                                    <span class="title bgWhite50 mt-0 hoverBg"><i class="bx bx-x f18 me-2"></i> Resolve</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <span class="textGray fs12">+ 4 more allerts</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- system alert end -->
        <div class="row">
            <div class="col-md-6">
                <!-- green staff shift header card -->
                <div class="panel mdashCardMain rounded8">
                    <header class="panel-heading headingCapitilize lightGreenGradient"> <i class="bx bx-group greenTextp f20"></i> Staff &amp; Shifts</header>
                    <div class="panel-body">
                        <div class="staffShifts">
                            <div class="todayNumber">
                                <p class="fs12">Today's Shifts</p>
                                <h3>3</h3>
                            </div>
                            <div class="fillPersent">
                                <p class="fs12">Fill Rate</p>
                                <h3 class="text-green font">33.3%</h3>
                            </div>
                        </div>
                        <div class="staffShifts_alert-box p-3">
                            <div class="staffShifts_alert-icon">⚠</div>
                            <div class="staffShifts_alert-content">
                                <p class="staffShifts_alert-title">300 Unfilled Shifts</p>
                                <p class="staffShifts_alert-subtitle">Needs attention</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#!" class="borderBtn"><i class="fa fa-calendar-o f18 me-2"></i> Full view Schedule</a>
                        </div>
                    </div>
                </div>
                <!--red incident and safety -->
                <div class="panel mdashCardMain rounded8">
                    <header class="panel-heading headingCapitilize lightredGradient"> <i class="bx bx-shield f20 redtext"></i> Incidents &amp; Safety</header>
                    <div class="panel-body">
                        <div class="staffShifts">
                            <div class="todayNumber">
                                <p>This Month</p>
                                <h3>3</h3>
                            </div>
                            <div class="fillPersent">
                                <p>Unresolved</p>
                                <h3 class="text-orange">1</h3>
                            </div>
                        </div>
                        <div class="bg-red-50 p-3  rounded8 ">
                            <div class="d-flex gap-4 align-items-center">
                                <i class="bx  bx-alert-triangle f18 darkRedText"></i>
                                <div>
                                    <h6 class="fs13 font700 darkRedText mb-1 mt-0"> 8 Critical Incidents </h6>
                                    <p class="mb-0 fs13 darkRedText">Needs review</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#!" class="borderBtn"><i class="bx bx-shield f18 me-2"></i> View All Incidents</a>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="panel">
                    <header class="panel-heading headingCapitilize" style="background-color: #eef2ff;"> <i class="fa fa-warning (alias)"></i> Incidents &amp; Safety</header>
                    <div class="panel-body">
                        <div class="staffShifts">
                            <div class="todayNumber">
                                <p>This Month</p>
                                <h3>3</h3>
                            </div>
                            <div class="fillPersent">
                                <p>Unresolved</p>
                                <h3 class="text-orange">1</h3>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#!" class="profileDrop profileDropNobgcolor d-block"><i class="fa fa-info-circle"></i> View All Incidents</a>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <header class="panel-heading headingCapitilize" style="background-color: #fdf2f8;"> <i class="fa fa-home"></i> Occupancy &amp; Capacity</header>
                    <div class="panel-body">

                        <div class="occupancyBox">
                            <div class="topRow">
                                <span>Current Occupancy</span>
                                <span class="value">8/50</span>
                            </div>

                            <div class="progressBar">
                                <div class="progressFill" style="width:16%;"></div>
                            </div>
                        </div>
                        <div class="staffShifts">
                            <div class="todayNumber">
                                <p>Occupancy Rate</p>
                                <h3>66.0%</h3>
                            </div>
                            <div class="fillPersent">
                                <p>Planned Admissions</p>
                                <h3>3</h3>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#!" class="profileDrop profileDropNobgcolor d-block"><i class="fa fa-info-circle"></i> Manage client information</a>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <header class="panel-heading headingCapitilize" style="background-color: #fefce8;"> <i class="fa fa-book"></i> Training Compliance</header>
                    <div class="panel-body">
                        <div class="occupancyBox">
                            <div class="topRow">
                                <span>Completion Rate</span>
                                <span class="value">0.0%</span>
                            </div>

                            <div class="progressBar">
                                <div class="progressFill" style="width:0%;"></div>
                            </div>
                        </div>
                        <div class="staffShifts">
                            <div class="todayNumber">
                                <p>Expiring Soon</p>
                                <h3 class="text-orange">3</h3>
                            </div>
                            <div class="fillPersent">
                                <p>Overdue</p>
                                <h3 class="text-orange">33.3%</h3>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#!" class="profileDrop profileDropNobgcolor d-block"><i class="fa fa-info-circle"></i> View Training</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="panel">
                    <header class="panel-heading headingCapitilize" style="background-color: #eef2ff;"> <i class="fa fa-warning (alias)"></i> Incidents &amp; Safety</header>
                    <div class="panel-body">
                        <div class="staffShifts">
                            <div class="todayNumber">
                                <p>This Month</p>
                                <h3>3</h3>
                            </div>
                            <div class="fillPersent">
                                <p>Unresolved</p>
                                <h3 class="text-orange">1</h3>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#!" class="profileDrop profileDropNobgcolor d-block"><i class="fa fa-info-circle"></i> View All Incidents</a>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <header class="panel-heading headingCapitilize" style="background-color: #fdf2f8;"> <i class="fa fa-home"></i> Occupancy &amp; Capacity</header>
                    <div class="panel-body">

                        <div class="occupancyBox">
                            <div class="topRow">
                                <span>Current Occupancy</span>
                                <span class="value">8/50</span>
                            </div>

                            <div class="progressBar">
                                <div class="progressFill" style="width:16%;"></div>
                            </div>
                        </div>
                        <div class="staffShifts">
                            <div class="todayNumber">
                                <p>Occupancy Rate</p>
                                <h3>66.0%</h3>
                            </div>
                            <div class="fillPersent">
                                <p>Planned Admissions</p>
                                <h3>3</h3>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#!" class="profileDrop profileDropNobgcolor d-block"><i class="fa fa-info-circle"></i> Manage client information</a>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <header class="panel-heading headingCapitilize" style="background-color: #fefce8;"> <i class="fa fa-book"></i> Training Compliance</header>
                    <div class="panel-body">
                        <div class="occupancyBox">
                            <div class="topRow">
                                <span>Completion Rate</span>
                                <span class="value">0.0%</span>
                            </div>

                            <div class="progressBar">
                                <div class="progressFill" style="width:0%;"></div>
                            </div>
                        </div>
                        <div class="staffShifts">
                            <div class="todayNumber">
                                <p>Expiring Soon</p>
                                <h3 class="text-orange">3</h3>
                            </div>
                            <div class="fillPersent">
                                <p>Overdue</p>
                                <h3 class="text-orange">33.3%</h3>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#!" class="profileDrop profileDropNobgcolor d-block"><i class="fa fa-info-circle"></i> View Training</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- for checkbox css -->
    <script>
        const selectAll = document.getElementById('selectAll');
        const actionBox = document.getElementById('actionBox');
        const checks = document.querySelectorAll('.alertCheck');

        function updateSytemAlert() {
            const count = document.querySelectorAll('.alertCheck:checked').length;
            actionBox.style.display = count > 0 ? 'block' : 'none';
        }

        selectAll.addEventListener('change', function() {
            checks.forEach(cb => cb.checked = this.checked);
            updateSytemAlert();
        });

        checks.forEach(cb => {
            cb.addEventListener('change', function() {
                const total = checks.length;
                const checked = document.querySelectorAll('.alertCheck:checked').length;
                selectAll.checked = total === checked;
                updateSytemAlert();
            });
        });
    </script>
    @endsection
</main>

</div><!-- page-wrapper No remove this div-->