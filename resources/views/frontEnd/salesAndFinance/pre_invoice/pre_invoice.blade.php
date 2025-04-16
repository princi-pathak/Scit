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

<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Pre Invoice</h3>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="jobsection justify-content-end delete_btn_end">
                                <!-- <a href="{{url('sales-finance/assets/asset-regiser-add')}}" class="profileDrop"><i class="fa fa-plus"></i> Add</a> -->
                                <a href="javascript:void(0)" onclick="openInvoiceModal('add')"  class="profileDrop"> <i class="fa fa-plus"></i> Add</a>
                                <a href="javascript:void(0)" class="profileDrop">Export</a>
                                <!-- <a href="#!" class="profileDrop" id="active_inactive" >Current Rate (per week)</a>
                                <a href="#!" class="profileDrop" id="active_inactive" >Subs (per week)</a>
                                <a href="#!" class="profileDrop" id="active_inactive" >Additional Hours</a>
                                <a href="#!" class="profileDrop" id="active_inactive" >Additional Extras - weekly</a>
                                <a href="#!" class="profileDrop" id="active_inactive" >Additional Extras - one off</a>
                                <a href="javascript:void(0)" id="deleteSelectedRows"
                                    class="profileDrop">Delete</a> -->
                            </div>
                            <div class="productDetailTable mb-4 table-responsive">
                                <table class="table border-top border-bottom tablechange" id="exampleOne">
                                    <thead>
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
                                            <a href="javascript:void(0)"  class="openModalBtn"><i class="fa fa-pencil edit_data" data-child_id="{{ $service_user_id }}"></i></a> |
                                            <a href="{{url('/service/invoice/preview/'.$service_user_id)}}" target="_blank" class="openModalBtn"><i class="fa fa-eye" ></i></a>
                                            </td>
                                            <!-- <td>
                                                <div class="d-flex justify-content-end">
                                                    <div class="nav-item dropdown">
                                                        <a href="#!" class="nav-link dropdown-toggle profileDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" style="z-index:9999">
                                                            <a href="javascript:void(0)" class="dropdown-item edit_data ps-3" data-child_id="{{ $service_user_id }}">Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="{{url('/service/invoice/preview/'.$service_user_id)}}" target="_blank" class="dropdown-item ps-3">Preview</a>
                                                            <div class="dropdown-divider"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> -->
                                        </tr>
                                    </tbody>
                                </table>
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
            <div class="modal-content ">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    <h4 class="modal-title" id="preInvoiceModalLabel"></h5>
                </div>
                <div class="modal-body">
                    <form id="preInvoiceForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="formDtail">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="mt-1 mb-0" id="messagedepreciation_types"></div>
                                        <input type="hidden" name="child_id" id="child_id" value="<?php if(isset($service_user_id)){ echo $service_user_id;}?>">
                                        <input type="hidden" name="vat" id="vat" value="<?php if(isset($PreInvoiceVat) && $PreInvoiceVat !=''){ echo $PreInvoiceVat->vat;}?>">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                <div class="formDtail">
                                                    <div class="mb-2 Additional_Hours">
                                                    <input type="hidden" name="current_week_id[]" id="current_week_id">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 Additional_Hours">
                                                        <label class="heading d-block mb-3">Subs (per week)</label>
                                                        <input type="hidden" name="subs_week_id[]" id="subs_week_id">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 Additional_Hours">
                                                        <label class="heading d-block">Additional Hours</label>
                                                        <input type="hidden" name="additionalHours_id[]" id="additionalHours_id">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 Additional_Hours">
                                                        <label class="heading d-block">Additional Extras - weekly:</label>
                                                        <input type="hidden" name="extras_weekly_id[]" id="extras_weekly_id">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 Additional_Hours">
                                                        <label class="heading d-block">Additional Extras - one off:</label>
                                                        <input type="hidden" name="oneoff_id[]" id="oneoff_id">
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="savePreInvoiceModal"
                        onclick="savePreInvoiceModal()">Save</button>
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

    function openInvoiceModal(type) {
        $("#addPreInvoiceModel").modal('show');
        if (type === 'add') {
            document.getElementById("preInvoiceForm").reset();
            $("#current_week_id").val('');
            $("#subs_week_id").val('');
            $("#additionalHours_id").val('');
            $("#extras_weekly_id").val('');
            $("#oneoff_id").val('');
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
                }else if(response.success === true){
                    alert(response.message);
                    $("#addPreInvoiceModel").modal('hide');
                    window.location.reload();
                }else{
                    console.log("No response");
                    alert("Something went wrong");
                    return false;
                }
            },
            error: function (xhr) {
                console.log(xhr);
                let errors = xhr.responseJSON.error;
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
<script>
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('edit_data')) {
            var child_id = event.target.getAttribute('data-child_id');
            var token='<?php echo csrf_token();?>';
            var url=`{{ url('service/invoice/edit_PreInvoice') }}`;
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ child_id: child_id })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // return false;
                if(data.success === true){
                    openInvoiceModal('edit');
                    var current_ratePerWeek=data.data;
                    var current_week_id=[];
                    var subs_week_id=[];
                    var additionalHours_id=[];
                    var extras_weekly_id=[];
                    var oneoff_id=[];
                    current_ratePerWeek.forEach(function(current) {
                        // alert(current.current_rate);
                        var current_date=getDateFormat(current.start_date,current.end_date);
                        $("#currentRateStart_date").val(current_date.start_date);
                        $("#currentRateEnd_date").val(current_date.end_date);
                        current_week_id.push(current.id);
                        $("#current_week_id").val(current_week_id);
                        CountDays('currentRateStart_date','currentRateEnd_date','currentRateNo_of_days','currentRateTotalCost','currentRateWeekly_rate',null,1);

                        var pre_invoice_subs=current.pre_invoice_subs;
                        pre_invoice_subs.forEach(function(subs){
                            var subs_date=getDateFormat(subs.subs_start_date,subs.subs_end_date);
                            $("#subsStart_date").val(subs_date.start_date);
                            $("#subsEnd_date").val(subs_date.end_date);
                            subs_week_id.push(subs.id);
                            $("#subs_week_id").val(subs_week_id);
                            CountDays('subsStart_date','subsEnd_date','subsNo_of_days','subsTotalCost','subsWeeklyRate',null,2)
                        });

                        var pre_invoice_additional_hours=current.pre_invoice_additional_hours;
                        pre_invoice_additional_hours.forEach(function(hours){
                            $("#additionalHours_HoursPerWeek").val(hours.addHour_no_of_days);
                            var hours_date=getDateFormat(hours.addHour_start_date,hours.addHour_end_date);
                            $("#additionalHours_Start_date").val(hours_date.start_date);
                            $("#additionalHours_End_date").val(hours_date.end_date);
                            additionalHours_id.push(hours.id);
                            $("#additionalHours_id").val(additionalHours_id);
                            CountDays('additionalHours_Start_date','additionalHours_End_date','additionalHours_No_of_days','additionalHours_TotalCost','additionalHours_Hourly_rate','additionalHours_HoursPerWeek',3);
                        });

                        var pre_invoice_extras_weeklies=current.pre_invoice_extras_weeklies;
                        pre_invoice_extras_weeklies.forEach(function(weeklies){
                            $("#additionalExtrasWeekly_ExpenditureType").val(weeklies.extras_weekly_expenditure_type);
                            var weeklies_date=getDateFormat(weeklies.extras_weekly_start_date,weeklies.extras_weekly_end_date);
                            $("#additionalExtrasWeekly_Start_date").val(weeklies_date.start_date);
                            $("#additionalExtrasWeekly_End_date").val(weeklies_date.end_date);
                            extras_weekly_id.push(weeklies.id);
                            $("#extras_weekly_id").val(extras_weekly_id);
                            CountDays('additionalExtrasWeekly_Start_date','additionalExtrasWeekly_End_date','additionalExtrasWeekly_No_of_Days','additionalExtrasWeekly_Total_Cost','additionalExtrasWeekly_Weekly_amount',null,4);
                        });

                        var pre_invoice_extras_one_offs=current.pre_invoice_extras_one_offs;
                        pre_invoice_extras_one_offs.forEach(function(oneOff){
                            $("#additionalExtrasOneOff_Expediture_type").val(oneOff.extras_oneoff_expenditure_type);
                            var oneOff_date=getDateFormat(oneOff.extras_oneoff_start_date,'');
                            $("#additionalExtrasOneOff_Start_date").val(oneOff_date.start_date);
                            oneoff_id.push(oneOff.id);
                            $("#oneoff_id").val(oneoff_id);
                            CountDays('additionalExtrasOneOff_Start_date',null,null,'additionalExtrasOneOff_Total_cost','additionalExtrasOneOff_Amount',null,5);
                        });
                    });
                    // location.reload();
                }else{
                    alert("Something went wrong");
                    return false;
                }
                
            })
            .catch(error => {
                console.error("Error: ",error);
            });
        }
    });
    function getDateFormat(start_date,end_date = null){
        var originalDate = start_date;
        var parts = originalDate.split("-");
        var formattedDate = parts[2] + '/' + parts[1] + '/' + parts[0];

        var originalDate1 = end_date;
        var parts1 = originalDate1.split("-");
        var formattedDate1 = parts1[2] + '/' + parts1[1] + '/' + parts1[0];
        var data = {
            start_date: formattedDate,
            end_date: formattedDate1
        };
        return data;
    }
</script>