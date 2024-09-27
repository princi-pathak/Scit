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
                    <div class="row">
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
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Customer
                                            <span class="radStar">*</span>
                                        </label>
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
                                <h4 class="contTitle">Billing Details</h4>
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
                                    <label for="inputEmail" class="col-sm-3 col-form-label"> Name <span
                                            class="radStar">*</span></label>
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
                                        <input type="text" class="form-control editInput textareaInput" id="inputCustomer" placeholder="City">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPurchase" class="col-sm-3 col-form-label">County</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" id="inputPurchase" placeholder="County">
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
                                        <!-- <input type="text" class="form-control editInput" id="inputMobile" placeholder="Email Address"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle"> Customer Site Details</h4>
                                
                                    <div class="mb-3 row">
                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Site</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" disabled id="customerSiteDetails">
                                                <option>-Not Assigned-</option>

                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="plusandText">
                                                <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Name </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="customerSiteName" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Company
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="inputCustomer" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress"
                                            class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="customerSiteAddress" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">City </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="inputCustomer" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">County
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="inputPurchase" placeholder="County">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Postcode
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control editInput textareaInput" id="inputPurchase" placeholder="Postcode">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="plusandText">
                                                <a href="#!" class="formicon"><i class="fa-solid fa-magnifying-glass-location"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Telephone
                                        </label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="inputEmail" placeholder="Telephone ">
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
                                            <input type="text" class="form-control editInput" id="inputEmail" placeholder="Telephone ">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Country
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput" name="" id="">
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <!-- <input type="text" class="form-control editInput" id="inputMobile" placeholder="Email Address"> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End  off newJobForm -->

                <div class="newJobForm mt-4">
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
                                            <a href="#" class="profileDrop me-3"> Add Quotes</a>
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
                        <label class="upperlineTitle">Product Details</label>
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
                                <div class="mb-3 row">
                                    <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control editInput" id="inputCountry" placeholder="Type to add product">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control editInput" id="inputCountry" placeholder="Type to add product">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="mb-3 row">
                                    <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control editInput" id="inputCountry" placeholder="Type to add product">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pageTitleBtn p-0">
                                            <a href="#" class="profileDrop">Add Title</a>
                                        </div>
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
                                        <select class="form-control editInput selectOptions get_job_title_result" name="job_title" id="customer_job_titile_id">
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
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="telephone" id="customer_phone">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="mobile" id="customer_mobile">
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
                                            <option value="1">Persontage</option>
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
                                        <input type="text" class="form-control editInput" nmae="pincode" id="customer_pincode">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCountry"
                                        class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" name="country_code" id="customer_country_id">
                                            <option selected disabled>Select Coutry</option>
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
                <!-- <button type="button" class="profileDrop" onclick="save_customerClose()">Save & Close</button> -->
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

<!-- Add Customer Contact Modal Start -->
<div class="modal fade" id="add_customer_contact_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Add Customer Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="add_customer_form" class="add_customer_form">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Customer <span class="red-text">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" class="form-control editInput">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCustomer" class="col-sm-4 col-form-label">Default Billing </label>
                                    <div class="col-sm-8">
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
                                    <label for="inputName" class="col-sm-4 col-form-label">Contact Name <span class="red-text">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="contact_name" id="customer_contact_name">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-4 col-form-label">Job Title (Position)</label>
                                    <div class="col-sm-6">
                                        <select class="form-control editInput selectOptions get_job_title_result" name="job_title" id="customer_job_titile_id">
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
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="telephone" id="customer_phone">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputMobile" class="col-sm-4 col-form-label">Mobile</label>
                                    <div class="col-sm-8">
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
                                        <label for="inputAddress" class="col-form-label">Same as Default <input type="checkbox" name="address_default"></label>
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
                                        <input type="text" class="form-control editInput" name="country" id="customer_country_input">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputPincode" class="col-sm-4 col-form-label">Pincode</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" nmae="pincode" id="customer_pincode">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCountry" class="col-sm-4 col-form-label">Country</label>
                                    <div class="col-sm-8">
                                        <select class="form-control editInput selectOptions" name="country_code" id="customer_country">
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
                <button type="button" class="profileDrop" id="SaveCustomerData">Save</button>
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
                            <input type="text" name="title" class="form-control editInput" id="customer_type_name" value="" placeholder="Customer Job Title">
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
                        <!-- <a href="#" class="profileDrop p-2 crmNewBtn" > Save</a> -->
                        <button type="button" class="profileDrop" id="saveAddCustomerType">Save</button>
                        <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Job Title Modal End -->

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

    function getRegions() {
        $.ajax({
            url: '{{ route("quote.ajax.getRegions") }}',
            success: function(response) {
                console.log(response.message);
                const get_customer_type = document.getElementById('customerRegion');
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
                const get_customer_type = document.getElementById('getCustomerList');
                get_customer_type.innerHTML = '';

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

    function getCountriesListCustomer() {
        $.ajax({
            url: '{{ route("ajax.getCountriesList") }}',
            method: 'GET',
            success: function(response) {
                console.log(response.Data);
                const selectElement = document.getElementById('customer_country');
                selectElement.innerHTML = '';
                response.Data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.code;
                    option.text = "+" + " " + user.code + " - " + " " + user.name;
                    selectElement.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    $(document).ready(function() {

        document.getElementById('hideQuoteDiv').style.display = "none";

        $('#getCustomerList').on('click', function() {
            getCustomerList();
            document.getElementById('customerSiteDetails').removeAttribute('disabled');
            document.getElementById('billingDetailContact').removeAttribute('disabled');

            const billingDetailContact = document.getElementById('billingDetailContact');
            billingDetailContact.innerHTML = '';

            const option = document.createElement('option');
            option.value = "";
            option.text = "Default";
            billingDetailContact.appendChild(option);

            var getCustomerListValue = document.getElementById('getCustomerList');

            $.ajax({
                url: '{{ route("customer.ajax.getCustomerDetails") }}',
                method: 'POST',
                data: {
                    id: getCustomerListValue.value
                },
                success: function(response) {
                    console.log(response.data);
                    document.getElementById('billingDetailsName').value = response.data[0].contact_name;

                    const option2 = document.createElement('option');
                    option2.value = response.data[0].id;
                    option2.text = response.data[0].name;
                    billingDetailContact.appendChild(option2);

                    document.getElementById('billingDetailsAddress').value = response.data[0].address;
                    document.getElementById('billingDetailsEmail').value = response.data[0].email;
                    document.getElementById('customerSiteAddress').value = response.data[0].address;
                    document.getElementById('customerSiteName').value = response.data[0].name;

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

            const customerSiteDetails = document.getElementById('customerSiteDetails');
            customerSiteDetails.innerHTML = '';

            const option3 = document.createElement('option');
            option3.value = "";
            option3.text = "Same as customer";
            customerSiteDetails.appendChild(option3);

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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

        // Ajax Call for saving Customer Type
        $('#saveRegionsData').on('click', function() {
            var formData = $('#add_region_form').serialize();
            $.ajax({
                url: '{{ route("quote.ajax.saveRegion") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#quote_region_modal').modal('hide');
                    getRegions();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

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
        getRegions();
        getCustomerType();
        $('#QuotecustomerPop').modal('show');
    }
    // js for Add Customer modal open


    // js for Add customer Type modal
    const OpenCustomerTypeModel = document.getElementById('OpenCustomerTypeModel');
    const quote_cutomer_type_modal = document.getElementById('quote_cutomer_type_modal');

    OpenCustomerTypeModel.onclick = function() {
        $('#quote_cutomer_type_modal').modal('show');
    }
    // js for Add customer Type modal

    // js for Add Regions modal
    const openRegionsModal = document.getElementById('openRegionsModal');
    const quote_region_modal = document.getElementById('quote_region_modal');

    openRegionsModal.onclick = function() {
        $('#quote_region_modal').modal('show');
    }
    // js for Add Regions modal


    // js for Add Customer Contact modal
    const OpenAddCustomerContact = document.getElementById('OpenAddCustomerContact');
    const add_customer_contact_modal = document.getElementById('add_customer_contact_modal');

    OpenAddCustomerContact.onclick = function() {
        getCountriesListCustomer();
        $('#add_customer_contact_modal').modal('show');
    }
    // js for Add Customer Contact modal

    // js for Add Job Title modal
    const OpenCustomerJobTitleModel = document.getElementById('OpenCustomerJobTitleModel');
    const customer_job_title_modal = document.getElementById('customer_job_title_modal');

    OpenCustomerJobTitleModel.onclick = function() {
        getCountriesListCustomer();
        $('#customer_job_title_modal').modal('show');
    }
    // js for Add Job Title modal
</script>
@include('frontEnd.salesAndFinance.jobs.layout.footer')