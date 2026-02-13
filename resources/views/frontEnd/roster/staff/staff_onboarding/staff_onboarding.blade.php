<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title', 'Staff Onboadrding')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="staffHeaderp">
                    <div>
                        <div class="d-flex gap-2 mb-3">
                            <div>
                                <i class="bx bx-group blueText" style="font-size: 30px;"></i>
                            </div>

                            <h1 class="mainTitlep mb-0"> Staff Onboarding Management </h1>
                        </div>
                        <p class="header-subtitle mb-0">Pre-employment checks, DBS, training, and induction tracking</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-lg-12">
                <div class="card-row">
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-group fs30 blueText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">32</h2>
                            <p class=" fs13 textGray">Total Staff</p>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-lock-open fs30 greenText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">0</h2>
                            <p class=" fs13 textGray">Fit to Work</p>
                            <div>
                                <span class="careBadg darkGreenBadges">0%</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-lock fs30 orangeText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">0</h2>
                            <p class=" fs13 textGray">In Progress</p>

                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-shield fs30 orangeText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">0</h2>
                            <p class=" fs13 textGray">DBS Expiring</p>

                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div class="mb-3">
                                <i class="bx bx-alert-triangle redtext fs30"></i>
                            </div>
                            <h2 class="cardBoldTitle mt-0 mb-0  ">0</h2>
                            <p class="fs13 textGray">DBS Expired </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection