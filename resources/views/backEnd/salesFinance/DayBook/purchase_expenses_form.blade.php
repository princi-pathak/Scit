@extends('backEnd.layouts.master')
@section('title',' Add New')
@section('content')

<!--main content start-->
<section id="main-content" class="">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Purchase Expenses Add
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" placeholder="Title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Status</label>
                                    <div class="col-lg-10">
                                        <select class="form-control">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
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
                </section>

            </div>
        </div>
        <!-- page end-->
    </section>
</section>

@endsection