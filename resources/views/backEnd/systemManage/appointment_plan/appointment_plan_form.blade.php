@extends('backEnd.layouts.master')

@section('title',': Form Builder Form')

@section('content')
<?php
if (isset($form)) {
    $action = url('admin/appointment/plan/edit/' . $form->id);
    $task = "Edit";
} else {
    $action = url('admin/appointment/plan/add');
    $task = "Add";
}
?>

</pre>


<style>
    .hidden {
        display: none;
    }
    .fontwesome-panel {
        top: 0;
        float: left;
        overflow-y: auto;
        position: fixed;
        right: 0;
        width: 100%;
        background: white;
        z-index: 9999;
        height: 100vh;
    }
    .prient-btn input[type="button"] {
        background-color: #1fb5ad;
        border: none;
        color: #fff;
        padding: 7px 22px;
        border-radius: 5px;
        font-weight: 600;
        position: relative;
        /* top: -10px; */
        text-align: center;
        margin: 31px auto 20px auto;
        display: table;
    }


    .has-feedback.formio-component button {
        border-radius: 0px;
    }


    .component-btn-group {
        margin: 10px 0px 0px 0px;
    }

    .card-header {
        padding: 1px 0px 0px 10px;
        border-bottom: 1px solid rgba(0, 0, 0, .125);
        background: #f0f0f0;
    }

    .card {
        border: 1px solid #cdcdcd;
    }

    .component-settings .nav>li>a {
        padding: 8px 10px;
        font-size: 15px;
        border-radius: 0px;
        margin: 10px 0px 0px 0px;
    }

    .nav-tabs {
        border-bottom: none;
    }

    .form-control {
        height: 40px;
    }


    .card-body {
        padding: 10px 18px 20px 18px;
        background: #fff;
    }


    .has-feedback .form-control {
        border-radius: 0px;
        border: 1px solid #ced4da;
    }


    label {
        margin: 10px 0px 10px 0px;
        font-size: 14px;
        font-weight: 500;
    }

    .form-check-label span {
        line-height: 1.8;
    }


    .card-header.bg-default {
        padding: 13px 0px 13px 10px;
        font-size: 14px;
        background: rgba(0, 0, 0, .03);
        border: none !important;
    }


    .card.mb-2 {
        margin: 0px 0px 10px 0px;
    }


    .p-2 {
        padding: 0.5rem !important;
    }


    .btn-secondary.formio-button-remove-row {
        background: #1ca59e;
        color: #fff;
        padding: 8px 12px;
    }

    .editgrid-actions .btn.btn-primary {
        margin: 10px 10px 0px 0px;
    }

    .editgrid-actions .btn.btn-danger {
        margin: 10px 0px 0px 0px;
    }


    .panel {
        border-radius: 0;
    }

    .btn.btn-secondary {
        background: #1ca59e;
        color: #fff;
        border: none;
    }

    .btn.btn-success {
        background: #1ca59e;
        color: #fff;
        border: none;
    }

    .btn.btn-danger {
        background: #1ca59e;
        color: #fff;
        border: none;
    }


    .btn.btn-primary.btn-md {
        background: #1fb5ad;
        color: #fff;
        margin: 20px 0px 0px 15px;
    }

    .formcomponents.col-md-2 {
        width: 21%;
    }

    .formarea.col-md-10 {
        width: 79%;
    }

    .custom-from {
        padding: 30px 0px 0px 0px;
    }

    .p-t-15 {
        margin: 20px 0px 0px 0px;
    }

    .submit-btn-main-area .save-appointmnt-form {
        margin: 0px 10px 0px 0px;
    }

    .form-builder-group-header {
        padding: 1px 0px 0px 0px;
    }

    .input-group {
        display: flex;
    }

    .input-group-text {
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding: 8px 15px;
        margin-bottom: 0;
        font-size: .9375rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        text-align: center;
        white-space: nowrap;
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        font-size: 15px;
    }

    .input-group-text i {
        line-height: 22px;
    }

    .form-text {
        color: #a1a1a1;
        margin: 5px 0px 0px 0px;
        font-size: 14px;
    }
    .showTextarea {
    display: none;
    }

    .showTextarea.active {
    display: block;
    }
</style>



<section id="main-content" class="">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cus-head">
                                <header class="panel-heading">
                                    System management-Appointment/Plan Builder
                                    <!-- {{ $task }} Form -->
                                </header>
                                <div class="cus-bg">
                                    @include('backEnd.common.alert_messages')
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Add:</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="" name="plan_title_add" placeholder="">
                                        <p class="help-block">Enter a title,choose an icon and click plus to description</p>
                                    </div>
                                    <div class="col-lg-1">
                                        <button id="" class="btn btn-primary icon-box-risk" type="button"> <i class="fa fa-info"></i>
                                        </button>
                                        <input type="hidden" name="plan_icon_add" class="form-control plan_icon">
                                    </div>
                                    <div class="col-lg-1">
                                        <button type="button" class="btn btn-primary addTextareaPlus add_plan_desc"> <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- style="display: none;" showTextarea -->
                                <div class="form-group " >
                                    <label class="col-lg-2 col-sm-2 control-label"></label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" rows="4" name="plan_detail_add"></textarea>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Add:</label>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" id="" placeholder="" name="field_name">
                                            <p class="help-block"> Enter the field name and choose its type</p>
                                    </div>
                                    <label class="col-lg-1 col-sm-2 control-label">Type:</label>
                                      <div class="col-lg-3">
                                        <select name="field_type" class="form-control">
                                            <option value=""> Select </option>
                                            <option value="Textbox"> Textbox </option>
                                            <option value="Selectbox"> Selectbox </option>
                                            <option value="Textarea"> Textarea </option>
                                            <option value="Date"> Date </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-1">
                                        <button id="" class="btn btn-primary add-field-btn"> <i class="fa fa-plus"></i>
                                        </button>
                                    </button>
                                    </div>
                                </div>
                             

                                 <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Title:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="" placeholder="" name="title">
                                            <p class="help-block">Above are default fields of your form, New custom fields will be shown below.</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input type="hidden" name="plan_title" value="" />
                                        <input type="hidden" name="plan_icon" value="" />
                                        <textarea name="plan_detail" style="display:none" value=""> </textarea>
                                        <button type="button" class="btn btn-default" name="cancel">Cancel</button>
                                        <button type="button" class="btn btn-danger" save-appointmnt-form>Confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<!-- Font awesome(icons) -->
       @include('backEnd.common.icon_list')
<!-- Font awesome(icons) end -->
<script>
  document.querySelector('.addTextareaPlus').addEventListener('click', function () {
    document.querySelector('.showTextarea').classList.toggle('active');
  });
</script>
<script>
    /*------Font awesome icons script ---------*/ 
    $(document).ready(function(){ 
        $('.fontwesome-panel').hide();
        $('.icon-box-risk').on('click',function(){ 
            $('body').addClass('modal-open');
            $('.fontwesome-panel').show();
            $('.fontwesome-panel').find('#icons-fonts').attr('id','risk-fonts');
        });

        $('.fontawesome-cross').on('click',function(){
           $('body').removeClass('modal-open');
           $('.fontwesome-panel').hide(); 
           
        });

        $(document).on('click','#risk-fonts .fa-hover a', function () {             
            var trim_txt = $(this).find('i');
            var new_class = trim_txt.attr('class');
            $('.icon-box-risk i').attr('class',new_class);
            $('body').toggleClass('modal-open');
            $('.fontwesome-panel').hide(); 
            $('.plan_icon').val(new_class);
            //alert(new_class);
        });
    });
</script>
<script>
    $('.description_plan').hide();
    $('.add_plan_desc').on('click',function(){
        autosize($("textarea"));
        $('.description_plan').toggle();
    });
</script>

<script>
    $('.edit_description_plan').hide();
    //$('.edit_description_plan').on('click', function(){
    $(document).on('click','.e_description_plan', function(){
        autosize($("textarea"));
        $('.edit_description_plan').toggle();
    });
</script>

@endsection