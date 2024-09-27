@include('frontEnd.salesAndFinance.jobs.layout.header')
<style>
    .addError {
        border:1px solid red;
    }
</style>
<section class="main_section_page px-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 ">
                        <div class="pageTitle">
                            <h3>New Supplier</h3>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                            <a href="#" class="profileDrop dropdown-toggle"><i class="fa-solid fa-gear"></i> Actions</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="newJobForm">
                            <form action="" class="">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 col-xl-4">
                                        <div class="formDtail">
                                            <h4 class="contTitle mb-3">Supplier Details</h4>
                                          

                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Supplier Name<span class="red-text">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Supplier Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Supplier Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Supplier Code">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Contact Name<span class="red-text">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputName">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Email<span class="red-text">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputName">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="inputTelephone"
                                                    class="col-sm-3 col-form-label">Telephone</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputCustomer">
                                                        <option>+91</option>
                                                        <option>+322</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputTelephone" placeholder="Site Telephone">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputCustomer">
                                                        <option>+91</option>
                                                        <option>+322</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control editInput" id="inputMobile"
                                                        value="Mobile No.">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCity" class="col-sm-3 col-form-label">Fix</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputCity" placeholder="Fix">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCity" class="col-sm-3 col-form-label">Website</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputCity" placeholder="https://">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCounty" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputCounty"
                                                        value="County">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4">
                                        <div class="formDtail">
                                            <h4 class="contTitle mb-3">Address Details</h4>
                                         
                                            <div class="mb-3 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" name="address"
                                                        id="inputAddress" rows="8"
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
                                                <label for="inputCounty"
                                                    class="col-sm-3 col-form-label">County</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputCounty" placeholder="Site County">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPincode"
                                                    class="col-sm-3 col-form-label">Postcode</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputPincode" value="6001">
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputPincode"
                                                    class="col-sm-3 col-form-label">Country</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputPincode">
                                                </div>
                                            </div>                                       
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4">
                                        <div class="formDtail">
                                            <h4 class="contTitle mb-3">Other Details</h4>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputJobType" class="col-sm-3 col-form-label">Currency</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>British Pound</option>
                                                        <option>Australian Dollar</option>
                                                        <option>USD</option>
                                                        <option>US Dollar</option>
                                                        <option>US Dollar</option>
                                                        <option>Australian Dollar</option>
                                                        <option>Australian Dollar</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Credit Limit</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                        id="inputCustomer" placeholder="Customer Ref if any">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">VAT / Tax No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                        id="inputCustomer" placeholder="Customer Job if any">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPurchase" class="col-sm-3 col-form-label">Account Ref</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                        id="inputPurchase" placeholder="Purchase Order Ref if any">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="inputJobType"
                                                    class="col-sm-3 col-form-label">Purchase Terms</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control-plaintext editInput" id="inputJobRef" value="days" readonly="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCountry"
                                                    class="col-sm-3 col-form-label">Notes</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" name="address"
                                                        id="inputAddress" rows="8" placeholder="75 Cope Road Mall Park USA"></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- End  off newJobForm -->

                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Supplier Contacts</label>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="jobsection my-2">
                                        <a href="#" class="profileDrop">Add Contact</a>
                                        <a href="#" class="profileDrop">Import</a>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="productDetailTable">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Contact Name </th>
                                                    <th>Email</th>
                                                    <th>Telephone</th>
                                                    <th>Mobile </th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>County</th>
                                                    <th>Postcode</th>
                                                    <th>Billing</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="10">
                                                        <label class="red_sorryText">
                                                            Sorry, no records to show
                                                        </label>
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

                <div class="row">                    
                    <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
</section>
    @include('frontEnd.salesAndFinance.jobs.layout.footer')