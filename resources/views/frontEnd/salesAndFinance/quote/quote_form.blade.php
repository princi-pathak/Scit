@include('frontEnd.salesAndFinance.jobs.layout.header')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="main_section_page px-3 pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>New Quote</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="newJobForm card">
                    <div class="row" id="hideCustomerDetails">
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Customer Details</h4>
                                <form action="" class="customerForm mt-3">
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Quote Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control-plaintext editInput" id="inputName" value="Auto generate" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Customer<span class="radStar">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" id="getCustomerList">
                                                <option value="">Select Customer</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="plusandText">
                                                <a href="#!" id="OpenAddCustomerModal" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control-plaintext editInput" id="inputName" value="Auto generate" readonly>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle mb-3">Billing Details</h4>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Contact </label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" disabled id="billingDetailContact">
                                            <option>Select Customer First</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="plusandText">
                                            <a href="#!" id="OpenAddCustomerContact" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label"> Name <span class="radStar">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id="billingDetailsName" placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Address <span class="radStar">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" name="address" id="billingDetailsAddress" rows="3" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">City </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="billingCustomerCity" placeholder="City">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPurchase" class="col-sm-3 col-form-label">County</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="billingCustomerCounty" placeholder="County">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputPurchase" class="col-sm-3 col-form-label">Postcode</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput textareaInput" id="billingCustomerPostcode" placeholder="Postcode">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="plusandText">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-magnifying-glass-location"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Telephone</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" name="telephone_country_code" id="billingCustomerTelephoneCode">
                                            <option value="">Please Select</option>
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput" id="billingCustomerTelephone" placeholder="Telephone">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" name="mobile_country_code" id="billingCustomerMobileCode">
                                            <option value="">Please Select</option>
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput" id="billingCustomerMobile" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputMobile" class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id="billingDetailsEmail" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputMobile" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput" name="" id="billingCustomerCountry">
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle mb-3"> Customer Site Details</h4>
                                <div class="mb-3 row">
                                    <label for="inputJobRef" class="col-sm-3 col-form-label">Site</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" disabled id="customerSiteDetails">
                                            <option>-Not Assigned-</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="plusandText">
                                            <a href="#!" id="openCustomerSiteAddress" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Name </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="customerSiteName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Company </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="customerSiteCompany" placeholder="Company">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" name="address" id="customerSiteAddress" rows="3" placeholder="Address"></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">City </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="customerSiteCity" placeholder="City">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPurchase" class="col-sm-3 col-form-label">County </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="customerSiteCounty" placeholder="County">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputPurchase" class="col-sm-3 col-form-label">Postcode </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput textareaInput" id="customerSitePostCode" placeholder="Postcode">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="plusandText">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-magnifying-glass-location"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Telephone </label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" id="customerSiteTelephoneCode">
                                            <option value="">Please Select</option>
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput" id="customerSiteTelephone" placeholder="Telephone ">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" id="customerSiteMobileCode">
                                            <option value="">Please Select</option>
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput" id="customerSiteMobile" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputMobile" class="col-sm-3 col-form-label">Country </label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput" name="" id="customerSiteDetailsCountry">
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="hideQuoteDetails">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="formDtail">
                                    <h4 class="contTitle">Customer Details</h4>
                                    <form action="" class="customerForm mt-3">
                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Customer <span class="radStar">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control-plaintext editInput" id="setCustomerNameInCustomerdetails" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputCustomer" class="col-sm-3 col-form-label">Project </label>
                                            <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions" id="">
                                                    <option value="">None</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="plusandText">
                                                    <a href="#!" id="" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="formDtail">
                                    <h4 class="contTitle mb-3">Site / Delivery Details</h4>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Site </label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" disabled id="">
                                                <option>Same As Customer</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="plusandText">
                                                <a href="#!" id="OpenAddCustomerContact" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label"> Region <span
                                                class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" disabled id="">
                                                <option>None</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Name <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="inputCustomer" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Company </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="inputCustomer" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Postcode</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control editInput textareaInput" id="inputPurchase" placeholder="Postcode">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="plusandText">
                                                <a href="#!" class="formicon"><i class="fa-solid fa-magnifying-glass-location"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Telephone</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="inputEmail" placeholder="Telephone">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="inputEmail" placeholder="Telephone">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Email Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="billingDetailsEmail" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput" name="" id="">
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="formDtail">
                                    <h4 class="contTitle mb-3"> Quote Details</h4>
                                    <div class="mb-3 row">
                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Quote Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control-plaintext editInput" id="inputName" value="Customer" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Quote Type </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput textareaInput" id="customerSiteName" placeholder="City">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="plusandText">
                                            <a href="#!" id="OpenAddCustomerContact" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Quote Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control editInput textareaInput" id="inputCustomer" placeholder="City">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Expiry Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control editInput textareaInput" id="inputCustomer" placeholder="City">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Customer Ref </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="inputCustomer" placeholder="City">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPurchase" class="col-sm-3 col-form-label">Customer Job Ref</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="inputPurchase" placeholder="County">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPurchase" class="col-sm-3 col-form-label">Purchase Order Ref</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="inputPurchase" placeholder="Postcode">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Source</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput" name="" id="">
                                            <option value="">None</option>
                                            @foreach($quoteSource as $value)
                                            <option value="{{ $value->id}}">{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="plusandText">
                                            <a href="#!" id="OpenAddCustomerContact" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputMobile" class="col-sm-3 col-form-label">Prefered Job Date</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control editInput textareaInput" id="inputPurchase" placeholder="Postcode">
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control editInput" name="" id="">
                                            <option value="">Any Time</option>
                                            <option value="">AM</option>
                                            <option value="">PM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputMobile" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput" name="" id="">
                                            <option value="1">Draft</option>
                                            <option value="2">Processed</option>
                                            <option value="3">Call back</option>
                                            <option value="4">Accepted</option>
                                            <option value="5">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Tags</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput textareaInput" id="inputPurchase">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="plusandText">
                                            <a href="#!" id="OpenAddCustomerContact" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End  off newJobForm -->

            <div class="newJobForm mt-4" id="yourQuoteSection" >
                <label class="upperlineTitle">Your Quotes</label>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="extraInformationTab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-Notes-tab" data-bs-toggle="tab" data-bs-target="#nav-Notes" type="button" role="tab" aria-controls="nav-Notes" aria-selected="true">Quotes</button>
                                    <button class="nav-link" id="nav-Tasks-tab" data-bs-toggle="tab" data-bs-target="#nav-Tasks" type="button" role="tab" aria-controls="nav-Tasks" aria-selected="false">Sales Appointments</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-Notes" role="tabpanel" aria-labelledby="nav-Notes-tab" tabindex="0">
                                    <div class="tabheadingTitle">
                                        <a href="#" class="profileDrop me-3" id="AddQuoteButton"> Add Quotes</a>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 row">
                                            <div class="col-md-12">
                                                <div class="productDetailTable pt-3">
                                                    <table class="table" id="containerA">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th># </th>
                                                                <th>Quote Ref </th>
                                                                <th>Job Ref</th>
                                                                <th>Quote Date </th>
                                                                <th>Expiry Date </th>
                                                                <th>Sub Total</th>
                                                                <th>VAT</th>
                                                                <th>Total</th>
                                                                <th>Deposit </th>
                                                                <th>Outstanding</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                    </div><!-- ENd col-9 -->
                                </div>
                                <div class="tab-pane fade" id="nav-Tasks" role="tabpanel" aria-labelledby="nav-Tasks-tab" tabindex="0">
                                    <div class="tabheadingTitle">
                                        <a href="#" class="profileDrop me-3"> New Appointments</a>
                                        <a href="#" class="profileDrop ms-3"> Send To Planner</a>
                                    </div>
                                    <div class="col-sm-12">

                                        <div class="productDetailTable mt-3">
                                            <table class="table" id="containerA">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Start Date / Time</th>
                                                        <th>End Date / Time </th>
                                                        <th>Notes</th>
                                                        <th>Appointment Type </th>
                                                        <th>Status </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex">
                                                                <p class="leftNum">1</p>
                                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                                    <option>Select user</option>
                                                                    <option>Default</option>
                                                                </select>
                                                                <a href="#!" class="callIcon"><i class="fa-solid fa-square-phone"></i></a>
                                                            </div>
                                                            <div class="alertBy">
                                                                <label><strong>Alert By :</strong></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label" for="inlineCheckbox1">SMS</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                    <label class="form-check-label" for="inlineCheckbox2">Email</label>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="addDateAndTime">
                                                                <div class="startDate">
                                                                    <input type="date" name="date" class=" editInput">
                                                                    <input type="time" name="time" class=" editInput">
                                                                </div>
                                                            </div>
                                                            <div class="pt-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="floatingAppointment" value="option2">
                                                                    <label class="form-check-label" for="floatingAppointment">Floating Appointment</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="addDateAndTime">
                                                                <div class="endDate">
                                                                    <input type="date" name="date" class=" editInput">
                                                                    <input type="time" name="time" class=" editInput">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="addTextarea">
                                                                <textarea cols="40" rows="5" placeholder="Type Notes...">Type Notes... </textarea>
                                                            </div>
                                                        </td>
                                                        <td class="col-2">
                                                            <div class="appoinment_type">
                                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                                    <option>Select user</option>
                                                                    <option>Default</option>
                                                                </select>
                                                            </div>
                                                            <div class="Priority">
                                                                <label>Priority :</label>
                                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                                    <option>Select user</option>
                                                                    <option>Default</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="statuswating">
                                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                                    <option>Select user</option>
                                                                    <option>Default</option>
                                                                </select>
                                                                <a href="#!"><i class="fa-solid fa-circle-xmark"></i></a>
                                                            </div>
                                                            <div class="tabheadingTitle">
                                                                <a href="#" class="profileDrop me-3"> Notify</a>
                                                            </div>
                                                            <div class="tabheadingTitle">
                                                                <a href="#" class="profileDrop me-2"> Manage Files</a>
                                                            </div>
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
            </div>


            <div id="hideQuoteDiv">
                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Item Details</label>
                    <div class="row">
                        <div class="col-sm-7">
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
                            <div class="mb-3 row">
                                <label for="inputCountry" class="col-sm-2 col-form-label">Catalogue</label>
                                <div class="col-sm-3">
                                    <select class="form-control editInput" name="" id="">
                                        <option value="">Default Pricing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputCountry" class="col-sm-2 col-form-label">Markup Based on</label>
                                <div class="col-sm-3">
                                    <select class="form-control editInput" name="" id="">
                                        <option value="">Price</option>
                                        <option value="">Cost Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-5">
                            <div class="mb-3 row">
                                <label for="inputCountry" class="col-sm-3 col-form-label">Template Options</label>
                                <div class="col-sm-5">
                                    <select class="form-control editInput" name="" id="">
                                        <option value="">Show Product Details</option>
                                        <option value="">Hide Product Details</option>
                                        <option value="">Hide Product Price</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false"> Insert</a>
                                        <div class="dropdown-menu fade-up m-0">
                                            <a href="#" class="dropdown-item col-form-label">Insert Product</a>
                                            <a href="#" class="dropdown-item col-form-label">Insert Title</a>
                                            <a href="#" class="dropdown-item col-form-label">Insert Image</a>
                                            <a href="#" class="dropdown-item col-form-label">Insert Description</a>
                                            <a href="#" class="dropdown-item col-form-label">Insert Section</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-sm-12">
                            <div class="productDetailTable">
                                <table class="table" id="containerA">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Code </th>
                                            <th>Product </th>
                                            <th>Description</th>
                                            <th>Qty </th>
                                            <th>Cost Price(R) </th>
                                            <th>Price(R) </th>
                                            <th>Discount </th>
                                            <th>VAT(%) </th>
                                            <th>Amount Assigned To </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>0.00</td>
                                            <td>R0.00</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false"> Welcome</a>
                                                    <div class="dropdown-menu fade-up m-0">
                                                        <a href="#" class="dropdown-item col-form-label">Products</a>
                                                        <a href="#" class="dropdown-item col-form-label">Our Team</a>
                                                        <a href="#" class="dropdown-item col-form-label">Testimonial</a>
                                                        <a href="#" class="dropdown-item col-form-label">Our Works</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Extra Information</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="">
                                <h4 class="contTitle text-start">Description</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="textarea8"> Arjun Kumar UI/UX Designer and Developer </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="">
                                <h4 class="contTitle text-start">Customer Notes</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="textarea9"> Arjun Kumar UI/UX Designer and Developer</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pt-3">
                                <h4 class="contTitle text-start">Terms</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="textarea10"> Arjun Kumar UI/UX Designer and Developer</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pt-3">
                                <h4 class="contTitle text-start">Internal Notes</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="textarea11"> Arjun Kumar UI/UX Designer and Developer</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End  off newJobForm -->

        </div> <!-- End col-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 px-3">
            <div class="pageTitleBtn">
                <a href="#" class="profileDrop hide-on-load"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                <a href="#" class="profileDrop"> Action <i class="fa-solid fa-arrow-down"></i></a>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Add Customer Modal Start -->
<div class="modal fade" id="QuotecustomerPop" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Add Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="add_customer_form" class="add_customer_form">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Customer Name <span class="red-text">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control editInput">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Customer Type </label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions get_customer_result" name="customer_type_id" id="get_customer_type">
                                            <option selected disabled>None</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="javascript:void(0)" class="formicon" id="OpenCustomerTypeModel"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Contact Name <span class="red-text">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="contact_name" id="customer_contact_name">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-3 col-form-label">Job Title (Position)</label>
                                    <div class="col-sm-4">
                                        <select class="form-control editInput selectOptions get_job_title_result" name="job_title" id="customer_job_title_id">
                                            <option selected disabled>Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Email <span class="red-text">*</span> </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="email" id="customer_email">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone <span class="red-text">*</span> </label>
                                    <div class="col-sm-3">
                                        <select class="form-control editInput selectOptions" name="telephone_country_code" id="billingTelephoneCountryCode"></select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput" name="telephone" id="customer_phone">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-3">
                                        <select class="form-control editInput selectOptions" name="mobile_country_code" id="billingMobileCountryCode"></select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput" name="telephone" id="customer_phone">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Fax</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="fax" id="customer_fax">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-3 col-form-label">Website</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="website" id="customer_website">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-3 col-form-label">Payment Terms</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" name="payment_terms" id="customer_payment_terms">
                                            <option value="21">Defoult (21) </option>
                                            <?php for ($i = 1; $i < 21; $i++) { ?>
                                                <option value="{{$i}}">{{$i}}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <span class="afterInputText"> Days </span>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-3 col-form-label">Currency</label>
                                    <div class="col-sm-9">
                                        <!-- British Pound - GBP -->
                                        <select class="form-control editInput selectOptions" name="currency" id="customer_currency_id">

                                            <option selected disabled>Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCounty" class="col-sm-3 col-form-label">Credit Limit</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="credit_limit" id="customer_credit_limit">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputPincode"
                                        class="col-sm-3 col-form-label">Discount</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="discount" id="customer_discount">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-3 col-form-label">Discount Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="discount_type" id="customer_percentage">
                                            <option selected disabled>Please Select</option>
                                            <option value="1">Percantage</option>
                                            <option value="2">Flat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCountry" class="col-sm-3 col-form-label">VAT / Tax No.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="vat_tax_no" id="customer_vat">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-3 col-form-label">Default Catalogue</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="catalogue_id" id="customer_catalogue">
                                            <option>None</option>
                                            <option>ABCD</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject"
                                        class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="status" id="customer_status">
                                            <option value='1'>Active</option>
                                            <option value='0'>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-2 row">
                                    <label for="inputProject"
                                        class="col-sm-3 col-form-label">Region</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions get_region_result" name="region" id="customerRegion">
                                            <option>None</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:void(0)" class="formicon" id="openRegionsModal"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress"
                                        class="col-sm-3 col-form-label">Address <span class="red-text">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" name="address" id="cuatomer_address" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity"
                                        class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="city" id="customer_city">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="country" id="customer_country_input">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputPincode"
                                        class="col-sm-3 col-form-label">Pincode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="postal_code" id="customer_pincode">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCountry"
                                        class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="country_code" id="customer_country_id">
                                            @foreach($countries as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Site Notes</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" rows="3" name="site_notes" id="customer_site_note"></textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Sage Ref.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="saga_ref" id="customer_sage_ref">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Assign Products</label>
                                    <div class="col-sm-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="1" name="assigned_product" id="customer_yes" checked>
                                            <label class="form-check-label checkboxtext" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="2" name="assigned_product" id="custoemr_no">
                                            <label class="form-check-label checkboxtext" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Notes</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput" name="notes" rows="3" id="customer_note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End row -->
                </form>
            </div>
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="profileDrop" id="SaveCustomerData">Save</button>
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Customer Modal End -->

<!-- Add Customer Type Modal Start -->
<div class="modal fade" id="quote_cutomer_type_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="thirdModalLabel">Add Customer Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_customer_type_form">
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Customer Type <span class="red-text">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control editInput" id="customer_type_name" value="" placeholder="Customer Type">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select id="customer_type_status" name="status" class="form-control editInput">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="pageTitleBtn">
                        <a href="#" class="profileDrop p-2 crmNewBtn" id="saveAddCustomerType"> Save</a>
                        <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Customer Type Modal End -->

<!-- Add Customer Regions Modal Start -->
<div class="modal fade" id="quote_region_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="thirdModalLabel">Add Region</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_region_form">
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Region <span class="red-text">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control editInput" id="region_name" value="" placeholder="Region">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select id="region_status" name="status" class="form-control editInput">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="pageTitleBtn">
                        <a href="#" class="profileDrop p-2 crmNewBtn" id="saveRegionsData"> Save</a>
                        <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Customer Regions Modal End -->

<!-- Add Site Address Modal Start -->
<div class="modal fade" id="add_site_address_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="">Add Site Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="add_customer_site_details_form" class="add_customer_form">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Customer </label>
                                    <div class="col-sm-8">
                                        <label for="inputAddress" class="col-form-label"><span id="setSiteAddress"></span> </label>
                                        <input type="hidden" name="customer_id" id="siteCustomerId">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Site Name <span class="red-text">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="site_name" id="customer_contact_name">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Contact Name <span class="red-text">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="contact_name" id="customer_contact_name">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-4 col-form-label">Job Title (Position)</label>
                                    <div class="col-sm-6">
                                        <select class="form-control editInput selectOptions get_job_title_result" name="title_id" id="siteJobTitle">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:void(0)" class="formicon" id="OpenSiteAddressJobTitleModel"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Company Name <span class="red-text">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="company_name" id="customer_contact_name">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Email <span class="red-text">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="email" id="customer_email">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputTelephone" class="col-sm-4 col-form-label">Telephone <span class="red-text">*</span> </label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" name="telephone_country_code" id="siteAddressTelephoneCode">
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput" name="telephone" id="customer_phone">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputMobile" class="col-sm-4 col-form-label">Mobile</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" name="mobile_country_code" id="siteAddressMobileCode">
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput" name="mobile" id="customer_mobile">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Fax</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="fax" id="customer_fax">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-4 col-form-label">Region</label>
                                    <div class="col-sm-6">
                                        <select class="form-control editInput selectOptions get_job_title_result" name="region" id="getSiteAddressRegion">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:void(0)" class="formicon" id="OpenCustomerRegionModel"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Address <span class="red-text">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control textareaInput" name="address" id="cuatomer_address" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-4 col-form-label">City</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="city" id="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCounty" class="col-sm-4 col-form-label">County</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="country" id="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputPincode" class="col-sm-4 col-form-label">Pincode</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="post_code" id="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCountry" class="col-sm-4 col-form-label">Country</label>
                                    <div class="col-sm-8">
                                        <select class="form-control editInput selectOptions" name="country_id" id="siteAddressCountry">
                                            <option selected disabled>Select Country</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCountry" class="col-sm-4 col-form-label">Default Catalogue</label>
                                    <div class="col-sm-8">
                                        <select class="form-control editInput selectOptions" name="catalogue" id="">
                                            <option>None</option>
                                            <option value="1">ABCD</option>
                                            <option value="2">Test</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End row -->
                    <div class="mb-2 row">
                        <label for="inputName" class="col-sm-2 col-form-label">Notes </label>
                        <div class="col-sm-10">
                            <textarea class="form-control textareaInput" name="notes" id="" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="profileDrop" id="saveCustomerSiteDetails">Save</button>
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Site Address Modal End -->

<!-- Add Customer Contact Modal Start -->
<div class="modal fade" id="add_customer_contact_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Add Customer Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="add_customer_contact_form" class="add_customer_form">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Customer </label>
                                    <div class="col-sm-8">
                                        <label for="inputAddress" class="col-form-label"><span id="setCustomerName"></span> </label>
                                        <input type="hidden" name="customer_id" id="customer_contact_id">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCustomer" class="col-sm-4 col-form-label">Default Billing </label>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="1" name="default_billing" id="customer_yes" checked>
                                            <label class="form-check-label checkboxtext editInput" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="0" name="default_billing" id="custoemr_no">
                                            <label class="form-check-label checkboxtext editInput" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Contact Name <span class="red-text">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="contact_name" id="customer_contact_name">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-4 col-form-label">Job Title (Position)</label>
                                    <div class="col-sm-6">
                                        <select class="form-control editInput selectOptions get_job_title_result" name="job_title_id" id="customer_job_titile_id">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:void(0)" class="formicon" id="OpenCustomerJobTitleModel"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Email <span class="red-text">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="email" id="customer_email">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputTelephone" class="col-sm-4 col-form-label">Telephone <span class="red-text">*</span> </label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" name="telephone_country_code" id="setBillingAddressTelephoneCountryCode">
                                            <option value="">Please Select</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput" name="telephone" id="customer_phone">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputMobile" class="col-sm-4 col-form-label">Mobile</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" name="mobile_country_code" id="setBillingAddressMobileCountryCode">
                                            <option value="">Please Select</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput" name="mobile" id="customer_mobile">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Fax</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="fax" id="customer_fax">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Address Details<span class="red-text">*</span></label>
                                    <div class="col-sm-8">
                                        <label for="inputAddress" class="col-form-label">Same as Default <input type="checkbox" value="1" id="same_as_default" name="same_as_default"></label>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Address <span class="red-text">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control textareaInput" name="address" id="cuatomer_address" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-4 col-form-label">City</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="city" id="customer_city">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCounty" class="col-sm-4 col-form-label">County</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="county" id="customer_country_input">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputPincode" class="col-sm-4 col-form-label">Pincode</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="pincode" id="customer_pincode">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCountry" class="col-sm-4 col-form-label">Country</label>
                                    <div class="col-sm-8">
                                        <select class="form-control editInput selectOptions" name="country" id="getCountryList">
                                            <option selected disabled>Select Country</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End row -->
                </form>
            </div>
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="profileDrop" id="saveCustomerContactData">Save</button>
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Customer Contact Modal End -->

<!-- Add Job Title Modal Start -->
<div class="modal fade" id="customer_job_title_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="thirdModalLabel">Job Title - Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_job_title_form">
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Job Title <span class="red-text">*</span></label>
                        <div class="col-sm-9">
                            <input type="hidden" name="job_title_id" id="job_title_id">
                            <input type="text" name="name" class="form-control editInput" id="customer_type_name" value="" placeholder="Job Title">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select id="customer_type_status" name="status" class="form-control editInput">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="pageTitleBtn">
                        <button type="button" class="profileDrop" id="saveJobTitle">Save</button>
                        <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Job Title Modal End -->

<!-- Add Regions Modal Start -->
<x-region-model
    modalId="siteDetailregion"
    modalTitle="Add Region"
    formId="add_site_details_region_form"
    inputId="region"
    statusId="status"
    saveButtonId="saveSiteDetailsRegion"
    placeholderText="Region" />
<!-- Add Regions Modal End -->

<!-- Include the modal component -->
<x-job-title-model
    modalId="siteDetailJobTitle"
    modalTitle="Job Title - Add"
    formId="add_site_details_job_title_form"
    inputId="JobTitle"
    statusId="status"
    saveButtonId="saveSiteDetailsJobTitle"
    placeholderText="Job Title" />

<script type="text/javascript" src="{{ url('public/js/salesFinance/customeQuoteForm.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js"></script>
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

    CKEDITOR.replace('textarea8', editor_config);
    CKEDITOR.replace('textarea9', editor_config);
    CKEDITOR.replace('textarea10', editor_config);
    CKEDITOR.replace('textarea11', editor_config);
    //Text Editer

    function getCustomerType() {
        $.ajax({
            url: '{{ route("quote.ajax.getCustomerType") }}',
            success: function(response) {
                console.log(response.message);
                const get_customer_type = document.getElementById('get_customer_type');
                get_customer_type.innerHTML = '';
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.title;
                    get_customer_type.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function getRegions(get_customer_type) {
        $.ajax({
            url: '{{ route("quote.ajax.getRegions") }}',
            success: function(response) {
                console.log(response.message);
                // const get_customer_type = document.getElementById('customerRegion');
                get_customer_type.innerHTML = '';
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.title;
                    get_customer_type.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function getCustomerList() {

        $.ajax({
            url: '{{ route("customer.ajax.getCustomerList") }}',
            success: function(response) {
                console.log(response.message);
                var get_customer_type = document.getElementById('getCustomerList');
                // get_customer_type.innerHTML = '';

                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.name;
                    get_customer_type.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function getCountriesListCustomer(selectElement) {
        $.ajax({
            url: '{{ route("ajax.getCountriesList") }}',
            method: 'GET',
            success: function(response) {
                console.log(response.Data);
                selectElement.innerHTML = '';
                response.Data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.name;
                    selectElement.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function getCustomerJobTitle(jobTitle) {
        $.ajax({
            url: '{{ route("customer.ajax.getCustomerJobTitle") }}',
            method: 'GET',
            success: function(response) {
                console.log("jxcnjfjnfnk", response.data);
                jobTitle.innerHTML = '';
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.name;
                    jobTitle.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function saveFormData(formId, saveUrl, modalId, callback, callBackValue = null) {
        var formData = $('#' + formId).serialize();
        console.log(formData);

        $.ajax({
            url: saveUrl,
            method: 'POST',
            data: formData,
            success: function(response) {
                alert(response.message);
                $('#' + modalId).modal('hide');
                if (callback && typeof callback === 'function') {
                    callback(callBackValue);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function getCurrencyData(customer_currency) {
        $.ajax({
            url: '{{ route("currency.ajax.getCurrencyData") }}',
            method: 'GET',
            success: function(response) {
                console.log("jxcnjfjnfnk", response.data);
                customer_currency.innerHTML = '';
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.name + " - " + user.code;
                    customer_currency.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function selectPrevious(Select, previouslySelected) {
        // Loop through the options in the select field
        const options = Select.options;

        for (let i = 0; i < options.length; i++) {
            if (options[i].value === previouslySelected) {
                options[i].selected = true; // Set the previously selected country
                break;
            }
        }
    }

    function getBillingDetailsData(id) {
        // alert(id);
        $.ajax({
            url: '{{ route("customer.ajax.getCustomerDetails") }}',
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response.data);
                document.getElementById('billingDetailsName').value = "";

                // billing details data set
                document.getElementById('billingDetailsName').value = document.getElementById('customerSiteName').value = response.data[0].contact_name;
                document.getElementById('customer_contact_id').value = document.getElementById('siteCustomerId').value = response.data[0].id;
                document.getElementById('setCustomerName').textContent = document.getElementById('setSiteAddress').textContent = document.getElementById('customerSiteCompany').value = response.data[0].name;
                document.getElementById('billingDetailsAddress').value = document.getElementById('customerSiteAddress').value = response.data[0].address;
                document.getElementById('billingDetailsEmail').value = response.data[0].email;
                document.getElementById('billingCustomerCity').value = document.getElementById('customerSiteCity').value = response.data[0].city;
                document.getElementById('billingCustomerCounty').value = document.getElementById('customerSiteCounty').value = response.data[0].country;
                document.getElementById('billingCustomerPostcode').value = document.getElementById('customerSitePostCode').value = response.data[0].postal_code;
                document.getElementById('billingCustomerTelephone').value = document.getElementById('customerSiteTelephone').value = response.data[0].telephone;
                document.getElementById('billingCustomerMobile').value = document.getElementById('customerSiteMobile').value = response.data[0].mobile;
                selectPrevious(document.getElementById('billingCustomerTelephoneCode'), response.data[0].telephone_country_code);
                selectPrevious(document.getElementById('billingCustomerMobileCode'), response.data[0].mobile_country_code);
                selectPrevious(document.getElementById("billingCustomerCountry"), response.data[0].country_code);

                // Customer Site Address Data Set
                selectPrevious(document.getElementById('customerSiteDetailsCountry'), response.data[0].country_code);
                selectPrevious(document.getElementById("customerSiteTelephoneCode"), response.data[0].telephone_country_code);
                selectPrevious(document.getElementById("customerSiteMobileCode"), response.data[0].mobile_country_code);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }


    function setSiteAddressDetails(id) {
        $.ajax({
            url: '{{ route("customer.ajax.getCustomerSiteDetails") }}',
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response.data);
                document.getElementById('siteCustomerId').value = response.data[0].id;
                document.getElementById('customerSiteName').value = response.data[0].contact_name;
                document.getElementById('customerSiteAddress').value = response.data[0].address;
                document.getElementById('customerSiteCity').value = response.data[0].city;
                document.getElementById('customerSiteCounty').value = response.data[0].country;
                document.getElementById('customerSitePostCode').value = response.data[0].post_code;
                document.getElementById('customerSiteTelephone').value = response.data[0].telephone;
                document.getElementById('customerSiteMobile').value = response.data[0].mobile;
                document.getElementById('setSiteAddress').textContent = response.data[0].name;
                document.getElementById('customerSiteCompany').value = response.data[0].company_name;
                selectPrevious(document.getElementById('customerSiteDetailsCountry'), response.data[0].country_id);
                selectPrevious(document.getElementById("customerSiteTelephoneCode"), response.data[0].telephone_country_code);
                selectPrevious(document.getElementById("customerSiteMobileCode"), response.data[0].mobile_country_code);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }


    $(document).ready(function() {

        document.getElementById('hideQuoteDiv').style.display = "none";
        document.getElementById('hideQuoteDetails').style.display = "none";

        $('#getCustomerList').on('click', function() {
            getCustomerList();
            document.getElementById('customerSiteDetails').removeAttribute('disabled');
            document.getElementById('billingDetailContact').removeAttribute('disabled');

            const billingDetailContact = document.getElementById('billingDetailContact');
            billingDetailContact.innerHTML = '';

            var getCustomerListValue = document.getElementById('getCustomerList');

            const option = document.createElement('option');
            option.value = getCustomerListValue.value;
            option.text = "Default";
            billingDetailContact.appendChild(option);


            $.ajax({
                url: '{{ route("customer.ajax.getCustomerBillingAddress") }}',
                method: 'POST',
                data: {
                    id: getCustomerListValue.value
                },
                success: function(response) {
                    console.log(response.message);

                    response.data.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.id;
                        option.text = user.contact_name;
                        billingDetailContact.appendChild(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

            getBillingDetailsData(getCustomerListValue.value);


            const customerSiteDetails = document.getElementById('customerSiteDetails');
            customerSiteDetails.innerHTML = '';

            const option3 = document.createElement('option');
            option3.value = getCustomerListValue.value;
            option3.text = "Same as customer";
            customerSiteDetails.appendChild(option3);

            console.log(getCustomerListValue.value);
            $.ajax({
                url: '{{ route("customer.ajax.getCustomerSiteAddress") }}',
                method: 'POST',
                data: {
                    id: getCustomerListValue.value
                },
                success: function(response) {
                    console.log(response.message);

                    response.data.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.id;
                        option.text = user.site_name;
                        customerSiteDetails.appendChild(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

        });

        $('#AddQuoteButton').on('click', function() {
            var customer = document.getElementById('getCustomerList').value;
            alert(customer);
            if (customer === "") {
                alert('Please select the customer');
            } else {
                document.getElementById('yourQuoteSection').style.display = "none";
                document.getElementById('hideQuoteDiv').style.display = "block";
                document.getElementById('hideCustomerDetails').style.display = "none";
                document.getElementById('hideQuoteDetails').style.display = "block";
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Ajax Call for saving Customer Type 

        // ajax call for saving customer contact on billing details
        $('#saveJobTitle').on('click', function() {
            var customer_job_titile_id = document.getElementById('customer_job_titile_id');
            saveFormData(
                'add_job_title_form', // formId
                '{{ route("customer.ajax.saveJobTitle") }}', // saveUrl
                'customer_job_title_modal', // modalId
                getCustomerJobTitle, // callback function after success
                customer_job_titile_id
            );
        });

        // ajax call for saving customer contact on billing details
        $('#saveSiteDetailsJobTitle').on('click', function() {
            var customer_job_titile_id = document.getElementById('siteJobTitle');
            saveFormData(
                'add_site_details_job_title_form', // formId
                '{{ route("customer.ajax.saveJobTitle") }}', // saveUrl
                'siteDetailJobTitle', // modalId
                getCustomerJobTitle, // callback function after success
                customer_job_titile_id
            );
        });

        // ajax call for saving Region on Customer Site details
        $('#saveSiteDetailsRegion').on('click', function() {
            var getSiteAddressRegion = document.getElementById('getSiteAddressRegion');
            saveFormData(
                'add_site_details_region_form', // formId
                '{{ route("quote.ajax.saveRegion") }}', // saveUrl
                'siteDetailregion', // modalId
                getRegions, // callback function after success

            );
        });

        $('#billingDetailContact').on('change', function() {
            var selected = document.getElementById('getCustomerList').value;
            console.log(selected);
            if ($(this).val() === selected) {
                getBillingDetailsData($(this).val());
            } else {

                $.ajax({
                    url: '{{ route("customer.ajax.getCustomerBillingAddressData") }}',
                    method: 'POST',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        console.log(response.data);

                        // billing details data set
                        document.getElementById('billingDetailsName').value = document.getElementById('customerSiteName').value = response.data[0].contact_name;
                        document.getElementById('customer_contact_id').value = document.getElementById('siteCustomerId').value = response.data[0].id;
                        // document.getElementById('setCustomerName').textContent = document.getElementById('setSiteAddress').textContent = document.getElementById('customerSiteName').value = response.data[0].name;
                        document.getElementById('billingDetailsAddress').value = document.getElementById('customerSiteAddress').value = response.data[0].address;
                        document.getElementById('billingDetailsEmail').value = response.data[0].email;
                        document.getElementById('billingCustomerCity').value = document.getElementById('customerSiteCity').value = response.data[0].city;
                        document.getElementById('billingCustomerCounty').value = document.getElementById('customerSiteCounty').value = response.data[0].county;
                        document.getElementById('billingCustomerPostcode').value = document.getElementById('customerSitePostCode').value = response.data[0].pincode;
                        document.getElementById('billingCustomerTelephone').value = document.getElementById('customerSiteTelephone').value = response.data[0].telephone;
                        document.getElementById('billingCustomerMobile').value = document.getElementById('customerSiteMobile').value = response.data[0].mobile;
                        selectPrevious(document.getElementById('billingCustomerTelephoneCode'), response.data[0].telephone_country_code);
                        selectPrevious(document.getElementById('billingCustomerMobileCode'), response.data[0].mobile_country_code);
                        selectPrevious(document.getElementById("billingCustomerCountry"), response.data[0].country_code);

                        // Customer Site Address Data Set
                        selectPrevious(document.getElementById('customerSiteDetailsCountry'), response.data[0].country_code);
                        selectPrevious(document.getElementById("customerSiteTelephoneCode"), response.data[0].telephone_country_code);
                        selectPrevious(document.getElementById("customerSiteMobileCode"), response.data[0].mobile_country_code);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            }
        });


        $('#customerSiteDetails').on('change', function() {
            var selected = document.getElementById('getCustomerList').value;
            console.log($(this).val());
            if ($(this).val() === selected) {

                $.ajax({
                    url: '{{ route("customer.ajax.getCustomerDetails") }}',
                    method: 'POST',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        console.log(response.data);
                        document.getElementById('siteCustomerId').value = response.data[0].id;
                        document.getElementById('customerSiteName').value = response.data[0].contact_name;
                        document.getElementById('customerSiteAddress').value = response.data[0].address;
                        document.getElementById('customerSiteCity').value = response.data[0].city;
                        document.getElementById('customerSiteCounty').value = response.data[0].country;
                        document.getElementById('customerSitePostCode').value = response.data[0].postal_code;
                        document.getElementById('customerSiteTelephone').value = response.data[0].telephone;
                        document.getElementById('customerSiteMobile').value = response.data[0].mobile;
                        document.getElementById('setSiteAddress').textContent = document.getElementById('customerSiteCompany').value = response.data[0].name;
                        selectPrevious(document.getElementById('customerSiteDetailsCountry'), response.data[0].country_code);
                        selectPrevious(document.getElementById("customerSiteTelephoneCode"), response.data[0].telephone_country_code);
                        selectPrevious(document.getElementById("customerSiteMobileCode"), response.data[0].mobile_country_code);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                setSiteAddressDetails($(this).val());
            }
        });


        // Ajax Call for saving Customer Type
        $('#saveCustomerSiteDetails').on('click', function() {
            var formData = $('#add_customer_site_details_form').serialize();
            $.ajax({
                url: '{{ route("customer.ajax.saveCustomerSiteAddress") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    console.log(response.id);
                    setSiteAddressDetails(response.id);
                    $('#add_site_address_modal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Ajax Call for saving Customer Type
        $('#saveRegionsData').on('click', function() {
            var formData = $('#add_region_form').serialize();
            $.ajax({
                url: '{{ route("quote.ajax.saveRegion") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    var customerRegion = document.getElementById('customerRegion');
                    getRegions(customerRegion);
                    $('#quote_region_modal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Ajax Call for saving Customer Type
        $('#saveAddCustomerType').on('click', function() {
            var formData = $('#add_customer_type_form').serialize();
            $.ajax({
                url: '{{ route("quote.ajax.saveCustomerType") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#quote_cutomer_type_modal').modal('hide');
                    getCustomerType();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Save Customer Data
        $('#SaveCustomerData').on('click', function() {
            var formData = $('#add_customer_form').serialize();
            $.ajax({
                url: '{{ route("customer.ajax.SaveCustomerData") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    getCustomerList();
                    $('#QuotecustomerPop').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Save Customer Data
        $('#saveCustomerContactData').on('click', function() {
            alert();
            var formData = $('#add_customer_contact_form').serialize();
            $.ajax({
                url: '{{ route("customer.ajax.SaveCustomerContactData") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#add_customer_contact_modal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        document.getElementById('same_as_default').addEventListener('change', function() {
            const isChecked = this.checked;

            // Show data if checked, else show blank
            if (isChecked) {
                var gettext = document.getElementById('billingDetailsAddress').text;
                document.getElementById('cuatomer_address').text = gettext;
                // alert("checked");
            } else {
                alert("not checked");

            }
        });

    });




    window.onload = function() {
        var buttons = document.querySelectorAll('.hide-on-load');
        buttons.forEach(function(button) {
            button.style.display = 'none';
        });
    };

    // js for Add Customer modal open
    const OpenAddCustomerModal = document.getElementById('OpenAddCustomerModal');
    const QuotecustomerPop = document.getElementById('QuotecustomerPop');

    OpenAddCustomerModal.onclick = function() {
        getRegions(document.getElementById('customerRegion'));
        getCustomerType();
        getCurrencyData(document.getElementById('customer_currency_id'));
        // getCountriesList(document.getElementById('customer_country_id'));
        getCountriesList(document.getElementById('billingTelephoneCountryCode'));
        getCountriesList(document.getElementById('billingMobileCountryCode'));

        getCustomerJobTitle(document.getElementById('customer_job_title_id'));
        $('#QuotecustomerPop').modal('show');
    }
    // js for Add Customer modal open

    // js for Add customer Type modal
    $('#OpenCustomerTypeModel').on('click', function() {
        $('#quote_cutomer_type_modal').modal('show');
    });

    // js for Add Regions modal
    $('#openRegionsModal').on('click', function() {
        $('#quote_region_modal').modal('show');
    });

    // js for Add Customer Contact modal
    const OpenAddCustomerContact = document.getElementById('OpenAddCustomerContact');
    const add_customer_contact_modal = document.getElementById('add_customer_contact_modal');
    var customer_job_titile_id = document.getElementById('customer_job_titile_id');
    OpenAddCustomerContact.onclick = function() {
        var customer = document.getElementById('getCustomerList').value;
        if (customer === "") {
            alert('Please select the customer');
        } else {
            getCountriesListWithNameCode(document.getElementById('getCountryList'));
            getCustomerJobTitle(customer_job_titile_id);
            getCountriesList(setBillingAddressTelephoneCountryCode);
            getCountriesList(setBillingAddressMobileCountryCode);
            $('#add_customer_contact_modal').modal('show');
        }
    }
    // js for Add Customer Contact modal

    // js for Add Job Title modal
    $('#OpenCustomerJobTitleModel').on('click', function() {
        // getCountriesListCustomer();
        $('#customer_job_title_modal').modal('show');
    });

    // js for Add Site Address modal
    $('#openCustomerSiteAddress').on('click', function() {
        var customer = document.getElementById('getCustomerList').value;
        var siteJobTitle = document.getElementById('siteJobTitle');
        if (customer === "") {
            alert('Please select the customer');
        } else {
            getRegions(document.getElementById('getSiteAddressRegion'));
            getCountriesListWithNameCode(document.getElementById('siteAddressCountry'));
            getCustomerJobTitle(siteJobTitle);
            getCountriesList(document.getElementById('siteAddressMobileCode'));
            getCountriesList(document.getElementById('siteAddressTelephoneCode'));


            $('#add_site_address_modal').modal('show');
        }
    });

    // js for Add Regions modal on site address
    $('#OpenCustomerRegionModel').on('click', function() {
        $('#siteDetailregion').modal('show');
    });

    // js for Add job Title in site Details modal
    $('#OpenSiteAddressJobTitleModel').on('click', function() {
        $('#siteDetailJobTitle').modal('show');
    });
</script>
@include('frontEnd.salesAndFinance.jobs.layout.footer')