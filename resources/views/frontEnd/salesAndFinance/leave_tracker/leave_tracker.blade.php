@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Leave Tracker')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<style>
    .omegaCareAnnual thead tr th, .omegaCareAnnual tbody tr td{
     white-space: nowrap;
    }
    table.tablechange tbody td a.table_iconSize i{
      font-size: 18px !important;
      padding: 0 20px;
    }
    .viewDetails i{
     color: #1f88b5;
    }
    /* .editdetails i{
     color:rgb(32, 133, 2);
    } */
    .trashdetails i{
        color:rgb(181, 41, 31);
    }
    .formDtail .text-danger {
        position: absolute;
    }
</style>

<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Leave Tracker</h4>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="jobsection justify-content-end">
                                        <a href="{{url('finance/leave-tracker-add')}}" type="button" class="profileDrop openTimeSheetModel"> <i class="fa fa-plus"></i> Add</a>
                                    </div>
                                </div>
                            </div>
                            <div class="productDetailTable mb-4 table-responsive">
                                <table class="table border-top border-bottom tablechange" id="staffWorker">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Hours</th>
                                            <th>Sleep</th>
                                            <th>Wake Night </th>
                                            <th>DIsturbance </th>
                                            <th>Annual Leave</th>
                                            <th>On Call</th>
                                            <th>Comments </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>1.</strong></td>
                                            <td>Johan bely </td>
                                            <td>Xyz Care</td>
                                            <td>25, july</td>
                                            <td>
                                                <a href="#!" class="table_iconSize viewDetails openModalBtn" data-action='add'><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="#!" class="table_iconSize editdetails"><i class="fa fa-edit (alias)"></i></a>
                                                <a href="#!" class="table_iconSize trashdetails"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td><strong>2.</strong></td>
                                            <td>Johan bely </td>
                                            <td>Xyz Care</td>
                                            <td>25, july</td>
                                            <td>
                                                <a href="#!" class="table_iconSize viewDetails openModalBtn" data-action='add'><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="#!" class="table_iconSize editdetails"><i class="fa fa-edit (alias)"></i></a>
                                                <a href="#!" class="table_iconSize trashdetails"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>3.</strong></td>
                                            <td>Johan bely </td>
                                            <td>Xyz Care</td>
                                            <td>25, july</td>
                                            <td>
                                                <a href="#!" class="table_iconSize viewDetails openModalBtn" data-action='add'><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="#!" class="table_iconSize editdetails"><i class="fa fa-edit (alias)"></i></a>
                                                <a href="#!" class="table_iconSize trashdetails"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>4.</strong></td>
                                            <td>Johan bely </td>
                                            <td>Xyz Care</td>
                                            <td>25, july</td>
                                            <td>
                                                <a href="#!" class="table_iconSize viewDetails openModalBtn" data-action='add'><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="#!" class="table_iconSize editdetails"><i class="fa fa-edit (alias)"></i></a>
                                                <a href="#!" class="table_iconSize trashdetails"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>5.</strong></td>
                                            <td>Johan bely </td>
                                            <td>Xyz Care</td>
                                            <td>25, july</td>
                                            <td>
                                                <a href="#!" class="table_iconSize viewDetails openModalBtn" data-action='add'><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="#!" class="table_iconSize editdetails"><i class="fa fa-edit (alias)"></i></a>
                                                <a href="#!" class="table_iconSize trashdetails"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>6.</strong></td>
                                            <td>Johan bely </td>
                                            <td>Xyz Care</td>
                                            <td>25, july</td>
                                            <td>
                                                <a href="#!" class="table_iconSize viewDetails  openModalBtn" data-action='add'><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="#!" class="table_iconSize editdetails"><i class="fa fa-edit (alias)"></i></a>
                                                <a href="#!" class="table_iconSize trashdetails"><i class="fa fa-trash-o"></i></a>
                                            </td>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div id="error-text"></div>
            <form action="" id="addCouncilTaxForm" class="customerForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    <h4 class="modal-title" id="modalTitle">Leave Tracker</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="maimtable productDetailTable mb-4 table-responsive">
                                <table id="myTable2" class="table border-top border-bottom tablechange omegaCareAnnual" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th>Date</th>
                                            <th>Hours</th>
                                            <th>Sleep</th>
                                            <th>Disturbance</th>
                                            <th>Wake Night</th>
                                            <th>Annual Leave</th>
                                            <th>On Call</th>
                                            <th>Comments</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>1.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><strong>2.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td><strong>3.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr> 
                                         <tr>
                                            <td><strong>3.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>3.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>3.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>3.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>3.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>3.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>3.</strong></td>
                                            <td>25th </td>
                                            <td>14</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr> 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>113.75</th>
                                            <th>8</th>
                                            <th>0</th>
                                            <th>0</th>
                                            <th>16</th>
                                            <th>£0</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>

<!-- Add Staff Modal start here -->
<div class="modal fade" id="addStaffWorkerModal" tabindex="-1" aria-labelledby="addStaffWorkerModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="modalTitle">Add Staff</h4>
            </div>
            <form action="" id="time_sheet" class="customerForm ">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="row formDtail ps-4 pe-4">
                            <div class="col-md-6 form-group">
                                <label> User <span class="radStar">*</span> </label>
                                <select name="user_id" id="user_id" class="form-control editInput">
                                    
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Date <span class="radStar">*</span></label>
                                <input type="text" class="form-control editInput" id="timeSheetDate" name="date">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Hours </label>
                                <input type="text" class="form-control editInput" id="hours" name="hours">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Sleep </label>
                                <input type="text" class="form-control editInput" id="sleep" name="sleep">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Wake Night </label>
                                <input type="text" class="form-control editInput" id="wake_night" name="wake_night">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Disturbance </label>
                                <input type="text" class="form-control editInput" id="disturbance" name="disturbance">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Annual Leave </label>
                                <input type="text" class="form-control editInput" id="annual_leave" name="annual_leave">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> On Call </label>
                                <input type="text" class="form-control editInput" id="on_call" name="on_call">
                            </div>
                            <div class="col-md-12 form-group">
                                <label> Comments <span class="radStar">*</span></label>
                                <textarea class="form-control textareaInput" placeholder="Type your comments..." rows="3" id="comments" name="comments"></textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" id="save_time_sheet">Save</button>
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
    $(document).ready(function() {
    $('#myTable2').DataTable();
});
</script>
<!-- Add Staff Modal end here -->
@endsection