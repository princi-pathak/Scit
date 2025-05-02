@extends('backEnd.layouts.master')
@section('title',' Purchase Day Book')
@section('content')

<!--main content start-->
<section id="main-content">
    <div class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <header class="panel-heading">
                        Purchase Day Book
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
                                    <a href="{{url('admin/sales-finance/purchase/purchase-day-book-add')}}" id="editable-sample_new" class="btn btn-primary">
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
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Supplier</th>
                                        <th>Date</th>
                                        <th>Net</th>
                                        <th>VAT</th>
                                        <th>Gross</th>
                                        <th>Rate</th>
                                        <th>Total</th>
                                        <th>Reclaim</th>
                                        <th>Not Reclaim</th>
                                        <th>Expense Type</th>
                                        <th>Expense Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <th>1</th>
                                        <td>Abhishek</td>
                                        <td>2025-04-08</td>
                                        <td>500.00</td>
                                        <td>100.00</td>
                                        <td>$600.00</td>
                                        <td>VAT 20</td>
                                        <td>$600.00</td>
                                        <td></td>
                                        <td></td>
                                        <td>54</td>
                                        <td></td>
                                        <td><a class="edit" href="javascript:;"><i class="fa fa-edit"></i></a> | <a class="delete" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    <tr class="">
                                        <th>2</th>
                                        <td>Abhishek</td>
                                        <td>2025-04-08</td>
                                        <td>500.00</td>
                                        <td>100.00</td>
                                        <td>$600.00</td>
                                        <td>VAT 20</td>
                                        <td>$600.00</td>
                                        <td></td>
                                        <td></td>
                                        <td>54</td>
                                        <td></td>
                                        <td><a class="edit" href="javascript:;"><i class="fa fa-edit"></i></a> | <a class="delete" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
    </div>
</section>
@endsection