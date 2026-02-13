@extends('frontEnd.layouts.master')
@section('title', 'Care Document')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="staffHeaderp">
                    <div>
                        <h1 class="mainTitlep">Care Documentation
                        </h1>
                        <p class="header-subtitle mb-0">All regulatory and care documents in one place </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt20 care6card">
            <div class="col-lg-12">
                <div class="card-row">
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <p class=" fs13 textGray"> <i class="bx bx-heart blueText blueText f18  me-2"></i> Care Plans</p>
                            <h2 class="cardBoldTitle mt-0 mb-0">0</h2>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <p class=" fs13 textGray"><i class='bx bx-pill f18  me-2 purpleTextp'></i>
                                MAR Sheets</p>
                            <h2 class="cardBoldTitle mt-0 mb-0">37</h2>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <p class=" fs13 textGray"><i class='bx bx-bolt f18  me-2 redtext'></i>
                                PEEPs</p>
                            <h2 class="cardBoldTitle mt-0 mb-0">37</h2>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <p class=" fs13 textGray"><i class='bx bx-shield f18  me-2 redtext'></i>
                                Safeguarding</p>
                            <h2 class="cardBoldTitle mt-0 mb-0">37</h2>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <p class=" fs13 textGray"><i class='bx bx-clipboard-detail f18  me-2 greenText'></i>
                                Audit</p>
                            <h2 class="cardBoldTitle mt-0 mb-0">56</h2>
                        </div>
                    </div>
                    <div class="card-col">
                        <div class="emergencyMain p-4">
                            <p class=" fs13 textGray"><i class='bx bx-file-detail f18  me-2'></i>
                                Total</p>
                            <h2 class="cardBoldTitle mt-0 mb-0">56</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-lg-12">
                <div class="emergencyMain p-4">
                    <div class="carer-form">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 ">
                                <div class="input-group searchWithtabs" style="width: 100%;">
                                    <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search documents or clients..." id="careDocSearch">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <select class="form-control" id="incident_typeFileter">
                                    <option value="0">All Document Types</option>
                                    <option value="1">Safeguarding</option>
                                    <option value="2">Accident</option>
                                    <option value="4">Fall</option>
                                    <option value="5">Medication Error</option>
                                    <option value="6">Abuse Allegation</option>
                                    <option value="15">Complaint</option>
                                    <option value="12">Death</option>
                                    <option value="16">Other</option>
                                </select>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <select class="form-control" id="incident_statusFilter">
                                    <option value="0">All Clients</option>
                                    <option value="1">Logan Johnes</option>
                                    <option value="2">Under Investigation</option>
                                    <option value="3">Resolved</option>
                                    <option value="4">Closed</option>
                                </select>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row m-t-10">
            <div class="col-lg-12">
                <!-- blue card care plan -->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-blue-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-heart blueText fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head blueText mb-0"> Care Plan </h5>
                            </div>
                            <div>
                                <span class="careBadg blueBorderBadg">residential</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn blueText" data-toggle="modal" data-target="#careDocDetail">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">

                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>
                        <p class="mb-0 muchsmallText textGray">active</p>

                    </div>
                    <p class="mb-0 textGray fs13"> Plan Type: initial </p>
                </div>
                <!-- violet card for behaviour -->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-violet-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-brain violetText fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head violetText mb-0">Behavior Chart
                                </h5>
                            </div>
                            <div>
                                <span class="careBadg violetBorderBadg">residential</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn violetText">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">

                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>
                        <p class="mb-0 muchsmallText textGray">active</p>

                    </div>
                    <p class="mb-0 textGray fs13"> Plan Type: initial </p>
                </div>
                <!-- purple card for Competency Assessment-->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-purple-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-clipboard-detail  purpleTextp fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head purpleTextp mb-0"> MAR Sheet
                                </h5>
                            </div>
                            <div>
                                <span class="careBadg purpleBorderBadg">residential</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn purpleTextp">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">

                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>
                        <p class="mb-0 muchsmallText textGray">active</p>

                    </div>
                    <p class="mb-0 textGray fs13"> Plan Type: initial </p>
                </div>
                <!-- orange card for complaint -->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-orange-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-message  orangeText fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head darkOrangeTextp mb-0"> Complaint </h5>
                            </div>
                            <div>
                                <span class="careBadg orangeBorderBadg">supported_living</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn darkOrangeTextp">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">
                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>
                        <span class="borderBadg">closed</span>
                    </div>
                    <p class="mb-0 textGray fs13"> Plan Type: initial </p>
                </div>
                <!-- green card for complement -->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-green-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-like greenTextp fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head darkGreenTextp mb-0"> Compliment </h5>
                            </div>
                            <div>
                                <span class="careBadg greenBorderBadg">supported_living</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn darkGreenTextp">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">
                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>

                    </div>
                    <p class="mb-0 textGray fs13"> Plan Type: initial </p>
                </div>
                <!-- green card for complement end  -->
                <!-- pink card for mental -->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-pink-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-brain pinkText fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head darkPinkText mb-0"> Mental Capacity </h5>
                            </div>
                            <div>
                                <span class="careBadg pinkBorderBadg">supported_living</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn darkPinkText">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">
                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>

                    </div>
                    <p class="mb-0 textGray fs13"> Plan Type: initial </p>
                </div>
                <!-- pink card for mental end  -->
                <!-- red card for mental -->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-red-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-bolt redtext fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head darkRedText mb-0"> PEEP </h5>
                            </div>
                            <div>
                                <span class="careBadg redBorderBadg">supported_living</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn darkRedText">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">
                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>


                    </div>
                    <p class="mb-0 textGray fs13"> Evacuation: Aided evacuation with wheeled walking frame. - 0 staff required

                    </p>
                </div>
                <!-- red card for mental end  -->
                <!-- cyan card for Quality Audit -->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-cyan-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-clipboard-detail cyanText fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head darkCyanText mb-0"> Quality Audit
                                </h5>
                            </div>
                            <div>
                                <span class="careBadg cyanBorderBadg">supported_living</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn darkCyanText">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">
                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>
                    </div>
                    <p class="mb-0 textGray fs13"> Evacuation: Aided evacuation with wheeled walking frame. - 0 staff required</p>
                </div>
                <!-- cyan card for Quality Audit end  -->
                <!-- yellow  card for Risk Assessment -->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-yellow-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-alert-triangle color-yellow fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head darkyellowIc mb-0"> Risk Assessment </h5>
                            </div>
                            <div>
                                <span class="careBadg yellowBorderBadg">supported_living</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn darkyellowIc">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">
                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>

                        <div><span class="borderBadg">closed</span></div>
                    </div>
                    <p class="mb-0 textGray fs13"> Evacuation: Aided evacuation with wheeled walking frame. - 0 staff required </p>
                </div>
                <!-- yellow card for Risk Assessment end  -->
                <!-- sky  card for Staff Supervision-->
                <div class="emergencyMain  borderLeftThick careDocCard p-4 bg-sky-70 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div>
                                <i class="bx bx-group cyanText fs23"></i>
                            </div>
                            <div>
                                <h5 class="h5Head darkSkyText mb-0"> Staff Supervision </h5>
                            </div>
                            <div>
                                <span class="careBadg skyBorderBadg">supported_living</span>
                            </div>
                        </div>
                        <div>
                            <button class="bgBtn whiteBtn darkSkyText">View Details</button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between" style="width: 70%;">
                        <p class="mb-0 fs13 textGray"><span class="font700">Client : </span> <span class="muteText"> Logan Jones</span></p>
                        <p class="mb-0 fs13 textGray"><span class="font700">Date : </span> <span class="muteText"> Feb 2, 2026</span></p>

                        <div><span class="borderBadg">closed</span></div>
                    </div>
                    <p class="mb-0 textGray fs13"> Evacuation: Aided evacuation with wheeled walking frame. - 0 staff required </p>
                </div>
                <!-- sky card for Staff Supervision  -->
            </div>
            <!-- care doc detail modal -->
            <div class="modal fade leaveCommunStyle" id="careDocDetail" tabindex="1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg pModalScroll">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"> <i class="bx bx-heart blueText blueText fs23 me-2"></i> Care Plan <span class="careBadg blueBorderBadg ms-2">residential</span> </h4>
                        </div>
                        <div class="modal-body heightScrollModal viewCareDoc" style="height: unset;">
                            <h3 class="h3Head">Client Information</h3>
                            <h6 class="h6Head textGray">
                                <Strong>Name:</Strong> Logan Jones
                            </h6>
                            <div>
                                <h6 class="h6Head textGray">plan type</h6>
                                <p class="para">initial</p>
                            </div>
                            <hr class="hrLine" />
                            <div>
                                <h6 class="h6Head textGray">medication management</h6>
                                <div class="p-4 muteBg rounded8 rounded8">
                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">notes:</span> notes need to write here
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">administration support:</span> prompting
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">medications:</span> Medication text
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">GP details:</span> test
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Medication storage:</span> test
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Allergies sensitivities:</span> test
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Self administers:</span> true
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Pharmacy details:</span> test
                                    </p>
                                </div>
                                <hr class="hrLine" />
                                <h6 class="h6Head textGray">preferences</h6>
                                <div class="p-4 muteBg rounded8 rounded8">
                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Hobbies:</span> te st
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Communication preferences:</span> test
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Food preferences:</span> test
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Social preferences:</span> test
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Personal care preferences:</span> tset
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Dislikes:</span> test
                                    </p>

                                    <p class="textGray fs13">
                                        <span class="font600 text-sm para">Likes:</span> test
                                    </p>
                                </div>

                            </div>
                            <hr class="hrLine" />
                            <h6 class="h6Head textGray">risk factors</h6>
                            <div class="p-4 muteBg rounded8">
                                <p class="textGray fs13">
                                    <span class="font600 text-sm para">Risk:</span> ridk description
                                </p>

                                <p class="textGray fs13">
                                    <span class="font600 text-sm para">Control measures:</span> tet
                                </p>

                                <p class="textGray fs13">
                                    <span class="font600 text-sm para">Likelihood:</span> low
                                </p>

                                <p class="textGray fs13">
                                    <span class="font600 text-sm para">Impact:</span> low
                                </p>
                            </div>
                            <hr class="hrLine" />

                            <h6 class="h6Head textGray">emergency info</h6>
                            <div class="p-4 muteBg rounded8">
                                <p class="textGray fs13">
                                    <span class="font600 text-sm para">Hospital preference:</span> test
                                </p>

                                <p class="textGray fs13">
                                    <span class="font600 text-sm para">DNACPR in place:</span> false
                                </p>

                                <p class="textGray fs13">
                                    <span class="font600 text-sm para">Emergency protocol:</span> test
                                </p>

                                <p class="textGray fs13">
                                    <span class="font600 text-sm para">Advance directive:</span> -
                                </p>
                            </div>
                            <hr class="hrLine" />
                            <h6 class="h6Head textGray">Personal Details</h6>
                            <div class="p-4 muteBg rounded8">
                                <p class="textGray fs13"><span class="font600 text-sm para">Cultural needs:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Language:</span> English</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Preferred name:</span> Logan</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Religion:</span> Londan</p>
                            </div>
                            <hr class="hrLine" />


                            <h6 class="h6Head textGray">Mental Health</h6>
                            <div class="p-4 muteBg rounded8">
                                <p class="textGray fs13"><span class="font600 text-sm para">Cognitive function:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Behaviour support needs:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Mental health conditions:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Communication needs:</span> -</p>
                            </div>
                            <hr class="hrLine" />


                            <h6 class="h6Head textGray">version</h6>
                            <p class="textGray fs13"> 1</p>

                            <hr class="hrLine" />

                            <h6 class="h6Head textGray">client id</h6>
                            <p class="textGray fs13">694146c3b47d88b4898e0e0d</p>
                            <hr class="hrLine" />
                            <h6 class="h6Head textGray">assessed by</h6>
                            <p class="textGray fs13">Mick</p>
                            <hr class="hrLine" />
                            <h6 class="h6Head textGray">review date</h6>
                            <p class="textGray fs13">May 2nd, 2026</p>
                            <hr class="hrLine" />
                            <h6 class="h6Head textGray">Daily Routine</h6>
                            <div class="p-4 muteBg rounded8">
                                <p class="textGray fs13"><span class="font600 text-sm para">Afternoon:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Evening:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Morning:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Night:</span> -</p>
                            </div>
                            <hr class="hrLine" />


                            <h6 class="h6Head textGray">Care Objectives</h6>
                            <div class="p-4 muteBg rounded8">
                                <p class="textGray fs13"><span class="font600 text-sm para">Outcome measures:</span> test</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Target date:</span> 2026-02-05</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Review notes:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Objective:</span> Test objective</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Status:</span> in_progress</p>
                            </div>
                            <hr class="hrLine" />


                            <h6 class="h6Head textGray">Physical Health</h6>
                            <div class="p-4 muteBg rounded8">
                                <p class="textGray fs13"><span class="font600 text-sm para">Allergies:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Mobility:</span> independent</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Nutrition:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Continence:</span> continent</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Pain management:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Skin integrity:</span> -</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Medical conditions:</span> -</p>
                            </div>
                            <hr class="hrLine" />


                            <h6 class="h6Head textGray">Care Tasks</h6>
                            <div class="p-4 muteBg rounded8">
                                <p class="textGray fs13"><span class="font600 text-sm para">Task name:</span> Task Test</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Preferred time:</span> 11:52</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Special instructions:</span> test</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Is active:</span> true</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Duration minutes:</span> 15 minutes</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Description:</span> test</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Task ID:</span> task_1770013315922</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Category:</span> personal_care</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Linked shift types: </span> task_1770013315922</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Requires two carers: </span> false</p>
                                <p class="textGray fs13"><span class="font600 text-sm para">Frequency:</span> daily</p>
                            </div>
                            <hr class="hrLine" />


                            <h6 class="h6Head textGray">Care Setting</h6>
                            <div class="p-4 muteBg rounded8">
                                <p class="textGray fs13"><span class="font600 text-sm para">Setting:</span> domiciliary</p>
                            </div>
                            <hr class="hrLine" />
                            <h6 class="h6Head textGray">Assessment date:</h6>
                            <p class="textGray fs13"> February 2nd, 2026</p>
                            <hr class="hrLine" />
                            <h6 class="h6Head textGray">Assessment date:</h6>
                            <p class="textGray fs13">February 2nd, 2026</p>
                            <hr class="hrLine" />

                            <h6 class="h6Head textGray">Status:</h6>
                            <p class="textGray fs13">active</p>
                            <hr class="hrLine" />

                            <h6 class="h6Head textGray">Created date:</h6>
                            <p class="textGray fs13">February 2nd, 2026</p>
                            <hr class="hrLine" />

                            <h6 class="h6Head textGray">Updated date:</h6>
                            <p class="textGray fs13">February 2nd, 2026</p>
                            <hr class="hrLine" />

                            <h6 class="h6Head textGray">Created by ID:</h6>
                            <p class="textGray fs13">690d9c240a34ca4023dc316e</p>
                            <hr class="hrLine" />

                            <h6 class="h6Head textGray">Created by:</h6>
                            <p class="textGray fs13">vipin@appsandwebdevelopmentsolutions.com</p>
                            <hr class="hrLine" />



                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="bgBtn blackBtn w100">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- care document modal end -->
        </div>
</main>

@endsection