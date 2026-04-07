<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

@extends('frontEnd.layouts.master')
@section('title', 'Report')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="staffHeaderp flexWrap gap-3">
                    <div>
                        <h1 class="mainTitlep"> Business Analytics</h1>
                        <p class="header-subtitle mb-0">Comprehensive insights into performance, financials, and operations</p>
                    </div>

                    <div>
                        <button class="bgBtn" type="button" data-toggle="modal" data-target="#generateCqc"> <i class="bx bx-arrow-to-bottom"></i> Export Report</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <div class="emergencyMain p24">

                    <form action="">
                        <div class="auditLogRow">
                            <div>
                                <label class="formLabel">From Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div>
                                <label class="formLabel">To Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div>
                                <label class="formLabel">Staff Member</label>
                                <select class="form-control">
                                    <option>All Staff</option>
                                    <option>Jane WakeField</option>
                                </select>
                            </div>
                            <div>
                                <label class="formLabel">Client</label>
                                <select class="form-control">
                                    <option>All Client</option>
                                    <option>Priya </option>
                                    <option>Rohan maurya</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tabContainerp mt20 mainTabstaffPortal reportTabMain">
            <div class="">
                <!-- Tab Header -->
                <div class="scrollTabX rounded12 lightShadow" style="background: #fff;">
                    <div class="tabs p-3">
                        <button class="tab active" data-tab="overviewTab"><i class="bx bx-chart-bar-columns"></i> Overview</button>
                        <button class="tab" data-tab="staffHoursTab"><i class="bx bx-clock"></i> Staff Hours</button>
                        <button class="tab" data-tab="clientVisitsTab"><i class="bx bx-user-check"></i> Client Visits</button>
                        <button class="tab" data-tab="outingsTab"><i class="bx bx-location"></i> Outings</button>
                        <button class="tab" data-tab="staffPerformanceTab"><i class="bx bx-group"></i> Staff Performance</button>
                        <button class="tab" data-tab="financialTab"><i class="bx bx-dollar"></i> Financial</button>
                        <button class="tab" data-tab="operationalTab"><i class="bx bx-pulse"></i> Operational</button>
                    </div>
                </div>
            </div>
            <!-- Tab Content -->
            <div class="tab-content mt20">
                <div class="content active" id="overviewTab">
                    <div class="card-row cardRow4">
                        <div class="card-col bgWhite">
                            <div class="rounded12 blueBorder borderLeftThick p24">
                                <div class="flexBw align-items-start">
                                    <div>
                                        <p class="muteText">Total Hours</p>
                                        <h3 class="fs30 textBlack font700 mt-0 mb-2">34.0</h3>
                                        <p class="fs12 textGray500 mb-0">9.5 OT hours</p>
                                    </div>
                                    <div>
                                        <i class="bx bx-clock blueText fs23"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="rounded12 greenBorder borderLeftThick p24">
                                <div class="flexBw align-items-start">
                                    <div>
                                        <p class="muteText">Net Profit</p>
                                        <h3 class="fs30 textBlack font700 mt-0 mb-2">£0</h3>
                                        <p class="fs12 mb-0 redtext"> <i class="bx bx-trending-down f18"></i> 0.0% margin</p>
                                    </div>
                                    <div>
                                        <i class="bx bx-dollar greenTextp fs23"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="rounded12 purpleBorder borderLeftThick p-4">
                                <div class="flexBw align-items-start">
                                    <div>
                                        <p class="muteText">Completion Rate</p>
                                        <h3 class="fs30 textBlack font700 mt-0 mb-2">34.0</h3>
                                        <p class="fs12 textGray500 mb-0">59 vacancies</p>
                                    </div>
                                    <div>
                                        <i class="bx bx-check-circle purpleTextp fs23"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="rounded12 orangeBorder borderLeftThick p-4">
                                <div class="flexBw align-items-start">
                                    <div>
                                        <p class="muteText">Total Hours</p>
                                        <h3 class="fs30 textBlack font700 mt-0 mb-2">34.0</h3>
                                        <p class="fs12 textGray500 mb-0">9.5 OT hours</p>
                                    </div>
                                    <div>
                                        <i class="bx bx-star orangeText fs23"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class="col-md-6">
                            <div class="emergencyMain p24">
                                <h5 class="h5Head mb-0">Top Staff Performance</h5>
                                <div class="schartCon mt20">
                                    <canvas id="sperformanceChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="emergencyMain p24">
                                <h5 class="h5Head mb-0">Revenue by Client</h5>
                                <div class="schartCon mt20">
                                    <canvas id="revenueClient"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="staffHoursTab">
                    <div class="card-row">
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-clock blueText fs23"></i>
                                <h3 class="fs23 font700 mt-3 mb-2 blackText">34.0</h3>
                                <p class="muchsmallText mb-0"> Total Hours </p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-trending-up fs23 orangeText"></i>
                                <h3 class="fs23 font700 mt-3 mb-2 orangeText">10</h3>
                                <p class="muchsmallText mb-0"> Overtime Hours </p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-check-circle fs23 greenTextp"></i>
                                <h3 class="fs23 font700 mt-3 mb-2 greenTextp">6%</h3>
                                <p class="muchsmallText mb-0"> Avg Utilization </p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-alert-triangle fs23 redtext"></i>
                                <h3 class="fs23 font700 mt-3 mb-2 redtext">0</h3>
                                <p class="muchsmallText mb-0"> Over Capacity </p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-trending-down fs23 yellowText"></i>
                                <h3 class="fs23 font700 mt-3 mb-2 yellowText">34.0</h3>
                                <p class="muchsmallText mb-0"> Underutilized</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class="col-md-12">
                            <div class="emergencyMain p24">
                                <div class="flexBw">
                                    <h5 class="h5Head mb-0">Hours by Staff Member</h5>
                                    <button class="borderBtn"> <i class="bx bx-arrow-to-bottom"></i> Export</button>
                                </div>
                                <div class="schartCon mt20">
                                    <canvas id="staffHoursChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class="col-md-12">
                            <div class="emergencyMain p24">
                                <h5 class="h5Head">Staff Hours Detail</h5>
                                <div class="mt-4 table-responsive basicTable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Staff Member</th>
                                                <th>Type</th>
                                                <th class="text-right">Contracted</th>
                                                <th>Total</th>
                                                <th class="text-right">Overtime</th>
                                                <th class="text-right">Avg/Week</th>
                                                <th>Utilization</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Naveed Sharma</strong></td>
                                                <td class="textGray500">Unknown</td>
                                                <td class="blackText text-right">40h/wk</td>
                                                <td><strong>18.8</strong></td>
                                                <td class="redtext text-right">9.6h</td>
                                                <td class="text-right">3.5h</td>

                                                <td>
                                                    <div class="dFlexGap">
                                                        <div class="progressBar" style="width:80px;">
                                                            <div class="progressFill" style="width:16%; background:#f59e0b"></div>
                                                        </div>
                                                        <div>
                                                            0%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> <span class="careBadg yellowBadges">Under</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Naveed Sharma</strong></td>
                                                <td class="textGray500">Unknown</td>
                                                <td class="blackText text-right">40h/wk</td>
                                                <td><strong>18.8</strong></td>
                                                <td class="redtext text-right">9.6h</td>
                                                <td class="text-right">3.5h</td>

                                                <td>
                                                    <div class="dFlexGap">
                                                        <div class="progressBar" style="width:80px; ">
                                                            <div class="progressFill" style="width:16%; background:#f59e0b"></div>
                                                        </div>
                                                        <div>
                                                            0%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> <span class="careBadg yellowBadges">Under</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Naveed Sharma</strong></td>
                                                <td class="textGray500">Unknown</td>
                                                <td class="blackText text-right">40h/wk</td>
                                                <td><strong>18.8</strong></td>
                                                <td class="redtext text-right">9.6h</td>
                                                <td class="text-right">3.5h</td>

                                                <td>
                                                    <div class="dFlexGap">
                                                        <div class="progressBar" style="width:80px;">
                                                            <div class="progressFill" style="width:16%; background:#f59e0b"></div>
                                                        </div>
                                                        <div>
                                                            0%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> <span class="careBadg yellowBadges">Under</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="clientVisitsTab">
                    <div class="card-row">
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-calendar-week blueText fs23"></i>
                                <h3 class="fs23 font700 mt-3 mb-2 blackText">34.0</h3>
                                <p class="muchsmallText mb-0"> Total Visits </p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-clock fs23 greenTextp"></i>
                                <h3 class="fs23 font700 mt-3 mb-2">10</h3>
                                <p class="muchsmallText mb-0"> Total Hours</p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-trending-up fs23 purpleTextp"></i>
                                <h3 class="fs23 font700 mt-3 mb-2">6%</h3>
                                <p class="muchsmallText mb-0"> Avg Duration (mins)</p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-group fs23 skyBlueTex"></i>
                                <h3 class="fs23 font700 mt-3 mb-2">0</h3>
                                <p class="muchsmallText mb-0"> Clients Served</p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <span class="careBadg greenbadges">0</span>
                                <p class="muchsmallText mb-0 mt-2">Cancelled</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20 d-flex flexWrap">
                        <div class="col-md-6 flex1">
                            <div class="emergencyMain p24 h100">
                                <div class="flexBw">
                                    <h5 class="h5Head mb-0">Visits by Client</h5>
                                    <button class="borderBtn"> <i class="bx bx-arrow-to-bottom"></i> Export</button>
                                </div>
                                <div class="schartCon mt20">
                                    <canvas id="visitHoursChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 flex1">
                            <div class="emergencyMain p24 h100">
                                <div class="flexBw">
                                    <h5 class="h5Head mb-0">Visit Types</h5>
                                </div>
                                <div class="schartCon d-flex justify-content-center mt20">
                                    <canvas id="carePieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class="col-md-12">
                            <div class="emergencyMain p24">
                                <h5 class="h5Head">Client Visit Details</h5>
                                <div class="mt-4 table-responsive basicTable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Client</th>
                                                <th>Location</th>
                                                <th class="text-right">Visits</th>
                                                <th>Hours</th>
                                                <th class="text-right">Avg Duration</th>
                                                <th class="text-right">Per Week</th>
                                                <th>Primary Type</th>
                                                <th>Primary Carer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>John Davies1</strong></td>
                                                <td class="textGray500"><i class="bx bx-location fs16"></i> W1D 3QU</td>
                                                <td class="text-right"><strong>4</strong></td>
                                                <td>32.0h</td>
                                                <td class=" text-right">9.6h</td>
                                                <td class="text-right">425 mins</td>
                                                <td> 0.8 </td>
                                                <td> <span class="borderBadg">Morning</span></td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content" id="outingsTab">
                    <div class="card-row">
                        <div class="card-col bgWhite">
                            <div class="bg-cyan-50 rounded12 p-4 text-center" style="border: 1px solid #a5f3fc;">
                                <i class="bx bx-location skyBlueTex fs23"></i>
                                <h3 class="fs23 font700 mt-3 mb-2 darkSkyText">0</h3>
                                <p class="muchsmallText mb-0 skyBlueTex"> Total Outings</p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-group fs23 blueText"></i>
                                <h3 class="fs23 font700 mt-3 mb-2">10</h3>
                                <p class="muchsmallText mb-0"> Clients</p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-check-circle fs23 greenTextp"></i>
                                <h3 class=" fs23 mt-3 mb-2 font700 greenTextp">6%</h3>
                                <p class="muchsmallText mb-0">Risk Assessed</p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-car fs23 purpleTextp"></i>
                                <h3 class="fs23 font700 mt-3 mb-2">0</h3>
                                <p class="muchsmallText mb-0">Transport Types</p>
                            </div>
                        </div>
                        <div class="card-col bgWhite">
                            <div class="emergencyMain p-4 text-center">
                                <i class="bx bx-alert-triangle fs23 orangeText"></i>
                                <h3 class="fs23 font700 mt-3 mb-2 orangeText">0</h3>
                                <p class="muchsmallText mb-0">Need Follow-up</p>
                            </div>
                        </div>

                    </div>
                    <div class="row mt20 d-flex flexWrap">
                        <div class="col-md-6 flex1">
                            <div class="emergencyMain p24 h100">
                                <div class="flexBw">
                                    <h5 class="h5Head mb-0">Outings by Type</h5>
                                    <button class="borderBtn"> <i class="bx bx-arrow-to-bottom"></i> Export</button>
                                </div>
                                <div class="mt-4 table-responsive basicTable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Client</th>
                                                <th>Type</th>
                                                <th>Destination</th>
                                                <th>Transport</th>
                                                <th>Accompanying Staff</th>
                                                <th>Risk Assessed</th>
                                                <th>Outcome</th>
                                                <th>Follow-up</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>01 Apr 2026</td>
                                                <td><strong>John Davies</strong></td>
                                                <td>Medical</td>
                                                <td>Hospital</td>
                                                <td>Car</td>
                                                <td>Jane</td>
                                                <td>Yes</td>
                                                <td><span class="borderBadg">Successful</span></td>
                                                <td>Review in 1 week</td>
                                            </tr>

                                            <tr>
                                                <td>02 Apr 2026</td>
                                                <td><strong>Sarah Smith</strong></td>
                                                <td>Social</td>
                                                <td>Park</td>
                                                <td>Bus</td>
                                                <td>David</td>
                                                <td>No</td>
                                                <td><span class="borderBadg">Completed</span></td>
                                                <td>No follow-up</td>
                                            </tr>

                                            <tr>
                                                <td>03 Apr 2026</td>
                                                <td><strong>Michael Lee</strong></td>
                                                <td>Shopping</td>
                                                <td>Mall</td>
                                                <td>Car</td>
                                                <td>Emma</td>
                                                <td>Yes</td>
                                                <td><span class="borderBadg">Pending</span></td>
                                                <td>Call client</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 flex1">
                            <div class="emergencyMain p24 h100">
                                <h5 class="h5Head mb-0">Transport Methods</h5>
                                <div class="schartCon mt20">
                                    <canvas id="transportChart"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt20">
                        <div class="col-md-12">
                            <div class="emergencyMain p24">
                                <h5 class="h5Head">Outing Details</h5>
                                <div class="mt-4 table-responsive basicTable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Client</th>
                                                <th>Type</th>
                                                <th>Destination</th>
                                                <th>Transport</th>
                                                <th>Staff</th>
                                                <th>Risk</th>
                                                <th>Outcome</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>01 Apr 2026</td>
                                                <td><strong>John Davies</strong></td>
                                                <td>Medical</td>
                                                <td>Hospital</td>
                                                <td>Car</td>
                                                <td>Jane</td>
                                                <td>Low</td>
                                                <td><span class="borderBadg">Successful</span></td>
                                            </tr>

                                            <tr>
                                                <td>02 Apr 2026</td>
                                                <td><strong>Sarah Smith</strong></td>
                                                <td>Social</td>
                                                <td>Park</td>
                                                <td>Bus</td>
                                                <td>David</td>
                                                <td>Medium</td>
                                                <td><span class="borderBadg">Completed</span></td>
                                            </tr>

                                            <tr>
                                                <td>03 Apr 2026</td>
                                                <td><strong>Michael Lee</strong></td>
                                                <td>Shopping</td>
                                                <td>Mall</td>
                                                <td>Car</td>
                                                <td>Emma</td>
                                                <td>Low</td>
                                                <td><span class="borderBadg">Pending</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content" id="staffPerformanceTab">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mb15">
                            <div class="emergencyMain p24">
                                <p class="fs13 textGray500">Total Hours Worked </p>
                                <h3 class="fs30 font700 mb-0 blueText mt-0">71.0</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 pX mb15">
                            <div class="emergencyMain p24">
                                <p class="fs13 textGray500">Overtime Hours</p>
                                <h3 class="fs30 font700 mb-2 orangeText mt-0">9.5</h3>
                                <p class="mb-0 muchsmallText">13.4% of total</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb15">
                            <div class="emergencyMain p24">
                                <p class="fs13 textGray500">Average Rating</p>
                                <h3 class="fs30 font700 mb-2 greenText mt-0">00.0</h3>
                                <p class="mb-0 muchsmallText">13.4% of total</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class="col-md-12">
                            <div class="emergencyMain p24">
                                <div class="flexBw">
                                    <h5 class="h5Head mb-0">Staff Performance Breakdown</h5>
                                    <button class="borderBtn"> <i class="bx bx-arrow-to-bottom"></i> Export</button>
                                </div>
                                <div class="schartCon mt20">
                                    <canvas id="staffPerformanceChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class="col-md-12">
                            <div class="emergencyMain p24">
                                <h5 class="h5Head">Detailed Staff Metrics</h5>
                                <div class="mt-4 table-responsive basicTable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Staff Member</th>
                                                <th>Total Hours</th>
                                                <th>Overtime</th>
                                                <th>Shifts</th>
                                                <th>Avg per Shift</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="blackText">Shaheem Navad</td>
                                                <td><strong>10.5</strong></td>
                                                <td>00</td>
                                                <td>2</td>
                                                <td>5.3</td>
                                            </tr>
                                            <tr>
                                                <td class="blackText">Shaheem Navad</td>
                                                <td><strong>10.5</strong></td>
                                                <td>00</td>
                                                <td>2</td>
                                                <td>5.3</td>
                                            </tr>
                                            <tr>
                                                <td class="blackText">Shaheem Navad</td>
                                                <td><strong>10.5</strong></td>
                                                <td>00</td>
                                                <td>2</td>
                                                <td>5.3</td>
                                            </tr>
                                            <tr>
                                                <td class="blackText">Shaheem Navad</td>
                                                <td><strong>10.5</strong></td>
                                                <td>00</td>
                                                <td>2</td>
                                                <td>5.3</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content" id="financialTab">
                    <div class="card-row cardRow4">

                        <div class="card-col bgWhite">
                            <div class="rounded12 greenBorder borderLeftThick p24">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="muteText">Total Revenue</p>
                                        <h3 class="fs30 greenTextp font700 my-0">£0</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-col bgWhite">
                            <div class="rounded12 redBorder borderLeftThick p24">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="muteText">Total Costs</p>
                                        <h3 class="fs30 redText font700 my-0">£0</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-col bgWhite">
                            <div class="rounded12 blueBorder borderLeftThick p24">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="muteText">Net Profit</p>
                                        <h3 class="fs30 blueText font700 my-0">£0</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-col bgWhite">
                            <div class="rounded12 purpleBorder borderLeftThick p24">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="muteText">Profit Margin</p>
                                        <h3 class="fs30 purpleTextp font700 my-0">0.0%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class="col-md-6">
                            <div class="emergencyMain p24">
                                <h5 class="h5Head">Revenue Breakdown by Client
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="emergencyMain p24">
                                <h5 class="h5Head">Cost per Client </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20">
                        <div class="col-md-12">
                            <div class="emergencyMain p24">
                                <h5 class="h5Head">Average Cost per Client</h5>
                                <div class="mt20">
                                    <h3 class="fs30 blueText mt-0 font700">£0.00</h3>
                                    <p class="muteText">Across 0 clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content" id="operationalTab">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mb15">
                            <div class="emergencyMain p24 blueBorder borderLeftThick">
                                <p class="fs13 textGray500">Total Shifts </p>
                                <h3 class="fs23 font700 mb-2 blueText mt-0">71.0</h3>
                                <p class="mb-0 muchsmallText">0 unfilled</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 pX mb15">
                            <div class="emergencyMain p24 greenBorder borderLeftThick">
                                <p class="fs13 textGray500">Overtime Hours</p>
                                <h3 class="fs23 font700 mb-2 greenText mt-0">9.5</h3>
                                <p class="mb-0 muchsmallText"><i class="bx bx-check-circle fs16 greenTextp"></i>Good</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb15">
                            <div class="emergencyMain p24 purpleBorder borderLeftThick">
                                <p class="fs13 textGray500">On-Time Rate </p>
                                <h3 class="fs23 font700 mb-2 purpleTextp mt-0">100.0%</h3>
                                <p class="mb-0 muchsmallText">Staff punctuality</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt20 d-flex flexWrap">
                        <div class="col-md-6">
                            <div class="emergencyMain p24 h100">
                                <h5 class="h5Head">Shift Status Distribution</h5>
                                <div class="mt20">
                                    <div class="occupancyBox py-0 bottomSpace" style="border-bottom:unset;">
                                        <div class="topRow">
                                            <span class="textBlack font600 fs13">Completed</span>
                                            <span class="muteText">0 (0.0%)</span>
                                        </div>
                                        <div class="progressBar">
                                            <div class="progressFill" style="width:0%; background:#3376f2"></div>
                                        </div>
                                    </div>
                                    <div class="occupancyBox py-0 bottomSpace" style="border-bottom:unset;">
                                        <div class="topRow">
                                            <span class="textBlack font600 fs13">Schedule</span>
                                            <span class="muteText">40 (38.8%)</span>
                                        </div>
                                        <div class="progressBar">
                                            <div class="progressFill" style="width:40%; background:#3376f2"></div>
                                        </div>
                                    </div>
                                    <div class="occupancyBox py-0 bottomSpace" style="border-bottom:unset;">
                                        <div class="topRow">
                                            <span class="textBlack font600 fs13">In Progress</span>
                                            <span class="muteText">0 (0.0%)</span>
                                        </div>
                                        <div class="progressBar">
                                            <div class="progressFill" style="width:0%; background:#3376f2"></div>
                                        </div>
                                    </div>
                                    <div class="occupancyBox py-0 bottomSpace" style="border-bottom:unset;">
                                        <div class="topRow">
                                            <span class="textBlack font600 fs13">Unfilled</span>
                                            <span class="muteText">4 (3.9%)</span>
                                        </div>
                                        <div class="progressBar">
                                            <div class="progressFill" style="width:40%; background:#dc2626"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="emergencyMain p24 h100">
                                <h5 class="h5Head">Shift Status Distribution</h5>
                                <div class="mt20">
                                    <div class="muteBg rounded8 p-4 bottomSpace">
                                        <div class="occupancyBox py-0 " style="border-bottom:unset;">
                                            <div class="topRow">
                                                <span class="textBlack font600 fs13">Completion Rate </span>
                                                <span class="careBadg greenbadges">51.5%</span>
                                            </div>
                                            <div class="progressBar">
                                                <div class="progressFill" style="width:50%; background:#22c55e"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="muteBg rounded8 p-4 bottomSpace">
                                        <div class="occupancyBox py-0 " style="border-bottom:unset;">
                                            <div class="topRow">
                                                <span class="textBlack font600 fs13">Staff Punctuality </span>
                                                <span class="careBadg purpleBadges">51.5%</span>
                                            </div>
                                            <div class="progressBar">
                                                <div class="progressFill" style="width:50%; background:#a855f7"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="muteBg rounded8 p-4 bottomSpace">
                                        <div class="occupancyBox py-0 " style="border-bottom:unset;">
                                            <div class="topRow">
                                                <span class="textBlack font600 fs13">Fill Rate </span>
                                                <span class="careBadg orangeBages">51.5% </span>
                                            </div>
                                            <div class="progressBar">
                                                <div class="progressFill" style="width:50%; background:#f97316"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end tab content -->
        </div>
    </div>
    <!-- js for tab -->
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Common chart creation function
        function createBarChart(canvasId, chartData, yMax, yStep) {
            const ctx = document.getElementById(canvasId).getContext('2d');
            const config = {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        tooltip: {
                            enabled: true,
                            position: 'nearest',
                            backgroundColor: '#fff',
                            borderColor: '#d5d5d5',
                            borderWidth: 1,
                            titleColor: '#000',
                            bodyColor: '#000',
                            bodyFont: {
                                size: 14
                            },
                            titleFont: {
                                size: 14
                            },
                            padding: 15,
                            caretSize: 0,
                            displayColors: false,
                            titleMarginBottom: 10,
                            bodySpacing: 10,
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + context.parsed.y;
                                },
                                labelTextColor: function(context) {
                                    return context.dataset.backgroundColor;
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                font: {
                                    size: 14
                                },
                                usePointStyle: false,
                                boxWidth: 15,
                                boxHeight: 12,
                                borderRadius: 4,
                                padding: 10,
                                generateLabels: function(chart) {
                                    return chart.data.datasets.map((dataset, i) => ({
                                        text: dataset.label,
                                        fillStyle: dataset.backgroundColor,
                                        lineWidth: 0,
                                        hidden: !chart.isDatasetVisible(i),
                                        index: i,
                                        fontColor: dataset.backgroundColor
                                    }));
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: true,
                                color: '#d5d5d5',
                                borderDash: [4, 4],
                                drawBorder: false
                            },
                            border: {
                                display: true,
                                color: '#9c9c9c',
                                width: 2,
                                dash: [4, 4]
                            }
                        },
                        y: {
                            beginAtZero: true,
                            min: 0,
                            max: yMax,
                            ticks: {
                                stepSize: yStep
                            },
                            grid: {
                                display: true,
                                color: '#d5d5d5',
                                borderDash: [4, 4],
                                drawBorder: false
                            },
                            border: {
                                display: true,
                                color: '#9c9c9c',
                                width: 2,
                                dash: [4, 4]
                            }
                        }
                    }
                }
            };
            return new Chart(ctx, config);
        }

        // Data for Staff Performance
        const staffPerformanceData = {
            labels: ['John', 'Smith', 'David', 'Sara'],
            datasets: [{
                    label: 'Total Hours',
                    data: [10, 15, 8, 20],
                    backgroundColor: '#3b82f6'
                },
                {
                    label: 'OT Hours',
                    data: [2, 3, 1, 4],
                    backgroundColor: '#ef4444'
                }
            ]
        };
        // Data for Revenue Client
        const revenueClientData = {
            labels: ['John Milton', 'Smith Ali', 'David Johnson', 'Sara Khan'],
            datasets: [{
                    label: 'Self',
                    data: [600, 200, 400, 150],
                    backgroundColor: '#3b82f6'
                },
                {
                    label: 'Local Authority',
                    data: [420, 100, 300, 400],
                    backgroundColor: '#ef4444'
                }
            ]
        };

        createBarChart('sperformanceChart', staffPerformanceData, 25, 5);
        createBarChart('revenueClient', revenueClientData, 600, 100);
    </script>
    <!-- hours by staff member stack chart -->
    <script>
        const staffLabels = [
            'Naveed', 'Jane', 'David', 'Tom1', 'Shaheem', 'Renos', 'Mick', 'Katie',
            'Peter', 'Kelly', 'Sarah', 'Michael', 'Val', 'Alex', 'Ellese'
        ];
        const staffData = {
            labels: staffLabels,
            datasets: [{
                    label: 'Standard',
                    data: [8, 7, 9, 8, 8, 7, 8, 9, 8, 8, 7, 8, 9, 8, 7],
                    backgroundColor: '#3b82f6'
                },
                {
                    label: 'Overtime',
                    data: [8, 3, 1, 2, 3, 2, 1, 2, 3, 1, 2, 2, 3, 1, 2],
                    backgroundColor: '#ef4444'
                },
                {
                    label: 'Weekend',
                    data: [4, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1],
                    backgroundColor: '#8b5cf6'
                },
                {
                    label: 'Night',
                    data: [0, 0, 1, 0, 6, 0, 3, 0, 0, 0, 0, 1, 0, 0, 0],
                    backgroundColor: '#000000'
                }
            ]
        };

        const stackedConfig = {
            type: 'bar',
            data: staffData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    tooltip: {
                        enabled: true,
                        position: 'nearest',
                        backgroundColor: '#fff',
                        borderColor: '#d5d5d5',
                        borderWidth: 1,
                        titleColor: '#000',
                        bodyColor: '#000',
                        bodyFont: {
                            size: 14
                        },
                        titleFont: {
                            size: 14
                        },
                        padding: 15,
                        caretSize: 0,
                        displayColors: false,
                        titleMarginBottom: 10,
                        bodySpacing: 10,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y;
                            },
                            labelTextColor: function(context) {
                                return context.dataset.backgroundColor;
                            }
                        }
                    },
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            usePointStyle: false,
                            boxWidth: 15,
                            boxHeight: 12,
                            borderRadius: 4,
                            padding: 10,
                            generateLabels: function(chart) {
                                return chart.data.datasets.map((dataset, i) => ({
                                    text: dataset.label,
                                    fillStyle: dataset.backgroundColor,
                                    lineWidth: 0,
                                    hidden: !chart.isDatasetVisible(i),
                                    index: i,
                                    fontColor: dataset.backgroundColor
                                }));
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                        grid: {
                            display: true,
                            color: '#d5d5d5',
                            borderDash: [4, 4],
                            drawBorder: false
                        },
                        border: {
                            display: true,
                            color: '#9c9c9c',
                            width: 2,
                            dash: [4, 4]
                        }
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        min: 0,
                        max: 20,
                        ticks: {
                            stepSize: 5
                        },
                        grid: {
                            display: true,
                            color: '#d5d5d5',
                            borderDash: [4, 4],
                            drawBorder: false
                        },
                        border: {
                            display: true,
                            color: '#9c9c9c',
                            width: 2,
                            dash: [4, 4]
                        }
                    }
                }
            }
        };

        new Chart(document.getElementById('staffHoursChart').getContext('2d'), stackedConfig);
    </script>
    <!-- for single client  -->
    <script>
        const ctx = document.getElementById('visitHoursChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['John'],
                datasets: [{
                        label: 'Visit',
                        data: [3],
                        backgroundColor: '#3b82f6',
                        yAxisID: 'y'
                    },
                    {
                        label: 'Hours',
                        data: [27],
                        backgroundColor: '#22c55e',
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    tooltip: {
                        enabled: true,
                        position: 'nearest',
                        backgroundColor: '#fff',
                        borderColor: '#d5d5d5',
                        borderWidth: 1,
                        titleColor: '#000',
                        bodyColor: '#000',
                        bodyFont: {
                            size: 14
                        },
                        titleFont: {
                            size: 14
                        },
                        padding: 15,
                        caretSize: 0,
                        displayColors: false,
                        titleMarginBottom: 10,
                        bodySpacing: 10,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y;
                            },
                            labelTextColor: function(context) {
                                return context.dataset.backgroundColor;
                            }
                        }
                    },
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            usePointStyle: false,
                            boxWidth: 15,
                            boxHeight: 12,
                            borderRadius: 4,
                            padding: 10,
                            generateLabels: function(chart) {
                                return chart.data.datasets.map((dataset, i) => ({
                                    text: dataset.label,
                                    fillStyle: dataset.backgroundColor,
                                    lineWidth: 0,
                                    hidden: !chart.isDatasetVisible(i),
                                    index: i,
                                    fontColor: dataset.backgroundColor
                                }));
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: true,
                            color: '#d5d5d5',
                            borderDash: [4, 4],
                            drawBorder: false
                        },
                        border: {
                            display: true,
                            color: '#9c9c9c',
                            width: 2,
                            dash: [4, 4]
                        }
                    },

                    // 🔵 LEFT AXIS
                    y: {
                        position: 'left',
                        beginAtZero: true,
                        min: 0,
                        max: 4,
                        ticks: {
                            stepSize: 1,
                            color: '#3b82f6'
                        },
                        grid: {
                            display: true,
                            color: '#d5d5d5',
                            borderDash: [4, 4], // 👉 dotted grid
                            drawBorder: false
                        },
                        border: {
                            display: true,
                            color: '#3b82f6',
                            width: 2,
                            dash: [4, 4] // 👉 dotted blue line
                        }
                    },

                    // 🟢 RIGHT AXIS
                    y1: {
                        position: 'right',
                        beginAtZero: true,
                        min: 0,
                        max: 32,
                        ticks: {
                            stepSize: 8,
                            color: '#22c55e'
                        },
                        grid: {
                            drawOnChartArea: false
                        },
                        border: {
                            display: true,
                            color: '#22c55e',
                            width: 2,
                            dash: [4, 4]
                        }
                    }
                }
            }
        });
    </script>
    <!-- pie chart -->
    <script>
        const ctxPie = document.getElementById('carePieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: [
                    'Morning',
                    'Afternoon',
                    'Evening',
                    'Night',
                    'Supervision',
                    'Shadowing',
                    'Sleep-in',
                    'Waking Night'
                ],
                datasets: [{
                    data: [10, 15, 8, 6, 12, 5, 34, 4],
                    backgroundColor: [
                        '#3b82f6',
                        '#22c55e',
                        '#f59e0b',
                        '#6366f1',
                        '#ef4444',
                        '#8b5cf6',
                        '#14b8a6',
                        '#f97316'
                    ],
                    borderWidth: 1,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,

                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            boxWidth: 12
                        }
                    },
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#000',
                        bodyColor: '#000',
                        borderColor: '#d5d5d5',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.parsed;
                            }
                        }
                    }
                }
            }
        });
    </script>
    <!-- transport chart -->
    <script>
        const transportData = {
            labels: ['Car', 'Bike', 'Public Transport'], // x-axis labels
            datasets: [{
                label: 'Transport Usage',
                data: [40, 50, 30],
                backgroundColor: ['#3b82f6', '#22c55e', '#f59e0b'] // colors for each bar
            }]
        };

        const transportConfig = {
            type: 'bar',
            data: transportData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    tooltip: {
                        enabled: true,
                        position: 'nearest',
                        backgroundColor: '#fff',
                        borderColor: '#d5d5d5',
                        borderWidth: 1,
                        titleColor: '#000',
                        bodyColor: '#000',
                        bodyFont: {
                            size: 14
                        },
                        titleFont: {
                            size: 14
                        },
                        padding: 15,
                        caretSize: 0,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.parsed.y;
                            },
                            labelTextColor: function(context) {
                                // Match color of the corresponding bar
                                return context.dataset.backgroundColor[context.dataIndex];
                            }
                        }
                    },
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: '#d5d5d5',
                            borderDash: [4, 4],
                            drawBorder: false
                        },
                        border: {
                            display: true,
                            color: '#9c9c9c',
                            width: 2,
                            dash: [4, 4]
                        }
                    },
                    y: {
                        beginAtZero: true,
                        max: 60,
                        ticks: {
                            stepSize: 10,

                        },
                        grid: {
                            color: '#d5d5d5',
                            borderDash: [4, 4]
                        },
                        border: {
                            display: true,
                            color: '#9c9c9c',
                            width: 2,
                            dash: [4, 4]
                        }
                    }
                }
            }
        };

        new Chart(
            document.getElementById('transportChart').getContext('2d'),
            transportConfig
        );
    </script>
    <!-- performance breakdown chart -->
    <script>
        const staffLabelsBreak = [
            'Naveed Sharma', 'Jane Wake Field', 'David Simpson', 'Tom1', 'Shaheem Naveed'
        ];

        const staffBreakData = {
            labels: staffLabelsBreak,
            datasets: [{
                    label: 'Total Hours',
                    data: [40, 35, 45, 38, 42],
                    backgroundColor: '#3b82f6'
                },
                {
                    label: 'Overtime',
                    data: [5, 3, 2, 4, 6],
                    backgroundColor: '#ef4444'
                },
                {
                    label: 'Shift Hours',
                    data: [8, 7, 9, 8, 7],
                    backgroundColor: '#22c55e'
                }
            ]
        };

        const staffPerformanceConfig = {
            type: 'bar',
            data: staffBreakData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index', // 👈 show all bars at the hovered x-axis
                    intersect: false
                },
                plugins: {
                    tooltip: {
                        enabled: true,
                        position: 'nearest',
                        backgroundColor: '#fff',
                        borderColor: '#d5d5d5',
                        borderWidth: 1,
                        titleColor: '#000',
                        bodyColor: '#000',
                        bodyFont: {
                            size: 14
                        },
                        titleFont: {
                            size: 14
                        },
                        padding: 15,
                        caretSize: 0,
                        displayColors: false,
                        titleMarginBottom: 10,
                        bodySpacing: 10,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y;
                            },
                            labelTextColor: function(context) {
                                return context.dataset.backgroundColor;
                            }
                        }
                    },
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            usePointStyle: false,
                            boxWidth: 15,
                            boxHeight: 12,
                            borderRadius: 4,
                            padding: 10,
                            generateLabels: function(chart) {
                                return chart.data.datasets.map((dataset, i) => ({
                                    text: dataset.label,
                                    fillStyle: dataset.backgroundColor,
                                    lineWidth: 0,
                                    hidden: !chart.isDatasetVisible(i),
                                    index: i,
                                    fontColor: dataset.backgroundColor
                                }));
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        stacked: false,
                        grid: {
                            color: '#d5d5d5',
                            borderDash: [4, 4],
                            drawBorder: false
                        },
                        border: {
                            display: true,
                            color: '#9c9c9c',
                            width: 2,
                            dash: [4, 4]
                        }
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true,
                        max: 60,
                        ticks: {
                            stepSize: 10,

                        },
                        grid: {
                            color: '#d5d5d5',
                            borderDash: [4, 4]
                        },
                        border: {
                            display: true,
                            color: '#9c9c9c',
                            width: 2,
                            dash: [4, 4]
                        }
                    }
                }
            }
        };

        new Chart(
            document.getElementById('staffPerformanceChart').getContext('2d'),
            staffPerformanceConfig
        );
    </script>
</main>
@endsection