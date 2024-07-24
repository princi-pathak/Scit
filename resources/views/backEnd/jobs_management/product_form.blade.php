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
    padding: 4px 6px 4px 6px;
    line-height: 17px;
    text-shadow: 0 1px 0 #ffffff;
    border: 1px solid #ccc;
    background-color: #efefef;
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
                       {{$task}}  Product
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" id="form_data">
                            <label>Product Details</label>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Customer</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="Customer_id" id="Customer_id">
										<option disabled selected>-All-</option>
                                        <option value="1" <?php if(isset($product) && $product->adder_id == 1){echo "selected";}else{}?>>Normal</option>
                                        <option value="2" <?php if(isset($product) && $product->adder_id == 2){echo "selected";}else{}?>>Medium</option>
                                        <option value="3" <?php if(isset($product) && $product->adder_id == 3){echo "selected";}else{}?>>None</option>
                                        
									</select>
                                    <p style="color:red;display:none" id="Customer_idError">* Customer is Required Field *</p>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Product Category</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="product_category" id="product_category">
										<option disabled selected>-Any Category-</option>
                                        @foreach($product_category as $cat)
                                        <option value="{{$cat->id}}" <?php if(isset($product) && $product->cat_id == $cat->id){echo "selected";}else{}?>>{{$cat->full_category}}</option>
                                        @endforeach
									</select>
                                    <p style="color:red;display:none" id="product_categoryError">* Product Category is Required Field *</p>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Product Name*</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php if(isset($product)){echo $product->product_name;}else{}?>" maxlength="255">
                                    <p style="color:red;display:none" id="nameError">* Product Name is Required Field *</p>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Product Code</label>
                                <div class="col-lg-6">
                                    <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Product Code" value="<?php if(isset($product)){echo $product->product_code;}else{}?>" maxlength="255">
                                    <p style="color:red;display:none" id="product_codeError">* Product Name is Required Field *</p>
                                </div>
                                <div class="col-lg-3">
                                    <input type="button" value="Generate" id="generate" class="btn btn-primary" onclick="gerate_code()">
                                </div>
                            </div>                           
                                          
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Cost Price</label>
                                <div class="col-lg-9">
                                    <input type="text" name="cost_price" id="cost_price" class="form-control" placeholder="Cost Price" value="<?php if(isset($product)){echo $product->cost_price;}else{}?>">
                                    <p style="color:red;display:none" id="cost_priceError">* Cost Price is Required Field *</p>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Markup</label>
                                <div class="col-lg-9">
                                    <input type="text" name="markup" id="markup" class="form-control" placeholder="External Tax Code" value="<?php if(isset($product)){echo $product->margin;}else{}?>">
                                    <p style="color:red;display:none" id="markupError">* Markup is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Price</label>
                                <div class="col-lg-9">
                                    <input type="text" name="price" id="price" class="form-control" value="<?php if(isset($product)){echo $product->price;}else{}?>">
                                    <p style="color:red;display:none" id="priceError">* Price is Required Field *</p>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Description</label>
                                <div class="col-lg-9">
                                    <textarea name="description" id="description" rows="5" cols="10" class="form-control"><?php if(isset($product)){echo $product->description;}else{}?></textarea>
                                    <p style="color:red;display:none" id="descriptionError">* Description is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Show On Template</label>
                                <div class="col-lg-9">
                                    <input type="checkbox" class="" id="show_temp" name="show_temp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Bar Code</label>
                                <div class="col-lg-9">
                                    <input type="text" id="bar_code" name="bar_code" class="form-control" value="<?php if(isset($product)){echo $product->bar_code;}else{}?>">
                                    <p style="color:red;display:none" id="bar_codeError">* Bar Code is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Select Tax Rate</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="tax_id" id="tax_id">
										<option disabled selected>-Please Select-</option>
                                        @foreach($tax as $rate)
                                        <option value="{{$rate->id}}" <?php if(isset($product) && $product->tax_rate == $rate->id){echo "selected";}else{}?>>{{$rate->name}}</option>
                                        @endforeach
                                        
									</select>
                                    <p style="color:red;display:none" id="tax_idError">* Tax Rate is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Purchase Tax Rate</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="tax_rate" id="tax_rate">
										<option disabled selected>-Please Select-</option>
                                        @foreach($tax as $val)
                                        <option value="{{$val->id}}" <?php if(isset($product) && $product->tax_rate == $val->id){echo "selected";}else{}?>>{{$val->name}}</option>
                                        @endforeach
                                        
									</select>
                                    <p style="color:red;display:none" id="tax_rateError">* Purchase Tax Rate is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nominal Code</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="nominal_code" name="nominal_code" value="<?php if(isset($product) && $product->tax_rate == $val->id){echo $product->nominal_code;}else{}?>">
                                    <p style="color:red;display:none" id="nominal_codeError">* Nominal Code is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Sales Account Code</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="sales_acc_code" id="sales_acc_code">
										<option disabled selected>-Please Select-</option>
                                        @foreach($acc_code as $code)
                                        <option value="{{$code->id}}" <?php if(isset($product) && $product->sales_acc_code == $code->id){echo "selected";}else{}?>>{{$code->name}}</option>
                                        @endforeach
                                        
									</select>
                                    <p style="color:red;display:none" id="sales_acc_codeError">* Sales Account Code is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Purchase Account Code</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="purchase_acc_code" id="purchase_acc_code">
										<option disabled selected>-Please Select-</option>
                                        @foreach($acc_code as $codes)
                                        <option value="{{$codes->id}}" <?php if(isset($product) && $product->purchase_acc_code == $codes->id){echo "selected";}else{}?>>{{$codes->name}}</option>
                                        @endforeach
                                        
									</select>
                                    <p style="color:red;display:none" id="purchase_acc_codeError">* Purchase Account Code is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Expense Account Code</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="expense_acc_code" id="expense_acc_code">
										<option disabled selected>-Please Select-</option>
                                        @foreach($acc_code as $value)
                                        <option value="{{$value->id}}" <?php if(isset($product) && $product->expense_acc_code == $value->id){echo "selected";}else{}?>>{{$value->name}}</option>
                                        @endforeach
                                        
									</select>
                                    <p style="color:red;display:none" id="expense_acc_codeError">* Expense Account Code is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Location</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="location" name="location" value="<?php if(isset($product)){echo $product->location;}else{}?>">
                                    <p style="color:red;display:none" id="locationError">* Location is Required Field *</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Attachment</label>
                                <div class="col-lg-9">
                                    <input type="file" class="form-control" id="attachment" name="attachment">
                                    <p style="color:red;display:none" id="attachmentError">* Attachment is Required Field *</p>
                                    <input type="hidden" value="<?php if(isset($product)){echo $product->attachment;}else{}?>" name="old_image" id="old_image">
                                </div>
                            </div>
                            <table class="table">
                                <thead style="background-color: #0606060f;">
                                    <th>Supplier</th>
                                    <th>Part Number</th>
                                    <th>Cost Price</th>
                                    <th><button class="btn btn-primary" type="button" onclick="suplier_row()">+</button></th>
                                </thead>
                                <tbody id="result">
                                    <?php foreach($supplier as $v){?>
                                <tr>
                                    <td>
                                        <select id="supplier_id" name="supplier_id[]" class="form-control">
                                            <option selected disabled>Select Supplier</option>
                                            <?php $inc=1; foreach($data as $d){?>
                                                <option value="{{$inc}}" <?php if($v->supplier_id == $inc){echo "selected";}else{}?>>{{$d}}</option>
                                                <?php $inc++;}?>
                                        </select>
                                    </td>
                                    <td><input type="text" id="part_number" name="part_number[]" value="{{$v->part_number}}"></td>
                                    <td><span class="currency">£</span><input type="text" id="cost_price_supplier" name="cost_price_supplier[]" value="{{$v->cost_price_supplier}}"></td>
                                    <td class="delete_row">X</td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
							<div class="form-actions">
								<div class="row">
									<div class="col-lg-offset-3 col-lg-10">
                                     <div class="add-admin-btn-area">   
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" id="id" value="<?php if(isset($product)){echo $product->id;}else{}?>">
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
    var product_category = $("#product_category").val();
    var name = $("#name").val();
    var product_code = $('#product_code').val();
    var cost_price = $('#cost_price').val();
    var markup = $('#markup').val();
    var price = $("#price").val();
    var description = $("#description").val();
    var bar_code = $("#bar_code").val();
    var tax_id = $("#tax_id").val();
    var tax_rate = $("#tax_rate").val();
    var nominal_code = $("#nominal_code").val();
    var sales_acc_code = $("#sales_acc_code").val();
    var purchase_acc_code = $("#purchase_acc_code").val();
    var expense_acc_code = $("#expense_acc_code").val();
    var location = $("#location").val();
    var attachment = $("#attachment").val();
    var token = '<?php echo csrf_token();?>';

    var firstErrorField = null;

    if (Customer_id == '' || Customer_id == null) {
        $("#Customer_idError").show();
        if (!firstErrorField) firstErrorField = $('#Customer_id');
    } else {
        $("#Customer_idError").hide();
    }

    if (product_category == '' || product_category == null) {
        $("#product_categoryError").show();
        if (!firstErrorField) firstErrorField = $('#product_category');
    } else {
        $("#product_categoryError").hide();
    }

    if (name == '') {
        $("#nameError").show();
        if (!firstErrorField) firstErrorField = $('#name');
    } else {
        $("#nameError").hide();
    }

    if (product_code == '') {
        $("#product_codeError").show();
        if (!firstErrorField) firstErrorField = $('#product_code');
    } else {
        $("#product_codeError").hide();
    }

    if (cost_price == '') {
        $("#cost_priceError").show();
        if (!firstErrorField) firstErrorField = $('#cost_price');
    } else {
        $("#cost_priceError").hide();
    }

    if (markup == '') {
        $("#markupError").show();
        if (!firstErrorField) firstErrorField = $('#markup');
    } else {
        $("#markupError").hide();
    }

    if (price == '') {
        $("#priceError").show();
        if (!firstErrorField) firstErrorField = $('#price');
    } else {
        $("#priceError").hide();
    }

    if (description == '') {
        $("#descriptionError").show();
        if (!firstErrorField) firstErrorField = $('#description');
    } else {
        $("#descriptionError").hide();
    }

    if (bar_code == '') {
        $("#bar_codeError").show();
        if (!firstErrorField) firstErrorField = $('#bar_code');
    } else {
        $("#bar_codeError").hide();
    }

    if (tax_id == '' || tax_id == null) {
        $("#tax_idError").show();
        if (!firstErrorField) firstErrorField = $('#tax_id');
    } else {
        $("#tax_idError").hide();
    }

    if (tax_rate == '' || tax_rate == null) {
        $("#tax_rateError").show();
        if (!firstErrorField) firstErrorField = $('#tax_rate');
    } else {
        $("#tax_rateError").hide();
    }

    if (nominal_code == '') {
        $("#nominal_codeError").show();
        if (!firstErrorField) firstErrorField = $('#nominal_code');
    } else {
        $("#nominal_codeError").hide();
    }

    if (sales_acc_code == '' || sales_acc_code == null) {
        $("#sales_acc_codeError").show();
        if (!firstErrorField) firstErrorField = $('#sales_acc_code');
    } else {
        $("#sales_acc_codeError").hide();
    }

    if (purchase_acc_code == '' || purchase_acc_code == null) {
        $("#purchase_acc_codeError").show();
        if (!firstErrorField) firstErrorField = $('#purchase_acc_code');
    } else {
        $("#purchase_acc_codeError").hide();
    }

    if (expense_acc_code == '' || expense_acc_code == null) {
        $("#expense_acc_codeError").show();
        if (!firstErrorField) firstErrorField = $('#expense_acc_code');
    } else {
        $("#expense_acc_codeError").hide();
    }

    if (location == '') {
        $("#locationError").show();
        if (!firstErrorField) firstErrorField = $('#location');
    } else {
        $("#locationError").hide();
    }

    if (attachment == '' && id == '') {
        $("#attachmentError").show();
        if (!firstErrorField) firstErrorField = $('#attachment');
    } else {
        $("#attachmentError").hide();
    }

    if (firstErrorField) {
        firstErrorField.focus();
        return false;
    } else {
        $.ajax({
            type: "POST",
            url: "{{url('admin/product_save_data')}}",
            data: new FormData($("#form_data")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if ($.trim(data) == "done") {
                    window.location.href = '<?php echo url('admin/product_list');?>';
                }
            }
        });
    }
}

function suplier_row(){
   var token='<?php echo csrf_token();?>'
    $.ajax({
            type: "POST",
            url: "{{url('admin/supplier_result')}}",
            data: {_token:token},
            success: function(data) {
                console.log(data);
                $('#result').append(data);
            }
        });
}
    $('#result').on('click', '.delete_row', function() {
        $(this).closest('tr').remove();
    });
</script>					
<script>
    function gerate_code(){
        var product_count='<?php echo $product_count+1;?>'
        var name=$("#name").val();
        var firstTwoLetters = name.substring(0, 2).toUpperCase();
        $("#product_code").val(""+firstTwoLetters+"-000"+product_count);
        $("#generate").hide();
    }
</script>
@endsection