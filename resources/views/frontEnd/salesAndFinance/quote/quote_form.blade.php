@include('frontEnd.jobs.layout.header')

<section class="main_section_page px-3 pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>New Quote</h3>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <div class="pageTitleBtn">
                    <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                    <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <a href="#" class="profileDrop"> Action <i class="fa-solid fa-arrow-down"></i></a>
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
                                <form action="" class="customerForm">

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
                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                <option>-Not Assigned-</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{ $customer->id}}">{{ $customer->contact_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="plusandText">
                                                <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control-plaintext editInput" id="inputName" value="Auto generate" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Billing Details</h4>
                                <form action="" class="customerForm">
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Contact </label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                <option>-Not Assigned-</option>
                                                <option>Customer-2</option>
                                                <option>Customer-3</option>
                                                <option>Customer-4</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="plusandText">
                                                <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label"> Name <span
                                                class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputEmail" placeholder="Company Name">
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Address <span
                                                class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">City </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput"
                                                id="inputCustomer" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">County
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput"
                                                id="inputPurchase" placeholder="County">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Postcode
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control editInput textareaInput"
                                                id="inputPurchase" placeholder="Postcode">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="plusandText">
                                                <a href="#!" class="formicon"><i
                                                        class="fa-solid fa-magnifying-glass-location"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Telephone
                                        </label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions"
                                                id="inputCustomer">
                                                <option>+91</option>
                                                <option>+441</option>
                                                <option>+735</option>
                                                <option>+7235</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="inputEmail"
                                                placeholder="Telephone ">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions"
                                                id="inputCustomer">
                                                <option>+91</option>
                                                <option>+441</option>
                                                <option>+735</option>
                                                <option>+7235</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="inputEmail"
                                                placeholder="Telephone ">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Email Address
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputMobile"
                                                placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Country
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputMobile"
                                                placeholder="Email Address">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle"> Customer Site Details</h4>
                                <form action="" class="customerForm">
                                    <div class="mb-3 row">
                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Site</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                <option>-Not Assigned-</option>
                                                <option>Customer-2</option>
                                                <option>Customer-3</option>
                                                <option>Customer-4</option>
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
                                            <input type="text" class="form-control editInput textareaInput" id="inputCustomer" placeholder="City">
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
                                            <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3" placeholder="Address"></textarea>
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
                                                <option>+91</option>
                                                <option>+441</option>
                                                <option>+735</option>
                                                <option>+7235</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="inputEmail"
                                                placeholder="Telephone ">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions"
                                                id="inputCustomer">
                                                <option>+91</option>
                                                <option>+441</option>
                                                <option>+735</option>
                                                <option>+7235</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="inputEmail"
                                                placeholder="Telephone ">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Country
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputMobile"
                                                placeholder="Email Address">
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
                                        <button class="nav-link active" id="nav-Notes-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-Notes" type="button" role="tab"
                                            aria-controls="nav-Notes" aria-selected="true">Quotes</button>
                                        <button class="nav-link" id="nav-Tasks-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-Tasks" type="button" role="tab"
                                            aria-controls="nav-Tasks" aria-selected="false">Sales Appointments</button>

                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-Notes" role="tabpanel"
                                        aria-labelledby="nav-Notes-tab" tabindex="0">
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
                                    <div class="tab-pane fade" id="nav-Tasks" role="tabpanel"
                                        aria-labelledby="nav-Tasks-tab" tabindex="0">
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
                                                                    <textarea cols="40" rows="5" placeholder="Type Notes...">Type Notes...
                                                                            </textarea>
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

                <div id="hiddenDiv">

                    <div class="newJobForm mt-4">
                    </div>
                    <label class="upperlineTitle">Attachments</label>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="jobsection mt-2">
                                <a href="#" class="profileDrop">New Attachment</a>
                                <a href="#" class="profileDrop">Upload Multi Attachment </a>
                                <a href="#" class="profileDrop">Preview Attachment(s) </a>
                                <a href="#" class="profileDrop">Download Attachment(s) </a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="productDetailTable pt-3">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Rule Numb. </th>
                                            <th> No. of Repetitions</th>
                                            <th> Completion By</th>
                                            <th> Quote Frequency </th>
                                            <th> Next Run </th>
                                            <th> Last Run</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6">
                                                <label class="red_sorryText">
                                                    Sorry, no records to show
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
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
                    <div class="newJobForm mt-4">
                        <label class="upperlineTitle">Tasks</label>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="jobsection mt-2">
                                    <a href="#" class="profileDrop">New Task</a>
                                </div>
                                <div class="jobsection mt-2">
                                    <a href="#" class="profileDrop">Tasks</a>
                                    <a href="#" class="profileDrop">Recurring Tasks</a>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="productDetailTable pt-3">
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Rule Numb. </th>
                                                <th> No. of Repetitions</th>
                                                <th> Completion By</th>
                                                <th> Quote Frequency </th>
                                                <th> Next Run </th>
                                                <th> Last Run</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="6">
                                                    <label class="red_sorryText">
                                                        Sorry, no records to show
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
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
                    </div>
                </div>




            </div> <!-- End col-12 -->
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="pageTitleBtn">
                    <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                    <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <a href="#" class="profileDrop"> Action <i class="fa-solid fa-arrow-down"></i></a>
                </div>
            </div>
        </div>
        <!--  -->

    </div>
</section>
<script type="text/javascript" src="{{ url('public/js/salesFinance/customeQuoteForm.js') }}"></script>
@include('frontEnd.jobs.layout.footer')