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
                        Add Staff Worker
                    </header>
                    @if (session('success'))
                    <div class="aalert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show">
                        {{ session('info') }}
                    </div>
                    @endif
                    <div class="panel-body">
                        <div class="">
                            <form class="form-horizontal" method="post" action="{{ route('backend.purchase_day_book.store') }}" role="form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Surname <span class="radColor">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="surname" id="" value="" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Forename*</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="forename" id="" value="" placeholder="Enter name ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Address</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="Address" value="" id="" placeholder="Your address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Post Code *</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="" value="" placeholder="Your Post Code">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Date of Birth</label>
                                            <div class="col-lg-9">
                                               <input type="text" class="form-control" name="DOB" value="" id="" placeholder="Your DOB">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Bank Details, Acct Number & Sort Code *</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" name="AcctNumber" value="" id="" placeholder="Acct Number">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="SortCode" value="" id="" placeholder="Sort Code">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Status *</label>
                                            <div class="col-lg-9">
                                               <select class="form-control" id="" name="Status">
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Rate of Pay (£)</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="reclaim" value="" id="" placeholder="">
                                            </div>
                                            <div class="col-lg-5">
                                                <select class="form-control" id="" name="Status">
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Start Date *</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="" id="" value="" placeholder="Start Date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Job Role *</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="" id="" value="" placeholder="Enter Your Role">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Expense Amount</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="expense_amount" value="" id="expenses_amount" placeholder="Expense Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">NIN *</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="surname" id="" value="" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Starter Declaration (HMRC Starter Form Completed) *</label>
                                            <div class="col-lg-9">
                                                   <select class="form-control" id="" name="Status">
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                    <option value="">Select Status</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Net</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="netAmount" value="" id="net_amount" placeholder="Net">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Total Amount (to be paid)</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="totalAmount" value="" placeholder="Total Amount (to be paid)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">VAT</label>
                                            <div class="col-lg-9">
                                                <input type="hidden" id="tax_id" value="">
                                                <select class="form-control" id="vat_input" name="Vat">
                                                    <option value="">Select VAT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">VAT Amount</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="vatAmount" value="" id="vat_amount" placeholder="VAT Amount">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Gross</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="grossAmount" value="" id="gross_amount" placeholder="Gross">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Reclaim</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="reclaim" value="" id="reclaim_amount" placeholder="Reclaim">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Not Claim</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="not_reclaim" id="not_claim" value="" placeholder="Not Claim">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Expenses</label>
                                            <div class="col-lg-9">
                                                <input type="hidden" id="expenses_id" value="">
                                                <select class="form-control" id="expenses" name="expense_type">
                                                    <option value="">Select Expenses</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Expense Amount</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="expense_amount" value="" id="expenses_amount" placeholder="Expense Amount">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class=" col-lg-12">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="submit" class="btn btn-default">Cencel</button>
                                            </div>
                                        </div>
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

