@include('frontEnd.jobs.layout.header')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">
<script src="https://cdn.ckeditor.com/ckeditor5/ckeditor.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .CRMFullModel .modal-dialog.modal-xl {
        --bs-modal-width: 1600px;
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

        <div class="row">
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
                                                <a href="#" class="dropdown-item set_value_on_CRM_model" data-user-id="{{ $customer->id }}" data-ref="{{ $customer->lead_ref }}" data-contact-name= "{{ $customer->contact_name }}" data-email="{{ $customer->email }}" data-name="{{ $customer->name }}" data-status="{{ $customer->status }}"   data-telephone="{{ $customer->telephone }}"  class="dropdown-item" >CRM History</a>
                                                <a href="#" class="dropdown-item open-modal" data-lead_ref="{{ $customer->lead_ref }}"  data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</a>
                                                <a href="{{ url('/leads/authorization').'/'.$customer->id }}" class="dropdown-item">Send for Authorization</a>
                                                <a href="#" class="dropdown-item">Send to Quote</a>
                                                <a href="#" class="dropdown-item">Send to Job</a>
                                                <a href="#" class="dropdown-item">Convert to Customer Only</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- **************** Reject Modal Start ****************-->
                                    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reject Confirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="lead_reject_reason_form">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Lead Ref:</label>
                                                            <input type="text" name="lead_ref" class="form-control editInput" id="lead_ref" placeholder="Auto Generate" value="">
                                                            <!-- <input type="text" class="form-control" id="recipient-name"> -->
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Reject Type:</label>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <select name="reject_type_id" class="form-control editInput" id="">
                                                                        @foreach($leadRejectTypes as $value)
                                                                        <option value="{{ $value->id }}">{{ $value->title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-2 d-flex align-items-center">
                                                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#rejectModal2">
                                                                        <i class="fa-solid fa-square-plus"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message-text" class="col-form-label">Reject Reason:</label>
                                                            <textarea name="reject_reason" class="form-control editInput" id=""></textarea>
                                                         </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="profileDrop" id="lead_reject_reason">Confirm Reject</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="rejectModal2" tabindex="1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel2"> Add Lead Reject Type </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="lead_reject_type_form_edit">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Lead Reject Type :</label>
                                                            <input type="text" class="form-control editInput" name="title" id="recipient-name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message-text" class="col-form-label">Status:</label>
                                                            <select name="status" class="form-control editInput" id="">
                                                                <option value="1">Active</option>
                                                                <option value="0">InActive</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" id="lead_reject" class="profileDrop">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  **************** Reject Model End *****************  -->
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
                <h5 class="modal-title" id="customerModalLabel">CRM Dashboard - <span id="calls_lead_ref"></span></h5>
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
                                        <span id="calls_contact_name"></span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <label class="col-md-4"><strong>Email Address:</strong></label>
                                    <div class="col-md-8">
                                        <span id="calls_email"></span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <label class="col-md-4"><strong>Telephone:</strong></label>
                                    <div class="col-md-8">
                                        <span id="calls_telephone"></span>
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
                                        <span id="calls_lead_refs"></span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <label class="col-md-4"><strong>Lead Status:</strong></label>
                                    <div class="col-md-8">
                                        <span id="calls_status"></span>
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
                                        <a href="#" class="profileDrop p-2 crmNewBtn" id="openCallsModel" > New</a>
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
                                        <table class="table" id="crmCallData">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>By</th>
                                                    <th>Contact</th>
                                                    <th>Type</th>
                                                    <th>Note(s)</th>
                                                    <th>Customer Visible</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                 
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
                                        <a href="#" class="profileDrop p-2 crmNewBtn" id="openNewEmail"> New</a>
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
                                                                                <input class="form-check-input" type="checkbox" name="inlinecheckOptions" id="yeson" value="option1" required="">
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
                                                                            <span class="editInput" id="related_To"></span>
                                                                            <!-- <input type="text" class="form-control editInput" id="related_To" value="{{ $customer->lead_ref }}"> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Notes</label>
                                                                        <div class="col-sm-8">
                                                                            <textarea name="" class="form-control textareaInput" rows="5" id=""></textarea>
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
                                                                            <input type="text" class="form-control" id="staticEmail" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Title</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" id="staticEmail" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Timer</label>
                                                                        <div class="col-sm-8">
                                                                            <button class="profileDrop" id="toggleTimerBtn"><i class="fa fa-play"></i> Start</button>
                                                                            <span id="timerDisplay">00:00:00</span>

                                                                            <!-- <input type="text" class="form-control" id="staticEmail" value=""> -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label for="related_to" class="col-sm-4 col-form-label">Related To</label>
                                                                        <div class="col-sm-8">
                                                                            <span class="editInput" id="relatedTo"></span>
                                                                            <!-- <input type="text" class="form-control editInput" id="relatedTo" value="{{ $customer->lead_ref }}"> -->
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
                                                                            <textarea rows="5" name="" class="form-control textareaInput" id=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- tab -->
                                                <div class="pageTitleBtn">
                                                    <a href="#" class="profileDrop p-2 crmNewBtn"> Save</a>
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
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="thirdModalLabel">Add Task Type</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" id="lead_task_type_form">
                                                    <div class="mb-3 row">
                                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Task Type <span class="red-text">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="title" class="form-control editInput" id="inputJobRef" value="" placeholder="Task Type">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <select id="status" name="status" class="form-control editInput">
                                                                <option value="1">Active</option>
                                                                <option value="0">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="pageTitleBtn">
                                                        <a href="#" class="profileDrop p-2 crmNewBtn" id="saveTaskType"> Save</a>
                                                        <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Start Region Popup -->
                                <!-- <div id="openPopupButton3" class="popup2">
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
                                </div> -->
                                <!--Start Region Popup -->
                                <!-- <div id="popup" class="popup">
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

                                </div> -->
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
                </div> 

            </div> <!-- End off model body  -->
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Calls Modal -->
<div class="modal fade" id="callsModal" tabindex="-1" aria-labelledby="callsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Calls</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeCallsModels"></button>
            </div>
            <div class="modal-body">
                <form action="" class="customerForm" id="CRM_calls_form">
                    <div class="mb-2 row">
                        <input type="hidden" name="crm_lead_calls_id" id="crm_lead_calls_id">
                        <label for="calls_telephone" class="col-sm-3 col-form-label">Direction </label>
                        <div class="col-sm-9">
                            <input class="form-check-input" type="radio" name="direction" id="direction_radio1" value="0" checked>
                            <label class="form-check-label editInput" for="direction_radio1"> Call Out </label>
                            <input class="form-check-input" type="radio" name="direction" id="direction_radio2" value="1">
                            <label class="form-check-label editInput" for="direction_radio2"> Call In </label>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="calls_telephone" class="col-sm-3 col-form-label">Telephone </label>
                        <div class="col-sm-2">
                            <select class="form-control editInput selectOptions" required="" name="country_code" id="countries">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control editInput" id="calls_telephone" name="telephone" placeholder="Telephone">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="calls_type" class="col-sm-3 col-form-label">Type <span class="red-text">*</span> </label>
                        <div class="col-sm-7">
                            <select name="crm_type_id" class="form-control editInput" id="calls_type">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                        <a href="#!" class="formicon" id="openCrmTypeModel" ><i class="fa-solid fa-square-plus"></i></a>
                        </div>   
                    </div>
                    <div class="mb-2 row">
                        <label for="calls_notes" class="col-sm-3 col-form-label">Notes <span class="red-text">*</span> </label>
                        <div class="col-sm-9">
                            <div id="editor">
                            </div>
                            <textarea name="content" id="calls_notes" style="display: none;"></textarea>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="calls_lead_ref" class="col-sm-3 col-form-label">Related To </label>
                        <div class="col-sm-9">
                            <span class="editInput" id="call_lead_ref"></span>
                            <input type="hidden" name="lead_ref" id="call_lead_ref_data">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="calls_telephone" class="col-sm-3 col-form-label">Notify? </label>
                        <div class="col-sm-9">
                            <input class="form-check-input notify_radio2" type="radio" name="notify_radio" id="notify_radio2" value="0" checked>
                            <label class="form-check-label editInput" for="notify_radio1"> No </label>
                            <input class="form-check-input notify_radio1" type="radio" name="notify_radio" id="notify_radio1" value="1">
                            <label class="form-check-label editInput" for="notify_radio2"> Yes </label>
                        </div>
                    </div>
                    <div class="notification_div">
                        <div class="mb-2 row">
                            <label for="user_notifiy" class="col-sm-3 col-form-label">Notify Who?<span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <select name="notify_user" class="form-control editInput" id="user_notifiy">
                                    <option value=""></option>
                                    @foreach($users as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-3 col-form-label">Send As<span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <label for="calls_notify_who1" class="editInput"><input type="checkbox" name="notification" id="calls_notify_who1" value="1"> Notification (User Only) </label>
                                <label for="calls_notify_who2" class="editInput"><input type="checkbox" name="sms" id="calls_notify_who2" value="1"> SMS </label>
                                <label for="calls_notify_who3" class="editInput"><input type="checkbox" name="email" id="calls_notify_who3" value="1"> Email </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputCity" class="col-sm-3 col-form-label">Customer Visible? </label>
                        <div class="col-sm-9">
                            <input class="form-check-input" type="radio" name="customer_visible" id="flexRadioDefault1" value="0" checked>
                            <label class="form-check-label editInput" for="flexRadioDefault1">No</label>
                            <input class="form-check-input" type="radio" name="customer_visible" id="flexRadioDefault2" value="1">
                            <label class="form-check-label editInput" for="flexRadioDefault2">Yes</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="profileDrop" id="saveCRMCallsModelData">Save</button>
                <button type="button" class="profileDrop" id="closeCallsModels" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end Calls Modal -->

<!-- CRM Types Modal Start -->
<div class="modal fade" id="crmTypeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content add_Customer">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add - CRM Section Types</h5>
        <button type="button" class="close" data-dismiss="modal" id="closeCrmModalBtn" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="crm_section_type_form">
            <div class="mb-2 row">
                <label for="type_title" class="col-sm-3 col-form-label">Type <span class="red-text">*</span> </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control editInput" name="title" id="type_title" value="">
                    <input type="hidden" class="form-control editInput" name="crm_section" id="" value="1">
                </div>
            </div>
            <div class="mb-2 row">
                <label for="colour_code" class="col-sm-3 col-form-label">Colour Code  </label>
                <div class="col-sm-9">
                    <input type="color" class="form-control editInput" name="colour_code" id="colour_code" value="">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="profileDrop" id="closeCrmModalBtn">Close</button>
        <button type="button" class="profileDrop" id="saveCRMTypes">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- CRM Types Modal End -->


<!-- CRM Add Email Modal Start -->
<div class="modal fade" id="NewEmailModel" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content add_Customer">
      <div class="modal-header">
        <h5 class="modal-title" id="emailModalLabel">Email</h5>
        <button type="button" class="close" data-dismiss="modal" id="closeCrmModalBtn" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="crm_section_type_form">
            <div class="mb-2 row">
                <label for="type_title" class="col-sm-3 col-form-label">To <span class="red-text">*</span> </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control editInput" name="title" id="type_title" value="">
                    <input type="hidden" class="form-control editInput" name="crm_section" id="" value="1">
                </div>
            </div>
            <div class="mb-2 row">
                <label for="type_title" class="col-sm-3 col-form-label">Cc </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control editInput" name="title" id="type_title" value="">
                    <input type="hidden" class="form-control editInput" name="crm_section" id="" value="1">
                </div>
            </div>
            <div class="mb-2 row">
                <label for="type_title" class="col-sm-3 col-form-label">Subject <span class="red-text">*</span> </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control editInput" name="title" id="type_title" value="">
                    <input type="hidden" class="form-control editInput" name="crm_section" id="" value="1">
                </div>
            </div>
            <div class="mb-2 row">
                <label for="type_title" class="col-sm-3 col-form-label">Message <span class="red-text">*</span> </label>
                <div class="col-sm-9">
                    <textarea name="" id=""></textarea>
                </div>
            </div>
            <div class="mb-2 row">
                <label for="type_title" class="col-sm-3 col-form-label">Attachment <span class="red-text">*</span> </label>
                <div class="col-sm-9">
                    <input type="file" class="editInput" name="" id="">
                </div>
            </div>
            <div class="mb-2 row">
                <label for="type_title" class="col-sm-3 col-form-label">Related To <span class="red-text">*</span> </label>
                <div class="col-sm-9">
                    <span class="editInput">Lead Ref</span>
                </div>
            </div>
            <!-- <div class="mb-2 row">
                <label for="calls_telephone" class="col-sm-3 col-form-label">Notify? </label>
                <div class="col-sm-9">
                    <input class="form-check-input notify_radio2" type="radio" name="notify_radio" id="notify_radio2" value="0" checked>
                    <label class="form-check-label editInput" for="notify_radio1"> No </label>
                    <input class="form-check-input notify_radio1" type="radio" name="notify_radio" id="notify_radio1" value="1">
                    <label class="form-check-label editInput" for="notify_radio2"> Yes </label>
                </div>
            </div> -->
            <!-- <div class="notification_div">
                <div class="mb-2 row">
                    <label for="user_notifiy" class="col-sm-3 col-form-label">Notify Who?<span class="red-text">*</span> </label>
                    <div class="col-sm-9">
                        <select name="notify_user" class="form-control editInput" id="user_notifiy">
                            <option value=""></option>
                            @foreach($users as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-sm-3 col-form-label">Send As<span class="red-text">*</span> </label>
                    <div class="col-sm-9">
                        <label for="calls_notify_who1" class="editInput"><input type="checkbox" name="notification" id="calls_notify_who1" value="1"> Notification (User Only) </label>
                        <label for="calls_notify_who2" class="editInput"><input type="checkbox" name="sms" id="calls_notify_who2" value="1"> SMS </label>
                        <label for="calls_notify_who3" class="editInput"><input type="checkbox" name="email" id="calls_notify_who3" value="1"> Email </label>
                    </div>
                </div>
            </div>
            <div class="mb-2 row">
                <label for="inputCity" class="col-sm-3 col-form-label">Customer Visible? </label>
                <div class="col-sm-9">
                    <input class="form-check-input" type="radio" name="customer_visible" id="flexRadioDefault1" value="0" checked>
                    <label class="form-check-label editInput" for="flexRadioDefault1">No</label>
                    <input class="form-check-input" type="radio" name="customer_visible" id="flexRadioDefault2" value="1">
                    <label class="form-check-label editInput" for="flexRadioDefault2">Yes</label>
                </div>
            </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="profileDrop" id="">Close</button>
        <button type="button" class="profileDrop" id="saveCRMTypes">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- CRM Add Email Modal End -->

<!-- ****************End CRM History Modal ****************-->
 <!-- Moment js CDN -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

<script>

    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // start here js for time start and pause
        let timerInterval;
        let elapsedSeconds = 0;
        let isRunning = false;

        function toggleTimer() {
            if (isRunning) {
                // Pause the timer
                clearInterval(timerInterval);
                document.getElementById('toggleTimerBtn').innerHTML = '<i class="fa fa-play"></i> Start';
            } else {
                // Start the timer
                timerInterval = setInterval(function() {
                    elapsedSeconds++;
                    document.getElementById('timerDisplay').textContent = formatTime(elapsedSeconds);
                }, 1000);
                document.getElementById('toggleTimerBtn').innerHTML = '<i class="fa fa-stop"></i> Pause';
            }
            isRunning = !isRunning; // Toggle the running state
        }

        function formatTime(seconds) {
            const hrs = Math.floor(seconds / 3600);
            const mins = Math.floor((seconds % 3600) / 60);
            const secs = seconds % 60;
            return `${pad(hrs)}:${pad(mins)}:${pad(secs)}`;
        }

        function pad(number) {
            return number < 10 ? '0' + number : number;
        }

        document.getElementById('toggleTimerBtn').addEventListener('click', toggleTimer);
        // End js for time start and end


        // set the value in cals history table data js Start here
        document.getElementById('pills-Calls-tab').addEventListener('click', function(){
            var lead_ref = document.getElementById('calls_lead_refs').textContent;
            console.log("lead_ref ", lead_ref);
            $.ajax({
                url: '{{ route("lead.ajax.getCRMCallsData") }}',
                method: 'POST',
                data: {lead_ref: lead_ref},
                success: function(response) {
                    console.log(response.data);

                    // Get the table body element
                    const tableBody = document.querySelector('#crmCallData tbody'); 
                    tableBody.innerHTML = '';

                    // Function to populate the table
                    function populateTable(data) {
                        data.forEach(item => {
                            // Create a new row
                            const row = document.createElement('tr');

                            const date = moment(item.created_at).format('DD/MM/YYYY HH:mm');

                            // Create cells and append them to the row
                            const dateCell = document.createElement('td');
                            dateCell.textContent = date;
                            row.appendChild(dateCell);

                            const nameCell = document.createElement('td');
                            nameCell.textContent = item.user_id;
                            row.appendChild(nameCell);

                            const phoneCell = document.createElement('td');
                            phoneCell.textContent = item.telephone;
                            row.appendChild(phoneCell);

                            const typeCell = document.createElement('td');
                            typeCell.textContent = item.title;
                            row.appendChild(typeCell);

                            const notesCell = document.createElement('td');
                            notesCell.innerHTML = 'Call Logged from '+lead_ref+'<br> <strong>Notes: </strong> '+item.notes;
                               
                            row.appendChild(notesCell);

                            const visibilityCell = document.createElement('td');
                            if(item.customer_visibility == 0){
                                visibilityCell.innerHTML = '<span class="grayCheck"><i class="fa-solid fa-circle-check"></i></span>';
                            } else if(item.customer_visibility == 1){
                                visibilityCell.innerHTML = '<span class="grencheck"><i class="fa-solid fa-circle-check"></i></span>';
                            }
                            row.appendChild(visibilityCell);

                            const idCell = document.createElement('td');
                            idCell.innerHTML = '<i class="fa fa-phone"></i>'+" "+'<i class="fa fa-envelope"></i>'+" "+'<i class="fa fa-list-ul"></i>'+" "+'<i class="fa fa-file"></i>'+" "+'<i class="fa fa-exclamation-triangle"></i>';
                            row.appendChild(idCell);

                            // Append the row to the table body
                            tableBody.appendChild(row);
                        });
                    }

                    // Call the function to populate the table with the data array
                    populateTable(response.data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

        });
        // set the value in cals history table data js End here

        document.querySelectorAll('.set_value_on_CRM_model').forEach(function(anchor) {
            anchor.addEventListener('click', function(event) {
                event.preventDefault();
                // Get the user ID from the data-user-id attribute of the anchor tag
                var userId = anchor.getAttribute('data-user-id');
                document.getElementById('calls_contact_name').textContent = anchor.getAttribute('data-contact-name');  
                document.getElementById('calls_lead_ref').textContent  =  anchor.getAttribute('data-ref');  
                document.getElementById('calls_lead_refs').textContent  =  anchor.getAttribute('data-ref');  
                document.getElementById('calls_status').textContent  =  anchor.getAttribute('data-status');  
                document.getElementById('calls_telephone').textContent  =  anchor.getAttribute('data-telephone');  
                document.getElementById('calls_email').textContent  = anchor.getAttribute('data-email');  
                document.getElementById('related_To').textContent  =  anchor.getAttribute('data-ref');  
                document.getElementById('relatedTo').textContent  =  anchor.getAttribute('data-ref');  
                document.getElementById('call_lead_ref').textContent  =  anchor.getAttribute('data-ref');  
                document.getElementById('call_lead_ref_data').value  =  anchor.getAttribute('data-ref');  

                
                // Open the modal
                $('#customerPop').modal('show');
            });
        });

        // Ajax Call for saving CRM section Type
        $('#saveCRMTypes').on('click', function() {
            var formData = $('#crm_section_type_form').serialize();
            $.ajax({
                url: '{{ route("lead.ajax.saveCRMSectionType") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#crmTypeModel').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Ajax call for getting CRM Section Types
        $('#calls_type').on('click', function() {
            $.ajax({
                url: '{{ route("lead.ajax.getCRMTypeData") }}',
                method: 'GET',
                success: function(response) {
                    console.log(response.Data);
                    const selectElement = document.getElementById('calls_type');
                    selectElement.innerHTML = '';
                    response.Data.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.id;
                        option.text = user.title;
                        selectElement.appendChild(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Ajax call for getting Country Code and Country Name
        $('#countries').on('click', function() {
            $.ajax({
                url: '{{ route("ajax.getCountriesList") }}',
                method: 'GET',
                success: function(response) {
                    console.log(response.Data);
                    const selectElement = document.getElementById('countries');
                    selectElement.innerHTML = '';
                    response.Data.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.code;
                        option.text = "+"+" "+user.code+" - "+" "+user.name;
                        selectElement.appendChild(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Ajax for Add Task Type
        $('#saveTaskType').on('click', function() {
            var formData = $('#lead_task_type_form').serialize();

            $.ajax({
                url: '{{ route("lead.ajax.saveLeadTaskType") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#thirdModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Ajax Call for adding lead Reject Type
        $('#lead_reject').on('click', function() {
            var formData = $('#lead_reject_type_form_edit').serialize();

            $.ajax({
                url: '{{ route("lead.ajax.saveLeadRejectTypes") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#secondModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Ajax Call for adding Lead Reject Reasons
        $('#lead_reject_reason').on('click', function() {
            var formData = $('#lead_reject_reason_form').serialize();
            $.ajax({
                url: '{{ route("lead.ajax.saveLeadRejectReasons") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#secondModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // js start here for calls model open and close
        const openCallsModel = document.getElementById('openCallsModel');
        const callsModel = document.getElementById('callsModal');
        const closeCallsModel = document.getElementById('closeCallsModels');

        // When the user clicks the button, open the modal 
        openCallsModel.onclick = function() {
            $('#callsModal').modal('show');
        }

        // When the user clicks on <span> (x), close the modal
        closeCallsModel.onclick = function() {
            $('#callsModal').modal('hide');
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target === callsModel) {
                $('#callsModal').modal('hide');
            }
        }
        // js End here for calls model open and close

        // Js Start for CRM Section Type model show
        const openModalBtn = document.getElementById('openCrmTypeModel');
        const crmTypeModel = document.getElementById('crmTypeModel');
        const closeModalBtn = document.getElementById('closeCrmModalBtn');

        // When the user clicks the button, open the modal 
        openModalBtn.onclick = function() {
            $('#crmTypeModel').modal('show');
        }

        // When the user clicks on <span> (x), close the modal
        closeModalBtn.onclick = function() {
            $('#crmTypeModel').modal('hide');
        }

        window.onclick = function(event) {
            if (event.target === crmTypeModel) {
                $('#crmTypeModel').modal('hide');
            }
        }
        // Js End for CRM Section Type model show


        notification_div.style.display = 'none';

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

        mainCheckbox.addEventListener('change', function() {
            if (mainCheckbox.checked) {
                optionsDiv.style.display = 'block';
            } else {    
                optionsDiv.style.display = 'none';
            }
        });

        $('.open-modal').on('click', function() {
            var lead_ref = $(this).data('lead_ref');
            $('#lead_ref').val(lead_ref);
        });

        $('#openNewEmail').on('click', function() {
            $('#NewEmailModel').modal('show');  
        });

    });
    
    // notification Div hide show on radio button js start
    const notify_radio1 = document.getElementsByClassName('notify_radio1');
    const notify_radio2 = document.getElementsByClassName('notify_radio2');
    const notification_div = document.getElementsByClassName('notification_div');

    notify_radio1.addEventListener('change', function() {
        if (notify_radio1.checked) {
            notification_div.style.display = 'block';
        }
    });

    notify_radio2.addEventListener('change', function() {
        if (notify_radio2.checked) {
            notification_div.style.display = 'none';
        }
    });
    // notification Div hide show on radio button js End

    
    const openPopupButton2 = document.getElementById('openPopupButton2');
    const popup2 = document.getElementById('popup2');
    const closePopup2 = document.getElementById('closePopup');

    const openPopupButton = document.getElementById('openPopupButton');
    const popup = document.getElementById('popup');
    const closePopup = document.getElementById('closePopup');


    // Add event listeners to the radio buttons
  

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

    
</script>

<!-- Script For adding CK editor start -->
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font,
        Underline,
        Alignment 
    } from 'ckeditor5';

    ClassicEditor
        .create(document.querySelector('#editor'), {
            plugins: [Essentials, Paragraph, Bold, Italic, Underline, Font, Alignment ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic',  'underline', 'alignment', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        })
        .then(editor => {
            window.editor = editor;
            // Add a click event listener to the save button
            document.getElementById('saveCRMCallsModelData').addEventListener('click', function() {

                // Get the CKEditor content
                document.getElementById('calls_notes').value = editor.getData();
                console.log(document.getElementById('calls_notes').value);
                var formData = $('#CRM_calls_form').serialize();

                $.ajax({
                    url: '{{ route("lead.ajax.saveCRMLeadData") }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        alert(response.message);
                        $('#callsModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>
<!-- Script For adding CK editor End -->
@include('frontEnd.jobs.layout.footer')