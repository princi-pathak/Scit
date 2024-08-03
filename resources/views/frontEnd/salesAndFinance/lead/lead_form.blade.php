@include('frontEnd.jobs.layout.header')
@section('title',' Add Leads')
<link rel="stylesheet" href="{{ url('public/css/salesFinance/custom_lead.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<?php
if (isset($lead)) {
    $action   = route('lead.store');
    $task     = "Edit";
    $form_id  = 'edit_leads_form';
    $readonly = '';
} else {
    $action  = route('lead.store');
    $task    = "Add";
    $form_id = 'add_leads_form';
}
?>

<section class="main_section_page px-3 pt-0">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>New Leads</h3>
                </div>
            </div>
            <!-- <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                    <div class="pageTitleBtn">
                        <button type="submit" class="profileDrop reDesignBtn"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                        <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                        <a href="#" class="profileDrop"> Action <i class="fa-solid fa-arrow-down"></i></a>
                    </div>
                </div> -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="customerForm" method="Post" action="{{ $action }}" id="add_leads_form">
                    @csrf
                    <div class="newJobForm card">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="formDtail">
                                    <h4 class="contTitle">Lead Details</h4>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Lead Ref.</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="lead_id" id="lead_id" value="{{ (isset($lead->id)) ? $lead->id : '' }}">
                                            <input type="hidden" name="customer_id" value="{{ (isset($lead->customer_id)) ? $lead->customer_id : '' }}">
                                            <input type="text" name="lead_ref" class="form-control-plaintext editInput" id="inputName" placeholder="Auto Generate" value="{{ (isset($lead->lead_ref)) ? $lead->lead_ref : '' }}" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Assign To</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" name="assign_to" id="assign_to">
                                                <option value="0">-Not Assigned-</option>
                                                @foreach($users as $value)
                                                <option value="{{ $value->id }}" {{ isset($lead->assign_to) && $lead->assign_to  == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- End off Customer -->
                                    <div class="mb-3 row">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Source</label>
                                        <div class="col-sm-9">
                                            <select name="source" id="inputCustomer" class="form-control editInput selectOptions">
                                                <option value="0">None</option>
                                                @foreach($sources as $value)
                                                <option value="{{ $value->id }}" {{ isset($lead->source) && $lead->source == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputContact" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="inputCustomer" name="status">
                                                <option>Default</option>
                                                @foreach($status as $value)
                                                <option value="{{ $value->id }}" @if($value->id == 6) disabled @endif {{ isset($lead->status) && $lead->status == $value->id ? 'selected' : '' }} >{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Preferred date call</label>
                                        <div class="col-sm-3">
                                            <input type="date" name="prefer_date" class="form-control editInput" value="{{ (isset($lead->prefer_date)) ? $lead->prefer_date : '' }}" id="inputName">
                                        </div>
                                        <div class="col-sm-1"><label class="col-form-label">To</label></div>
                                        <div class="col-sm-2">
                                            <input type="time" name="prefer_time" class="form-control editInput" value="{{ (isset($lead->prefer_time)) ? $lead->prefer_time : '' }}" id="inputName">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="inputContact" class="col-form-label">Next 30 days</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="formDtail">
                                    <h4 class="contTitle">Data Fields</h4>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Full Name <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="name" id="inputName" placeholder="Full Name" value="{{ (isset($lead->contact_name)) ? $lead->contact_name : '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Company Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="company_name" id="inputEmail" placeholder="Company Name" value="{{ (isset($lead->name)) ? $lead->name : '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Email Address <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" class="form-control editInput" id="inputMobile" placeholder="Email Address" value="{{ (isset($lead->email)) ? $lead->email : '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Telephone <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="telephone" class="form-control editInput" id="inputEmail" placeholder="Telephone " value="{{ (isset($lead->telephone)) ? $lead->telephone : '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mobile" class="form-control editInput" id="inputMobile" placeholder="Mobile" value="{{ (isset($lead->mobile)) ? $lead->mobile : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="formDtail">
                                    <h4 class="contTitle p-2"></h4>
                                    <div class="mb-3 row">
                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="website" class="form-control editInput" id="inputJobRef" value="{{ (isset($lead->website)) ? $lead->website : '' }}" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3" placeholder="Address">{{ (isset($lead->address)) ? $lead->address : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputCustomer" class="col-sm-3 col-form-label">City </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="city" class="form-control editInput textareaInput" id="inputCustomer" placeholder="City" value="{{ (isset($lead->city)) ? $lead->city : '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">County </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="country" class="form-control editInput textareaInput" id="inputPurchase" placeholder="County" value="{{ (isset($lead->country)) ? $lead->country : '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">Postcode </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="postal_code" class="form-control editInput textareaInput" id="inputPurchase" placeholder="Postcode" value="{{ (isset($lead->postal_code)) ? $lead->postal_code : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End  off newJobForm -->
                </form>
                <div class="newJobForm mt-4" id="hiddenDiv">
                    <label class="upperlineTitle">Extra Information</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="extraInformationTab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-Notes-tab" data-bs-toggle="tab" data-bs-target="#nav-Notes" type="button" role="tab" aria-controls="nav-Notes" aria-selected="true">Notes</button>

                                        <button class="nav-link" id="nav-Tasks-tab" data-bs-toggle="tab" data-bs-target="#nav-Tasks" type="button" role="tab" aria-controls="nav-Tasks" aria-selected="false">Tasks</button>

                                        <button class="nav-link" id="nav-attachments-tab" data-bs-toggle="tab" data-bs-target="#nav-attachments" type="button" role="tab" aria-controls="nav-attachments" aria-selected="false">Attechmants</button>
                                        <!-- <button class="nav-link" id="nav-attechmants-tab" type="button" data-bs-toggle="modal" data-bs-target="#attachmentsPopup">Attechmants</button> -->

                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-Notes" role="tabpanel" aria-labelledby="nav-Notes-tab" tabindex="0">
                                        <div class="tabheadingTitle">
                                            <h3>Notes - </h3>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="inputCountry" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control editInput" id="notes_type" name="notes_type">
                                                        @if(isset($notes_type))
                                                            @foreach($notes_type as $value)
                                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="plusandText">
                                                        <a href="#!" class="formicon" data-bs-toggle="modal" data-bs-target="#notesModel"><i class="fa-solid fa-square-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7 mt-3">
                                                    <textarea class="form-control textareaInput" name="notes" id="notes" rows="3" ></textarea>
                                                </div>
                                                <div class="col-sm-3 mt-3">
                                                    <div class="jobsection">
                                                        <button type="button" id="saveLeadNotes" class="profileDrop">Save Notes</button>

                                                        <!-- <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save Notes</a> -->
                                                    </div>
                                                </div>

                                                <!-- Button trigger modal -->

                                                <!-- Modal -->
                                                <div class="modal fade" id="notesPopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">History Type - Add</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form action="" class="customerForm">

                                                                    <div class="mb-3 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">History Type<span class="radStar">*</span></label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputName" placeholder="Auto generate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Type</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>Genral</option>
                                                                                <option>Customer-2</option>
                                                                                <option>Customer-3</option>
                                                                            </select>
                                                                            <!-- <input type="text"  id="staticEmail"> -->
                                                                        </div>

                                                                    </div><!-- End off Customer -->
                                                                </form>



                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="pageTitleBtn p-0">
                                                                    <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                                                                    <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save & Close </a>
                                                                    <a href="#" class="profileDrop" data-bs-dismiss="modal"> Close</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- ENd col-9 -->
                                        </div>
                                        <div class="tab-pane fade" id="nav-Tasks" role="tabpanel" aria-labelledby="nav-Tasks-tab" tabindex="0">
                                            <div class="tabheadingTitle">
                                                <h3>Tasks - </h3>
                                                <a href="#" class="profileDrop ms-3" data-bs-toggle="modal" data-bs-target="#tasksPopup"><i class="fa-solid fa-floppy-disk"></i> New Tasks</a>
                                            </div>
                                            <div class="col-sm-12">

                                                <!-- Modal -->
                                                <div class="modal fade" id="tasksPopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Tasks</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form action="" class="customerForm">

                                                                    <div class="mb-3 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">Leads Ref.<span class="radStar">*</span></label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputName" placeholder="Auto generate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Tasks User<span class="radStar">*</span></label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>Genral</option>
                                                                                <option>Customer-2</option>
                                                                                <option>Customer-3</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Tasks Type<span class="radStar">*</span></label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                                <option>Genral</option>
                                                                                <option>Customer-2</option>
                                                                                <option>Customer-3</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="inputCustomer" class="col-sm-3 col-form-label">Date<span class="radStar">*</span></label>
                                                                        <div class="col-sm-4">
                                                                            <input type="date" class="form-control editInput" id="inputName">
                                                                        </div>
                                                                        <div class="col-sm-1 text-center">
                                                                            <i class="fa fa-calendar-days"></i>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <input type="time" class="form-control editInput" id="inputName">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">Title<span class="radStar">*</span></label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputName" placeholder="Auto generate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">Contact Name</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputName" placeholder="Auto generate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">Contact Phone</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control editInput" id="inputName" placeholder="Auto generate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">Notify?</label>
                                                                        <div class="col-sm-2 d-flex">
                                                                            <input type="checkbox" class="editInput" id="notify" placeholder="Auto generate">
                                                                            <label for="notify" class="col-form-label ps-3">Yes, On</label>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <input type="date" class="form-control editInput" id="date">
                                                                        </div>
                                                                        <div class="col-sm-1 text-center">
                                                                            <i class="fa fa-calendar-days"></i>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <input type="time" class="form-control editInput" id="time">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label for="inputName" class="col-sm-3 col-form-label">Notes</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3" placeholder="75 Cope Road Mall Park USA"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>



                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="pageTitleBtn p-0">
                                                                    <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                                                                    <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save & Close </a>
                                                                    <a href="#" class="profileDrop" data-bs-dismiss="modal"> Close</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="productDetailTable mt-3">
                                                    <table class="table" id="containerA">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i') }}</td>
                                                                <td>{{ $value->home_id }}</td>
                                                                <td>{{ $value->title }}</td>
                                                                <td>{{ $value->notes }}</td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                                <td>...</td>
                                                            </tr>
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Button trigger modal -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="notesModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">History Type - Add</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" id="lead_notes_type_form">
                                                                <div class="mb-3 row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">History Type*</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" name="title" id="title">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Type</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control editInput selectOptions" id="status" name="status">
                                                                            <option value="1">Active</option>
                                                                            <option value="0">Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!-- End off Customer -->
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="pageTitleBtn p-0">
                                                                <button type="button" class="profileDrop" id="addNotesType">Save</button>
                                                                <button type="button" class="profileDrop">Save & Close</button>
                                                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal End -->
                                        </div><!-- ENd col-9 -->
                                    </div>
                                    <div class="tab-pane fade" id="nav-Tasks" role="tabpanel" aria-labelledby="nav-Tasks-tab" tabindex="0">
                                        <div class="tabheadingTitle">
                                            <h3>Tasks - </h3>
                                            <a href="#" class="profileDrop ms-3" data-bs-toggle="modal" data-bs-target="#tasksPopup"><i class="fa-solid fa-floppy-disk"></i> New Tasks</a>
                                        </div>
                                        <div class="col-sm-12">

                                            <!-- Modal -->
                                            <div class="modal fade" id="tasksPopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Tasks</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="" class="customerForm">

                                                                <div class="mb-3 row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">Leads Ref.*</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputName" placeholder="Auto generate">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <label for="inputCustomer" class="col-sm-3 col-form-label">Tasks User*</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control editInput selectOptions" id="inputCustomer">
                                                                            <option>Genral</option>
                                                                            <option>Customer-2</option>
                                                                            <option>Customer-3</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="inputCustomer" class="col-sm-3 col-form-label">File Name<span class="radStar">*</span></label>
                                                                        <div class="col-sm-9">
                                                                        <!-- <canvas id="canv1"></canvas> -->
                                                                        <p class="uploadImg">
                                                                            <i class="fa fa-cloud-upload"></i>
                                                                            <input type="file" multiple="false" accept="image/*" id="finput" onchange="upload()">
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">Title</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control editInput" id="inputName" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">Description
                                                                        (max 500 characters)</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3" placeholder="Address"></textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="pageTitleBtn p-0">
                                                                <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                                                                <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> Save & Close </a>
                                                                <a href="#" class="profileDrop" data-bs-dismiss="modal"> Close</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="productDetailTable mt-3">
                                                <table class="table" id="containerA">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th># </th>
                                                            <th>Date </th>
                                                            <th>User</th>
                                                            <th>Tasks Type </th>
                                                            <th>Title </th>
                                                            <th>Contact Name </th>
                                                            <th>Contact Phone </th>
                                                            <th>Notify </th>
                                                            <th>Notes </th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>.</td>
                                                            <td>.</td>
                                                            <td>.</td>
                                                            <td>.</td>
                                                            <td>.</td>
                                                            <td>.</td>
                                                            <td>.</td>
                                                            <td>.</td>
                                                            <td>.</td>
                                                            <td>
                                                                <div class="nav-item dropdown tableActionBtn">
                                                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown">
                                                                        Action
                                                                    </a>
                                                                    <div class="dropdown-menu fade-up m-0">
                                                                        <a href="#" class="dropdown-item">Products</a>
                                                                        <a href="#" class="dropdown-item">Our Team</a>
                                                                        <a href="#" class="dropdown-item">Testimonial</a>
                                                                        <a href="#" class="dropdown-item">Our Works</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="pageTitleBtn">
                    <button type="submit" class="profileDrop reDesignBtn" id="submit_main_form"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <a href="#" class="profileDrop"> Action <i class="fa-solid fa-arrow-down"></i></a>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
<script>
    var addNotesTypeURL = '{{ route("lead.ajax.saveLeadNoteType") }}';
    var saveLeadNotes = '{{ route("lead.ajax.saveLeadNotes") }}';

</script>
@include('frontEnd.jobs.layout.footer')
<script type="text/javascript" src="{{ url('public/js/salesFinance/customLeadForm.js') }}"></script>