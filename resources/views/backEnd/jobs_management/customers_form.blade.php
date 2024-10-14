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
                {{$task}} Customer
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="alert alert-success text-center" id="msg" style="display:none;height:50px">
                    <p>The Customer has been saved Successfully</p>
                </div>
            <div class="panel-body">
                <!-- page start-->
                <form class="form-horizontal" role="form" enctype="multipart/form-data" id="form_data">
                    @csrf
                    <input type="hidden" name="home_id" id="home_id" value="{{$home_id}}">
                    <input type="hidden" name="id" id="id" value="<?php if (isset($customer)) {
                                                                        echo $customer->id;
                                                                    } ?>">
                    <input type="hidden" id="is_converted" name="is_converted" value="1">
                    <div class="from_outside_border">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Customer Details</h4>
                                    <div class="form-group">
                                        <label for="name" class="col-lg-4 col-sm-4 control-label">Customer Name <span class="red-text">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php if (isset($customer)) {
                                                                                                                                        echo $customer->name;
                                                                                                                                    } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Customer Type</label>
                                        <div class="col-lg-7">
                                            <select class="form-control get_customer_result" name="customer_type_id" id="customer_type_id">
                                                <option selected disabled>Customer Type</option>
                                                <?php foreach ($customer_type as $type) { ?>
                                                    <option value="{{$type->id}}" <?php if (isset($customer) && $customer->customer_type_id == $type->id) {
                                                                                        echo "selected";
                                                                                    } ?>>{{$type->title}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(1)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_name" class="col-lg-4 col-sm-4 control-label">Contact Name <span class="red-text">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="contact_name" name="contact_name" placeholder="Contact Name" value="<?php if (isset($customer)) {
                                                                                                                                                                    echo $customer->contact_name;
                                                                                                                                                                } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Job Title (Position)</label>
                                        <div class="col-lg-7">
                                            <select class="form-control get_job_title_result" name="job_title" id="job_title">
                                                <option selected disabled>Job Title</option>
                                                <?php foreach ($job_title as $title) { ?>
                                                    <option value="{{$title->id}}" <?php if (isset($customer) && $customer->job_title == $title->id) {
                                                                                        echo "selected";
                                                                                    } ?>>{{$title->name}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(2)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-lg-4 col-sm-4 control-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php if (isset($customer)) {
                                                                                                                                            echo $customer->email;
                                                                                                                                        } ?>" onblur="getemail(1)">
                                            <span id="emailErr1" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone" class="col-lg-3 col-sm-3 control-label">Telephone</label>
                                        <div class="col-sm-2 pe-0">
                                            <select class="form-control editInput selectOptions" id="telephone_country_code" name="telephone_country_code">
                                                <option selected disabled>Please Select</option>
                                                <?php foreach($country_code as $telephone_country_code){?>
                                                    <option value="{{$telephone_country_code->id}}" <?php if(isset($customer) && $customer->telephone_country_code == $telephone_country_code->id){echo 'selected';}?>>+{{$telephone_country_code->code}}</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1 numberHifan">
                                            -
                                        </div>
                                        <div class="col-lg-5 ps-0">
                                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="<?php if (isset($customer)) {
                                                                                                                                                        echo $customer->telephone;
                                                                                                                                                    } ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-lg-3 col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-2 pe-0">
                                            <select class="form-control editInput selectOptions" id="mobile_country_code" name="mobile_country_code">
                                                <option selected disabled>Please Select</option>
                                            <?php foreach($country_code as $mobile_country_code){?>
                                                    <option value="{{$mobile_country_code->id}}" <?php if(isset($customer) && $customer->mobile_country_code == $mobile_country_code->id){echo 'selected';}?>>+{{$mobile_country_code->code}}</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1 numberHifan">
                                            -
                                        </div>
                                        <div class="col-lg-5 ps-0">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?php if (isset($customer)) {
                                                                                                                                                echo $customer->mobile;
                                                                                                                                            } ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fax" class="col-lg-4 col-sm-4 control-label">Fax</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax" value="<?php if (isset($customer)) {
                                                                                                                                        echo $customer->fax;
                                                                                                                                    } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="website" class="col-lg-4 col-sm-4 control-label">Website</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="<?php if (isset($customer)) {
                                                                                                                                                    echo $customer->website;
                                                                                                                                                } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Default Catalogue</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" id="catalogue_id" name="catalogue_id">
                                                <option value="1" <?php if (isset($customer) && $customer->catalogue_id == 1) {
                                                                        echo "selected";
                                                                    } ?>>General Customer</option>
                                                <option value="2" <?php if (isset($customer) && $customer->catalogue_id == 2) {
                                                                        echo "selected";
                                                                    } ?>>General Customer</option>
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
                                        <div class="col-lg-7">
                                        <select class="form-control editInput selectOptions get_region_result" id="region" name="region">
                                            <option selected disabled>None</option>
                                            <?php foreach($region as $region_val){?>
                                                <option value="{{$region_val->id}}" <?php if(isset($customer) && $region_val->id == $customer->region){echo $customer->mobile;}?>>{{$region_val->title}}</option>
                                            <?php }?>
                                        </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="javascript:void(0)" onclick="get_modal(3)"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Address <span class="red-text">*</span></label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textareaInput" name="address" id="address" rows="8" cols="70"><?php if (isset($customer)) {
                                                echo $customer->address;
                                            } ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="col-lg-4 col-sm-4 control-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="city" name="city" placeholder="City" value="<?php if (isset($customer)) {
                                                                                                                                            echo $customer->city;
                                                                                                                                        } ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class="col-lg-4 col-sm-4 control-label">County</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="country" name="country" placeholder="County" value="<?php if (isset($customer)) {
                                                                                                                                                    echo $customer->country;
                                                                                                                                                } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_code" class="col-lg-4 col-sm-4 control-label">Postcode</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="postal_code" name="postal_code" placeholder="Postcode" value="<?php if (isset($customer)) {
                                                                                                                                                            echo $customer->postal_code;
                                                                                                                                                        } ?>">
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
                                                <?php foreach($country as $countryval){?>
                                                    <option value="{{$countryval->id}}" <?php if(isset($customer) && $countryval->id == $customer->country_code){echo 'selected';}?>>{{$countryval->name}}</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Site Notes</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textareaInput" name="site_notes" id="site_notes" rows="4" cols="70"><?php if (isset($customer)) {
                                                echo $customer->site_notes;
                                            } ?></textarea>
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
                                                <?php foreach($country as $countryItem): ?>
                                                    <?php foreach($countryItem->currencies as $currency): ?>
                                                        <option value="<?php echo $currency->currency_code; ?>" <?php if(isset($customer) && $currency->currency_code == $customer->currency){echo 'selected';}?>>
                                                            <?php echo $countryItem->name; ?> (<?php echo $currency->currency_code; ?>)
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="credit_limit" class="col-lg-4 col-sm-4 control-label">Credit Limit</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="credit_limit" name="credit_limit" placeholder="Credit Limit" value="<?php if (isset($customer)) {
                                                                                                                                                                    echo $customer->credit_limit;
                                                                                                                                                                } ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="discount" class="col-lg-4 col-sm-4 control-label">Discount</label>
                                        <div class="col-lg-4">
                                            <input type="email" class="form-control" id="discount" name="discount" placeholder="Discount" value="<?php if (isset($customer)) {
                                                                                                                                                        echo $customer->discount;
                                                                                                                                                    } ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Discount Type</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" id="discount_type" name="discount_type">
                                                <option value="1" <?php if (isset($customer) && $customer->discount_type == 1) {
                                                                        echo "selected";
                                                                    } ?>>Percentage</option>
                                                <option value="2" <?php if (isset($customer) && $customer->discount_type == 2) {
                                                                        echo "selected";
                                                                    } ?>>Flat</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="saga_ref" class="col-lg-4 col-sm-4 control-label">Sage Ref.</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="saga_ref" name="saga_ref" placeholder="Sage Ref." value="<?php if (isset($customer)) {
                                                                                                                                                        echo $customer->saga_ref;
                                                                                                                                                    } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_reg" class="col-lg-4 col-sm-4 control-label">Company Reg</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="company_reg" name="company_reg" placeholder="Company Reg" value="<?php if (isset($customer)) {
                                                                                                                                                                echo $customer->company_reg;
                                                                                                                                                            } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat_tax_no" class="col-lg-4 col-sm-4 control-label">VAT / Tax No.</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="vat_tax_no" name="vat_tax_no" placeholder="VAT / Tax No." value="<?php if (isset($customer)) {
                                                                                                                                                                echo $customer->vat_tax_no;
                                                                                                                                                            } ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="payment_terms" class="col-lg-4 col-sm-4 control-label">Payment Terms</label>
                                        <div class="col-lg-4">
                                        <select class="form-control editInput selectOptions" id="payment_terms" name="payment_terms">
                                            <option value="21" <?php if(isset($customer) && $customer->payment_terms == 21){echo 'selected';}?>>Default (21)
                                            </option>
                                            <?php for($i=1;$i<21;$i++){?>
                                            <option value="{{$i}}" <?php if(isset($customer) && $i == $customer->payment_terms){echo 'selected';}?>>{{$i}}</option>
                                            <?php }?>
                                        </select>
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
                                                <input type="radio" name="radio" id="assigned_product1" class="assigned_product" <?php if (isset($customer) && $customer->assigned_product == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>> Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="radio" id="assigned_product2" class="assigned_product" <?php if (isset($customer)  && $customer->assigned_product == 1) {
                                                                                                                        echo "unchecked";
                                                                                                                    }else{echo "checked";} ?>> No
                                            </label>
                                            <input type="hidden" value="0" name="assigned_product" id="assigned_product">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Notes</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textareaInput" name="notes" id="notes" rows="4" cols="70"><?php if (isset($customer)) {
                                                echo $customer->notes;
                                            } ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_tax" class="col-lg-4 col-sm-4 control-label">Dflt Products Tax</label>
                                        <div class="col-lg-8">
                                        <select class="form-control editInput selectOptions" id="product_tax" name="product_tax">
                                            <option selected disabled>Please Select</option>
                                            <?php foreach($tax as $tax_val){?>
                                                <option value="{{$tax_val->id}}" <?php if(isset($customer) && $customer->product_tax == $tax_val->id){echo 'selected';}?>>{{$tax_val->name}}</option>
                                            <?php }?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_tax" class="col-lg-4 col-sm-4 control-label">Dflt Services Tax</label>
                                        <div class="col-lg-8">
                                        <select class="form-control editInput selectOptions" id="service_tax" name="service_tax">
                                            <option selected disabled>Please Select</option>
                                            <?php foreach($tax as $tax_val1){?>
                                                <option value="{{$tax_val1->id}}" <?php if(isset($customer) && $customer->service_tax == $tax_val1->id){echo 'selected';}?>>{{$tax_val1->name}}</option>
                                            <?php }?>
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
                                        <input type="checkbox" name="show_msg" id="show_msg" <?php if (isset($customer) && $customer->show_msg == 1) {
                                                                                                    echo "checked";
                                                                                                } ?> value="<?php if (isset($customer) && $customer->show_msg == 1) {
                                                                                                                echo "1";
                                                                                                            } else {
                                                                                                                echo "0";
                                                                                                            } ?>"> Yes, show the message
                                    </label>
                                </div>
                            </div>

                            <div class="form-group padd0">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Message</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="4" cols="70" id="msg" name="msg"><?php if (isset($customer) && $customer->show_msg == 1) {
                                                                                                                echo $customer->msg;
                                                                                                            } ?></textarea>
                                </div>
                            </div>

                            <div class="form-group padd0">
                                <label for="section_id" class="col-lg-2 col-sm-2 control-label">Section</label>
                                <div class="col-lg-4">
                                    <select class="form-control editInput selectOptions" id="section_id" name="section_id[]" multiselect-search="true" multiselect-select-all="true" multiselect-max-items="4" multiple="multiple">
                                        <?php if(isset($customer) && $customer->section_id !=''){ $section_id=explode(',',$customer->section_id);?>
                                        <option value="1" <?php if (in_array(1, $section_id)){echo 'selected';}?> selected>Quotes</option>
                                        <option value="2" <?php if (in_array(2, $section_id)){echo 'selected';}?> selected>Job</option>
                                        <option value="3" <?php if (in_array(3, $section_id)){echo 'selected';}?> selected>Invoice</option>
                                        <?php }else{?>
                                            <option value="1" selected>Quotes</option>
                                            <option value="2" selected>Job</option>
                                            <option value="3" selected>Invoice</option>
                                        <?php }?>
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
                                        <?php foreach ($contact as $conv) {
                                            $job_title_details = App\Models\Job_title::find($conv->job_title_id);
                                            // echo "<pre>";print_r($job_title->name);die;
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" class="checkboxContactId" value="{{$conv->id}}"></td>
                                                <td>{{$conv->contact_name}}</td>
                                                <td>{{$job_title_details->name ?? ""}}</td>
                                                <td>{{$conv->email}}</td>
                                                <td>{{$conv->telephone}}</td>
                                                <td>{{$conv->mobile}}</td>
                                                <td>{{$conv->address}}</td>
                                                <td>{{$conv->city}}</td>
                                                <td>{{$conv->country}}</td>
                                                <td>{{$conv->postcode}}</td>
                                                <td><?php echo ($conv->default_billing == 1) ? "Yes" : "No"; ?></td>
                                                <td>
                                                    <img src="{{url('public/frontEnd/jobs/images/pencil.png')}}" height="16px" alt="" data-bs-toggle="modal" data-bs-target="#additionl_contact_model" class="modal_dataFetch hover" data-id="{{ $conv->id }}" data-title="{{ $conv->contact_name }}" data-job_title="{{ $job_title_details->id??'' }}" data-email="{{$conv->email}}" data-telephone="{{$conv->telephone}}" data-mobile="{{$conv->mobile}}" data-address="{{$conv->address}}" data-city="{{$conv->city}}" data-country="{{$conv->country}}" data-postcode="{{$conv->postcode}}" data-default_billing="{{$conv->default_billing}}" data-fax="{{$conv->fax}}" data-country_id="{{$conv->country_id}}" >&nbsp;
                                                    <img src="{{url('public/frontEnd/jobs/images/delete.png')}}" alt="" class="contact_delete hover" data-delete="{{$conv->id}}">
                                                </td>

                                            </tr>
                                        <?php } ?>
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
                                        <?php foreach ($site as $sitev) {
                                            $job_title_detail = App\Models\Job_title::find($sitev->title_id);
                                            $site_regionName=App\Models\Region::find($sitev->region);
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" value="{{$sitev->id}}"></td>
                                                <td>{{$sitev->site_name}}</td>
                                                <td>{{$sitev->contact_name}}</td>
                                                <td>{{$job_title_detail->name ?? ""}}</td>
                                                <td>{{$sitev->email}}</td>
                                                <td>{{$sitev->telephone}}</td>
                                                <td>{{$sitev->mobile}}</td>
                                                <td>{{$sitev->address}}</td>
                                                <td>{{$sitev->city}}</td>
                                                <td>{{$sitev->country}}</td>
                                                <td>{{$sitev->post_code}}</td>
                                                <td>{{$site_regionName->title ?? ""}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                            <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#customer_site" class="dropdown-item modal_dataSite" data-id="{{ $sitev->id }}" data-site_name="{{ $sitev->site_name }}" data-contact_name="{{ $sitev->contact_name }}" data-title_id="{{$sitev->title_id}}" data-company_name="{{$sitev->company_name}}" data-email="{{$sitev->email}}" data-telephone="{{$sitev->telephone}}" data-mobile="{{$sitev->mobile}}" data-fax="{{$sitev->fax}}" data-region="{{$sitev->region}}" data-address="{{$sitev->address}}" data-city="{{$sitev->city}}" data-country="{{$sitev->country}}" data-post_code="{{$sitev->post_code}}" data-country_id="{{$sitev->country_id}}" data-catalogue="{{$sitev->catalogue}}" data-notes="{{$sitev->notes}}" data-telephone_country_code="{{$sitev->telephone_country_code}}" data-mobile_country_code="{{$sitev->mobile_country_code}}">Edit Details</a></li>
                                                            <li><a href="javascript:void(0)" class="dropdown-item site_delete" data-delete="{{ $sitev->id }}">Delete</a></li>
                                                            <li><a href="javascript:void(0)" class="dropdown-item" data-id="{{ $sitev->id }}">Manage Document/Equipments</a></li>
                                                            
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
                                        <?php foreach ($login as $k => $logv) { ?>
                                            <tr>
                                                <td>{{++$k}}</td>
                                                <td>{{$logv->name}}</td>
                                                <td>{{$logv->email}}</td>
                                                <td>{{$logv->email}}</td>
                                                <td>{{$logv->telephone}}</td>
                                                <td></td>
                                                <td><?php echo ($logv->status == 1) ? "Active" : "In-active"; ?></td>
                                                <td>
                                                    <img src="{{url('public/frontEnd/jobs/images/pencil.png')}}" height="16px" alt="" data-bs-toggle="modal" data-bs-target="#customer_login" class="modal_datalogin hover" data-id="{{ $logv->id }}" data-email="{{ $logv->email }}" data-password_type="{{ $logv->password_type }}" data-name="{{$logv->name}}" data-telephone="{{$logv->telephone}}" data-access_rights="{{$logv->access_rights}}" data-projects="{{$logv->projects}}" data-notes="{{$logv->notes}}" data-last_login="{{$logv->last_login}}" data-status="{{$logv->status}}">&nbsp;
                                                    <img src="{{url('public/frontEnd/jobs/images/delete.png')}}" alt="" class="login_delete hover" data-delete="{{$logv->id}}">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="pddtp">
                        <button type="button" class="btn btn-primary" onclick="get_data()"><i class="fa fa-floppy-o"></i> Save</button>
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
                                            <label class="col-lg-3 control-label">Customer Type<span class="red-text">*</span></label>
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
                                            <label class="col-lg-3 control-label">Job Title<span class="red-text">*</span></label>
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
                                            <label class="col-lg-3 control-label">Region<span class="red-text">*</span></label>
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
                                                        <p><?php if(isset($customer)){echo $customer->name;}?></p>
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
                                                    <label class="col-lg-3 control-label">Contact Name<span class="red-text">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="customer_name" id="customer_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Job Title(Position)</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control who_noti" name="customer_job_titleid" id="customer_job_titleid">
                                                            <option selected disabled>Select Job Title</option>
                                                            <?php foreach ($job_title as $titleval) { ?>
                                                                <option value="{{$titleval->id}}">{{$titleval->name}}</option>
                                                            <?php } ?>
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
                                                    <div class="col-sm-2 pe-0">
                                                        <select class="form-control editInput selectOptions" id="contact_telephone_country_code" name="contact_telephone_country_code">
                                                            <option selected disabled>Please Select</option>
                                                            <?php foreach($country_code as $contact_telephone_country_code){?>
                                                                <option value="{{$contact_telephone_country_code->id}}">+{{$contact_telephone_country_code->code}}</option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 numberHifan">
                                                        -
                                                    </div>
                                                    <div class="col-lg-6 ps-0">
                                                        <input type="text" id="customer_telephone" name="customer_telephone" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-lg-3 control-label">Mobile</label>
                                                    <div class="col-sm-2 pe-0">
                                                        <select class="form-control editInput selectOptions" id="contact_mobile_country_code" name="contact_mobile_country_code">
                                                            <option selected disabled>Please Select</option>
                                                        <?php foreach($country_code as $contact_mobile_country_code){?>
                                                                <option value="{{$contact_mobile_country_code->id}}">+{{$contact_mobile_country_code->code}}</option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 numberHifan">
                                                        -
                                                    </div>
                                                    <div class="col-lg-6 ps-0">
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
                                                    <label class="col-lg-3 control-label">Address<span class="red-text">*</span></label>
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
                                                            <?php foreach ($country as $valc) { ?>
                                                                <option value="{{$valc->id}}">{{$valc->name}}</option>
                                                            <?php } ?>
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
                                                <p><?php if(isset($customer)){echo $customer->name;}?></p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Site Name<span class="red-text">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="site_name" id="site_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Contact Name<span class="red-text">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="site_contact_name" id="site_contact_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Job Title(Position)</label>
                                            <div class="col-lg-9">
                                                <select class="form-control who_noti" name="site_title_id" id="site_title_id">
                                                    <option selected disabled>Select Job Title</option>
                                                    <?php foreach ($job_title as $titleval) { ?>
                                                        <option value="{{$titleval->id}}">{{$titleval->name}}</option>
                                                    <?php } ?>
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
                                            <div class="col-sm-2 pe-0">
                                                <select class="form-control editInput selectOptions" id="site_telephone_country_code" name="site_telephone_country_code">
                                                    <option selected disabled>Please Select</option>
                                                    <?php foreach($country_code as $site_telephone_country_code){?>
                                                        <option value="{{$site_telephone_country_code->id}}">+{{$site_telephone_country_code->code}}</option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-sm-1 numberHifan">
                                                -
                                            </div>
                                            <div class="col-lg-6 ps-0">
                                                <input type="text" id="site_telephone" name="site_telephone" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Mobile</label>
                                            <div class="col-sm-2 pe-0">
                                                <select class="form-control editInput selectOptions" id="site_mobile_country_code" name="site_mobile_country_code">
                                                    <option selected disabled>Please Select</option>
                                                <?php foreach($country_code as $site_mobile_country_code){?>
                                                        <option value="{{$site_mobile_country_code->id}}">+{{$site_mobile_country_code->code}}</option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-sm-1 numberHifan">
                                                -
                                            </div>
                                            <div class="col-lg-6 ps-0">
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
                                                    <?php foreach($region as $site_region){?>
                                                    <option value="{{$site_region->id}}">{{$site_region->title}}</option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Address<span class="red-text">*</span></label>
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
                                                    <?php foreach ($country as $valc) { ?>
                                                        <option value="{{$valc->id}}">{{$valc->name}} (+{{$valc->code}})</option>
                                                    <?php } ?>
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
                                            <label class="col-lg-3 control-label">Email<span class="red-text">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="email" name="login_email" id="login_email" class="form-control" onblur="getemail(4)">
                                                <span id="emailErr4" style="color: red;"></span>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Password Type<span class="red-text">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="radio" id="pass1" name="pass"> Generate Now
                                                <input type="radio" id="pass2" name="pass" checked> Email Password
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-lg-3 control-label">Name<span class="red-text">*</span></label>
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
        var name=$("#name").val();
        // var id=$("#id").val();
        var contact_name=$("#contact_name").val();
        var address=$("#address").val();
        var token = '<?php echo csrf_token(); ?>'
        var count_contact='<?php echo count($contact);?>'
        var count_site='<?php echo count($site);?>'
        var count_login='<?php echo count($login);?>'
        var firstErrorField = null;
        if (name == '') {
            $("#name").css('border','1px solid red');
            if (!firstErrorField) firstErrorField = $('#name');
        } else if(contact_name == ''){
            $("#name").css('border','');
            $("#contact_name").css('border','1px solid red');
            if (!firstErrorField) firstErrorField = $('#contact_name');
        }else if(address == ''){
            $("#contact_name").css('border','');
            $("#address").css('border','1px solid red');
            if (!firstErrorField) firstErrorField = $('#address');
        }
        if (firstErrorField) {
            firstErrorField.focus();
            return false;
        }else {
            $("#name").css('border','');
            $("#contact_name").css('border','');
            $("#address").css('border','');
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
                    if(data.vali_error){
                        alert(data.vali_error);
                        $("#email").css('border','1px solid red');
                        $(window).scrollTop($('#email').position().top);
                        return false;
                    }else{
                        $(window).scrollTop(0);
                        $("#email").css('border','');
                        $('.alert').show();
                        setTimeout(function() {
                            $('.alert').hide();
                            if(count_contact>0 || count_site>0 || count_login>0){
                                window.location.href ="<?=url('admin/customers')?>";
                            }else{
                                window.location.href ="<?=url('admin/customer_add?key=')?>"+data.id;
                            }
                            
                            
                        }, 3000);
                    }


                    // $("#customer_id").val(data);
                    // $("#site_customer_id").val(data);
                    // $("#login_customer_id").val(data);
                    // if($.trim(data)=="done"){
                    //     window.location.href='<?php echo url('admin/customers'); ?>';
                    // }
                }
            });
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
        var customer_id = $("#id").val();
        var id=$("#contact_id").val();
        var email = $("#customer_email").val();
        var telephone = $("#customer_telephone").val();
        var mobile = $("#customer_mobile").val();
        var fax = $("#customer_fax").val();
        var address = $("#customer_address").val();
        var city = $("#customer_city").val();
        var country = $("#customer_country").val();
        var postcode = $("#customer_post_code").val();
        var country_id = $("#customer_country_id").val();
        var telephone_country_code=$("#contact_telephone_country_code").val();
        var mobile_country_code=$("#contact_mobile_country_code").val();
        if(contact_name == ''){
            $("#customer_name").css('border','1px solid red');
            $("#customer_name").focus();
            return false;
        }else if(address == ''){
            $("#customer_name").css('border','');
            $("#customer_address").css('border','1px solid red');
            return false;
        }else{
            $("#customer_name").css('border','');
            $("#customer_address").css('border','');
            $.ajax({
            type: "POST",
            url: "{{url('admin/customer_contact_save')}}",
                data: {
                    id:id,
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
                    country_id: country_id,
                    telephone_country_code:telephone_country_code,
                    mobile_country_code:mobile_country_code,
                },
                success: function(data) {
                    console.log(data);
                    if($.trim(data) == "done"){
                        $("#additionl_contact_model").modal('hide');
                        location.reload();
                    }else{
                        alert("Something went wrong");
                    }
                }
            });
        }
        
    }

    function get_save_site() {
        var token = '<?php echo csrf_token(); ?>'
        var customer_id = $("#id").val();
        var site_name = $("#site_name").val();
        var contact_name = $("#site_contact_name").val();
        var title_id = $("#site_title_id").val();
        var company_name = $("#company_name").val();
        var region = $("#site_region").val();
        var catalogue = $("#site_catalogue").val();
        var notes = $("#customer_site_notes").val();
        var email = $("#site_email").val();
        var telephone = $("#site_telephone").val();
        var mobile = $("#site_mobile").val();
        var fax = $("#site_fax").val();
        var address = $("#site_address").val();
        var city = $("#site_city").val();
        var country = $("#site_country").val();
        var post_code = $("#site_post_code").val();
        var country_id = $("#site_country_id").val();
        var telephone_country_code=$("#site_telephone_country_code").val();
        var mobile_country_code=$("#site_mobile_country_code").val();
        var id=$("#site_id").val();
        if(site_name == ''){
            $("#site_name").css('border','1px solid red');
            $("#site_name").focus();
            return false;
        }else if(contact_name == ''){
            $("#site_name").css('border','');
            $('#site_contact_name').css('border','1px solid red');
            $("#site_contact_name").focus();
            return false;
        }else if(address == ''){
            $("#site_contact_name").css('border','');
            $('#site_address').css('border','1px solid red');
            $("#site_address").focus();
            return false;
        }else{
            $("#site_name").css('border','');
            $("#site_contact_name").css('border','');
            $("#site_address").css('border','');
            $.ajax({
            type: "POST",
            url: "{{url('admin/customer_site_save')}}",
            data: {
                    id:id,
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
                    region: region,
                    notes: notes,
                    catalogue: catalogue,
                    company_name: company_name,
                    telephone_country_code:telephone_country_code,
                    mobile_country_code:mobile_country_code,
                },
                success: function(data) {
                    console.log(data);
                    if($.trim(data) == "done"){
                        $("#customer_site").modal('hide');
                        // $("#site_result").append(data);
                        location.reload();
                    }else{
                        alert("Something went wrong");
                    }
                    
                }
            });
        }
    }

    function get_save_login() {
        var token = '<?php echo csrf_token(); ?>'
        var email = $('#login_email').val();
        var customer_id = $("#id").val();
        var id=$("#login_id").val();
        var password_type;
        if ($('#pass1').is(':checked')) {
            password_type = 1;
        } else {
            password_type = 2;
        }
        var name = $("#login_name").val();
        var telephone = $("#login_telephone").val();

        var access_rights = [];
        $('.login_check').each(function() {
            if ($(this).is(':checked')) {
                access_rights.push($(this).val());
            }
        });
        access_rights = access_rights;
        var projects;
        if ($('#pro').is(':checked')) {
            projects = 1;
        } else {
            projects = 2;
        }
        var notes = $("#login_notes").val();
        // console.log(access_rights);
        if(email == ''){
            $('#login_email').css('border','1px solid red');
            return false;
        }else if(name == ''){
            $('#login_email').css('border','');
            $('#login_name').css('border','1px solid red');
            return false;
        }else{
            $('#login_email').css('border','');
            $('#login_name').css('border','');
            $.ajax({
            type: "POST",
            url: "{{url('admin/customer_login_save')}}",
                data: {
                    id:id,
                    _token: token,
                    email: email,
                    customer_id: customer_id,
                    password_type: password_type,
                    name: name,
                    telephone: telephone,
                    access_rights: access_rights,
                    projects: projects,
                    notes: notes
                },
                success: function(data) {
                    console.log(data);
                    if($.trim(data) == "done"){
                        // $("#login_result").append(data)
                        $("#customer_login").modal('hide');
                        location.reload();
                        
                    }else{
                        alert("Something went wrong");
                    }
                    
                }
            });
        }
    }
</script>
<script>
    function get_modal(id){
        var key=$("#id").val();
        if(id == 4 || id == 5 || id == 6){
            if(key == ''){
                alert("Please save Customer first");
                return false;
            }else{
                if (id == 4) {
                    $('#contact_form')[0].reset();
                    $("#additionl_contact_model").modal('show');
                } else if (id == 5) {
                    $('#site_form')[0].reset();
                    $("#customer_site").modal('show');
                } else if (id == 6) {
                    $('#login_form')[0].reset();
                    $("#customer_login").modal('show');
                }
                
            }
        }else if(id == 1){
            $("#customer_type_form")[0].reset();
            $("#cutomer_type_modal").modal('show');
        }else if(id == 2){
            $("#job_title_form")[0].reset();
            $("#job_title_modal").modal('show');
        }else if(id == 3){
            $("#region_form")[0].reset();
            $("#region_modal").modal('show');
        }
    }
</script>
<script>
    function save_customer_type(){
       var token='<?php echo csrf_token();?>'
       var title=$("#customer_type_name").val();
       var status=$("#customer_type_status").val();
       var home_id=$("#home_id").val();
       if(title == ''){
        $("#customer_type_name").css('border','1px solid red');
        return false;
       }else {
            $.ajax({
                type: "POST",
                url: "{{url('/admin/customer_type_save')}}",
                data: {title:title,status:status,home_id:home_id,_token:token},
                success: function(data) {
                    console.log(data);
                    if($.trim(data) == 'error'){
                        alert("Something went wrong");
                        return false;
                    }else{
                        $("#cutomer_type_modal").modal('hide');
                        $('.get_customer_result').append(data);
                        // window.location.reload();
                    }
                    $("#cutomer_type_modal").modal('hide');
                    
                }
            });
       }
       
    }
    function save_job_title(){
        var token='<?php echo csrf_token();?>'
        var name=$("#job_title_name").val();
        var status=$("#job_title_status").val();
        var home_id=$("#home_id").val();
        if(name == ''){
        $("#job_title_name").css('border','1px solid red');
        return false;
        }else{
            $.ajax({
                type: "POST",
                url: "{{url('/admin/job_title_save')}}",
                data: {name:name,status:status,home_id:home_id,_token:token},
                success: function(data) {
                    console.log(data);
                    
                    $("#job_title_modal").modal('hide');
                    $('.get_job_title_result').append(data);
                    // window.location.reload();
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
                }
            });
        }
    }
    function save_region(){
        var token='<?php echo csrf_token();?>'
        var title=$("#region_name").val();
        var status=$("#region_status").val();
        var home_id=$("#home_id").val();
        if(title == ''){
        $("#region_name").css('border','1px solid red');
        return false;
        }else{
            $.ajax({
                type: "POST",
                url: "{{url('/admin/general/saveRegion')}}",
                data: {title:title,status:status,home_id:home_id,_token:token},
                success: function(data) {
                    console.log(data);
                    // return false;
                    if($.trim(data) == 'error'){
                        alert("Something went wrong");
                        return false;
                    }else{
                        $("#region_modal").modal('hide');
                        $('.get_region_result').append(data);
                        // window.location.reload();
                    }
                    $("#region_modal").modal('hide');
                }
            });
        }
    }
</script>
<script>
    function getemail(id)
  {
    var email;
    if(id == 1){
         email= $('#email').val();
    }else if(id == 2){
        email=$("#customer_email").val();
    }else if(id == 3){
        email=$("#site_email").val();
    }else if(id == 4){
        email=$("#login_email").val();
    }
    validRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (email.search(validRegExp) == -1) 
    {
        $('#emailErr'+id).text("Please enter correct email address");
      return false;
    }else{
        $('#emailErr'+id).text("");
    }
  }
  $("#defaultaddcheck").change(function() {
        var check;
        if ($('#defaultaddcheck').is(':checked')) {
            check=1;
        }else {
            check=0;
        }
        var token='<?php echo csrf_token();?>'
        var customer_id=$("#id").val();
        $.ajax({
            type: "POST",
            url: "{{url('/admin/default_address')}}",
            data: {check:check,customer_id:customer_id,_token:token},
            success: function(data) {
                console.log(data);
                if(check == 1){
                    $("#customer_address").val(data.details.address);
                    $("#customer_city").val(data.details.city);
                    $("#customer_country").val(data.details.country);
                    $("#customer_post_code").val(data.details.postal_code);
                }else{
                    $("#customer_address").val('');
                    $("#customer_city").val('');
                    $("#customer_country").val('');
                    $("#customer_post_code").val('');
                }
                $("#customer_country_id").html(data.reslut);
            }
        });
    });
</script>
<script>
    $('.contact_delete').on('click', function() {
        var id = $(this).data('delete');
        if (confirm("Are you sure you want to delete this row?")) {
            $(this).closest('tr').remove();
            var token='<?php echo csrf_token();?>'
            $.ajax({
            type: "POST",
            url: "{{url('/admin/delete_contact')}}",
            data: {id:id,_token:token},
            success: function(data) {
                console.log(data);
                if($.trim(data) == "error"){
                    alert("Something went wrong");
                }
            }
        });
        }
    });

    $('.site_delete').on('click',function(){
        var id = $(this).data('delete');
        if (confirm("Are you sure you want to delete this row?")) {
            $(this).closest('tr').remove();
            var token='<?php echo csrf_token();?>'
            $.ajax({
            type: "POST",
            url: "{{url('/admin/delete_site')}}",
            data: {id:id,_token:token},
            success: function(data) {
                console.log(data);
                if($.trim(data) == "error"){
                    alert("Something went wrong");
                }
            }
        });
        }
    });
    $('.login_delete').on('click',function(){
        var id = $(this).data('delete');
        if (confirm("Are you sure you want to delete this row?")) {
            $(this).closest('tr').remove();
            var token='<?php echo csrf_token();?>'
            $.ajax({
            type: "POST",
            url: "{{url('/admin/delete_login')}}",
            data: {id:id,_token:token},
            success: function(data) {
                console.log(data);
                if($.trim(data) == "error"){
                    alert("Something went wrong");
                }
            }
        });
        }
    });
</script>
<script>
    $('.modal_dataFetch').on('click', function() {
        $("#additionl_contact_model").modal('show');
        var id = $(this).data('id');
        var title = $(this).data('title');
        var job_title = $(this).data('job_title');
        var email = $(this).data('email');
        var telephone = $(this).data('telephone');
        var mobile = $(this).data('mobile');
        var address = $(this).data('address');
        var city = $(this).data('city');
        var country = $(this).data('country');
        var postcode = $(this).data('postcode');
        var default_billing = $(this).data('default_billing');
        var fax = $(this).data('fax');
        var country_id = $(this).data('country_id');
        // alert(default_billing)
        if(default_billing == 1){
            $("#yes").prop('checked', true);
        }else{
            $("#no").prop('checked', true);
        }
        $("#billing" + default_billing).prop('checked', true);
        $('#contact_id').val(id);
        $('#customer_name').val(title);
        $('#customer_job_titleid').val(job_title);
        $('#customer_email').val(email);
        $('#customer_telephone').val(telephone);
        $('#customer_mobile').val(mobile);
        $('#customer_fax').val(fax);
        $('#customer_address').val(address);
        $('#customer_city').val(city);
        $('#customer_country').val(country);
        $('#customer_post_code').val(postcode);
        $('#customer_country_id').val(country_id);
    });

    $('.modal_dataSite').on('click', function() {
        $("#customer_site").modal('show');
        var id = $(this).data('id');
        var site_name = $(this).data('site_name');
        var contact_name = $(this).data('contact_name');
        var title_id = $(this).data('title_id');
        var company_name = $(this).data('company_name');
        var email = $(this).data('email');
        var telephone = $(this).data('telephone');
        var mobile = $(this).data('mobile');
        var fax = $(this).data('fax');
        var region = $(this).data('region');
        var address = $(this).data('address');
        var city = $(this).data('city');
        var country = $(this).data('country');
        var post_code = $(this).data('post_code');
        var country_id = $(this).data('country_id');
        var catalogue = $(this).data('catalogue');
        var notes = $(this).data('notes');
        var telephone_country_code=$(this).data('telephone_country_code');
        var mobile_country_code=$(this).data('mobile_country_code');
        
        $("#site_id").val(id);
        $("#site_name").val(site_name);
        $("#site_contact_name").val(contact_name);
        $("#site_title_id").val(title_id);
        $("#company_name").val(company_name);
        $("#site_email").val(email);
        $("#site_telephone").val(telephone);
        $("#site_mobile").val(mobile);
        $("#site_fax").val(fax);
        $("#site_region").val(region);
        $("#site_address").val(address);
        $("#site_city").val(city);
        $("#site_country").val(country);
        $("#site_post_code").val(post_code);
        $("#site_country_id").val(country_id);
        $("#site_catalogue").val(catalogue);
        $("#customer_site_notes").val(notes);
        if(telephone_country_code!= ''){
            $("#site_telephone_country_code").val(telephone_country_code);
        }
        if(mobile_country_code !=''){
            $("#site_mobile_country_code").val(mobile_country_code);
        }
    });
    
    $('.modal_datalogin').on('click', function() {
        $("#customer_login").modal('show');
        var id = $(this).data('id');
        var email = $(this).data('email');
        var name = $(this).data('name');
        var password_type = $(this).data('password_type');
        var telephone = $(this).data('telephone');
        var projects = $(this).data('projects');
        var notes = $(this).data('notes');
        var last_login = $(this).data('last_login');
        var status = $(this).data('status');
        var access_rights = $(this).data('access_rights');
        var access_rightsArray = access_rights.split(',');
        $('.login_check').each(function(){
            if (access_rightsArray.includes($(this).val())) {
                $(this).prop('checked', true); 
            } else {
                $(this).prop('checked', false);
            }
        });
        $("#login_id").val(id);
        $("#login_email").val(email);
        $("#login_name").val(name);
        $("#password_type"+password_type).prop('checked', true);
        $("#login_telephone").val(telephone);
        $("#login_status").val(status);
        $("#project"+projects).prop('checked', true);
        $("#login_notes").val(notes);
    });
    
</script>
@endsection