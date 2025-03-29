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

    #overview .panel-body {
        min-height: auto;
    }

    [data-tab-finance-content] {
        display: none;
    }

    .active[data-tab-finance-content] {
        display: block;
    }

    .inner_cards .icon {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        height: 100px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        box-shadow: 0px 0px 20px rgb(0 0 0 / 10%);
    }

    .inner_cards a {
        text-decoration: none;
    }

    .inner_cards .icon.icon1 {
        background-color: #9466b5;
    }

    .inner_cards .icon.icon2 {
        background-color: #99cce3;
    }

    .inner_cards .icon.icon3 {
        background-color: #1fb5ad;
    }

    .inner_cards .icon.icon4 {
        background-color: #789DBC;
    }

    .inner_cards .icon.icon5 {
        background-color: #9466b5;
    }

    .inner_cards .icon.icon6 {
        background-color: #89A8B2;
    }

    .inner_cards .icon.icon7 {
        background-color: #727D73;
    }

    .inner_cards .icon.icon8 {
        background-color: #3674B5;
    }

    .inner_cards .icon.icon9 {
        background-color: #FF8A8A;
    }

    .inner_cards .icon.icon10 {
        background-color: #B17F59;
    }


    .inner_cards .icon i {
        font-size: 55px;
    }

    .inner_cards .card_name {
        padding: 30px 20px;
        text-align: center;
        background-color: #fff;
        margin-bottom: 20px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .inner_cards .card_name h4 {
        margin-bottom: 0px;
        font-size: 15px;
        color: #444;
    }
</style>

<!--main content start-->
<section id="main-content">
    <div class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
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
                                <div class="row tabs_finance">
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 tab_finance" data-tab-finance-target="#Invoice">
                                        <div class="profile-nav alt">
                                            <div class="panel text-center">
                                                <div class="user-heading alt wdgt-row purple-bg">
                                                    <i class="fa fa-file-text-o"></i>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="wdgt-value">
                                                        <h4 class="count">Invoice</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 tab_finance" data-tab-finance-target="#Purchase_Order">
                                        <div class="profile-nav alt">
                                            <div class="panel text-center">
                                                <div class="user-heading alt wdgt-row bg-blue">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="wdgt-value">
                                                        <h4 class="count">Purchase Order</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fa-hourglass-end  fa-life-ring  fa-hourglass-half  fa-hourglass-start  fa-clock-o  fa-tachometer  fa-sliders   -->
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 tab_finance" data-tab-finance-target="#Petty_Cash">
                                        <div class="profile-nav alt">
                                            <div class="panel text-center">
                                                <div class="user-heading alt wdgt-row terques-bg">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="wdgt-value">
                                                        <h4 class="count">Petty Cash</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 tab_finance" data-tab-finance-target="#Child_Register">
                                        <div class="profile-nav alt">
                                            <div class="panel text-center">
                                                <div class="user-heading alt wdgt-row purple-bg">
                                                    <i class="fa fa-child"></i>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="wdgt-value">
                                                        <h4 class="count">Child Register</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab_finance-content">
                                    <div id="Invoice" data-tab-finance-content>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="{{ url('/leads/add') }}">
                                                                <div class="icon icon1">
                                                                    <i class="material-symbols-outlined">
                                                                        add_circle
                                                                    </i>
                                                                </div>
                                                                <div class="card_name">
                                                                    <h4>New Lead</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="{{ url('/leads/leads') }}">
                                                                <div class="icon icon2">
                                                                    <i class="material-symbols-outlined">
                                                                        leaderboard
                                                                    </i>
                                                                </div>
                                                                <div class="card_name">
                                                                    <h4>All Lead</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="{{ url('/lead/myLeads') }}">
                                                                <div class="icon icon3">
                                                                    <i class="material-symbols-outlined">
                                                                        supervisor_account
                                                                    </i>
                                                                </div>
                                                                <div class="card_name">
                                                                    <h4>My Lead</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="{{ url('/leads/unassigned') }}">
                                                                <div class="icon icon4">
                                                                    <i class="material-symbols-outlined">
                                                                        person_off
                                                                    </i>
                                                                </div>
                                                                <div class="card_name">
                                                                    <h4>Unassigned Lead</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="{{ url('/lead/actioned') }}">
                                                                <div class="icon icon5">
                                                                    <i class="material-symbols-outlined">
                                                                        task_alt
                                                                    </i>
                                                                </div>
                                                                <div class="card_name">
                                                                    <h4>Actioned Lead</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="{{ url('/lead/rejected') }}">
                                                                <div class="icon icon6">
                                                                    <i class="material-symbols-outlined">
                                                                        block
                                                                    </i>
                                                                </div>
                                                                <div class="card_name">
                                                                    <h4>Rejected Lead</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="{{ url('/lead/authorization') }}">
                                                                <div class="icon icon7">
                                                                    <i class="material-symbols-outlined">
                                                                        verified_user
                                                                    </i>
                                                                </div>
                                                                <div class="card_name">
                                                                    <h4>Authorization</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="{{ url('/leads/converted') }}">
                                                                <div class="icon icon8">
                                                                    <i class="material-symbols-outlined">
                                                                        compare_arrows
                                                                    </i>
                                                                </div>
                                                                <div class="card_name">
                                                                    <h4>Converted Lead</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="">
                                                                <a href="{{ url('leads/search') }}">
                                                                    <div class="icon icon9">
                                                                        <i class="material-symbols-outlined">
                                                                            search
                                                                        </i>
                                                                    </div>
                                                                    <div class="card_name">
                                                                        <h4>Search Lead</h4>
                                                                    </div>
                                                                </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="inner_cards">
                                                            <a href="{{ url('/leads/tasks') }}">
                                                                <div class="icon icon10">
                                                                    <i class="material-symbols-outlined">
                                                                        event_note
                                                                    </i>
                                                                </div>
                                                                <div class="card_name">
                                                                    <h4> Lead Tasks</h4>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Purchase_Order" data-tab-finance-content>
                                        <h1>Pricing</h1>
                                        <p>Some information on pricing</p>
                                    </div>
                                    <div id="Petty_Cash" data-tab-finance-content>
                                        <h1>About</h1>
                                        <p>Let me tell you about me</p>
                                    </div>
                                    <div id="Child_Register" data-tab-finance-content>
                                        <h1>News</h1>
                                        <p>News is great.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
    </div>
</section>

<script>
    const tabs = document.querySelectorAll('[data-tab-finance-target]');
    const tabContents = document.querySelectorAll('[data-tab-finance-content]');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = document.querySelector(tab.dataset.tabFinanceTarget);

            if (tab.classList.contains('active')) {
                tab.classList.remove('active');
                target.classList.remove('active');
            } else {
                tabContents.forEach(tabContent => tabContent.classList.remove('active'));
                tabs.forEach(tab => tab.classList.remove('active'));

                tab.classList.add('active');
                target.classList.add('active');
            }
        });
    });
</script>
@endsection