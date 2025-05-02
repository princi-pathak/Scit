@extends('backEnd.layouts.master')
@section('title',' Add New')
@section('content')
<section id="main-content" class="">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Add Council Tax</header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label ">Flat number (if applicable)</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Post Code</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Post Code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Council</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Council">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">No of Bedrooms</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="No of Bedrooms">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Occupancy</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Occupancy">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Owned by Omega</label>
                                    <div class="col-lg-9">
                                        <input type="radio" id="OwnedbyOmegaYes" name="OwnedbyOmega" value="yes">
                                        <label for="OwnedbyOmegaYes" class="control-label"> Yes</label>
                                        <input type="radio" id="OwnedbyOmegaNo" name="OwnedbyOmega" value="no">
                                        <label for="OwnedbyOmegaNo" class="control-label"> No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Exempt</label>
                                    <div class="col-lg-9">
                                        <input type="radio" id="ExemptYes" name="Exempt" value="yes">
                                        <label for="ExemptYes" class="control-label"> Yes</label>
                                        <input type="radio" id="ExemptNo" name="Exempt" value="no">
                                        <label for="ExemptNo" class="control-label"> No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Last bill</label>
                                    <div class="col-lg-9">
                                        <input type="Date" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Start Period</label>
                                    <div class="col-lg-4">
                                        <input type="Date" class="form-control" id="">
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="Date" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Amount paid</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Amount paid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-3 col-sm-3 control-label">Additional Notes</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="Additional Notes">
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

@endsection