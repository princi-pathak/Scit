@extends('frontEnd.layouts.master')
@section('title', 'Task Center')
@section('content')

@include('frontEnd.roster.common.roster_header')





<main class="page-content complianceTaskCenter">
    <div class="container-fluid">

        <div class="topHeaderCont">
            <div>
                <h1>Compliance Task Center</h1>
                <p class="header-subtitle">Manage compliance tasks from audits, incidents, and training</p>
            </div>
        </div>

        <div class="rota_dashboard-cards simpleCard manageDashCard">
            <div class="rota_dash-card">
                <div class="rota_dash-left">
                    <p class="rotaTitle textGray500">Total Tasks</p>
                    <h2 class="rota_count mb-0 mt-2">3</h2>
                </div>
                <div>
                    <i class="bx bx-clock fs30 textGray500"></i>
                </div>
            </div>
            <div class="rota_dash-card">
                <div class="rota_dash-left">
                    <p class="rotaTitle textGray500">Pending</p>
                    <h2 class="rota_count mb-0 mt-2">3</h2>
                </div>
                <div>
                    <i class="bx bx-alert-circle fs30 textGray500"></i>
                </div>
            </div>

            <div class="rota_dash-card">
                <div class="rota_dash-left">
                    <p class="rotaTitle blueText fs12">In Progress</p>
                    <h2 class="rota_count mb-0 blueText mt-2">11</h2>
                </div>
                <div>
                    <i class="bx bx-clock blueText fs30"></i>
                </div>
            </div>

            <div class="rota_dash-card">
                <div class="rota_dash-left">
                    <p class="rotaTitle greenTextp">Completed</p>
                    <h2 class="rota_count mb-0 greenTextp mt-2">9</h2>
                </div>
                <div>
                    <i class="bx bx-check-circle greenTextp fs30"></i>
                </div>
            </div>

            <div class="rota_dash-card">
                <div class="rota_dash-left">
                    <p class="rotaTitle redtext">Urgent</p>
                    <h2 class="rota_count mb-0 mt-2 redtext">307</h2>
                </div>
                <div>
                    <i class="bx bx-alert-circle redtext fs30"></i>
                </div>
            </div>

        </div>

        <div class="row mt20">
            <div class="col-lg-12">
                <div class="emergencyMain p-4">
                    <div class="carer-form">
                        <div class="row">
                            <div class="col-lg-3">
                                <select class="form-control" id="incident_typeFileter">
                                    <option value="0">All Status</option>
                                    <option value="1">Pending</option>
                                    <option value="2">In Progress</option>
                                    <option value="4">Completed</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control" id="incident_statusFilter">
                                    <option value="0">All Priority</option>
                                    <option value="1">Urgent</option>
                                    <option value="2">High</option>
                                    <option value="3">Medium</option>
                                    <option value="4">Low</option>
                                </select>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt20">
            <div class="col-lg-12 col-md-12">
                <div class="emergencyMain p24 bottomSpace">
                    <div class="flexBw align-items-start">
                        <div>
                            <div class="dFlexGap mb-3">
                                <i class="bx bx-sparkles f20 blueText"></i>
                                <h6 class="h6Head mb-0">Conduct a comprehensive training program for all personnel on new safety protoco
                                </h6>
                                <span class="careBadg orangeBages">High</span>
                                <span class="careBadg">in_progress</span>
                            </div>
                            <div class="fs13 textGray500">
                                <p>Preventive measure from incident report Responsible Role: Training Manager Timeframe: 2 months</p>
                                <div class="dFlexGap">
                                    <div>
                                        <span>Assigned to:</span>
                                        <span>Jane Wakefield</span>
                                    </div>
                                    <div>
                                        <span>Due: </span>
                                        <span>2026-03-24</span>
                                    </div>
                                    <div>
                                        <span class="borderBadg dFlexGap gap-1" style="background-color: #faf5ff;"> <i class="bx bx-sparkles"></i>AI Generated
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn pgreenBtn" type="button" data-toggle="modal" data-target="#completeTaskModal">Complete</button>
                        </div>
                    </div>
                </div>
                <div class="emergencyMain p24 bottomSpace">
                    <div class="flexBw align-items-start">
                        <div>
                            <div class="dFlexGap mb-3">
                                <i class="bx bx-sparkles f20 blueText"></i>
                                <h6 class="h6Head mb-0">Conduct a comprehensive training program for all personnel on new safety protoco
                                </h6>
                                <span class="careBadg yellowBadges">medium</span>
                                <span class="careBadg">in_progress</span>
                            </div>
                            <div class="fs13 textGray500">
                                <p>Preventive measure from incident report Responsible Role: Training Manager Timeframe: 2 months</p>
                                <div class="dFlexGap">
                                    <div>
                                        <span>Assigned to:</span>
                                        <span>Jane Wakefield</span>
                                    </div>
                                    <div>
                                        <span>Due: </span>
                                        <span>2026-03-24</span>
                                    </div>
                                    <div>
                                        <span class="borderBadg dFlexGap gap-1" style="background-color: #faf5ff;"> <i class="bx bx-sparkles"></i>AI Generated
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn pgreenBtn" type="button" data-toggle="modal" data-target="#completeTaskModal">Complete</button>
                        </div>
                    </div>
                </div>
                <div class="emergencyMain p24 bottomSpace">
                    <div class="flexBw align-items-start">
                        <div>
                            <div class="dFlexGap mb-3">
                                <i class="bx bx-sparkles f20 blueText"></i>
                                <h6 class="h6Head mb-0">Conduct a comprehensive training program for all personnel on new safety protoco
                                </h6>
                                <span class="careBadg greenbadges">Completed</span>
                                <span class="careBadg">in_progress</span>
                            </div>
                            <div class="fs13 textGray500">
                                <p>Preventive measure from incident report Responsible Role: Training Manager Timeframe: 2 months</p>
                                <div class="dFlexGap">
                                    <div>
                                        <span>Assigned to:</span>
                                        <span>Jane Wakefield</span>
                                    </div>
                                    <div>
                                        <span>Due: </span>
                                        <span>2026-03-24</span>
                                    </div>
                                    <div>
                                        <span class="borderBadg dFlexGap gap-1" style="background-color: #faf5ff;"> <i class="bx bx-sparkles"></i>AI Generated
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn pgreenBtn" type="button" data-toggle="modal" data-target="#completeTaskModal">Complete</button>
                        </div>
                    </div>
                </div>
                <div class="emergencyMain p24 bottomSpace">
                    <div class="flexBw align-items-start">
                        <div>
                            <div class="dFlexGap mb-3">
                                <i class="bx bx-sparkles f20 blueText"></i>
                                <h6 class="h6Head mb-0">Conduct a comprehensive training program for all personnel on new safety protoco
                                </h6>
                                <span class="careBadg muteBadges">Pending</span>
                                <span class="careBadg">in_progress</span>
                            </div>
                            <div class="fs13 textGray500">
                                <p>Preventive measure from incident report Responsible Role: Training Manager Timeframe: 2 months</p>
                                <div class="dFlexGap">
                                    <div>
                                        <span>Assigned to:</span>
                                        <span>Jane Wakefield</span>
                                    </div>
                                    <div>
                                        <span>Due: </span>
                                        <span>2026-03-24</span>
                                    </div>
                                    <div>
                                        <span class="borderBadg dFlexGap gap-1" style="background-color: #faf5ff;"> <i class="bx bx-sparkles"></i>AI Generated
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn pgreenBtn" type="button" data-toggle="modal" data-target="#completeTaskModal">Complete</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- comlete task modal -->
    <div class="modal fade leaveCommunStyle" id="completeTaskModal" tabindex="1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog pModalScroll">
            <div class="modal-content">
                <div class="modal-header p24">
                    <div class="flexBw">
                        <h4 class="modal-title">Complete Task </h4>

                    </div>
                </div>
                <div class="modal-body heightScrollModal p24" style="height: unset;">
                    <form action="">
                        <h6 class="h6Head">
                            Conduct a comprehensive training program for all personnel on new safety protoco
                        </h6>
                        <p class="fs13 textGray500">Preventive measure from incident report Responsible Role: Training Manager Timeframe: 2 months </p>
                        <div>
                            <label for="">Completion Notes</label>
                            <textarea name="morning" class="form-control" rows="3" cols="20" placeholder="Describe what actions were taken..."></textarea>
                        </div>

                        <div class="mt20 dFlexGap justify-content-end">
                            <button class="borderBtn" type="button" data-dismiss="modal" aria-hidden="true"> Cancel</button>
                            <button class="bgBtn blackBtn">Mark Complete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
































@endsection