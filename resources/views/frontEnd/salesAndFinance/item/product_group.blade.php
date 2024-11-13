@include('frontEnd.salesAndFinance.jobs.layout.header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4 ">
            <div class="pageTitle">
                <h3>Product Group</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 px-3">
            <div class="jobsection">
                <a href="#!" class="profileDrop" data-bs-toggle="modal" data-bs-target="#itemsCatagoryModal">Add</a>
            </div>
        </div>


        <!--Start Import/Export Popup -->
        {{-- <div id="importExportpopup" class="importExportMrgin">
            <div class="popup-content">
                <div class="popupTitle">
                    <span class="">Import/Export - Product</span>
                    <span class="close" id="closeimportExportPopup">&times;</span>
                </div>
                <div class="contantbodypopup">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                        <div class="card">
                            <form id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Import/Export</strong></li>
                                    <li id="personal"><strong>Action</strong></li>
                                    <li id="payment"><strong>Upload</strong></li>
                                    <li id="confirm"><strong>Summary</strong></li>
                                </ul>

                                <fieldset>
                                    <div class="form-card">
                                        <div class="newJobForm p-3 mb-3">
                                            <h4 class="contTitle text-start">Import Templates</h4>
                                            <label class="col-form-label">Download an empty template to add new products or prices</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="importTemp">Product & price <a href="#!"> <span class="material-symbols-outlined">download</span></a></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="importTemp"> Supplier & price <a href="#!"> <span class="material-symbols-outlined">download</span> </a> </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="newJobForm p-3">
                                            <h4 class="contTitle text-start">Import</h4>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                </fieldset>

                                <fieldset>
                                    <div class="form-card">
                                        <label class="fieldlabels">First Name: *</label> <input type="text" />
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                </fieldset>


                                <fieldset>
                                    <div class="form-card">
                                        <label class="fieldlabels">Upload Your Photo:</label>
                                        <input type="file" name="pic" accept="image/*">
                                    </div> 
                                    <input type="button" name="next" class="next action-button" value="Submit" /> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                </fieldset>


                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5 class="purple-text text-center">You Have Successfully Signed Up </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End off Import/Export Popup -->

    </div>
    <di class="row">
        <div class="col-lg-12">
            <div class="maimTable mt-2">
                <div class="printExpt">
                    <div class="prntExpbtn">
                        <a href="#!">Print</a>
                        <a href="#!">Export</a>
                    </div>
                    <div class="searchFilter">
                        <a href="#!">Show Search Filter</a>
                    </div>
                </div>
                <div class="markendDelete">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="jobsection d-flex">
                                <input type="button" class="profileDrop" id="getCheckedValues" value="Delete">
                                <span class="alert text-danger text-center deletemsg"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" style=" width:60px;"><input type="checkbox" id="selectAll"> <label for="selectAll"> </label></th>
                            <th>#</th>
                            <th>Product Group</th>
                            <th>Description</th>
                            <th>Cost Price</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>


                    </tbody>
                </table>

            </div>
            <!-- End off main Table -->
        </div>
    </di>
</div>
</section>


<!-- ********************************** -->
<div class="modal fade" id="itemsCatagoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="itemsCatagoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="itemsCatagoryModalLabel">Product Groups</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <div class="contantbodypopup p-0">
                    <form action="" id="add_product_group_form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-4 col-form-label">Product Group*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="name" id="inputCity" value="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-4 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control textareaInput" name="description" id="inputAddress" rows="3" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-3 col-form-label">Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id="inputCity" name="code" value="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <select class="form-control editInput selectOptions" status="status" id="inputCustomer">
                                            <option> Active </option>
                                            <option> Inactive </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-3 col-form-label">Cost Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" name="cost_price" id="inputCity" value="0.00">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputCity" class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id="inputCity" value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h4 class="contTitle text-start mb-2 mt-2">Product Details</h4>
                                <div class="mb-3 row">
                                    <label for="inputCountry" class="col-sm-2 col-form-label">Select product</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control editInput" id="inputCountry" placeholder="Type to add product">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="plusandText">
                                            <span class="afterPlusText"> (Type to add product or <a href="#!" onclick="openProductListModal();" id="proClickHerePopup">Click here</a> to view all product)</span>
                                        </div>

                                        <!--Start (Type to add product or Popup -->
                                        @include('components.product-list')
                                        <!-- End off (Type to add product or Popup -->
                                    </div>
                                </div>
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
                                                <td colspan="7">
                                                    <label class="red_sorryText"> Sorry, no records to show </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- end modal body -->
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn profileDrop" onclick="saveProductGroup()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- ***************************************** -->
</div>

<script>
        function saveProductGroup() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        FormData = $('#add_product_group_form').seralize();
        $.ajax({
            url: '{{ route("item.ajax.saveProductGroup") }}',
            method: 'Post',
            data: FormData,
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>



@include('frontEnd.salesAndFinance.jobs.layout.footer')