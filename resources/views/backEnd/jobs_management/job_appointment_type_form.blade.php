@extends('backEnd.layouts.master')

@section('title',':User Form')

@section('content')

<style type="text/css">
.position-center label {
font-size: 20px;
font-weight: 500;
} 
 .ui-widget-content .ui-icon {
    background-image: url(images/ui-icons_444444_256x240.png) !important;
}
.position-center .assign-access {
font-size: 16px;
font-weight: 500;
}

.add_field_button-area {
 margin:20px 0px 0px 0px;   
}

.col-lg-offset-3 .btn.btn-primary {
margin: 0px 10px 0px 0px;   
}

.qual_upload {
margin:20px 0px 0px 0px;    
}


.input-group-addon {
border:none;    
}

.input-group-addon.remove-addon {
padding: 5px 0px 15px 0px;    
}
</style>
 <section id="main-content" class="">
    <section class="wrapper">
        <div class="row">
			<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       {{$task}}  Job Appointment Type
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" id="form_data">
                            <label>Job Appointment Type Details</label> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Job Appointment Type*</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php if(isset($appointmenttype)){echo $appointmenttype->name;}?>" maxlength="255">
                                    <p style="color:red;display:none" id="nameError">* Name is Required Field *</p>
                                </div>
                            </div>                            
                                          
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Default Duration</label>
                                <div class="col-lg-9">
                                    <select name="hours" id="hours">
                                        <option value="01" <?php if(isset($appointmenttype) && $appointmenttype->hours == 01){echo 'selected';}?>>01</option>
                                        <option value="02" <?php if(isset($appointmenttype) && $appointmenttype->hours == 02){echo 'selected';}?>>02</option>
                                        <option value="03" <?php if(isset($appointmenttype) && $appointmenttype->hours == 03){echo 'selected';}?>>03</option>
                                        <option value="04" <?php if(isset($appointmenttype) && $appointmenttype->hours == 04){echo 'selected';}?>>04</option>
                                        <option value="05" <?php if(isset($appointmenttype) && $appointmenttype->hours == 05){echo 'selected';}?>>05+</option>
                                    </select>
                                    <select name="minutes" id="minutes">
                                        <?php for($i=0;$i<60;$i++){
                                            $time=str_pad($i, 2, '0', STR_PAD_LEFT);?>
                                            <option value="{{$time}}" <?php if(isset($appointmenttype) && $appointmenttype->minute == $time){echo 'selected';}?>><?php echo $time; ?></option>
                                        <?php }?>
                                    </select>
                                    &emsp;(Hours:Minutes)
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Auto Auth</label>
                                <div class="col-lg-9">
                                    <input type="radio" name="radio" id="yes" <?php if(isset($appointmenttype) && $appointmenttype->auth == 1){echo "checked";}else{echo "checked";}?>>Yes,autometically go for Authorisation when complete<br>
                                    <input type="radio" name="radio" id="no" <?php if(isset($appointmenttype) && $appointmenttype->auth == 2){echo "checked";}?>>No go to Action Required when complete (Mobile only)
                                </div>
                            </div>
							<div class="form-actions">
								<div class="row">
									<div class="col-lg-offset-3 col-lg-10">
                                     <div class="add-admin-btn-area">   
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" id="id" value="<?php if(isset($appointmenttype)){echo $appointmenttype->id;}?>">
										<button type="button" class="btn btn-primary save-btn" onclick="get_data()">Save</button>

                                        <a href="{{ url('admin/job_appointment_type') }}">
                                            <button type="button" class="btn btn-default" name="cancel">Cancel</button>
                                        </a>
									</div>
                                 </div>
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
<script>
    $(document).ready(function() {
    $("#visible").change(function() {
        var visible = $('#visible');
        if($('#visible').is(':checked')){
            visible.val(1);
        }
    });
});
function get_data(){
    var name=$("#name").val();
    var hours=$("#hours").val();
    var minutes=$("#minutes").val();
    var id=$("#id").val();
    var auth;
    if($('#yes').is(':checked')){
        auth=1;
    }
    if($('#no').is(':checked')){
        auth=2;
    }
    var token='<?php echo csrf_token();?>'
    var firstErrorField = null;
    if (name == '') {
        $("#nameError").show();
        if (!firstErrorField) firstErrorField = $('#name');
    } else {
        $("#nameError").hide();
    }
    if (firstErrorField) {
        firstErrorField.focus();
        return false;
    }else {
        $.ajax({  
            type:"POST",
            url:"{{url('admin/job_appointment_type_save')}}",
            data:{id:id,name:name,hours:hours,minutes:minutes,auth:auth,_token:token},
            success:function(data)
            {
                console.log(data);
                if($.trim(data)=="done"){
                    window.location.href='<?php echo url('admin/job_appointment_type');?>';
                }
            }
        }); 
    }
    
}
</script>					
@endsection