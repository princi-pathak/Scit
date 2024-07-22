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

    <div class="main_wrapper">

    <header>
        <div class="topbaar">
            <div class="container-fluid bg-light p-0">
                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-lg-2 px-3 text-start">
                        <div class="h-100 d-inline-flex align-items-center py-1 ms-3">
                            <a href="#!" class="brand_logo"><img src="{{ url('public/images/ewm_logo.png')}}"
                                    alt="ewm_logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-10 px-3 text-end toprigihticon">

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

                    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
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
                                    <a href="#" class="dropdown-item">Products</a>
                                    <a href="#" class="dropdown-item">Our Team</a>
                                    <a href="#" class="dropdown-item">Testimonial</a>
                                    <a href="#" class="dropdown-item">Our Works</a>
                                </div>
                            </div>

                            <a href="#" class="nav-item nav-link dropdown-toggle">
                                <span><i class="material-symbols-outlined"> description </i></span>
                                Quotes
                            </a>

                            <div class="nav-item dropdown">
                                <a href="#!" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <span><i class="material-symbols-outlined">work </i></span>
                                    Jobs
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="{{url('jobs_list')}}" class="dropdown-item">Active Jobs</a>
                                    <a href="{{url('job_type')}}" class="dropdown-item">Job Type</a>
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



    <section class="home_section_cont px-3 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor1 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor2 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor3 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor4 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor5 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor6 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="proBox">
                                <div class=" card">
                                    <div class="AppointmentTitle">
                                        <h4>Appointment Notifications</h4>
                                    </div>
                                    <div class="appoinList">
                                        <ul class="appNotiList">
                                            <li class="ap_clr_bg1">
                                                <span class="list_circle crclr_bg1">
                                                    <i class="fa-solid fa-spinner"></i>
                                                </span>
                                                <span class="list_cont coutListColor1">
                                                    <h6>Appouinment for <a href="#!">JOB-0154</a>- On Site @ 20/10/2020
                                                        15:54</h6>
                                                    <p>Roxy Mobile on site for Customer 1</p>
                                                </span>
                                            </li>
                                            <li class="ap_clr_bg2">
                                                <span class="list_circle crclr_bg2">
                                                    <i class="material-symbols-outlined"> thumb_up </i>
                                                </span>
                                                <span class="list_cont coutListColor2">
                                                    <h6>Appouinment for <a href="#!">JOB-0154</a>- On Site @ 20/10/2020
                                                        15:54</h6>
                                                    <p>Roxy Mobile on site for Customer 1</p>
                                                </span>
                                            </li>
                                            <li class="ap_clr_bg3">
                                                <span class="list_circle crclr_bg3">
                                                    <i class="fa-solid fa-spinner"></i>
                                                </span>
                                                <span class="list_cont coutListColor3">
                                                    <h6>Appouinment for <a href="#!">JOB-0154</a>- On Site @ 20/10/2020
                                                        15:54</h6>
                                                    <p>Roxy Mobile on site for Customer 1</p>
                                                </span>
                                            </li>
                                            <li class="ap_clr_bg4">
                                                <span class="list_circle crclr_bg4">
                                                    <i class="material-symbols-outlined"> thumb_up </i>
                                                </span>
                                                <span class="list_cont coutListColor4">
                                                    <h6>Appouinment for <a href="#!">JOB-0154</a>- On Site @ 20/10/2020
                                                        15:54</h6>
                                                    <p>Roxy Mobile on site for Customer 1</p>
                                                </span>
                                            </li>
                                            <li class="ap_clr_bg5">
                                                <span class="list_circle crclr_bg5">
                                                    <i class="fa-solid fa-spinner"></i>
                                                </span>
                                                <span class="list_cont coutListColor5">
                                                    <h6>Appouinment for <a href="#!">JOB-0154</a>- On Site @ 20/10/2020
                                                        15:54</h6>
                                                    <p>Roxy Mobile on site for Customer 1</p>
                                                </span>
                                            </li>
                                            <li class="ap_clr_bg5">
                                                <span class="list_circle crclr_bg5">
                                                    <i class="fa-solid fa-spinner"></i>
                                                </span>
                                                <span class="list_cont coutListColor5">
                                                    <h6>Appouinment for <a href="#!">JOB-0154</a>- On Site @ 20/10/2020
                                                        15:54</h6>
                                                    <p>Roxy Mobile on site for Customer 1</p>
                                                </span>
                                            </li>

                                            <li class="ap_clr_bg5">
                                                <span class="list_circle crclr_bg5">
                                                    <i class="fa-solid fa-spinner"></i>
                                                </span>
                                                <span class="list_cont coutListColor5">
                                                    <h6>Appouinment for <a href="#!">JOB-0154</a>- On Site @ 20/10/2020
                                                        15:54</h6>
                                                    <p>Roxy Mobile on site for Customer 1</p>
                                                </span>
                                            </li>


                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor7 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor8 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor9 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="proBox">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="widget-icon-large bgColor10 text-white"><i
                                                    class="material-symbols-outlined"> bookmark_manager</i>
                                            </div>
                                            <div class="numberCountCont">
                                                <h4 class="my-1">4805</h4>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="proBox">
                        <div class="card">
                            <div class="stikerBx">
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <div class="tile">
                                        <div class="boxCont">
                                            <i class="fa-solid fa-heart"></i>
                                            <div class="bx_title">
                                                <p>Mobile Tracking</p>
                                            </div>
                                        </div>
                                        <div class="ribbon-holder">
                                            <div class="ribbon ribbon-filled">
                                                <span>Filled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clickHere">
                                    <a href="#!"> Click here to find out more </a>
                                </div>
                            </div> <!---End stikerBx-->
                        </div>
                    </div><!--End proBox-->
                    <div class="proBox">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="suppor_tickets">
                                    <div class="card">
                                        <div class="titleAndPlus">
                                            <span>Support Tickets</span>
                                            <a href="#!"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                        <div class="addSection">
                                            <ul class="ticketsList">
                                                <li>
                                                    <span class="supCirle">0</span>
                                                    <span class="supText">
                                                        <p>Open Tickets</p>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="supCirle">0</span>
                                                    <span class="supText">
                                                        <p>Open Tickets</p>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="supCirle">0</span>
                                                    <span class="supText">
                                                        <p>Open Tickets</p>
                                                    </span>
                                                </li>
                                            </ul>
                                             
                                            <div class="clickHere viewAllTickets">
                                                <a href="#!">View All Tickets </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="my_tickets">
                                    <div class="card proDucSec">
                                        <div class="titleAndPlus">
                                            <span>My Tasks</span>
                                            <a href="#!"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>

                                        <div class="addSection">
                                            <ul class="ticketsList">
                                                <li>
                                                    <span class="supCirle productIcon">
                                                        <i class="fa-solid fa-bars"></i>
                                                    </span>
                                                    <span class="supText proTitle">
                                                        <p>Open Tickets</p>
                                                        <small>0489403830503</small>
                                                    </span>
                                                </li>
                                            </ul>
                                                                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('frontEnd.jobs.layout.footer')