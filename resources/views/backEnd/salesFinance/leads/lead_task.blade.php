@extends('backEnd.layouts.master')
@section('title',' Task Type')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <div class="panel-body">
                        @include('backEnd.salesFinance.leads.leads_button')
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                @include('backEnd.common.alert_messages')
                            </div>
                            <div class="space15"></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div id="editable-sample_length" class="dataTables_length">
                                        <div class="btn-group">
                                            <!-- <a href="#" data-toggle="modal" class="open-modal" data-target="#secondModal">
                                                <button id="editable-sample_new" class="btn btn-primary">
                                                    Add Task Type <i class="fa fa-plus"></i>
                                                </button>
                                            </a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Lead Ref.</th>
                                            <th>User</th>
                                            <th>Task Type</th>
                                            <th>Title</th>
                                            <th>Contact Name</th>
                                            <th>Contact Phone</th>
                                            <th>Notes</th>
                                            <th>Creeted By</th>
                                            <th>Created On</th>
                                            <th width="20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lead_tasks as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($value->create_date)->format('d/m/Y') }}  {{ \Carbon\Carbon::parse($value->create_time)->format('m:i') }}</td>
                                            <td>{{ $value->lead_ref }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->lead_task_type_title}}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->contact_name }}</td>
                                            <td>{{ $value->telephone }}</td>
                                            <td>{{ $value->notes }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{  \Carbon\Carbon::parse($value->created_at)->format('d/m/Y h:i') }}</td>
                                            <td><a href="{{ url('admin/sales-finance/leads/lead_task_delete').'/'.$value->id }}" class="delete"><span style="color: #000;"><i data-toggle="modal" title="Close Task"  data-target="#secondModal" class="fa fa-times open-modal"></i></a> | <a href="{{ url('admin/sales-finance/leads/edit').'/'.$value->lead_id }}" ><i data-toggle="tooltip" title="View Lead" class="fa fa-eye"></i></a>
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