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
                        Add Staff
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
                                    <a href="{{url('admin/rota/staff-worker-add')}}" id="editable-sample_new" class="btn btn-primary"> Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>

                            <section class="panel">
                                <!-- <header class="panel-heading">
                        Dynamic Table
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header> -->
                                <div class="panel-body">
                                    <div class="adv-table table-responsive">
                                        <table class="display table table-bordered table-striped" id="dynamic-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Surname</th>
                                                    <th>Forename</th>
                                                    <th>Address</th>
                                                    <th>Post Code</th>
                                                    <th>DOB</th>
                                                    <th>Acct Number	</th>
                                                    <th>Sort Code	</th>
                                                    <th>Rate of Pay (£)</th>
                                                    <th>Level</th>
                                                    <th>Start Date	</th>
                                                    <th>Job Role	</th>
                                                    <th>NIN</th>
                                                    <th>Starter Decl. (HMRC)</th>
                                                    <th>Probation Start Date	</th>
                                                    <th>Probation End Date	</th>
                                                    <th>Probation Extended Date	</th>
                                                    <th>After Probation Enrolled</th>
                                                    <th>Student Loan</th>
                                                    <th>DBS Clear?</th>
                                                    <th>DBS Number	</th>
                                                    <th>On DBS Update Service?	</th>
                                                    <th>Leave Date	</th>
                                                    <th>Email Address	</th>
                                                    <th>Mobile</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>

                                                 <tr>
                                                    <td>1.</td>
                                                    <td>Seddon	</td>
                                                    <td>Paul</td>
                                                    <td>4 Milman Road, Walton</td>
                                                    <td>L4 5SH</td>
                                                    <td>12-12-1980</td>
                                                    <td>38409216</td>
                                                    <td>60-20-23</td>
                                                    <td>13.25</td>
                                                    <td>Qualified</td>
                                                    <td>01-06-2020	</td>
                                                    <td>Duty Manager</td>
                                                    <td>JM342800A</td>
                                                    <td>Yes-A	</td>
                                                    <td>07-06-2020	</td>
                                                    <td>01-04-2025	</td>
                                                    <td>02-06-2025	</td>
                                                    <td>No</td>
                                                    <td>No Student Loan</td>
                                                    <td>Yes</td>
                                                    <td>001715234301</td>
                                                    <td>No	</td>
                                                    <td>...</td>
                                                    <td>aliceleigh93@icloud.com</td>
                                                    <td>000</td>
                                                    <td>Action</td>
                                                </tr>
                                               
                                                
                                            </tbody>
                                            <!-- <tfoot>
                                                <tr>
                                                    <th>Rendering engine</th>
                                                    <th>Browser</th>
                                                    <th>Platform(s)</th>
                                                    <th class="hidden-phone">Engine version</th>
                                                    <th class="hidden-phone">CSS grade</th>
                                                </tr>
                                            </tfoot> -->
                                        </table>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
    </div>
</section>


@endsection