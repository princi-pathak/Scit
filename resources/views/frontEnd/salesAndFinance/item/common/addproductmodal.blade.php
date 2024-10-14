<style>
    .generate-button{
        height: 32px;
        padding: 0px 9px;
        background: #0877bd;
        border-color: #0877bd;
    }
    .generate-button:hover {
        background-color: #0877bd;
        border-color: #0877bd;
    }
</style>
<div class="modal fade" id="itemsAddProductModal" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" aria-labelledby="customerModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content add_Customer">
                            <div class="modal-header">
                                <h5 class="modal-title" id="customerModalLabel">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <div class="formDtail">
                                            <!-- <form action="" class="customerForm"> -->
                                            <div class="mb-2 row">
                                                <label for="inputName"
                                                    class="col-sm-4 col-form-label">Customer</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control editInput selectOptions"
                                                        id="getCustomerList">
                                                        <option>-All-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="productcategorylist" class="col-sm-4 col-form-label">Product
                                                    Category</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions"
                                                        id="productcategorylist">
                                                        <option>- Any Category -</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1 ps-0">
                                                    <a href="#!" class="formicon" id="productCetagoryPopup" onclick="additemsCatagoryModal(2)"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="productname" class="col-sm-4 col-form-label">Product
                                                    Name*</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control editInput"
                                                        id="productname" value="">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputProject" class="col-sm-4 col-form-label">Product
                                                    Type</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputCustomer">
                                                        <option value="1">Product</option>
                                                        <option value="2">Services</option>
                                                        <option value="3">Consumable</option>
                                                    </select>
                                                </div>
                                                {{-- <div class="col-sm-1 ps-0">
                                                    <a href="#!" class="formicon"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div> --}}
                                            </div>



                                            <div class="mb-2 row">
                                                <label for="inputEmail" class="col-sm-4 col-form-label">Product
                                                    Code </label>
                                                <div class="col-sm-5">                                                    
                                                    <input type="text" class="form-control editInput"
                                                        id="inputEmail" placeholder="Product Code" value="">
                                                </div>
                                                <div class="col-sm-1 ps-0">
                                                    <button class="btn btn-primary generate-button" id="generateproductcode">Generate</button>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputEmail" class="col-sm-4 col-form-label">Cost Price
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputEmail" value="">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputTelephone"
                                                    class="col-sm-4 col-form-label">Markup</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputTelephone" value="">
                                                </div>

                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputMobile" class="col-sm-4 col-form-label">Price
                                                    *</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputPrice" value="">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCounty"
                                                    class="col-sm-4 col-form-label">Description</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3"
                                                        placeholder="Description"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCounty" class="col-sm-4 col-form-label pt-0">
                                                    Show on Template                     
                                                </label>
                                                <div class="col-sm-8">
                                                    <span class="oNOfswich">
                                                        <input type="checkbox">
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- </form> -->
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <div class="formDtail">
                                            <form action="" class="">
                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-4 col-form-label">Bar
                                                        Code</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control editInput"
                                                            id="inputCity" value="Port Elizabeth">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-4 col-form-label">Sales
                                                        Tax Rate</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>None</option>
                                                            <option>Default</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 ps-0">
                                                        <a href="#!" class="formicon" id="openPopupButton">
                                                            <i class="fa-solid fa-square-plus"></i>
                                                        </a>
                                                    </div>


                                                    <!--Sales Tax Rate Popup -->

                                                    <div id="popup" class="popup">
                                                        <div class="popup-content">
                                                            <div class="popupTitle">
                                                                <span class="">Add Tax Rate</span>
                                                                <span class="close" id="closePopup">&times;</span>
                                                            </div>
                                                            <div class="contantbodypopup">
                                                                <form action="" class="customerForm">
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Tax
                                                                            Rate Name*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Tax
                                                                            Rate*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Status</label>
                                                                        <div class="col-sm-9">
                                                                            <select
                                                                                class="form-control editInput selectOptions"
                                                                                id="inputCustomer">
                                                                                <option> None </option>
                                                                                <option> Default </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">External
                                                                            Tax Code</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Expiry
                                                                            Date</label>
                                                                        <div class="col-sm-7">
                                                                            <input type="date"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <div class="popupF  customer_Form_Popup">

                                                                <button type="button"
                                                                    class="profileDrop">Save</button>
                                                                <button type="button" class="profileDrop">Save &
                                                                    Close</button>
                                                                <button type="button"
                                                                    class="profileDrop">Cancel</button>

                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!-- End off Sales Tax Rate Popup -->


                                                </div>

                                                <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-4 col-form-label">Purchase
                                                        Tax Rate</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>None</option>
                                                            <option>Default</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 ps-0">
                                                        <a href="#!" class="formicon" id="purchaseTaxRatePop">
                                                            <i class="fa-solid fa-square-plus"></i>
                                                        </a>
                                                    </div>

                                                    <!--Purchase Tax Rate Popup -->
                                                    <div id="purchasepopup" class="purchasepopup">
                                                        <div class="popup-content">
                                                            <div class="popupTitle">
                                                                <span class="">Purchase Tax Rate</span>
                                                                <span class="close"
                                                                    id="closePurchasePopup">&times;</span>
                                                            </div>
                                                            <div class="contantbodypopup">
                                                                <form action="" class="">
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Tax
                                                                            Rate Name*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Tax
                                                                            Rate*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Status</label>
                                                                        <div class="col-sm-9">
                                                                            <select
                                                                                class="form-control editInput selectOptions"
                                                                                id="inputCustomer">
                                                                                <option> None </option>
                                                                                <option> Default </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">External
                                                                            Tax Code</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Expiry
                                                                            Date</label>
                                                                        <div class="col-sm-7">
                                                                            <input type="date"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <div class="popupF  customer_Form_Popup">

                                                                <button type="button"
                                                                    class="profileDrop">Save</button>
                                                                <button type="button" class="profileDrop">Save &
                                                                    Close</button>
                                                                <button type="button"
                                                                    class="profileDrop">Cancel</button>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--End off Purchase Tax Rate Popup -->
                                                </div>

                                                <div class="mb-2 row">
                                                    <label for="inputAddress" class="col-sm-4 col-form-label">Nominal
                                                        Code
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control editInput"
                                                            id="inputCity" value="Port Elizabeth">
                                                    </div>
                                                </div>

                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-4 col-form-label">Sales
                                                        A/c Code</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>--Please Select--</option>
                                                            <option>United kingdom (+44)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-4 col-form-label">Purchase
                                                        A/c Code
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>--Please Select--</option>
                                                            <option>United kingdom (+44)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-4 col-form-label">Expense
                                                        A/c Code</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>--Please Select--</option>
                                                            <option>United kingdom (+44)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputCounty"
                                                        class="col-sm-4 col-form-label">Location</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control editInput"
                                                            id="location" placeholder="Location">
                                                    </div>
                                                </div>

                                                <div class="mb-2 row">
                                                    <label for="inputCity"
                                                        class="col-sm-4 col-form-label">Status</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>Active</option>
                                                            <option>United kingdom (+44)</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="mb-2 row">
                                                    <label for="inputName"
                                                        class="col-sm-4 col-form-label">Attachment</label>
                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control editInput"
                                                            id="inputName">
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="productDetailTable">
                                            <table class="table" id="containerA">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Supplier </th>
                                                        <th>Part Number</th>
                                                        <th>Cost Price</th>
                                                        <th>
                                                            <a href="#!" class="formicon" id="openPopupButton">
                                                                <i class="fa-solid fa-square-plus"></i>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- End row -->
                            </div>
                            <div class="modal-footer customer_Form_Popup">

                                <button type="button" class="profileDrop">Save</button>
                                <button type="button" class="profileDrop">Save &
                                    Close</button>
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
<script>
    var dataLoaded = false;
    $('#productcategorylist').click(function(){
        if (dataLoaded) return;
        var token = "<?= csrf_token() ?>";        
        $.ajax({
            type: 'POST',
            url: '{{ route('item.productcategorylist') }}',
            data: {
                _token: token
            },
            success: function(data) {
                console.log(data);
                var $select = $('#productcategorylist');
                $select.empty(); // Clear existing options

                // Loop through the data and append options to the select box
                $.each(data, function(index, category) {
                    $select.append($('<option>', {
                        value: category.id, // Assuming the id field
                        text: category.name // Assuming the name field
                    }));
                });
                dataLoaded = true;
            }

        });
            
    })
</script>
<script>
    var dataLoadeds = false;
    $('#getCustomerList').click(function(){
        if (dataLoadeds) return;
        var token = "<?= csrf_token() ?>"; 
        getCustomerList("getCustomerList"); 
        dataLoadeds = true;
    })
</script>
<script>
    $('#generateproductcode').click(function(){
        var token = "<?= csrf_token() ?>";
        var productname = $('#productname').val();       
        $.ajax({
            type: 'POST',
            url: '{{ route('item.generateproductcode') }}',
            data: {
                productname:productname,
                _token: token
            },
            success: function(data) {
                console.log(data);
                
            }

        });
    })
</script>