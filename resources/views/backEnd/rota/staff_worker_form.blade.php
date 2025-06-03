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
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Surname *</label>
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
                                            <label for="" class="col-lg-3 col-sm-3 control-label">NIN *</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="surname" id="" value="" placeholder="Enter name">
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Starter Declaration (HMRC Starter Form) *</label>
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
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Probation & Date (6 mth) Pasd/Extended *</label>
                                            <div class="col-lg-3">
                                                <label class="">Start date *</label>
                                                <input type="text" class="form-control" name="netAmount" value="" id="">
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="">End date *</label>
                                                <input type="text" class="form-control" name="netAmount" value="" id="">
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="">Extended date</label>
                                                <input type="text" class="form-control" name="netAmount" value="" id="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">APE in Pvt Medical *</label>
                                            <div class="col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="APEMedical" id="inlineRadio1" value="option1"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="APEMedical" id="inlineRadio2" value="option2"> No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Student Loan *</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" id="" name="Status">
                                                    <option value="">Select Loan</option>
                                                    <option value="">Select Loan</option>
                                                    <option value="">Select Loan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">DBS Clear?</label>
                                            <div class="col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="DBSClear" id="inlineRadio1" value="option1"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="DBSClear" id="inlineRadio2" value="option2"> No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">DBS Number</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="" value="" id="t" placeholder="1234567890">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">On DBS Update server?</label>
                                            <div class="col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="DBSUpdate" id="inlineRadio1" value="option1"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="DBSUpdate" id="inlineRadio2" value="option2"> No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Leave Date</label>
                                            <div class="col-lg-9">
                                                <input type="date" class="form-control" name="" value="" id="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Email Address *</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="" id="" value="" placeholder="Enter mail ">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="" class="col-lg-3 col-sm-3 control-label">Mobile</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="" value="" id="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12 text-right">
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

