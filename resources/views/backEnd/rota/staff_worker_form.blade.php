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
                    @if(isset($staffWorker))
                        Edit 
                    @else
                        Add
                    @endif    
                        Staff Worker
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
                                            
                                            <input type="hidden" name="staff_id" value="{{ isset($staffWorker) ? $staffWorker->id : '' }}">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Surname <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="surname" id="" value="{{ isset($staffWorker) ?  $staffWorker->surname : '' }}" placeholder="Enter Surname">
                                                @error('surname')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Forename <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="forename" id="" value="{{ isset($staffWorker) ? $staffWorker->forename : ''}}" placeholder="Enter Forename ">
                                                @error('forename')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Address <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="address" value="{{ isset($staffWorker) ? $staffWorker->address : '' }}" id="" placeholder="Your address">
                                                @error('address')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Post Code <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="" name="postCode" value="{{ isset($staffWorker)  ? $staffWorker->postCode : '' }}" placeholder="Your Post Code">
                                                @error('postCode')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Date of Birth <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="DOB" value="{{ isset($staffWorker) && !empty($staffWorker->DOB) ? \Carbon\Carbon::parse($staffWorker->DOB)->format('d-m-Y') : '' }}" id="DOB" placeholder="Date of Birth" readonly>
                                                @error('DOB')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Bank Details, Acct Number & Sort Code <span class="radStar">*</span></label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" name="account_num" value="{{ isset($staffWorker) ? $staffWorker->account_num : '' }}" id="" placeholder="Acct Number">
                                                @error('account_num')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="sort_code" value="{{ isset($staffWorker) ? $staffWorker->sort_code : ''}}" id="" placeholder="Sort Code">
                                                @error('sort_code')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Status </label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="status">
                                                    <option value="">Please Select</option>
                                                    <option value="residential" {{ old('status', $staffWorker?->status ?? '') == 'residential' ? 'selected' : '' }}>Residential</option>
                                                    <option value="supported_accomodation" {{ old('status', $staffWorker?->status ?? '') == 'supported_accomodation' ? 'selected' : '' }}>Supported Accomodation</option>
                                                    <option value="parental" {{ old('status', $staffWorker?->status ?? '') == 'parental' ? 'selected' : '' }}>Parental</option>
                                                    <option value="foundations_for_life" {{ old('status', $staffWorker?->status ?? '') == 'foundations_for_life' ? 'selected' : '' }}>Foundations for life</option>
                                                    <option value="office_staff" {{ old('status', $staffWorker?->status ?? '') == 'office_staff' ? 'selected' : '' }}>Office Staff</option>
                                                    <option value="leavers" {{ old('status', $staffWorker?->status ?? '') == 'leavers' ? 'selected' : '' }}>Leavers</option>
                                                </select>

                                                <!-- <select class="form-control" id="" name="status">
                                                    <option value="">Please Select</option>
                                                    <option value="residential">Residential</option>
                                                    <option value="supported_accomodation">Supported Accomodation</option>
                                                    <option value="parental">Parental</option>
                                                    <option value="foundations_for_life">Foundations for life</option>
                                                    <option value="office_staff">Office Staff</option>
                                                    <option value="leavers">Leavers</option>
                                                </select> -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Rate of Pay (£) <span class="radStar">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="rate_of_pay" value="{{ isset($staffWorker) ? $staffWorker->rate_of_pay : ''}}" id="" placeholder="Rate of Pay">
                                                @error('rate_of_pay')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-5">
                                                <select class="form-control" id="" name="level">
                                                    <option value="">Select Level</option>
                                                    <option value="qualified" {{ old('level', $staffWorker?->level ?? '') == 'qualified' ? 'selected' : '' }}>Qualified</option>
                                                    <option value="unqualified" {{ old('level', $staffWorker?->level ?? '') == 'unqualified' ? 'selected' : '' }}>Unqualified</option>
                                                </select>
                                                @error('level')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Start Date <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="start_date" id="start_Date" value="{{ isset($staffWorker) ? \Carbon\Carbon::parse($staffWorker->start_date)->format('d-m-Y') : ''}}" placeholder="Start Date" readonly>
                                                @error('start_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Job Role <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="job_role" id="" value="{{ isset($staffWorker) ? $staffWorker->job_role : '' }}" placeholder="Enter Job Role">
                                                @error('job_role')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">NIN <span class="radStar">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="NIN" id="" value="{{ isset($staffWorker) ? $staffWorker->NIN : '' }}" placeholder="Enter NIN">
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
                                                    <option value="1" {{ old('starter_declaration', $staffWorker?->starter_declaration ?? '') == '1' ? 'selected' : '' }}>Yes-A</option>
                                                    <option value="2" {{ old('starter_declaration', $staffWorker?->starter_declaration ?? '') == '2' ? 'selected' : '' }}>Yes-B</option>
                                                    <option value="3" {{ old('starter_declaration', $staffWorker?->starter_declaration ?? '') == '3' ? 'selected' : '' }}>Yes-C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Probation & Date (6 mth) Passed/Extended <span class="radStar">*</span></label>
                                            <div class="col-lg-3">
                                                <label class="control-label">Start date <span class="radStar">*</span></label>
                                                <input type="text" class="form-control" name="probation_start_date" value="{{ isset($staffWorker) && !empty($staffWorker->probation_start_date) ? \Carbon\Carbon::parse($staffWorker->probation_start_date)->format('d-m-Y')  : '' }}" id="probation_start_date" readonly>
                                                @error('probation_start_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="control-label">End date <span class="radStar">*</span></label>
                                                <input type="text" class="form-control" name="probation_end_date" value="{{ isset($staffWorker) && !empty($staffWorker->probation_end_date) ? \Carbon\Carbon::parse($staffWorker->probation_end_date)->format('d-m-Y')  : '' }}" id="probation_end_date" readonly>
                                                @error('probation_end_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="control-label">Extended date</label>
                                                <input type="text" class="form-control" name="probation_renew_date" value="{{ isset($staffWorker) && !empty($staffWorker->probation_renew_date)  ? \Carbon\Carbon::parse($staffWorker->probation_renew_date)->format('d-m-Y') : '' }}" id="probation_renew_date" readonly>
                                                @error('probation_renew_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">After Probation Enrolled in Private Medical <span class="radStar">*</span></label>
                                            <div class="col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="probation_enrollered" {{ old('probation_enrollered', isset($staffWorker) ? $staffWorker->probation_enrollered : '') == '1' ? 'checked' : '' }} id="inlineRadio1"  value="1"> Yes
                                                </label>
                                                <label class="radio-inline">    
                                                    <input type="radio" name="probation_enrollered" {{ old('probation_enrollered', isset($staffWorker) ? $staffWorker->probation_enrollered : '') == '0' ? 'checked' : '' }} id="inlineRadio2" value="0"> No
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
                                                    <option value="no_student_loan" {{ old('student_loan', $staffWorker?->student_loan ?? '') == 'no_student_loan' ? 'selected' : '' }} >No Student Loan</option>
                                                    <option value="postgraduate" {{ old('student_loan', $staffWorker?->student_loan ?? '') == 'postgraduate' ? 'selected' : '' }}>Postgraduate</option>
                                                    <option value="plan_1" {{ old('no_student_loan', $staffWorker?->student_loan ?? '') == 'plan_1' ? 'selected' : '' }}>Plan 1</option>
                                                    <option value="plan_2" {{ old('student_loan', $staffWorker?->student_loan ?? '') == 'plan_2' ? 'selected' : '' }}>Plan 2</option>
                                                    <option value="plan_4" {{ old('student_loann', $staffWorker?->student_loan ?? '') == 'plan_4' ? 'selected' : '' }}>Plan 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">DBS Clear </label>
                                            <div class="col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="dbs_clear" id="inlineRadio1" value="1" {{ old('dbs_clear', isset($staffWorker) ? $staffWorker->dbs_clear : '') == '1' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="dbs_clear" id="inlineRadio2" value="0" {{ old('dbs_clear', isset($staffWorker) ? $staffWorker->dbs_clear : '') == '0' ? 'checked' : '' }}> No
                                                </label>
                                                @error('dbs_clear')
                                                <div class="radStar">{{ $message }}</div>  1 x y : Insert a book with  pages at the end of the  shelf.
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">DBS Number </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="dbs_number" value="{{ isset($staffWorker) ? $staffWorker->dbs_number : ''}}" id="t" placeholder="1234567890">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">On DBS Update server</label>
                                            <div class="col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="dbs_service_update" id="inlineRadio1" value="1" {{ old('dbs_service_update', isset($staffWorker) ? $staffWorker->dbs_service_update : '') == '1' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="dbs_service_update" id="inlineRadio2" value="0" {{ old('dbs_service_update', isset($staffWorker) ? $staffWorker->dbs_service_update : '') == '0' ? 'checked' : '' }}> No
                                                </label>
                                                @error('dbs_service_update')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Leave Date</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="leave_date" value="{{ isset($staffWorker) && !empty($staffWorker->leave_date) ? \Carbon\Carbon::parse($staffWorker->leave_date)->format('d-m-Y') : '' }}" id="leave_date" placeholder="Leave Date" readonly>
                                                @error('leave_date')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Email Address </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="email" id="" value="{{ isset($staffWorker) ? $staffWorker->email : '' }}" placeholder="Enter mail ">
                                                @error('email')
                                                <div class="radStar">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Mobile</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="mobile" value="{{ isset($staffWorker) ? $staffWorker->mobile : '' }}" id="" placeholder="Mobile">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12 text-right">
                                                <button type="submit" class="btn btn-default">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
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