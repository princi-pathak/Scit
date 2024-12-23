@include('frontEnd.salesAndFinance.jobs.layout.header')
<style>
    .currency {
    padding: 2px 3px 2px 5px;
    line-height: 17px;
    text-shadow: 0 1px 0 #ffffff;
    border: 1px solid #ccc;
    background-color: #efefef;
    margin-right: 5px;
}
.calendar_icon {
    color:red; 
    display: flex;
    align-items: center;
}
.disabled-tab {
    pointer-events: none;
    opacity: 0.5;
}

.productDetailTable table.table thead tr th, .productDetailTable table.table tbody tr td, .productDetailTable table.table tfoot tr td {
    font-size: 12px;
    line-height: 22px;
}

.totlepayment {
    width: 300px;
    margin-left: 46%;
    text-align: end;
}
</style>
        <section class="main_section_page px-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 ">
                        <div class="pageTitle">
                            @if(isset($key) && $key !='')
                            <h3 class="header_text">{{$purchase_orders->purchase_order_ref}}</h3>
                            @else
                            <h3 class="header_text">New Purchase Order</h3>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="mt-1 mb-0 text-center" id="message_save"></div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4 px-3">
                    
                        <div class="pageTitleBtn">
                            <a href="javascript:void(0)" class="profileDrop" onclick="save_all_data()"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>

                        </div>
                    </div>
                </div>
                <form class="customerForm" id="all_data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="newJobForm">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="formDtail">
                                        <h4 class="contTitle">Supplier Details</h4>
                                       @csrf
                                        <input type="hidden" id="id" name="id" value="<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->id; }?>">
                                            <div class="mb-3 row">
                                                <label for="inputCustomer"
                                                    class="col-sm-3 col-form-label">Supplier<span class="radStar">*</span></label>
                                                <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions PurchaseOrdercheckError" id="purchase_supplier_id" name="supplier_id"  onchange="get_supplier_details()">
                                                    <option selected disabled>Select Supplier</option>
                                                    <?php foreach ($suppliers as $suppVal) { ?>
                                                        <option value="{{$suppVal->id}}" <?php if(isset($purchase_orders) && $suppVal->id == $purchase_orders->supplier_id){echo 'selected'; }?>>{{$suppVal->name}}</option>
                                                    <?php } ?>
                                                </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#supplierPop">
                                                        <i class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                                <div class="col-sm-1" id="clock" style="display:none">
                                                    <a href="#!" class="formicon"><i class="fa-solid fa-clock"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputContact"
                                                    class="col-sm-3 col-form-label">Contact</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions" id="purchase_contact_id" name="contact_id" <?php if(!isset($purchase_orders) && $purchase_orders ==''){echo 'disabled'; }?>>
                                                        <option selected disabled>Select Supplier First</option>
                                                        @foreach($additional_contact as $addContact)
                                                            <option value="{{$addContact->id}}" <?php if(isset($purchase_orders) && $purchase_orders->contact_id == $addContact->id){echo 'selected';}?>>{{$addContact->contact_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(1)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Name<span
                                                class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput PurchaseOrdercheckError" name="name" id="purchase_name" value="<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->name;}?>" placeholder="Enter Your Full Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Address<span
                                                    class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput PurchaseOrdercheckError" id="purchase_address" name="address" rows="3" placeholder="Enter Your Address"><?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->address;}?></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_city" name="city" value="<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->city;}?>" placeholder="Enter Your City">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_county" name="county" value="<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->county;}?>" placeholder="Enter Your County">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPincode"
                                                    class="col-sm-3 col-form-label">Postcode</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_postcode" name="postcode" value="<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->postcode;}?>" placeholder="Enter Your Postcode">
                                                </div>
                                            </div>
                                            <div class="mb-3 row field">
                                                <label for="inputTelephone"
                                                    class="col-sm-3 col-form-label">Telephone</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control editInput selectOptions" id="purchase_telephone_code" name="telephone_code">
                                                        @foreach($country as $Codeval)
                                                        <option value="{{$Codeval->id}}" <?php if(isset($purchase_orders) && $purchase_orders->telephone_code == $Codeval->id){echo 'selcted';}?>>+{{$Codeval->code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_telephone" name="telephone" value="<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->telephone;}?>" placeholder="Enter Your Telephone" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    <span style="color:red;display:none" id="CheckpurchaseTelephoneErr">Please enter 10 digit number</span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row field">
                                                <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control editInput selectOptions" id="purchase_mobile_code" name="mobile_code">
                                                    @foreach($country as $Codeval)
                                                        <option value="{{$Codeval->id}}" <?php if(isset($purchase_orders) && $purchase_orders->mobile_code == $Codeval->id){echo 'selcted';}?>>+{{$Codeval->code}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_mobile" name="mobile"  value="<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->mobile;}?>" placeholder="Enter Your Mobile No." onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    <span style="color:red;display:none" id="CheckpurchaseMobileErr">Please enter 10 digit number</span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_email" name="email" value="<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->email;}?>" placeholder="Enter Your Email" onchange="purchase_check_email()">
                                                    <span style="color:red" id="purchaseemailErr"></span>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="formDtail">
                                        <h4 class="contTitle">Customer / Delivery Details</h4>
                                        <!-- <form class="customerForm"> -->
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Customer</label>
                                                <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions" <?php if(!isset($key) && $key ==''){echo 'disabled';}?> id="purchase_customer_id" name="customer_id" onchange="get_customer_details()">
                                                    <option selected disabled>Select Customer</option>
                                                    <?php foreach ($customers as $cust) { ?>
                                                        <option value="{{$cust->id}}" <?php if(isset($purchase_orders) && $purchase_orders->customer_id == $cust->id){echo 'selected';}?>>{{$cust->name}}</option>
                                                    <?php } ?>
                                                </select>
                                                    <!-- <input type="text"  id="staticEmail"> -->
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(2)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputProject"
                                                    class="col-sm-3 col-form-label">Project</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions" id="purchase_project_id" name="project_id" <?php if(!isset($purchase_orders) && $purchase_orders ==''){echo 'disabled'; }?>>
                                                        <option selected disabled></option>
                                                        @foreach($projects as $project)
                                                            <option value="{{$project->id}}" <?php if(isset($purchase_orders) && $purchase_orders->project_id == $project->id){echo 'selected';}?>>{{$project->project_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(3)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Site</label>
                                                <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions get_site_result" id="purchase_site_id" name="site_id" <?php if(!isset($purchase_orders) && $purchase_orders ==''){echo 'disabled'; }?>>
                                                    <option selected>None</option>
                                                    @foreach($site as $siteVal)
                                                        <option value="{{$siteVal->id}}" <?php if(isset($purchase_orders) && $purchase_orders->site_id == $siteVal->id){echo 'selected';}?>>{{$siteVal->site_name}}</option>
                                                    @endforeach
                                                </select>
                                                    <!-- <input type="text"  id="staticEmail"> -->
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(4)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>



                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputContact"
                                                    class="col-sm-3 col-form-label">Name<span class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="user_name" id="purchase_user_name" class="form-control editInput textareaInput PurchaseOrdercheckError" value="<?php if(isset($purchase_orders) && $purchase_orders->user_name !=''){echo $purchase_orders->user_name;}else{echo Auth::user()->name;}?>" placeholder="Enter Your Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputContact"
                                                    class="col-sm-3 col-form-label">Company</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="company_name" id="purchase_company_name" class="form-control editInput textareaInput" value="<?php if(isset($purchase_orders) && $purchase_orders->company_name !=''){echo $purchase_orders->company_name;}else{echo $company_name;}?>" placeholder="Enter Comapny Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Address<span class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput PurchaseOrdercheckError" id="purchase_user_address" name="user_address" rows="3" placeholder="Enter Your Address"><?php if(isset($purchase_orders) && $purchase_orders->user_address !=''){echo $purchase_orders->user_address;}else{echo Auth::user()->current_location;}?></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control  editInput textareaInput" id="purchase_user_city" name="user_city" value="<?php if(isset($purchase_orders) && $purchase_orders->user_city !=''){echo $purchase_orders->user_city;}?>" placeholder="Enter Your City">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">County</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_user_county" name="user_county" value="<?php if(isset($purchase_orders) && $purchase_orders->user_county !=''){echo $purchase_orders->user_county;}?>" placeholder="Enter Your County">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputEmail" class="col-sm-3 col-form-label">Postcode</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_user_post_code" name="user_post_code" value="<?php if(isset($purchase_orders) && $purchase_orders->user_post_code !=''){echo $purchase_orders->user_post_code;}?>" placeholder="Enter Your Postcode">
                                                </div>
                                            </div>
                                            <div class="mb-3 row field">
                                            <label for="inputTelephone"
                                                class="col-sm-3 col-form-label">Telephone</label>
                                            <div class="col-sm-3">
                                                <select class="form-control editInput selectOptions" id="purchase_user_telephone_code" name="user_telephone_code">
                                                @foreach($country as $Codeval)
                                                    <option value="{{$Codeval->id}}" <?php if(isset($purchase_orders) && $purchase_orders->user_telephone_code == $Codeval->id){echo 'selected';}?>>+{{$Codeval->code}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control editInput textareaInput" id="purchase_user_telephone" name="user_telephone" value="<?php if(isset($purchase_orders) && $purchase_orders->user_telephone != ''){echo $purchase_orders->user_telephone;}else{echo Auth::user()->phone_no;}?>" placeholder="Enter Your Telephone" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                <span style="color:red;display:none" id="CheckpurchaseUserTelephoneErr">Please enter 10 digit number</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row field">
                                            <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                            <div class="col-sm-3">
                                                <select class="form-control editInput selectOptions" id="purchase_user_mobile_code" name="user_mobile_code">
                                                @foreach($country as $Codeval)
                                                    <option value="{{$Codeval->id}}" <?php if(isset($purchase_orders) && $purchase_orders->user_telephone_code == $Codeval->id){echo 'selected';}?>>+{{$Codeval->code}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control editInput textareaInput" id="purchase_user_mobile" name="user_mobile" value="<?php if(isset($purchase_orders) && $purchase_orders->user_mobile != ''){echo $purchase_orders->user_mobile;}else{echo Auth::user()->mobile;}?>" placeholder="Enter Your Mobile No." onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                <span style="color:red;display:none" id="CheckpurchaseUserMobileErr">Please enter 10 digit number</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputAddress"
                                                class="col-sm-6 col-form-label">Expected Delivery On</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control editInput textareaInput" id="purchase_expected_deleveryDate" name="expected_deleveryDate" value="<?php if(isset($purchase_orders) && $purchase_orders->expected_deleveryDate != ''){echo $purchase_orders->expected_deleveryDate;}?>">
                                            </div>
                                            <div class="col-sm-2 calendar_icon">
                                                <i class="fa fa-calendar-alt"></i>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="formDtail">
                                        <h4 class="contTitle">Purchase Order Details</h4>
                                        <!-- <form class="customerForm"> -->
                                            <div class="mb-3 row">
                                                <label for="inputJobRef" class="col-sm-4 col-form-label">Purchase Order Ref.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext editInput" id="inputJobRef" value="<?php if(isset($purchase_orders) && $purchase_orders->purchase_order_ref != ''){echo $purchase_orders->purchase_order_ref;}else{echo 'Auto generate';}?>" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputJobType" class="col-sm-3 col-form-label">Department</label>
                                                <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions" id="purchase_department_id" name="department_id">
                                                    <option selected disabled>Please Select</option>
                                                    <?php foreach ($department as $dept) { ?>
                                                        <option value="{{$dept->id}}" <?php if(isset($purchase_orders) && $purchase_orders->department_id == $dept->id){echo 'selected';}?>>{{$dept->title}}</option>
                                                    <?php } ?>
                                                </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(5)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputTelephone" class="col-sm-6 col-form-label">Purchase Date<span class="radStar">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control editInput PurchaseOrdercheckError" id="purchase_purchase_date" name="purchase_date" value="<?php if(isset($purchase_orders) && $purchase_orders->purchase_date != ''){echo $purchase_orders->purchase_date;}?>">
                                                </div>
                                                <div class="col-sm-2 calendar_icon">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Reference</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_reference" name="reference" placeholder="Reference(if any)" value="<?php if(isset($purchase_orders) && $purchase_orders->reference != ''){echo $purchase_orders->reference;}?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Quote Ref</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_qoute_ref" name="qoute_ref" placeholder="Quote, if any" value="<?php if(isset($purchase_orders) && $purchase_orders->qoute_ref != ''){echo $purchase_orders->qoute_ref;}?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPurchase" class="col-sm-3 col-form-label">Job Ref</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_job_ref" name="job_ref" placeholder="Job Ref, if any" value="<?php if(isset($purchase_orders) && $purchase_orders->job_ref != ''){echo $purchase_orders->job_ref;}?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPurchase" class="col-sm-3 col-form-label">Invoice Ref</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="purchase_invoice_ref" name="invoice_ref" placeholder="Invoice Ref, if any" value="<?php if(isset($purchase_orders) && $purchase_orders->invoice_ref != ''){echo $purchase_orders->invoice_ref;}?>">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                    <label class="col-sm-3 col-form-label">Payment Terms</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control editInput selectOptions" id="purchase_payment_terms" name="payment_terms">
                                                            <option value="21">Default (21)
                                                            </option>
                                                            <?php for($i=1;$i<21;$i++){?>
                                                            <option value="{{$i}}" <?php if(isset($purchase_orders) && $purchase_orders->payment_terms == $i){echo 'selected';}?>>{{$i}}</option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="form-check-label checkboxtext" for="checkalrt">
                                                            days</label>
                                                    </div>

                                                </div>
                                            <div class="mb-3 row">
                                                <label for="inputTelephone" class="col-sm-6 col-form-label">Payment Due Date</label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control editInput" id="purchase_payment_due_date" name="payment_due_date" value="<?php if(isset($purchase_orders) && $purchase_orders->payment_due_date != ''){echo $purchase_orders->payment_due_date;}?>">
                                                </div>
                                                <div class="col-sm-2 calendar_icon">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputPriority"
                                                    class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                <select class="form-control editInput selectOptions" id="purchase_status" name="status">
                                                    <option value="1" <?php if(isset($purchase_orders) && $purchase_orders->status == 1){echo 'selected';}else{echo 'selected';}?>>Draft</option>
                                                    <option value="2" <?php if(isset($purchase_orders) && $purchase_orders->status == 2){echo 'selected';}?>>Awaiting Approval</option>
                                                    <option value="3" <?php if(isset($purchase_orders) && $purchase_orders->status == 3){echo 'selected';}?>>Approved</option>
                                                    <option value="4" <?php if(isset($purchase_orders) && $purchase_orders->status == 4){echo 'selected';}?>>Actioned</option>
                                                    <option value="5" disabled>Paid</option>
                                                    <option value="6" <?php if(isset($purchase_orders) && $purchase_orders->status == 6){echo 'selected';}?>>Cancelled</option>
                                                    <option value="7" <?php if(isset($purchase_orders) && $purchase_orders->status == 7){echo 'selected';}?>>Invoice Received</option>
                                                    <option value="8" disabled>Rejected</option>
                                                </select>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputCountry" class="col-sm-3 col-form-label">Tags</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions" id="purchase_tag_id" name="tag_id">
                                                        <option selected disabled>None</option>
                                                        @foreach($tag as $tagval)
                                                            <option value="{{$tagval->id}}" <?php if(isset($purchase_orders) && $purchase_orders->tag_id == $tagval->id){echo 'selected';}?>>{{$tagval->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon">
                                                        <i class="fa-solid fa-square-plus" onclick="get_modal(6)"></i></a>
                                                </div>
                                            </div>

                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>

                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Product Details</label>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="mb-3 row">
                                        <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control editInput textareaInput" id="search-product" placeholder="Type to add product">
                                            <div class="parent-container"></div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="plusandText">
                                                <a href="javascript:void(0)" class="formicon" onclick="get_modal(7)"><i class="fa-solid fa-square-plus"></i>
                                                </a>
                                                <span class="afterPlusText"> (Type to view product or <a href="Javascript:void(0)" onclick="openProductListModal();">Click
                                                        here</a> to view all assets)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="pageTitleBtn p-0">
                                        <a href="#" class="profileDrop">Add Title</a>
                                        <!-- <a href="#" class="profileDrop">Show Variations</a>
                                        <a href="#" class="profileDrop bg-secondary">Export</a> -->

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="productDetailTable">
                                        <table class="table" id="result">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Job </th>
                                                    <th>Product </th>
                                                    <th>Code</th>
                                                    <th>Description </th>
                                                    <th>Account Code <a href="javascript:void(0)" class="formicon" onclick="get_modal(8)"><i class="fa-solid fa-square-plus"></i>
                                                    </a> </th>
                                                    <th>QTY</th>
                                                    <th>Price</th>
                                                    <th>Price VAT(%) <a href="javascript:void(0)" class="formicon" onclick="get_modal(9)"><i class="fa-solid fa-square-plus"></i>
                                                    </a></th>
                                                    <th>VAT </th>
                                                    <th>Amount</th>
                                                    <th>Delivered QTY</th>
                                                    <th>Quantity Available</th>
                                                </tr>
                                            </thead>
                                            <tbody id="product_result">
                                                 
                                            </tbody>

                                            
                                        </table>
                                        <table class="table totlepayment" id="product_calculation" style="display:none">
                                            <tfoot class="insrt_product_and_detail">
                                               
                                                <tr>
                                                    <td>Sub Total (exc. VAT)</td>
                                                    <td id="exact_vat"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        VAT
                                                    </td>
                                                    <td id="vat"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><strong>Total(inc.VAT)</strong></td>
                                                    <td><strong id="total_vat"></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Paid</td>
                                                    <td>-£0.00</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Outstanding (inc.VAT)</strong></td>
                                                    <td><strong id="outstanding_vat"></strong></td>
                                                </tr>
                                            </tfoot>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Notes</label>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="">
                                        <h4 class="contTitle text-start">Supplier Notes</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" id="purchase_supplier_notes" name="supplier_notes"><?php if(isset($purchase_orders) && $purchase_orders->supplier_notes != ''){echo $purchase_orders->supplier_notes;}?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="">
                                        <h4 class="contTitle text-start">Delivery Notes</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" id="purchase_delivery_notes" name="delivery_notes"><?php if(isset($purchase_orders) && $purchase_orders->delivery_notes != ''){echo $purchase_orders->delivery_notes;}?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="">
                                        <h4 class="contTitle text-start">Internal Notes</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" id="purchase_internal_notes" name="internal_notes"><?php if(isset($purchase_orders) && $purchase_orders->internal_notes != ''){echo $purchase_orders->internal_notes;}?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Attachments</label>
                            <div class="row">
                            <div class="col-sm-12">

                                <div class="py-4">
                                    <div class="jobsection">
                                        <input type="file" id="purchase_attachment" name="attachment" class="profileDrop">Upload Attachments
                                        <span><?php if(isset($purchase_orders) && $purchase_orders->file_original_name != ''){echo $purchase_orders->file_original_name;}?></span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Attachments</label>
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" class="profileDrop @if(!isset($key) || $key == '') disabled-tab @endif" @if(!isset($key) || $key == '') disabled @else  onclick="get_modal(10)" @endif>New Attachment</a>
                                            <a href="javascript:void(0)" class="profileDrop">Delete Attachment(s)</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="productDetailTable">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Type</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Section</th>
                                                        <th>File Name</th>
                                                        <th>Mime Type / Size</th>
                                                        <th>Created On</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="attachments_result"></tbody>
                                            </table>
                                            <div id="pagination-controls-Attachments"></div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Tasks</label>
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" class="profileDrop @if(!isset($key) || $key == '') disabled-tab @endif" @if(!isset($key) || $key == '') disabled @else  onclick="get_modal(11)" @endif>New Task</a>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" onclick="get_modal(12)" class="profileDrop">Tasks</a>
                                            <a href="javascript:void(0)" onclick="get_modal(13)" class="profileDrop">Recurring Tasks</a>

                                        </div>
                                    </div>

                                    <!-- <div class="col-sm-12">
                                        <div class="productDetailTable">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Full Name </th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Telephone </th>
                                                        <th>Last Login </th>
                                                        <th>Status </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="login_result"></tbody>
                                            </table>
                                        </div>
                                    </div> -->
                                    
                                </div>
                            </div>

                        </div>
                </div>
            </form>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 ">
                        <div class="pageTitle">
                            
                            <!-- <h3 class="header_text">New Jobs</h3> -->
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                        <div class="pageTitleBtn">
                            <a href="javascript:void(0)" class="profileDrop" onclick="save_all_data()"><i class="fa-solid fa-floppy-disk" ></i> Save</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                            <div class="pageTitleBtn p-0">
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
                                    <div class="dropdown-menu fade-up m-0 d-none">
                                        <a href="http://localhost/socialcareitsolution/job_edit?key=MQ==" class="dropdown-item col-form-label">Edit</a>
                                        <!-- <hr class="dropdown-divider"> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- Models Start Here -->

@include('components.add-supplier-modal')
@include('components.add-customer-modal')
@include('components.contact-modal')
@include('components.add-site-modal')
@include('components.job-title-model')
@include('components.customer-type-modal')
@include('components.region-model')
@include('components.add-project-modal')
@include('components.department-model')
@include('components.product-list')
@include('frontEnd.salesAndFinance.item.common.addproductmodal')

<x-tag-modal
    modalId="TagModal"
    modalTitle="Add Tag"
    formId="add_tag_form"
    inputId="tag_title"
    statusId="tag_status"
    saveButtonId="saveTag"
    placeholderText="Tag" />

<x-add-attachment-modal 
    purchaseModalId="purchase_model"
    purchaseformId="purchase_Attachmentform"
    refTitle="Purchase"
    modalTitle="Add Attachment"
    TypeId="purchase_typeId"
    inputTitle="purchase_title"
    selectfile_name="purchase_file"
    inputDescription="purchase_description"
    saveButtonId="savePurchaseAttachment"
    hiddenForeignId="po_id"
/>

<!-- End here -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js"></script>
<script>
        //Text Editer

var editor_config = {
  toolbar: [
      {name: 'basicstyles', items: ['Bold','Italic','Underline','Strike','-','RemoveFormat']},
      {name: 'format', items: ['Format']},
      {name: 'paragraph', items: ['Indent','Outdent','-','BulletedList','NumberedList']},
      {name: 'link', items: ['Link','Unlink']},
{name: 'undo', items: ['Undo','Redo']}
  ],
};

CKEDITOR.replace('purchase_supplier_notes', editor_config );
CKEDITOR.replace('purchase_delivery_notes', editor_config );
CKEDITOR.replace('purchase_internal_notes', editor_config );
//Text Editer
</script>
<script>
    function getAllSupplier(data){
        $("#purchase_supplier_id").append('<option value="'+data.id+'">'+data.name+'</option>');
    }
    function GetAllContact(contact_data){
        $("#purchase_contact_id").append('<option value="'+contact_data.data.id+'">'+contact_data.data.contact_name+'</option>');
    }
    function getAllCusomer(customer_data){
        $("#purchase_customer_id").append('<option value="'+customer_data.id+'">'+customer_data.name+'</option>');
    }
    function getAllCustomerType(customer_type_data){
        $("#customer_type_id").append(customer_type_data);
    }
    function getAllproject(project_data){
        $("#purchase_project_id").append(project_data);
    }
    function getAllsite(site_data){
        $("#purchase_site_id").append(site_data);
    }
    function getAlldepartment(department_data){
        $("#purchase_department_id").append('<option value="'+department_data.data.id+'">'+department_data.data.title+'</option>');
    }
    function get_supplier_details(){
        var supplier_id = $("#purchase_supplier_id").val();
        var token = '<?php echo csrf_token(); ?>'
        $.ajax({
            type: "POST",
            url: "{{url('get_supplier_details')}}",
            data: {
                supplier_id: supplier_id,
                _token: token
            },
            success: function(response) {
                console.log(response);
                $('#purchase_contact_id').removeAttr('disabled');
                var contactSelect=document.getElementById("purchase_contact_id");
                $("#contact_customer_id").val(response.data.id);
                $("#contact_customer_name").text(response.data.name);
                const all_contact=response.data.contacts;
                if (all_contact && all_contact.length > 0) {
                    contactSelect.innerHTML='';
                    all_contact.forEach((cont) => {
                        const option = document.createElement("option");
                        option.value = cont.id;
                        option.text = `${cont.contact_name}`;
                        contactSelect.appendChild(option);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    function get_customer_details() {
        var customer_id = $("#purchase_customer_id").val();
        var token = '<?php echo csrf_token(); ?>'
        $.ajax({
            type: "POST",
            url: "{{url('get_customer_details_front')}}",
            data: {
                customer_id: customer_id,
                _token: token
            },
            success: function(data) {
                console.log(data);
                $('#purchase_project_id').removeAttr('disabled');
                $('#purchase_site_id').removeAttr('disabled');
                if (data.customers && data.customers.length > 0) {
                var customerData = data.customers[0];
                // Populate project options
                var project = '<option value="0" selected>Select Project</option>';
                if (customerData.customer_project && Array.isArray(customerData.customer_project)) {
                    for (let i = 0; i < customerData.customer_project.length; i++) {
                        project += '<option value="' + customerData.customer_project[i].id + '">' + customerData.customer_project[i].project_name + '</option>';
                    }
                }
                document.getElementById('purchase_project_id').innerHTML = project;

                // Populate site options
                var site = '<option value="default" selected>Select Site</option>';
                if (customerData.sites && Array.isArray(customerData.sites)) {
                    for (let i = 0; i < customerData.sites.length; i++) {
                        site += '<option value="' + customerData.sites[i].id + '">' + customerData.sites[i].site_name + '</option>';
                    }
                }
                document.getElementById('purchase_site_id').innerHTML = site;

                // Enable the relevant fields
                $('#purchase_project_id').removeAttr('disabled');
                $('#purchase_site_id').removeAttr('disabled');
            }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
</script>

<script>
    function get_modal(modal){  
        // alert(modal)
        var supplier_select_check=$("#purchase_supplier_id").val();
        var modal_array=[1,2,4,7,8,9];
        if(supplier_select_check == null && modal_array.includes(modal)){
            alert("Please select Supplier");
            return false;
        }else{
            if(modal == 1){
                get_supplier_details();
                $("#contact_form")[0].reset();
                $('#contactModalLabel').text("Add Supplier Contact");
                $('#contactLabel').text("Supplier");
                $('#userType').val(2);
                $("#contact_modal").modal('show');
                
            }else if(modal == 2){
                $("#AddCustomerModal")[0].reset();
                $("#customerPop").modal('show');
            }else if(modal == 3){
                var customer_id=$("#purchase_customer_id").val();
                if(customer_id =='' || customer_id == null){
                    $("#HideShowFieldText").hide();
                    $("#HideShowFieldSelect").show();
                }else{
                    $("#HideShowFieldText").show();
                    $("#HideShowFieldSelect").hide();
                }
                $("#project_form")[0].reset();
                $("#project_modal").modal('show');
            }else if(modal == 4){
                $("#site_form")[0].reset();
                $("#site_modal").modal('show');
            }else if(modal == 5){
                $("#department_form_data")[0].reset();
                $("#departmentPop").modal('show');
            }else if(modal == 6){
                $("#add_tag_form")[0].reset();
                $("#TagModal").modal('show');
            }else if(modal == 7){
                itemsAddProductModal(1);
            }else if(modal == 10){
                var purchase_ref='<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->purchase_order_ref;}?>'
                var po_id='<?php if(isset($purchase_orders) && $purchase_orders !=''){echo $purchase_orders->id;}?>'
                $("#purchase_Attachmentform")[0].reset();
                $("#Purchase_ref").val(purchase_ref);
                $("#po_id").val(po_id);
                $("#purchase_model").modal('show');
            }
            // else if(modal == 9){
            //     $("#product_category_form")[0].reset();
            //     $("#product_category_modal").modal('show');
            // }
            // else if(modal == 10){
            //     $("#product_tax_form")[0].reset();
            //     $("#product_tax_modal").modal('show');
            // }
        }
        
    }
    function open_customer_type_modal(){
        $('#cutomer_type_modal').modal('show');
    }
 </script>
 <script>
    function purchase_check_email(){
        var email= $('#purchase_email').val();
        validRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (email.search(validRegExp) == -1){
            $('#purchaseemailErr').text("Please enter correct email address");
            return false;
        }else{
            $('#purchaseemailErr').text("");
        }
  }
    function save_all_data(){
        for (var instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var emailErr=$("#purchaseemailErr").text();
        $('.PurchaseOrdercheckError').each(function() {
            if ($(this).val() === '' || $(this).val() == null) {
                $(this).css('border','1px solid red');
                $(this).focus();
                return false;
            } else {
                $(this).css('border','');
            }
        });
        var purchase_telephone=$("#purchase_telephone").val();
        var purchase_mobile=$("#purchase_mobile").val();
        var purchase_user_telephone=$("#purchase_user_telephone").val();
        var purchase_user_mobile=$("#purchase_user_mobile").val();
        if(purchase_telephone !='' && purchase_telephone.length !=10){
            $("#CheckpurchaseTelephoneErr").show();
            return false;
        }else if(purchase_mobile !='' && purchase_mobile.length !=10){
            $("#CheckpurchaseTelephoneErr").hide();
            $("#CheckpurchaseMobileErr").show();
            return false;
        }else if(purchase_user_telephone !='' && purchase_user_telephone.length !=10){
            $("#CheckpurchaseTelephoneErr").hide();
            $("#CheckpurchaseMobileErr").hide();
            $("#CheckpurchaseUserTelephoneErr").show();
            return false;
        }else if(purchase_user_mobile !='' && purchase_user_mobile.length !=10){
            $("#CheckpurchaseTelephoneErr").hide();
            $("#CheckpurchaseMobileErr").hide();
            $("#CheckpurchaseUserTelephoneErr").hide();
            $("#CheckpurchaseUserMobileErr").show();
            return false;
        }else if(emailErr.length >0){
            $("#CheckpurchaseTelephoneErr").hide();
            $("#CheckpurchaseMobileErr").hide();
            $("#CheckpurchaseUserTelephoneErr").hide();
            $("#CheckpurchaseUserMobileErr").hide();
            return false;
        }else{
            $("#CheckpurchaseTelephoneErr").hide();
            $("#CheckpurchaseMobileErr").hide();
            $("#CheckpurchaseUserTelephoneErr").hide();
            $("#CheckpurchaseUserMobileErr").hide();
            $.ajax({
                type: "POST",
                url: "{{url('/purchase_order_save')}}",
                data: new FormData($("#all_data")[0]),
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                if(response.vali_error){
                        alert(response.vali_error);
                        $(window).scrollTop(0);
                        return false;
                    }else if(response.success === true){
                        $(window).scrollTop(0);
                        $('#message_save').addClass('success-message').text(response.message).show();
                        setTimeout(function() {
                            $('#message_save').removeClass('success-message').text('').hide();
                            var id = parseInt(response.data.id, 10) || 0;
                            var encodedId = btoa(unescape(encodeURIComponent(id)));
                            location.href = '<?php echo url('purchase_order_edit'); ?>?key=' + encodedId;
                        }, 3000);
                    }else if(response.success === false){
                        $('#message_save').addClass('error-message').text(response.message).show();
                        setTimeout(function() {
                            $('#error-message').text('').fadeOut();
                        }, 3000);
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + error);
                }
            });
        }
    }
    $("#savePurchaseAttachment").on('click', function(){
        $.ajax({
            type: "POST",
            url: "{{url('/purchase_order_attachment_save')}}",
            data: new FormData($("#purchase_Attachmentform")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if(response.vali_error){
                        alert(response.vali_error);
                        $(window).scrollTop(0);
                        return false;
                }else if(response.success === true){
                    $(window).scrollTop(0);
                    $('#attachment_messagse').addClass('success-message').text(response.message).show();
                    setTimeout(function() {
                        $('#attachment_messagse').removeClass('success-message').text('').hide();
                        location.reload();
                    }, 3000);
                }else if(response.success === false){
                    $('#attachment_messagse').addClass('error-message').text(response.message).show();
                    setTimeout(function() {
                        $('#attachment_messagse').text('').fadeOut();
                    }, 3000);
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                // alert('Error - ' + errorMessage + "\nMessage: " + error);
                $('#attachment_messagse').addClass('error-message').text(error).show();
                    setTimeout(function() {
                        $('#attachment_messagse').text('').fadeOut();
                    }, 3000);
            }
        });
    });
    $("#saveTag").on('click', function(){
        var title = $("#tag_title").val().trim(); 
        var status = $.trim($('#tag_status option:selected').val());

        if (title.includes(',')) {
            alert("Comma not allowed in the tag, please use _ or - instead");
            return false;
        }else if(title == ''){
            $("#tag_title").css('border','1px solid red');
            return false;
        }else{
            $("#tag_title").css('border','');
            $.ajax({
                type: "POST",
                url: "{{url('/save_tag')}}",
                data: new FormData($("#add_tag_form")[0]),
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if(response.vali_error){
                        alert(response.vali_error);
                        $(window).scrollTop(0);
                        return false;
                    }else if(response.data && response.data.original && response.data.original.error){
                        alert(response.data.original.error);
                        return false;
                    }else if(response.success === true){
                        // $(window).scrollTop(0);
                        // $('#message_save').text(response.message).show();
                        // setTimeout(function() {
                        //     $('#message_save').text('').hide();
                        // }, 3000);
                        $("#TagModal").modal('hide');
                        $("#purchase_tag_id").append('<option value="'+response.data.id+'">'+response.data.title+'</option>')

                    }else{
                        alert("Something went wrong! Please try later");
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + error);
                }
            });
        }
    });
 </script>
 <script>
    function getProductData(selectedId) {
        selectProduct(selectedId);
        // $.ajax({
        //     url: '{{ route("item.ajax.getProductFromId") }}',
        //     method: 'Post',
        //     data: {
        //         id: selectedId
        //     },
        //     success: function(response) {
        //         console.log(response);
        //         productGroupTable(response.data, 'result');
        //     },
        //     error: function(xhr, status, error) {
        //         console.error(error);
        //     }
        // });
    }
    var GrandPrice=0;
    var totalAmount=0;
    
    function selectProduct(id) {
        var token = '<?php echo csrf_token(); ?>'
        var key='order';
        $.ajax({
            type: "POST",
            url: "{{url('result_product_calculation')}}",
            data: {
                id: id, key:key, _token: token
            },
            success: function(data) {
                console.log(data);
                // $("#product_result").append(data.html);
                // UpdateItemDetailsCalculation();
                const tableBody = document.querySelector(`#result tbody`);
        
                // Check if data array is empty
                if (data.length === 0) {
                    // Create a row to display the "No products found" message
                    const noDataRow = document.createElement('tr');
                    noDataRow.id='EmptyError'
                    const noDataCell = document.createElement('td');

                    // Span across all columns in the table (adjust the colspan if your table has more columns)
                    noDataCell.setAttribute('colspan', 4);
                    noDataCell.textContent = 'No products found';
                    noDataCell.style.textAlign = 'center'; // Center the message

                    // Append the cell to the row and the row to the table body
                    noDataRow.appendChild(noDataCell);
                    tableBody.appendChild(noDataRow);
                } else {
                    // Populate rows as usual if data is not empty
                    const emptyErrorRow = document.getElementById('EmptyError');
                    if (emptyErrorRow) {
                        emptyErrorRow.remove();
                    }
                        const row = document.createElement('tr');
                        // job dropdown
                        const dropdownJob = document.createElement('td');

                        const selectDropdownJob = document.createElement('select');
                        selectDropdownJob.name = 'job_id[]';

                        const defaultOptionJob = document.createElement('option');
                        defaultOptionJob.value = '';
                        defaultOptionJob.text = '-Not Selected-';
                        selectDropdownJob.appendChild(defaultOptionJob);

                        const optionsJob = data.job;
                        optionsJob.forEach(optionJob => {
                            const optJob = document.createElement('option');
                            optJob.value = optionJob.id;
                            optJob.textContent = optionJob.name;
                            selectDropdownJob.appendChild(optJob);
                        });

                        dropdownJob.appendChild(selectDropdownJob);

                        row.appendChild(dropdownJob);
                        // end
                        const nameCell = document.createElement('td');
                        nameCell.innerHTML = data.product_detail.product_name;
                        row.appendChild(nameCell);

                        const codeCell = document.createElement('td');
                        codeCell.textContent = data.product_detail.product_code;
                        row.appendChild(codeCell);

                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.className = 'product_id';
                        hiddenInput.name = 'product_id[]';
                        hiddenInput.value = data.product_detail.id;
                        row.appendChild(hiddenInput);

                        const descriptionCell = document.createElement('td');
                        const inputDescription = document.createElement('textarea');
                        inputDescription.className = 'description';
                        inputDescription.name = 'description[]';
                        inputDescription.value = data.product_detail.description;
                        descriptionCell.appendChild(inputDescription);
                        row.appendChild(descriptionCell);

                        const dropdownAccountCode = document.createElement('td');
                        const selectDropdownAccountCode = document.createElement('select');
                        selectDropdownAccountCode.name = 'accountCode_id[]';

                        const optionsAccountCode = data.accountCode;

                        const defaultOptionAccountCode = document.createElement('option');
                        defaultOptionAccountCode.value = '';
                        defaultOptionAccountCode.text = '-No Department-';
                        selectDropdownAccountCode.appendChild(defaultOptionAccountCode);

                        optionsAccountCode.forEach(optionJob => {
                        const optAccountCode = document.createElement('option');
                        optAccountCode.value = optionJob.id;
                        optAccountCode.textContent = optionJob.name;
                        selectDropdownAccountCode.appendChild(optAccountCode);
                        });
                        dropdownAccountCode.appendChild(selectDropdownAccountCode);
                        row.appendChild(dropdownAccountCode);

                        const qtyCell = document.createElement('td');
                        const inputQty = document.createElement('input');
                        inputQty.type = 'text';
                        inputQty.className = 'qty input50';
                        inputQty.addEventListener('input', function() {
                            updateAmount(row);
                        });
                        inputQty.name = 'qty[]';
                        inputQty.value = '1';
                        qtyCell.appendChild(inputQty);
                        row.appendChild(qtyCell);

                        const priceCell = document.createElement('td');
                        const inputPrice = document.createElement('input');
                        inputPrice.type = 'text';
                        inputPrice.className = 'product_price input50';
                        inputPrice.addEventListener('input', function() {
                            updateAmount(row);
                        });
                        inputPrice.name = 'price[]'; 
                        inputPrice.value = data.product_detail.price;
                        GrandPrice=GrandPrice+Number(data.product_detail.price);
                        priceCell.appendChild(inputPrice);
                        row.appendChild(priceCell);

                        const dropdownVat = document.createElement('td');
                        const selectDropdownVat = document.createElement('select');
                        selectDropdownVat.addEventListener('change', function() {
                            // alert(`You selected: ${this.options[this.selectedIndex].text}`);
                            getIdVat($(this).val());
                        });
                        selectDropdownVat.name = 'vat_id[]';
                        const optionsVat =data.tax;
                        var tax_rate='00';
                        optionsVat.forEach(optionVat => {
                        const optVat = document.createElement('option');
                        optVat.value = optionVat.id;
                        if(optionVat.id == data.product_detail.tax_rate){
                            tax_rate=optionVat.tax_rate;
                            optVat.setAttribute("selected", "selected");
                        }
                        optVat.textContent = optionVat.name;
                        selectDropdownVat.appendChild(optVat);
                        });
                        dropdownVat.appendChild(selectDropdownVat);
                        row.appendChild(dropdownVat);

                        const vatCell = document.createElement('td');
                        const inputVat = document.createElement('input');
                        inputVat.type = 'text';
                        inputVat.className = 'vat';
                        inputVat.addEventListener('input', function() {
                            updateAmount(row);
                        });
                        inputVat.name = 'vat[]'; 
                        inputVat.value = parseFloat(tax_rate).toFixed(2);
                        vatCell.appendChild(inputVat);
                        row.appendChild(vatCell);

                        const amountCell = document.createElement('td');
                        amountCell.innerHTML = '£'+ parseFloat(data.product_detail.price).toFixed(2);
                        amountCell.className = "price";
                        row.appendChild(amountCell);
                        totalAmount=totalAmount+Number(data.product_detail.price);

                        const delveriQTYCell = document.createElement('td');
                        delveriQTYCell.innerHTML='-';
                        delveriQTYCell.className ='text-center';
                        row.appendChild(delveriQTYCell);

                        const deleteCell = document.createElement('td');
                        deleteCell.innerHTML = '<i class="fas fa-times fa-2x deleteRow" style="color: red;"></i>';
                        deleteCell.addEventListener('click', function() {
                            removeRow(this);
                        });
                        row.appendChild(deleteCell);

                        tableBody.appendChild(row);
                        updateAmount(row)
                        $("#product_calculation").show();
                }

            }
        });
    }
    function removeRow(button,id=null) {
        console.log(button);
        const table = document.getElementById("result");
        const tbody = table.querySelector("tbody");
        const rowCount = tbody ? tbody.rows.length : 0;
        if(rowCount <= 1){
            $("#product_calculation").hide();
        }
        var row = button.parentNode;
        
        if(id){
            var token = '<?php echo csrf_token(); ?>'
            $.ajax({
                type: "POST",
                url: "{{url('jobassign_productsDelete')}}",
                data: {id:id,_token: token},
                success: function(data) {
                    console.log(data);
                    if(data.success != true){
                        alert("Something went wrong! Please try later");
                        return false;
                    }else{
                        row.parentNode.removeChild(row);
                        updateAmount(row);
                    }
                }
            });
        }else{
            row.parentNode.removeChild(row);
            updateAmount(row);
        }
    }
    // $(".quantity").on('keyup', function(){
        $(document).on("keyup", ".quantity", function() {
        var qty = $(this).val();
        var row = $(this).closest('tr');
        updateAmount(row);
        // var price = row.find("input#pricejob").val();
        // if(qty != ''){
        //     $('#pro_qty').val(qty);
        //     var totalPrice = qty * price;
        //     row.find("#pre_total_amount").text(totalPrice);
        // }else{
        //     $('#pro_qty').val('0');
        //     row.find("#pre_total_amount").text(price);
        // }
        //     var totalAmountAssign=0;
        //     $('.pre_total_amount').each(function(index){
        //         var amount_assign=$(this).text();
        //         totalAmountAssign=totalAmountAssign+Number(amount_assign);
        //     });
        //     $("#total_amount").text('£' + totalAmountAssign);
    });

    function updateAmount(row) {
        // console.log(row)
        // const priceInput = row.querySelector('.price');
        const priceInput = row.querySelector('.product_price');
        const qtyInput = row.querySelector('.qty');
        const amountCell = row.querySelector('td:nth-last-child(3)');
        const price = parseFloat(priceInput.value) || 0;
        const qty = parseInt(qtyInput.value) || 1;
        const amount = price * qty;
        amountCell.textContent = '£'+amount.toFixed(2);

        var calculation=0;
        $('.price').each(function () {
            const priceText = $(this).text();
            const numericValue = parseFloat(priceText.replace(/[^\d.]/g, ''));
            // console.log(typeof(numericValue));
            calculation=calculation+numericValue;
        });
        var vat_amount=0;
        $('.vat').each(function () {
            const vat = $(this).val();
            vat_amount=vat_amount+Number(vat);
        });
        totalAmount=calculation;
        // console.log(typeof(vat_amount));
        // document.getElementById('GrandTotalAmount').innerHTML='$'+totalAmount.toFixed(2);
        $("#productPrice").val(totalAmount.toFixed(2));
        $("#exact_vat").text('£'+totalAmount.toFixed(2));
        $("#vat").text('£'+vat_amount.toFixed(2));
        var total_vat=totalAmount+vat_amount;
        $("#total_vat").text('£'+total_vat.toFixed(2));
        $("#outstanding_vat").text('£'+total_vat.toFixed(2));
    }
 </script>
 <script>
    $(document).ready(function() {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#search-product').on('keyup', function() {
    let query = $(this).val();
    const divList = document.querySelector('.parent-container');

    if (query === '') {
        divList.innerHTML = '';
    }

    // Make an AJAX call only if query length > 2
    if (query.length > 2) {
        $.ajax({
            url: "{{ route('item.ajax.searchProduct') }}", // Laravel route
            method: 'GET',
            data: {
                query: query
            },
            success: function(response) {
                console.log(response);
                // $('#results').html(response);
                divList.innerHTML = "";
                const div = document.createElement('div');
                div.className = 'container'; // Optional: Add a class to the div for styling

                // Step 2: Create a ul (unordered list)
                const ul = document.createElement('ul');
                ul.id = "productList";
                // Step 3: Loop through the data and create li (list item) for each entry
                response.forEach(item => {
                    const li = document.createElement('li'); // Create a new li element
                    li.textContent = item.product_name; // Set the text of the li item
                    li.id = item.id;
                    li.className = "editInput";
                    ul.appendChild(li); // Append the li to the ul
                });

                // Step 4: Append the ul to the div
                div.appendChild(ul);

                // Step 5: Append the div to the parent container in the HTML
                divList.appendChild(div);

                ul.addEventListener('click', function(event) {
                    divList.innerHTML = '';
                    document.getElementById('search-product').value = '';
                    // Check if the clicked element is an <li> (to avoid triggering on other child elements)
                    if (event.target.tagName.toLowerCase() === 'li') {
                        const selectedId = event.target.id; // Get the ID of the clicked <li>
                        console.log('Selected Product ID:', selectedId); // Print the ID of the selected product
                        getProductData(selectedId);
                    }
                });

            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    } else {
        $('#results').empty(); // Clear results if the input is empty
    }
});

});
 </script>
 <script>
    $(document).ready(function(){
        var purchaseOrderId='<?php if(isset($purchase_orders)){echo $purchase_orders->id;}?>'
        getAttachment(purchaseOrderId,'{{ url("getAllAttachmens") }}');
    });
    function getAttachment(id,pageUrl = '{{ url("getAllAttachmens") }}'){
        var token='<?php echo csrf_token();?>'
        $.ajax({
            url: pageUrl,
            method: 'POST',
            data: {id: id,_token:token},
            success: function(response) {
                console.log(response.data.data);return false;
                var data = response.data.data;
                var paginationAttachment = response.pagination;
                var tableBody = $("#attachments_result"); 
                tableBody.empty();
                var html='';
                if(data.length>0){
                    var count=1;
                    data.forEach(function(item) {
                        
                        html+= '<tr>' +
                            '<td>' + count + '</td>' +
                            '<td>' + item.contact + '</td>' +
                            '<td>' + item.email + '</td>' +       
                            '<td>' + item.telephone + '</td>' +        
                            '<td>' + item.mobile + '</td>' +
                            '<td>' + item.address + '</td>' +
                            '<td>' + item.city + '</td>' +
                            '<td>' + item.country + '</td>' +
                            '<td>' + item.postcode + '</td>' +
                            '<td>' + (item.default_billing == 1 ? "Yes" : "No") + '</td>' +
                            '</tr>';
                        count++;
                    });
                }else{
                    html+='<tr> <td colspan="10"> <label class="red_sorryText">Sorry, no records to show</label> </td> </tr>';
                    
                }
                tableBody.html(html);
                var paginationControlsAttachment = $("#pagination-controls-Attachments");
                paginationControlsAttachment.empty();
                if (paginationAttachment.prev_page_url) {
                    paginationControlsAttachment.append('<button class="profileDrop" onclick="getAttachment(' + id + ', \'' + paginationContact.prev_page_url + '\')">Previous</button>');
                }
                if (paginationAttachment.next_page_url) {
                    paginationControlsAttachment.append('<button class="profileDrop" onclick="getAttachment(' + id + ', \'' + paginationContact.next_page_url + '\')">Next</button>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                location.reload();
            }
        });
    }
    
 </script>

@include('frontEnd.salesAndFinance.jobs.layout.footer')