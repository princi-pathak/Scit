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
                        <div class="h-100 d-inline-flex align-items-center me-5">
                            <a class="btn btn-sm-square bg-white text-primary me-1" href="#!"><i class="material-symbols-outlined"> group</i></a>
                            <a class="btn btn-sm-square bg-white text-primary me-1" href="#!"><i class="material-symbols-outlined"> dns</i></a>
                            <a class="btn btn-sm-square bg-white text-primary me-1" href="#!"><i class="material-symbols-outlined"> mail </i></a>
                            <a class="btn btn-sm-square bg-white text-primary me-0" href="#!"><i class="material-symbols-outlined"> notifications </i></a>
                        </div>

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

                            <a href="#" class="nav-item nav-link dropdown-toggle">
                                <span><i class="material-symbols-outlined"> description </i></span>
                                Quotes
                            </a>

                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link active dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined">work </i></span>
                                    Jobs
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="{{url('jobs_list')}}" class="dropdown-item">Active Jobs</a>
                                    <?php if (@$access_rights[314] == 328) { ?>
                                        <a href="{{url('job_type')}}" class="dropdown-item">Job Type</a>
                                    <?php } ?>
                                    <a href="#" class="dropdown-item">Unassigned</a>
                                    <a href="#" class="dropdown-item">Active Required</a>
                                    <a href="#" class="dropdown-item">Overdue</a>
                                    <a href="#" class="dropdown-item">authorization</a>
                                </div>
                            </div>

                            <!-- {{url('planner_day')}} -->
                            <a href="#!" class="nav-item nav-link dropdown-toggle">
                                <span><i class="material-symbols-outlined"> planner_review </i></span>
                                Planner
                            </a>
                            <a href="#!" class="nav-item nav-link">
                                <span><i class="material-symbols-outlined"> business_center</i></span>
                                Projects
                            </a>

                            <a href="#" class="nav-item nav-link dropdown-toggle">
                                <span><i class="material-symbols-outlined">finance_mode </i></span>
                                Finance
                            </a>
                            <a href="#" class="nav-item nav-link dropdown-toggle">
                                <span><i class="material-symbols-outlined"> contact_support </i></span>
                                Contacts
                            </a>
                            <a href="#" class="nav-item nav-link dropdown-toggle">
                                <span><i class="material-symbols-outlined"> production_quantity_limits</i></span>
                                Products
                            </a>
                            <a href="#" class="nav-item nav-link">
                                <span><i class="material-symbols-outlined"> calculate </i></span>
                                Expenses
                            </a>
                            <a href="#" class="nav-item nav-link dropdown-toggle">
                                <span><i class="material-symbols-outlined"> diversity_2 </i></span>
                                Users
                            </a>
                            <a href="#" class="nav-item nav-link dropdown-toggle">
                                <span><i class="material-symbols-outlined"> partner_reports </i></span>
                                Reports
                            </a>
                            <a href="#" class="nav-item nav-link dropdown-toggle ">
                                <span><i class="material-symbols-outlined"> bookmark_manager</i></span>
                                FileManager
                            </a>
                            <a href="#" class="nav-item nav-link dropdown-toggle">
                                <span><i class="material-symbols-outlined"> construction</i></span>
                                Tools
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>