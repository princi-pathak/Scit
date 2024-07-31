@extends('backEnd.layouts.master')
@section('title',' :Leads From')
@section('content')
<style>
    #hiddenDiv {
        display: none;
    }

    #optionsDiv {
        display: none;
    }
</style>

<?php
if (isset($lead)) {
    $action   = route('leads.store');
    $task     = "Edit";
    $form_id  = 'edit_leads_form';
    $readonly = '';
} else {
    $action  = route('leads.store');
    $task    = "Add";
    $form_id = 'add_leads_form';
}
?>
<section id="main-content" class="">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Leads
                    </header>
                    <div class="panel-body">
                        @include('backEnd.salesFinance.leads.leads_button')

                        <form class="form-horizontal" role="form" method="Post" action="{{ $action }}" id="add_leads_form">
                            @csrf
                            <div class="row main_Form">
                                <div class="col-md-4">
                                    <label class="formTitle">Lead Details</label>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Lead Ref.</label>
                                        <div class="col-lg-9">
                                            <input type="hidden" name="lead_id" id="lead_id" value="{{ (isset($lead->id)) ? $lead->id : '' }}">
                                            <input type="hidden" name="customer_id" value="{{ (isset($lead->customer_id)) ? $lead->customer_id : '' }}">
                                            <input type="text" name="lead_ref" class="form-control" placeholder="Auto Generate" value="{{ (isset($lead->lead_ref)) ? $lead->lead_ref : '' }}" maxlength="255" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Assign To</label>
                                        <div class="col-lg-9">
                                            <select name="assign_to" id="assign_to" class="form-control">
                                                <option value="0">-Not Assigned-</option>
                                                @foreach($users as $value)
                                                <option value="{{ $value->id }}" {{ isset($lead->assign_to) && $lead->assign_to  == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Source</label>
                                        <div class="col-lg-9">
                                            <select name="source" class="form-control" id="">
                                                <option value="None">None</option>
                                                @foreach($sources as $value)
                                                <option value="{{ $value->id }}" {{ isset($lead->source) && $lead->source == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Status</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="status">
                                                <option value="">Select Status</option>
                                                @foreach($status as $value)
                                                <option value="{{ $value->id }}" @if($value->id == 6) disabled @endif {{ isset($lead->status) && $lead->status == $value->id ? 'selected' : '' }} >{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Preferred date to call</label>
                                        <div class="col-lg-5">
                                            <input type="date" name="prefer_date" class="form-control" value="{{ (isset($lead->prefer_date)) ? $lead->prefer_date : '' }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="time" name="prefer_time" class="form-control" value="{{ (isset($lead->prefer_time)) ? $lead->prefer_time : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="formTitle">Data Feilds</label>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Full Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ (isset($lead->contact_name)) ? $lead->contact_name : '' }}" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Company Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="{{ (isset($lead->name)) ? $lead->name : '' }}" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Email Address</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="email" class="form-control" placeholder="Email Address" value="{{ (isset($lead->email)) ? $lead->email : '' }}" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Telephone</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="telephone" class="form-control" placeholder="Telephone" value="{{ (isset($lead->telephone)) ? $lead->telephone : '' }}" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Mobile</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{ (isset($lead->mobile)) ? $lead->mobile : '' }}" maxlength="255">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Website</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="website" class="form-control" placeholder="Website" value="{{ (isset($lead->website)) ? $lead->website : '' }}" maxlength="255">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Address</label>
                                        <div class="col-lg-9">
                                            <textarea name="address" class="form-control" id="" placeholder="Address" rows="3">{{ (isset($lead->address)) ? $lead->address : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">City</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="city" class="form-control" placeholder="City" value="{{ (isset($lead->city)) ? $lead->city : '' }}" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Country</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="country" class="form-control" placeholder="Country" value="{{ (isset($lead->country)) ? $lead->country : '' }}" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Postal Code</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="postal_code" class="form-control" placeholder="Postal Code" value="{{ (isset($lead->postal_code)) ? $lead->postal_code : '' }}" maxlength="255">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="submit" class="btn btn-primary" value="Submit"> -->
                        </form>
                        <div class="from_outside_border mrg_tp" id="hiddenDiv">
                            <label class="upperlineTitle">Extra Information</label>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="extra_informationTabs">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" class="btn btn-primary" href="#notsTab">Notes</a></li>
                                            <li><a data-toggle="tab" class="btn btn-primary" href="#tasksTab">Tasks</a></li>
                                            <li><a data-toggle="tab" class="btn btn-primary" href="#attechmantsTab">Attechmants</a></li>
                                            <!-- <li><a class="btn btn-primary" href="#attechmentModel" data-toggle="modal">Attechmants</a></li> -->
                                        </ul>

                                        <div class="tab-content">
                                            <div id="notsTab" class="tab-pane fade in active">
                                                <div class="tabheadingTitle">
                                                    <h3>Notes - </h3>
                                                </div>
                                                <div class="tabform" action="">
                                                    <div class="form-group">
                                                        <label for="inputPassword1" class="col-lg-1 col-sm-2 control-label">Type</label>
                                                        <div class="col-lg-4">
                                                            <select class="form-control" id="notes_type" name="notes_type">
                                                                <option value="">Select Type</option>
                                                                @if(isset($notes_type))
                                                                @foreach($notes_type as $value)
                                                                <option value="{{ $value->id }}" {{ isset($lead->assign_to) && $lead->assign_to  == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-1" id="inputPlusCircle">
                                                            <a href="#notesModel" data-toggle="modal"><i class="fa  fa-plus-circle"></i> </a>
                                                        </div>


                                                        <!-- modal -->
                                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="notesModel" class="modal fade">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header terques-bg">
                                                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                                        <h4 class="modal-title pupTitle">History
                                                                            Type - Add</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form role="form" id="lead_notes_type_form">

                                                                            <div class="form-group">
                                                                                <label class="col-lg-3 col-sm-3 control-label">History
                                                                                    Type*</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="email" class="form-control" name="title" id="title" placeholder="Enter History Type">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Type</label>
                                                                                <div class="col-lg-4">
                                                                                    <select class="form-control" id="status" name="status">
                                                                                        <option value="1">Active</option>
                                                                                        <option value="0">Inactive</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" id="addNotesType">Save</button>
                                                                        <button type="button" class="btn btn-primary">Save & Close</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end Popup  -->
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-8">
                                                            <textarea class="form-control" name="notes" id="notes" rows="4" cols="70"></textarea>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="pddtp noteSaveBtn">
                                                                <button type="button" id="saveLeadNotes" class="btn btn-primary"><i class="fa fa-floppy-o"></i>
                                                                    Save Notes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="active">
                                                                <th>Data</th>
                                                                <th>By</th>
                                                                <th>Type</th>
                                                                <th>Notes</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($lead_notes_data))
                                                            @foreach($lead_notes_data as $value)
                                                            <tr>
                                                                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i') }}</td>
                                                                <td>{{ $value->home_id }}</td>
                                                                <td>{{ $value->title }}</td>
                                                                <td>{{ $value->notes }}</td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="tasksTab" class="tab-pane fade">
                                                <div class="tabheadingTitle">
                                                    <h3>TasksTab - </h3>
                                                    <a href="#tasksModel" data-toggle="modal" class="btn-primary open-modal">New Tasks</a>
                                                </div>

                                                <!-- modal -->
                                                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tasksModel" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header terques-bg">
                                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                                <h4 class="modal-title pupTitle">Add Task</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form role="form" id="addTask">
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 col-sm-3 control-label">Leads Ref.*</label>
                                                                        <div class="col-md-9">
                                                                            <input type="hidden" id="lead_task_id" name="lead_task_id">
                                                                            <input type="text" class="form-control" name="lead_ref" id="leadsRef" value="{{ (isset($lead->lead_ref)) ? $lead->lead_ref : '' }}" id="lead_ref" placeholder="Leads Ref." readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Task User</label>
                                                                        <div class="col-lg-9">
                                                                            <select class="form-control" name="user_id" id="user_id">
                                                                                @foreach($users as $value)
                                                                                <option value="{{ $value->id }}" {{ isset($lead->assign_to) && $lead->assign_to  == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Task Type</label>
                                                                        <div class="col-lg-9">
                                                                            <select class="form-control" id="lead_task_type_id" name="lead_task_type_id">
                                                                                @if(isset($leadTask))
                                                                                @foreach($leadTask as $value)
                                                                                <option value="{{ $value->id }}" {{ isset($lead->assign_to) && $lead->assign_to  == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
                                                                                @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Date</label>
                                                                        <div class="col-lg-4">
                                                                            <input type="date" id="create_date" name="create_date" class="form-control">
                                                                        </div>
                                                                        <div class="col-lg-1">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <input type="time" class="form-control" id="create_time" name="create_time">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 col-sm-3 control-label">Title*</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" id="task_title" name="title" placeholder="Enter title">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 col-sm-3 control-label">Contact Name*</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" id="canatact_name" name="canatact_name" value="{{ (isset($lead->contact_name)) ? $lead->contact_name : '' }}" placeholder="Enter name" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 col-sm-3 control-label">Contact Phone*</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" id="phone_num" name="phone_num" value="{{ (isset($lead->telephone)) ? $lead->telephone : '' }}" placeholder="Enter email" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Notify?</label>
                                                                        <div class="col-lg-2">
                                                                            <input type="checkbox" id="yeson">
                                                                            <label for="yeson">Yes, ON</label>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <input type="date" id="notify_date" name="notify_date" class="form-control">
                                                                        </div>
                                                                        <div class="col-lg-1">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <input type="time" class="form-control" id="notify_time" name="notify_time">
                                                                        </div>
                                                                        <div id="optionsDiv">
                                                                            <label>
                                                                                <input type="checkbox" value="1" id="notificationCheckbox" name="notification">
                                                                                Notification
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="1" id="emailCheckbox" name="email_notify">
                                                                                Email
                                                                            </label>
                                                                            <label>
                                                                                <input type="checkbox" value="1" id="smsCheckbox" name="sms_notify">
                                                                                SMS
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 col-sm-3 control-label">Notes</label>
                                                                        <div class="col-md-9">
                                                                            <textarea class="form-control" name="notes" id="notes" rows="4" cols="70"> </textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" id="saveAddTask">Save</button>
                                                                <button type="button" class="btn btn-primary">Save & Close</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end Popup  -->
                                                <div class="taskstab">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="active">
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>User</th>
                                                                <th>Tasks Type</th>
                                                                <th>Title</th>
                                                                <th>Contact Name</th>
                                                                <th>Contact Phone</th>
                                                                <th>Notify</th>
                                                                <th>Notes</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($lead_task))
                                                            @foreach($lead_task as $value)
                                                            <tr>
                                                                <td></td>
                                                                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y m:i')}}</td>
                                                                <td>{{ $value->name }}</td>
                                                                <td>{{ $value->task_type_title}}</td>
                                                                <td>{{ $value->title}}</td>
                                                                <td>{{$lead->contact_name}}</td>
                                                                <td>{{$lead->telephone}}</td>
                                                                <td> @if( $value->notification === 1 || $value->email_notify === 1 || $value->sms_notify === 1)
                                                                    Yes, on<br>
                                                                    {{ \Carbon\Carbon::parse($value->notify_date)->format('d/m/Y') }} {{ \Carbon\Carbon::parse($value->notify_time)->format('h:i') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $value->notes}}</td>
                                                                <td><a href="#" class="edit"><span style="color: #000;"><i data-toggle="modal" title="Edit" data-id="{{ $value->id }}" data-user_id="{{ $value->user_id }}" data-title="{{ $value->title }}" data-task_type_id="{{ $value->lead_task_type_id }}" data-create_date="{{ $value->create_date }}" data-create_time="{{ $value->create_time}}" data-notify_date="{{ $value->notify_date }}" data-notify_time="{{ $value->notify_time }}" data-notes="{{ $value->notes }}" data-notification="{{ $value->notification }}" data-email_notify="{{ $value->email_notify }}" data-sms_notify="{{ $value->sms_notify }}" data-target="#tasksModel" class="fa fa-edit fa-lg open-modal"></i></a> | <a href="{{ url('admin/sales-finance/leads/lead_task/delete',['task' => $value->id, 'lead_id' => $lead->id]) }}"><i data-toggle="tooltip" title="" class="fa fa-trash-o fa-lg" data-original-title="Delete" aria-describedby="tooltip895132"></i></a></td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                            <div id="attechmantsTab" class="tab-pane fade">
                                                <div class="tabheadingTitle">
                                                    <h3>attechmants - </h3>
                                                    <a href="#attechmentModel" data-toggle="modal" class="btn-primary open-modal-attachment">Attechments</a>
                                                </div>

                                                <!-- modal -->
                                                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="attechmentModel" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header terques-bg">
                                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                                <h4 class="modal-title pupTitle">Attechmants</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" id="imageUploadForm" enctype="multipart/form-data">
                                                                    <div><span id="error-message" class="error"></span></div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 col-sm-3 control-label">Leads Ref.*</label>
                                                                        <div class="col-md-9">
                                                                            <input type="hidden" name="lead_id" id="lead_id" value="{{ (isset($lead->id)) ? $lead->id : '' }}">
                                                                            <input type="hidden" id="lead_attachment_id" name="lead_attachment_id">
                                                                            <input type="text" class="form-control" name="lead_ref" id="leadsRef" value="{{ (isset($lead->lead_ref)) ? $lead->lead_ref : '' }}" id="lead_ref" placeholder="Leads Ref." readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Type</label>
                                                                        <div class="col-lg-9">
                                                                            <select class="form-control" name="attachment_type_id" id="attachment_type_id">
                                                                                <option value="">Select</option>
                                                                                @if(isset($attachment_type))
                                                                                @foreach($attachment_type as $value)
                                                                                <option value="{{ $value->id }}" {{ isset($lead->assign_to) && $lead->assign_to  == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
                                                                                @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 col-sm-3 control-label">File Name*</label>
                                                                        <div class="col-md-9">
                                                                            <input type="file" class="form-control" id="file" name="file">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 col-sm-3 control-label">Title</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" id="attachment_title" name="title" placeholder="Enter title">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 col-sm-3 control-label">Description</label>
                                                                        <div class="col-md-9">
                                                                            <textarea class="form-control" name="description" id="description" rows="4" cols="70"> </textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" id="saveAttachmentType">Save</button>
                                                                <button type="button" class="btn btn-primary">Save & Close</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end Popup  -->

                                                <!-- end Popup  -->
                                                <div class="taskstab">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="active">
                                                                <th>#</th>
                                                                <th>Type</th>
                                                                <th>Title</th>
                                                                <th>Description</th>
                                                                <th>File Name</th>
                                                                <th>Mime Type / Size</th>
                                                                <th>Created On</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($lead_attachment))
                                                            @foreach($lead_attachment as $value)
                                                            <tr>
                                                                <td></td>
                                                                <td>{{ $value['type'] }}</td>
                                                                <td>{{ $value['title'] }}</td>
                                                                <td>{{ $value['description'] }}</td>
                                                                <td>{{ $value['filename'] }}</td>
                                                                <td>{{ $value['mime_type'] }} / {{ $value['size'] }}</td>
                                                                <td>{{ $value['created_at'] }}</td>
                                                                <td><a href="{{ url('storage/app/public/lead_attachments/' . $value['filename']) }}" target="_blank"><i data-toggle="tooltip" data-original-title="View" class="fa fa-eye"></i></a> | <a href="{{ url('admin/sales-finance/leads/lead_attachments/delete', ['attachment_id' => $value['id'], 'lead_id' => $lead->id]) }}"><i data-toggle="tooltip" class="fa fa-trash-o fa-lg" data-original-title="Delete" aria-describedby="tooltip895132"></i></a></td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- **************** -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions formBottomBtn">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="edit-submit-btn-area">
                                        <button type="submit" class="btn btn-primary" id="submit_main_form" name="submit1">Save</button>
                                        <a href="{{ url('admin/company-managers') }}">
                                            <button type="button" class="btn btn-default" name="cancel">Cancel</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<script>
    $('#saveAttachmentType').on('click', function() {
        event.preventDefault();
        var form = document.getElementById('imageUploadForm');
        var imageInput = document.getElementById('file');
        var errorMessage = document.getElementById('error-message');
        errorMessage.textContent = '';

        // Check if an image is selected
        if (!imageInput.files || imageInput.files.length === 0) {
            event.preventDefault(); // Prevent form submission
            errorMessage.textContent = 'Please upload an image.';
        } else {
            console.log("submit form");
            // var formData = $('#imageUploadForm').serialize();
            var formData = new FormData(form);

            $.ajax({
                url: '{{ route("leads.ajax.saveLeadAttachment") }}',
                method: 'POST',
                contentType: false, // Prevent jQuery from setting Content-Type header
                processData: false, // Prevent jQuery from processing data
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#attechmentModel').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });

    document.getElementById('submit_main_form').addEventListener('click', function() {
        document.getElementById('add_leads_form').submit();
    });

    document.addEventListener('DOMContentLoaded', function() {
        var inputField = document.getElementById('lead_id');
        var hiddenDiv = document.getElementById('hiddenDiv');

        if (inputField.value.trim() !== '') {
            hiddenDiv.style.display = 'block'; // Show the div
        } else {
            hiddenDiv.style.display = 'none'; // Hide the div if input is empty
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $('#addNotesType').on('click', function() {
            var title = document.getElementById('title').value;
            var status = document.getElementById('status').value;
            $.ajax({
                url: '{{ route("leads.ajax.saveLeadNoteType") }}',
                method: 'POST',
                data: {
                    title: title,
                    status: status
                },
                success: function(response) {
                    alert(response.message);
                    $('#notesModel').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#saveLeadNotes').on('click', function() {
            var notes_type = document.getElementById('notes_type').value;
            var notes = document.getElementById('notes').value;
            var lead_id = document.getElementById('lead_id').value;

            $.ajax({
                url: '{{ route("leads.ajax.saveLeadNotes") }}',
                method: 'POST',
                data: {
                    notes_type_id: notes_type,
                    notes: notes,
                    lead_id: lead_id
                },
                success: function(response) {
                    alert(response.message);
                    $('#notesModel').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        var mainCheckbox = document.getElementById('yeson');
        var optionsDiv = document.getElementById('optionsDiv');

        mainCheckbox.addEventListener('change', function() {
            if (mainCheckbox.checked) {
                optionsDiv.style.display = 'block';
            } else {
                optionsDiv.style.display = 'none';
            }
        });

    });

    $('.open-modal').on('click', function() {
        var itemId = $(this).data('id');
        var itemUserId = $(this).data('user_id');
        var itemTitle = $(this).data('title');
        var itemLeadTaskTypeId = $(this).data('lead_task_type_id');
        var itemCreateDate = $(this).data('create_date');
        var itemCreateTime = $(this).data('create_time');
        var itemNotifyDate = $(this).data('notify_date');
        var itemNotifyTime = $(this).data('notify_time');
        var itemNotes = $(this).data('notes');
        var itemNotification = $(this).data('notification');
        var itemEmailNotify = $(this).data('email_notify');
        var itemSmsNotify = $(this).data('sms_notify');
        const notifyCheckbox = document.getElementById('yeson');
        const notificationCheckbox = document.getElementById('notificationCheckbox');
        const emailCheckbox = document.getElementById('emailCheckbox');
        const smsCheckbox = document.getElementById('smsCheckbox');
        var optionsDiv = document.getElementById('optionsDiv');
        const userSelect = document.getElementById('user_id');
        optionsDiv.style.display = 'none';
        notifyCheckbox.checked = false;

        $('#lead_task_id').val('');
        $('#task_title').val('');
        $('#create_date').val('');
        $('#create_time').val('');
        $('#notify_date').val('');
        $('#notify_time').val('');
        $('#notes').val('');
        $('.modal-title').text('');
        $('#saveChanges').text('');

        if (itemId) {
            $('#lead_task_id').val(itemId);

            const option = userSelect.querySelector(`option[value="${itemUserId}"]`);
            if (option) {
                option.selected = true;
            }

            const taskSelect = document.getElementById('lead_task_type_id');
            const optionTask = taskSelect.querySelector(`option[value="${itemLeadTaskTypeId}"]`);
            if (optionTask) {
                optionTask.selected = true;
            }
            $('#create_date').val(itemCreateDate);
            $('#create_time').val(itemCreateTime);
            $('#task_title').val(itemTitle);

            if (itemNotification === 1 || itemEmailNotify === 1 || itemSmsNotify === 1) {
                optionsDiv.style.display = 'block';
                notifyCheckbox.checked = true;
            } else {
                optionsDiv.style.display = 'none';
                notifyCheckbox.checked = false;
            }
            notificationCheckbox.checked = itemNotification === 1;
            emailCheckbox.checked = itemEmailNotify === 1;
            smsCheckbox.checked = itemSmsNotify === 1;

            $('#notify_date').val(itemNotifyDate);
            $('#notify_time').val(itemNotifyTime);
            $('#notes').val(itemNotes);
            $('.modal-title').text('Edit Lead Task ');
            $('#saveChanges').text('Save Changes');
        } else {
            // Adding new record (clear form fields if needed)

            $('.modal-title').text('Add Lead Task');
            $('#saveChanges').text('Add');
        }
    });

    document.getElementById('saveAddTask').addEventListener('click', function(event) {
        const yeson = document.getElementById('yeson').checked;
        const notifyDate = document.getElementById('notify_date').value;
        const notifyTime = document.getElementById('notify_time').value;
        const createDate = document.getElementById('create_date').value;
        const createTime = document.getElementById('create_time').value;
        const task_title = document.getElementById('task_title').value;

        if (yeson && (!notifyDate || !notifyTime)) {
            alert('Please select the notification date and time.');
            event.preventDefault(); // Prevent form submission
        } else if (!createDate & !createTime) {
            alert('Please select the date and time.');
            event.preventDefault(); // Prevent form submission
        } else if (!task_title) {
            alert('Please select title.');
            event.preventDefault(); // Prevent form submission
        } else {
            var formData = $('#addTask').serialize();
            console.log(formData);
            $.ajax({
                url: '{{ route("leads.ajax.saveLeadTasks") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#notesModel').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
</script>
@endsection