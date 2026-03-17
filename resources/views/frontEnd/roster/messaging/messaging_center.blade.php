@extends('frontEnd.layouts.master')
@section('title','Messaging Center')
@section('content')

@include('frontEnd.roster.common.roster_header')


<main class="page-content">
    <div class="container-fluid">

        <div class="topHeaderCont">
            <div>
                <h1>Messaging Center</h1>
                <p class="header-subtitle">Send shift requests and bulk messages to your team</p>
            </div>
            <div class="header-actions addnewicons">
                <button class="bgBtn blueGradBtn" data-toggle="modal" data-target="#addBlukMessage"><i class="bx bx-send me-2 f18"></i> Bulk Message</button>
            </div>
        </div>



        <div class="rota_dashboard-cards simpleCard msgCardMain">
            <div class="rota_dash-card green p-4" style="border: 1px solid #ddd;">
                <div class="rota_dash-left">
                    <p class="rota_title"><i class="bx  bx-clock darkYellowText"></i> Pending Requests</p>
                    <h2 class="rota_count darkYellowText mt-3 mb-0">0</h2>
                </div>
            </div>

            <div class="rota_dash-card blue p-4" style="border: 1px solid #ddd;">
                <div class="rota_dash-left">
                    <p class="rota_title"><i class="bx bx-message-reply bx-remove-padding textBlueClr"></i> Unread Messages</p>
                    <h2 class="rota_count textBlueClr mt-3 mb-0">37</h2>
                </div>
            </div>

            <div class="rota_dash-card orangeClr p-4" style="border: 1px solid #ddd;">
                <div class="rota_dash-left">
                    <p class="rota_title"><i class="bx bx-group greenText"></i> Active Carers</p>
                    <h2 class="rota_count greenText mt-3 mb-0">36</h2>
                </div>
            </div>

        </div>



        <div class="calendarTabs leaveRequesttabs messagingCenterTabs m-t-20">
            <div class="tabs">
                <button class="tab active" data-tab="dailyLogAllAddEntry">
                    <i class="bx bx-calendar-week bx-remove-padding"></i> Shift Requests
                </button>
                <button class="tab" data-tab="dailyLogVisitors">
                    <i class="bx bx-message-reply bx-remove-padding"></i> Messages
                </button>
            </div>

            <div class="tab-content carertabcontent">
                <div class="content active" id="dailyLogAllAddEntry">
                    <div class="leave-card">
                        <div class="carePlanWrapper">
                            <div class="workHoursHeader">
                                <div class="title"> Shift Requests </div>
                            </div>
                            <div class="planCard borderleftPurple">
                                <div class="planTop">
                                    <div class="planTitle">
                                        DFVDF <span class="careBadg yellowBadges"> Pending</span>
                                    </div>
                                </div>
                                <div class="planMeta">
                                    <div class="aligniconMedication"><i class="bx bx-calendar-week"></i> Jan 6, 2026 at 18:28</div>
                                    <div class="aligniconMedication"><i class="bx bx-clock"></i> 09:00 - 17:00</div>
                                    <div class="aligniconMedication"><i class="bx  bx bx-group greenText"></i> 0/11 accepted</div>
                                </div>
                                <div class="witnessedBy witnessedByNotes">
                                    <span class="textGray500"><strong class="blackText">Notes:</strong> DSFDSFSAFSDF </span>
                                </div>
                                <div class="planFooter">
                                    <span class="textGray500 fs12">Frequency: DSF </span>
                                </div>
                            </div>
                            <div class="planCard borderleftPurple" style="border-color: #60a5fa;">
                                <div class="planTop">
                                    <div class="planTitle">
                                        DFVDF <span class="careBadg yellowBadges"> Pending</span>
                                    </div>
                                </div>
                                <div class="planMeta">
                                    <div class="aligniconMedication"><i class="bx bx-calendar-week"></i> Jan 6, 2026 at 18:28</div>
                                    <div class="aligniconMedication"><i class="bx bx-clock"></i> 09:00 - 17:00</div>
                                    <div class="aligniconMedication"><i class="bx  bx bx-group"></i> 0/11 accepted</div>
                                </div>

                                <div class="flexBw mt-3">
                                    <div class="planFooter">
                                        <span class="textGray500 fs12">Created Feb 25, 12:06 PM</span>
                                    </div>
                                    <div>

                                        <p class="fs12 orangeText mb-0">
                                            Expires Feb 26, 5:36 PM

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="planCard borderleftPurple" style="border-color: #60a5fa;">
                                <div class="planTop">
                                    <div class="planTitle">
                                        DFVDF <span class="careBadg yellowBadges"> Pending</span>
                                    </div>
                                </div>
                                <div class="planMeta">
                                    <div class="aligniconMedication"><i class="bx bx-calendar-week"></i> Jan 6, 2026 at 18:28</div>
                                    <div class="aligniconMedication"><i class="bx bx-clock"></i> 09:00 - 17:00</div>
                                    <div class="aligniconMedication"><i class="bx  bx bx-group"></i> 0/11 accepted</div>
                                </div>
                                <div class="witnessedBy witnessedByNotes">
                                    <span class="textGray500 fs13"> Can anyone cover this shift?

                                    </span>
                                </div>
                                <div class="flexBw mt-3">
                                    <div class="planFooter">
                                        <span class="textGray500 fs12">Created Feb 25, 12:06 PM</span>
                                    </div>
                                    <div>

                                        <p class="fs12 orangeText mb-0">
                                            Expires Feb 26, 5:36 PM

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="dailyLogVisitors">
                    <div class="leave-card">
                        <div class="workHoursHeader">
                            <div class="title"> Bulk Messages </div>
                        </div>
                        <div class="emergencyMain emergencyContent AllStaffTabC p-4 blueAllTabCard mt-4">
                            <div class="d-flex justify-content-between  align-items-center">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="carePlanWrapper">
                                        <div class="mb-2">
                                            <div class="planTop">
                                                <div class="planTitle">
                                                    Shift Request: Client on 2026-01-07
                                                    <div class="userMum">
                                                        <span class="title mt-0">
                                                            09 Feb 2026
                                                        </span>
                                                    </div>
                                                    <span class="careBadg highBadges ">High</span>
                                                </div>
                                            </div>
                                            <p class="muteText mt-3">Supervised by Michael Brown</p>
                                        </div>
                                        <div class="planFooter textGray500 mt-3">
                                            <span><i class="bx bx-group "></i> 5 objectives</span>
                                            <span><i class="bx bx-check-circle"></i> 0 tasks</span>
                                            <span class="textBlueClr"><i class="bx bx-check-circle"></i> 6 medications</span>
                                        </div>
                                        <p class="mt-3 textGray500 fs12">From m.carter • Dec 15, 4:32 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="emergencyMain emergencyContent AllStaffTabC p-4 blueAllTabCard mt-4">
                            <div class="d-flex justify-content-between  align-items-center">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="carePlanWrapper">
                                        <div class="mb-2">
                                            <div class="planTop">
                                                <div class="planTitle">
                                                    Shift Request: Client on 2026-01-07
                                                    <div class="userMum">
                                                        <span class="title mt-0">
                                                            09 Feb 2026
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="muteText mt-3">Supervised by Michael Brown</p>
                                        </div>
                                        <div class="planFooter textGray500 mt-3">
                                            <span><i class="bx bx-group "></i> 5 objectives</span>
                                            <span><i class="bx bx-check-circle"></i> 0 tasks</span>
                                            <span class="textBlueClr"><i class="bx bx-check-circle"></i> 6 medications</span>
                                        </div>
                                        <p class="mt-3 textGray500 fs12">From m.carter • Dec 15, 4:32 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="emergencyMain emergencyContent AllStaffTabC p-4 blueAllTabCard mt-4">
                            <div class="d-flex justify-content-between  align-items-center">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="carePlanWrapper">
                                        <div class="mb-2">
                                            <div class="planTop">
                                                <div class="planTitle">
                                                    Shift Request: Client on 2026-01-07
                                                    <div class="userMum">
                                                        <span class="title mt-0">
                                                            09 Feb 2026
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="muteText mt-3">Supervised by Michael Brown</p>
                                        </div>
                                        <div class="planFooter textGray500 mt-3">
                                            <span><i class="bx bx-group "></i> 5 objectives</span>
                                            <span><i class="bx bx-check-circle"></i> 0 tasks</span>
                                            <span class="textBlueClr"><i class="bx bx-check-circle"></i> 6 medications</span>
                                        </div>
                                        <p class="mt-3 textGray500 fs12">From m.carter • Dec 15, 4:32 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- add bulk Message -->
        <div class="modal fade leaveCommunStyle" id="addBlukMessage" tabindex="1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modalXl pModalScroll">
                <div class="modal-content">
                    <div class="modal-header p24">
                        <div class="flexBw">
                            <h4 class="modal-title">Bulk Message
                            </h4>
                            <button class="hoverBtn close" type="button" data-dismiss="modal" aria-hidden="true">Close</button>
                        </div>
                    </div>
                    <div class="modal-body heightScrollModal p24" style="height: unset;">
                        <div class="shadowp lightBorderp rounded8">
                            <header class="panel-heading headingCapitilize careTaskheader" style="padding: 24px;">
                                <div class="clientHeadung">
                                    <div class="onlyheadingmain fs15 font600 blackText"><i class="bx bx-group fs23"></i> Bulk Messaging </div>
                                </div>
                            </header>
                            <div class="p24">
                                <form action="">
                                    <div class="row">
                                        <div class="col-lg-8">

                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div>
                                                        <label for="">Subject </label>
                                                        <input type="text" class="form-control" placeholder="Enter message subject...">
                                                    </div>
                                                    <div class="mt-1">
                                                        <span class="fs12 textGray500 ">0/100 characters </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 m-t-10">
                                                    <div>
                                                        <label for="">Message</label>
                                                        <textarea name="notes" class="form-control" rows="3" cols="20" placeholder="Type your message here..."></textarea>
                                                    </div>

                                                    <div class="mt-1">
                                                        <span class="fs12 textGray500 ">0/100 characters </span>
                                                    </div>

                                                </div>
                                                <div class="col-lg-12 m-t-10">

                                                    <div class="d-flex">
                                                        <div class="flex1">
                                                            <label for="">Message Type </label>
                                                            <div class="priorityContainer">
                                                                <div class="dFlexGap gap-2">
                                                                    <div class="borderBtn priorityBtn" data-type="General">General</div>
                                                                    <div class="borderBtn priorityBtn" data-type="Announcement">Announcement</div>
                                                                    <div class="borderBtn priorityBtn" data-type="Urgent">Urgent</div>
                                                                    <div class="borderBtn priorityBtn" data-type="Reminder">Reminder</div>
                                                                    <div class="borderBtn priorityBtn" data-type="Update">Update</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex1">
                                                            <label for="">Priority</label>
                                                            <div class="priorityContainer">
                                                                <div class="dFlexGap gap-2">
                                                                    <div class="borderBtn priorityBtn" data-type="low">Low</div>
                                                                    <div class="borderBtn priorityBtn" data-type="normal">Normal</div>
                                                                    <div class="borderBtn priorityBtn" data-type="high">High</div>
                                                                    <div class="borderBtn priorityBtn" data-type="urgent">Urgent</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-4">
                                                    <label for="ack" class="fs13 dFlexGap textGray500">
                                                        <input type="checkbox" class="checkBoxHw" id="ack">
                                                        Require acknowledgment from recipients
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="flexBw align-items-center">
                                                <div>
                                                    <label class="recipientCount"> Recipients (0) </label>
                                                </div>
                                                <div>
                                                    <div class="dFlexGap">
                                                        <button class="hoverBtn allBtn" type="button">All</button>
                                                        <button class="hoverBtn clearBtn" type="button">Clear</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="calendarTabs checktab">
                                                <div class="tabs p-1 mb-4 tabCheckBtnParent">
                                                    <button class="tab active tabCheckBtn" data-tab="allTab" type="button">
                                                        All
                                                    </button>
                                                    <button class="tab tabCheckBtn" data-tab="activeTab" type="button">
                                                        Active
                                                    </button>
                                                    <button class="tab tabCheckBtn" data-tab="inactiveTab" type="button">
                                                        Inactive
                                                    </button>
                                                    <button class="tab tabCheckBtn" data-tab="leaveTab" type="button">
                                                        On Leave
                                                    </button>
                                                </div>

                                                <div class="tab-content carertabcontent tabContentCheck">
                                                    <!-- all tab -->
                                                    <div class="content contentCheck active" id="allTab">
                                                        <div class="lightBorderp rounded8 checkParent">
                                                            <div class="scrollBulkMsg">
                                                                <div class="">
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick Carter</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="hrLine my-0 " />
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick Carter</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="hrLine my-0 " />

                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick Carter</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="hrLine my-0 " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- active tab -->
                                                    <div class="content" id="activeTab">
                                                        <div class="lightBorderp rounded8 checkParent">
                                                            <div class="scrollBulkMsg">
                                                                <div class="">
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick Carter</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="hrLine my-0 " />
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick viswas</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="hrLine my-0 " />
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick Carter</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>

                                                                    <hr class="hrLine my-0 " />
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick Carter</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- inactive tab -->
                                                    <div class="content" id="inactiveTab">
                                                        <div class="lightBorderp rounded8 checkParent">
                                                            <div class="scrollBulkMsg">
                                                                <div class="">
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick Carter</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="hrLine my-0 " />
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick viswas</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- leave tab -->
                                                    <div class="content" id="leaveTab">
                                                        <div class="lightBorderp rounded8 checkParent">
                                                            <div class="scrollBulkMsg">
                                                                <div class="">
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick Carter</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="hrLine my-0 " />
                                                                    <div class="flexBw p-4 checkIBox" style="border: none;">
                                                                        <div>
                                                                            <div class="dFlexGap">
                                                                                <div>
                                                                                    <input type="checkbox" class="checkBoxHw checkuser">
                                                                                </div>
                                                                                <div>
                                                                                    <div class="circleBlue">M</div>
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="h6Head mb-1">Mick viswas</h6>
                                                                                    <p class="mb-0 fs12">active</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <i class="bx bx-check-circle fs23 blueText " style="display: none"></i>
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
                                    <hr class="hrLine">
                                    <div>
                                        <button class="bgBtn blueGradBtn w100">
                                            <i class="bx bx-send f20"></i> Send to 0 Recipient
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- manage document modal end -->
        </div>
        <!-- end add bulk message -->
    </div>

    <script>
        const containers = document.querySelectorAll('.priorityContainer');

        containers.forEach(container => {
            const buttons = container.querySelectorAll('.priorityBtn');

            buttons.forEach(btn => {
                btn.addEventListener('click', function() {
                    buttons.forEach(b => {
                        b.classList.remove(
                            'muteBadges',
                            'shiftBlueBadg',
                            'redBadges',
                            'yellowBadges',
                            'greenbadges',
                            'highBadges'
                        );
                    });
                    const type = this.dataset.type;
                    // Message Type colors
                    if (type === "General") this.classList.add("muteBadges");
                    if (type === "Announcement") this.classList.add("shiftBlueBadg");
                    if (type === "Urgent") this.classList.add("redBadges");
                    if (type === "Reminder") this.classList.add("yellowBadges");
                    if (type === "Update") this.classList.add("greenbadges");
                    // Priority colors
                    if (type === "low") this.classList.add("muteBadges");
                    if (type === "normal") this.classList.add("shiftBlueBadg");
                    if (type === "high") this.classList.add("highBadges");
                    if (type === "urgent") this.classList.add("redBadges");

                });
            });
        });
    </script>
    <!-- checkboxex -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const checkTab = document.querySelector(".checktab");
            if (!checkTab) return;

            const tabs = checkTab.querySelectorAll(".tabCheckBtn");
            const contents = checkTab.querySelectorAll(".tab-content .content");

            const allBtn = document.querySelector(".allBtn");
            const clearBtn = document.querySelector(".clearBtn");
            const recipientLabel = document.querySelector(".recipientCount");;

            let activeContent = checkTab.querySelector(".tab-content .content.active");

            function updateRecipientCount() {
                if (!recipientLabel) return;
                const checkedBoxes = checkTab.querySelectorAll(".checkuser:checked");
                recipientLabel.textContent = `Recipients (${checkedBoxes.length})`;
            }

            // ✅ TAB SWITCHING
            tabs.forEach(tab => {
                tab.addEventListener("click", () => {

                    tabs.forEach(t => t.classList.remove("active"));
                    contents.forEach(c => c.classList.remove("active"));

                    tab.classList.add("active");

                    const id = tab.dataset.tab;
                    activeContent = checkTab.querySelector("#" + id);

                    if (activeContent) activeContent.classList.add("active");

                });
            });

            // ✅ CHECKBOX CLICK (ROW + INPUT)
            checkTab.addEventListener("click", (e) => {

                const box = e.target.closest(".checkIBox");
                if (!box) return;

                const checkbox = box.querySelector(".checkuser");
                const icon = box.querySelector(".bx-check-circle");

                if (!checkbox) return;

                if (e.target === checkbox) {
                    box.classList.toggle("active", checkbox.checked);
                    box.classList.add("bg-blue-50", checkbox.checked);
                } else {
                    checkbox.checked = !checkbox.checked;
                    box.classList.toggle("active", checkbox.checked);
                    box.classList.remove("bg-blue-50", checkbox.checked);
                }
                box.classList.toggle("bg-blue-50", checkbox.checked);
                if (icon) icon.style.display = checkbox.checked ? "block" : "none";

                updateRecipientCount();
            });

            //  all select and clear according to tab
            // if (allBtn) {
            //     allBtn.addEventListener("click", () => {

            //         if (!activeContent) return;

            //         activeContent.querySelectorAll(".checkIBox").forEach(box => {
            //             const checkbox = box.querySelector(".checkuser");
            //             const icon = box.querySelector(".bx-check-circle");

            //             if (checkbox) checkbox.checked = true;
            //             box.classList.add("active");
            //             if (icon) icon.style.display = "block";
            //         });

            //         updateRecipientCount();
            //     });
            // }

            // if (clearBtn) {
            //     clearBtn.addEventListener("click", () => {

            //         if (!activeContent) return;

            //         activeContent.querySelectorAll(".checkIBox").forEach(box => {
            //             const checkbox = box.querySelector(".checkuser");
            //             const icon = box.querySelector(".bx-check-circle");

            //             if (checkbox) checkbox.checked = false;
            //             box.classList.remove("active");
            //             if (icon) icon.style.display = "none";
            //         });

            //         updateRecipientCount();
            //     });
            // }
            // not acc to tab

            // all clear without tab
            if (allBtn) {
                allBtn.addEventListener("click", () => {

                    checkTab.querySelectorAll(".checkIBox").forEach(box => {

                        const checkbox = box.querySelector(".checkuser");
                        const icon = box.querySelector(".bx-check-circle");

                        if (checkbox) checkbox.checked = true;

                        box.classList.add("active");
                        box.classList.add("bg-blue-50");

                        if (icon) icon.style.display = "block";
                    });

                    updateRecipientCount();
                });
            }

            if (clearBtn) {
                clearBtn.addEventListener("click", () => {

                    checkTab.querySelectorAll(".checkIBox").forEach(box => {

                        const checkbox = box.querySelector(".checkuser");
                        const icon = box.querySelector(".bx-check-circle");

                        if (checkbox) checkbox.checked = false;

                        box.classList.remove("active");
                        box.classList.remove("bg-blue-50");

                        if (icon) icon.style.display = "none";
                    });

                    updateRecipientCount();
                });
            }
            updateRecipientCount();

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tabContainer = document.querySelector(".leaveRequesttabs");
            if (!tabContainer) return;

            const tabs = tabContainer.querySelectorAll(".tab");
            const contents = tabContainer.querySelectorAll(".tab-content .content");

            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    // Remove active class from all tabs and contents
                    tabs.forEach(t => t.classList.remove("active"));
                    contents.forEach(c => c.classList.remove("active"));

                    // Activate clicked tab and corresponding content
                    tab.classList.add("active");
                    const targetId = tab.dataset.tab;
                    const targetContent = tabContainer.querySelector(`#${targetId}`);
                    if (targetContent) targetContent.classList.add("active");
                });
            });
        });
    </script>
    @endsection
</main>