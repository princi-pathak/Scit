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
                                                <select class="form-control editInput selectOptions" id="purchase_supplier_id" name="supplier_id"  onchange="get_supplier_details()">
                                                    <option selected disabled>Select Supplier</option>
                                                    <?php foreach ($suppliers as $suppVal) { ?>
                                                        <option value="{{$suppVal->id}}">{{$suppVal->name}}</option>
                                                    <?php } ?>
                                                </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" class="formicon" data-bs-toggle="modal" data-bs-target="#supplierPop">
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
                                                    <select class="form-control editInput selectOptions" id="contact_id" name="contact_id" <?php if(!isset($key) && $key ==''){echo 'disabled';}?> disabled>
                                                        <option selected>Select Supplier First</option>
                                                        @foreach($additional_contact as $addContact)
                                                            <option value="{{$addContact->id}}" <?php if(isset($job_details) && $job_details->contact_id == $addContact->id){echo 'selected';}?>>{{$addContact->contact_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(1)"><i
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
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(2)"><i
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
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(3)"><i
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
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(4)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>



                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputContact"
                                                    class="col-sm-3 col-form-label">Name<span class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="company" id="company" class="form-control editInput textareaInput" value="{{Auth::user()->name}}" placeholder="Enter Your Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputContact"
                                                    class="col-sm-3 col-form-label">Company</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="company" id="company" class="form-control editInput textareaInput" value="{{$company_name}}" placeholder="Enter Comapny Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputAddress"
                                                    class="col-sm-3 col-form-label">Address<span class="radStar">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control textareaInput" id="address" name="address" rows="3" placeholder="Enter Your Address">{{Auth::user()->current_location}}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control  editInput textareaInput"
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
                                                <input type="text" class="form-control editInput textareaInput" id="site_telephone" name="site_telephone" value="{{Auth::user()->phone_no}}" placeholder="Enter Your Telephone">
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
                                                <input type="text" class="form-control editInput textareaInput" id="site_mobile" name="site_mobile" value="{{Auth::user()->mobile}}" placeholder="Enter Your Mobile No.">
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
                                                    <a href="javascript:void(0)" class="formicon" onclick="get_modal(5)"><i
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
                                                    <option value="1" selected>Draft</option>
                                                    <option value="2">Awaiting Approval</option>
                                                    <option value="3">Approved</option>
                                                    <option value="4">Actioned</option>
                                                    <option value="5" disabled>Paid</option>
                                                    <option value="6">Cancelled</option>
                                                    <option value="7">Invoice Received</option>
                                                    <option value="8" disabled>Rejected</option>
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
                                                <a href="javascript:void(0)" class="formicon" onclick="get_modal(6)"><i class="fa-solid fa-square-plus"></i>
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
                                                    <th>Account Code <a href="javascript:void(0)" class="formicon" onclick="get_modal(7)"><i class="fa-solid fa-square-plus"></i>
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
                                            <a href="javascript:void(0)" onclick="get_modal(9)" class="profileDrop">New Task</a>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3 mt-2">
                                        <div class="jobsection">
                                            <a href="javascript:void(0)" onclick="get_modal(10)" class="profileDrop">Tasks</a>
                                            <a href="javascript:void(0)" onclick="get_modal(11)" class="profileDrop">Recurring Tasks</a>

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
<!-- Models Start Here -->

@include('components.add-supplier-modal')

<!-- End here -->
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
</script>
<script>
    function getAllSupplier(data){
        $("#purchase_supplier_id").append('<option value="'+data.id+'">'+data.name+'</option>')
    }
    function get_supplier_details(){
        var supplier_id = $("#purchase_supplier_id").val();
        alert(supplier_id)
        var token = '<?php echo csrf_token(); ?>'
        $.ajax({
            type: "POST",
            url: "{{url('get_supplier_details')}}",
            data: {
                supplier_id: supplier_id,
                _token: token
            },
            success: function(data) {
                console.log(data);return false;
                $('#contact_id').removeAttr('disabled');
                if (data.customers && data.customers.length > 0) {
                var customerData = data.customers[0];
                $(".site_country_code").each(function() {
                    if ($(this).val() === customerData.country_code) {
                        $(this).prop('selected', true);
                    }
                });
            }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
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
    function get_modal(modal){  
        // alert(modal)
        var supplier_select_check=$("#purchase_supplier_id").val();
        var modal_array=[1,2,3,4,5,6,7,8,9];
        if(supplier_select_check == null && modal_array.includes(modal)){
            alert("Please select Supplier");
            return false;
        }else{
            // if(modal == 1){
            //     $("#customer_type_form")[0].reset();
            //     $("#cutomer_type_modal").modal('show');
            // }else if(modal == 2){
            //     $("#job_title_form")[0].reset();
            //     $("#job_title_modal").modal('show');
            // }else if(modal == 3 || modal == 0){
            //     $("#region_form")[0].reset();
            //     $("#region_modal").modal('show');
            // }else if(modal == 4){
            //     $("#project_form")[0].reset();
            //     $("#project_modal").modal('show');
            // }else if(modal == 5){
            //     $("#contact_form")[0].reset();
            //     $("#contact_modal").modal('show');
            // }else if(modal == 6){
            //     $("#site_form")[0].reset();
            //     $("#site_modal").modal('show');
            // }else if(modal == 7){
            //     $("#job_type_form")[0].reset();
            //     $("#job_type_modal").modal('show');
            // }else if(modal == 8){
            //     $("#add_product_form")[0].reset();
            //     $("#add_product_modal").modal('show');
            // }else if(modal == 9){
            //     $("#product_category_form")[0].reset();
            //     $("#product_category_modal").modal('show');
            // }else if(modal == 10){
            //     $("#product_tax_form")[0].reset();
            //     $("#product_tax_modal").modal('show');
            // }
        }
        
    }
 </script>

@include('frontEnd.salesAndFinance.jobs.layout.footer')