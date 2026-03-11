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
                <button class="btn allBtnUseColor" data-toggle="modal" data-target="#AddFirstEntry"><i class="bx bx-send"></i> Bulk Message</button>
            </div>
        </div>



        <div class="rota_dashboard-cards simpleCard">
            <div class="rota_dash-card green">
                <div class="rota_dash-left">
                    <p class="rota_title"><i class="bx  bx-clock darkOrangeTextp"></i> Pending Requests</p>
                    <h2 class="rota_count darkOrangeTextp">0</h2>
                </div>
            </div>

            <div class="rota_dash-card blue">
                <div class="rota_dash-left">
                    <p class="rota_title"><i class="bx bx-message-reply bx-remove-padding textBlueClr"></i> Unread Messages</p>
                    <h2 class="rota_count textBlueClr">37</h2>
                </div>
            </div>

            <div class="rota_dash-card orangeClr">
                <div class="rota_dash-left">
                    <p class="rota_title"><i class="bx bx-group greenText"></i> Active Carers</p>
                    <h2 class="rota_count greenText">36</h2>
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
                                    <div class="aligniconMedication"><i class="bx  bx-clock-4"></i> Jan 6, 2026 at 18:28</div>
                                    <div class="aligniconMedication"><i class="bx  bx-user"></i> 09:00 - 17:00</div>
                                    <div class="aligniconMedication"><i class="bx  bx bx-group greenText"></i> 0/11 accepted</div>
                                </div>
                                <div class="witnessedBy witnessedByNotes">
                                    <span><strong>Notes:</strong> DSFDSFSAFSDF </span>
                                </div>
                                <div class="planFooter">
                                    <span>Frequency: DSF </span>
                                </div>
                            </div>
                            <div class="planCard borderleftPurple">
                                <div class="planTop">
                                    <div class="planTitle">
                                        DFVDF <span class="careBadg yellowBadges"> Pending</span>
                                    </div>
                                </div>
                                <div class="planMeta">
                                    <div class="aligniconMedication"><i class="bx  bx-clock-4"></i> Jan 6, 2026 at 18:28</div>
                                    <div class="aligniconMedication"><i class="bx  bx-user"></i> 09:00 - 17:00</div>
                                    <div class="aligniconMedication"><i class="bx  bx bx-group greenText"></i> 0/11 accepted</div>
                                </div>
                                <div class="witnessedBy witnessedByNotes">
                                    <span><strong>Notes:</strong> DSFDSFSAFSDF </span>
                                </div>
                                <div class="planFooter">
                                    <span>Frequency: DSF </span>
                                </div>
                            </div>
                            <div class="planCard borderleftPurple">
                                <div class="planTop">
                                    <div class="planTitle">
                                        DFVDF <span class="careBadg yellowBadges"> Pending</span>
                                    </div>
                                </div>
                                <div class="planMeta">
                                    <div class="aligniconMedication"><i class="bx  bx-clock-4"></i> Jan 6, 2026 at 18:28</div>
                                    <div class="aligniconMedication"><i class="bx  bx-user"></i> 09:00 - 17:00</div>
                                    <div class="aligniconMedication"><i class="bx  bx bx-group greenText"></i> 0/11 accepted</div>
                                </div>
                                <div class="witnessedBy witnessedByNotes">
                                    <span><strong>Notes:</strong> DSFDSFSAFSDF </span>
                                </div>
                                <div class="planFooter">
                                    <span>Frequency: DSF </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="dailyLogVisitors">
                    <div class="leave-card">
                        <div class="workHoursHeader">
                            <div class="title"> Shift Requests </div>
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
                                            <p class="muteText">Supervised by Michael Brown</p>
                                        </div>
                                        <div class="planFooter">
                                            <span><i class="bx bx-group"></i> 5 objectives</span>
                                            <span><i class="bx bx-check-circle"></i> 0 tasks</span>
                                            <span class="textBlueClr"><i class="bx bx-check-circle"></i> 6 medications</span>
                                        </div>
                                        <p class="mt-3 muteText">From m.carter • Dec 15, 4:32 PM</p>
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
                                            <p class="muteText">Supervised by Michael Brown</p>
                                        </div>
                                        <div class="planFooter">
                                            <span><i class="bx bx-group"></i> 5 objectives</span>
                                            <span><i class="bx bx-check-circle"></i> 0 tasks</span>
                                            <span class="textBlueClr"><i class="bx bx-check-circle"></i> 6 medications</span>
                                        </div>
                                        <p class="mt-3 muteText">From m.carter • Dec 15, 4:32 PM</p>
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
                                            <p class="muteText">Supervised by Michael Brown</p>
                                        </div>
                                        <div class="planFooter">
                                            <span><i class="bx bx-group"></i> 5 objectives</span>
                                            <span><i class="bx bx-check-circle"></i> 0 tasks</span>
                                            <span class="textBlueClr"><i class="bx bx-check-circle"></i> 6 medications</span>
                                        </div>
                                        <p class="mt-3 muteText">From m.carter • Dec 15, 4:32 PM</p>
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
                                            <p class="muteText">Supervised by Michael Brown</p>
                                        </div>
                                        <div class="planFooter">
                                            <span><i class="bx bx-group"></i> 5 objectives</span>
                                            <span><i class="bx bx-check-circle"></i> 0 tasks</span>
                                            <span class="textBlueClr"><i class="bx bx-check-circle"></i> 6 medications</span>
                                        </div>
                                        <p class="mt-3 muteText">From m.carter • Dec 15, 4:32 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>


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
    @endsection
</main>