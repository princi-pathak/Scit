@extends('backEnd.layouts.master')
@section('title',' :Leads From')
@section('content')
<style>
    #hiddenDiv {
        display: none; /* Initially hide the div */
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

                        <form class=" form-horizontal" role="form" method="Post" action="{{ $action }}" id="{{ $form_id }}">
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
                                        <div class="col-lg-3">
                                            <input type="date" name="prefer_date" class="form-control" value="{{ (isset($lead->prefer_date)) ? $lead->prefer_date : '' }}">
                                        </div>
                                        <div class="col-lg-3">
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
                                            <!-- <input type="text" name="address" class="form-control" placeholder="Address" value="{{ (isset($lead->address)) ? $lead->address : '' }}" maxlength="255"> -->
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
                            <div class="from_outside_border mrg_tp" id="hiddenDiv">
                                <label class="upperlineTitle">Extra Information</label>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="extra_informationTabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" class="btn btn-primary" href="#notsTab">Notes</a></li>
                                                <li><a data-toggle="tab" class="btn btn-primary" href="#tasksTab">Tasks</a></li>
                                                <li><a class="btn btn-primary" href="#attechmentModel" data-toggle="modal">Attechmants</a></li>
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
                                                                    @foreach($notes_type as $value)
                                                                        <option value="{{ $value->id }}" {{ isset($lead->assign_to) && $lead->assign_to  == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
                                                                    @endforeach 
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
                                                                    <th>1</th>
                                                                    <th>Date</th>
                                                                    <th>By</th>
                                                                    <th>Type</th>
                                                                    <th>Notes</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>...</td>
                                                                    <td>...</td>
                                                                    <td>...</td>
                                                                    <td>...</td>
                                                                    <td>...</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="tasksTab" class="tab-pane fade">
                                                    <div class="tabheadingTitle">
                                                        <h3>TasksTab - </h3>

                                                        <a href="#tasksModel" data-toggle="modal" class="btn-primary">New Tasks</a>

                                                    </div>

                                                    <!-- modal -->
                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tasksModel" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header terques-bg">
                                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                                    <h4 class="modal-title pupTitle">History
                                                                        Type - Add</h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <form role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-lg-3 col-sm-3 control-label">Leads Ref.*</label>
                                                                            <div class="col-md-9">
                                                                                <input type="email" class="form-control" id="leadsRef" placeholder="Leads Ref.">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Type</label>
                                                                            <div class="col-lg-9">
                                                                                <select class="form-control">
                                                                                    <option>General1</option>
                                                                                    <option>General2</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Type</label>
                                                                            <div class="col-lg-9">
                                                                                <select class="form-control">
                                                                                    <option>General1</option>
                                                                                    <option>General2</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Date</label>
                                                                            <div class="col-lg-4">
                                                                                <input type="date" class="form-control">
                                                                            </div>
                                                                            <div class="col-lg-1">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <input type="time" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-lg-3 col-sm-3 control-label">History Type*</label>
                                                                            <div class="col-md-9">
                                                                                <input type="email" class="form-control" id="" placeholder="Enter email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-lg-3 col-sm-3 control-label">History Type*</label>
                                                                            <div class="col-md-9">
                                                                                <input type="email" class="form-control" id="" placeholder="Enter email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-lg-3 col-sm-3 control-label">History Type*</label>
                                                                            <div class="col-md-9">
                                                                                <input type="email" class="form-control" id="" placeholder="Enter email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Date</label>
                                                                            <div class="col-lg-2">
                                                                                <input type="checkbox" id="yeson">
                                                                                <label for="yeson">Yes, ON</label>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <input type="date" class="form-control">
                                                                            </div>
                                                                            <div class="col-lg-1">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <input type="time" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-lg-3 col-sm-3 control-label">Notes</label>
                                                                            <div class="col-md-9">
                                                                                <textarea class="form-control" rows="4" cols="70"> </textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary">Save</button>
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
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
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
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- <div id="attechmantsTab" class="tab-pane fade">
                                                    <h3>AttechmantsTab 2</h3>
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                        accusantium doloremque laudantium, totam rem aperiam.</p>
                                                </div> -->


                                                <!-- modal -->
                                                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="attechmentModel" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header terques-bg">
                                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                                <h4 class="modal-title pupTitle">Attechmants</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                <canvas id="canv1"></canvas>

                                                                <p class="uploadImg">
                                                                    <i class="fa fa-cloud-upload"></i>
                                                                    <input type="file" multiple="false" accept="image/*" id=finput onchange="upload()">
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary">Save</button>
                                                                <button type="button" class="btn btn-primary">Save & Close</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end Popup  -->


                                                <!-- **************** -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group padd0">
                                        <div class="col-sm-12">
                                            <div class="pddtp">
                                                <button type="button" class="btn btn-primary">Nots</button>
                                                <button type="button" class="btn btn-primary">Tasks</button>
                                                <button type="button" class="btn btn-primary">Attechmants</button>
                                          
                                            </div>
                                        </div>
                                    </div>

                                    <div class="padd0">
                                        <table class="table">
                                            <thead>
                                                <tr class="active">
                                                    <th>1</th>
                                                    <th>Contact Name</th>
                                                    <th>Customer Job Title</th>
                                                    <th>Email</th>
                                                    <th>Telephone</th>
                                                    <th>Mobile</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>County</th>
                                                    <th>Postcode</th>
                                                    <th>Default Billing </th>

                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                    <td>...</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> -->
                                </div>
                            </div>

                            <div class="form-actions formBottomBtn">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="edit-submit-btn-area">
                                            <button type="submit" class="btn btn-primary" name="submit1">Save</button>
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
    document.addEventListener('DOMContentLoaded', function() {
        var inputField = document.getElementById('lead_id');
        var hiddenDiv = document.getElementById('hiddenDiv');

        // inputField.addEventListener('input', function() {
        if (inputField.value.trim() !== '') {
            hiddenDiv.style.display = 'block'; // Show the div
        } else {
            hiddenDiv.style.display = 'none'; // Hide the div if input is empty
        }
        // });

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
                data: {title: title, status: status},
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
                data: {notes_type_id: notes_type, notes: notes, lead_id: lead_id},
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


    });

  

</script>
@endsection