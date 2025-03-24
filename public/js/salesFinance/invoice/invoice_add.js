$(document).ready(function() {
    getRegions(document.getElementById('invoiceRegions'));
    getTags(document.getElementById('invoice_tags'))
});
function getTags(tags) {
    $.ajax({
        url: tagURL,
        method: 'GET',
        success: function(response) {
            console.log("jxcnjfjnfnk", response.data);
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

    CKEDITOR.replace('customer_notes', editor_config);
    CKEDITOR.replace('terms_notes', editor_config);
    CKEDITOR.replace('internal_notes', editor_config);
    //Text Editer

function get_modal(modal){
    var customer_id=$("#invoice_customer_id").val();
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