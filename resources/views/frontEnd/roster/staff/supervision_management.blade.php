@extends('frontEnd.layouts.master')
@section('title', 'Staff Task')
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

                                <button class="borderBtn"><i class=" f18 bx bx-calendar-plus me-2"></i>
                                    Schedule Supervision</button>
                            </div>

                            <div>
                                <button class="bgBtn" type="button" onclick="showAddReportInc()"><i
                                        class="f18 bx  bx-plus me-2"></i> Schedule Supervision</button>

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
                                <h6 class="h6Head darkRedText mb-2"> Assessment documents detected </h6>
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
                            <div class=" leavebanktabCont p24">
                        <i class="bx bx-file-detail"></i>
                        <p class="mt-3">No supervision records</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection