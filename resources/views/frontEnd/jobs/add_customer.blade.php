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
            <p>Added Successfully Done</p>
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
                                <input type="hidden" id="customer_id" name="id">
                                <input type="hidden" id="site_customer_id" name="site_customer_id">
                                <input type="hidden" id="login_customer_id" name="login_customer_id">
                                <input type="hidden" id="home_id" name="home_id" value="{{$home_id}}">
                                <div class="page slide-page">
                                <div class="title">Customer Details</div>
                                    <div class="mb-2 row field">
                                        <label for="inputName" class="col-sm-3 col-form-label">Customer
                                            Name*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="name" id="name" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row field">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Customer Type</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" name="customer_type_id" id="customer_type_id" required>
                                                <option value="" selected disabled>Select Customer Type</option>
                                                <?php foreach($customer_type as $type){?>
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
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
                                            <input type="text" class="form-control editInput" name="contact_name" id="contact_name" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Job Title
                                            (Position)</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" name="job_title" id="job_title">
                                                <option value="" selected disabled>Select Job Title</option>
                                                <?php foreach($job_title as $title){?>
                                                <option value="{{$title->id}}">{{$title->name}}</option>
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
                                            <input type="text" class="form-control editInput" name="email" id="email" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="telephone" id="telephone" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="mobile" id="mobile" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row field">
                                        <label for="inputName" class="col-sm-3 col-form-label">Fax*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="fax" id="fax" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="website" id="website" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row field">
                                        <label for="inputCounty" class="col-sm-3 col-form-label">Default
                                            Catalogue</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" name="catalogue_id" id="catalogue_id" required>
                                                <option value="" selected disabled>Select Catalogue</option>
                                                <option value="1">Site-2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPincode" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="status" name="status" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field nextfornBtn">
                                        <button class="firstNext next profileDrop">Next</button>
                                    </div>
                                </div>

                                <div class="page">
                                    <div class="title">Address Details</div>
                                    <div class="mb-3 row field">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" name="region" id="region" required>
                                                <option value="" selected disabled>None</option>
                                                <option value="India">Default</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="address" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="city" name="city" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="country" name="country" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPincode" class="col-sm-3 col-form-label">Pincode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="postal_code" name="postal_code" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="country_code" id="country_code" required>
                                                <option value="" selected disabled>None</option>
                                                <?php foreach($country as $country_code){?>
                                                    <option value="{{$country_code->code}}">{{$country_code->name}} ({{$country_code->code}})</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Site
                                            Notes</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="site_notes" id="site_notes" required></textarea>
                                        </div>
                                    </div>
                                    <div class="field btns nextfornBtn">
                                        <button class="prev-1 prev profileDrop">Previous</button>
                                        <button class="next-1 next profileDrop">Next</button>
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
                                                    <option value="{{$currency->currency_code}}">{{$currency->name}} - {{$currency->currency_code}}</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Credit
                                            Limit</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="credit_limit" name="credit_limit" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="discount" name="discount" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputJobType" class="col-sm-3 col-form-label">Discount
                                            Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="discount_type" name="discount_type" required>
                                                <option value="" selected disable>Select Discount Type</option>
                                                <option value="1">Percentage</option>
                                                <option value="2">Flat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Sage
                                            Ref.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="saga_ref" name="saga_ref" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputJobType" class="col-sm-3 col-form-label">Company
                                            Reg</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="company_reg" name="company_reg" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPriority" class="col-sm-3 col-form-label">VAT / Tax
                                            No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="vat_tax_no" name="vat_tax_no" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row field">
                                        <label class="col-sm-3 col-form-label">Payment Terms</label>
                                        <div class="col-sm-6">
                                            <select class="form-control editInput selectOptions" id="payment_terms" name="payment_terms" required>
                                                <option value="" selected disabled>None</option>
                                                <option value="21">Default</option>
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
                                            <input type="radio" id="assigned_product1" class="assigned_product" name="r"> Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" id="assigned_product2" class="assigned_product" name="r"> No
                                        </label>
                                            <input type="hidden" value="" name="assigned_product" id="assigned_product">
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Notes</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="notes" id="notes" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPriority" class="col-sm-3 col-form-label">Dflt Products Tax</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="product_tax" name="product_tax" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPriority" class="col-sm-3 col-form-label">Dflt Services Tax</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="service_tax" name="service_tax" required>
                                        </div>
                                    </div>
                                    

                                    <div class="field btns nextfornBtn">
                                        <button class="prev-2 prev profileDrop">Previous</button>
                                        <button class="next-2 next profileDrop">Next</button>
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
                                                            <input class="form-check-input" type="checkbox" name="inlinecheckOptions" id="show_msg" name="show_msg" value="0">
                                                            <label class="form-check-label checkboxtext" for="checkalrt">Yes, show
                                                                the
                                                                message</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-md-2 col-form-label">Message</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control textareaInput" name="msg" id="msg" rows="3" placeholder="Site Notes"></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-md-2 col-form-label">Section</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control editInput selectOptions" id="section_id" name="section_id[]" required>
                                                            <option value="" selected disabled>None</option>
                                                            <option value="1">Quotes</option>
                                                            <option value="2">Job</option>
                                                            <option value="3">Invoice</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field btns nextfornBtn mt-3 p-0">
                                        <button class="prev-3 prev profileDrop">Previous</button>
                                        <button class="next-3 next profileDrop">Next</button>
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
                                    <div class="field btns nextfornBtn mt-3 p-0">
                                        <button class="prev-4 prev profileDrop">Previous</button>
                                        <button class="next-4 next profileDrop">Next</button>
                                    </div>
                                </div>

                                <div class="page">
                                    <div class="title">Customer Sites</div>
                                    <div class="newJobForm mt-4">
                                        <label class="upperlineTitle">Sites</label>
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
                                    <div class="field btns nextfornBtn mt-3 p-0">
                                        <button class="prev-4 prev profileDrop">Previous</button>
                                        <button class="next-4 next profileDrop">Next</button>
                                    </div>
                                </div>
                                <div class="page">
                                    <div class="title">Customer Logins</div>
                                    <div class="newJobForm mt-4">
                                        <label class="upperlineTitle">Logins</label>
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
                                    <div class="field btns nextfornBtn mt-3 p-0">
                                        <button class="prev-5 prev profileDrop">Previous</button>
                                        <button class="submit profileDrop">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End  off col-12 -->
            <!-- Modal -->
            <div class="modal fade" id="loginContactModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Customer Contact</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputName" class="col-sm-3 col-form-label">Customer</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control editInput" id="customer_name" value="">
                            </div>
                        </div>
                        <div class="modal-body">
                            <form role="form" id="contact_form">
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Default Billing*</label>
                                    <div class="col-sm-9">
                                        <input type="radio" class="form-control editInput" name="billing" id="billing1" value="1"> Yes
                                        <input type="radio" class="form-control editInput" name="billing" id="billing2" value="0"> No
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Contact Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_name" id="login_name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Job Title(Position)</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" id="login_title_id" name="login_title_id">
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
                                        <input type="text" class="form-control editInput" name="login_email" id="login_email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Telephone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_telephone" id="login_telephone">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_mobile" id="login_mobile">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Fax</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_fax" id="login_fax">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Address Details</label>
                                    <div class="col-sm-9">
                                        Same as default
                                        <input type="checkbox" class="form-control editInput" name="defaultaddcheck" id="defaultaddcheck">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Address*</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" name="login_address" id="login_address" rows="3" placeholder="Site Notes"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_city" id="login_city">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_country" id="login_country">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Postcode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="login_postcode" id="login_postcode">
                                    </div>
                                </div>
                                <div class="mb-3 row field">
                                        <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="login_country_code" id="login_country_code" required>
                                                <option value="" selected disabled>None</option>
                                                <?php foreach($country as $country_codev){?>
                                                    <option value="{{$country_codev->code}}">{{$country_codev->name}} ({{$country_codev->code}})</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="pageTitleBtn p-0">
                                <button type="button" class="profileDrop" id="addNotesType">Save</button>
                                <button type="button" class="profileDrop">Save & Close</button>
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
        }else if(form_id == 4){
            get_saveForthFromData();
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
                $("#customer_name").val(data.name);
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
            $("#loginContactModel").modal('show');
            // $("#additionl_contact_model").modal('show');
        }
    }
</script>
@include('frontEnd.jobs.layout.footer')