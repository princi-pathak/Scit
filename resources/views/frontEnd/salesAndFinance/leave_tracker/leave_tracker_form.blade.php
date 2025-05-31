<style>
    .font_color {
        color: #1f88b5 !important;
    }

    .radStar {
        color: red;
    }

    .buttonStaffTab button {
        background: #a1a1a1;
        color: #fff;
    }

    .buttonStaffTab button:hover {
        color: #fff;
    }

    .buttonStaffTab {
        display: flex;
        justify-content: end;
    }

    /* .buttonStaffTab .nav-item.active button {
    background-color: #57c8f1;
    color: #fff;
} */
    .buttonStaffTab button.active {
        background-color: #57c8f1;
        color: #fff;
    }
</style>

<!-- Leave Tracker  model-->
<div class="modal fade" id="leaveTrackerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rmp-modal-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Staff Details (Leave Tracker) </h4>
            </div>
            <div class="modal-body tabStaff">
                <!-- tabs staff -->
                <div class="row">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 serch-btns text-right">
                        <button class="btn label-default add-new-btn active" type="button"> Add New </button>
                        <button class="btn label-default logged-btn dyn-logged-btn active logged-dyn-btn" type="button">Record</button>

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Add new Details -->
                        <div class="add-new-box risk-tabs custm-tabs">
                            <form action="" id="" class="customerForm">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="row formDtail">
                                            <div class="col-md-6 form-group">
                                                <label> Name </label>
                                                <input type="text" class="form-control editInput" id="" name="name">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> Date <span class="radStar">*</span></label>
                                                <input type="text" class="form-control editInput" id="Leave_startDate" name="Leave Start Date">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> Hours <span class="radStar">*</span></label>
                                                <input type="text" class="form-control editInput" id="" name="name">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> Sleep <span class="radStar">*</span></label>
                                                <input type="text" class="form-control editInput" id="" name="name">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label> Wake Night <span class="radStar">*</span></label>
                                                <input type="text" class="form-control editInput" id="" name="name">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label> Disturbance <span class="radStar">*</span></label>
                                                <input type="text" class="form-control editInput" id="" name="name">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label> Annual Leave <span class="radStar">*</span></label>
                                                <input type="text" class="form-control editInput" id="" name="name">
                                            </div>
                                            
                                            <div class="col-md-6 form-group">
                                                <label> On Call <span class="radStar">*</span></label>
                                                <input type="text" class="form-control editInput" id="" name="name">
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label> Comments <span class="radStar">*</span></label>
                                                <textarea class="form-control textareaInput" placeholder="Type your comments..." rows="3" id="" name="comments"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- logged plans -->
                        <div class="logged-box risk-tabs custm-tabs">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h3 class="m-t-0 m-b-20 clr-blue fnt-20">Staff Records </h3>
                            </div>
                            <!-- records staff -->
                            <div>
                                <div class="col-md-12 col-sm-12 col-xs-12 cog-panel rows">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0 add-rcrd">
                                        <!-- <label class="col-md-1 col-sm-1 col-xs-12 p-t-7"></label> -->
                                        <div class="col-md-12 col-sm-11 col-xs-12 r-p-0">
                                            <div class="input-group">
                                                <!-- <input type="hidden" name="su_bmp_id[]" value="548" disabled="disabled" class="edit_bmp_id_548"> -->
                                                <a href="#"><span><input type="text" class="form-control" style="cursor:pointer" name="" readonly="" value="Record Form (26-03-2025 )" maxlength="255"></span></a>
                                                <!-- <a href="#" class="dyn-form-view-data" id="548"><span><input type="text" class="form-control" style="cursor:pointer" name="" readonly="" value="Record Form (26-03-2025 )" maxlength="255"></span></a> -->
                                                <span class="input-group-addon cus-inpt-grp-addon clr-blue settings">
                                                    <i class="fa fa-cog"></i>
                                                    <div class="pop-notifbox">
                                                        <ul class="pop-notification" type="none">
                                                            <li> <a href="#" data-dismiss="modal" data-target="viewEditStaff" aria-hidden="true"> <span> <i class="fa fa-eye"></i> </span> View/Edit</a> </li>
                                                            <li> <a href="#"> <span class="color-red"> <i class="fa fa-exclamation-circle"></i> </span> Remove </a> </li>
                                                            <!-- <li> <a href="#" data-dismiss="modal" aria-hidden="true" class="dyn-form-view-data" id="548"> <span> <i class="fa fa-eye"></i> </span> View/Edit</a> </li>
                                                            <li> <a href="#" class="dyn_form_del_btn" id="548"> <span class="color-red"> <i class="fa fa-exclamation-circle"></i> </span> Remove </a> </li> -->
                                                            <!-- <li> <a href="#" class="dyn_form_daily_log" dyn_form_id="548" logtype="1"> <span class="color-green"> <i class="fa fa-plus-circle"></i> </span>Send to Daily Log Book (In development)</a> </li>
                                                            <li> <a href="#" class="dyn_form_daily_log" dyn_form_id="548" logtype="2"> <span class="color-green"> <i class="fa fa-plus-circle"></i> </span> Send to Weekly Log Book (In development)</a> </li>
                                                            <li> <a href="#" class="dyn_form_daily_log" dyn_form_id="548" logtype="3"> <span class="color-green"> <i class="fa fa-plus-circle"></i> </span> Send to Monthly Log Book (In development)</a> </li> -->
                                                        </ul>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 cog-panel rows">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0 add-rcrd">
                                        <!-- <label class="col-md-1 col-sm-1 col-xs-12 p-t-7"></label> -->
                                        <div class="col-md-12 col-sm-11 col-xs-12 r-p-0">
                                            <div class="input-group popovr">

                                                <!-- <input type="hidden" name="su_bmp_id[]" value="547" disabled="disabled" class="edit_bmp_id_547"> -->
                                                <a href="#"><span><input type="text" class="form-control" style="cursor:pointer" name="" readonly="" value="Record (26-03-2025 )" maxlength="255"></span></a>
                                                <!-- <a href="#" class="dyn-form-view-data" id="547"><span><input type="text" class="form-control" style="cursor:pointer" name="" readonly="" value="Record (26-03-2025 )" maxlength="255"></span></a> -->

                                                <span class="input-group-addon cus-inpt-grp-addon clr-blue settings">
                                                    <i class="fa fa-cog"></i>
                                                    <div class="pop-notifbox">
                                                        <ul class="pop-notification" type="none">
                                                            <li> <a href="#"> <span> <i class="fa fa-eye"></i> </span> View/Edit</a> </li>
                                                            <li> <a href="#"> <span class="color-red"> <i class="fa fa-exclamation-circle"></i> </span> Remove </a> </li>
                                                            <!-- <li> <a href="#" data-dismiss="modal" aria-hidden="true" class="dyn-form-view-data" id="547"> <span> <i class="fa fa-eye"></i> </span> View/Edit</a> </li>
                                                            <li> <a href="#" class="dyn_form_del_btn" id="547"> <span class="color-red"> <i class="fa fa-exclamation-circle"></i> </span> Remove </a> </li> -->
                                                            <!-- <li> <a href="#" class="dyn_form_daily_log" dyn_form_id="547" logtype="1"> <span class="color-green"> <i class="fa fa-plus-circle"></i> </span>Send to Daily Log Book (In development)</a> </li>
                                                            <li> <a href="#" class="dyn_form_daily_log" dyn_form_id="547" logtype="2"> <span class="color-green"> <i class="fa fa-plus-circle"></i> </span> Send to Weekly Log Book (In development)</a> </li>
                                                            <li> <a href="#" class="dyn_form_daily_log" dyn_form_id="547" logtype="3"> <span class="color-green"> <i class="fa fa-plus-circle"></i> </span> Send to Monthly Log Book (In development)</a> </li> -->
                                                        </ul>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Record Staff -->




                            <!-- alert messages -->
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 popup_success popup_alrt_msg">
                                <div class="popup_notification-box">
                                    <div class="alert alert-success alert-dismissible m-0" role="alert">
                                        <button type="button" class="close close-msg-btn"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> <span class="popup_success_txt">New Row is added</span>.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12 popup_error popup_alrt_msg">
                                <div class="popup_notification-box">
                                    <div class="alert alert-danger alert-dismissible m-0" role="alert">
                                        <button type="button" class="close close-msg-btn"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> <span class="popup_error_txt">Some error occured, Please try again after sometime.</span>.
                                    </div>
                                </div>
                            </div>

                            <script>
                                setTimeout(function() {
                                    $(".popup_success").fadeOut()
                                }, 5000);
                                setTimeout(function() {
                                    $(".popup_error").fadeOut()
                                }, 5000);
                            </script>

                            <script type="text/javascript">
                                $(document).on('click', '.close-msg-btn', function() {
                                    $('.popup_alrt_msg').hide();
                                });
                            </script>
                            <!-- <div class="modal-space modal-pading view-dyn-record">
                            record shown using Ajax
                        </div>
                         -->

                        </div>
                    </div>


                </div>
                <!-- tabs staff -->



            </div>
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" id="">Save</button>
            </div>
        </div>
    </div>



</div>
<!--Leave Tracker model End -->

<!-- modal edit and view  -->
<div class="modal fade" id="viewEditStaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rmp-modal-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit </h4>
            </div>
            <div class="modal-body tabStaff">
                <form action="" id="" class="customerForm">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="row formDtail">
                                <div class="col-md-6 form-group">
                                    <label> Name </label>
                                    <input type="text" class="form-control editInput" id="" name="name">
                                </div>




                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- modal edit and view -->
<script>
    $('#Leave_startDate').datepicker({
        format: 'dd-mm-yyyy'
    });

    $('#Leave_startDate').on('change', function() {
        $('#Leave_startDate').datepicker('hide');
    });

    $("#salesDayBookModel").scroll(function() {
        $('#Leave_startDate').datepicker('place');
    });
</script>

<script>
    //detail option
    $(document).on('click', '.my-task-detail', function() {


        $(this).closest('.cog-panel').find('.input-plusbox').toggle();
        $(this).closest('.pop-notifbox').removeClass('active');
        autosize($("textarea"));
        return false;
    });
</script>

<script>
    //my task show
    $(document).ready(function() {
        $(document).on('click', '.leave_tracker_form', function() {

            var manager_id = $(this).attr('manager_id');

            $('.loader').show();
            $('body').addClass('body-overflow');

            $.ajax({
                type: 'get',
                url: "{{ url('/my-profile/task-allocation/view/') }}" + '/' + manager_id + '?logged',
                success: function(resp) {
                    if (isAuthenticated(resp) == false) {
                        return false;
                    }
                    if (resp == '') {
                        $('.log-my-task-alloc-record').html('<div class="text-center p-b-20"style="width:100%"> No Records found. </div>');
                    } else {
                        $('.log-my-task-alloc-record').html(resp);
                    }
                    $('#leaveTrackerModal').modal('show');
                    $('.loader').hide();
                    $('body').removeClass('body-overflow');
                }
            });
            return false;
        });
    });
</script>

<script>
    $('#leaveTrackerModal').on('scroll', function() {
        $('.dpYears').datepicker('place')
    });

    //3rd tab search
    $('input[name=\'sm_date\']').closest('.srch-field').hide();
    $(document).ready(function() {

        $('input[name=\'search_task_record\']').keydown(function(event) {
            var keyCode = (event.keyCode ? event.keyCode : event.which);
            if (keyCode == 13) {
                return false;
            }
        });

        $('select[name=\'sm_search_type\']').change(function() {
            $('.my-searched-records').html('');
            var sm_src_title = $('input[name=\'search_task_record\']');
            var sm_src_date = $('input[name=\'sm_date\']');

            var type = $(this).val();
            if (type == 'date') {

                sm_src_date.closest('.srch-field').show();
                sm_src_date.removeClass('red_border');
                sm_src_title.closest('.srch-field').hide();
            } else {
                sm_src_title.closest('.srch-field').show();
                sm_src_title.removeClass('red_border');
                sm_src_date.closest('.srch-field').hide();
            }
        });

        $(document).on('click', '.search-task-alloc-btn', function() {

            var sm_search_type = $('select[name=\'sm_search_type\']');
            var search_input = $('input[name=\'search_task_record\']');
            var sm_search_date = $('input[name=\'sm_date\']');

            var search = search_input.val();
            var sm_date = sm_search_date.val();
            var sm_search_type = sm_search_type.val();

            search = jQuery.trim(search);
            search = search.replace(/[&\/\\#,+()$~%.'":*?<>^@{}]/g, '');

            if (sm_search_type == 'title') {
                if (search == '') {

                    search_input.addClass('red_border');
                    return false;
                } else {
                    search_input.removeClass('red_border');
                }
            } else {
                if (sm_date == '') {

                    sm_search_date.addClass('red_border');
                    return false;
                } else {
                    sm_search_date.removeClass('red_border');
                }

            }
            var formdata = $('#searched-task-alloc-records-form').serialize();

            var manager_id = "{{ $manager_id }}";

            $('.loader').show();
            $('body').addClass('body-overflow');
            $.ajax({
                type: 'post',
                url: "{{ url('/my-profile/task-allocation/view/') }}" + '/' + manager_id + '?search=' + search + '&sm_date=' + sm_date + '&sm_search_type=' + sm_search_type,
                data: formdata,
                success: function(resp) {

                    if (isAuthenticated(resp) == false) {
                        return false;
                    }
                    if (resp == '') {
                        $('.my-searched-records').html('No Records found.');
                    } else {
                        $('.my-searched-records').html(resp);
                    }
                    $('.loader').hide();
                    $('body').removeClass('body-overflow');
                }
            });
            return false;
        });
    });
</script>

<script>
    //pagination
    $(document).on('click', '#leaveTrackerModal .pagination li', function() {

        var page_no = $(this).children('a').text();
        if (page_no == '') {
            return false;
        }
        if (isNaN(page_no)) {
            var new_url = $(this).children('a').attr('href');
            page_no = new_url[new_url.length - 1];
        }

        var manager_id = "{{ $manager_id }}";

        $('.loader').show();
        $('body').addClass('body-overflow');

        $.ajax({
            type: 'get',
            url: "{{ url('/my-profile/task-allocation/view/') }}" + '/' + manager_id + "?page=" + page_no + '&logged',
            success: function(resp) {
                if (isAuthenticated(resp) == false) {
                    return false;
                }

                $('.log-my-task-alloc-record').html(resp);
                $('.loader').hide();
                $('body').removeClass('body-overflow');
            }
        });
        return false;
    });
</script>

<!-- head script of show date  -->
<script>
    //same for all heads
    $(document).ready(function() {
        $(document).on('click', '.daily-rcd-head', function() {
            $(this).next('.daily-rcd-content').slideToggle();
            $(this).find('i').toggleClass('fa-angle-down');
            $('.input-plusbox').hide();

        });
    });
</script>