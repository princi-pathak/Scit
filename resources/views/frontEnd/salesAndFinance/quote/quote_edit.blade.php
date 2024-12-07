@include('frontEnd.salesAndFinance.jobs.layout.header')
@section('title','Quotes')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    tfoot.table.totlepayment.add_table_insrt33 tr td {
        font-size: 12px;
        line-height: 22px;
    }

    td.borderNone {
        border: none;
    }

    .tableAmountRight {
        text-align: right;
    }

    .totleBold {
        font-weight: 600;
    }
</style>

<section class="main_section_page px-3 pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>{{ $quoteData['quote_ref'] }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                <form action="{{ url('/quote/saveQuoteData') }}" method="post" class="customerForm mt-3">
                    @csrf
                    <div class="newJobForm card">
                        <div class="row" id="hideCustomerDetails">
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="formDtail">
                                    <h4 class="contTitle">Customer Details</h4>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Quote Ref</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="quote_id" value="{{ $quoteData['id'] }}">
                                            <input type="text" class="form-control-plaintext editInput" id="" value="{{ $quoteData['quote_ref'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Customer<span class="radStar">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="hidden" value="{{ $quoteData['customer']['customer.id'] }}" id="setCustomerId">
                                            <select class="form-control editInput selectOptions" name="customer_id" id="getCustomerList">
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
                                            <input type="text" class="form-control-plaintext editInput" id="inputName" value="{{ $quoteData['status'] }}">
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
                                            <input type="hidden" value="{{ $quoteData['billing_add_id'] }}" id="edit_customer_billing_id">
                                            <input type="hidden" id="billing_add_id" name="billing_add_id">
                                            <select class="form-control editInput selectOptions" id="billingDetailContact">
                                                <option>Select Customer First</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="plusandText">
                                                <a href="javascript:void(0)" id="OpenAddCustomerContact" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label"> Name <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" value="{{ $quoteData['customer']['contact_name'] ?? '' }}" id="billingDetailsName" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Address <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="billingDetailsAddress" rows="3" placeholder="Address">{{ $quoteData['customer']['address'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="billingCustomerCity" class="col-sm-3 col-form-label">City </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="billingCustomerCity" value="{{ $quoteData['customer']['city'] ?? '' }}" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="billingCustomerCounty" value="{{ $quoteData['customer']['country'] ?? '' }}" placeholder="County">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Postcode</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control editInput textareaInput" id="billingCustomerPostcode" value="{{ $quoteData['customer']['postal_code'] ?? '' }}" placeholder="Postcode">
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
                                                <option value="{{ $value->id }}" {{ (isset($quoteData['customer']['telephone_country_code']) && $quoteData['customer']['telephone_country_code'] == $value->id) ? 'selected' : '' }}> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="billingCustomerTelephone" value="{{ $quoteData['customer']['telephone'] ?? '' }}" placeholder="Telephone">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" name="mobile_country_code" id="billingCustomerMobileCode">
                                                <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}" {{ (isset($quoteData['customer']['mobile_country_code']) && $quoteData['customer']['mobile_country_code'] == $value->id) ? 'selected' : '' }}> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="billingCustomerMobile" value="{{ $quoteData['customer']['mobile'] ?? '' }}" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Email Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="billingDetailsEmail" value="{{ $quoteData['customer']['email'] ?? '' }}" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" value="{{ $quoteData['customer']['country_code'] ?? '' }}" id="edit_country_code">
                                            <select class="form-control editInput" name="" id="billingCustomerCountry">
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}" {{ (isset($quoteData['customer']['country_code']) && $quoteData['customer']['country_code'] == $value->id) ? 'selected' : '' }}>{{ $value->name }}</option>
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
                                            <input type="hidden" id="edit_customer_site_id" name="{{ $quoteData['site_add_id'] }}">
                                            <select class="form-control editInput selectOptions" id="customerSiteDetails">
                                                <option>Same As Customer</option>
                                            </select>
                                            <input type="hidden" name="site_add_id" id="siteCustomerId">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="plusandText">
                                                <a href="javascript:void(0)" id="openCustomerSiteAddress" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="customerSiteName" class="col-sm-3 col-form-label">Name </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="customerSiteName" value="{{ $quoteData['customer']['contact_name'] ?? '' }}" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="customerSiteCompany" class="col-sm-3 col-form-label">Company </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="customerSiteCompany" value="{{ $quoteData['customer']['name'] ?? '' }}" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="customerSiteAddress" rows="3" placeholder="Address">{{ $quoteData['customer']['address'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="customerSiteCity" class="col-sm-3 col-form-label">City </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="customerSiteCity" value="{{ $quoteData['customer']['name'] ?? '' }}" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">County </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" value="{{ $quoteData['customer']['country'] ?? '' }}" id="customerSiteCounty" placeholder="County">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Postcode </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control editInput textareaInput" id="customerSitePostCode" value="{{ $quoteData['customer']['postal_code'] ?? '' }}" placeholder="Postcode">
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
                                                <option value="{{ $value->id }}" {{ (isset($quoteData['customer']['telephone_country_code']) && $quoteData['customer']['telephone_country_code'] == $value->id) ? 'selected' : '' }}> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="customerSiteTelephone" value="{{ $quoteData['customer']['telephone'] ?? '' }}" placeholder="Telephone ">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" id="customerSiteMobileCode">
                                                <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}" {{ (isset($quoteData['customer']['mobile_country_code']) && $quoteData['customer']['mobile_country_code'] == $value->id) ? 'selected' : '' }}> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="customerSiteMobile" value="{{ $quoteData['customer']['mobile'] ?? '' }}" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Country </label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput" name="" id="customerSiteDetailsCountry">
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}" {{ (isset($quoteData['customer']['country_code']) && $quoteData['customer']['country_code'] == $value->id) ? 'selected' : '' }}>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="hideQuoteDetails">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="formDtail">
                                        <h4 class="contTitle">Customer Details</h4>
                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Customer <span class="radStar">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control-plaintext editInput" id="setCustomerNameInCustomerdetails" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputCustomer" class="col-sm-3 col-form-label">Project </label>
                                            <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions" name="project_id" id="">
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
                                                <input type="hidden" name="site_delivery_add_id" id="site_delivery_add_id">
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
                                            <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions" name="region" id="siteDeliveryRegions">
                                                    <option>None</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="plusandText">
                                                    <a href="#!" id="" onclick="openRegionModal('siteDeliveryRegions');" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                                </div>
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
                                                <input type="hidden" name="quote_id">
                                                <!-- <input type="hidden" name="quote_ref"> -->
                                                <input type="text" class="form-control-plaintext editInput" id="inputName" value="Auto generate" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="quoteType" class="col-sm-3 col-form-label">Quote Type </label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput" name="quota_type" id="quoteType">
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
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Quote Date <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control editInput textareaInput" value="<?= date('Y-m-d'); ?>" name="quota_date" id="" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Expiry Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control editInput textareaInput" name="expiry_date" value="{{ \Carbon\Carbon::now()->addMonth(1)->format('Y-m-d') }}" id="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Customer Ref </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="" name="customer_ref" placeholder="Customer Ref">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Customer Job Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="inputPurchase" name="customer_job_ref" placeholder="Customer Job Ref">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Purchase Order Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="" name="purchase_order_ref" placeholder="Purchase Order Ref">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Source</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput" name="source" id="">
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
                                            <input type="date" class="form-control editInput textareaInput" id="inputPurchase" name="performed_job_date">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control editInput" name="period" id="">
                                                <option value="">Any Time</option>
                                                <option value="AM">AM</option>
                                                <option value="PM">PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput" name="status" id="">
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
                                                                        <!-- <?php print_r($quoteData); ?> -->
                                                                        <td>1</td>
                                                                        <td>{{ $quoteData['quote_ref'] }}</td>
                                                                        <td>-</td>
                                                                        <td>{{ $quoteData['quota_date'] }}</td>
                                                                        <td>{{ $quoteData['expiry_date'] }}</td>
                                                                        <td>&#163;{{ $quoteData['sub_total'] }}</td>
                                                                        <td>&#163;{{ $quoteData['vat_amount'] }}</td>
                                                                        <td>&#163;{{ $quoteData['total_amount'] ?? '0.00'}}</td>
                                                                        <td>&#163;{{ $quoteData['deposit'] ?? '0.00' }}</td>
                                                                        <td>&#163;{{ $quoteData['outstanding'] }}</td>
                                                                        <td>{{ $quoteData['status'] }}</td>
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
                                                <a href="#!" class="profileDrop me-3" onclick="insrtAppoinment()"> New Appointments</a>
                                                <a href="#!" class="profileDrop ms-3"> Send To Planner</a>
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
                                                        <tbody class="add_insrtAppoinment">

                                                        </tbody>

                                                        <tfoot>
                                                            <a href="#!" class="profileDrop ms-3"> Save Appointment(s)</a>
                                                        </tfoot>
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

                    <!-- End off col-md-12 -->
                    <div id="hideQuoteDiv">
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Items Details</label>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="mb-3 row">
                                        <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control editInput" id="search-product" placeholder="Type to add product">
                                        </div>
                                        <div class="parent-container"></div>
                                        <div class="col-sm-7">
                                            <div class="plusandText">
                                                <a href="#!" class="formicon" id="openAddProductModal" onclick="itemsAddProductModal(2)"><i class="fa-solid fa-square-plus"></i> </a>
                                                <span class="afterPlusText"> (Type to view product or <a href="#!" onclick="openProductListModal()">Click here</a> to view all assets)</span>
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
                                            <a href="#!" class="nav-link profileDrop" onclick="openProductListModal();">insert Product</a>

                                            <!-- <a href="#!" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false"> + Insert </a>
                                            <div class="dropdown-menu fade-up m-0" style="">
                                                <a href="#!" class="dropdown-item col-form-label" data-bs-toggle="modal" data-bs-target="#productModalBAC">insert Product</a>
                                                <a href="#!" class="dropdown-item col-form-label" onclick="insrtTitle()">insert Title</a>
                                                <a href="#!" class="dropdown-item col-form-label" data-bs-toggle="modal" data-bs-target="#attachmentsPopup">insert Image</a>
                                                <a href="#!" class="dropdown-item col-form-label" onclick="insrtDescription()">insert Description</a>
                                                <a href="#!" class="dropdown-item col-form-label" onclick="insrtSection()">insert Section</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>


                                <!-- insrt Image Modal -->
                                <div class="modal fade" id="attachmentsPopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Insert Image</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <p class="uploadImg">
                                                    <i class="fa fa-cloud-upload"></i>
                                                    <input type="file" multiple="false" accept="image/*" id="finput" onchange="upload()">
                                                </p>
                                                <canvas id="canv1"></canvas>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="pageTitleBtn p-0">
                                                    <a href="#!" class="profileDrop" onclick="insrtImgappend()" data-bs-dismiss="modal"> Apply</a>
                                                    <a href="#!" class="profileDrop" data-bs-dismiss="modal"> Close</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End insrt Image Modal -->

                                <div class="col-sm-12">
                                    <div class="productDetailTable">
                                        <table class="table mb-0" id="quoteProducts">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Code </th>
                                                    <th>Product <i class="fa fa-info-circle"></i></th>
                                                    <th>Description</th>
                                                    <th>
                                                        <div class="tableplusBTN">
                                                            <span>Account Code </span>
                                                            <span class="plusandText ps-3">
                                                                <a href="#!" class="formicon pt-0" onclick="openAccountCodeModal('set')" id=""> <i class="fa-solid fa-square-plus"></i> </a>
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
                                                    <th class="tableAmountRight">Amount </th>
                                                    <th>Profit </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add_table_insrt">
                                            </tbody>
                                            <tfoot class="table totlepayment add_table_insrt33" id="containerA">
                                            </tfoot>
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
                                                                                <input type="text" class="form-control editInput input50" value="90.00">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="">
                                                                                <input type="text" class="form-control editInput input50" value="90.00">
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
                                                                    <span class="afterPlusText"> (Type to view product or <a href="#!" onclick="openProductListModal()">Click here</a> to view all assets)</span>
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

                                                    </div>
                                                    <!-- End off Modal-body -->
                                                    <div class="modal-footer customer_Form_Popup">
                                                        <button type="button" class="profileDrop">Save</button>
                                                        <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End offCalculatePop Modal -->

                                        <!-- Modal -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End  off newJobForm -->

                        <!-- End off View Product -->
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Extra Information</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="">
                                        <h4 class="contTitle text-start">Description</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" name="extra_information" id="textarea8"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="">
                                        <h4 class="contTitle text-start">Customer Notes</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" id="textarea9" name="customer_notes"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="pt-3">
                                        <h4 class="contTitle text-start">Terms</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" id="textarea10" name="tearms"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="pt-3">
                                        <h4 class="contTitle text-start">Internal Notes</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" id="textarea11" name="internal_notes"> </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End  off newJobForm -->

                    <!--  -->
                    <div id="hideDepositSection">
                        <!-- ***************************************Start deposit Details****************************************** -->
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Deposit Details</label>
                            <div class="row">
                                <div class="col-sm-3 mb-3 mt-2">
                                    <div class=" p-0">
                                        <a href="#!" class="profileDrop" data-bs-toggle="modal" data-bs-target="#creaditDepositModal">Creadit Deposit</a>
                                        <span class="col-form-label">
                                            or
                                        </span>
                                        <a href="#!" class="profileDrop" data-bs-toggle="modal" data-bs-target="#creaditDepositInvoiceModal">Creadit Deposit Invoice</a>
                                    </div>
                                </div>


                                <!-- ************************* -->
                                <div class="modal fade" id="creaditDepositModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="creaditDepositModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content add_Customer">
                                            <div class="modal-header">
                                                <h5 class="modal-title fs-5" id="creaditDepositModalLabel">Creadit Deposit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">
                                                <div class="contantbodypopup p-0">

                                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                        <li class="nav-item me-2" role="presentation">
                                                            <button class="profileDrop" id="paymentDetails-tab" data-bs-toggle="pill" data-bs-target="#paymentDetails" type="button" role="tab" aria-controls="paymentDetails" aria-selected="false" tabindex="-1">Payment Details</button>
                                                        </li>
                                                        <li class="nav-item me-2" role="presentation">
                                                            <button class="profileDrop" id="billingDetails-tab" data-bs-toggle="pill" data-bs-target="#billingDetails" type="button" role="tab" aria-controls="billingDetails" aria-selected="false" tabindex="-1">Billing Details</button>
                                                        </li>
                                                        <li class="nav-item me-2" role="presentation">
                                                            <button class="profileDrop active activetb" id="paymentType-tab" data-bs-toggle="pill" data-bs-target="#paymentType" type="button" role="tab" aria-controls="paymentType" aria-selected="true">Payment Type</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <div class="tab-pane fade" id="paymentDetails" role="tabpanel" aria-labelledby="paymentDetails-tab" tabindex="0">
                                                            <div class="newJobForm card">
                                                                <div class="mb-2 row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">Invoice</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control-plaintext editInput" id="inputName" value="QU-0021 - Quote Date 24/10/2024" readonly="">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">Customer</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control-plaintext editInput" id="inputName" value="Prathima" readonly="">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">Totle (inc. VAT)</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control-plaintext editInput" id="inputName" value="$0.00" readonly="">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">Outstanding Amount</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control-plaintext editInput" id="inputName" value="$12,000.00" readonly="">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Deposit Persontage
                                                                        <span class="radStar">*</span></label>
                                                                    <div class="col-sm-5">
                                                                        <input type="text" class="form-control editInput" id="inputCity" value="100">
                                                                    </div>
                                                                    <div class="col-sm-1 ps-0">
                                                                        <input class="form-control editInput text-center" value="%" disabled="">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Deposit Amount (inc. VAT)<span class="radStar">*</span></label>
                                                                    <div class="col-sm-1 pe-0">
                                                                        <input class="form-control editInput text-center" value="$" disabled="">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control editInput" id="inputCity" value="$ 0.00">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Reference<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity" placeholder="Reference">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Description<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <textarea class="form-control textareaInput rounded-1" name="address" id="description" rows="3" placeholder="Description"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCounty" class="col-sm-3 col-form-label pt-0">Take Card Payment Now?</label>
                                                                    <div class="col-sm-8">
                                                                        <span class="oNOfswich">
                                                                            <input type="checkbox">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  -->
                                                        <div class="tab-pane fade" id="billingDetails" role="tabpanel" aria-labelledby="billingDetails-tab" tabindex="0">
                                                            <div class="newJobForm card">
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">First Name<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity" placeholder="Arjun">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Last Name<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity" placeholder="Kumar">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Email Address<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity" placeholder="info@gmail.com">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Telephone<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Address Line1<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity" placeholder="USA">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Address Line2</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">City<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">County</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Country</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity" placeholder="United Stat Kingdom">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Postcode<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputCity">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  -->
                                                        <div class="tab-pane fade active show" id="paymentType" role="tabpanel" aria-labelledby="paymentType-tab" tabindex="0">
                                                            <div class="mb-2 row">
                                                                <div class="col-sm-12">
                                                                    <div class="text-end">
                                                                        <h5>Paying Now: $12000.00</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="newJobForm card">
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Payment Type<span class="radStar">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                            <option>Cash</option>
                                                                            <option>paypal</option>
                                                                            <option>Card</option>
                                                                            <option>Bank</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity" class="col-sm-3 col-form-label">Deposit Date
                                                                        <span class="radStar">*</span></label>
                                                                    <div class="col-sm-5">
                                                                        <input type="text" class="form-control editInput" id="inputCity" value="24/10/2024">
                                                                    </div>
                                                                    <div class="col-sm-1 ps-0">
                                                                        <span class="material-symbols-outlined">
                                                                            calendar_month
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--  -->
                                                    </div>
                                                </div>
                                            </div> <!-- end modal body -->
                                            <div class="modal-footer customer_Form_Popup">
                                                <button type="button" class="btn profileDrop">Next</button>
                                                <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ************************ -->
                                <!-- *********************** -->
                                <div class="modal fade" id="creaditDepositInvoiceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="creaditDepositInvoiceModalModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content add_Customer">
                                            <div class="modal-header">
                                                <h5 class="modal-title fs-5" id="creaditDepositInvoiceModalModalLabel">Creadit Deposit Invoice</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">
                                                <div class="contantbodypopup p-0">
                                                    <div class="newJobForm card">
                                                        <div class="mb-2 row">
                                                            <label for="inputCity" class="col-sm-3 col-form-label">Invoice Date
                                                                <span class="radStar">*</span></label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control editInput" id="inputCity" value="24/10/2024">
                                                            </div>
                                                            <div class="col-sm-1 ps-0">
                                                                <a href="#!">
                                                                    <span class="material-symbols-outlined">
                                                                        calendar_month
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label for="inputCity" class="col-sm-3 col-form-label">Due Date
                                                                <span class="radStar">*</span></label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control editInput" id="inputCity" value="24/10/2024">
                                                            </div>
                                                            <div class="col-sm-1 ps-0">
                                                                <a href="#!">
                                                                    <span class="material-symbols-outlined">
                                                                        calendar_month
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label for="inputName" class="col-sm-3 col-form-label">Line Item</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control editInput" id="inputName" placeholder="Line Item">
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label for="inputCity" class="col-sm-3 col-form-label">Line Description<span class="radStar">*</span></label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control textareaInput rounded-1" name="address" id="description" rows="3" placeholder="Description"></textarea>
                                                            </div>
                                                        </div>


                                                        <div class="mb-2 row">
                                                            <label for="inputCity" class="col-sm-3 col-form-label">Deposit Persontage
                                                                <span class="radStar">*</span></label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control editInput" id="inputCity" value="100">
                                                            </div>
                                                            <div class="col-sm-2 ps-0">
                                                                <input class="form-control editInput text-center" value="% of $.00" disabled="">
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label for="inputCity" class="col-sm-3 col-form-label">Sub Totle <span class="radStar">*</span></label>
                                                            <div class="col-sm-1 pe-0">
                                                                <input class="form-control editInput text-center" value="$" disabled="">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control editInput" id="inputCity" value="0.00">
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label for="inputCity" class="col-sm-3 col-form-label">VAT (%)<span class="radStar">*</span></label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                    <option>-Please Select-</option>
                                                                    <option>Customer-2</option>
                                                                    <option>Customer-3</option>
                                                                    <option>Customer-4</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label for="inputName" class="col-sm-3 col-form-label">Totle (inc. VAT)</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control-plaintext editInput" id="inputName" value="$0.00" readonly="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> <!-- end modal body -->
                                            <div class="modal-footer customer_Form_Popup">
                                                <button type="button" class="btn profileDrop">Save</button>
                                                <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- *********************** -->


                                <!-- <div class="col-sm-3 mb-3 mt-2">
                                    <div class=" p-0">
                                        <a href="#" class="profileDrop">Creadit Deposit</a>
                                        <span class="col-form-label">
                                            or
                                        </span>
                                        <a href="#" class="profileDrop">Creadit Deposit Invoice</a>
                                    </div>
                                </div> -->

                                <div class="col-sm-12">
                                    <h4 class="contTitle text-start mb-2 mt-2">Deposits</h4>
                                    <div class="productDetailTable">
                                        <table class="table" id="containerA">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Deposit Date </th>
                                                    <th>Mode of Payment </th>
                                                    <th>Reference</th>
                                                    <th>Description </th>
                                                    <th>Created On </th>
                                                    <th>Deposit Amount </th>
                                                    <th>Refunded</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7">
                                                        <label class="red_sorryText">
                                                            Sorry, no records to show
                                                        </label>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <h4 class="contTitle text-start mb-2 mt-2 ">Deposit Invoices</h4>
                                    <div class="productDetailTable">
                                        <table class="table" id="containerA">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Invoice Ref </th>
                                                    <th>Invoice </th>
                                                    <th>Due Date</th>
                                                    <th>Sub Total </th>
                                                    <th>VAT </th>
                                                    <th>Total </th>
                                                    <th>Outstanding Created On</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="8">

                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- **************************************End of deposit Details****************************************** -->
                    </div>
                    <!--  -->
                    <div id="hideAttachmentTask">

                        <!-- ************************************* Start Attechments ******************************** -->
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Attachments</label>
                            <div class="row">

                                <div class="col-sm-12 mb-3 mt-2">
                                    <div class=" p-0">
                                        <a href="#" class="profileDrop" id="new_Attachment_open_model">New Attachment</a>
                                        <a href="#" class="profileDrop">Upload Multi Attachment</a>
                                        <a href="#" class="profileDrop">Preview Attachment(s)</a>
                                        <a href="#" class="profileDrop">Download Attachment</a>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <h4 class="contTitle text-start mb-2 mt-2">Deposits</h4>
                                    <div class="productDetailTable">
                                        <table class="table" id="containerA">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Type</th>
                                                    <th>Title </th>
                                                    <th>Description</th>
                                                    <th>Section </th>
                                                    <th>Customer Visible </th>
                                                    <th>Mobile User Visible </th>
                                                    <th>File Name</th>
                                                    <th>Mime Type / Size</th>
                                                    <th>Created On</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7">
                                                        <label class="red_sorryText">
                                                            Sorry, no attachment(s) found
                                                        </label>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- ************************************* End Of Attechment ******************************** -->

                        <!-- ******************************* Start Task ***************************** -->
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Tasks</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="tabheadingTitle pb-3 pt-2">
                                        <a href="#" class="profileDrop me-3"> New Task</a>
                                    </div>
                                    <div class="extraInformationTab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="tab_quoteTask" data-bs-toggle="tab" data-bs-target="#nav-tab_quoteTask" type="button" role="tab"
                                                    aria-controls="nav-Notes" aria-selected="true">Task</button>
                                                <button class="nav-link" id="nav-RecurringTasks-tab" data-bs-toggle="tab" data-bs-target="#nav-RecurringTasks" type="button" role="tab"
                                                    aria-controls="nav-Tasks" aria-selected="false">Recurring Task</button>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-tab_quoteTask" role="tabpanel" aria-labelledby="tab_quoteTask" tabindex="0">
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
                                                </div>
                                                <!-- ENd col-9 -->
                                            </div>
                                            <div class="tab-pane fade" id="nav-RecurringTasks" role="tabpanel" aria-labelledby="nav-RecurringTasks-tab" tabindex="0">

                                                <div class="col-sm-12">

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

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ****************************** End of Task ***************************** -->

                    </div>


                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                            <div class="pageTitleBtn">
                                <!-- <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a> -->
                                <button type="submit" class="profileDrop">Save</button>
                                <a href="#" class="profileDrop"> Action <i class="fa-solid fa-arrow-down"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End col-12 -->
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
                                        <a href="javascript:void(0)" class="formicon" onclick="openRegionModal('customerRegion')" id=""><i class="fa-solid fa-square-plus"></i></a>
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
                                    <input type="hidden" name="customer_id" id="customer_id_site_add">
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
                                        <a href="javascript:void(0)" class="formicon" onclick="openjobTitleModal('siteJobTitle')" id=""><i class="fa-solid fa-square-plus"></i></a>
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
                                        <a href="javascript:void(0)" class="formicon" onclick="openRegionModal('getSiteAddressRegion')" id="OpenCustomerRegionModel"><i class="fa-solid fa-square-plus"></i></a>
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
                                        <label for="inputAddress" class="col-form-label"><span id="setCustomerName">{{ $quoteData['customer']['name'] }}</span> </label>
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
                                        <a href="javascript:void(0)" class="formicon" onclick="openjobTitleModal('customer_job_titile_id')" id="OpenCustomerJobTitleModel"><i class="fa-solid fa-square-plus"></i></a>
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
                                    <input type="hidden" name="customer_id" id="customer_id_site_delivery">
                                    <label for="inputName" class="col-sm-4 col-form-label">Customer </label>
                                    <div class="col-sm-8">
                                        <label for="inputAddress" class="col-form-label"><span id="setSiteDeliveryAddress"></span> </label>
                                        <!-- <input type="hidden" name="customer_id" id="siteCustomerDeliveryId"> -->
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
                                        <a href="javascript:void(0)" class="formicon" onclick="openjobTitleModal('siteDeliveryJobTitle')" id="OpenSiteDeliveryAddressJobTitleModel"><i class="fa-solid fa-square-plus"></i></a>
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

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="new_Attachment_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title pupTitle">ABCD</h5>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close" type="button"></button>
            </div>
            <div class="modal-body">
                <form role="form" id="">

                    <div><span id="error-message" class="error"></span></div>
                    <div class="row form-group">
                        <label class="col-lg-3 col-sm-3 col-form-label">Quote Type <span class="radStar ">*</span></label>
                        <div class="col-md-9">
                            <input type="hidden" name="quote_type_id" id="quote_type_id">
                            <input type="text" name="title" class="form-control editInput " placeholder="Quote Type" id="title">
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <label class="col-lg-3 col-sm-3 col-form-label">Number of days</label>
                        <div class="col-md-9">
                            <input type="text" name="number_of_days" class="form-control editInput " placeholder="Number of days" id="number_of_days" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <label class="col-lg-3 col-sm-3 col-form-label">Status</label>
                        <div class="col-md-9">
                            <select name="status" id="modale_status" class="form-control editInput">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="btn profileDrop" id="">Save</button>
                <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Include the region modal  -->
@include('components.region-model')

@include('components.job-title-model')

@include('components.account-code')

@include('components.product-list')

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

    $(document).ready(function() {

        document.getElementById('hideQuoteDetails').style.display = "none";
        document.getElementById('hideQuoteDiv').style.display = "none";
        document.getElementById('hideDepositSection').style.display = "none";


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
        const setCustomerId = document.getElementById('setCustomerId').value;

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
                    if (user.id == setCustomerId) {
                        option.selected = true; // Mark as selected
                    }

                    get_customer_type.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });


        const edit_customer_billing_id = document.getElementById('edit_customer_billing_id').value;
        if (setCustomerId === edit_customer_billing_id) {
            $.ajax({
                url: '{{ route("customer.ajax.getCustomerBillingAddress") }}',
                method: 'POST',
                data: {
                    id: setCustomerId
                },
                success: function(response) {
                    console.log(response.message);
                    var billingDetailContact = document.getElementById('billingDetailContact');
                    billingDetailContact.innerHTML = '';

                    const optionDefault = document.createElement('option');
                    optionDefault.value = setCustomerId;
                    optionDefault.text = "Default";
                    billingDetailContact.appendChild(optionDefault);

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
        } else {
            setCustomerBillingData(edit_customer_billing_id);
        }


        $('#billingDetailContact').on('change', function() {
            var selected = document.getElementById('getCustomerList').value;
            console.log(selected);
            if ($(this).val() === selected) {
                getBillingDetailsData($(this).val());
            } else {
                setCustomerBillingData($(this).val());
            }
        });



        const edit_site_id = document.getElementById('edit_customer_billing_id').value;
        if (setCustomerId === edit_customer_billing_id) {
            $.ajax({
                url: '{{ route("customer.ajax.getCustomerSiteAddress") }}',
                method: 'POST',
                data: {
                    id: setCustomerId
                },
                success: function(response) {
                    console.log(response.data);

                    const optionDefault = document.createElement('option');
                    optionDefault.value = setCustomerId;
                    optionDefault.text = "Same As Default";
                    billingDetailContact.appendChild(optionDefault);

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


        $('#AddQuoteButton').on('click', function() {
            var customer = document.getElementById('getCustomerList').value;
            if (customer === "") {
                alert('Please select the customer');
            } else {
                // getTags(document.getElementById('quoteTag'))
                // getRegions(document.getElementById('siteDeliveryRegions'));
                const selectCustomer = document.getElementById('getCustomerList');
                const selectedText = selectCustomer.options[selectCustomer.selectedIndex].text;
                document.getElementById('setCustomerNameInCustomerdetails').value = selectedText;
                document.getElementById('yourQuoteSection').style.display = "none";
                document.getElementById('hideQuoteDiv').style.display = "block";
                document.getElementById('hideCustomerDetails').style.display = "none";
                document.getElementById('hideQuoteDetails').style.display = "block";
            }
        });

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
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#OpenAddCustomerContact').on('click', function() {
            getCustomerJobTitle(document.getElementById('customer_job_titile_id'));
            $('#add_customer_contact_modal').modal('show');
        });

        $('#openCustomerSiteAddress').on('click', function() {
            var customer = document.getElementById('getCustomerList').value;
            if (customer === "") {
                alert('Please select the customer');
            } else {
                // getRegions(document.getElementById('getSiteAddressRegion'));
                // getCountriesListWithNameCode(document.getElementById('siteAddressCountry'));
                // getCustomerJobTitle(document.getElementById('siteJobTitle'));
                // getCountriesList(document.getElementById('siteAddressMobileCode'));
                // getCountriesList(document.getElementById('siteAddressTelephoneCode'));
                $('#add_site_address_modal').modal('show');
            }

         

        });

        $('#new_Attachment_open_model').on('click', function() {
                $('#new_Attachment_model').modal('show');
            });


    });

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
                setFieldValues(['billing_add_id', 'siteCustomerId', 'site_delivery_add_id'], response.data[0].id);

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

    function getBillingDetailsData(id) {
        $.ajax({
            url: '{{ route("customer.ajax.getCustomerDetails") }}',
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log("getCustomerDetails", response.data);
                var contactData = response.data[0];
                // billing details data set
                // setFieldValues([], contactData.id);

                setFieldValues(['billing_add_id', 'site_delivery_add_id', 'siteCustomerId', 'customer_id_site_delivery'], contactData.id);
                setFieldValues(['billingDetailsName', 'customerSiteName', 'customerSiteDeliveryName'], contactData.contact_name);
                setTextContent(['setCustomerName', 'setSiteAddress', 'customerSiteCompany', 'customerSiteDeliveryCompany', 'setSiteDeliveryAddress'], contactData.name);
                setFieldValues(['billingDetailsAddress', 'customerSiteAddress', 'customerSiteDeliveryAdd'], contactData.address);
                setFieldValues(['billingDetailsEmail', 'customerSiteDeliveryEmail'], contactData.email);
                setFieldValues(['billingCustomerCity', 'customerSiteCity'], contactData.city);
                setFieldValues(['billingCustomerCounty', 'customerSiteCounty'], contactData.country);
                setFieldValues(['billingCustomerPostcode', 'customerSitePostCode', 'customerSiteDeliveryPostCode'], contactData.postal_code);
                setFieldValues(['billingCustomerTelephone', 'customerSiteTelephone', 'customerSiteDeliveryTelephone'], contactData.telephone);
                setFieldValues(['billingCustomerMobile', 'customerSiteMobile', 'customerSiteDeliveryMobile'], contactData.mobile);
                // customer_contact_id

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
                setFieldValues(['billing_add_id', 'siteCustomerId', 'site_delivery_add_id'], response.data[0].id);

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
                setFieldValues(['billing_add_id', 'siteCustomerId', 'site_delivery_add_id'], response.data[0].id);

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
</script>
<script>
    function upload() {
        var imgcanvas = document.getElementById("canv1");
        var fileinput = document.getElementById("finput");
        var image = new SimpleImage(fileinput);
        image.drawTo(imgcanvas);
    }
</script>