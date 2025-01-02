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
                        <a href="{{ url('draft_purchase_order?list_mode=Approved') }}" class="profileDrop">Approved<span>({{$approvedCount}})</span></a>
                        <a href="{{ url('draft_purchase_order?list_mode=Rejected') }}" class="profileDrop">Rejected<span>({{$rejectedCount}})</span></a>
                        <a href="{{ url('draft_purchase_order?list_mode=Actioned') }}" class="profileDrop">Actioned<span>({{$actionedCount}})</span></a>
                        <a href="{{ url('draft_purchase_order?list_mode=Paid') }}" class="profileDrop">Paid<span>({{$paidCount}})</span></a>
                        
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
                            <form action="" class="p-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">PO Ref:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Department:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Tag:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName">
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
                                                <input type="date" class="form-control editInput" id="inputName">
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="inputName">
                                            </div>
                                        </div>
                                   
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Supplier:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">PO Date From:</label>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="inputName">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control editInput" id="inputName" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Customer:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName">
                                            </div>
                                        </div>
                                    
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Created By:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">PO Posted:</label>
                                            <div class="col-md-8">
                                                <select class="form-control editInput selectOptions" id="inputJobType">
                                                    <option>--Any--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Project:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Keywords:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <label class="col-md-4 col-form-label text-end">Delivery Status:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control editInput" id="inputName">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pageTitleBtn justify-content-center">
                                            <a href="#" class="profileDrop px-3">Search </a>
                                            <a href="#" class="profileDrop px-3">Clear</a>                
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
                                               
                            <tbody>
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
                                    }
                                ?>
                                <tr>
                                    <td><input type="checkbox" id="" class="delete_checkbox" value="{{$val->id}}"></td>
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
                        </table>

                    </div>   <!-- End off main Table -->
                </div>
            </di>
        </div>
</section>
<!-- Models Start Here -->


<!-- End here -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script>
        //Text Editer

var editor_config = {
  toolbar: [
      {name: 'basicstyles', items: ['Bold','Italic','Underline','Strike','-','RemoveFormat']},
      {name: 'format', items: ['Format']},
      {name: 'paragraph', items: ['Indent','Outdent','-','BulletedList','NumberedList']},
      {name: 'link', items: ['Link','Unlink']},
{name: 'undo', items: ['Undo','Redo']}
  ],
};

CKEDITOR.replace('purchase_supplier_notes', editor_config );
CKEDITOR.replace('purchase_delivery_notes', editor_config );
CKEDITOR.replace('purchase_internal_notes', editor_config );
//Text Editer
</script>
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

@include('frontEnd.salesAndFinance.jobs.layout.footer')