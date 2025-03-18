@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3> {{ isset($salesBook->id) ? 'Edit' : 'Add' }} Sales Day Book</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ url('sales/save-sales-day-book') }}" method="POST" class="customerForm">
                    @csrf
                    <div class="newJobForm card mt-4">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="formDtail">
                                    <div class="mb-3 row">
                                        <input type="hidden" name="sales_day_book_id" value="{{ isset($salesBook->id) ? $salesBook->id : '' }}">
                                        <label for="Customer_input" class="col-sm-2 col-form-label"> Customer <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" name="customer_id" id="">
                                                <option>Select Customer</option>
                                                @foreach($customers as $customer)
                                                <option value="{{ $customer->id}}" {{ isset($salesBook) && $salesBook->customer_id === $customer->id ? 'selected' : '' }}> {{ $customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="Date_input" class="col-sm-2 col-form-label"> Date <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="Date" class="form-control editInput" value="{{ isset($salesBook->date) ? $salesBook->date : '' }}" name="date" id="Date_input">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="Invoice_input" class="col-sm-2 col-form-label"> Invoice <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="invoice_no" value="{{ isset($salesBook->invoice_no) ? $salesBook->invoice_no : '' }}" id="Invoice_input" placeholder="Invoice no.">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="net_amount" class="col-sm-2 col-form-label"> Net <span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="net_amount" value="{{ isset($salesBook->netAmount) ? $salesBook->netAmount : '' }}" name="netAmount" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="formDtail">
                                    <div class="mb-3 row">
                                        <label for="vat_input" class="col-sm-2 col-form-label">VAT<span class="radStar">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" name="Vat" id="vat_input">
                                                <option>-Not Assigned-</option>
                                                @foreach($taxRates as $taxrate)
                                                <option value="{{ $taxrate->id }}" {{ isset($salesBook) && $salesBook->Vat  === $taxrate->id  ? 'selected' : '' }} data-tax-rate="{{ $taxrate->tax_rate }}">{{ $taxrate->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="rate_input" class="col-sm-2 col-form-label">Vat Amount </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="vatAmount" id="vat_amount" value="{{ isset($salesBook->vatAmount) ? $salesBook->vatAmount : ''}}" placeholder="" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Gross</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" name="grossAmount" id="gross_amount" value="{{ isset($salesBook->grossAmount) ? $salesBook->grossAmount :  '' }}" placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                            <div class="pageTitleBtn">
                                <button type="submit" class="profileDrop reDesignBtn"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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