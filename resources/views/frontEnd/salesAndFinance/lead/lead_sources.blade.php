@include('frontEnd.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Lead Sources </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="jobsection">
                    <a href="#!" data-bs-toggle="modal" data-bs-target="#sourceModel" class="profileDrop open-modal">Add</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="maimTable">
                    <div class="printExpt">
                        <div class="prntExpbtn">
                            <a href="#!">Print</a>
                            <a href="#!">Export</a>
                        </div>
                        <div class="searchFilter">
                            <a href="#!">Show Search Filter</a>
                        </div>
                    </div>
                    <div class="markendDelete">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="jobsection">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="pageTitleBtn p-0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Lead Source</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$lead_sources->isEmpty())
                                @foreach ($lead_sources as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td> @if($value->status) <span class="grencheck"><i class="fa-solid fa-circle-check"></i></span> @else <span class="grayCheck"><i class="fa-solid fa-circle-check"></i></span> @endif </td>
                                        <td>
                                            <div class="d-inline-flex align-items-center ">
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop show" data-bs-toggle="dropdown" aria-expanded="true">Action</a>
                                                    <div class="dropdown-menu fade-up m-0">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#sourceModel" data-id="{{ $value->id }}" data-title="{{ $value->title }}" data-status="{{ $value->status }}"  class="dropdown-item open-modal">Edit details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr> <td colspan="10" class="text-center"><strong>Sorry, there are no items available..</strong></td></tr>
                            @endif
                        </tbody>
                    </table>
                </div> <!-- End off main Table -->
            </div>
        </di>
    </div>
</section>
  <!-- popup start -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sourceModel" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header terques-bg">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title pupTitle">Lead Source - Add</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="lead_source_form">
                    @csrf
                    <div><span id="error-message" class="error"></span></div>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label">Lead Source</label>
                        <div class="col-md-9">
                            <input type="hidden" name="lead_source_id" id="lead_source_id">
                            <input type="text" name="title" class="form-control editInput " placeholder="Lead Source" id="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 ">Status</label>
                        <select name="status" id="status" class="form-control editInput">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveChanges">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end Popup  -->

<script>
    $(document).ready(function() {
        $('.open-modal').on('click', function() {
            var itemId = $(this).data('id');
            var itemTitle = $(this).data('title');
            var itemStatus = $(this).data('status');
            $('#lead_source_id').val('');
            $('#title').val('');
            $('#status').val(1);
            $('.modal-title').text('');
            $('#saveChanges').text('');

            if (itemId) {
                // Editing existing record
                $('#lead_source_id').val(itemId);
                $('#title').val(itemTitle);
                $('#status').val(itemStatus);
                $('.modal-title').text('Edit Lead Sources');
                $('#saveChanges').text('Save Changes');
            } else {
                // Adding new record (clear form fields if needed)
              
                $('.modal-title').text('Add Lead Sources');
                $('#saveChanges').text('Add');
            }
        });

        $('#saveChanges').on('click', function() {
            var formData = $('#lead_source_form').serialize();

            $.ajax({
                url: '{{ route("lead.ajax.saveLeadSource") }}',
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

@include('frontEnd.jobs.layout.footer')