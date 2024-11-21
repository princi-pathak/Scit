@extends('backEnd.layouts.master')

@section('title','Expense')

@section('content')

<?php
    $page_url = url('admin/jobs_list');
?>


<style type="text/css">
 .position-center label {
    font-size: 20px;
    font-weight: 500;
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
                          <div class="col-lg-12">  
                          <?php 
                                if($paidWithAuthCount>0){
                                    $paid_count=$paidWithAuthCount;
                                    $auth_count=$authorisedCount-$paidWithAuthCount;
                                }else{
                                    $paid_count=$paidCount;
                                    $auth_count=$authorisedCount;
                                }
                            ?>
                            <div class="">
                                <div class="btn-group mr-3">
                                    <a href="#!">
                                    <!-- {{ url('admin/sales-finance/expense_add') }} -->
                                        <button id="editable-sample_new" class="btn btn-primary">
                                            Add <i class="fa fa-plus"></i>
                                        </button>
                                    </a>    
                                </div>
                                <div class="btn-group mr-3">
                                    <a href="{{ url('admin/sales-finance/expense?key=authorised&value=0') }}">
                                        <button id="bgcolor1" class="btn btn-primary bgcolor">
                                        Unauthorised ({{$unauthorisedCount}})
                                        </button>
                                    </a>    
                                </div>
                                <div class="btn-group mr-3">
                                    <a href="{{ url('admin/sales-finance/expense?key=authorised&value=1') }}">
                                        <button id="bgcolor2" class="btn btn-primary bgcolor">
                                        Authorised ({{$auth_count}}) 
                                        </button>
                                    </a>    
                                </div>
                                <div class="btn-group mr-3">
                                    <a href="{{ url('admin/sales-finance/expense?key=reject&value=1') }}">
                                        <button id="bgcolor3" class="btn btn-primary bgcolor">
                                        Rejected ({{$rejectCount}}) 
                                        </button>
                                    </a>    
                                </div>
                                <div class="btn-group mr-3">
                                    <a href="{{ url('admin/sales-finance/expense?key=paid&value=1') }}">
                                        <button id="bgcolor4" class="btn btn-primary bgcolor">
                                        Paid ({{$paid_count}}) 
                                        </button>
                                    </a>    
                                </div>
                                <div class="btn-group mr-3">
                                    <a href="{{ url('admin/sales-finance/expense') }}">
                                        <button id="bgcolor5" class="btn btn-primary bgcolor">
                                        All ({{$expenseCount}}) 
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
                                        <th>Expense By</th>
                                        <th>Expense Name</th>
                                        <th>Reference</th>
                                        <th>Attachments</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if(count($expense) == 0){ ?>
                                            <?php
                                                echo '<tr style="text-align:center">
                                                      <td colspan="6">No Job found.</td>
                                                      </tr>';
                                            ?>
                                        <?php 
                                        } 

                                        else
                                        {
                                            foreach($expense as $key => $value) 
                                            {  
                                                $user = App\User::find($value->user_id)->name;
                                                ?>

                                        <tr >
                                            <td class="user_name">{{$user}}</td>
                                            <td class="transform-none" style="text-transform: none;">{{ $value->title }}</td>
                                            <td>{{$value->reference}}</td>
                                            <td>
                                                @if($value->attachments != '')
                                                <a href="{{ url('public/images/expense/' . $value->attachments) }}" target="_blank" style="text-decoration:none">
                                                    View
                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($value->status == 1)
                                                    <a href="javascript:" onclick="status_change('{{base64_encode($value->id)}}',0)" class="btn btn-success">Active</a>
                                                @else
                                                <a href="javascript:" class="btn btn-danger" onclick="status_change('{{base64_encode($value->id)}}',1)">In-Active</a>
                                                @endif
                                            </td>
                                            <td class="action-icn">
                                            <!-- {{ url('admin/sales-finance/expense_add?key=') }}{{base64_encode($value->id)}} -->
                                                <a href="#!" class="edit"><span style= "font-size: 13px; color: #000;"><span style= "color: #000"><i data-toggle="tooltip" title="Edit" class="fa fa-edit fa-lg"></i></span></a> &nbsp &nbsp &nbsp 

                                                <a href="javascript:" onclick="delete_job('{{base64_encode($value->id)}}')" class="text-danger"><i data-toggle="tooltip" title="Delete" class="fa fa-trash-o fa-lg"></i></a>
                                             
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

<script>
    $('document').ready(function(){
        $('.send-set-pass-link-btn').click(function(){

            var send_btn = $(this);
            var user_id = send_btn.attr('id');
        
            $('.loader').show();

            $.ajax({
                type:'get',
                url : '{{ url('admin/users/send-set-pass-link') }}'+'/'+user_id,
                success:function(resp){
                    console.log(resp);
                    // return false;
                    if(resp == true){
                        
                        var usr = send_btn.closest('tr').find('.user_name').text();
                        alert('Email sent to '+usr+' successfully');
                    
                    } else{
                        alert('{{ COMMON_ERROR }}');
                    }
                    $('.loader').hide();
                }
            });
            return false;
        });
    });
</script>
<script>
    function status_change(id,status){
        var id=id;
        var status=status;
        var token='<?php echo csrf_token();?>'
            $.ajax({  
                type:"POST",
                url:"{{url('admin/sales-finance/expense_status_change')}}",
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
                url:"{{url('admin/sales-finance/expense_delete')}}",
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
<script>
    $(document).ready(function(){
        const url = new URL(window.location.href);
        const params = new URLSearchParams(url.search);
        const key = params.get('key');
        const value = params.get('value');
        console.log('Key:', key);
        console.log('Value:', value);
        $('.bgcolor').css("background-color","");
        if (key === 'authorised' && value == 0) {
            $("#bgcolor1").css("background-color", "#494949");
        } else if (key === 'authorised' && value == 1) {
            $("#bgcolor2").css("background-color", "#494949");
        } else if (key === 'reject' && value == 1) {
            $("#bgcolor3").css("background-color", "#494949");
        } else if (key === 'paid' && value == 1) {
            $("#bgcolor4").css("background-color", "#494949");
        } else {
            $("#bgcolor5").css("background-color", "#494949");
        }
        
    })
</script>

@endsection


