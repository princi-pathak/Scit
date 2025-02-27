@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Sales Day Book</h3>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <div class="pageTitleBtn">
                    <a href="#" class="profileDrop">Search Book</a>
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
                            <a href="#!">Show Search Filter</a>
                        </div>
                    </div>
                    <div class="markendDelete">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="jobsection">
                                    <a href="{{ url('/sales/sales-day-book/add') }}" class="profileDrop">Add</a>
                                    <!-- <a href="#" class="profileDrop">Mark As completed</a> -->
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="pageTitleBtn p-0">
                                    <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="productDetailTable pt-3">
                        <table class="table tablechange mb-0" id="containerA">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Customer </th>
                                    <th>Date</th>
                                    <th>Net</th>
                                    <th>VAT</th>
                                    <th>Gross </th>
                                    <th>Rate </th>
                                    <th>Total </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>QU-0001</td>
                                    <td>2024-12-06</td>
                                    <td>Webnmob</td>
                                    <td>B-36 Sector 59</td>
                                    <td>1</td>
                                    <td>£220.00</td>
                                    <td>£44.00</td>
                                    <td>£264.00</td>
                                    <td>£0.00</td>
                                    <td>£264.00</td>
                                    <td>£120.00</td>
                                    <td>
                                        <div class="d-flex justify-content-end actionDropdown">
                                            <div class="nav-item dropdown">
                                                <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="dropdown-menu fade-up m-0">
                                                    <a href="#!" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#sendSMSQuoteModal">Send SMS</a>
                                                    <a href="#!" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#emailQuoteModal">Email</a> 
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>QU-0001</td>
                                    <td>2024-12-06</td>
                                    <td>Webnmob</td>
                                    <td>B-36 Sector 59</td>
                                    <td>1</td>
                                    <td>£220.00</td>
                                    <td>£44.00</td>
                                    <td>£264.00</td>
                                    <td>£0.00</td>
                                    <td>£264.00</td>
                                    <td>£120.00</td>
                                    <td>
                                        <div class="d-flex justify-content-end actionDropdown">
                                            <div class="nav-item dropdown">
                                                <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="dropdown-menu fade-up m-0">
                                                    <a href="#" class="dropdown-item">Edit</a>
                                                    <a href="" class="dropdown-item">Delete</a>
                                                    <!-- <a href="" class="dropdown-item">Print</a>
                                                    <a href="" class="dropdown-item">Email</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <tfoot>
                                <tr>
                                    <th colspan="6" rowspan="1">Page Sub Total</th>
                                    <th rowspan="1" colspan="1">£220.00</th>
                                    <th rowspan="1" colspan="1">£44.00</th>
                                    <th rowspan="1" colspan="1">£264.00</th>
                                    <th rowspan="1" colspan="1">£0.00</th>
                                    <th rowspan="1" colspan="1">£264.00</th>
                                    <th rowspan="1" colspan="1">£120.00</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>

                    <!-- <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td></td>
                                    <th>#</th>
                                    <th>Job Ref </th>
                                    <th>Job Type</th>
                                    <th>Customer</th>
                                    <th>Purchase Order Ref</th>
                                    <th>Short Description </th>
                                    <th>Site </th>
                                    <th>Appointments-Overdue Appointments(0)</th>
                                    <th>Project Name </th>
                                    <th>Complete By </th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                                               
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td colspan="12">
                                        <label class="red_sorryText"> Sorry, there are no items available.. </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->

                </div> <!-- End off main Table -->
            </div>
        </di>
    </div>
</section>

@include('frontEnd.salesAndFinance.jobs.layout.footer')