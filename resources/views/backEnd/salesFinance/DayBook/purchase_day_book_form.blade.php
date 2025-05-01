@extends('backEnd.layouts.master')
@section('title',' Add New')
@section('content')
<section id="main-content" class="">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       Purchase Day Book Add
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Supplier</label>
                                    <div class="col-lg-10">
                                        <select class="form-control">
                                            <option value="">Select Supplier</option>
                                            <option value="1">Supplier 1</option>
                                            <option value="2">Supplier 2</option>
                                            <option value="3">Supplier 3</option>
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
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Net</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="Net">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Total Amount (to be paid)</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="Total Amount (to be paid)">
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
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Reclaim</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="Reclaim">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Not Claim</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="Not Claim">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Expenses</label>
                                    <div class="col-lg-10">
                                        <select class="form-control">
                                            <option value="">Select Expenses</option>
                                            <option value="1">Expenses 1</option>
                                            <option value="2">Expenses 2</option>
                                            <option value="3">Expenses 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Expense Amount</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="Expense Amount">
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
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>

@endsection