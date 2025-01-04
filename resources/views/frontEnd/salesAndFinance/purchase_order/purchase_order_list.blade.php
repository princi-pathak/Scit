@include('frontEnd.salesAndFinance.jobs.layout.header')
<style>
    .currency {
    padding: 2px 3px 2px 5px;
    line-height: 17px;
    text-shadow: 0 1px 0 #ffffff;
    border: 1px solid #ccc;
    background-color: #efefef;
    margin-right: 5px;
}
.image_style {
    cursor: pointer;
}
#active_inactive {
    background-color:#474747;
}
.tutor-student-tooltip-col{
    position: relative;
    color: #000;
    text-decoration:none;
    font-size:12px;
}
.tutor-student-tooltip-col:hover .tutor-student-tooltiptext3 {
    visibility: visible;
}

.tutor-student-tooltiptext3 {
    visibility: hidden;
    width: 155px;
    background-color: #0877bd;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 10px;
    box-sizing: border-box;
    position: absolute;
    z-index: 1;
    top: 25px;
    left: -30px;
    font-size: 12px;
    font-weight: 500;
    text-transform: capitalize;
}
.parent-container {
    position: absolute;
    background: #fff;
    width:190px;
}
#deptList li:hover{
    cursor: pointer;
}
#tagList li:hover{
    cursor: pointer;
}
#supplierList li:hover{
    cursor: pointer;
}
#customerList li:hover{
    cursor: pointer;
}
#cretaedByList li:hover{
    cursor: pointer;
}
#projectList li:hover{
    cursor: pointer;
}
ul#deptList {
    padding: 0 5px;
    height: 156px;
    overflow: auto;
}
ul#tagList {
    padding: 0 5px;
    height: 156px;
    overflow: auto;
}
ul#supplierList {
    padding: 0 5px;
    height: 156px;
    overflow: auto;
}
ul#customerList {
    padding: 0 5px;
    height: 156px;
    overflow: auto;
}
ul#cretaedByList {
    padding: 0 5px;
    height: 156px;
    overflow: auto;
}
ul#projectList {
    padding: 0 5px;
    height: 156px;
    overflow: auto;
}

</style>
<section class="main_section_page px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4 ">
                    <div class="pageTitle">
                        <h3>Draft Purchase Orders</h3>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                    <div class="pageTitleBtn">
                        <a href="#!" class="profileDrop"> Search Purchase Orders</a>
                        <a href="#!" class="profileDrop"> Invoice Received</a>
                        <a href="#!" class="profileDrop dropdown-toggle"> Statements</a>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                    <div class="jobsection">
                        <div class="d-inline-flex align-items-center ">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                    New
                                </a>
                                <div class="dropdown-menu fade-up m-0">
                                    <a href="#!" class="dropdown-item">Send SMS</a>
                                    <a href="#!" class="dropdown-item">Preview</a>
                                    <a href="#!" class="dropdown-item">Print</a>
                                    <a href="#!" class="dropdown-item">Email</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('draft_purchase_order') }}" class="profileDrop" <?php if($status['status'] == 1){?>id="active_inactive"<?php }?>>Draft <span>({{$draftCount}})</span></a>
                        <a href="{{ url('draft_purchase_order?list_mode=AwaitingApprivalPurchaseOrders') }}" class="profileDrop" <?php if($status['status'] == 2){?>id="active_inactive"<?php }?>>Awaiting Approval<span>({{$awaitingApprovalCount}})</span></a>
                        <a href="{{ url('draft_purchase_order?list_mode=Approved') }}" class="profileDrop" <?php if($status['status'] == 3){?>id="active_inactive"<?php }?>>Approved<span>({{$approvedCount}})</span></a>
                        <a href="{{ url('draft_purchase_order?list_mode=Rejected') }}" class="profileDrop" <?php if($status['status'] == 8){?>id="active_inactive"<?php }?>>Rejected<span>({{$rejectedCount}})</span></a>
                        <a href="{{ url('draft_purchase_order?list_mode=Actioned') }}" class="profileDrop" <?php if($status['status'] == 4){?>id="active_inactive"<?php }?>>Actioned<span>({{$actionedCount}})</span></a>
                        <a href="{{ url('draft_purchase_order?list_mode=Paid') }}" class="profileDrop" <?php if($status['status'] == 5){?>id="active_inactive"<?php }?>>Paid<span>({{$paidCount}})</span></a>
                        
                    </div>
                </div>
              
            </div>
            <di class="row">
                <div class="col-lg-12">
                    <div class="maimTable">
                        <div class="printExpt">
                            <div class="prntExpbtn">
                            <a href="#!">Print</a>
                            <a href="#!">Export</a>
                            </div>
                            <div class="searchFilter">
                                <a href="#!" onclick="hideShowDiv()" class="hidebtn">Show Search Filter</a>
                            </div>

                        </div>

                        <div class="searchJobForm" id="divTohide">
                            <form id="search_dataForm" class="p-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">PO Ref:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="po_ref">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Department:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="department">
                                                <input type="hidden" id="selectedDeptId" name="selectedDeptId">
                                                <div class="parent-container department-container"></div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Tag:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="tag">
                                                <input type="hidden" id="selectedTagtId" name="selectedTagtId">
                                                <div class="parent-container tag-container"></div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            
                                            <label class="col-md-4 col-form-label text-end ">
                                            <a href="#!" class="tutor-student-tooltip-col">
                                                EDD From:

                                                <span class="tutor-student-tooltiptext3">Expedcted Delivery Date</span>
                                                </a>
                                            </label>
                                            
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="edd_startDate">
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="edd_endDate">
                                            </div>
                                        </div>
                                   
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Supplier:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="supplier">
                                                <input type="hidden" id="selectedsupplierId" name="selectedsupplierId">
                                                <div class="parent-container supplier-container"></div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">PO Date From:</label>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="po_startDate">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="po_endDate" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Customer:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="customer">
                                                <input type="hidden" id="selectedCustomerId" name="selectedCustomerId">
                                                <div class="parent-container customer-container"></div>
                                            </div>
                                        </div>
                                    
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Created By:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="created_by">
                                                <input type="hidden" id="selectedcreatedById" name="selectedcreatedById">
                                                <div class="parent-container createdBy-container"></div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">PO Posted:</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="po_posted">
                                                    <option selected disabled>--Any--</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Project:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="project">
                                                <input type="hidden" id="selectedProjectId" name="selectedProjectId">
                                                <div class="parent-container project-container"></div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Keywords:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="keywords">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Delivery Status:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="delivery_status">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pageTitleBtn justify-content-center">
                                            <a href="javascript:void(0)" onclick="searchBtn()" class="profileDrop px-3">Search </a>
                                            <a href="javascript:void(0)" onclick="clearBtn()" class="profileDrop px-3">Clear</a>                
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> 
                        <div class="markendDelete">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="jobsection d-flex">
                                        <a href="javascript:void(0)" id="deleteSelectedRows" class="profileDrop">Delete</a>
                                    </div>
                                </div>
                                <!-- <div class="col-md-5">
                                    <div class="pageTitleBtn p-0">
                                        <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a>        
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th class="text-center" style=" width:30px;"><input type="checkbox" id="selectAll"></th>
                                    <th>#</th>
                                    <th>PO Ref</th>
                                    <th>Date</th>
                                    <th>Supplier</th>
                                    <th>Customer</th>
                                    <th>Delivery</th>
                                    <th>Sub Total</th>
                                    <th>VAT</th>
                                    <th>Total </th>
                                    <th>Outstanding </th>
                                    <th>Status</th>
                                    <th>Delivery</th>
                                    <th></th>
                                </tr>
                            </thead>
                                               
                            <tbody id="search_data">
                                <?php 
                                    $all_subTotalAmount=0;
                                    $all_vatTotalAmount=0;
                                    $all_TotalAmount=0;
                                ?>
                                @foreach($list as $val)
                                <?php 
                                    $customer=App\Customer::find($val->customer_id);
                                    $sub_total_amount=0;
                                    $total_amount=0;
                                    $vat_amount=0;
                                    foreach($val->purchaseOrderProducts as $product){
                                        $qty=$product->qty*$product->price;
                                        $sub_total_amount=$sub_total_amount+$qty;
                                        $vat=$product->vat+$sub_total_amount;
                                        $total_amount=$total_amount+$vat;
                                        $vat_amount=$vat_amount+$product->vat;

                                        $all_subTotalAmount=$all_subTotalAmount+$sub_total_amount;
                                        $all_vatTotalAmount=$all_vatTotalAmount+$vat_amount;
                                        $all_TotalAmount=$all_TotalAmount+$total_amount;
                                    }
                                ?>
                                <tr>
                                    <td>
                                    <div class="text-center"><input type="checkbox" id="" class="delete_checkbox" value="{{$val->id}}"></div></td>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$val->purchase_order_ref}}</td>
                                    <td>{{ date('d/m/Y', strtotime($val->purchase_date)) }}</td>
                                    <td>{{$val->suppliers->name}}</td>
                                    <td>{{$customer->name ?? ''}}</td>
                                    <td>{{$val->city}}</td>
                                    <td>£{{$sub_total_amount}}</td>
                                    <td>£{{$vat_amount}}</td>
                                    <td>£{{$total_amount}}</td>
                                    <td>£{{$total_amount}}</td>
                                    <td>{{$status['list_status']}}</td>
                                    <td>-</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <div class="nav-item dropdown">
                                                <a href="#!" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="dropdown-menu fade-up m-0">
                                                    <a href="{{url('purchase_order_edit?key=')}}{{base64_encode($val->id)}}" class="dropdown-item">Edit</a>
                                                    <a href="#!" class="dropdown-item">Preview</a>
                                                    <a href="#!" class="dropdown-item">Duplicate</a>
                                                    <a href="#!" class="dropdown-item">Approve</a>
                                                    <a href="#!" class="dropdown-item">CRM / History</a>
                                                    <a href="#!" class="dropdown-item">Start Timer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @if(count($list)>0)
                            <tr class="calcualtionShowHide">
                                <th colspan="2"> <label class="col-form-label p-0">Page Sub Total:</label></th>
                                <th colspan="12"></th>
                            </tr>
                            <tr class="calcualtionShowHide">
                                <td colspan="7"></td>
                                
                                <td id="Tablesub_total_amount">£{{$all_subTotalAmount}}</td>
                                <td id="Tablevat_amount">£{{$all_vatTotalAmount}}</td>
                                <td id="Tabletotal_amount">£{{$all_TotalAmount}}</td>
                                <td id="Tableoutstanding_amount" colspan="8">£{{$all_TotalAmount}}</td>
                            </tr>
                            @endif
                        </table>

                    </div>   <!-- End off main Table -->
                </div>
            </di>
        </div>
</section>
<!-- Models Start Here -->


<!-- End here -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script>
   $("#deleteSelectedRows").on('click', function() {
    let ids = [];
    
    $('.delete_checkbox:checked').each(function() {
        ids.push($(this).val());
    });
    if(ids.length == 0){
        alert("Please check the checkbox for delete");
    }else{
        if(confirm("Are you sure to delete?")){
            // console.log(ids);
            var token='<?php echo csrf_token();?>'
            var model='PurchaseOrder';
            $.ajax({
                type: "POST",
                url: "{{url('/bulk_delete')}}",
                data: {ids:ids,model:model,_token:token},
                success: function(data) {
                    console.log(data);
                    if(data){
                        location.reload();
                    }else{
                        alert("Something went wrong");
                    }
                    // return false;
                },
                error: function(xhr, status, error) {
                   var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + xhr.responseJSON.message);
                }
            });
        }
    }
    
});
$('.delete_checkbox').on('click', function() {
    if ($('.delete_checkbox:checked').length === $('.delete_checkbox').length) {
        $('#selectAll').prop('checked', true);
    } else {
        $('#selectAll').prop('checked', false);
    }
});
 </script>
<script>
    function clearBtn(){
        $("#search_dataForm")[0].reset();
    }
    function searchBtn(){
        var po_ref=$("#po_ref").val();
        var department=$("#department").val();
        var tag=$("#tag").val();
        var edd_startDate=$("#edd_startDate").val();
        var edd_endDate=$("#edd_endDate").val();
        var supplier=$("#supplier").val();
        var po_startDate=$("#po_startDate").val();
        var po_endDate=$("#po_endDate").val();
        var customer=$("#customer").val();
        var created_by=$("#created_by").val();
        var po_posted=$("#po_posted").val();
        var project=$("#project").val();
        var keywords=$("#keywords").val();
        var delivery_status=$("#delivery_status").val();
        var status='<?php echo $status['status'];?>'
        var list_status='<?php echo $status['list_status'];?>'
        var selectedDeptId=$("#selectedDeptId").val();
        var selectedTagtId=$("#selectedTagtId").val();
        var selectedsupplierId=$("#selectedsupplierId").val();
        var selectedCustomerId=$("#selectedCustomerId").val();
        var selectedcreatedById=$("#selectedcreatedById").val();
        var selectedProjectId=$("#selectedProjectId").val();
        const Httpurl = new URL(window.location.href);
        const params = new URLSearchParams(Httpurl.search);
        const key = params.get('list_mode');
        let isEmpty = true;
        $("#search_dataForm").find("input, select").each(function() {
            if ($(this).val() && $(this).val().trim() !== "") {
                isEmpty = false;
                return false;
            }
        });
        if (isEmpty) {
            alert("Please fill in at least one field before searching.");
            return false;
        }
        
        if(edd_startDate != '' && edd_endDate == ''){
            alert("Please choose both date");
            return false;
        }
        if(edd_startDate == '' && edd_endDate != ''){
            alert("Please choose both date");
            return false;
        }
        $.ajax({
            url: "{{ url('searchPurchaseOrders') }}",
            method: 'post',
            data: {
                po_ref: po_ref,department:department,selectedDeptId:selectedDeptId,tag:tag,selectedTagtId:selectedTagtId,supplier:supplier,selectedsupplierId:selectedsupplierId,edd_startDate:edd_startDate,edd_endDate:edd_endDate,po_startDate:po_startDate,po_endDate:po_endDate,customer:customer,selectedCustomerId:selectedCustomerId,created_by:created_by,selectedcreatedById:selectedcreatedById,po_posted:po_posted,project:project,selectedProjectId:selectedProjectId,keywords:keywords,delivery_status:delivery_status,status:status,list_status:list_status,_token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                // return false;
                var table = $('#exampleOne').DataTable();
                table.destroy();
                if(response.data.length>0){
                    $("#search_data").html(response.data);
                    $("#Tablesub_total_amount").text("£"+response.all_subTotalAmount);
                    $("#Tablevat_amount").text("£"+response.all_vatTotalAmount);
                    $("#Tabletotal_amount").text("£"+response.all_TotalAmount);
                    $("#Tableoutstanding_amount").text("£"+response.all_TotalAmount);
                    $(".calcualtionShowHide").show();
                }else{
                    $("#search_data").html(response.data);
                    $(".calcualtionShowHide").hide();
                }
                // $('#exampleOne').DataTable();
                $('#exampleOne').DataTable({
                    order: [[1, 'asc']],
                    language: {
                        paginate: {
                            previous: "Previous",
                            next: "Next"
                        },
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        infoEmpty: "No entries available",
                        emptyTable: '<span style="color: red; font-weight: bold;">Sorry, there are no items available</span>',
                        infoFiltered: "(filtered from _MAX_ total entries)",
                        lengthMenu: "Show _MENU_ entries",
                        search: "Search:",
                        zeroRecords: "No matching records found"
                    },
                    paging: true
                });
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        }); 
    }
    $("#edd_endDate").change(function () {
      var startDate = document.getElementById("edd_startDate").value;
      var endDate = document.getElementById("edd_endDate").value;

      if ((Date.parse(startDate) >= Date.parse(endDate))) {
          alert("End date should be greater than Start date");
          document.getElementById("edd_endDate").value = "";
      }
  });
  $("#edd_startDate").change(function () {
      var startDate = document.getElementById("edd_startDate").value;
      var endDate = document.getElementById("edd_endDate").value;

      if ((Date.parse(endDate) <= Date.parse(startDate))) {
          alert("Start date should be less than End date");
          document.getElementById("edd_startDate").value = "";
      }
  });
  $("#po_endDate").change(function () {
      var startDate = document.getElementById("po_startDate").value;
      var endDate = document.getElementById("po_endDate").value;

      if ((Date.parse(startDate) >= Date.parse(endDate))) {
          alert("End date should be greater than Start date");
          document.getElementById("po_endDate").value = "";
      }
  });
  $("#po_startDate").change(function () {
      var startDate = document.getElementById("po_startDate").value;
      var endDate = document.getElementById("po_endDate").value;

      if ((Date.parse(endDate) <= Date.parse(startDate))) {
          alert("Start date should be less than End date");
          document.getElementById("po_startDate").value = "";
      }
  });
</script>
<script>
    $(document).ready(function() {
        $('#department').on('keyup', function() {
            let search_deptquery = $(this).val();
            const deptdivList = document.querySelector('.department-container');

            if (search_deptquery === '') {
                deptdivList.innerHTML = '';
            }
            if (search_deptquery.length > 2) {
                $.ajax({
                    url: "{{ url('searchDepartment') }}",
                    method: 'post',
                    data: {
                        search_deptquery: search_deptquery,_token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // return false;
                        deptdivList.innerHTML = "";
                        const div = document.createElement('div');
                        div.className = 'dept_container';

                      
                        const ul = document.createElement('ul');
                        ul.id = "deptList";
                        if(response.data.length >0){
                            response.data.forEach(item => {
                                const li = document.createElement('li'); 
                                li.textContent = item.title; 
                                li.id = item.id;
                                li.name = item.title;
                                li.className = "editInput";
                                ul.appendChild(li); 
                                const hr = document.createElement('hr');
                                // hr.className='dropdown-divider';
                                ul.appendChild(hr);
                            });

                            div.appendChild(ul);

                            deptdivList.appendChild(div);

                            ul.addEventListener('click', function(event) {
                                deptdivList.innerHTML = '';
                                document.getElementById('department').value = '';
                                if (event.target.tagName.toLowerCase() === 'li') {
                                    const selectedDeptId = event.target.id;
                                    const selectedDeptName = event.target.name;
                                    console.log('Selected Customer ID:', selectedDeptId);
                                    console.log('Selected Customer Name:', selectedDeptName);
                                    $("#department").val(selectedDeptName);
                                    $("#selectedDeptId").val(selectedDeptId);
                                    // getCustomerData(selectedId,selectedDeptName);
                                }
                            });
                        }else{
                            const Errorli = document.createElement('li'); 
                            Errorli.textContent = 'Sorry Data Not found'; 
                            Errorli.id = 'searchError';
                            Errorli.className = "editInput";
                            ul.appendChild(Errorli); 
                            div.appendChild(ul);
                            deptdivList.appendChild(div);
                            setTimeout(function() {
                                deptdivList.innerHTML = '';
                            }, 1000);
                        }

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                deptdivList.innerHTML = '';
                $('#results').empty();
            }
        });

        $('#tag').on('keyup', function() {
            let search_tagquery = $(this).val();
            const tagdivList = document.querySelector('.tag-container');

            if (search_tagquery === '') {
                tagdivList.innerHTML = '';
            }
            if (search_tagquery.length > 2) {
                $.ajax({
                    url: "{{ url('searchTag') }}",
                    method: 'post',
                    data: {
                        search_tagquery: search_tagquery,_token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // return false;
                        tagdivList.innerHTML = "";
                        const div = document.createElement('div');
                        div.className = 'tag_container';

                      
                        const ul = document.createElement('ul');
                        ul.id = "tagList";
                        if(response.data.length >0){
                            response.data.forEach(item => {
                                const li = document.createElement('li'); 
                                li.textContent = item.title; 
                                li.id = item.id;
                                li.name = item.title;
                                li.className = "editInput";
                                ul.appendChild(li); 
                                const hr = document.createElement('hr');
                                // hr.className='dropdown-divider';
                                ul.appendChild(hr);
                            });

                            div.appendChild(ul);

                            tagdivList.appendChild(div);

                            ul.addEventListener('click', function(event) {
                                tagdivList.innerHTML = '';
                                document.getElementById('tag').value = '';
                                if (event.target.tagName.toLowerCase() === 'li') {
                                    const selectedTagtId = event.target.id;
                                    const selectedTagName = event.target.name;
                                    console.log('Selected Customer ID:', selectedTagtId);
                                    console.log('Selected Customer Name:', selectedTagName);
                                    $("#tag").val(selectedTagName);
                                    $("#selectedTagtId").val(selectedTagtId);
                                }
                            });
                        }else{
                            const Errorli = document.createElement('li'); 
                            Errorli.textContent = 'Sorry Data Not found'; 
                            Errorli.id = 'searchError';
                            Errorli.className = "editInput";
                            ul.appendChild(Errorli); 
                            div.appendChild(ul);
                            tagdivList.appendChild(div);
                            setTimeout(function() {
                                tagdivList.innerHTML = '';
                            }, 1000);
                        }

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                tagdivList.innerHTML = '';
                $('#results').empty();
            }
        });

        $('#supplier').on('keyup', function() {
            let search_supplierquery = $(this).val();
            const supplierdivList = document.querySelector('.supplier-container');

            if (search_supplierquery === '') {
                supplierdivList.innerHTML = '';
            }
            if (search_supplierquery.length > 2) {
                $.ajax({
                    url: "{{ url('searchSupplier') }}",
                    method: 'post',
                    data: {
                        search_supplierquery: search_supplierquery,_token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // return false;
                        supplierdivList.innerHTML = "";
                        const div = document.createElement('div');
                        div.className = 'supplier_container';

                      
                        const ul = document.createElement('ul');
                        ul.id = "supplierList";
                        if(response.data.length >0){
                            response.data.forEach(item => {
                                const li = document.createElement('li'); 
                                li.textContent = item.name; 
                                li.id = item.id;
                                li.name = item.name;
                                li.className = "editInput";
                                ul.appendChild(li); 
                                const hr = document.createElement('hr');
                                // hr.className='dropdown-divider';
                                ul.appendChild(hr);
                            });

                            div.appendChild(ul);

                            supplierdivList.appendChild(div);

                            ul.addEventListener('click', function(event) {
                                supplierdivList.innerHTML = '';
                                document.getElementById('supplier').value = '';
                                if (event.target.tagName.toLowerCase() === 'li') {
                                    const selectedsupplierId = event.target.id;
                                    const selectedSupplierName = event.target.name;
                                    console.log('Selected Customer ID:', selectedsupplierId);
                                    console.log('Selected Customer Name:', selectedSupplierName);
                                    $("#supplier").val(selectedSupplierName);
                                    $("#selectedsupplierId").val(selectedsupplierId);
                                }
                            });
                        }else{
                            const Errorli = document.createElement('li'); 
                            Errorli.textContent = 'Sorry Data Not found'; 
                            Errorli.id = 'searchError';
                            Errorli.className = "editInput";
                            ul.appendChild(Errorli); 
                            div.appendChild(ul);
                            supplierdivList.appendChild(div);
                            setTimeout(function() {
                                supplierdivList.innerHTML = '';
                            }, 1000);
                        }

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                supplierdivList.innerHTML = '';
                $('#results').empty();
            }
        });

        $('#customer').on('keyup', function() {
            let search_query = $(this).val();
            const customerdivList = document.querySelector('.customer-container');

            if (search_query === '') {
                customerdivList.innerHTML = '';
            }
            if (search_query.length > 2) {
                $.ajax({
                    url: "{{ url('searchCustomerName') }}",
                    method: 'post',
                    data: {
                        search_query: search_query,_token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // return false;
                        customerdivList.innerHTML = "";
                        const div = document.createElement('div');
                        div.className = 'customer_container';

                      
                        const ul = document.createElement('ul');
                        ul.id = "customerList";
                        if(response.data.length >0){
                            response.data.forEach(item => {
                                const li = document.createElement('li'); 
                                li.textContent = item.name; 
                                li.id = item.id;
                                li.name = item.name;
                                li.className = "editInput";
                                ul.appendChild(li); 
                                const hr = document.createElement('hr');
                                // hr.className='dropdown-divider';
                                ul.appendChild(hr);
                            });

                            div.appendChild(ul);

                            customerdivList.appendChild(div);

                            ul.addEventListener('click', function(event) {
                                customerdivList.innerHTML = '';
                                document.getElementById('customer').value = '';
                                if (event.target.tagName.toLowerCase() === 'li') {
                                    const selectedCustomerId = event.target.id;
                                    const selectedCustomerName = event.target.name;
                                    console.log('Selected Customer ID:', selectedCustomerId);
                                    console.log('Selected Customer Name:', selectedCustomerName);
                                    $("#customer").val(selectedCustomerName);
                                    $("#selectedCustomerId").val(selectedCustomerId);
                                }
                            });
                        }else{
                            const Errorli = document.createElement('li'); 
                            Errorli.textContent = 'Sorry Data Not found'; 
                            Errorli.id = 'searchError';
                            Errorli.className = "editInput";
                            ul.appendChild(Errorli); 
                            div.appendChild(ul);
                            customerdivList.appendChild(div);
                            setTimeout(function() {
                                customerdivList.innerHTML = '';
                            }, 1000);
                        }

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                customerdivList.innerHTML = '';
                $('#results').empty();
            }
        });

        $('#created_by').on('keyup', function() {
            let search_createdbyquery = $(this).val();
            const createdbydivList = document.querySelector('.createdBy-container');

            if (search_createdbyquery === '') {
                createdbydivList.innerHTML = '';
            }
            if (search_createdbyquery.length > 2) {
                $.ajax({
                    url: "{{ url('searchCreatedBy') }}",
                    method: 'post',
                    data: {
                        search_createdbyquery: search_createdbyquery,_token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // return false;
                        createdbydivList.innerHTML = "";
                        const div = document.createElement('div');
                        div.className = 'cretedby_container';

                      
                        const ul = document.createElement('ul');
                        ul.id = "cretaedByList";
                        if(response.data.length >0){
                            response.data.forEach(item => {
                                const li = document.createElement('li'); 
                                li.textContent = item.name; 
                                li.id = item.id;
                                li.name = item.name;
                                li.className = "editInput";
                                ul.appendChild(li); 
                                const hr = document.createElement('hr');
                                // hr.className='dropdown-divider';
                                ul.appendChild(hr);
                            });

                            div.appendChild(ul);

                            createdbydivList.appendChild(div);

                            ul.addEventListener('click', function(event) {
                                createdbydivList.innerHTML = '';
                                document.getElementById('created_by').value = '';
                                if (event.target.tagName.toLowerCase() === 'li') {
                                    const selectedcreatedById = event.target.id;
                                    const selectedCreatedByName = event.target.name;
                                    console.log('Selected Customer ID:', selectedcreatedById);
                                    console.log('Selected Customer Name:', selectedCreatedByName);
                                    $("#created_by").val(selectedCreatedByName);
                                    $("#selectedcreatedById").val(selectedcreatedById);
                                }
                            });
                        }else{
                            const Errorli = document.createElement('li'); 
                            Errorli.textContent = 'Sorry Data Not found'; 
                            Errorli.id = 'searchError';
                            Errorli.className = "editInput";
                            ul.appendChild(Errorli); 
                            div.appendChild(ul);
                            createdbydivList.appendChild(div);
                            setTimeout(function() {
                                createdbydivList.innerHTML = '';
                            }, 1000);
                        }

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                createdbydivList.innerHTML = '';
                $('#results').empty();
            }
        });

        $('#project').on('keyup', function() {
            let search_projectquery = $(this).val();
            const projectdivList = document.querySelector('.project-container');

            if (search_projectquery === '') {
                projectdivList.innerHTML = '';
            }
            if (search_projectquery.length > 2) {
                $.ajax({
                    url: "{{ url('searchProject') }}",
                    method: 'post',
                    data: {
                        search_projectquery: search_projectquery,_token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // return false;
                        projectdivList.innerHTML = "";
                        const div = document.createElement('div');
                        div.className = 'project_container';

                      
                        const ul = document.createElement('ul');
                        ul.id = "projectList";
                        if(response.data.length >0){
                            response.data.forEach(item => {
                                const li = document.createElement('li'); 
                                li.textContent = item.project_name; 
                                li.id = item.id;
                                li.name = item.project_name;
                                li.className = "editInput";
                                ul.appendChild(li); 
                                const hr = document.createElement('hr');
                                // hr.className='dropdown-divider';
                                ul.appendChild(hr);
                            });

                            div.appendChild(ul);

                            projectdivList.appendChild(div);

                            ul.addEventListener('click', function(event) {
                                projectdivList.innerHTML = '';
                                document.getElementById('project').value = '';
                                if (event.target.tagName.toLowerCase() === 'li') {
                                    const selectedProjectId = event.target.id;
                                    const selectedProjectName = event.target.name;
                                    console.log('Selected Customer ID:', selectedProjectId);
                                    console.log('Selected Customer Name:', selectedProjectName);
                                    $("#project").val(selectedProjectName);
                                    $("#selectedProjectId").val(selectedProjectId);
                                }
                            });
                        }else{
                            const Errorli = document.createElement('li'); 
                            Errorli.textContent = 'Sorry Data Not found'; 
                            Errorli.id = 'searchError';
                            Errorli.className = "editInput";
                            ul.appendChild(Errorli); 
                            div.appendChild(ul);
                            projectdivList.appendChild(div);
                            setTimeout(function() {
                                projectdivList.innerHTML = '';
                            }, 1000);
                        }

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                projectdivList.innerHTML = '';
                $('#results').empty();
            }
        });

    });
</script>
@include('frontEnd.salesAndFinance.jobs.layout.footer')