let allPurchaseData = [];

$(document).ready(function() {

    taxRate(document.getElementById('getDataOnTax'));
    $('#Date_input').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#Date_input').on('change', function () {
        $('#Date_input').datepicker('hide');
    });

    $("#purchase_day_book_form").scroll(function () {
        $('#Date_input').datepicker('place');
    });


    const table = $('#purchaseDayBookTable').DataTable({
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'csv',
                text: 'Export',
                bom: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                }
            }
        ]
    });
    

    const selectedVatId = document.getElementById('getDataOnTax').value;
    loadPurchaseDayBookData(selectedVatId);
    // Load all data initially

    function loadPurchaseDayBookData(selectedTaxRate) {
        $.ajax({
            url: getPurchaseDayBook,
            method: 'GET',
            data: {
                tax_rate: selectedTaxRate  // only pass if filtering is needed
            },
            success: function(response) {
                console.log("response.data", response.data);
                allPurchaseData = response.data;
                populateTable(allPurchaseData);
            },
            error: function(xhr) {
                console.error("Error loading data", xhr);
            }
        });
    }
  

    // Handle dropdown filter
    $('#getDataOnTax').on('change', function() {
        // const selectedTaxRate = $('#getDataOnTax option:selected').data('tax-rate');
        const selectedVatId = $(this).val();
        loadPurchaseDayBookData(selectedVatId);
        if (typeof selectedTaxRate === 'undefined' || selectedTaxRate === 0) {
            populateTable(allPurchaseData);
        } else {
            const filtered = allPurchaseData.filter(item => parseFloat(item.tax_rate) === parseFloat(selectedTaxRate));
            populateTable(filtered);
        }
    });

    // Render data into the table
    function populateTable(data) {
        table.clear();

        data.forEach((item, index) => {
            const netAmount = parseFloat(item.netAmount ?? 0);
            const vatAmount = parseFloat(item.vatAmount ?? 0);
            const grossAmount = parseFloat(item.grossAmount ?? 0);
            const reclaim = parseFloat(item.reclaim ?? 0);
            const notReclaim = parseFloat(item.not_reclaim ?? 0);
            const expenseAmount = parseFloat(item.expense_amount ?? 0);
            const finalAmount = netAmount + vatAmount;

            const actions = `
                <a href="#!" class="openPurchaseDayBookModel"
                    data-action="edit"
                    data-id="${item.id}"
                    data-supplier_id="${item.supplier_id}"
                    data-date="${item.date}"
                    data-netAmount="${item.netAmount}"
                    data-vat="${item.Vat}"
                    data-vatAmount="${item.vatAmount}"
                    data-grossAmount="${item.grossAmount}"
                    data-reclaim="${item.reclaim}"
                    data-not_reclaim="${item.not_reclaim}"
                    data-expense_type="${item.expense_type}"
                    data-expense_amount="${item.expense_amount}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a> |
                <a href="#!" class="deleteBtn" data-id="${item.id}">
                    <i class="fa fa-trash radStar" aria-hidden="true"></i>
                </a>
            `;

            table.row.add([
                index + 1,
                item.customer_name ?? '',
                item.date ?? '',
                item.netAmount ?? '',
                item.vatAmount ?? '',
                '£' + (item.grossAmount ?? ''),
                item.tax_rate_name ?? '',
                '£' + ((netAmount + vatAmount) - reclaim).toFixed(2),
                reclaim ? '£' + reclaim : '',
                notReclaim ? '£' + notReclaim : '',
                item.title ?? '',
                expenseAmount ? '£' + expenseAmount : '',
                actions
            ]);
        });

        table.draw();
    }

    $("#savePurchaseDayBook").on("click", function (e) {
        e.preventDefault();

        $.ajax({
            url: savePurchaseDayBook,
            type: "POST",
            data: $('#save-purchase-day-book').serialize(), // Serialize form data
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert(response.message);
                window.location.reload();
            },
            error: function (xhr) {
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

    $(".deleteBtn").on("click", function () {
        let purchaseBookId = $(this).data("id"); // Get ID from button
        let row = $("#row-" + purchaseBookId); // Select the row

        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: purchaseDayBook + "/" + purchaseBookId,
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


//  get Suppliers list
function getSupplierList() {
    $.ajax({
        url: getSuppliersList,
        method: 'GET',
        success: function (response) {
            console.log("supplier list data:", response.data);
            const selectedSupplierId = document.getElementById('supplier_id').value;
            const supplierSelect = document.getElementById('Supplier_input');
            supplierSelect.innerHTML = '<option>Select Suppliers</option>';

            if (Array.isArray(response.data)) {
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = user.name;
                    if (selectedSupplierId && user.id == selectedSupplierId) {
                        option.selected = true;
                    }
                    supplierSelect.appendChild(option);
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

// Get Purchase Expeanses
function getPurchaseExpense() {
    $.ajax({
        url: getPurchaseExpenses,
        method: 'GET',
        success: function (response) {
            console.log("purchase expenses:", response.data);
            const selectedexpednseId = document.getElementById('expenses_id').value;
            const expensesSelect = document.getElementById('expenses');
            expensesSelect.innerHTML = '<option>Select Expenses</option>';

            if (Array.isArray(response.data)) {
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = user.title;
                    if (selectedexpednseId && user.id == selectedexpednseId) {
                        option.selected = true;
                    }
                    expensesSelect.appendChild(option);
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


function taxRate(dropdown) {
    $.ajax({
        url: getTaxRate,
        method: 'GET',
        success: function (response) {
            console.log("response.data", response.data);
            if (Array.isArray(response.data)) {
                // const dropdown = document.getElementById('vat_input'); // Assumes ID is 'vat_input'
                if (!dropdown) {
                    console.error("Element with ID not found");
                    return;
                }

                dropdown.innerHTML = ''; // Clear existing options

                const optionInitial = document.createElement('option');
                const preTaxID = document.getElementById('tax_id').value;
                optionInitial.textContent = "Please Select";
                optionInitial.value = 0;
                dropdown.appendChild(optionInitial);

                response.data.forEach(code => {
                    const option = document.createElement('option');
                    option.value = code.id;
                    option.textContent = code.name + " (" + code.tax_rate + "%)";
                    option.setAttribute('data-tax-rate', code.tax_rate);
                    if (preTaxID && code.id == preTaxID) {
                        option.selected = true;
                    }
                    dropdown.appendChild(option);
                });
            } else {
                console.error("Invalid response format");
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}



document.addEventListener('DOMContentLoaded', function () {
    let vatInput = document.getElementById('vat_input');
    let netAmountInput = document.getElementById('net_amount');
    let vatAmountInput = document.getElementById('vat_amount');
    let grossAmountInput = document.getElementById('gross_amount');

    let not_claim = document.getElementById('not_claim');
    let reclaim_amount = document.getElementById('reclaim_amount');
    let totalAmountInput = document.getElementById('totalAmount');
    let expensesAmountInput = document.getElementById('expenses_amount');
    let expenses = document.getElementById('expenses');


    function getCalculatedData() {
        $.ajax({
            type: "GET",
            url: calculatedData,
            success: function (response) {
                console.log("reclaimPercantage ", response.data);
                var vatAmount = vatAmountInput.value;
                console.log("vatAmount", vatAmount);

                let reclaimed = (vatAmount * response.data) / 100;
                console.log("Reclaimed Amount:", reclaimed.toFixed(2));
                reclaim_amount.value = reclaimed.toFixed(2);
                var not_claimedAmt = (parseFloat(vatAmount) - parseFloat(reclaimed)).toFixed(2);
                not_claim.value = not_claimedAmt;
                totalAmount = parseFloat(grossAmountInput.value) - parseFloat(reclaim_amount.value);
                totalAmountInput.value = totalAmount.toFixed(2);

                let input = document.getElementById('purchase_day_book_id');
                if (input.value.trim() !== "") {
                    console.log("Input has a value:", input.value);
                    expensesAmountInput.value = not_claimedAmt;
                }
            }
        });
    }

    function calculateTax() {
        let netAmount = parseFloat(netAmountInput.value) || 0;
        let selectedOption = vatInput.options[vatInput.selectedIndex];
        let taxRate = parseFloat(selectedOption.getAttribute('data-tax-rate')) || 0;

        let vatAmount = (netAmount * taxRate) / 100;
        let grossAmount = netAmount + vatAmount;

        $.ajax({
            type: "GET",
            url: reclaimPercantage,
            data: '',
            success: function (data) {
                console.log("Response ", data);
                if (data == "0") {
                    getCalculatedData(); // Now this function is defined and accessible
                } else if (data == "1") {
                    not_claim.value = vat_amount.value;
                    reclaim_amount.value = totalAmountInput.value = "00.00";
                }
            }
        });

        vatAmountInput.value = vatAmount.toFixed(2);
        grossAmountInput.value = grossAmount.toFixed(2);
        expenses.value = '';
        expensesAmountInput.value = "";
    }

    // Trigger calculation on VAT change or Net Amount change
    vatInput.addEventListener('change', calculateTax);
    netAmountInput.addEventListener('input', calculateTax);

    document.getElementById("expenses").addEventListener("change", function () {
        var not_claimedAmt = not_claim.value;
        expensesAmountInput.value = not_claimedAmt;
    });

    document.querySelectorAll('.openPurchaseDayBookModel').forEach(function (btn) {
        btn.addEventListener('click', function () {
            getSupplierList();
            getPurchaseExpense();
            const action = this.getAttribute('data-action');
            const modalTitle = document.getElementById('modalTitle');
            const purchase_day_book_id = document.getElementById('purchase_day_book_id');
            const supplier_id = document.getElementById('supplier_id');
            const Date_input = document.getElementById('Date_input');
            const net_amount = document.getElementById('net_amount');
            const expenses_id = document.getElementById('expenses_id');
            const expenses_amount = document.getElementById('expenses_amount');
            const vat_amount = document.getElementById('vat_amount');
            const not_claim = document.getElementById('not_claim');
            const gross_amount = document.getElementById('gross_amount');
            const reclaim_amount = document.getElementById('reclaim_amount');
            const totalAmount = document.getElementById('totalAmount');
            const tax_id = document.getElementById('tax_id');
            if (action === 'add') {
                modalTitle.textContent = 'Add Purchase Day Book';
            } else if (action === 'edit') {
                modalTitle.textContent = 'Edit Purchase Day Book';
                purchase_day_book_id.value = this.getAttribute('data-id');
                supplier_id.value = this.getAttribute('data-supplier_id');
                net_amount.value = this.getAttribute('data-netAmount');
                Date_input.value = this.getAttribute('data-date');
                tax_id.value = this.getAttribute('data-vat');
                gross_amount.value = this.getAttribute('data-grossAmount');
                reclaim_amount.value = this.getAttribute('data-reclaim');
                expenses_id.value = this.getAttribute('data-expense_type');
                vat_amount.value = this.getAttribute('data-vatAmount');
                expenses_amount.value = this.getAttribute('data-expense_amount');
                not_claim.value = this.getAttribute('data-not_reclaim');
                totalAmount.value = parseFloat(this.getAttribute('data-netAmount')) + parseFloat(this.getAttribute('data-not_reclaim'));
            }
            taxRate(document.getElementById('vat_input'));
            $('#purchase_day_book_form').modal('show');
        });
    });

});