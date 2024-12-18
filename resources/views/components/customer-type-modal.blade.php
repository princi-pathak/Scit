<div class="modal fade" id="cutomer_type_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="thirdModalLabel">Add Customer Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="alert_message_customer_type" style="display:none" class="alert alert-success mt-3"></div>
                <div class="modal-body">
                    <form id="customer_type_form">
                        @csrf
                        <input type="hidden" id="customer_type_home_id" name="home_id" value="{{Auth::user()->home_id;}}">
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Customer Type <span class="radStar ">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control editInput" id="customer_type_name" value="" placeholder="Customer Type">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select id="customer_type_status" name="status" class="form-control editInput">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_customer_type()"> Save</a>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    function save_customer_type(){
        $.ajax({
            type: "POST",
            url: "{{url('/save_customer_type')}}",
            data: new FormData($("#customer_type_form")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if(data.vali_error){
                    alert(data.vali_error);
                    $(window).scrollTop(0);
                    return false;
                }else if($.trim(data)=="error"){
                    alert("Something went wrong. Please try later!");
                }else{
                    $(window).scrollTop(0);
                    $('#alert_message_customer_type').text("Customer type Added Successfully Done!").show();
                    getAllCustomerType(data);
                    setTimeout(function() {
                        $('#alert_message_customer_type').text('').hide();
                        $("#cutomer_type_modal").modal('hide');
                    }, 3000);
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
            }
        });
    }
</script>
