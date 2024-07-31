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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="newJobForm">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="formDtail">
                                        <h4 class="contTitle">Customer Details</h4>
                                        <form action="" class="customerForm">
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Customer
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        value="John Smith">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputProject" class="col-sm-3 col-form-label">Region</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputCustomer">
                                                        <option>None</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="#!" class="formicon" id="openPopupButton"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>


                                                <!--Start Region Popup -->

                                                <!-- <div id="popup" class="popup">
                                                    <div class="popup-content">
                                                        <div class="popupTitle">
                                                            <span class="">Add Region</span>
                                                            <span class="close" id="closePopup">&times;</span>
                                                        </div>
                                                        <div class="contantbodypopup">
                                                            <form action="" class="customerForm">
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity"
                                                                        class="col-sm-3 col-form-label">Region*</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text"
                                                                            class="form-control editInput"
                                                                            id="inputCity" value="Port Elizabeth">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputCity"
                                                                        class="col-sm-3 col-form-label">Status</label>
                                                                    <div class="col-sm-9">
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
                                                        <div class="popupF  customer_Form_Popup">
                                                            <button type="button" class="profileDrop">Save</button>
                                                            <button type="button" class="profileDrop">Save
                                                                & Close</button>
                                                            <button type="button" class="profileDrop"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <!-- End off region Popup -->

                                            </div>

                                            <!-- End off Customer -->

                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Conatact
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        value="John Smith">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputProject" class="col-sm-3 col-form-label">Job Title
                                                    (Position)</label>
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
                                                <label for="inputName" class="col-sm-3 col-form-label">Fax*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        value="John Smith">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Website</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputCity"
                                                        value="Port Elizabeth">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="inputCounty" class="col-sm-3 col-form-label">Default
                                                    Catalogue</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputCustomer" disabled>
                                                        <option>None</option>
                                                        <option>Site-2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPincode" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputCustomer" disabled>
                                                        <option>Active</option>
                                                        <option>Site-2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="formDtail">
                                        <h4 class="contTitle">Address Details</h4>
                                        <form action="" class="customerForm">

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
                                                <label for="inputAddress" class="col-sm-3 col-form-label">Site
                                                    Notes</label>
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
                                        <h4 class="contTitle">Other Details</h4>
                                        <form action="" class="customerForm">
                                            <div class="mb-3 row">
                                                <label for="inputJobType"
                                                    class="col-sm-3 col-form-label">Currency</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>British Pound - GBP</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Credit
                                                    Limit</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                        id="inputCustomer" placeholder="Customer Ref if any">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer"
                                                    class="col-sm-3 col-form-label">Discount</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                        id="inputCustomer" placeholder="Customer Job if any">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputJobType" class="col-sm-3 col-form-label">Discount
                                                    Type</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>Percentage</option>
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPurchase" class="col-sm-3 col-form-label">Sage
                                                    Ref.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                        id="inputPurchase" placeholder="Sage Ref.">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputJobType" class="col-sm-3 col-form-label">Company
                                                    Reg</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                        id="inputPurchase" placeholder="Company Reg">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPriority" class="col-sm-3 col-form-label">VAT / Tax
                                                    No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                        id="inputPurchase" placeholder="">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Payment Terms</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputPriority">
                                                        <option>Default</option>
                                                        <option>None</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-check-label checkboxtext" for="checkalrt">
                                                        days</label>
                                                </div>

                                            </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label class="col-sm-3 col-form-label">Assigned Products</label>
                                        <div class="col-sm-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio1" value="option1" checked>
                                                <label class="form-check-label checkboxtext"
                                                    for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="inlineRadio2" value="option2">
                                                <label class="form-check-label checkboxtext"
                                                    for="inlineRadio2">No</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputTelephone" class="col-sm-3 col-form-label">Start
                                            Date*</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address"
                                                id="inputAddress" rows="3" placeholder="Site Notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Dflt Products
                                            Tax</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="inputPriority">
                                                <option>Please Select</option>
                                                <option>None</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputCountry" class="col-sm-3 col-form-label">Dflt Services
                                            Tax</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="inputPriority">
                                                <option>Please Select</option>
                                                <option>None</option>
                                            </select>
                                        </div>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        

                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Customer Message</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="inputCountry" class="col-sm-2 col-form-label">Show Message</label>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="inlinecheckOptions"
                                                    id="checkalrt" value="option1">
                                                <label class="form-check-label checkboxtext" for="checkalrt">Yes, show the
                                                    message</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-md-2 col-form-label">Message</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control textareaInput" name="address" id="inputAddress"
                                                rows="3" placeholder="Site Notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-md-2 col-form-label">Section</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="" id="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End  off newJobForm -->
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Additional Contacts</label>
                            <div class="row">
                                <div class="col-sm-12 mb-3 mt-2">
                                    <div class="jobsection">
                                        <a href="#" class="profileDrop">Add Contact</a>
                                        <a href="#" class="profileDrop">Export</a>
                                        <a href="#" class="profileDrop">Import</a>
                                        <label class="col-form-label"><a href="#!">Click here </a>to download import template</label>
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
                                        <label class="col-form-label"><a href="#!">Click here </a>to download import template</label>
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
                                <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                                <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
        
                            </div>
                        </div>
                
                </div>
            </div>

            
    </div>
    </section>
    @include('frontEnd.jobs.layout.footer')