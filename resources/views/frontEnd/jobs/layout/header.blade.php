<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCITS</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    <link rel="stylesheet" href="https://www.ville-pont-eveque.fr/tools/library/DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://www.ville-pont-eveque.fr/tools/library/DataTables/extensions/Select/css/select.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/ckeditor.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        table.dataTable td.select-checkbox:before {
            display: none;
        }

        .modal.show .modal-dialog {
            box-shadow: 0px 0px 10px #34343447;
        }
    </style>
</head>
<?php
$rights = App\User::where('id', Auth::user()->id)->where('is_deleted', 0)->first()->access_rights;
$access_rights = explode(',', $rights);
?>

<body>
    <header>

        <div class="topbaar">
            <div class="container-fluid bg-light p-0">
                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-lg-3 px-3 text-start">
                        <div class="h-100 d-inline-flex align-items-center py-1 ms-3">
                            <a href="{{url('jobs_index')}}" class="brand_logo"><img src="{{ url('public/images/ewm_logo.png')}}" alt="ewm_logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 px-3 text-end toprigihticon">
                        <?php //if (isset($page) && $page == 'job_index') { ?>
                            <div class="d-inline-flex align-items-center me-5 topbaarBtn">
                                <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> storage</i> My Diary</a>
                                <a href="#!" class="profileDrop" data-bs-toggle="modal" data-bs-target="#CRMHeaderPopup"> <i class="material-symbols-outlined"> dashboard</i> CRM</a>
                                <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> contact_support </i> Help Desk <span class="notifiNumberRadColor">2</span></a>
                                <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> mail </i> Messages </a>
                                <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> notifications_active </i> Notifications <span class="notifiNumberRadColor">23</span> </a>
                                <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> handshake </i> Partners </a>
                            </div>
                        <?php //} else { ?>

                            <!-- <div class="h-100 d-inline-flex align-items-center me-5">
                                <a class="btn btn-sm-square bg-white text-primary me-1" href="#!"><i class="material-symbols-outlined"> group</i></a>
                                <a class="btn btn-sm-square bg-white text-primary me-1" href="#!"><i class="material-symbols-outlined"> dns</i></a>
                                <a class="btn btn-sm-square bg-white text-primary me-1" href="#!"><i class="material-symbols-outlined"> mail </i></a>
                                <a class="btn btn-sm-square bg-white text-primary me-0" href="#!"><i class="material-symbols-outlined"> notifications </i></a>
                            </div> -->
                        <?php //} ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="menubaar">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light sticky-top px-3">

                    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ml-auto p-4 p-lg-0">

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-item nav-link dropdown-toggle @if(isset($page)) @if($page == 'leads') active @endif @endif" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> keep_public </i></span>
                                    Lead
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="{{ url('/leads/add') }}" class="dropdown-item">New Lead</a>
                                    <a href="{{ url('/leads/leads') }}" class="dropdown-item">All Lead</a>
                                    <a href="{{ url('/lead/myLeads') }}" class="dropdown-item">My Leads</a>
                                    <a href="{{ url('/leads/unassigned') }}" class="dropdown-item">Unassigned Lead</a>
                                    <a href="{{ url('/leads/actioned') }}" class="dropdown-item">Actioned Lead</a>
                                    <a href="{{ url('/leads/rejected') }}" class="dropdown-item">Rejected Lead</a>
                                    <a href="{{ url('/lead/authorization') }}" class="dropdown-item">Authorization</a>
                                    <a href="{{ url('/leads/converted') }}" class="dropdown-item">Converted Lead</a>
                                    <a href="{{ url('/leads/search_lead') }}" class="dropdown-item">Search Lead</a>
                                    <a href="{{ url('/leads/tasks') }}" class="dropdown-item">Lead Task</a>
                                </div>
                            </div>


                            <div class="nav-item1 dropdown1">
                                <a class="nav-link dropdown-toggle @if(isset($page)) @if($page == 'quotes') active @endif @endif" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i class="material-symbols-outlined"> description </i></span> Quotes
                                </a>
                                <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                    <li class="nav-item1"><a href="{{ url('/quote/dashboard') }}" class="dropdown-item">Dashboard</a></li>
                                    <li class="nav-item1"><a href="{{ url('/quote/quotes') }}" class="dropdown-item">New Quote</a></li>
                                    <li class="nav-item1"><a href="{{ url('/quote/draft') }}" class="dropdown-item">Draft Quote</a></li>
                                    <li class="nav-item1"><a href="#!" class="dropdown-item">Actioned Quote</a></li>
                                    <li class="nav-item1"><a href="#!" class="dropdown-item">Call Back Quote</a></li>
                                    <li class="nav-item1"><a href="#!" class="dropdown-item">Accepted Quote</a></li>
                                    <li class="nav-item1"><a href="#!" class="dropdown-item">Converted Quote</a></li>
                                    <li class="nav-item1"><a href="#!" class="dropdown-item">Search Quote</a></li>

                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Appointment <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">Sales Appointments</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Recurring Quote <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">New Recurring Quote</a></li>
                                            <li><a class="dropdown-item" href="#">Recurring Quote</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>




                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link dropdown-toggle @if(isset($page)) @if($page == 'jobs') active @endif @endif" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined">work </i></span>
                                    Jobs
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">Dashboard</a>
                                    <a href="{{url('/jobs_create')}}" class="dropdown-item">New Jobs</a>
                                    <a href="{{url('jobs_list')}}" class="dropdown-item">Active Jobs</a>

                                    <?php
                                    if (array_key_exists(314, $access_rights)) { ?>
                                        <a href="{{url('job_type')}}" class="dropdown-item">Job Type</a>
                                    <?php } ?>

                                    <a href="#!" class="dropdown-item">Action Required Jobs</a>
                                    <a href="#!" class="dropdown-item">Overdue Jobs</a>
                                    <a href="#!" class="dropdown-item">Authorization Jobs</a>
                                    <a href="#!" class="dropdown-item">On Hold</a>
                                    <a href="#!" class="dropdown-item">Search Jobs</a>
                                    <a href="#!" class="dropdown-item">Appointments</a>
                                    <a href="#!" class="dropdown-item">Recurring Jobs</a>

                                </div>
                            </div>

                            <!-- {{url('planner_day')}} -->
                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> planner_review </i></span>
                                    Planner
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">Time Planner</a>
                                    <a href="#!" class="dropdown-item">Project Planner</a>
                                    <a href="#!" class="dropdown-item">Geo Planner</a>
                                    <a href="#!" class="dropdown-item">Vehicle Tracking</a>
                                    <a href="#!" class="dropdown-item">Mobile Tracking</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> business_center</i></span>
                                    Projects
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">New Project</a>
                                    <a href="#!" class="dropdown-item">Active Projects</a>
                                    <a href="#!" class="dropdown-item">Inactive Projects</a>
                                    <a href="#!" class="dropdown-item">Completed Projects</a>
                                </div>
                            </div>

                            <div class="nav-item1 dropdown1">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i class="material-symbols-outlined">finance_mode </i></span> Finance
                                </a>
                                <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Customers <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                            <li><a class="dropdown-item" href="#">New Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">Draft Invoices</a></li>
                                            <li><a class="dropdown-item" href="#">Outstanding Invoices</a></li>
                                            <li><a class="dropdown-item" href="#">Overdue Invoices</a></li>
                                            <li><a class="dropdown-item" href="#">Paid Invoices</a></li>
                                            <li><a class="dropdown-item" href="#">Search Invoices</a></li>
                                            <li><a class="dropdown-item" href="#">Account Statements</a></li>
                                            <li><a class="dropdown-item" href="#">Reminders</a></li>
                                            <li class="nav-item1 dropend">
                                                <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span>Recurring Invoices</span> <i class="fa-solid fa-angle-right"></i>
                                                </a>
                                                <ul class="dropdown-menu1">
                                                    <li><a class="dropdown-item" href="#">New Recurring Invoice</a></li>
                                                    <li><a class="dropdown-item" href="#">Recurring Invoices</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item1 dropend">
                                                <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span>Credit Notes</span> <i class="fa-solid fa-angle-right"></i>
                                                </a>
                                                <ul class="dropdown-menu1">
                                                    <li><a class="dropdown-item" href="#">New Credit Note</a></li>
                                                    <li><a class="dropdown-item" href="#">Draft Credit Notes</a></li>
                                                    <li><a class="dropdown-item" href="#">Awaiting Approval Credit Notes</a></li>
                                                    <li><a class="dropdown-item" href="#">Approval Credit Notes</a></li>
                                                    <li><a class="dropdown-item" href="#">Paid Credit Notes</a></li>
                                                    <li><a class="dropdown-item" href="#">Cancelled Credit Notes</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span>Suppliers</span> <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                            <li><a class="dropdown-item" href="#">New Purchase Order</a></li>
                                            <li><a class="dropdown-item" href="#">Draft Purchase Orders</a></li>
                                            <li><a class="dropdown-item" href="#">Awaiting Approval Purchase Orders</a></li>
                                            <li><a class="dropdown-item" href="#">Approved Purchase Orders </a></li>
                                            <li><a class="dropdown-item" href="#">Active Customers</a></li>
                                            <li><a class="dropdown-item" href="#">Rejected Purchase Orders </a></li>
                                            <li><a class="dropdown-item" href="#">Paid Purchase Orders</a></li>
                                            <li><a class="dropdown-item" href="#">Actioned Purchase Orders</a></li>
                                            <li><a class="dropdown-item" href="#">Invoices Received</a></li>
                                            <li><a class="dropdown-item" href="#">Purchase Orders Statements</a></li>
                                            <li><a class="dropdown-item" href="#">Recurring Purchase Orders</a></li>
                                            <li><a class="dropdown-item" href="#">Credit Notes</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav-item1 dropdown1">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i class="material-symbols-outlined"> contact_support </i></span> Contacts
                                </a>
                                <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Customers <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="{{url('customer_add_edit')}}">New Customers</a></li>
                                            <li><a class="dropdown-item" href="{{ url('customers?list_mode=ACTIVE') }}">Active Customers</a></li>
                                            <li><a class="dropdown-item" href="{{ url('customers?list_mode=INACTIVE') }}">Inactive Customers</a></li>
                                            <li><a class="dropdown-item" href="#">Customers Logins</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Suppliers <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">New Customers</a></li>
                                            <li><a class="dropdown-item" href="#">Active Customers</a></li>
                                            <li><a class="dropdown-item" href="#">Inactive Customers</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> production_quantity_limits</i></span>
                                    Items
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">Product Categories</a>
                                    <a href="#!" class="dropdown-item">Products</a>
                                    <a href="#!" class="dropdown-item">Product Groups</a>
                                    <a href="#!" class="dropdown-item">Catalogues</a>
                                </div>
                            </div>



                            <a href="#" class="nav-item nav-link">
                                <span><i class="material-symbols-outlined"> calculate </i></span>
                                Expenses
                            </a>
                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> diversity_2 </i></span>
                                    Users
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">Users </a>
                                    <a href="#!" class="dropdown-item">Team Members</a>
                                    <a href="#!" class="dropdown-item">Timeoff </a>
                                    <a href="#!" class="dropdown-item">Lone Worker Active List</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> partner_reports </i></span>
                                    Reports
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">Customers</a>
                                    <a href="#!" class="dropdown-item"> Quote</a>
                                    <a href="#!" class="dropdown-item"> Jobs</a>
                                    <a href="#!" class="dropdown-item"> Invoices</a>
                                    <a href="#!" class="dropdown-item"> Users</a>
                                    <a href="#!" class="dropdown-item"> Purchase Orders</a>
                                    <a href="#!" class="dropdown-item"> Products</a>
                                    <a href="#!" class="dropdown-item"> Vehicle Tracking</a>
                                    <a href="#!" class="dropdown-item"> SMS Report</a>
                                    <a href="#!" class="dropdown-item"> Email Report</a>
                                    <a href="#!" class="dropdown-item"> Reminder Report</a>
                                    <a href="#!" class="dropdown-item"> Task Report</a>
                                    <a href="#!" class="dropdown-item"> Report Builder</a>

                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> bookmark_manager</i></span>
                                    FileManager
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">Attachments </a>
                                    <a href="#!" class="dropdown-item">Digital Documents</a>
                                    <a href="#!" class="dropdown-item">Completed Questionnaires </a>
                                </div>
                            </div>

                            <div class="nav-item1 dropdown1">
                                <a class="nav-link dropdown-toggle @if(isset($page)) @if($page == 'setting') active @endif @endif" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i class="material-symbols-outlined"> construction</i></span> Settings
                                </a>
                                <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                    <li class="nav-item1"><a class="dropdown-item" href="#" role="button"> General Settings</a></li>
                                    <li class="nav-item1"><a class="dropdown-item" href="#" role="button"> Digital Doc. Manager</a></li>
                                    <li class="nav-item1"><a class="dropdown-item" href="#" role="button"> Questionnaires</a></li>
                                    <li class="nav-item1"><a class="dropdown-item" href="#" role="button"> Template Editor</a></li>
                                    <li class="nav-item1"><a class="dropdown-item" href="#" role="button"> Custom Field Management</a></li>
                                    <li class="nav-item1"><a class="dropdown-item" href="#" role="button"> Triggers</a></li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Leads <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">Lead Settings</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/lead/lead_sources') }}"> <i class="fa fa-list-ul"></i> Lead Sources</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/lead/lead_status') }}"><i class="fa fa-list-ul"></i>Lead Status</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/lead/lead_task_type') }}"><i class="fa fa-list-ul"></i>Lead Task Types</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/lead/lead_reject_types') }}"><i class="fa fa-list-ul"></i>Lead Reject Types</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/lead/lead_notes_type') }}"><i class="fa fa-list-ul"></i>Lead Notes Type</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Quotes <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="{{ url('/quote/quote_type') }}"><i class="fa fa-list-ul"></i>Quote Type </a></li>
                                            <li><a class="dropdown-item" href="{{ url('/quote/quote_sources') }}"><i class="fa fa-list-ul"></i>Quote Source </a></li>
                                            <li><a class="dropdown-item" href="{{ url('/quote/quote_reject_types') }}"><i class="fa fa-list-ul"></i>Quote Reject Type </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Jobs <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <?php if (array_key_exists(314, $access_rights)) { ?>
                                                <li><a class="dropdown-item" href="{{url('job_type')}}">Job Type </a></li>
                                            <?php } ?>
                                            <li><a class="dropdown-item" href="#">Job Appointment Type </a></li>
                                            <li><a class="dropdown-item" href="#">Appointment Rejection Categories </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Invoices <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">Account Codes </a></li>
                                            <li><a class="dropdown-item" href="#">Tax Rate </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Purchase Orders <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">Departments </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Customers <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">Customer Type </a></li>
                                            <li><a class="dropdown-item" href="#">Customer Job Title </a></li>
                                            <li><a class="dropdown-item" href="#">Complaint Type </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Users <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">User Type </a></li>
                                            <li><a class="dropdown-item" href="#">User Profiles </a></li>
                                            <li><a class="dropdown-item" href="#">User Working Areas </a></li>
                                            <li><a class="dropdown-item" href="#">Personal Time Type </a></li>
                                            <li><a class="dropdown-item" href="#">User Contractors </a></li>
                                            <li><a class="dropdown-item" href="#">User Location </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            CRM <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="{{ url('/lead/CRM_section_types') }}"><i class="fa fa-list-ul"></i> CRM Section Types </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1 dropend">
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            General <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                            <li><a class="dropdown-item" href="#">Attachment Types </a></li>
                                            <li><a class="dropdown-item" href="#">Payment Types </a></li>
                                            <li><a class="dropdown-item" href="#">Regions </a></li>
                                            <li><a class="dropdown-item" href="#">Task Types </a></li>
                                            <li><a class="dropdown-item" href="#">Tags </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item1"><a class="dropdown-item" href="#" role="button"> Quick Setup Wizard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal CRMFullModel fade" id="CRMHeaderPopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content add_Customer">
                <div class="modal-header terques-bg">
                    <h5 class="modal-title pupTitle" id="CRMHeaderPopupLabel">CRM View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body crmModelCont pt-2">
                    <div class="jobsection pb-2 hideandshow">
                        <button class="profileDrop" id="onclickbtnHideShow">Hide/Show</button>
                    </div>
                    <div id="showDivCont">
                        <div class="newJobForm mb-4 p-1 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <h4 class="contTitle text-center">Contact Details</h4>
                                    </div>
                                    <div class="row pt-3">
                                        <label class="col-md-4 col-form-label"> <strong>Full Name:</strong></label>
                                        <div class="col-md-8">
                                            <span id="" class="editInput"> Arjun Kumar</span>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <label class="col-md-4 col-form-label"> <strong>Email Address:</strong></label>
                                        <div class="col-md-8">
                                            <span id="" class="editInput">arjun@gmail.com</span>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <label class="col-md-4 col-form-label"> <strong>Telephone:</strong></label>
                                        <div class="col-md-8">
                                            <span id="" class="editInput">+91-1234567890</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <h4 class="contTitle text-center"> <strong>Lead Details</strong></h4>
                                    </div>
                                    <div class="row pt-3">
                                        <label class="col-md-4 col-form-label"><strong>Lead Ref.:</strong></label>
                                        <div class="col-md-8">
                                            <span id="" class="editInput">Default</span>
                                            <input type="hidden" id="" name="">

                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <label class="col-md-4 col-form-label"> <strong>Lead Status:</strong></label>
                                        <div class="col-md-8">
                                            <span id="" class="editInput">425</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-userCRMfullHistory-tab" data-bs-toggle="pill" data-bs-target="#CRMpills-fullHistory" type="button" role="tab" aria-controls="pills-fullHistory" aria-selected="true">Full History</button>
                        </li>
                        <li class="nav-item" role="presentation">

                            <button class="nav-link" id="" data-bs-toggle="pill" data-bs-target="#CRMpills-Calls" type="button" role="tab" aria-controls="pills-Calls" aria-selected="false" tabindex="-1">Calls</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="" data-bs-toggle="pill" data-bs-target="#CRMpills-emails" type="button" role="tab" aria-controls="pills-emails" aria-selected="false" tabindex="-1">Emails</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="" data-bs-toggle="pill" data-bs-target="#CRMpills-tasks" type="button" role="tab" aria-controls="pills-tasks" aria-selected="false" tabindex="-1">Tasks</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="" data-bs-toggle="pill" data-bs-target="#CRMpills-notes" type="button" role="tab" aria-controls="pills-notes" aria-selected="false" tabindex="-1">Notes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="" data-bs-toggle="pill" data-bs-target="#CRMpills-complaints" type="button" role="tab" aria-controls="pills-complaints" aria-selected="false" tabindex="-1">Complaints</button>
                        </li>
                    </ul>



                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="CRMpills-fullHistory" role="tabpanel" aria-labelledby="pills-userCRMfullHistory-tab" tabindex="0">
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
                        <div class="tab-pane fade" id="CRMpills-Calls" role="tabpanel" aria-labelledby="pills-userCRMCalls-tab" tabindex="0">
                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Calls History</label>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="jobsection  mt-3">
                                            <a href="#" class="profileDrop p-2 crmNewBtn" id="userCRMCallsModel"> New</a>
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
                                            <table class="table" id="">
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
                        <div class="tab-pane fade" id="CRMpills-emails" role="tabpanel" aria-labelledby="pills-userCRMemails-tab" tabindex="0">
                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Emails History</label>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="jobsection  mt-3">
                                            <a href="#" class="profileDrop p-2 crmNewBtn" id="userNewEmail"> New</a>
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
                                            <table class="table" id="">
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
                        <div class="tab-pane fade" id="CRMpills-tasks" role="tabpanel" aria-labelledby="pills-userCRMtasks-tab" tabindex="0">
                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Tasks</label>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="jobsection  mt-3">
                                            <a href="#" class="profileDrop p-2 crmNewBtn open-modal" data-target="bd-example-modal-lg" id="userNewTaskpop"> New</a>
                                        </div>
                                    </div>
                                    <!-- task popup****************************** -->


                                    <!-- Second Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="TasksecondModal" tabindex="-1" aria-labelledby="secondModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg mediamSizePopup">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="">New Task</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeTaskpopup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- tab -->
                                                    <nav>
                                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                            <button class="nav-link active" id="CRMnav-Task-tab" data-bs-toggle="tab" data-bs-target="#CRMnav-Task" type="button" role="tab" aria-controls="nav-Task" aria-selected="true">Task</button>
                                                            <button class="nav-link" id="CRMnav-Timer-tab" data-bs-toggle="tab" data-bs-target="#CRMnav-Timer" type="button" role="tab" aria-controls="nav-Timer" aria-selected="false">Timer</button>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                                        <div class="tab-pane fade active show" id="CRMnav-Task" role="tabpanel" aria-labelledby="CRMnav-Task-tab">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <form>
                                                                        <div class="mb-3 row">
                                                                            <label for="staticEmail" class="col-sm-4 col-form-label">Task User</label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control editInput" name="" id="">
                                                                                    <option>task1</option>
                                                                                </select>
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

                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <a href="#!" class="formicon" id="userThirdModal"><i class="fa-solid fa-square-plus"></i></a>
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
                                                                        <!-- <div class="mb-3 row">
                                                                            <label class="col-sm-4 col-form-label">Is Reccurring Task ?</label>
                                                                            <div class="col-sm-4">
                                                                               <input type="checkbox" class="form-check-input editInput" id="exampleCheck1">
                                                                            </div>
                                                                        </div> -->
                                                                    </form>
                                                                </div>
                                                                <div class="col-6">
                                                                    <form>
                                                                        <div class="mb-3 row">
                                                                            <label for="staticEmail" class="col-sm-3 col-form-label">Notify ? </label>
                                                                            <div class="col-sm-9">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <div class="form-check form-check-inline me-0">
                                                                                            <input class="form-check-input" type="checkbox" name="inlinecheckOptions" id="CRMyeson" value="option1" required="">
                                                                                            <label class="col-form-label " for="CRMyeson">Yes, On</label>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-sm-9">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-6">
                                                                                                <input type="date" class="form-control editInput" id="notify_date" name="notify_date">
                                                                                            </div>
                                                                                            <div class="col-sm-6">
                                                                                                <input type="time" class="form-control editInput" id="notify_time" name="notify_time">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3"></div>
                                                                            <div class="col-sm-9">
                                                                                <div id="CRMoptionsDiv">
                                                                                    <label class="editInput"><input type="checkbox" value="1" id="notificationCheckbox" name="notification"> Notification</label>
                                                                                    <label class="editInput"><input type="checkbox" value="1" id="emailCheckbox" name="email_notify"> Email</label>
                                                                                    <label class="editInput"><input type="checkbox" value="1" id="smsCheckbox" name="sms_notify"> SMS</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 row">
                                                                            <label for="related_to" class="col-sm-3 col-form-label">Related To</label>
                                                                            <div class="col-sm-9">
                                                                                <span class="editInput" id=""></span>

                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="staticEmail" class="col-sm-3 col-form-label">Notes</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea name="" class="form-control textareaInput" rows="5" id=""></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>

                                                            <form class="">
                                                             
                                                            </form>

                                                        </div>
                                                        <div class="tab-pane fade" id="CRMnav-Timer" role="tabpanel" aria-labelledby="CRMnav-Timer-tab">
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
                                                                                <input type="text" class="form-control" name="" id="staticEmail" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="staticEmail" class="col-sm-4 col-form-label">Timer</label>
                                                                            <div class="col-sm-8">
                                                                                <button class="profileDrop" id=""><i class="fa fa-play"></i> Start</button>
                                                                                <span id="">00:00:00</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 row">
                                                                            <label for="related_to" class="col-sm-4 col-form-label">Related To</label>
                                                                            <div class="col-sm-8">
                                                                                <span class="editInput" id=""></span>
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
                                                                                    <option>Select</option>
                                                                                </select>

                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <a href="#!" class="formicon" id=""><i class="fa-solid fa-square-plus"></i></a>
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
                                                        <button type="button" class="profileDrop" data-bs-dismiss="modal" id="closeTaskpopup">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end task popup****************************** -->

                                    <!-- ******************************add task third type******************************* -->

                                    <!-- Third Modal -->
                                    <div class="modal fade" id="third3Modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="thirdModalLabel">Add Task Type</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close3Taskpopup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" id="">
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
                                                            <a href="#" class="profileDrop p-2 crmNewBtn" id=""> Save</a>
                                                            <button type="button" class="profileDrop" data-bs-dismiss="modal" id="close3Taskpopup">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- ******************************End add task third type******************************* -->


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
                        <div class="tab-pane fade" id="CRMpills-notes" role="tabpanel" aria-labelledby="pills-userCRMnotes-tab" tabindex="0">
                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Notes</label>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="jobsection  mt-3">
                                            <a href="#!" class="profileDrop p-2 crmNewBtn" id="userNotesModel"> New</a>
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
                                            <table class="table" id="">
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
                        <div class="tab-pane fade" id="CRMpills-complaints" role="tabpanel" aria-labelledby="pills-userCRMcomplaints-tab" tabindex="0">
                            <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Complaints History</label>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="jobsection  mt-3">
                                            <a href="#" class="profileDrop p-2 crmNewBtn" id="userCompliantsModal"> New</a>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn profileDrop">Understood</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Calls History new Popup -->

    <!-- Calls Modal -->
    <div class="modal fade" id="userCallsModal" tabindex="-1" aria-labelledby="callsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Calls</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeUserCallsModels"></button>
                </div>
                <div class="modal-body">
                    <form action="" class="customerForm" id="">
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
                                <select class="form-control editInput selectOptions" required="" name="country_code" id="">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control editInput" id="" name="telephone" placeholder="Telephone">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="calls_type" class="col-sm-3 col-form-label">Type <span class="red-text">*</span> </label>
                            <div class="col-sm-7">
                                <select name="crm_type_id" class="form-control editInput">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a href="#!" class="formicon" id="userCRMTypeModel"><i class="fa-solid fa-square-plus"></i></a>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="calls_notes" class="col-sm-3 col-form-label">Notes <span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <div id="UserEditor">
                                </div>
                                <textarea name="content" id="" style="display: none;"></textarea>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="calls_lead_ref" class="col-sm-3 col-form-label">Related To </label>
                            <div class="col-sm-9">
                                <span class="editInput">LEAD-0021</span>
                                <input type="hidden" name="lead_ref">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="calls_telephone" class="col-sm-3 col-form-label">Notify? </label>
                            <div class="col-sm-9">
                                <input class="form-check-input notify_radio1" type="radio" name="notify_radio" id="" value="0" checked>
                                <label class="form-check-label editInput" for=""> No </label>
                                <input class="form-check-input notify_radio2" type="radio" name="notify_radio" id="" value="1">
                                <label class="form-check-label editInput" for=""> Yes </label>
                            </div>
                        </div>
                        <div class="">
                            <div class="mb-2 row">
                                <label for="user_notifiy" class="col-sm-3 col-form-label">Notify Who?<span class="red-text">*</span> </label>
                                <div class="col-sm-9">
                                    <select name="notify_user" class="form-control editInput" id="user_notifiy">
                                        <option value=""></option>
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
                                <input class="form-check-input" type="radio" name="customer_visible" id="" value="0" checked>
                                <label class="form-check-label editInput" for="">No</label>
                                <input class="form-check-input" type="radio" name="customer_visible" id="" value="1">
                                <label class="form-check-label editInput" for="">Yes</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="profileDrop" id="">Save</button>
                    <button type="button" class="profileDrop" id="closeUserCallsModels" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Calls Modal -->

    <!-- CRM Types Modal Start -->
    <div class="modal fade" id="typeCrmModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add - CRM Section Types</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeCrmModalBtn" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="">
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Type <span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control editInput" name="title" id="type_title" value="">
                                <input type="hidden" class="form-control editInput" name="crm_section" id="" value="1">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="colour_code" class="col-sm-3 col-form-label">Colour Code </label>
                            <div class="col-sm-9">
                                <input type="color" class="form-control editInput" name="colour_code" id="colour_code" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="profileDrop" id="closeCrmModalBtn">Close</button>
                    <button type="button" class="profileDrop" id="">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- CRM Types Modal End -->

    <!-- CRM Add Email Modal Start -->
    <div class="modal fade" id="userEmailModel" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailModalLabel">Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="closepopupBtn" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="" enctype='multipart/form-data'>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">To <span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control editInput" name="crm_lead_email_id" id="">
                                <input type="text" class="form-control editInput" name="to" id="" value="">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Cc </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control editInput" name="cc" id="">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Subject <span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control editInput" name="subject" id="">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Message <span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <div class="col-form-label">
                                    <div id="">
                                    </div>
                                    <textarea name="message" id="" style="display: none;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Attachment </label>
                            <div class="col-sm-9">
                                <input type="file" class="editInput" name="attachment" id="image">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Related To </label>
                            <div class="col-sm-9">
                                <span class="editInput" id=""></span>
                                <input type="hidden" id="" name="lead_id">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="calls_telephone" class="col-sm-3 col-form-label">Notify? </label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="radio" name="notify" id="" value="0" checked>
                                <label class="form-check-label editInput" for=""> No </label>
                                <input class="form-check-input" type="radio" name="notify" id="" value="1">
                                <label class="form-check-label editInput" for=""> Yes </label>
                            </div>
                        </div>
                        <div id="user_notification_email_div">
                            <div class="mb-2 row">
                                <label for="user_notifiy" class="col-sm-3 col-form-label">Notify Who?<span class="red-text">*</span> </label>
                                <div class="col-sm-9">
                                    <select name="notify_user" class="form-control editInput" id="user_notifiy">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Send As<span class="red-text">*</span> </label>
                                <div class="col-sm-9">
                                    <label for="calls_notify_who1" class="editInput">
                                        <input type="checkbox" name="notification" id="calls_notify_who1" value="1"> Notification (User Only)
                                    </label>
                                    <label for="calls_notify_who2" class="editInput">
                                        <input type="checkbox" name="sms" id="calls_notify_who2" value="1"> SMS
                                    </label>
                                    <label for="calls_notify_who3" class="editInput">
                                        <input type="checkbox" name="email" id="calls_notify_who3" value="1"> Email
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="inputCity" class="col-sm-3 col-form-label">Customer Visible? </label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="radio" name="customer_visible" id="" value="0" checked>
                                <label class="form-check-label editInput" for="">No</label>
                                <input class="form-check-input" type="radio" name="customer_visible" id="" value="1">
                                <label class="form-check-label editInput" for="">Yes</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="profileDrop" data-bs-dismiss="modal" id="closepopupBtn">Close</button>
                    <button type="button" class="profileDrop" id="">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- CRM Add Email Modal End -->

    <!-- CRM Add Notes Modal Start -->
    <div class="modal fade" id="NotesCrmModel" tabindex="-1" role="dialog" aria-labelledby="notesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="notesModalLabel">Notes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeNotespopup" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="">
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Type <span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control editInput" name="crm_lead_notes_id" id="">
                                <select class="form-control editInput" name="crm_section_type_id" id=""></select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Notes <span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <div class="col-form-label">
                                    <div id="userNotesEditor">
                                    </div>
                                    <textarea name="notes" id="userCRMNotes" style="display: none;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Related To </label>
                            <div class="col-sm-9">
                                <span class="editInput" id=""></span>
                                <input type="hidden" id="" name="lead_id">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="calls_telephone" class="col-sm-3 col-form-label">Notify? </label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="radio" name="notify" id="" value="0" checked>
                                <label class="form-check-label editInput" for=""> No </label>
                                <input class="form-check-input" type="radio" name="notify" id="" value="1">
                                <label class="form-check-label editInput" for=""> Yes </label>
                            </div>
                        </div>
                        <div id="user_notification_notes_div">
                            <div class="mb-2 row">
                                <label for="user_notifiy" class="col-sm-3 col-form-label">Notify Who?<span class="red-text">*</span> </label>
                                <div class="col-sm-9">
                                    <select name="user_id" class="form-control editInput" id="">
                                        <option>dfgdfg</option>
                                        <option>dtgerdg</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Send As<span class="red-text">*</span> </label>
                                <div class="col-sm-9">
                                    <label for="calls_notify_who1" class="editInput">
                                        <input type="checkbox" name="notification" id="calls_notify_who1" value="1"> Notification (User Only)
                                    </label>
                                    <label for="calls_notify_who2" class="editInput">
                                        <input type="checkbox" name="sms" id="calls_notify_who2" value="1"> SMS
                                    </label>
                                    <label for="calls_notify_who3" class="editInput">
                                        <input type="checkbox" name="email" id="calls_notify_who3" value="1"> Email
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="inputCity" class="col-sm-3 col-form-label">Customer Visible? </label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="radio" name="customer_visibility" id="" value="0" checked>
                                <label class="form-check-label editInput" for="">No</label>
                                <input class="form-check-input" type="radio" name="customer_visibility" id="" value="1">
                                <label class="form-check-label editInput" for="">Yes</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="profileDrop" id="closeNotespopup">Close</button>
                    <button type="button" class="profileDrop" id="">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- CRM Add Notes Modal End -->

    <!-- CRM Add compliants Modal Start -->
    <div class="modal fade" id="CompHistoryModal" tabindex="-1" role="dialog" aria-labelledby="compliantsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="compliantsModalLabel">Complaint</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeUserComplaintpopup" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="">
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Type <span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control editInput" name="crm_lead_complaint_id" id="">
                                <select class="form-control editInput" name="crm_section_type_id" id="">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Notes <span class="red-text">*</span> </label>
                            <div class="col-sm-9">
                                <div class="col-form-label">
                                    <div id="userComplaintEditor">
                                    </div>
                                    <textarea name="compliant" id="userCRMComplaint" style="display: none;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="type_title" class="col-sm-3 col-form-label">Related To </label>
                            <div class="col-sm-9">
                                <span class="editInput" id=""></span>
                                <input type="hidden" id="" name="lead_id">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="" class="col-sm-3 col-form-label">Notify? </label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="radio" name="notify" id="" value="0" checked>
                                <label class="form-check-label editInput" for=""> No </label>
                                <input class="form-check-input" type="radio" name="notify" id="" value="1">
                                <label class="form-check-label editInput" for=""> Yes </label>
                            </div>
                        </div>
                        <div id="">
                            <div class="mb-2 row">
                                <label for="user_notifiy" class="col-sm-3 col-form-label">Notify Who?<span class="red-text">*</span> </label>
                                <div class="col-sm-9">
                                    <select name="user_id" class="form-control editInput" id="user_notifiy">
                                        <option value="">default1</option>
                                        <option value="">default1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Send As<span class="red-text">*</span> </label>
                                <div class="col-sm-9">
                                    <label for="calls_complaint_who1" class="editInput">
                                        <input type="checkbox" name="notification" id="" value="1"> Notification (User Only)
                                    </label>
                                    <label for="calls_complaint_who2" class="editInput">
                                        <input type="checkbox" name="sms" id="" value="1"> SMS
                                    </label>
                                    <label for="calls_complaint_who3" class="editInput">
                                        <input type="checkbox" name="email" id="" value="1"> Email
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="profileDrop" id="">Close</button>
                    <button type="button" class="profileDrop" id="">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- CRM Add compliants Modal End -->

    <!-- Script For adding CK editor start -->
    <script type="importmap">
        {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
        }
    }
</script>
    <!-- calls CK editor Js -->
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
            .create(document.querySelector('#UserEditor'), {
                plugins: [Essentials, Paragraph, Bold, Italic, Underline, Font, Alignment],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', 'underline', 'alignment', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(editor => {
                window.editor = editor;
                // Add a click event listener to the save button
                document.getElementById('saveCRMCallsModelData').addEventListener('click', function() {

                    // Get the CKEditor content
                    document.getElementById('calls_notes').value = editor.getData();
                    // console.log(document.getElementById('calls_notes').value);
                    // var formData = $('#CRM_calls_form').serialize();


                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- Script For adding CK editor End -->

    <!-- End Calls History new Popup -->

    <script>
        // CRM Complaint Js Start for model show
        const userCRMCallsModel = document.getElementById('userCRMCallsModel');
        const userCallsModal = document.getElementById('userCallsModal');
        const closeUserCallsModels = document.getElementById('closeUserCallsModels');

        // When the user clicks the button, open the modal 
        userCRMCallsModel.onclick = function() {
            $('#userCallsModal').modal('show');
        }

        // When the user clicks on <span> (x), close the modal
        closeUserCallsModels.onclick = function() {
            $('#userCallsModal').modal('hide');
        }

        window.onclick = function(event) {
            if (event.target === userCallsModal) {
                $('#userCallsModal').modal('hide');
            }
        }
        // CRM Complaint Js End for model show


        // CRM Section Type Js Start for model show
        const userCRMTypeModel = document.getElementById('userCRMTypeModel');
        const typeCrmModel = document.getElementById('typeCrmModel');
        const closeCrmModalBtn = document.getElementById('closeCrmModalBtn');

        // When the user clicks the button, open the modal 
        userCRMTypeModel.onclick = function() {
            $('#typeCrmModel').modal('show');
        }

        // When the user clicks on <span> (x), close the modal
        closeCrmModalBtn.onclick = function() {
            $('#typeCrmModel').modal('hide');
        }

        window.onclick = function(event) {
            if (event.target === typeCrmModel) {
                $('#typeCrmModel').modal('hide');
            }
        }
        // CRM Section Type Js End for model show


        // CRM email Js Start for model show
        const userNewEmail = document.getElementById('userNewEmail');
        const userEmailModel = document.getElementById('userEmailModel');
        const closepopupBtn = document.getElementById('closepopupBtn');

        // When the user clicks the button, open the modal 
        userNewEmail.onclick = function() {
            $('#userEmailModel').modal('show');
        }

        // When the user clicks on <span> (x), close the modal
        closepopupBtn.onclick = function() {
            $('#userEmailModel').modal('hide');
        }

        window.onclick = function(event) {
            if (event.target === userEmailModel) {
                $('#userEmailModel').modal('hide');
            }
        }
        // CRM email Js End for model show


        // CRM task  Js Start for model show
        const userNewTaskpop = document.getElementById('userNewTaskpop');
        const TasksecondModal = document.getElementById('TasksecondModal');
        const closeTaskpopup = document.getElementById('closeTaskpopup');

        // When the user clicks the button, open the modal 
        userNewTaskpop.onclick = function() {
            $('#TasksecondModal').modal('show');
        }

        // When the user clicks on <span> (x), close the modal
        closeTaskpopup.onclick = function() {
            $('#TasksecondModal').modal('hide');
        }

        window.onclick = function(event) {
            if (event.target === TasksecondModal) {
                $('#TasksecondModal').modal('hide');
            }
        }
        // CRM task Js End for model show

        // CRM task third Js Start for model show
        const userThirdModal = document.getElementById('userThirdModal');
        const third3Modal = document.getElementById('third3Modal');
        const close3Taskpopup = document.getElementById('close3Taskpopup');

        // When the user clicks the button, open the modal 
        userThirdModal.onclick = function() {
            $('#third3Modal').modal('show');
        }

        // When the user clicks on <span> (x), close the modal
        close3Taskpopup.onclick = function() {
            $('#third3Modal').modal('hide');
        }

        window.onclick = function(event) {
            if (event.target === compliantsModal) {
                $('#third3Modal').modal('hide');
            }
        }
        // CRM task third Js End for model show

        // CRM Notes Js Start for model show
        const userNotesModel = document.getElementById('userNotesModel');
        const NotesCrmModel = document.getElementById('NotesCrmModel');
        const closeNotespopup = document.getElementById('closeNotespopup');

        // When the user clicks the button, open the modal 
        userNotesModel.onclick = function() {
            $('#NotesCrmModel').modal('show');
        }

        // When the user clicks on <span> (x), close the modal
        closeNotespopup.onclick = function() {
            $('#NotesCrmModel').modal('hide');
        }

        window.onclick = function(event) {
            if (event.target === NotesCrmModel) {
                $('#NotesCrmModel').modal('hide');
            }
        }
        // CRM Notes Js End for model show




        // CRM Complaints History Start for model show
        const userCompliantsModal = document.getElementById('userCompliantsModal');
        const CompHistoryModal = document.getElementById('CompHistoryModal');
        const closeUserComplaintpopup = document.getElementById('closeUserComplaintpopup');

        // When the user clicks the button, open the modal 
        userCompliantsModal.onclick = function() {
            $('#CompHistoryModal').modal('show');
        }

        // When the user clicks on <span> (x), close the modal
        closeUserComplaintpopup.onclick = function() {
            $('#CompHistoryModal').modal('hide');
        }

        window.onclick = function(event) {
            if (event.target === compliantsModal) {
                $('#CompHistoryModal').modal('hide');
            }
        }

        // Function to set z-index
        function setZIndexForBackdrop(zIndex) {
            const modalBackdrop = document.querySelector('.modal-backdrop');
            if (modalBackdrop) {
                modalBackdrop.style.zIndex = zIndex;
            }
        }

        // When the user clicks the button, open the modal 
        userCompliantsModal.onclick = function() {
            $('#CompHistoryModal').modal('show');
            // Set the z-index for the backdrop
            setZIndexForBackdrop(1055); // Adjust this value as necessary
        }
        // CRM Complaints History End for model show




        const CRMmainCheckbox = document.getElementById('CRMyeson');
        const CRMoptionsDiv = document.getElementById('CRMoptionsDiv');

        CRMmainCheckbox.addEventListener('change', function() {
            if (CRMmainCheckbox.checked) {
                CRMoptionsDiv.style.display = 'block';
            } else {
                CRMoptionsDiv.style.display = 'none';
            }
        });

        $(document).ready(function() {
            const CRMmainCheckbox = document.getElementById('CRMyeson');
            const CRMoptionsDiv = document.getElementById('CRMoptionsDiv');
            CRMoptionsDiv.style.display = 'none';

            CRMmainCheckbox.addEventListener('change', function() {
                if (CRMmainCheckbox.checked) {
                    CRMoptionsDiv.style.display = 'block';
                } else {
                    CRMoptionsDiv.style.display = 'none';
                }
            });
        });

        function getCountriesList() {
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
                        option.text = "+" + " " + user.code + " - " + " " + user.name;
                        selectElement.appendChild(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script>