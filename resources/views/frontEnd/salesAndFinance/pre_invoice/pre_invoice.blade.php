@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Pre Invoice')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@section('content')

<style>
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        cursor: pointer !important;
        background-color: #fff !important;
        opacity: 1;
    }
</style>

    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="col-md-4 col-lg-4 col-xl-4 ">
                                <div class="pageTitle">
                                    <h3>Pre Invoice</h3>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="maimTable">
                                    <!-- <div class="printExpt">
                                        <div class="prntExpbtn">
                                            <a href="#!">Print</a>
                                            <a href="#!">Export</a>
                                        </div>
                                    </div> -->
                                    <div class="markendDelete delete_btn_end">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="jobsection">
                                                    <a href="javascript:void(0)" onclick="openInvoiceModal('', 'add')"
                                                        class="profileDrop">New</a>
                                                    <!-- <a href="#!" class="profileDrop" id="active_inactive" >Current Rate (per week)</a>
                                                    <a href="#!" class="profileDrop" id="active_inactive" >Subs (per week)</a>
                                                    <a href="#!" class="profileDrop" id="active_inactive" >Additional Hours</a>
                                                    <a href="#!" class="profileDrop" id="active_inactive" >Additional Extras - weekly</a>
                                                    <a href="#!" class="profileDrop" id="active_inactive" >Additional Extras - one off</a>
                                                    <a href="javascript:void(0)" id="deleteSelectedRows"
                                                        class="profileDrop">Delete</a> -->
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6 deleteSelectedRows">
                                                <div class="jobsection">
                                                    <a href="javascript:void(0)" id="deleteSelectedRows"
                                                        class="profileDrop">Delete</a>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="productDetailTable pt-3">
                                        <table class="table tablechange mb-0" id="exampleOne">
                                            <thead class="table-light">
                                                <tr>
                                                    <!-- <th class="col-1"><input type="checkbox" id="selectAllCheckBoxes"></th> -->
                                                    <th>#</th>
                                                    <th>Name of Young Person</th>
                                                    <th>Home Local Authority</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Current Rate(per week)</th>
                                                    <th>Subs(per week)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><?php if(isset($child) && $child !=''){ echo $child->name; }?></td>
                                                    <td><?php if(isset($child) && $child !=''){ echo $child->local_authority; }?></td>
                                                    <td><?php if(isset($child) && $child !=''){ echo $child->start_date; }?></td>
                                                    <td><?php if(isset($child) && $child !=''){ echo $child->end_date; }?></td>
                                                    <td><?php if(isset($child) && $child !=''){ echo $child->weekly_rate; }?></td>
                                                    <td><?php if(isset($child) && $child !=''){ echo $child->subs; }?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-end">
                                                            <div class="nav-item dropdown">
                                                                <a href="#!" class="nav-link dropdown-toggle profileDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right" style="z-index:9999">
                                                                    <a href="#!" class="dropdown-item">Edit</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="{{url('/service/invoice/preview/'.$service_user_id)}}" target="_blank" class="dropdown-item">Preview</a>
                                                                    <div class="dropdown-divider"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End off main Table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pre Invoice Add Modal start here -->
    <div class="modal fade" id="addPreInvoiceModel" tabindex="-1" aria-labelledby="preInvoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    <h5 class="modal-title" id="preInvoiceModalLabel"></h5>
                </div>
                <div class="modal-body">
                    <form id="preInvoiceForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="formDtail">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="mt-1 mb-0" id="messagedepreciation_types"></div>
                                        <input type="hidden" name="id" id="id">
                                        <input type="hidden" name="child_id" id="child_id" value="<?php if(isset($service_user_id)){ echo $service_user_id;}?>">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                <div class="formDtail">
                                                    <!-- <div class="mb-3">
                                                        <label>Child Initials & Name</label>
                                                        <input type="text" class="form-control editInput" id="name" name="name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Local Authority</label>
                                                        <input type="text" class="form-control editInput" id="local_authority" name="local_authority">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Flat/Room</label>
                                                        <input type="text" class="form-control editInput" id="flat_room" name="flat_room">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control editInput" id="address" name="address">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>DOB</label>
                                                        <input type="date" class="form-control editInput" id="dob" name="dob">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Social Worker</label>
                                                        <input type="text" class="form-control editInput" id="social_worker" name="social_worker">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control editInput" id="email" name="email">
                                                    </div> -->
                                                    <div class="mb-2 Additional_Hours">
                                                        <label class="heading d-block mb-3">Current Rate (per week)</label>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label>Start Date</label>
                                                                <input type="date"
                                                                    class="form-control editInput faltpicker_date"
                                                                    id="currentRateStart_date" name="currentRateStart_date[]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>End Date</label>
                                                                <input type="date"
                                                                    class="form-control editInput faltpicker_date"
                                                                    id="currentRateEnd_date" name="currentRateEnd_date[]" onchange="CountDays('currentRateStart_date','currentRateEnd_date','currentRateNo_of_days','currentRateTotalCost','currentRateWeekly_rate',null,1)">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label>No of days</label>
                                                                <input type="start" class="form-control editInput" id="currentRateNo_of_days"
                                                                    name="currentRateNo_of_days[]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Weekly Rate</label>
                                                                <input type="text" class="form-control editInput" id="currentRateWeekly_rate"
                                                                    name="currentRateWeekly_rate[]" value="<?php if(isset($child) && $child->weekly_rate !=''){echo $child->weekly_rate;}?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="heading">Total Cost Excluding VAT</label>
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <input type="text" readonly
                                                                        class="form-control editInput" id="currentRateTotalCost" name="currentRateTotalCost[]">
                                                                </div>
                                                                <!-- <div class="col-sm-1">
                                                                    <a href="javascript:void(0)" class="formicon"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#supplierPop">
                                                                        <i class="fa fa-plus"></i></a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 Additional_Hours">
                                                        <label class="heading d-block mb-3">Subs (per week)</label>
                                                        <!-- <div class="mb-3">
                                                            <label>Subs</label>
                                                            <input type="text" class="form-control editInput" id="subs" name="subs">
                                                        </div> -->
                                                        <!-- <div class="mb-3">
                                                            <label>Extras</label>
                                                                <input type="text" class="form-control editInput" id="extras" name="extras">
                                                        </div> -->
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label>Start Date</label>
                                                                <input type="date"
                                                                    class="form-control editInput faltpicker_date"
                                                                    id="subsStart_date" name="subsStart_date[]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>End Date</label>
                                                                <input type="date"
                                                                    class="form-control editInput faltpicker_date"
                                                                    id="subsEnd_date" name="subsEnd_date[]" onchange="CountDays('subsStart_date','subsEnd_date','subsNo_of_days','subsTotalCost','subsWeeklyRate',null,2)">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label>No of days</label>
                                                                <input type="start" class="form-control editInput" id="subsNo_of_days"
                                                                    name="subsNo_of_days[]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Weekly Rate</label>
                                                                <input type="text" class="form-control editInput" id="subsWeeklyRate"
                                                                    name="subsWeeklyRate[]" value="<?php if(isset($child) && $child->subs !=''){echo $child->subs;}?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="heading">Total Cost</label>
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <input type="text" readonly
                                                                        class="form-control editInput" id="subsTotalCost" name="subsTotalCost[]">
                                                                </div>
                                                                <!-- <div class="col-sm-1">
                                                                    <a href="javascript:void(0)" class="formicon"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#supplierPop">
                                                                        <i class="fa fa-plus"></i></a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 Additional_Hours">
                                                        <label class="heading d-block">Additional Hours</label>
                                                        <div class="mb-3">
                                                            <label>Hours per week </label>
                                                            <input type="text" class="form-control editInput" id="additionalHours_HoursPerWeek"
                                                                name="additionalHours_HoursPerWeek[]">
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-6">
                                                                <label>Start Date </label>
                                                                <input type="date"
                                                                    class="form-control editInput faltpicker_date" id="additionalHours_Start_date"
                                                                    name="additionalHours_Start_date[]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>End Date </label>
                                                                <input type="date"
                                                                    class="form-control editInput faltpicker_date" id="additionalHours_End_date"
                                                                    name="additionalHours_End_date[]" onchange="CountDays('additionalHours_Start_date','additionalHours_End_date','additionalHours_No_of_days','additionalHours_TotalCost','additionalHours_Hourly_rate','additionalHours_HoursPerWeek',3)">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-6">
                                                                <label>No of days</label>
                                                                <input type="text" class="form-control editInput" id="additionalHours_No_of_days"
                                                                    name="additionalHours_No_of_days[]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Hourly rate</label>
                                                                <input type="text" class="form-control editInput" id="additionalHours_Hourly_rate"
                                                                    name="additionalHours_Hourly_rate[]" value="27.13" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="heading">Total Cost Excluding VAT</label>
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <input type="text" readonly
                                                                        class="form-control editInput" id="additionalHours_TotalCost" name="additionalHours_TotalCost[]">
                                                                </div>
                                                                <!-- <div class="col-sm-1">
                                                                    <a href="javascript:void(0)" class="formicon"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#supplierPop">
                                                                        <i class="fa fa-plus"></i></a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 Additional_Hours">
                                                        <label class="heading d-block">Additional Extras - weekly:</label>
                                                        <div class="mb-3">
                                                            <label>Expenditure Type</label>
                                                            <input type="text" class="form-control editInput" id="additionalExtrasWeekly_ExpenditureType"
                                                                name="additionalExtrasWeekly_ExpenditureType[]">
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-6">
                                                                <label>Start Date </label>
                                                                <input type="date"
                                                                    class="form-control editInput faltpicker_date" id="additionalExtrasWeekly_Start_date"
                                                                    name="additionalExtrasWeekly_Start_date[]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>End Date </label>
                                                                <input type="date"
                                                                    class="form-control editInput faltpicker_date" id="additionalExtrasWeekly_End_date"
                                                                    name="additionalExtrasWeekly_End_date[]" onchange="CountDays('additionalExtrasWeekly_Start_date','additionalExtrasWeekly_End_date','additionalExtrasWeekly_No_of_Days','additionalExtrasWeekly_Total_Cost','additionalExtrasWeekly_Weekly_amount',null,4)">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-6">
                                                                <label>No of days</label>
                                                                <input type="text"
                                                                    class="form-control editInput faltpicker_date" id="additionalExtrasWeekly_No_of_Days"
                                                                    name="additionalExtrasWeekly_No_of_Days[]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Weekly Amount </label>
                                                                <input type="text"
                                                                    class="form-control editInput" id="additionalExtrasWeekly_Weekly_amount"
                                                                    name="additionalExtrasWeekly_Weekly_amount[]" value="<?php if(isset($child) && $child->extra !=''){echo $child->extra;}?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="heading">Total Cost</label>
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <input type="text" readonly
                                                                        class="form-control editInput" id="additionalExtrasWeekly_Total_Cost" name="additionalExtrasWeekly_Total_Cost[]">
                                                                </div>
                                                                <!-- <div class="col-sm-1">
                                                                    <a href="javascript:void(0)" class="formicon"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#supplierPop">
                                                                        <i class="fa fa-plus"></i></a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 Additional_Hours">
                                                        <label class="heading d-block">Additional Extras - one off:</label>
                                                        <div class="mb-3">
                                                            <label>Expenditure Type</label>
                                                            <input type="text" class="form-control editInput" id="additionalExtrasOneOff_Expediture_type"
                                                                name="additionalExtrasOneOff_Expediture_type[]">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Date</label>
                                                            <input type="date" class="form-control editInput faltpicker_date" id="additionalExtrasOneOff_Start_date" name="additionalExtrasOneOff_Start_date[]" onchange="CountDays('additionalExtrasOneOff_Start_date',null,null,'additionalExtrasOneOff_Total_cost','additionalExtrasOneOff_Amount',null,5)">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Amount </label>
                                                            <input type="text" class="form-control editInput" id="additionalExtrasOneOff_Amount" name="additionalExtrasOneOff_Amount[]" value="<?php if(isset($child) && $child->extra !=''){echo $child->extra;}?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="heading">Total Cost</label>
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <input type="text" readonly
                                                                        class="form-control editInput" id="additionalExtrasOneOff_Total_cost" name="additionalExtrasOneOff_Total_cost[]">
                                                                </div>
                                                                <!-- <div class="col-sm-1">
                                                                    <a href="javascript:void(0)" class="formicon"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#supplierPop">
                                                                        <i class="fa fa-plus"></i></a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="productDetailTable">
                                                            <table class="table tablechange mb-0 table-bordered"
                                                                id="exampleOne">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Summary</th>
                                                                        <th>Net Cost</th>
                                                                        <th>VAT</th>
                                                                        <th>Total </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Accomodation Rate:</td>
                                                                        <td id="accomodationCost">£000</td>
                                                                        <td id="accomodationVat"></td>
                                                                        <td id="accomodationTotal">£000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Total Subs</td>
                                                                        <td id="subsCost">£000</td>
                                                                        <td id="subsVat"></td>
                                                                        <td id="subsTotal">£000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Total Cost Additional hours</td>
                                                                        <td id="additionalHoursCost">£000</td>
                                                                        <td id="additionalHoursVat"></td>
                                                                        <td id="additionalHoursTotal">£000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Additional Extras - weekly</td>
                                                                        <td id="addExtrasWeekCost">£000</td>
                                                                        <td id="addExtrasWeekVat"></td>
                                                                        <td id="addExtrasWeekTotal">£000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>Additional Extras - one off</td>
                                                                        <td id="addExtrasOneoffCost">£000</td>
                                                                        <td id="addExtrasOneoffVat"></td>
                                                                        <td id="addExtrasOneoffTotal">£000</td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Total invoice cost</th>
                                                                        <th id="totalInvoiceCost">£000</th>
                                                                        <th id="totalInvoiceVat"></th>
                                                                        <th id="totalInvoiceTotal">£000</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="mb-3">
                                                        <label>Additional Extras - weekly <span class="radStar">*</span></label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control editInput" id="additional_extras_weekly1" name="additional_extras_weekly[]">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#supplierPop">
                                                                <i class="fa fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Additional Extras - one off <span class="radStar">*</span></label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control editInput" id="additional_extras_oneoff1" name="additional_extras_oneoff[]">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#supplierPop">
                                                                <i class="fa fa-plus"></i></a>
                                                        </div>
                                                    </div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End row -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="profileDrop" id="savePreInvoiceModal"
                        onclick="savePreInvoiceModal()">Save</button>
                    <button type="button" class="profileDrop gray" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end here -->

@endsection
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        defualt_date(0)
    });
    $("#deleteSelectedRows").on('click', function () {
        let ids = [];

        $('.delete_checkbox:checked').each(function () {
            ids.push($(this).val());
        });
        if (ids.length == 0) {
            alert("Please check the checkbox for delete");
        } else {
            if (confirm("Are you sure to delete?")) {
                // console.log(ids);
                var token = '<?php echo csrf_token(); ?>'
                var model = 'PurchaseExpenses';
                $.ajax({
                    type: "POST",
                    url: "{{url('/bulk_delete')}}",
                    data: {
                        ids: ids,
                        model: model,
                        _token: token
                    },
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            location.reload();
                        } else {
                            alert("Something went wrong");
                        }
                        // return false;
                    },
                    error: function (xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
                    }
                });
            }
        }

    });
    $('.delete_checkbox').on('click', function () {
        if ($('.delete_checkbox:checked').length === $('.delete_checkbox').length) {
            $('#selectAllCheckBoxes').prop('checked', true);
        } else {
            $('#selectAllCheckBoxes').prop('checked', false);
        }
    });
    $('#selectAllCheckBoxes').on('click', function () {
        $('.delete_checkbox').prop('checked', $(this).prop('checked'));
    });

    function openInvoiceModal(element, type) {
        $("#addPreInvoiceModel").modal('show');
        if (type === 'add') {
            $("#preInvoiceModalLabel").text("Add New Pre-Invoice");
        } else {
            $("#preInvoiceModalLabel").text("Edit Pre-Invoice");
        }
    }
    function savePreInvoiceModal() {
        $.ajax({
            url: "{{ url('/save-pre-invoice') }}",
            type: "POST",
            data: $('#preInvoiceForm').serialize(),
            success: function (response) {
                console.log(response);
                if(response.vali_error){
                    alert(response.vali_error);
                    return false;
                }else{
                    alert(response.message);
                    window.location.reload();
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.message;
                console.log(errors)
                alert("Something went wrong");
            }
        });
    }
    function defualt_date(type) {
        if (type == 0) {
            flatpickr(".faltpicker_date", {
                dateFormat: "d/m/Y",
            });
        }

    }
</script>
<script>
    var netCost=0;
    var netVat=0;
    var netTotal=0;
    function CountDays(start_date, end_date = null, apened_id = null, total_cost, rate, hourly_time = null, fieldtype) {
        
        var rate_value = parseFloat(document.getElementById(rate).value) || 0;
        var calculateTotalCost = 0;

        if (end_date) {
            let startDateStr = document.getElementById(start_date).value;
            let endDateStr = document.getElementById(end_date).value;

            if (startDateStr && endDateStr) {
                let startParts = startDateStr.split('/');
                let endParts = endDateStr.split('/');
                let startDate = new Date(startParts[2], startParts[1] - 1, startParts[0]);
                let endDate = new Date(endParts[2], endParts[1] - 1, endParts[0]);
                let diffTime = endDate - startDate;
                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                document.getElementById(apened_id).value = diffDays >= 0 ? diffDays : "Invalid Dates";

                if (hourly_time != null) {
                    let hourly = document.getElementById(hourly_time).value;
                    calculateTotalCost = rate_value * hourly;
                } else {
                    calculateTotalCost = rate_value * diffDays;
                }

                document.getElementById(total_cost).value = calculateTotalCost;
            }
        } else {
            calculateTotalCost = rate_value;
            document.getElementById(total_cost).value = calculateTotalCost;
        }

        calculate_summary(calculateTotalCost, fieldtype);
    }
    function calculate_summary(TotalCost,fieldtype){
        var PreInvoiceVat='<?php if(isset($PreInvoiceVat) && $PreInvoiceVat !=''){ echo $PreInvoiceVat->vat;}?>'
        let vat = TotalCost * PreInvoiceVat /100;
        let vatCalculate=TotalCost;
        if(fieldtype == 1){
            $("#accomodationCost").text('£'+TotalCost.toFixed(2));
            $("#accomodationVat").text('£'+vat.toFixed(2));
            var vatAmount=vatCalculate+vat;
            $("#accomodationTotal").text('£'+vatAmount.toFixed(2));
            netVat=netVat+vat;
            
        }else if(fieldtype == 2){
            $("#subsCost").text('£'+TotalCost.toFixed(2));
            $("#subsTotal").text('£'+TotalCost.toFixed(2));
        }else if(fieldtype == 3){
            $("#additionalHoursCost").text('£'+TotalCost.toFixed(2));
            $("#additionalHoursVat").text('£'+vat.toFixed(2));
            var vatAmount=vatCalculate+vat;
            $("#additionalHoursTotal").text('£'+vatAmount.toFixed(2));
            netVat=netVat+vat;
            
        }else if(fieldtype == 4){
            $("#addExtrasWeekCost").text('£'+TotalCost.toFixed(2));
            $("#addExtrasWeekTotal").text('£'+TotalCost.toFixed(2));
        }else if(fieldtype == 5){
            $("#addExtrasOneoffCost").text('£'+TotalCost.toFixed(2));
            $("#addExtrasOneoffTotal").text('£'+TotalCost.toFixed(2));
        }
        netCost=netCost+TotalCost;
        netTotal=netVat+netCost;
        $("#totalInvoiceCost").text('£'+netCost.toFixed(2));
        $("#totalInvoiceVat").text('£'+netVat.toFixed(2));
        $("#totalInvoiceTotal").text('£'+netTotal.toFixed(2));
    }
</script>