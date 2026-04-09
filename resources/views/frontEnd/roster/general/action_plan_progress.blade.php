<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title','Action Plan Progress')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="mainIncidentPage">
            <div class="row">
                <div class="col-md-12">
                    <div class="staffHeaderp">
                        <div>
                            <h1 class="mainTitlep ">Action Plan Progress</h1>
                            <p class="header-subtitle mb-0">Track progress of action plans from audits and mock inspections</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-row cardRow4 mt20">
                <div class="card-col">
                    <div class="emergencyMain p24">
                        <div class="flexBw">
                            <div>
                                <p class="fs13 textGray500 mb-2">Total Action Plans</p>
                                <h2 class="font700 fs30 darkBlueTextp my-0">3</h2>
                            </div>
                            <div>
                                <i class="bx bx-trending-up font700 blueText fs35"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-col">
                    <div class="emergencyMain p24">
                        <div class="flexBw">
                            <div>
                                <p class="fs13 textGray500 mb-2">Active</p>
                                <h2 class="font700 fs30 darkPurpleTextp my-0">3</h2>
                            </div>
                            <div>
                                <i class="bx bx-clock font700 purpleTextp fs35"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-col">
                    <div class="emergencyMain p24">
                        <div class="flexBw">
                            <div>
                                <p class="fs13 textGray500 mb-2">Completed</p>
                                <h2 class="font700 fs30 darkGreenTextp my-0">3</h2>
                            </div>
                            <div>
                                <i class="bx bx-check-circle font700 greenText fs35"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-col">
                    <div class="emergencyMain p24">
                        <div class="flexBw">
                            <div>
                                <p class="fs13 textGray500 mb-2">Overdue</p>
                                <h2 class="font700 fs30 darkRedText my-0">33</h2>
                            </div>
                            <div>
                                <i class="bx bx-alert-triangle font700 redtext fs35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt20">
                <div class="col-md-12">
                    <div class="emergencyMain bottomSpace15 p24 cursorPointer actionList">
                        <div class="dFlexGap mb-3">
                            <h5 class="h5Head mb-0">CQC Mock Inspection Action Plan - 18/02/2026</h5>
                            <span class="careBadg orangeBages">high</span>
                            <span class="careBadg ">active</span>
                        </div>
                        <p class="muteText">Action plan generated from mock inspection findings. Overall rating: Requires Improvement</p>
                        <div class="dFlexGap">
                            <p class="muteText"><span>Category</span>: <span>Regulatory</span></p>
                            <p class="muteText"><span>Target</span>: <span>2026-03-20</span></p>
                        </div>
                        <div class="occupancyBox" style="border-bottom:unset;">
                            <div class="topRow">
                                <span class="textBlack font600 fs13">In Progress</span>
                                <span class="textBlack font600 fs13">0 (0.0%)</span>
                            </div>
                            <div class="progressBar">
                                <div class="progressFill" style="width:20%; background:#3376f2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="emergencyMain bottomSpace15 p24 cursorPointer actionList">
                        <div class="dFlexGap mb-3">
                            <h5 class="h5Head mb-0">CQC Mock Inspection Action Plan - 18/02/2026</h5>
                            <span class="careBadg orangeBages">high</span>
                            <span class="careBadg ">active</span>
                        </div>
                        <p class="muteText">Action plan generated from mock inspection findings. Overall rating: Requires Improvement</p>
                        <div class="dFlexGap">
                            <p class="muteText"><span>Category</span>: <span>Regulatory</span></p>
                            <p class="muteText"><span>Target</span>: <span>2026-03-20</span></p>
                        </div>
                        <div class="occupancyBox" style="border-bottom:unset;">
                            <div class="topRow">
                                <span class="textBlack font600 fs13">In Progress</span>
                                <span class="textBlack font600 fs13">0 (0.0%)</span>
                            </div>
                            <div class="progressBar">
                                <div class="progressFill" style="width:50%; background:#3376f2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="emergencyMain bottomSpace15 p24 cursorPointer actionList">
                        <div class="dFlexGap mb-3">
                            <h5 class="h5Head mb-0">CQC Mock Inspection Action Plan - 18/02/2026</h5>
                            <span class="careBadg orangeBages">high</span>
                            <span class="careBadg ">active</span>
                        </div>
                        <p class="muteText">Action plan generated from mock inspection findings. Overall rating: Requires Improvement</p>
                        <div class="dFlexGap">
                            <p class="muteText"><span>Category</span>: <span>Regulatory</span></p>
                            <p class="muteText"><span>Target</span>: <span>2026-03-20</span></p>
                        </div>
                        <div class="occupancyBox" style="border-bottom:unset;">
                            <div class="topRow">
                                <span class="textBlack font600 fs13">In Progress</span>
                                <span class="textBlack font600 fs13">0 (0.0%)</span>
                            </div>
                            <div class="progressBar">
                                <div class="progressFill" style="width:50%; background:#3376f2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- form -->
        <div class="incidentAddForm" style="display: none;">
            <div class="row">
                <div class="col-md-12">
                    <button class="borderBtn backBtn" type="button"><i class=" f18 bx  bx-arrow-left-stroke"></i> Back to Action Plans</button>
                    <div class="mt-4 rounded12 p24 careTaskheader shadowp lightBorderp">
                        <div class="flexBw mb-2">
                            <h5 class="h5Head mb-0">CQC Mock Inspection Action Plan - <span>18/02/2026</span></h5>

                            <div class="dflexGap">
                                <span class="careBadg orangeBages">high</span>
                                <span class="careBadg">active</span>
                            </div>

                        </div>
                        <p class="muteText mb-0">Action plan generated from mock inspection findings. Overall rating: Requires Improvement</p>
                    </div>
                    <div class="mt20 emergencyMain p24">
                        <div class="occupancyBox py-0" style="border-bottom:unset;">
                            <div class="topRow mb-0">
                                <span class="h6Head">Action Plan Progress</span>
                                <span class="careBadg muteBadges">0% Complete</span>
                            </div>
                            <div class="progressBar mt20">
                                <div class="progressFill" style="width:20%; background:#3376f2"></div>
                            </div>
                            <div class="mt-4 flexBw">
                                <p class="muteText mb-0">0 of 8 actions completed</p>
                                <p class="muteText mb-0">Due: <span>20 Mar 2026</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="mt20 emergencyMain p24">
                        <h6 class="h6Head">Action Items</h6>
                        <div class="mt20">
                            <div class="lightBorderp rounded12 p24 AllStaffTabC bottomSpace15">
                                <div class="dFlexGap align-items-start">
                                    <div>
                                        <div class="redbadges hw35 rounded50">
                                            <i class="bx bx-alert-circle fs23 redtext"></i>
                                        </div>
                                    </div>
                                    <div class="flex1">
                                        <h5 class="h5Head">Medication Management</h5>
                                        <div class="dFlexGap">
                                            <div class="muteText iconCenter"> <i class="bx bx-user"></i> <span>Unknown</span> </div>
                                            <div class="redtext fs13 iconCenter font600"> <i class="bx bx-calendar-week"></i> <span>20 Mar 2026</span></div>
                                            <span class="careBadg redBadges"> Overdue
                                            </span>
                                        </div>
                                        <div class="muteBg rounded8 p-3 my-4">
                                            <p class="textBlack mb-0 fs13">
                                                Improve processes to prevent medication errors and ensure all staff are retrained in safe administration practices.
                                                <br />
                                                [18/02/2026 13:30] We have now switched to bar coded medications, that have to be scanned
                                                <br />

                                                [18/02/2026 15:06] Test
                                                <br />

                                                [18/02/2026 16:01] test
                                            </p>
                                        </div>
                                        <div class="dFlexGap">
                                            <button class="borderBtn" type="button" data-toggle="modal" data-target="#addNotes"><i class="bx bx-file-detail"></i> Add Note</button>
                                            <button class="borderBtn"> <i class="bx bx-camera-alt"></i> Upload Evidence</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lightBorderp rounded12 p24 AllStaffTabC bottomSpace15">
                                <div class="dFlexGap align-items-start">
                                    <div>
                                        <div class="careBadg hw35 rounded50">
                                            <i class="bx bx-clock  fs23"></i>
                                        </div>
                                    </div>
                                    <div class="flex1">
                                        <h5 class="h5Head">Safeguarding Procedures</h5>
                                        <div class="dFlexGap">
                                            <div class="muteText iconCenter"> <i class="bx bx-user"></i> <span>Unknown</span>
                                            </div>
                                            <div class="muteText iconCenter">
                                                <i class="bx bx-calendar-week"></i> <span>20 Mar 2026</span>
                                            </div>
                                            <span class="careBadg"> In Progress
                                            </span>
                                        </div>
                                        <div class="muteBg rounded8 p-3 my-4">
                                            <p class="textBlack mb-0 fs13">
                                                Improve processes to prevent medication errors and ensure all staff are retrained in safe administration practices.
                                                <br />
                                                [18/02/2026 13:30] We have now switched to bar coded medications, that have to be scanned
                                                <br />

                                                [18/02/2026 15:06] Test
                                                <br />

                                                [18/02/2026 16:01] test
                                            </p>
                                        </div>
                                        <div class="dFlexGap">
                                            <button class="borderBtn" type="button" data-toggle="modal" data-target="#addNotes"><i class="bx bx-file-detail"></i> Add Note</button>
                                            <button class="borderBtn"> <i class="bx bx-camera-alt"></i> Upload Evidence</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lightBorderp rounded12 p24 AllStaffTabC bottomSpace15">
                                <div class="dFlexGap align-items-start">
                                    <div>
                                        <div class="muteBadges hw35 rounded50">
                                            <i class="bx bx-circle fs23"></i>
                                        </div>
                                    </div>
                                    <div class="flex1">
                                        <h5 class="h5Head">Safeguarding Procedures</h5>
                                        <div class="dFlexGap">
                                            <div class="muteText iconCenter"> <i class="bx bx-user"></i> <span>Unknown</span>
                                            </div>
                                            <div class="muteText iconCenter">
                                                <i class="bx bx-calendar-week"></i> <span>20 Mar 2026</span>
                                            </div>
                                            <span class="careBadg muteBadges"> In Progress
                                            </span>
                                        </div>
                                        <div class="muteBg rounded8 p-3 my-4">
                                            <p class="textBlack mb-0 fs13">
                                                Improve processes to prevent medication errors and ensure all staff are retrained in safe administration practices.
                                                <br />
                                                [18/02/2026 13:30] We have now switched to bar coded medications, that have to be scanned
                                                <br />

                                                [18/02/2026 15:06] Test
                                                <br />

                                                [18/02/2026 16:01] test
                                            </p>
                                        </div>
                                        <div class="dFlexGap">
                                            <button class="borderBtn" type="button" data-toggle="modal" data-target="#addNotes"><i class="bx bx-file-detail"></i> Add Note</button>
                                            <button class="borderBtn"> <i class="bx bx-camera-alt"></i> Upload Evidence</button>
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
    <script>
        const actionList = document.querySelectorAll(".actionList");
        const mainIncidentPage = document.querySelector(".mainIncidentPage");
        const incidentAddForm = document.querySelector(".incidentAddForm");
        const backBtn = document.querySelector(".backBtn");

        actionList.forEach(list => {
            list.addEventListener("click", () => {
                mainIncidentPage.style.display = "none";
                incidentAddForm.style.display = "block";
            });
        });

        backBtn.addEventListener("click", () => {
            mainIncidentPage.style.display = "block";
            incidentAddForm.style.display = "none";
        })
    </script>
    <!-- notesModal -->
    <div class="modal fade leaveCommunStyle" id="addNotes" tabindex="1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog pModalScroll">
            <div class="modal-content">
                <div class="modal-header p24">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Progress Note </h4>
                </div>

                <div class="modal-body heightScrollModal p24" style="height: unset;">
                    <form action="">
                        <div>
                            <label for="">Note</label>
                            <textarea name="morning" required="" class="form-control" rows="3" cols="20" placeholder="Enter progress update or notes..."></textarea>
                        </div>
                        <div class="dFlexGap justify-content-end mt-4">
                            <button class="borderBtn" class="close" data-dismiss="modal">Cancel </button>
                            <button class="bgBtn blackBtn"> Add Note</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- notesModal end -->
</main>
@endsection