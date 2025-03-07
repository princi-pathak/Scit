@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4 ">
            <div class="pageTitle">
                <h3>New Invoice</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="newJobForm">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="formDtail">
                            <h4 class="contTitle">Customer / Billing Details</h4>
                            <form action="" class="customerForm">
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Customer <span class="radStar">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" id="">
                                            <option>Select Customer</option>
                                            @foreach($customerList as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="#!" class="formicon" data-bs-toggle="modal" data-bs-target="#invoiceCustomerPop"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                    
                                    <!-- start Customer popup-->
                                    <div class="modal fade" id="invoiceCustomerPop" tabindex="-1" aria-labelledby="invoiceCustomerModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content add_Customer">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="invoiceCustomerModalLabel">Add Customer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                                            <div class="formDtail">
                                                                <form action="" class="customerForm">
                                                                    <div class="mb-2 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">Customer Name*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputName" value="John Smith">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Customer Type*</label>
                                                                        <div class="col-sm-7">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>Genrale Customer</option>
                                                                                <option>Analytical Customer</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-1">
                                                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End off Customer -->

                                                                    <div class="mb-2 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">Conatact Name*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputName" value="John Smith">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputProject" class="col-sm-3 col-form-label">Job Title (Position)</label>
                                                                        <div class="col-sm-4">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>Please Select</option>
                                                                                <option>Supervisor</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <a href="#!" class="formicon"><i  class="fa-solid fa-square-plus"></i></a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputEmail" value="roxy.scits@gmail.com">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputTelephone" value="14000883788">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputMobile" value="Type No.">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputAddress" class="col-sm-3 col-form-label">Fax</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputCity" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity" class="col-sm-3 col-form-label">Website</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputProject" class="col-sm-3 col-form-label">Payment Terms</label>
                                                                        <div class="col-sm-7">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>Defoult (21) </option>
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                                <option>6</option>
                                                                                <option>7</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <span class="afterInputText">Days</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputProject" class="col-sm-3 col-form-label">Currency</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>British Pound - GBP </option>
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                                <option>6</option>
                                                                                <option>7</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputCounty" class="col-sm-3 col-form-label">Credit Limit</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputCounty"  value="$: 0">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputPincode" class="col-sm-3 col-form-label">Discount</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" class="form-control editInput" id="inputPincode" value="6001">
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>Persontage</option>
                                                                                <option>Flat</option>
                                                                                <option>1</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCountry" class="col-sm-3 col-form-label">VAT / Tax No.</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputCountry" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputProject" class="col-sm-3 col-form-label">Default Catalogue</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>None</option>
                                                                                <option>ABCD</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputProject" class="col-sm-3 col-form-label">Status</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control editInput selectOptions" id ="inputCustomer">
                                                                                <option>Active</option>
                                                                                <option>Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                                            <div class="formDtail">
                                                                <form action="" class="">
                                                                    <div class="mb-2 row">
                                                                        <label for="inputProject" class="col-sm-3 col-form-label">Region</label>
                                                                        <div class="col-sm-7">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>None</option>
                                                                                <option>Default</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <a href="#!" class="formicon" id="openPopupButton"><i class="fa-solid fa-square-plus"></i></a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3" placeholder="75 Cope Road Mall Park USA"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputCounty" placeholder="Site County">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputPincode" class="col-sm-3 col-form-label">Pincode</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputPincode" value="6001">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>United kingdom (+44) </option>
                                                                                <option>United kingdom (+44) </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputAddress" class="col-sm-3 col-form-label">Site Notes</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3"  placeholder="Site Notes"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">Sage Ref.</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputName" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label class="col-sm-3 col-form-label">Assign Products</label>
                                                                        <div class="col-sm-9">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                                                                <label class="form-check-label checkboxtext" for="inlineRadio1">Yes</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                                                    id="inlineRadio2"
                                                                                    value="option2">
                                                                                <label
                                                                                    class="form-check-label checkboxtext"
                                                                                    for="inlineRadio2">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 row">
                                                                        <label for="inputAddress"
                                                                            class="col-sm-3 col-form-label">Notes</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea
                                                                                class="form-control textareaInput"
                                                                                name="address"
                                                                                id="inputAddress" rows="3"
                                                                                placeholder="Site Notes"></textarea>
                                                                        </div>
                                                                    </div>


                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End row -->
                                                </div>
                                                <div class="modal-footer customer_Form_Popup">

                                                    <button type="button" class="profileDrop">Save</button>
                                                    <button type="button" class="profileDrop">Save &
                                                        Close</button>
                                                    <button type="button" class="profileDrop"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End off Customer popup -->
                                </div>
                                <!-- End off Customer -->
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Project</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" >
                                            <option>Select Customer First</option>
                                            <option value="1">Test 1</option>
                                            <option value="2">Test 2</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Contact</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions">
                                            <option>Select Customer First</option>
                                            <option>None</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name <span class="radStar">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" value="John Smith">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Address <span class="radStar">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" name="address" rows="3" placeholder="75 Cope Road Mall Park USA"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" value="Port Elizabeth">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">County</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" value="County">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Postcode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" placeholder="Postcode">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions">
                                            <option value="">Please Select</option>
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput" id="" placeholder="Telephone">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions">
                                            <option value="">Please Select</option>
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput" id="" value="Mobile No.">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id=""  value="Email Address">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="formDtail">
                            <h4 class="contTitle">Site / Delivery Details</h4>
                            <form action="" class="customerForm">
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Site</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" id="" disabled>
                                            <option>None</option>
                                            <option>Site-2</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Region</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" id="invoiceRegions">
                                            <option>None</option>
                                            <option>Default</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#!" class="formicon" onclick="openRegionModal('invoiceRegions');"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                        
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label"> Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id="" value="Lisa">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Company</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext editInput" id="inputName" value="Lisa (Manager)" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for=""
                                        class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" name="address" id="" rows="3"
                                            placeholder="75 Cope Road Mall Park USA"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id="" value="Port Elizabeth">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">County</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id="" placeholder="Site County">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for=""
                                        class="col-sm-3 col-form-label">Postcode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id="" value="6001">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for=""
                                        class="col-sm-3 col-form-label">Telephone</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" id="">
                                        <option value="">Please Select</option>
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput" id="" placeholder="Site Telephone">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" id="">
                                        <option value="">Please Select</option>
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput" id="" value="Mobile No.">
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="formDtail">
                            <h4 class="contTitle">Invoice Details</h4>
                            <form action="" class="customerForm">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Invoice Ref</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext editInput" value="Auto generate" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Invoice Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" id="">
                                            <option value="service">Service</option>
                                            <option value="product">Product</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Customer Ref</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" placeholder="Customer Ref if any">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Customer Job Ref</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="" placeholder="Customer Job if any">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Purch. Order Ref</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" placeholder="Purchase Order Ref if any">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Invoice Date <span class="radStar">*</span> </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control editInput" id="" placeholder="">
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Payment Terms</label>
                                    <div class="col-sm-4">
                                        <select class="form-control editInput selectOptions">
                                            <option>Default (21)</option>
                                            @for($i = 0; $i <= 90; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label class="form-check-label checkboxtext pt-1">Days</label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Due Date <span class="radStar">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control editInput" id="" placeholder="">
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" id="">
                                            <option value="Draft">Draft</option>
                                            <option value="Invoiced">Invoiced</option>
                                            <option value="Outstanding">Outstanding</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Tags</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" id="invoice_tags">
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>   
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-4 col-form-label">
                                        <a href="#" class="profileDrop"> <i class="fa fa-clock"></i> Set Reminder </a>
                                    </label>
                                </div>                                  
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- End  off newJobForm -->


            <div class="newJobForm mt-4">
                <label class="upperlineTitle">Item Details</label>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="mb-3 row">
                            <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control editInput" id="inputCountry" placeholder="Type to add product">
                            </div>
                            <div class="col-sm-7">
                                <div class="plusandText">
                                    <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                    <span class="afterPlusText"> (Type to view product or <a href="#!">Click here</a> to view all assets)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3 row">
                            <div class="col-md-9 row">
                                <label for="inputCountry" class="col-sm-5 col-form-label"> Template Options:</label>
                                <div class="col-sm-7">
                                    <select class="form-control editInput selectOptions">
                                        <option>Show Product Details</option>
                                        <option>Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="pageTitleBtn p-0">
                                    <a href="#" class="profileDrop">Add Title</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3 row">
                            <label for="inputCountry" class="col-sm-2 col-form-label">Catalogue:</label>
                            <div class="col-sm-3">
                                <select class="form-control editInput selectOptions">
                                    <option>Default Pricing</option>
                                    <option>Default</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="productDetailTable">
                            <table class="table" id="containerA">
                                <thead class="table-light">
                                    <tr>
                                        <th>Code </th>
                                        <th>Product </th>
                                        <th>Description</th>
                                        <th>
                                            <div class="tableplusBTN">
                                                <span>Account Code </span>
                                                <span class="plusandText ps-3">
                                                    <a href="#!" class="formicon pt-0"> <i class="fa-solid fa-square-plus"></i> </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>Qty </th>
                                        <th>Cost Price </th>
                                        <th>Cost Calc </th>
                                        <th>Price </th>
                                        <th>Discount </th>
                                        <th>
                                            <div class="tableplusBTN">
                                                <span>VAT(%) </span>
                                                <span class="plusandText ps-3">
                                                    <a href="#!" class="formicon pt-0"> <i class="fa-solid fa-square-plus"></i> </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>Amount  </th>
                                        <th>VAT </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
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
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- End  off newJobForm -->
            
            <div class="newJobForm mt-4">
                <label class="upperlineTitle">Notes</label>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="">
                            <h4 class="contTitle text-start">Customer Notes <span class="afterPlusText"> Will be included in invoive </span></h4>
                            <div class="mt-1">
                                <textarea cols="40" rows="5" id="textarea8" class="form-control">
                                    Arjun Kumar UI/UX Designer and Developer
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <h4 class="contTitle text-start">Terms</h4>
                            <div class="mt-3">
                                <textarea cols="40" rows="5" id="textarea9" class="form-control">
                                    Arjun Kumar UI/UX Designer and Developer
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <h4 class="contTitle text-start">Internal Notes</h4>
                            <div class="mt-3">
                                <textarea cols="40" rows="5" id="textarea10" class="form-control">
                                    Arjun Kumar UI/UX Designer and Developer
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End  off newJobForm -->

            <div class="newJobForm mt-4">
                <label class="upperlineTitle">Attachments</label>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="py-4">
                            <div class="jobsection">
                                <a href="#!" class="profileDrop">Upload Attachments</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End  off newJobForm -->

            <div class="newJobForm mt-4">
                <label class="upperlineTitle">Tasks</label>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="py-4">
                            <div class="jobsection">
                                <a href="#!" class="profileDrop">New Tasks</a>
                            </div>
                            <div class="jobsection pt-3">
                                <a href="#!" class="profileDrop">Tasks</a>
                                <a href="#!" class="profileDrop">Recurring Tasks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End  off newJobForm -->

        </div>
    </div>
    

    
    <div class="row">
        <!-- <div class="col-md-4 col-lg-4 col-xl-4 ">
            <div class="pageTitle">
                <h3>New Jobs</h3>
            </div>
        </div> -->
        <div class="col-md-12 col-lg-12 col-xl-12 px-3">
            <div class="pageTitleBtn">
                <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Action</a>

            </div>
        </div>
    </div>
</div>
</section>

<x-tag-modal
    modalId="quoteTagModal"
    modalTitle="Add Tag"
    formId="add_quote_tag_form"
    inputId="quoteTag"
    statusId="status"
    saveButtonId="saveQuoteTag"
    placeholderText="Tag" />
<script>
const tagURL = '{{ route("General.ajax.getTags") }}';
</script>
@include('components.region-model')
@include('frontEnd.salesAndFinance.jobs.layout.footer')
<script type="text/javascript" src="{{ url('public/js/salesFinance/invoice/invoice_add.js') }}"></script>