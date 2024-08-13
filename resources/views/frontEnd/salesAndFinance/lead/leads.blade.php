@include('frontEnd.jobs.layout.header')

<style>
    .CRMFullModel .modal-dialog.modal-xl {
        --bs-modal-width: 1750px;
    }

    .overdue {
        display: flex;
        justify-content: end;
    }

    .overdue label {
        line-height: 22px;
        font-size: 13px;
        font-weight: 600;
    }

    .yeloColrbox {
        width: 20px;
        height: 20px;
        display: block;
        background-color: #FFCC66;
        margin-right: 4px;
    }

    .popup2 {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 99999;
        transition: opacity 0.3s ease;
    }

    /* .modal-backdrop {
        z-index: 1040 !important;
    }

    .modal {
        z-index: 1050 !important;
    }

    .modal.in {
        z-index: 1050 !important;
    } */
    /* #optionsDiv{
        display: none;
    } */
</style>
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
                            if ($customer->status_id == 7) {
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
                                <td>{{ App\User::getLeadAssignUserName($customer->assign_to) }}</td>
                                <td>{{ $customer->status }}</td>
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
                                                <!-- <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#CRMHistoryModal">CRM History</a> -->
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#customerPop">CRM History</a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</a>
                                                <a href="{{ url('/leads/authorization').'/'.$customer->id }}" class="dropdown-item">Send for Authorization</a>
                                                <a href="#" class="dropdown-item">Send to Quote</a>
                                                <a href="#" class="dropdown-item">Send to Job</a>
                                                <a href="#" class="dropdown-item">Convert to Customer Only</a>
                                            </div>
                                        </div>
                                    </div>


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
<!-- ****************CRM History Modal ****************-->
<div class="modal fade CRMFullModel" id="customerPop" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">CRM Dashboard - {{ $customer->lead_ref }}</h5>
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
                                        <span>{{ $customer->contact_name }}</span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <label class="col-md-4"><strong>Email Address:</strong></label>
                                    <div class="col-md-8">
                                        <span>{{ $customer->email }}</span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <label class="col-md-4"><strong>Telephone:</strong></label>
                                    <div class="col-md-8">
                                        <span>{{ $customer->telephone }}</span>
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
                                        <span> {{ $customer->lead_ref}}</span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <label class="col-md-4"><strong>Lead Status:</strong></label>
                                    <div class="col-md-8">
                                        <span>{{ $customer->status }}</span>
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
                                                    <td colspan="7">.</td>
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
                                        <a href="#" class="profileDrop p-2 crmNewBtn open-modal" data-target="bd-example-modal-lg" id="openSecondModal"> New</a>
                                    </div>
                                </div>  
                                <!-- Second Modal -->
                                <div class="modal fade bd-example-modal-lg" id="secondModal" tabindex="-1" aria-labelledby="secondModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="secondModalLabel">New Task</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- tab -->
                                                <nav>
                                                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Task</button>
                                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Timer</button>
                                                    </div>
                                                </nav>
                                                <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <form>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Task User</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control editInput" name="" id="">
                                                                                @foreach($users as $value)
                                                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <!-- <input type="text" class="form-control editInput" id="staticEmail" value=""> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Title</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control editInput" id="staticEmail" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Task Type</label>
                                                                        <div class="col-sm-6">
                                                                            <select class="form-control editInput" name="" id="">
                                                                                @foreach($leadTask as $value)
                                                                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <!-- <input type="text"  class="form-control editInput" id="staticEmail" value=""> -->
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <a href="#!" class="formicon" id="openThirdModal"><i class="fa-solid fa-square-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Start Date</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="date" class="form-control editInput" id="staticEmail" value="">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <input type="time" class="form-control editInput" id="staticEmail" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">End Date</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="date" class="form-control editInput" id="staticEmail" value="">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <input type="time" class="form-control editInput" id="staticEmail" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 form-check">
                                                                        <input type="checkbox" class="form-check-input editInput" id="exampleCheck1">
                                                                        <label class="form-check-label editInput" for="exampleCheck1">Is Reccurring Task ?</label>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-6">
                                                                <form>




                                                                <!--  -->
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Notify ? </label>
                                                                        <div class="col-sm-8">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="checkbox" name="inlinecheckOptions" id="checkalrt" value="option1" required="">
                                                                                <label class="form-check-label checkboxtext" for="checkalrt">Yes, On</label>
                                                                            </div>
                                                                            <!-- <input type="checkbox" class="editInput" id="yeson">
                                                                            <label for="notify" class="col-form-label ps-3">Yes, On</label>                                                                             -->
                                                                            <div id="optionsDiv">
                                                                                <label class="editInput"><input type="checkbox" value="1" id="notificationCheckbox" name="notification"> Notification</label>
                                                                                <label class="editInput"><input type="checkbox" value="1" id="emailCheckbox" name="email_notify"> Email</label>
                                                                                <label class="editInput"><input type="checkbox" value="1" id="smsCheckbox" name="sms_notify"> SMS</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="related_to" class="col-sm-4 col-form-label">Date & Time</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="date" class="form-control editInput" id="notify_date" name="notify_date">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <input type="time" class="form-control editInput" id="notify_time" name="notify_time">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="related_to" class="col-sm-4 col-form-label">Related To</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text"  class="form-control editInput" id="related_To" value="{{ $customer->lead_ref }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Notes</label>
                                                                        <div class="col-sm-8">
                                                                            <textarea name="" class="form-control" rows="2" id=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <form>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Task User</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text"  class="form-control" id="staticEmail" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Title</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text"  class="form-control" id="staticEmail" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Timer</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text"  class="form-control" id="staticEmail" value="">
                                                                        </div>
                                                                    </div>
                                                              
                                                                    <div class="mb-3 row">
                                                                        <label for="related_to" class="col-sm-4 col-form-label">Related To</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text"  class="form-control editInput" id="related_To" value="{{ $customer->lead_ref }}">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-6">
                                                                <form>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Task Type</label>
                                                                        <div class="col-sm-6">
                                                                            <select class="form-control editInput" name="" id="">
                                                                                @foreach($leadTask as $value)
                                                                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <!-- <input type="text" class="form-control editInput" id="staticEmail" value=""> -->
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <a href="#!" class="formicon" id="openThirdModal2"><i class="fa-solid fa-square-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Notes</label>
                                                                        <div class="col-sm-8">
                                                                            <textarea name="" class="form-control" id=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                                <!-- tab -->
                                                <div class="pageTitleBtn">
                                                <a href="#" class="profileDrop p-2 crmNewBtn" > Save</a>
                                                <!-- <a href="#" class="profileDrop p-2 crmNewBtn" > Close</a> -->
                                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- Third Modal -->
                                    <div class="modal fade" id="thirdModal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="thirdModalLabel">Add Task Type</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="">
                                                    <div class="mb-3 row">
                                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Website</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="website" class="form-control editInput" id="inputJobRef" value="{{ (isset($lead->website)) ? $lead->website : '' }}" placeholder="Website">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Website</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="website" class="form-control editInput" id="inputJobRef" value="{{ (isset($lead->website)) ? $lead->website : '' }}" placeholder="Website">
                                                        </div>
                                                    </div>
                                                    <div class="pageTitleBtn">
                                                    <a href="#" class="profileDrop p-2 crmNewBtn" > Save</a>
                                                    <!-- <a href="#" class="profileDrop p-2 crmNewBtn" > Close</a> -->
                                                    <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                                                    </div>

                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                <!--Start Region Popup -->

                                <div id="openPopupButton3" class="popup2">
                                    <div class="popup-content">
                                        <div class="popupTitle">
                                            <span class="">Add
                                                Region</span>
                                            <span class="close" id="closePopup2">&times;</span>
                                        </div>
                                        <div class="contantbodypopup">
                                            <form action="" class="customerForm">
                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-3 col-form-label">Region*</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control editInput" id="inputCity" value="Port Elizabeth">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a href="#!" class="formicon" id="openPopupButton2"><i class="fa-solid fa-square-plus"></i></a>
                                                        <a href="#" class="profileDrop p-2 crmNewBtn" id="openPopupButton"> New log</a>
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

                                <!--Start Region Popup -->

                                <div id="popup" class="popup">
                                    <div class="popup-content">
                                        <div class="popupTitle">
                                            <span class="">Add
                                                Region</span>
                                            <span class="close" id="closePopup">&times;</span>
                                        </div>
                                        <div class="contantbodypopup">
                                            <form action="" class="customerForm">
                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-3 col-form-label">Region*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control editInput" id="inputCity" value="Port Elizabeth">
                                                    </div>
                                                </div>
                                                <a href="#" class="profileDrop p-2 crmNewBtn" id="openPopupButton3"> New log</a>

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
                                <!-- ****************************** -->
                                <div class="col-sm-3">
                                    <form class="searchForm" action="">
                                        <div class="input-group mb-3  mt-3">
                                            <input type="text" class="form-control editInput" placeholder="Keywords to search" name="email">
                                            <button type="button" class="input-group-text sarchBtn">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-2">
                                    <div class="overdue mt-3 ms-3">
                                        <span class="yeloColrbox"></span><label>Overdue</label>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="pageTitleBtn">
                                        <a href="{{ url('') }}" class="profileDrop p-2 crmNewBtn">All</a>
                                        <a href="#" class="profileDrop p-2 crmNewBtn">Today</a>
                                        <a href="#" class="profileDrop p-2 crmNewBtn">This Week</a>
                                        <a href="#" class="profileDrop p-2 crmNewBtn">Overdue</a>
                                        <a href="#" class="profileDrop p-2 crmNewBtn">Completed</a>
                                        <a href="#" class="profileDrop p-2 crmNewBtn">Recurring</a>
                                    </div>
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
                                            <input type="text" class="form-control editInput" placeholder="Keyword to search" name="email">
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
                </div> <!--   -->

            </div> <!-- End off model body  -->
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- ****************End CRM History Modal ****************-->
<script>
    const openPopupButton2 = document.getElementById('openPopupButton2');
    const popup2 = document.getElementById('popup2');
    const closePopup2 = document.getElementById('closePopup');

    openPopupButton2.addEventListener('click', () => {
        popup2.style.display = 'block';
        setTimeout(() => {
            popup2.style.opacity = '1';
        }, 50); // Delay added for transition effect
    });

    closePopup2.addEventListener('click', () => {
        popup2.style.opacity = '0';
        setTimeout(() => {
            popup2.style.display = 'none';
        }, 300); // Ensure the popup is hidden after the transition ends
    });
</script>
<script>
    const openPopupButton = document.getElementById('openPopupButton');
    const popup = document.getElementById('popup');
    const closePopup = document.getElementById('closePopup');

    openPopupButton.addEventListener('click', () => {
        popup.style.display = 'block';
        setTimeout(() => {
            popup.style.opacity = '1';
        }, 50); // Delay added for transition effect
    });

    closePopup.addEventListener('click', () => {
        popup.style.opacity = '0';
        setTimeout(() => {
            popup.style.display = 'none';
        }, 300); // Ensure the popup is hidden after the transition ends
    });

    $(document).ready(function() {

        const mainCheckbox = document.getElementById('yeson');
        const optionsDiv = document.getElementById('optionsDiv');
        // Open the second modal without hiding the first one
        $('#openSecondModal').on('click', function() {
            optionsDiv.style.display = 'none';
            $('#secondModal').modal('show');
        });

        // Open the third modal without hiding the first and second ones
        $('#openThirdModal').on('click', function() {
            $('#thirdModal').modal('show');
           
        });
        $('#openThirdModal2').on('click', function() {
            $('#thirdModal').modal('show');
           
        });

        mainCheckbox.addEventListener('change', function () {
            if (mainCheckbox.checked) {
                optionsDiv.style.display = 'block';
            } else {
                optionsDiv.style.display = 'none';
            }
        });

    });
</script>
@include('frontEnd.jobs.layout.footer')

