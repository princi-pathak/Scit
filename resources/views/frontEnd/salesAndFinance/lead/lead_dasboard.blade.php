@extends('frontEnd.layouts.master')

@section('title','Leads')

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

    .tabs_finance {
        padding: 20px 20px 0 20px;
    }

    .wdgt-value {
        color: #747474;
    }
</style>

<!--main content start-->
<section id="main-content">
    <div class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="overview" class="tab-pane active">
                                <div class="row tabs_finance">
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('/leads/add') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row purple-bg">
                                                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">New Lead</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('/leads/leads') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row lightRed">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">All Lead</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('/lead/myLeads') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row terques-bg">
                                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">My Lead</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('/leads/unassigned') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row bg-blue">
                                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">Unassigned Leads</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('/lead/actioned') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row bg-pink">
                                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">Actioned Leads</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('/lead/rejected') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row bg-seagreen">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">Rejected Leads</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('/lead/authorization') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row bg-themecolor">
                                                    <i class="fa fa-shield" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">Authorization</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('/leads/converted') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row bg-darkgreen">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">Converted Leads</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('leads/search') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row bg-purple">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">Search Leads</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <a href="{{ url('/leads/tasks') }}">
                                            <div class="profile-nav alt">
                                                <div class="panel text-center">
                                                    <div class="user-heading alt wdgt-row bg-jamni">
                                                        <i class="fa fa-tasks" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="wdgt-value">
                                                            <h4 class="count">Lead Tasks</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
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

@endsection