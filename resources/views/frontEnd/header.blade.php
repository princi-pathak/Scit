<?php



// $alert_dynamic_form = App\DynamicForm::alertDynamicForm();

//     echo "<pre>"; print_r($alert_dynamic_form); die;

?>



<style type="text/css">
    .header-dys {

        width: 60%;

        float: right;

    }

    .select-dyslexia {

        float: right;

    }



    .select-dyslexia select {

        background-color: #1f88b5;

    }



    .form-group.has-feedback {

        padding: 0px 15px 10px 15px;

    }



    /* .col-form-label {

width: 20%;

float: left;   

}



.element .form-control {

width: 80%;

float: right; 

} */



    .sel_design_layout {

        border: 1px solid #1f88b5;

        box-shadow: none;

        color: #fff;

        background: #1f88b5;

    }



    .top-nav img {

        border: 2px solid #d9d9d9;

        object-fit: cover;



        
    }





</style>

<!--header start-->

<header class="header fixed-top">

    <div class="navbar-header">

        <button type="button" class="navbar-toggle hr-toggle" data-toggle="collapse" data-target=".navbar-collapse">

            <span class="fa fa-bars"></span>

        </button>

        <!--logo start-->

        <div class="brand ">

            <a href="{{ url('/') }}" class="logo">

                <span style="color: white;">SCITS </span>

            </a>

        </div>

        <!--logo end-->

        <div class="horizontal-menu navbar-collapse collapse">

            <div class="wlcome-header text-uppercase"> Welcome Back, </div>

        </div>

        <div class="header-dys top-nav hr-top-nav cus-nav">

            <div class="col-md-8 col-sm-8 col-xs-12 col-lg-8">

                <?php

                if (Auth::check()) {

                    $design_layout_id = Auth::user()->design_layout;
                } else {

                    $design_layout_id = '0';
                }

                ?>

                <div class="select-dyslexia">

                    <select class="form-control sel_design_layout" name="design_layout_id">

                        <option value="0" <?php if (isset($design_layout_id)) {
                                                if ($design_layout_id == '0') {
                                                    echo "selected";
                                                }
                                            } ?>>Normal</option>

                        <option value="1" <?php if (isset($design_layout_id)) {
                                                if ($design_layout_id == '1') {
                                                    echo "selected";
                                                }
                                            } ?>>Dyslexia</option>

                    </select>

                </div>

            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">

                <ul class="nav pull-left top-menu">

                    <!-- user login dropdown start-->

                    <li class="dropdown">

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <?php

                            $user_image = Auth::user()->image;

                            if (empty($user_image)) {

                                $user_image = 'default_user.jpg';
                            }

                            $current_path = Request::path();

                            $user_id = Auth::user()->id;

                            ?>

                            <img alt="" src="{{ userProfileImagePath.'/'.$user_image }}">

                            <span class="username">{{ ucfirst(Auth::user()->name) }}</span>

                            <b class="caret"></b>

                        </a>

                        <ul class="dropdown-menu extended logout">

                            <li><a href="{{ url('/my-profile/'.$user_id) }}"> <i class="fa fa-user-circle"></i> My Profile </a></li>

                            @if(Auth::user()->user_type == 'A')

                            <li><a href="{{ url('agent/welcome') }}"> <i class="fa fa-home"></i> Change Home </a></li>

                            @endif

                            <li><a href="#" class="add_user"> <i class=" fa fa-user"></i> Add user </a></li>

                            <li><a href="#dynmicFormModal" data-toggle="modal"> <i class="fa fa-bolt"></i> Forms </a></li>

                            <li><a href="{{ url('/general-admin') }}"><i class="fa fa-cogs"></i> General Admin </a></li>

                            <li><a href="{{ url('/lock?path='.$current_path) }}"><i class="fa fa-lock"> </i> Lock</a></li>

                            <li><a href="#" class="hndovr_logbk"><i class="fa fa-address-book-o"></i> Hand Over </a></li>

                            <li><a href="{{ url('/logout') }}"><i class="fa fa-key"></i> Log Out</a></li>

                        </ul>

                    </li>

                    <!-- user login dropdown end -->

                </ul>

            </div>

        </div>

    </div>

</header>

<!--header end-->

@include('frontEnd.common.add_user')

@include('frontEnd.common.dynamic_forms')

@include('frontEnd.common.handover_logbook')


<script>
    $(".add_user").click(function() {

        $('#addServiceUserModal').modal('show');

    });
</script>



<script>
    $(document).ready(function() {

        $(document).on('change', '.sel_design_layout', function() {



            var design_layout_id = $('select[name=design_layout_id]').val();

            var normal_layout_id = "{{ url('/change-design-layout/0') }}";

            var dyslexia_layout_id = "{{ url('/change-design-layout/1') }}";

            var no_layout_id = "{{ url('/') }}";

            if (design_layout_id == '0') {

                location.href = normal_layout_id;

            } else if (design_layout_id == '1') {

                location.href = dyslexia_layout_id;

            } else {

                location.href = no_layout_id;

            }

        });

    });
</script>





<script type="text/javascript">
    $(".hndovr_logbk").click(function() {

        $('.submt-srvc-user').click();

        // $(document).on('click','.hndovr_logbk',function(){

        // $('#ServiceUserlistModal').modal('show');

        $('#HandoverlogBookModal').modal('show');

    });




</script>

<!-- <script>
    var imgfile = "0";
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        alert(file);
        console.log(file.lastModified);
        console.log(file);
        if (!file) return;

        const img = new Image();
        const objectURL = URL.createObjectURL(file);
        img.src = objectURL;

        img.onload = function() {
            const width = img.naturalWidth;
            const height = img.naturalHeight;
            const aspectRatio = width / height;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!validImageTypes.includes(file.type)) {
                //messageDiv.textContent = 'Invalid file type. Please upload a JPEG, PNG, or GIF image.';
                //return;
                const fileInput = document.getElementById('image');
                fileInput.value = '';
                document.getElementById('image_error').textContent = "Invalid file type. Please upload a JPG, JPEG, PNG, or GIF image.";
                document.getElementById('preview').style.display = 'none';
                // Clean up if the ratio is invalid
                URL.revokeObjectURL(objectURL);
                imgfile = "1";
            } else {
                document.getElementById('preview').src = objectURL;
                document.getElementById('preview').style.display = 'block';
                document.getElementById('image_error').style.display = 'none';
                imgfile = "0";
            }

        };

        img.onerror = function() {
            document.getElementById('image_error').textContent = 'Failed to load image.';
            document.getElementById('preview').style.display = 'none';
        };
    });
</script> -->

