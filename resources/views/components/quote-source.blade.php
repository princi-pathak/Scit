<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="{{ $modalId }}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header terques-bg">
                    <h5 class="modal-title pupTitle">{{ $modalTitle }}</h5>
                    <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close" type="button"></button>
                </div>
                <div class="modal-body">
                    <form role="form" id="{{ $formId }}">
                        @csrf
                        <div><span id="error-message" class="error"></span></div>
                        <div class="row form-group">
                            <label class="col-lg-3 col-sm-3 col-form-label">Quote Source <span class="radStar ">*</span></label>
                            <div class="col-md-9">
                                <input type="hidden" name="quote_source_id" id="quote_source_id">
                                <input type="text" name="title" class="form-control editInput " placeholder="{{ $placeholderText }}" id="title">
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
                <div class="modal-footer">
                    <button type="button" class="btn profileDrop" id="{{ $saveButtonId }}">Save</button>
                    <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>