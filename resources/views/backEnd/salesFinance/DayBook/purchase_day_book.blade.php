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
                        Purchase Day Book
                        <!-- <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span> -->
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
                                    <select class="form-control" name="tax_rate" id="vat_input">
                                        <option value="">Please Select</option>
                                    </select>
                                </div>

                                <div class="btn-group">
                                    <a href="{{url('admin/sales-finance/purchase/purchase-day-book-add')}}" id="editable-sample_new" class="btn btn-primary">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>

                                <!-- <div class="btn-group">
                                    <button class="btn btn-default"> Export </button>
                                </div> -->
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Supplier</th>
                                        <th>Date</th>
                                        <th>Net</th>
                                        <th>VAT</th>
                                        <th>Gross</th>
                                        <th>Rate</th>
                                        <th>Total</th>
                                        <th>Reclaim</th>
                                        <th>Not Reclaim</th>
                                        <th>Expense Type</th>
                                        <th>Expense Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchase_day_book as $key => $value)
                                    <tr class="">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->customer_name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                        <td>{{ $value->netAmount }}</td>
                                        <td>{{ $value->vatAmount }}</td>
                                        <td>{{ $value->grossAmount }}</td>
                                        <td>{{ $value->tax_rate_name }}</td>
                                        <td>{{ $value->grossAmount - $value->reclaim  }}</td>
                                        <td>{{ $value->reclaim }}</td>
                                        <td>{{ $value->not_reclaim }}</td>
                                        <td>{{ $value->title  }}</td>
                                        <td>{{ $value->expense_amount }}</td>
                                        <td>
                                            <a href="{{ url('admin/sales-finance/purchase/purchase-day-book-edit/'.$value->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ url('admin/sales-finance/purchase/purchase-day-book-delete/'.$value->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if($purchase_day_book->isEmpty())
                                    <tr>
                                        <td colspan="13" class="text-center">No records found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
    </div>
</section>

<script>
    $(document).ready(function() {
        const vatInputValue = document.getElementById('vat_input'); // Assumes ID is 'vat_input'
        taxRate(vatInputValue);
    });




    function taxRate(dropdown) {
        $.ajax({
            url: '{{ url("admin/sales-finance/purchase/getTaxRate") }}',
            method: 'GET',
            success: function(response) {
                console.log("response.data", response.data);
                if (Array.isArray(response.data)) {
                    // const dropdown = document.getElementById('vat_input'); // Assumes ID is 'vat_input'
                    if (!dropdown) {
                        console.error("Element with ID not found");
                        return;
                    }

                    dropdown.innerHTML = ''; // Clear existing options

                    const optionInitial = document.createElement('option');
                    // const preTaxID = document.getElementById('tax_id').value;
                    optionInitial.textContent = "Please Select";
                    optionInitial.value = 0;
                    dropdown.appendChild(optionInitial);

                    response.data.forEach(code => {
                        const option = document.createElement('option');
                        option.value = code.id;
                        option.textContent = code.name + " (" + code.tax_rate + "%)";
                        option.setAttribute('data-tax-rate', code.tax_rate);
                        // if (preTaxID && code.id == preTaxID) {
                        //     option.selected = true;
                        // }
                        dropdown.appendChild(option);
                    });
                } else {
                    console.error("Invalid response format");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>
@endsection