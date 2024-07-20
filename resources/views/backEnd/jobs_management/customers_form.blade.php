@extends('backEnd.layouts.master')

@section('title',':User Form')

@section('content')

<style type="text/css">
.contTitle {
    font-size: 16px;
    color: #1fb5ad;
    font-weight: 600;
    text-align: center;
    text-transform: uppercase;
}
#inputPlusCircle{
    padding: 0;
}
#inputPlusCircle a i{
    font-size: 26px;
    color: #009da7;
    line-height: 34px;
}
.inputIcon{
    font-size: 18px;
    line-height: 34px;
    color: #009da7;
}
.afterInputText {
    font-size: 13px;
    line-height: 30px;
}
.from_outside_border{
    border: 1px solid #1fb5ad;
    padding: 14px;
    position: relative;
    border-radius: 3px;
}
.mrg_tp{
    margin-top: 30px;
}
.upperlineTitle {
    font-size: 17px;
    color: #000;
    font-weight: 700;
    position: absolute;
    top: -14px;
    left: 12px;
    background: #fff;
    padding: 0 6px;
}
.padd0{
    padding: 0 14px;
}
.clickhere{
    padding: 0 12px ;
}
.pddtp{
    padding-top: 10px;
}
</style>
 <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
            <section class="panel">
                    <header class="panel-heading">
                    {{$task}} Customer
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <!-- page start-->
                        <form class="form-horizontal" role="form">
                            <div class="from_outside_border">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Customer Details</h4>                                    
                                    <div class="form-group">
                                        <label for="name" class="col-lg-4 col-sm-4 control-label">Customer Name *</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Customer Type</label>
                                        <div class="col-lg-7">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="#!"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Contact Name *</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Job Title (Position)</label>
                                        <div class="col-lg-7">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a class="#!"><i class="fa  fa-plus-circle"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Telephone</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Mobile</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Fax</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Website</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Default Catalogue</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Status</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Address Details</h4>                                    
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Region </label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Address *</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="8" cols="70">

                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">County</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Postcode</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a href="#!"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="col-lg-1" id="inputPlusCircle">
                                            <a href="#!"><i class="fa  fa-globe"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Country</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Site Notes</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="4" cols="70">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h4 class="contTitle">Other Details</h4>     
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Currency</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Credit Limit</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Discount</label>
                                        <div class="col-lg-4">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Discount Type</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Sage Ref.</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Company Reg</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">VAT / Tax No.</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Payment Terms</label>
                                        <div class="col-lg-4">
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        </div>
                                        <div class="col-lg-3">
                                            <span class="afterInputText">
                                                Days
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Assigned Products</label>
                                        <div class="col-sm-8">

                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Yes
                                              </label>
                                              <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> No
                                              </label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-4 col-sm-4 control-label">Notes</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="4" cols="70">

                                            </textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Dflt Products Tax</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Dflt Services Tax</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" >
                                                <option>General Customer</option>
                                                <option>General Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>                         
                        </div>

                        </div> <!-- End off from_outside_border -->

                        <div class="from_outside_border mrg_tp">
                            <label class="upperlineTitle">Customer Message</label>
                            <div class="row">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Show Message</label>
                                    <div class="col-sm-10">
                                        <label class="radio-inline">
                                            <input type="checkbox" name="inlineCheckOptions" id="inlineRadio1" value="option1"> Yes, show the message
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group padd0">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Message</label>
                                    <div class="col-lg-10">
                                           <textarea class="form-control" rows="4" cols="70"> </textarea>
                                    </div>
                                </div>

                                <div class="form-group padd0">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Section</label>
                                    <div class="col-lg-4">
                                           <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="from_outside_border mrg_tp">
                            <label class="upperlineTitle">Additional Contacts</label>
                            <div class="row">
                                <div class="form-group padd0">
                                    <div class="col-sm-12">
                                        <div class="pddtp">
                                            <button type="button" class="btn btn-primary">Add Contact</button>
                                            <button type="button" class="btn btn-primary">Export</button>
                                            <button type="button" class="btn btn-primary">Import</button>
                                            <label class="clickhere">
                                                <a href="#!"> Click here</a><span> to download import template </span>
                                            </label>
                                            <label>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Bulk Action
                                                    <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                    <li><a href="#">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="padd0">
                                    <table class="table">
                                        <thead>
                                          <tr  class="active">
                                            <th>1</th>
                                            <th>Contact Name</th>
                                            <th>Customer Job Title</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>County</th>
                                            <th>Postcode</th>
                                            <th>Default Billing	</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>


                        <div class="from_outside_border mrg_tp">
                            <label class="upperlineTitle">Customer Sites</label>
                            <div class="row">
                                <div class="form-group padd0">
                                    <div class="col-sm-12">
                                        <div class="pddtp">
                                            <button type="button" class="btn btn-primary">Add Site</button>
                                            <button type="button" class="btn btn-primary">Export</button>
                                            <button type="button" class="btn btn-primary">Import</button>
                                            <label class="clickhere">
                                                <a href="#!"> Click here</a><span> to download import template </span>
                                            </label>
                                            <label>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Bulk Action
                                                    <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                    <li><a href="#">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="padd0">
                                    <table class="table">
                                        <thead>
                                          <tr  class="active">
                                            <th>1</th>
                                            <th>Contact Name</th>
                                            <th>Customer Job Title</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>County</th>
                                            <th>Postcode</th>
                                            <th>Default Billing	</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>

                        <div class="from_outside_border mrg_tp">
                            <label class="upperlineTitle">Customer Loginss</label>
                            <div class="row">
                                <div class="form-group padd0">
                                    <div class="col-sm-12">
                                        <div class="pddtp">
                                            <button type="button" class="btn btn-primary">Add Login</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="padd0">
                                    <table class="table">
                                        <thead>
                                          <tr  class="active">
                                            <th>1</th>
                                            <th>Contact Name</th>
                                            <th>Customer Job Title</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>County</th>
                                            <th>Postcode</th>
                                            <th>Default Billing	</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>

                        <div class="pddtp">
                            <button type="button" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                            <button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                            <button type="button" class="btn btn-primary"><i class="fa fa-chevron-down"></i> Add</button>
                        </div>
                    </form>
                        <!-- page end-->
                    </div>
                </section>
        <!-- page end-->
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