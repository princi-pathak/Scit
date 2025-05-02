@extends('backEnd.layouts.master')
@section('title',' Add New')
@section('content')

<!--main content start-->
<section id="main-content" class="">
    <div class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <header class="panel-heading">
                       Sales Day Book Add
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Customer</label>
                                    <div class="col-lg-10">
                                        <select class="form-control">
                                            <option value="">Select Customer</option>
                                            <option value="1">Customer 1</option>
                                            <option value="2">Customer 2</option>
                                            <option value="3">Customer 3</option>
                                        </select>
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Date</label>
                                    <div class="col-lg-10">
                                        <input type="Date" class="form-control" id="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Invoice</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="Invoice">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Net</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="Net">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">VAT</label>
                                    <div class="col-lg-10">
                                        <select class="form-control">
                                            <option value="">Select VAT</option>
                                            <option value="1">VAT 1</option>
                                            <option value="2">VAT 2</option>
                                            <option value="3">VAT 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">VAT Amount</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="VAT Amount">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Gross</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="Gross">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="submit" class="btn btn-default">Cencel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
    </div>
</section>

@endsection