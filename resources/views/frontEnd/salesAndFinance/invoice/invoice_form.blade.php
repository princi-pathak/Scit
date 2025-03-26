@include('frontEnd.salesAndFinance.jobs.layout.header')

<style>
    .disabled-tab {
        pointer-events: none;
        opacity: 0.5;
    }
    .input_style table tbody textarea{
        resize: none;
        overflow: hidden;
    }
</style>
<section class="main_section_page px-3">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4 ">
            <div class="pageTitle">
                <h3>New Invoice</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <form id="all_data"class="customerForm">
            <div class="col-lg-12">
                <div class="newJobForm">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Customer / Billing Details</h4>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Customer <span class="radStar">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" id="invoice_customer_id" name="customer_id">
                                                <option selected disabled>Select Customer</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="javascript:void(0)" class="formicon" onclick="get_modal(1)"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Project</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" disabled id="invoice_project_id" name="project_id">
                                                <option>Select Customer First</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="javascript:void(0)" class="formicon" onclick="get_modal(2)"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Contact</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" disabled id="invoice_contact_id" name="contact_id">
                                                <option>Select Customer First</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="javascript:void(0)" onclick="get_modal(3)" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Name <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" value="" name="name" id="invoice_name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Address <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="invoice_address" rows="3" placeholder="75 Cope Road Mall Park USA"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" value="" name="city" id="invoice_city">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" value="" name="county" id="invoice_county">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Postcode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" placeholder="Postcode" name="postcode" id="invoice_Postcode">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" id="invoice_telephoneCode" name="telephone_code">
                                                <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="invoice_telephone" placeholder="Telephone" name="telephone">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" name="mobile_code" id="invoice_mobile_code">
                                                <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="invoice_mobile" name="mobile" value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="invoice_email" name="email"  value="" onchange="invoice_check_email()">
                                            <span style="color:red" id="invoiceemailErr"></span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Site / Delivery Details</h4>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Site</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" id="invoice_site_id" name="site_delivery_add_id" disabled>
                                                <option>None</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" id="invoiceRegions" name="region">
                                                <option>None</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon" onclick="openRegionModal('invoiceRegions');"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                            
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label"> Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="invoice_siteName" name="site_name" value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Company</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control-plaintext editInput" id="invoicesite_companyName" name="company_name" value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for=""
                                            class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="site_address" id="invoice_site_address" rows="3"
                                                placeholder="75 Cope Road Mall Park USA"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="invoice_site_city" name="site_city" value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="invoice_site_county" name="site_county" placeholder="Site County">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for=""
                                            class="col-sm-3 col-form-label">Postcode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="invoice_site_postcode" name="site_postcode" value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for=""
                                            class="col-sm-3 col-form-label">Telephone</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" id="invoice_siteTelephoneCode" name="site_telephone_code">
                                            <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="invoice_siteTelephone" name="site_telephone" placeholder="Site Telephone">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select class="form-control editInput selectOptions" id="invoice_siteMobileCode" name="site_mobile_code">
                                            <option value="">Please Select</option>
                                                @foreach($countries as $value)
                                                <option value="{{ $value->id }}"> + {{ $value->code }} - {{ $value->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control editInput" id="invoice_site_mobile" name="site_mobile" value="">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Invoice Details</h4>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Invoice Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control-plaintext editInput" value="Invoice Ref ###" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Invoice Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="invoce_type" name="invoice_type">
                                                <option value="service">Service</option>
                                                <option value="product">Product</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Customer Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" name="customer_ref" id="invoice_customer_ref" placeholder="Customer Ref if any">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Customer Job Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="invoice_customer_job_ref" name="customer_job_ref" placeholder="Customer Job if any">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Purch. Order Ref</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput textareaInput" id="invoice_purchase_order_ref" name="purchase_order_ref" placeholder="Purchase Order Ref if any">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Invoice Date <span class="radStar">*</span> </label>
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control editInput" id="invoice_date" name="invoice_date" placeholder="">
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Payment Terms</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" id="invoice_payment_terms" name="payment_terms">
                                                <option>Default (21)</option>
                                                @for($i = 0; $i <= 90; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="form-check-label checkboxtext pt-1">Days</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Due Date <span class="radStar">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control editInput" id="invoice_due_date" name="due_date" placeholder="">
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="invoice_status" name="status">
                                                <option value="Draft">Draft</option>
                                                <option value="Invoiced">Invoiced</option>
                                                <option value="Outstanding">Outstanding</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Cancelled">Cancelled</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Tags</label>
                                        <div class="col-sm-7">
                                            <select class="form-control editInput selectOptions" id="invoice_tags" name="tags">
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#!" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        </div>
                                    </div>   
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-5 col-form-label">
                                            <a href="#" class="profileDrop pink"> <i class="fa fa-clock"></i> Set Reminder </a>
                                        </label>
                                    </div>    
                            </div>
                        </div>
                    </div>

                </div>
                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Item Details</label>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="mb-3 row">
                                <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control editInput" id="search-product" placeholder="Type to add product">
                                    <div class="parent-container"></div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="plusandText">
                                        <a href="javascript:void(0)" onclick="get_modal(4)" class="formicon"><i class="fa-solid fa-square-plus"></i></a>
                                        <span class="afterPlusText"> (Type to view product or <a href="javascript:void(0)" onclick="openProductmodal()">Click here</a> to view all assets)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-5">
                            <div class="mb-3 row">
                                <div class="col-md-9 row">
                                    <label for="inputCountry" class="col-sm-5 col-form-label"> Template Options:</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions">
                                            <option>Show Product Details</option>
                                            <option>Default</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pageTitleBtn justify-content-start p-0">
                                        <a href="#" class="profileDrop">Add Title</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-sm-7">
                            <div class="mb-3 row">
                                <label for="inputCountry" class="col-sm-2 col-form-label">Catalogue:</label>
                                <div class="col-sm-3">
                                    <select class="form-control editInput selectOptions">
                                        <option>Default Pricing</option>
                                        <option>Default</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-sm-12">
                            <div class="productDetailTable table-responsive input_style">
                                <table class="table" id="result">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Code </th>
                                            <th>Product </th>
                                            <th>Description</th>
                                            <th>
                                                <div class="tableplusBTN">
                                                    <span>Account Code </span>
                                                    <span class="plusandText ps-3">
                                                        <a href="javascript:void(0)" class="formicon pt-0" onclick="openAccountCodeModal(null)"> <i class="fa-solid fa-square-plus"></i> </a>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>Qty </th>
                                            <th>Cost Price </th>
                                            <th>Cost Calc </th>
                                            <th>Price </th>
                                            <th>Discount </th>
                                            <th>
                                                <div class="tableplusBTN">
                                                    <span>VAT(%) </span>
                                                    <span class="plusandText ps-3">
                                                        <a href="javascript:void(0)" class="formicon pt-0" onclick="get_modal(5)"> <i class="fa-solid fa-square-plus"></i> </a>
                                                    </span>
                                                </div>
                                            </th>
                                            <th>VAT </th>
                                            <th>Amount</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- End  off newJobForm -->
                
                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Notes</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="">
                                <h4 class="contTitle text-start">Customer Notes <span class="afterPlusText"> Will be included in invoive </span></h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="invoice_customer_notes" name="customer_notes" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h4 class="contTitle text-start">Terms</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="invoice_terms_notes" name="terms" class="form-control">
                                    All Invoices must be paid within 7 days of the issue date. If you have any queries please contact 7025639852 immediately upon receiving this invoice
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h4 class="contTitle text-start">Internal Notes</h4>
                                <div class="mt-3">
                                    <textarea cols="40" rows="5" id="invoice_internal_notes" name="internal_notes" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End  off newJobForm -->

                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Attachments</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="py-4">
                                <div class="jobsection">
                                    <a href="javascript:void(0)" onclick="get_modal(6)" class="profileDrop">New Attachments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End  off newJobForm -->

                <div class="newJobForm mt-4">
                    <label class="upperlineTitle">Tasks</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="py-4">
                                <div class="jobsection">
                                    <a href="#!" class="profileDrop disabled-tab">New Tasks</a>
                                </div>
                                <div class="jobsection pt-3">
                                    <a href="#!" class="profileDrop bgColour" id="task_active_inactive" style="background-color:#474747" onclick="bgColorChange(1)">Tasks</a>
                                    <a href="#!" class="profileDrop bgColour" id="recurring_active_inactive" onclick="bgColorChange(2)">Recurring Tasks</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    

    
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 px-3">
            <div class="pageTitleBtn">
                <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                <!-- <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Action</a> -->

            </div>
        </div>
    </div>
</div>
</section>

<x-tag-modal
    modalId="quoteTagModal"
    modalTitle="Add Tag"
    formId="add_quote_tag_form"
    inputId="quoteTag"
    statusId="status"
    saveButtonId="saveQuoteTag"
    placeholderText="Tag" />

    <x-vat-tax-rate
    modalId="VatTaxRateModal"
    modalTitle="Add Tax Rate"
    formId="vattaxrateform"
    id="vattaxrate_id"
    name="vat_tax_name"
    taxRate="vat_tax_rate"
    taxCode="vat_tax_code"
    expDate="vat_tax_expdate"
    status="vat_tax_satatus"
    saveButtonId="saveVatTaxRate" />

    <x-add-attachment-modal
    purchaseModalId="purchase_model"
    purchaseformId="purchase_Attachmentform"
    refTitle="Purchase"
    modalTitle="Add Attachment"
    typeId="purchase_typeId"
    inputTitle="purchase_title"
    selectfileName="purchase_file"
    inputDescription="purchase_description"
    saveButtonId="savePurchaseAttachment"
    hiddenForeignId="po_id" />
<script>
const tagURL = '{{ route("General.ajax.getTags") }}';
var get_itemUrl="{{ route('item.ajax.searchProduct') }}";
var result_product_calculationUrl="{{url('result_product_calculation')}}";
var vat_tax_detailsUrl="{{url('/vat_tax_details')}}";
var invoice_productsDeleteUrl="{{url('invoice_productsDelete')}}";
var invoice_saveUrl="{{url('/invoices/invoice_save')}}";
var token = '<?php echo csrf_token(); ?>'
</script>
@include('components.add-customer-modal')
@include('components.contact-modal')
@include('components.add-site-modal')
@include('components.job-title-model')
@include('components.customer-type-modal')
@include('components.add-project-modal')
@include('components.department-model')
@include('components.product-list')
@include('components.account-code')
@include('frontEnd.salesAndFinance.item.common.addproductmodal')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js"></script>
@include('components.region-model')
@include('frontEnd.salesAndFinance.jobs.layout.footer')
<script type="text/javascript" src="{{ url('public/js/salesFinance/invoice/invoice_add.js') }}"></script>