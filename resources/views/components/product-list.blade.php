<!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
<div class="modal fade" id="productModalBAC" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productModalBACLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="productModalBACLabel">Product List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <div class="modal-body ">
                    <div class="extraInformationTab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-product" type="button" role="tab" aria-controls="nav-Notes" aria-selected="true">Product(s) <span class="productCount" id="productCount"></span></button>
                                <button class="nav-link" onclick="getproductsOnType(2, 'setServiceInTable')" id="nav-secrices-tab" data-bs-toggle="tab" data-bs-target="#nav-secrices" type="button" role="tab" aria-controls="nav-secrices" aria-selected="false">Service(s) <span class="productCount" id="serviceCount"></span></button>
                                <button class="nav-link" onclick="getproductsOnType(3, 'setConsumableInTable')" id="nav-consumable-tab" data-bs-toggle="tab" data-bs-target="#nav-consumable" type="button" role="tab" aria-controls="nav-consumable" aria-selected="false">Consumable(s) <span class="productCount" id="consumableCount"></span></button>
                                <button class="nav-link" id="nav-productGroup-tab" data-bs-toggle="tab" data-bs-target="#nav-productGroup" type="button" role="tab" aria-controls="nav-productGroup" aria-selected="false">Product Group(s) <span class="productCount" id="groupCount"></span></button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab" tabindex="0">
                                <div class="py-4">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="hidden" id="selectedProductIds" name="product_ids" value="[]">
                                            <select class="form-control editInput selectOptions" id="product_categories">
                                                <option>--Any Category--</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control editInput" placeholder="Search Term" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                <button class="btn btn-outline-secondary editInput profileDrop" type="button" id="button-addon2">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="alphabeticListHolder">
                                        <ul class="alphabeticList">
                                            <li><a href="#" class="alphabeticLink" data-term="all" data-search_mode="ALL">All</a></li>
                                            @for ($i = 65; $i <= 90; $i++)
                                                <li><a href="#" class="alphabeticLink" data-term="{{ chr($i) }}" data-search_mode="STARTS">{{ chr($i) }}</a></li>
                                                @endfor
                                                <li>&nbsp;</li>
                                                @for($j = 0; $j <= 9; $j++)
                                                    <li><a href="#" class="alphabeticLink" data-term="{{ $j }}" data-search_mode="STARTS">{{ $j }}</a></li>
                                                    @endfor
                                        </ul>
                                        <br class="clear">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="pagecounter pb-2">
                                        <h6>1-1 of 1 product(s) </h6>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="productDetailTable">
                                            <table class="table" id="setProductInTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Category </th>
                                                        <th>Product</th>
                                                        <th>Description </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="insrt_product_and_detail">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-secrices" role="tabpanel" aria-labelledby="nav-secrices-tab" tabindex="0">
                                <div class="py-4">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <select class="form-control editInput selectOptions" id="product_categories">
                                                <option>--Any Category--</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control editInput" placeholder="Search Term" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                <button class="btn btn-outline-secondary editInput profileDrop" type="button" id="button-addon2">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="alphabeticListHolder">
                                        <ul class="alphabeticList">
                                            <li><a href="#" class="alphabeticLink" data-term="all" data-search_mode="ALL">All</a></li>
                                            @for ($i = 65; $i <= 90; $i++)
                                                <li><a href="#" class="alphabeticLink" data-term="{{ chr($i) }}" data-search_mode="STARTS">{{ chr($i) }}</a></li>
                                                @endfor
                                                <li>&nbsp;</li>
                                                @for($j = 0; $j <= 9; $j++)
                                                    <li><a href="#" class="alphabeticLink" data-term="{{ $j }}" data-search_mode="STARTS">{{ $j }}</a></li>
                                                    @endfor
                                        </ul>
                                        <br class="clear">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="pagecounter pb-2">
                                        <h6>1-1 of 1 product(s) </h6>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="productDetailTable">
                                            <table class="table" id="setServiceInTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Category </th>
                                                        <th>Product</th>
                                                        <th>Description </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="insrt_product_and_detail">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-consumable" role="tabpanel" aria-labelledby="nav-consumable-tab" tabindex="0">
                                <div class="py-4">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <select class="form-control editInput selectOptions" id="product_categories">
                                                <option>--Any Category--</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control editInput" placeholder="Search Term" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                <button class="btn btn-outline-secondary editInput profileDrop" type="button" id="button-addon2">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="alphabeticListHolder">
                                        <ul class="alphabeticList">
                                            <li><a href="#" class="alphabeticLink" data-term="all" data-search_mode="ALL">All</a></li>
                                            @for ($i = 65; $i <= 90; $i++)
                                                <li><a href="#" class="alphabeticLink" data-term="{{ chr($i) }}" data-search_mode="STARTS">{{ chr($i) }}</a></li>
                                                @endfor
                                                <li>&nbsp;</li>
                                                @for($j = 0; $j <= 9; $j++)
                                                    <li><a href="#" class="alphabeticLink" data-term="{{ $j }}" data-search_mode="STARTS">{{ $j }}</a></li>
                                                    @endfor
                                        </ul>
                                        <br class="clear">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="pagecounter pb-2">
                                        <h6>1-1 of 1 product(s) </h6>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="productDetailTable">
                                            <table class="table" id="setConsumableInTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Category </th>
                                                        <th>Product</th>
                                                        <th>Description </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="insrt_product_and_detail">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-productGroup" role="tabpanel" aria-labelledby="nav-productGroup-tab" tabindex="0">
                                <div class="tabheadingTitle">
                                    <h3>Product Group - </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal body -->
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn profileDrop" id="listAllProduct">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openProductListModal() {
        $.ajax({
            url: '{{ route("item.ajax.getCategoriesList") }}',
            method: 'GET',
            success: function(response) {
                console.log(response);
                var productCat = document.getElementById('product_categories');
                productCat.innerHTML = '';
                let newOption = document.createElement('option');
                newOption.text = "-Any Category-";
                productCat.appendChild(newOption);
                response.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.text = user.name;
                    productCat.appendChild(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        getproductsOnType(1, 'setProductInTable');

        $.ajax({
            url: '{{ route("item.ajax.getProductCounts") }}',
            method: 'GET',
            success: function(response) {
                console.log("CountPeoduct", response.data);
                document.getElementById('productCount').textContent = response.data.product.toString().padStart(2, '0');
                document.getElementById('serviceCount').textContent = response.data.service.toString().padStart(2, '0');
                document.getElementById('consumableCount').textContent = response.data.consumable.toString().padStart(2, '0');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $('#productModalBAC').modal('show');
    }

    function populateTable(data, tableId) {
        const tableBody = document.querySelector(`#${tableId} tbody`);
        tableBody.innerHTML = ''; // Clear the table body

        if (data.length === 0) {
            const noDataRow = document.createElement('tr');
            const noDataCell = document.createElement('td');

            noDataCell.setAttribute('colspan', 4);
            noDataCell.textContent = 'No products found';
            noDataCell.style.textAlign = 'center'; // Center the message

            noDataRow.appendChild(noDataCell);
            tableBody.appendChild(noDataRow);
        } else {
            data.forEach(item => {
                const row = document.createElement('tr');
                row.setAttribute('data-id', item.id);

                row.addEventListener('click', (event) => {
                    if (event.target && event.target.nodeName === 'TD') {
                        const clickedRow = event.target.parentNode;
                        const productInput = clickedRow.querySelector('input.product_id');
                        const productId = parseInt(clickedRow.getAttribute('data-id'));
                        const productIdsInput = document.getElementById('selectedProductIds');
                        let productIds = JSON.parse(productIdsInput.value || '[]');
                        if (!productIds.includes(productId)) {
                            productIds.push(productId);
                        } else {
                            productIds = productIds.filter(id => id !== productId);
                        }
                        productIdsInput.value = JSON.stringify(productIds);
                    }
                });

                const codeCell = document.createElement('td');
                codeCell.textContent = item.product_code;
                row.appendChild(codeCell);

                const categoryCell = document.createElement('td');
                categoryCell.innerHTML = item.name;
                row.appendChild(categoryCell);

                const productCell = document.createElement('td');
                productCell.textContent = item.product_name;
                row.appendChild(productCell);

                const descriptionCell = document.createElement('td');
                descriptionCell.textContent = item.description;
                row.appendChild(descriptionCell);

                tableBody.appendChild(row);
            });
        }
    }

    function getproductsOnType(type, tableId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route("item.ajax.getProductList") }}',
            method: 'Post',
            data: {
                type: type
            },
            success: function(response) {
                console.log(response);
                populateTable(response.data, tableId);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>