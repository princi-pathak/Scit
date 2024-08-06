@extends('backEnd.layouts.master')
@section('title',' Leads')
@section('content')
<style>
    a.rejectReasons i {
    font-size: 22px;
    color: #1fb5ad;
    line-height: 34px;
}
</style>
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
                                @include('backEnd.salesFinance.leads.leads_button')
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
                                            <td>@switch($customer->status)
                                                    @case(1) Contact Later @break
                                                    @case(2) Contacted @break
                                                    @case(3) New @break
                                                    @case(4) Pre Qualified @break
                                                    @case(5) Qualified @break
                                                    @case(6) Rejected @break
                                                    @default {{-- No output if none of the cases match --}}
                                                @endswitch 
                                            </td>
                                            <td> <a href="{{ url('admin/sales-finance/leads/authorized').'/'.$customer->id }}" class=""><span style="color: #000;"><i data-toggle="tooltip" title="Authorized" class="fa fa-lock"></i></a> | <a href="{{ url('admin/sales-finance/leads/edit').'/'.$customer->id }}" class="edit"><span style="color: #000;"><i data-toggle="tooltip" title="Edit" class="fa fa-edit"></i></a> | <a href="#" class="reject"><i data-toggle="modal" title="Reject" data-lead_ref="{{ $customer->lead_ref }}" data-target="#rejectModal" class="fa fa-times open-modal"></i></a> | <a href="{{ url('admin/sales-finance/leads/convert_to_customer').'/'.$customer->customer_id }}" class="reject"><i data-toggle="modal" title="Convert to Customer Only" data-target="#secondModal" class="fa fa-exchange"></i></a>
                                                <!-- <a href="" class="delete"><i data-toggle="tooltip" title="Delete" class="fa fa-trash-o"></i></a> -->
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
<!-- The Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="lead_reject_reason_form">            
                    @csrf    
                    <div class="row form-group">
                        <label class="col-lg-3 col-sm-3 ">Lead Ref</label>
                        <div  class="col-lg-9 col-sm-9 ">
                        <input type="text" name="lead_ref" class="form-control" id="lead_ref" placeholder="Auto Generate" value="" >
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-3 col-sm-3 ">Reject Type</label>
                        <div  class="col-lg-8 col-sm-8 ">
                            <select name="reject_type_id" class="form-control" id="">
                                @foreach($leadRejectTypes as $value)
                                    <option value="{{ $value->id }}">{{ $value->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div  class="col-lg-1 col-sm-1 ">
                            <a href="#" class="rejectReasons"> <i data-toggle="modal" title="Reject" data-target="#secondModal" id="openSecondModal" class="fa fa-plus-square"></i></a>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-3 col-sm-3 ">Reject Reason</label>
                        <div  class="col-lg-9 col-sm-9 ">
                        <textarea name="reject_reason" class="form-control" id=""></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="lead_reject_reason">Confirm Reject</button>
            </div>
        </div>
    </div>
</div>

<!-- The Second Modal -->
<div class="modal fade" id="secondModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Lead Reject Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="lead_reject_type_form_edit">
                @csrf
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 ">Lead Reject Type</label>
                        <input type="text" name="title" placeholder="Lead Reject Type" value="">
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 ">Status</label>
                        <select name="status" id="">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="lead_reject" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('.open-modal').on('click', function() {
            var lead_ref = $(this).data('lead_ref');
            $('#lead_ref').val(lead_ref);  
        });

        // $('#openSecondModal').on('click', function() {
        //     $('#rejectModal').modal('hide');
        //     $('#rejectModal').on('hidden.bs.modal', function () {
        //         $('#secondModal').modal('show');
        //     });
        // });

        $('#lead_reject').on('click', function() {
            var formData = $('#lead_reject_type_form_edit').serialize();

            $.ajax({
                url: '{{ route("leads.ajax.saveLeadRejectType") }}', 
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#secondModal').modal('hide'); 
                    location.reload(); 
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#lead_reject_reason').on('click', function() {
            var formData = $('#lead_reject_reason_form').serialize();

            $.ajax({
                url: '{{ route("leads.ajax.saveLeadRejectReason") }}', 
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#secondModal').modal('hide'); 
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

    });
</script>
<!--main content end-->
@endsection
