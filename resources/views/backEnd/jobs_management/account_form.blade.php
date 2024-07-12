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
                       {{$task}}  Departmental Code
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal">
                            <label>Departmental Code Details</label>
                            
                               
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Name*</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php if(isset($account)){echo $account->name;}?>" maxlength="255">
                                    <p style="color:red;display:none" id="nameError">* Name is Required Field *</p>
                                </div>
                            </div>                            
                                          
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Departmental Code</label>
                                <div class="col-lg-9">
                                    <input type="text" name="code" id="code" class="form-control" placeholder="Departmental Code" value="<?php if(isset($account)){echo $account->departmental_code;}?>">
                                    <p style="color:red;display:none" id="codeError">* Code is Required Field *</p>
                                </div>
                            </div> 
                            
                            
							<div class="form-actions">
								<div class="row">
									<div class="col-lg-offset-3 col-lg-10">
                                     <div class="add-admin-btn-area">   
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" id="id" value="<?php if(isset($account)){echo $account->id;}?>">
										<button type="button" class="btn btn-primary save-btn" onclick="get_save_data()">Save</button>

                                        <a href="{{ url('admin/account_codes_list') }}">
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
        var id=$('#id').val();
        var name=$("#name").val();
        var code=$('#code').val();
        var token='<?php echo csrf_token();?>'
        if(name == ''){
            $("#nameError").show();
            return false;
        }else if(code == ''){
            $("#nameError").hide();
            $("#codeError").show();
            return false;
        }else{
            $.ajax({  
                type:"POST",
                url:"{{url('admin/account_save_data')}}",
                data:{id:id,name:name,code:code,_token:token},
                success:function(data)
                {
                    console.log(data);
                    if($.trim(data)=="done"){
                        window.location.href='<?php echo url('admin/account_codes');?>';
                    }
                }
            }); 
        }
        
            
    }
</script>					
@endsection