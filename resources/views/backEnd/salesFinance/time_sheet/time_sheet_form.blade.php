

@extends('backEnd.layouts.master')
@section('title',' Add New')
@section('content')

<!--main content start-->
<section id="main-content" class="">
    <div class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <header class="panel-heading">
                       @if(isset($sales_day_book))
                        Edit
                        @else
                        Add
                        @endif
                        Sales Day Book 
                    </header>
                    @if (session('success'))
                    <div class="aalert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))    
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" method="POST" action="{{ url('/admin/sales-finance/sales/save-sales-day-book') }}" role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Customer <span class="radStar">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="hidden" id="sales_day_book_id" name="sales_day_book_id" value="{{ isset($sales_day_book->id) ? $sales_day_book->id : '' }}">
                                        <input type="hidden" id="customer_id" name="customer_id" value="{{ isset($sales_day_book->customer_id) ? $sales_day_book->customer_id : '' }}">
                                        <select class="form-control" id="getCustomerList" name="customer_id">
                                            <option value="">Select Customer</option>
                                        </select>
                                        @error('customer_id')
                                            <div class="radStar">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Date <span class="radStar">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="Date_input" name="date" placeholder="Date" value="{{ isset($sales_day_book->date) ? date('d-m-Y', strtotime($sales_day_book->date)) : '' }}">
                                        @error('date')
                                            <div class="radStar">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Invoice <span class="radStar">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="Invoice_input" name="invoice_no" placeholder="Invoice no." value="{{ isset($sales_day_book->invoice_no) ? $sales_day_book->invoice_no : '' }}">
                                        @error('invoice_no')
                                            <div class="radStar">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Net <span class="radStar">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="Net Amount" name="netAmount" value="{{ isset($sales_day_book->netAmount) ? $sales_day_book->netAmount : '' }}" id="net_amount" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                                        @error('netAmount')
                                            <div class="radStar">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">VAT <span class="radStar">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="hidden" class="form-control" id="tax_id" placeholder="Tax ID" value="{{ isset($sales_day_book->Vat) ? $sales_day_book->Vat : '' }}">
                                        <select class="form-control" id="vat_input" name="Vat">
                                            <option value="">Select VAT</option>
                                        </select>
                                        @error('Vat')
                                            <div class="radStar">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">VAT Amount <span class="radStar">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="VAT Amount" name="vatAmount" id="vat_amount" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" value="{{ isset($sales_day_book->vatAmount) ? $sales_day_book->vatAmount : '' }}" readonly>
                                        @error('vatAmount')
                                            <div class="radStar">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Gross <span class="radStar">*</span> </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="Gross" name="grossAmount" id="gross_amount" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" value="{{ isset($sales_day_book->grossAmount) ? $sales_day_book->grossAmount : '' }}" readonly>
                                        @error('grossAmount')
                                            <div class="radStar">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="submit" class="btn btn-default">Cencel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
    </div>
</section>
@endsection