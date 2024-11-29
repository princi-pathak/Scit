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
                       {{$task}}  Product Category
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" >
                            <label>Product Category Details</label>
                            
                               
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Name<span class="radStar ">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php if(isset($cat)){echo $cat->name;}?>" maxlength="255">
                                    <p style="color:red;display:none" id="nameError">* Name is Required Field *</p>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Parent Category</label>
                                <div class="col-lg-9">
                                    <select name="catetgory_id" id="catetgory_id" class="form-control">
                                        <option selected disabled>Select Product Category</option>
                                        <?php foreach($category as $val){?>
                                            <option value="{{$val->id}}">{{ $val->full_category }}</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>  
                            <div class="row form-group">
                                <label class="col-lg-3 control-label">Status</label>
                                <div class="col-lg-9">
                                <select id="product_category_status" name="product_category_status" class="form-control editInput">
                                    <option value="1" <?php if(isset($cat) && $cat->status == 1){echo 'selected';}?>>Active</option>
                                    <option value="0" <?php if(isset($cat) && $cat->status == 0){echo 'selected';}?>>Inactive</option>
                                </select>
                                </div>
                            </div>
                            <div class="alert text-center" id="cat_message" style="display:none">Save successfully done</div>  
							<div class="form-actions">
								<div class="row">
									<div class="col-lg-offset-3 col-lg-10">
                                     <div class="add-admin-btn-area">   
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" id="id" value="<?php if(isset($cat)){echo $cat->id;}?>">
										<button type="button" class="btn btn-primary save-btn" onclick="get_save()">Save</button>

                                        <a href="{{ url('admin/product_category') }}">
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
    function get_save(){
        var name=$("#name").val();
        var id=$('#id').val();
        var catetgory_id=$('#catetgory_id').val();
        var product_category_status=$('#product_category_status').val();
        var token='<?php echo csrf_token();?>'
        if(name == ''){
            $("#nameError").show();
            return false;
        }else{
            $.ajax({  
                type:"POST",
                url:"{{url('admin/product_cat_save_data')}}",
                data:{productCategoryID:id,name:name,catetgory_id:catetgory_id,status:product_category_status,_token:token},
                success:function(data)
                {
                    console.log(data);
                    const cat_message=$('#cat_message').show();
                    if(data.errors){
                        cat_message.text(data.errors);
                        cat_message.addClass('alert-danger').css('border','1px solid red');
                        setTimeout(function() {
                            $('#cat_message').fadeOut(3000);
                        }, 3000);
                    }else if(data.success == true){
                        cat_message.text(data.message);
                        cat_message.addClass('alert-success').css('border','1px solid green');
                        setTimeout(function() {
                            window.location.href='<?php echo url('admin/product_category');?>';
                        }, 3000);
                    }else{
                        alert("Something went wrong. Please try again later");
                        location.reload();
                    }
                    
                },
                error: function(xhr, status, error) {
                   var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
                }
            }); 
        }
        
            
    }
</script>					
@endsection