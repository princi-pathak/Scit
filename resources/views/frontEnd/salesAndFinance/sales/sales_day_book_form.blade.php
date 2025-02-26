@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Add Sales Day Book</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="newJobForm card mt-4">
                    <form action="{{ url('sales/save-sales-purchase-book') }}" method="POST" class="customerForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="formDtail">
                                    <div class="mb-3 row">
                                        <label for="Customer_input" class="col-sm-2 col-form-label"> Customer <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" name="customer" id="">
                                                <option>Select Customer</option>
                                                @foreach($customers as $customer)
                                                <option value="{{ $customer->id}}">{{ $customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="Date_input" class="col-sm-2 col-form-label"> Date <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="Date" class="form-control editInput" name="date" id="Date_input">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="Invoice_input" class="col-sm-2 col-form-label"> Invoice <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="invoice" id="Invoice_input" placeholder="Invoice no.">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="net_amount" class="col-sm-2 col-form-label"> Net <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="net_amount" name="Net Amount" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="formDtail">
                                    <div class="mb-3 row">
                                        <label for="vat_input" class="col-sm-2 col-form-label">VAT
                                            <span class="radStar">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" name="vat_per" id="vat_input">
                                                <option>-Not Assigned-</option>
                                                @foreach($taxRates as $taxrate)
                                                <option value="{{ $taxrate->id }}" data-tax-rate="{{ $taxrate->tax_rate }}">{{ $taxrate->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="rate_input" class="col-sm-2 col-form-label">Vat Amount </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="rate" id="vat_amount" placeholder="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Gross</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="gross" id="gross_amount" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="text-end mt-4">
                    <button ></button>
                    <input type="submit" class="profileDrop" value="Submit" >

                    <!-- <a href="#" class="profileDrop"> Submit</a> -->
                </div>
            </div>
            </di>
        </div>
</section>

<script>
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

</script>

@include('frontEnd.salesAndFinance.jobs.layout.footer')