@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3 pt-0">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-lg-4 col-xl-4 ">
        <div class="pageTitle">
          <h3>Purchase Day Book</h3>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <form action="{{ url('purchase/save-purchase-day-book') }}" method="POST" class="customerForm">
          @csrf
          <div class="newJobForm card mt-4">
            <div class="row">
              <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="formDtail">
                  <div class="mb-3 row">
                    <label for="Supplier_input" class="col-sm-2 col-form-label"> Supplier <span class="radStar">*</span></label>
                    <div class="col-sm-9">
                      <input type="hidden" name="purchase_day_book_id" value="{{ isset($purchaseBook->id) ? $purchaseBook->id : '' }}">
                      <select class="form-control editInput selectOptions" name="supplier_id" id="Supplier_input">
                        <option>Please Select</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ isset($purchaseBook) && $purchaseBook->supplier_id === $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="Date_input" class="col-sm-2 col-form-label"> Date <span class="radStar">*</span></label>
                    <div class="col-sm-9">
                      <input type="Date" class="form-control editInput" name="date" value="{{ isset($purchaseBook->date) ? $purchaseBook->date : '' }}" id="Date_input">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="net_amount" class="col-sm-2 col-form-label"> Net <span class="radStar">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control editInput" name="netAmount" id="net_amount" value="{{ isset($purchaseBook->netAmount) ? $purchaseBook->netAmount : '' }}" placeholder="">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="reclaim_amount" class="col-sm-2 col-form-label"> Reclaim <span class="radStar">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control editInput" name="reclaim" id="reclaim_amount" value="" placeholder="">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="expenses" class="col-sm-2 col-form-label"> Expenses <span class="radStar">*</span></label>
                    <div class="col-sm-9">
                      <select class="form-control editInput selectOptions" name="expense_type" id="expenses">
                        <option>Please Select</option>
                        @foreach($purchase_expenses as $purchase_expense)
                        <option value="{{ $purchase_expense->id }}">{{ $purchase_expense->title }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <label class="col-form-label">(Residual - 6.99% for claimed, 93.01% for not claimed ) </label>
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
                        <option value="{{ $taxrate->id }}" {{ isset($purchaseBook) && $purchaseBook->Vat  === $taxrate->id  ? 'selected' : '' }} data-tax-rate="{{ $taxrate->tax_rate }}">{{ $taxrate->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="vat_amount" class="col-sm-2 col-form-label">VAT Amount</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control editInput" name="vatAmount" value="{{ isset($purchaseBook->vatAmount) ? $purchaseBook->vatAmount : ''}}" id="vat_amount" readonly>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="gross_amount" class="col-sm-2 col-form-label">Gross</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control editInput" name="grossAmount" id="gross_amount" value="{{ isset($purchaseBook->grossAmount) ? $purchaseBook->grossAmount :  '' }}" readonly>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="not_claim" class="col-sm-2 col-form-label"> Not Claim <span class="radStar">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control editInput" name="not_reclaim" id="not_claim" value="" placeholder="">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="rate_input" class="col-sm-2 col-form-label">Expense Amount</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control editInput" name="expense_amount" id="expenses_amount" value="">
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- End col-12 -->
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-12 px-3">
        <div class="pageTitleBtn">
          <button type="submit" class="profileDrop reDesignBtn"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>

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

    let not_claim = document.getElementById('not_claim');
    let reclaim_amount = document.getElementById('reclaim_amount');


    function calculateTax() {
      let netAmount = parseFloat(netAmountInput.value) || 0;
      let selectedOption = vatInput.options[vatInput.selectedIndex];
      let taxRate = parseFloat(selectedOption.getAttribute('data-tax-rate')) || 0;

      let vatAmount = (netAmount * taxRate) / 100;
      let grossAmount = netAmount + vatAmount;

      let claimedPercent = 6.99;

      let claimedVAT = (vatAmount * claimedPercent) / 100; // Claimed VAT
      let notClaimedVAT = vatAmount - claimedVAT; // Remaining not claimed VAT

      reclaim_amount.value = claimedVAT.toFixed(2);
      not_claim.value = notClaimedVAT.toFixed(2);

      vatAmountInput.value = vatAmount.toFixed(2);
      grossAmountInput.value = grossAmount.toFixed(2);
    }

    // Trigger calculation on VAT change or Net Amount change
    vatInput.addEventListener('change', calculateTax);
    netAmountInput.addEventListener('input', calculateTax);

    document.getElementById("expenses").addEventListener("change", function() {
      let not_claim = document.getElementById('not_claim').value;
      document.getElementById("expenses_amount").value = not_claim; // Set input value

      $.ajax({
        type: "GET",
        url: "serverscript.xxx",
        data: myusername,
        cache: false,
        success: function(data) {
          $("#resultarea").text(data);
        }
      });


    });
  });
</script>
@include('frontEnd.salesAndFinance.jobs.layout.footer')