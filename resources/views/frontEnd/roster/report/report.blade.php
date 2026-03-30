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
                            <div class="rounded12 blueBorder borderLeftThick p-4">
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
                            <div class="rounded12 greenBorder borderLeftThick p-4">
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
                        <div class="col-lg-6">
                            <div id="staffPerformanceTab">
                                <canvas id="staffChart"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                </div>

                <div class="content" id="staffHoursTab">
                    Staff Hours content here
                </div>

                <div class="content" id="clientVisitsTab">
                    Client Visits content here
                </div>

                <div class="content" id="outingsTab">
                    Outings content here
                </div>

                <div class="content" id="staffPerformanceTab">
                    Staff Performance content here
                </div>

                <div class="content" id="financialTab">
                    Financial content here
                </div>

                <div class="content" id="operationalTab">
                    Operational content here
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
    <script>
        const ctx = document.getElementById('staffChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Patient A", "Patient B", "Patient C", "Patient D"], // X-axis

                datasets: [{
                        label: "Total Hours",
                        data: [10, 15, 8, 12], // values
                        backgroundColor: "#4CAF50"
                    },
                    {
                        label: "OT Hours",
                        data: [2, 4, 1, 3],
                        backgroundColor: "#FF9800"
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 5 // 0,5,10,15,20
                        },
                        max: 20 // max value
                    }
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</main>
@endsection