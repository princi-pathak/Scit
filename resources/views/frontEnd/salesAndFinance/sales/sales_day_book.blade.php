@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Sales Day Book')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Sales Day Book</h4>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="jobsection justify-content-end">
                                <a href="#!" type="button" class="profileDrop openSalesDayBookModel" data-action="add"><i class="fa fa-plus"></i> Add</a>
                            </div>
                            <div class="productDetailTable mb-4 table-responsive">
                                <table class="table border-top border-bottom tablechange" id="containerA">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer </th>
                                            <th>Date</th>
                                            <th>Invoice No.</th>
                                            <th>Net</th>
                                            <th>VAT</th>    
                                            <th>Gross </th>
                                            <th>Rate </th>
                                            <th>Total </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $totalNetAmount = 0;
                                        $totalVatAmount = 0;
                                        $totalGrossAmount = 0;
                                        $totalFinalAmount = 0;
                                        @endphp

                                        @foreach($salesDayBooks as $salesBook)

                                        @php
                                        $netAmount = $salesBook->netAmount ?? 0;
                                        $vatAmount = $salesBook->vatAmount ?? 0;
                                        $grossAmount = $salesBook->grossAmount ?? 0;
                                        $finalAmount = $netAmount + $vatAmount;

                                        $totalNetAmount += $netAmount;
                                        $totalVatAmount += $vatAmount;
                                        $totalGrossAmount += $grossAmount;
                                        $totalFinalAmount += $finalAmount;
                                        @endphp

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $salesBook->customer_name }}</td>
                                            <td>{{ $salesBook->date }}</td>
                                            <td>{{ $salesBook->invoice_no }}</td>
                                            <td>{{ $salesBook->netAmount }}</td>
                                            <td>{{ $salesBook->vatAmount }}</td>
                                            <td>{{ $salesBook->grossAmount }}</td>
                                            <td>{{ $salesBook->tax_rate_name }}</td>
                                            <td>{{ $salesBook->netAmount + $salesBook->vatAmount }}</td>
                                            <td>
                                                <!-- <div class="d-flex justify-content-end actionDropdown">
                                                            <div class="nav-item dropdown">
                                                                <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">Action</a>
                                                                <div class="dropdown-menu fade-up m-0">
                                                                    <a href="{{ url('sales/sales-day-book/edit/' . $salesBook->id) }}" class="dropdown-item">Edit</a>
                                                                    <a href="#!" class="dropdown-item deleteBtn" data-id="{{ $salesBook->id }}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                <!-- <div class="dropdown action_dropdown">
                                                        <a href="#" class="dropdown-toggle profileDrop" data-toggle="dropdown" aria-expanded="false">
                                                            <div class="action_drop">
                                                                <span>Action &nbsp;</span> <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                            </div>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ url('sales/sales-day-book/edit/' . $salesBook->id) }}" data-action="edit" class="dropdown-item openSalesDayBookModel">Edit</a>
                                                            <a href="#!" class="dropdown-item deleteBtn" data-id="{{ $salesBook->id }}">Delete</a>
                                                        </div>
                                                    </div> -->
                                                <a href="#!" class="openSalesDayBookModel" data-action="edit" data-id="{{ $salesBook->id }}" data-customer_id="{{ $salesBook->customer_id }}" data-date="{{ $salesBook->date }}" data-invoice_no="{{ $salesBook->invoice_no }}" data-netAmount="{{ $salesBook->netAmount }}" data-vat="{{ $salesBook->Vat }}" data-vatAmount="{{ $salesBook->vatAmount }}" data-grossAmount="{{ $salesBook->grossAmount }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> |
                                                <a href="#!" class="deleteBtn" data-id="{{ $salesBook->id }}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" rowspan="1">Page Sub Total</th>
                                            <th rowspan="1" colspan="1">£{{ number_format($totalNetAmount, 2) }}</th>
                                            <th rowspan="1" colspan="1">£{{ number_format($totalVatAmount, 2) }}</th>
                                            <th rowspan="1" colspan="2">£{{ number_format($totalGrossAmount, 2) }}</th>
                                            <th rowspan="1" colspan="2">£{{ number_format($totalFinalAmount, 2) }}</th>
                                        </tr>
                                    </tfoot>
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

<!-- Sales Day book Modal start here -->
<div class="modal fade" id="salesDayBookModel" tabindex="-1" aria-labelledby="add_sales_day_bookLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="modalTitle"></h4>
            </div>
            <form id="salesDayBookForm">
                <div id="error-div"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <input type="hidden" name="sales_day_book_id" id="sales_day_book_id">
                                <label> Customer <span class="radStar">*</span></label>
                                <input type="hidden" id="customer_id">
                                <select class="form-control editInput selectOptions" name="customer_id" id="getCustomerList">
                                    <option>Select Customer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Date <span class="radStar">*</span></label>
                                <input type="text" class="form-control " name="date" id="Date_input">
                            </div>
                            <div class="form-group">
                                <label> Invoice <span class="radStar">*</span></label>
                                <input type="text" class="form-control editInput" name="invoice_no" id="Invoice_input" placeholder="Invoice no.">
                            </div>
                            <div class="form-group">
                                <label> Net <span class="radStar">*</span></label>
                                <input type="text" class="form-control editInput" id="net_amount" name="netAmount" placeholder="" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class="form-group">
                                <label>VAT <span class="radStar">*</span></label>
                                <input type="hidden" id="tax_id">
                                <select class="form-control editInput selectOptions" name="Vat" id="vat_input">
                                    <option>-Not Assigned-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vat Amount </label>
                                <input type="text" class="form-control editInput" name="vatAmount" id="vat_amount" placeholder="" readonly>
                            </div>
                            <div class="form-group">
                                <label>Gross</label>
                                <input type="text" class="form-control editInput" name="grossAmount" id="gross_amount" placeholder="" readonly>
                            </div>
                        </div>
                        <!-- End row -->
                    </div>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="saveSalesDayBookModal">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end here -->

<script>
    const salesDayBook = "{{ url('/sales/sales-day-book/delete/') }}";
    const customerList = '{{ route("customer.ajax.getCustomerList") }}';
    const getTaxRate = '{{ route("invoice.ajax.getActiveTaxRate") }}';
    const saveSalesDayBook = "{{ url('sales/save-sales-day-book') }}";
</script>

<script type="text/javascript" src="{{ url('public/js/salesFinance/dayBook/salesDayBook.js') }}"></script>
@endsection