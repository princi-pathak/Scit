<style>
    .border_top {
        border-top: 2px solid #000;
        border-bottom: 0px
    }

    tbody tr th,
    tbody tr td {
        vertical-align: middle;
    }

    .amount.form-control {
        padding: 3px 10px;
    }
</style>

<div class="modal fade" id="{{ $allocateModalId }}" tabindex="-1" aria-labelledby="recordDeliveryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modalTitle }}"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="text-center mt-3" id="message_recordDeliveryModal" style="display:none"></div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="formDtail">
                            <label for="inputProject" class="col-sm-12 h5"
                                id="{{ $modalSubTitle }}"></label>
                            <form id="{{ $allocateformId }}" class="customerForm pt-0">
                                <input type="hidden" name="{{ $foreignId }}" id="allocate_{{ $foreignId }}">
                                <input type="hidden" name="{{ $allocateId }}" id="allocate_{{ $allocateId }}">
                                <input type="hidden" name="supplier_id" id="allocate_supplier_id">
                                @csrf
                                <div class="col-sm-12">
                                    <div class="productDetailTable newJobForm mt-4">
                                        <label class="upperlineTitle" id="{{ $fieldsetTitle }}">Paul Seddon</label>
                                        <table class="table" id="purchaseOrder_result">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col">PO Ref</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Outstanding</th>
                                                    <th scope="col" class="w-25">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" class="border-0"></td>
                                                    <td></td>
                                                    <td>Balance Credit</td>
                                                    <td>£120.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="border-0"></td>
                                                    <td></td>
                                                    <td>Credit Used</td>
                                                    <td>£120.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="border-0"></td>
                                                    <td class="border_top"></td>
                                                    <td class="border_top">Remaining Credit</td>
                                                    <td class="border_top">£120.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="pagination-controls-recordDelivery"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- End row -->
            </div>
            <div class="modal-footer customer_Form_Popup">

                <button type="button" class="profileDrop" id="{{ $saveButtonId }}">Save</button>
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script>
    function getAllSupplierPurchaseOrder(supplier_id, outstandingAmount) {
        $("#allocate_supplier_id").val(supplier_id);
        var token = '<?php echo csrf_token(); ?>'
        $.ajax({
            type: "POST",
            url: "{{url('getAllSupplierPurchaseOrder')}}",
            data: {
                supplier_id: supplier_id, _token: token
            },
            success: function (data) {
                console.log(data);
                // return false;
                const tableBody = document.querySelector(`#purchaseOrder_result tbody`);

                if (data.data.length === 0) {
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

                    data.data.forEach(po_order => {
                        const row = document.createElement('tr');
                        const nameCell = document.createElement('td');
                        nameCell.innerHTML = po_order.purchase_order_ref;
                        row.appendChild(nameCell);

                        const date = moment(po_order.purchase_date).format('DD/MM/YYYY');
                        const dateCell = document.createElement('td');
                        dateCell.textContent = date;
                        row.appendChild(dateCell);

                        po_order.purchase_order_products.forEach(product => {
                            const sub_total = product.qty * product.price;
                            const percentage = sub_total * product.vat / 100;
                            const total = sub_total + percentage;
                            const totalCell = document.createElement('td');
                            totalCell.textContent = '£' + total;
                            row.appendChild(totalCell);

                            const outstandingCell = document.createElement('td');
                            outstandingCell.textContent = '£' + product.outstanding_amount;
                            row.appendChild(outstandingCell);

                            const amountCell = document.createElement('td');
                            // amountCell.textContent = outstandingAmount;
                            const inputPrice = document.createElement('input');
                            inputPrice.className = 'amount form-control ';
                            inputPrice.name = 'amount[]';
                            inputPrice.value = outstandingAmount.toFixed(2) || 0;
                            inputPrice.addEventListener('input', function () {
                                this.value = this.value.replace(/[^0-9.]/g, '');
                                if ((this.value.match(/\./g) || []).length > 1) {
                                    this.value = this.value.slice(0, -1);
                                }
                                // updateAmount(row);
                            });
                            amountCell.appendChild(inputPrice);
                            row.appendChild(amountCell);
                        });

                        tableBody.appendChild(row);
                    });
                }

            }
        });
    }

    $("#{{ $saveButtonId }}").on('click', function () {

        $.ajax({
            type: "POST",
            url: "{{ $saveUrl }}",
            data: new FormData($("#{{ $allocateformId }}")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response); return false;
                if (response.vali_error) {
                    alert(response.vali_error);
                    $("#email").css('border', '1px solid red');
                    $(window).scrollTop(0);
                    return false;
                } else if (response.success === true) {
                    $(window).scrollTop(0);
                    $('#message_emailModal').addClass('success-message').text(response.message).show();
                    setTimeout(function () {
                        $('#message_emailModal').removeClass('success-message').text('').hide();
                        getAllAllocates(response.data);
                    }, 3000);
                } else {
                    // alert("Something went wrong");
                    $('#message_emailModal').addClass('error-message').text(response.message).show();
                    setTimeout(function () {
                        // $('#error-message').text('').fadeOut();
                        $('#message_emailModal').removeClass('error-message').text('').hide();
                    }, 3000);
                    return false;
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                console.log('Error - ' + errorMessage + "\nMessage: " + error);
            }
        });
    });
</script>