@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Pre Invoice')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')


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
                                                <a href="javascript:void(0)" onclick="openInvoiceModal('', 'add')" class="profileDrop">New</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 deleteSelectedRows">
                                            <div class="jobsection">
                                                <a href="javascript:void(0)" id="deleteSelectedRows" class="profileDrop">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="productDetailTable pt-3">
                                    <table class="table tablechange mb-0" id="exampleOne">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="col-1"><input type="checkbox" id="selectAllCheckBoxes"></th>
                                                <th>#</th>
                                                <th>Name of Young Person</th>
                                                <th>Home Local Authority</th>
                                                <th>Premises</th>
                                                <th>Room No.</th>
                                                <th>Current Rate(per week)</th>
                                                <th>Subs(per week)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
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
                <h5 class="modal-title" id="preInvoiceModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
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
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="formDtail">
                                                <div class="mb-3">
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
                                                </div>
                                                <div class="mb-2 Additional_Hours">
                                                    <label class="heading d-block mb-3">Current Rate (per week)</label>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label>Start Date</label>
                                                            <input type="date" class="form-control editInput" id="start_date" name="start_date">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>End Date</label>
                                                            <input type="date" class="form-control editInput" id="end_date" name="end_date">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label>No of days</label>
                                                            <input type="start" class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Weekly Rate</label>
                                                            <input type="text" class="form-control editInput" id="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="heading">Total Cost Excluding VAT</label>
                                                        <div class="row">
                                                            <div class="col-md-11">
                                                            <input type="text" disabled class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#supplierPop">
                                                            <i class="fa fa-plus"></i></a>
                                                            </div>
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
                                                            <input type="date" class="form-control editInput" id="start_date" name="start_date">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>End Date</label>
                                                            <input type="date" class="form-control editInput" id="end_date" name="end_date">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label>No of days</label>
                                                            <input type="start" class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Weekly Rate</label>
                                                            <input type="text" class="form-control editInput" id="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="heading">Total Cost</label>
                                                        <div class="row">
                                                            <div class="col-md-11">
                                                            <input type="text" disabled class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#supplierPop">
                                                            <i class="fa fa-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2 Additional_Hours">
                                                    <label class="heading d-block">Additional Hours</label>
                                                       <div class="mb-3">
                                                            <label>Hours per week </label>
                                                            <input type="text" class="form-control editInput" id="email" name="email">
                                                       </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label>Start Date </label>
                                                            <input type="date" class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>End Date </label>
                                                            <input type="date" class="form-control editInput" id="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label>No of days</label>
                                                            <input type="text" class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Hourly rate</label>
                                                            <input type="text" class="form-control editInput" id="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="heading">Total Cost Excluding VAT</label>
                                                        <div class="row">
                                                            <div class="col-md-11">
                                                            <input type="text" disabled class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#supplierPop">
                                                            <i class="fa fa-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2 Additional_Hours">
                                                    <label class="heading d-block">Additional Extras - weekly:</label>
                                                       <div class="mb-3">
                                                            <label>Expenditure Type</label>
                                                            <input type="text" class="form-control editInput" id="email" name="email">
                                                       </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label>Start Date </label>
                                                            <input type="date" class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>End Date </label>
                                                            <input type="date" class="form-control editInput" id="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <label>No of days</label>
                                                            <input type="text" class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Weekly Amount </label>
                                                            <input type="text" class="form-control editInput" id="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="heading">Total Cost</label>
                                                        <div class="row">
                                                            <div class="col-md-11">
                                                            <input type="text" disabled class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#supplierPop">
                                                            <i class="fa fa-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2 Additional_Hours">
                                                    <label class="heading d-block">Additional Extras - one off:</label>
                                                    <div class="mb-3">
                                                        <label>Expenditure Type</label>
                                                        <input type="text" class="form-control editInput" id="email" name="email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control editInput" id="" name="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Amount </label>
                                                        <input type="text" class="form-control editInput" id="" name="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="heading">Total Cost</label>
                                                        <div class="row">
                                                            <div class="col-md-11">
                                                            <input type="text" disabled class="form-control editInput" id="" name="">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#supplierPop">
                                                            <i class="fa fa-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="productDetailTable">
                                                        <table class="table tablechange mb-0 table-bordered" id="exampleOne">
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
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Total Subs</td>
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Total Cost Additional hours</td>
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Additional Extras - weekly</td>
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Additional Extras - one off</td>
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                    <td>000</td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Total invoice cost</th>
                                                                    <th>000</th>
                                                                    <th>000</th>
                                                                    <th>000</th>
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
                <button type="button" class="profileDrop" id="savePreInvoiceModal" onclick="savePreInvoiceModal()">Save</button>
                <button type="button" class="profileDrop gray" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- end here -->

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        defualt_date(0)
    });
    $("#deleteSelectedRows").on('click', function() {
        let ids = [];

        $('.delete_checkbox:checked').each(function() {
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
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            location.reload();
                        } else {
                            alert("Something went wrong");
                        }
                        // return false;
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
                    }
                });
            }
        }

    });
    $('.delete_checkbox').on('click', function() {
        if ($('.delete_checkbox:checked').length === $('.delete_checkbox').length) {
            $('#selectAllCheckBoxes').prop('checked', true);
        } else {
            $('#selectAllCheckBoxes').prop('checked', false);
        }
    });
    $('#selectAllCheckBoxes').on('click', function() {
        $('.delete_checkbox').prop('checked', $(this).prop('checked'));
    });

    function openInvoiceModal(element, type){
       $("#addPreInvoiceModel").modal('show');
       if(type === 'add'){
            $("#preInvoiceModalLabel").text("Add New Pre-Invoice");
       }else{
        $("#preInvoiceModalLabel").text("Edit Pre-Invoice");
       }
    }
    function savePreInvoiceModal(){
        $.ajax({
            url: "{{ url('finance/save-pre-invoice') }}",
            type: "POST",
            data: $('#preInvoiceForm').serialize(),
            success: function(response) {
                console.log(response);return false;
                alert(response.message);
                window.location.reload();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = "<p style='color:red;'>";
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + "<br>";
                });
                errorMessage += "</p>";
                alert(errorMessage);
            }
        });
    }
    function defualt_date(type) {
        if (type == 1) {
            flatpickr("#purchase_purchase_date", {
                dateFormat: "d/m/Y",
                defaultDate: new Date()
            });
            flatpickr("#purchase_payment_due_date", {
                dateFormat: "d/m/Y",
                defaultDate: new Date()
            });

        }

    }
</script>