@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Time Sheet')

<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<style>
    .formDtail .text-danger {
        position: absolute;
    }
</style>
<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Time Sheet</h4>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="jobsection justify-content-end">
                                        <a href="javaScript:void(0)" type="button" class="profileDrop openTimeSheetModel" data-action="add"> <i class="fa fa-plus"></i> Add</a>
                                    </div>
                                </div>
                            </div>
                            <div class="productDetailTable mb-4 table-responsive">
                                <table class="table border-top border-bottom tablechange" id="staffWorker">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Hours</th>
                                            <th>Sleep</th>
                                            <th>Wake Night </th>
                                            <th>DIsturbance </th>
                                            <th>Annual Leave</th>
                                            <th>On Call</th>
                                            <th>Comments </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($time_sheets as $time_sheet)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $time_sheet->user->name ?? ''}}</td>
                                            <td>{{ $time_sheet->date }}</td>
                                            <td>{{ $time_sheet->hours }}</td>
                                            <td>{{ $time_sheet->sleep }}</td>
                                            <td>{{ $time_sheet->wake_night }}</td>
                                            <td>{{ $time_sheet->disturbance }}</td>
                                            <td>{{ $time_sheet->annual_leave }}</td>
                                            <td>{{ $time_sheet->on_call }}</td>
                                            <td>{{ $time_sheet->comments }}</td>
                                            <td>
                                                <a href="#!" class="openModalBtn openTimeSheetModel" data-action="edit" data-id="{{ $time_sheet->id }}" data-user_id="{{ $time_sheet->user_id }}" data-name="{{ $time_sheet->user->name }}" data-date="{{ $time_sheet->date }}" data-hours="{{ $time_sheet->hours }}" data-sleep="{{ $time_sheet->sleep }}" data-wake_night="{{ $time_sheet->wake_night }}" data-disturbance="{{ $time_sheet->disturbance }}" data-annual_leave="{{ $time_sheet->annual_leave }}" data-on_call="{{ $time_sheet->on_call }}" data-comments="{{ $time_sheet->comments }}" ><i class="fa fa-pencil" aria-hidden="true"></i></a> |
                                                <a href="#!" onclick="deleteStaff({{ $time_sheet->id }})" class="deleteBtn"><i class="fa fa-trash radStar" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
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
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="modalTitle">Add Staff</h4>
            </div>
            <form action="" id="time_sheet" class="customerForm ">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="row formDtail ps-4 pe-4">
                            <div class="col-md-6 form-group">
                                <label> User <span class="radStar">*</span> </label>
                                <select name="user_id" id="user_id" class="form-control editInput">
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Date <span class="radStar">*</span></label>
                                <input type="text" class="form-control editInput" id="timeSheetDate" name="date">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Hours </label>
                                <input type="text" class="form-control editInput" id="hours" name="hours">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Sleep </label>
                                <input type="text" class="form-control editInput" id="sleep" name="sleep">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Wake Night </label>
                                <input type="text" class="form-control editInput" id="wake_night" name="wake_night">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Disturbance </label>
                                <input type="text" class="form-control editInput" id="disturbance" name="disturbance">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Annual Leave </label>
                                <input type="text" class="form-control editInput" id="annual_leave" name="annual_leave">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> On Call </label>
                                <input type="text" class="form-control editInput" id="on_call" name="on_call">
                            </div>
                            <div class="col-md-12 form-group">
                                <label> Comments <span class="radStar">*</span></label>
                                <textarea class="form-control textareaInput" placeholder="Type your comments..." rows="3" id="comments" name="comments"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" id="save_time_sheet">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Staff Modal end here -->

<script>
    const timeSheetSaveUrl = "{{ url('/my-profile/time-sheet/add') }}";
    const deleteTimeSheet = "{{ url('/my-profile/time-sheet/delete') }}"
</script>

<script type="text/javascript" src="{{ url('public\frontEnd\js\personal\timeSheet.js') }}"></script>
@endsection