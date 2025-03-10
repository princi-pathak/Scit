@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Purchase Expenses</h3>
                </div>
            </div>
        </div>

        <di class="row">
            <div class="col-lg-12">
                <div class="maimTable">
                    <div class="printExpt">
                        <div class="prntExpbtn">
                            <a href="#!">Print</a>
                            <a href="#!">Export</a>
                        </div>
                    </div>
                    <div class="markendDelete">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="jobsection">
                                    <a href="javascript:void(0)" onclick="openExpensesModal()" class="profileDrop">New</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Record Payment Modal start here -->
                    <div class="modal fade" id="addPurchaseExpensesModel" tabindex="-1" aria-labelledby="purchaseExpesnsesModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content add_Customer">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="purchaseExpesnsesModalLabel">Add Purchase Expenses</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="formDtail">
                                                <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                                                    <div class="mt-1 mb-0 text-center" id="messagedepreciation_types"></div>
                                                </div>
                                                <form id="purchaseExpeneseForm" class="customerForm pt-0">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id">
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                                            <div class="formDtail">
                                                                <div class="mb-2 row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">Title<span class="radStar ">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" name="title">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <label for="inputProject" class="col-sm-3 col-form-label">Status</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control editInput selectOptions" id="statusdepreciation_typesModal" name="status">
                                                                            <option value="1">Active</option>
                                                                            <option value="0">Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- End row -->
                                </div>
                                <div class="modal-footer customer_Form_Popup">
                                    <button type="button" class="profileDrop" id="savePurchaseExpesnsesModal">Save</button>
                                    <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end here -->

                    <div class="productDetailTable pt-3">
                        <table class="table tablechange mb-0" id="containerA">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Expense </th>
                                    <th>Status </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchase_expenses as $purchase_expense)
                                <tr>
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
</section>


@include('frontEnd.salesAndFinance.jobs.layout.footer')
<script>
    function openExpensesModal() {
        $("#addPurchaseExpensesModel").modal('show');
    }

    $(document).ready(function() {
        $("#savePurchaseExpesnsesModal").on("click", function(e) {
            e.preventDefault(); // Prevent page reload

            $.ajax({
                url: "{{ url('purchase/save-purchase-expenses') }}", // Laravel route
                type: "POST",
                data: $('#purchaseExpeneseForm').serialize(), // Serialize form data
                success: function(response) {
                    // $("#addPurchaseExpensesModel").modal("hide");
                    alert(response.message);
                    // $("#addPurchaseExpensesModel")[0].reset(); // Clear form fields
                    // Reload page after short delay
                    // setTimeout(function() {
                        window.location.reload();
                    // }, 1000);
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
        });
    });
</script>

<script type="text/javascript" src="{{ url('public/js/salesFinance/dayBook/purchaseDayBook.js') }}"></script>