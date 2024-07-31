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
</head>

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
                    <?php if(isset($page) && $page == 'job_index'){?>
                        <div class="d-inline-flex align-items-center me-5 topbaarBtn">
                            <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> storage</i> My Diary
                            </a>
                            <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> dashboard</i> CRM
                            </a>
                            <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> contact_support </i>
                                Help Desk <span class="notifiNumberRadColor">2</span></a>
                            <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> mail </i> Messages
                            </a>
                            <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> notifications_active
                                </i> Notifications <span class="notifiNumberRadColor">23</span> </a>
                            <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> handshake </i>
                                Partners </a>
                        </div>
                        <?php }else {?>

                        <div class="h-100 d-inline-flex align-items-center me-5">
                            <a class="btn btn-sm-square bg-white text-primary me-1" href="#!"><i class="material-symbols-outlined"> group</i></a>
                            <a class="btn btn-sm-square bg-white text-primary me-1" href="#!"><i class="material-symbols-outlined"> dns</i></a>
                            <a class="btn btn-sm-square bg-white text-primary me-1" href="#!"><i class="material-symbols-outlined"> mail </i></a>
                            <a class="btn btn-sm-square bg-white text-primary me-0" href="#!"><i class="material-symbols-outlined"> notifications </i></a>
                        </div>
                        <?php }?>

                        <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown">
                                    Welcome back Sam
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#" class="dropdown-item">Products</a>
                                    <a href="#" class="dropdown-item">Our Team</a>
                                    <a href="#" class="dropdown-item">Testimonial</a>
                                    <a href="#" class="dropdown-item">Our Works</a>
                                </div>
                            </div>
                        </div>
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
                                <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> keep_public </i></span>
                                    Lead
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="{{ url('/leads/add') }}" class="dropdown-item">New Lead</a>
                                    <a href="{{ url('/leads/lead') }}" class="dropdown-item">All Lead</a>
                                    <a href="#" class="dropdown-item">My Leads</a>
                                    <a href="#" class="dropdown-item">Unassigned Lead</a>
                                    <a href="#" class="dropdown-item">Actioned Lead</a>
                                    <a href="#" class="dropdown-item">Rejected Lead</a>
                                    <a href="#" class="dropdown-item">Authorization</a>
                                    <a href="#" class="dropdown-item">Converted Lead</a>
                                    <a href="#" class="dropdown-item">Search Lead</a>
                                    <a href="#" class="dropdown-item">Lead Task</a>
                                </div>
                            </div>

                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> description </i></span>
                                    Quotes
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">Dashboard</a>
                                    <a href="#!" class="dropdown-item">New Quote</a>
                                    <a href="#!" class="dropdown-item">Draft Quote</a>
                                    <a href="#!" class="dropdown-item">Actioned Quote</a>
                                    <a href="#!" class="dropdown-item">Call Back Quote</a>
                                    <a href="#!" class="dropdown-item">Accepted Quote</a>
                                    <a href="#!" class="dropdown-item">Converted Quote</a>
                                    <a href="#!" class="dropdown-item">Search Quote</a>
                                    <a href="#!" class="dropdown-item">Appointment</a>
                                    <a href="#!" class="dropdown-item">Recurring Quote</a>
                                </div>
                            </div>
                            

                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link active dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined">work </i></span>
                                    Jobs
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">Dashboard</a>
                                    <a href="{{url('/jobs_create')}}" class="dropdown-item">New Jobs</a>
                                    <a href="{{url('jobs_list')}}" class="dropdown-item">Active Jobs</a>
                                    <?php if(@$access_rights[314] == 328){?>
                                    <a href="{{url('job_type')}}" class="dropdown-item">Job Type</a>
                                    <?php }?>
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
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span><i class="material-symbols-outlined">finance_mode </i></span> Finance
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                        <li class="nav-item1 dropend">
                                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Recurring Invoices <i class="fa-solid fa-angle-right"></i>
                                                    </a>
                                                    <ul class="dropdown-menu1">
                                                      <li><a class="dropdown-item" href="#">New Recurring Invoice</a></li>
                                                      <li><a class="dropdown-item" href="#">Recurring Invoices</a></li>                                                          
                                                    </ul>
                                                </li>
                                                <li class="nav-item1 dropend">
                                                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Credit Notes <i class="fa-solid fa-angle-right"></i>
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
                                            <a class="nav-link" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Suppliers <i class="fa-solid fa-angle-right"></i>
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
                                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Customers <i class="fa-solid fa-angle-right"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu1 fade-up m-0">
                                                <li><a class="dropdown-item" href="{{url('customer_add_edit')}}">New Customers</a></li>
                                                <li><a class="dropdown-item" href="#">Active Customers</a></li>
                                                <li><a class="dropdown-item" href="#">Inactive Customers</a></li>
                                                <li><a class="dropdown-item" href="#">Customers Logins</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item1 dropend">
                                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined"> construction</i></span>
                                Settings
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">General Settings</a>
                                    <a href="#!" class="dropdown-item">Digital Doc. Manager</a>
                                    <a href="#!" class="dropdown-item">Questionnaires</a>
                                    <a href="#!" class="dropdown-item">Template Editor</a>
                                    <a href="#!" class="dropdown-item">Custom Field Management</a>
                                    <a href="#!" class="dropdown-item">Triggers</a>
                                    <a href="#!" class="dropdown-item">Leads</a>
                                    <a href="#!" class="dropdown-item">Quotes</a>
                                    <a href="#!" class="dropdown-item">Jobs</a>
                                    <a href="#!" class="dropdown-item">Invoices</a>
                                    <a href="#!" class="dropdown-item">Purchase Orders</a>
                                    <a href="#!" class="dropdown-item">Customers</a>
                                    <a href="#!" class="dropdown-item">Users</a>
                                    <a href="#!" class="dropdown-item">CRM</a>
                                    <a href="#!" class="dropdown-item">General</a>
                                    <a href="#!" class="dropdown-item">Quick Setup Wizard</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>