@include('frontEnd.salesAndFinance.jobs.layout.header')
<style>
    .addError {
        border:1px solid red;
    }
</style>
    <section class="main_section_page px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4 ">
                    <div class="pageTitle">
                        <h3>Appointment Rejection Categories</h3>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                    <div class="pageTitleBtn">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                
                    <div class="jobsection">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#customerPop" class="profileDrop">Add</a>
                    </div>
                   
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 ">
                </div>
            </div>
            <div class="alert alert-success text-center" id="msg" style="display:none;height:50px">
            <p id="status_meesage"></p>
        </div>
            <di class="row">
                <div class="col-lg-12">
                    <div class="maimTable">
                        <div class="printExpt">
                            <div class="prntExpbtn">
                            <a href="#!">Print</a>
                            </div>
                            <div class="searchFilter">
                                <a href="#!">Show Search Filter</a>
                            </div>

                        </div>

                        <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Appointment Status</th>
                                    <th>Status</th>
                                    <th> </th>
                                </tr>
                            </thead>
                                               
                            <tbody id="result">
                            <?php
                            
                            foreach($rejection as $key=>$val){?>
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->category}}</td>
                                    <td>{{$val->appointment_status}}</td>
                                    <td>
                                        <?php if($val->status == 1){?>
                                            <span class="grencheck" onclick="status_change({{$val->id}},{{$val->status}})"><i class="fa-solid fa-circle-check"></i></span>
                                        <?php } else { ?>
                                            <span class="grayCheck" onclick="status_change({{$val->id}},{{$val->status}})"><i class="fa-solid fa-circle-check"></i></span>
                                            
                                        <?php }?>
                                    </td>
                                    <td>
                                            <div class="d-inline-flex align-items-center ">
                                            <div class="nav-item dropdown">
                                                <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown">
                                                    Action
                                                </a>
                                                <div class="dropdown-menu fade-up m-0">
                                                    <a href="javascript:void(0)" onclick="get_model_with_id({{$val->id}})" class="dropdown-item">Edit Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>   <!-- End off main Table -->
                    <!-- Job type Modal start here -->
                    <div class="modal fade" id="customerPop" tabindex="-1" aria-labelledby="customerModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content add_Customer">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="customerModalLabel">Appointment Rejection Category-Add</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                    <div class="alert alert-success text-center success_message" style="display:none;height:50px">
                                        <p id="message"></p>
                                    </div>
                                        <div class="col-md-10 col-lg-10 col-xl-10">
                                            <div class="formDtail">
                                                <form id="form_data" class="customerForm">
                                                    <input type="hidden" name="id" id="id">
                                                    <div class="mb-2 row">
                                                        <label for="inputName" class="col-sm-3 col-form-label">Appointment Status*</label>
                                                        <div class="col-sm-9">
                                                            <select name="appointment_status" id="appointment_status" class="form-control appointmentType">
                                                                <option selected disabled>None</option>
                                                                <option value="Declined">Declined</option>
                                                                <option value="Follow On">Follow On</option>
                                                                <option value="Abandoned">Abandoned</option>
                                                                <option value="No Access">No Access</option>
                                                                <option value="Cancelled">Cancelled</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-2 row">
                                                        <label class="col-sm-3 col-form-label">Auto Auth</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-check">
                                                            <textarea name="category" id="category" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-2 row">
                                                        <label for="inputProject"
                                                            class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control editInput selectOptions"
                                                                id="status" name="status">
                                                                <option value="1" id="status_1">Active</option>
                                                                <option value="0" id="status_0">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- End row -->
                                </div>
                                <div class="modal-footer customer_Form_Popup">

                                    <button type="button" class="profileDrop" onclick="get_save_appointment_rejection_cat()">Save</button>
                                    <button type="button" class="profileDrop" onclick="save_job_typeClose()">Save &
                                        Close</button>
                                    <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end here -->
                </div>
            </di>
        </div>
        <script src="{{url('public/backEnd/js/multiselect.js')}}"></script>
        <script>
            
            function save_job_typeClose(){
                var appointment_status=$("#appointment_status").val();
                var category=$("#category").val();
                if(appointment_status == null){
                    $("#appointment_status").addClass('addError');
                    return false;
                } else if(category == ''){
                    $("#appointment_status").removeClass('addError');
                    $("#category").addClass('addError');
                    return false;
                } else {
                    get_save_appointment_rejection_cat();
                    $("#customerPop").modal('hide');
                }
                
            }
            function get_save_appointment_rejection_cat(){
                var token='<?php echo csrf_token();?>'
                var appointment_status=$("#appointment_status").val();
                var category=$("#category").val();
                var status=$("#status").val();
                var home_id='<?php echo $home_id;?>'
                var id=$("#id").val();
                var message;
                if(id == ''){
                    message="Added Successfully Done";
                }else {
                    message="Edited Successfully Done";
                }
                if(appointment_status == null){
                    $("#appointment_status").addClass('addError');
                    return false;
                } else if(category == ''){
                    $("#appointment_status").removeClass('addError');
                    $("#category").addClass('addError');
                    return false;
                }else {
                        $.ajax({
                        type: "POST",
                        url: "{{url('/appointment_rejection_cat_save')}}",
                        data: {id:id,home_id:home_id,appointment_status:appointment_status,category:category,status:status,_token:token},
                        success: function(data) {
                            console.log(data);
                            if($.trim(data) == "done"){
                                $("#message").text(message);
                                $(".success_message").show();
                                setTimeout(function() {
                                    $(".alert").hide();
                                    window.location.reload();
                                }, 3000);
                                // $("#form_data")[0].reset();
                            } else {
                                alert("Something went Wrong");
                            }
                        }
                    });
                }
            }
            function get_model_with_id(id){
                var token='<?php echo csrf_token();?>'
                $.ajax({
                        type: "POST",
                        url: "{{url('/job_appointment_rejection_edit_form')}}",
                        data: {id:id,_token:token},
                        success: function(data) {
                            console.log(data);
                            // return false;
                            $("#id").val(data.id);
                            $("#category").val(data.category);
                            $(".appointmentType option").each(function() {
                                if ($(this).val() === data.appointment_status) {
                                    $(this).prop('selected', true);
                                }
                            });
                            if(data.status == 1){
                                $("#status_1").prop('selected',true);
                            }else {
                                $("#status_0").prop('selected',true);
                            }
                            
                            $("#customerPop").modal('show');
                        }
                    });
            }
            function status_change(id, status){
            var token='<?php echo csrf_token();?>'
            var model="construction_appointment_rejection_category";
            $.ajax({
                type: "POST",
                url: "{{url('/status_change')}}",
                data: {id:id,status:status,model:model,_token:token},
                success: function(data) {
                    console.log(data);
                    if($.trim(data)==1){
                        $("#status_meesage").text("status Changed Successfully Done");
                        $("#msg").show();
                        setTimeout(function() {
                            location.reload();
                        }, 3000);

                        
                    }
                    
                }
            });
        }
        </script>
        
    </section>
    @include('frontEnd.salesAndFinance.jobs.layout.footer')