@include('frontEnd.jobs.layout.header')

    <section class="main_section_page px-3">
        <div class="container-fluid">
        <div class="row">
    <div class="col-md-4 col-lg-4 col-xl-4 ">
        <div class="pageTitle">
            <h3>{{@$header_title}}</h3>
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
            <?php if(@$access_rights[315] == 329){?>
            <a href="{{url('job_type_create')}}" class="profileDrop">New Job Type</a>
            <?php }?>
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
                        <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td></td>
                                    <th>#</th>
                                    <th>Job Type Ref </th>
                                    <th>Name</th>
                                    <th>Default Days</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                                               
                            <tbody>
                                <?php foreach($job_type as $key=>$val){?>
                                <tr>
                                    <td></td>
                                    <td>{{++$key}}</td>
                                    <td><a href="#!">JOB_Type-{{$val->id}}</a></td>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->default_days}}</td>
                                    <td><?php echo ($val->status ==1)?"Active":"In-active";?></td>
                                    <td><a href="#!" class="profileDrop dropdown-toggle">Action</a></td>
                                </tr>
                               <?php }?>
                            </tbody>
                        </table>
                    </div>   <!-- End off main Table -->
                </div>
            </div>
        </div>
    </section>
    @include('frontEnd.jobs.layout.footer')