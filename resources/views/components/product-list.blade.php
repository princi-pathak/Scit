<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->

    <!-- Modal -->
    <div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content add_Customer">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="{{ $modalId }}Label">{{ $modalTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="modal-body ">
                        <div class="extraInformationTab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-product" type="button" role="tab" aria-controls="nav-Notes" aria-selected="true">Product(s) <span class="productCount">01</span></button>
                                    <button class="nav-link" id="nav-secrices-tab" data-bs-toggle="tab" data-bs-target="#nav-secrices" type="button" role="tab" aria-controls="nav-secrices" aria-selected="false">Service(s) <span class="productCount">01</span></button>
                                    <button class="nav-link" id="nav-consumable-tab" data-bs-toggle="tab" data-bs-target="#nav-consumable" type="button" role="tab" aria-controls="nav-consumable" aria-selected="false">Consumable(s) <span class="productCount">01</span></button>
                                    <button class="nav-link" id="nav-productGroup-tab" data-bs-toggle="tab" data-bs-target="#nav-productGroup" type="button" role="tab" aria-controls="nav-productGroup" aria-selected="false">Product Group(s) <span class="productCount">01</span></button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab" tabindex="0">
                                    <div class="py-4">

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <select class="form-control editInput selectOptions" id="inputCustomer">
                                                    <option>--Any Category--</option>
                                                    <option>Default</option>
                                                    <option>Default</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control editInput" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                    <button class="btn btn-outline-secondary editInput profileDrop" type="button" id="button-addon2">Button</button>
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
                                                <table class="table" id="containerA">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Code</th>
                                                            <th>Product </th>
                                                            <th>Code Price</th>
                                                            <th>Price </th>
                                                            <th>Qty</th>
                                                            <th>Amount </th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7"><label class="red_sorryText"> Sorry, no records to show</label></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-secrices" role="tabpanel" aria-labelledby="nav-secrices-tab" tabindex="0">
                                    <div class="tabheadingTitle">
                                        <h3>Service - </h3>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-consumable" role="tabpanel" aria-labelledby="nav-consumable-tab" tabindex="0">
                                    <div class="tabheadingTitle">
                                        <h3>Consumable - </h3>

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
                </div> <!-- end modal body -->
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn profileDrop">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>