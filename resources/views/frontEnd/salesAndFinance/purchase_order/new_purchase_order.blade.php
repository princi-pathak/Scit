@include('frontEnd.salesAndFinance.jobs.layout.header')
<style>
    .currency {
    padding: 2px 3px 2px 5px;
    line-height: 17px;
    text-shadow: 0 1px 0 #ffffff;
    border: 1px solid #ccc;
    background-color: #efefef;
    margin-right: 5px;
}
.calendar_icon {
    color:red; 
    display: flex;
    align-items: center;
}
</style>
        <section class="main_section_page px-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 ">
                        <div class="pageTitle">
                            @if(isset($key) && $key !='')
                            <h3 class="header_text">Edit Purchase Order</h3>
                            @else
                            <h3 class="header_text">New Purchase Order</h3>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="alert alert-primary mt-1 mb-0 text-center" id="message_save" style="display:none"></div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4 px-3">
                    
                        <div class="pageTitleBtn">
                            <a href="javascript:void(0)" class="profileDrop" onclick="save_all_data()"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>

                        </div>
                    </div>
                </div>
                <form class="customerForm" id="all_data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="newJobForm">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="formDtail">
                                        <h4 class="contTitle">Supplier Details</h4>
                                       @csrf
                                        <input type="hidden" id="id" name="id" value="">
                                            <div class="mb-3 row">
                                                <label for="inputCustomer"
                                                    class="col-sm-3 col-form-label">Supplier<span
                                                    class="radStar">*</span></label>
                                                <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions" id="customer_id" name="customer_id"  onchange="get_customer_details()">
                                                    <option selected disabled>Select Supplier</option>
                                                    <?php foreach ($customers as $cust) { ?>
                                                        <option value="{{$cust->id}}">{{$cust->name}}</option>
                                                    <?php } ?>
                                                </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#customerPop">
                                                        <i class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                                <div class="col-sm-1" id="clock" style="display:none">
                                                    <a href="#!" class="formicon"><i class="fa-solid fa-clock"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputContact"
                                                    class="col-sm-3 col-form-label">Contact</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions"
                                                    id="contact_id" name="contact_id" <?php if(!isset($key) && $key ==''){echo 'disabled';}?>>
                                                        <option disabled>Select Supplier First</option>
                                                        @foreach($additional_contact as $addContact)
                                                            <option value="{{$addContact->id}}" <?php if(isset($job_details) && $job_details->contact_id == $addContact->id){echo 'selected';}?>>{{$addContact->contact_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(5)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Name<span
                                                class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" name="name" id="name" value="" placeholder="Enter Your Full Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Address<span
                                                    class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" id="address" name="address" rows="3" placeholder="Enter Your Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="city" name="city" value="" placeholder="Enter Your City">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCounty" class="col-sm-3 col-form-label">County</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="country" name="country" value="" placeholder="Enter Your County">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPincode"
                                                    class="col-sm-3 col-form-label">Postcode</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="pincode" name="pincode" value="" placeholder="Enter Your Postcode">
                                                </div>
                                            </div>
                                            <div class="mb-3 row field">
                                                <label for="inputTelephone"
                                                    class="col-sm-3 col-form-label">Telephone</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control editInput selectOptions">
                                                        @foreach($country as $Codeval)
                                                        <option value="{{$Codeval->id}}">+{{$Codeval->code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control editInput textareaInput" id="telephone" name="telephone" value="" placeholder="Enter Your Telephone">
                                                </div>
                                            </div>
                                            <div class="mb-3 row field">
                                                <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control editInput selectOptions">
                                                    @foreach($country as $Codeval)
                                                        <option value="{{$Codeval->id}}">+{{$Codeval->code}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control editInput textareaInput" id="contact" name="contact"  value="" placeholder="Enter Your Mobile No.">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="email" name="email" value="" placeholder="Enter Your Email">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="formDtail">
                                        <h4 class="contTitle">Customer / Delivery Details</h4>
                                        <!-- <form class="customerForm"> -->
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Customer</label>
                                                <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions get_site_result"
                                                <?php if(!isset($key) && $key ==''){echo 'disabled';}?> id="site_id" name="site_id">
                                                    <option selected disabled>Select Customer</option>
                                                    <?php foreach ($customers as $cust) { ?>
                                                        <option value="{{$cust->id}}">{{$cust->name}}</option>
                                                    <?php } ?>
                                                </select>
                                                    <!-- <input type="text"  id="staticEmail"> -->
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(6)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputProject"
                                                    class="col-sm-3 col-form-label">Project</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions" id="project_id" name="project_id" disabled>
                                                        <option selected disabled></option>
                                                        @foreach($projects as $project)
                                                            <option value="{{$project->id}}">{{$project->project_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(4)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Site</label>
                                                <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions get_site_result" disabled id="site_id" name="site_id">
                                                    <option selected>None</option>
                                                    @foreach($site as $siteVal)
                                                        <option value="{{$siteVal->id}}">{{$siteVal->site_name}}</option>
                                                    @endforeach
                                                </select>
                                                    <!-- <input type="text"  id="staticEmail"> -->
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(6)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>



                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputContact"
                                                    class="col-sm-3 col-form-label">Name<span class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="company" id="company" class="form-control editInput textareaInput" value="" placeholder="Enter Your Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputContact"
                                                    class="col-sm-3 col-form-label">Company</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="company" id="company" class="form-control editInput textareaInput" value="" placeholder="Enter Comapny Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Address<span class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" id="address" name="address" rows="3" placeholder="Enter Your Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control-plaintext editInput textareaInput"
                                                id="profession_name" value="" placeholder="Enter Your City">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">County</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="conatact_name" name="conatact_name" value="" placeholder="Enter Your County">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputEmail" class="col-sm-3 col-form-label">Postcode</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput" id="site_email" name="site_email" value="" placeholder="Enter Your Postcode">
                                                </div>
                                            </div>
                                            <div class="mb-3 row field">
                                            <label for="inputTelephone"
                                                class="col-sm-3 col-form-label">Telephone</label>
                                            <div class="col-sm-3">
                                                <select class="form-control editInput selectOptions" >
                                                @foreach($country as $Codeval)
                                                    <option value="{{$Codeval->id}}">+{{$Codeval->code}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control editInput textareaInput" id="site_telephone" name="site_telephone" value="" placeholder="Enter Your Telephone">
                                            </div>
                                        </div>
                                        <div class="mb-3 row field">
                                            <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                            <div class="col-sm-3">
                                                <select class="form-control editInput selectOptions">
                                                @foreach($country as $Codeval)
                                                    <option value="{{$Codeval->id}}">+{{$Codeval->code}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control editInput textareaInput" id="site_mobile" name="site_mobile" value="" placeholder="Enter Your Mobile No.">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputAddress"
                                                class="col-sm-6 col-form-label">Expected Delivery On</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control editInput textareaInput" id="site_mobile" name="site_mobile" value="">
                                            </div>
                                            <div class="col-sm-2 calendar_icon">
                                                <i class="fa fa-calendar-alt"></i>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <div class="formDtail">
                                        <h4 class="contTitle">Purchase Order Details</h4>
                                        <!-- <form class="customerForm"> -->
                                            <div class="mb-3 row">
                                                <label for="inputJobRef" class="col-sm-4 col-form-label">Purchase Order Ref.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext editInput"
                                                        id="inputJobRef" value="Auto generate" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputJobType" class="col-sm-3 col-form-label">Department</label>
                                                <div class="col-sm-7">
                                                <select class="form-control editInput selectOptions" id="job_type" name="job_type">
                                                    <option selected disabled>Please Select</option>
                                                    <?php foreach ($job_type as $type) { ?>
                                                        <option value="{{$type->id}}" >{{$type->name}}</option>
                                                    <?php } ?>
                                                </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(7)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputTelephone" class="col-sm-6 col-form-label">Purchase Date<span class="radStar">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control editInput"
                                                    id="start_date" name="start_date" value="">
                                                </div>
                                                <div class="col-sm-2 calendar_icon">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Reference</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                    id="customer_ref" name="customer_ref" placeholder="Reference(if any)" value="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputCustomer" class="col-sm-3 col-form-label">Quote Ref</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                    id="cust_job_ref" name="cust_job_ref" placeholder="Quote, if any" value="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPurchase" class="col-sm-3 col-form-label">Job Ref</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                    id="purchase_order_ref" name="purchase_order_ref" placeholder="Job Ref, if any" value="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPurchase" class="col-sm-3 col-form-label">Invoice Ref</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput textareaInput"
                                                    id="purchase_order_ref" name="purchase_order_ref" placeholder="Invoice Ref, if any" value="">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                    <label class="col-sm-3 col-form-label">Payment Terms</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control editInput selectOptions"
                                                            id="payment_terms" name="payment_terms">
                                                            <option value="21">Default (21)
                                                            </option>
                                                            <?php for($i=1;$i<21;$i++){?>
                                                            <option value="{{$i}}">{{$i}}</option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="form-check-label checkboxtext" for="checkalrt">
                                                            days</label>
                                                    </div>

                                                </div>
                                            <div class="mb-3 row">
                                                <label for="inputTelephone" class="col-sm-6 col-form-label">Payment Due Date</label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control editInput"
                                                    id="start_date" name="start_date" value="">
                                                </div>
                                                <div class="col-sm-2 calendar_icon">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputPriority"
                                                    class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                <select class="form-control editInput selectOptions"
                                                    id="priorty" name="priorty">
                                                    <option selected disabled>None</option>
                                                    <option value="1">Normal</option>
                                                    <option value="2">Medium</option>
                                                </select>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputCountry" class="col-sm-3 col-form-label">Tags</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions" id="tags" name="tags">
                                                        <option selected disabled>None</option>
                                                        @foreach($tag as $tagval)
                                                            <option value="{{$tagval->id}}">{{$tagval->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon"><i
                                                            class="fa-solid fa-square-plus" data-bs-toggle="modal" data-bs-target="#TagModal"></i></a>
                                                </div>
                                            </div>

                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>

                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Product Details</label>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="mb-3 row">
                                        <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control editInput textareaInput" id="search_value"
                                                placeholder="Type to add product" onkeyup="get_search()">
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="plusandText">
                                                <a href="javascript:void(0)" class="formicon" onclick="get_modal(8)"><i class="fa-solid fa-square-plus"></i>
                                                </a>
                                                <span class="afterPlusText"> (Type to view product or <a href="Javascript:void(0)" onclick="show_product_model()">Click
                                                        here</a> to view all assets)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="pageTitleBtn p-0">
                                        <a href="#" class="profileDrop">Add Title</a>
                                        <!-- <a href="#" class="profileDrop">Show Variations</a>
                                        <a href="#" class="profileDrop bg-secondary">Export</a> -->

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="productDetailTable">
                                        <table class="table" id="result">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Job </th>
                                                    <th>Product </th>
                                                    <th>Code</th>
                                                    <th>Description </th>
                                                    <th>Account Code <a href="javascript:void(0)" class="formicon" onclick="get_modal(8)"><i class="fa-solid fa-square-plus"></i>
                                                    </a> </th>
                                                    <th>QTY</th>
                                                    <th>Price VAT(%) <a href="javascript:void(0)" class="formicon" onclick="get_modal(8)"><i class="fa-solid fa-square-plus"></i>
                                                    </a></th>
                                                    <th>VAT </th>
                                                    <th>Amount</th>
                                                    <th>Delivered QTY</th>
                                                    <th>Quantity Available</th>
                                                </tr>
                                            </thead>
                                            <tbody id="product_result">
                                                <?php $previous_ids=array();?>
                                                    <tr>
                                                        <td> </td>
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
                                            <!-- <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>0.00</td>
                                                    <td>£0.00</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>£0.00</td>
                                                    <td></td>
                                                </tr> -->
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Notes</label>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="">
                                        <h4 class="contTitle text-start">Supplier Notes</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" id="customer_notes" name="customer_notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="">
                                        <h4 class="contTitle text-start">Delivery Notes</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" id="deliver_notes" name="deliver_notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="">
                                        <h4 class="contTitle text-start">Internal Notes</h4>
                                        <div class="mt-3">
                                            <textarea cols="40" rows="5" id="internal_notes" name="internal_notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="newJobForm mt-4">
                            <label class="upperlineTitle">Attachments</label>
                            <div class="row">
                            <div class="col-sm-12">

                                <div class="py-4">
                                    <div class="jobsection">
                                        <input type="file" id="attachments" name="attachments" class="profileDrop">Upload Attachments
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="newJobForm mt-4">
                                <label class="upperlineTitle">Tasks</label>
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" onclick="get_modal(6)" class="profileDrop">New Task</a>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" onclick="get_modal(6)" class="profileDrop">Tasks</a>
                                            <a href="javascript:void(0)" onclick="get_modal(6)" class="profileDrop">Recurring Tasks</a>

                                        </div>
                                    </div>

                                    <!-- <div class="col-sm-12">
                                        <div class="productDetailTable">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Full Name </th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Telephone </th>
                                                        <th>Last Login </th>
                                                        <th>Status </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="login_result"></tbody>
                                            </table>
                                        </div>
                                    </div> -->
                                    
                                </div>
                            </div>

                    </div>
                </div>
            </form>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-4 ">
                        <div class="pageTitle">
                            
                            <!-- <h3 class="header_text">New Jobs</h3> -->
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                        <div class="pageTitleBtn">
                            <a href="javascript:void(0)" class="profileDrop" onclick="save_all_data()"><i class="fa-solid fa-floppy-disk" ></i> Save</a>
                            <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                            <div class="pageTitleBtn p-0">
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
                                    <div class="dropdown-menu fade-up m-0 d-none">
                                        <a href="http://localhost/socialcareitsolution/job_edit?key=MQ==" class="dropdown-item col-form-label">Edit</a>
                                        <!-- <hr class="dropdown-divider"> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- start Customer popup-->
        <div class="modal fade" id="customerPop" tabindex="-1" aria-labelledby="customerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content add_Customer">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customerModalLabel">Add
                                Customer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="formDtail">
                                        <form action="" class="customerForm">
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Customer
                                                    Name <span class="radStar ">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_name">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputCustomer"
                                                    class="col-sm-3 col-form-label">Customer
                                                    Type <span class="radStar ">*</span></label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions get_customer_result"
                                                        id="customer_type_id">
                                                        <option selected disabled>None</option>
                                                        <?php foreach($customer_types as $cust_type){?>
                                                            <option value="{{$cust_type->id}}">{{$cust_type->title}}</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(1)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div><!-- End off Customer -->

                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Contact
                                                    Name <span class="radStar ">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_contact_name">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputProject" class="col-sm-3 col-form-label">Job
                                                    Title (Position)</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control editInput selectOptions get_job_title_result"
                                                        id="customer_job_titile_id">
                                                        <option selected disabled>Please Select
                                                        </option>
                                                        <?php foreach($job_title as $val_title){?>
                                                            <option value="{{$val_title->id}}">{{$val_title->name}}</option>
                                                            <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(2)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_email">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputTelephone"
                                                    class="col-sm-3 col-form-label">Telephone</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_phone">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputMobile"
                                                    class="col-sm-3 col-form-label">Mobile</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_mobile">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Fax</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_fax">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputCity"
                                                    class="col-sm-3 col-form-label">Website</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_website">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputProject"
                                                    class="col-sm-3 col-form-label">Payment
                                                    Terms</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions"
                                                        id="customer_payment_terms">
                                                        <option value="21">Defoult (21)
                                                        </option>
                                                        <?php for($i=1;$i<21;$i++){?>
                                                        <option value="{{$i}}">{{$i}}</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <span class="afterInputText">
                                                        Days
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputProject"
                                                    class="col-sm-3 col-form-label">Currency</label>
                                                    <div class="col-sm-9">
                                                    <!-- British Pound - GBP -->
                                                        <select class="form-control editInput selectOptions" id="customer_currency_id">
                                                            <option selected disabled>Please Select</option>
                                                            <?php foreach($country as $countryItem): ?>
                                                                <?php foreach($countryItem->currencies as $currency): ?>
                                                                    <option value="<?php echo $currency->currency_code; ?>">
                                                                        <?php echo $countryItem->name; ?> (<?php echo $currency->currency_code; ?>)
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                
                                            </div>


                                            <div class="mb-2 row">
                                                <label for="inputCounty" class="col-sm-3 col-form-label">Credit
                                                    Limit</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_credit_limit">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputPincode"
                                                    class="col-sm-3 col-form-label">Discount</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_discount">
                                                </div>
                                                
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputProject" class="col-sm-3 col-form-label">Discount Type</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control editInput selectOptions" id="customer_percentage">
                                                            <option selected disabled>Please Select</option>
                                                            <option value="1">Percentage</option>
                                                            <option value="2">Flat</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            
                                            
                                            <div class="mb-2 row">
                                                <label for="inputCountry" class="col-sm-3 col-form-label">VAT
                                                    / Tax No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_vat">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputProject"
                                                    class="col-sm-3 col-form-label">Default Catalogue</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="customer_catalogue">
                                                        <option>None</option>
                                                        <option>ABCD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputProject"
                                                    class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="customer_status">
                                                        <option value='1'>Active</option>
                                                        <option value='0'>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="formDtail">
                                        <form action="" class="">
                                            <div class="mb-2 row">
                                                <label for="inputProject"
                                                    class="col-sm-3 col-form-label">Region</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions get_region_result"
                                                        id="customer_region">
                                                        <option>None</option>
                                                        <?php foreach($region as $region_val){?>
                                                            <option value="{{$region_val->id}}">{{$region_val->title}}</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" id="openPopupButton" onclick="get_modal(3)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>


                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" id="cuatomer_address" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCity"
                                                    class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_city">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputCounty"
                                                    class="col-sm-3 col-form-label">County</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_country_input">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputPincode"
                                                    class="col-sm-3 col-form-label">Pincode</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_pincode">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCountry"
                                                    class="col-sm-3 col-form-label">Country</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="customer_country_id">
                                                        <option selected disabled>Select Coutry</option>
                                                        <?php foreach($country as $countryval){?>
                                                        <option value="{{$countryval->code}}">{{$countryval->name}} ({{$countryval->code}})</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputAddress" class="col-sm-3 col-form-label">Site
                                                    Notes</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" rows="3" id="customer_site_note"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Sage
                                                    Ref.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="customer_sage_ref" >
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Assign
                                                    Products</label>
                                                <div class="col-sm-9">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="customer_yes" checked>
                                                        <label class="form-check-label checkboxtext"
                                                            for="inlineRadio1">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="custoemr_no">
                                                        <label class="form-check-label checkboxtext"
                                                            for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Notes</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" rows="3" id="customer_note"></textarea>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div> <!-- End row -->
                        </div>
                        <div class="modal-footer customer_Form_Popup">

                            <button type="button" class="profileDrop" onclick="save_customer()">Save</button>
                            <button type="button" class="profileDrop" onclick="save_customerClose()">Save &
                                Close</button>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End off Customer popup -->
             <!-- Modal Start here -->
            <div class="modal fade" id="product_model" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel">Product</h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Category</th>
                                                <th>Product</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search_result">
                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="display:flex;justify-content: end;">
                                <button class="btn btn-primary" onclick="get_data_product()">Choose</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end here -->
<!-- Customer type add Modal -->
<div class="modal fade" id="cutomer_type_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="thirdModalLabel">Add Customer Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="customer_type_form">
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Customer Type <span class="radStar ">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="customer_type_name" class="form-control editInput" id="customer_type_name" value="" placeholder="Customer Type">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select id="customer_type_status" name="customer_type_status" class="form-control editInput">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_customer_type()"> Save</a>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end here -->
    
      
       <!-- Project Modal start here -->
       <div class="modal fade" id="project_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="thirdModalLabel">Add Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="project_form">
                        <div class="row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Project Ref</label>
                            <div class="col-sm-9">
                                <p class="editInput mb-0">Project Ref ###</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Customer</label>
                            <div class="col-sm-9">
                            <p id="project_customer_name" class="editInput mb-0"><?php if(isset($contact_name)){echo $contact_name;}?></p>
                            </div>
                        </div>
                        <input type="hidden" id="project_customer_id" value="<?php if(isset($job_details) && $job_details !=''){echo $job_details->customer_id;}?>">
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Project Name <span class="radStar ">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control editInput" value="" id="project_name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Start Date <span class="radStar ">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control editInput"  id="project_start_date">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">End Date <span class="radStar ">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control editInput" id="project_end_date">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Project Value </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control editInput" id="project_value">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="project_description" id="project_description" class="form-control editInput"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select id="project_status" name="project_status" class="form-control editInput">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_project()"> Save</a>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
       <!-- end here -->
        <!-- Contact Modal start here -->
        <div class="modal fade" id="contact_modal" tabindex="-1" aria-labelledby="customerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content add_Customer">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customerModalLabel">Add Customer Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="formDtail">
                                        <form id="contact_form">
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Customer</label>
                                                <div class="col-sm-9">
                                                    <p id="contact_customer_name"><?php if(isset($contact_name)){echo $contact_name;}?></p>
                                                </div>
                                            </div>
                                            <input type="hidden" id="contact_customer_id" value="<?php if(isset($job_details) && $job_details !=''){echo $job_details->customer_id;}?>">
                                            
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Assign
                                                    Products</label>
                                                <div class="col-sm-9">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="contact_radio" id="contact_default_yes">
                                                        <label class="form-check-label checkboxtext"
                                                            for="inlineRadio1">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="contact_radio" id="contact_default_no" checked>
                                                        <label class="form-check-label checkboxtext"
                                                            for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Contact
                                                    Name <span class="radStar ">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="contact_contact_name">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputProject" class="col-sm-3 col-form-label">Job
                                                    Title (Position)</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control editInput selectOptions get_job_title_result"
                                                        id="contact_job_titile_id">
                                                        <option selected disabled>Please Select
                                                        </option>
                                                        <?php foreach($job_title as $con_val_title){?>
                                                            <option value="{{$con_val_title->id}}">{{$con_val_title->name}}</option>
                                                            <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(2)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="contact_email">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputTelephone"
                                                    class="col-sm-3 col-form-label">Telephone</label>
                                                    <div class="col-sm-2">
                                                    <select class="form-control editInput selectOptions">
                                                        <option>+444</option>
                                                        <option>+91</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control editInput"
                                                        id="contact_phone">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputMobile"
                                                    class="col-sm-3 col-form-label">Mobile</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control editInput selectOptions">
                                                            <option>+444</option>
                                                            <option>+91</option>
                                                        </select>
                                                    </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control editInput"
                                                        id="contact_mobile">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Fax</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="contact_fax">
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="formDtail">
                                        <form action="" class="">
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label">Address Details</label>
                                            <div class="col-sm-9">

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="contact_default_address" onchange="default_address()">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="mb-2 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Address <span class="radStar ">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" id="contact_address" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCity"
                                                    class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="contact_city">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputCounty"
                                                    class="col-sm-3 col-form-label">County</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="contact_country_input">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputPincode"
                                                    class="col-sm-3 col-form-label">Pincode</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="contact_pincode">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCountry"
                                                    class="col-sm-3 col-form-label">Country</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="contact_country_id">
                                                        <option selected disabled>Select Coutry</option>
                                                        <?php foreach($country as $countryval){?>
                                                        <option value="{{$countryval->id}}" class="contact_country_id">{{$countryval->name}} ({{$countryval->code}})</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- End row -->

                        </div>
                        <div class="modal-footer customer_Form_Popup">

                            <button type="button" class="profileDrop" onclick="save_contact()">Save</button>
                            <button type="button" class="profileDrop" onclick="save_contactClose()">Save &
                                Close</button>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- end here -->
         <!-- Add Product Modal start here -->
         <div class="modal fade" id="add_product_modal" tabindex="-1" aria-labelledby="customerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content add_Customer">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customerModalLabel">Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form id="add_product_form">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="formDtail">
                                       
                                       @csrf
                                        <div class="mb-2 row">
                                            <label class="col-sm-3 col-form-label" for="inlineRadio1">This Customer Only</label>
                                            <div class="col-sm-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="product_yes" id="product_yes" value="0">
                                                    <label class="col-form-label" for="inlineRadio1">Yes, display only for this customer</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                                <label for="inputProject" class="col-sm-3 col-form-label">Product Category</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions get_product_category_result"
                                                        id="product_category_id" name="product_category_id">
                                                        <option selected disabled>Please Select
                                                        </option>
                                                        <?php foreach($category as $val){?>
                                                            <option value="{{$val->id}}">{{ $val->full_category }}</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(9)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                        </div>
                                            
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Product Name <span class="radStar ">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="product_name" name="product_name">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputProject" class="col-sm-3 col-form-label">Product Type</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions "
                                                        id="product_type_id" name="product_type_id">
                                                       
                                                            <option value="1">Product</option>
                                                            
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Product Code</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control editInput"
                                                        id="product_postal_code" name="product_postal_code">
                                                </div>
                                                <div class="col-sm-5">
                                                    <a href="javascript:void(0)" class="profileDrop" id="generate_code" onclick="generate_code()">Generate</a>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Cost Price</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="product_cost_price" name="product_cost_price">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Markup</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="product_markup" name="product_markup">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Price<span class="radStar ">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="product_price" name="product_price">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" id="product_description" name="product_description" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-sm-3 col-form-label">Show on Template</label>
                                                <div class="col-sm-9">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="showontemplate" id="showontemplate" checked value="1">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="formDtail">
                                        <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Bar Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="bar_code" name="bar_code">
                                                </div>
                                            </div>
                                            
                                            <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-3 col-form-label">Sales Tax Rate</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions get_product_sales_tax_result"
                                                            id="sales_tax_rate" name="sales_tax_rate">
                                                            <option selected disabled>Please Select
                                                            </option>
                                                            <?php foreach($sales_tax as $tax1){?>
                                                                <option value="{{$tax1->id}}">{{$tax1->name}}</option>
                                                                <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a href="javascript:void(0)" class="formicon" onclick="get_modal(10)"><i
                                                                class="fa-solid fa-square-plus"></i></a>
                                                    </div>
                                            </div>
                                            <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-3 col-form-label">Purchase Tax Rate</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions get_product_sales_tax_result"
                                                            id="purchase_tax_rate" name="purchase_tax_rate">
                                                            <option selected disabled>Please Select
                                                            </option>
                                                            <?php foreach($sales_tax as $tax2){?>
                                                                <option value="{{$tax2->id}}">{{$tax2->name}}</option>
                                                                <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a href="javascript:void(0)" class="formicon" onclick="get_modal(10)"><i
                                                                class="fa-solid fa-square-plus"></i></a>
                                                    </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Nominal Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="nominal_code" name="nominal_code">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-3 col-form-label">Sales Account Code</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions"
                                                            id="sales_account_code" name="sales_account_code">
                                                            <option selected disabled>Please Select
                                                            </option>
                                                            <?php foreach($account_code as $acc_code1){?>
                                                                <option value="{{$acc_code1->id}}">{{$acc_code1->name}}</option>
                                                                <?php }?>
                                                        </select>
                                                    </div>
                                                    
                                            </div>
                                            <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-3 col-form-label">Purchase Account Code</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions"
                                                            id="purchase_account_code" name="purchase_account_code">
                                                            <option selected disabled>Please Select
                                                            </option>
                                                            <?php foreach($account_code as $acc_code2){?>
                                                                <option value="{{$acc_code2->id}}">{{$acc_code2->name}}</option>
                                                                <?php }?>
                                                        </select>
                                                    </div>
                                                   
                                            </div>
                                            <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-3 col-form-label">Expense Account Code</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions "
                                                            id="expense_account_code" name="expense_account_code">
                                                            <option selected disabled>Please Select
                                                            </option>
                                                            <?php foreach($account_code as $acc_code3){?>
                                                                <option value="{{$acc_code3->id}}">{{$acc_code3->name}}</option>
                                                                <?php }?>
                                                        </select>
                                                    </div>
                                                    
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Location</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="product_location" name="product_location">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCountry"
                                                    class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="product_status" name="product_status">
                                                        <option value="1">Active</option>
                                                        <option value="0">In-Active</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Attachment</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control editInput"
                                                        id="product_attachments" name="product_attachments">
                                                </div>
                                            </div>
                                            <div class="mb-2 row productDetailTable">
                                                <table class="table">
                                                    <thead class="table-light">
                                                        <th>Supplier</th>
                                                        <th>Part Number</th>
                                                        <th>Cost Price</th>
                                                        
                                                        <th>
                                                            <div class="col-sm-2">
                                                                <a href="#!" class="formicon" onclick="suplier_row()"><i
                                                                        class="fa-solid fa-square-plus"></i></a>
                                                            </div>
                                                        </th>
                                                    </thead>
                                                    <tbody id="supplier_result">
                                                    <!-- <tr>
                                                        <td>
                                                            <select id="supplier_id" name="supplier_id[]" class="form-control">
                                                                <option selected disabled>Select Supplier</option>
                                                                
                                                                    <option value="1">Ram</option>
                                                                    <option value="2">Deena</option>
                                                                    <option value="3">Harsh</option>
                                                                    
                                                            </select>
                                                        </td>
                                                        <td><input type="text" id="part_number" class="" name="part_number[]" value=""></td>
                                                        <td><span class="currency">£</span><input type="text" id="cost_price_supplier" class="" name="cost_price_supplier[]" value=""></td>
                                                        <td class="delete_row">X</td>
                                                    </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div> <!-- End row -->
                            </form>
                        </div>
                        <div class="modal-footer customer_Form_Popup">

                            <button type="button" class="profileDrop" onclick="save_product()">Save</button>
                            <button type="button" class="profileDrop" onclick="save_productClose()">Save &
                                Close</button>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
         <!-- end here -->
          <!-- Product Category Modal Start here -->
          <div class="modal fade" id="product_category_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content add_Customer">
                    <div class="modal-header">
                        <h5 class="modal-title" id="thirdModalLabel">Product Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="product_category_form">
                            <div class="mb-3 row">
                                <label for="inputJobRef" class="col-sm-3 col-form-label">Product Category<span class="radStar ">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="product_category_name" class="form-control editInput" id="product_category_name" value="">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputProject" class="col-sm-3 col-form-label">Product Category</label>
                                <div class="col-sm-7">
                                    <select class="form-control editInput selectOptions "
                                        id="parent_category_id">
                                        <option selected disabled></option>
                                        <?php foreach($category as $val){?>
                                            <option value="{{$val->id}}">{{ $val->full_category }}</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select id="product_category_status" name="product_category_status" class="form-control editInput">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pageTitleBtn">
                                <a href="javascript:void(0)" class="profileDrop p-2 crmNewBtn" onclick="save_product_category()"> Save</a>
                                <a href="javascript:void(0)" class="profileDrop p-2 crmNewBtn" onclick="save_productClose_category()"> Save & Close</a>
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

           <!-- end here -->
        <!-- Tax Modal start here -->
        <div class="modal fade" id="product_tax_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content add_Customer">
                    <div class="modal-header">
                        <h5 class="modal-title" id="thirdModalLabel">Add Tax Rate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="product_tax_form">
                            <div class="mb-3 row">
                                <label for="inputJobRef" class="col-sm-3 col-form-label">Tax Rate Name<span class="radStar ">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tax_rate_name" class="form-control editInput" id="tax_rate_name" value="">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputProject" class="col-sm-3 col-form-label">Tax Rate<span class="radStar ">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tax_rate" class="form-control editInput" id="tax_rate" value="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select id="tax_status" name="tax_status" class="form-control editInput">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputProject" class="col-sm-3 col-form-label">External Tax Code</label>
                                <div class="col-sm-9">
                                    <input type="text" name="external_tax_code" class="form-control editInput" id="external_tax_code">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputProject" class="col-sm-3 col-form-label">Expiry Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="expiry_date" class="form-control editInput" id="expiry_date">
                                </div>
                            </div>
                            <div class="pageTitleBtn">
                                <a href="javascript:void(0)" class="profileDrop p-2 crmNewBtn" onclick="save_tax_rate()"> Save</a>
                                <a href="javascript:void(0)" class="profileDrop p-2 crmNewBtn" onclick="save_taxClose_rate()"> Save & Close</a>
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end here -->
         <!-- Site Modal start here -->
         <div class="modal fade" id="site_modal" tabindex="-1" aria-labelledby="customerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content add_Customer">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customerModalLabel">Add Site Address</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="formDtail">
                                        <form id="site_form">
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Customer</label>
                                                <div class="col-sm-9">
                                                    <p id="site_customer_name"><?php if(isset($contact_name)){echo $contact_name;}?></p>
                                                </div>
                                            </div>
                                            <input type="hidden" id="site_customer_id" value="<?php if(isset($job_details) && $job_details !=''){echo $job_details->customer_id;}?>">
                                            
                                            

                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Site
                                                    Name <span class="radStar ">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_name">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Contact
                                                    Name <span class="radStar ">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_contact_name">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputProject" class="col-sm-3 col-form-label">Job
                                                    Title (Position)</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control editInput selectOptions get_job_title_result"
                                                        id="site_job_titile_id">
                                                        <option selected disabled>Please Select
                                                        </option>
                                                        <?php foreach($job_title as $site_val_title){?>
                                                            <option value="{{$site_val_title->id}}">{{$site_val_title->name}}</option>
                                                            <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(2)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Company
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_company_name">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputEmail"
                                                    class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_email">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputTelephone"
                                                    class="col-sm-3 col-form-label">Telephone</label>
                                                    <div class="col-sm-2">
                                                    <select class="form-control editInput selectOptions">
                                                        <option>+444</option>
                                                        <option>+91</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_phone">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputMobile"
                                                    class="col-sm-3 col-form-label">Mobile</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control editInput selectOptions">
                                                            <option>+444</option>
                                                            <option>+91</option>
                                                        </select>
                                                    </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_mobile">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Fax</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_fax">
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="formDtail">
                                        <form action="" class="">
                                            <div class="mb-2 row">
                                                <label for="inputProject"
                                                    class="col-sm-3 col-form-label">Region</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions get_region_result"
                                                        id="site_region">
                                                        <option selected disabled>None</option>
                                                        <?php foreach($region as $siteregion_val){?>
                                                            <option value="{{$siteregion_val->id}}">{{$siteregion_val->name}}</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" id="openPopupButton" onclick="get_modal(3)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Address <span class="radStar ">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" id="site_address" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCity"
                                                    class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_city">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputCounty"
                                                    class="col-sm-3 col-form-label">County</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_country_input">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputPincode"
                                                    class="col-sm-3 col-form-label">Pincode</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput"
                                                        id="site_pincode">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCountry"
                                                    class="col-sm-3 col-form-label">Country</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="site_modal_country_id">
                                                        <option selected disabled>Select Coutry</option>
                                                        <?php foreach($country as $sitecountryval){?>
                                                        <option value="{{$sitecountryval->id}}" class="site_modal_country_id">{{$sitecountryval->name}} ({{$sitecountryval->code}})</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputCountry"
                                                    class="col-sm-3 col-form-label">Default Catalogue</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions"
                                                        id="site_catalogue_id">
                                                        <option selected disabled>None</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="mb-2 row">
                                        <label for="inputCountry"
                                            class="col-sm-3 col-form-label">Default Catalogue</label>
                                        <div class="col-sm-12">
                                            <textarea name="" id="site_notes" class="form-control" rows="10" cols="15"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End row -->

                        </div>
                        <div class="modal-footer customer_Form_Popup">

                            <button type="button" class="profileDrop" onclick="save_site()">Save</button>
                            <button type="button" class="profileDrop" onclick="save_siteClose()">Save &
                                Close</button>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
         <!-- end here -->
          <!-- Job Type Modal start here -->
          <div class="modal fade" id="job_type_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content add_Customer">
                    <div class="modal-header">
                        <h5 class="modal-title" id="thirdModalLabel">Add Job Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="job_type_form">
                            <div class="mb-3 row">
                                <label for="inputJobRef" class="col-sm-3 col-form-label">Job Type <span class="radStar ">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="job_type_name" class="form-control editInput" id="job_type_name" value="" placeholder="Job Type">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputJobRef" class="col-sm-3 col-form-label">Number of Days</label>
                                <div class="col-sm-9">
                                    <input type="text" name="no_of_days" class="form-control editInput" id="no_of_days" value="14">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputJobRef" class="col-sm-3 col-form-label">Customer Visible</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" name="customer_visible" class="" id="customer_visible" checked> Yes, visible to customer
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputJobRef" class="col-sm-3 col-form-label">Appointment Type</label>
                                <div class="col-sm-9">
                                    <select id="Job_appointment_type" name="Job_appointment_type" class="form-control editInput">
                                        <?php foreach($appointment_type as $job_app){?>
                                            <option value="{{$job_app->id}}">{{$job_app->name}}</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select id="job_type_status" name="Job_type_status" class="form-control editInput">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pageTitleBtn">
                                <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_job_type()"> Save</a>
                                <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_close_job_type()"> Save & Close</a>
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
          <!-- end here -->
          <!-- Region Modal start here -->
      <div class="modal fade" id="region_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="thirdModalLabel">Add Region</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="region_form">
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Region <span class="radStar ">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="region_name" class="form-control editInput" id="region_name" value="" placeholder="Region">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select id="region_status" name="region_status" class="form-control editInput">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_region()"> Save</a>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <!-- end here -->
          <!-- Job title Modal start -->
     <div class="modal fade" id="job_title_modal" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="thirdModalLabel">Job Title - Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="job_title_form">
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Job Title <span class="radStar ">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="job_title_name" class="form-control editInput" id="job_title_name" value="" placeholder="Job Title">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select id="job_title_status" name="job_title_status" class="form-control editInput">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="pageTitleBtn">
                            <a href="#" class="profileDrop p-2 crmNewBtn" onclick="save_job_title()"> Save</a>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- end here -->
      <!--  Modal start here -->
      <div class="modal fade" id="TagModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Tag - Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="alert alert-success text-center success_message" style="display:none;height:50px">
                        <p id="message"></p>
                    </div>
                    <div class="alert alert-danger text-center error_message" style="display:none;height:50px">
                        <p id="error_message"></p>
                    </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="formDtail">
                                <form id="form_data" class="customerForm">
                                    <div class="mb-2 row">

                                        <label for="inputName" class="col-sm-3 col-form-label">Tag<span class="radStar ">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput"
                                                id="Tagname" name="Tagname" value="">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="inputProject"
                                            class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions"
                                                id="TagStatus" name="TagStatus">
                                                <option value="1" >Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- End row -->
                </div>
                <div class="modal-footer customer_Form_Popup">

                    <button type="button" class="profileDrop" id="save_data">Save</button>
                    <!-- <button type="button" class="profileDrop" id="save_dataClose">Save &
                        Close</button> -->
                    <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end here -->


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js"></script>
<script>


        //Text Editer

var editor_config = {
  toolbar: [
      {name: 'basicstyles', items: ['Bold','Italic','Underline','Strike','-','RemoveFormat']},
      {name: 'format', items: ['Format']},
      {name: 'paragraph', items: ['Indent','Outdent','-','BulletedList','NumberedList']},
      {name: 'link', items: ['Link','Unlink']},
{name: 'undo', items: ['Undo','Redo']}
  ],
};

CKEDITOR.replace('deliver_notes', editor_config );
CKEDITOR.replace('customer_notes', editor_config );
CKEDITOR.replace('internal_notes', editor_config );
//Text Editer




const openPopupButton = document.getElementById('openPopupButton');
	const popup = document.getElementById('popup');
	const closePopup = document.getElementById('closePopup');

	openPopupButton.addEventListener('click', () => {
	  popup.style.display = 'block';
	  setTimeout(() => {
	    popup.style.opacity = '1';
	  }, 50); // Delay added for transition effect
	});

	closePopup.addEventListener('click', () => {
	  popup.style.opacity = '0';
	  setTimeout(() => {
	    popup.style.display = 'none';
	  }, 300); // Ensure the popup is hidden after the transition ends
	});

     </script>
<script>
    function get_customer_details() {
        var customer_id = $("#customer_id").val();
        var token = '<?php echo csrf_token(); ?>'
        $.ajax({
            type: "POST",
            url: "{{url('get_customer_details_front')}}",
            data: {
                customer_id: customer_id,
                _token: token
            },
            success: function(data) {
                console.log(data);
                $('#project_id').removeAttr('disabled');
                $('#contact_id').removeAttr('disabled');
                $('#site_id').removeAttr('disabled');
                if (data.customers && data.customers.length > 0) {
                var customerData = data.customers[0];

                $("#name").val(customerData.name);
                $("#email").val(customerData.email);
                $("#telephone").val(customerData.telephone);
                $("#mobile").val(customerData.mobile);
                $("#address").val(customerData.address);
                $("#city").val(customerData.city);
                $("#country").val(customerData.country);
                $("#pincode").val(customerData.postal_code);
                $("#contact_name").val(customerData.contact_name);
                $("#site_email").val(customerData.email);
                $("#site_telephone").val(customerData.telephone);
                $("#site_mobile").val(customerData.mobile);
                $("#site_address").val(customerData.address);
                $("#site_city").val(customerData.city);
                $("#site_country").val(customerData.country);
                $("#site_pincode").val(customerData.postal_code);
                $("#company").val(customerData.name);
                $("#contact").val(customerData.mobile);
                $("#project_customer_name").text(customerData.contact_name);
                $("#contact_customer_name").text(customerData.contact_name);
                $("#site_customer_name").text(customerData.contact_name);
                $("#project_customer_id").val(customerData.id);
                $("#contact_customer_id").val(customerData.id);
                $("#site_customer_id").val(customerData.id);
                $("#conatact_name").val(customerData.contact_name);

                // Assuming data.customer_profession is not null
                if (data.customer_profession) {
                    $("#profession_name").val(customerData.contact_name + " (" + data.customer_profession.name + ")");
                }

                // Populate project options
                var project = '<option value="0" selected>Select Project</option>';
                if (customerData.customer_project && Array.isArray(customerData.customer_project)) {
                    for (let i = 0; i < customerData.customer_project.length; i++) {
                        project += '<option value="' + customerData.customer_project[i].id + '">' + customerData.customer_project[i].project_name + '</option>';
                    }
                }
                document.getElementById('project_id').innerHTML = project;

                // Populate contact options
                var contact = '<option value="0" selected>Default</option>';
                if (customerData.additional_contact && Array.isArray(customerData.additional_contact)) {
                    for (let i = 0; i < customerData.additional_contact.length; i++) {
                        contact += '<option value="' + customerData.additional_contact[i].id + '">' + customerData.additional_contact[i].contact_name + '</option>';
                    }
                }
                document.getElementById('contact_id').innerHTML = contact;

                // Populate site options
                var site = '<option value="default" selected>Select Site</option>';
                if (customerData.sites && Array.isArray(customerData.sites)) {
                    for (let i = 0; i < customerData.sites.length; i++) {
                        site += '<option value="' + customerData.sites[i].id + '">' + customerData.sites[i].site_name + '</option>';
                    }
                }
                document.getElementById('site_id').innerHTML = site;

                // Handle country code selection
                $(".country_code").each(function() {
                    if ($(this).val() === customerData.country_code) {
                        $(this).prop('selected', true);
                    }
                });
                $(".site_country_code").each(function() {
                    if ($(this).val() === customerData.country_code) {
                        $(this).prop('selected', true);
                    }
                });

                // Enable the relevant fields
                $('#project_id').removeAttr('disabled');
                $('#contact_id').removeAttr('disabled');
                $('#site_id').removeAttr('disabled');
            }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
</script>
<script>
    function get_char() {
        var text = $('#short_decinc');
        if (text.val().length === 250) {
            text.attr('readonly', 'readonly');
        } else if (text.val().length > 250) {
            text.val('');
        }
    }
</script>
<script>
    function get_modal(modal){  
        // alert(modal)
        var customer_select_check=$("#customer_id").val();
        var modal_array=[0,4,5,6,7,8];
        if(customer_select_check == null && modal_array.includes(modal)){
            alert("Please select customer");
            return false;
        }else{
            if(modal == 1){
                $("#customer_type_form")[0].reset();
                $("#cutomer_type_modal").modal('show');
            }else if(modal == 2){
                $("#job_title_form")[0].reset();
                $("#job_title_modal").modal('show');
            }else if(modal == 3 || modal == 0){
                $("#region_form")[0].reset();
                $("#region_modal").modal('show');
            }else if(modal == 4){
                $("#project_form")[0].reset();
                $("#project_modal").modal('show');
            }else if(modal == 5){
                $("#contact_form")[0].reset();
                $("#contact_modal").modal('show');
            }else if(modal == 6){
                $("#site_form")[0].reset();
                $("#site_modal").modal('show');
            }else if(modal == 7){
                $("#job_type_form")[0].reset();
                $("#job_type_modal").modal('show');
            }else if(modal == 8){
                $("#add_product_form")[0].reset();
                $("#add_product_modal").modal('show');
            }else if(modal == 9){
                $("#product_category_form")[0].reset();
                $("#product_category_modal").modal('show');
            }else if(modal == 10){
                $("#product_tax_form")[0].reset();
                $("#product_tax_modal").modal('show');
            }
        }
        
    }
 </script>
 <script>
    function save_customer_type(){
       var token='<?php echo csrf_token();?>'
       var title=$("#customer_type_name").val();
       var status=$("#customer_type_status").val();
       var home_id=$("#home_id").val();
       if(title == ''){
        $("#customer_type_name").addClass('invalid-input');
        return false;
       }else {
            $.ajax({
                type: "POST",
                url: "{{url('/save_customer_type')}}",
                data: {title:title,status:status,home_id:home_id,_token:token},
                success: function(data) {
                    console.log(data);
                    if($.trim(data) == 'error'){
                        alert("Something went wrong");
                        return false;
                    }else{
                        $("#cutomer_type_modal").modal('hide');
                        $('.get_customer_result').append(data);
                        // window.location.reload();
                    }
                    $("#cutomer_type_modal").modal('hide');
                    
                }
            });
       }
       
    }
    function save_job_title(){
        var token='<?php echo csrf_token();?>'
        var name=$("#job_title_name").val();
        var status=$("#job_title_status").val();
        var home_id=$("#home_id").val();
        if(name == ''){
        $("#job_title_name").addClass('invalid-input');
        return false;
        }else{
            $.ajax({
                type: "POST",
                url: "{{url('/save_job_title')}}",
                data: {name:name,status:status,home_id:home_id,_token:token},
                success: function(data) {
                    console.log(data);
                    
                    $("#job_title_modal").modal('hide');
                    $('.get_job_title_result').append(data);
                    // window.location.reload();
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
                }
            });
        }
    }
    function save_region(){
        var token='<?php echo csrf_token();?>'
        var title=$("#region_name").val();
        var status=$("#region_status").val();
        var home_id=$("#home_id").val();
        if(title == ''){
        $("#region_name").addClass('invalid-input');
        return false;
        }else{
            $.ajax({
                type: "POST",
                url: "{{url('/save_region')}}",
                data: {title:title,status:status,home_id:home_id,_token:token},
                success: function(data) {
                    console.log(data);
                    // return false;
                    if($.trim(data) == 'error'){
                        alert("Something went wrong");
                        return false;
                    }else{
                        $("#region_modal").modal('hide');
                        $('.get_region_result').append(data);
                        // window.location.reload();
                    }
                    $("#region_modal").modal('hide');
                }
            });
        }
    }
    function save_customerClose(){
        save_customer();
        // $("#customerPop").modal('hide');

    }
    function save_customer(){
        var token='<?php echo csrf_token();?>'
        var name=$("#customer_name").val();
        var home_id=$("#home_id").val();
        var customer_type_id=$("#customer_type_id").val();
        var contact_name=$("#customer_contact_name").val();
        var job_title=$("#customer_job_titile_id").val();
        var email=$("#customer_email").val();
        var telephone=$("#customer_phone").val();
        var mobile=$("#customer_mobile").val();
        var fax=$("#customer_fax").val();
        var website=$("#customer_website").val();
        var catalogue_id=$("#customer_catalogue").val();
        var region=$("#customer_region").val();
        var address=$("#cuatomer_address").val();
        var city=$("#customer_city").val();
        var country=$("#customer_country_input").val();
        var postal_code=$("#customer_pincode").val();
        var country_code=$("#customer_country_id").val();
        var currency=$("#customer_currency_id").val();
        var credit_limit=$("#customer_credit_limit").val();
        var discount=$("#customer_discount").val();
        var discount_type=$("#customer_percentage").val();
        var saga_ref=$("#customer_sage_ref").val();
        
        var site_notes=$("#customer_site_note").val();
        var vat_tax_no=$("#customer_vat").val();
        var payment_terms=$("#customer_payment_terms").val();
        var assigned_product=0;
        if($("#customer_yes").is(':checked')){
            assigned_product=1;
        }
        var notes=$("#customer_note").val();
        var is_converted=1;
        var status=$("#customer_status").val();

        if(name == ''){
            $('#customer_name').css('border','1px solid red');
            return false;
        }else if(customer_type_id == null){
            $('#customer_name').css('border','');
            $('#customer_type_id').css('border','1px solid red');
            return false;
        }else if(contact_name == ''){
            $('#customer_type_id').css('border','');
            $('#customer_contact_name').css('border','1px solid red');
            return false;
        }else {
            $('#customer_contact_name').css('border','');
                $.ajax({
                type: "POST",
                url: "{{url('/customer_add_edit_save')}}",
                data: {status:status,is_converted:is_converted,notes:notes,assigned_product:assigned_product,payment_terms:payment_terms,vat_tax_no:vat_tax_no,site_notes:site_notes,saga_ref:saga_ref,discount_type:discount_type,discount:discount,credit_limit:credit_limit,currency:currency,country_code:country_code,postal_code:postal_code,country:country,city:city,address:address,region:region,catalogue_id:catalogue_id,website:website,fax:fax,mobile:mobile,telephone:telephone,email:email,name:name,status:status,home_id:home_id,customer_type_id:customer_type_id,contact_name:contact_name,job_title:job_title,_token:token},
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                }
            });
        }
        

    }
    function save_project(){
        var token='<?php echo csrf_token();?>'
        var project_name=$("#project_name").val();
        var home_id=$("#home_id").val();
        var start_date=$("#project_start_date").val();
        var end_date=$("#project_end_date").val();
        var project_value=$("#project_value").val();
        var description=$("#project_description").val();
        var status=$("#project_status").val();
        var customer_name=$("#project_customer_id").val();
        if(project_name == ''){
            $('#project_name').css('border','1px solid red');
            // $(window).scrollTop($('#project_name').position().top);
            return false;
        }else if(start_date == ''){
            $('#project_name').css('border','');
            $("#project_start_date").css('border','1px solid red');
            return false;
        }else if(end_date == ''){
            $("#project_start_date").css('border','');
            $("#project_end_date").css('border','1px solid red');
            return false;
        }else {
            $("#project_end_date").css('border','');
            $.ajax({
                type: "POST",
                url: "{{url('/project_save')}}",
                data: {customer_name:customer_name,description:description,project_value:project_value,end_date:end_date,start_date:start_date,home_id:home_id,project_name:project_name,status:status,_token:token},
                success: function(data) {
                    console.log(data);
                    $("#project_modal").modal('hide');
                    $("#project_id").append(data);
                }
            });
        }
    }
    function default_address(){
        if ($('#contact_default_address').is(':checked')) {
            var customer_id = $("#customer_id").val();
            var token = '<?php echo csrf_token(); ?>'
            $.ajax({
                type: "POST",
                url: "{{url('get_customer_details_front')}}",
                data: {
                    customer_id: customer_id,
                    _token: token
                },
                success: function(data) {
                    console.log(data);
                    if (data.customers && data.customers.length > 0) {
                        var contactData = data.customers[0];
                        $("#name").val(contactData.name);
                        $("#email").val(contactData.email);
                        $("#telephone").val(contactData.telephone);
                        $("#mobile").val(contactData.mobile);
                        $("#contact_address").val(contactData.address);
                        $("#contact_city").val(contactData.city);
                        $("#contact_country_input").val(contactData.country);
                        $("#contact_pincode").val(contactData.postal_code);
                        
                        $(".contact_country_id").each(function() {
                            if ($(this).val() === contactData.country_code) {
                                $(this).prop('selected', true);
                            }
                        });  
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }else {
            $("#name").val('');
            $("#email").val('');
            $("#telephone").val('');
            $("#mobile").val('');
            $("#contact_address").val('');
            $("#contact_city").val('');
            $("#contact_country_input").val('');
            $("#contact_pincode").val('');
            $("#contact_country_id").val('');
        }
    }
    function save_contactClose(){
        save_contact();
        $("#contact_modal").modal('hide');
    }
    function save_contact(){
        var token='<?php echo csrf_token();?>'
        var default_billing; 
        if ($('#contact_default_yes').is(':checked')) {
            default_billing=1;
        }else {
            default_billing=0;
        }
        var customer_id=$("#contact_customer_id").val();
        var contact_name=$("#contact_contact_name").val();
        // alert(contact_name)
        var job_title_id=$("#contact_job_titile_id").val();
        var email=$("#contact_email").val();
        var telephone=$("#contact_phone").val();
        var mobile=$("#contact_mobile").val();
        var fax=$("#contact_fax").val();
        var address=$("#contact_address").val();
        var city=$("#contact_city").val();
        var country=$("#contact_country_input").val();
        var postcode=$("#contact_pincode").val();
        var country_id=$("#contact_country_id").val();
        
        if(contact_name == ''){
            $('#contact_contact_name').css('border','1px solid red');
            return false;
        }else if(address == ''){
            $('#contact_contact_name').css('border','');
            $("#contact_address").css('border','1px solid red');
            return false;
        }else {
            $("#project_end_date").css('border','');
            $.ajax({
                type: "POST",
                url: "{{url('/contact_save')}}",
                data: {country_id:country_id,postcode:postcode,country:country,city:city,address:address,fax:fax,mobile:mobile,telephone:telephone,email:email,job_title_id:job_title_id,contact_name:contact_name,customer_id:customer_id,default_billing:default_billing,_token:token},
                success: function(data) {
                    console.log(data);
                    $("#contact_modal").modal('hide');
                    $("#contact_id").append(data);
                }
            });
        }
    }
    function save_siteClose(){
        save_site();
        $("#site_modal").modal('hide');
    }
    function save_site(){
        var token='<?php echo csrf_token();?>'
        var site_name=$("#site_name").val();
        var contact_name=$("#site_contact_name").val();
        var title_id=$("#site_job_titile_id").val();
        var email=$("#site_email").val();
        var telephone=$("#site_phone").val();
        var mobile=$("#site_mobile").val();
        var fax=$("#site_fax").val();
        var region=$("#site_region").val();
        var address=$("#site_address").val();
        var city=$("#site_city").val();
        var country=$("#site_country_input").val();
        var post_code=$("#site_pincode").val();
        var country_id=$("#site_modal_country_id").val();
        var catalogue=$("#site_catalogue_id").val();
        var notes=$("#site_notes").val();
        var site_customer_name=$("#site_customer_name").text();
        var site_company_name=$("#site_company_name").val();
        var customer_id=$("#site_customer_id").val();
        if(site_name == ''){
            $('#site_name').css('border','1px solid red');
            return false;
        }else if(contact_name == ''){
            $('#site_name').css('border','');
            $("#site_contact_name").css('border','1px solid red');
            return false;
        }else if(address == ''){
            $('#site_contact_name').css('border','');
            $("#site_address").css('border','1px solid red');
            return false;
        }else {
            $("#site_address").css('border','');
            $.ajax({
                type: "POST",
                url: "{{url('/site_save')}}",
                data: {customer_id:customer_id,site_company_name:site_company_name,site_customer_name:site_customer_name,notes:notes,catalogue:catalogue,country_id:country_id,post_code:post_code,country:country,city:city,address:address,region:region,fax:fax,mobile:mobile,telephone:telephone,email:email,title_id:title_id,contact_name:contact_name,site_name:site_name,_token:token},
                success: function(data) {
                    console.log(data);
                    $("#site_modal").modal('hide');
                    $("#site_id").append(data);
                }
            });
        }


    }
    function save_close_job_type(){
        save_job_type();
        $("#job_type_modal").modal('hide');
    }
    function save_job_type(){
        var token='<?php echo csrf_token();?>'
        var name=$("#job_type_name").val();
        var home_id=$("#home_id").val();
        var default_days=$("#no_of_days").val();
        var customer_visible=0;
        if ($('#customer_visible').is(':checked')) {
            customer_visible=1;
        }
        var appointment_id=$("#Job_appointment_type").val();
        var status=$("#job_type_status").val();
        if(name == ''){
            $('#name').css('border','1px solid red');
            return false;
        }else {
            $("#name").css('border','');
            $.ajax({
                type: "POST",
                url: "{{url('/job_type_save?key=from_job')}}",
                data: {status:status,appointment_id:appointment_id,customer_visible:customer_visible,default_days:default_days,home_id:home_id,name:name,_token:token},
                success: function(data) {
                    console.log(data);
                    $("#job_type_modal").modal('hide');
                    $("#job_type").append(data);
                }
            });
        }
    }
    function save_productClose(){
        save_product();
        $("#add_product_modal").modal('hide');
    }
    function save_product(){
        $.ajax({
            type: "POST",
            url: "{{url('/product_save')}}",
            data: new FormData($("#add_product_form")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                // $("#id").val(data.id);
                // $(".header_text").text(data.job_ref)
            }
        });
    }
    function save_productClose_category(){
        save_product_category();
        $("#product_category_modal").modal('hide');
    }
    function save_product_category(){
        var token = '<?php echo csrf_token(); ?>'
        var name=$("#product_category_name").val();
        var cat_id=$("#parent_category_id").val();
        var status=$("#product_category_status").val();
        var home_id=$("#home_id").val();

        if(name == ''){
            $('#product_category_name').css('border','1px solid red');
            return false;
        }else {
            $("#product_category_name").css('border','');
            $.ajax({
                type: "POST",
                url: "{{url('save_product_category')}}",
                data: {
                    name: name,cat_id:cat_id,status:status,home_id:home_id,
                    _token: token
                },
                success: function(data) {
                    console.log(data);
                    // 
                    // $("#product_model").modal('show');
                    $('#product_category_id').html(data);

                }
            });
        }
    }
    function save_taxClose_rate(){
        save_tax_rate();
        $("#product_tax_modal").modal('hide');
    }
    function save_tax_rate(){
       var token = '<?php echo csrf_token(); ?>'
       var name=$("#tax_rate_name").val();
       var home_id=$("#home_id").val();
       var tax_rate=$("#tax_rate").val();
       var status=$("#tax_status").val();
       var tax_code=$("#external_tax_code").val();
       var exp_date=$("#expiry_date").val();
       if(name == ''){
            $('#tax_rate_name').css('border','1px solid red');
            return false;
        }else if(tax_rate == ''){
            $("#tax_rate_name").css('border','');
            $('#tax_rate').css('border','1px solid red');
            return false;
        } else {
            $("#tax_rate").css('border','');
            $.ajax({
                type: "POST",
                url: "{{url('save_tax_rate')}}",
                data: {
                    name: name,tax_rate:tax_rate,status:status,home_id:home_id,tax_code:tax_code,exp_date:exp_date,
                    _token: token
                },
                success: function(data) {
                    console.log(data);
                    // 
                    // $("#product_model").modal('show');
                    $('.get_product_sales_tax_result').append(data);

                }
            });
        }
    }
</script>
<script>
    function get_search() {
        var search_value = $("#search_value").val();
        var token = '<?php echo csrf_token(); ?>'
        if (search_value.length > 2) {
            $.ajax({
                type: "POST",
                url: "{{url('search_value')}}",
                data: {
                    search_value: search_value,
                    _token: token
                },
                success: function(data) {
                    console.log(data);
                    // 
                    $("#product_model").modal('show');
                    $('#search_result').html(data);

                }
            });
        }
    }

    function show_product_model() {
        var token = '<?php echo csrf_token(); ?>'
            $.ajax({
                type: "POST",
                url: "{{url('product_modal_list')}}",
                data: {_token: token},
                success: function(data) {
                    console.log(data);
                    // 
                    $("#product_model").modal('show');
                    $('#search_result').html(data);

                }
            });
        
        $('#product_model').modal('show');
    }
    var previous_id=[];
    function selectProduct(id) {
        previous_id.push(id);
        var token = '<?php echo csrf_token(); ?>'
        $.ajax({
            type: "POST",
            url: "{{url('result_product_calculation')}}",
            data: {
                id: id,previous_id:previous_id,
                _token: token
            },
            success: function(data) {
                console.log(data);
                $("#product_result").append(data.html);
                UpdateItemDetailsCalculation();

            }
        });
        $("#temp_result1").hide();
    }
    $(document).ready(function(){
        var TablePrevious_ids = JSON.parse('<?php echo json_encode($previous_ids); ?>');
        TablePrevious_ids.forEach(function (id) {
            // selectProduct(id);
            previous_id.push(Number(id));
        });
    });

    function removeRow(button,id=null) {
        console.log(button);
        var row = button.parentNode.parentNode;
        var finalAmountInput = row.querySelector('#pricejob');
        var finalCostInput = row.querySelector('#cost_pricejob');
        var finalAmount = finalAmountInput ? finalAmountInput.value : null;
        var finalCost = finalCostInput ? finalCostInput.value : null;
        if(id){
            var token = '<?php echo csrf_token(); ?>'
            $.ajax({
                type: "POST",
                url: "{{url('jobassign_productsDelete')}}",
                data: {id:id,_token: token},
                success: function(data) {
                    console.log(data);
                    if(data.success != true){
                        alert("Something went wrong! Please try later");
                        return false;
                    }else{
                        row.parentNode.removeChild(row);
                        UpdateItemDetailsCalculation();
                    }
                }
            });
        }else{
            row.parentNode.removeChild(row);
            UpdateItemDetailsCalculation();
        }
    }
    // $(".quantity").on('keyup', function(){
        $(document).on("keyup", ".quantity", function() {
        var qty = $(this).val();
        var row = $(this).closest('tr');
        var price = row.find("input#pricejob").val();
        if(qty != ''){
            $('#pro_qty').val(qty);
            var totalPrice = qty * price;
            // row.find("#pre_total_amount").text(totalPrice.toFixed(2));
            row.find("#pre_total_amount").text(totalPrice);
        }else{
            $('#pro_qty').val('0');
            row.find("#pre_total_amount").text(price);
        }
            var totalAmountAssign=0;
            $('.pre_total_amount').each(function(index){
                var amount_assign=$(this).text();
                totalAmountAssign=totalAmountAssign+Number(amount_assign);
            });
            $("#total_amount").text('£' + totalAmountAssign);
    });
    function UpdateItemDetailsCalculation(){
        var updatedCostPrice=0;
        var updatedGrandAmount=0;
        $('.cost_pricejob').each(function(){
            var cost=$(this).val();
            updatedCostPrice=updatedCostPrice+Number(cost);
        });
        $('.pre_total_amount').each(function(index){
            var amount_assign_total=$(this).text();
            updatedGrandAmount=updatedGrandAmount+Number(amount_assign_total);
        });

        $('#pro_cost_price').text('£' + updatedCostPrice);
        $('#total_amount').text('£' + updatedGrandAmount);

    }

    function get_data_product() {
        $('#product_model').modal('hide');
    }
</script>

<script>
    function save_all_data(){
        // var token = '<?php echo csrf_token(); ?>'
        for (var instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var countNumber=$("#count_number").val();
        // alert(countNumber);return false;
        for(var i=1; i<=countNumber;i++){
            if ($('#alert_sms_appointment'+i).is(':checked')) {
                alert(1)
                $("#alert_sms_appointment"+i).val(1);
            }else {
                alert(0)
                $("#alert_sms_appointment"+i).val(0);
            }
            if ($('#alert_email_appointment'+i).is(':checked')) {
                $("#alert_email_appointment"+i).val(1);
            }else {
                $("#alert_email_appointment"+i).val(0);
            }
            if ($('#single_appointment'+i).is(':checked')) {
                $("#single_appointment"+i).val(1);
            }else {
                $("#single_appointment"+i).val(0);
            }
            if ($('#floating_appointment'+i).is(':checked')) {
                $("#floating_appointment"+i).val(1);
            }else {
                $("#floating_appointment"+i).val(0);
            }
        }
        
        var customer_id=$("#customer_id").val();
        var name=$("#name").val();
        var address=$("#address").val();
        var site_address=$("#site_address").val();
        var job_type=$("#job_type").val();
        var start_date=$("#start_date").val();
        var complete_by=$("#complete_by").val();
        var short_decinc=$("#short_decinc").val();
        var message='<?php if(isset($key) && $key !=''){echo "<span>Job Updated Successfully Done!</span>";}else{echo "<span>Job Added Successfully Done!</span>";}?>'
        // alert(customer_id)
        if(customer_id == null){
            $('#customer_id').css('border','1px solid red');
            $(window).scrollTop($('#customer_id').position().top);
            return false;
        }else if(name == ''){
            $('#customer_id').css('border','');
            $('#name').css('border','1px solid red');
            $(window).scrollTop($('#name').position().top);
            return false;
        }else if(address == ''){
            $('#name').css('border','');
            $('#address').css('border','1px solid red');
            $(window).scrollTop($('#address').position().top);
            return false;
        }else if(site_address == ''){
            $('#address').css('border','');
            $('#site_address').css('border','1px solid red');
            $(window).scrollTop($('#site_address').position().top);
            return false;
        }else if(job_type == null){
            $('#customer_id').css('border','');
            $('#site_address').css('border','');
            $('#job_type').css('border','1px solid red');
            $(window).scrollTop($('#job_type').position().top);
            return false;
        }else if(start_date == ''){
            $('#customer_id').css('border','');
            $('#job_type').css('border','');
            $('#start_date').css('border','1px solid red');
            $(window).scrollTop($('#start_date').position().top);
            return false;
        }else if(complete_by == ''){
            $('#customer_id').css('border','');
            $('#job_type').css('border','');
            $('#start_date').css('border','');
            $('#complete_by').css('border','1px solid red');
            $(window).scrollTop($('#complete_by').position().top);
            return false;
        }else if(short_decinc == ''){
            $('#customer_id').css('border','');
            $('#job_type').css('border','');
            $('#complete_by').css('border','');
            $('#short_decinc').css('border','1px solid red');
            $(window).scrollTop($('#short_decinc').position().top);
            return false;
        }else{
            $('#short_decinc').css('border','');
                $.ajax({
                type: "POST",
                url: "{{url('/job_add_edit_save')}}",
                data: new FormData($("#all_data")[0]),
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $(window).scrollTop(0);
                    if(data.success === true){
                        $("#message_save").show();
                        $("#message_save").html(message);
                        setTimeout(() => {
                            $("#message_save").hide();
                        }, 3000);
                        // $("#id").val(data.id);
                        // $(".header_text").text(data.job_ref)
                        // location.href = '<?php echo url('job_edit') . '?key=' . base64_encode('MQ=='); ?>';
                        var id = parseInt(data.data.id, 10) || 0;
                        var encodedId = btoa(unescape(encodeURIComponent(id)));
                        location.href = '<?php echo url('job_edit'); ?>?key=' + encodedId;
                    }else{
                        alert("Something went wrong Please try again later");
                        return false;
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
        
    }
</script>
<script>
    function generate_code(){
        var product_count='<?php echo $product_count+1;?>'
        var name=$("#product_name").val();
        if(name == ''){
            alert("Please fill Name");
            return false;
        }
        var firstTwoLetters = name.substring(0, 2).toUpperCase();
        $("#product_postal_code").val(""+firstTwoLetters+"-000"+product_count);
        $("#generate_code").hide();
    }
    $("#product_yes").on('change',function(){
        var check;
        if ($('#product_yes').is(':checked')) {
            check=1;
        }else{
            check=0;
        }
        $("#product_yes").val(check);
    });
    $("#showontemplate").on('chnage',function(){
        var show;
        if ($('#showontemplate').is(':checked')) {
            show=1;
        }else{
            show=0;
        }
        $("#showontemplate").val(show);
    });
    function suplier_row(){
    var token='<?php echo csrf_token();?>'
        $.ajax({
                type: "POST",
                url: "{{url('/supplier_result')}}",
                data: {_token:token},
                success: function(data) {
                    console.log(data);
                    $('#supplier_result').append(data);
                }
            });
    }
    $('#supplier_result').on('click', '.delete_row', function() {
        $(this).closest('tr').remove();
    });
</script>
<script>
    $('#save_data').on('click', function() {
        var token = '<?php echo csrf_token();?>';
        var title = $("#Tagname").val().trim();
        var status = $.trim($('#TagStatus option:selected').val());
        var message = "Added Successfully Done";

        if (title.includes(',')) {
            alert("Comma not allowed in the tag, please use _ or - instead");
            return false;
        } if (title == '') {
            $("#Tagname").css('border','1px solid red');
            return false;
        } else {
            $("#Tagname").css('border','');
            $.ajax({
                type: "POST",
                url: '{{ url("/save_tag") }}',
                data: {title: title, status: status, _token: token},
                success: function(data) {
                    console.log(data);
                    if(data.vali_error){
                        $("#error_message").text(data.vali_error);
                        $(".error_message").show();
                        setTimeout(function() {
                            $(".error_message").hide();
                            $("#form_data")[0].reset();
                        }, 3000);
                        return false;
                    }else if(data.data && data.data.original && data.data.original.error){
                        alert(data.data.original.error);
                        return false;
                    }else{
                        $("#message").text(message);
                        $(".success_message").show();
                        $("#tags").append('<option value="'+data.data.id+'">'+data.data.title+'</option>');
                        setTimeout(function() {
                            $(".alert").hide();
                            $("#TagModal").modal('hide');
                        }, 3000);
                        
                    }
                    
                }
                
            });
        }
    });
</script>

@include('frontEnd.salesAndFinance.jobs.layout.footer')