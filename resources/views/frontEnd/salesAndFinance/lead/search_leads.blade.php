@include('frontEnd.jobs.layout.header')
        <section class="main_section_page px-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 ">
                        <div class="pageTitle">
                            <h3>Search Leads</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                        <div class="jobsection">
                            <a href="#" class="profileDrop">New Job</a>
                            <a href="#" class="profileDrop">Active <span>(5)</span></a>
                            <a href="#" class="profileDrop">Unassigned<span>(8)</span></a>
                            <a href="#" class="profileDrop">Action Required<span>(15)</span></a>
                            <a href="#" class="profileDrop">Overdue<span>(76)</span></a>
                            <a href="#" class="profileDrop">authorization<span>(32)</span></a>
                            <a href="#" class="profileDrop">On Hold<span>(2)</span></a>
                            <a href="#" class="profileDrop">Recursing Jobs</a>
                            <label class="incluteCheck">
                                <input type="checkbox" id="checb">
                                <label for="checb">Include Quote Jobs</label>
                            </label>
                        </div>
                    </div>

                </div>
                <di class="row">
                    <div class="col-lg-12">
                        <div class="maimTable">
                            <div class="printExpt">
                                <div class="prntExpbtn">
                                    <a href="#!">Print</a>
                                    <a href="#!">Export</a>
                                </div>
                                <div class="searchFilter">
                                    <a href="#!" onclick="hideShowDiv()" class="hidebtn">Show Search Filter</a>
                                </div>

                            </div>
                            <div class="searchJobForm" id="divTohide">
                                <form action="" class="p-4">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Lead Ref:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Lead Ref.">
                                                </div>
                                            </div>

                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Full Name:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Website:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="website">
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Keywords:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        Type keywords>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">

                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Assigned User:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>--All--</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Company Name:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Type Company name">
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Address:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Type your address">
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Completed On:</label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control editInput" id="inputName"
                                                        value="John Smith">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control editInput" id="inputName"
                                                        value="John Smith">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Status:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>--All--</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Email Add.:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Email add">
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">City:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="City">
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Rejected Type:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Rejected Type">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Source:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputJobType">
                                                        <option>--All--</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Telephone:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Telephone">
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">Mobile:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Mobile">
                                                </div>
                                            </div>
                                            <div class="row form-group mb-2">
                                                <label class="col-md-4 col-form-label text-end">County:</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="County">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control editInput" id="inputName"
                                                        placeholder="Pincode">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="pageTitleBtn justify-content-center">
                                                <a href="#" class="profileDrop px-3">Search </a>
                                                <a href="#" class="profileDrop px-3">Clear</a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div> <!-- End off main Table -->
                    </div>
                </di>
            </div>
        </section>



@include('frontEnd.jobs.layout.footer')