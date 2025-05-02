@extends('backEnd.layouts.master')
@section('title',' Council Tax')
@section('content')

<!--main content start-->
<section id="main-content">
    <div class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <header class="panel-heading">
                        Council Tax
                        <!-- <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span> -->
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix clearfix_space">
                                <div class="btn-group">
                                    <a href="{{url('admin/finance/council-tax-add')}}" id="editable-sample_new" class="btn btn-primary">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default"> Export </button>
                                    <!-- <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <div class="space15"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Flat number <br> (if applicable)</th>
                                            <th>Address</th>
                                            <th>PostCode</th>
                                            <th>Council</th>
                                            <th>No of Bedrooms</th>
                                            <th>Owned by Omega</th>
                                            <th>Occupancy</th>
                                            <th>Exempt</th>
                                            <th>Account number</th>
                                            <th>Last bill</th>
                                            <th>Bill period</th>
                                            <th>Amount paid</th>
                                            <th>Additional Notes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <th>1</th>
                                            <td>Flat 2</td>
                                            <td>40-42 Kembel Street</td>
                                            <td>65656</td>
                                            <td>Knowslet</td>
                                            <td>4</td>
                                            <td>No</td>
                                            <td>4</td>
                                            <td>yes</td>
                                            <td>96258574</td>
                                            <td>2025-03-01</td>
                                            <td>2025-03-01 - 2025-04-30</td>
                                            <td>256</td>
                                            <td>lorem</td>
                                            <td><a class="edit" href="javascript:;"><i class="fa fa-edit"></i></a> | <a class="delete" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        <tr class="">
                                            <th>2</th>
                                            <td>Flat 2</td>
                                            <td>40-42 Kembel Street</td> 
                                            <td>65656</td>
                                            <td>Knowslet</td>
                                            <td>4</td>
                                            <td>No</td>
                                            <td>4</td>
                                            <td>yes</td>
                                            <td>96258574</td>
                                            <td>2025-03-01</td>
                                            <td>2025-03-01 - 2025-04-30</td>
                                            <td>256</td>
                                            <td>loerm</td>
                                            <td><a class="edit" href="javascript:;"><i class="fa fa-edit"></i></a> | <a class="delete" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
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