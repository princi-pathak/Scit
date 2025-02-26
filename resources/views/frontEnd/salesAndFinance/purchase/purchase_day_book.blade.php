@include('frontEnd.salesAndFinance.jobs.layout.header')



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


                        <div class="productDetailTable pt-3">
                            <table class="table tablechange mb-0" id="containerA">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Quote Ref </th>
                                        <th>Quote Date</th>
                                        <th>Customer Name</th>
                                        <th>Site / Delivery</th>
                                        <th>No. Quotes  </th>
                                        <th>Sub Total </th>
                                        <th>VAT</th>
                                        <th>Total  </th>
                                        <th>Deposit  </th>
                                        <th>Outstanding</th>
                                        <th>profit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>QU-0001</td>
                                        <td>2024-12-06</td>
                                        <td>Webnmob</td>
                                        <td>B-36 Sector 59</td>
                                        <td>1</td>
                                        <td>£220.00</td>
                                        <td>£44.00</td>
                                        <td>£264.00</td>
                                        <td>£0.00</td>
                                        <td>£264.00</td>
                                        <td>£120.00</td>
                                        <td>
                                            <div class="d-flex justify-content-end actionDropdown">
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu fade-up m-0">
                                                        <a href="#!" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#sendSMSQuoteModal">Send SMS</a>
                                                        <a href="#!" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#emailQuoteModal">Email</a>
                                                        <a href="#!" class="dropdown-item">Preview</a>
                                                        <a href="#!" class="dropdown-item">Print</a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>QU-0001</td>
                                        <td>2024-12-06</td>
                                        <td>Webnmob</td>
                                        <td>B-36 Sector 59</td>
                                        <td>1</td>
                                        <td>£220.00</td>
                                        <td>£44.00</td>
                                        <td>£264.00</td>
                                        <td>£0.00</td>
                                        <td>£264.00</td>
                                        <td>£120.00</td>
                                        <td>
                                            <div class="d-flex justify-content-end actionDropdown">
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu fade-up m-0" style="">
                                                        <a href="#" class="dropdown-item">Send SMS</a>
                                                        <a href="" class="dropdown-item">Preview</a>
                                                        <a href="" class="dropdown-item">Print</a>
                                                        <a href="" class="dropdown-item">Email</a>
                                             
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>QU-0001</td>
                                        <td>2024-12-06</td>
                                        <td>Webnmob</td>
                                        <td>B-36 Sector 59</td>
                                        <td>1</td>
                                        <td>£220.00</td>
                                        <td>£44.00</td>
                                        <td>£264.00</td>
                                        <td>£0.00</td>
                                        <td>£264.00</td>
                                        <td>£120.00</td>
                                        <td>
                                            <div class="d-flex justify-content-end actionDropdown">
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu fade-up m-0" style="">
                                                        <a href="#" class="dropdown-item">Send SMS</a>
                                                        <a href="" class="dropdown-item">Preview</a>
                                                        <a href="" class="dropdown-item">Print</a>
                                                        <a href="" class="dropdown-item">Email</a>
                                             
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>QU-0001</td>
                                        <td>2024-12-06</td>
                                        <td>Webnmob</td>
                                        <td>B-36 Sector 59</td>
                                        <td>1</td>
                                        <td>£220.00</td>
                                        <td>£44.00</td>
                                        <td>£264.00</td>
                                        <td>£0.00</td>
                                        <td>£264.00</td>
                                        <td>£120.00</td>
                                        <td>
                                            <div class="d-flex justify-content-end actionDropdown">
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu fade-up m-0" style="">
                                                        <a href="#" class="dropdown-item">Send SMS</a>
                                                        <a href="" class="dropdown-item">Preview</a>
                                                        <a href="" class="dropdown-item">Print</a>
                                                        <a href="" class="dropdown-item">Email</a>
                                             
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>QU-0001</td>
                                        <td>2024-12-06</td>
                                        <td>Webnmob</td>
                                        <td>B-36 Sector 59</td>
                                        <td>1</td>
                                        <td>£220.00</td>
                                        <td>£44.00</td>
                                        <td>£264.00</td>
                                        <td>£0.00</td>
                                        <td>£264.00</td>
                                        <td>£120.00</td>
                                        <td>
                                            <div class="d-flex justify-content-end actionDropdown">
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu fade-up m-0">
                                                        <a href="#" class="dropdown-item">Send SMS</a>
                                                        <a href="" class="dropdown-item">Preview</a>
                                                        <a href="" class="dropdown-item">Print</a>
                                                        <a href="" class="dropdown-item">Email</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6" rowspan="1">Page Sub Total</th>
                                            <th rowspan="1" colspan="1">£220.00</th>
                                            <th rowspan="1" colspan="1">£44.00</th>
                                            <th rowspan="1" colspan="1">£264.00</th>
                                            <th rowspan="1" colspan="1">£0.00</th>
                                            <th rowspan="1" colspan="1">£264.00</th>
                                            <th rowspan="1" colspan="1">£120.00</th>
                                            <th rowspan="1" colspan="1"></th>
                                        </tr>
                                    </tfoot>
                                </tbody>
                            </table>
                        </div>

                        <!-- <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
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
                        </table> -->

                    </div>   <!-- End off main Table -->
                </div>
            </di>
        </div>
    </section>

     <!-- ***************sendSMSQuoteModal******************* -->
     <div class="modal fade" id="sendSMSQuoteModal" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="sendSMSQuoteModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content add_Customer">
             <div class="modal-header">
                 <h5 class="modal-title fs-5" id="sendSMSQuoteModalLabel">
                     Email Quote - QU-0007</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body ">
                 <div class="contantbodypopup p-0">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="mb-2 row">
                               <label for="inputCity" class="col-sm-3 col-form-label">To<span class="radStar">*</span></label>
                               <div class="col-sm-9">
                                   <input type="text" class="form-control-plaintext editInput" id="" value="QU-0011" readonly="">
                               </div>
                           </div>
                           <div class="mb-2 row">
                               <label for="inputCity" class="col-sm-3 col-form-label">Cc</label>
                               <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext editInput" id="" value="Abhishekh" readonly="">
                               </div>
                           </div>
                           
                           <div class="mb-2 row">
                               <label for="inputCity" class="col-sm-3 col-form-label">Subject<span class="radStar">*</span></label>
                               <div class="col-sm-9">
                                   <select class="form-control editInput selectOptions">
                                       <option>Default Quote</option>
                                       <option>Default</option>
                                       <option>Default</option>
                                   </select>
                               </div>
                           </div>
                           <div class="mb-2 row">
                                <label for="inputCity" class="col-sm-3 col-form-label">Bcc </label>
                                <div class="col-sm-9">
                                <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3" placeholder="Type sms..."></textarea>
                                </div>
                            </div>
                        </div>
                           
                     </div>
                 </div>
             </div> <!-- end modal body -->
             <div class="modal-footer customer_Form_Popup">
                 <button type="button" class="btn profileDrop">Save</button>
                 <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Cancel</button>
             </div>
         </div>
     </div>
   </div>
   <!-- *******************End off sendSMSQuoteModal********************** -->
    <!-- ***************Email Quote - QU-0007******************* -->
    <div class="modal fade" id="emailQuoteModal" data-bs-backdrop="static"
      data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="emailQuoteModalModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content add_Customer">
              <div class="modal-header">
                  <h5 class="modal-title fs-5" id="emailQuoteModalModalLabel">
                      Email Quote - QU-0007</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
              </div>
              <div class="modal-body ">
                  <div class="contantbodypopup p-0">
                      <div class="">
                            <div class="mb-2 row">
                                <label for="inputCity" class="col-sm-2 col-form-label">To<span class="radStar">*</span></label>
                                <div class="col-sm-10">
                                    <input type="search" class="form-control editInput" id="inputName" placeholder="">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputCity" class="col-sm-2 col-form-label">Cc</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control editInput" id="inputName" placeholder="">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputCity" class="col-sm-2 col-form-label">Bcc </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control editInput" id="inputName" placeholder="">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputCity" class="col-sm-2 col-form-label">Subject<span class="radStar">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control editInput" id="inputName" placeholder="Your Quote from the Contractor - QU-0007">
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control editInput selectOptions">
                                        <option>Default Quote</option>
                                        <option>Default</option>
                                        <option>Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputCity" class="col-sm-2 col-form-label">Body<span class="radStar">*</span></label>
                                <div class="col-sm-10">
                                    <textarea cols="20" rows="4" id="textarea13">
                                        Arjun Kumar UI/UX Designer and Developer
                                      </textarea>
                                </div>
                            </div>
                      </div>
                  </div>
              </div> <!-- end modal body -->
              <div class="modal-footer customer_Form_Popup">
                  <button type="button" class="btn profileDrop">Send Quote</button>
                  <button type="button" class="btn profileDrop"
                      data-bs-dismiss="modal">Cancel</button>

              </div>
          </div>
      </div>
    </div>
    <!-- *******************End off Email Quote - QU-0007********************** -->
  


@include('frontEnd.salesAndFinance.jobs.layout.footer')