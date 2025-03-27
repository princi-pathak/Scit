$(document).ready(function() {
    getRegions(document.getElementById('invoiceRegions'));
    getTags(document.getElementById('invoice_tags'))
});
function getTags(tags) {
    $.ajax({
        url: tagURL,
        method: 'GET',
        success: function(response) {
            // console.log("jxcnjfjnfnk", response.data);
            tags.innerHTML = '';
            response.data.forEach(user => {
                const option = document.createElement('option');
                option.value = user.id;
                option.text = user.title;
                tags.appendChild(option);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
function bgColorChange(button) {
    $('.bgColour').removeAttr('style');
    $("#recurringHideShow").hide();
    $("#taskHideShow").hide();
    if (button == 1) {
        $("#taskHideShow").show();
        $("#task_active_inactive").css('background-color', '#474747');
    } else {
        $("#recurringHideShow").show();
        $("#recurring_active_inactive").css('background-color', '#474747');
    }
}
    //Text Editer

    var editor_config = {
        toolbar: [{
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
            },
            {
                name: 'format',
                items: ['Format']
            },
            {
                name: 'paragraph',
                items: ['Indent', 'Outdent', '-', 'BulletedList', 'NumberedList']
            },
            {
                name: 'link',
                items: ['Link', 'Unlink']
            },
            {
                name: 'undo',
                items: ['Undo', 'Redo']
            }
        ],
    };

    CKEDITOR.replace('invoice_customer_notes', editor_config);
    CKEDITOR.replace('invoice_terms_notes', editor_config);
    CKEDITOR.replace('invoice_internal_notes', editor_config);
    //Text Editer

function get_modal(modal){
    var customer_id=$("#invoice_customer_id").val();
    var invoice_id='';
    if(modal == 1){  
        $("#AddCustomerModal")[0].reset();
        $("#job_title_plusIcon").hide();
        $("#customerPop").modal('show');
    }else if(modal ==2 && customer_id !=null){
        if (customer_id == '' || customer_id == null) {
            $("#HideShowFieldText").hide();
            $("#HideShowFieldSelect").show();
        } else {
            $("#HideShowFieldText").show();
            $("#HideShowFieldSelect").hide();
        }
        $("#project_form")[0].reset();
        $("#project_modal").modal('show');
    }else if(modal ==3 && customer_id !=null){
        $("#contact_form")[0].reset();
        $('#contactModalLabel').text("Add Customer Contact");
        $('#contactLabel').text("Customer");
        $('#userType').val(1);
        $('#contact_customer_id').val(customer_id);
        $("#contact_billing_radio").hide();
        $("#contact_modal").modal('show');
    }else if(modal ==4 && customer_id !=null){
        itemsAddProductModal(1);
    }else if(modal == 5){
        $("#vattaxrateform")[0].reset();
        $("#VatTaxRateModal").modal('show');
    }else if (modal == 6) {
        if (invoice_id == '') {
            if (confirm("Invoice details should be saved before attaching any files. Do you want to save the invoice now?")) {
                save_all_data();
            }
        } else {
            $("#purchase_Attachmentform")[0].reset();
            $("#Purchase_ref").val(purchase_ref);
            $("#po_id").val(invoice_id);
            $("#purchase_model").modal('show');
        }
    }else{
        alert("Please Select Customer");
        return false;
    }
}
function open_customer_type_modal() {
    $('#cutomer_type_modal').modal('show');
}
$("#invoice_customer_id").on('change',function(){
    $("#invoice_project_id").removeAttr('disabled');
    $("#invoice_contact_id").removeAttr('disabled');
    $("#invoice_site_id").removeAttr('disabled');
});

function openProductmodal() {
    var customer_id=$("#invoice_customer_id").val();
    if (customer_id == null) {
        alert("Please Select Customer first");
        return false;
    } else {
        openProductListModal();
    }
}
$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#search-product').on('keyup', function() {
        let query = $(this).val();
        const divList = document.querySelector('.parent-container');

        if (query === '') {
            divList.innerHTML = '';
        }

        // Make an AJAX call only if query length > 2
        if (query.length > 2) {
            $.ajax({
                url: get_itemUrl, // Laravel route
                method: 'GET',
                data: {
                    query: query
                },
                success: function(response) {
                    // console.log(response);
                    // $('#results').html(response);
                    divList.innerHTML = "";
                    const div = document.createElement('div');
                    div.className = 'container'; // Optional: Add a class to the div for styling

                    // Step 2: Create a ul (unordered list)
                    const ul = document.createElement('ul');
                    ul.id = "productList";
                    // Step 3: Loop through the data and create li (list item) for each entry
                    response.forEach(item => {
                        const li = document.createElement('li'); // Create a new li element
                        li.textContent = item.product_name; // Set the text of the li item
                        li.id = item.id;
                        li.className = "editInput";
                        ul.appendChild(li); // Append the li to the ul
                        // const hr = document.createElement('hr');
                        // hr.className='dropdown-divider';
                        // ul.appendChild(hr);
                    });

                    // Step 4: Append the ul to the div
                    div.appendChild(ul);

                    // Step 5: Append the div to the parent container in the HTML
                    divList.appendChild(div);

                    ul.addEventListener('click', function(event) {
                        divList.innerHTML = '';
                        document.getElementById('search-product').value = '';
                        // Check if the clicked element is an <li> (to avoid triggering on other child elements)
                        if (event.target.tagName.toLowerCase() === 'li') {
                            const selectedId = event.target.id; // Get the ID of the clicked <li>
                            console.log('Selected Product ID:', selectedId); // Print the ID of the selected product
                            getProductData(selectedId);
                        }
                    });

                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#results').empty(); // Clear results if the input is empty
        }
    });

});
function getProductData(selectedId) {
    selectProduct(selectedId);
}
function selectProduct(id) {
    var key = 'order';
    $.ajax({
        type: "POST",
        url: result_product_calculationUrl,
        data: {
            id: id,
            key: key,
            _token: token
        },
        success: function(data) {
            // console.log(data);return false;
            const tableBody = document.querySelector(`#result tbody`);

            if (data.length === 0) {
                const noDataRow = document.createElement('tr');
                noDataRow.id = 'EmptyError'
                const noDataCell = document.createElement('td');

                noDataCell.setAttribute('colspan', 4);
                noDataCell.textContent = 'No products found';
                noDataCell.style.textAlign = 'center';

                noDataRow.appendChild(noDataCell);
                tableBody.appendChild(noDataRow);
            } else {
                const emptyErrorRow = document.getElementById('EmptyError');
                if (emptyErrorRow) {
                    emptyErrorRow.remove();
                }
                const row = document.createElement('tr');
                
                const codeCell = document.createElement('td');
                // codeCell.textContent = data.product_detail.product_code;
                const inputCode = document.createElement('input');
                inputCode.className = 'product_code form_control';
                inputCode.name = 'product_code[]';
                inputCode.value = '';
                codeCell.appendChild(inputCode);
                row.appendChild(codeCell);
                
                const nameCell = document.createElement('td');
                nameCell.innerHTML = data.product_detail.product_name;
                row.appendChild(nameCell);

                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.className = 'product_id';
                hiddenInput.name = 'product_id[]';
                hiddenInput.value = data.product_detail.id;
                row.appendChild(hiddenInput);

                const descriptionCell = document.createElement('td');
                const inputDescription = document.createElement('textarea');
                inputDescription.className = 'description form_control';
                inputDescription.setAttribute('rows', '1');
                inputDescription.name = 'description[]';
                // inputDescription.value = data.product_detail.description;
                inputDescription.value = '';
                inputDescription.addEventListener('input', function() {
                    auto_grow(this);
                });
                descriptionCell.appendChild(inputDescription);
                row.appendChild(descriptionCell);

                const dropdownAccountCode = document.createElement('td');
                const selectDropdownAccountCode = document.createElement('select');
                selectDropdownAccountCode.className = 'accountCode_id form_control';
                selectDropdownAccountCode.name = 'accountCode_id[]';

                const optionsAccountCode = data.accountCode;

                const defaultOptionAccountCode = document.createElement('option');
                defaultOptionAccountCode.value = '';
                defaultOptionAccountCode.text = '-No Department-';
                selectDropdownAccountCode.appendChild(defaultOptionAccountCode);

                optionsAccountCode.forEach(optionJob => {
                    const optAccountCode = document.createElement('option');
                    optAccountCode.value = optionJob.id;
                    optAccountCode.textContent = optionJob.name;
                    selectDropdownAccountCode.appendChild(optAccountCode);
                });
                dropdownAccountCode.appendChild(selectDropdownAccountCode);
                row.appendChild(dropdownAccountCode);

                const qtyCell = document.createElement('td');
                const inputQty = document.createElement('input');
                inputQty.type = 'text';
                inputQty.className = 'qty input50 form_control';
                inputQty.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9.]/g, '');
                    if ((this.value.match(/\./g) || []).length > 1) {
                        this.value = this.value.slice(0, -1);
                    }
                    updateAmount(row);
                });
                inputQty.name = 'qty[]';
                inputQty.value = '1';
                qtyCell.appendChild(inputQty);
                row.appendChild(qtyCell);

                const priceCell = document.createElement('td');
                const inputPrice = document.createElement('input');
                inputPrice.type = 'text';
                inputPrice.className = 'product_price input50 form_control';
                // inputPrice.addEventListener('input', function() {
                //     updateAmount(row);
                // });
                inputPrice.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9.]/g, '');
                    if ((this.value.match(/\./g) || []).length > 1) {
                        this.value = this.value.slice(0, -1);
                    }
                    updateAmount(row);
                });
                inputPrice.name = 'price[]';
                inputPrice.value = data.product_detail.price;
                priceCell.appendChild(inputPrice);
                row.appendChild(priceCell);
                const calcIconCell = document.createElement('td');
                const calcIcon = document.createElement('i');
                calcIcon.className = 'fa fa-calculator fs-4';
                calcIcon.style='cursor: pointer;color: #c4e3f3;';
                calcIcon.name = 'icon[]';
                calcIconCell.appendChild(calcIcon);
                row.appendChild(calcIconCell);

                const amountCell = document.createElement('td');
                amountCell.innerHTML = '£' + parseFloat(data.product_detail.price).toFixed(2);
                amountCell.className = "price";
                row.appendChild(amountCell);

                const discountCell = document.createElement('td');
                const discountDiv = document.createElement('div');
                discountDiv.className = " d-flex gap-2";
                discountCell.className = "discount";
                const input = document.createElement('input');
                input.type = "text";
                input.className = "discount-input form-control";
                input.value = "0";
                input.name = "discount[]";

                const select = document.createElement('select');
                select.className = "discount-select form_control";
                select.name = "discount_type[]";

                const option1 = document.createElement('option');
                option1.value = "1";
                option1.textContent = "%";

                const option2 = document.createElement('option');
                option2.value = "2";
                option2.textContent = "£";
                select.appendChild(option1);
                select.appendChild(option2);
                discountDiv.appendChild(input);
                discountDiv.appendChild(select);
                discountCell.appendChild(discountDiv);
                row.appendChild(discountCell);

                const dropdownVat = document.createElement('td');
                const selectDropdownVat = document.createElement('select');
                selectDropdownVat.addEventListener('change', function() {
                    // alert(`You selected: ${this.options[this.selectedIndex].text}`);
                    getIdVat($(this).val(), row);
                });
                selectDropdownVat.name = 'vat_id[]';
                selectDropdownVat.className = 'vat_id form_control';
                const optionsVat = data.tax;
                var tax_rate = '00';
                optionsVat.forEach(optionVat => {
                    const optVat = document.createElement('option');
                    optVat.value = optionVat.id;
                    if (optionVat.id == data.product_detail.tax_rate) {
                        tax_rate = optionVat.tax_rate;
                        optVat.setAttribute("selected", "selected");
                    }
                    optVat.textContent = optionVat.name;
                    selectDropdownVat.appendChild(optVat);
                });
                const inputVatRate = document.createElement('input');
                inputVatRate.type = 'hidden';
                inputVatRate.className = 'vat_ratePercentage';
                inputVatRate.name = 'vat_ratePercentage[]';
                inputVatRate.value = tax_rate;
                dropdownVat.appendChild(inputVatRate);
                dropdownVat.appendChild(selectDropdownVat);
                row.appendChild(dropdownVat);

                const vatCell = document.createElement('td');
                const inputVat = document.createElement('input');
                inputVat.type = 'text';
                inputVat.className = 'vat form_control';
                inputVat.style = "max-width:70px;";
                inputVat.setAttribute('disabled', 'disabled');
                inputVat.addEventListener('input', function() {
                    updateAmount(row);
                });
                inputVat.name = 'vat[]';
                inputVat.value = parseFloat(tax_rate).toFixed(2);
                vatCell.appendChild(inputVat);
                row.appendChild(vatCell);

                const delveriQTYCell = document.createElement('td');
                delveriQTYCell.innerHTML = '-';
                delveriQTYCell.className = 'text-center';
                row.appendChild(delveriQTYCell);

                const spanCheckboxCell = document.createElement('td');
                const spanCheckbox = document.createElement('span');
                spanCheckbox.className = 'oNOfswich';

                const innerCheckbox = document.createElement('input');
                innerCheckbox.type = 'checkbox';
                innerCheckbox.name = 'show_temp';
                innerCheckbox.id = 'show_temp';
                innerCheckbox.value = 1;
                innerCheckbox.checked = true;

                spanCheckbox.appendChild(innerCheckbox);
                spanCheckboxCell.appendChild(spanCheckbox);
                row.appendChild(spanCheckboxCell);

                const deleteCell = document.createElement('td');
                deleteCell.innerHTML = '<i class="fas fa-times fa-2x deleteRow" style="color: red;cursor: pointer;"></i>';
                deleteCell.addEventListener('click', function() {
                    removeRow(this);
                });
                row.appendChild(deleteCell);

                tableBody.appendChild(row);
                updateAmount(row)
                $("#product_calculation").show();
            }

        }
    });
}
function auto_grow(element) {
    console.log("Here")
    element.style.height = "5px";
    element.style.height = (element.scrollHeight) + "px";
}
var check_paid_amount = 0;

    function updateAmount(row, paid_amount = 0) {
        console.log(row)
        // const priceInput = row.querySelector('.price');
        // alert(typeof(paid_amount))

        if (paid_amount != 0) {
            check_paid_amount = paid_amount;
        }
        const priceInput = row.querySelector('.product_price');
        const qtyInput = row.querySelector('.qty');
        const amountCell = row.querySelector('td:nth-last-child(3)');
        const price = parseFloat(priceInput.value) || 0;
        const qty = parseInt(qtyInput.value) || 1;
        const amount = price * qty;
        amountCell.textContent = '£' + amount.toFixed(2);
        const vat_ratePercentage = row.querySelector('.vat_ratePercentage').value;
        const vat = row.querySelector('.vat');
        const percentage = amount * vat_ratePercentage / 100;
        // alert(percentage)
        vat.value = percentage.toFixed(2);

        var calculation = 0;
        $('.price').each(function() {
            const priceText = $(this).text();
            const numericValue = parseFloat(priceText.replace(/[^\d.]/g, ''));
            // console.log(typeof(numericValue));
            calculation = calculation + numericValue;
        });
        var vat_amount = 0;
        $('.vat').each(function() {
            const vat = $(this).val();
            vat_amount = vat_amount + Number(vat);
        });
        totalAmount = calculation;
        // console.log(typeof(vat_amount));
        // document.getElementById('GrandTotalAmount').innerHTML='$'+totalAmount.toFixed(2);
        $("#productPrice").val(totalAmount.toFixed(2));
        $("#exact_vat").text('£' + totalAmount.toFixed(2));
        $("#vat").text('£' + vat_amount.toFixed(2));
        var total_vat = totalAmount + vat_amount;
        $("#total_vat").text('£' + total_vat.toFixed(2));
        var outstanding_amount = total_vat - check_paid_amount;
        $("#outstanding_vat").text('£' + outstanding_amount.toFixed(2));
    }
    function getIdVat(vat_id, row, paid_amount = 0) {
        $.ajax({
            type: "POST",
            url: vat_tax_detailsUrl,
            data: {
                vat_id: vat_id,
                _token: token
            },
            success: function(response) {
                // console.log(response);
                if (response) {
                    const vat_value = Number(response.data);
                    const vat_ratePercentage = row.querySelector('.vat_ratePercentage').value = vat_value;
                    // var td=row.querySelector('td:nth-last-child(4)');
                    // var input = td.querySelector('.vat');
                    // // console.log(typeof(vat_value));
                    // input.value = vat_value.toFixed(2) || 0;
                    updateAmount(row, paid_amount);
                } else {
                    alert("Something went wrong");
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
            }
        });
    }
    function removeRow(button, id = null) {
        // console.log(button);
        const table = document.getElementById("result");
        const tbody = table.querySelector("tbody");
        const rowCount = tbody ? tbody.rows.length : 0;
        if (rowCount <= 1) {
            $("#product_calculation").hide();
        }
        var row = button.parentNode;

        if (id) {
            var token = '<?php echo csrf_token(); ?>'
            $.ajax({
                type: "POST",
                url: invoice_productsDeleteUrl,
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    // console.log(data);
                    if (data.success != true) {
                        alert("Something went wrong! Please try later");
                        return false;
                    } else {
                        row.parentNode.removeChild(row);
                        updateAmount(row);
                    }
                }
            });
        } else {
            row.parentNode.removeChild(row);
            updateAmount(row);
        }
    }
    function invoice_check_email() {
        var email = $('#invoice_email').val();
        validRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (email.search(validRegExp) == -1) {
            $('#invoiceemailErr').text("Please enter correct email address");
            return false;
        } else {
            $('#invoiceemailErr').text("");
        }
    }
    function save_all_data() {
        for (var instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var emailErr = $("#invoiceemailErr").text();
        $('.InvoicecheckError').each(function() {
            if ($(this).val() === '' || $(this).val() == null) {
                $(this).css('border', '1px solid red');
                $(this).focus();
                return false;
            } else {
                $(this).css('border', '');
            }
        });
        var invoice_telephone = $("#invoice_telephone").val();
        var invoice_mobile = $("#invoice_mobile").val();
        var invoice_siteTelephone = $("#invoice_siteTelephone").val();
        var invoice_site_mobile = $("#invoice_site_mobile").val();
        if (invoice_telephone != '' && invoice_telephone.length != 10) {
            $("#InvoiceTelephoneErr").show();
            return false;
        } else if (invoice_mobile != '' && invoice_mobile.length != 10) {
            $("#InvoiceTelephoneErr").hide();
            $("#InvoiceMobileErr").show();
            return false;
        } else if (invoice_siteTelephone != '' && invoice_siteTelephone.length != 10) {
            $("#InvoiceTelephoneErr").hide();
            $("#InvoiceMobileErr").hide();
            $("#InvoiceSiteTelephoneErr").show();
            return false;
        } else if (invoice_site_mobile != '' && invoice_site_mobile.length != 10) {
            $("#InvoiceTelephoneErr").hide();
            $("#InvoiceMobileErr").hide();
            $("#InvoiceSiteTelephoneErr").hide();
            $("#InvoiceSiteMobileErr").show();
            return false;
        } else if (emailErr.length > 0) {
            $("#InvoiceTelephoneErr").hide();
            $("#InvoiceMobileErr").hide();
            $("#InvoiceSiteTelephoneErr").hide();
            $("#InvoiceSiteMobileErr").hide();
            return false;
        } else {
            $("#InvoiceTelephoneErr").hide();
            $("#InvoiceMobileErr").hide();
            $("#InvoiceSiteTelephoneErr").hide();
            $("#InvoiceSiteMobileErr").hide();
            $.ajax({
                type: "POST",
                url: invoice_saveUrl,
                data: new FormData($("#all_data")[0]),
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.vali_error) {
                        alert(response.vali_error);
                        $(window).scrollTop(0);
                        return false;
                    } else if (response.success === true) {
                        $(window).scrollTop(0);
                        $('#message_save').addClass('success-message').text(response.message).show();
                        setTimeout(function() {
                            $('#message_save').removeClass('success-message').text('').hide();
                            // var id = parseInt(response.data.id, 10) || 0;
                            // var encodedId = btoa(unescape(encodeURIComponent(id)));
                            // location.href = '<?php echo url('purchase_order_edit'); ?>?key=' + encodedId;
                            location.href = redirectUrl
                        }, 3000);
                    } else if (response.success === false) {
                        $('#message_save').addClass('error-message').text(response.message).show();
                        setTimeout(function() {
                            $('#error-message').text('').fadeOut();
                        }, 3000);
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + error);
                }
            });
        }
    }
    var invoice_name = '';
    var invoicesite_companyName = '';
    var invoice_address = '';
    var invoice_city = '';
    var invoice_county = '';
    var invoice_Postcode = '';
    var invoice_telephoneCode;
    var invoice_telephone = '';
    var invoice_mobile_code;
    var invoice_mobile = '';
    var invoice_email = '';
    var invoice_siteName = '';
    var invoicesite_companyName = '';

    function get_customer_details() {
        var customer_id = $("#invoice_customer_id").val();
        $.ajax({
            type: "POST",
            url: get_customer_details_frontUrl,
            data: {
                customer_id: customer_id,
                _token: token
            },
            success: function(data) {
                console.log(data);
                // return false;
                if (data.customers && data.customers.length > 0) {
                    var customerData = data.customers[0];
                    var project = '<option value="0" selected disabled>None</option>';
                    if (customerData.customer_project && Array.isArray(customerData.customer_project)) {
                        for (let i = 0; i < customerData.customer_project.length; i++) {
                            project += '<option value="' + customerData.customer_project[i].id + '">' + customerData.customer_project[i].project_name + '</option>';
                        }
                    }
                    document.getElementById('invoice_project_id').innerHTML = project;

                    var contact = '<option value="0" selected disabled>None</option>';
                    if (customerData.additional_contact && Array.isArray(customerData.additional_contact)) {
                        for (let i = 0; i < customerData.additional_contact.length; i++) {
                            contact += '<option value="' + customerData.additional_contact[i].id + '">' + customerData.additional_contact[i].contact_name + '</option>';
                        }
                    }
                    document.getElementById('invoice_contact_id').innerHTML = contact;

                    var site = '<option value="0">Same as customer</option>';
                    if (customerData.sites && Array.isArray(customerData.sites)) {
                        for (let i = 0; i < customerData.sites.length; i++) {
                            site += '<option value="' + customerData.sites[i].id + '">' + customerData.sites[i].site_name + '</option>';
                        }
                    }
                    document.getElementById('invoice_site_id').innerHTML = site;
                    $("#project_customer_name").text(customerData.name);
                    $("#site_customer_name").text(customerData.name);
                    invoice_name = customerData.name;
                    invoicesite_companyName = customerData.contact_name;
                    invoice_address = customerData.address;
                    invoice_city = customerData.city;
                    invoice_county = customerData.country;
                    invoice_Postcode = customerData.postal_code;
                    invoice_telephoneCode = customerData.telephone_country_code ?? 230;
                    invoice_telephone = customerData.telephone;
                    invoice_mobile_code = customerData.mobile_country_code ?? 230;
                    invoice_mobile = customerData.mobile;
                    invoice_siteName = customerData.name;
                    invoice_email = customerData.email;
                    $("#invoice_name").val(invoice_name);
                    $("#invoice_address").val(invoice_address);
                    $("#invoice_city").val(invoice_city);
                    $("#invoice_county").val(invoice_county);
                    $("#invoice_Postcode").val(invoice_Postcode);
                    $("#invoice_telephoneCode").val(invoice_telephoneCode);
                    $("#invoice_telephone").val(invoice_telephone);
                    $("#invoice_mobile_code").val(invoice_mobile_code);
                    $("#invoice_mobile").val(invoice_mobile);
                    $("#invoice_email").val(invoice_email);
                    $("#invoice_siteName").val(invoice_siteName);
                    $("#invoicesite_companyName").val(invoicesite_companyName);
                    $("#invoice_site_address").val(invoice_address);
                    $("#invoice_site_city").val(invoice_city);
                    $("#invoice_site_county").val(invoice_county);
                    $("#invoice_site_postcode").val(invoice_Postcode);
                    $("#invoice_siteTelephoneCode").val(invoice_telephoneCode);
                    $("#invoice_siteTelephone").val(invoice_telephone);
                    $("#invoice_siteMobileCode").val(invoice_mobile_code);
                    $("#invoice_site_mobile").val(invoice_mobile);

                    // $('#invoice_project_id').removeAttr('disabled');
                    // $('#invoice_site_id').removeAttr('disabled');
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    function siteDetail() {
        var id = $("#invoice_site_id").val();
        $.ajax({
            url: getCustomerSiteDetailsUrl,
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response.data);
                // return false;
                if (id == 0) {
                    $("#invoice_siteName").val(invoice_siteName);
                    $("#invoicesite_companyName").val(invoicesite_companyName);
                    $("#invoice_site_address").val(invoice_address);
                    $("#invoice_site_city").val(invoice_city);
                    $("#invoice_site_county").val(invoice_county);
                    $("#invoice_site_postcode").val(invoice_Postcode);
                    $("#invoice_siteTelephoneCode").val(invoice_telephoneCode);
                    $("#invoice_siteTelephone").val(invoice_telephone);
                    $("#invoice_siteMobileCode").val(invoice_mobile_code);
                    $("#invoice_site_mobile").val(invoice_mobile);
                } else {
                    $("#invoice_siteName").val(response.data[0].contact_name);
                    $("#invoicesite_companyName").val(response.data[0].company_name);
                    $("#invoice_site_address").val(response.data[0].address);
                    $("#invoice_site_city").val(response.data[0].city);
                    $("#invoice_site_county").val(response.data[0].country);
                    $("#invoice_site_postcode").val(response.data[0].post_code);
                    $("#invoice_siteTelephoneCode").val(response.data[0].telephone_country_code ?? 230);
                    $("#invoice_siteTelephone").val(response.data[0].telephone);
                    $("#invoice_siteMobileCode").val(response.data[0].mobile_country_code ?? 230);
                    $("#invoice_site_mobile").val(response.data[0].mobile);
                }

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }