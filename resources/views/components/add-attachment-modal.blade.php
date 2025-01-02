<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="{{ $purchaseModalId }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title pupTitle">{{ $modalTitle }}</h5>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close" type="button"></button>
            </div>
            <div id="attachment_messagse" class="mt-3"></div>
            <div class="modal-body">
                <form role="form" id="{{ $purchaseformId }}">
                    <input type="hidden" id="attachment_id" name="id">
                    <div><span id="error-message" class="error"></span></div>
                    <div class="row form-group">
                        <label class="col-lg-3 col-sm-3 col-form-label">{{ $refTitle }} Ref </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control-plaintext editInput" id="{{$refTitle}}_ref" value="" name="{{$refTitle}}_ref" readonly>
                            <input type="hidden" class="form-control editInput" id="{{ $hiddenForeignId }}" name="{{ $hiddenForeignId }}">
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <label class="col-lg-3 col-sm-3 col-form-label">Type</label>
                        <div class="col-md-9">
                        <?php $attachmentType = App\Models\AttachmentType::getActiveAttachmentType(Auth::user()->home_id);?>
                            <select name="attachment_type" id="{{ $typeId }}" class="form-control editInput">
                                <option value="" selected disabled>Please Select</option>
                                @foreach($attachmentType as $value)
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <label class="col-lg-3 col-sm-3 col-form-label">File Name <span class="radStar ">*</span></label>
                        <div class="col-md-9">
                            <input type="file" name="file" class="form-control editInput " placeholder="" id="{{ $selectfileName }}">
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <label class="col-lg-3 col-sm-3 col-form-label">Title</label>
                        <div class="col-md-9">
                            <input type="text" name="title" class="form-control editInput " placeholder="Title" id="{{ $inputTitle }}">
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <label class="col-lg-3 col-sm-3 col-form-label">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" class="form-control textareaInput" rows="4" placeholder="Description" id="{{ $inputDescription }}"></textarea>
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