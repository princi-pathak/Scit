<div class="modal fade" id="{{ $bulInvoiceModalId }}" tabindex="-1" aria-labelledby="recordDeliveryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modalTitle }}">Bulk Invoice Received</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="text-center mt-3" id="message_recordDeliveryModal" style="display:none"></div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="formDtail">
                            <form id="{{ $bulInvoiceformId }}" class="customerForm pt-0">
                                @csrf
                                <div class="row">
                                    <div class="modal_search">
                                        <label for="inputPurchase" class=" col-form-label d-flex">Search: </label>
                                        <div class=" position-relative">
                                            <input type="search" placeholder="PO Ref" class="form-control" id="bulkInvoicePoSearch">
                                            <!-- <input type="hidden" id="selectedBulkInvoicePORefId" name="job_ref"> -->
                                            <div class="search-container bulkInvoice-po_ref-container"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="productDetailTable input_style">
                                        <table class="table" id="bulkInvoiceReceived_result">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="col-1">PO Ref</th>
                                                    <th class="col-1">Supplier</th>
                                                    <th>Date</th>
                                                    <th>Invoice Ref <span class="radStar">*</span></th>
                                                    <th>Net Amount</th>
                                                    <th>VAT(%)</th>
                                                    <th>VAT</th>
                                                    <th class="text-end">Amount</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="9" class="text text-danger text-center">Sorry, no records to show</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" class="border-0"></td>
                                                    <td class="text-end">Sub Total (exc. VAT)</td>
                                                    <th class="text-end" id="bulkInvoiceSubTotal">£0.00</th>
                                                    <th class="border-0"></th>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="border-0"></td>
                                                    <td class="text-end">VAT</td>
                                                    <th class="text-end" id="bulkInvoiceVat">£0.00</th>
                                                    <th class="border-0"></th>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="border-0"></td>
                                                    <th class="text-end">Total Amount</th>
                                                    <th class="text-end" id="bulkInvoiceTotal">£0.00</th>
                                                    <th class="border-0"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- End row -->
            </div>
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="profileDrop" id="{{ $saveButtonId }}" onclick="saveBulkInvoiceModal()">Save</button>
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#bulkInvoicePoSearch').on('input',function(){
        // alert($(this).val())
            let purchase_ref = $(this).val();
            const purchase_job_refdivList = document.querySelector('.bulkInvoice-po_ref-container');

            if (purchase_ref === '') {
                purchase_job_refdivList.innerHTML = '';
            }
            if (purchase_ref.length > 50) {
                $(this).val(purchase_ref.substring(0, 50));
            }
            if (purchase_ref.length > 2) {
                $.ajax({
                    url: "{{ url('searchPurchase_ref') }}",
                    method: 'post',
                    data: {
                        purchase_ref: purchase_ref,_token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // return false;
                        purchase_job_refdivList.innerHTML = "";
                        const div = document.createElement('div');
                        div.className = 'purchase_job_ref_container';

                      
                        const ul = document.createElement('ul');
                        ul.id = "purchase_job_refList";
                        if(response.data.length >0){
                            response.data.forEach(item => {
                                const li = document.createElement('li'); 
                                li.textContent = item.purchase_order_ref+' - '+item.suppliers.name; 
                                li.id = item.id;
                                li.name = item.purchase_order_ref;
                                li.className = "editInput";
                                ul.appendChild(li); 
                                // const hr = document.createElement('hr');
                                // hr.className='dropdown-divider';
                                // ul.appendChild(hr);
                            });

                            div.appendChild(ul);

                            purchase_job_refdivList.appendChild(div);

                            ul.addEventListener('click', function(event) {
                                purchase_job_refdivList.innerHTML = '';
                                document.getElementById('bulkInvoicePoSearch').value = '';
                                if (event.target.tagName.toLowerCase() === 'li') {
                                    const selectedBulkInvoicePORefId = event.target.id;
                                    getAllDetailPurchaseOrder(selectedBulkInvoicePORefId);
                                    const selectedPurchaseJobName = event.target.name;
                                    console.log('Selected Customer ID:', selectedBulkInvoicePORefId);
                                    console.log('Selected Customer Name:', selectedPurchaseJobName);
                                    // $("#bulkInvoicePoSearch").val(selectedPurchaseJobName);
                                    // $("#selectedBulkInvoicePORefId").val(selectedBulkInvoicePORefId);
                                }
                            });
                        }else{
                            const Errorli = document.createElement('li'); 
                            Errorli.textContent = 'Sorry Data Not found'; 
                            Errorli.id = 'searchError';
                            Errorli.className = "editInput";
                            ul.appendChild(Errorli); 
                            div.appendChild(ul);
                            purchase_job_refdivList.appendChild(div);
                            setTimeout(function() {
                                purchase_job_refdivList.innerHTML = '';
                            }, 1000);
                        }

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                purchase_job_refdivList.innerHTML = '';
                $('#results').empty();
            }
    });
    function getAllDetailPurchaseOrder(po_id){
        document.getElementById("bulkInvoicePoSearch").value = "";
        var token='<?php echo csrf_token();?>';
        var url=`{{ url('getPurchaesOrderProductDetail') }}`;
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ id: po_id })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // return false;
            if(data.success === true){
                var po_list=data.data[0];
                
            }else{
                alert("Something went wrong");
                return false;
            }
            
        })
        .catch(error => {
            // $('.catsuccessdanger').text('There was an error submitting the form.');
            console.error("Error: ",error);
        });
    }
</script>