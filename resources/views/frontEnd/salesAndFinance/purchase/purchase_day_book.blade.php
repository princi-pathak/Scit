@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Purchase Day Book')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Purchase Day Book</h4>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                                    <div class="jobsection justify-content-end">
                                        <!-- <a href="{{ url('purchase/purchase-day-book/add') }}" class="profileDrop">Add</a> -->
                                        <a href="#!" type="button" class="profileDrop openPurchaseDayBookModel" data-action="add"><i class="fa fa-plus"></i> Add</a>
                                    </div>
                            <div class="productDetailTable mb-4 table-responsive">
                                <table class="table border-top border-bottom tablechange" id="containerA">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Supplier </th>
                                            <th>Date</th>
                                            <th>Net</th>
                                            <th>VAT</th>
                                            <th>Gross </th>
                                            <th>Rate </th>
                                            <th>Total </th>
                                            <th>Reclaim </th>
                                            <th>Not Reclaim </th>
                                            <th>Expense Type </th>
                                            <th>Expense Amount </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $totalNetAmount = 0;
                                        $totalVatAmount = 0;
                                        $totalGrossAmount = 0;
                                        $totalFinalAmount = 0;
                                        $totalReclaim = 0;
                                        $totalNotReclaim = 0;
                                        $totalExpense = 0;
                                        @endphp

                                        @foreach($purchaseDayBook as $purchaseBook)

                                        @php
                                        $netAmount = $purchaseBook->netAmount ?? 0;
                                        $vatAmount = $purchaseBook->vatAmount ?? 0;
                                        $grossAmount = $purchaseBook->grossAmount ?? 0;
                                        $reclaim = $purchaseBook->reclaim;
                                        $not_reclaim = $purchaseBook->not_reclaim;
                                        $expense_amount = $purchaseBook->expense_amount;
                                        $finalAmount = $netAmount + $vatAmount;

                                        $totalNetAmount += $netAmount;
                                        $totalVatAmount += $vatAmount;
                                        $totalGrossAmount += $grossAmount;
                                        $totalFinalAmount += $finalAmount;
                                        $totalReclaim += $reclaim;
                                        $totalNotReclaim += $not_reclaim;
                                        $totalExpense += $expense_amount;
                                        @endphp

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $purchaseBook->customer_name }}</td>
                                            <td>{{ $purchaseBook->date }}</td>
                                            <td>{{ $purchaseBook->netAmount }}</td>
                                            <td>{{ $purchaseBook->vatAmount }}</td>
                                            <td>{{ '£'.$purchaseBook->grossAmount ?? '' }}</td>
                                            <td>{{ $purchaseBook->tax_rate_name }}</td>
                                            <td>£{{ ($purchaseBook->netAmount + $purchaseBook->vatAmount) - $purchaseBook->reclaim    }}</td>
                                            <td>{{ $purchaseBook->reclaim ? '£' . $purchaseBook->reclaim : '' }}</td>
                                            <td>{{ $purchaseBook->not_reclaim }}</td>
                                            <td>{{ $purchaseBook->title }}</td>
                                            <td>{{ $purchaseBook->expense_amount ? '£' . $purchaseBook->expense_amount : '' }}</td>
                                            <td>
                                                <!-- <div class="dropdown action_dropdown">
                                                        <a href="#" class="dropdown-toggle profileDrop" data-toggle="dropdown" aria-expanded="false">
                                                            <div class="action_drop">
                                                                <span>Action &nbsp;</span> <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                            </div>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ url('purchase/purchase-day-book/edit/' . $purchaseBook->id) }}" class="dropdown-item ">Edit</a>
                                                            <a href="#!" class="dropdown-item deleteBtn" data-id="{{ $purchaseBook->id }}">Delete</a>
                                                        </div>
                                                    </div> -->
                                                <a href="#!" class="openPurchaseDayBookModel" data-action="edit" data-id="{{ $purchaseBook->id }}" data-supplier_id="{{ $purchaseBook->supplier_id }}" data-date="{{ $purchaseBook->date }}" data-netAmount="{{ $purchaseBook->netAmount }}" data-vat="{{ $purchaseBook->Vat }}" data-vatAmount="{{ $purchaseBook->vatAmount }}" data-grossAmount="{{ $purchaseBook->grossAmount }}" data-reclaim="{{ $purchaseBook->reclaim }}" data-not_reclaim="{{ $purchaseBook->not_reclaim }}" data-expense_type="{{ $purchaseBook->expense_type }}" data-expense_amount="{{ $purchaseBook->expense_amount }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> |
                                                <a href="#!"><i class="fa fa-trash radStar" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" rowspan="1">Page Sub Total</th>
                                            <th rowspan="1" colspan="1">£{{ number_format($totalNetAmount, 2) }}</th>
                                            <th rowspan="1" colspan="1">£{{ number_format($totalVatAmount, 2) }}</th>
                                            <th rowspan="1" colspan="2">£{{ number_format($totalGrossAmount, 2) }}</th>
                                            <th rowspan="1" colspan="1">£{{ number_format($totalFinalAmount, 2) }}</th>
                                            <th rowspan="1" colspan="1">£{{ number_format($totalReclaim, 2) }}</th>
                                            <th rowspan="1" colspan="2">£{{ number_format($totalNotReclaim, 2) }}</th>
                                            <th rowspan="1" colspan="1">£{{ number_format($totalExpense, 2) }}</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- End off main Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Purchase day book Modal start here -->
<div class="modal fade" id="purchase_day_book_form" tabindex="-1" aria-labelledby="purchase_day_book_formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="modalTitle"></h4>
            </div>
            <form id="save-purchase-day-book">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="formDtail">
                                <div class="form-group">
                                    <label for="Supplier_input"> Supplier <span class="radStar">*</span></label>
                                    <div>
                                        <input type="hidden" name="purchase_day_book_id" id="purchase_day_book_id">
                                        <input type="hidden" id="supplier_id">
                                        <select class="form-control editInput selectOptions" name="supplier_id" id="Supplier_input">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Date_input"> Date <span class="radStar">*</span></label>
                                    <div>
                                        <input type="Date" class="form-control editInput" name="date" id="Date_input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="net_amount"> Net <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="netAmount" id="net_amount" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gross_amount">Total Amount (to be paid)</label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="" id="totalAmount" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="vat_input">VAT <span class="radStar">*</span></label>
                                    <div>
                                        <input type="hidden" id="tax_id">
                                        <select class="form-control editInput selectOptions" name="Vat" id="vat_input">
                                            <option>-Not Assigned-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="vat_amount">VAT Amount</label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="vatAmount" id="vat_amount" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gross_amount">Gross</label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="grossAmount" id="gross_amount" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reclaim_amount"> Reclaim <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="reclaim" id="reclaim_amount" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="not_claim"> Not Claim <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="not_reclaim" id="not_claim" placeholder="" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="expenses"> Expenses <span class="radStar">*</span></label>
                                    <div>
                                        <input type="hidden" id="expenses_id">
                                        <select class="form-control editInput selectOptions" name="expense_type" id="expenses">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rate_input">Expense Amount</label>
                                    <div>
                                        <input type="text" class="form-control editInput" name="expense_amount" id="expenses_amount" readonly>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End row -->
                    </div>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="savePurchaseDayBook">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end here -->
<script>
    const salesDayBook = "{{ url('/purchase/purchase-day-book/delete/') }}";
    const getSuppliersList = "{{ url('/purchase/getSupplierData') }}";
    const getPurchaseExpenses = "{{ url('/purchase/getPurchaseExpense') }}"; 
    const getTaxRate =  '{{ route("invoice.ajax.getActiveTaxRate") }}';
    const reclaimPercantage = "{{ url('/purchase/purchase-day-book-reclaim-per') }}";
    const calculatedData = "{{ url('/purchase/reclaimPercantage') }}";
    const savePurchaseDayBook = "{{ url('purchase/save-purchase-day-book') }}";
</script>

<script type="text/javascript" src="{{ url('public/js/salesFinance/dayBook/purchaseDayBook.js') }}"></script>
@endsection