@include('frontEnd.salesAndFinance.jobs.layout.header')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Quote Reject Type</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="jobsection">
                    <a href="#!" data-bs-toggle="modal" data-bs-target="#statusModel" class="profileDrop open-modal">Add</a>
                </div>
            </div>
        </div>
        <di class="row">
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
                                <th>Quote Reject Type</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$quote_reject_type->isEmpty())
                                @foreach ($quote_reject_type as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td> @if($value->status) <span class="grencheck"><i class="fa-solid fa-circle-check"></i></span> @else <span class="grayCheck"><i class="fa-solid fa-circle-check"></i></span> @endif </td>
                                        <td>
                                            <div class="d-inline-flex align-items-center ">
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop show" data-bs-toggle="dropdown" aria-expanded="true">Action</a>
                                                    <div class="dropdown-menu fade-up m-0">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#statusModel" data-id="{{ $value->id }}" data-title="{{ $value->title }}" data-status="{{ $value->status }}"  class="dropdown-item open-modal">Edit details</a>
                                                        <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDelete('{{ $value->id }}')">Delete</a>
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
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="statusModel" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content add_Customer">
            <div class="modal-header terques-bg">
                <button aria-hidden="true" data-bs-dismiss="modal" class="close" type="button">×</button>
                <h5 class="modal-title pupTitle">Quote Reject Type - Add</h5>
            </div>
            <div class="modal-body">
                <form role="form" id="quote_reject_type_form">
                    @csrf
                    <div><span id="error-message" class="error"></span></div>
                    <div class="row form-group">
                        <label class="col-lg-3 col-sm-3 col-form-label">Quote Reject Type <span class="red-text">*</span></label>
                        <div class="col-md-9">
                            <input type="hidden" name="quote_reject_type_id" id="quote_reject_type_id">
                            <input type="text" name="title" class="form-control editInput " placeholder="Quote Reject Type" id="title">
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <label class="col-lg-3 col-sm-3 col-form-label">Status</label>
                        <div class="col-md-9">
                            <select name="status" id="modale_status" class="form-control editInput">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn profileDrop" id="saveChanges">Save</button>
                <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end Popup  -->
@include('frontEnd.salesAndFinance.jobs.layout.footer')
<script>
    $(document).ready(function() {
        $('.open-modal').on('click', function() {
            var itemId = $(this).data('id');
            var itemTitle = $(this).data('title');
            var itemStatus = $(this).data('status');
            $('#quote_reject_type_id').val(itemId);
            $('#title').val(itemTitle);
            $('#modale_status').val(itemStatus);

            if (itemId) {
                // Editing existing record
                $('#quote_reject_type_id').val(itemId);
                $('#title').val(itemTitle);
                $('#modale_status').val(itemStatus);
                $('.modal-title').text('Quote Reject Type - Edit');
                $('#saveChanges').text('Save Changes');
            } else {
                // Adding new record (clear form fields if needed)
                $('#quote_reject_type_id').val('');
                $('#title').val('');
                $('#modale_status').val(1); // Default to Active
                $('.modal-title').text('Quote Reject Type - Add');
                $('#saveChanges').text('Add');
            }
        });

        $('#saveChanges').on('click', function() {
            var formData = $('#quote_reject_type_form').serialize();

            $.ajax({
                url: '{{ route("quote.ajax.saveQuoteRejectType") }}',
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
    function confirmDelete(id) {
        let confirmation = confirm("Are you sure you want to delete this record?");

        if (confirmation) {
            deleteRow(id);
            window.location.reload();
        } else {
            console.log("Delete action canceled.");
        }
    }

    function deleteRow(id) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        console.log("Deleting row with ID:", id);


        // You can perform an AJAX request here to delete the record from the backend
        $.ajax({
            url: '{{ route("quote.ajax.deleteQuoteRejectType") }}',
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                if (data.success) {
                    console.log('Record soft deleted successfully');
                } else {
                    console.error('Error deleting record');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
        // Code to delete the row
    }
</script>