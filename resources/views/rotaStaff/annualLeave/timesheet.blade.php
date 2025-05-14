@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Annual Leave')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<style>
    .omegaCareAnnual thead tr th, .omegaCareAnnual tbody tr td{
     white-space: nowrap;
    }
</style>

<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Annual Leave</h4>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="jobsection justify-content-end mb-0">
                                        <a href="javascript:void(0)" class="btn btn-warning openModalBtn" data-action='add'>
                                            <i class="fa fa-plus"></i> Add</a>
                                        <!-- <a href="javascript:void(0)" class="profileDrop">Export</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="maimtable productDetailTable mb-4 table-responsive">
                                <table id="exampleOne" class="table border-top border-bottom tablechange omegaCareAnnual" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Start Date</th>
                                            <th>A/L Entitlement </th>
                                            <th>October</th>
                                            <th>November</th>
                                            <th>December </th>
                                            <th>January</th>
                                            <th>February</th>
                                            <th>March</th>
                                            <th>April</th>
                                            <th>May </th>
                                            <th>June</th>
                                            <th>July</th>
                                            <th>August</th>
                                            <th>September</th>
                                            <th>Total A/L Hours  Used</th>
                                            <th>Total A/L Hours  left</th>
                                            <th>Carried over</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td>1.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                         <tr>
                                            <td>2.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                         <tr>
                                            <td>3.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                         <tr>
                                            <td>4.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                         <tr>
                                            <td>5.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                         <tr>
                                            <td>6.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                         <tr>
                                            <td>7.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                         <tr>
                                            <td>8.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                         <tr>
                                            <td>9.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                         <tr>
                                            <td>10.</td>
                                            <td>Aaron Hill </td>
                                            <td>Residential Care</td>
                                            <td>4/3/2023</td>
                                            <td>224</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>224</td>
                                            <td>0</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="AddCouncilTax" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="error-text"></div>
            <form action="" id="addCouncilTaxForm" class="customerForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    <h4 class="modal-title" id="modalTitle">Add Annual Leaves</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="row formDtail">
                                <div class="col-md-6 form-group">
                                    <label> Name </label>
                                    <select class="form-control editInput selectOptions">
                                            <option selected="" disabled="">Select Name</option>
                                            <option value="1">Ram Kumar</option>
                                            <option value="2">Abhishek</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label> Department <span class="radStar">*</span></label>
                                    <select class="form-control editInput selectOptions">
                                            <option selected="" disabled="">Select Department</option>
                                            <option value="1">Ram Kumar</option>
                                            <option value="2">Abhishek</option>
                                    </select>
                                </div>
                                   <div class="col-md-12 form-group">
                                    <label> Months <span class="radStar">*</span></label>
                                    <select class="form-control editInput selectOptions">
                                            <option selected="" disabled="">Select Months</option>
                                            <option value="1">October</option>
                                            <option value="2">November</option>
                                            <option value="3">December</option>
                                            <option value="4">January</option>
                                            <option value="5">February</option>
                                            <option value="6">March</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label> Start Date <span class="radStar">*</span></label>
                                    <input type="text" class="form-control editInput" id="Leave_startDate" name="Leave Start Date">
                                </div>
                              
                               
                                <div class="col-md-6 form-group">
                                    <div class="row">
                                        <div class="col-sm-6 pe-3">
                                            <label>Tot. A/L Hrs Used</label>
                                            <input type="text" class="form-control editInput" name="no_of_bedrooms" placeholder="4">
                                        </div>
                                        <div class="col-sm-6 ps-3">
                                            <label>Tot. A/L Hrs  left </label>
                                            <input type="text" class="form-control editInput" id="occupancy" name="occupancy" placeholder="2">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>MAT leave<span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="account_number" placeholder="MAT leave">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" id="saveCouncilTax">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ url('public/js/salesFinance/council_tax.js') }}"></script>

<script>
    deleteURL = "{{ url('finance/delete-council-tax') }}/";
    saveData = "{{ url('finance/save-council-tax') }}";
    editData = "{{ url('finance/edit-council-tax') }}";
</script>

<script>
    $('#Leave_startDate').datepicker({
        format: 'dd-mm-yyyy'
    });
 
    $('#Leave_startDate').on('change', function () {
        $('#Leave_startDate').datepicker('hide');
    });
 
    $("#salesDayBookModel").scroll(function () {
        $('#Leave_startDate').datepicker('place');
    });
</script>

@endsection


