@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Draft Quotes</h3>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <div class="pageTitleBtn">
                    <a href="#" class="profileDrop">Search Quotes</a>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <div class="jobsection">
                    <a href="#" class="profileDrop">New Quotes</a>
                    <a href="#" class="profileDrop">Draft <span>(5)</span></a>
                    <a href="#" class="profileDrop">Actioned<span>(8)</span></a>
                    <a href="#" class="profileDrop">Converted<span>(15)</span></a>
                    <a href="#" class="profileDrop">Call back<span>(76)</span></a>
                    <a href="#" class="profileDrop">Accsepted<span>(32)</span></a>
                    <a href="#" class="profileDrop">Rejected<span>(2)</span></a>
                    <a href="#" class="profileDrop">Sales Appointments</a>
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
                            </div>
                            <div class="col-md-5">
                                <div class="pageTitleBtn p-0">
                                    <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td></td>
                                <th>#</th>
                                <th>Quote Ref </th>
                                <th>Quote Date</th>
                                <th>Customer Name</th>
                                <th>Site / Delivery</th>
                                <th>No. Quotes </th>
                                <th>Sub Total</th>
                                <th>VAT</th>
                                <th>Total </th>
                                <th>Deposite </th>
                                <th>Outstanding</th>
                                <th>profit</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($quotes as $value)
                            <tr>
                                <td></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->quote_ref }}</td>
                                <td>{{ $value->quota_date }}</td>
                                <td></td>
                                <td>1</td>
                                <td>1</td>
                                <td>{{ $value->sub_total }}</td>
                                <td>{{ $value->vat_amount }}</td>
                                <td>{{ $value->total }}</td>
                                <td>{{ $value->deposit }}</td>
                                <td>{{ $value->outstanding }}</td>
                                <td>{{ $value->profit }}</td>
                                <td>
                                    <div class="d-inline-flex align-items-center ">
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown">
                                                Action
                                            </a>
                                            <div class="dropdown-menu fade-up m-0">
                                                <a href="" class="dropdown-item">Edit Details</a>
                                                <a href="#" class="dropdown-item">Send SMS</a>
                                                <hr class="dropdown-divider">
                                                <a href="#" class="dropdown-item set_value_on_CRM_model" class="dropdown-item">CRM History</a>
                                                <a href="#" class="dropdown-item open-modal" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</a>
                                                <a href="#" class="dropdown-item">Send for Authorization</a>
                                                <a href="#" class="dropdown-item">Send to Quote</a>
                                                <a href="#" class="dropdown-item">Send to Job</a>
                                                <a href="#" class="dropdown-item">Convert to Customer Only</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td colspan="12">
                                    <label class="red_sorryText"> Sorry, there are no items available.. </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div> <!-- End off main Table -->
            </div>
        </di>
    </div>
</section>



@include('frontEnd.salesAndFinance.jobs.layout.footer')