@extends('backEnd.layouts.master')

@section('title',':User Form')

@section('content')

<style type="text/css">
    .position-center label {
        font-size: 20px;
        font-weight: 500;
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
                {{$task}} Customer
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <!-- page start-->
                <form class="form-horizontal" role="form" enctype="multipart/form-data" id="form_data">
                    @csrf
                    <input type="hidden" name="home_id" value="{{$home_id}}">
                    <!-- <input type="hidden" name="status" value="2"> -->
                    <div class="from_outside_border">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Customer Details</h4>
                                    <div class="form-group">
                                        <label for="name" class="col-lg-4 col-sm-4 control-label">Customer Name *</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Customer Type</label>
                                        <div class="col-lg-7">
                                            <select class="form-control" name="customer_type_id" id="customer_type_id">
                                                <option selected disabled>Customer Type</option>
                                                <?php foreach ($customer_type as $type) { ?>
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="#!"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_name" class="col-lg-4 col-sm-4 control-label">Contact Name *</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="contact_name" name="contact_name" placeholder="Contact Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Job Title (Position)</label>
                                        <div class="col-lg-7">
                                            <select class="form-control" name="job_title" id="job_title">
                                                <option selected disabled>Job Title</option>
                                                <?php foreach ($job_title as $title) { ?>
                                                    <option value="{{$title->id}}">{{$title->name}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="#!"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-lg-4 col-sm-4 control-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone" class="col-lg-4 col-sm-4 control-label">Telephone</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="telephone" name="telephone" placeholder="Telephone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-lg-4 col-sm-4 control-label">Mobile</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fax" class="col-lg-4 col-sm-4 control-label">Fax</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="website" class="col-lg-4 col-sm-4 control-label">Website</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Default Catalogue</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" id="catalogue_id" name="catalogue_id">
                                                <option value="1">General Customer</option>
                                                <option value="2">General Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Status</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Address Details</h4>
                                    <div class="form-group">
                                        <label for="region" class="col-lg-4 col-sm-4 control-label">Region </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="region" name="region" placeholder="Region">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Address *</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="8" cols="70" id="address" name="address">

                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="col-lg-4 col-sm-4 control-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="city" name="city" placeholder="City">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class="col-lg-4 col-sm-4 control-label">County</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="country" name="country" placeholder="County">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_code" class="col-lg-4 col-sm-4 control-label">Postcode</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="postal_code" name="postal_code" placeholder="Postcode">
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a href="#!"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a href="#!"><i class="fa  fa-globe"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Country</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" id="country_code" name="country_code">
                                                <option selected disabled>Select Country</option>
                                                <?php foreach ($country as $con) { ?>
                                                    <option value="{{$con->code}}">{{$con->name}} ({{$con->code}})</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Site Notes</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="4" cols="70" id="site_notes" name="site_notes">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Other Details</h4>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Currency</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" id="currency" name="currency">
                                                <option selected disabled>Select Currency</option>
                                                <?php foreach ($country as $currency) { ?>
                                                    <option value="{{$currency->id}}">{{$currency->name}} ({{$currency->code}})</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="credit_limit" class="col-lg-4 col-sm-4 control-label">Credit Limit</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="credit_limit" name="credit_limit" placeholder="Credit Limit">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="discount" class="col-lg-4 col-sm-4 control-label">Discount</label>
                                        <div class="col-lg-4">
                                            <input type="email" class="form-control" id="discount" name="discount" placeholder="Discount">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Discount Type</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" id="discount_type" name="discount_type">
                                                <option value="1">General Offer</option>
                                                <option value="2">Festival Offer</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="saga_ref" class="col-lg-4 col-sm-4 control-label">Sage Ref.</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="saga_ref" name="saga_ref" placeholder="Sage Ref.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_reg" class="col-lg-4 col-sm-4 control-label">Company Reg</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="company_reg" name="company_reg" placeholder="Company Reg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat_tax_no" class="col-lg-4 col-sm-4 control-label">VAT / Tax No.</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="vat_tax_no" name="vat_tax_no" placeholder="VAT / Tax No.">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="payment_terms" class="col-lg-4 col-sm-4 control-label">Payment Terms</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="payment_terms" name="payment_terms" placeholder="Payment Terms">
                                        </div>
                                        <div class="col-lg-3">
                                            <span class="afterInputText">
                                                Days
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Assigned Products</label>
                                        <div class="col-sm-8">

                                            <label class="radio-inline">
                                                <input type="radio" id="assigned_product1" class="assigned_product"> Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" id="assigned_product2" class="assigned_product"> No
                                            </label>
                                            <input type="hidden" value="" name="assigned_product" id="assigned_product">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Notes</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="4" cols="70" id="notes" name="notes">

                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_tax" class="col-lg-4 col-sm-4 control-label">Dflt Products Tax</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" id="product_tax" name="product_tax">
                                                <option value="1">General Customer</option>
                                                <option value="2">General Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_tax" class="col-lg-4 col-sm-4 control-label">Dflt Services Tax</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" id="service_tax" name="service_tax">
                                                <option value="1">General Customer</option>
                                                <option value="2">General Customer</option>
                                            </select>
                                        </div>
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
                                        <input type="checkbox" name="show_msg" id="show_msg" value="0"> Yes, show the message
                                    </label>
                                </div>
                            </div>

                            <div class="form-group padd0">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Message</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="4" cols="70" id="msg" name="msg"> </textarea>
                                </div>
                            </div>

                            <div class="form-group padd0">
                                <label for="section_id" class="col-lg-2 col-sm-2 control-label">Section</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="section_id" name="section_id[]">
                                        <option value="1">Quote</option>
                                        <option value="2">Job</option>
                                        <option value="3">Invoice</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="from_outside_border mrg_tp">
                        <label class="upperlineTitle">Additional Contacts</label>
                        <div class="row">
                            <div class="form-group padd0">
                                <div class="col-sm-12">
                                    <div class="pddtp">
                                        <button type="button" class="btn btn-primary" onclick="open_additional_contact_model(1)">Add Contact</button>
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
                                        <button type="button" class="btn btn-primary" onclick="open_additional_contact_model(2)">Add Site</button>
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

                                        </tr>
                                    </thead>
                                    <tbody id="site_result">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="from_outside_border mrg_tp">
                        <label class="upperlineTitle">Customer Loginss</label>
                        <div class="row">
                            <div class="form-group padd0">
                                <div class="col-sm-12">
                                    <div class="pddtp">
                                        <button type="button" class="btn btn-primary" onclick="open_additional_contact_model(3)">Add Login</button>
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
                                        </tr>
                                    </thead>
                                    <tbody id="login_result">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="pddtp">
                        <button type="button" class="btn btn-primary" onclick="get_data()"><i class="fa fa-floppy-o"></i> Save</button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-chevron-down"></i> Add</button>
                    </div>
                </form>
                <!-- page end-->
            </div>
           

        </section>
        <!-- page end-->
        <!-- Modal additionl_contact_model start here -->
        <div class="modal fade in" id="additionl_contact_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Add Customer Contact </h4>
            </div>
            <div class="modal-body">
                <div class="row">  
                    <div class="foor-box-wrap foor-plan">
                        <div class="custom-fieldset">
                            <div class="custom-legend"><strong>Customer Contact</strong></div>
                            <form id="contact_form">
                            @csrf
                            <input type="hidden" value="" name="customer_id" id="customer_id">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Default Billing</label>
                                <div class="col-lg-9">
                                    <input type="radio" name="r" id="yes" class="billing"> Yes
                                    <input type="radio" name="r" id="no" class="billing"> No
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Contact Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="customer_name" id="customer_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Job Title(Position)</label>
                                <div class="col-lg-9">
                                <select class="form-control who_noti" name="customer_job_titleid" id="customer_job_titleid">
                                    <option selected disabled>Select Job Title</option>
                                    <?php foreach($job_title as $titleval){?>
                                    <option value="{{$titleval->id}}">{{$titleval->name}}</option>
                                    <?php }?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" name="customer_email" id="customer_email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Telephone</label>
                                <div class="col-lg-9">
                                    <input type="text" id="customer_telephone" name="customer_telephone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Mobile</label>
                                <div class="col-lg-9">
                                <input type="text" id="customer_mobile" name="customer_mobile" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Fax</label>
                                <div class="col-lg-9">
                                <input type="text" id="customer_fax" name="customer_fax" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Address Details</label>
                                <div class="col-lg-9">Same as Default
                                <input type="checkbox" id="check" name="check">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Address</label>
                                <div class="col-lg-9">
                                <textarea name="customer_address" class="form-control" id="customer_address" rows="10" cols="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">City</label>
                                <div class="col-lg-9">
                                    <input type="text" id="customer_city" name="customer_city" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Country</label>
                                <div class="col-lg-9">
                                    <input type="text" id="customer_country" name="customer_country" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Post Code</label>
                                <div class="col-lg-9">
                                    <input type="text" id="customer_post_code" name="customer_post_code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Country</label>
                                <div class="col-lg-9">
                                    <select id="customer_country_id" name="customer_country_id" class="form-control">
                                        <option selected disabled>Select Country</option>
                                        <?php foreach($country as $valc){?>
                                            <option value="{{$valc->id}}">{{$valc->name}}</option>
                                        <?php }?>
                                    </select>
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
<!-- Modal add site start here -->
<div class="modal fade in" id="customer_site" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Add Customer Site </h4>
            </div>
            <div class="modal-body">
                <div class="row">  
                    <div class="foor-box-wrap foor-plan">
                        <div class="custom-fieldset">
                            <!-- <div class="custom-legend"><strong>Customer Site</strong></div> -->
                            <form id="site_form">
                            @csrf
                            <input type="hidden" value="" name="site_customer_id" id="site_customer_id">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Site Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="site_name" id="site_name" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Contact Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="site_contact_name" id="site_contact_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Job Title(Position)</label>
                                <div class="col-lg-9">
                                <select class="form-control who_noti" name="site_title_id" id="site_title_id">
                                    <option selected disabled>Select Job Title</option>
                                    <?php foreach($job_title as $titleval){?>
                                    <option value="{{$titleval->id}}">{{$titleval->name}}</option>
                                    <?php }?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Company Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="company_name" id="company_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" name="site_email" id="site_email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Telephone</label>
                                <div class="col-lg-9">
                                    <input type="text" id="site_telephone" name="site_telephone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Mobile</label>
                                <div class="col-lg-9">
                                <input type="text" id="site_mobile" name="site_mobile" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Fax</label>
                                <div class="col-lg-9">
                                <input type="text" id="site_fax" name="site_fax" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Region</label>
                                <div class="col-lg-9">
                                <select class="form-control" name="site_region" id="site_region">
                                    <option selected disabled>Select Region</option>
                                   <option value="1">India</option>
                                   <option value="2">Pakistan</option>
                                   <option value="3">Afganistan</option>
                                   <option value="4">China</option>
                                   <option value="5">Korea</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Address</label>
                                <div class="col-lg-9">
                                <textarea name="site_address" class="form-control" id="site_address" rows="10" cols="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">City</label>
                                <div class="col-lg-9">
                                    <input type="text" id="site_city" name="site_city" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Country</label>
                                <div class="col-lg-9">
                                    <input type="text" id="site_country" name="site_country" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Post Code</label>
                                <div class="col-lg-9">
                                    <input type="text" id="site_post_code" name="site_post_code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Country</label>
                                <div class="col-lg-9">
                                    <select id="site_country_id" name="site_country_id" class="form-control">
                                        <option selected disabled>Select Country</option>
                                        <?php foreach($country as $valc){?>
                                            <option value="{{$valc->id}}">{{$valc->name}}</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Default Catalogue</label>
                                <div class="col-lg-9">
                                    <select id="site_catalogue" name="site_catalogue" class="form-control">
                                        <option selected disabled>Select Catalogue</option>
                                        <option value="1">General</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Notes</label>
                                <div class="col-lg-9">
                                <textarea name="customer_site_notes" class="form-control" id="customer_site_notes" rows="10" cols="10"></textarea>
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
<!-- Customer Login add Modal start here -->
<div class="modal fade in" id="customer_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Add Customer Login </h4>
            </div>
            <div class="modal-body">
                <div class="row">  
                    <div class="foor-box-wrap foor-plan">
                        <div class="custom-fieldset">
                            <!-- <div class="custom-legend"><strong>Customer Site</strong></div> -->
                            <form id="login_form">
                            @csrf
                            <input type="hidden" value="" name="login_customer_id" id="login_customer_id">
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" name="login_email" id="login_email" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password Type</label>
                                <div class="col-lg-9">
                                    <input type="radio" id="pass1" name="pass"> Generate Now
                                    <input type="radio" id="pass2" name="pass" checked> Email Password
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Name</label>
                                <div class="col-lg-9">
                                    <input type="email" name="login_name" id="login_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Telephone</label>
                                <div class="col-lg-9">
                                <input type="text" id="login_telephone" name="login_telephone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Access Right</label>
                                <div class="col-lg-9">
                                    <input type="checkbox" id="login_check" name="login_check" value="1" class="login_check"> Quotes
                                    <input type="checkbox" id="login_check" name="login_check" value="2" class="login_check"> Jobs
                                    <input type="checkbox" id="login_check" name="login_check" value="3" class="login_check"> Invoices
                                    <input type="checkbox" id="login_check" name="login_check" value="4" class="login_check"> File Manager
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Projects</label>
                                <div class="col-lg-9">
                                <input type="radio" id="pro" class="pro" name="pro" checked> All
                                <input type="radio" id="pro1" class="pro" name="pro"> Customise
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Notes</label>
                                <div class="col-lg-9">
                                <textarea name="login_notes" class="form-control" id="login_notes" rows="10" cols="10"></textarea>
                                </div>
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
        <!-- end here -->
    </section>
</section>
<script>
    $(document).ready(function() {
        $("#visible").change(function() {
            var visible = $('#visible');
            if ($('#visible').is(':checked')) {
                visible.val(1);
            }
        });
        $("#show_msg").change(function() {
            if ($('#show_msg').is(':checked')) {
                $("#show_msg").val(1);
            }
        });
        $(".assigned_product").change(function() {
            if ($(this).is(':checked')) {
                // $(this).val(1);
                $('#assigned_product').val(1);
            } else {
                $('#assigned_product').val(0);
            }
        });
    });

    function get_data() {
        // var name=$("#name").val();
        // var id=$("#id").val();
        var token = '<?php echo csrf_token(); ?>'
        // var firstErrorField = null;
        // if (name == '') {
        //     $("#nameError").show();
        //     if (!firstErrorField) firstErrorField = $('#name');
        // } else {
        //     $("#nameError").hide();
        // }
        // if (firstErrorField) {
        //     firstErrorField.focus();
        //     return false;
        // }else {

        // }
        $.ajax({
            type: "POST",
            url: "{{url('admin/customer_save')}}",
            data: new FormData($("#form_data")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $("#customer_id").val(data);
                $("#site_customer_id").val(data);
                $("#login_customer_id").val(data);
                // if($.trim(data)=="done"){
                //     window.location.href='<?php echo url('admin/customers'); ?>';
                // }
            }
        });

    }

    function open_additional_contact_model(id) {
        if(id == 1){
            $('#contact_form')[0].reset();
            $("#additionl_contact_model").modal('show');
        }else if(id == 2){ 
            $('#site_form')[0].reset();
            $("#customer_site").modal('show');
        }else if(id == 3){
            $('#login_form')[0].reset();
            $("#customer_login").modal('show');
        }
    }

    function get_save_contact() {
        var token = '<?php echo csrf_token(); ?>'
        var default_billing;
        if ($('#yes').is(':checked')) {
            default_billing = 1;
        } else {
            default_billing = 0;
        }
        var contact_name = $("#customer_name").val();
        var job_title_id = $("#customer_job_titleid").val();
        var customer_id = $("#customer_id").val();
        var email = $("#customer_email").val();
        var telephone = $("#customer_telephone").val();
        var mobile = $("#customer_mobile").val();
        var fax = $("#customer_fax").val();
        var address = $("#customer_address").val();
        var city = $("#customer_city").val();
        var country = $("#customer_country").val();
        var postcode = $("#customer_post_code").val();
        var country_id = $("#customer_country_id").val();

        $.ajax({
            type: "POST",
            url: "{{url('admin/customer_contact_save')}}",
            data: {
                _token: token,
                default_billing: default_billing,
                contact_name: contact_name,
                job_title_id: job_title_id,
                customer_id: customer_id,
                email: email,
                telephone: telephone,
                mobile: mobile,
                fax: fax,
                address: address,
                city: city,
                country: country,
                postcode: postcode,
                country_id: country_id
            },
            success: function(data) {
                console.log(data);
                $('#contact_result').append(data);
                $("#additionl_contact_model").modal('hide');
            }
        });
    }
    function get_save_site(){
        var token = '<?php echo csrf_token(); ?>'
        var customer_id = $("#site_customer_id").val();
        var site_name=$("#site_name").val();
        var contact_name = $("#site_contact_name").val();
        var title_id = $("#site_title_id").val();
        var company_name=$("#company_name").val();
        var region=$("#site_region").val();
        var catalogue=$("#site_catalogue").val();
        var notes=$("#customer_site_notes").val();
        var email = $("#site_email").val();
        var telephone = $("#site_telephone").val();
        var mobile = $("#site_mobile").val();
        var fax = $("#site_fax").val();
        var address = $("#site_address").val();
        var city = $("#site_city").val();
        var country = $("#site_country").val();
        var post_code = $("#site_post_code").val();
        var country_id = $("#site_country_id").val();

        $.ajax({
            type: "POST",
            url: "{{url('admin/customer_site_save')}}",
            data: {
                _token: token,
                site_name: site_name,
                contact_name: contact_name,
                title_id: title_id,
                customer_id: customer_id,
                email: email,
                telephone: telephone,
                mobile: mobile,
                fax: fax,
                address: address,
                city: city,
                country: country,
                post_code: post_code,
                country_id: country_id,
                region:region,
                notes:notes,
                catalogue:catalogue,
                company_name:company_name
            },
            success: function(data) {
                console.log(data);
                $("#site_result").append(data);
                $("#customer_site").modal('hide');
            }
        });
    }
    function get_save_login(){
        var token = '<?php echo csrf_token(); ?>'
        var email=$('#login_email').val();
        var customer_id=$("#login_customer_id").val();
        var password_type;
        if ($('#pass1').is(':checked')) {
            password_type = 1;
        } else {
            password_type = 2;
        }
        var name=$("#login_name").val();
        var telephone=$("#login_telephone").val();
       
        var access_rights=[];
        $('.login_check').each(function(){
            if ($(this).is(':checked')) {
                access_rights.push($(this).val());
            } 
        });
        access_rights=access_rights;
        var projects;
        if ($('#pro').is(':checked')) {
            projects = 1;
        } else {
            projects = 2;
        }
        var notes=$("#login_notes").val();
        // console.log(access_rights);
        // return false;
        $.ajax({
            type: "POST",
            url: "{{url('admin/customer_login_save')}}",
            data: {
                _token: token,email:email,customer_id:customer_id,password_type:password_type,name:name,telephone:telephone,access_rights:access_rights,projects:projects,notes:notes
            },
            success: function(data) {
                console.log(data);
                $("#login_result").append(data)
                $("#customer_login").modal('hide');
                // if ($.trim(data) == "done") {
                //     // window.location.href='<?php echo url('admin/customers'); ?>';
                // }
            }
        });
    }
</script>

@endsection