@extends('backEnd.layouts.master')
@section('title',' Lead Reject Type')
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

                                @include('backEnd.common.alert_messages')
                            </div>
                            <div class="space15"></div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div id="editable-sample_length" class="dataTables_length"> 
                                        <div class="btn-group">
                                            <a href="#" data-toggle="modal" class="open-modal" data-target="#secondModal">
                                                <button id="editable-sample_new" class="btn btn-primary">
                                                    Lead Reject Types <i class="fa fa-plus"></i>
                                                </button>
                                            </a>
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
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th width="20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lead_rejects as $value)
                                        <tr>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td><a href="#" class="edit"><span style="color: #000;"><i data-toggle="modal" title="Edit" data-id="{{ $value->id }}" data-title="{{ $value->title }}" data-status="{{ $value->status }}" data-target="#secondModal" class="fa fa-edit fa-lg open-modal"></i></a>
                                                <a href="{{ url('admin/sales-finance/leads/lead_reject_type/delete').'/'.$value->id }}" class="delete"><i data-toggle="tooltip" title="Delete" class="fa fa-trash-o fa-lg"></i></a>
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
<!-- The Second Modal -->
<div class="modal fade" id="secondModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="lead_reject_type_form">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="lead_reject_id" id="lead_reject_id">
                        <label class="col-lg-3 col-sm-3 ">Lead Reject Type</label>
                        <input type="text" name="title" class="form-control" placeholder="Lead Reject Type" id="title">
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 ">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="saveChanges" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.open-modal').on('click', function() {
            var itemId = $(this).data('id');
            var itemTitle = $(this).data('title');
            var itemStatus = $(this).data('status');
            $('#lead_reject_id').val(itemId);
            $('#title').val(itemTitle);
            $('#status').val(itemStatus);

            if (itemId) {
                // Editing existing record
                $('#lead_reject_id').val(itemId);
                $('#title').val(itemTitle);
                $('#status').val(itemStatus);
                $('.modal-title').text('Edit Lead Reject Type');
                $('#saveChanges').text('Save Changes');
            } else {
                // Adding new record (clear form fields if needed)
                $('#lead_reject_id').val('');
                $('#title').val('');
                $('#status').val(1); // Default to Active
                $('.modal-title').text('Add Lead Reject Type');
                $('#saveChanges').text('Add');
            }


        });

        $('#saveChanges').on('click', function() {
            var formData = $('#lead_reject_type_form').serialize();

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
    });
</script>
@endsection