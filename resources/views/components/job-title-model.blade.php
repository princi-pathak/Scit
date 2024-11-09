<!-- He who is contented is rich. - Laozi -->
<div class="modal fade" id="jobTitleModal" tabindex="-1" aria-labelledby="jobTitleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="thirdModalLabel">Job Title - Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="jobTitleForm">
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Job Title <span class="radStar ">*</span></label>
                        <div class="col-sm-9">
                            <input type="hidden" name="job_title_id" id="job_title_id">
                            <input type="text" name="name" class="form-control editInput" id="job_title" value="" placeholder="Job Title">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select id="status" name="status" class="form-control editInput">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="pageTitleBtn">
                        <button type="button" class="profileDrop" onclick="saveJobTitle()" id="">Save</button>
                        <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openjobTitleModal(appendJobTitle) {
        document.getElementById('job_title_id').setAttribute('data-jobTitle-id', appendJobTitle);
        $('#jobTitleModal').modal('show');
    }

    function saveJobTitle() {

        let JobTitleId = document.getElementById('job_title_id').getAttribute('data-jobTitle-id');
     
        var formData = $('#jobTitleForm').serialize();
        $.ajax({
            url: '{{ route("customer.ajax.saveJobTitle") }}', // Define the URL route for saving
            method: 'Post',
            data: formData,
            success: function(response) {
                $('#jobTitleModal').modal('hide');
                alert('Job title saved successfully!');
                getCustomerJobTitle(document.getElementById(JobTitleId));
                // Use the currentFormId to find the specific form or field to update
                // For example, you might want to set the region value in the form itself
            },
            error: function(error) {
                console.error('Error saving jobtitle:', error);
            }
        });
    }

    function getCustomerJobTitle(jobTitle) {
        $.ajax({
            url: '{{ route("customer.ajax.getCustomerJobTitle") }}',
            method: 'GET',
            success: function(response) {
                console.log("jxcnjfjnfnk", response.data);
                jobTitle.innerHTML = '';
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.name;
                    jobTitle.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>