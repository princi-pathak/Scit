@include('frontEnd.salesAndFinance.jobs.layout.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4 ">
            <div class="pageTitle">
                <h3>Products</h3>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 col-lg-12 col-xl-12 px-3">
            <div class="jobsection">
                <a href="#" class="profileDrop" onclick="itemsAddProductModal(1)">Add</a>
                <a href="#" class="profileDrop">Active (5)</a>
                <a href="#" class="profileDrop">Inactive (5)</a>
                {{-- <a href="#" class="profileDrop" id="impExpClickbtnPopup">Import/Export</a> --}}
            </div>
        </div>


        <!--Start Import/Export Popup -->
        <div id="importExportpopup" class="importExportMrgin">
            <div class="popup-content">
                <div class="popupTitle">
                    <span class="">Import/Export - Produc</span>
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
                                            <label class="col-form-label">Download an empty template to add new
                                                products or prices</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="importTemp">Product & price <a href="#!">
                                                            <span class="material-symbols-outlined">download</span>
                                                        </a> </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="importTemp"> Supplier & price <a href="#!">
                                                            <span class="material-symbols-outlined">download</span>
                                                        </a> </label>
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
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>


                                <fieldset>
                                    <div class="form-card">
                                        <label class="fieldlabels">Upload Your Photo:</label>
                                        <input type="file" name="pic" accept="image/*">
                                    </div> <input type="button" name="next" class="next action-button"
                                        value="Submit" /> <input type="button" name="previous"
                                        class="previous action-button-previous" value="Previous" />
                                </fieldset>


                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png"
                                                    class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5 class="purple-text text-center">You Have Successfully Signed Up
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
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
                                <a href="#" class="profileDrop">Delete</a>
                                <div class="pageTitleBtn p-0">
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle profileDrop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Bulk Action </a>
                                        <div class="dropdown-menu fade-up m-0">
                                            <a href="#" class="dropdown-item col-form-label">Set Accont
                                                Codes</a>
                                            <a href="#" class="dropdown-item col-form-label">Set Tax
                                                Rats</a>
                                            <a href="#" class="dropdown-item col-form-label">Fix duplicate
                                                product codes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="pageTitleBtn p-0">
                                <a href="#" class="profileDrop"> <i class="material-symbols-outlined">
                                        settings </i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" style=" width:60px;"><input type="checkbox" id="selectAll">
                                <label for="selectAll"> </label>
                            </th>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Type</th>
                            <th>Product Category</th>
                            <th>Description</th>
                            <th>Customer</th>
                            <th>Cost Price</th>
                            <th>Markup</th>
                            <th>Price</th>
                            <th>Tax Rate</th>
                            <th>Created On</th>
                            <th>Last Updated On</th>
                            <th>Status</th>
                            <th></th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td></td>
                            <td>1</td>
                            <td>Computer</td>
                            <td>CO-0001</td>
                            <td>Consumable</td>
                            <td>consumable</td>
                            <td>We are providing all type of computer service</td>
                            <td>0</td>
                            <td>£200.00 </td>
                            <td>-20</td>
                            <td> £160.00 </td>
                            <td>5</td>
                            <td>06/09/2024 05:59</td>
                            <td>06/09/2024 05:59</td>

                            <td>
                                <span class="grencheck"><i class="fa-solid fa-circle-check"></i></span>
                            </td>
                            <td>
                                <div class="pageTitleBtn p-0">
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle profileDrop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action </a>
                                        <div class="dropdown-menu fade-up m-0">
                                            <a href="#" class="dropdown-item col-form-label"
                                                data-bs-toggle="modal" data-bs-target="#itemsAddProductModal">Edit
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>


                <!-- *************First addProduct model********************* -->



                {{-- <div class="modal fade" id="itemsAddProductModal" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" aria-labelledby="customerModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content add_Customer">
                            <div class="modal-header">
                                <h5 class="modal-title" id="customerModalLabel">Add Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <div class="formDtail">
                                            <!-- <form action="" class="customerForm"> -->
                                            <div class="mb-2 row">
                                                <label for="inputName"
                                                    class="col-sm-4 col-form-label">Customer</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputCustomer">
                                                        <option>-All-</option>
                                                        <option>Analytical Customer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputCustomer" class="col-sm-4 col-form-label">Product
                                                    Category</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputCustomer">
                                                        <option>Genrale Customer </option>
                                                        <option>Analytical Customer </option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1 ps-0">
                                                    <a href="#!" class="formicon" id="productCetagoryPopup"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>



                                            <!--Start Product Cetagory Popup -->

                                            <div id="cetagpopup" class="popupfst">
                                                <div class="popup-content">
                                                    <div class="popupTitle">
                                                        <span class="">Product Cetagory</span>
                                                        <span class="close" id="closecatagPopup">&times;</span>
                                                    </div>
                                                    <div class="contantbodypopup">
                                                        <form action="" class="customerForm">
                                                            <div class="mb-2 row">
                                                                <label for="inputCity"
                                                                    class="col-sm-3 col-form-label">Product
                                                                    Cetagory*</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control editInput" id="inputCity"
                                                                        value="Port Elizabeth">
                                                                </div>
                                                            </div>

                                                            <div class="mb-2 row">
                                                                <label for="inputCity"
                                                                    class="col-sm-3 col-form-label">Parent
                                                                    Cetagory</label>
                                                                <div class="col-sm-9">
                                                                    <select
                                                                        class="form-control editInput selectOptions"
                                                                        id="inputCustomer">
                                                                        <option> None </option>
                                                                        <option> Default </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label for="inputCity"
                                                                    class="col-sm-3 col-form-label">Status</label>
                                                                <div class="col-sm-9">
                                                                    <select
                                                                        class="form-control editInput selectOptions"
                                                                        id="inputCustomer">
                                                                        <option> None </option>
                                                                        <option> Default </option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>

                                                    <div class="popupF  customer_Form_Popup">

                                                        <button type="button" class="profileDrop">Save</button>
                                                        <button type="button" class="profileDrop">Save &
                                                            Close</button>
                                                        <button type="button" class="profileDrop">Cancel</button>

                                                    </div>
                                                </div>

                                            </div>

                                            <!-- End off Product Cetagory Popup -->


                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-4 col-form-label">Product
                                                    Name*</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputName" value="John Smith">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputProject" class="col-sm-4 col-form-label">Product
                                                    Type</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control editInput selectOptions"
                                                        id="inputCustomer">
                                                        <option>Please Select</option>
                                                        <option>Supervisor</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1 ps-0">
                                                    <a href="#!" class="formicon"><i
                                                            class="fa-solid fa-square-plus"></i></a>
                                                </div>
                                            </div>



                                            <div class="mb-2 row">
                                                <label for="inputEmail" class="col-sm-4 col-form-label">Product
                                                    Code </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputEmail" value="roxy.scits@gmail.com">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputEmail" class="col-sm-4 col-form-label">Cost Price
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputEmail" value="roxy.scits@gmail.com">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputTelephone"
                                                    class="col-sm-4 col-form-label">Markup</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputTelephone" value="14000883788">
                                                </div>

                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputMobile" class="col-sm-4 col-form-label">Price
                                                    *</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control editInput"
                                                        id="inputPrice" value="Price">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCounty"
                                                    class="col-sm-4 col-form-label">Description</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control textareaInput" name="address" id="inputAddress" rows="3"
                                                        placeholder="75 Cope Road Mall Park USA"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="inputCounty" class="col-sm-4 col-form-label pt-0">show
                                                    Product</label>
                                                <div class="col-sm-8">
                                                    <span class="oNOfswich">
                                                        <input type="checkbox">
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- </form> -->
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <div class="formDtail">
                                            <form action="" class="">
                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-4 col-form-label">Bar
                                                        Code</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control editInput"
                                                            id="inputCity" value="Port Elizabeth">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-4 col-form-label">Sales
                                                        Tax Rate</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>None</option>
                                                            <option>Default</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 ps-0">
                                                        <a href="#!" class="formicon" id="openPopupButton">
                                                            <i class="fa-solid fa-square-plus"></i>
                                                        </a>
                                                    </div>


                                                    <!--Sales Tax Rate Popup -->

                                                    <div id="popup" class="popup">
                                                        <div class="popup-content">
                                                            <div class="popupTitle">
                                                                <span class="">Add Tax Rate</span>
                                                                <span class="close" id="closePopup">&times;</span>
                                                            </div>
                                                            <div class="contantbodypopup">
                                                                <form action="" class="customerForm">
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Tax
                                                                            Rate Name*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Tax
                                                                            Rate*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Status</label>
                                                                        <div class="col-sm-9">
                                                                            <select
                                                                                class="form-control editInput selectOptions"
                                                                                id="inputCustomer">
                                                                                <option> None </option>
                                                                                <option> Default </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">External
                                                                            Tax Code</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Expiry
                                                                            Date</label>
                                                                        <div class="col-sm-7">
                                                                            <input type="date"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <div class="popupF  customer_Form_Popup">

                                                                <button type="button"
                                                                    class="profileDrop">Save</button>
                                                                <button type="button" class="profileDrop">Save &
                                                                    Close</button>
                                                                <button type="button"
                                                                    class="profileDrop">Cancel</button>

                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!-- End off Sales Tax Rate Popup -->


                                                </div>

                                                <div class="mb-2 row">
                                                    <label for="inputProject" class="col-sm-4 col-form-label">Purchase
                                                        Tax Rate</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>None</option>
                                                            <option>Default</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 ps-0">
                                                        <a href="#!" class="formicon" id="purchaseTaxRatePop">
                                                            <i class="fa-solid fa-square-plus"></i>
                                                        </a>
                                                    </div>

                                                    <!--Purchase Tax Rate Popup -->
                                                    <div id="purchasepopup" class="purchasepopup">
                                                        <div class="popup-content">
                                                            <div class="popupTitle">
                                                                <span class="">Purchase Tax Rate</span>
                                                                <span class="close"
                                                                    id="closePurchasePopup">&times;</span>
                                                            </div>
                                                            <div class="contantbodypopup">
                                                                <form action="" class="">
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Tax
                                                                            Rate Name*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Tax
                                                                            Rate*</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Status</label>
                                                                        <div class="col-sm-9">
                                                                            <select
                                                                                class="form-control editInput selectOptions"
                                                                                id="inputCustomer">
                                                                                <option> None </option>
                                                                                <option> Default </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">External
                                                                            Tax Code</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <label for="inputCity"
                                                                            class="col-sm-3 col-form-label">Expiry
                                                                            Date</label>
                                                                        <div class="col-sm-7">
                                                                            <input type="date"
                                                                                class="form-control editInput"
                                                                                id="inputCity" value="Port Elizabeth">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <div class="popupF  customer_Form_Popup">

                                                                <button type="button"
                                                                    class="profileDrop">Save</button>
                                                                <button type="button" class="profileDrop">Save &
                                                                    Close</button>
                                                                <button type="button"
                                                                    class="profileDrop">Cancel</button>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--End off Purchase Tax Rate Popup -->
                                                </div>

                                                <div class="mb-2 row">
                                                    <label for="inputAddress" class="col-sm-4 col-form-label">Nominal
                                                        Code
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control editInput"
                                                            id="inputCity" value="Port Elizabeth">
                                                    </div>
                                                </div>

                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-4 col-form-label">Sales
                                                        A/c Code</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>--Please Select--</option>
                                                            <option>United kingdom (+44)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-4 col-form-label">Purchase
                                                        A/c Code
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>--Please Select--</option>
                                                            <option>United kingdom (+44)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputCity" class="col-sm-4 col-form-label">Expense
                                                        A/c Code</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>--Please Select--</option>
                                                            <option>United kingdom (+44)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="inputCounty"
                                                        class="col-sm-4 col-form-label">Location</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control editInput"
                                                            id="location" placeholder="Location">
                                                    </div>
                                                </div>

                                                <div class="mb-2 row">
                                                    <label for="inputCity"
                                                        class="col-sm-4 col-form-label">Status</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control editInput selectOptions"
                                                            id="inputCustomer">
                                                            <option>Active</option>
                                                            <option>United kingdom (+44)</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="mb-2 row">
                                                    <label for="inputName"
                                                        class="col-sm-4 col-form-label">Attachment</label>
                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control editInput"
                                                            id="inputName">
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="productDetailTable">
                                            <table class="table" id="containerA">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Supplier </th>
                                                        <th>Part Number</th>
                                                        <th>Cost Price</th>
                                                        <th>
                                                            <a href="#!" class="formicon" id="openPopupButton">
                                                                <i class="fa-solid fa-square-plus"></i>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- End row -->
                            </div>
                            <div class="modal-footer customer_Form_Popup">

                                <button type="button" class="profileDrop">Save</button>
                                <button type="button" class="profileDrop">Save &
                                    Close</button>
                                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End off Customer popup -->
                <!-- *************Secend model********************* -->

                {{-- <div class="modal fade" id="itemsCatagoryModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="itemsCatagoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content add_Customer">
                            <div class="modal-header">
                                <h5 class="modal-title fs-5" id="itemsCatagoryModalLabel">Product Category -
                                    consumable</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <div class="contantbodypopup p-0">
                                    <div class="mb-2 row">
                                        <label for="inputCity" class="col-sm-3 col-form-label">Product
                                            Category*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control editInput" id="inputCity"
                                                value="Port Elizabeth">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="inputCity" class="col-sm-3 col-form-label">Parent
                                            Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                <option> None </option>
                                                <option> Default </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="inputCity" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                            <select class="form-control editInput selectOptions" id="inputCustomer">
                                                <option> Active </option>
                                                <option> Default </option>
                                            </select>
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
                </div> --}}
                <!-- *************End Secend model********************* -->



                <!-- ***************************************** -->
            </div> <!-- End off main Table -->
        </div>
    </di>
</div>
</section>

{{-- <footer class="mainFooter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="f_text">
                    <p>Powered by <a href="#!">Eworks Manager</a> @ 2020 v. 6.9.53, last updated : 22/04/2020
                        17:02 (A2) Our <a href="#!"> Teams Of Business</a> and <a href="#!">Privacy
                            Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>




</div><!-- End off main_wrappper -->

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>
<script src="https://www.ville-pont-eveque.fr/tools/library/DataTables/media/js/jquery.dataTables.js"></script>
<script src="https://www.ville-pont-eveque.fr/tools/library/DataTables/extensions/Select/js/dataTables.select.js">
</script>
<script src="assets/js/custom.js"></script>

<script>
    // **************************impExpClickbtnPopup

    const impExpClickbtnPopup = document.getElementById('impExpClickbtnPopup');
    const importExportpopup = document.getElementById('importExportpopup');
    const closeimportExportPopup = document.getElementById('closeimportExportPopup');

    impExpClickbtnPopup.addEventListener('click', () => {
        importExportpopup.style.display = 'block';
        setTimeout(() => {
            importExportpopup.style.opacity = '1';
        }, 50);
    });

    closeimportExportPopup.addEventListener('click', () => {
        importExportpopup.style.opacity = '0';
        setTimeout(() => {
            importExportpopup.style.display = 'none';
        }, 300);
    });
    // **************************End impExpClickbtnPopup
    // **************************Purchase Tax Rate

    const purchaseTaxRatePop = document.getElementById('purchaseTaxRatePop');
    const purchasepopup = document.getElementById('purchasepopup');
    const closePurchasePopup = document.getElementById('closePurchasePopup');

    purchaseTaxRatePop.addEventListener('click', () => {
        purchasepopup.style.display = 'block';
        setTimeout(() => {
            purchasepopup.style.opacity = '1';
        }, 50);
    });

    closePurchasePopup.addEventListener('click', () => {
        purchasepopup.style.opacity = '0';
        setTimeout(() => {
            purchasepopup.style.display = 'none';
        }, 300);
    });
    // **************************End Purchase Tax Rate
    // **************************Product Cetagory
    const productCetagoryPopup = document.getElementById('productCetagoryPopup');
    const cetagpopup = document.getElementById('cetagpopup');
    const closecatagPopup = document.getElementById('closecatagPopup');

    productCetagoryPopup.addEventListener('click', () => {
        cetagpopup.style.display = 'block';
        setTimeout(() => {
            cetagpopup.style.opacity = '1';
        }, 50);
    });

    closecatagPopup.addEventListener('click', () => {
        cetagpopup.style.opacity = '0';
        setTimeout(() => {
            cetagpopup.style.display = 'none';
        }, 300);
    });
    // **************************End Product Cetagory




    $(document).ready(function() {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function() {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function() {
            return false;
        })

    });
</script> --}}
<script>
    function additemsCatagoryModal(th){
        //alert();
        $('#category_name').val('');
        $('#parentcategory').val('');
        $('#product_category_status').val(1);
        $('#productCategoryID').val('');
        $('#productCategorytype').val(th);
        $('#itemsCatagoryModal').modal('show');
    }
</script>
<script>
    function itemsAddProductModal(th){
        $("#productform")[0].reset();
        $(".needs-validationp").removeClass('was-validated');
        $('#producttype').val(th);
        //$('#taxratepopup').css('display','block');
        $('#itemsAddProductModal').modal('show');
    }
</script>

@include('frontEnd.salesAndFinance.item.common.addproductmodal')
@include('frontEnd.salesAndFinance.item.common.productcategoryaddmodal')
@include('frontEnd.salesAndFinance.jobs.layout.footer')
