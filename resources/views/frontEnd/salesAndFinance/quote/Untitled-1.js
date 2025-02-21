        // $('#AddQuoteButton').on('click', function() {
        //     var customer = document.getElementById('getCustomerList').value;
        //     if (customer === "") {
        //         alert('Please select the customer');
        //     } else {
        //         // getTags(document.getElementById('quoteTag'))
        //         // getRegions(document.getElementById('siteDeliveryRegions'));
        //         const selectCustomer = document.getElementById('getCustomerList');
        //         const selectedText = selectCustomer.options[selectCustomer.selectedIndex].text;
        //         document.getElementById('setCustomerNameInCustomerdetails').value = selectedText;
        //         // document.getElementById('yourQuoteSection').style.display = "none";
        //         document.getElementById('hideQuoteDiv').style.display = "block";
        //         // document.getElementById('hideCustomerDetails').style.display = "none";
        //         // document.getElementById('hideQuoteDetails').style.display = "block";
        //     }
        // });

        // $('#saveCustomerContactData').on('click', function() {
        //     var formData = $('#add_customer_contact_form').serialize();
        //     $.ajax({
        //         url: '{{ route("customer.ajax.SaveCustomerContactData") }}',
        //         method: 'POST',
        //         data: formData,
        //         success: function(response) {
        //             console.log(response);
        //             alert(response.message);
        //             setCustomerBillingData(response.lastid);
        //             $('#add_customer_contact_modal').modal('hide');
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // });

        // // Ajax Call for saving Customer Type
        // $('#saveCustomerSiteDetails').on('click', function() {
        //     var formData = $('#add_customer_site_details_form').serialize();
        //     $.ajax({
        //         url: '{{ route("customer.ajax.saveCustomerSiteAddress") }}',
        //         method: 'POST',
        //         data: formData,
        //         success: function(response) {
        //             alert(response.message);
        //             console.log(response.id);
        //             setSiteAddressDetails(response.id);
        //             // removeAddCustomerSiteAddress(document.getElementById('customerSiteDetails'),document.getElementById('customerSiteDelivery'), response.id);
        //             $('#add_site_address_modal').modal('hide');
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // });

        // $('#OpenAddCustomerContact').on('click', function() {
        //     getCustomerJobTitle(document.getElementById('customer_job_titile_id'));
        //     $('#add_customer_contact_modal').modal('show');
        // });

        // $('#openCustomerSiteAddress').on('click', function() {
        //     var customer = document.getElementById('getCustomerList').value;
        //     if (customer === "") {
        //         alert('Please select the customer');
        //     } else {
        //         getRegions(document.getElementById('getSiteAddressRegion'));
        //         getCountriesListWithNameCode(document.getElementById('siteAddressCountry'));
        //         getCustomerJobTitle(document.getElementById('siteJobTitle'));
        //         getCountriesList(document.getElementById('siteAddressMobileCode'));
        //         getCountriesList(document.getElementById('siteAddressTelephoneCode'));
        //         $('#add_site_address_modal').modal('show');
        //     }
        // });

        // $('#new_Attachment_open_model').on('click', function() {
        //     $('#new_Attachment_model').modal('show');
        // });

        // $('#saveAttachmentType').on('click', function(e) {
        //     let formData = new FormData($('#attachmentTypeForm')[0]);
        //     console.log(formData);

        //     $.ajax({
        //         url: '{{ route("quote.ajax.saveAttachmentData") }}', // Replace with your Laravel route URL
        //         type: 'POST',
        //         data: formData,
        //         contentType: false, // Required for FormData
        //         processData: false, // Required for FormData
        //         success: function(response) {
        //             // Handle success
        //             alert(response.data);
        //             console.log(response.id);
        //             $('#new_Attachment_model').modal('hide'); // Hide the modal
        //             getQuoteAttachments(response.id);
        //         },
        //         error: function(xhr) {
        //             // Handle error
        //             const errors = xhr.responseJSON.errors || {
        //                 message: xhr.responseJSON.message
        //             };
        //             let errorMessage = 'Error saving the attachment:\n';
        //             for (let key in errors) {
        //                 errorMessage += `${errors[key]}\n`;
        //             }
        //             alert(errorMessage);
        //         }
        //     });
        // });

        
        // $('#billingDetailContact').on('change', function() {
        //     var selected = document.getElementById('getCustomerList').value;
        //     console.log(selected);
        //     if ($(this).val() === selected) {
        //         getBillingDetailsData($(this).val());
        //     } else {
        //         setCustomerBillingData($(this).val());
        //     }
        // });

           // $.ajax({
    //     url: '{{ route("customer.ajax.getCustomerList") }}',
    //     success: function(response) {
    //         console.log(response.data);
    //         var get_customer_type = document.getElementById('getCustomerList');
    //         // get_customer_type.innerHTML = '';

    //         response.data.forEach(user => {
    //             const option = document.createElement('option');
    //             option.value = user.id;
    //             option.text = user.name;
    //             if (user.id == setCustomerId) {
    //                 option.selected = true; // Mark as selected
    //                 document.getElementById('setCustomerNameInTask').value = user.name;
    //                 document.getElementById('setCustomerNameInTimer').value = user.name;
    //             }
    //             get_customer_type.appendChild(option);
    //         });
    //     },
    //     error: function(xhr, status, error) {
    //         console.error(error);
    //     }
    // });