@extends('frontEnd.layouts.master')
@section('title', 'Payroll Process')
@section('content')

    @include('frontEnd.roster.common.roster_header')
    <main class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="staffHeaderp">
                        <div>
                            <h1 class="mainTitlep">Timesheet & Shift Reconciliation</h1>
                            <p class="header-subtitle mb-0">Review actual vs planned hours and approve timesheets</p>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt20">
                <div class="col-lg-12">
                    <div class="card-row">
                        <div class="card-col">
                            <div class="emergencyMain p-4">
                                <p class=" fs13 textGray">Matched</p>
                                <h2 class="cardBoldTitle mt-0 mb-0 textBlue">0</h2>
                            </div>
                        </div>
                        <div class="card-col">
                            <div class="emergencyMain p-4">
                                <p class=" fs13 textGray">Needs Adjustment</p>
                                <h2 class="cardBoldTitle mt-0 mb-0 orangeText">0</h2>
                            </div>
                        </div>
                        <div class="card-col">
                            <div class="emergencyMain p-4">
                                <p class=" fs13 textGray">Unscheduled</p>
                                <h2 class="cardBoldTitle mt-0 mb-0 purpleTextp">0</h2>
                            </div>
                        </div>
                        <div class="card-col">
                            <div class="emergencyMain p-4">
                                <p class=" fs13 textGray">Approved</p>
                                <h2 class="cardBoldTitle mt-0 mb-0 greenText">0</h2>
                            </div>
                        </div>
                        <div class="card-col">
                            <div class="emergencyMain p-4">
                                <p class="fs13 textGray">Rejected</p>
                                <h2 class="cardBoldTitle mt-0 mb-0 redtext ">0</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt20">
                <div class="col-lg-12">
                    <div class="emergencyMain p-4">
                        <div class="row">
                            <div class="col-lg-3">
                                <select class="form-control">
                                    <option>All Status</option>
                                    <option>Draft</option>
                                    <option>Sent</option>
                                    <option>Paid</option>
                                    <option>Overdue</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control">
                                    <option>All Staff</option>
                                    <option>Jane wake</option>
                                    <option>Sent</option>
                                    <option>Paid</option>
                                    <option>Overdue</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <button class="borderBtn w100"><i class="bx bx-filter f18 me-2"></i> Reset Filters</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt20">
                <div class="col-lg-12">
                    <!-- Bootstrap 3.1 Accordion Example -->

                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
                    <div class="panel-group" id="accordion">
                        <!-- pannel 1 -->
                        <div class="panel panel-default payRollAcood">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"
                                        class="lightBlueBg">
                                        <i class="bx bx-clock f20 blueText me-2"></i>
                                        Clocks with Shift Data (0)
                                        <i class="bx bx-chevron-down accIcon"></i>
                                    </a>

                                </h4>

                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="bBorderCard mt-4 p24">

                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex gap-3 mb-3 align-items-center">
                                                    <h5 class="h5Head mb-0">John Smith </h5>
                                                    <div><span class="careBadg greenbadges">Matched</span>
                                                    </div>
                                                </div>
                                                <p class="muteText">
                                                    Date
                                                </p>
                                                <h6 class="h6Head">
                                                    Sun, Nov 23 </h6>

                                            </div>
                                            <div>
                                                <button class="borderBtn">
                                                    Adjust</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Scheduled Shift</p>
                                                    <h6 class="h6Head">08:00 - 16:00</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Clock Times</p>
                                                    <h6 class="h6Head">08:02 - 15:58</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Variance</p>
                                                    <h6 class="h6Head greenText">0.00h</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Total Amount</p>
                                                    <h6 class="h6Head greenText">Within Tolerance</h6>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <p class="textGray fs13 text-center">No matched timesheets </p>

                                </div>
                            </div>
                        </div>
                        <!-- Panel 2-->
                        <div class="panel panel-default mt-4 payRollAcood p-0">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"
                                        class="lighOrangeBg">
                                        <i class="bx bx-alert-triangle f20 orangeText me-2"></i>
                                        Requires Adjustment (0)
                                        <i class="bx bx-chevron-down accIcon"></i>
                                    </a>

                                </h4>

                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="bBorderCard mt-4 p24">

                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex gap-3 mb-3 align-items-center">
                                                    <h5 class="h5Head mb-0">John Smith </h5>
                                                    <div><span class="careBadg greenbadges">Matched</span>
                                                    </div>
                                                </div>
                                                <h6 class="h6Head textGray">
                                                    Sun, Nov 23 </h6>

                                            </div>
                                            <div>
                                                <button class="borderBtn">
                                                    Review</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Scheduled Shift</p>
                                                    <h6 class="h6Head">08:00 - 16:00</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Clock Times</p>
                                                    <h6 class="h6Head">08:02 - 15:58</h6>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Missing Clock-Out</p>
                                                    <h6 class="h6Head">Within Tolerance</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Action</p>
                                                    <h6 class="h6Head">Manual Review</h6>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <p class="textGray fs13 text-center">No matched timesheets </p>
                                </div>
                            </div>
                        </div>
                        <!-- Panel 3-->

                        <div class="panel panel-default mt-4 payRollAcood p-0">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"
                                        class="lightGreeBg">
                                        <i class="bx bx-check-circle f20 greenText me-2"></i>
                                        Approved (20)
                                        <i class="bx bx-chevron-down accIcon"></i>
                                    </a>

                                </h4>

                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="bBorderCard mt-4 p24">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex gap-3 mb-3 align-items-center">
                                                    <h5 class="h5Head mb-0">John Smith </h5>
                                                    <div class="d-flex gap-3 flexWrap">
                                                        <div><span class="careBadg greenbadges">approved</span>
                                                        </div>
                                                        <div class="userMum">
                                                            <span class="title mt-0">
                                                                weekend
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="h6Head textGray">
                                                    Sun, Nov 23 </h6>

                                            </div>
                                            <div>
                                                <button class="borderBtn w100"><i class="bx bx-eye me-2 f18"></i>
                                                    Adjust</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Planned</p>
                                                    <h6 class="h6Head">8.00h</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Actual</p>
                                                    <h6 class="h6Head">8.00h</h6>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Variance</p>
                                                    <h6 class="h6Head">0.00h</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Action</p>
                                                    <h6 class="h6Head">Manual Review</h6>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="bBorderCard mt-4 p24">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex gap-3 mb-3 align-items-center">
                                                    <h5 class="h5Head mb-0">John Smith </h5>
                                                    <div class="d-flex gap-3 flexWrap">
                                                        <div><span class="careBadg greenbadges">approved</span>
                                                        </div>
                                                        <div class="userMum">
                                                            <span class="title mt-0">
                                                                weekend
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="h6Head textGray">
                                                    Sun, Nov 23 </h6>

                                            </div>
                                            <div>
                                                <button class="borderBtn w100"><i class="bx bx-eye me-2 f18"></i>
                                                    Adjust</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Planned</p>
                                                    <h6 class="h6Head">8.00h</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Actual</p>
                                                    <h6 class="h6Head">8.00h</h6>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Variance</p>
                                                    <h6 class="h6Head redtext">+0.50h</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Action</p>
                                                    <h6 class="h6Head">Manual Review</h6>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="bBorderCard mt-4 p24">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex gap-3 mb-3 align-items-center">
                                                    <h5 class="h5Head mb-0">John Smith </h5>
                                                    <div class="d-flex gap-3 flexWrap">
                                                        <div><span class="careBadg greenbadges">approved</span>
                                                        </div>
                                                        <div class="userMum">
                                                            <span class="title mt-0">
                                                                weekend
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="h6Head textGray">
                                                    Sun, Nov 23 </h6>

                                            </div>
                                            <div>
                                                <button class="borderBtn w100"><i class="bx bx-eye me-2 f18"></i>
                                                    Adjust</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Planned</p>
                                                    <h6 class="h6Head">8.00h</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Actual</p>
                                                    <h6 class="h6Head">8.00h</h6>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Variance</p>
                                                    <h6 class="h6Head blueText">+0.50h</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <p class="textGray fs13">Action</p>
                                                    <h6 class="h6Head">Manual Review</h6>
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
        </div>
    </main>
@endsection