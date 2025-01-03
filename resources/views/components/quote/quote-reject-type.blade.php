<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="quote_reject_type_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title pupTitle">Add Quote Reject Type</h5>
                    <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close" type="button"></button>
                </div>
                <div class="modal-body">
                    <form role="form" id="rejectTypeForm">
                        <div><span id="error-message" class="error"></span></div>
                        <div class="row form-group">
                            <label class="col-lg-3 col-sm-3 col-form-label">Quote Reject Type <span class="radStar ">*</span></label>
                            <div class="col-md-9">
                                <input type="hidden" value="" name="reject_type_id" id=reject_type_id>
                                <input type="text" class="form-control editInput" name="title" id="">
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <label class="col-lg-3 col-sm-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <select class="form-control editInput selectOptions" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn profileDrop" onclick="saveQuoteRejectType();">Save</button>
                    <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openRejectTypeModal(quote_reject_type){
        document.getElementById('reject_type_id').setAttribute('data-rjectType-id', quote_reject_type);
        $('#quote_reject_type_modal').modal('show');
    }

    function saveQuoteRejectType(){
        var formData = $('#rejectTypeForm').serialize();
        console.log(formData);
        $.ajax({
            url: '{{ route("quote.ajax.saveQuoteRejectType") }}', // Define the URL route for saving
            method: 'Post',
            headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
            data: formData,
            success: function(response) {
                // document.getElementById('quote_reject_type_modal').reset();
                $('#quote_reject_type_modal').modal('hide');
                getAllRejectTypeList();
            },
            error: function(error) {
                console.error('Error saving account code:', error);
            }
        });
    }
    function getAllRejectTypeList(){
        $.ajax({
            url: '{{ route("quote.ajax.getActiveRejectType") }}', 
            method: 'GET',
           success: function(response) {
                console.log(response.data);
            },
            error: function(error) {
                console.error('Error saving account code:', error);
            }
        });
    }

 
</script>