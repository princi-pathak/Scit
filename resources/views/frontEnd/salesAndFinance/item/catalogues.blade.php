@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Catalogues </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="jobsection">
                    <a href="#" class="profileDrop" onclick="itemsAddCatalogueModal(1)">Add</a>
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
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="pageTitleBtn p-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center" style=" width:60px;"><input type="checkbox" id="selectAll"> <label for="selectAll"> </label></th>
                                <th>#</th>
                                <th>Catalogue</th>
                                <th>Type</th>
                                <th>Item Count</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
    
                        <tbody>
                            
    
                        </tbody>
                    </table>
                </div> <!-- End off main Table -->
            </div>
            </di>
        </div>
</section>
@include('frontEnd.salesAndFinance.item.common.addcataloguemodal')

@include('frontEnd.salesAndFinance.jobs.layout.footer')