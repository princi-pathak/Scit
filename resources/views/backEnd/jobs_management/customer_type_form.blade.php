@extends('backEnd.layouts.master')

@section('title',':Customer Type')

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
                       {{$task}}  Customer Type
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" id="form_data">
                            <label>Customer Type Details</label>                           
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Customer Type*</label>
                                <div class="col-lg-9">
                                    <input type="text" id="type" name="type" class="form-control" placeholder="Customer Type" value="<?php if(isset($type)){echo $type->name;}?>">
                                    <p style="color:red;display:none" id="typeError">* Customer Type is Required Field *</p>
                                </div>
                            </div> 
                           
							<div class="form-actions">
								<div class="row">
									<div class="col-lg-offset-3 col-lg-10">
                                     <div class="add-admin-btn-area">   
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" id="id" value="<?php if(isset($type)){echo $type->id;}?>">
                                        <input type="hidden" name="home_id" id="home_id" value="<?php echo ($home_id?$home_id:'');?>">
										<button type="button" class="btn btn-primary save-btn" onclick="get_data()">Save</button>

                                        <a href="{{ url('admin/customer_type') }}">
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
function get_data(){
    var name=$("#type").val();
    var id=$("#id").val();
    var home_id=$("#home_id").val();
    var token='<?php echo csrf_token();?>'
    var firstErrorField = null;
    if (name == '') {
        $("#typeError").show();
        if (!firstErrorField) firstErrorField = $('#type');
    } else {
        $("#typeError").hide();
    }
    if (firstErrorField) {
        firstErrorField.focus();
        return false;
    }else {
        $.ajax({  
            type:"POST",
            url:"{{url('admin/customer_type_save')}}",
            data:{id:id,home_id:home_id,name:name,_token:token},
            success:function(data)
            {
                console.log(data);
                if($.trim(data)=="done"){
                    window.location.href='<?php echo url('admin/customer_type');?>';
                }
            }
        }); 
    }
    
}
</script>					
@endsection