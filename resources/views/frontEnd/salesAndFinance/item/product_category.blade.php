@include('frontEnd.jobs.layout.header')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="main_section_page px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4 ">
                    <div class="pageTitle">
                        <h3>Product Category</h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                    <div class="jobsection">
                        <a href="#" class="profileDrop" data-bs-toggle="modal" data-bs-target="#itemsCatagoryModal">Add</a>
                    </div>
                </div>
              
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
                                <div class="jobsection">
                                    <a href="#" class="profileDrop">Delete</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="pageTitleBtn p-0">
                                    <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a>        
                                </div>
                            </div>
                        </div>
                        </div>

                        <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center" style=" width:60px;"><input type="checkbox" id="selectAll"> <label for="selectAll"> </label></th>
                                    <th>#</th>
                                    <th>Product Category</th>
                                    <th>Level</th>
                                    <th>No. Of Products</th>
                                    <th>No. Of Children</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                                               
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @endphp
                                @foreach ($product_categories_list as $category_value)
                                <tr>
                                    <td></td>
                                    <td>{{$i}}</td>
                                    <td>{{$category_value['product_name']}}</td>
                                    <td>{{$category_value['level']}}</td>
                                    <td>{{$category_value['number_of_products']}}</td>
                                    <td>{{$category_value['number_of_children']}}</td>                                    
                                    <td>
                                        @if($category_value['status']==1)
                                        <span class="grencheck"><i class="fa-solid fa-circle-check"></i></span>
                                        @else
                                        <span class="graycheck"><i class="fa-solid fa-circle-check"></i></span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="pageTitleBtn p-0">
                                            <div class="nav-item dropdown">
                                                <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action </a>
                                                <div class="dropdown-menu fade-up m-0">
                                                    <a href="#" class="dropdown-item col-form-label" data-bs-toggle="modal" data-bs-target="#itemsCatagoryModal">Edit Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>



                        <!-- ********************************** -->




                        <div class="modal fade" id="itemsCatagoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="itemsCatagoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                            <div class="modal-content add_Customer">
                                <div class="modal-header">
                                <h5 class="modal-title fs-5" id="itemsCatagoryModalLabel">Product Category - consumable</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                        <div class="contantbodypopup p-0">                                                                                                
                                            <div class="mb-2 row">
                                                <label for="inputCity" class="col-sm-3 col-form-label">Product Category*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control editInput" id="inputCity" value="">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="inputCity" class="col-sm-3 col-form-label">Parent Category</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control editInput selectOptions" id="inputCustomer">
                                                        <option value=""></option>
                                                        @foreach($product_categories as $pcategories)
                                                        <option value="{{$pcategories->id}}">{{$pcategories->name}}</option>
                                                        @endforeach
                                                        {{-- <option> None </option>
                                                        <option> Default </option> --}}
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
                        </div>




                      <!-- ***************************************** -->
                    </div>   <!-- End off main Table -->
                </div>
            </di>
        </div>
    </section>
































@include('frontEnd.jobs.layout.footer')