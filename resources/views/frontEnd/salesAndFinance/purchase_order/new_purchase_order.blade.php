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
                        <div class="alert alert-primary mt-1 mb-0 text-center" id="message_save" style="display:none"></div>
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
                                                    <a href="javascript:void(0)" class="formicon"><i
                                                            class="fa-solid fa-square-plus" data-bs-toggle="modal" data-bs-target="#TagModal"></i></a>
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
                                            <input type="text" class="form-control editInput textareaInput" id="search_value"
                                                placeholder="Type to add product" onkeyup="get_search()">
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="plusandText">
                                                <a href="javascript:void(0)" class="formicon" onclick="get_modal(6)"><i class="fa-solid fa-square-plus"></i>
                                                </a>
                                                <span class="afterPlusText"> (Type to view product or <a href="Javascript:void(0)" onclick="show_product_model()">Click
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
                                                    <th>Account Code <a href="javascript:void(0)" class="formicon" onclick="get_modal(7)"><i class="fa-solid fa-square-plus"></i>
                                                    </a> </th>
                                                    <th>QTY</th>
                                                    <th>Price VAT(%) <a href="javascript:void(0)" class="formicon" onclick="get_modal(8)"><i class="fa-solid fa-square-plus"></i>
                                                    </a></th>
                                                    <th>VAT </th>
                                                    <th>Amount</th>
                                                    <th>Delivered QTY</th>
                                                    <th>Quantity Available</th>
                                                </tr>
                                            </thead>
                                            <tbody id="product_result">
                                                <?php $previous_ids=array();?>
                                                    <tr>
                                                        <td> </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                
                                            </tbody>
                                            <!-- <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>0.00</td>
                                                    <td>£0.00</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>£0.00</td>
                                                    <td></td>
                                                </tr> -->
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

                        <div class="newJobForm mt-4">
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
                        </div>
                        <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Tasks</label>
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" class="profileDrop @if(!isset($key) || $key == '') disabled-tab @endif" @if(!isset($key) || $key == '') disabled @else  onclick="get_modal(9)" @endif>New Task</a>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" onclick="get_modal(10)" class="profileDrop">Tasks</a>
                                            <a href="javascript:void(0)" onclick="get_modal(11)" class="profileDrop">Recurring Tasks</a>

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
        var modal_array=[1,2,4,5,6,7,8,9];
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
            }
            // else if(modal == 5){
            //     $("#contact_form")[0].reset();
            //     $("#contact_modal").modal('show');
            // }
            // else if(modal == 6){
            //     $("#site_form")[0].reset();
            //     $("#site_modal").modal('show');
            // }
            // else if(modal == 7){
            //     $("#job_type_form")[0].reset();
            //     $("#job_type_modal").modal('show');
            // }
            // else if(modal == 8){
            //     $("#add_product_form")[0].reset();
            //     $("#add_product_modal").modal('show');
            // }
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
                        $('#message_save').text(response.message).show();
                        setTimeout(function() {
                            $('#message_save').text('').hide();
                            var id = parseInt(response.data.id, 10) || 0;
                            var encodedId = btoa(unescape(encodeURIComponent(id)));
                            location.href = '<?php echo url('purchase_order_edit'); ?>?key=' + encodedId;
                        }, 3000);
                    }else{
                        alert("Something went wrong! Please try later");
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
                }
            });
        }
    }
 </script>

@include('frontEnd.salesAndFinance.jobs.layout.footer')