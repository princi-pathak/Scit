@include('frontEnd.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>New Jobs</h3>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <div class="pageTitleBtn">
                    <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                    <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="newJobForm">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Customer Details</h4>
                                <form action="" class="customerForm">
                                    <div class="mb-3 row">
                                        <label for="inputCustomer"
                                            class="col-sm-3 col-form-label">Customer*</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions"
                                                id="inputCustomer">
                                                <option>Customer-1</option>
                                                <option>Customer-2</option>
                                                <option>Customer-3</option>
                                                <option>Customer-4</option>
                                            </select>
                                            <!-- <input type="text"  id="staticEmail"> -->
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="#!" class="formicon" data-bs-toggle="modal"
                                                data-bs-target="#customerPop"><i
                                                    class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-clock"></i></a>
                                        </div>

                                        <!-- start Customer popup-->
                                        <div class="modal fade" id="customerPop" tabindex="-1"
                                            aria-labelledby="customerModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content add_Customer">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="customerModalLabel">Add
                                                            Customer</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                                <div class="formDtail">
                                                                    <form action="" class="customerForm">
                                                                        <div class="mb-2 row">
                                                                            <label for="inputName"
                                                                                class="col-sm-3 col-form-label">Customer
                                                                                Name*</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputName"
                                                                                    value="John Smith">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row">
                                                                            <label for="inputCustomer"
                                                                                class="col-sm-3 col-form-label">Customer
                                                                                Type*</label>
                                                                            <div class="col-sm-7">
                                                                                <select
                                                                                    class="form-control editInput selectOptions"
                                                                                    id="inputCustomer">
                                                                                    <option>Genrale Customer
                                                                                    </option>
                                                                                    <option>Analytical Customer
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-1">
                                                                                <a href="#!" class="formicon"><i
                                                                                        class="fa-solid fa-square-plus"></i></a>
                                                                            </div>
                                                                        </div><!-- End off Customer -->

                                                                        <div class="mb-2 row">
                                                                            <label for="inputName"
                                                                                class="col-sm-3 col-form-label">Conatact
                                                                                Name*</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputName"
                                                                                    value="John Smith">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputProject"
                                                                                class="col-sm-3 col-form-label">Job
                                                                                Title (Position)</label>
                                                                            <div class="col-sm-4">
                                                                                <select
                                                                                    class="form-control editInput selectOptions"
                                                                                    id="inputCustomer">
                                                                                    <option>Please Select
                                                                                    </option>
                                                                                    <option>Supervisor</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <a href="#!" class="formicon"><i
                                                                                        class="fa-solid fa-square-plus"></i></a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputEmail"
                                                                                class="col-sm-3 col-form-label">Email</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputEmail"
                                                                                    value="roxy.scits@gmail.com">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputTelephone"
                                                                                class="col-sm-3 col-form-label">Telephone</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputTelephone"
                                                                                    value="14000883788">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputMobile"
                                                                                class="col-sm-3 col-form-label">Mobile</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputMobile"
                                                                                    value="Type No.">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputAddress"
                                                                                class="col-sm-3 col-form-label">Fax</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputCity" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row">
                                                                            <label for="inputCity"
                                                                                class="col-sm-3 col-form-label">Website</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputCity"
                                                                                    value="Port Elizabeth">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputProject"
                                                                                class="col-sm-3 col-form-label">Payment
                                                                                Terms</label>
                                                                            <div class="col-sm-7">
                                                                                <select
                                                                                    class="form-control editInput selectOptions"
                                                                                    id="inputCustomer">
                                                                                    <option>Defoult (21)
                                                                                    </option>
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
                                                                                <span class="afterInputText">
                                                                                    Days
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputProject"
                                                                                class="col-sm-3 col-form-label">Currency</label>
                                                                            <div class="col-sm-9">
                                                                                <select
                                                                                    class="form-control editInput selectOptions"
                                                                                    id="inputCustomer">
                                                                                    <option>British Pound - GBP
                                                                                    </option>
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
                                                                            <label for="inputCounty"
                                                                                class="col-sm-3 col-form-label">Credit
                                                                                Limit</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputCounty"
                                                                                    value="$: 0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row">
                                                                            <label for="inputPincode"
                                                                                class="col-sm-3 col-form-label">Discount</label>
                                                                            <div class="col-sm-4">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputPincode"
                                                                                    value="6001">
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <select
                                                                                    class="form-control editInput selectOptions"
                                                                                    id="inputCustomer">
                                                                                    <option>Persontage</option>
                                                                                    <option>Flat</option>
                                                                                    <option>1</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row">
                                                                            <label for="inputCountry"
                                                                                class="col-sm-3 col-form-label">VAT
                                                                                / Tax No.</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputCountry" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row">
                                                                            <label for="inputProject"
                                                                                class="col-sm-3 col-form-label">Default
                                                                                Catalogue</label>
                                                                            <div class="col-sm-9">
                                                                                <select
                                                                                    class="form-control editInput selectOptions"
                                                                                    id="inputCustomer">
                                                                                    <option>None</option>
                                                                                    <option>ABCD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row">
                                                                            <label for="inputProject"
                                                                                class="col-sm-3 col-form-label">Status</label>
                                                                            <div class="col-sm-9">
                                                                                <select
                                                                                    class="form-control editInput selectOptions"
                                                                                    id="inputCustomer">
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
                                                                            <label for="inputProject"
                                                                                class="col-sm-3 col-form-label">Region</label>
                                                                            <div class="col-sm-7">
                                                                                <select
                                                                                    class="form-control editInput selectOptions"
                                                                                    id="inputCustomer">
                                                                                    <option>None</option>
                                                                                    <option>Default</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <a href="#!" class="formicon"
                                                                                    id="openPopupButton"><i
                                                                                        class="fa-solid fa-square-plus"></i></a>
                                                                            </div>


                                                                            <!--Start Region Popup -->

                                                                            <div id="popup" class="popup">
                                                                                <div class="popup-content">
                                                                                    <div class="popupTitle">
                                                                                        <span class="">Add
                                                                                            Region</span>
                                                                                        <span class="close"
                                                                                            id="closePopup">&times;</span>
                                                                                    </div>
                                                                                    <div
                                                                                        class="contantbodypopup">
                                                                                        <form action=""
                                                                                            class="customerForm">
                                                                                            <div class="mb-2 row">
                                                                                                <label for="inputCity" class="col-sm-3 col-form-label">Region*</label>
                                                                                                <div class="col-sm-9">
                                                                                                    <input type="text" class="form-control editInput" id="inputCity" value="Port Elizabeth">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="mb-2 row">
                                                                                                <label for="inputCity" class="col-sm-3 col-form-label">Status</label>
                                                                                                <div class="col-sm-9">
                                                                                                    <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                                        <option> None </option>
                                                                                                        <option> Default </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>

                                                                                    <div class="popupF  customer_Form_Popup">

                                                                                        <button type="button" class="profileDrop">Save</button>
                                                                                        <button type="button" class="profileDrop">Save & Close</button>
                                                                                        <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>

                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <!-- End off region Popup -->



                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputAddress"
                                                                                class="col-sm-3 col-form-label">Address</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea
                                                                                    class="form-control textareaInput"
                                                                                    name="address"
                                                                                    id="inputAddress" rows="3"
                                                                                    placeholder="75 Cope Road Mall Park USA"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputCity"
                                                                                class="col-sm-3 col-form-label">City</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputCity"
                                                                                    value="Port Elizabeth">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row">
                                                                            <label for="inputCounty"
                                                                                class="col-sm-3 col-form-label">County</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputCounty"
                                                                                    placeholder="Site County">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row">
                                                                            <label for="inputPincode"
                                                                                class="col-sm-3 col-form-label">Pincode</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputPincode"
                                                                                    value="6001">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputCountry"
                                                                                class="col-sm-3 col-form-label">Country</label>
                                                                            <div class="col-sm-9">
                                                                                <select
                                                                                    class="form-control editInput selectOptions"
                                                                                    id="inputCustomer">
                                                                                    <option>United kingdom (+44)
                                                                                    </option>
                                                                                    <option>United kingdom (+44)
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputAddress"
                                                                                class="col-sm-3 col-form-label">Site
                                                                                Notes</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea
                                                                                    class="form-control textareaInput"
                                                                                    name="address"
                                                                                    id="inputAddress" rows="3"
                                                                                    placeholder="Site Notes"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2 row">
                                                                            <label for="inputName"
                                                                                class="col-sm-3 col-form-label">Sage
                                                                                Ref.</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"
                                                                                    class="form-control editInput"
                                                                                    id="inputName" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row">
                                                                            <label
                                                                                class="col-sm-3 col-form-label">Assign
                                                                                Products</label>
                                                                            <div class="col-sm-9">

                                                                                <div
                                                                                    class="form-check form-check-inline">
                                                                                    <input
                                                                                        class="form-check-input"
                                                                                        type="radio"
                                                                                        name="inlineRadioOptions"
                                                                                        id="inlineRadio1"
                                                                                        value="option1" checked>
                                                                                    <label
                                                                                        class="form-check-label checkboxtext"
                                                                                        for="inlineRadio1">Yes</label>
                                                                                </div>
                                                                                <div
                                                                                    class="form-check form-check-inline">
                                                                                    <input
                                                                                        class="form-check-input"
                                                                                        type="radio"
                                                                                        name="inlineRadioOptions"
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


                                    </div><!-- End off Customer -->
                                    <div class="mb-3 row">
                                        <label for="inputProject"
                                            class="col-sm-3 col-form-label">Project</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions"
                                                id="inputCustomer" disabled>
                                                <option>None</option>
                                                <option>Default</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i
                                                    class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputContact"
                                            class="col-sm-3 col-form-label">Contact</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions"
                                                id="inputCustomer" disabled>
                                                <option>Default</option>
                                                <option>None</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i
                                                    class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Name*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputName"
                                                value="John Smith">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputEmail"
                                                value="roxy.scits@gmail.com">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputTelephone"
                                            class="col-sm-3 col-form-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput"
                                                id="inputTelephone" value="14000883788">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputMobile"
                                                value="Mobile No.">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress"
                                            class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address"
                                                id="inputAddress" rows="3"
                                                placeholder="75 Cope Road Mall Park USA"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputCity"
                                                value="Port Elizabeth">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputCounty"
                                                value="County">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPincode"
                                            class="col-sm-3 col-form-label">Pincode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputPincode"
                                                value="6001">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCountry"
                                            class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputCountry"
                                                value="South Africa">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Site Details</h4>
                                <form action="" class="customerForm">
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Site</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions"
                                                id="inputCustomer" disabled>
                                                <option>None</option>
                                                <option>Site-2</option>
                                            </select>
                                            <!-- <input type="text"  id="staticEmail"> -->
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="#!" class="formicon"><i
                                                    class="fa-solid fa-square-plus"></i></a>
                                        </div>



                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions"
                                                id="inputCustomer">
                                                <option>None</option>
                                                <option>Default</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i
                                                    class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputContact"
                                            class="col-sm-3 col-form-label">Company</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions"
                                                id="inputCustomer">
                                                <option>Company-8</option>
                                                <option>Company-7</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Contact</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control-plaintext editInput"
                                                id="inputName" value="Lisa (Manager)" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Contact
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputName"
                                                value="Lisa">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputEmail"
                                                placeholder="Site Email">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputTelephone"
                                            class="col-sm-3 col-form-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput"
                                                id="inputTelephone" placeholder="Site Telephone">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputMobile"
                                                value="Mobile No.">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress"
                                            class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address"
                                                id="inputAddress" rows="3"
                                                placeholder="75 Cope Road Mall Park USA"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputCity"
                                                value="Port Elizabeth">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputCounty"
                                                placeholder="Site County">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPincode"
                                            class="col-sm-3 col-form-label">Pincode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputPincode"
                                                value="6001">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCountry"
                                            class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputCountry"
                                                value="South Africa">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Notes</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address"
                                                id="inputAddress" rows="3" placeholder="Site Notes"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Jobs Details</h4>
                                <form action="" class="customerForm">
                                    <div class="mb-3 row">
                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Job Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control-plaintext editInput"
                                                id="inputJobRef" value="Auto generate" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Customer
                                            Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput"
                                                id="inputCustomer" placeholder="Customer Ref if any">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Customer Job
                                            Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput"
                                                id="inputCustomer" placeholder="Customer Job if any">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Purch. Order
                                            Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput"
                                                id="inputPurchase" placeholder="Purchase Order Ref if any">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputJobType" class="col-sm-3 col-form-label">Job
                                            Type*</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions"
                                                id="inputJobType">
                                                <option>New Job</option>
                                                <option>Default</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i
                                                    class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPriority"
                                            class="col-sm-3 col-form-label">Priority</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions"
                                                id="inputPriority">
                                                <option>Medium</option>
                                                <option>None</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-sm-3 col-form-label">Alert Customer</label>
                                        <div class="col-sm-9">

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name="inlinecheckOptions" id="checkalrt" value="option1">
                                                <label class="form-check-label checkboxtext" for="checkalrt">By
                                                    Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">On Rout SMS Alert</label>
                                        <div class="col-sm-9">

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="inlineRadioOptions" id="inlineRadio1" value="option1"
                                                    checked>
                                                <label class="form-check-label checkboxtext"
                                                    for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <label class="form-check-label checkboxtext"
                                                    for="inlineRadio2">No</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputTelephone" class="col-sm-3 col-form-label">Start
                                            Date*</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control editInput"
                                                id="inputTelephone" value="14000883788">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Complete
                                            By</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control editInput" id="inputMobile"
                                                value="Mobile No.">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputCountry" class="col-sm-3 col-form-label">Tags</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="inputCountry"
                                                placeholder="Tags">
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i
                                                    class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="formDiscription">
                                <form class="" action="">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="col-form-label">Short
                                            Description* <span>(max 250 charecters)</span></label>
                                        <textarea class="form-control textareaInput" name="address"
                                            id="inputAddress" rows="2" placeholder="Site Notes"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="col-form-label">Description /
                                            Instructions</span></label>
                                        <textarea cols="40" rows="5" id="textarea1">
                                                    Arjun Kumar UI/UX Designer and Developer
                                                  </textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div> <!-- End  off newJobForm -->

                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Product Details</label>
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
                                        <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i>
                                        </a>
                                        <span class="afterPlusText"> (Type to view product or <a href="#!">Click
                                                here</a> to view all assets)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="pageTitleBtn p-0">
                                <a href="#" class="profileDrop">Add Title</a>
                                <a href="#" class="profileDrop">Show Variations</a>
                                <a href="#" class="profileDrop bg-secondary">Export</a>

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
                                            <td>R0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- End  off newJobForm -->

                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Asset Details</label>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="mb-3 row">
                                <label for="inputCountry" class="col-sm-2 col-form-label">Select Asset</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control editInput" id="inputCountry"
                                        placeholder="Type to add Asset">
                                </div>
                                <div class="col-sm-7">
                                    <div class="plusandText">
                                        <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i>
                                        </a>
                                        <span class="afterPlusText"> (Type to view Asset or <a href="#!">Click
                                                here</a> to view all assets)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-3">
                                   <div class="pageTitleBtn p-0">
                                       <a href="#" class="profileDrop">Add Title</a>
                                       <a href="#" class="profileDrop">Show Variations</a>
                                       <a href="#" class="profileDrop bg-secondary">Export</a>

                                   </div>
                               </div> -->

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
                <!-- <div class="preinstallInspection">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="preInstall">
                                        <div class="rental-manager-progress-bar-container">
                                            <span class="circlemainBx">
                                                <div class="active">1</div>
                                                <p class="intalTaxt">Pre install Inspection</p>
                                            </span>
                                            <span class="circlemainBx">
                                                <div class="active">2</div>
                                                <p class="intalTaxt">install</p>
                                            </span>
                                            <span class="circlemainBx">
                                                <div class="active">3</div>
                                                <p class="intalTaxt">Post install Inspection</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5"></div>
                            </div>
                       </div> -->

                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Appoinments</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="jobsection">
                                <a href="#" class="profileDrop">Smart Planning</a>
                                <a href="#" class="profileDrop">New User Appoinment</a>
                                <a href="#" class="profileDrop">Send To Planner</a>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="productDetailTable pt-3">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>User </th>
                                            <th>Appoinment Type </th>
                                            <th>Date / Time</th>
                                            <th>User Notes </th>
                                            <th>Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <p class="leftNum">1</p>
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
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
                                            <td class="col-2">
                                                <div class="appoinment_type">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>Select user</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                                <div class="Priority">
                                                    <label>Priority :</label>
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>Select user</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="addDateAndTime">
                                                    <div class="startDate">
                                                        <input type="date" name="date" class=" editInput">
                                                        <input type="time" name="time" class=" editInput">
                                                    </div>
                                                    <span class="p-2">To</span>
                                                    <div class="endDate">
                                                        <input type="date" name="date" class=" editInput">
                                                        <input type="time" name="time" class=" editInput">
                                                    </div>
                                                </div>
                                                <div class="pt-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="singleAppointment" value="option1">
                                                        <label class="form-check-label" for="singleAppointment">Single Appointment</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="floatingAppointment" value="option2">
                                                        <label class="form-check-label" for="floatingAppointment">Floating Appointment</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="addTextarea">
                                                    <textarea cols="40" rows="5">
                                                                njgjkd
                                                            </textarea>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="statuswating">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>Select user</option>
                                                        <option>Default</option>
                                                    </select>
                                                    <a href="#!"><i class="fa-solid fa-circle-xmark"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="Priority">
                                                    <label><strong>Travel Time -</strong></label>
                                                    <input type="text" class="form-control editInput" id="inputCountry"
                                                        placeholder="12345"><label> Mins</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="Priority">
                                                    <label><strong>Appointment Time -</strong></label>
                                                    <input type="text" class="form-control editInput" id="inputCountry"
                                                        placeholder="12345"><label> Mins <strong>Total Time -</strong> 0h 0mins</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="Priority p-0">
                                                    <label class="p-0"><strong>Assigned Products: </strong><a href="#!">All</a> None</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pageTitleBtn p-0">
                                                    <a href="#" class="profileDrop">Asign Product</a>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td colspan="2">
                                                <div class="pageTitleBtn p-0">
                                                    <a href="#" class="profileDrop">Add Title</a>
                                                    <a href="#" class="profileDrop">Show Variations</a>
                                                    <a href="#" class="profileDrop bg-secondary">Export</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="padingtableBottom"></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <p class="leftNum">1</p>
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
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
                                            <td class="col-2">
                                                <div class="appoinment_type">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>Select user</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                                <div class="Priority">
                                                    <label>Priority :</label>
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>Select user</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="addDateAndTime">
                                                    <div class="startDate">
                                                        <input type="date" name="date" class=" editInput">
                                                        <input type="time" name="time" class=" editInput">
                                                    </div>
                                                    <span class="p-2">To</span>
                                                    <div class="endDate">
                                                        <input type="date" name="date" class=" editInput">
                                                        <input type="time" name="time" class=" editInput">
                                                    </div>
                                                </div>
                                                <div class="pt-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="singleAppointment" value="option1">
                                                        <label class="form-check-label" for="singleAppointment">Single Appointment</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="floatingAppointment" value="option2">
                                                        <label class="form-check-label" for="floatingAppointment">Floating Appointment</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="addTextarea">
                                                    <textarea cols="40" rows="5">
                                                                njgjkd
                                                            </textarea>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="statuswating">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>Select user</option>
                                                        <option>Default</option>
                                                    </select>
                                                    <a href="#!"><i class="fa-solid fa-circle-xmark"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="Priority">
                                                    <label><strong>Travel Time -</strong></label>
                                                    <input type="text" class="form-control editInput" id="inputCountry"
                                                        placeholder="12345"><label> Mins</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="Priority">
                                                    <label><strong>Appointment Time -</strong></label>
                                                    <input type="text" class="form-control editInput" id="inputCountry"
                                                        placeholder="12345"><label> Mins <strong>Total Time -</strong> 0h 0mins</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="Priority p-0">
                                                    <label class="p-0"><strong>Assigned Products: </strong><a href="#!">All</a> None</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pageTitleBtn p-0">
                                                    <a href="#" class="profileDrop">Asign Product</a>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td colspan="2">
                                                <div class="pageTitleBtn p-0">
                                                    <a href="#" class="profileDrop">Add Title</a>
                                                    <a href="#" class="profileDrop">Show Variations</a>
                                                    <a href="#" class="profileDrop bg-secondary">Export</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="padingtableBottom"></td>
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
                        <div class="col-sm-6">
                            <div class="">
                                <h4 class="contTitle text-start">Customer Notes</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="textarea2">
                                                Arjun Kumar UI/UX Designer and Developer
                                              </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="">
                                <h4 class="contTitle text-start">Internal Notes</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="textarea3">
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
                                    <a href="#" class="profileDrop">Upload Attachments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End  off newJobForm -->

            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>New Jobs</h3>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <div class="pageTitleBtn">
                    <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                    <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>

                </div>
            </div>
        </div>
    </div>
</section>



@include('frontEnd.jobs.layout.footer')