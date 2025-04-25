@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Purchase Expenses Type')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">

<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Purchase Expenses Type</h4>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="jobsection justify-content-end">
                                <a href="javascript:void(0)" onclick="openExpensesModal('', 'add')" class="profileDrop" data-action="add"><i class="fa fa-plus"></i> Add</a>
                                <a href="javascript:void(0)" id="deleteSelectedRows" class="profileDrop">Delete</a>
                            </div>
                            <div class="productDetailTable mb-4 table-responsive">
                                <table class="table border-top border-bottom tablechange display" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="col-1"><input type="checkbox" id="selectAllCheckBoxes"></th>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Expense Type </th>
                                            <th>Status </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchase_expenses as $purchase_expense)
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="" class="delete_checkbox" value="{{$purchase_expense->id}}">
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $purchase_expense->created_at }}</td>
                                            <td>{{ $purchase_expense->title }}</td>
                                            <td>
                                                <?php if ($purchase_expense->status == 1) { ?>
                                                    <span class="grencheck" onclick="status_change({{$purchase_expense->id}},{{$purchase_expense->status}})"><i class="fa-solid fa-circle-check"></i></span>
                                                <?php } else { ?>
                                                    <span class="grayCheck" onclick="status_change({{$purchase_expense->id}},{{$purchase_expense->status}})"><i class="fa-solid fa-circle-check"></i></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="openExpensesModal(this, 'edit')" class="dropdown-item assetCatemodal_dataFetch" data-id="{{ $purchase_expense->id }}" data-name="{{ $purchase_expense->title }}" data-status="{{ $purchase_expense->status }}"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
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
</section>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

<!-- Purchase Expenses Modal start here -->
<div class="modal fade" id="addPurchaseExpensesModel" tabindex="-1" aria-labelledby="purchaseExpesnsesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="purchaseExpesnsesModalLabel"></h4>
            </div>
            <form id="purchaseExpeneseForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="formDtail">
                                <div class="mt-1 mb-0 text-center" id="messagedepreciation_types"></div>
                                <input type="hidden" name="purchase_expense_id" id="purchase_expense_id">
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                        <label>Title <span class="radStar ">*</span></label>
                                        <input type="text" class="form-control editInput" name="title" id="purchase_expense_title">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                        <label>Status</label>
                                        <select class="form-control editInput selectOptions" id="purchase_expense_status" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End row -->
                    </div>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="savePurchaseExpesnsesModal">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end here -->
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

<script>
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

    function openExpensesModal(element, type) {
        console.log(type);
        $("#addPurchaseExpensesModel").modal('show');
        // document.getElementById('purchaseExpesnsesModalLabel').textContent = type === "add" ? "Add Purchase Order" : "Edit Purchase Order";

        if (type === "add") {
            // Clear form fields for a new entry
            document.getElementById("purchase_expense_id").value = "";
            document.getElementById("purchase_expense_title").value = "";
            document.getElementById("purchase_expense_status").value = "";

            // Set modal title for "Add"
            document.getElementById("purchaseExpesnsesModalLabel").textContent = "Add Purchase Expenses Type";

        } else if (type === "edit") {
            document.getElementById("purchaseExpesnsesModalLabel").textContent = "Edit Purchase Expenses Type";

            let id = element.dataset.id;
            let name = element.dataset.name;
            let status = element.dataset.status;

            // Set form values
            document.getElementById("purchase_expense_id").value = id;
            document.getElementById("purchase_expense_title").value = name;
            document.getElementById("purchase_expense_status").value = status;

        }

    }

    $(document).ready(function() {
        $("#savePurchaseExpesnsesModal").on("click", function(e) {
            e.preventDefault(); // Prevent page reload
            var id=$("#purchase_expense_id").val();
            var saveUrl="{{ url('purchase/save-purchase-expenses') }}";
            if(id !=''){
                saveUrl="{{ url('purchase/edit-purchase-expenses') }}";
            }
            $.ajax({
                url: saveUrl, // Laravel route
                type: "POST",
                data: $('#purchaseExpeneseForm').serialize(), // Serialize form data
                success: function(response) {
                    alert(response.message);
                    window.location.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        // Validation error
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';

                        // Clear old errors first
                        $('.text-danger').remove();

                        $.each(errors, function(key, value) {
                            // Display message under each input field
                            let inputField = $(`[name="${key}"]`);
                            if (inputField.length) {
                                inputField.after(`<span class="text-danger">${value[0]}</span>`);
                            }

                            // Collect all messages for optional alert box
                            errorMessages += value[0] + "\n";
                        });

                        // Optional: show all errors in a single alert box
                        // alert("Please fix the following errors:\n" + errorMessages);
                    } else {
                        alert("Something went wrong. Please try again.");
                    }
                }
            });
        });
    });
</script>
@endsection
<script type="text/javascript" src="{{ url('public/js/salesFinance/dayBook/purchaseDayBook.js') }}"></script>