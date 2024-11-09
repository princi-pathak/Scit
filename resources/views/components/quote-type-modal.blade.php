<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="{{ $modalId }}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title pupTitle">{{ $modalTitle }}</h5>
                    <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close" type="button"></button>
                </div>
                <div class="modal-body">
                    <form role="form" id="{{ $formId }}">
                        @csrf
                        <div><span id="error-message" class="error"></span></div>
                        <div class="row form-group">
                            <label class="col-lg-3 col-sm-3 col-form-label">Quote Type <span class="radStar ">*</span></label>
                            <div class="col-md-9">
                                <input type="hidden" name="quote_type_id" id="quote_type_id">
                                <input type="text" name="title" class="form-control editInput " placeholder="Quote Type" id="title">
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <label class="col-lg-3 col-sm-3 col-form-label">Number of days</label>
                            <div class="col-md-9">
                                <input type="text" name="number_of_days" class="form-control editInput " placeholder="Number of days" id="number_of_days" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <label class="col-lg-3 col-sm-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <select name="status" id="modale_status" class="form-control editInput">
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn profileDrop" id="{{ $saveButtonId }}">Save</button>
                    <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>