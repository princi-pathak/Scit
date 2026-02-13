<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title', 'System Notification')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="staffHeaderp">
                    <div>
                        <h1 class="mainTitlep">Notifications </h1>
                        <p class="header-subtitle mb-0">All caught up!

                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="emergencyMain mt20">
                    <div id="emergencyAller">
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
                            <!-- blue part end -->

                            <div class="bg-blue-50 p-3  rounded8" id="actionBox" style="display:none">
                                <div class="d-flex justify-content-between flexWrap ">
                                    <div class="fs13">
                                        <p class="mb-2 darkBlueTextp  font600"> 9 selected </p>
                                        <p class="mb-0 blueText ">Critical & safeguarding/medication/allergy alerts require individual review</p>
                                    </div>
                                    <div>
                                        <div class="d-flex flexWrap gap-2 align-items-center">
                                            <div class="userMum">
                                                <span class="title mt-0 bgWhite"><i class="bx bx-check-circle f18 me-2"></i> Acknowledge</span>
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
                            <!-- orange part end -->
                            <div class="bg-orange-50 rounded8 p-3 mt-3">
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
                                        <div class="darkOrangeTextp fs13 w100">
                                            <p class="mb-2">Shift scheduled for 09:00 has not been started. No carer assigned</p>
                                            <div class="p-2 bgWhite rounded8 mb-2">
                                                <p class="text-sm para mb-0 font600"> ⚡ Contact carer immediately and verify shift status</p>
                                            </div>
                                            <p class="mb-2 textGray"> <i class="bx bx-clock  me-1"></i>Feb 6, 11:11</p>
                                            <p class="darkGreenTextp mb-2"> <i class="bx bx-check-circle  me-1"></i>Acknowledged
                                            </p>
                                            <div class="userMum">
                                                <span class="title bgwhite mt-0"><i class="bx bx-x fs16 me-2"></i> Resolve</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="bg-orange-50 rounded8 p-3 mt-3">
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
                                        <div class="darkOrangeTextp fs13 w100">
                                            <p class="mb-2">Shift scheduled for 09:00 has not been started. No carer assigned</p>
                                            <div class="p-2 bgWhite rounded8 mb-2">
                                                <p class="text-sm para mb-0 font600"> ⚡ Contact carer immediately and verify shift status</p>
                                            </div>
                                            <p class="mb-2 textGray"> <i class="bx bx-clock  me-1"></i>Feb 6, 11:11</p>
                                            <p class="darkGreenTextp mb-2"> <i class="bx bx-check-circle  me-1"></i>Acknowledged
                                            </p>
                                            <div class="userMum">
                                                <span class="title bgwhite mt-0"><i class="bx bx-x fs16 me-2"></i> Resolve</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="bg-orange-50 rounded8 p-3 mt-3">
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
                                        <div class="darkOrangeTextp fs13 w100">
                                            <p class="mb-2">Shift scheduled for 09:00 has not been started. No carer assigned</p>
                                            <div class="p-2 bgWhite rounded8 mb-2">
                                                <p class="text-sm para mb-0 font600"> ⚡ Contact carer immediately and verify shift status</p>
                                            </div>
                                            <p class="mb-2 textGray"> <i class="bx bx-clock  me-1"></i>Feb 6, 11:11</p>
                                            <p class="darkGreenTextp mb-2"> <i class="bx bx-check-circle  me-1"></i>Acknowledged
                                            </p>
                                            <div class="userMum">
                                                <span class="title bgwhite mt-0"><i class="bx bx-x fs16 me-2"></i> Resolve</span>
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
        <div class="row mt20">
            <div class="col-lg-12">
                <div class="calendarTabs staffTaskTab">

                    <div class="tabs p-1 mb-4">
                        <button class="tab" data-tab="allTab">
                            All (0)
                        </button>
                        <button class="tab " data-tab="unreadTab">
                            Unread (0)
                        </button>
                        <button class="tab active" data-tab="readTab">
                            Read (0)
                        </button>
                    </div>
                    <div class="tab-content carertabcontent">
                        <div class="content" id="allTab">
                            All tab content
                        </div>
                        <div class="content" id="unreadTab">
                            dasdasdasdasddasdasd
                        </div>
                        <div class="content" id="readTab">
                            pppppp
                        </div>
                    </div>
                </div>
                <!-- no notification -->
                <div class="leave-card">

                    <div class="leavebanktabCont bgWhite">
                        <i class="bx bx-bell"></i>

                        <h4>No notifications</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- pratima script -->
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
        <!-- pratima script end -->


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

    </div>
</main>
@endsection