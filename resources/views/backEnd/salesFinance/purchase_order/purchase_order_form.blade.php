@extends('backEnd.layouts.master')

@section('title',':User Form')

@section('content')

<style type="text/css">
    .position-center label {
        font-size: 20px;
        font-weight: 500;
    }

    .hover {
        cursor: pointer;
    }

    .custom-fieldset {
        position: relative;
        border: 2px solid #00000026;
        padding: 10px;
        margin-top: 20px;
        margin: 10px;
    }

    .custom-legend {
        position: absolute;
        top: -10px;
        left: 20px;
        background-color: white;
        font-weight: bold;
        padding: 0 10px;
    }

    .headBgColor {
        background-color: #1fb5ad;
    }

    .modal-header.headBgColor h4 {
        font-size: 16px;
        font-weight: 600;
        color: #fff;
    }

    /* .modal-body .row {
    margin-bottom: 1rem;
} */
</style>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                {{$task}} Purchase Order
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="alert alert-success text-center" id="msg" style="display:none;height:50px">
                <p>The Purchase Order has been saved Successfully</p>
            </div>
            <div class="panel-body">
                <!-- page start-->
                <form class="form-horizontal" role="form" enctype="multipart/form-data" id="form_data">
                    @csrf
                    <div class="from_outside_border">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Supplier Details</h4>
                                    <div class="form-group">
                                        <label for="Supplier" class="col-lg-4 col-sm-4 control-label">Supplier</label>
                                        <div class="col-lg-7">
                                            <select name="Supplier" id="Supplier" class="form-control ">
                                                <option selected disabled>Select Supplier</option>
                                                <option value="">Abhishek</option>
                                                <option value="">Manisha</option>
                                                <option value="">Mahima</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(1)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Contact" class="col-lg-4 col-sm-4 control-label">Contact</label>
                                        <div class="col-lg-7">
                                            <select class="form-control get_customer_result" name="Contact" id="Contact">
                                                <option selected disabled>Default</option>
                                                <option value="">Supplier</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(1)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Name_input" class="col-lg-4 col-sm-4 control-label">Name</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="Name_input" name="Name_input" placeholder="Swapnil" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress" class="col-lg-4 col-sm-4 control-label">Address</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textareaInput" name="inputAddress" id="inputAddress" rows="3" cols="70"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="City" class="col-lg-4 col-sm-4 control-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="City" name="City" placeholder="City" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="County" class="col-lg-4 col-sm-4 control-label">County</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="County" name="County" placeholder="County" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Postcode" class="col-lg-4 col-sm-4 control-label">Postcode</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Postcode" name="Postcode" placeholder="Postcode" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone" class="col-lg-4 col-sm-4 control-label">Telephone</label>
                                        <div class="col-lg-3">
                                            <select class="form-control editInput selectOptions" id="telephone_country_code" name="telephone_country_code">
                                                <option selected disabled>Please Select</option>
                                                <option value="">+91 India</option>
                                                <option value="">+91 India</option>
                                                <option value="">+91 India</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-lg-4 col-sm-4 control-label">Mobile</label>
                                        <div class="col-sm-3">
                                            <select class="form-control editInput selectOptions" id="mobile_country_code" name="mobile_country_code">
                                                <option selected disabled>Please Select</option>
                                                <option value="">+91 India</option>
                                                <option value="">+91 India</option>
                                                <option value="">+91 India</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email" class="col-lg-4 col-sm-4 control-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Customer / Delivery Details</h4>
                                    <div class="form-group">
                                        <label for="Supplier" class="col-lg-4 col-sm-4 control-label">Customer</label>
                                        <div class="col-lg-7">
                                            <select name="Supplier" id="Supplier" class="form-control ">
                                                <option selected disabled>Select Supplier</option>
                                                <option value="">Abhishek</option>
                                                <option value="">Manisha</option>
                                                <option value="">Mahima</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(1)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Project" class="col-lg-4 col-sm-4 control-label">Project</label>
                                        <div class="col-lg-7">
                                            <select name="Project" id="Project" class="form-control ">
                                                <option selected disabled></option>
                                                <option value="">Abhishek</option>
                                                <option value="">Manisha</option>
                                                <option value="">Mahima</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(1)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Site" class="col-lg-4 col-sm-4 control-label">Site</label>
                                        <div class="col-lg-7">
                                            <select name="Site" id="Site" class="form-control ">
                                                <option selected disabled>Same as Customer</option>
                                                <option value="">Abhishek</option>
                                                <option value="">Manisha</option>
                                                <option value="">Mahima</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(1)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-lg-4 col-sm-4 control-label">Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Company" class="col-lg-4 col-sm-4 control-label">Company</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Company" name="Company" placeholder="County" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress" class="col-lg-4 col-sm-4 control-label">Address</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textareaInput" name="inputAddress" id="inputAddress" rows="3" cols="70"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="City" class="col-lg-4 col-sm-4 control-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="City" name="City" placeholder="City" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="County" class="col-lg-4 col-sm-4 control-label">County</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="County" name="County" placeholder="County" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Postcode" class="col-lg-4 col-sm-4 control-label">Postcode</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Postcode" name="Postcode" placeholder="Postcode" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone" class="col-lg-4 col-sm-4 control-label">Telephone</label>
                                        <div class="col-lg-3">
                                            <select class="form-control editInput selectOptions" id="telephone_country_code" name="telephone_country_code">
                                                <option selected disabled>Please Select</option>
                                                <option value="">+91 India</option>
                                                <option value="">+91 India</option>
                                                <option value="">+91 India</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-lg-4 col-sm-4 control-label">Mobile</label>
                                        <div class="col-sm-3">
                                            <select class="form-control editInput selectOptions" id="mobile_country_code" name="mobile_country_code">
                                                <option selected disabled>Please Select</option>
                                                <option value="">+91 India</option>
                                                <option value="">+91 India</option>
                                                <option value="">+91 India</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Expected" class="col-lg-4 col-sm-4 control-label">Expected Delivery On</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="Expected" name="Expected" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-1">
                                            <i class="fa fa-calendar text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Purchase Order Details</h4>
                                    <div class="form-group">
                                        <label for="" class="col-lg-6 col-sm-6 control-label">Purchase Order Ref.</label>
                                        <div class="col-lg-5">
                                            <span>Auto generate</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-4 col-sm-4 control-label">Department</label>
                                        <div class="col-lg-7">
                                            <select name="Department" id="Department" class="form-control ">
                                                <option selected disabled>Please Select </option>
                                                <option value="">Management Department</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(1)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Purchase-date" class="col-lg-4 col-sm-4 control-label">Purchase Date</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="Purchase-date" name="Purchase-date" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-1">
                                            <i class="fa fa-calendar text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Reference" class="col-lg-4 col-sm-4 control-label">Reference</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="Reference" id="Reference" class="form-control" placeholder="Reference (if any)">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="Quote_ref" class="col-lg-4 col-sm-4 control-label">Quote Ref.</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Quote_ref" name="Quote_ref" placeholder="Quote Ref (if any)" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Job_reg" class="col-lg-4 col-sm-4 control-label">Job Reg</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Job_reg" name="Job_reg" placeholder="Job Reg (if any)" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat_tax_no" class="col-lg-4 col-sm-4 control-label">Invoice Ref</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="vat_tax_no" name="vat_tax_no" placeholder="Invoide ref(if any)" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_terms" class="col-lg-4 col-sm-4 control-label">Payment Terms</label>
                                        <div class="col-lg-5">
                                            <select class="form-control editInput selectOptions" id="payment_terms" name="payment_terms">
                                                <option value="">0</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <span class="afterInputText">
                                                Days
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Payment-due-date" class="col-lg-4 col-sm-4 control-label">Payment Due Date</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="Payment-due-date" name="Payment-due-date" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-1">
                                            <i class="fa fa-calendar text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Status</label>
                                        <div class="col-lg-8">
                                            <select name="" class="form-control" id="">
                                                <option value="">Draft</option>
                                                <option value="">Awaiting Approval</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-4 col-sm-4 control-label">Tags</label>
                                        <div class="col-lg-7">
                                            <select name="Tags" id="Tags" class="form-control ">
                                                <option selected disabled>None</option>
                                                <option value="">#Ram</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(1)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary"><i class="fa fa-clock-o"></i> Set Reminder</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- End off from_outside_border -->

                    <div class="from_outside_border mrg_tp">
                        <label class="upperlineTitle">Customer Message</label>
                        <div class="row">
                            <div class="form-group">
                                <label for="show_msg" class="col-lg-2 col-sm-2 control-label">Show Message</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="checkbox" name="show_msg" id="show_msg" value=""> Yes, show the message
                                    </label>
                                </div>
                            </div>

                            <div class="form-group padd0">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Message</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="4" cols="70" id="msg" name="msg"></textarea>
                                </div>
                            </div>

                            <div class="form-group padd0">
                                <label for="section_id" class="col-lg-2 col-sm-2 control-label">Section</label>
                                <div class="col-lg-4">
                                    <select class="form-control editInput selectOptions" id="section_id" name="section_id[]" multiselect-search="true" multiselect-select-all="true" multiselect-max-items="4" multiple="multiple">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="from_outside_border mrg_tp">
                    <label class="upperlineTitle">Additional Contacts</label>
                    <div class="row">
                        <div class="form-group padd0">
                            <div class="col-sm-12">
                                <div class="pddtp">
                                    <button type="button" class="btn btn-primary" onclick="get_modal(4)">Add Contact</button>
                                    <button type="button" class="btn btn-primary">Export</button>
                                    <button type="button" class="btn btn-primary">Import</button>
                                    <label class="clickhere">
                                        <a href="#!"> Click here</a><span> to download import template </span>
                                    </label>
                                    <label>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Bulk Action
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="padd0">
                            <table class="table">
                                <thead>
                                    <tr class="active">
                                        <th><input type="checkbox"></th>
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
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody id="contact_result">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="from_outside_border mrg_tp">
                    <label class="upperlineTitle">Customer Sites</label>
                    <div class="row">
                        <div class="form-group padd0">
                            <div class="col-sm-12">
                                <div class="pddtp">
                                    <button type="button" class="btn btn-primary" onclick="get_modal(5)">Add Site</button>
                                    <button type="button" class="btn btn-primary">Export</button>
                                    <button type="button" class="btn btn-primary">Import</button>
                                    <label class="clickhere">
                                        <a href="#!"> Click here</a><span> to download import template </span>
                                    </label>
                                    <label>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Bulk Action
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="padd0">
                            <table class="table">
                                <thead>
                                    <tr class="active">
                                        <th><input type="checkbox"></th>
                                        <th>Site Name</th>
                                        <th>Contact Name</th>
                                        <th>Customer Job Title</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>County</th>
                                        <th>Postcode</th>
                                        <th>Region </th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody id="site_result">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="from_outside_border mrg_tp">
                    <label class="upperlineTitle">Customer Login</label>
                    <div class="row">
                        <div class="form-group padd0">
                            <div class="col-sm-12">
                                <div class="pddtp">
                                    <button type="button" class="btn btn-primary" onclick="get_modal(6)">Add Login</button>
                                </div>
                            </div>
                        </div>

                        <div class="padd0">
                            <table class="table">
                                <thead>
                                    <tr class="active">
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Last Login</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="login_result">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="pddtp">
                    <button type="button" class="btn btn-primary" onclick="get_data()" id="submit_btnMain"><i class="fa fa-floppy-o"></i> Save</button>
                    <button type="button" class="btn btn-primary" onclick="return window.location.href='<?php echo url('admin/customers'); ?>'"><i class="fa fa-arrow-left"></i> Back</button>
                    <!-- <button type="button" class="btn btn-primary"><i class="fa fa-chevron-down"></i> Add</button> -->
                </div>
                <!-- </form> -->
                <!-- page end-->
            </div>


        </section>
        <!-- page end-->
        <!-- Customer Type Modal start -->
        <div class="modal fade in" id="cutomer_type_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Customer Type </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="from_outside_border">
                                    <div class="custom-legend"><strong>Add Customer Type</strong></div>
                                    <form id="customer_type_form">
                                        @csrf

                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Customer Type<span class="radStar ">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="customer_type_name" id="customer_type_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Status</label>
                                            <div class="col-lg-9">
                                                <select id="customer_type_status" name="customer_type_status" class="form-control editInput">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="noti_button">
                                            <a href="javascript:" class="btn btn-primary" onclick="save_customer_type()">Save</a>
                                            <a href="javascript:" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->
        <!-- Job title modal start -->
        <div class="modal fade in" id="job_title_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Job Title - Add </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="from_outside_border">
                                    <div class="custom-legend"><strong>Job Title - Add</strong></div>
                                    <form id="job_title_form">
                                        @csrf

                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Job Title<span class="radStar ">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="job_title_name" id="job_title_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Status</label>
                                            <div class="col-lg-9">
                                                <select id="job_title_status" name="job_title_status" class="form-control editInput">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="noti_button">
                                            <a href="javascript:" class="btn btn-primary" onclick="save_job_title()">Save</a>
                                            <a href="javascript:" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->
        <!-- Region Modal Start -->
        <div class="modal fade in" id="region_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Region </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="from_outside_border">
                                    <div class="custom-legend"><strong>Add Region</strong></div>
                                    <form id="region_form">
                                        @csrf

                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Region<span class="radStar ">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="region_name" id="region_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Status</label>
                                            <div class="col-lg-9">
                                                <select id="region_status" name="region_status" class="form-control editInput">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="noti_button">
                                            <a href="javascript:" class="btn btn-primary" onclick="save_region()">Save</a>
                                            <a href="javascript:" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->
        <!-- Modal additionl_contact_model start here -->
        <div class="modal fade in" id="additionl_contact_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Customer Contact </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="from_outside_border">
                                    <div class="custom-legend"><strong>Customer Contact</strong></div>
                                    <form id="contact_form">
                                        @csrf
                                        <input type="hidden" value="" name="contact_id" id="contact_id">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Customer</label>
                                                    <div class="col-lg-9">
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Default Billing</label>
                                                    <div class="col-lg-9">
                                                        <input type="radio" name="r" id="yes" class="billing"> Yes
                                                        <input type="radio" name="r" id="no" class="billing" checked> No
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Contact Name<span class="radStar ">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="customer_name" id="customer_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Job Title(Position)</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control who_noti" name="customer_job_titleid" id="customer_job_titleid">
                                                            <option selected disabled>Select Job Title</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Email</label>
                                                    <div class="col-lg-9">
                                                        <input type="email" name="customer_email" id="customer_email" class="form-control" onblur="getemail(2)">
                                                        <span id="emailErr2" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Telephone</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control editInput selectOptions" id="contact_telephone_country_code" name="contact_telephone_country_code">
                                                            <option selected disabled>Please Select</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 numberHifan">
                                                        -
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="customer_telephone" name="customer_telephone" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Mobile</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control editInput selectOptions" id="contact_mobile_country_code" name="contact_mobile_country_code">
                                                            <option selected disabled>Please Select</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 numberHifan">
                                                        -
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="customer_mobile" name="customer_mobile" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Fax</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" id="customer_fax" name="customer_fax" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Address Details</label>
                                                    <div class="col-lg-9">Same as Default
                                                        <input type="checkbox" name="defaultaddcheck" id="defaultaddcheck">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Address<span class="radStar ">*</span></label>
                                                    <div class="col-lg-9">
                                                        <textarea name="customer_address" class="form-control" id="customer_address" rows="3" cols="6"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">City</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" id="customer_city" name="customer_city" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Country</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" id="customer_country" name="customer_country" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Post Code</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" id="customer_post_code" name="customer_post_code" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Country</label>
                                                    <div class="col-lg-9">
                                                        <select id="customer_country_id" name="customer_country_id" class="form-control">
                                                            <option selected disabled>Select Country</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="noti_button">
                                            <a href="javascript:" class="btn btn-primary" onclick="get_save_contact()">Save</a>
                                            <a href="javascript:" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal add site start here -->
        <div class="modal fade in" id="customer_site" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Customer Site </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="from_outside_border">
                                    <!-- <div class="custom-legend"><strong>Customer Site</strong></div> -->
                                    <form id="site_form">
                                        @csrf
                                        <input type="hidden" value="" name="site_id" id="site_id">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Customer</label>
                                                    <div class="col-lg-9">
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Site Name<span class="radStar ">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="site_name" id="site_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Contact Name<span class="radStar ">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="site_contact_name" id="site_contact_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Job Title(Position)</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control who_noti" name="site_title_id" id="site_title_id">
                                                            <option selected disabled>Select Job Title</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Company Name</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="company_name" id="company_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Email</label>
                                                    <div class="col-lg-9">
                                                        <input type="email" name="site_email" id="site_email" class="form-control" onblur="getemail(3)">
                                                        <span id="emailErr3" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Telephone</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control editInput selectOptions" id="site_telephone_country_code" name="site_telephone_country_code">
                                                            <option selected disabled>Please Select</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 numberHifan">
                                                        -
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="site_telephone" name="site_telephone" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Mobile</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control editInput selectOptions" id="site_mobile_country_code" name="site_mobile_country_code">
                                                            <option selected disabled>Please Select</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 numberHifan">
                                                        -
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="site_mobile" name="site_mobile" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Fax</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" id="site_fax" name="site_fax" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Region</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="site_region" id="site_region">
                                                            <option selected disabled>Select Region</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Address<span class="radStar ">*</span></label>
                                                    <div class="col-lg-9">
                                                        <textarea name="site_address" class="form-control" id="site_address" rows="3" cols="6"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">City</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" id="site_city" name="site_city" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Country</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" id="site_country" name="site_country" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Post Code</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" id="site_post_code" name="site_post_code" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Country</label>
                                                    <div class="col-lg-9">
                                                        <select id="site_country_id" name="site_country_id" class="form-control">
                                                            <option selected disabled>Select Country</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Default Catalogue</label>
                                                    <div class="col-lg-9">
                                                        <select id="site_catalogue" name="site_catalogue" class="form-control">
                                                            <option selected disabled>Select Catalogue</option>
                                                            <option value="1">General</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="row form-group">
                                                    <label class="col-lg-2 control-label">Notes</label>
                                                    <div class="col-lg-10">
                                                        <textarea name="customer_site_notes" class="form-control" id="customer_site_notes" rows="3" cols="6"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="noti_button">
                                            <a href="javascript:" class="btn btn-primary" onclick="get_save_site()">Save</a>
                                            <a href="javascript:" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Login add Modal start here -->
        <div class="modal fade in" id="customer_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Customer Login </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="from_outside_border">
                                    <!-- <div class="custom-legend"><strong>Customer Site</strong></div> -->
                                    <form id="login_form">
                                        @csrf
                                        <input type="hidden" value="" name="login_id" id="login_id">

                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Email<span class="radStar ">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="email" name="login_email" id="login_email" class="form-control" onblur="getemail(4)">
                                                <span id="emailErr4" style="color: red;"></span>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Password Type<span class="radStar ">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="radio" id="pass1" name="pass"> Generate Now
                                                <input type="radio" id="pass2" name="pass" checked> Email Password
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Name<span class="radStar ">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="email" name="login_name" id="login_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Telephone</label>
                                            <div class="col-lg-9">
                                                <input type="text" id="login_telephone" name="login_telephone" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Access Right</label>
                                            <div class="col-lg-9">
                                                <input type="checkbox" id="login_check" name="login_check" value="1" class="login_check"> Quotes
                                                <input type="checkbox" id="login_check" name="login_check" value="2" class="login_check"> Jobs
                                                <input type="checkbox" id="login_check" name="login_check" value="3" class="login_check"> Invoices
                                                <input type="checkbox" id="login_check" name="login_check" value="4" class="login_check"> File Manager
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Projects</label>
                                            <div class="col-lg-9">
                                                <input type="radio" id="pro" class="pro" name="pro" checked> All
                                                <input type="radio" id="pro1" class="pro" name="pro"> Customise
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Notes</label>
                                            <div class="col-lg-9">
                                                <textarea name="login_notes" class="form-control" id="login_notes" rows="3" cols="6"></textarea>
                                            </div>
                                        </div>

                                        <div class="noti_button">
                                            <a href="javascript:" class="btn btn-primary" onclick="get_save_login()">Save</a>
                                            <a href="javascript:" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->
    </section>
</section>
<script src="{{url('public/backEnd/js/multiselect.js')}}"></script>


<script>
    function getemail(id) {
        var email;
        if (id == 1) {
            email = $('#email').val();
        } else if (id == 2) {
            email = $("#customer_email").val();
        } else if (id == 3) {
            email = $("#site_email").val();
        } else if (id == 4) {
            email = $("#login_email").val();
        }
        validRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<script>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (email.search(validRegExp) == -1) {
            $('#emailErr' + id).text("Please enter correct email address");
            return false;
        } else {
            $('#emailErr' + id).text("");
        }
    }
</script>
@endsection