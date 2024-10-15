@include('frontEnd.salesAndFinance.jobs.layout.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4 ">
            <div class="pageTitle">
                <h3>Products</h3>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 col-lg-12 col-xl-12 px-3">
            <div class="jobsection">
                <a href="#" class="profileDrop" data-bs-toggle="modal" data-bs-target="#itemsAddProductModal">Add</a>
                <a href="#" class="profileDrop">Unauthorised (0)</a>
                <a href="#" class="profileDrop">Authorised (0)</a>
                <a href="#" class="profileDrop">Rejected (0)</a>
                <a href="#" class="profileDrop">Paid (0)</a>
                <a href="#" class="profileDrop">All (0)</a>
                <!-- <a href="#" class="profileDrop" id="impExpClickbtnPopup">Import/Export</a> -->
            </div>
        </div>
    </div>
    <di class="row">
        <div class="col-lg-12">
            <div class="maimTable mt-2">
                <div class="printExpt">
                    <div class="prntExpbtn">
                        <a href="#!">Print</a>
                        <a href="#!">Export</a>
                    </div>
                    <div class="searchFilter">
                        <a href="#!">Show Search Filter</a>
                    </div>

                </div>
                <div class="markendDelete">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="jobsection d-flex">
                                <a href="#" class="profileDrop">Delete</a>
                                <div class="pageTitleBtn p-0">
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle profileDrop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Bulk Action </a>
                                        <div class="dropdown-menu fade-up m-0">
                                            <a href="#" class="dropdown-item col-form-label">Set Accont
                                                Codes</a>
                                            <a href="#" class="dropdown-item col-form-label">Set Tax
                                                Rats</a>
                                            <a href="#" class="dropdown-item col-form-label">Fix duplicate
                                                product codes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="pageTitleBtn p-0">
                                <a href="#" class="profileDrop"> <i class="material-symbols-outlined">
                                        settings </i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" style=" width:60px;"><input type="checkbox" id="selectAll">
                                <label for="selectAll"> </label>
                            </th>
                            <th>#</th>
                            <th>Date</th>
                            <th>Expense By</th>
                            <th>Expense Name</th>
                            <th>Reference</th>
                            <th>Job Ref</th>
                            <th>Site</th>
                            <th>Notes</th>
                            <th>Net Amount</th>
                            <th>Vat Amount</th>
                            <th>Gross Amount</th>
                            <th>Billing</th>
                            <th>Authorised</th>
                            <th>Rejected</th>
                            <th>Paid</th>
                            <th>Attachments</th>
                            <th>Created On</th>
                            <th></th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="pageTitleBtn p-0">
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle profileDrop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action </a>
                                        <div class="dropdown-menu fade-up m-0">
                                            <a href="#" class="dropdown-item col-form-label"
                                                data-bs-toggle="modal" data-bs-target="#itemsAddProductModal">Edit
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>


                <!-- *************First addProduct model********************* -->

                <!-- end here -->
            </div> <!-- End off main Table -->
        </div>
    </di>
</div>
</section>

@include('frontEnd.salesAndFinance.jobs.layout.footer')
