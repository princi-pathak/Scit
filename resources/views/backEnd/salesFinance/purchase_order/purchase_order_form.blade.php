@extends('backEnd.layouts.master')

@section('title',' : User Form')

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
    <div class="wrapper">

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
                                <div>
                                    <h4 class="contTitle">Supplier Details</h4>
                                    <div class="row form-group">
                                        <label for="Supplier" class="col-lg-4 col-sm-4 control-label">Supplier</label>
                                        <div class="col-lg-7">
                                            <select name="Supplier" id="Supplier" class="form-control">
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
                                    <div class="row form-group">
                                        <label for="Contact" class="col-lg-4 col-sm-4 control-label">Contact</label>
                                        <div class="col-lg-7">
                                            <select class="form-control get_customer_result" name="Contact" id="Contact">
                                                <option selected disabled>Default</option>
                                                <option value="">Supplier</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(2)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Name_input" class="col-lg-4 col-sm-4 control-label">Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Name_input" name="Name_input" placeholder="Swapnil" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputAddress" class="col-lg-4 col-sm-4 control-label">Address</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textareaInput" name="inputAddress" id="inputAddress" rows="3" cols="70"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="City" class="col-lg-4 col-sm-4 control-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="City" name="City" placeholder="City" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="County" class="col-lg-4 col-sm-4 control-label">County</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="County" name="County" placeholder="County" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Postcode" class="col-lg-4 col-sm-4 control-label">Postcode</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Postcode" name="Postcode" placeholder="Postcode" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
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
                                    <div class="row form-group">
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
                                    <div class="row form-group">
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
                                    <div class="row form-group">
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
                                            <a class="javascript:void(0)" onclick="get_modal(3)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
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
                                            <a class="javascript:void(0)" onclick="get_modal(4)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
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
                                            <a class="javascript:void(0)" onclick="get_modal(5)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="name" class="col-lg-4 col-sm-4 control-label">Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="Company" class="col-lg-4 col-sm-4 control-label">Company</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Company" name="Company" placeholder="County" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputAddress" class="col-lg-4 col-sm-4 control-label">Address</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textareaInput" name="inputAddress" id="inputAddress" rows="3" cols="70"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="City" class="col-lg-4 col-sm-4 control-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="City" name="City" placeholder="City" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="County" class="col-lg-4 col-sm-4 control-label">County</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="County" name="County" placeholder="County" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Postcode" class="col-lg-4 col-sm-4 control-label">Postcode</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Postcode" name="Postcode" placeholder="Postcode" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
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
                                    <div class="row form-group">
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
                                    <div class="row form-group">
                                        <label for="Expected" class="col-lg-4 col-sm-4 control-label">Expected Delivery On</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="Expected" name="Expected" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-1 icon_blue">
                                            <i class="fa fa-calendar text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Purchase Order Details</h4>
                                    <div class="row form-group">
                                        <label for="" class="col-lg-6 col-sm-6 control-label">Purchase Order Ref.</label>
                                        <div class="col-lg-5">
                                            <span>Auto generate</span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="" class="col-lg-4 col-sm-4 control-label">Department</label>
                                        <div class="col-lg-7">
                                            <select name="Department" id="Department" class="form-control ">
                                                <option selected disabled>Please Select </option>
                                                <option value="">Management Department</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(6)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Purchase-date" class="col-lg-4 col-sm-4 control-label">Purchase Date</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="Purchase-date" name="Purchase-date" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-1 icon_blue">
                                            <i class="fa fa-calendar text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Reference" class="col-lg-4 col-sm-4 control-label">Reference</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="Reference" id="Reference" class="form-control" placeholder="Reference (if any)">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Quote_ref" class="col-lg-4 col-sm-4 control-label">Quote Ref.</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="Quote_ref" name="Quote_ref" placeholder="Quote Ref (if any)" value="">
                                        </div>
                                        <div class="col-lg-1 icon_blue">
                                            <i class="fa fa-search"></i>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Job_reg" class="col-lg-4 col-sm-4 control-label">Job Reg</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="Job_reg" name="Job_reg" placeholder="Job Reg (if any)" value="">
                                        </div>
                                        <div class="col-lg-1 icon_blue">
                                            <i class="fa fa-search"></i>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="vat_tax_no" class="col-lg-4 col-sm-4 control-label">Invoice Ref</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="vat_tax_no" name="vat_tax_no" placeholder="Invoide ref(if any)" value="">
                                        </div>
                                        <div class="col-lg-1 icon_blue">
                                            <i class="fa fa-search"></i>
                                        </div>
                                    </div>
                                    <div class="row form-group">
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
                                    <div class="row form-group">
                                        <label for="Payment-due-date" class="col-lg-4 col-sm-4 control-label">Payment Due Date</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="Payment-due-date" name="Payment-due-date" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-1 icon_blue">
                                            <i class="fa fa-calendar text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Status</label>
                                        <div class="col-lg-8">
                                            <select name="" class="form-control" id="">
                                                <option value="">Draft</option>
                                                <option value="">Awaiting Approval</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="" class="col-lg-4 col-sm-4 control-label">Tags</label>
                                        <div class="col-lg-7">
                                            <select name="Tags" id="Tags" class="form-control ">
                                                <option selected disabled>None</option>
                                                <option value="">#Ram</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(7)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary"><i class="fa fa-clock-o"></i> Set Reminder</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End off from_outside_border -->
                </form>

                <div class="from_outside_border mrg_tp">
                    <label class="upperlineTitle">Product Details</label>
                    <div class="row">
                        <div class="form-group padd0">
                            <div class="col-sm-12 for_spacing_b">
                                <div class="row d-flex align-items-center">
                                    <label for="" class="col-lg-2">Select product</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" placeholder="Type to add product">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center gap-3">
                                            <a class="icon_blue" onclick="get_modal(8)"><i class="fa fa-plus-circle"></i></a>
                                            <span class="afterPlusText"> (Type to view product or <a class="javascript:void(0)">Click here</a> to view all assets)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="padd0">
                            <table class="table">
                                <thead>
                                    <tr class="active">
                                        <th>Job</th>
                                        <th>Product</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>
                                            <div class="d-flex align-items-center gap-2">
                                                Account Code <a onclick="get_modal(9)" class="icon_blue"><i class="fa fa-plus-circle"></i></a>
                                            </div>
                                        </th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>
                                            <div class="d-flex align-items-center gap-2">
                                                Price VAT% <a onclick="get_modal(10)" class="icon_blue"><i class="fa fa-plus-circle"></i></a>
                                            </div>
                                        </th>
                                        <th>VAT</th>
                                        <th>Amount</th>
                                        <th>Delivered QTY</th>
                                        <th>Quantity Available</th>
                                    </tr>
                                </thead>
                                <tbody id="contact_result">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="from_outside_border mrg_tp">
                    <label class="upperlineTitle">Notes</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="">
                                <h4 class="contTitle">Supplier Notes</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="purchase_supplier_notes" name="supplier_notes"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h4 class="contTitle">Delivery Notes</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="purchase_delivery_notes" name="delivery_notes"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h4 class="contTitle">Internal Notes</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="purchase_internal_notes" name="internal_notes"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="from_outside_border mrg_tp">
                    <label class="upperlineTitle">Attachments</label>
                    <div class="row">
                        <div class="col-md-12 jobsection">
                            <button type="button" class="btn btn-primary">New Attachments</button>
                        </div>
                    </div>
                </div>

                <div class="from_outside_border mrg_tp">
                    <label class="upperlineTitle">Tasks</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="jobsection">
                                <a href="javascript:void(0)" class="btn btn-primary">New Task</a>
                            </div>
                        </div>
                        <div class="col-sm-12 padd0">
                            <div>
                                <a href="javascript:void(0)" class="btn btn-primary" id="task_active_inactive" style="background-color:#474747" onclick="bgColorChange(1)">Tasks</a>
                                <a href="javascript:void(0)" class="btn btn-primary" id="recurring_active_inactive" onclick="bgColorChange(2)">Recurring Tasks</a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="jobsection">
                                <table class="table">
                                    <thead>
                                        <tr class="active">
                                            <th>Date</th>
                                            <th>Ref</th>
                                            <th>User</th>
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Notes</th>
                                            <th>Created On</th>
                                            <th>Executed</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="newtask_result"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pddtp d-flex justify-content-end gap-3 padd0">
                <button type="button" class="btn btn-primary" onclick="get_data()" id="submit_btnMain">
                    <i class="fa fa-floppy-o"></i> Save</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-chevron-down"></i> Action </button>
            </div>

            <!-- </form> -->
            <!-- page end-->

        </section>
        <!-- page end-->

        <!-- New Supplier Modal start -->
        <div class="modal fade in" id="Add_Supplier_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle">New Supplier </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <form id="Add_Supplier_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row form-group">
                                        <label for="Supplier_input" class="col-lg-4 col-sm-4 control-label">Supplier Supplier</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Supplier_input" name="Supplier_input" placeholder="Enter Supplier Name" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="SupplierCode_input" class="col-lg-4 col-sm-4 control-label">Supplier Code</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="SupplierCode_input" name="SupplierCode_input" placeholder="Enter Supplier Code" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="ContactName_input" class="col-lg-4 col-sm-4 control-label">Contact Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="ContactName_input" name="ContactName_input" placeholder="Enter Contact Name" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="email_input" class="col-lg-4 col-sm-4 control-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="email_input" name="email_input" placeholder="Enter Supplier email" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="fax_input" class="col-lg-4 col-sm-4 control-label">Fax</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="fax_input" name="fax_input" placeholder="Enter Supplier Fax" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Telephone</label>
                                        <div class="col-sm-2 pe-0">
                                            <select class="form-control editInput selectOptions" id="contact_telephone_country_code" name="contact_telephone_country_code">
                                                <option selected disabled>Please Select</option>

                                            </select>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" id="customer_telephone" name="customer_telephone" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Mobile</label>
                                        <div class="col-sm-2 pe-0">
                                            <select class="form-control editInput selectOptions" id="contact_mobile_country_code" name="contact_mobile_country_code">
                                                <option selected disabled>Please Select</option>

                                            </select>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" id="customer_mobile" name="customer_mobile" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="supplier_website" class="col-sm-3 col-form-label">Website</label>
                                        <div class="col-sm-2 pe-0">
                                            <div class="tag_box text-center">
                                                <span style="padding:7px">http://</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput textareaInput" placeholder="Enter Supplier Website" id="supplier_website" name="website">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="supplier_status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="supplier_status" name="status">
                                                <option value='1'>Active</option>
                                                <option value='0'>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row form-group">
                                        <label for="address_input" class="col-lg-4 col-sm-4 control-label">Address</label>
                                        <div class="col-lg-8">
                                            <textarea name="address_input" id="address_input" class="form-control" placeholder="Enter Supplier Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="city_input" class="col-lg-4 col-sm-4 control-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="city_input" name="city_input" placeholder="Enter Supplier City" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="County_input" class="col-lg-4 col-sm-4 control-label">County</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="County_input" name="County_input" placeholder="Enter Supplier County" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Postcode_input" class="col-lg-4 col-sm-4 control-label">Postcode</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Postcode_input" name="Postcode_input" placeholder="Enter Supplier Postcode" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="supplier_country_id"
                                            class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="supplier_country_id" name="country_id">
                                                <option selected disabled>Select Country</option>
                                                <option value="">India</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="supplier_account_ref" class="col-sm-3 col-form-label">Account Ref.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" placeholder="Enter Supplier Account Ref." id="supplier_account_ref" name="account_ref">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="supplier_currency_id" class="col-sm-3 col-form-label">Currency</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="supplier_currency_id" name="currency_id">
                                                <option value="" selected>British Pound</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="supplier_creadit_limit" class="col-sm-3 col-form-label">Credit Limit</label>
                                        <div class="col-sm-2 pe-0">
                                            <div class="tag_box text-center">
                                                <span style="padding:7px">£</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput textareaInput" placeholder="Enter Supplier Credit Limit" name="creadit_limit" id="supplier_creadit_limit" value="" maxlength="8">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="mb-2 notes_input">
                                        <label for="supplier_note" class="col-form-label">Notes</label>
                                        <textarea class="form-control textareaInput" placeholder="Enter Supplier Notes" rows="3" id="supplier_note" name="notes"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 pddtp">
                                    <div class="noti_button">
                                        <a href="javascript:" class="btn btn-primary" onclick="save_customer_type()">Save</a>
                                        <a href="javascript:" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->

        <!-- Add Supplier Contact modal start -->
        <div class="modal fade in" id="Add_Supplier_Contact_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle">Add Supplier Contact</h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <form id="Add_Supplier_Contact_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row form-group">
                                        <label for="Supplier_input" class="col-lg-4 col-sm-4 control-label">Supplier</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Supplier_input" name="Supplier_input" placeholder="Enter Supplier Name" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="ContactName_input" class="col-lg-4 col-sm-4 control-label">Contact Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="ContactName_input" name="ContactName_input" placeholder="Enter Contact Name" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Supplier" class="col-lg-4 col-sm-4 control-label">Job Title (Position)</label>
                                        <div class="col-lg-7">
                                            <select name="Supplier" id="Supplier" class="form-control">
                                                <option selected disabled>Please Select</option>
                                                <option value="">Python Developer</option>
                                                <option value="">iOS Developer</option>
                                                <option value="">Php Developer</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(1)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="email_input" class="col-lg-4 col-sm-4 control-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="email_input" name="email_input" placeholder="Enter Supplier email" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="fax_input" class="col-lg-4 col-sm-4 control-label">Fax</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="fax_input" name="fax_input" placeholder="Enter Supplier Fax" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Telephone</label>
                                        <div class="col-sm-2 pe-0">
                                            <select class="form-control editInput selectOptions" id="contact_telephone_country_code" name="contact_telephone_country_code">
                                                <option selected disabled>Please Select</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" id="customer_telephone" name="customer_telephone" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Mobile</label>
                                        <div class="col-sm-2 pe-0">
                                            <select class="form-control editInput selectOptions" id="contact_mobile_country_code" name="contact_mobile_country_code">
                                                <option selected disabled>Please Select</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" id="customer_mobile" name="customer_mobile" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row form-group">
                                        <label for="address_input" class="col-lg-4 col-sm-4 control-label">Address Details</label>
                                        <div class="col-lg-8">
                                            <span>same as default</span>
                                            <input type="checkbox">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="address_input" class="col-lg-4 col-sm-4 control-label">Address</label>
                                        <div class="col-lg-8">
                                            <textarea name="address_input" id="address_input" class="form-control" placeholder="Enter Supplier Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="city_input" class="col-lg-4 col-sm-4 control-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="city_input" name="city_input" placeholder="Enter Supplier City" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="County_input" class="col-lg-4 col-sm-4 control-label">County</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="County_input" name="County_input" placeholder="Enter Supplier County" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Postcode_input" class="col-lg-4 col-sm-4 control-label">Postcode</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="Postcode_input" name="Postcode_input" placeholder="Enter Supplier Postcode" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="supplier_country_id"
                                            class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="supplier_country_id" name="country_id">
                                                <option selected disabled>Select Country</option>
                                                <option value="">India</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pddtp">
                                    <div class="noti_button">
                                        <a href="javascript:" class="btn btn-primary" onclick="save_customer_type()">Save</a>
                                        <a href="javascript:" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->

        <!-- Add Customer Modal Start -->
        <div class="modal fade in" id="Add_Customer_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Customer </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="from_outside_border">
                                    <div class="custom-legend"><strong>Add Region</strong></div>
                                    <form id="Add_Customer_form">
                                        @csrf

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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->

        <!-- Add Project modal start here -->
        <div class="modal fade in" id="Add_Project_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Project </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <form id="Add_Project_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Project Ref</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="Project_name" id="Project_name" placeholder="Project Ref ###" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Customer</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="customer_name" id="customer_name" placeholder="Mahima" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Project Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="customer_name" id="customer_name" placeholder="Enter Project Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Start_date" class="col-lg-3 col-sm-3 control-label">Start Date</label>
                                        <div class="col-lg-7">
                                            <input type="date" class="form-control" id="Start_date" name="Start_date" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-2 icon_blue">
                                            <i class="fa fa-calendar text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="End_date" class="col-lg-3 col-sm-3 control-label">End Date</label>
                                        <div class="col-lg-7">
                                            <input type="date" class="form-control" id="End_date" name="End_date" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-2 icon_blue">
                                            <i class="fa fa-calendar text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="Project_value" class="col-sm-3 col-form-label">Project Value</label>
                                        <div class="col-sm-2 pe-0">
                                            <div class="tag_box text-center">
                                                <span style="padding:7px">£</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput textareaInput" placeholder="Enter Supplier Project Value" id="Project_value" value="" maxlength="8">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Description</label>
                                        <div class="col-lg-9">
                                            <textarea name="site_address" placeholder="Enter Project Description" class="form-control" id="site_address" rows="3" cols="6"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Status</label>
                                        <div class="col-lg-9">
                                            <select name="" class="form-control" id="">
                                                <option value="">Draft</option>
                                                <option value="">Awaiting Approval</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pddtp">
                                    <div class="noti_button">
                                        <a href="javascript:" class="btn btn-primary" onclick="save_customer_type()">Save</a>
                                        <a href="javascript:" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->

        <!-- Add Site Address modal start here -->
        <div class="modal fade in" id="Add_Site_Address_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Site Address </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="from_outside_border">
                                    <!-- <div class="custom-legend"><strong>Customer Site</strong></div> -->
                                    <form id="Add_Site_Address_form">
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
        <!-- end here -->

        <!-- Department add Modal start here -->
        <div class="modal fade in" id="Department_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Department - Add </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <form id="Department_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Department</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="Department_input" name="Department_input" placeholder="Enter Department" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Status</label>
                                        <div class="col-lg-9">
                                            <select name="" class="form-control" id="">
                                                <option value="">Active</option>
                                                <option value="">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->

        <!-- Add Tags Modal start here -->
        <div class="modal fade in" id="Add_Tags_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Tag </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <form id="Add_Tags_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Tag</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="Tag_input" name="Tag_input" placeholder="Enter Tag" value="">
                                            <b class="text-danger">Note: Comma not allowed in the tag. The previous name will not be populated by the rename tag.</b>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Status</label>
                                        <div class="col-lg-9">
                                            <select name="" class="form-control" id="">
                                                <option value="">Active</option>
                                                <option value="">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->

        <!-- Add Product Modal start here -->
        <div class="modal fade in" id="Product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle">Add Product</h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <form id="Product_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Add Product</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="product_input" name="product_input" placeholder="Enter Tag" value="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Status</label>
                                        <div class="col-lg-9">
                                            <select name="" class="form-control" id="">
                                                <option value="">Active</option>
                                                <option value="">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->

        <!-- Add department code Modal start here -->
        <div class="modal fade in" id="Departmental_Code_Add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Departmental Code </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <form id="Departmental_Code_Add_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Tag</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="Tag_input" name="Tag_input" placeholder="Enter Tag" value="">
                                            <b class="text-danger">Note: Comma not allowed in the tag. The previous name will not be populated by the rename tag.</b>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Status</label>
                                        <div class="col-lg-9">
                                            <select name="" class="form-control" id="">
                                                <option value="">Active</option>
                                                <option value="">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->

        <!-- Add Tax Rate start here -->
        <div class="modal fade in" id="Add_Tax_Rate_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header terques-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title pupTitle"> Add Tax Rate </h4>
                    </div>
                    <div class="modal-body pdbotm">
                        <form id="Add_Tax_Rate_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <label class="col-lg-3 control-label">Tag</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="Tag_input" name="Tag_input" placeholder="Enter Tag" value="">
                                            <b class="text-danger">Note: Comma not allowed in the tag. The previous name will not be populated by the rename tag.</b>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Status</label>
                                        <div class="col-lg-9">
                                            <select name="" class="form-control" id="">
                                                <option value="">Active</option>
                                                <option value="">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->

    </div>
</section>

<script src="{{url('public/backEnd/js/multiselect.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

<script>
    //Text Editer

    var editor_config = {
        toolbar: [{
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
            },
            {
                name: 'format',
                items: ['Format']
            },
            {
                name: 'paragraph',
                items: ['Indent', 'Outdent', '-', 'BulletedList', 'NumberedList']
            },
            {
                name: 'link',
                items: ['Link', 'Unlink']
            },
            {
                name: 'undo',
                items: ['Undo', 'Redo']
            }
        ],
    };

    CKEDITOR.replace('purchase_supplier_notes', editor_config);
    CKEDITOR.replace('purchase_delivery_notes', editor_config);
    CKEDITOR.replace('purchase_internal_notes', editor_config);
    //Text Editer
</script>
<!-- for modal start -->

<script>
    function get_modal(id) {
        var key = $("#id").val();
        if (id == 4 || id == 5 || id == 6 || id == 7 || id == 8 || id == 9 || id == 10) {
            if (key == '') {
                alert("Please save Customer first");
                return false;
            } else {
                if (id == 4) {
                    $('#Add_Project_form')[0].reset();
                    $("#Add_Project_modal").modal('show');
                } else if (id == 5) {
                    $('#Add_Site_Address_form')[0].reset();
                    $("#Add_Site_Address_modal").modal('show');
                } else if (id == 6) {
                    $('#Department_form')[0].reset();
                    $("#Department_modal").modal('show');
                } else if (id == 7) {
                    $('#Add_Tags_form')[0].reset();
                    $("#Add_Tags_modal").modal('show');
                } else if (id == 8) {
                    $('#Product_form')[0].reset();
                    $("#Product_modal").modal('show');
                } else if (id == 9) {
                    $('#Departmental_Code_Add_form')[0].reset();
                    $("#Departmental_Code_Add_modal").modal('show');
                } else if (id == 10) {
                    $('#Add_Tax_Rate_form')[0].reset();
                    $("#Add_Tax_Rate_modal").modal('show');
                }

            }
        } else if (id == 1) {
            $("#Add_Supplier_form")[0].reset();
            $("#Add_Supplier_modal").modal('show');
        } else if (id == 2) {
            $("#Add_Supplier_Contact_form")[0].reset();
            $("#Add_Supplier_Contact_modal").modal('show');
        } else if (id == 3) {
            $("#Add_Customer_form")[0].reset();
            $("#Add_Customer_modal").modal('show');
        }
    }
</script>
<!-- modal end -->

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