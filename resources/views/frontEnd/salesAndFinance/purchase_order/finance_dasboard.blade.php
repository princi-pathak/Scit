@extends('frontEnd.layouts.master')

@section('title','Finance')

@section('content')

<style>
    img {
        background-color: white;
        width: 68%;
        border: 1px solid #ddd;
        padding: 5px;
        border-radius: 2px;
    }

    .left-border {
        border-right: 1px solid #ddd;
    }

    .re-generateQR {
        border: 1px solid #1f88b5;
        box-shadow: none;
        color: #fff;
        background: #1f88b5;
        padding: 6px 12px;
        text-align: center;
        border-radius: 3px;
        margin-right: 11px;
        margin-bottom: 20px;
        transition: all 0.5s;
        cursor: pointer;
    }

    .re-generateQR span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .re-generateQR span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -10px;
        transition: 0.5s;
    }

    .re-generateQR:hover span {
        padding-right: 20px;
    }

    .re-generateQR:hover span:after {
        opacity: 1;
        right: 0;
    }

    .view-QR {
        border: 1px solid #1f88b5;
        box-shadow: none;
        color: #fff;
        background: #1f88b5;
        padding: 6px 12px;
        text-align: center;
        border-radius: 3px;
        margin-bottom: 20px;
        transition: all 0.5s;
        cursor: pointer;
    }

    .view-QR span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .view-QR span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -10px;
        transition: 0.5s;
    }

    .view-QR:hover span {
        padding-right: 20px;
    }

    .view-QR:hover span:after {
        opacity: 1;
        right: 0;
    }

    #download {
        width: 68%;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    #download button {
        border: 1px solid #1f88b5;
        box-shadow: none;
        color: #fff;
        background: #1f88b5;
        padding: 6px 12px;
        text-align: center;
        border-radius: 3px;
        margin-top: 20px;
        transition: all 0.5s;
        cursor: pointer;
    }

    #download button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    #download button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -10px;
        transition: 0.5s;
    }

    #download button:hover span {
        padding-right: 20px;
    }

    #download button:hover span:after {
        opacity: 1;
        right: 0;
    }

    .set-width {
        width: 68%;
    }

    /* custom dropdown */

    .custom_dropdown2 {
        position: relative;
    }

    .custom_dropdown2 .dropdown-content {
        display: none;
        position: absolute;
        bottom: 0;
        left: 156px;
        height: 375px;
        padding: 10px;
        z-index: 9;
        top: 0;
        background: #fff;
        width: 220px;
    }

    .custom_dropdown2:hover .dropdown-content,
    .custom_dropdown2:focus-within .dropdown-content {
        display: block !important;
    }

    .custom_dropdown2 a {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 8px;
        text-decoration: none;
        color: #333;
        vertical-align: center;
    }

    .custom_dropdown2 a:hover {
        background-color: #efefef;
        border-radius: 4px;
    }

    .custom_dropdown2 a .flex_item {
        display: flex;
        justify-content: start;
        align-items: center;
        gap: 20px;
    }

    .custom_dropdown2 span:hover {
        cursor: pointer;
    }

    .custom_dropdown2 span:focus-visible {
        outline-offset: 4px;
        border-radius: 2px;
        transition: 200ms ease-out;
    }

    .custom_dropdown2 a i {
        color: #000 !important;
        display: inline-block !important;
        font-size: 15px !important;
    }

    #overview .panel-body {
        min-height: unset;
    }

    .custom_dropdown2 .dropdown-content a {
        justify-content: left;
    }

    .pink-bg {
        background-color: #C599B6;
    }
</style>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <!-- <header class="panel-heading tab-bg-dark-navy-blue cus-panel-heading">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#overview"> Overview</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#manager_access_rights">Access Rights</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#my_profile_contacts" class="profile-contact-map"> Contacts</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#my_profile_info">Full Profile</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#profile_settings">Settings</a>
                            </li>
                        </ul>
                    </header> -->
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="overview" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-4 col-xs-12 my_annual_record" manager_id="0">
                                                <div class="profile-nav alt">
                                                    <div class="panel text-center">
                                                        <div class="user-heading alt wdgt-row purple-bg">
                                                            <i class="fa fa-file-text-o"></i>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="wdgt-value">
                                                                <div class="custom_dropdown2">
                                                                    <a tabindex=0>
                                                                        <div class="flex_item">
                                                                            <h4 class="count">Invoice</h4>
                                                                            <i class="fa fa-angle-double-right"></i>
                                                                        </div>
                                                                    </a>
                                                                    <div class="dropdown-content">
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Dashboard </span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span> New Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span> Draft Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span> Outstanding Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span> Overdue Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Paid Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Search Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Account Statements</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Reminders</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Recurring Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="profile-nav alt">
                                                    <div class="panel text-center">
                                                        <div class="user-heading alt wdgt-row bg-blue">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="wdgt-value">
                                                                <div class="custom_dropdown2">
                                                                    <a tabindex=0>
                                                                        <div class="flex_item">
                                                                            <h4 class="count">Purchase Order</h4>
                                                                            <i class="fa fa-angle-double-right"></i>
                                                                        </div>
                                                                    </a>
                                                                    <div class="dropdown-content">
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Dashboard </span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span> New Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span> Draft Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span> Outstanding Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span> Overdue Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Paid Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Search Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Account Statements</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Reminders</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Recurring Invoices</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- fa-hourglass-end  fa-life-ring  fa-hourglass-half  fa-hourglass-start  fa-clock-o  fa-tachometer  fa-sliders   -->
                                            <div class="col-md-3 col-sm-4 col-xs-12" manager_id="0">
                                                <div class="profile-nav alt">
                                                    <div class="panel text-center">
                                                        <div class="user-heading alt wdgt-row terques-bg">
                                                            <i class="fa fa-money"></i>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="wdgt-value">
                                                                <div class="custom_dropdown2">
                                                                    <a tabindex=0>
                                                                        <div class="flex_item">
                                                                            <h4 class="count">Petty Cash</h4>
                                                                            <i class="fa fa-angle-double-right"></i>
                                                                        </div>
                                                                    </a>
                                                                    <div class="dropdown-content">
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Expand Card</span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="#!">
                                                                            <div class="flex_item">
                                                                                <i class="fa fa-tachometer"></i>
                                                                                <span>Cash</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12 my_task_allocation_list" manager_id="0">
                                                <div class="profile-nav alt">
                                                    <a href="">
                                                        <div class="panel text-center">
                                                            <div class="user-heading alt wdgt-row pink-bg">
                                                                <i class="fa fa-child"></i>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="wdgt-value">
                                                                    <h4 class="count">Child<br>Register</h4>
                                                                    <p></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="below-divider"></div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feed-box text-center"></div>
                                        <div class="profile-nav alt"></div>
                                        <!-- notification start -->
                                        <section class="panel">
                                        </section>
                                        <!-- <section class="panel m-0">
                                            <header class="panel-heading"> Notification <span class="tools pull-right"> <a href="javascript:;" class="fa fa-chevron-down"></a> <a href="javascript:;" class="fa fa-cog"></a> <a href="javascript:;" class="fa fa-times"></a> </span> 
                                            </header>
                                            <div class="panel-body  min-ht-0">
                                            </div>
                                        </section> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
@endsection