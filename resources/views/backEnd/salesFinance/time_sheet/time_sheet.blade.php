@extends('backEnd.layouts.master')
@section('title',' Time Sheet')
@section('content')

<!--main content start-->
<section id="main-content">
    <div class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <header class="panel-heading">
                        Time Sheet
                    </header>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix clearfix_space">
                                <div class="col-lg-3 col-sm-3">
                                    <input type="hidden" id="tax_id">
                                    <select class="form-control" name="tax_rate" id="getDataOnTax">
                                        <option value="0">Please Select</option>
                                    </select>
                                </div>
                                <div class="btn-group">
                                    <a href="{{url('admin/sales-finance/time-sheet/time-sheet-add')}}" id="editable-sample_new" class="btn btn-primary"> Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="display table table-bordered table-striped" id="purchaseDayBookTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Uploaded By</th>
                                        <th>Home</th>
                                        <th>Month</th>
                                        <th>File</th>
                                        <th>Final Version</th>
                                        <th>Uploaded At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
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