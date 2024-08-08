@include('frontEnd.jobs.layout.header')


<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>New Customer</h3>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <div class="pageTitleBtn">
                    <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                    <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>

                </div>
            </div>
        </div>
        <div class="alert alert-success text-center" id="msg" style="display:none">
            <p>{{$task}} Successfully Done</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="progress-bar">
                    <div class="step">
                        <p>Customer Details</p>
                        <div class="bullet">
                            <span>1</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Address Details</p>
                        <div class="bullet">
                            <span>2</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Other Details</p>
                        <div class="bullet">
                            <span>3</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Customer Message</p>
                        <div class="bullet">
                            <span>4</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Additional Contacts</p>
                        <div class="bullet">
                            <span>5</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Customer Sites</p>
                        <div class="bullet">
                            <span>6</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Customer Logins</p>
                        <div class="bullet">
                            <span>7</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="newJobForm">


                    <div class="containerForm">

                        <div class="form-outer">
                            <form id="form_data">
                                @csrf
                                <input type="hidden" id="customer_id" name="id" value="<?php if(isset($customer)){echo $customer->id;}?>">
                                <input type="hidden" id="is_converted" name="is_converted" value="1">
                                <input type="hidden" id="site_customer_id" name="site_customer_id">
                                <input type="hidden" id="login_customer_id" name="login_customer_id">
                                <input type="hidden" id="home_id" name="home_id" value="{{$home_id}}">
                                <div class="page slide-page">
                                <div class="title">Customer Details</div>
                                    <div class="mb-2 row field">
                                        <label for="inputName" class="col-sm-3 col-form-label">Customer
                                            Name*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="name" id="name" value="<?php if(isset($customer)){echo $customer->name;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row field">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Customer Type</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" name="customer_type_id" id="customer_type_id" required>
                                                <option value="" selected disabled>Select Customer Type</option>
                                                <?php foreach($customer_type as $type){?>
                                                    <option value="{{$type->id}}" <?php if(isset($customer) && $customer->customer_type_id == $type->id){echo "selected";}?>>{{$type->name}}</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon" id="openPopupButton"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>

                                    <div class="mb-2 row field">
                                        <label for="inputName" class="col-sm-3 col-form-label">Conatact
                                            Name*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="contact_name" id="contact_name" value="<?php if(isset($customer)){echo $customer->contact_name;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Job Title
                                            (Position)</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" name="job_title" id="job_title">
                                                <option value="" selected disabled>Select Job Title</option>
                                                <?php foreach($job_title as $title){?>
                                                <option value="{{$title->id}}" <?php if(isset($customer) && $customer->job_title == $title->id){echo "selected";}?>>{{$title->name}}</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="email" id="email" value="<?php if(isset($customer)){echo $customer->email;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="telephone" id="telephone" value="<?php if(isset($customer)){echo $customer->telephone;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="mobile" id="mobile" value="<?php if(isset($customer)){echo $customer->mobile;}?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row field">
                                        <label for="inputName" class="col-sm-3 col-form-label">Fax*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="fax" id="fax" value="<?php if(isset($customer)){echo $customer->fax;}?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="website" id="website" value="<?php if(isset($customer)){echo $customer->website;}?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row field">
                                        <label for="inputCounty" class="col-sm-3 col-form-label">Default
                                            Catalogue</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" name="catalogue_id" id="catalogue_id" required>
                                                <option value="" selected disabled>Select Catalogue</option>
                                                <option value="1" <?php if(isset($customer) && $customer->catalogue_id == 1){echo "selected";}?>>Site-2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPincode" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="status" name="status" required>
                                                <option value="1" <?php if(isset($customer) && $customer->status == 1){echo "selected";}?>>Active</option>
                                                <option value="0" <?php if(isset($customer) && $customer->status == 0){echo "selected";}?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field nextfornBtn">
                                        <button type="button" class="firstNext next profileDrop">Next</button>
                                    </div>
                                </div>

                                <div class="page">
                                    <div class="title">Address Details</div>
                                    <div class="mb-3 row field">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" name="region" id="region" required>
                                                <option value="" selected disabled>None</option>
                                                <option value="India" <?php if(isset($customer)){echo "selected";}?>>Default</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="address" rows="3" required><?php if(isset($customer)){echo $customer->address;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="city" name="city" value="<?php if(isset($customer)){echo $customer->city;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="country" name="country" value="<?php if(isset($customer)){echo $customer->country;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPincode" class="col-sm-3 col-form-label">Pincode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="postal_code" name="postal_code" value="<?php if(isset($customer)){echo $customer->postal_code;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="country_code" id="country_code" required>
                                                <option value="" selected disabled>None</option>
                                                <?php foreach($country as $country_code){?>
                                                    <option value="{{$country_code->id}}" <?php if(isset($customer) && $customer->country_code == $country_code->id){echo "selected";}?>>{{$country_code->name}} ({{$country_code->code}})</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Site
                                            Notes</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="site_notes" id="site_notes" required><?php if(isset($customer)){echo $customer->site_notes;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="field btns nextfornBtn">
                                        <button class="prev-1 prev profileDrop">Previous</button>
                                        <button type="button" class="next-1 next profileDrop">Next</button>
                                    </div>
                                </div>
                                <div class="page">
                                    <div class="title">Other Details</div>

                                    <div class="mb-3 row field">
                                        <label for="inputJobType" class="col-sm-3 col-form-label">Currency</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="currency" name="currency" required>
                                                <option value="" selected disabled>None</option>
                                                <?php foreach($country as $currency){?>
                                                    <option value="{{$currency->currency_code}}" <?php if(isset($customer) && $customer->currency == $currency->currency_code){echo "selected";}?>>{{$currency->name}} - {{$currency->currency_code}}</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Credit
                                            Limit</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="credit_limit" name="credit_limit" value="<?php if(isset($customer)){echo $customer->credit_limit;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="discount" name="discount" value="<?php if(isset($customer)){echo $customer->discount;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputJobType" class="col-sm-3 col-form-label">Discount
                                            Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="discount_type" name="discount_type" required>
                                                <option value="" selected disable>Select Discount Type</option>
                                                <option value="1" <?php if(isset($customer) && $customer->discount_type == 1){echo "selected";}?>>Percentage</option>
                                                <option value="2" <?php if(isset($customer) && $customer->discount_type == 2){echo "selected";}?>>Flat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Sage
                                            Ref.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="saga_ref" name="saga_ref" value="<?php if(isset($customer)){echo $customer->saga_ref;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputJobType" class="col-sm-3 col-form-label">Company
                                            Reg</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="company_reg" name="company_reg" value="<?php if(isset($customer)){echo $customer->company_reg;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPriority" class="col-sm-3 col-form-label">VAT / Tax
                                            No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="vat_tax_no" name="vat_tax_no" value="<?php if(isset($customer)){echo $customer->vat_tax_no;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row field">
                                        <label class="col-sm-3 col-form-label">Payment Terms</label>
                                        <div class="col-sm-6">
                                            <select class="form-control editInput selectOptions" id="payment_terms" name="payment_terms" required>
                                                <option value="" selected disabled>None</option>
                                                <option value="21" <?php if(isset($customer)){echo "selected";}?>>Default</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-check-label checkboxtext" for="checkalrt">
                                                days</label>
                                        </div>

                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Assigned Products</label>
                                        <div class="col-sm-9">
                                        <label class="radio-inline">
                                            <input type="radio" id="assigned_product1" class="assigned_product" name="r" <?php if(isset($customer) && $customer->assigned_product == 1){echo "checked";}?>> Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" id="assigned_product2" class="assigned_product" name="r" <?php if(isset($customer) && $customer->assigned_product == 0){echo "checked";}?>> No
                                        </label>
                                            <input type="hidden" value="" name="assigned_product" id="assigned_product">
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Notes</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="notes" id="notes" required><?php if(isset($customer)){echo $customer->notes;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPriority" class="col-sm-3 col-form-label">Dflt Products Tax</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="product_tax" name="product_tax" value="<?php if(isset($customer)){echo $customer->product_tax;}?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPriority" class="col-sm-3 col-form-label">Dflt Services Tax</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="service_tax" name="service_tax" value="<?php if(isset($customer)){echo $customer->service_tax;}?>" required>
                                        </div>
                                    </div>
                                    

                                    <div class="field btns nextfornBtn">
                                        <button class="prev-2 prev profileDrop">Previous</button>
                                        <button type="button" class="next-2 next profileDrop">Next</button>
                                    </div>
                                </div>
                                <div class="page">
                                    <div class="title">Customer Message</div>

                                    <div class="newJobForm mt-4">
                                        <label class="upperlineTitle">Message</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3 row">
                                                    <label for="inputCountry" class="col-sm-2 col-form-label">Show Message</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="show_msg" name="show_msg" <?php if(isset($customer) && $customer->show_msg == 1){echo "checked";}?> value="<?php if(isset($customer) && $customer->show_msg == 1){echo "1";}else{echo "0";}?>">
                                                            <label class="form-check-label checkboxtext" for="checkalrt">Yes, show
                                                                the
                                                                message</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-md-2 col-form-label">Message</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control textareaInput" name="msg" id="msg" rows="3" placeholder="Site Notes"><?php if(isset($customer)){echo $customer->msg;}?></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-md-2 col-form-label">Section</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control editInput selectOptions" id="section_id" name="section_id[]" required>
                                                            <option value="" selected disabled>None</option>
                                                            <option value="1" <?php if(isset($customer) && $customer->section_id == 1){echo "selected";}?>>Quotes</option>
                                                            <option value="2" <?php if(isset($customer) && $customer->section_id == 2){echo "selected";}?>>Job</option>
                                                            <option value="3" <?php if(isset($customer) && $customer->section_id == 3){echo "selected";}?>>Invoice</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field btns nextfornBtn mt-3 p-0">
                                        <button class="prev-3 prev profileDrop">Previous</button>
                                        <button type="button" class="next-3 next profileDrop">Next</button>
                                    </div>
                                </div>

                                <div class="page">
                                    <div class="title">Additional Contacts</div>
                                    <div class="newJobForm mt-4">
                                        <label class="upperlineTitle">Contacts</label>
                                        <div class="row">
                                            <div class="col-sm-12 mb-3 mt-2">
                                                <div class="jobsection">
                                                    <a href="javascript:void(0)" onclick="open_model(1)" class="profileDrop">Add Contact</a>
                                                    <a href="#" class="profileDrop">Export</a>
                                                    <a href="#" class="profileDrop">Import</a>
                                                    <label class="col-form-label"><a href="#!">Click here </a>to download import
                                                        template</label>
                                                    <label>
                                                        <a href="#" class="profileDrop dropdown-toggle ms-2">Bulk Action</a>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="productDetailTable">
                                                    <table class="table">
                                                        <thead class="table-light">
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
                                                        <?php foreach($contact as $conv){
                                                                $job_title_details=App\Models\Job_title::find($conv->job_title_id);
                                                                // echo "<pre>";print_r($job_title->name);die;
                                                        ?>
                                                            <tr>
                                                                <td><input type="checkbox" class="checkboxContactId" value="{{$conv->id}}"></td>
                                                                <td>{{$conv->contact_name}}</td>
                                                                <td>{{$job_title_details->name}}</td>
                                                                <td>{{$conv->email}}</td>
                                                                <td>{{$conv->telephone}}</td>
                                                                <td>{{$conv->mobile}}</td>
                                                                <td>{{$conv->address}}</td>
                                                                <td>{{$conv->city}}</td>
                                                                <td>{{$conv->country}}</td>
                                                                <td>{{$conv->postcode}}</td>
                                                                <td><?php echo ($conv->default_billing == 1)?"Yes":"No";?></td>

                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End  off newJobForm -->
                                    <div class="field btns nextfornBtn mt-3 p-0">
                                        <button class="prev-4 prev profileDrop">Previous</button>
                                        <button type="button" class="next-4 next profileDrop">Next</button>
                                    </div>
                                </div>

                                <div class="page">
                                    <div class="title">Customer Sites</div>
                                    <div class="newJobForm mt-4">
                                        <label class="upperlineTitle">Sites</label>
                                        <div class="row">
                                            <div class="col-sm-12 mb-3 mt-2">
                                                <div class="jobsection">
                                                    <a href="javascript:void(0)" onclick="open_model(2)" class="profileDrop">Add Site</a>
                                                    <a href="#" class="profileDrop">Export</a>
                                                    <a href="#" class="profileDrop">Import</a>
                                                    <label class="col-form-label"><a href="#!">Click here </a>to download import
                                                        template</label>
                                                    <label>
                                                        <a href="#" class="profileDrop dropdown-toggle ms-2">Bulk Action</a>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="productDetailTable">
                                                    <table class="table">
                                                        <thead class="table-light">
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
                                                            <th>Region </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody id="site_result">
                                                            <?php foreach($site as $sitev){
                                                                $job_title_detail=App\Models\Job_title::find($sitev->title_id);
                                                                ?>
                                                                <tr>
                                                                    <td><input type="checkbox" value="{{$sitev->id}}"></td>
                                                                    <td>{{$sitev->contact_name}}</td>
                                                                    <td>{{$job_title_detail->name}}</td>
                                                                    <td>{{$sitev->email}}</td>
                                                                    <td>{{$sitev->telephone}}</td>
                                                                    <td>{{$sitev->mobile}}</td>
                                                                    <td>{{$sitev->address}}</td>
                                                                    <td>{{$sitev->city}}</td>
                                                                    <td>{{$sitev->country}}</td>
                                                                    <td>{{$sitev->post_code}}</td>
                                                                    <td></td>
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End  off newJobForm -->
                                    <div class="field btns nextfornBtn mt-3 p-0">
                                        <button class="prev-4 prev profileDrop">Previous</button>
                                        <button type="button" class="next-4 next profileDrop">Next</button>
                                    </div>
                                </div>
                                <div class="page">
                                    <div class="title">Customer Logins</div>
                                    <div class="newJobForm mt-4">
                                        <label class="upperlineTitle">
                                            Logins</label>
                                        <div class="row">
                                            <div class="col-sm-12 mb-3 mt-2">
                                                <div class="jobsection">
                                                    <a href="javascript:void(0)" onclick="open_model(3)" class="profileDrop">Add Login</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="productDetailTable">
                                                    <table class="table">
                                                        <thead class="table-light">
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
                                                            <?php foreach($login as $k=>$logv){?>
                                                                <tr>
                                                                    <td>{{++$k}}</td>
                                                                    <td>{{$logv->name}}</td>
                                                                    <td>{{$logv->email}}</td>
                                                                    <td>{{$logv->email}}</td>
                                                                    <td>{{$logv->telephone}}</td>
                                                                    <td></td>
                                                                    <td><?php echo($logv->status == 1)?"Active":"In-active";?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End  off newJobForm -->
                                    <div class="field btns nextfornBtn mt-3 p-0">
                                        <button class="prev-5 prev profileDrop">Previous</button>
                                        <button type="button" class="submit profileDrop">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End  off col-12 -->
            <!-- Modal -->
             <!-- Contact Model -->
            <div class="modal fade" id="ContactModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Customer Contact</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputName" class="col-sm-3 col-form-label">Customer</label>
                            <div class="col-sm-9">
                                <p id="customer_name" class="customer_name"></p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form role="form" id="contact_form">
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Default Billing*</label>
                                    <div class="col-sm-9">
                                        <input type="radio" class="editInput" name="billing" id="billing1" value="1"> Yes
                                        <input type="radio" class="editInput" name="billing" id="billing2" value="0"> No
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Contact Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="contact_name" id="contact_name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Job Title(Position)</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" id="contact_title_id" name="contact_title_id">
                                            <option selected disabled>Select Job Title</option>
                                            <?php foreach($job_title as $titlev){?>
                                            <option value="{{$titlev->id}}">{{$titlev->name}}</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="contact_email" id="contact_email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Telephone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="contact_telephone" id="contact_telephone">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="contact_mobile" id="contact_mobile">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Fax</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="contact_fax" id="contact_fax">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Address Details</label>
                                    <div class="col-sm-9">
                                        Same as default
                                        <input type="checkbox" class="editInput" name="defaultaddcheck" id="defaultaddcheck">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Address*</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" name="contact_address" id="contact_address" rows="3" placeholder="Site Notes"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="contact_city" id="contact_city">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="contact_country" id="contact_country">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Postcode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="contact_postcode" id="contact_postcode">
                                    </div>
                                </div>
                                <div class="mb-3 row field">
                                        <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="contact_country_code" id="contact_country_code" required>
                                                <option value="" selected disabled>None</option>
                                                <?php foreach($country as $country_idc){?>
                                                    <option value="{{$country_idc->id}}">{{$country_idc->name}} ({{$country_idc->code}})</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="pageTitleBtn p-0">
                                <button type="button" class="profileDrop" id="addNotesType" onclick="save_contact()">Save</button>
                                <button type="button" class="profileDrop" onclick="SaveAndClose(1)">Save & Close</button>
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Site Model start -->
            <div class="modal fade" id="SiteModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Site Address</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputName" class="col-sm-3 col-form-label">Customer</label>
                            <div class="col-sm-9">
                                <p id="customer_name" class="customer_name"></p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form role="form" id="site_form">
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Site Name*</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control editInput" name="site_name" id="site_name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Contact Name*</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="site_contact_name" id="site_contact_name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Job Title(Position)</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" id="site_title_id" name="site_title_id">
                                            <option selected disabled>Select Job Title</option>
                                            <?php foreach($job_title as $titlev){?>
                                            <option value="{{$titlev->id}}">{{$titlev->name}}</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Company Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="company_name" id="company_name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="site_email" id="site_email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Telephone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="site_telephone" id="site_telephone">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="site_mobile" id="site_mobile">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Fax</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="site_fax" id="site_fax">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Region</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" id="site_region" name="site_region">
                                            <option selected disabled>None</option>
                                            <option value="1">India</option>
                                            <option value="2">Canada</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Address*</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" name="site_address" id="site_address" rows="3" placeholder="Site Notes"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="site_city" id="site_city">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="site_country" id="site_country">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Postcode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="site_postcode" id="site_postcode">
                                    </div>
                                </div>
                                <div class="mb-3 row field">
                                        <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="site_country_id" id="site_country_id" required>
                                                <option value="" selected disabled>None</option>
                                                <?php foreach($country as $country_ids){?>
                                                    <option value="{{$country_ids->id}}">{{$country_ids->name}} ({{$country_ids->code}})</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                </div>
                                <div class="mb-3 row field">
                                    <label for="inputCountry" class="col-sm-3 col-form-label">Default Catalogue</label>
                                    <div class="col-sm-9">
                                    <select class="form-control editInput selectOptions" name="site_catalogue_id" id="site_catalogue_id" required>
                                            <option value="" selected disabled>None</option>
                                            <option value="1">General Catalogue</option>
                                            <option value="2">Custome Catalogue</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row field">
                                    <label for="inputCountry" class="col-sm-3 col-form-label">Notes</label>
                                    <div class="col-sm-12">
                                        <textarea name="site_note" id="site_note" rows="3" class="form-control editInput textareaInput"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="pageTitleBtn p-0">
                                <button type="button" class="profileDrop" id="addNotesType" onclick="save_site()">Save</button>
                                <button type="button" class="profileDrop" onclick="SaveAndClose(2)">Save & Close</button>
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Model start -->
            <div class="modal fade" id="LoginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Customer Login</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputName" class="col-sm-3 col-form-label">Customer</label>
                            <div class="col-sm-9">
                                <p id="customer_name" class="customer_name"></p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form role="form" id="login_form">
                            <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Email*</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_email" id="login_email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Password Type*</label>
                                    <div class="col-sm-9">
                                        <input type="radio" class="editInput" name="password_type" id="password_type1"> Generate Now
                                        <input type="radio" class="editInput" name="password_type" id="password_type2" checked> Email Password
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Name*</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_name" id="login_name">
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Telephone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_telephone" id="login_telephone">
                                    </div>
                                </div>
                                <div class="mb-3 row field">
                                    <label for="inputCountry" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" name="login_status" id="login_status" required>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Access Rights</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" id="login_check" name="login_check" value="1" class="login_check"> Quotes
                                        <input type="checkbox" id="login_check" name="login_check" value="2" class="login_check"> Jobs
                                        <input type="checkbox" id="login_check" name="login_check" value="3" class="login_check"> Invoices
                                        <input type="checkbox" id="login_check" name="login_check" value="4" class="login_check"> File Manager
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Projects</label>
                                    <div class="col-sm-9">
                                        <input type="radio" class="editInput" name="project" id="project1"> All
                                        <input type="radio" class="editInput" name="project" id="project2"> Customise
                                    </div>
                                </div>
                                
                                <div class="mb-3 row field">
                                    <label for="inputCountry" class="col-sm-3 col-form-label">Notes</label>
                                    <div class="col-sm-12">
                                        <textarea name="login_note" id="login_note" rows="3" class="form-control editInput textareaInput"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="pageTitleBtn p-0">
                                <button type="button" class="profileDrop" id="addNotesType" onclick="save_login()">Save</button>
                                <button type="button" class="profileDrop" onclick="SaveAndClose(3)">Save & Close</button>
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal End -->
        </div>
    </div>
</section>
<script>
    initMultiStepForm();

    function initMultiStepForm() {
        const progressNumber = document.querySelectorAll(".step").length;
        const slidePage = document.querySelector(".slide-page");
        const submitBtn = document.querySelector(".submit");
        const progressText = document.querySelectorAll(".step p");
        const progressCheck = document.querySelectorAll(".step .check");
        const bullet = document.querySelectorAll(".step .bullet");
        const pages = document.querySelectorAll(".page");
        const nextButtons = document.querySelectorAll(".next");
        const prevButtons = document.querySelectorAll(".prev");
        const stepsNumber = pages.length;

        if (progressNumber !== stepsNumber) {
            console.warn(
                "Error, number of steps in progress bar do not match number of pages"
            );
        }

        document.documentElement.style.setProperty("--stepNumber", stepsNumber);

        let current = 1;

        for (let i = 0; i < nextButtons.length; i++) {
            nextButtons[i].addEventListener("click", function(event) {
                event.preventDefault();

                inputsValid = validateInputs(this);
                if (inputsValid) {
                    get_form(i);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    $('.alert').show();
                        setTimeout(function() {
                    slidePage.style.marginLeft = `-${(100 / stepsNumber) * current
                            }%`;
                    bullet[current - 1].classList.add("active");
                    progressCheck[current - 1].classList.add("active");
                    progressText[current - 1].classList.add("active");
                    current += 1;
                    $('.alert').hide();
                }, 3000);
                    
                }
            });
        }

        for (let i = 0; i < prevButtons.length; i++) {
            prevButtons[i].addEventListener("click", function(event) {
                event.preventDefault();
                slidePage.style.marginLeft = `-${(100 / stepsNumber) * (current - 2)
                        }%`;
                bullet[current - 2].classList.remove("active");
                progressCheck[current - 2].classList.remove("active");
                progressText[current - 2].classList.remove("active");
                current -= 1;
            });
        }
        submitBtn.addEventListener("click", function() {
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
            setTimeout(function() {
                alert("Your Form Successfully Signed up");
                location.reload();
            }, 800);
        });
        // comment by Ram 05/08/2024 for take validation action for select boxes also
        // function validateInputs(ths) {
        //     let inputsValid = true;

        //     const inputs =
        //         ths.parentElement.parentElement.querySelectorAll("input, select");
        //     for (let i = 0; i < inputs.length; i++) {
        //         const valid = inputs[i].checkValidity();
        //         if (!valid) {
        //             inputsValid = false;
        //             inputs[i].classList.add("invalid-input");
        //         } else {
        //             inputs[i].classList.remove("invalid-input");
        //         }
        //     }
        //     return inputsValid;
        // }
        function validateInputs(ths) {
            let inputsValid = true;
            const inputs = ths.parentElement.parentElement.querySelectorAll("input, select");
            for (let i = 0; i < inputs.length; i++) {
                const element = inputs[i];
                let valid = true;
                if (element.tagName.toLowerCase() === "select") {
                    valid = element.value !== "";
                } else {
                    valid = element.checkValidity();
                }
                if (!valid) {
                    inputsValid = false;
                    element.classList.add("invalid-input");
                } else {
                    element.classList.remove("invalid-input");
                }
            }
            return inputsValid;
        }
    }
</script>
<script>
    function get_form(form_id){
        if(form_id == 0 || form_id == 1 || form_id == 2 || form_id == 3){
            get_saveFromData();
        }else if(form_id == 4 || form_id == 5 || form_id == 6){
            return true;
        }else {
            return false;
        }
    }
    function get_saveFromData(){
        var token='<?php echo csrf_token();?>'
        $.ajax({
            type: "POST",
            url: "{{url('/customer_add_edit_save')}}",
            data: new FormData($("#form_data")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                console.log(data.id);
                $("#customer_id").val(data.id);
                $("#site_customer_id").val(data.id);
                $("#login_customer_id").val(data.id);
                $(".customer_name").text(data.name);
            }
        });
    }
    document.querySelectorAll('.assigned_product').forEach(function(element) {
        element.addEventListener('change', function() {
            if (this.checked) {
                this.value = 1;
                document.getElementById('assigned_product').value = 1;
            } else {
                document.getElementById('assigned_product').value = 0;
            }
        });
    });
</script>
<script>
    function open_model(id){
        if(id == 1){
            $('#contact_form')[0].reset();
            $("#ContactModel").modal('show');
            // $("#additionl_contact_model").modal('show');
        }else if(id == 2){
            $('#site_form')[0].reset();
            $("#SiteModel").modal('show');
        }else if(id == 3){
            $('#login_form')[0].reset();
            $("#LoginModel").modal('show');
        }
    }
    $("#show_msg").change(function() {
        if ($('#show_msg').is(':checked')) {
            $("#show_msg").val(1);
        }
    });
    $("#defaultaddcheck").change(function() {
        var check;
        if ($('#defaultaddcheck').is(':checked')) {
            check=1;
        }else {
            check=0;
        }
        var token='<?php echo csrf_token();?>'
        var login_customer_id=$("#login_customer_id").val();
        $.ajax({
            type: "POST",
            url: "{{url('/default_address')}}",
            data: {check:check,login_customer_id:login_customer_id,_token:token},
            success: function(data) {
                console.log(data);
                if(check == 1){
                    $("#contact_address").val(data.details.address);
                    $("#contact_city").val(data.details.city);
                    $("#contact_country").val(data.details.country);
                    $("#contact_postcode").val(data.details.postal_code);
                }else{
                    $("#contact_address").val('');
                    $("#contact_city").val('');
                    $("#contact_country").val('');
                    $("#contact_postcode").val('');
                }
                $("#contact_country_code").html(data.reslut);
            }
        });
    });
    function SaveAndClose(id){
        if(id == 1){
            $("#ContactModel").modal('hide');
            save_contact();
        }else if(id == 2){
            save_site();
            $("#SiteModel").modal('hide');
        }else if(id == 3){
            save_login();
            $("#LoginModel").modal('hide');
        }else {
            alert("Unauthorized Model");
            return false;
        }
    }
    function save_contact(){
        var token='<?php echo csrf_token();?>'
        var default_billing;
        if ($('#billing1').is(':checked')) {
            default_billing=1;
        }else {
            default_billing=0;
        }
        var contact_name=$("#contact_name").val();
        var customer_id=$("#login_customer_id").val();
        var job_title_id=$('#contact_title_id').val();
        var email=$("#contact_email").val();
        var telephone=$("#contact_telephone").val();
        var mobile=$("#contact_mobile").val();
        var fax=$("#contact_fax").val();
        var address=$("#contact_address").val();
        var city=$("#contact_city").val();
        var country=$("#contact_country").val();
        var postcode=$("#contact_postcode").val();
        var country_id=$("#contact_country_code").val();
        
        $.ajax({
            type: "POST",
            url: "{{url('/save_contact')}}",
            data: {default_billing:default_billing,contact_name:contact_name,customer_id:customer_id,job_title_id:job_title_id,
                email:email,telephone:telephone,mobile:mobile,fax:fax,address:address,city:city,country:country,postcode:postcode,
                country_id:country_id,_token:token},
            success: function(data) {
                console.log(data);
                $('#contact_result').append(data);
                $("#ContactModel").modal('hide');
                
            }
        });
    }
    function save_site(){
        var token='<?php echo csrf_token();?>'
        var site_name=$("#site_name").val();
        var contact_name=$("#site_contact_name").val();
        var customer_id=$("#site_customer_id").val();
        var title_id=$('#site_title_id').val();
        var company_name=$("#company_name").val();
        var email=$("#site_email").val();
        var telephone=$("#site_telephone").val();
        var mobile=$("#site_mobile").val();
        var fax=$("#site_fax").val();
        var region=$("#site_region").val();
        var address=$("#site_address").val();
        var city=$("#site_city").val();
        var country=$("#site_country").val();
        var catalogue=$("#site_catalogue_id").val();
        var post_code=$("#site_postcode").val();
        var country_id=$("#site_country_id").val();
        var notes=$("#site_note").val();
        
        $.ajax({
            type: "POST",
            url: "{{url('/save_site')}}",
            data: {site_name:site_name,contact_name:contact_name,customer_id:customer_id,title_id:title_id,company_name:company_name,
                email:email,telephone:telephone,mobile:mobile,fax:fax,region:region,address:address,city:city,country:country,
                catalogue:catalogue,post_code:post_code,country_id:country_id,notes:notes,_token:token},
            success: function(data) {
                console.log(data);
                $('#site_result').append(data);
                $("#SiteModel").modal('hide');
                
            }
        });
    }
    function save_login(){
        var token='<?php echo csrf_token();?>'
        var email=$('#login_email').val();
        var customer_id=$("#login_customer_id").val();
        var password_type;
        if ($('#password_type1').is(':checked')) {
            password_type = 1;
        } else {
            password_type = 2;
        }
        var name=$("#login_name").val();
        var telephone=$("#login_telephone").val();
        var status=$("#login_status").val();
       
        var access_rights=[];
        $('.login_check').each(function(){
            if ($(this).is(':checked')) {
                access_rights.push($(this).val());
            } 
        });
        access_rights=access_rights;
        var projects;
        if ($('#project1').is(':checked')) {
            projects = 1;
        } else {
            projects = 2;
        }
        var notes=$("#login_note").val();
        
        $.ajax({
            type: "POST",
            url: "{{url('/save_login')}}",
            data: {email:email,customer_id:customer_id,password_type:password_type,name:name,telephone:telephone,status:status,
                access_rights:access_rights,projects:projects,notes:notes,_token:token},
            success: function(data) {
                console.log(data);
                $('#login_result').append(data);
                $("#LoginModel").modal('hide');
                
            }
        });
    }
</script>
@include('frontEnd.jobs.layout.footer')