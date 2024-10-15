@extends('backEnd.layouts.master')

@section('title','Appointment Rejection Category')

@section('content')

<?php
    $page_url = url('admin/job_rejection_categories');
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
                                    <a href="{{url('admin/customer_add')}}">
                                        <button id="editable-sample_new" class="btn btn-primary">
                                            Add Customer <i class="fa fa-plus"></i>
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
                                <div class="col-lg-6">
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
                                <div class="col-lg-6">
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
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Contact Nmae</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if(count($customers) == 0){ ?>
                                            <?php
                                                echo '<tr style="text-align:center">
                                                      <td colspan="9">No Customer found.</td>
                                                      </tr>';
                                            ?>
                                        <?php 
                                        } 

                                        else
                                        {
                                            foreach($customers as $key => $val) 
                                            {  ?>

                                        <tr >
                                            <td>{{++$key}}</td>
                                            <td class="user_name">{{ ucfirst($val->name) }}</td>
                                            <td>{{$val->address}}</td>
                                            <td>{{$val->contact_name}}</td>
                                            <td>{{$val->email}}</td>
                                            <td>{{$val->telephone}}</td>
                                            <td>
                                                @if($val->status == 1)
                                                    <a href="javascript:void(0)" onclick="status_change('{{base64_encode($val->id)}}',0)" class="btn btn-success">Active</a>
                                                @else
                                                <a href="javascript:void(0)" class="btn btn-danger" onclick="status_change('{{base64_encode($val->id)}}',1)">In-Active</a>
                                                @endif
                                            </td>
                                            <td class="action-icn">
                                                <a href="{{ url('admin/customer_add?key=')}}{{$val->id}}" class="edit"><span style= "font-size: 13px; color: #000;"><span style= "color: #000"><i data-toggle="tooltip" title="Edit" class="fa fa-edit fa-lg"></i></span></a> &nbsp &nbsp &nbsp 

                                                <a href="javascript:void(0)" onclick="delete_job('{{base64_encode($val->id)}}')" class="text-danger"><i data-toggle="tooltip" title="Delete" class="fa fa-trash-o fa-lg"></i></a>
                                             
                                            </td>
                                            
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
                url:"{{url('admin/customer_status_change')}}",
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
                url:"{{url('admin/customer_delete')}}",
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
</script>

@endsection


