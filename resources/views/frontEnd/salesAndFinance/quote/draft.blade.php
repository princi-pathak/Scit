@include('frontEnd.jobs.layout.header')

    <section class="main_section_page px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4 ">
                    <div class="pageTitle">
                        <h3>Draft Quotes</h3>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                    <div class="pageTitleBtn">
                        <a href="#" class="profileDrop">Search Quotes</a>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                    <div class="jobsection">
                        <a href="#" class="profileDrop">New Quotes</a>
                        <a href="#" class="profileDrop">Draft <span>(5)</span></a>
                        <a href="#" class="profileDrop">Actioned<span>(8)</span></a>
                        <a href="#" class="profileDrop">Converted<span>(15)</span></a>
                        <a href="#" class="profileDrop">Call back<span>(76)</span></a>
                        <a href="#" class="profileDrop">Accsepted<span>(32)</span></a>
                        <a href="#" class="profileDrop">Rejected<span>(2)</span></a>
                        <a href="#" class="profileDrop">Sales Appointments</a>
                    </div>
                </div>
              
            </div>
            <di class="row">
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
                                <!-- <div class="jobsection">
                                    <a href="#" class="profileDrop">Delete</a>
                                    <a href="#" class="profileDrop">Mark As completed</a>
                                </div> -->
                            </div>
                            <div class="col-md-5">
                                <div class="pageTitleBtn p-0">
                                    <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a>        
                                </div>
                            </div>
                        </div>
                        </div>

                        <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td></td>
                                    <th>#</th>
                                    <th>Job Ref </th>
                                    <th>Job Type</th>
                                    <th>Customer</th>
                                    <th>Purchase Order Ref</th>
                                    <th>Short Description </th>
                                    <th>Site </th>
                                    <th>Appointments-Overdue Appointments(0)</th>
                                    <th>Project Name </th>
                                    <th>Complete By </th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                                               
                            <tbody>
                                
                                <tr>
                                    <td></td>
                                    <td colspan="12">
                                        <label class="red_sorryText"> Sorry, there are no items available.. </label>
                                    </td>
                                </tr>
                                
                                
                         
                            </tbody>
                        </table>

                    </div>   <!-- End off main Table -->
                </div>
            </di>
        </div>
    </section>



    @include('frontEnd.jobs.layout.footer')