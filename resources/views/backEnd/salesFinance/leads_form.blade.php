@extends('backEnd.layouts.master')
@section('title',' :Leads From')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{url('public/backEnd/js/select2.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{url('public/backEnd/css/select2.min.css')}}">

<?php
if (isset($lead)) {
    $action   = route('leads.store');
    $task     = "Edit";
    $form_id  = 'edit_leads_form';
    $readonly = '';

    // if (isset($del_status)) {
    //     if ($del_status == '1') {
    //         $disabled = 'disabled';
    //         $task = 'View';
    //     } else {
    //         $disabled = '';
    //     }
    // }
} else {
    $action  = route('leads.store');
    $task    = "Add";
    $form_id = 'add_leads_form';
}
?>


<style type="text/css">
    .edit-submit-btn-area .btn.btn-primary {
        margin: 0px 10px 0px 0px;
    }

    .position-center label {
        font-size: 20px;
        font-weight: 500;
    }

    .position-center .assign-access {
        font-size: 16px;
        font-weight: 500;
    }

    .edit-submit-btn-area {
        margin: 0px 0px 15px 0px;
    }

    .form-group .qualification-information {
        margin: -6px 0px 0px 0px;
    }

    .required:after {
        content: " *";
        color: red;
    }
</style>


<section id="main-content" class="">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Leads
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" role="form" method="Post" action="{{ $action }}" id="{{ $form_id }}">
                                @csrf
                                <label>Lead Details</label>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Lead Ref.</label>
                                    <div class="col-lg-9">
                                        <input type="hidden" name="lead_id" value="{{ (isset($lead->id)) ? $lead->id : '' }}">
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
                                            <option value="Checkatrade" {{ isset($lead->source) && $lead->source == "Checkatrade" ? 'selected' : '' }}>Checkatrade</option>
                                            <option value="Current Customer" {{ isset($lead->source) && $lead->source  == "Current Customer" ? 'selected' : '' }}>Current Customer</option>
                                            <option value="Telephone" {{ isset($lead->source) && $lead->source == "Telephone" ? 'selected' : '' }}>Telephone</option>
                                            <option value="Website" {{ isset($lead->source) && $lead->source  == "Website" ? 'selected' : '' }}>Website</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Status</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="Contact Later" {{ isset($lead->status) && $lead->status == "Contact Later" ? 'selected' : '' }}>Contact Later</option>
                                            <option value="Contacted" {{ isset($lead->status) && $lead->status == "Contacted" ? 'selected' : '' }}>Contacted</option>
                                            <option value="New" {{ isset($lead->status) && $lead->status == "New" ? 'selected' : '' }}>New</option>
                                            <option value="Pre-Qualified" {{ isset($lead->status) && $lead->status == "Pre-Qualified" ? 'selected' : '' }}>Pre-Qualified</option>
                                            <option value="Qualified" {{ isset($lead->status) && $lead->status == "Qualified" ? 'selected' : '' }}>Qualified</option>
                                            <option value="Rejected" {{ isset($lead->status) && $lead->status == "Rejected" ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Preferred date to call</label>
                                    <div class="col-lg-9">
                                        <input type="date" name="prefer_date" class="form-control" value="{{ (isset($lead->prefer_date)) ? $lead->prefer_date : '' }}" >
                                        <input type="time" name="prefer_time" class="form-control" value="{{ (isset($lead->prefer_time)) ? $lead->prefer_time : '' }}" >
                                    </div>
                                </div>
                                <label>Data Feilds</label>
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
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Website</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="website" class="form-control" placeholder="Website" value="{{ (isset($lead->website)) ? $lead->website : '' }}" maxlength="255">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{ (isset($lead->address)) ? $lead->address : '' }}" maxlength="255">
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
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-9">
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
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

@endsection