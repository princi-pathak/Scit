

@extends('backEnd.layouts.master')
@section('title',' Add New')
@section('content')
<style>
    .position-center {
    width: 80%;
    margin: 0 auto;
}

.pad148{
 padding: 0px 13.5%;
}
</style>

<!--main content start-->
<section id="main-content" class="">
    <div class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <header class="panel-heading">
                       Add Time Sheet
                    </header>

                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" method="" action="" role="form">
                                <div class="row">                        
                                    <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">User <span class="radStar">*</span></label>
                                        <div class="col-lg-9">
                                            <select class="form-control" id="" name="customer_id">
                                                <option value="">Mick Carter</option>
                                                <option value="">Select </option>
                                                <option value="">Select </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">Date <span class="radStar">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="" name="date" placeholder="Date" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">Hours <span class="radStar">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="" name="hours" placeholder="Hours" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">Sleep <span class="radStar">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="" name="sleep" value="" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">Wake Night <span class="radStar">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="" name="wakeNight" value="" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">Disturbance <span class="radStar">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="" name="disturbance" value="" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">Annual Leave <span class="radStar">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="" name="annualLeave" value="" id="">
                                        </div>
                                    </div>
                               
                                    <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">On Call <span class="radStar">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="" name="onCall" id="" value="">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">Comments <span class="radStar">*</span> </label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control" placeholder="Enter your comments" rows="5"></textarea>
                                        </div>
                                    </div>
                                     <div class="col-md-6 form-group">
                                        <label for="" class="col-lg-3 col-sm-3 control-label">Upload file <span class="radStar">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="file" class="form-control" name="file" id="" value="" >
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="pad148">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <button type="submit" class="btn btn-default">Cencel</button>
                                        </div>
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