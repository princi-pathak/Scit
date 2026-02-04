@extends('frontEnd.layouts.master')
@section('title', 'Staff Supervisions')
@section('content')
    @include('frontEnd.roster.common.roster_header')
    <main class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="staffHeaderp">
                        <div>
                            <h1 class="mainTitlep"> Staff Supervisions</h1>
                            <p class="header-subtitle mb-0"> Manage and schedule staff supervision sessions </p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <button class="borderBtn" data-toggle="modal" data-target="#scheduleSuperModal"><i
                                        class=" f18 bx bx-calendar-plus me-2"></i>
                                    Schedule Supervision</button>
                            </div>
                            <div>
                                <button class="bgBtn" type="button" data-toggle="modal" data-target="#recordSuperModal"><i
                                        class="f18 bx  bx-plus me-2"></i> Record Supervision</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt20">
                <div class="col-lg-3">
                    <div class="quick_action-card bgWhite p-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="bgIconStaffT buleBadges">
                                <i class="bx bx-group blueText"></i>
                            </div>
                            <div>
                                <h5 class="h5Bold mb-1">9</h5>
                                <p class="muteText">Total Records</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="quick_action-card bgWhite p-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="bgIconStaffT greenbadges">
                                <i class="bx bx-check-circle"></i>
                            </div>
                            <div>
                                <h5 class="h5Bold mb-1">9</h5>
                                <p class="muteText">On Track</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="quick_action-card bgWhite p-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="bgIconStaffT orangeBages">
                                <i class="bx bx-clock"></i>
                            </div>
                            <div>
                                <h5 class="h5Bold mb-1">9</h5>
                                <p class="muteText">Due Soon</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="quick_action-card bgWhite p-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="bgIconStaffT redbadges">
                                <i class="bx  bx-alert-triangle"></i>
                            </div>
                            <div>
                                <h5 class="h5Bold mb-1">9</h5>
                                <p class="muteText">Total Records</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt20">
                <div class="col-lg-12">
                    <div class="emergencyMain  bg-red-50 rouded8 p-4 urReqSec ">
                        <div class="d-flex gap-4 align-items-center">
                            <i class="bx  bx-alert-triangle f20 darkRedText"></i>
                            <div>
                                <h6 class="h6Head darkRedText mb-2"> Overdue Supervisions </h6>
                                <p class="mb-0 fs13 darkRedText">The following staff need supervision: Jane Wakefield,
                                    Shaheem
                                    Navad, Naveed
                                    Sharma, Tom, David Parker and 23 more.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt20">
                <div class="col-lg-3">
                    <div class="input-group searchWithtabs" style="width:100%">
                        <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search by staff name...">
                    </div>
                </div>
                <div class="col-md-3">

                    <select class="form-control">
                        <option>Under Investigation</option>
                        <option>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="emergencyMain emergencyContent AllStaffTabC p-4 blueAllTabCard mt-4">

                        <div class="d-flex justify-content-between  align-items-center">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="bgIconStaffT rounded50">
                                    <h5 class="h5Head blueText mb-0">D</h5>
                                </div>
                                <div>
                                    <div class="mb-2">
                                        <h5 class="mb-2">David Simpson</h5>
                                        <p class="muteText">Supervised by Michael Brown</p>
                                    </div>
                                    <div class="d-flex align-items-center flexWrap gap-2">
                                        <div class="userMum">
                                            <span class="title mt-0">
                                                <i class="bxr  bx-file-detail me-1"></i> 09 Feb 2026
                                            </span>
                                        </div>
                                        <div>
                                            <span class="careBadg greenbadges">on track</span>
                                        </div>
                                        <div class="userMum">
                                            <span class="title mt-0">
                                                <i class="bxr  bx-file-detail me-1"></i>probation review
                                            </span>
                                        </div>
                                    </div>
                                    <p class="mt-3 muteText">Next due: 09 May 2026</p>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex gap-4">
                                    <div>
                                        <button class="borderBtn" data-toggle="modal" data-target="#superDetailModal"><i
                                                class="bx bx-eye me-3"></i>View </button>
                                    </div>
                                    <div class="deleteIcon delete-row-btn"> <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="emergencyMain emergencyContent AllStaffTabC p-4 blueAllTabCard mt-4">

                        <div class="d-flex justify-content-between  align-items-center">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="bgIconStaffT rounded50">
                                    <h5 class="h5Head blueText mb-0">D</h5>
                                </div>
                                <div>
                                    <div class="mb-2">
                                        <h5 class="mb-2">David Simpson</h5>
                                        <p class="muteText">Supervised by Michael Brown</p>
                                    </div>
                                    <div class="d-flex align-items-center flexWrap gap-2">
                                        <div class="userMum">
                                            <span class="title mt-0">
                                                <i class="bxr  bx-file-detail me-1"></i> 09 Feb 2026
                                            </span>
                                        </div>
                                        <div>
                                            <span class="careBadg redbadges">Overdue</span>
                                        </div>
                                        <div class="userMum">
                                            <span class="title mt-0">
                                                <i class="bxr  bx-file-detail me-1"></i>probation review
                                            </span>
                                        </div>
                                    </div>
                                    <p class="mt-3 muteText">Next due: 09 May 2026</p>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex gap-4">
                                    <div>
                                        <button class="borderBtn"><i class="bx bx-eye me-3"></i>View </button>

                                    </div>
                                    <div class="deleteIcon delete-row-btn"> <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="emergencyMain emergencyContent AllStaffTabC p-4 blueAllTabCard mt-4">

                        <div class="d-flex justify-content-between  align-items-center">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="bgIconStaffT rounded50">
                                    <h5 class="h5Head blueText mb-0">D</h5>
                                </div>
                                <div>
                                    <div class="mb-2">
                                        <h5 class="mb-2">David Simpson</h5>
                                        <p class="muteText">Supervised by Michael Brown</p>
                                    </div>
                                    <div class="d-flex align-items-center flexWrap gap-2">
                                        <div class="userMum">
                                            <span class="title mt-0">
                                                <i class="bxr  bx-file-detail me-1"></i> 09 Feb 2026
                                            </span>
                                        </div>
                                        <div>
                                            <span class="careBadg greenbadges">on track</span>
                                        </div>
                                        <div class="userMum">
                                            <span class="title mt-0">
                                                <i class="bxr  bx-file-detail me-1"></i>probation review
                                            </span>
                                        </div>
                                    </div>
                                    <p class="mt-3 muteText">Next due: 09 May 2026</p>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex gap-4">
                                    <div>
                                        <a href="#" class="borderBtn"><i class="bx bx-eye me-3"></i>View </a>

                                    </div>
                                    <div class="deleteIcon delete-row-btn"> <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="emergencyMain emergencyContent AllStaffTabC p-4 blueAllTabCard mt-4">

                        <div class="d-flex justify-content-between  align-items-center">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="bgIconStaffT rounded50">
                                    <h5 class="h5Head blueText mb-0">D</h5>
                                </div>
                                <div>
                                    <div class="mb-2">
                                        <h5 class="mb-2">David Simpson</h5>
                                        <p class="muteText">Supervised by Michael Brown</p>
                                    </div>
                                    <div class="d-flex align-items-center flexWrap gap-2">
                                        <div class="userMum">
                                            <span class="title mt-0">
                                                <i class="bxr  bx-file-detail me-1"></i> 09 Feb 2026
                                            </span>
                                        </div>
                                        <div>
                                            <span class="careBadg greenbadges">on track</span>
                                        </div>
                                        <div class="userMum">
                                            <span class="title mt-0">
                                                <i class="bxr  bx-file-detail me-1"></i>probation review
                                            </span>
                                        </div>
                                    </div>
                                    <p class="mt-3 muteText">Next due: 09 May 2026</p>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex gap-4">
                                    <div>
                                        <a href="#" class="borderBtn"><i class="bx bx-eye me-3"></i>View </a>

                                    </div>
                                    <div class="deleteIcon delete-row-btn"> <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="emergencyContent emergencyMain AllStaffTabC p-4 blueAllTabCard mt-4"">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="
                        leavebanktabCont p24">
                        <i class="bx bx-file-detail"></i>
                        <p class="mt-3">No supervision records</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- schedule supervision modal -->
        <div class="modal fade leaveCommunStyle" id="scheduleSuperModal" tabindex="1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog pModalScroll customModalWidthp">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> Schedule Supervision </h4>
                    </div>
                    <div class="modal-body heightScrollModal" style="height: unset;">
                        <div class="carer-form">

                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <label>Staff Member *</label>
                                    <select class="form-control">
                                        <option>Select Staff</option>
                                        <option>David Simpson</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 m-t-10">
                                    <label> Supervisor *</label>
                                    <select class="form-control">
                                        <option>Select Supervisor</option>
                                        <option>Jane Wakefield</option>
                                    </select>
                                </div>


                                <div class="col-md-6  m-t-10">
                                    <label>Date *</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-lg-6 m-t-10">
                                    <label>Time</label>
                                    <input type="time" class="form-control">

                                </div>
                                <div class="col-lg-12 m-t-10">
                                    <label> Supervision Type</label>
                                    <select class="form-control">
                                        <option>Formal 1:1</option>
                                        <option>Informal</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 m-t-10">
                                    <label>Frequency</label>
                                    <select class="form-control">
                                        <option>Monthly</option>
                                        <option>Informal</option>
                                    </select>
                                </div>
                                <div class="col-md-12 m-t-10">
                                    <label>Notes</label>
                                    <textarea name="morning" required="" class="form-control" rows="3" cols="20"
                                        placeholder="Any notes for this supervision..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex gap-3 justify-content-end">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="borderBtn">Cancel</button>
                        <button type="submit" class="bgBtn darkBg submit "> Schedule Supervision</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- schedule supervision modal end -->
        <!-- record supervision modal -->
        <div class="modal fade leaveCommunStyle" id="recordSuperModal" tabindex="1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog pModalScroll">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> Record Supervision </h4>
                    </div>
                    <div class="modal-body heightScrollModal" style="height: unset;">
                        <div class="carer-form">

                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <label>Staff Member *</label>
                                    <select class="form-control">
                                        <option>Select Staff</option>
                                        <option>David Simpson</option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label> Supervisor *</label>
                                    <select class="form-control">
                                        <option>Select Supervisor</option>
                                        <option>Jane Wakefield</option>
                                    </select>
                                </div>


                                <div class="col-md-6  m-t-10">
                                    <label>Supervision Date *</label>
                                    <input type="date" class="form-control">
                                </div>

                                <div class="col-lg-6 m-t-10">
                                    <label> Supervision Type</label>
                                    <select class="form-control">
                                        <option>Formal 1:1</option>
                                        <option>Informal</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 m-t-10">
                                    <label>Frequency</label>
                                    <select class="form-control">
                                        <option>Monthly</option>
                                        <option>Informal</option>
                                    </select>
                                </div>
                                <div class="col-md-12 m-t-10">
                                    <label>Supervisor Notes</label>
                                    <textarea name="morning" required="" class="form-control" rows="3" cols="20"
                                        placeholder="Enter supervision notes and discussion points..."></textarea>
                                </div>
                                <div class="col-md-12 m-t-10">
                                    <label>Staff Comments</label>
                                    <textarea name="morning" required="" class="form-control" rows="3" cols="20"
                                        placeholder="Staff member's feedback..."></textarea>
                                </div>
                                <div class="col-lg-12 m-t-10">
                                    <div class="attached-documents">

                                        <div class="header">
                                            <div class="title">
                                                <div class="d-flex gap-3 flexWrap">
                                                    <div>
                                                        <i class="bx bx-link f20 me-2"></i> <span>Attached Documents</span>
                                                    </div>
                                                    <div>
                                                        <div class="userMum">
                                                            <span class="title mt-0">
                                                                1
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="AttachAndCloseBtn">
                                                <button type="button" class="close-btn"><i class="bx  bx-plus"></i>
                                                    Attach</button>
                                                <button type="button" class="close-btn"><i class="bx  bx-x"></i> </button>
                                            </div>
                                        </div>

                                        <div class="upload-box">
                                            <div class="" id="availabilityTab">
                                                <div class="availabilityTabs">
                                                    <!-- TAB HEADER -->
                                                    <div class="availabilityTabs__nav">
                                                        <button type="button" class="availabilityTabs__tab active"
                                                            data-target="selectfromSystem"> 📁
                                                            Select from System</button>
                                                        <button type="button" class="availabilityTabs__tab"
                                                            data-target="uploadFiles"> ⬆ Upload
                                                            File</button>
                                                    </div>

                                                    <div class="availabilityTabs__content">

                                                        <div class="availabilityTabs__panel active" id="selectfromSystem">
                                                            <div class="selectfromSystemTabCont">
                                                                <div class="input-group selectfromSearch">
                                                                    <span class="input-group-addon btn-white"><i
                                                                            class="fa fa-search"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search forms...">
                                                                </div>

                                                                <div class="addSystemList">
                                                                    <div class="systemList">
                                                                        <div class="d-flex gap-2 flexWrap">
                                                                            <span class=" blueText"><i
                                                                                    class='bx bx-file-detail'></i>
                                                                            </span>
                                                                            <div class="helthcareText">
                                                                                <p>Braden QD, Communication, and Condition
                                                                                    Specific Assessment
                                                                                </p>
                                                                                <div
                                                                                    class="d-flex gap-2 align-items-center">
                                                                                    <div class="userMum">
                                                                                        <span class="title mt-0">
                                                                                            Healthcare Clinical Assessment
                                                                                        </span>
                                                                                    </div>
                                                                                    <span class="muteText">
                                                                                        Feb 4, 2026
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <span><i class='bx  bx-plus'></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="systemList">
                                                                        <div class="d-flex gap-2 flexWrap">
                                                                            <span class=" blueText"><i
                                                                                    class='bx bx-file-detail'></i>
                                                                            </span>
                                                                            <div class="helthcareText">
                                                                                <p>Braden QD, Communication, and Condition
                                                                                    Specific Assessment
                                                                                </p>
                                                                                <div
                                                                                    class="d-flex gap-2 align-items-center">
                                                                                    <div class="userMum">
                                                                                        <span class="title mt-0">
                                                                                            Healthcare Clinical Assessment
                                                                                        </span>
                                                                                    </div>
                                                                                    <span class="muteText">
                                                                                        Feb 4, 2026
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <span><i class='bx  bx-plus'></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="systemList">
                                                                        <div class="d-flex gap-2 flexWrap">
                                                                            <span class=" blueText"><i
                                                                                    class='bx bx-file-detail'></i>
                                                                            </span>
                                                                            <div class="helthcareText">
                                                                                <p>Braden QD, Communication, and Condition
                                                                                    Specific Assessment
                                                                                </p>
                                                                                <div
                                                                                    class="d-flex gap-2 align-items-center">
                                                                                    <div class="userMum">
                                                                                        <span class="title mt-0">
                                                                                            Healthcare Clinical Assessment
                                                                                        </span>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <span><i class='bx  bx-plus'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="availabilityTabs__panel" id="uploadFiles">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Document Name</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="e.g. Supervision Note">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Document Type</label>
                                                                    <select class="form-control">
                                                                        <option>Other</option>
                                                                        <option>Super Vision Form
                                                                        </option>
                                                                        <option>Care Plan</option>
                                                                        <option>Risk Assessment
                                                                        </option>
                                                                        <option>Medication Chart
                                                                        </option>
                                                                        <option>Daily Notes Template
                                                                        </option>
                                                                        <option>Incident Form
                                                                        </option>
                                                                        <option>Incident Form
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <button class="upload-btn m-t-10">
                                                                <i class="bx bx-link me-2 f20"></i> Upload & Attach
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="m-t-15">
                                            <div class="pendingCompletion">
                                                <!-- <div class="header">
                                                                                                                                                                                                                                                                                                                                                                Pending Completion (2)
                                                                                                                                                                                                                                                                                                                                                            </div> -->

                                                <div class="card">
                                                    <div class="left">
                                                        <div class="icon blueText"><i class="bx  bx-file"></i> </div>
                                                        <div class="info">
                                                            <div class="title">Restrictive Physical
                                                                Interventi...</div>
                                                            <div class="meta">
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <div class="userMum">
                                                                        <span class="title mt-0" style="font-size:12px">
                                                                            Healthcare Clinical Assessment
                                                                        </span>
                                                                    </div>
                                                                    <span class="muteText">
                                                                        Feb 4, 2026
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="deleteIcon">
                                                        <i class="bx  bx-trash"></i>

                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="left">
                                                        <div class="icon blueText"><i class="bx  bx-file"></i> </div>
                                                        <div class="info">
                                                            <div class="title">dzad</div>
                                                            <div class="meta">
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <div class="userMum">
                                                                        <span class="title mt-0" style="font-size:12px">
                                                                            Healthcare Clinical Assessment
                                                                        </span>
                                                                    </div>
                                                                    <span class="muteText">
                                                                        Feb 4, 2026
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="deleteIcon">

                                                        <i class="bx  bx-trash"></i>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="empty-state">
                                            <div class="icon">📎</div>
                                            <p><strong>No documents attached</strong></p>
                                            <p class="hint">Click “Attach” to add documents</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex gap-3 justify-content-end">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="borderBtn">Cancel</button>
                        <button type="submit" class="bgBtn darkBg submit "> Save Supervision</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- record supervision modal end -->
        <!-- supervision detail modal -->
        <div class="modal fade leaveCommunStyle" id="superDetailModal" tabindex="1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog pModalScroll">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> Supervision Details </h4>
                    </div>
                    <div class="modal-body heightScrollModal" style="height: unset;">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="muteText">Staff Member</p>
                                <h5 class="h5Head">Michael Brown</h5>
                            </div>
                            <div class="col-lg-6 m-t-10">
                                <p class="muteText">Supervisor</p>
                                <h5 class="h5Head">Phil Holt</h5>
                            </div>
                            <div class="col-lg-6 m-t-10">
                                <p class="muteText">Date</p>
                                <h5 class="h5Head">27 November 2025</h5>
                            </div>
                            <div class="col-lg-6 m-t-10">
                                <p class="muteText">Type</p>
                                <div> <span class="careBadg darkBlackBadg">formal one to one</span> </div>
                            </div>
                            <div class="col-lg-12 m-t-10">
                                <div class="muteBg rounded8 p-3">
                                    <p class="mb-0 text-sm para">Scheduled for 10:00. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-start">
                        <div>
                            <p class="muteText text-left">Next Supervision Due</p>
                            <h5 class="h5Head">
                                27 December 2025
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- supervision detail modal end -->
        </div>
        <!-- pratima script -->
        <script>
            document.querySelectorAll(".availabilityTabs").forEach(wrapper => {
                const tabs = wrapper.querySelectorAll(".availabilityTabs__tab");
                const panels = wrapper.querySelectorAll(".availabilityTabs__panel");

                tabs.forEach(tab => {
                    tab.addEventListener("click", () => {
                        tabs.forEach(t => t.classList.remove("active"));
                        panels.forEach(p => p.classList.remove("active"));
                        tab.classList.add("active");
                        wrapper
                            .querySelector("#" + tab.dataset.target)
                            .classList.add("active");
                    });
                });
            });
        </script>
        <!-- pratima script end -->
    </main>
@endsection