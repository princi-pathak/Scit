@extends('backEnd.layouts.master')

@section('title',':Job Rejection')

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
.radStar {
    color: red;
}
</style>
 <section id="main-content" class="">
    <section class="wrapper">
        <div class="row">
			<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       {{$task}}  Appointment Rejection Category
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" id="form_data">
                            <label>Appointment Rejection Category Details</label> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Appointment Status<span class="radStar">*</span></label>
                                <div class="col-lg-9">
                                    <select name="status" id="status" class="form-control">
                                        <option value="" selected disabled>None</option>
                                        <option value="Declined" <?php if(isset($rejection) && $rejection->appointment_id == "Declined"){echo "selected";}?>>Declined</option>
                                        <option value="Follow On" <?php if(isset($rejection) && $rejection->appointment_id == "Follow On"){echo "selected";}?>>Follow On</option>
                                        <option value="Abandoned" <?php if(isset($rejection) && $rejection->appointment_id == "Abandoned"){echo "selected";}?>>Abandoned</option>
                                        <option value="No Access" <?php if(isset($rejection) && $rejection->appointment_id == "No Access"){echo "selected";}?>>No Access</option>
                                        <option value="Cancelled" <?php if(isset($rejection) && $rejection->appointment_id == "Cancelled"){echo "selected";}?>>Cancelled</option>
                                    </select>
                                    <p style="color:red;display:none" id="statusError">* Appointment Status is Required Field *</p>
                                </div>
                            </div>                            
                                          
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Category<span class="radStar">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" id="name" name="name" class="form-control" value="<?php if(isset($rejection)){echo $rejection->name;}?>">
                                    <p style="color:red;display:none" id="nameError">* Category is Required Field *</p>
                                </div>
                            </div> 
                           
							<div class="form-actions">
								<div class="row">
									<div class="col-lg-offset-3 col-lg-10">
                                     <div class="add-admin-btn-area">   
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" id="id" value="<?php if(isset($rejection)){echo $rejection->id;}?>">
										<button type="button" class="btn btn-primary save-btn" onclick="get_data()">Save</button>

                                        <a href="{{ url('admin/job_rejection_categories') }}">
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
    var status=$("#status").val();
    var name=$("#name").val();
    var id=$("#id").val();
    var token='<?php echo csrf_token();?>'
    var firstErrorField = null;
    if (status == '' || status == null) {
        $("#statusError").show();
        if (!firstErrorField) firstErrorField = $('#status');
    } else {
        $("#statusError").hide();
    }
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
            url:"{{url('admin/job_rejection_category_save')}}",
            data:{id:id,name:name,status:status,_token:token},
            success:function(data)
            {
                console.log(data);
                if($.trim(data)=="done"){
                    window.location.href='<?php echo url('admin/job_rejection_categories');?>';
                }
            }
        }); 
    }
    
}
</script>					
@endsection