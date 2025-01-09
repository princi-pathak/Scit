@extends('backEnd.layouts.master')

@section('title','Users')

@section('content')

<?php
    $page_url = url('admin/jobs_type_list');
?>


<style type="text/css">
 .position-center label {
    font-size: 20px;
    font-weight: 500;
}   
.custom-fieldset {
    position: relative;
    border: 2px solid #00000026;
    padding: 10px;
    margin-top: 20px;
    margin:10px;
}
.custom-legend {
    position: absolute;
    top: -10px;
    left: 20px;
    background-color: white;
    font-weight: bold;
    padding: 0 10px;
}
.modal-body .row {
    margin-bottom: 1rem;
}
p.floatLeft.redText.marginTop8px.marginBottom10 {
    text-align: left;
    font-size: 12px;
    color: #f00;
}
.workflowText{
    border-top:none;
    border-bottom:1px solid #ccc;
}
thead#flowhead {
    background: #eee;
}
.noti_button.firstPopBtn{
    text-align: right;
    padding: 0 9px 6px 0px;
}
</style>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                         <div class="row"> 
                          <div class="col-lg-6">  
                            <div class="clearfix">
                                <div class="btn-group">
                                    <a href="{{url('admin/job_type_add')}}">
                                        <button id="editable-sample_new" class="btn btn-primary">
                                            Add Job Type <i class="fa fa-plus"></i>
                                        </button>
                                    </a>    
                                </div>
                                @include('backEnd.common.alert_messages')
                            </div>
                           </div>
                           <div class="col-lg-6">
                            <!-- <div class="cog-btn-main-area">
                             <a class="btn btn-primary" href="#" data-toggle="dropdown">
                                    <i class="fa fa-cog fa-fw"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    
                                </ul>   
                            </div> -->
                           </div>
                          </div>
                            <div class="space15"></div>

                            <div class="row">
                                <div class="col-lg-9">
                                    <div id="editable-sample_length" class="dataTables_length">
                                        <form method='post' action="{{ $page_url }}" id="records_per_page_form">
                                            <label>
                                                <select name="limit"  size="1" aria-controls="editable-sample" class="form-control xsmall select_limit">
                                                    <option value="10" {{ ($limit == '10') ? 'selected': '' }}>10</option>
                                                    <option value="20" {{ ($limit == '20') ? 'selected': '' }}>20</option>
                                                    <option value="30" {{ ($limit == '30') ? 'selected': '' }}>30</option>
                                                    <!-- <option value="all" {{ ($limit == 'all') ? 'selected': '' }}>All</option> -->
                                                </select> records per page
                                            </label>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <form method='post' action="{{ $page_url }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="dataTables_filter" id="editable-sample_filter">
                                            <label>Search: <input name="search" type="text" value="{{ $search }}" aria-controls="editable-sample" class="form-control medium" ></label>
                                            <!-- <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>   -->
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                    <tr>
                                        <th>Job Type</th>
                                        <th>Customer Visible</th>
                                        <th>Default Completion Days</th>
                                        <th>Default</th>
                                        <th>Workflow</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if(count($jobs_type) == 0){ ?>
                                            <?php
                                                echo '<tr style="text-align:center">
                                                      <td colspan="4">No Job Type found.</td>
                                                      </tr>';
                                            ?>
                                        <?php 
                                        } 

                                        else
                                        {
                                            foreach($jobs_type as $key => $val) 
                                            {  ?>

                                        <tr >
                                            <td class="user_name">{{ ucfirst($val->name) }}</td>
                                            <td class="transform-none" style="text-transform: none;"><?php echo ($val->status==1)?"Yes":"No";?></td>
                                            <td>{{$val->default_days}}</td>
                                            <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                                            <td>-</td>
                                            <td>
                                                @if($val->status == 1)
                                                    <a href="javascript:" onclick="status_change('{{base64_encode($val->id)}}',0)" class="btn btn-success">Active</a>
                                                @else
                                                <a href="javascript:" class="btn btn-danger" onclick="status_change('{{base64_encode($val->id)}}',1)">Inactive</a>
                                                @endif
                                            </td>
                                            <td class="action-icn">
                                                <a href="{{ url('admin/job_type_add?key=')}}{{base64_encode($val->id)}}" class="edit"><span style= "font-size: 13px; color: #000;"><span style= "color: #000"><i data-toggle="tooltip" title="Edit" class="fa fa-edit fa-lg"></i></span></a> &nbsp &nbsp &nbsp 

                                                <a href="javascript:" onclick="delete_job('{{base64_encode($val->id)}}')" class="text-danger"><i data-toggle="tooltip" title="Delete" class="fa fa-trash-o fa-lg"></i></a>
                                             
                                            </td>
                                            <td><a href="javascript:" onclick="get_flow_model({{$val->id}})" class="btn btn-primary">Manage Workflow</a></td>
                                            
                                        </tr>
                                        <?php } } ?>
                                  
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- <div class="row"><div class="col-lg-6"><div class="dataTables_info" id="editable-sample_info">Showing 1 to 28 of 28 entries</div></div><div class="col-lg-6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← Prev</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div> -->
                           
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- Model workflow start here -->
        <div class="modal fade in" id="workflowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Workflow </h4>
            </div>
            <div class="modal-body">
                <div class="row">  
                    <div class="foor-box-wrap foor-plan">
                        <form method="post" action="{{url('admin/workflow_save_data')}}" id="flowForm">
                            @csrf
                        <div class="custom-fieldset">
                            <div class="custom-legend"><strong>New Job ></strong> Workflow</div>
                            <input type="hidden" id="job_type_id" name="job_type_id">
                            <p class="floatLeft redText marginTop8px marginBottom10">
                                Assigning a workflow to a job type will help your planners follow the correct stages of a Job. These stages can be adjusted at planning should they be required to go outside the normal flow if necessary.<br>
                                To change the workflow stages in this section once created and saved, will require you not to have any active jobs using this job type in the system – changing the overall workflow stages is deactivated until all jobs have been completed using this job type.<br>
                                Alternatively you can create a new job type with a new workflow.<br>
                                <br>Please call your account manager for more information</p>
                                <a href="javascript:" class="btn btn-primary" style="float:right; margin-bottom: 20px;" onclick="show_hide()">Add Workflow</a>
                                <table class="table">
                                    <thead class="header-row flowhead" style="display:none" id="flowhead">
                                        <th width="3%"></th>
                                        <th>Job Appointment Types</th>
                                        <th width="70px">Notify</th>
                                        <th>&nbsp;</th>
                                    </thead>
                                    <tbody id="result">
                                        <tr style="cursor: move; font-weight: bold; color: green;" id="wrokflow_msg">
                                            <td class="workflowText" style="border-top: none;">
                                                <p>Please start adding workflow</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <div class="noti_button firstPopBtn">
                            <input type="submit" class="btn btn-primary" value="Save"></input>
                            <a href="javascript:" class="btn btn-primary" onclick="document.getElementById('workflowModal').style.display='none'">Cancel</a>
                        </div>
                                            </form>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Notification Rules model start here -->
<div class="modal fade in" id="workflowNotificationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Workflow Notification Rule </h4>
            </div>
            <div class="modal-body">
                <div class="row">  
                    <div class="foor-box-wrap foor-plan">
                        <div class="custom-fieldset">
                            <div class="custom-legend"><strong>Notify</strong></div>
                            <form id="notification_form">
                            <input type="hidden" id="job_type_id_noti">
                            <input type="hidden" id="row_id_noti">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Notify When *</label>
                                <div class="col-lg-9">
                                    <input type="checkbox" name="om_complete" value="" id="om_complete"> On Complete <br>
                                    <input type="checkbox" name="om_change" value="" id="om_change"> On Change (Declined, Follow On, Abandoned, No Access)
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Notify Who? *</label>
                                <div class="col-lg-9">
                                <select class="form-select who_noti" name="who_noti" id="who_noti" multiselect-search="true" multiselect-select-all="true" multiselect-max-items="4" multiple="multiple">
                                    <option value="1">Tom</option>
                                    <option value="2">Jerry</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Notify Customer</label>
                                <div class="col-lg-9">
                                    <input type="checkbox" name="om_complete" id="om_complete" value=""> On Complete
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Send As *</label>
                                <div class="col-lg-9">
                                    <input type="checkbox" name="om_complete" id="om_complete_noti" value=""> Notification (User Only) <br>
                                    <input type="checkbox" name="sms" id="sms" value=""> SMS <br>
                                    <input type="checkbox" name="emailsend" id="emailsend" value=""> Email <br>
                                </div>
                            </div>

                        </div>
                        <div class="noti_button">
                            <a href="javascript:" class="btn btn-primary" onclick="get_save_notification()">Save</a>
                            <a href="javascript:" class="btn btn-primary">Cancel</a>
                        </div>
                                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- end here -->
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<script src="{{url('public/backEnd/js/multiselect.js')}}"></script>

<script>
    function status_change(id,status){
        var id=id;
        var status=status;
        var token='<?php echo csrf_token();?>'
            $.ajax({  
                type:"POST",
                url:"{{url('admin/job_type_status_change')}}",
                data:{id:id,status:status,_token:token},
                success:function(data)
                {
                    console.log(data);
                    if($.trim(data)=="done"){
                        window.location.reload();
                    }
                }
            }); 
    }
    function delete_job(id){
       if(confirm("Do you want to delete it ?")){
        var id=id;
        var token='<?php echo csrf_token();?>'
            $.ajax({  
                type:"POST",
                url:"{{url('admin/job_type_delete')}}",
                data:{id:id,_token:token},
                success:function(data)
                {
                    console.log(data);
                    if($.trim(data)=="done"){
                        window.location.reload();
                    }
                }
            }); 
       }
        
    }
    function get_flow_model(id){
        // alert(id);
        $("#flowForm")[0].reset();
        $("#job_type_id").val(id);
        $("#workflowModal").modal('show');
    }
    var rowCount = 0;
    function show_hide(){
        rowCount++;
        var job_type_id=$('#job_type_id').val();
        $('.flowhead').show();
        $('#wrokflow_msg').hide();
        var data='<tr><input type="hidden" value="'+rowCount+'" name="row_count"><td></td><td><select class="form-select" name="appointment_id[]" multiselect-search="false" multiselect-select-all="true" multiselect-max-items="4" multiple="multiple"><option value="1">Install</option><option value="2">Cold Call</option><option value="3">Maintenance</option></select></td><td><a href="javascript:" class="text-primary" onclick="set_rules('+job_type_id+','+rowCount+')">Set Rule</a></td><td><a href="javascript:" class="text-danger delete-row">X</a></td></tr>';
        $('#result').append(data);
        $('.multiselect-dropdown').hide();
            MultiselectDropdown();
    }
    $('#result').on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
    });
    function set_rules(job_type_id,row_id){
        $('#notification_form')[0].reset();
        $('#job_type_id_noti').val(job_type_id);
        $('#row_id_noti').val(row_id);
        $('#workflowNotificationModal').modal('show');
    }
    function get_save_notification(){
        var job_type_id_noti=$('#job_type_id_noti').val();
        var row_id_noti=$('#row_id_noti').val();
        var emailsend=0;
        var om_complete=0;
        var om_change=0;
        var sms=0;
        var om_complete_noti=0;
        var who_noti=[];
        $('.who_noti').each(function(){
            // alert($(this).val())
            who_noti.push($(this).val());
        });
        who_noti=who_noti;
        // console.log(who_noti)
        if($('#om_complete').is(':checked')){
            om_complete=1;
        }
        if($('#om_change').is(':checked')){
            om_change=1;
        }
        if($('#emailsend').is(':checked')){
            emailsend=1;
        }
        if($('#sms').is(':checked')){
            sms=1;
        }
        if($('#om_complete_noti').is(':checked')){
            om_complete_noti=1;
        }
        var token='<?php echo csrf_token();?>'
            $.ajax({  
                type:"POST",
                url:"{{url('admin/Workflow_notification_save')}}",
                data:{job_type_id_noti:job_type_id_noti,row_id_noti:row_id_noti,emailsend:emailsend,om_complete:om_complete,om_change:om_change,sms:sms,om_complete_noti:om_complete_noti,who_noti:who_noti,_token:token},
                success:function(data)
                {
                    console.log(data);
                    if($.trim(data)=="done"){
                        // window.location.reload();
                        $('#workflowNotificationModal').modal('hide');
                    }else {
                        alert("Something went wrong");
                    }
                }
            }); 
    }
    // function get_save_workflow(){
    //     var job_type_id=$('#job_type_id').val();
    //     alert(job_type_id)
    // }
</script>

@endsection


