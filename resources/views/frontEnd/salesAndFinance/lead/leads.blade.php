@include('frontEnd.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>
                        @switch($lastSegment)
                        @case("leads") Leads @break
                        @case("myLeads") My Leads @break
                        @case("unassigned") Unassigned Leads @break
                        @case("rejected") Rejected Leads @break
                        @case("authorization") Authorization Leads @break
                        @case("converted") Converted Leads @break
                        @default {{-- No output if none of the cases match --}}
                        @endswitch

                    </h3>
                </div>
            </div>
        </div>

        @include('frontEnd.salesAndFinance.lead.lead_buttons')

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
                                    <a href="#" class="profileDrop">Delete</a>
                                    <a href="#" class="profileDrop">Mark As completed</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="pageTitleBtn p-0">
                                    <!-- <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td></td>
                                <th>#</th>
                                <th>Lead Ref.</th>
                                <th>Full Name</th>
                                <th>Company Name</th>
                                <th>Email Address</th>
                                <th>Telephone</th>
                                <th>Mobile</th>
                                <th>Assigned User</th>
                                <th>Status</th>
                                <th>Website</th>
                                <th>Address</th>
                                <th>City </th>
                                <th>County </th>
                                <th>Postcode</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($customers as $customer)
                            @php
                            $authorizationText = '';
                            if ($customer->status == 7) {
                            if ($customer->authorization_status == 1) {
                            $authorizationText = 'Waiting for Authorization';
                            } elseif ($customer->authorization_status == 2) {
                            $authorizationText = 'Authorized';
                            } else {
                            $authorizationText = 'none';
                            }
                            }
                            @endphp
                            <tr>
                                <td></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->lead_ref }}</td>
                                <td>{{ $customer->contact_name }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->telephone }}</td>
                                <td>{{ $customer->mobile }}</td>
                                <td>users</td>
                                <td> @switch($customer->status)
                                    @case(1) Contact Later @break
                                    @case(2) Contacted @break
                                    @case(3) New @break
                                    @case(4) Pre Qualified @break
                                    @case(5) Qualified @break
                                    @case(6) Rejected @break
                                    @case(7) {{ $authorizationText }} @break
                                    @default {{-- No output if none of the cases match --}}
                                    @endswitch
                                </td>
                                <td>{{ $customer->website }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->city }}</td>
                                <td>{{ $customer->country }}</td>
                                <td>{{ $customer->postal_code }}</td>
                                <td>
                                    <div class="d-inline-flex align-items-center ">
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown">
                                                Action
                                            </a>
                                            <div class="dropdown-menu fade-up m-0">
                                                <a href="{{ url('/leads/edit').'/'.$customer->id }}" class="dropdown-item">Edit Details</a>
                                                <a href="#" class="dropdown-item">Send SMS</a>
                                                <hr class="dropdown-divider">
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#CRMHistoryModal">CRM History</a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</a>
                                                <a href="{{ url('/leads/authorization').'/'.$customer->id }}" class="dropdown-item">Send for Authorization</a>
                                                <a href="#" class="dropdown-item">Send to Quote</a>
                                                <a href="#" class="dropdown-item">Send to Job</a>
                                                <a href="#" class="dropdown-item">Convert to Customer Only</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ****************CRM History Modal ****************-->

                                    <div class="modal fade" id="CRMHistoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content add_Customer">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="customerModalLabel">CRM Dashboard - LEAD-0012</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body crmModelCont">
                                                <div class="jobsection pb-2 hideandshow">
                                                    <button class="profileDrop" id="onclickbtnHideShow">Hide/Show</button>
                                                </div>

                                                <div id="showDivCont">
                                                    <div class="newJobForm mb-4">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="">
                                                                    <h4 class="contTitle text-center">Contact Details</h4>
                                                                </div>
                                                                <div class="row pt-3">
                                                                    <label class="col-md-4"><strong>Full Name:</strong></label>
                                                                    <div class="col-md-8">
                                                                        <span>Swaonil Gautam</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row pt-3">
                                                                    <label class="col-md-4"><strong>Email Address:</strong></label>
                                                                    <div class="col-md-8">
                                                                        <span>Swaonil@gmail.com</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row pt-3">
                                                                    <label class="col-md-4"><strong>Telephone:</strong></label>
                                                                    <div class="col-md-8">
                                                                        <span>1234567890</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="">
                                                                    <h4 class="contTitle text-center">Lead Details</h4>
                                                                </div>
                                                                <div class="row pt-3">
                                                                    <label class="col-md-4"><strong>Lead Ref.:</strong></label>
                                                                    <div class="col-md-8">
                                                                        <span> LEAD-0012</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row pt-3">
                                                                    <label class="col-md-4"><strong>Lead Status:</strong></label>
                                                                    <div class="col-md-8">
                                                                        <span>Contact Later</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                    <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="pills-fullHistory-tab" data-bs-toggle="pill" data-bs-target="#pills-fullHistory" type="button" role="tab" aria-controls="pills-fullHistory" aria-selected="true">Full History</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link " id="pills-Calls-tab" data-bs-toggle="pill" data-bs-target="#pills-Calls" type="button" role="tab" aria-controls="pills-Calls" aria-selected="false">Calls</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link " id="pills-emails-tab" data-bs-toggle="pill" data-bs-target="#pills-emails" type="button" role="tab" aria-controls="pills-emails" aria-selected="false">Emails</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link " id="pills-tasks-tab" data-bs-toggle="pill" data-bs-target="#pills-tasks" type="button" role="tab" aria-controls="pills-tasks" aria-selected="false">Tasks</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link " id="pills-notes-tab" data-bs-toggle="pill" data-bs-target="#pills-notes" type="button" role="tab" aria-controls="pills-notes" aria-selected="false">Notes</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link " id="pills-complaints-tab" data-bs-toggle="pill" data-bs-target="#pills-complaints" type="button" role="tab" aria-controls="pills-complaints" aria-selected="false">Complaints</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-fullHistory" role="tabpanel" aria-labelledby="pills-fullHistory-tab" tabindex="0">
                                                            <div class="newJobForm mt-4">
                                                                <label class="upperlineTitle">Full History</label>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <form class="searchForm" action="">
                                                                            <div class="input-group mb-3 mt-3">
                                                                                <input type="text" class="form-control editInput" placeholder="Your Email" name="email">
                                                                                <button type="button" class="input-group-text sarchBtn">Search</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="productDetailTable">
                                                                            <table class="table">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>Date</th>
                                                                                        <th>By</th>
                                                                                        <th>Contact</th>
                                                                                        <th>Type</th>
                                                                                        <th>Note(s)</th>
                                                                                        <th>Status</th>
                                                                                        <th>Customer Visible</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>08/08/2024 06:16</td>
                                                                                        <td>Abhi - (mobappssolutions131@gmail.com) </td>
                                                                                        <td>1234567890</td>
                                                                                        <td> System</td>
                                                                                        <td>New Task 'Swapnil Task add' created for '08/08/2024 00:10'</td>
                                                                                        <td>New Task</td>
                                                                                        <td>..</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-Calls" role="tabpanel" aria-labelledby="pills-Calls-tab" tabindex="0">
                                                            <div class="newJobForm mt-4">
                                                                <label class="upperlineTitle">Calls History</label>
                                                                <div class="row">
                                                                    <div class="col-sm-1">
                                                                        <div class="jobsection  mt-3">
                                                                            <a href="#" class="profileDrop p-2 crmNewBtn"> New</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form class="searchForm" action="">
                                                                            <div class="input-group mb-3  mt-3">
                                                                                <input type="text" class="form-control editInput" placeholder="Your Email" name="email">
                                                                                <button type="button" class="input-group-text sarchBtn">Search</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="productDetailTable">
                                                                            <table class="table">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>Date</th>
                                                                                        <th>By</th>
                                                                                        <th>Contact</th>
                                                                                        <th>Type</th>
                                                                                        <th>Note(s)</th>
                                                                                        <th>Status</th>
                                                                                        <th>Customer Visible</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-emails" role="tabpanel" aria-labelledby="pills-emails-tab" tabindex="0">
                                                        <div class="newJobForm mt-4">
                                                                <label class="upperlineTitle">Emails History</label>
                                                                <div class="row">
                                                                    <div class="col-sm-1">
                                                                        <div class="jobsection  mt-3">
                                                                            <a href="#" class="profileDrop p-2 crmNewBtn"> New</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form class="searchForm" action="">
                                                                            <div class="input-group mb-3  mt-3">
                                                                                <input type="text" class="form-control editInput" placeholder="Your Email" name="email">
                                                                                <button type="button" class="input-group-text sarchBtn">Search</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="productDetailTable">
                                                                            <table class="table">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>Date</th>
                                                                                        <th>By</th>
                                                                                        <th>Contact</th>
                                                                                        <th>Type</th>
                                                                                        <th>Note(s)</th>
                                                                                        <th>Status</th>
                                                                                        <th>Customer Visible</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab" tabindex="0">
                                                        <div class="newJobForm mt-4">
                                                                <label class="upperlineTitle">Tasks</label>
                                                                <div class="row">
                                                                    <div class="col-sm-1">
                                                                        <div class="jobsection  mt-3">
                                                                            <a href="#" class="profileDrop p-2 crmNewBtn"> New</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form class="searchForm" action="">
                                                                            <div class="input-group mb-3  mt-3">
                                                                                <input type="text" class="form-control editInput" placeholder="Your Email" name="email">
                                                                                <button type="button" class="input-group-text sarchBtn">Search</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="productDetailTable">
                                                                            <table class="table">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>Date</th>
                                                                                        <th>By</th>
                                                                                        <th>Contact</th>
                                                                                        <th>Type</th>
                                                                                        <th>Note(s)</th>
                                                                                        <th>Status</th>
                                                                                        <th>Customer Visible</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-notes" role="tabpanel" aria-labelledby="pills-notes-tab" tabindex="0">
                                                        <div class="newJobForm mt-4">
                                                                <label class="upperlineTitle">Notes</label>
                                                                <div class="row">
                                                                    <div class="col-sm-1">
                                                                        <div class="jobsection  mt-3">
                                                                            <a href="#" class="profileDrop p-2 crmNewBtn"> New</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form class="searchForm" action="">
                                                                            <div class="input-group mb-3  mt-3">
                                                                                <input type="text" class="form-control editInput" placeholder="Your Email" name="email">
                                                                                <button type="button" class="input-group-text sarchBtn">Search</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="productDetailTable">
                                                                            <table class="table">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>Date</th>
                                                                                        <th>By</th>
                                                                                        <th>Contact</th>
                                                                                        <th>Type</th>
                                                                                        <th>Note(s)</th>
                                                                                        <th>Status</th>
                                                                                        <th>Customer Visible</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-complaints" role="tabpanel" aria-labelledby="pills-complaints-tab" tabindex="0">
                                                        <div class="newJobForm mt-4">
                                                                <label class="upperlineTitle">Complaints History</label>
                                                                <div class="row">
                                                                    <div class="col-sm-1">
                                                                        <div class="jobsection  mt-3">
                                                                            <a href="#" class="profileDrop p-2 crmNewBtn"> New</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <form class="searchForm" action="">
                                                                            <div class="input-group mb-3  mt-3">
                                                                                <input type="text" class="form-control editInput" placeholder="Your Email" name="email">
                                                                                <button type="button" class="input-group-text sarchBtn">Search</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="productDetailTable">
                                                                            <table class="table">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>Date</th>
                                                                                        <th>By</th>
                                                                                        <th>Contact</th>
                                                                                        <th>Type</th>
                                                                                        <th>Note(s)</th>
                                                                                        <th>Status</th>
                                                                                        <th>Customer Visible</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                        <td>.</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- 
                                                     -->


                                                </div> <!-- End off model body  -->
                                                <div class="modal-footer customer_Form_Popup">
                                                    <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ****************End CRM History Modal ****************-->

                                    <!-- ****************Reject Modal ****************-->

                                    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reject Confirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Lead Ref:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Reject Type:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>
                                                        <a href="#!" data-bs-toggle="modal" data-bs-target="#rejectModal2"><i class="fa-solid fa-square-plus"></i></a>
                                                        <div class="mb-3">
                                                            <label for="message-text" class="col-form-label">Reject Reason:</label>
                                                            <textarea class="form-control" id="message-text"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="rejectModal2" tabindex="1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel2">New message</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message-text" class="col-form-label">Message:</label>
                                                            <textarea class="form-control" id="message-text"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ***************** -->
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>

                </div> <!-- End off main Table -->
            </div>
        </di>
    </div>
</section>

@include('frontEnd.jobs.layout.footer')