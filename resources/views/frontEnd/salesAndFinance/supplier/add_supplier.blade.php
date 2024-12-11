@include('frontEnd.salesAndFinance.jobs.layout.header')
<style>
    .nav-tabs .nav-link.active {
        background: #0877bd;
        color: white;
        border-color: #0877bd;
    }
    .disabled-tab {
        pointer-events: none;
        opacity: 0.5;
    }
</style>
<section class="main_section_page px-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 ">
                        <div class="pageTitle">
                        @if(isset($supplier) && $supplier !='')
                            <h3>{{$supplier->name}}</h3>
                        @else
                            <h3>New Supplier</h3>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                        <div class="pageTitleBtn">
                            <a href="javascript:void(0)" onclick="save_supplier()" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-comments"></i> CRM</a>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success" id="alert_message" style="display:none">
                    
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-supplierList-tab" data-bs-toggle="tab" data-bs-target="#nav-supplierList" type="button" role="tab" aria-controls="nav-Notes" aria-selected="true">Supplier Details</button>
                            <button class="nav-link @if(!isset($key) || $key == '') disabled-tab @endif" id="nav-purchaseOrdersList-tab" data-bs-toggle="tab" data-bs-target="#nav-purchaseOrdersList" type="button" role="tab" aria-controls="nav-purchaseOrdersList" aria-selected="false" @if(!isset($key) || $key == '') disabled @else onclick="getpurchaseorders()" @endif>Purchase Orders</button>

                            <button class="nav-link @if(!isset($key) || $key == '') disabled-tab @endif" id="nav-attachmentsList-tab" data-bs-toggle="tab" data-bs-target="#nav-attachmentsList" type="button" role="tab" aria-controls="nav-attachmentsList" aria-selected="false" @if(!isset($key) || $key == '') disabled @else onclick="getattachments()" @endif>Attachment</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-supplierList" role="tabpanel" aria-labelledby="nav-supplierList-tab" tabindex="0">
                        <div class="row py-4">
                            <div class="col-lg-12">
                                <div class="newJobForm">
                                    <form id="supplier_form_data">
                                        <input type="hidden" id="id" name="id" value="<?php if(isset($key) && $key !=''){echo $key;}?>">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-xl-4">
                                                <div class="formDtail">
                                                    <h4 class="contTitle mb-3">Supplier Details</h4>
                                                    @csrf
                                                    <div class="mb-3 row">
                                                        <label for="name" class="col-sm-4 col-form-label">Supplier Name<span class="radStar ">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control editInput checkError" id="name" name="name" placeholder="Supplier Name" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->name;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="code" class="col-sm-4 col-form-label">Supplier Code</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control editInput" id="code" name="code" placeholder="Supplier Code" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->code;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="contact_name" class="col-sm-4 col-form-label">Contact Name<span class="radStar ">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control editInput checkError" id="contact_name" name="contact_name" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->contact_name;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="email" class="col-sm-4 col-form-label">Email<span class="radStar ">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control editInput checkError" id="email" name="email" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->email;}?>" onchange="getemail()">
                                                            <span style="color:red" id="emailErr"></span>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="telephone_code_id"
                                                            class="col-sm-4 col-form-label">Telephone</label>
                                                        <div class="col-sm-2">
                                                            <select class="form-control editInput selectOptions" id="telephone_code_id" name="telephone_code_id">
                                                                <option selected disabled>Please Select</option>
                                                            @foreach($country as $telCode)
                                                                <option value="{{$telCode->id}}" <?php if(isset($supplier) && $supplier->telephone_code_id == $telCode->id){echo 'selected';}?>>+{{$telCode->code}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control editInput" id="telephone" placeholder="Telephone" name="telephone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->telephone;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="mobile_code_id" class="col-sm-4 col-form-label">Mobile</label>
                                                        <div class="col-sm-2">
                                                            <select class="form-control editInput selectOptions" id="mobile_code_id" name="mobile_code_id">
                                                                <option selected disabled>Please Select</option>
                                                            @foreach($country as $mobCode)
                                                                <option value="{{$mobCode->id}}" <?php if(isset($supplier) && $supplier->mobile_code_id == $mobCode->id){echo 'selected';}?>>+{{$mobCode->code}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control editInput" id="mobile" name="mobile" placeholder="Mobile No." onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->mobile;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="fax" class="col-sm-4 col-form-label">Fax</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control editInput" id="fax" name="fax" placeholder="Fax" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->fax;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="website" class="col-sm-4 col-form-label">Website</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control editInput" id="website" name="website" placeholder="https://" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->website;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                                                        <div class="col-sm-8">
                                                            <select name="status" id="status" class="form-control editInput selectOptions">
                                                                <option value="1" <?php if(isset($supplier) && $supplier->status == 1){echo 'selected';}?>>Active</option>
                                                                <option value="0" <?php if(isset($supplier) && $supplier->status == 0){echo 'selected';}?>>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xl-4">
                                                <div class="formDtail">
                                                    <h4 class="contTitle mb-3">Address Details</h4>
                                                
                                                    <div class="mb-3 row">
                                                        <label for="address"
                                                            class="col-sm-3 col-form-label">Address<span class="radStar ">*</span></label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control textareaInput checkError" name="address" id="address" rows="8" placeholder="75 Cope Road Mall Park USA"><?php if(isset($supplier) && $supplier !=''){echo $supplier->address;}?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="city" class="col-sm-3 col-form-label">City</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control editInput" id="city" name="city" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->city;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="county"
                                                            class="col-sm-3 col-form-label">County</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control editInput" name="county" id="county" placeholder="County" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->county;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="postcode"
                                                            class="col-sm-3 col-form-label">Postcode</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control editInput" name="postcode" id="postcode" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->postcode;}?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-3 row">
                                                        <label for="country_id"
                                                            class="col-sm-3 col-form-label">Country</label>
                                                        <div class="col-sm-9">
                                                            <select name="country_id" id="country_id" class="form-control editInput selectOptions">
                                                            @foreach($country as $val)
                                                                <option value="{{$val->id}}" <?php if(isset($supplier) && $supplier->country_id == $val->id){echo 'selected';} else if($val->id == 230){echo 'selected';}?>>{{$val->name}}({{+$val->code}})</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </div>                                       
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xl-4">
                                                <div class="formDtail">
                                                    <h4 class="contTitle mb-3">Other Details</h4>
                                                    
                                                    <div class="mb-3 row">
                                                        <label for="currency_id" class="col-sm-3 col-form-label">Currency</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control editInput selectOptions" id="currency_id" name="currency_id">
                                                                @foreach($currency as $curr)
                                                                <option value="{{$curr->id}}" selected>{{$curr->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="creadit_limit" class="col-sm-3 col-form-label">Credit Limit</label>
                                                        <div class="col-sm-1" style="background:#e3e3e1;display:flex">
                                                            <span style="padding:3px">£</span>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control editInput textareaInput" name="creadit_limit" id="creadit_limit" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->creadit_limit;}else{echo '0.00';}?>" oninput="validateDecimal(this)" maxlength="8">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="vat_tax_no" class="col-sm-3 col-form-label">VAT / Tax No.</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control editInput textareaInput" name="vat_tax_no" id="vat_tax_no" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->vat_tax_no;}?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="account_ref" class="col-sm-3 col-form-label">Account Ref</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control editInput textareaInput" name="account_ref" id="account_ref" placeholder="Account Ref" value="<?php if(isset($supplier) && $supplier !=''){echo $supplier->account_ref;}?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="purchase_terms"
                                                            class="col-sm-3 col-form-label">Purchase Terms</label>
                                                        <div class="col-sm-2">
                                                            <select class="form-control editInput selectOptions" name="purchase_terms" id="purchase_terms">
                                                                @for($daysCount=0; $daysCount<=90; $daysCount++)
                                                                    <option value="{{$daysCount}}" <?php if(isset($supplier) && $supplier->purchase_terms == $daysCount){echo 'selected';}?>>{{$daysCount}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control-plaintext editInput" id="" value="days" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputCountry"
                                                            class="col-sm-3 col-form-label">Notes</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control textareaInput" name="notes" id="notes" rows="8" placeholder="Your Notes"><?php if(isset($supplier) && $supplier !=''){echo $supplier->notes;}?></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- End  off newJobForm -->

                                <div class="newJobForm mt-4">
                                    <label class="upperlineTitle">Supplier Contacts</label>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="jobsection my-2">
                                                <a href="javascript:void(0)" onclick="contact_modal()" class="profileDrop">Add Contact</a>
                                                <a href="#" class="profileDrop">Import</a>
                                                <a href="#" class="">Click here</a> to download import template
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="productDetailTable">
                                                <table class="table">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Contact Name </th>
                                                            <th>Email</th>
                                                            <th>Telephone</th>
                                                            <th>Mobile </th>
                                                            <th>Address</th>
                                                            <th>City</th>
                                                            <th>County</th>
                                                            <th>Postcode</th>
                                                            <th>Billing</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="10">
                                                                <label class="red_sorryText">
                                                                    Sorry, no records to show
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-purchaseOrdersList" role="tabpanel" aria-labelledby="nav-purchaseOrdersList-tab" tabindex="0">
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Purchase Orders</label>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="jobsection my-2">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control editInput" placeholder="Keywords to search" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary editInput profileDrop" type="button" id="button-addon2">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="productDetailTable">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>PO Ref </th>
                                                    <th>Reference</th>
                                                    <th>Date</th>
                                                    <th>Customer</th>
                                                    <th>Delivery</th>
                                                    <th>Sub Total</th>
                                                    <th>VAT</th>
                                                    <th>Total</th>
                                                    <th>Outstanding</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="12">
                                                        <label class="red_sorryText">
                                                            Sorry, no records to show
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-attachmentsList" role="tabpanel" aria-labelledby="nav-attachmentsList-tab" tabindex="0">
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Add Attachments</label>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="jobsection my-2">
                                        <a href="javascript:void(0)" onclick="getAttachmentsModal()" class="profileDrop">Add Attachment</a>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="productDetailTable">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Type</th>
                                                    <th>Description</th>
                                                    <th>Reminder</th>
                                                    <th>Reminder Email</th>
                                                    <th>File</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="8">
                                                        <label class="red_sorryText">
                                                            Sorry, no item(s) found
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">                    
                    <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-comments"></i> CRM</a>
                        </div>
                    </div>
                </div>
            </div>
<!-- Attachment Modal start here -->
<div class="modal fade" id="attachment_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="thirdModalLabel">Add Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="customer_type_form">
                <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <select id="type" name="type" class="form-control editInput">
                                <option value="1">document</option>
                                <option value="0">file</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Title <span class="radStar ">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="customer_type_name" class="form-control editInput" id="customer_type_name" value="" placeholder="Customer Type">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAddress" class="col-sm-3 col-form-label">Description<span class="radStar">*</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control textareaInput" name="address" id="address" rows="3" placeholder="75 Cope Road Mall Park USA">Govind nagar kanpur</textarea>
                        </div>
                    </div>
                    <div class="mb-0 row">
                        <label class="col-sm-3 col-form-label">Reminder</label>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input reminder" type="radio" name="reminder" id="reminder1" value="1">
                                <label class="form-check-label checkboxtext" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input reminder" type="radio" name="reminder" id="reminder2" checked value="0">
                                <label class="form-check-label checkboxtext" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row HideShow" style="display:none;">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Reminder Date <span class="radStar ">*</span></label>
                        <div class="col-sm-9">
                            <input type="date" name="customer_type_name" class="form-control editInput" id="customer_type_name" value="" placeholder="Customer Type">
                        </div>
                    </div>
                    <div class="mb-3 row HideShow" style="display:none;">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Reminder Email <span class="radStar ">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="customer_type_name" class="form-control editInput" id="customer_type_name" value="" placeholder="Customer Type">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">File Name <span class="radStar ">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="customer_type_name" class="form-control editInput" id="customer_type_name" value="" placeholder="Customer Type">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select id="customer_type_status" name="customer_type_status" class="form-control editInput">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="pageTitleBtn">
                        <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_attachment()"> Save</a>
                        <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end here -->
</section>

<script>
    function getemail(id){
        var email= $('#email').val();
        validRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (email.search(validRegExp) == -1){
            $('#emailErr').text("Please enter correct email address");
            return false;
        }else{
            $('#emailErr').text("");
        }
  }

    function validateDecimal(input) {
        input.value = input.value.replace(/[^0-9.]/g, '');
        if ((input.value.match(/\./g) || []).length > 1) {
            input.value = input.value.substring(0, input.value.lastIndexOf('.'));
        }
        if (input.value.length > 8) {
            input.value = input.value.substring(0, 8);
        }
    }

    function contact_modal(){
        var id=$("#id").val();
        if(id == ''){
            alert("Please save Supplier first");
            return false;
        }else{
            alert("Modal code");
        }
    }
    function getAttachmentsModal(){
        $("#attachment_modal").modal('show');
    }

    function save_supplier(){
        var emailErr=$("#emailErr").text();
        $('.checkError').each(function() {
            if ($(this).val() === '') {
                $(this).css('border','1px solid red');
                $(this).focus();
                return false;
            } else {
                $(this).css('border','');
            }
        });
        if(emailErr.length>0){
            $('#email').focus();
            return false;
        }else{
            $.ajax({
                type: "POST",
                url: "{{url('/supplier_save')}}",
                data: new FormData($("#supplier_form_data")[0]),
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                if(data.vali_error){
                        alert(data.vali_error);
                        $(window).scrollTop(0);
                        return false;
                    }else{
                        $(window).scrollTop(0);
                        $('.alert').show();
                        $('#alert_message').text(data.message);
                        setTimeout(function() {
                            var id = parseInt(data.supplier.id, 10) || 0;
                            var encodedId = btoa(unescape(encodeURIComponent(id)));
                            location.href = '<?php echo url('supplier_edit'); ?>?key=' + encodedId;
                        }, 3000);
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
                }
            });
        }
    }
    $('.reminder').on('change', function(){
        var radio=$('input[name="reminder"]:checked').val();
        if(radio == 1){
            $('.HideShow').show();
        }else{
            $('.HideShow').hide();
        }
    });
</script>
    @include('frontEnd.salesAndFinance.jobs.layout.footer')