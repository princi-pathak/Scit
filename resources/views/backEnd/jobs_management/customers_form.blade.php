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
  .headBgColor{
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
                    <input type="hidden" name="status" value="2">
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
                                        <button type="button" class="btn btn-primary" onclick="open_additional_contact_model()">Add Contact</button>
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
                            </div>
                        </div>
                    </div>


                    <div class="from_outside_border mrg_tp">
                        <label class="upperlineTitle">Customer Sites</label>
                        <div class="row">
                            <div class="form-group padd0">
                                <div class="col-sm-12">
                                    <div class="pddtp">
                                        <button type="button" class="btn btn-primary">Add Site</button>
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
                            </div>
                        </div>
                    </div>

                    <div class="from_outside_border mrg_tp">
                        <label class="upperlineTitle">Customer Loginss</label>
                        <div class="row">
                            <div class="form-group padd0">
                                <div class="col-sm-12">
                                    <div class="pddtp">
                                        <button type="button" class="btn btn-primary">Add Login</button>
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
        <!-- Modal start here -->
        <div class="modal fade in" id="additionl_contact_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header headBgColor">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"> Add Customer Contact </h4>
                    </div>
                    <div class="modal-body">
                        <form class="row">
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <label class="col-lg-3">Customer*</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="om_complete" class="form-control" value="Arjun Kumar" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3 control-label">Default Billing</label>
                                    <div class="col-lg-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" checked>Option 1
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio">Option 2
                                        </label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3 control-label">Notify Who? *</label>
                                    <div class="col-lg-8">
                                        <select class="form-control">
                                            <option value="1">Tom</option>
                                            <option value="2">Jerry</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-1" id="inputPlusCircle">
                                        <a class="#!"><i class="fa  fa-plus-circle"></i> </a>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3">Email*</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="om_complete" class="form-control" value="demo@gmail.com">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3">Telephone</label>
                                    <div class="col-lg-9">
                                        <input type="number" name="om_complete" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3">Mobile</label>
                                    <div class="col-lg-9">
                                        <input type="number" name="om_complete" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3">Flex*</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="om_complete" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="row form-group">
                                    <label class="col-lg-3 control-label">Add Details </label>
                                    <div class="col-lg-9">
                                        <label class="checkbox-inline">
                                        Same as Default <input type="checkbox" name="checkbox">
                                        </label>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="col-lg-3 control-label">Address</label>
                                    <div class="col-lg-9">
                                       <textarea class="form-control" rows="4" cols="40"> </textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3"> City</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="om_complete" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3"> County</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="om_complete" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3 control-label">Pastcode</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="om_complete" class="form-control" value="">
                                    </div>
                                    <div class="col-lg-1" id="inputPlusCircle">
                                        <a class="#!"><i class="fa  fa-plus-circle"></i> </a>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-lg-3 control-label">Country</label>
                                    <div class="col-lg-9">
                                        <select class="form-control">
                                            <option value="1">Tom</option>
                                            <option value="2">Jerry</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                            
                            <!-- <div class="foor-box-wrap foor-plan">
                                <div class="custom-fieldset">
                                    <div class="custom-legend"><strong>Customer Contact</strong></div>
                                    <form id="notification_form">

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Notify When *</label>
                                            <div class="col-lg-9">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Notify Who? *</label>
                                            <div class="col-lg-9">
                                                <select class="form-select who_noti" name="who_noti" id="who_noti" multiselect-search="true" multiselect-select-all="true" multiselect-max-items="4" multiple="multiple">
                                                    <option value="1">Tom</option>
                                                    <option value="2">Jerry</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Notify Customer</label>
                                            <div class="col-lg-9">
                                                <input type="checkbox" name="om_complete" id="om_complete" value=""> On Complete
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Send As *</label>
                                            <div class="col-lg-9">
                                                <input type="checkbox" name="om_complete" id="om_complete_noti" value=""> Notification (User Only) <br>
                                                <input type="checkbox" name="sms" id="sms" value=""> SMS <br>
                                                <input type="checkbox" name="emailsend" id="emailsend" value=""> Email <br>
                                            </div>
                                        </div>

                                </div>
                                <div class="noti_button">
                                    <a href="javascript:" class="btn btn-primary" onclick="get_save_notification()">Save</a>
                                    <a href="javascript:" class="btn btn-primary">Cancel</a>
                                </div>
                                </form>
                            </div> -->
                        </form>
                    </div>
                    <div class="modal-footer noti_button">
                  
                                    <a href="javascript:" class="btn btn-primary" onclick="get_save_notification()">Save</a>
                                    <a href="javascript:" class="btn btn-primary">Cancel</a>
                             
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
                if ($.trim(data) == "done") {
                    window.location.href = '<?php echo url('admin/customers'); ?>';
                }
            }
        });

    }

    function open_additional_contact_model() {
        $("#additionl_contact_model").modal('show');
    }
</script>
@endsection