@include('frontEnd.salesAndFinance.jobs.layout.header')
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
                            {{-- <a href="#!">Export</a> --}}
                            </div>
                            <div class="searchFilter">
                                {{-- <a href="#!">Show Search Filter</a> --}}
                            </div>

                        </div>
                        <div class="markendDelete">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="jobsection">
                                    <input type="button" class="profileDrop" value="Delete">
                                </div>
                            </div>
                            <div class="col-md-5">
                                {{-- <div class="pageTitleBtn p-0">
                                    <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a>        
                                </div> --}}
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
                                @foreach ($product_categories_list as $category_value)
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkproductcategory" name="checkproductcategory{{$i}}" id="checkproductcategory{{$i}}" value="{{$category_value['id']}}"></td>
                                    <td>{{$i}}</td>
                                    <td>{{$category_value['product_name']}}</td>
                                    <td>{{$category_value['level']}}</td>
                                    <td>{{$category_value['number_of_products']}}</td>
                                    <td>{{$category_value['number_of_children']}}</td>                                    
                                    <td>
                                        @if($category_value['status']==1)
                                        <span class="grencheck" onclick="changestatus({{$category_value['id']}},0)"><i class="fa-solid fa-circle-check"></i></span>
                                        @else
                                        <span class="graycheck" onclick="changestatus({{$category_value['id']}},1)"><i class="fa-solid fa-circle-check"></i></span>
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

                    </div>   <!-- End off main Table -->
                </div>
            </di>
        </div>
    </section>
    <script>
        function changestatus(id,status){
            var token = "<?=csrf_token()?>";
            if(confirm("Are you sure want to change the status?")){
                $.ajax({
                    type:'POST',
                    url:'{{ route("item.changeProductCategoryStatus") }}',
                    data  :{id:id,status:status,_token:token},          
                    success:function(data){
                        location.reload();
                    }
                    
                });
            }
        }
    </script>
    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.checkproductcategory');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
    
@include('frontEnd.salesAndFinance.item.common.productcategoryaddmodal')
@include('frontEnd.salesAndFinance.jobs.layout.footer')