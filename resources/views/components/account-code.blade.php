<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
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
                            <label for="inputJobRef" class="col-sm-4 col-form-label">Name <span class="red_sorryText">*</span></label>
                            <div class="col-sm-8">
                                <input type="hidden" name="job_title_id" id="">
                                <input type="text" name="name" class="form-control editInput" id="{{ $inputId }}" >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-4 col-form-label">Departmental Code </label>
                            <div class="col-sm-8">
                                <input type="text" name="code" class="form-control editInput" id="{{ $inputId }}" >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJobRef" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
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