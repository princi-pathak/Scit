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
.currency {
    padding: 8px 9px 9px 9px;
    line-height: 17px;
    text-shadow: 0 1px 0 #ffffff;
    border: 1px 1px solid #ccc;
    background-color: #cecece;
    margin-right: 10px;
    border-right: none;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.currency-input-container {
    display: flex;
    align-items: center;
}
#project_value {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.delete_row {
    display: inline-block;
    width: 16px;
    height: 16px;
    background-image: url(../public/frontEnd/jobs/images/delete.png);
    background-repeat: no-repeat;
    text-indent: -9999px;
    position: relative;
    top: 10px;
    cursor: pointer;
}
</style>
 <section id="main-content" class="">
    <section class="wrapper">
        <div class="row">
			<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       {{$task}}  Project
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" id="form_data">
                            <label>Project Details</label>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Customer</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="Customer_id" id="Customer_id">
										<option disabled selected>-All-</option>
                                        <?php foreach($customers as $cust){?>
                                            <option value="{{$cust->id}}" <?php if(isset($project) && $project->customer_name == $cust->id){echo "selected";}else{}?>>{{$cust->name}}</option>
                                        <?php }?>
									</select>
                                    <p style="color:red;display:none" id="Customer_idError">* Customer is Required Field *</p>
                                </div>
                            </div> 
                               
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Project Name*</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php if(isset($project)){echo $project->project_name;}else{}?>" maxlength="255">
                                    <p style="color:red;display:none" id="nameError">* Product Name is Required Field *</p>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Start Date</label>
                                <div class="col-lg-6">
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="<?php if(isset($project)){echo $project->start_date;}else{}?>">
                                    <p style="color:red;display:none" id="start_dateError">* Start Date is Required Field *</p>
                                </div>
                                
                            </div>                           
                                          
                            <div class="form-group">
                                <label class="col-lg-3 control-label">End Date</label>
                                <div class="col-lg-6">
                                    <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Cost Price" value="<?php if(isset($project)){echo $project->end_date;}else{}?>">
                                    <p style="color:red;display:none" id="end_dateError">* End Date is Required Field *</p>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Project Value (Excl. VAT)</label>
                                <div class="col-lg-7 currency-input-container">
                                <span class="currency">£</span>
                                    <input type="text" name="project_value" id="project_value" class="form-control" value="<?php if(isset($project)){echo $project->project_value;}else{echo "0";}?>">
                                    <p style="color:red;display:none" id="project_valueError">* Project Value is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Description</label>
                                <div class="col-lg-9">
                                <textarea name="description" id="description" rows="5" cols="10" class="form-control"><?php if(isset($project)){echo $project->description;}else{}?></textarea>
                                    <p style="color:red;display:none" id="descriptionError">* Desicription is Required Field *</p>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Default Catalogue</label>
                                <div class="col-lg-9">
                                    <select name="catalogue_id" id="catalogue_id" class="form-control">
                                        <option selected disabled>Select Catalogue</option>
                                        <option value="1">ABC</option>
                                    </select>
                                    <p style="color:red;display:none" id="catalogue_idError">* Default Catalogue is Required Field *</p>
                                </div>
                            </div>
                            
                            
							<div class="form-actions">
								<div class="row">
									<div class="col-lg-offset-3 col-lg-10">
                                     <div class="add-admin-btn-area">   
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" id="id" value="<?php if(isset($project)){echo $project->id;}else{}?>">
                                        <input type="hidden" name="project_count" id="project_count" value="<?php if(isset($project)){echo $project->project_ref;}else{echo $project_count;}?>">
										<button type="button" class="btn btn-primary save-btn" onclick="get_save_data()">Save</button>

                                        <a href="{{ url('admin/tax_rate') }}">
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
    function get_save_data(){
    var id = $('#id').val();
    var Customer_id = $('#Customer_id').val();
    var name = $("#name").val();
    var start_date=$("#start_date").val();
    var end_date=$("#end_date").val();
    var project_value=$("#project_value").val();
    var description = $("#description").val();
    var catalogue_id=$("#catalogue_id").val();
    var token = '<?php echo csrf_token();?>';
    var firstErrorField = null;

    if (Customer_id == '' || Customer_id == null) {
        $("#Customer_idError").show();
        if (!firstErrorField) firstErrorField = $('#Customer_id');
    } else {
        $("#Customer_idError").hide();
    }

    if (name == '') {
        $("#nameError").show();
        if (!firstErrorField) firstErrorField = $('#name');
    } else {
        $("#nameError").hide();
    }

    if (start_date == '') {
        $("#start_dateError").show();
        if (!firstErrorField) firstErrorField = $('#start_date');
    } else {
        $("#start_dateError").hide();
    }

    if (end_date == '') {
        $("#end_dateError").show();
        if (!firstErrorField) firstErrorField = $('#end_date');
    } else {
        $("#end_dateError").hide();
    }

    if (project_value == '') {
        $("#project_valueError").show();
        if (!firstErrorField) firstErrorField = $('#project_value');
    } else {
        $("#project_valueError").hide();
    }

    if (description == '') {
        $("#descriptionError").show();
        if (!firstErrorField) firstErrorField = $('#description');
    } else {
        $("#descriptionError").hide();
    }

    if (catalogue_id == '' || catalogue_id == null) {
        $("#catalogue_idError").show();
        if (!firstErrorField) firstErrorField = $('#catalogue_id');
    } else {
        $("#catalogue_idError").hide();
    }

    if (firstErrorField) {
        firstErrorField.focus();
        return false;
    } else {
        $.ajax({
            type: "POST",
            url: "{{url('admin/project_save_data')}}",
            data: new FormData($("#form_data")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if ($.trim(data) == "done") {
                    window.location.href = '<?php echo url('admin/project_list');?>';
                }
            }
        });
    }
}

</script>					

@endsection