// $(document).ready(function () {
//     $(".deleteBtn").on("click", function () {
//         let salesBookId = $(this).data("id"); // Get ID from button
//         let row = $("#row-" + salesBookId); // Select the row

//         if (confirm("Are you sure you want to delete this record?")) {
//             $.ajax({
//                 url: salesDayBook + "/"+ salesBookId,
//                 type: "POST",
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//                 },
//                 success: function (response) {
//                     if (response.success) {
//                         // row.find("td:nth-child(7)").text(response.deleted_at); // Update deleted_at column
//                         alert(response.message);
//                         window.location.reload();
//                     }
//                 },
//                 error: function () {
//                     alert("Something went wrong!");
//                 },
//             });
//         }
//     });
// });

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


// function getCustomerList() {

//     $.ajax({
//         url: '{{ route("customer.ajax.getCustomerList") }}',
//         success: function (response) {
//             console.log(response.data);
//             var get_customer_type = document.getElementById('getCustomerList');
//             // get_customer_type.innerHTML = '';

//             response.data.forEach(user => {
//                 const option = document.createElement('option');
//                 option.value = user.id;
//                 option.text = user.name;
//                 get_customer_type.appendChild(option);
//             });
//         },
//         error: function (xhr, status, error) {
//             console.error(error);
//         }
//     });
// }


function getCustomerList() {
    $.ajax({
        url: customerList,
        method: 'GET',
        success: function (response) {
            console.log("Customer list data:", response.data);

            const customerSelect = document.getElementById('getCustomerList');
            customerSelect.innerHTML = '<option>Select Customer</option>'; // reset list

            if (Array.isArray(response.data)) {
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = user.name;
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
                    optionInitial.textContent = "Please Select"; // Use appropriate key from your response
                    optionInitial.value = 0;
                    dropdown.appendChild(optionInitial);
                    // Append new options
                    response.data.forEach(code => {
                        const option = document.createElement('option');
                        option.value = code.id; // Use appropriate key from your response
                        option.textContent = code.name; // Use appropriate key from your response
                        option.setAttribute('data-tax-rate', code.tax_rate);
                        // if (code.id === 2) {
                        //     option.selected = true; // Select the option where id = 2
                        // }
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
        // alert("dfdf");
        // const action = this.getAttribute('data-action');
        // const modalTitle = document.getElementById('modalTitle');
        btn.addEventListener('click', function () {
            getCustomerList();
            taxRate();


            // if (action === 'add') {
            //     modalTitle.textContent = 'Add Sales Day Book';
            // } else if (action === 'edit') {
            //     modalTitle.textContent = 'Edit Sales Day Book';
            //     // council_tax_id.value = this.getAttribute('data-id');
                // flat_num.value = this.getAttribute('data-flat-number');
                // address.value = this.getAttribute('data-address');
                // additional_notes.value = this.getAttribute('data-additional');
                // postcode.value = this.getAttribute('data-post_code');
                // council.value = this.getAttribute('data-council');
                // no_of_bedrooms.value = this.getAttribute('data-no_of_bedrooms');
                // if (this.getAttribute('data-owned_by_omega') == 1) {
                //     ownedByOmegayes.checked = true;
                // } else if (this.getAttribute('data-owned_by_omega') == 0) {
                //     ownedByOmegano.checked = true;
                // }

                // occupancy.value = this.getAttribute('data-occupancy');
                // if (this.getAttribute('data-exempt') == 1) {
                //     exemptno.checked = true;
                // } else if (this.getAttribute('data-exempt') == 0) {
                //     exemptyes.checked = true;
                // }
                // account_number.value = this.getAttribute('data-account_number');
                // last_bill_date.value = this.getAttribute('data-last_bill_date');
                // bill_period_start_date.value = this.getAttribute('data-bill_period_start_date');
                // bill_period_end_date.value = this.getAttribute('data-bill_period_end_date');
                // amount_paid.value = this.getAttribute('data-amount_paid');
            // }

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
                let errors = xhr.responseJSON.errors;
                let errorMessage = "<p style='color:red;'>";
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + "<br>";
                });
                errorMessage += "</p>";
                $("#error-div").html(errorMessage);
                // alert(errorMessage);
            }
        });
    });
});