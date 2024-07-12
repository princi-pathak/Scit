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
                       {{$task}}  Tax Rate
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal">
                            <label>Tax Rate Details</label>
                            
                               
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Name*</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php if(isset($tax)){echo $tax->name;}?>" maxlength="255">
                                    <p style="color:red;display:none" id="nameError">* Name is Required Field *</p>
                                </div>
                            </div>                            
                                          
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tax Rate</label>
                                <div class="col-lg-9">
                                    <input type="text" name="tax_rate" id="tax_rate" class="form-control" placeholder="Tax Rate %" value="<?php if(isset($tax)){echo $tax->tax_rate;}?>"> %
                                    <p style="color:red;display:none" id="tax_rateError">* Code is Required Field *</p>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">External Tax Code</label>
                                <div class="col-lg-9">
                                    <input type="text" name="tax_code" id="tax_code" class="form-control" placeholder="External Tax Code" value="<?php if(isset($tax)){echo $tax->tax_code;}?>">
                                    <p style="color:red;display:none" id="tax_codeError">* Code is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Expiry Date</label>
                                <div class="col-lg-9">
                                    <input type="date" name="exp_date" id="exp_date" class="form-control" value="<?php if(isset($tax)){echo $tax->exp_date;}?>">
                                    <p style="color:red;display:none" id="exp_dateError">* Code is Required Field *</p>
                                </div>
                            </div> 
                            
                            
							<div class="form-actions">
								<div class="row">
									<div class="col-lg-offset-3 col-lg-10">
                                     <div class="add-admin-btn-area">   
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" id="id" value="<?php if(isset($tax)){echo $tax->id;}?>">
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
        var id=$('#id').val();
        var name=$("#name").val();
        var tax_rate=$('#tax_rate').val();
        var tax_code=$('#tax_code').val();
        var exp_date=$('#exp_date').val();
        var token='<?php echo csrf_token();?>'
        if(name == ''){
            $("#nameError").show();
            return false;
        }else if(tax_rate == ''){
            $("#nameError").hide();
            $("#tax_rateError").show();
            return false;
        }else if(tax_code == ''){
            $("#tax_rateError").hide();
            $("#tax_codeError").show();
        }
        else if(exp_date == ''){
            $("#tax_codeError").hide();
            $("#exp_dateError").show();
        }else{
            $.ajax({  
                type:"POST",
                url:"{{url('admin/tax_save_data')}}",
                data:{id:id,name:name,tax_rate:tax_rate,tax_code:tax_code,exp_date:exp_date,_token:token},
                success:function(data)
                {
                    console.log(data);
                    if($.trim(data)=="done"){
                        window.location.href='<?php echo url('admin/tax_rate');?>';
                    }
                }
            }); 
        }
        
            
    }
</script>					
@endsection