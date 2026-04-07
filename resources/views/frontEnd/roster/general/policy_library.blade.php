<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title','Policy Library')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="staffHeaderp">
                    <div>
                        <h1 class="mainTitlep dFlexGap"><i class="bx bx-book-open fs30 purpleTextp"></i> <span>Policy Library</span></h1>
                        <p class="header-subtitle mb-0">Manage organisational policies and ensure regulatory compliance </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <div class="card-row cardRow4">
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-file-detail fs30 blueText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">1</h2>
                            <p class=" fs13 textGray">Total Policies</p>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-check-circle fs30 greenText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">0/0</h2>
                            <p class=" fs13 textGray">Mandatory Approved </p>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-alert-circle fs30 redtext"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">6</h2>
                            <p class=" fs13 textGray">Overdue Review</p>

                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <div>
                                <i class="bx bx-alert-circle fs30 orangeText"></i>
                            </div>
                            <h2 class="cardBoldTitle mb-2 mt-3">0</h2>
                            <p class=" fs13 textGray">Review Due Soon </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <div class="bg-red-50 p-4 rounded8 lightShadow" style="border: 1px solid #fca5a5;">
                    <div class="dFlexGap align-items-start">
                        <div>
                            <i class="bx bx-alert-circle f20 redtext"></i>
                        </div>
                        <div class="">
                            <p class="mb-2 fs14 font600 darkRedText">1 policies overdue for review
                            </p>
                            <p class="mb-0 redtext fs13">• Test (Due: 31/03/2026)</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt20">
            <!-- Search -->
            <div class="col-md-12">
                <div class="dFlexGap flexWrap">
                    <div class="mbf10 flex1">
                        <div class="input-group searchWithtabs" style="width: 100%;">
                            <span class="input-group-addon btn-white">
                                <i class="fa fa-search"></i>
                            </span>
                            <input style="min-width:200px" type="text" class="form-control" placeholder="Search documents or clients...">
                        </div>
                    </div>
                    <div class="mbf10">
                        <select class="form-control">
                            <option>All Category</option>
                            <option>Safe Guarding Alert</option>
                            <option>Health and Safety</option>
                        </select>
                    </div>

                    <div class="mbf10">
                        <select class="form-control">
                            <option>All Status</option>
                            <option>Draft</option>
                            <option>Under Review</option>
                        </select>
                    </div>
                    <div class="mbf10">
                        <button class="bgBtn blackBtn" type="button" data-toggle="modal" data-target="#addPolicy">
                            <i class="bx bx-plus"></i> Add Policy
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <div class="emergencyMain p-4 bottomSpace">
                    <div class="flexBw align-items-start">
                        <div>
                            <div class="dFlexGap align-items-start">
                                <i class="bx bx-file-detail fs23 purpleTextp"></i>
                                <div>
                                    <h5 class="h5Head">Test</h5>
                                    <div class="dFlexGap mb-3">
                                        <span class="borderBadg">safeguarding adults </span>
                                        <span class="careBadg darkMuteBadg">draft </span>
                                    </div>
                                    <p class="mb-0 fs13 redtext">Review: 31/03/2026 (OVERDUE) </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="dFlexGap">
                                <button class="borderBtn"><i class="bx bx-arrow-to-bottom"></i></button>
                                <button class="borderBtn" type="button" data-toggle="modal" data-target="#editPolicy"><i class="bx bx-edit"></i></button>
                                <button class="borderBtn deleteHover"><i class="bx bx-trash redtext"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="emergencyMain p-4 bottomSpace">
                    <div class="flexBw align-items-start">
                        <div>
                            <div class="dFlexGap align-items-start">
                                <i class="bx bx-file-detail fs23 purpleTextp"></i>
                                <div>
                                    <h5 class="h5Head">Test</h5>
                                    <div class="dFlexGap mb-3">
                                        <span class="borderBadg">health safety </span>
                                        <span class="careBadg darkMuteBadg">archived </span>
                                        <span class="careBadg redDarkBadges">Mandatory </span>
                                        <span class="careBadg darkOrangeBadg">under_review </span>
                                        <span class="borderBadg">23 </span>
                                    </div>
                                    <p class="mb-0 fs13 redtext">Review: 31/03/2026 (OVERDUE) </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="dFlexGap">
                                <button class="borderBtn"><i class="bx bx-arrow-to-bottom"></i></button>
                                <button class="borderBtn" type="button" data-toggle="modal" data-target="#editPolicy"><i class="bx bx-edit"></i></button>
                                <button class="borderBtn deleteHover"><i class="bx bx-trash redtext"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- approved -->
                <div class="emergencyMain p-4 bottomSpace">
                    <div class="flexBw align-items-start">
                        <div>
                            <div class="dFlexGap align-items-start">
                                <i class="bx bx-file-detail fs23 purpleTextp"></i>
                                <div>
                                    <h5 class="h5Head">Test</h5>
                                    <div class="dFlexGap mb-3">
                                        <span class="borderBadg">health safety </span>
                                        <span class="careBadg darkGreenBadges">Aprroved </span>
                                        <span class="careBadg redDarkBadges">Mandatory </span>
                                        <span class="borderBadg">23 </span>
                                    </div>
                                    <div class="dFlexGap">
                                        <p class="mb-0 fs13 textGray500"><span>Approved:</span> 06/04/2026</p>
                                        <p class="mb-0 fs13 redtext">Review: 31/03/2026 (OVERDUE) </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="dFlexGap">
                                <button class="borderBtn"><i class="bx bx-arrow-to-bottom"></i></button>
                                <button class="borderBtn" type="button" data-toggle="modal" data-target="#editPolicy"><i class="bx bx-edit"></i></button>
                                <button class="borderBtn deleteHover"><i class="bx bx-trash redtext"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add policy modal -->
    <div class="modal fade leaveCommunStyle" id="addPolicy" tabindex="1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modalMd pModalScroll">
            <div class="modal-content">
                <div class="modal-header p24">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Policy</h4>
                </div>

                <div class="modal-body heightScrollModal p24" style="height: unset;">
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Policy Name *</label>
                                <input type="text" class="form-control" placeholder="e.g., Safeguarding Adults Policy 2026">
                            </div>
                            <div class="col-md-6 m-t-10">
                                <label for="">Category *</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="">Safeguarding Adult</option>
                                    <option value="">Health and Safety</option>
                                </select>
                            </div>
                            <div class="col-md-6 m-t-10">
                                <label for="">Version Number</label>
                                <input type="text" class="form-control" placeholder="v1.0">
                            </div>
                            <div class="col-md-6 m-t-10">
                                <label for="">Status</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Draft</option>
                                    <option value="">Under Review</option>
                                    <option value="">Approved</option>
                                    <option value="">Archived</option>
                                </select>
                            </div>
                            <div class="col-md-6 m-t-10">
                                <label for="">Review Date</label>
                                <input type="date" class="form-control" placeholder="v1.0">
                            </div>
                            <div class="col-md-12 m-t-10">
                                <div class="dFlexGap">
                                    <input type="checkbox" class="checkBoxHW">
                                    <label class="mb-0" for="">Mandatory for regulatory compliance </label>
                                </div>
                            </div>
                            <div class="col-md-12 m-t-10">
                                <label for="">Applies To </label>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dFlexGap">
                                            <input type="checkbox" class="checkBoxHW">
                                            <label class="mb-0" for="">All Staff </label>
                                        </div>
                                        <div class="dFlexGap m-t-10">
                                            <input type="checkbox" class="checkBoxHW">
                                            <label class="mb-0" for="">Care Staff </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dFlexGap">
                                            <input type="checkbox" class="checkBoxHW">
                                            <label class="mb-0" for="">Managers Only </label>
                                        </div>
                                        <div class="dFlexGap m-t-10">
                                            <input type="checkbox" class="checkBoxHW">
                                            <label class="mb-0" for="">Admin Staff</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 m-t-10">
                                        <label for="">Policy Document (PDF) *</label>
                                        <div class="uploadSec">
                                            <div class="uploadBox p24 mb-2 text-center muteHover py5">
                                                <i class="bx bx-arrow-from-bottom" style="font-size: 30px;"></i>
                                                <p class="muteText mb-0"> Upload Policy Document (PDF)</p>
                                                <input type="file">
                                            </div>
                                            <div class="dFlexGap m-t-10">
                                                <p class="fs13 greenTextp dFlexGap mb-0"> <i class="bx bx-check-circle fs16"></i><span> Document uploaded</span></p>
                                                <button class="borderBtn greenTextp">View PDF</button>
                                                <button class="borderBtn greenTextp">Replace</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dFlexGap justify-content-end mt-4">
                            <button class="borderBtn flex1" data-dismiss="modal">Cancel </button>
                            <button class="bgBtn purpleBgBtn flex1"> <i class="bx bx-check-circle"></i> Save Policy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- add policy modal -->
    <!-- edit policy modal -->
    <div class="modal fade leaveCommunStyle" id="editPolicy" tabindex="1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modalMd pModalScroll">
            <div class="modal-content">
                <div class="modal-header p24">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Policy</h4>
                </div>

                <div class="modal-body heightScrollModal p24" style="height: unset;">
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Policy Name *</label>
                                <input type="text" class="form-control" placeholder="e.g., Safeguarding Adults Policy 2026">
                            </div>
                            <div class="col-md-6 m-t-10">
                                <label for="">Category *</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="">Safeguarding Adult</option>
                                    <option value="">Health and Safety</option>
                                </select>
                            </div>
                            <div class="col-md-6 m-t-10">
                                <label for="">Version Number</label>
                                <input type="text" class="form-control" placeholder="v1.0">
                            </div>
                            <div class="col-md-6 m-t-10">
                                <label for="">Status</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Draft</option>
                                    <option value="">Under Review</option>
                                    <option value="">Approved</option>
                                    <option value="">Archived</option>
                                </select>
                            </div>
                            <div class="col-md-6 m-t-10">
                                <label for="">Review Date</label>
                                <input type="date" class="form-control" placeholder="v1.0">
                            </div>
                            <div class="col-md-12 m-t-10">
                                <div class="dFlexGap">
                                    <input type="checkbox" class="checkBoxHW">
                                    <label class="mb-0" for="">Mandatory for regulatory compliance </label>
                                </div>
                            </div>
                            <div class="col-md-12 m-t-10">
                                <label for="">Applies To </label>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dFlexGap">
                                            <input type="checkbox" class="checkBoxHW">
                                            <label class="mb-0" for="">All Staff </label>
                                        </div>
                                        <div class="dFlexGap m-t-10">
                                            <input type="checkbox" class="checkBoxHW">
                                            <label class="mb-0" for="">Care Staff </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dFlexGap">
                                            <input type="checkbox" class="checkBoxHW">
                                            <label class="mb-0" for="">Managers Only </label>
                                        </div>
                                        <div class="dFlexGap m-t-10">
                                            <input type="checkbox" class="checkBoxHW">
                                            <label class="mb-0" for="">Admin Staff</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 m-t-10">
                                        <label for="">Policy Document (PDF) *</label>

                                        <div class="dFlexGap m-t-10">
                                            <p class="fs13 greenTextp dFlexGap mb-0"> <i class="bx bx-check-circle fs16"></i><span> Document uploaded</span></p>
                                            <button class="borderBtn greenTextp">View PDF</button>
                                            <button class="borderBtn greenTextp">Replace</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dFlexGap justify-content-end mt-4">
                            <button class="borderBtn flex1" data-dismiss="modal">Cancel </button>
                            <button class="bgBtn purpleBgBtn flex1"> <i class="bx bx-check-circle"></i> Save Policy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit policy modal -->
</main>
@endsection