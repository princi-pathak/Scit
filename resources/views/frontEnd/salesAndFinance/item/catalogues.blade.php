@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Catalogues </h3>
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
                                <th></th>
                                <th>#</th>
                                <th>Catalogues</th>
                                <th>Type</th>
                                <th>Item Count</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

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
        <div class="modal-content add_Customer">
            <div class="modal-header terques-bg">
                <button aria-hidden="true" data-bs-dismiss="modal" class="close" type="button">×</button>
                <h5 class="modal-title pupTitle">Catalogue - Add</h5>
            </div>
            <div class="modal-body">
                <form role="form" id="lead_source_form">
                    @csrf
                    <div><span id="error-message" class="error"></span></div>
                    <div class="row form-group">
                        <label class="col-lg-3 col-sm-3 col-form-label">Catalogue Name </label>
                        <div class="col-md-9">
                            <input type="hidden" name="lead_source_id" id="lead_source_id">
                            <input type="text" name="title" class="form-control editInput " placeholder="Catalogue Name" id="title">
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <label class="col-lg-3 col-sm-3 col-form-label">Description </label>
                        <div class="col-md-9">
                            <textarea class="form-control textareaInput" name="" id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <label class="col-lg-3 col-sm-3 col-form-label">Type</label>
                        <div class="col-md-9">
                            <select name="status" id="modale_status" class="form-control editInput">
                                <option value="1">Catelogue Pricing Only</option>
                                <option value="2">Mixed Pricing</option>
                            </select>
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

<script>
    $(document).ready(function() {
        $('.open-modal').on('click', function() {
            var itemId = $(this).data('id');
            var itemTitle = $(this).data('title');
            var itemStatus = $(this).data('status');
            $('#lead_source_id').val('');
            $('#title').val('');
            $('#modale_status').val(1);
            $('.modal-title').text('');
            $('#saveChanges').text('');

            if (itemId) {
                // Editing existing record
                $('#lead_source_id').val(itemId);
                $('#title').val(itemTitle);
                $('#modale_status').val(itemStatus);
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

@include('frontEnd.salesAndFinance.jobs.layout.footer')