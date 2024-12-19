<div class="modal fade" id="departmentPop" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Department - Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="alert alert-success mt-3" style="display:none;height:50px" id="alert_message_department"> </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="formDtail">
                            <form id="department_form_data" class="customerForm">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Department <span class="radStar ">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput textareaInput" placeholder="Enter Department" id="department_title" name="title">
                                    </div>
                                </div>
                                
                                <div class="mb-2 row">
                                    <label for="inputProject"
                                        class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control editInput selectOptions" id="department_status" name="status">
                                            <option value="1" >Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div> <!-- End row -->
            </div>
            <div class="modal-footer customer_Form_Popup">

                <button type="button" class="profileDrop" onclick="save_department()">Save</button>
                <!-- <button type="button" class="profileDrop" id="save_dataClose">Save &
                    Close</button> -->
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function save_department(){
        var department_title=$("#department_title").val();
        if(department_title == ''){
            $("#department_title").css('border','1px solid red');
            return false;
        }else{
            $("#department_title").css('border','');
            $.ajax({
                type: "POST",
                url: "{{url('/save_department')}}",
                data: new FormData($("#department_form_data")[0]),
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if(response.vali_error){
                        alert(response.vali_error);
                        $(window).scrollTop(0);
                        return false;
                    }else if(response.data && response.data.original && response.data.original.error){
                        alert(response.data.original.error);
                        return false;
                    }else if(response.success === true){
                        $(window).scrollTop(0);
                        $('#alert_message_department').text(response.message).show();
                        setTimeout(function() {
                            $('#alert_message_department').text('').hide();
                            getAlldepartment(response);
                            $("#departmentPop").modal('hide');
                        }, 3000);
                        
                    }else{
                        alert("Something went wrong. Please try later!"); 
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.error);
                }
            });
        }
    }
</script>