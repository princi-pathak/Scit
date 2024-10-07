@include('frontEnd.salesAndFinance.jobs.layout.header')

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
                            <a href="javascript:void(0)" class="profileDrop" onclick="save_all_data()"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="newJobForm">
                            <form class="customerForm" id="customerForm">
                                @csrf
                                <input type="hidden" id="home_id" name="home_id" value="{{$home_id}}">
                                <input type="hidden" id="is_converted" name="is_converted" value="1">
                                <input type="hidden" id="id" name="id" value="<?php if(isset($key)){echo $key;}?>">
                        
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 col-xl-4">
                                        <div class="formDtail" id="form1">
                                            <h4 class="contTitle">Customer Details</h4>
                                                <div class="mb-2 row">
                                                    <label for="inputName" class="col-sm-3 col-form-label">Customer
                                                        Name<span
                                                        class="radStar">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="name" name="name"
                                                            value="<?php if(isset($customer)){echo $customer->name;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-3 col-form-label">Customer Type</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions get_customer_result"
                                                            id="customer_type_id" name="customer_type_id">
                                                            <option selected disabled>None</option>
                                                            <?php foreach($customer_type as $type){?>
                                                                <option value="{{$type->id}}" <?php if(isset($customer) && $type->id == $customer->customer_type_id){echo 'selected';}?>>{{$type->title}}</option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a href="javascript:void(0)" class="formicon" id="openPopupButton" onclick="get_modal(1)"><i
                                                                class="fa-solid fa-square-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputName" class="col-sm-3 col-form-label">Conatact
                                                        Name<span
                                                        class="radStar">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="contact_name"
                                                            value="<?php if(isset($customer)){echo $customer->contact_name;}?>" name="contact_name">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputProject" class="col-sm-3 col-form-label">Job Title
                                                        (Position)</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions get_job_title_result"
                                                            id="job_title" name="job_title">
                                                            <option selected disabled>None</option>
                                                            <?php foreach($job_title as $title){?>
                                                                <option value="{{$title->id}}" <?php if(isset($customer) && $title->id == $customer->job_title){echo 'selected';}?>>{{$title->name}}</option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a href="javascript:void(0)" class="formicon" onclick="get_modal(2)"><i
                                                                class="fa-solid fa-square-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="email" name="email"
                                                            value="<?php if(isset($customer)){echo $customer->email;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputTelephone"
                                                        class="col-sm-3 col-form-label">Telephone</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput"
                                                            id="telephone" name="telephone" value="<?php if(isset($customer)){echo $customer->telephone;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="mobile" name="mobile"
                                                            value="<?php if(isset($customer)){echo $customer->mobile;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputName" class="col-sm-3 col-form-label">Fax</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="fax" name="fax"
                                                            value="<?php if(isset($customer)){echo $customer->fax;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputAddress"
                                                        class="col-sm-3 col-form-label">Website</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="website" name="website"
                                                            value="<?php if(isset($customer)){echo $customer->website;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputCounty" class="col-sm-3 col-form-label">Default
                                                        Catalogue</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control editInput selectOptions"
                                                            id="catalogue_id" name="catalogue_id">
                                                            <option selected disabled>None</option>
                                                            <option value="1" <?php if(isset($customer) && $customer->catalogue_id == 1){echo 'selected';}?>>ABC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPincode" class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control editInput selectOptions"
                                                            id="status" name="status">
                                                            <option value="1" <?php if(isset($customer) && $customer->status ==1){echo 'selected';}?>>Active</option>
                                                            <option value="0" <?php if(isset($customer) && $customer->status ==0){echo 'selected';}?>>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4">
                                        <div class="formDtail" id="form2">
                                            <h4 class="contTitle">Address Details</h4>

                                                <div class="mb-3 row">
                                                    <label for="inputProject" class="col-sm-3 col-form-label">Region</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions get_region_result"
                                                            id="region" name="region">
                                                            <option selected disabled>None</option>
                                                            <?php foreach($region as $region_val){?>
                                                                <option value="{{$region_val->id}}" <?php if(isset($customer) && $region_val->id == $customer->region){echo $customer->mobile;}?>>{{$region_val->title}}</option>
                                                        <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a href="javascript:void(0)" class="formicon" onclick="get_modal(3)"><i
                                                                class="fa-solid fa-square-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputAddress"
                                                        class="col-sm-3 col-form-label">Address<span
                                                        class="radStar">*</span></label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control textareaInput" name="address"
                                                            id="address" rows="3"
                                                            placeholder="75 Cope Road Mall Park USA"><?php if(isset($customer)){echo $customer->address;}?></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="city"
                                                            value="<?php if(isset($customer)){echo $customer->city;}?>" name="city">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="country"
                                                            placeholder="Site County" name="country" value="<?php if(isset($customer)){echo $customer->country;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPincode"
                                                        class="col-sm-3 col-form-label">Pincode</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="postal_code"
                                                            value="<?php if(isset($customer)){echo $customer->postal_code;}?>" name="postal_code">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputCountry"
                                                        class="col-sm-3 col-form-label">Country</label>
                                                    <div class="col-sm-9">
                                                      <select class="form-control editInput selectOptions"
                                                        id="country_code" name="country_code">
                                                        <option selected disabled>Select Coutry</option>
                                                            <?php foreach($country as $countryval){?>
                                                            <option value="{{$countryval->id}}" <?php if(isset($customer) && $countryval->id == $customer->country_code){echo 'selected';}?>>{{$countryval->name}}</option>
                                                        <?php }?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputAddress" class="col-sm-3 col-form-label">Site
                                                        Notes</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control textareaInput" name="site_notes"
                                                            id="site_notes" rows="3" placeholder="Site Notes"><?php if(isset($customer)){echo $customer->site_notes;}?></textarea>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4">
                                        <div class="formDtail" id="form3">
                                            <h4 class="contTitle">Other Details</h4>
                                                <div class="mb-3 row">
                                                    <label for="inputJobType"
                                                        class="col-sm-3 col-form-label">Currency</label>
                                                    <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions" id="currency" name="currency" required>
                                                        <option value="" selected disabled>None</option>
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
                                                <div class="mb-3 row">
                                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Credit
                                                        Limit</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput textareaInput"
                                                            id="credit_limit" name="credit_limit" placeholder="Customer Ref if any" value="<?php if(isset($customer)){echo $customer->credit_limit;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputCustomer"
                                                        class="col-sm-3 col-form-label">Discount</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput textareaInput"
                                                            id="discount" name="discount" placeholder="Customer Job if any" value="<?php if(isset($customer)){echo $customer->discount;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputJobType" class="col-sm-3 col-form-label">Discount
                                                        Type</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control editInput selectOptions"
                                                            id="discount_type" name="discount_type">
                                                            <option value="1" <?php if(isset($customer) && $customer->discount_type == 1){echo 'selected';}?>>Percentage</option>
                                                            <option value="2" <?php if(isset($customer) && $customer->discount_type == 2){echo 'selected';}?>>Flat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPurchase" class="col-sm-3 col-form-label">Sage
                                                        Ref.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput textareaInput"
                                                            id="saga_ref" name="saga_ref" placeholder="Sage Ref." value="<?php if(isset($customer)){echo $customer->saga_ref;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputJobType" class="col-sm-3 col-form-label">Company
                                                        Reg</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput textareaInput"
                                                            id="company_reg" name="company_reg" placeholder="Company Reg" value="<?php if(isset($customer)){echo $customer->company_reg;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPriority" class="col-sm-3 col-form-label">VAT / Tax
                                                        No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput textareaInput"
                                                            id="vat_tax_no" name="vat_tax_no" placeholder="" value="<?php if(isset($customer)){echo $customer->vat_tax_no;}?>">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label class="col-sm-3 col-form-label">Payment Terms</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control editInput selectOptions"
                                                            id="payment_terms" name="payment_terms">
                                                            <option value="21" <?php if(isset($customer) && $customer->payment_terms == 21){echo 'selected';}?>>Defoult (21)
                                                            </option>
                                                            <?php for($i=1;$i<21;$i++){?>
                                                            <option value="{{$i}}" <?php if(isset($customer) && $i == $customer->payment_terms){echo 'selected';}?>>{{$i}}</option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="form-check-label checkboxtext" for="checkalrt">
                                                            days</label>
                                                    </div>

                                                </div>

                                                <div class="mb-0 row">
                                                    <label class="col-sm-3 col-form-label">Assigned Products</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input assigned_product" type="radio"
                                                                name="radio" id="assigned_product1" <?php if(isset($customer) && $customer->assigned_product == 1){echo 'checked';}?>>
                                                            <label class="form-check-label checkboxtext"
                                                                for="inlineRadio1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input assigned_product" type="radio"
                                                                name="radio" id="assigned_product2" <?php if(isset($customer) && $customer->assigned_product == 1){echo 'unchecked';}else{echo 'checked';}?>>
                                                            <label class="form-check-label checkboxtext"
                                                                for="inlineRadio2">No</label>
                                                        </div>
                                                    <input type="hidden" id="assigned_product" name="assigned_product" value="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputTelephone" class="col-sm-3 col-form-label">Notes</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control textareaInput" name="notes"
                                                            id="notes" rows="3" placeholder="Site Notes"><?php if(isset($customer)){echo $customer->notes;}?></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputMobile" class="col-sm-3 col-form-label">Dflt Products
                                                        Tax</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control editInput selectOptions"
                                                            id="product_tax" name="product_tax">
                                                            <option selected disabled>Please Select</option>
                                                            <option>None</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="inputCountry" class="col-sm-3 col-form-label">Dflt Services
                                                        Tax</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control editInput selectOptions"
                                                            id="service_tax" name="service_tax">
                                                            <option selected disabled>Please Select</option>
                                                            <option>None</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>


                                <div class="newJobForm mt-4">
                                    <label class="upperlineTitle">Customer Message</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="inputCountry" class="col-sm-2 col-form-label">Show
                                                    Message</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="show_msg" name="show_msg" value="0" <?php if(isset($customer) && $customer->show_msg == 1){echo 'checked';}else{echo 'unchecked';}?>>
                                                        <label class="form-check-label checkboxtext" for="checkalrt">Yes,
                                                            show
                                                            the
                                                            message</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="" class="col-md-2 col-form-label">Message</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control textareaInput" name="msg"
                                                        id="msg" rows="3" placeholder="Site Notes"><?php if(isset($customer) && $customer->msg !=''){echo $customer->msg;}?></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="" class="col-md-2 col-form-label">Section</label>
                                                <div class="col-md-10">
                                                    <select class="form-control editInput selectOptions"
                                                            id="section_id" name="section_id[]" multiselect-search="true" multiselect-select-all="true" multiselect-max-items="4" multiple="multiple">
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
                                </div><!-- End  off newJobForm -->
                            </form>
                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Additional Contacts</label>
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" onclick="get_modal(4)" class="profileDrop">Add Contact</a>
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
                                                    <tr>
                                                        <th></th>
                                                        <th>Contact Name</th>
                                                        <th>Customer Job Title </th>
                                                        <th>Email</th>
                                                        <th>Telephone </th>
                                                        <th>Mobile </th>
                                                        <th>Address </th>
                                                        <th>City </th>
                                                        <th>Country </th>
                                                        <th>Postcode </th>
                                                        <th>Default Billing </th>
                                                        <th> </th>
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
                                                        <td>
                                                            <img src="{{url('public/frontEnd/jobs/images/pencil.png')}}" height="16px" alt="" data-bs-toggle="modal" data-bs-target="#ContactModel" class="modal_dataFetch" data-id="{{ $conv->id }}" data-title="{{ $conv->contact_name }}" data-job_title="{{ $job_title_details->id }}" data-email="{{$conv->email}}" data-telephone="{{$conv->telephone}}" data-mobile="{{$conv->mobile}}" data-address="{{$conv->address}}" data-city="{{$conv->city}}" data-country="{{$conv->country}}" data-postcode="{{$conv->postcode}}" data-default_billing="{{$conv->default_billing}}" data-fax="{{$conv->fax}}" data-country_id="{{$conv->country_id}}" >&nbsp;
                                                            <img src="{{url('public/frontEnd/jobs/images/delete.png')}}" alt="" class="contact_delete" data-delete="{{$conv->id}}">
                                                        </td>

                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End  off newJobForm -->

                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Customer Sites</label>
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" onclick="get_modal(5)" class="profileDrop">Add Site</a>
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
                                                    <tr>
                                                        <th></th>
                                                        <th>Site Name </th>
                                                        <th>Contact Name</th>
                                                        <th>Company</th>
                                                        <th>Email </th>
                                                        <th>Telephone </th>
                                                        <th>Mobile </th>
                                                        <th>Address </th>
                                                        <th>City </th>
                                                        <th>Country </th>
                                                        <th>Postcode </th>
                                                        <th>Region </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="site_result">
                                                    <?php foreach($site as $sitev){
                                                        $job_title_detail=App\Models\Job_title::find($sitev->title_id);
                                                        $site_regionName=App\Models\Region::find($sitev->region);
                                                        ?>
                                                        <tr>
                                                            <td><input type="checkbox" value="{{$sitev->id}}"></td>
                                                            <td>{{$sitev->name}}</td>
                                                            <td>{{$sitev->contact_name}}</td>
                                                            <td>{{$job_title_detail->name}}</td>
                                                            <td>{{$sitev->email}}</td>
                                                            <td>{{$sitev->telephone}}</td>
                                                            <td>{{$sitev->mobile}}</td>
                                                            <td>{{$sitev->address}}</td>
                                                            <td>{{$sitev->city}}</td>
                                                            <td>{{$sitev->country}}</td>
                                                            <td>{{$sitev->post_code}}</td>
                                                            <td>{{$site_regionName->title}}</td>
                                                            <td>
                                                                <div class="d-inline-flex align-items-center ">
                                                                    <div class="nav-item dropdown">
                                                                        <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown">
                                                                            Action
                                                                        </a>
                                                                        <div class="dropdown-menu fade-up m-0">
                                                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SiteModel" class="dropdown-item modal_dataSite" data-id="{{ $sitev->id }}" data-site_name="{{ $sitev->site_name }}" data-contact_name="{{ $sitev->contact_name }}" data-title_id="{{$sitev->title_id}}" data-company_name="{{$sitev->company_name}}" data-email="{{$sitev->email}}" data-telephone="{{$sitev->telephone}}" data-mobile="{{$sitev->mobile}}" data-fax="{{$sitev->fax}}" data-region="{{$sitev->region}}" data-address="{{$sitev->address}}" data-city="{{$sitev->city}}" data-country="{{$sitev->country}}" data-post_code="{{$sitev->post_code}}" data-country_id="{{$sitev->country_id}}" data-catalogue="{{$sitev->catalogue}}" data-notes="{{$sitev->notes}}">Edit Details</a>
                                                                            <hr class="dropdown-divider">
                                                                            <a href="javascript:void(0)" class="dropdown-item site_delete" data-delete="{{ $sitev->id }}">Delete</a>
                                                                            <hr class="dropdown-divider">
                                                                            <a href="javascript:void(0)" class="dropdown-item" data-id="{{ $sitev->id }}">Manage Document/Equipments</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End  off newJobForm -->

                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Customer Logins</label>
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" onclick="get_modal(6)" class="profileDrop">Add Login</a>

                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="productDetailTable">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Asset Ref </th>
                                                        <th>Title </th>
                                                        <th>Description</th>
                                                        <th>Asset Status </th>
                                                        <th>Assigned To </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>..</td>
                                                        <td>..</td>
                                                        <td>..</td>
                                                        <td>..</td>
                                                        <td>..</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End  off newJobForm -->


                        </div> <!-- End  off col-12 -->

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="pageTitleBtn">
                            <a href="javascript:void(0)" class="profileDrop" onclick="save_all_data()"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                                <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </section>
        <!-- Customer type add Modal -->
<div class="modal fade" id="cutomer_type_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="thirdModalLabel">Add Customer Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="customer_type_form">
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Customer Type <span class="red-text">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="customer_type_name" class="form-control editInput" id="customer_type_name" value="" placeholder="Customer Type">
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
                            <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_customer_type()"> Save</a>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end here -->
     <!-- Job title Modal start -->
     <div class="modal fade" id="job_title_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="thirdModalLabel">Job Title - Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="job_title_form">
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Job Title <span class="red-text">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="job_title_name" class="form-control editInput" id="job_title_name" value="" placeholder="Job Title">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select id="job_title_status" name="job_title_status" class="form-control editInput">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_job_title()"> Save</a>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- end here -->
      <!-- Region Modal start here -->
      <div class="modal fade" id="region_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="thirdModalLabel">Add Region</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="region_form">
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Region <span class="red-text">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="region_name" class="form-control editInput" id="region_name" value="" placeholder="Region">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select id="region_status" name="region_status" class="form-control editInput">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_region()"> Save</a>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <!-- end here -->
       <!-- Contact Model -->
       <div class="modal fade" id="ContactModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content add_Customer">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Customer Contact</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputName" class="col-sm-3 col-form-label">&emsp;Customer</label>
                            <div class="col-sm-9">
                                <p id="customer_name" class="customer_name"><?php if(isset($customer)){echo $customer->name;}?></p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form role="form" id="contact_form">
                                <input type="hidden" name="contact_id" id="contact_id">
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Default Billing</label>
                                    <div class="col-sm-9">
                                        <input type="radio" class="form-check-input" name="billing" id="billing1" value="1"> Yes
                                        <input type="radio" class="form-check-input" name="billing" id="billing0" value="0" checked> No
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Contact Name<span class="radStar">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="concontact_name" id="concontact_name">
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
                                        <input type="checkbox" class="form-check-input" name="defaultaddcheck" id="defaultaddcheck">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Address<span class="radStar">*</span></label>
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
                                <!-- <button type="button" class="profileDrop" onclick="SaveAndClose(1)">Save & Close</button> -->
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Site Model start -->
            <div class="modal fade" id="SiteModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content add_Customer">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Site Address</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3 row">
                            <!-- <label for="inputName" class="col-sm-3 col-form-label">Customer</label> -->
                            <div class="col-sm-9">
                                <p id="customer_name" class="customer_name"></p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form role="form" id="site_form">
                                <input type="hidden" id="site_id" name="site_id">
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Site Name<span class="radStar">*</span></label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control editInput" name="site_name" id="site_name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Contact Name<span class="radStar">*</span></label>
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
                                            <?php foreach($region as $site_region){?>
                                                    <option value="{{$site_region->id}}" >{{$site_region->title}}</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Address<span class="radStar">*</span></label>
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
                                <!-- <button type="button" class="profileDrop" onclick="SaveAndClose(2)">Save & Close</button> -->
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Model start -->
            <div class="modal fade" id="LoginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content add_Customer">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Customer Login</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3 row">
                            <!-- <label for="inputName" class="col-sm-3 col-form-label">Customer</label> -->
                            <div class="col-sm-9">
                                <p id="customer_name" class="customer_name"></p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form role="form" id="login_form">
                            <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Email<span class="radStar">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_email" id="login_email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Password Type<span class="radStar">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="radio" class="form-check-input" name="password_type" id="password_type1"> Generate Now
                                        <input type="radio" class="form-check-input" name="password_type" id="password_type2" checked> Email Password
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Name<span class="radStar">*</span></label>
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
                                        <input type="checkbox" id="login_check" name="login_check" value="1" class="login_check form-check-input"> Quotes
                                        <input type="checkbox" id="login_check" name="login_check" value="2" class="login_check form-check-input"> Jobs
                                        <input type="checkbox" id="login_check" name="login_check" value="3" class="login_check form-check-input"> Invoices
                                        <input type="checkbox" id="login_check" name="login_check" value="4" class="login_check form-check-input"> File Manager
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Projects</label>
                                    <div class="col-sm-9">
                                        <input type="radio" class="form-check-input" name="project" id="project1" checked> All
                                        <input type="radio" class="form-check-input" name="project" id="project2"> Customise
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
                                <!-- <button type="button" class="profileDrop" onclick="SaveAndClose(3)">Save & Close</button> -->
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal End -->
<script type="text/javascript" src="{{url('public/frontEnd/jobs/js/multiselect.js')}}"></script>
<script>
    function get_modal(id){
        var key=$("#id").val();
        if(id == 4 || id == 5 || id == 6){
            if(key == ''){
                alert("Please save Customer first");
                return false;
            }else{
                if(id == 4){
                    $('#contact_form')[0].reset();
                    $("#ContactModel").modal('show');
                }else if(id == 5){
                    $('#site_form')[0].reset();
                    $("#SiteModel").modal('show');
                }else if(id == 6){
                    $('#login_form')[0].reset();
                    $("#LoginModel").modal('show');
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
   function save_all_data(){
    var name=$("#name").val();
    var contact_name=$("#contact_name").val();
    var address=$("#address").val();
    if(name == ''){
        $("#name").css('border','1px solid red');
        $(window).scrollTop($('#name').position().top);
        return false;
    }else if(contact_name == ''){
        $("#name").css('border','');
        $("#contact_name").css('border','1px solid red');
        $(window).scrollTop($('#contact_name').position().top);
        return false;
    }else if(address == ''){
        $("#contact_name").css('border','');
        $("#address").css('border','1px solid red');
        $(window).scrollTop($('#address').position().top);
        return false;
    }else{
        $("#name").css('border','');
        $("#contact_name").css('border','');
        $("#address").css('border','');
        var token='<?php echo csrf_token();?>'
        $.ajax({
            type: "POST",
            url: "{{url('/customer_add_edit_save')}}",
            data: new FormData($("#customerForm")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                window.location.href ="<?=url('customer_add_edit?key=')?>"+data.id;
                // console.log(data.id);
                // $("#customer_id").val(data.id);
                // $("#site_customer_id").val(data.id);
                // $("#login_customer_id").val(data.id);
                // $(".customer_name").text(data.name);
            }
        });
    }
    
   }
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
                url: "{{url('/save_customer_type')}}",
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
                url: "{{url('/save_job_title')}}",
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
                url: "{{url('/save_region')}}",
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
    function save_contact(){
        var token='<?php echo csrf_token();?>'
        var default_billing;
        if ($('#billing1').is(':checked')) {
            default_billing=1;
        }else {
            default_billing=0;
        }
        var contact_name=$("#concontact_name").val();
        var customer_id=$("#id").val();
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
        var id=$("#contact_id").val();
        if(contact_name == ''){
            $("#contact_name").css('border','1px soild red');
            return false;
        }else if(address == ''){
            $("#contact_name").css('border','');
            $("#address").css('border','1px soild red');
            return false;
        }else{
                $.ajax({
                type: "POST",
                url: "{{url('/save_contact')}}",
                data: {id:id,default_billing:default_billing,contact_name:contact_name,customer_id:customer_id,job_title_id:job_title_id,
                    email:email,telephone:telephone,mobile:mobile,fax:fax,address:address,city:city,country:country,postcode:postcode,
                    country_id:country_id,_token:token},
                success: function(data) {
                    console.log(data);
                    if($.trim(data) == 'done'){
                        $("#ContactModel").modal('hide');
                        location.reload();
                    }else{
                        alert("Something went wrong");
                        return false;
                    }
                    
                    
                }
            });
        }
        
    }
    $("#show_msg").change(function() {
        if ($('#show_msg').is(':checked')) {
            $("#show_msg").val(1);
        }else{
            $("#show_msg").val(0);
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
        var customer_id=$("#id").val();
        $.ajax({
            type: "POST",
            url: "{{url('/default_address')}}",
            data: {check:check,customer_id:customer_id,_token:token},
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
    function save_site(){
        var token='<?php echo csrf_token();?>'
        var site_name=$("#site_name").val();
        var contact_name=$("#site_contact_name").val();
        var customer_id=$("#id").val();
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
        var id=$("#site_id").val();
        $.ajax({
            type: "POST",
            url: "{{url('/save_site')}}",
            data: {id:id,site_name:site_name,contact_name:contact_name,customer_id:customer_id,title_id:title_id,company_name:company_name,
                email:email,telephone:telephone,mobile:mobile,fax:fax,region:region,address:address,city:city,country:country,
                catalogue:catalogue,post_code:post_code,country_id:country_id,notes:notes,_token:token},
            success: function(data) {
                console.log(data);
                if($.trim(data) == 'done'){
                    $("#SiteModel").modal('hide');
                    location.reload();
                }else{
                    alert("Someting went Wrong");
                    return false;
                }
                
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
        if(email == ''){
            $("#login_email").css('border','1px solid red');
            return false;
        }else if(name == ''){
            $("#login_email").css('border','');
            $("#login_name").css('border','1px solid red');
            return false;
        }else{
            $("#login_email").css('border','');
            $("#login_name").css('border','');
                $.ajax({
                type: "POST",
                url: "{{url('/save_login')}}",
                data: {email:email,customer_id:customer_id,password_type:password_type,name:name,telephone:telephone,status:status,
                    access_rights:access_rights,projects:projects,notes:notes,_token:token},
                success: function(data) {
                    console.log(data);
                    $("#LoginModel").modal('hide');
                    
                }
            });
        }
        
    }
</script>
<script>
    $('.contact_delete').on('click', function() {
        var id = $(this).data('delete');
        if (confirm("Are you sure you want to delete this row?")) {
            $(this).closest('tr').remove();
            var token='<?php echo csrf_token();?>'
            $.ajax({
            type: "POST",
            url: "{{url('/delete_contact')}}",
            data: {id:id,_token:token},
            success: function(data) {
                console.log(data);
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
            url: "{{url('/delete_site')}}",
            data: {id:id,_token:token},
            success: function(data) {
                console.log(data);
            }
        });
        }
    })
</script>
<script>
    $('.modal_dataFetch').on('click', function() {
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
        $("#billing" + default_billing).prop('checked', true);
        $('#contact_id').val(id);
        $('#concontact_name').val(title);
        $('#contact_title_id').val(job_title);
        $('#contact_email').val(email);
        $('#contact_telephone').val(telephone);
        $('#contact_mobile').val(mobile);
        $('#contact_fax').val(fax);
        $('#contact_address').val(address);
        $('#contact_city').val(city);
        $('#contact_country').val(country);
        $('#contact_postcode').val(postcode);
        $('#contact_country_code').val(country_id);
    });

    $('.modal_dataSite').on('click', function() {
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
        $("#site_postcode").val(post_code);
        $("#site_country_id").val(country_id);
        $("#site_catalogue_id").val(catalogue);
        $("#site_note").val(notes);
    });
    
</script>
@include('frontEnd.salesAndFinance.jobs.layout.footer')