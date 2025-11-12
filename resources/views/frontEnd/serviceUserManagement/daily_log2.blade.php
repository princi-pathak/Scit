@extends('frontEnd.layouts.master')
@section('title','Daily Logs')
@section('content')
<style type="text/css">

</style>

<link rel="stylesheet" href="{{ url('public\frontEnd\css\time-line.css') }}">

<!--main content start-->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Payroll</h4>
                    </header>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Post Name</th>
                                    <th>Overtime Hrs worked</th>
                                    <th>Sick Hrs</th>
                                    <th>Regular Hrs worked</th>
                                    <th>Vacation Hrs</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--main content end-->


@include('frontEnd.serviceUserManagement.elements.add_log')
@include('frontEnd.serviceUserManagement.elements.comments')
@endsection