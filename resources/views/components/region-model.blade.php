<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title" id="thirdModalLabel">{{ $modalTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="{{ $formId }}">
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Region <span class="red-text">*</span></label>
                            <div class="col-sm-9">
                                <input type="hidden" name="region_id" id="region_id">
                                <input type="text" name="title" class="form-control editInput" id="{{ $inputId }}" value="" placeholder="Region">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select id="{{ $statusId }}" name="status" class="form-control editInput">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="pageTitleBtn">
                            <button type="button" class="profileDrop" id="{{ $saveButtonId }}">Save</button>
                            <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>