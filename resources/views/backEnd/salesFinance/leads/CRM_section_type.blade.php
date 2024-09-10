@extends('backEnd.layouts.master')
@section('title',' CRM Section Type')
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
                                                    CRM Section Types <i class="fa fa-plus"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>CRM Section</th>
                                            <th>Colour Code</th>
                                            <th>Icon Preview</th>
                                            <th>Status</th>
                                            <th width="20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($crm_sections as $value)
                                        <tr>
                                            <td>{{ $value->title }}</td>                                         
                                            <td>@switch($value->crm_section)
                                                    @case(1) Calls @break
                                                    @case(2) Emails @break
                                                    @case(3) Notes @break
                                                    @case(4) Complaints @break
                                                    @case(5) Tasks @break
                                                    @case(6) Contacts @break
                                                    @case(7) History @break
                                                    @default {{-- No output if none of the cases match --}}
                                                @endswitch
                                            </td>                                         
                                            <td>{{ $value->color_code }} </td>
                                            <td> @switch($value->crm_section)
                                                    @case(1) <i class="fa fa-phone"></i>   @break
                                                    @case(2) <i class="fa fa-envelope-o"></i> @break
                                                    @case(3) <i class="fa fa-file-o"></i> @break
                                                    @case(4) <i class="fa fa-exclamation-triangle"></i> @break
                                                    @case(5) <i class="fa fa-list-ul"></i> @break
                                                    @case(6) <i class="fa fa-user"></i> @break
                                                    @case(7)  @break
                                                    @default {{-- No output if none of the cases match --}}
                                                @endswitch     </td>                                         
                                            <td>@if($value->status === 1 ) Active @else Inactive @endif </td>        
                                            <td><a href="#" class="edit"><span style="color: #000;"><i data-toggle="modal" title="Edit" data-id="{{ $value->id }}" data-title="{{ $value->title }}" data-crm-section="{{ $value->crm_section }}" data-color="{{ $value->color_code }}" data-status="{{ $value->status }}" data-target="#secondModal" class="fa fa-edit fa-lg open-modal"></i></a>
                                                    <a href="{{ url('admin/sales-finance/leads/crm_section_type/delete').'/'.$value->id }}" class="delete"><i data-toggle="tooltip" title="Delete" class="fa fa-trash-o fa-lg"></i></a>
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
                <form action="" id="crm_section_type_form">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="section_type_id" id="section_type_id">
                        <label class="col-lg-3 col-sm-3 ">Section* </label>
                        <select name="crm_section" id="crm_section" class="form-control">
                            <option value="2">Emails</option>
                            <option value="3">Notes</option>
                            <option value="4">Complaints</option>
                            <option value="5">Tasks</option>
                            <option value="6">Contacts</option>
                            <option value="7">History</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 ">Type* </label>
                        <input type="text" name="title" class="form-control" placeholder="CRM Section Type" id="title">
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 ">Color Code </label>
                        <input type="color" name="color_code" class="form-control" placeholder="CRM Section Type" id="color">
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 ">Status </label>
                        <select name="status" class="form-control" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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
            var crm_section = $(this).data('crm-section');
            var color = $(this).data('color');
             
            $('#section_type_id').val(itemId);
            $('#title').val(itemTitle);
            $('#status').val(itemStatus);
            $('#crm_section').val(crm_section);
            $('#color').val(color);

            if (itemId) {
                // Editing existing record
                $('#section_type_id').val(itemId);
                $('#title').val(itemTitle);
                $('#status').val(itemStatus);
                $('.modal-title').text('Edit CRM Section Type');
                $('#saveChanges').text('Save Changes');
            } else {
                // Adding new record (clear form fields if needed)
                $('#section_type_id').val('');
                $('#title').val('');
                $('#crm_section').val();
                $('#color').val();
                $('#status').val(1); // Default to Active
                $('.modal-title').text('Add CRM Section Types');
                $('#saveChanges').text('Add');
            }
        });

        $('#saveChanges').on('click', function() {
            var formData = $('#crm_section_type_form').serialize();

            $.ajax({
                url: '{{ route("leads.ajax.saveCRMSectionType") }}',
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