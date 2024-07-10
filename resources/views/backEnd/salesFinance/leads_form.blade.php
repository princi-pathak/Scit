@extends('backEnd.layouts.master')
@section('title',' :Company Manager Form')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{url('public/backEnd/js/select2.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{url('public/backEnd/css/select2.min.css')}}">

<?php
if (isset($user_info)) {
    $action   = url('admin/leads/edit/' );
    $task     = "Edit";
    $form_id  = 'edit_leads_form';
    $readonly = '';

    if (isset($del_status)) {
        if ($del_status == '1') {
            $disabled = 'disabled';
            $task = 'View';
        } else {
            $disabled = '';
        }
    }
} else {
    $action  = url('admin/leads/add');
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
                            <form class="form-horizontal" role="form" method="post" action="{{ $action }}" id="{{ $form_id }}" >
                                <label>Lead Details</label>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Lead Ref.</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lead_ref" class="form-control" placeholder="Lead Ref." value="{{ (isset($user_info->job_title)) ? $user_info->job_title : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Assign To</label>
                                    <div class="col-lg-9">
                                    <input type="text" name="assign_to" class="form-control" placeholder="Assign To" value="{{ (isset($user_info->payroll)) ? $user_info->payroll : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Source</label>
                                    <div class="col-lg-9">
                                    <input type="text" name="source" class="form-control" placeholder="Source" value="{{ (isset($user_info->payroll)) ? $user_info->payroll : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Status</label>
                                    <div class="col-lg-9">
                                    <select class="form-control" name="status">
                                        <option value="Contact Later">Contact Later</option>
                                        <option value="Contacted">Contacted</option>
                                        <option value="New">New</option>
                                        <option value="Pre-Qualified">Pre-Qualified</option>
                                        <option value="Qualified">Qualified</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                        <input type="text" name="status" class="form-control" value="{{ (isset($user_info->payroll)) ? $user_info->payroll : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Preferred date to call</label>
                                    <div class="col-lg-9">

                                        <input type="date" name="prefer_date" class="form-control" placeholder="holiday entitlement" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                        <input type="time" name="prefer_call" class="form-control" placeholder="holiday entitlement" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <label>Data Feilds</label>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Full Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Company Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email Address</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="email" class="form-control" placeholder="Email Address" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Telephone</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="telephone" class="form-control" placeholder="Telephone" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Mobile</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Website</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="website" class="form-control" placeholder="Website" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">City</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="city" class="form-control" placeholder="City" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Country</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="country" class="form-control" placeholder="Country" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Postal Code</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="postal_code" class="form-control" placeholder="Postal Code" value="{{ (isset($user_info->holiday_entitlement)) ? $user_info->holiday_entitlement : '' }}" maxlength="255" >
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="edit-submit-btn-area">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="user_id" value="{{ (isset($user_info->id)) ? $user_info->id : '' }}">
                                                <button type="submit" class="btn btn-primary" name="submit1" >Save</button>
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