@extends('backEnd.layouts.master')
@section('title',' Add New')
@section('content')
<section id="main-content" class="">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('success')) 
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                    @endif
                    @if (session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                    @endif
                    <header class="panel-heading">Add Council Tax</header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" method="POST" action="{{ url('/admin/finance/save-council-tax') }}" role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label ">Flat number (if applicable)</label>
                                    <div class="col-lg-9">
                                        <input type="hidden" name="council_tax_id" value="">
                                        <input type="text" class="form-control" id="" name="flat_number" placeholder="Flat number (if applicable)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Address" name="address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Post Code</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Post Code" name="post_code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Council</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Council" name="council">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">No of Bedrooms</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="No of Bedrooms" name="no_of_bedrooms">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Occupancy</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Occupancy" name="occupancy">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Owned by Omega</label>
                                    <div class="col-lg-9">
                                        <input type="radio" id="OwnedbyOmegaYes" name="owned_by_omega" value="1">
                                        <label for="OwnedbyOmegaYes" class="control-label"> Yes</label>
                                        <input type="radio" id="OwnedbyOmegaNo" name="owned_by_omega" value="0">
                                        <label for="OwnedbyOmegaNo" class="control-label"> No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Exempt</label>
                                    <div class="col-lg-9">
                                        <input type="radio" id="ExemptYes" name="exempt" value="1">
                                        <label for="ExemptYes" class="control-label"> Yes</label>
                                        <input type="radio" id="ExemptNo" name="exempt" value="0">
                                        <label for="ExemptNo" class="control-label"> No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Last bill</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="last_bill_date" name="last_bill_date" placeholder="Last bill">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">Account number<span class="radStar">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account number" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Start Period</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="bill_period_start_date" name="bill_period_start_date">
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" id="bill_period_end_date" name="bill_period_end_date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Amount paid</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Amount paid" name="amount_paid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Additional Notes</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Additional Notes" name="additional_notes">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="submit" class="btn btn-default">Cencel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<script>

</script>
<script src="{{ url('public/js/salesFinance/council_tax.js') }}"></script>
@endsection