@include('frontEnd.jobs.layout.header')
@section('title',' Add Leads')
<style>
    button.profileDrop.reDesignBtn {
    border: 0;
}
</style>
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

<section class="home_section_cont px-3 pt-0">
    <div class="container-fluid">
        <form class="customerForm"  method="Post" action="{{ $action }}" id="{{ $form_id }}">
        @csrf
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>New Leads</h3>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <div class="pageTitleBtn">
                    <!-- <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> <input type="submit" value="Save"></a> -->
                    <button type="submit" class="profileDrop reDesignBtn"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <a href="#" class="profileDrop"> Action <i class="fa-solid fa-arrow-down"></i>
                        </span></a>
                </div>
            </div>
        </div>
        <!--  -->

        <div class="row">
            <div class="col-lg-12">
                <div class="newJobForm card">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Lead Details</h4>
                                   
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Lead Ref.</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="lead_id" value="{{ (isset($lead->id)) ? $lead->id : '' }}">
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
                                            <!-- <input type="text"  id="staticEmail"> -->
                                        </div>

                                    </div><!-- End off Customer -->
                                    <div class="mb-3 row">
                                        <label for="inputProject" class="col-sm-3 col-form-label">Source</label>
                                        <div class="col-sm-9">
                                            <select name="source" id="inputCustomer" class="form-control editInput selectOptions">
                                                <option value="0">None</option>
                                                @foreach($sources as $value)
                                                    <option value="{{ $value->id }}"  {{ isset($lead->source) && $lead->source == $value->id ? 'selected' : '' }} >{{ $value->title }}</option>
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
                                                    <option value="{{ $value->id }}" @if($value->id == 6) disabled @endif   {{ isset($lead->status) && $lead->status == $value->id ? 'selected' : '' }} >{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Preferred date call</label>
                                        <div class="col-sm-3">
                                            <input type="date" name="prefer_date" class="form-control editInput" value="{{ (isset($lead->prefer_date)) ? $lead->prefer_date : '' }}"id="inputName">
                                        </div>
                                        <div class="col-sm-1"><label class="col-form-label">To</label></div>
                                        <div class="col-sm-2">
                                            <input type="time" name="prefer_time" class="form-control editInput"  value="{{ (isset($lead->prefer_time)) ? $lead->prefer_time : '' }}" id="inputName">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="inputContact" class="col-form-label">Next 30 days</label>
                                        </div>
                                    </div>

                                <!-- </form> -->
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle">Data Fields</h4>
                                <!-- <form action="" class="customerForm"> -->


                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Full Name *</label>
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
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Email Address *</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" class="form-control editInput" id="inputMobile" placeholder="Email Address" value="{{ (isset($lead->email)) ? $lead->email : '' }}">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Telephone *</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="telephone"  class="form-control editInput" id="inputEmail" placeholder="Telephone " value="{{ (isset($lead->telephone)) ? $lead->telephone : '' }}">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mobile" class="form-control editInput" id="inputMobile" placeholder="Mobile" value="{{ (isset($lead->mobile)) ? $lead->mobile : '' }}">
                                        </div>
                                    </div>


                                <!-- </form> -->
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="formDtail">
                                <h4 class="contTitle p-2"></h4>
                                <!-- <form action="" class="customerForm"> -->
                                    <div class="mb-3 row">
                                        <label for="inputJobRef" class="col-sm-3 col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="website"  class="form-control editInput" id="inputJobRef" value="{{ (isset($lead->website)) ? $lead->website : '' }}" placeholder="Website">
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
                                            <input type="text" name="city" class="form-control editInput textareaInput" id="inputCustomer" placeholder="City" value="{{ (isset($lead->city)) ? $lead->city : '' }}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPurchase" class="col-sm-3 col-form-label">County </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="country"  class="form-control editInput textareaInput" id="inputPurchase" placeholder="County" value="{{ (isset($lead->country)) ? $lead->country : '' }}">
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

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="pageTitleBtn">
                    <!-- <a href="#" class="profileDrop"><i class="fa-solid fa-floppy-disk"></i> -->
                        <!-- <input type="submit" class="profileDrop" value="Save"> -->
                        <button type="submit" class="profileDrop reDesignBtn"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <!-- </a> -->
                    <a href="#" class="profileDrop"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <a href="#" class="profileDrop"> Action <i class="fa-solid fa-arrow-down"></i>
                        </span></a>
                </div>
            </div>
        </div>
        <!--  -->
        </form>   
    </div>
</section>


@include('frontEnd.jobs.layout.footer')