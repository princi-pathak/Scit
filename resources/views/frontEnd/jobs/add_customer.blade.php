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
                            <form action="#">
                                <div class="page slide-page">
                                <div class="title">Customer Details</div>
                                    <div class="mb-2 row field">
                                        <label for="inputName" class="col-sm-3 col-form-label">Customer
                                            Name*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row field">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" required>
                                                <option>None</option>
                                                <option>Default</option>
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
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Job Title
                                            (Position)</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" id="inputCustomer" disabled="">
                                                <option>None</option>
                                                <option>Default</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row field">
                                        <label for="inputName" class="col-sm-3 col-form-label">Fax*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row field">
                                        <label for="inputCounty" class="col-sm-3 col-form-label">Default
                                            Catalogue</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="inputCustomer" disabled="" required>
                                                <option>None</option>
                                                <option>Site-2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPincode" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="inputCustomer" disabled="" required>
                                                <option>Active</option>
                                                <option>Site-2</option>
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
                                            <select class="form-control editInput selectOptions" required>
                                                <option>None</option>
                                                <option>Default</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPincode" class="col-sm-3 col-form-label">Pincode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Site
                                            Notes</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" required></textarea>
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
                                            <select class="form-control editInput selectOptions" required>
                                                <option>British Pound - GBP</option>
                                                <option>Default</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Credit
                                            Limit</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputJobType" class="col-sm-3 col-form-label">Discount
                                            Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" required>
                                                <option>Percentage</option>
                                                <option>Default</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Sage
                                            Ref.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputJobType" class="col-sm-3 col-form-label">Company
                                            Reg</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row field">
                                        <label for="inputPriority" class="col-sm-3 col-form-label">VAT / Tax
                                            No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row field">
                                        <label class="col-sm-3 col-form-label">Payment Terms</label>
                                        <div class="col-sm-6">
                                            <select class="form-control editInput selectOptions" required>
                                                <option>Default</option>
                                                <option>None</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-check-label checkboxtext" for="checkalrt">
                                                days</label>
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
                                                            <input class="form-check-input" type="checkbox" name="inlinecheckOptions" id="checkalrt" value="option1">
                                                            <label class="form-check-label checkboxtext" for="checkalrt">Yes, show
                                                                the
                                                                message</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-md-2 col-form-label">Message</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3" placeholder="Site Notes"></textarea>
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
                                                    <a href="#" class="profileDrop">Add Contact</a>
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
                // inputsValid = true;

                if (inputsValid) {
                    slidePage.style.marginLeft = `-${(100 / stepsNumber) * current
                            }%`;
                    bullet[current - 1].classList.add("active");
                    progressCheck[current - 1].classList.add("active");
                    progressText[current - 1].classList.add("active");
                    current += 1;
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

        function validateInputs(ths) {
            let inputsValid = true;

            const inputs =
                ths.parentElement.parentElement.querySelectorAll("input");
            for (let i = 0; i < inputs.length; i++) {
                const valid = inputs[i].checkValidity();
                if (!valid) {
                    inputsValid = false;
                    inputs[i].classList.add("invalid-input");
                } else {
                    inputs[i].classList.remove("invalid-input");
                }
            }
            return inputsValid;
        }
    }
</script>
@include('frontEnd.jobs.layout.footer')