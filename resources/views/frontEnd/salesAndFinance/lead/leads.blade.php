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
                                    @case(7)  {{ $authorizationText }} @break
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
                                                <a href="#" class="dropdown-item">CRM History</a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</a>
                                                <a href="{{ url('/leads/authorization').'/'.$customer->id }}" class="dropdown-item">Send for Authorization</a>
                                                <a href="#" class="dropdown-item">Send to Quote</a>
                                                <a href="#" class="dropdown-item">Send to Job</a>
                                                <a href="#" class="dropdown-item">Convert to Customer Only</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- **************** -->

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