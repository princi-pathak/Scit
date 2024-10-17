<style>
    .generate-button {
        height: 32px;
        padding: 0px 9px;
        background: #0877bd;
        border-color: #0877bd;
    }

    .generate-button:hover {
        background-color: #0877bd;
        border-color: #0877bd;
    }
    .producthidemessage{display:none}
    .producthidemessagedanger{display:none}  
</style>
<div class="modal fade" id="itemsAddProductModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validationp" novalidate id="productform">
                    @csrf
                    <div class="alert alert-success text-center productsuccess producthidemessage"></div>                              
                    <div class="alert alert-danger text-center productsuccessdanger producthidemessagedanger"></div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="formDtail">
                            
                            <div class="mb-2 row">
                                <label for="inputName" class="col-sm-4 col-form-label">Customer</label>
                                <div class="col-sm-8">
                                    <select class="form-control editInput selectOptions" id="getCustomerList" name="customer_only" required>
                                        <option>-All-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="productcategorylist" class="col-sm-4 col-form-label">Product
                                    Category</label>
                                <div class="col-sm-7">
                                    <select class="form-control editInput selectOptions" id="productcategorylist" name="cat_id">
                                        <option>- Any Category -</option>
                                    </select>
                                </div>
                                <div class="col-sm-1 ps-0">
                                    <a href="#!" class="formicon" id="productCetagoryPopup"
                                        onclick="additemsCatagoryModal(2)"><i class="fa-solid fa-square-plus"></i></a>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="productname" class="col-sm-4 col-form-label">Product
                                    Name*</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control editInput" name="product_name" id="productname"
                                        value="">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="inputProject" class="col-sm-4 col-form-label">Product
                                    Type</label>
                                <div class="col-sm-7">
                                    <select class="form-control editInput selectOptions" id="product_type" name="product_type">
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
                                <label for="product_code" class="col-sm-4 col-form-label">Product
                                    Code </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control editInput" id="product_code"
                                        placeholder="Product Code" name="product_code" value="">

                                </div>
                                <div class="col-sm-1 ps-0">
                                    <button type="button" class="btn btn-primary generate-button"
                                        id="generateproductcode">Generate</button>
                                </div>
                                <span class="text-danger productcode_error"></span>

                            </div>
                            <div class="mb-2 row">
                                <label for="cost_price" class="col-sm-4 col-form-label">Cost Price
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control editInput" id="cost_price" name="cost_price" value="">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="margin" class="col-sm-4 col-form-label">Markup</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control editInput" id="margin" name="margin"
                                        value="">
                                </div>

                            </div>

                            <div class="mb-2 row">
                                <label for="inputMobile" class="col-sm-4 col-form-label">Price
                                    *</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control editInput" id="price" name="price" value="">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="inputCounty" class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control textareaInput" name="address" id="description" name="description" rows="3"
                                        placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="inputCounty" class="col-sm-4 col-form-label pt-0">
                                    Show on Template
                                </label>
                                <div class="col-sm-8">
                                    <span class="oNOfswich">
                                        <input type="checkbox" name="show_temp" value="1" checked>
                                    </span>
                                </div>
                            </div>

                            
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="formDtail">
                            
                                <div class="mb-2 row">
                                    <label for="bar_code" class="col-sm-4 col-form-label">Bar
                                        Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="bar_code"
                                            value="" name="bar_code">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-4 col-form-label">Sales
                                        Tax Rate</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" id="salestax"
                                            onclick="taxratelist(1)" name="tax_rate">
                                            <option>-Please Select-</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1 ps-0">
                                        <a href="#!" class="formicon" id="" onclick="taxrate(1)">
                                            <i class="fa-solid fa-square-plus"></i>
                                        </a>
                                    </div>

                                </div>

                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-4 col-form-label">Purchase
                                        Tax Rate</label>
                                    <div class="col-sm-7">
                                        <select class="form-control editInput selectOptions" id="purchasetax"
                                            onclick="taxratelist(2)" name="tax_id">
                                            <option>-Please Select-</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1 ps-0">
                                        <a href="#!" class="formicon" id="purchaseTaxRatePop"
                                            onclick="taxrate(2)">
                                            <i class="fa-solid fa-square-plus"></i>
                                        </a>
                                    </div>


                                </div>

                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-4 col-form-label">Nominal
                                        Code
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="nominal_code"
                                            value="" name="nominal_code">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-4 col-form-label">Sales
                                        A/c Code</label>
                                    <div class="col-sm-8">
                                        <select class="form-control editInput selectOptions" id="salesaccountcode"
                                            onclick="accountcode(1)" name="sales_acc_code">
                                            <option>--Please Select--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-4 col-form-label">Purchase
                                        A/c Code
                                    </label>
                                    <div class="col-sm-8">
                                        <select class="form-control editInput selectOptions" id="purchaseaccountcode"
                                            onclick="accountcode(2)" name="purchase_acc_code">
                                            <option>--Please Select--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-4 col-form-label">Expense
                                        A/c Code</label>
                                    <div class="col-sm-8">
                                        <select class="form-control editInput selectOptions" id="Expenseaccountcode"
                                            onclick="accountcode(3)" name="expense_acc_code">
                                            <option>--Please Select--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="location" class="col-sm-4 col-form-label">Location</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="location"
                                            placeholder="Location" name="">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label for="status" class="col-sm-4 col-form-label">Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control editInput selectOptions" id="status" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="mb-2 row">
                                    <label for="attachment" class="col-sm-4 col-form-label">Attachment</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control editInput" id="attachment" name="attachment">
                                    </div>
                                </div>

                            
                        </div>
                        {{-- <div class="productDetailTable">
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
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div> <!-- End row -->
            </div>
            <div class="modal-footer customer_Form_Popup">
                <input type="hidden" name="productID" id="productID">
                <input type="hidden" name="producttype" id="producttype">
                <button type="submit" class="profileDrop">Save</button>                
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    (function () {
'use strict';

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validationp');

// Loop over them and prevent submission
Array.prototype.slice.call(forms)
    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            // Check if the form is valid
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                // Prevent the default form submission
                event.preventDefault();

                // Here you can handle form submission using AJAX
                var formData = new FormData(form);
                var producttype = $('#producttype').val();
                var productname = $('#productname').val();
                fetch('{{ route("item.saveproductdata") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                   console.log(data);
                   //taxsuccess taxhidemessage   taxsuccessdanger taxhidemessagedanger
                   if(data.success==0){
                    $('.producthidemessagedanger').css('display','block');
                    $('.productsuccessdanger').text(data.message);
                    $(".productsuccessdanger").show('slow' , 'linear').delay(3000).fadeOut();
                   }else{
                    $('.producthidemessage').css('display','block');
                    $('.productsuccess').text(data.message);
                    $(".productsuccess").show('slow' , 'linear').delay(3000).fadeOut(function(){
                        if(producttype==1){
                            //location.reload();
                        }
                        
                    });
                   }
                    // Show success message
                    //alert('Form submitted successfully!'); // Replace with your own success message display logic
                })
                .catch(error => {
                    // Handle error
                    //console.error('Error:', error);
                    //alert('There was an error submitting the form.');
                    $('.productsuccessdanger').text('There was an error submitting the form.');
                });
            }

            form.classList.add('was-validated');
        }, false);
    });
})();
</script>
@include('frontEnd.salesAndFinance.item.common.addtaxrate')



<script>
    var dataLoaded = false;
    $('#productcategorylist').click(function() {
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
    $('#getCustomerList').click(function() {
        if (dataLoadeds) return;
        var token = "<?= csrf_token() ?>";
        getCustomerList("getCustomerList");
        dataLoadeds = true;
    })
</script>
<script>
    $('#generateproductcode').click(function() {
        var token = "<?= csrf_token() ?>";
        var productname = $('#productname').val();
        if (!productname) {
            $('.productcode_error').text("Please insert a product name");
            return false;
        }
        $('.productcode_error').text("");
        var get_name = hasWhiteSpace(productname);
        console.log(get_name);
        if (get_name == true) {
            var names = productname.split(' ');
            var fname = names[0].charAt(0);
            var lname = names[1].charAt(0);
            shortname = fname + lname;
        }
        if (get_name == false) {
            if (productname.length > 1) {
                fname = productname.slice(0, 2);
            } else {
                fname = productname.charAt(0);
            }

            shortname = fname;
        }
        // if (productname.includes(' ')) {
        //     return 'Double string (contains spaces)';
        // } else {
        //     return 'Single string (no spaces)';
        // }       
        $.ajax({
            type: 'POST',
            url: '{{ route('item.generateproductcode') }}',
            data: {
                productname: shortname,
                _token: token
            },
            success: function(data) {
                console.log(data);
                $("#product_code").val(data);

            }

        });
    })

    function hasWhiteSpace(s) {
        return (/\s/).test(s);
    }
</script>
<script>
    //salestax
    var dataLoadedstax = false;
    var dataLoadedptax = false;

    function taxratelist(th) {
        if (th == 1) {
            if (dataLoadedstax) return;
        } else if (th == 2) {
            if (dataLoadedptax) return;
        }

        var token = "<?= csrf_token() ?>";
        $.ajax({
            type: 'POST',
            url: '{{ route('item.taxratelist') }}',
            data: {
                _token: token
            },
            success: function(data) {
                console.log(data);
                if (th == 1) {
                    var $select = $('#salestax');
                    $select.empty(); // Clear existing options

                    // Loop through the data and append options to the select box
                    $.each(data, function(index, category) {
                        $select.append($('<option>', {
                            value: category.id, // Assuming the id field
                            text: category.name // Assuming the name field
                        }));
                    });
                    dataLoadedstax = true;
                } else if (th == 2) {
                    var $select = $('#purchasetax');
                    $select.empty(); // Clear existing options

                    // Loop through the data and append options to the select box
                    $.each(data, function(index, category) {
                        $select.append($('<option>', {
                            value: category.id, // Assuming the id field
                            text: category.name // Assuming the name field
                        }));
                    });
                    dataLoadedptax = true;
                }

            }

        });
    }
</script>
<script>
    var dataLoadedsac = false;
    var dataLoadedpac = false;
    var dataLoadedeac = false;

    function accountcode(th) {
        if (th == 1) {
            if (dataLoadedsac) return;
        } else if (th == 2) {
            if (dataLoadedpac) return;
        } else if (th == 3) {
            if (dataLoadedeac) return;
        }
        var token = "<?= csrf_token() ?>";
        $.ajax({
            type: 'POST',
            url: '{{ route('item.account_code') }}',
            data: {
                _token: token
            },
            success: function(data) {
                console.log(data);
                //salesaccountcode  purchaseaccountcode  Expenseaccountcode
                if (th == 1) {
                    var $select = $('#salesaccountcode');
                    $select.empty(); // Clear existing options

                    // Loop through the data and append options to the select box
                    $.each(data, function(index, category) {
                        $select.append($('<option>', {
                            value: category.id, // Assuming the id field
                            text: category.name // Assuming the name field
                        }));
                    });
                    dataLoadedsac = true;
                } else if (th == 2) {
                    var $select = $('#purchaseaccountcode');
                    $select.empty(); // Clear existing options

                    // Loop through the data and append options to the select box
                    $.each(data, function(index, category) {
                        $select.append($('<option>', {
                            value: category.id, // Assuming the id field
                            text: category.name // Assuming the name field
                        }));
                    });
                    dataLoadedpac = true;
                } else if (th == 3) {
                    var $select = $('#Expenseaccountcode');
                    $select.empty(); // Clear existing options

                    // Loop through the data and append options to the select box
                    $.each(data, function(index, category) {
                        $select.append($('<option>', {
                            value: category.id, // Assuming the id field
                            text: category.name // Assuming the name field
                        }));
                    });
                    dataLoadedeac = true;
                }

            }

        });
    }
</script>
