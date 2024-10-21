<style>
    .taxhidemessage{display:none}
    .taxhidemessagedanger{display:none}    
</style>

<div class="modal fade" id="uploadproductimagemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="uploadproductimagemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
    <div class="modal-content add_Customer">
        <div class="modal-header">
        <h5 class="modal-title fs-5" id="uploadproductimagemodalLabel">Add Image <span class="catname"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
            <div class="modal-body "> 
                <form class="row g-3 needs-validations" novalidate id="taxform">
                    @csrf
                    <div class="alert alert-success text-center taxsuccess taxhidemessage"></div>                              
                    <div class="alert alert-danger text-center taxsuccessdanger taxhidemessagedanger"></div>                                 
                <div class="contantbodypopup p-0">                                                                                                
                    <div class="mb-2 row">
                        <label for="taxratename"
                            class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                           <span>PPPPPPP</span>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputCity"
                            class="col-sm-3 col-form-label">File Name</label>
                        <div class="col-sm-9">
                            <input type="file"
                                class="form-control editInput"
                                id="tax_rate" name="tax_rate" value="">
                        </div>
                    </div>
                </div>                                        
            </div> <!-- end modal body -->
            <div class="modal-footer customer_Form_Popup">
                <input type="hidden" name="taxrateID" id="taxrateID">
                <input type="hidden" name="taxratetype" id="taxratetype">
                <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn profileDrop" id="taxratesave">Save</button>
            </form>                              
            </div>
        
    </div>
    </div>
</div>