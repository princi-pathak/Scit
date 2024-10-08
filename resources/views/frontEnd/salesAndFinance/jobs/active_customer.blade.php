@include('frontEnd.salesAndFinance.jobs.layout.header')
<style>
    <?php if($list_mode == 'ACTIVE'){?>
    #active {
        background-color:#474747;
    }
    .icon {
        color: white;
        background-color: green;
        border-radius: 15px;
        font-size: x-large;
    }
    
    <?php }else{?>
    #inactive{
        background-color:#474747;
    }
    .icon {
        color: white;
        background-color: #474747;
        border-radius: 15px;
        font-size: x-large;
    }
    <?php }?>

</style>
<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>All Customers</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="jobsection">
                    <a href="{{ url('customer_add_edit') }}" class="profileDrop" >New Customer</a>
                    <a href="{{ url('customers?list_mode=ACTIVE') }}" class="profileDrop" id="active">Active Customer <span>({{$active_customer}})</span></a>
                    <a href="{{ url('customers?list_mode=INACTIVE') }}" class="profileDrop" id="inactive">Inactive Customer<span>({{$inactive_customer}})</span></a>
                    <a href="#!" class="profileDrop">Bulk Actions<span></span></a>
                    <a href="#!" class="profileDrop">Import</a><a href="#!">Click here to download import template</a>
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
                            <a href="#!">Show Search Filter</a>
                        </div>

                    </div>
                    <div class="markendDelete">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="jobsection">
                                    <a href="#" class="profileDrop">Delete</a>
                                    <a href="#" class="profileDrop">Mark As completed</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="pageTitleBtn p-0">
                                    <!-- <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-success text-center" style="display:none">
                        <p>Status Change Successfully Done</p>
                    </div>

                    <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Contact Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($customer as $k=>$val){?>
                            <tr>
                                <td></td>
                                <td>{{++$k}}.</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->address}}</td>
                                <td>{{$val->contact_name}}</td>
                                <td>{{$val->email}}</td>
                                <td>{{$val->telephone}}</td>
                                <td><a href="javascript:void(0)" onclick="status_change({{$val->id}},{{$val->status}})"><i class="fa fa-check icon"></i></a></td>
                                <td>
                                    <div class="d-inline-flex align-items-center ">
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown">
                                                Action
                                            </a>
                                            <div class="dropdown-menu fade-up m-0">
                                                <a href="{{url('customer_add_edit?key=')}}{{$val->id}}" class="dropdown-item">Edit Details</a>
                                                <a href="#!" class="dropdown-item">Record Expense</a>
                                                <hr class="dropdown-divider">
                                                <a href="#!" class="dropdown-item">CRM History</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                           <?php }?>
                        </tbody>
                    </table>

                </div> <!-- End off main Table -->
                <!-- Model start here -->

                    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reject Confirmation</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Lead Ref:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Reject Type:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <a href="#!" data-bs-toggle="modal" data-bs-target="#rejectModal2"><i class="fa-solid fa-square-plus"></i></a>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Reject Reason:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="rejectModal2" tabindex="1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel2">New message</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- end here -->
            </div>
        </di>
    </div>
    <script>
        function status_change(id, status){
            var token='<?php echo csrf_token();?>'
            var model="Customer";
            $.ajax({
                type: "POST",
                url: "{{url('/status_change')}}",
                data: {id:id,status:status,model:model,_token:token},
                success: function(data) {
                    console.log(data);
                    if($.trim(data)==1){
                        // $('.alert').show().fadeOut(800);
                        $(".alert").show('slow' , 'linear').delay(2000).fadeOut(setTimeout(function() {
                        location.reload();
                    }, 3000));

                        
                    }
                    
                }
            });
        }
    </script>
</section>

@include('frontEnd.salesAndFinance.jobs.layout.footer')