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
            <a href="#" class="profileDrop">New Job</a>
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