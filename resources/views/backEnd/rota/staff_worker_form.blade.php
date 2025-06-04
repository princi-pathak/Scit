@extends('backEnd.layouts.master')
@section('title',' Add New')
@section('content')
<section id="main-content" class="">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Staff Worker
                    </header>
                    @if (session('success'))
                    <div class="aalert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show">
                        {{ session('info') }}
                    </div>
                    @endif
                    <div class="panel-body">
                        <div class="">
                            <form class="form-horizontal" method="post" action="{{ url('/admin/rota/save-staff-worker-data') }}" role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Surname <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="surname" id="" value="" placeholder="Enter name">
                                                @error('surname')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Forename <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="forename" id="" value="" placeholder="Enter name ">
                                                @error('forename')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Address <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="address" value="" id="" placeholder="Your address">
                                                @error('address')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Post Code <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="" name="postCode" value="" placeholder="Your Post Code">
                                                @error('postCode')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Date of Birth <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                               <input type="text" class="form-control" name="DOB" value="" id="DOB" placeholder="DOB" readonly>
                                                @error('DOB')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Bank Details, Acct Number & Sort Code <span class="radStar">*</span></label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" name="account_num" value="" id="" placeholder="Acct Number">
                                                @error('account_num')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="sort_code" value="" id="" placeholder="Sort Code">
                                                @error('sort_code')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Status </label>
                                            <div class="col-lg-9">
                                               <select class="form-control" id="" name="status">
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
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Rate of Pay (£) <span class="radStar">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="rate_of_pay" value="" id="" placeholder="">
                                                @error('rate_of_pay')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-5">
                                                <select class="form-control" id="" name="level">
                                                      <option value="">Select Level</option>
                                                    <option value="qualified">Qualified</option>
                                                    <option value="unqualified">Unqualified</option>
                                                </select>
                                                @error('level')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Start Date <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="start_date" id="start_Date" value="" placeholder="Start Date">
                                                @error('start_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Job Role <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="job_role" id="" value="" placeholder="Enter Your Role">
                                                @error('job_role')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">NIN <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="NIN" id="" value="" placeholder="Enter name">
                                                @error('NIN')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Starter Declaration (HMRC Starter Form) </label>
                                            <div class="col-lg-9">
                                                <select class="form-control" id="" name="starter_declaration">
                                                    <option value="1">Yes-A</option>
                                                    <option value="2">Yes-B</option>
                                                    <option value="3">Yes-C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Probation & Date (6 mth) Passed/Extended <span class="radStar">*</span></label>
                                            <div class="col-lg-3">
                                                <label class="control-label">Start date <span class="radStar">*</span></label>
                                                <input type="text" class="form-control" name="probation_start_date" value="" id="probation_start_date">
                                                @error('probation_start_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="control-label">End date <span class="radStar">*</span></label>
                                                <input type="text" class="form-control" name="probation_end_date" value="" id="probation_end_date">
                                                @error('probation_end_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="control-label">Extended date</label>
                                                <input type="text" class="form-control" name="probation_renew_date" value="" id="probation_renew_date">
                                                @error('probation_renew_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">After Probation Enrolled in Private Medical <span class="radStar">*</span></label>
                                            <div class="col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="probation_enrollered" id="inlineRadio1" value="1"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="probation_enrollered" id="inlineRadio2" value="0"> No
                                                </label>
                                                @error('probation_enrollered')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Student Loan </label>
                                            <div class="col-lg-9">
                                                <select class="form-control" id="" name="student_loan">
                                                    <option value="no_student_loan">No Student Loan</option>
                                                    <option value="postgraduate">Postgraduate</option>
                                                    <option value="plan_1">Plan 1</option>
                                                    <option value="plan_2">Plan 2</option>
                                                    <option value="plan_4">Plan 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">DBS Clear </label>
                                            <div class="col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="dbs_clear" id="inlineRadio1" value="1"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="dbs_clear" id="inlineRadio2" value="0"> No
                                                </label>
                                                @error('dbs_clear')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">DBS Number </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="dbs_number" value="" id="t" placeholder="1234567890">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">On DBS Update server</label>
                                            <div class="col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="dbs_service_update" id="inlineRadio1" value="1"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="dbs_service_update" id="inlineRadio2" value="0"> No
                                                </label>
                                                @error('dbs_service_update')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Leave Date</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="leave_date" value="" id="leave_date
                                                
                                                ">
                                                @error('leave_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Email Address </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="email" id="" value="" placeholder="Enter mail ">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Mobile</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="mobile" value="" id="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12 text-right">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="submit" class="btn btn-default">Cencel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<script>
    const addStaffWorker = "{{ url('admin/rota/staff-add') }}";
    const deleteStaffWorker = "{{ url('admin/rota/staff-delete') }}";
</script>
<script type="text/javascript" src="{{ url('public/js/rota/add_staff_worker.js') }}"></script>
@endsection

