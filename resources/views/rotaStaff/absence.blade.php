@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Staff Timesheet')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')


<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Absence</h4>
                    </header>
                    <div class="panel-body">
                        <div class="absenceFiler">
                            <div>
                                <label>Filter absences</label>
                                <div>
                                    <select id="absenceFilter" class="form-select form-control">
                                        <option value="allAbsences">All absences</option>
                                        <option value="annualLeave">Annual leave</option>
                                        <option value="lateness">Lateness</option>
                                        <option value="sickness">Sickness</option>
                                        <option value="furloughs">Furloughs</option>
                                        <option value="otherAbsences">Other absences</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label>Leave year</label>
                                <div>
                                    <select class="form-select form-control">
                                        <option value="">01 Jan 2016 - 31 Dec 2016</option>
                                        <option value="">02 Jan 2016 - 31 Dec 2016</option>
                                        <option value="">03 Jan 2016 - 31 Dec 2016</option>
                                        <option value="">04 Jan 2016 - 31 Dec 2016</option>
                                        <option value="">05 Jan 2016 - 31 Dec 2016</option>
                                        <option value="">06 Jan 2016 - 31 Dec 2016</option>
                                        <option value="">07 Jan 2016 - 31 Dec 2016</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="allAbsences">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" text-center">
                                        <h3>All absences</h3>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="absenceAdd m-t-20">
                                        <label>Annual leave to take</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>168</strong>
                                                <span>hrs</span>
                                            </div>
                                            <div class="timelist">
                                                <strong>0</strong>
                                                <span>mins</span>
                                            </div>
                                            <div class="timelist">
                                                <strong>/</strong>
                                            </div>
                                            <div class="timelist">
                                                <strong>224</strong>
                                                <span>hrs</span>
                                            </div>
                                            <div class="timelist">
                                                <strong>0</strong>
                                                <span>mins</span>
                                            </div>
                                        </div>
                                        <p>(Approx 24 / 32 days) <a href="#!"><i class="fa fa-info-o"></i> </a> </p>
                                        <div class="m-t-20">
                                            <a href="#!" type="button" class="btn btn-warning">Add annual leave</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="absenceAdd borderLeftRight m-t-20">
                                        <label>Sickness</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>0</strong>
                                                <span>occurrences</span>
                                            </div>

                                        </div>
                                        <p>(....?) <a href="#!"><i class="fa fa-info-o"></i> </a> </p>
                                        <div class="m-t-20">
                                            <a href="#!" type="button" class="btn btn-warning">Add</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="absenceAdd m-t-20">
                                        <label>Lateness</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>0</strong>
                                                <span>occurrences</span>
                                            </div>

                                        </div>
                                        <p>(....?) <a href="#!"><i class="fa fa-info-o"></i> </a> </p>
                                        <div class="m-t-20">
                                            <a href="#!" type="button" class="btn btn-warning">Add</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absenceHistory m-t-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="absencehistoryHeading">Absence History</h3>
                                        <div class="absenceAccordion">
                                            <div class="panel-group" id="accordion-absence">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-absence" href="#collapseOne">Current & future (0)</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <div class="row publicHoliday">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row publicHoliday m-t-15">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-absence" href="#collapseTwo">Absence history (0)</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    Shank fatback pastrami turkey ham hock. Pastrami ball tip brisket pig salami kevin tri-tip sausage venison jowl spare ribs short loin pork chop. Shank pork chop burgdoggen shankle flank. Turducken cow salami venison, biltong ham ball tip meatloaf drumstick bacon jowl kielbasa.
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
                        </div> <!-- all Absence  -->

                        <div class="annualLeave">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" text-center">
                                        <h3>Annual leave</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="absenceAdd borderLeftRight m-t-20">
                                        <label>Remaining</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>234</strong>
                                                <span>hrs</span>
                                            </div>
                                            <div class="timelist">
                                                <strong>234</strong>
                                                <span>mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="absenceAdd m-t-20">
                                        <label>Allowance</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>234</strong>
                                                <span>hrs</span>
                                            </div>
                                            <div class="timelist">
                                                <strong>234</strong>
                                                <span>mins</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 m-t-20 text-center">
                                    <label>Craig has taken 56 hrs of annual leave.</label>
                                    <a href="#!" type="button" class="btn btn-warning m-t-20">Add annual leave</a>
                                </div>
                            </div>
                            <div class="absenceHistory m-t-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="absencehistoryHeading">Absence History</h3>
                                        <div class="absenceAccordion">
                                            <div class="panel-group" id="accordionAbsence">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordionAbsence" href="#collapseThree">Current & future (0)</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <div class="row publicHoliday">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row publicHoliday m-t-15">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordionAbsence" href="#collapseFour">Absence history (0)</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFour" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    Shank fatback pastrami turkey ham hock. Pastrami ball tip brisket pig salami kevin tri-tip sausage venison jowl spare ribs short loin pork chop. Shank pork chop burgdoggen shankle flank. Turducken cow salami venison, biltong ham ball tip meatloaf drumstick bacon jowl kielbasa.
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

                        <div class="lateness">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" text-center">
                                        <h3>Lateness</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="absenceAdd borderLeftRight m-t-20">
                                        <label>Logged</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>0</strong>
                                                <span>occurrences</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="absenceAdd m-t-20">
                                        <label>Total</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>0</strong>
                                                <span>days</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 m-t-20 text-center">
                                    <a href="#!" type="button" class="btn btn-warning">Add lateness</a>
                                </div>
                            </div>
                            <div class="absenceHistory m-t-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="absencehistoryHeading">Absence History</h3>
                                        <div class="absenceAccordion">
                                            <div class="panel-group" id="accordionLateness">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordionLateness" href="#collapseLateness">Lateness history (0)</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseLateness" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <div class="row publicHoliday">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row publicHoliday m-t-15">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
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
                            </div>
                        </div>
                        <div class="sickness">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" text-center">
                                        <h3>Sickness</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="absenceAdd borderLeftRight m-t-20">
                                        <label>Logged</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>2</strong>
                                                <span>occurrences</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="absenceAdd m-t-20">
                                        <label>Total</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>0</strong>
                                                <span>days</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 m-t-20 text-center">
                                    <a href="#!" type="button" class="btn btn-warning">Add Sickness</a>
                                </div>
                            </div>
                            <div class="absenceHistory m-t-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="absencehistoryHeading">Absence History</h3>
                                        <div class="absenceAccordion">
                                            <div class="panel-group" id="accordionSickness">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordionSickness" href="#collapseSickness">Sickness history (2)</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseSickness" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <div class="row publicHoliday">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row publicHoliday m-t-15">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
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
                            </div>
                        </div>
                        <div class="furloughs">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" text-center">
                                        <h3>Furloughs</h3>
                                    </div>
                                </div>
                                <div class="col-md-12 m-t-20 text-center">
                                    <a href="#!" type="button" class="btn btn-warning">Add furlough</a>
                                </div>
                            </div>
                            <div class="absenceHistory m-t-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="absencehistoryHeading">Absence History</h3>
                                        <div class="absenceAccordion">
                                            <div class="panel-group" id="accordionfurloughs">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordionfurloughs" href="#collapsefurloughs">Furloughs current & future (0)</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapsefurloughs" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <div class="row publicHoliday">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row publicHoliday m-t-15">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
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
                            </div>
                        </div>
                        <div class="otherAbsences">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" text-center">
                                        <h3>Other Absences</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="absenceAdd borderLeftRight m-t-20">
                                        <label>Logged</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>2</strong>
                                                <span>occurrences</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="absenceAdd m-t-20">
                                        <label>Total</label>
                                        <div class="timeHrsMinuts m-t-20 m-b-20">
                                            <div class="timelist">
                                                <strong>0</strong>
                                                <span>days</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 m-t-20 text-center">
                                    <a href="#!" type="button" class="btn btn-warning">Request other absence</a>
                                </div>
                            </div>
                            <div class="absenceHistory m-t-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="absencehistoryHeading">Absence History</h3>
                                        <div class="absenceAccordion">
                                            <div class="panel-group" id="accordionOther">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordionOther" href="#collapseOther">Other absence current & future (0)</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOther" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <div class="row publicHoliday">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row publicHoliday m-t-15">
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <i class="fa fa-certificate"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="holidayTitle">
                                                                            <h4>Public Holiday</h4>
                                                                            <p><strong>Mon 01 Jan 2018</strong> (7 hrs)</p>
                                                                            <p>New Year's Day</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="sunIcon">
                                                                            <a href="#!"><i class="fa fa-pencil-square-o"></i></a>
                                                                            <a href="#!"><i class="fa fa-trash-o"></i></a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectBox = document.getElementById("absenceFilter");
        const sections = document.querySelectorAll(
            ".allAbsences, .annualLeave, .lateness, .sickness, .furloughs, .otherAbsences"
        );

        // Default: sirf allAbsences dikhana
        sections.forEach(div => div.style.display = "none");
        document.querySelector(".allAbsences").style.display = "block";

        selectBox.addEventListener("change", function() {
            const value = this.value;
            // sab hide
            sections.forEach(div => div.style.display = "none");
            // sirf selected show
            const selectedDiv = document.querySelector("." + value);
            if (selectedDiv) {
                selectedDiv.style.display = "block";
            }
        });
    });
</script>
@endsection