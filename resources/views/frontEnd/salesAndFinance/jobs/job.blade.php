@include('frontEnd.salesAndFinance.jobs.layout.header')

    <section class="main_section_page px-3">
        <div class="container-fluid">
        <div class="row">
    <div class="col-md-4 col-lg-4 col-xl-4 ">
        <div class="pageTitle">
            <h3>Active Jobs</h3>
        </div>
    </div>
    <div class="col-md-8 col-lg-8 col-xl-8 px-3">
        <div class="pageTitleBtn">
            <a href="#" class="profileDrop">Search Jobs</a>
            <a href="#" class="profileDrop">User Appounments</a>
            <a href="#" class="profileDrop">View User Map</a>
            <a href="#" class="profileDrop">View Planner</a>
            <a href="#" class="profileDrop">View Live Panel</a>
        </div>
    </div>
</div>
    <?php 
        $active_job=App\Models\Job::where('status',1)->count();
        $unsigned_job=App\Models\Job::where('status',0)->count();
    ?>
<div class="row">
    <div class="col-md-9 col-lg-9 col-xl-9 px-3">
        <div class="jobsection">
            <?php if(@$access_rights[311] == 325){?>
            <a href="{{url('jobs_create')}}" class="profileDrop">New Job</a>
            <?php }?>
            <a href="{{url('jobs_create')}}" class="profileDrop">New Job</a>
            <a href="#" class="profileDrop">Active <span>(<?php echo $active_job;?>)</span></a>
            <a href="#" class="profileDrop">Unassigned<span>(<?php echo $unsigned_job;?>)</span></a>
            <a href="#" class="profileDrop">Action Required<span>(15)</span></a>
            <a href="#" class="profileDrop">Overdue<span>(76)</span></a>
            <a href="#" class="profileDrop">authorization<span>(32)</span></a>
            <a href="#" class="profileDrop">On Hold<span>(2)</span></a>
            <a href="#" class="profileDrop">Recursing Jobs</a>
            <label class="incluteCheck">
                <input type="checkbox" id="checb">
                <label for="checb">Include Quote Jobs</label>
            </label>
        </div>
    </div>
    
    <div class="col-md-3 col-lg-3 col-xl-3 ">
        <div class="OverdueJobs">
            <a href="#!" class="overdueJobsFolder">
                <img src="{{url('public/frontEnd/jobs/images/folder.png')}}">
                <span>Overdue Jobs</span>
                </a>
        </div>
    </div>
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="maimTable">
                        <div class="printExpt">
                            <div class="prntExpbtn">
                            <a href="#!">Print</a>
                            <a href="#!">Export</a>
                            </div>
                            <div class="searchFilter">
                                <a href="#!">Show Search Filter</a>
                            </div>

                        </div>
                        <div class="markendDelete">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="jobsection">
                                        <a href="javascript:void(0)" id="deleteSelectedRows" class="profileDrop">Delete</a>
                                        <!-- <a href="#" class="profileDrop">Mark As completed</a> -->
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="pageTitleBtn p-0">
                                        <!-- <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center" style=" width:30px;"><input type="checkbox" id="selectAll"> <label for="selectAll"> All Select</label></th>
                                    <th>#</th>
                                    <th>Job Ref </th>
                                    <th>Job Type</th>
                                    <th>Customer</th>
                                    <th>Purchase Order Ref</th>
                                    <th>Short Description </th>
                                    <th>Site </th>
                                    <th>Appointments-Overdue Appointments(122)</th>
                                    <th>Complete By </th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                                               
                            <tbody>
                                <?php foreach($job as $key=>$val){?>
                                <tr>
                                    <td><input type="checkbox" id="" class="delete_checkbox" value="{{$val['id']}}"></td>
                                    <td>{{++$key}}</td>
                                    <td><a href="#!">{{$val['job_ref']}}</a></td>
                                    <td>{{$val['job_type'] ?? ""}}</td>
                                    <td>{{$val['customer_name'] ?? ""}}</td>
                                    <td>...</td>
                                    <td>{{$val['short_decinc'] ?? ""}}</td>
                                    <td>{{$val['site'] ?? ""}}</td>
                                    <td><span class="danger">Dave Taylor-26/04/2017 16:00-23:00 General - Awaiting</span></td>
                                    <td>{{$val['complete_by']}}</td>
                                    <td>Appointed</td>
                                    <td>
                                        <div class="pageTitleBtn p-0">
                                            <div class="nav-item dropdown">
                                                <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="dropdown-menu fade-up m-0">
                                                    <a href="{{url('job_edit?key=')}}{{base64_encode($val['id'])}}" class="dropdown-item col-form-label">Edit</a>
                                                    <!-- <hr class="dropdown-divider"> -->
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                               <?php }?>
                            </tbody>
                        </table>

                    </div>   <!-- End off main Table -->
                </div>
            </div>
        </div>
    </section>

    <script>
   $("#deleteSelectedRows").on('click', function() {
    let ids = [];
    
    $('.delete_checkbox:checked').each(function() {
        ids.push($(this).val());
    });
    if(ids.length == 0){
        alert("Please check the checkbox for delete");
    }else{
        if(confirm("Are you sure to delete?")){
            // console.log(ids);
            var token='<?php echo csrf_token();?>'
            var model='Job';
            $.ajax({
                type: "POST",
                url: "{{url('/bulk_delete')}}",
                data: {ids:ids,model:model,_token:token},
                success: function(data) {
                    console.log(data);
                    if(data){
                        location.reload();
                    }else{
                        alert("Something went wrong");
                    }
                    // return false;
                },
                error: function(xhr, status, error) {
                   var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
                }
            });
        }
    }
    
});
$('.delete_checkbox').on('click', function() {
    if ($('.delete_checkbox:checked').length === $('.delete_checkbox').length) {
        $('#selectAll').prop('checked', true);
    } else {
        $('#selectAll').prop('checked', false);
    }
});
 </script>

@include('frontEnd.salesAndFinance.jobs.layout.footer')