@include('frontEnd.salesAndFinance.jobs.layout.header')

    <section class="main_section_page px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4 ">
                    <div class="pageTitle">
                        <h3>Sales Appointments</h3>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                    <div class="pageTitleBtn">
                        <a href="#" class="profileDrop">Search Quote</a>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                    <div class="jobsection">
                        <a href="#" class="profileDrop">New Quote</a>
                        <a href="#" class="profileDrop">Leads <span>(5)</span></a>
                        <a href="#" class="profileDrop">Draft<span>(8)</span></a>
                        <a href="#" class="profileDrop">Actioned<span>(15)</span></a>
                        <a href="#" class="profileDrop">Call Back<span>(76)</span></a>
                        <a href="#" class="profileDrop">Converted<span>(32)</span></a>
                        <a href="#" class="profileDrop">Sales Appointments<span>(2)</span></a>
                     
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
                                <a href="#!" onclick="hideShowDiv()" class="hidebtn">Show Search Filter</a>
                            </div>

                        </div>
                    
                        <div class="searchJobForm" id="divTohide">
                            <form action="" class="p-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">User:</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                    <option>--Any--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Job Ref:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName" value="John Smith">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Site Address:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName" value="John Smith">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Appointment Date:</label>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="inputName" value="John Smith">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="inputName" value="John Smith">
                                            </div>
                                        </div>
                                   
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Customer:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName" value="John Smith">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Time:</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                    <option>--Any--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Region:</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                    <option>--Any--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Completed On:</label>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="inputName" value="John Smith">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="inputName" value="John Smith">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Project:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName" value="John Smith">
                                            </div>
                                        </div>
                                    
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">App. Type:</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                    <option>--Any--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Appt. Created Date:</label>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="inputName" value="Start">
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="inputName" value="End">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Job Priority:</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                    <option>--Any--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Job Type:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName" value="John Smith">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">App. Priority:</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                    <option>--Any--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Created By User:</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                    <option>--Any--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">App. Status:	</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                    <option>--Any--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pageTitleBtn justify-content-center">
                                            <a href="#" class="profileDrop px-3">Search </a>
                                            <a href="#" class="profileDrop px-3">Clear</a>                
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> 
                        
                        <div class="col-md-12">
                            <div class="productDetailTable">
                                <table class="table" id="containerA">
                                    <thead class="table-light">
                                        <tr>
                                            <th># </th>
                                            <th>User </th>
                                            <th>Job Ref</th>
                                            <th>Customer</th>
                                            <th>Customer Ref </th>
                                            <th>Site Address</th>
                                            <th>Job Type</th>
                                            <th>App. Type</th>
                                            <th>Time </th>
                                            <th>Travel Time </th>
                                            <th>Appointment Time </th>
                                            <th>Total Time </th>
                                            <th>Actual </th>
                                            <th>Short Description </th>
                                            <th>Completed On </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="16">
                                                <label class="red_sorryText">
                                                    Sorry, no records to show
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>   <!-- End off main Table -->
                </div>
            </di>
        </div>
    </section>

@include('frontEnd.salesAndFinance.jobs.layout.footer')























</div><!-- End off main_wrappper -->

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="https://www.ville-pont-eveque.fr/tools/library/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="https://www.ville-pont-eveque.fr/tools/library/DataTables/extensions/Select/js/dataTables.select.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>