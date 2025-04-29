$(document).ready(function () {
    $(".deleteBtn").on("click", function () {
        let salesBookId = $(this).data("id"); // Get ID from button
        let row = $("#row-" + salesBookId); // Select the row

        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: salesDayBook + "/"+ salesBookId,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.success) {
                        // row.find("td:nth-child(7)").text(response.deleted_at); // Update deleted_at column
                        alert(response.message);
                        window.location.reload();
                    }
                },
                error: function () {
                    alert("Something went wrong!");
                },
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    let vatInput = document.getElementById('vat_input');
    let netAmountInput = document.getElementById('net_amount');
    let vatAmountInput = document.getElementById('vat_amount');
    let grossAmountInput = document.getElementById('gross_amount');

    function calculateTax() {
        let netAmount = parseFloat(netAmountInput.value) || 0;
        let selectedOption = vatInput.options[vatInput.selectedIndex];
        let taxRate = parseFloat(selectedOption.getAttribute('data-tax-rate')) || 0;

        let vatAmount = (netAmount * taxRate) / 100;
        let grossAmount = netAmount + vatAmount;

        vatAmountInput.value = vatAmount.toFixed(2);
        grossAmountInput.value = grossAmount.toFixed(2);
    }

    // Trigger calculation on VAT change or Net Amount change
    vatInput.addEventListener('change', calculateTax);
    netAmountInput.addEventListener('input', calculateTax);
});


function getCustomerList() {
    $.ajax({
        url: customerList,
        method: 'GET',
        success: function (response) {
            console.log("Customer list data:", response.data);
            const selectedCustomerId = document.getElementById('customer_id').value;
            const customerSelect = document.getElementById('getCustomerList');
            customerSelect.innerHTML = '<option>Select Customer</option>'; 

            if (Array.isArray(response.data)) {
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = user.name;
                    if (selectedCustomerId && user.id == selectedCustomerId) {
                        option.selected = true;
                    }
                    customerSelect.appendChild(option);
                });
            } else {
                console.warn("response.data is not an array");
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", error);
        }
    });
}

function taxRate() {
    $.ajax({
        url: getTaxRate,
        method: 'GET',
        success: function(response) {
            console.log("response.data", response.data);
            if (Array.isArray(response.data)) {
                // Iterate over all Account Code dropdowns and populate them
                document.querySelectorAll('#vat_input').forEach(dropdown => {
                    dropdown.innerHTML = ''; // Clear existing options
                    const optionInitial = document.createElement('option');
                    const preTaxID = document.getElementById('tax_id').value;
                    optionInitial.textContent = "Please Select"; // Use appropriate key from your response
                    optionInitial.value = 0;
                    dropdown.appendChild(optionInitial);
                    // Append new options
                    response.data.forEach(code => {
                        const option = document.createElement('option');
                        option.value = code.id; // Use appropriate key from your response
                        option.textContent = code.name; // Use appropriate key from your response
                        option.setAttribute('data-tax-rate', code.tax_rate);
                        if (preTaxID && code.id == preTaxID) {
                            option.selected = true;
                        }
                        dropdown.appendChild(option);
                    });
                });
            } else {
                console.error("Invalid response format");
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.openSalesDayBookModel').forEach(function (btn) {
        // alert();
     
        btn.addEventListener('click', function () {
            getCustomerList();
            taxRate();
            const action = this.getAttribute('data-action');
            const modalTitle = document.getElementById('modalTitle');
            const sales_day_book_id = document.getElementById('sales_day_book_id');
            const customer_id = document.getElementById('customer_id');
            const Date_input = document.getElementById('Date_input');
            const Invoice_input = document.getElementById('Invoice_input');
            const net_amount = document.getElementById('net_amount');
            const tax_id = document.getElementById('tax_id');
            const vat_amount = document.getElementById('vat_amount');
            const gross_amount = document.getElementById('gross_amount');
            if (action === 'add') {
                modalTitle.textContent = 'Add Sales Day Book';
            } else if (action === 'edit') {
                modalTitle.textContent = 'Edit Sales Day Book';
                sales_day_book_id.value = this.getAttribute('data-id');
                customer_id.value = this.getAttribute('data-customer_id');
                Date_input.value = this.getAttribute('data-date');
                Invoice_input.value = this.getAttribute('data-invoice_no');
                net_amount.value = this.getAttribute('data-netAmount');
                tax_id.value = this.getAttribute('data-vat');
                vat_amount.value = this.getAttribute('data-vatAmount');
                gross_amount.value = this.getAttribute('data-grossAmount');

            }

            $('#salesDayBookModel').modal('show');
        });
    });
});

$(document).ready(function() {
    $("#saveSalesDayBookModal").on("click", function(e) {
        // alert();
        e.preventDefault(); // Prevent page reload

        $.ajax({
            url: saveSalesDayBook, // Laravel route
            type: "POST",
            data: $('#salesDayBookForm').serialize(), // Serialize form data
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert(response.message);
                window.location.reload();
            },
            error: function(xhr) {
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
                    // alert("Please fix the following errors:\n" + errorMessages);
                } else {
                    alert("Something went wrong. Please try again.");
                }
            }
        });
    });
});