@extends('backEnd.layouts.master')
@section('title',' Leads')
@section('content')

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <a href="{{ url('admin/sales-finance/leads/add') }}">
                                        <button id="editable-sample_new" class="btn btn-primary">Add Lead <i class="fa fa-plus"></i></button>
                                    </a>
                                    <a href="{{ url('admin/sales-finance/leads/add') }}">
                                        <button id="editable-sample_new" class="btn btn-primary">All Leads </button>
                                    </a>
                                    <a href="{{ url('admin/sales-finance/leads/add') }}">
                                        <button id="editable-sample_new" class="btn btn-primary">My Leads </button>
                                    </a>
                                    <a href="{{ url('admin/sales-finance/leads/add') }}">
                                        <button id="editable-sample_new" class="btn btn-primary">Unassigned </button>
                                    </a>
                                    <a href="{{ url('admin/sales-finance/leads/add') }}">
                                        <button id="editable-sample_new" class="btn btn-primary">Rejected </button>
                                    </a>
                                    <a href="{{ url('admin/sales-finance/leads/add') }}">
                                        <button id="editable-sample_new" class="btn btn-primary">Authorization </button>
                                    </a>
                                    <a href="{{ url('admin/sales-finance/leads/add') }}">
                                        <button id="editable-sample_new" class="btn btn-primary">Converted </button>
                                    </a>
                                    <a href="{{ url('admin/sales-finance/leads/add') }}">
                                        <button id="editable-sample_new" class="btn btn-primary">Tasks </button>
                                    </a>
                                </div>
                                @include('backEnd.common.alert_messages')
                            </div>
                            <div class="space15"></div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div id="editable-sample_length" class="dataTables_length">
                                        <form method='post' action="{{ url('admin/homelist') }}" id="records_per_page_form">
                                            <label>
                                            </label>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form method='get' action="{{ url('admin/label/view') }}">
                                        <div class="dataTables_filter" id="editable-sample_filter">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Company Name</th>
                                            <th>Email Address</th>
                                            <th>Telephone</th>
                                            <th>Mobile</th>
                                            <th>Website</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Postcode</th>
                                            <th>Lead Ref</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->contact_name }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->telephone }}</td>
                                            <td>{{ $customer->mobile }}</td>
                                            <td>{{ $customer->website }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>{{ $customer->city }}</td>
                                            <td>{{ $customer->country }}</td>
                                            <td>{{ $customer->postal_code }}</td>
                                            <td>{{ $customer->lead_ref }}</td>
                                            <td>{{ $customer->status }}</td>
                                            <td><a href="{{ url('admin/sales-finance/leads/edit').'/'.$customer->id }}" class="edit"><span style="color: #000;"><i data-toggle="tooltip" title="Edit" class="fa fa-edit fa-lg"></i></a>
                                                <a href="" class="delete"><i data-toggle="tooltip" title="Delete" class="fa fa-trash-o fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
@endsection