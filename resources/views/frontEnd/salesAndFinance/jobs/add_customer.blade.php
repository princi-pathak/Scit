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
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-3 col-form-label">Customer Type</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions get_customer_result"
                                                            id="customer_type_id" name="customer_type_id">
                                                            <option selected disabled>None</option>
                                                            <?php foreach($customer_type as $type){?>
                                                                <option value="{{$type->id}}" >{{$type->title}}</option>
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
                                                            value="" name="contact_name">
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
                                                                <option value="{{$title->id}}">{{$title->name}}</option>
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
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputTelephone"
                                                        class="col-sm-3 col-form-label">Telephone</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput"
                                                            id="telephone" name="telephone" value="">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="mobile" name="mobile"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputName" class="col-sm-3 col-form-label">Fax</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="fax" name="fax"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputAddress"
                                                        class="col-sm-3 col-form-label">Website</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="website" name="website"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputCounty" class="col-sm-3 col-form-label">Default
                                                        Catalogue</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control editInput selectOptions"
                                                            id="catalogue_id" name="catalogue_id">
                                                            <option selected disabled>None</option>
                                                            <option value="1">ABC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPincode" class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control editInput selectOptions"
                                                            id="status" name="status">
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
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
                                                                <option value="{{$region_val->id}}">{{$region_val->title}}</option>
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
                                                            placeholder="75 Cope Road Mall Park USA"></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="city"
                                                            value="" name="city">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="country"
                                                            placeholder="Site County" name="country">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPincode"
                                                        class="col-sm-3 col-form-label">Pincode</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="postal_code"
                                                            value="" name="postal_code">
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
                                                            <option value="{{$countryval->id}}">{{$countryval->name}}</option>
                                                        <?php }?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputAddress" class="col-sm-3 col-form-label">Site
                                                        Notes</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control textareaInput" name="site_notes"
                                                            id="site_notes" rows="3" placeholder="Site Notes"></textarea>
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
                                                                    <option value="<?php echo $currency->currency_code; ?>">
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
                                                            id="credit_limit" name="credit_limit" placeholder="Customer Ref if any">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputCustomer"
                                                        class="col-sm-3 col-form-label">Discount</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput textareaInput"
                                                            id="discount" name="discount" placeholder="Customer Job if any">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputJobType" class="col-sm-3 col-form-label">Discount
                                                        Type</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control editInput selectOptions"
                                                            id="discount_type" name="discount_type">
                                                            <option value="1">Percentage</option>
                                                            <option value="2">Flat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPurchase" class="col-sm-3 col-form-label">Sage
                                                        Ref.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput textareaInput"
                                                            id="saga_ref" name="saga_ref" placeholder="Sage Ref.">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputJobType" class="col-sm-3 col-form-label">Company
                                                        Reg</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput textareaInput"
                                                            id="company_reg" name="company_reg" placeholder="Company Reg">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPriority" class="col-sm-3 col-form-label">VAT / Tax
                                                        No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput textareaInput"
                                                            id="vat_tax_no" name="vat_tax_no" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label class="col-sm-3 col-form-label">Payment Terms</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control editInput selectOptions"
                                                            id="payment_terms" name="payment_terms">
                                                            <option value="21">Defoult (21)
                                                            </option>
                                                            <?php for($i=1;$i<21;$i++){?>
                                                            <option value="{{$i}}">{{$i}}</option>
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
                                                                name="radio" id="assigned_product1">
                                                            <label class="form-check-label checkboxtext"
                                                                for="inlineRadio1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input assigned_product" type="radio"
                                                                name="radio" id="assigned_product2" checked>
                                                            <label class="form-check-label checkboxtext"
                                                                for="inlineRadio2">No</label>
                                                        </div>
                                                    <input type="hidden" id="assigned_product" name="assigned_product">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputTelephone" class="col-sm-3 col-form-label">Notes</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control textareaInput" name="notes"
                                                            id="notes" rows="3" placeholder="Site Notes"></textarea>
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
                                                        <input class="form-check-input" type="checkbox"
                                                            name="inlinecheckOptions" id="show_msg" name="show_msg">
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
                                                        id="msg" rows="3" placeholder="Site Notes"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="" class="col-md-2 col-form-label">Section</label>
                                                <div class="col-md-10">
                                                    <select class="form-control editInput selectOptions"
                                                            id="section_id" name="section_id">
                                                            <option selected disabled>Please Select</option>
                                                            <option>None</option>
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
                                            <a href="#" class="profileDrop">Add Contact</a>
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

                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Customer Sites</label>
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="#" class="profileDrop">Add Site</a>
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

                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Customer Logins</label>
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="#" class="profileDrop">Add Login</a>

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
<script>
    function get_modal(id){
        if(id == 1){
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
    alert()
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
                // console.log(data.id);
                // $("#customer_id").val(data.id);
                // $("#site_customer_id").val(data.id);
                // $("#login_customer_id").val(data.id);
                // $(".customer_name").text(data.name);
            }
        });
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
@include('frontEnd.salesAndFinance.jobs.layout.footer')