<style>    
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #ffffff;
        background-color: #0877bd;
        border-color: var(--bs-nav-tabs-link-active-border-color);
    }
    .cataloguefrm{
        border: 1px solid #0877bd;
        border-radius: 5px;
    }
    .nav-tabs .nav-link {
        border: var(--bs-nav-tabs-border-width) solid #0877bd;
        color: #0877bd;
        border-bottom: none;
    }
    .cataloguetable {
        font-size: 12px;
        /* color: #fff; */
        /* background-color: #EBEBEB !important;
        border-color: #32383e; */
    }
    .cataloguetable th {
        font-weight: 600 !important;
        color: #333333;
        text-align: left;
        background-color: #EBEBEB !important;
        padding: 5px 3px !important;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: #999999;
        border-top-width: 1px;
        border-top-style: solid;
        border-top-color: #999;
        margin: 0;
        font-size: 14px;
    }
    .modal-content.add_customer.add_catalogue {
        width: 120%;
    }
    .catalogueItemCustomPrice{
        width: 65px;
        text-align: right
    }
    .catalogueitemDelete i{
        color: red;
        font-size: 22px;
        font-weight: 700;
    }
    #nav-profile-tab{
        display: none
    }
</style>
<div class="modal fade" id="itemsAddCatalogueModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_customer add_catalogue">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Catalogues</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Catalogue</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Catalogue Price</button>
                      
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row cataloguefrm m-1">                            
                            <div class="formDtail mt-2">
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Catalogue Name<em>*</em></label>
                                    <div class="col-sm-10">                                        
                                        <input type="text" class="form-control editInput" name="product_name" id="productname" value="" required>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control textareaInput"  id="description" name="description" rows="3"
                                        placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Type</label>
                                    <div class="col-sm-10">
                                        <select class="form-control editInput selectOptions" id="status" name="status">
                                            <option value="1">Catalogue Pricing Only</option>
                                            <option value="2">Mixed Pricing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control editInput selectOptions" id="status" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row cataloguefrm m-1">                            
                            <div class="formDtail mt-2">
                                <div class="jobsection">
                                    <a href="#" class="profileDrop" >Add Item</a>
                                </div>
                                <div class="border mt-2"></div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="maimTable">
                                            <table class="table cataloguetable" cellspacing="0" width="100%">
                                                <thead class="thead-dark">
                                                  <tr>
                                                    <th scope="col" width="25%">Code</th>
                                                    <th scope="col" width="45%">Name</th>
                                                    <th scope="col" class="text-end">Default Price</th>
                                                    <th scope="col" class="text-center">Catalogue Price</th>
                                                    <th scope="col"></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td scope="row">1</td>
                                                    <td>Mark</td>
                                                    <td class="text-end">Otto</td>
                                                    <td class="text-center"><input type="text" value="300.00" name="item_catalogue_item_prices[]" class="text item_price numericOnly catalogueItemCustomPrice" data-item_id="11" tabindex="1"></td>
                                                    <td><a href="#" class="catalogueitemDelete" data-rand_id="" tabindex="-1"><i class="fa-solid fa-xmark"></i></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row">2</td>
                                                    <td>Jacob</td>
                                                    <td class="text-end">Thornton</td>
                                                    <td class="text-center"><input type="text" value="300.00" name="item_catalogue_item_prices[]" class="text item_price numericOnly catalogueItemCustomPrice" data-item_id="11" tabindex="1"></td>
                                                    <td><a href="#" class="catalogueitemDelete" data-rand_id="" tabindex="-1"><i class="fa-solid fa-xmark"></i></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row">3</td>
                                                    <td>Larry</td>
                                                    <td class="text-end">the Bird</td>
                                                    <td class="text-center"><input type="text" value="300.00" name="item_catalogue_item_prices[]" class="text item_price numericOnly catalogueItemCustomPrice" data-item_id="11" tabindex="1"></td>
                                                    <td><a href="#" class="catalogueitemDelete" data-rand_id="" tabindex="-1"><i class="fa-solid fa-xmark"></i></a></td>
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
                
            <div class="modal-footer customer_Form_Popup">
                <input type="hidden" name="productID" id="productID">
                <input type="hidden" name="producttype" id="producttype">
                <button type="submit" class="profileDrop">Save & Continue</button>                
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>            
            </div>
        </div>
    </div>
</div>
<script>
    function itemsAddCatalogueModal(th,id=null){        
        // $("#productform")[0].reset();        
        // $(".needs-validationp").removeClass('was-validated');
        // $('#producttype').val(th);
        $('#itemsAddCatalogueModal').modal('show');
    }
</script>

