@include('frontEnd.jobs.layout.header')
    <section class="main_section_page px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4 ">
                    <div class="pageTitle">
                        <h3>Jobs Type</h3>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                    <div class="pageTitleBtn">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <?php if(@$access_rights[315] == 329){?>
                    <div class="jobsection">
                        <a href="{{url('job_type_create')}}" class="profileDrop">Add</a>
                    </div>
                    <?php }?>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 ">
                </div>
            </div>
            <di class="row">
                <div class="col-lg-12">
                    <div class="maimTable">
                        <div class="printExpt">
                            <div class="prntExpbtn">
                            <a href="#!">Print</a>
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
                                    <th>Job Type </th>
                                    <th>Customer Visible</th>
                                    <th>Default Compltion Days</th>
                                    <th>Default</th>
                                    <th>Workflow </th>
                                    <th>Status</th>
                                    <th> </th>
                                </tr>
                            </thead>
                                               
                            <tbody>
                            <?php foreach($job_type as $key=>$val){?>
                                <tr>
                                    <td></td>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->name}}</td>
                                    <td><?php echo ($val->status == 1)?"Yes":"No";?></td>
                                    <td>{{$val->default_days}}</td>
                                    <td><span class="grayCheck"><i class="fa-solid fa-circle-check"></i></span></td>
                                    <td>-</td>
                                    <td><span class="grencheck"><i class="fa-solid fa-circle-check"></i></span></td>
                                    <td><a href="#!" class="profileDrop dropdown-toggle">Action</a></td>
                                </tr>
                                <?php }?>

                            </tbody>
                        </table>

                    </div>   <!-- End off main Table -->
                </div>
            </di>
        </div>
    </section>
    @include('frontEnd.jobs.layout.footer')