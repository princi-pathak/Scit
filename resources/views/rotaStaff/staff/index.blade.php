@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Add Staff')

<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Add Staff</h4>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="jobsection justify-content-end">
                                        <a href="javaScript:void(0)" type="button" class="profileDrop openAddStaffModel" data-action="add"> <i class="fa fa-plus"></i> Add</a>
                                        <a href="javascript:void(0)" class="profileDrop">Export</a>
                                    </div>
                                </div>
                            </div>
                            <div class="productDetailTable mb-4 table-responsive">
                                <table class="table border-top border-bottom tablechange" id="containerA">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>House Assigned</th>
                                            <th>Surname</th>
                                            <th>Forename</th>
                                            <th>Address</th>
                                            <th>Post Code</th>
                                            <th>DOB </th>
                                            <th>Bank Details, Acct Number & Sort Code</th>
                                            <th>Rate of Pay (£) </th>
                                            <th>Start Date </th>
                                            <th>Job Role</th>
                                            <th>NIN</th>
                                            <th>Starter Declaration <br>(HMRC Starter Form Completed)</th>
                                            <th>Probation End Date <br>(6 months) Passed/Extended</th>
                                            <th>After Probation Enrolled in Private Medical</th>
                                            <th>Student Loan</th>
                                            <th>DBS Clear?</th>
                                            <th>DBS Number</th>
                                            <th>On DBS Update Service?</th>
                                            <th>Leave Date</th>
                                            <th>Email Address</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>  
                                            <td>1</td>
                                            <td>Aries</td>
                                            <td>Daniels</td>
                                            <td>Jesse</td>
                                            <td>34/36 Gresford Avenue</td>
                                            <td>L17 2AW</td>
                                            <td class="white_space_nowrap">28-06-1990</td>
                                            <td>83903674 04-00-75</td>
                                            <td>11.00/12.25 </td>
                                            <td class="white_space_nowrap">03-01-2018</td>
                                            <td>Support Worker</td>
                                            <td>JT083437B</td>
                                            <td>Yes</td>
                                            <td></td>
                                            <td>Yes</td>
                                            <td>Yes</td>
                                            <td>Risk assessment required</td>
                                            <td>001813929307</td>
                                            <td></td>
                                            <td></td>
                                            <td>jessedaniels0690@hotmail.com</td>
                                            <td class="white_space_nowrap">07821 155 062</td>
                                            <td> <a href="#!" class="openModalBtn"><i class="fa fa-pencil" aria-hidden="true"></i></a> |
                                                <a href="#!" class="deleteBtn"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End off main Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Staff Modal start here -->
<div class="modal fade" id="addStaffWorkerModal" tabindex="-1" aria-labelledby="addStaffWorkerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="modalTitle">Add Staff</h4>
            </div>
            <form id="addStaffWorkerForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="formDtail">
                                <div class="form-group">
                                    <label> Surname <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" placeholder="Daniels" name="surname" id="surname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> Forename <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="forename" id="forename" placeholder="Jesse">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="address" id="address" placeholder="34/36 Gresford Avenue">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> Post Code <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="postCode" id="postCode" placeholder="L17 2AW">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="" class="input-group date">
                                        <input name="DOB" id="DOB" type="text" autocomplete="off" class="form-control">
                                        <span class="input-group-btn datetime-picker2 btn_height">
                                            <button class="btn btn-primary" type="button" id="openCalendarBtn">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Bank Details, Acct Number & Sort Code <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="bank_details" id="bank_details" placeholder="83903674 04-00-75">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status <span class="radStar">*</span></label>
                                    <div>
                                        <select class="form-control editInput" name="status" id="status">
                                            <option value="">Please Select</option>
                                            <option value="residential">Residential</option>
                                            <option value="supported_accomodation">Supported Accomodation</option>
                                            <option value="parental">Parental</option>
                                            <option value="foundations_for_life">Foundations for life</option>
                                            <option value="office_staff">Office Staff</option>
                                            <option value="leavers">Leavers</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Rate of Pay (£)</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="test" class="form-control editInput" name="rate_of_pay" id="rate_of_pay">
                                        </div>
                                        <div class="col-md-6">
                                             <select class="form-control editInput" name="level" id="level">
                                                <option value="">Select Level</option>
                                                <option value="qualified">Qualified</option>
                                                <option value="unqualified">Unqualified</option>
                                             </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="" class="input-group date">
                                        <input name="start_date" id="start_Date" type="text" autocomplete="off" class="form-control">
                                        <span class="input-group-btn datetime-picker2 btn_height">
                                            <button class="btn btn-primary" type="button" id="openCalendarStartBtn">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Job Role <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="job_role" id="job_role" placeholder="Support Worker">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>NIN <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="NIN" id="NIN" placeholder="JT083437B">
                                    </div>
                                </div>
                                <!-- Starter Declaration (HMRC Starter Form Completed) -->
                                <div class="form-group">
                                    <label>Starter Declaration (HMRC Starter Form Completed) <span class="radStar">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <select class="form-control editInput" name="starter_declaration" id="starter_declaration">
                                            <option value="1">Yes-A</option>
                                            <option value="2">Yes-B</option>
                                            <option value="3">Yes-C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Probation End Date (6 months) Passed/Extended <span class="radStar">*</span></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" name="probation_start_date" id="probation_start_date">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" name="probation_end_date" id="probation_end_date">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" name="probation_renew_date" id="probation_renew_date">
                                        </div>
                                    </div>
                                </div>
                                <!-- After Probation Enrolled in Private Medical -->
                                <div class="form-group">
                                    <label>After Probation Enrolled in Private Medical <span class="radStar">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input mt-0" type="radio" name="probation_enrollered" value="1" id="probation_enrollered_yes">
                                        <label class="form-check-label m-0" for="After_Probation_yes">Yes</label>
                                        <input class="form-check-input mt-0" type="radio" name="probation_enrollered" value="0" id="probation_enrollered_no">
                                        <label class="form-check-label m-0" for="After_Probation_no">No</label>
                                    </div>
                                </div>
                                <!-- Student Loan -->
                                <div class="form-group">
                                    <label>Student Loan <span class="radStar">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <select class="form-control editInput" name="student_loan" id="student_loan">
                                            <option value="no_student_loan">No Student Loan</option>
                                            <option value="postgraduate">Postgraduate</option>
                                            <option value="plan_1">Plan 1</option>
                                            <option value="plan_2">Plan 2</option>
                                            <option value="plan_4">Plan 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>DBS Clear? (Risk Assisment Required or not) </label>
                                    <div>
                                        <input class="form-check-input mt-0" type="radio" name="dbs_clear" value="1" id="dbs_clear_yes">
                                        <label class="form-check-label m-0" for="dbs_clear_yes">Yes</label>
                                        <input class="form-check-input mt-0" type="radio" name="dbs_clear" value="0" id="dbs_clear_no">
                                        <label class="form-check-label m-0" for="dbs_clear_no">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>DBS Number </label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="dbs_number" id="dbs_number" placeholder="1813929307">
                                    </div>
                                </div>
                                <!-- On DBS Update Service? -->
                                <div class="form-group">
                                    <label>On DBS Update Service? <span class="radStar">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input mt-0" type="radio" name="dbs_service_update" value="1" id="DBS_Update_yes">
                                        <label class="form-check-label m-0" for="DBS_Update_yes">Yes</label>
                                        <input class="form-check-input mt-0" type="radio" name="dbs_service_update" value="0" id="DBS_Update_no">
                                        <label class="form-check-label m-0" for="DBS_Update_no">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Leave Date </label>
                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="" class="input-group date">
                                        <input name="leave_date" id="leave_date" type="text" autocomplete="off" class="form-control" placeholder="Leave Date">
                                        <span class="input-group-btn datetime-picker2 btn_height">
                                            <button class="btn btn-primary" type="button" id="openCalendarLeaveBtn">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email Address <span class="radStar">*</span></label>
                                    <div>
                                        <input type="email" class="form-control editInput" name="email" id="email" placeholder="example232@hotmail.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mobile </label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="mobile" id="mobile" placeholder="07821 155 062">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End row -->
                    </div>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="saveSatffWorkerModel">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Staff Modal end here -->

<script>
    $(document).ready(function() {
        // New Job date 
        $('#New_dob').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            container: '#purchase_day_book_form'
        });

        $('#openCalendarBtn').click(function() {
            $('#New_dob').focus();
        });

        // Start Date 
        $('#Start_Date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            container: '#purchase_day_book_form'
        });

        $('#openCalendarStartBtn').click(function() {
            $('#Start_Date').focus();
        });

        // Leave Date 
        $('#Leave_date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            container: '#purchase_day_book_form'
        });

        $('#openCalendarLeaveBtn').click(function() {
            $('#Leave_date').focus();
        });
    });
    const addStaffWorker = "{{ url('/rota/staff-add') }}";
</script>


<script type="text/javascript" src="{{ url('public/js/rota/add_staff_worker.js') }}"></script>
@endsection