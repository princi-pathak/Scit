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
                       {{$task}}  Job Type
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" role="form" method="post" action="{{url('admin/job_type_save_data')}}" id="" enctype="multipart/form-data">
                            <label>Job Type Details</label>
                            
                               
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Name*</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php if(isset($job_type)){echo $job_type->name;}?>" maxlength="255">
                                </div>
                            </div>                            
                                          
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Default Days</label>
                                <div class="col-lg-9">
                                    <input type="text" name="days" class="form-control" placeholder="Default Days" value="<?php if(isset($job_type)){echo $job_type->default_days;}else {echo 14;}?>">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Customer Visible</label>
                                <div class="col-lg-9">
                                    <input type="checkbox" name="visible" id="visible" class="" <?php if(isset($job_type) && $job_type->customer_visible == 1){echo "checked";}?> value="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Appointment Type</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="appointment">
										<option desabled selected>select Appointment Type</option>
                                        <option value="1" <?php if(isset($job_type) && $job_type->appointment_id == 1){echo "selected";}?>>Install</option>
                                        <option value="2" <?php if(isset($job_type) && $job_type->appointment_id == 2){echo "selected";}?>>Cold Call</option>
                                        <option value="3" <?php if(isset($job_type) && $job_type->appointment_id == 3){echo "selected";}?>>Maintenance</option>
									</select>
                                </div>
                            </div> 
                            
							<div class="form-actions">
								<div class="row">
									<div class="col-lg-offset-3 col-lg-10">
                                     <div class="add-admin-btn-area">   
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" value="<?php if(isset($job_type)){echo $job_type->id;}?>">
										<button type="submit" class="btn btn-primary save-btn">Save</button>

                                        <a href="{{ url('admin/jobs_type_list') }}">
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
</script>					
@endsection