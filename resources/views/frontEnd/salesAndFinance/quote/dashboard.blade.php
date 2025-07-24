
@extends('frontEnd.layouts.master')


<section class="wrapper">

    <div class="panel">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body row">
                        <div class="col-md-3">
                            <div class="pageTitle" style="padding: 5px;">
                                <h3>Quote Dashboard</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div></div>
                        </div>
                        <div class="col-md-3">
                            <div class="pageTitleBtn" style="padding: 0;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-20">
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default" style="margin-top: 20px;">
                        <div class="panel-body">
                            <h4 class="panel-title">Total Quotes</h4>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6">
                                    <h6 class="numberCount"><a href="#!" class="up_arrow">22 <i class="fa fa-angle-double-up"></i></a></h6>
                                    <span>Count</span>
                                </div>
                                <div class="col-xs-6">
                                    <h6 class="numberCount"><a href="#!">0</a></h6>
                                    <span>Last Month</span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6">
                                    <h6 class="slry_pakage"><a href="#!" class="up_arrow">$55.00 <i class="fa fa-angle-double-up"></i></a></h6>
                                    <span>This Month</span>
                                </div>
                                <div class="col-xs-6">
                                    <h6 class="slry_pakage"><a href="#!">$0.00</a></h6>
                                    <span>Last Month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quotes In Draft -->
                <div class="col-lg-3">
                    <div class="panel panel-default" style="margin-top: 20px;">
                        <div class="panel-body">
                            <h4 class="panel-title">Quotes In Draft</h4>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6">
                                    <h6 class="numberCount"><a href="#!" class="up_arrow">22 <i class="fa fa-angle-double-up"></i></a></h6>
                                    <span>Count</span>
                                </div>
                                <div class="col-xs-6">
                                    <h6 class="numberCount"><a href="#!">0</a></h6>
                                    <span>Last Month</span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6">
                                    <h6 class="slry_pakage"><a href="#!" class="up_arrow">$55.00 <i class="fa fa-angle-double-up"></i></a></h6>
                                    <span>This Month</span>
                                </div>
                                <div class="col-xs-6">
                                    <h6 class="slry_pakage"><a href="#!">$0.00</a></h6>
                                    <span>Last Month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quotes Being Actioned -->
                <div class="col-lg-3">
                    <div class="panel panel-default" style="margin-top: 20px;">
                        <div class="panel-body">
                            <h4 class="panel-title">Quotes Being Actioned</h4>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6">
                                    <h6 class="numberCount"><a href="#!" class="up_arrow">22 <i class="fa fa-angle-double-up"></i></a></h6>
                                    <span>Count</span>
                                </div>
                                <div class="col-xs-6">
                                    <h6 class="numberCount"><a href="#!">0</a></h6>
                                    <span>Last Month</span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6">
                                    <h6 class="slry_pakage"><a href="#!" class="up_arrow">$55.00 <i class="fa fa-angle-double-up"></i></a></h6>
                                    <span>This Month</span>
                                </div>
                                <div class="col-xs-6">
                                    <h6 class="slry_pakage"><a href="#!">$0.00</a></h6>
                                    <span>Last Month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quotes Accepted & Converted -->
                <div class="col-lg-3">
                    <div class="panel panel-default" style="margin-top: 20px;">
                        <div class="panel-body">
                            <h4 class="panel-title">Quotes Accepted & Converted</h4>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6">
                                    <h6 class="numberCount"><a href="#!" class="up_arrow">22 <i class="fa fa-angle-double-up"></i></a></h6>
                                    <span>Count</span>
                                </div>
                                <div class="col-xs-6">
                                    <h6 class="numberCount"><a href="#!">0</a></h6>
                                    <span>Last Month</span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6">
                                    <h6 class="slry_pakage"><a href="#!" class="up_arrow">$55.00 <i class="fa fa-angle-double-up"></i></a></h6>
                                    <span>This Month</span>
                                </div>
                                <div class="col-xs-6">
                                    <h6 class="slry_pakage"><a href="#!">$0.00</a></h6>
                                    <span>Last Month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default link_box" style="margin-top: 20px;">
                                <div class="panel-body">
                                    <h4 class="panel-title">Quotes Rejected</h4>
                                    <div class="row card_text" style="margin-top: 15px;">
                                        <div class="col-xs-6">
                                            <h6 class="numberCount">
                                                <a href="#!" class="up_arrow">22 <i class="fa fa-angle-double-up"></i></a>
                                            </h6>
                                            <span>Count</span>
                                        </div>
                                        <div class="col-xs-6">
                                            <h6 class="numberCount"><a href="#!">0</a></h6>
                                            <span>Last Month</span>
                                        </div>
                                    </div>
                                    <div class="row card_text" style="margin-top: 15px;">
                                        <div class="col-xs-6">
                                            <h6 class="slry_pakage">
                                                <a href="#!" class="up_arrow">$55.00 <i class="fa fa-angle-double-up"></i></a>
                                            </h6>
                                            <span>This Month</span>
                                        </div>
                                        <div class="col-xs-6">
                                            <h6 class="slry_pakage"><a href="#!">$0.00</a></h6>
                                            <span>Last Month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="panel panel-default link_box" style="margin-top: 20px;">
                                <div class="panel-body">
                                    <h4 class="panel-title">Potential Sales Figure</h4>
                                    <div class="row card_text" style="margin-top: 15px;">
                                        <div class="col-xs-6">
                                            <h6 class="numberCount">
                                                <a href="#!" class="up_arrow">22 <i class="fa fa-angle-double-up"></i></a>
                                            </h6>
                                            <span>Count</span>
                                        </div>
                                        <div class="col-xs-6">
                                            <h6 class="numberCount"><a href="#!">0</a></h6>
                                            <span>Last Month</span>
                                        </div>
                                    </div>
                                    <div class="row card_text" style="margin-top: 15px;">
                                        <div class="col-xs-6">
                                            <h6 class="slry_pakage">
                                                <a href="#!" class="up_arrow">$55.00 <i class="fa fa-angle-double-up"></i></a>
                                            </h6>
                                            <span>This Month</span>
                                        </div>
                                        <div class="col-xs-6">
                                            <h6 class="slry_pakage"><a href="#!">$0.00</a></h6>
                                            <span>Last Month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="panel panel-default link_box" style="margin-top: 20px;">
                        <div class="panel-body">
                            <div id='PieChart'></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default link_box" style="margin-top: 20px;">
                        <div class="panel-body">
                            <div id="lineChart">
                                <a href="https://www.zingchart.com/" rel="noopener" class="zc-ref">Powered by ZingChart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.zingchart.com/zingchart.min.js"></script>

