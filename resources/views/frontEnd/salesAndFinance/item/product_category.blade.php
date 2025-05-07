@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Product category')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')


<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Product category</h4>
                    </header>

                    <div class="panel-body">

                        <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                            <div class="jobsection justify-content-end">
                                <a href="#" class="btn btn-green" onclick="additemsCatagoryModal(1)"><i class="fa fa-plus"></i> Add </a>
                                <input type="button" class="btn btn-warning" id="getCheckedValues" value="Delete">
                                <span class="text-danger text-center deletemsg"></span>
                            </div>
                            
                        </div>
                    
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="maimTable mt-2">


                                <!-- <table id="myTable" class="display tablechange" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style=" width:60px;"><input type="checkbox" id="selectAll">
                                                <label for="selectAll"> </label>
                                            </th>
                                            <th>#</th>
                                            <th>Product Category</th>
                                            <th>Level</th>
                                            <th>No. Of Products</th>
                                            <th>No. Of Children</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($product_categories_list as $category_value)
                                        <tr>
                                            <td class="text-center"><input type="checkbox" class="checkproductcategory"
                                                    name="checkproductcategory{{ $i }}"
                                                    id="checkproductcategory{{ $i }}"
                                                    value="{{ $category_value['id'] }}"
                                                    @if ($category_value['number_of_children'] !=0) disabled @endif></td>
                                            <td>{{ $i }}</td>
                                            <td>{{ $category_value['product_name'] }}</td>
                                            <td>{{ $category_value['level'] }}</td>
                                            <td>{{ $category_value['number_of_products'] }}</td>
                                            <td>{{ $category_value['number_of_children'] }}</td>
                                            <td>
                                                @if ($category_value['status'] == 1)
                                                <span class="grencheck"
                                                    onclick="changestatus({{ $category_value['id'] }},0)"><i
                                                        class="fa fa-check-circle"></i></span>
                                                @else
                                                <span class="graycheck"
                                                    onclick="changestatus({{ $category_value['id'] }},1)"><i
                                                        class="fa fa-check-circle"></i></span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="pageTitleBtn p-0">
                                                    <div class="nav-item dropdown">
                                                        <a href="#" class="btn btn-warning">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                        $i++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table> -->
                    <table id="myTable" class="display tablechange" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center" style=" width:60px;"><input type="checkbox" id="selectAll">
                                    <label for="selectAll"> </label>
                                </th>
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
                            $i = 1;
                            @endphp
                            @foreach ($product_categories_list as $category_value)
                            <tr>
                                <td class="text-center"><input type="checkbox" class="checkproductcategory"
                                        name="checkproductcategory{{ $i }}"
                                        id="checkproductcategory{{ $i }}"
                                        value="{{ $category_value['id'] }}"
                                        @if ($category_value['number_of_children'] !=0) disabled @endif></td>
                                <td>{{ $i }}</td>
                                <td>{{ $category_value['product_name'] }}</td>
                                <td>{{ $category_value['level'] }}</td>
                                <td>{{ $category_value['number_of_products'] }}</td>
                                <td>{{ $category_value['number_of_children'] }}</td>
                                <td>
                                    @if ($category_value['status'] == 1)
                                    <span class="grencheck"
                                        onclick="changestatus({{ $category_value['id'] }},0)"><i
                                            class="fa fa-check-circle"></i></span>
                                    @else
                                    <span class="graycheck"
                                        onclick="changestatus({{ $category_value['id'] }},1)"><i
                                            class="fa fa-check-circle"></i></span>
                                    @endif
                                </td>
                                <td>
                                    <div class="pageTitleBtn p-0">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-warning"
                                                data-toggle="dropdown" aria-expanded="false">
                                                Action </a>
                                            <div class="dropdown-menu fade-up m-0">
                                                <a href="#" class="dropdown-item col-form-label" onclick="edititemsCatagoryModal('{{ $category_value['id'] }}','{{ $category_value['product_name'] }}','{{ $category_value['cat_id'] }}','{{ $category_value['status'] }}')">Edit
                                                    Details</a>
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

                            </div> <!-- End off main Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function changestatus(id, status) {
        var token = "<?= csrf_token() ?>";
        if (confirm("Are you sure want to change the status?")) {
            $.ajax({
                type: 'POST',
                url: '{{ route("item.changeProductCategoryStatus") }}',
                data: {
                    id: id,
                    status: status,
                    _token: token
                },
                success: function(data) {
                    if (isAuthenticated(response) == false) {
                        return false;
                    }
                    location.reload();
                }

            });
        }
    }
</script>
<script>
    document.getElementById('getCheckedValues').addEventListener('click', function() {
        const checkedValues = Array.from(document.querySelectorAll('.checkproductcategory:checked'))
            .map(checkbox => checkbox.value);
        //alert("Checked values: " + checkedValues.join(", "));
        var id = checkedValues.join(", ");
        var token = "<?= csrf_token() ?>";
        if (id == "") {
            $('.deletemsg').text("Please select product category");
            return false;
        } else {
            if (confirm("Are you sure want to delete this?")) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("item.delete_product_category") }}',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(data) {
                        console.log(data);
                        if (isAuthenticated(response) == false) {
                            return false;
                        }

                        location.reload();
                    }

                });
            }
        }
    });
</script>
<script>
    const checkAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.checkproductcategory');

    checkAll.addEventListener('change', function() {
        $('.deletemsg').text("");
        checkboxes.forEach(checkbox => {
            if (!checkbox.disabled) { // Only set checked state for enabled checkboxes
                checkbox.checked = this.checked;
            }
        });
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            $('.deletemsg').text("");
            if (!this.checked) {
                checkAll.checked = false; // Uncheck "Check All" if any checkbox is unchecked
            } else {
                // If all enabled checkboxes are checked, check the "Check All" checkbox
                const allChecked = Array.from(checkboxes).every(cb => cb.checked || cb.disabled);
                checkAll.checked = allChecked;
            }
        });
    });
</script>

<script>
    function edititemsCatagoryModal(id, name, catid, status, th) {
        // alert(id);
        // alert(name);
        // alert(catid);
        // alert(status);
        //itemsCatagoryModal
        $('#category_name').val(name);
        $('#parentcategory').val(catid);
        $('#product_category_status').val(status);
        $('#productCategoryID').val(id);
        $('#productCategorytype').val(th);
        $('#itemsCatagoryModal').modal('show');
    }
</script>
<script>
    function additemsCatagoryModal(th) {
        //alert();
        $('#category_name').val('');
        $('#parentcategory').val('');
        $('#product_category_status').val(1);
        $('#productCategoryID').val('');
        $('#productCategorytype').val(th);
        $('#itemsCatagoryModal').modal('show');
    }
</script>

@include('frontEnd.salesAndFinance.item.common.productcategoryaddmodal')
@endsection