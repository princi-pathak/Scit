document.querySelectorAll('.openModalBtn').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const action = this.getAttribute('data-action');
        const council_tax_id = document.getElementById('council_tax_id');
        const modalTitle = document.getElementById('modalTitle');
        const flat_num = document.getElementById('flat_num');
        const address = document.getElementById('address');
        const postcode = document.getElementById('postcode');
        const council = document.getElementById('council');
        const additional_notes = document.getElementById('additional_notes');
        const amount_paid = document.getElementById('amount_paid');
        const bill_period_end_date = document.getElementById('bill_period_end_date');
        const bill_period_start_date = document.getElementById('bill_period_start_date');
        const last_bill_date = document.getElementById('last_bill_date');
        const account_number = document.getElementById('account_number');
        const exemptyes = document.getElementById('exemptyes');
        const exemptno = document.getElementById('exemptno');
        const occupancy = document.getElementById('occupancy');
        const ownedByOmegayes = document.getElementById('ownedByOmegayes');
        const ownedByOmegano = document.getElementById('ownedByOmegano');
        const no_of_bedrooms = document.getElementById('no_of_bedrooms');

        if (action === 'add') {
            modalTitle.textContent = 'Add Council Tax';
        } else if (action === 'edit') {
            modalTitle.textContent = 'Edit Councli Tax';
            council_tax_id.value = this.getAttribute('data-id');
            flat_num.value = this.getAttribute('data-flat-number');
            address.value = this.getAttribute('data-address');
            additional_notes.value = this.getAttribute('data-additional');
            postcode.value = this.getAttribute('data-post_code');
            council.value = this.getAttribute('data-council');
            no_of_bedrooms.value = this.getAttribute('data-no_of_bedrooms');
            if (this.getAttribute('data-owned_by_omega') == 1) {
                ownedByOmegayes.checked = true;
            } else if (this.getAttribute('data-owned_by_omega') == 0) {
                ownedByOmegano.checked = true;
            }

            occupancy.value = this.getAttribute('data-occupancy');
            if (this.getAttribute('data-exempt') == 1) {
                exemptno.checked = true;
            } else if (this.getAttribute('data-exempt') == 0) {
                exemptyes.checked = true;
            }
            account_number.value = this.getAttribute('data-account_number');
            last_bill_date.value = this.getAttribute('data-last_bill_date');
            bill_period_start_date.value = this.getAttribute('data-bill_period_start_date');
            bill_period_end_date.value = this.getAttribute('data-bill_period_end_date');
            amount_paid.value = this.getAttribute('data-amount_paid');
        }

        $('#AddCouncilTax').modal('show');
    });
});

function validateCouncilTaxForm() {
    let isValid = true;
    $('.text-danger').remove(); // Clear previous errors

    // Helper to show error
    function showError(field, message) {
        isValid = false;
        field.after(`<span class="text-danger">${message}</span>`);
    }

    // Validate each required field
    const address = $('[name="address"]');
    if (!address.val().trim()) showError(address, 'The address field is required.');

    const postCode = $('[name="post_code"]');
    if (!postCode.val().trim()) showError(postCode, 'The post code field is required.');

    const council = $('[name="council"]');
    if (!council.val().trim()) showError(council, 'The council field is required.');

    const accountNumber = $('[name="account_number"]');
    if (!accountNumber.val().trim()) showError(accountNumber, 'The account number field is required.');

    const ownedByOmega = $('[name="owned_by_omega"]:checked');
    if (ownedByOmega.length === 0) showError($('[name="owned_by_omega"]').last(), 'The owned by omega field is required.');

    const exempt = $('[name="exempt"]:checked');
    if (exempt.length === 0) showError($('[name="exempt"]').last(), 'The exempt field is required.');

    return isValid;
}


$(document).ready(function () {
    $("#saveCouncilTax").on("click", function (e) {
        // alert("hii");
        e.preventDefault(); // Prevent default form submission

        if (!validateCouncilTaxForm()) {
            return false; // Stop if validation fails
        }

        console.log($('#addCouncilTaxForm').serialize());
        $.ajax({
            url: saveData, // Laravel route or API endpoint
            method: "POST",
            data: $('#addCouncilTaxForm').serialize(),
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.success) {
                    alert("Success: " + response.message);
                    // alert("Data saved successfully!");
                    $("#AddCouncilTax").modal("hide"); // Hide modal
                    $("#addCouncilTaxForm")[0].reset(); // Reset form
                    location.reload();
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function (xhr) {
                // alert("Something went wrong. Please try again.");
                if (xhr.status === 422) {
                    // Validation error
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';

                    // Clear old errors first
                    $('.text-danger').remove();

                    $.each(errors, function (key, value) {
                        // Display message under each input field
                        let inputField = $(`[name="${key}"]`);
                        if (inputField.length) {
                            inputField.after(`<span class="text-danger">${value[0]}</span>`);
                        }

                        // Collect all messages for optional alert box
                        errorMessages += value[0] + "\n";
                    });

                    // Optional: show all errors in a single alert box
                    alert("Please fix the following errors:\n" + errorMessages);
                } else {
                    alert("Something went wrong. Please try again.");
                }
            }
        });
    });
});
$(document).on('click', '.deleteBtn', function () {
    var id = $(this).data('id');

    if (confirm('Are you sure you want to delete this record?')) {
        $.ajax({
            url: deleteURL + id,
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // for Laravel CSRF protection
            },
            success: function (response) {
                alert('Record deleted successfully!');
                location.reload();
            },
            error: function (xhr) {
                alert('Something went wrong.');
            }
        });
    }
});

$(document).ready(function() {
    // Last Bill date 
    $('#last_bill_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
        container: '#purchase_day_book_form'
    });

    $('#openCalendarLastBillBtn').click(function() {
        $('#last_bill_date').focus();
    });

    // Bill Period Start Date 
    $('#bill_period_start_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
        container: '#purchase_day_book_form'
    });

    $('#openCalendarBillPeriodStartBtn').click(function() {
        $('#bill_period_start_date').focus();
    });

    // Bill Period End Date 
    $('#bill_period_end_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
        container: '#purchase_day_book_form'
    });

    $('#openCalendarBillPeriodEndBtn').click(function() {
        $('#bill_period_end_date').focus();
    });
});