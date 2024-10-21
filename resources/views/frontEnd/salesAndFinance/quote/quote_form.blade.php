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
                                            <input type="text" class="form-control-plaintext editInput" id="" value="Auto generate" readonly>
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
                                    <label for="billingCustomerCity" class="col-sm-3 col-form-label">City </label>
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
                                        <input type="hidden" name="customer_id" id="siteCustomerId">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="plusandText">
                                            <a href="#!" id="openCustomerSiteAddress" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="customerSiteName" class="col-sm-3 col-form-label">Name </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="customerSiteName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="customerSiteCompany" class="col-sm-3 col-form-label">Company </label>
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
                                    <label for="customerSiteCity" class="col-sm-3 col-form-label">City </label>
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
                                                    <option value="1">Test 1</option>
                                                    <option value="2">Test 2</option>
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
                                            <input type="hidden" name="" id="customerSiteDeliveryId">
                                            <select class="form-control editInput selectOptions" id="customerSiteDelivery">
                                                <option>Same As Customer</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="plusandText">
                                                <a href="#!" id="openSiteDeliveryModal" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label"> Region <span
                                                class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" name="region" id="siteDeliveryRegions">
                                                <option>None</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Name <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" name="site_name" id="customerSiteDeliveryName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="customerSiteDeliveryCompany" class="col-sm-3 col-form-label">Company </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" name="company_name" id="customerSiteDeliveryCompany" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="customerSiteDeliveryAdd" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Postcode</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control editInput textareaInput" name="company_name" id="customerSiteDeliveryPostCode" placeholder="Postcode">
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
                                            <select class="form-control editInput selectOptions" name="telephone_country_code" id="customerSiteDeliveryTelephoneCode">
                                                <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" name="telephone" id="customerSiteDeliveryTelephone" placeholder="Telephone">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" name="mobile_country_code" id="customerSiteDeliveryMobileCode">
                                                <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" name="mobile" id="customerSiteDeliveryMobile" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Email Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="email" id="customerSiteDeliveryEmail" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput" name="country_id" id="customerSiteDeliveryCountry">
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
                                    <label for="quoteType" class="col-sm-3 col-form-label">Quote Type </label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput" name="quote_type" id="quoteType">
                                            <option value="">-Select-</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="plusandText">
                                            <a href="#!" id="OpenQuoteTypeModel" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Quote Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control editInput textareaInput" id="" placeholder="City">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Expiry Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control editInput textareaInput" id="" placeholder="City">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Customer Ref </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="" placeholder="Customer Ref">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPurchase" class="col-sm-3 col-form-label">Customer Job Ref</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="inputPurchase" placeholder="Customer Job Ref">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPurchase" class="col-sm-3 col-form-label">Purchase Order Ref</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="" placeholder="Purchase Order Ref">
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
                                            <a href="#!" id="OpenAddQuoteSourceModal" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
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
                                        <select class="form-control editInput" name="tags" id="quoteTag">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="plusandText">
                                            <a href="#!" id="OpenAddQuoteTag" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End  off newJobForm -->

                <div class="newJobForm mt-4" id="yourQuoteSection">
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
                <!-- End  off Your Quotes -->



            </div><!-- End off col-md-12 -->

            <div id="hideQuoteDiv">



                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Items Details</label>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="mb-3 row">
                                <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control editInput" id="inputCountry"
                                        placeholder="Type to add product">
                                </div>

                                <div class="col-sm-7">
                                    <div class="plusandText">
                                        <a href="#!" class="formicon" id="openAddProductModal" onclick="itemsAddProductModal(2)"><i class="fa-solid fa-square-plus"></i>
                                        </a>
                                        <span class="afterPlusText"> (Type to view product or <a href="#!" id="openABCProductModal">Click here</a> to view all assets)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputCountry" class="col-sm-2 col-form-label">Catalogue</label>
                                <div class="col-sm-3">
                                    <select class="form-control editInput selectOptions" id="">
                                        <option>Default Price</option>
                                        <option>Default</option>
                                        <option>Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputCountry" class="col-sm-2 col-form-label">Markup Based on</label>
                                <div class="col-sm-3">
                                    <select class="form-control editInput selectOptions" id="">
                                        <option>Price</option>
                                        <option>Cost Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="pageTitleBtn p-0">
                                <div class="nav-item dropdown">
                                    <a href="#!" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false"> + Insert </a>
                                    <div class="dropdown-menu fade-up m-0" style="">
                                        <a href="#!" class="dropdown-item col-form-label" data-bs-toggle="modal" data-bs-target="#productModalBAC">insert Product</a>
                                        <a href="#!" class="dropdown-item col-form-label" onclick="insrtTitle()">insert Title</a>
                                        <a href="#!" class="dropdown-item col-form-label" onclick="insrtImgappend()">insert Image</a>
                                        <a href="#!" class="dropdown-item col-form-label" onclick="insrtDescription()">insert Description</a>
                                        <a href="#!" class="dropdown-item col-form-label" onclick="insrtSection()">insert Section</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="productDetailTable">
                                <table class="table mb-0" id="containerA">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Code </th>
                                            <th>Product <i class="fa fa-info-circle"></i></th>
                                            <th>Description</th>
                                            <th>
                                                <div class="tableplusBTN">
                                                    <span>Account Code </span>
                                                    <span class="plusandText ps-3">
                                                        <a href="#!" class="formicon pt-0" id="OpenAddAccountCodeModal"> <i class="fa-solid fa-square-plus"></i> </a>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>Qty </th>
                                            <th>Cost Price($) </th>
                                            <th>Cost Calc</th>
                                            <th>Price($) </th>
                                            <th>Markup(%)</th>
                                            <th>VAT(%) </th>
                                            <th>Discount </th>
                                            <th>Amount </th>
                                            <th>Profit </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="add_table_insrt">
                                        <tr>
                                            <td>
                                                <div class="CSPlus">
                                                    <span class="plusandText">
                                                        <a href="#!" class="formicon pt-0 me-2"> <i class="fa-solid fa-square-plus"></i> </a>
                                                        <input type="text" class="form-control editInput input80" value="CS-0001">
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <input type="text" class="form-control editInput" value="CS-0001">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="2" placeholder="Address"></textarea>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <select class="form-control editInput selectOptions" id="inputCustomer">
                                                        <option>No account</option>
                                                        <option>Default</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class=""><input type="text" class="form-control editInput input50" value="1"></div>
                                            </td>
                                            <td>
                                                <div class=""> <input type="text" class="form-control editInput input50" value="100.00"></div>
                                            </td>
                                            <td>
                                                <div class="calculatorIcon">
                                                    <span class="plusandText"> 
                                                        <a href="#!" class="formicon pt-0" data-bs-toggle="modal" data-bs-target="#calculatePop"> <span class="material-symbols-outlined">calculate </span> </a>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <input type="text" class="form-control editInput input50" value="90.00">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <input type="text" class="form-control editInput input50" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <select class="form-control editInput selectOptions" id="inputCustomer">
                                                        <option>Please Select</option>
                                                        <option>Default</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control editInput input50 me-2" value="0">
                                                    <select class="form-control editInput selectOptions input50" id="inputCustomer">
                                                        <option>Please Select</option>
                                                        <option>Default</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <span>$90.00</span>
                                            </td>
                                            <td>
                                                <span>$-10.00</span>
                                                <div class="minusnmber pt-1">(-11.11%)</div>
                                            </td>
                                            <td>
                                                <div class="statuswating">
                                                    <span class="oNOfswich">
                                                        <input type="checkbox">
                                                    </span>
                                                    <a href="#!"><i class="fa-solid fa-circle-xmark"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <!-- CalculatePop Modal -->
                                <div class="modal fade" id="calculatePop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content add_Customer">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="customerModalLabel">Cost calculator </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="contTitle text-start">Product</h4>
                                                <div class="productDetailTable mt-2">
                                                    <table class="table" id="containerA">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Code</th>
                                                                <th>Product </th>
                                                                <th>Description</th>
                                                                <th>Qty</th>
                                                                <th>Cost Price($)</th>
                                                                <th>Price($)</th>
                                                                <th>Amount($) </th>
                                                                <th>Profit($)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="CSPlus">
                                                                        <span class="plusandText">
                                                                            <input type="text" class="form-control editInput input80" value="T3-0001">
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <input type="text" class="form-control editInput" value="TEst-331">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <textarea class="form-control textareaInput rounded-0" name="address" id="inputAddress" rows="1" placeholder="Address"></textarea>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                            <option>No account</option>
                                                                            <option>Default</option>
                                                                            <option>Default</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <input type="text" class="form-control editInput input50" value="1">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <input type="text" class="form-control editInput input50" value="100.00">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="">
                                                                        <input type="text"
                                                                            class="form-control editInput input50"
                                                                            value="90.00">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <input type="text"
                                                                            class="form-control editInput input50"
                                                                            value="90.00">
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <h4 class="contTitle text-start">Cost</h4>


                                                <div class="mb-3 mt-2 row">
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control editInput" id="inputCountry" placeholder="Type to add product">
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="plusandText">
                                                            <a href="#!" class="formicon" id="cost_product_popup"><i class="fa-solid fa-square-plus"></i></a>
                                                            <span class="afterPlusText"> (Type to view product or <a href="#!">Click here</a> to view all assets)</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="costProdut">
                                                    <div class="productDetailTable">
                                                        <table class="table" id="containerA">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>Code</th>
                                                                    <th>Product </th>
                                                                    <th>Description</th>
                                                                    <th>Qty</th>
                                                                    <th>Cost Price($)</th>
                                                                    <th>Price($)</th>
                                                                    <th>Amount($) </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="7">
                                                                        <div class="addProduvtBg text-center">
                                                                            <h5 class="addproductCentertext">Add products as costs to get started! <br>Search Products or
                                                                                <a href="#!">click here</a> to view all products.
                                                                            </h5>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"></td>
                                                                    <td>Totle</td>
                                                                    <td>0</td>
                                                                    <td>$0.00</td>
                                                                    <td>$0.00</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                                <!--Start Product Cetagory Popup -->

                                                <div id="costProPopupcont" class="cost_popup">
                                                    <div class="popup-content firstCostpop">
                                                        <div class="popupTitle">
                                                            <span class="">Product Cetagory</span>
                                                            <span class="close" id="closeCostPopup">&times;</span>
                                                        </div>
                                                        <div class="contantbodypopup">
                                                            <form action="" class="customerForm">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="formDtail">
                                                                            <!-- <form action="" class="customerForm"> -->
                                                                            <div class="mb-2 row">
                                                                                <label for="inputName" class="col-sm-4 col-form-label">Customer</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                        <option>-All-</option>
                                                                                        <option>Analytical Customer</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputCustomer" class="col-sm-4 col-form-label">Product Category</label>
                                                                                <div class="col-sm-7">
                                                                                    <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                        <option>Genrale Customer </option>
                                                                                        <option>Analytical Customer </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-1 ps-0">
                                                                                    <a href="#!" class="formicon" id="prod_catgry_smallPop"><i class="fa-solid fa-square-plus"></i></a>
                                                                                </div>
                                                                            </div>



                                                                            <!--Start Product Cetagory Popup -->

                                                                            <div id="quote_catgsmallpop" class="quotecatgrysmallPop">
                                                                                <div class="popup-content">
                                                                                    <div class="popupTitle">
                                                                                        <span class="">Product Cetagory</span>
                                                                                        <span class="close" id="close_quote_catagPopup">×</span>
                                                                                    </div>
                                                                                    <div class="contantbodypopup">
                                                                                        <form action="" class="customerForm"> 
                                                                                            <div class="mb-2 row">
                                                                                                <label for="inputCity" class="col-sm-3 col-form-label">Product Cetagory*</label>
                                                                                                <div class="col-sm-9">
                                                                                                    <input type="text" class="form-control editInput" id="inputCity" value="Port Elizabeth">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div
                                                                                                class="mb-2 row">
                                                                                                <label
                                                                                                    for="inputCity"
                                                                                                    class="col-sm-3 col-form-label">Parent
                                                                                                    Cetagory</label>
                                                                                                <div
                                                                                                    class="col-sm-9">
                                                                                                    <select
                                                                                                        class="form-control editInput selectOptions"
                                                                                                        id="inputCustomer">
                                                                                                        <option>
                                                                                                            None
                                                                                                        </option>
                                                                                                        <option>
                                                                                                            Default
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mb-2 row">
                                                                                                <label
                                                                                                    for="inputCity"
                                                                                                    class="col-sm-3 col-form-label">Status</label>
                                                                                                <div
                                                                                                    class="col-sm-9">
                                                                                                    <select
                                                                                                        class="form-control editInput selectOptions"
                                                                                                        id="inputCustomer">
                                                                                                        <option>
                                                                                                            None
                                                                                                        </option>
                                                                                                        <option>
                                                                                                            Default
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </form>
                                                                                    </div>

                                                                                    <div
                                                                                        class="popupF  customer_Form_Popup">

                                                                                        <button type="button"
                                                                                            class="profileDrop">Save</button>
                                                                                        <button type="button"
                                                                                            class="profileDrop">Save
                                                                                            &amp;
                                                                                            Close</button>
                                                                                        <button type="button"
                                                                                            class="profileDrop">Cancel</button>

                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <!-- End off Product Cetagory Popup -->


                                                                            <div class="mb-2 row">
                                                                                <label for="inputName"
                                                                                    class="col-sm-4 col-form-label">Product
                                                                                    Name*</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control editInput"
                                                                                        id="inputName"
                                                                                        value="John Smith">
                                                                                </div>
                                                                            </div>

                                                                            <div class="mb-2 row">
                                                                                <label for="inputProject"
                                                                                    class="col-sm-4 col-form-label">Product
                                                                                    Type</label>
                                                                                <div class="col-sm-7">
                                                                                    <select
                                                                                        class="form-control editInput selectOptions"
                                                                                        id="inputCustomer">
                                                                                        <option>Please Select
                                                                                        </option>
                                                                                        <option>Supervisor
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-1 ps-0">
                                                                                    <a href="#!"
                                                                                        class="formicon"><i
                                                                                            class="fa-solid fa-square-plus"></i></a>
                                                                                </div>
                                                                            </div>



                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail"
                                                                                    class="col-sm-4 col-form-label">Product
                                                                                    Code </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control editInput"
                                                                                        id="inputEmail"
                                                                                        value="roxy.scits@gmail.com">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail"
                                                                                    class="col-sm-4 col-form-label">Cost
                                                                                    Price </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control editInput"
                                                                                        id="inputEmail"
                                                                                        value="roxy.scits@gmail.com">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputTelephone"
                                                                                    class="col-sm-4 col-form-label">Markup</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control editInput"
                                                                                        id="inputTelephone"
                                                                                        value="14000883788">
                                                                                </div>

                                                                            </div>

                                                                            <div class="mb-2 row">
                                                                                <label for="inputMobile"
                                                                                    class="col-sm-4 col-form-label">Price
                                                                                    *</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control editInput"
                                                                                        id="inputPrice"
                                                                                        value="Price">
                                                                                </div>
                                                                            </div>

                                                                            <div class="mb-2 row">
                                                                                <label for="inputCounty"
                                                                                    class="col-sm-4 col-form-label">Description</label>
                                                                                <div class="col-sm-8">
                                                                                    <textarea
                                                                                        class="form-control textareaInput"
                                                                                        name="address"
                                                                                        id="inputAddress"
                                                                                        rows="3"
                                                                                        placeholder="75 Cope Road Mall Park USA"></textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="mb-2 row">
                                                                                <label for="inputCounty"
                                                                                    class="col-sm-4 col-form-label pt-0">show
                                                                                    Product</label>
                                                                                <div class="col-sm-8">
                                                                                    <span class="oNOfswich">
                                                                                        <input type="checkbox">
                                                                                    </span>
                                                                                </div>
                                                                            </div>

                                                                            <!-- </form> -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                                                        <div class="formDtail">
                                                                            <form action="" class="">
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputCity"
                                                                                        class="col-sm-4 col-form-label">Bar
                                                                                        Code</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text"
                                                                                            class="form-control editInput"
                                                                                            id="inputCity"
                                                                                            value="Port Elizabeth">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputProject"
                                                                                        class="col-sm-4 col-form-label">Sales
                                                                                        Tax Rate</label>
                                                                                    <div class="col-sm-7">
                                                                                        <select
                                                                                            class="form-control editInput selectOptions"
                                                                                            id="inputCustomer">
                                                                                            <option>None
                                                                                            </option>
                                                                                            <option>Default
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-1 ps-0">
                                                                                        <a href="#!"
                                                                                            class="formicon"
                                                                                            id="quotr_salesTaxRatepopup">
                                                                                            <i
                                                                                                class="fa-solid fa-square-plus"></i>
                                                                                        </a>
                                                                                    </div>

                                                                                    <!--Sales Tax Rate Popup -->
                                                                                    <div id="quote_salesTax_popup"
                                                                                        class="quotesalesTaxRate">
                                                                                        <div
                                                                                            class="popup-content">
                                                                                            <div
                                                                                                class="popupTitle">
                                                                                                <span
                                                                                                    class="">Add
                                                                                                    Tax
                                                                                                    Rate</span>
                                                                                                <span
                                                                                                    class="close"
                                                                                                    id="closequote_salesTaxPopup">×</span>
                                                                                            </div>
                                                                                            <div
                                                                                                class="contantbodypopup">
                                                                                                <form action=""
                                                                                                    class="">
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">Tax
                                                                                                            Rate
                                                                                                            Name*</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control editInput"
                                                                                                                id="inputCity"
                                                                                                                value="Port Elizabeth">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">Tax
                                                                                                            Rate*</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control editInput"
                                                                                                                id="inputCity"
                                                                                                                value="Port Elizabeth">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">Status</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <select
                                                                                                                class="form-control editInput selectOptions"
                                                                                                                id="inputCustomer">
                                                                                                                <option>
                                                                                                                    None
                                                                                                                </option>
                                                                                                                <option>
                                                                                                                    Default
                                                                                                                </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">External
                                                                                                            Tax
                                                                                                            Code</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control editInput"
                                                                                                                id="inputCity"
                                                                                                                value="Port Elizabeth">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">Expiry
                                                                                                            Date</label>
                                                                                                        <div
                                                                                                            class="col-sm-7">
                                                                                                            <input
                                                                                                                type="date"
                                                                                                                class="form-control editInput"
                                                                                                                id="inputCity"
                                                                                                                value="Port Elizabeth">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>

                                                                                            <div
                                                                                                class="popupF  customer_Form_Popup">

                                                                                                <button
                                                                                                    type="button"
                                                                                                    class="profileDrop">Save</button>
                                                                                                <button
                                                                                                    type="button"
                                                                                                    class="profileDrop">Save
                                                                                                    &amp;
                                                                                                    Close</button>
                                                                                                <button
                                                                                                    type="button"
                                                                                                    class="profileDrop">Cancel</button>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <!--End off Sales Tax Rate Popup -->

                                                                                </div>

                                                                                <div class="mb-2 row">
                                                                                    <label for="inputProject"
                                                                                        class="col-sm-4 col-form-label">Purchase
                                                                                        Tax Rate</label>
                                                                                    <div class="col-sm-7">
                                                                                        <select
                                                                                            class="form-control editInput selectOptions"
                                                                                            id="inputCustomer">
                                                                                            <option>None
                                                                                            </option>
                                                                                            <option>Default
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-1 ps-0">
                                                                                        <a href="#!"
                                                                                            class="formicon"
                                                                                            id="purchaseTaxRatePop">
                                                                                            <i
                                                                                                class="fa-solid fa-square-plus"></i>
                                                                                        </a>
                                                                                    </div>

                                                                                    <!--Purchase Tax Rate Popup -->
                                                                                    <div id="purchasepopup"
                                                                                        class="purchasepopup">
                                                                                        <div
                                                                                            class="popup-content">
                                                                                            <div
                                                                                                class="popupTitle">
                                                                                                <span
                                                                                                    class="">Purchase
                                                                                                    Tax
                                                                                                    Rate</span>
                                                                                                <span
                                                                                                    class="close"
                                                                                                    id="closePurchasePopup">×</span>
                                                                                            </div>
                                                                                            <div
                                                                                                class="contantbodypopup">
                                                                                                <form action=""
                                                                                                    class="">
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">Tax
                                                                                                            Rate
                                                                                                            Name*</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control editInput"
                                                                                                                id="inputCity"
                                                                                                                value="Port Elizabeth">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">Tax
                                                                                                            Rate*</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control editInput"
                                                                                                                id="inputCity"
                                                                                                                value="Port Elizabeth">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">Status</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <select
                                                                                                                class="form-control editInput selectOptions"
                                                                                                                id="inputCustomer">
                                                                                                                <option>
                                                                                                                    None
                                                                                                                </option>
                                                                                                                <option>
                                                                                                                    Default
                                                                                                                </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">External
                                                                                                            Tax
                                                                                                            Code</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control editInput"
                                                                                                                id="inputCity"
                                                                                                                value="Port Elizabeth">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mb-2 row">
                                                                                                        <label
                                                                                                            for="inputCity"
                                                                                                            class="col-sm-3 col-form-label">Expiry
                                                                                                            Date</label>
                                                                                                        <div
                                                                                                            class="col-sm-7">
                                                                                                            <input
                                                                                                                type="date"
                                                                                                                class="form-control editInput"
                                                                                                                id="inputCity"
                                                                                                                value="Port Elizabeth">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>

                                                                                            <div
                                                                                                class="popupF  customer_Form_Popup">

                                                                                                <button
                                                                                                    type="button"
                                                                                                    class="profileDrop">Save</button>
                                                                                                <button
                                                                                                    type="button"
                                                                                                    class="profileDrop">Save
                                                                                                    &amp;
                                                                                                    Close</button>
                                                                                                <button
                                                                                                    type="button"
                                                                                                    class="profileDrop">Cancel</button>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <!--End off Purchase Tax Rate Popup -->
                                                                                </div>

                                                                                <div class="mb-2 row">
                                                                                    <label for="inputAddress"
                                                                                        class="col-sm-4 col-form-label">Nominal
                                                                                        Code
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text"
                                                                                            class="form-control editInput"
                                                                                            id="inputCity"
                                                                                            value="Port Elizabeth">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-2 row">
                                                                                    <label for="inputCity"
                                                                                        class="col-sm-4 col-form-label">Sales
                                                                                        A/c Code</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select
                                                                                            class="form-control editInput selectOptions"
                                                                                            id="inputCustomer">
                                                                                            <option>--Please
                                                                                                Select--
                                                                                            </option>
                                                                                            <option>United
                                                                                                kingdom (+44)
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputCity"
                                                                                        class="col-sm-4 col-form-label">Purchase
                                                                                        A/c Code
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <select
                                                                                            class="form-control editInput selectOptions"
                                                                                            id="inputCustomer">
                                                                                            <option>--Please
                                                                                                Select--
                                                                                            </option>
                                                                                            <option>United
                                                                                                kingdom (+44)
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputCity"
                                                                                        class="col-sm-4 col-form-label">Expense
                                                                                        A/c Code</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select
                                                                                            class="form-control editInput selectOptions"
                                                                                            id="inputCustomer">
                                                                                            <option>--Please
                                                                                                Select--
                                                                                            </option>
                                                                                            <option>United
                                                                                                kingdom (+44)
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputCounty"
                                                                                        class="col-sm-4 col-form-label">Location</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text"
                                                                                            class="form-control editInput"
                                                                                            id="location"
                                                                                            placeholder="Location">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-2 row">
                                                                                    <label for="inputCity"
                                                                                        class="col-sm-4 col-form-label">Status</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select
                                                                                            class="form-control editInput selectOptions"
                                                                                            id="inputCustomer">
                                                                                            <option>Active
                                                                                            </option>
                                                                                            <option>United
                                                                                                kingdom (+44)
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="mb-2 row">
                                                                                    <label for="inputName"
                                                                                        class="col-sm-4 col-form-label">Attachment</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="file"
                                                                                            class="form-control editInput"
                                                                                            id="inputName">
                                                                                    </div>
                                                                                </div>


                                                                        </div>
                                                                        <div class="productDetailTable">
                                                                            <table class="table"
                                                                                id="containerA">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>Supplier </th>
                                                                                        <th>Part Number</th>
                                                                                        <th>Cost Price</th>
                                                                                        <th>
                                                                                            <a href="#!"
                                                                                                class="formicon"
                                                                                                id="openPopupButton">
                                                                                                <i
                                                                                                    class="fa-solid fa-square-plus"></i>
                                                                                            </a>
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </form>
                                                        </div>

                                                        <div class="popupF  customer_Form_Popup">

                                                            <button type="button"
                                                                class="profileDrop">Save</button>
                                                            <button type="button" class="profileDrop">Save &
                                                                Close</button>
                                                            <button type="button"
                                                                class="profileDrop">Cancel</button>

                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- End off Product Cetagory Popup -->


                                            </div><!-- End off Modal-body -->
                                            <div class="modal-footer customer_Form_Popup">
                                                <button type="button" class="profileDrop">Save</button>
                                                <button type="button" class="profileDrop">Save &amp;
                                                    Close</button>
                                                <button type="button" class="profileDrop"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End offCalculatePop Modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="productModalBAC" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="productModalBACLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content add_Customer">
                                            <div class="modal-header">
                                                <h5 class="modal-title fs-5" id="productModalBACLabel">Product
                                                    List</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">
                                                <div class="modal-body ">

                                                    <div class="extraInformationTab">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab"
                                                                role="tablist">
                                                                <button class="nav-link active"
                                                                    id="nav-product-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#nav-product" type="button"
                                                                    role="tab" aria-controls="nav-Notes"
                                                                    aria-selected="true">Product(s) <span
                                                                        class="productCount">01</span></button>
                                                                <button class="nav-link" id="nav-secrices-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#nav-secrices" type="button"
                                                                    role="tab" aria-controls="nav-secrices"
                                                                    aria-selected="false">Service(s) <span
                                                                        class="productCount">01</span></button>
                                                                <button class="nav-link" id="nav-consumable-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#nav-consumable"
                                                                    type="button" role="tab"
                                                                    aria-controls="nav-consumable"
                                                                    aria-selected="false">Consumable(s) <span
                                                                        class="productCount">01</span></button>
                                                                <button class="nav-link"
                                                                    id="nav-productGroup-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#nav-productGroup"
                                                                    type="button" role="tab"
                                                                    aria-controls="nav-productGroup"
                                                                    aria-selected="false">Product Group(s) <span
                                                                        class="productCount">01</span></button>

                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <div class="tab-pane fade show active"
                                                                id="nav-product" role="tabpanel"
                                                                aria-labelledby="nav-product-tab" tabindex="0">
                                                                <div class="py-4">

                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>--Any Category--</option>
                                                                                <option>Default</option>
                                                                                <option>Default</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control editInput" placeholder="Recipient's username"  aria-label="Recipient's username" aria-describedby="button-addon2">
                                                                                <button class="btn btn-outline-secondary editInput profileDrop" type="button" id="button-addon2">Button</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="alphabeticListHolder">
                                                                        <ul class="alphabeticList">
                                                                            <li><a href="#" class="alphabeticLink" data-term="all" data-search_mode="ALL">All</a></li>
                                                                            @for ($i = 65; $i <= 90; $i++)
                                                                                <li><a href="#" class="alphabeticLink" data-term="{{ chr($i) }}" data-search_mode="STARTS">{{ chr($i) }}</a></li>
                                                                            @endfor
                                                                            <li>&nbsp;</li>
                                                                            @for($j = 0; $j <= 9; $j++)
                                                                                <li><a href="#" class="alphabeticLink" data-term="{{ $j }}" data-search_mode="STARTS">{{ $j }}</a></li>
                                                                            @endfor
                                                                        </ul>
                                                                        <br class="clear">
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="pagecounter pb-2">
                                                                        <h6>1-1 of 1 product(s) </h6>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="productDetailTable">
                                                                            <table class="table" id="containerA">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>Code</th>
                                                                                        <th>Product </th>
                                                                                        <th>Code Price</th>
                                                                                        <th>Price </th>
                                                                                        <th>Qty</th>
                                                                                        <th>Amount </th>
                                                                                        <th>Delete</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td colspan="7"><label class="red_sorryText">Sorry, no records to show</label></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-secrices" role="tabpanel" aria-labelledby="nav-secrices-tab" tabindex="0">
                                                                <div class="tabheadingTitle">
                                                                    <h3>Service - </h3>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-consumable" role="tabpanel" aria-labelledby="nav-consumable-tab" tabindex="0">
                                                                <div class="tabheadingTitle">
                                                                    <h3>Consumable - </h3>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-productGroup" role="tabpanel" aria-labelledby="nav-productGroup-tab" tabindex="0">
                                                                <div class="tabheadingTitle">
                                                                    <h3>Product Group - </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end modal body -->
                                            <div class="modal-footer customer_Form_Popup">
                                                <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn profileDrop">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table class="table totlepayment" id="containerA">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="pageTitleBtn p-0">
                                                    <div class="nav-item dropdown">
                                                        <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false"> + Insert </a>
                                                        <div class="dropdown-menu fade-up m-0">
                                                            <a href="#" class="dropdown-item col-form-label">Edid Details</a>
                                                            <a href="#" class="dropdown-item col-form-label">Send SMS</a>
                                                            <a href="#" class="dropdown-item col-form-label">CRM / History</a>
                                                            <a href="#" class="dropdown-item col-form-label">Reject</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sub Total (exc. VTA)</td>
                                            <td>$90.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="discountInput">
                                                    <span>Discount</span><input type="text" class="form-control editInput input50" value="0">
                                                    <span>%</span>
                                                </div>
                                            </td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Apply overall markup
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>VAT</td>
                                            <td>$18.00</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total(inc.VAt)</strong></td>
                                            <td><strong>$108.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Profit</td>
                                            <td>$-10.00</td>
                                        </tr>
                                        <tr>
                                            <td>Margin</td>
                                            <td>-11.11%</td>
                                        </tr>
                                        <tr>
                                            <td>Deposit</td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Refund</td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Outstanding (inc.VAT)</strong></td>
                                            <td><strong>$108.00</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- End  off newJobForm -->





                <!-- End  off newJobForm -->

                <!-- End off Customer popup -->

                <!-- End off View Product -->
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
                                    <label for="inputName" class="col-sm-3 col-form-label">Customer Name <span class="radStar ">*</span></label>
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
                                    <label for="inputName" class="col-sm-3 col-form-label">Contact Name <span class="radStar ">*</span></label>
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
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Email <span class="radStar ">*</span> </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="email" id="customer_email">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone <span class="radStar ">*</span> </label>
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
                                        class="col-sm-3 col-form-label">Address <span class="radStar ">*</span></label>
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
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Customer Type <span class="radStar ">*</span></label>
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
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Region <span class="radStar ">*</span></label>
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
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Site Name <span class="radStar ">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="site_name" id="customer_contact_name">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Contact Name <span class="radStar ">*</span></label>
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
                                    <label for="inputName" class="col-sm-4 col-form-label">Company Name <span class="radStar ">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="company_name" id="customer_contact_name">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Email <span class="radStar ">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="email" id="customer_email">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputTelephone" class="col-sm-4 col-form-label">Telephone <span class="radStar ">*</span> </label>
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
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Address <span class="radStar ">*</span></label>
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
                    </div>
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
                                    <label for="inputName" class="col-sm-4 col-form-label">Contact Name <span class="radStar ">*</span></label>
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
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Email <span class="radStar ">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="email" id="customer_email">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputTelephone" class="col-sm-4 col-form-label">Telephone <span class="radStar ">*</span> </label>
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
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Address Details<span class="radStar ">*</span></label>
                                    <div class="col-sm-8">
                                        <label for="inputAddress" class="col-form-label">Same as Default <input type="checkbox" value="1" id="same_as_default" name="same_as_default"></label>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Address <span class="radStar ">*</span></label>
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

<!-- Add Customer Site Delivery Contact Modal Start -->
<div class="modal fade" id="add_site_delivery_address_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="">Add Site Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="add_customer_site_delivery_form" class="add_customer_form">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Customer </label>
                                    <div class="col-sm-8">
                                        <label for="inputAddress" class="col-form-label"><span id="setSiteDeliveryAddress"></span> </label>
                                        <input type="hidden" name="customer_id" id="siteCustomerDeliveryId">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Site Name <span class="radStar ">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="site_name" id="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Contact Name <span class="radStar ">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="contact_name" id="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-4 col-form-label">Job Title (Position)</label>
                                    <div class="col-sm-6">
                                        <select class="form-control editInput selectOptions get_job_title_result" name="title_id" id="siteDeliveryJobTitle">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:void(0)" class="formicon" id="OpenSiteDeliveryAddressJobTitleModel"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Company Name <span class="radStar ">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="company_name" id="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Email <span class="radStar ">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="email" id="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputTelephone" class="col-sm-4 col-form-label">Telephone <span class="radStar ">*</span> </label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" name="telephone_country_code" id="siteDeliveryAddressTelephoneCode">
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput" name="telephone" id="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputMobile" class="col-sm-4 col-form-label">Mobile</label>
                                    <div class="col-sm-2">
                                        <select class="form-control editInput selectOptions" name="mobile_country_code" id="siteDeliveryAddressMobileCode">
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput" name="mobile" id="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Fax</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="fax" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-4 col-form-label">Region</label>
                                    <div class="col-sm-6">
                                        <select class="form-control editInput selectOptions get_job_title_result" name="region" id="getSiteDeliveryAddressRegion">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:void(0)" class="formicon" id="OpenSiteDeliveryRegionModel"><i class="fa-solid fa-square-plus"></i></a>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Address <span class="radStar ">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control textareaInput" name="address" id="" rows="3"></textarea>
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
                                        <select class="form-control editInput selectOptions" name="country_id" id="siteDeliveryAddressCountry">
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
                    </div>
                    <div class="mb-2 row">
                        <label for="inputName" class="col-sm-2 col-form-label">Notes </label>
                        <div class="col-sm-10">
                            <textarea class="form-control textareaInput" name="notes" id="" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="profileDrop" id="saveCustomerSiteDeliveryDetails">Save</button>
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Customer Site Delivery Contact Modal End -->

<!-- Add Job Title Modal Start -->
<x-job-title-model
    modalId="customer_job_title_modal"
    modalTitle="Job Title - Add"
    formId="add_job_title_form"
    inputId="customer_type_name"
    statusId="customer_type_status"
    saveButtonId="saveJobTitle"
    placeholderText="Job Title" />

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

<x-job-title-model
    modalId="siteDeliveryJobTitleModal"
    modalTitle="Job Title - Add"
    formId="add_site_delivery_job_title_form"
    inputId="JobTitle"
    statusId="status"
    saveButtonId="saveSiteDetailsJobTitle"
    placeholderText="Job Title" />

<!-- Include the quote type modal component -->
<x-quote-type-modal
    modalId="quoteTypeModal"
    modalTitle="Quote Type - Add"
    formId="add_quote_type_form"
    inputId="JobTitle"
    statusId="status"
    saveButtonId="saveQuoteTypeQuote"
    placeholderText="Job Title" />

<x-quote-source
    modalId="quoteSourceModal"
    modalTitle="Quote Source - Add"
    formId="add_quote_source_form"
    inputId="JobTitle"
    statusId="status"
    saveButtonId="saveQuoteSourceQuote"
    placeholderText="Quote Source" />

<x-tag-modal
    modalId="quoteTagModal"
    modalTitle="Add Tag"
    formId="add_quote_tag_form"
    inputId="quoteTag"
    statusId="status"
    saveButtonId="saveQuoteTag"
    placeholderText="Tag" />

<x-account-code
    modalId="accountCodeModal"
    modalTitle="Add Departmental Code"
    formId="add_departmental_code_form"
    inputId="accountName"
    departmentCode="accountCode"
    statusId="status"
    saveButtonId="saveAccountCode" />


<x-product-list
    modalId="productModalBAC"
    modalTitle="Product List" />


@include('frontEnd.salesAndFinance.item.common.addproductmodal')
@include('frontEnd.salesAndFinance.item.common.productcategoryaddmodal')
<script type="text/javascript" src="{{ url('public/js/salesFinance/customeQuoteForm.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js"></script>

@include('frontEnd.salesAndFinance.jobs.layout.footer')
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

    function getQuoteType(quoteType) {
        $.ajax({
            url: '{{ route("quote.ajax.getQuoteTypes") }}',
            success: function(response) {
                console.log(response.message);
                quoteType.innerHTML = '';
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.title;
                    quoteType.appendChild(option);
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

    function getTags(tags) {
        $.ajax({
            url: '{{ route("General.ajax.getTags") }}',
            method: 'GET',
            success: function(response) {
                console.log("jxcnjfjnfnk", response.data);
                tags.innerHTML = '';
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.title;
                    tags.appendChild(option);
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

    function setFieldValues(fields, value) {
        fields.forEach(fieldId => {
            document.getElementById(fieldId).value = value;
        });
    }

    function setTextContent(fields, value) {
        fields.forEach(fieldId => {
            document.getElementById(fieldId).textContent = value;
        });
    }

    function getBillingDetailsData(id) {
        $.ajax({
            url: '{{ route("customer.ajax.getCustomerDetails") }}',
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response.data);
                var contactData = response.data[0];
                // billing details data set

                setFieldValues(['billingDetailsName', 'customerSiteName', 'customerSiteDeliveryName'], contactData.contact_name);
                setFieldValues(['customer_contact_id', 'siteCustomerId', 'siteCustomerDeliveryId'], contactData.id);
                customer_contact_id
                setTextContent(['setCustomerName', 'setSiteAddress', 'customerSiteCompany', 'customerSiteDeliveryCompany', 'setSiteDeliveryAddress'], contactData.name);
                setFieldValues(['billingDetailsAddress', 'customerSiteAddress', 'customerSiteDeliveryAdd'], contactData.address);
                setFieldValues(['billingDetailsEmail', 'customerSiteDeliveryEmail'], contactData.email);
                setFieldValues(['billingCustomerCity', 'customerSiteCity'], contactData.city);
                setFieldValues(['billingCustomerCounty', 'customerSiteCounty'], contactData.country);
                setFieldValues(['billingCustomerPostcode', 'customerSitePostCode', 'customerSiteDeliveryPostCode'], contactData.postal_code);
                setFieldValues(['billingCustomerTelephone', 'customerSiteTelephone', 'customerSiteDeliveryTelephone'], contactData.telephone);
                setFieldValues(['billingCustomerMobile', 'customerSiteMobile', 'customerSiteDeliveryMobile'], contactData.mobile);

                selectPrevious(document.getElementById('billingCustomerTelephoneCode'), response.data[0].telephone_country_code);
                selectPrevious(document.getElementById('billingCustomerMobileCode'), response.data[0].mobile_country_code);
                selectPrevious(document.getElementById("billingCustomerCountry"), response.data[0].country_code);

                // Customer Site Address Data Set
                selectPrevious(document.getElementById('customerSiteDetailsCountry'), response.data[0].country_code);
                selectPrevious(document.getElementById("customerSiteTelephoneCode"), response.data[0].telephone_country_code);
                selectPrevious(document.getElementById("customerSiteMobileCode"), response.data[0].mobile_country_code);

                // Customer Site Delivery Address Data Set
                selectPrevious(document.getElementById('customerSiteDeliveryCountry'), response.data[0].country_code);
                selectPrevious(document.getElementById("customerSiteDeliveryTelephoneCode"), response.data[0].telephone_country_code);
                selectPrevious(document.getElementById("customerSiteDeliveryMobileCode"), response.data[0].mobile_country_code);
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

                let selectElement = document.getElementById('customerSiteDetails'); // or document.querySelector('[name="mySelectName"]');
                let customerSiteDelivery = document.getElementById('customerSiteDelivery'); // or document.querySelector('[name="mySelectName"]');

                let newOption = document.createElement('option');
                newOption.value = response.data[0].id;
                newOption.text = response.data[0].site_name;
                const option1 = newOption.cloneNode(true);
                newOption.selected = true;
                selectElement.appendChild(newOption);
                customerSiteDelivery.appendChild(option1);


                // document.getElementById('customerSiteDetails');
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

    function setSiteDeliveryDetails(id) {
        $.ajax({
            url: '{{ route("customer.ajax.getCustomerSiteDetails") }}',
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response.data);
                document.getElementById('siteCustomerId').value = response.data[0].id;
                document.getElementById('customerSiteDeliveryName').value = response.data[0].contact_name;
                document.getElementById('customerSiteDeliveryAdd').value = response.data[0].address;
                document.getElementById('customerSiteDeliveryPostCode').value = response.data[0].post_code;
                document.getElementById('customerSiteDeliveryTelephone').value = response.data[0].telephone;
                document.getElementById('customerSiteDeliveryMobile').value = response.data[0].mobile;
                document.getElementById('customerSiteDeliveryEmail').value = response.data[0].email;
                document.getElementById('customerSiteDeliveryCompany').value = response.data[0].company_name;
                selectPrevious(document.getElementById('customerSiteDeliveryCountry'), response.data[0].country_id);
                selectPrevious(document.getElementById("customerSiteDeliveryTelephoneCode"), response.data[0].telephone_country_code);
                selectPrevious(document.getElementById("customerSiteDeliveryMobileCode"), response.data[0].mobile_country_code);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function removeAddCustomerSiteAddress(customerSiteDetails, customerSiteDelivery, id) {
        console.log(id);
        $.ajax({
            url: '{{ route("customer.ajax.getCustomerSiteAddress") }}',
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response.data);
                // alert(response.data);    
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.site_name;
                    const option1 = option.cloneNode(true);
                    customerSiteDetails.appendChild(option);
                    customerSiteDelivery.appendChild(option1);
                });

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function setCustomerBillingData(id) {
        // alert(id)
        $.ajax({
            url: '{{ route("customer.ajax.getCustomerBillingAddressData") }}',
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response.data);

                let selectElement = document.getElementById('billingDetailContact'); // Get the select element

                // Create and append a new option
                let newOption = document.createElement('option');
                newOption.value = response.data[0].id;
                newOption.text = response.data[0].contact_name;
                selectElement.appendChild(newOption);

                // Set the new option as selected
                newOption.selected = true;

                // billing details data set
                document.getElementById('billingDetailsName').value = document.getElementById('customerSiteName').value = response.data[0].contact_name;
                document.getElementById('customer_contact_id').value = document.getElementById('siteCustomerId').value = response.data[0].id;
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



    $(document).ready(function() {

        getQuoteType(document.getElementById('quoteType'));

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
            const customerSiteDelivery = document.getElementById('customerSiteDelivery');

            customerSiteDetails.innerHTML = '';
            customerSiteDelivery.innerHTML = '';

            const option3 = document.createElement('option');
            option3.value = getCustomerListValue.value;
            option3.text = "Same as customer";
            const option4 = option3.cloneNode(true);
            customerSiteDetails.appendChild(option3);
            customerSiteDelivery.appendChild(option4);

            removeAddCustomerSiteAddress(customerSiteDetails, customerSiteDelivery, getCustomerListValue.value);
            // const option3 = document.createElement('option');
            // option3.value = getCustomerListValue.value;
            // option3.text = "Same as customer";
            // const option4 = option3.cloneNode(true);
            // customerSiteDetails.appendChild(option3);
            // customerSiteDelivery.appendChild(option4);

            // console.log(getCustomerListValue.value);

            // $.ajax({
            //     url: '{{ route("customer.ajax.getCustomerSiteAddress") }}',
            //     method: 'POST',
            //     data: {
            //         id: getCustomerListValue.value
            //     },
            //     success: function(response) {
            //         console.log(response.message);

            //         response.data.forEach(user => {
            //             const option = document.createElement('option');
            //             option.value = user.id;
            //             option.text = user.site_name;
            //             const option1 = option.cloneNode(true);
            //             customerSiteDetails.appendChild(option);
            //             customerSiteDelivery.appendChild(option1);
            //         });

            //     },
            //     error: function(xhr, status, error) {
            //         console.error(error);
            //     }
            // });

        });

        $('#AddQuoteButton').on('click', function() {
            var customer = document.getElementById('getCustomerList').value;
            // alert(customer);
            if (customer === "") {
                alert('Please select the customer');
            } else {
                getTags(document.getElementById('quoteTag'))
                getRegions(document.getElementById('siteDeliveryRegions'));
                const selectCustomer = document.getElementById('getCustomerList');
                const selectedText = selectCustomer.options[selectCustomer.selectedIndex].text;
                document.getElementById('setCustomerNameInCustomerdetails').value = selectedText;
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

        $('#saveQuoteTag').on('click', function() {
            var quoteTag = document.getElementById('quoteTag');
            saveFormData(
                'add_quote_tag_form', // formId
                '{{ route("General.ajax.saveQuoteTag") }}', // saveUrl
                'quoteTagModal', // modalId
                getTags, // callback function after success
                quoteTag
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

                setCustomerBillingData($(this).val());

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

        $('#customerSiteDelivery').on('change', function() {
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
                        document.getElementById('customerSiteDeliveryId').value = response.data[0].id;
                        document.getElementById('customerSiteDeliveryName').value = response.data[0].contact_name;
                        document.getElementById('customerSiteDeliveryAdd').value = response.data[0].address;
                        document.getElementById('customerSiteDeliveryPostCode').value = response.data[0].postal_code;
                        document.getElementById('customerSiteDeliveryTelephone').value = response.data[0].telephone;
                        document.getElementById('customerSiteDeliveryMobile').value = response.data[0].mobile;
                        document.getElementById('customerSiteDeliveryEmail').value = response.data[0].email;
                        document.getElementById('customerSiteDeliveryCompany').value = response.data[0].name;
                        selectPrevious(document.getElementById('customerSiteDeliveryCountry'), response.data[0].country_code);
                        selectPrevious(document.getElementById("customerSiteDeliveryTelephoneCode"), response.data[0].telephone_country_code);
                        selectPrevious(document.getElementById("customerSiteDeliveryMobileCode"), response.data[0].mobile_country_code);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                setSiteDeliveryDetails($(this).val());
            }
        });

        $('#saveQuoteSourceQuote').on('click', function() {
            var formData = $('#add_quote_source_form').serialize();
            $.ajax({
                url: '{{ route("quote.ajax.saveQuoteSources") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    console.log(response.id);
                    setSiteAddressDetails(response.id);
                    $('#quoteSourceModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
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
                    // removeAddCustomerSiteAddress(document.getElementById('customerSiteDetails'),document.getElementById('customerSiteDelivery'), response.id);
                    $('#add_site_address_modal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#saveCustomerSiteDeliveryDetails').on('click', function() {
            var formData = $('#add_customer_site_delivery_form').serialize();
            $.ajax({
                url: '{{ route("customer.ajax.saveCustomerSiteAddress") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    console.log(response.id);
                    setSiteAddressDetails(response.id);
                    $('#add_site_delivery_address_modal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });


        $('#saveQuoteTypeQuote').on('click', function() {
            var formData = $('#add_quote_type_form').serialize();
            $.ajax({
                url: '{{ route("quote.ajax.saveQuoteType") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    console.log(response.id);
                    setSiteAddressDetails(response.id);
                    $('#quoteTypeModal').modal('hide');
                    getQuoteType(document.getElementById('quoteType'));

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
            var formData = $('#add_customer_contact_form').serialize();
            $.ajax({
                url: '{{ route("customer.ajax.SaveCustomerContactData") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);

                    alert(response.message);
                    setCustomerBillingData(response.lastid);
                    $('#add_customer_contact_modal').modal('hide');
                    //getBillingDetailsData();
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
                console.log(gettext);
                document.getElementById('cuatomer_address').text = gettext;
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

    $('#OpenQuoteTypeModel').on('click', function() {
        $('#quoteTypeModal').modal('show');
    });

    $('#OpenAddQuoteSourceModal').on('click', function() {
        $('#quoteSourceModal').modal('show');
    });

    itemsAddProductModal

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
        if (customer === "") {
            alert('Please select the customer');
        } else {
            getRegions(document.getElementById('getSiteAddressRegion'));
            getCountriesListWithNameCode(document.getElementById('siteAddressCountry'));
            getCustomerJobTitle(document.getElementById('siteJobTitle'));
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

    $('#openSiteDeliveryModal').on('click', function() {
        getCustomerJobTitle(document.getElementById('siteDeliveryJobTitle'));
        getCountriesList(document.getElementById('siteDeliveryAddressTelephoneCode'));
        getCountriesList(document.getElementById('siteDeliveryAddressMobileCode'));
        getRegions(document.getElementById('getSiteDeliveryAddressRegion'));
        getCountriesListWithNameCode(document.getElementById('siteDeliveryAddressCountry'));
        $('#add_site_delivery_address_modal').modal('show');
    });

    $('#OpenSiteDeliveryAddressJobTitleModel').on('click', function() {
        $('#siteDetailJobTitle').modal('show');
    });

    $('#openABCProductModal').on('click', function() {
        $('#productModalBAC').modal('show');
    });

    $('#OpenAddQuoteTag').on('click', function() {
        $('#quoteTagModal').modal('show');
    });

    $('#OpenAddAccountCodeModal').on('click', function() {
        $('#accountCodeModal').modal('show');
    });
    
    function itemsAddProductModal(th) {
        $("#productform")[0].reset();
        $(".needs-validationp").removeClass('was-validated');
        $('#producttype').val(th);
        //$('#taxratepopup').css('display','block');
        $('#itemsAddProductModal').modal('show');
    }

    function additemsCatagoryModal(th) {
        //alert();
        $('#category_name').val('');
        $('#parentcategory').val('');
        $('#product_category_status').val(1);
        $('#productCategoryID').val('');
        $('#productCategorytype').val(th);
        $('#itemsCatagoryModal').modal('show');
    }

    // **************************impExpClickbtnPopup

    const impExpClickbtnPopup = document.getElementById('impExpClickbtnPopup');
    const importExportpopup = document.getElementById('importExportpopup');
    const closeimportExportPopup = document.getElementById('closeimportExportPopup');

    impExpClickbtnPopup.addEventListener('click', () => {
        importExportpopup.style.display = 'block';
        setTimeout(() => {
            importExportpopup.style.opacity = '1';
        }, 50);
    });

    closeimportExportPopup.addEventListener('click', () => {
        importExportpopup.style.opacity = '0';
        setTimeout(() => {
            importExportpopup.style.display = 'none';
        }, 300);
    });
    // **************************End impExpClickbtnPopup
    // **************************Purchase Tax Rate

    const purchaseTaxRatePop = document.getElementById('purchaseTaxRatePop');
    const purchasepopup = document.getElementById('purchasepopup');
    const closePurchasePopup = document.getElementById('closePurchasePopup');

    purchaseTaxRatePop.addEventListener('click', () => {
        purchasepopup.style.display = 'block';
        setTimeout(() => {
            purchasepopup.style.opacity = '1';
        }, 50);
    });

    closePurchasePopup.addEventListener('click', () => {
        purchasepopup.style.opacity = '0';
        setTimeout(() => {
            purchasepopup.style.display = 'none';
        }, 300);
    });
    // **************************End Purchase Tax Rate
    // **************************Product Cetagory
    const productCetagoryPopup = document.getElementById('productCetagoryPopup');
    const cetagpopup = document.getElementById('cetagpopup');
    const closecatagPopup = document.getElementById('closecatagPopup');

    productCetagoryPopup.addEventListener('click', () => {
        cetagpopup.style.display = 'block';
        setTimeout(() => {
            cetagpopup.style.opacity = '1';
        }, 50);
    });

    closecatagPopup.addEventListener('click', () => {
        cetagpopup.style.opacity = '0';
        setTimeout(() => {
            cetagpopup.style.display = 'none';
        }, 300);
    });
    // **************************End Product Cetagory

    //**************insrtTitle
    function insrtTitle() {
        const node = document.createElement("tr");
        node.classList.add("add_table_insrt");
        node.innerHTML = `
                <td>
                    <div class="CSPlus">
                        <span class="plusandText">
                            <a href="#!" onclick="insrtTitle()" class="formicon pt-0 me-2">
                                <i class="fa-solid fa-square-plus"></i>
                            </a>
                            <label>Title*:</label>
                            <input type="text" class="form-control editInput ms-3" placeholder="Type to add product">
                        </span>
                    </div>
                </td>
                <td colspan="12">
                    <input type="text" class="form-control editInput" placeholder="Type to add product">
                </td>
                <td>
                    <div class="statuswating">
                        <span class="oNOfswich">
                            <input type="checkbox">
                        </span>
                        <a href="#!" class="closeappend"><i class="fa-solid fa-circle-xmark"></i></a>
                    </div>
                </td>
            `;
        const tableBody = document.querySelector(".add_table_insrt");
        if (tableBody) {
            tableBody.appendChild(node);

            // Add event listener to the close button
            const closeButton = node.querySelector('.closeappend');
            closeButton.addEventListener('click', function() {
                node.remove(); // Remove the row when close button is clicked
            });
        } else {
            console.error("Table body with ID 'add_table_insrt' not found.");
        }
    }

    //**************insrtImgappend
    function insrtImgappend() {
        const node = document.createElement("tr");
        node.classList.add("add_table_insrt"); // Adding the class to the row

        node.innerHTML = `
            <td colspan="13">
                <div class="d-flex">
                    <div class="CSPlus">
                        <span class="plusandText pt-1">
                            <a href="#!" onclick="insrtImgappend()" class="formicon pt-0 me-2"> <i class="fa-solid fa-square-plus"></i> </a>
                            <label></label>
                        </span>
                    </div>
                    <div class="addimg">
                        <img class="insrtImg" src="assets/imagrs/imgad1.png">
                    </div>
                </div>
            </td>
            <td>
                <div class="statuswating">
                    <span class="oNOfswich">
                        <input type="checkbox">
                    </span>
                    <a href="#!" class="closeappend"><i class="fa-solid fa-circle-xmark"></i></a>
                </div>
            </td>            
        `;

        // Select the table body using a class instead of an ID
        const tableBody = document.querySelector(".add_table_insrt");

        if (tableBody) {
            tableBody.appendChild(node);

            // Add event listener to the close button
            const closeButton = node.querySelector('.closeappend');
            closeButton.addEventListener('click', function() {
                node.remove(); // Remove the row when the close button is clicked
            });
        } else {
            console.error("Table body with class 'add_table_insrt' not found.");
        }
    }

    //**************insrtDescription
    function insrtDescription() {
        const node = document.createElement("tr");
        node.classList.add("add_table_insrt");
        node.innerHTML = `
            <td colspan="13">
                <div class="d-flex">
                    <div class="CSPlus">
                        <span class="plusandText pt-1">
                            <a href="#!" onclick="insrtDescription()" class="formicon pt-0 me-2"> <i class="fa-solid fa-square-plus"></i> </a>    
                        </span>
                    </div>
                    <input type="text" class="form-control editInput" id="inputCountry" placeholder="Type to add product">
                </div>
            </td>
            <td>
                <div class="statuswating">
                    <span class="oNOfswich">
                        <input type="checkbox">
                    </span>
                    <a href="#!" class="closeappend"><i class="fa-solid fa-circle-xmark"></i></a>
                </div>
            </td>                     
        `;

        // Get table body element
        const tableBody = document.querySelector(".add_table_insrt");
        if (tableBody) {
            tableBody.appendChild(node);

            // Add event listener to the close button
            const closeButton = node.querySelector('.closeappend');
            closeButton.addEventListener('click', function() {
                node.remove(); // Remove the row when close button is clicked
            });
        } else {
            console.error("Table body with ID 'add_table_insrt' not found.");
        }
    }

    //**************insrt Section Title
    function insrtSection() {
        const node = document.createElement("tr");
        node.classList.add("add_table_insrt");
        node.innerHTML = `
            <td colspan="14" class="p-0">
                <div class="newJobForm">
                    <div class="d-flex">
                    <div class="CSPlus">
                        <span class="plusandText pt-1">
                            <a href="#!" onclick="insrtSection()" class="formicon pt-0 me-2"> <i class="fa-solid fa-square-plus"></i> </a>
                            <label class="secTitle">Section Title* :</label>
                        </span>
                    </div>
                    <input type="text" class="form-control editInput" id="inputCountry" placeholder="Type to add product">
                    
                    <div class="pageTitleBtn p-0">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                + Section Insert </a>
                            <div class="dropdown-menu fade-up m-0">
                                <a href="#!" class="dropdown-item col-form-label" data-bs-toggle="modal" data-bs-target="#productModalBAC">insert Section Product</a>
                                <a href="#!" class="dropdown-item col-form-label" onclick="insrtSectionTtle()">insert Section Title</a>
                                <a href="#!" class="dropdown-item col-form-label" onclick="insrtSectionImg()">insert Section Image</a>
                                <a href="#!" class="dropdown-item col-form-label" onclick="insrtSectionDescription()">insert Section Description</a>
                            </div>
                        </div>
                    </div>

                    <div class="statuswating text-end ps-3">
                        <span class="oNOfswich">
                            <input type="checkbox">
                        </span>
                        <a href="#!" class="closeappend"><i class="fa-solid fa-circle-xmark"></i></a>
                    </div>
                    </div>

                    <div class="productDetailTable mt-3">
                        <table class="table" id="containerA">
                            <thead class="table-light">
                                <tr>
                                    <th>Code </th>
                                    <th>Product <i class="fa  fa-info-circle"></i> </th>
                                    <th>Description</th>
                                    <th>
                                        <div class="tableplusBTN">
                                            <span>Account Code </span>
                                            <span class="plusandText ps-3">
                                                <a href="#!" class="formicon pt-0"> <i
                                                        class="fa-solid fa-square-plus"></i> </a>
                                            </span>
                                        </div>
                                    </th>
                                    <th>Qty </th>
                                    <th>Cost Price($) </th>
                                    <th>Cost Calc</th>
                                    <th>Price($) </th>
                                    <th>Markup(%)</th>
                                    <th>VAT(%) </th>
                                    <th>Discount </th>
                                    <th>Amount </th>
                                    <th>Profit </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="add_sectionTitle">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </td>                    
            `;
        // Get table body element 
        const tableBody = document.querySelector(".add_table_insrt");
        if (tableBody) {
            tableBody.appendChild(node);
            // Add event listener to the close button
            const closeButton = node.querySelector('.closeappend');
            closeButton.addEventListener('click', function() {
                node.remove(); // Remove the row when close button is clicked
            });
        } else {
            console.error("Table body with ID 'add_table_insrt' not found.");
        }
    }

    //**************Table inner Table insrtSectionTtle
    function insrtSectionTtle() {
        const node = document.createElement("tr");
        node.classList.add("add_sectionTitle");
        node.innerHTML = `
                        <td>
                    <div class="CSPlus">
                        <span class="plusandText">
                            <a href="#!" onclick="insrtSectionTtle()" class="formicon pt-0 me-2">
                                <i class="fa-solid fa-square-plus"></i>
                            </a>
                            <label>Title*:</label>
                            <input type="text" class="form-control editInput ms-3" placeholder="Type to add product">
                        </span>
                    </div>
                </td>
                <td colspan="12">
                    <input type="text" class="form-control editInput" placeholder="Type to add product">
                </td>
                <td>
                    <div class="statuswating">
                        <span class="oNOfswich">
                            <input type="checkbox">
                        </span>
                        <a href="#!" class="closeappend"><i class="fa-solid fa-circle-xmark"></i></a>
                    </div>
                </td>   
            `;
        // Get table body element
        const tableBody = document.querySelector(".add_sectionTitle");
        if (tableBody) {
            tableBody.appendChild(node);
            // Add event listener to the close button
            const closeButton = node.querySelector('.closeappend');
            closeButton.addEventListener('click', function() {
                node.remove(); // Remove the row when close button is clicked
            });
        } else {
            console.error("Table body with ID 'add_sectionTitle' not found.");
        }
    }

    //**************Table inner Table insrtSectionImg
    function insrtSectionImg() {
        const node = document.createElement("tr");
        node.classList.add("add_sectionTitle");
        node.innerHTML = `
                    <td colspan="13">
                        <div class="d-flex">
                            <div class="CSPlus">
                                <span class="plusandText pt-1">
                                    <a href="#!" onclick="insrtSectionImg()" class="formicon pt-0 me-2"> <i class="fa-solid fa-square-plus"></i> </a>
                                    <label></label>
                                </span>
                            </div>
                            <div class="addimg">
                                <img class="insrtImg" src="assets/imagrs/imgad1.png">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="statuswating">
                            <span class="oNOfswich">
                                <input type="checkbox">
                            </span>
                            <a href="#!" class="closeappend"><i class="fa-solid fa-circle-xmark"></i></a>
                        </div>
                    </td>  
                    `;
        // Get table body element
        const tableBody = document.querySelector(".add_sectionTitle");
        if (tableBody) {
            tableBody.appendChild(node);
            // Add event listener to the close button
            const closeButton = node.querySelector('.closeappend');
            closeButton.addEventListener('click', function() {
                node.remove(); // Remove the row when close button is clicked
            });
        } else {
            console.error("Table body with ID 'add_sectionTitle' not found.");
        }
    }

    //**************Table inner Table insrtSectionDescription
    function insrtSectionDescription() {
        const node = document.createElement("tr");
        node.classList.add("add_sectionTitle");
        node.innerHTML = `
                     <td colspan="13">
                            <div class="d-flex">
                                <div class="CSPlus">
                                    <span class="plusandText pt-1">
                                        <a href="#!" onclick="insrtSectionDescription()" class="formicon pt-0 me-2"> <i class="fa-solid fa-square-plus"></i> </a>    
                                    </span>
                                </div>
                                <input type="text" class="form-control editInput" id="inputCountry" placeholder="Type to add product">
                            </div>
                        </td>
                        <td>
                            <div class="statuswating">
                                <span class="oNOfswich">
                                    <input type="checkbox">
                                </span>
                                <a href="#!" class="closeappend"><i class="fa-solid fa-circle-xmark"></i></a>
                            </div>
                        </td>   
                    `;
        // Get table body element
        const tableBody = document.querySelector(".add_sectionTitle");
        if (tableBody) {
            tableBody.appendChild(node);
            // Add event listener to the close button
            const closeButton = node.querySelector('.closeappend');
            closeButton.addEventListener('click', function() {
                node.remove(); // Remove the row when close button is clicked
            });
        } else {
            console.error("Table body with ID 'add_sectionTitle' not found.");
        }
    }
</script>