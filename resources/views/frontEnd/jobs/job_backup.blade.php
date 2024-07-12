<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Add Job</title>
    <style>
        .form_form {
            padding: 50px;
            border: 1px solid black;
            border-radius: 10px;
            box-shadow: 10px 10px 35px black;
        }
        .main_div {
            padding:50px
        }
        .custom-fieldset {
            position: relative;
            border: 2px solid #00000026;
            padding: 10px;
            margin-top: 20px;
        }
        .custom-legend {
            position: absolute;
            top: -10px;
            left: 20px;
            background-color: white;
            font-weight: bold;
            padding: 0 10px;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .modal-body .row {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="main_div">
        <div>
            <button onclick="open_model(4)">List</button>
            <button onclick="open_model(1)">Add Jobs</button>
            <button onclick="open_model(2)">Add Jobs Type</button>
            <button onclick="open_model(3)">Add Work Flow</button>
            <button onclick="open_model(5)">Add Product Category</button>
            <button onclick="open_model(6)">Add Product</button>
            <button onclick="open_model(10)">Add Quotes Type</button>
            <button onclick="open_model(7)">Add Quotes</button>
            <button onclick="open_model(8)">Add Projects</button>
            <button onclick="open_model(9)">Add Job Recurring</button>
        </div>
    </div>
    <div class="alert-msg"style="text-align:center;width:500px;display:none">
        <p class="alert alert-success msg" >Data is saved</p>
    </div>
    <div class="alert-del"style="text-align:center;width:500px;display:none">
        <p class="alert alert-danger msg" >Data is deleted</p>
    </div>
        <div class="all_list">
            <!-- Job list -->
            <div>Job List</div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Alert Customer</th>
                        <th>On route SMS</th>
                        <th>Product</th>
                        <th>Pay Amount</th>
                        <th>Job Type</th>
                        <th>Start Date</th>
                        <th>Complete By</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($job_list as $key=>$val){
                            $customer_name=App\ServiceUser::where('id',$val->customer_id)->first();
                            $job_type_detail=App\Models\Job_type::where('id',$val->job_type)->first(); 
                            $product_details=App\Models\Product::where('id',$val->product_id)->first();   
                        ?>
                        <tr>
                        <td>{{++$key}}</td>
                        <td>{{$customer_name->name}}</td>
                        <td>{{$val->contact}}</td>
                        <td><?php echo ($val->alert_customer == 1) ? "By email" : "No"; ?></td>
                        <td><?php echo ($val->on_route_sms == 1) ? "Yes" : "No"; ?></td>
                        <td><?php echo $product_details->product_name; ?></td>
                        <td>{{$val->pay_amount}}</td>
                        <td>{{$job_type_detail->name}}</td>
                        <td>{{$val->start_date}}</td>
                        <td>{{$val->complete_by}}</td>
                        <td>
                            <?php if($val->status == 1){?>
                                    <a href="javascript:" onclick="status_change(1,{{$val->id}},0)" class="btn btn-success">Active</a> 
                                <?php } else{?>
                                    <a href="javascript:" onclick="status_change(1,{{$val->id}},1)" class="btn btn-danger">In-active</a>
                                <?php }?>
                            </td>
                        <td><a href="javascript:" onclick="edit_job(1,{{$val->id}})" class="btn btn-primary">Edit</a> | <a href="javascript:" onclick="delete_job(1,{{$val->id}})" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- Job Type List-->
            <div>Job Type List</div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Default Days</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($job_type_list as $key=>$types){    
                        ?>
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$types->name}}</td>
                            <td>{{$types->default_days}}</td>
                            <td>
                            <?php if($types->status == 1){?>
                                    <a href="javascript:" onclick="status_change(2,{{$types->id}},0)" class="btn btn-success">Active</a> 
                                <?php } else{?>
                                    <a href="javascript:" onclick="status_change(2,{{$types->id}},1)" class="btn btn-danger">In-active</a>
                                <?php }?>
                            </td>
                            <td><a href="javascript:" onclick="edit_job(2,{{$types->id}})" class="btn btn-primary">Edit</a> | <a href="javascript:" onclick="delete_job(2,{{$types->id}})" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- Work flow List -->
            <div>Work flow List</div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($work_flow_list as $key=>$flow){?>
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$flow->flow_name}}</td>
                            <td>
                                <?php if($flow->status == 1){?>
                                    <a href="javascript:" onclick="status_change(3,{{$flow->id}},0)" class="btn btn-success">Active</a> 
                                <?php } else{?>
                                    <a href="javascript:" onclick="status_change(3,{{$flow->id}},1)" class="btn btn-danger">In-active</a>
                                <?php }?>
                            </td>
                            <td><a href="javascript:" onclick="edit_job(3,{{$flow->id}})" class="btn btn-primary">Edit</a> | <a href="javascript:" onclick="delete_job(3,{{$flow->id}})" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- Product Category List-->
            <div>Category List</div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($category_list as $key=>$cat){?>
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$cat->name}}</td>
                            <td>
                                <?php if($cat->status == 1){?>
                                    <a href="javascript:" onclick="status_change(5,{{$cat->id}},0)" class="btn btn-success">Active</a> 
                                <?php } else{?>
                                    <a href="javascript:" onclick="status_change(5,{{$cat->id}},1)" class="btn btn-danger">In-active</a>
                                <?php }?>
                            </td>
                            <td><a href="javascript:" onclick="edit_job(5,{{$cat->id}})" class="btn btn-primary">Edit</a> | <a href="javascript:" onclick="delete_job(5,{{$cat->id}})" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- Product List -->
            <div>Product List</div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Product Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($product_list as $key=>$product){
                                $category_detail=App\Models\Product_category::where('id',$product->cat_id)->first();
                            ?>
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$category_detail->name}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>
                                <?php if($product->status == 1){?>
                                    <a href="javascript:" onclick="status_change(6,{{$product->id}},0)" class="btn btn-success">Active</a> 
                                <?php } else{?>
                                    <a href="javascript:" onclick="status_change(6,{{$product->id}},1)" class="btn btn-danger">In-active</a>
                                <?php }?>
                            </td>
                            <td><a href="javascript:" onclick="edit_job(6,{{$product->id}})" class="btn btn-primary">Edit</a> | <a href="javascript:" onclick="delete_job(6,{{$product->id}})" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- Quotes type start -->
            <div>Ouotes Type List</div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Quote Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($quote_type_list as $key1=>$list){ ?>
                        <tr>
                            <td>{{++$key1}}</td>
                            <td>{{$list->name}}</td>
                            <td>
                                <?php if($list->status == 1){?>
                                    <a href="javascript:" onclick="status_change(10,{{$list->id}},0)" class="btn btn-success">Active</a> 
                                <?php } else{?>
                                    <a href="javascript:" onclick="status_change(10,{{$list->id}},1)" class="btn btn-danger">In-active</a>
                                <?php }?>
                            </td>
                            <td><a href="javascript:" onclick="edit_job(10,{{$list->id}})" class="btn btn-primary">Edit</a> | <a href="javascript:" onclick="delete_job(10,{{$list->id}})" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- quotes List start  -->
            <div>Ouotes List</div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Quote Referance</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($quote_list as $key=>$quote_lists){ 
                            $customer_details=App\ServiceUser::find($quote_lists->customer_id);?>
                        <tr>
                            <td>{{++$key}}</td>
                            <td>QU-{{$quote_lists->quote_ref}}</td>
                            <td>{{$customer_details->name}}</td>
                            <td>
                                <?php if($quote_lists->status == 1){?>
                                    <a href="javascript:" onclick="status_change(7,{{$quote_lists->id}},0)" class="btn btn-success">Active</a> 
                                <?php } else{?>
                                    <a href="javascript:" onclick="status_change(7,{{$quote_lists->id}},1)" class="btn btn-danger">In-active</a>
                                <?php }?>
                            </td>
                            <td><a href="javascript:" onclick="edit_job(7,{{$quote_lists->id}})" class="btn btn-primary">Edit</a> | <a href="javascript:" onclick="delete_job(7,{{$quote_lists->id}})" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- Project start  here-->
            <div>Project List</div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Project Ref.</th>
                        <th>Project Name</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($project_list as $key=>$projects){
                            $name=App\ServiceUser::where('id',$projects->customer_name)->first();   
                        ?>
                        <tr>
                        <td>{{++$key}}</td>
                        <td>{{$projects->project_ref}}</td>
                        <td>{{$projects->project_name}}</td>
                        <td>{{$name->name}}</td>
                        <td>
                            <?php if($projects->status == 1){?>
                                    <a href="javascript:" onclick="status_change(8,{{$projects->id}},0)" class="btn btn-success">Active</a> 
                                <?php } else{?>
                                    <a href="javascript:" onclick="status_change(8,{{$projects->id}},1)" class="btn btn-danger">In-active</a>
                                <?php }?>
                            </td>
                        <td><a href="javascript:" onclick="edit_job(8,{{$projects->id}})" class="btn btn-primary">Edit</a> | <a href="javascript:" onclick="delete_job(8,{{$projects->id}})" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- Job Recurring start -->
            <div>Job Recurring List</div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Alert Customer</th>
                        <th>On route SMS</th>
                        <th>Purchase Ref.</th>
                        <th>Pay Amount</th>
                        <th>Job Type</th>
                        <th style="width:10px">Site</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($job_recurring_list as $key=>$recurring_list){
                            $customer_name=App\ServiceUser::where('id',$recurring_list->customer_id)->first();
                            $job_type_detail=App\Models\Job_type::where('id',$val->job_type)->first();     
                        ?>
                        <tr>
                        <td>{{++$key}}</td>
                        <td>{{$customer_name->name}}</td>
                        <td>{{$recurring_list->mobile}}</td>
                        <td><?php echo ($recurring_list->customer_alert == 1) ? "By email" : "No"; ?></td>
                        <td><?php echo ($recurring_list->sms_alert == 1) ? "Yes" : "No"; ?></td>
                        <td>{{$recurring_list->purchase_orderref}}</td>
                        <td>{{$recurring_list->amount}}</td>
                        <td>{{$job_type_detail->name}}</td>
                        <td><?php if($recurring_list->site_id == 1){ echo "None";} else if($recurring_list->site_id == 2){echo "Same as Customer";}else if($recurring_list->site_id == 3){echo "03/5292/014/-CATTERALAVENUE";} else {echo "Raj";}?></td>
                        <td>{{$recurring_list->priority}}</td>
                        <td>
                            <?php if($recurring_list->status == 1){?>
                                    <a href="javascript:" onclick="status_change(9,{{$recurring_list->id}},0)" class="btn btn-success">Active</a> 
                                <?php } else{?>
                                    <a href="javascript:" onclick="status_change(9,{{$recurring_list->id}},1)" class="btn btn-danger">In-active</a>
                                <?php }?>
                            </td>
                        <td><a href="javascript:" onclick="edit_job(9,{{$recurring_list->id}})" class="btn btn-primary">Edit</a> | <a href="javascript:" onclick="delete_job(9,{{$recurring_list->id}})" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- end here -->
        </div>
    <!-- Add Job start here -->
    <div class="col-md-12 main_div" id="add_job" style="display:none">
        <form enctype="multipart/form-data" id="job_save" class="form_form">
            @csrf
            <div class="form-group col-md-6">
                <label for="customer">Customer</label>
                <select name="customer" id="customer" class="form-control" required>Select Customer
                    <option selected disabled>Select Customer</option>
                    <?php foreach($ServiceUser as $user){?>
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    <?php }?>
                </select>

            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="project">Project:</label>
                <input type="text" class="form-control" id="project" placeholder="Enter project" name="project" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="contact">Contact:</label>
                <input type="number" class="form-control" id="contact" placeholder="Enter contact" name="contact" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" placeholder="Enter country" name="country" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="customer_ref">Customer Ref:</label>
                <input type="text" class="form-control" id="customer_ref" placeholder="Enter Customer Ref" name="customer_ref" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="amount">Payment Amount:</label>
                <input type="text" class="form-control" id="amount" placeholder="Enter Payment Amount" name="amount" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="purchase_order">Purchase Order Ref:</label>
                <input type="text" class="form-control" id="purchase_order" placeholder="Enter Purchase Order Ref" name="purchase_order" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="job_type">Job Type:</label>
                <select name="job_type" id="job_type" class="form-control" required>
                    <option selected disabled>Select Job type</option>
                    <?php foreach($job_type as $jobs_type){?>
                    <option value="{{$jobs_type->id}}">{{$jobs_type->name}}</option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="priority">Priority:</label>
                <input type="text" class="form-control" id="priority" placeholder="Enter Priority" name="priority" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="alert_customer">Alert Customer:</label>
                <input type="checkbox" id="alert_customer" name="alert_customer" value="0"> Email
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="sms">On Route SMS:</label>
                <input type="radio"  id="sms1" name="sms" value="1">Yes
                <input type="radio" id="sms2" name="sms" value="2">No
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="complete_by">Complete By:</label>
                <input type="date" class="form-control" id="complete_by" name="complete_by" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="tags">Tags:</label>
                <input type="text" class="form-control" id="tags" name="tags" required>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="tags">Produc:</label>
                <select name="product_id" id="product_id" class="form-control" required>Select Product
                    <option selected disabled>Select Product</option>
                    <?php foreach($all_product as $value){?>
                    <option value="{{$value->id}}">{{$value->product_name}}</option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="attach">Attachment:</label>
                <input type="file" class="form-control" id="attach" name="attach" required>
            </div>
            <input type="hidden" value="" id="old_image" name="old_image">
            <input type="hidden" name="form_id" value="1">
            <input type="hidden" name="job_id" value="" id="job_id">
            <input type="button" onclick="get_all_data(1)" value="submit">
            <div class="error" style="color:red; display:none"><span>Error : </span><p class="error_text" style="display:inline-block"></p></div>
        </form>
        
    </div>
    <!-- Add Job Type start here -->
    <div class="col-md-12 main_div" id="add_job_type" style="display:none">
        <form id="job_type_save" class="form_form">
            @csrf
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="name">Nmae:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="days">Default Days:</label>
                <input type="text" class="form-control" id="days" placeholder="Enter Days" name="days">
            </div>
            <input type="hidden" name="form_id" value="2">
            <input type="hidden" name="job_type_id" id="job_type_id">
            <input type="button" onclick="get_all_data(2)" value="submit">
            <div class="error" style="color:red; display:none"><span>Error : </span><p class="error_text" style="display:inline-block"></p></div>
        </form>
    </div>
    <!-- Add work flow start here -->
    <div class="col-md-12 main_div" id="add_work_flow" style="display:none">
        <form id="job_work_flow_save" class="form_form">
            @csrf
        
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="work_flow">Wrok Flow:</label>
                <input type="text" name="work_flow" id="work_flow" class="form-control" placeholder="Enter Work Flow">
            </div>
            <input type="hidden" name="form_id" value="3">
            <input type="hidden" name="work_flow_id" id="work_flow_id">
            <input type="button" onclick="get_all_data(3)" value="submit">
            <div class="error" style="color:red; display:none"><span>Error : </span><p class="error_text" style="display:inline-block"></p></div>
        </form>
    </div>
    <!-- Product Category -->
    <div class="col-md-12 main_div" id="add_product_category" style="display:none">
        <form id="product_category_save" class="form_form">
            @csrf
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="name">Nmae:</label>
                <input type="text" class="form-control" id="cat_name" placeholder="Enter Name" name="name">
            </div>
            
            <input type="hidden" name="form_id" value="5">
            <input type="hidden" name="category_id" id="category_id">
            <input type="button" onclick="get_all_data(5)" value="submit">
            <div class="error" style="color:red; display:none"><span>Error : </span><p class="error_text" style="display:inline-block"></p></div>
        </form>
    </div>
    <!-- Product start here -->
    <div class="col-md-12 main_div" id="add_product" style="display:none">
        <form id="product_save" class="form_form">
            @csrf
            <div class="form-group col-md-6">
                <label for="cat_id">Category</label>
                <select name="cat_id" id="cat_id" class="form-control">Select Category
                    <option selected disabled>Select Category</option>
                    <?php foreach($category as $val){?>
                    <option value="{{$val->id}}">{{$val->name}}</option>
                    <?php }?>
                </select>

            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name="name">
            </div>
            
            <input type="hidden" name="form_id" value="6">
            <input type="hidden" name="product_id" value="" id="product_ids">
            <input type="button" onclick="get_all_data(6)" value="submit">
            <div class="error" style="color:red; display:none"><span>Error : </span><p class="error_text" style="display:inline-block"></p></div>
        </form>
    </div>
    <!-- Quotes Type Start here -->
    <div class="col-md-12 main_div" id="add_quotes_type" style="display:none">
        <form id="quotes_type_save" class="form_form">
            @csrf
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="name">Nmae:</label>
                <input type="text" class="form-control" id="type_name" placeholder="Enter Name" name="type_name">
            </div>
            
            <input type="hidden" name="form_id" value="10">
            <input type="hidden" name="type_id" id="type_id">
            <input type="button" onclick="get_all_data(10)" value="submit">
            <div class="error" style="color:red; display:none"><span>Error : </span><p class="error_text" style="display:inline-block"></p></div>
        </form>
    </div>
    <!-- Quotes start here -->
    <div class="col-md-12 main_div" id="add_quotes" style="display:none">
        <form id="quotes_save" class="form_form">
            @csrf
            <div class="form-group col-md-6">
                <label for="quote_customer">Customer</label>
                <select name="quote_customer" id="quote_customer" class="form-control" required>Select Customer
                    <option selected disabled>Select Customer</option>
                    <?php foreach($ServiceUser as $quoteuser){?>
                    <option value="{{$quoteuser->id}}">{{$quoteuser->name}}</option>
                    <?php }?>
                </select>

            </div>
            <div class="form-group col-md-6">
                <label for="quote_project">Project</label>
                <select name="quote_project" id="quote_project" class="form-control" required>Select Project
                    <option selected disabled>Select Project</option>
                    <?php foreach($project as $quoteproject){?>
                    <option value="{{$quoteproject->id}}">{{$quoteproject->project_name}}</option>
                    <?php }?>
                </select>

            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="quotes_date">Quote Date</label>
                <input type="date" class="form-control" id="quotes_date" placeholder="Enter Quotes" name="quotes_date">
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="quotes_expiry">Expiry Date</label>
                <input type="date" class="form-control" id="quotes_expiry" placeholder="Enter Quotes" name="quotes_expiry">
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="customer_ref_quote">Customer Ref.</label>
                <input type="text" class="form-control" id="customer_ref_quote" placeholder="Enter Quotes" name="customer_ref_quote">
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="customer_jobref_quote">Customer Job Ref.</label>
                <input type="text" class="form-control" id="customer_jobref_quote" placeholder="Enter Quotes" name="customer_jobref_quote">
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="purchase_ref_quote">Purchase Order Ref.</label>
                <input type="text" class="form-control" id="purchase_ref_quote" placeholder="Enter Quotes" name="purchase_ref_quote">
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="source">Source</label>
                <select name="source" id="source" class="form-control">
                    <option selected disabled>Select Source</option>
                    <option value="1">From Mobile App</option>
                    <option value="2">Telephone</option>
                    <option value="3">Website</option>
                </select>
            </div><div class="form-group col-md-6 mb-3 mt-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option selected disabled>Select Status</option>
                    <option value="0">In-active</option>
                    <option value="1">Active</option>
                    <option value="3">Draft</option>
                </select>
            </div>

            <div class="form-group col-md-12 mb-3 mt-3" id="already_show">
                <div class="custom-fieldset">
                    <div class="custom-legend">Your Quotes</div>
                    <button onclick="new_rules(1)" class="btn btn-primary mt-3 mb-3" type="button">Add New Quotes</button>
                    
                    <div class="heading"> 
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Quote Ref.</th>
                                        <th>Job Ref.</th>
                                        <th>Quote Date</th>
                                        <th>Expiry Date</th>
                                        <th>Sub Total</th>
                                        <th>VAT</th>
                                        <th>Total</th>
                                        <th>Deposit</th>
                                        <th>Outstanding</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="result_job_recurring1">
                                    <tr id='temp_result'>
                                        <td style="color:red;text-align:center" colspan="9">Sorry No data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3" id="alredy_hide" style="display:none">
                <div class="custom-fieldset">
                    <div class="custom-legend">Product Details</div>
                    <div class="mt-3">
                    <font>Select Product</font>
                        <input type="search" id="search_value" onkeyup="get_search()">
                        <button class="btn btn-primary" type="button" style="width: 30px;height: 30px;font-size: 10px;font:initial;" onclick="show_product_model(1)">+</button>
                        <p style="display:inline-block">(Type to view product or <a href="javascript:" onclick="show_product_model(1)">Click here</a> to views all products)</p>
                    </div>
                    
                    
                    <div class="heading"> 
                        <div class="table-responsive">
                            <table class="table table-bordered product_details">
                                <thead id="result1">
                                    <tr>
                                        <th>Code</th>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>QTY</th>
                                        <th>Cost Price(R)</th>
                                        <th>Price(R)</th>
                                        <th>VAT(%)</th>
                                        <th>Discount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="details_pro">
                                    <tr id="temp_result1">
                                        <td style="color:red;text-align:center" colspan="8">Sorry No data</td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="button" value="submit" onclick="get_values()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="extra_information">Extra Information</label>
                <!-- <input type="text" class="form-control" id="quotes_name" placeholder="Enter Quotes" name="quotes_name"> -->
                 <textarea name="extra_information" id="extra_information" cols="10" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="customer_notes">Cutomer Notes</label>
                <!-- <input type="text" class="form-control" id="quotes_name" placeholder="Enter Quotes" name="quotes_name"> -->
                 <textarea name="customer_notes" id="customer_notes" cols="10" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="tearms">Tearms</label>
                <!-- <input type="text" class="form-control" id="quotes_name" placeholder="Enter Quotes" name="quotes_name"> -->
                 <textarea name="tearms" id="tearms" cols="10" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="internal_notes">Internal Notes</label>
                <!-- <input type="text" class="form-control" id="quotes_name" placeholder="Enter Quotes" name="quotes_name"> -->
                 <textarea name="internal_notes" id="internal_notes" cols="10" rows="5" class="form-control"></textarea>
            </div>
            
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="attachment3">Attachment</label>
                <input type="file" class="form-control" id="attachment3" name="attachment3">
            </div>
            
            <input type="hidden" name="form_id" value="7">
            <input type="hidden" name="quotes_id" value="" id="quotes_id">
            <input type="hidden" name="old_image3" id="old_image3">
            <input type="button" onclick="get_all_data(7)" value="submit">
            <div class="error" style="color:red; display:none"><span>Error : </span><p class="error_text" style="display:inline-block"></p></div>
        </form>
    </div>
    <!-- Projec start here -->
    <div class="col-md-12 main_div" id="add_project" style="display:none">
        <form enctype="multipart/form-data" id="project_save" class="form_form">
            @csrf
            <div class="form-group col-md-6">
                <label for="customer_name">Customer</label>
                <select name="customer_name" id="customer_name" class="form-control" required>Select Customer
                    <option selected disabled>Select Customer</option>
                    <?php foreach($ServiceUser as $user){?>
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    <?php }?>
                </select>

            </div>
            <div class="form-group col-md-6 mb-3 mt-3">
                <label for="project">Project Name:</label>
                <input type="text" class="form-control" id="project_name" placeholder="Enter Project Name" name="project_name" required>
            </div>
            <input type="hidden" name="form_id" value="8">
            <input type="hidden" name="project_id" value="" id="project_id">
            <input type="hidden" name="project_ref" id="project_ref">
            <input type="button" onclick="get_all_data(8)" value="submit">
            <div class="error" style="color:red; display:none"><span>Error : </span><p class="error_text" style="display:inline-block"></p></div>
        </form>
        
    </div>
    <!-- Job Recurring Start -->
    <div class="col-md-12 main_div" id="add_job_recurring" style="display:none">
        <form enctype="multipart/form-data" id="job_recurring_save" class="form_form">
            @csrf
            <div class="form-group col-md-12">
                <label for="users">Customer</label>
                <select name="users" id="users" class="form-control" required>Select Customer
                    <option selected disabled>Select Customer</option>
                    <?php foreach($ServiceUser as $users){?>
                    <option value="{{$users->id}}">{{$users->name}}</option>
                    <?php }?>
                </select>

            </div>
            <div class="form-group col-md-12">
                <label for="users">Site Details</label>
                <select name="site" id="site" class="form-control" required>Select Site
                    <option selected disabled>Select site</option>
                    <option value="1">None</option>
                    <option value="2">Same as Customer</option>
                    <option value="3">03/5292/014/-CATTERALAVENUE</option>
                    <option value="4">{{$users->name}}</option>
                </select>

            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="mobile">Mobile:</label>
                <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" required>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="sms_number">Mobile (For  SMS):</label>
                <input type="number" class="form-control" id="sms_number" placeholder="Enter contact" name="sms_number" required>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="customer_ref">Customer Ref:</label>
                <input type="text" class="form-control" id="customer_ref1" placeholder="Enter Customer Ref" name="customer_ref" required>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="amount">Payment Amount:</label>
                <input type="text" class="form-control" id="amount1" placeholder="Enter Payment Amount" name="amount" required>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="purchase_order">Purchase Order Ref:</label>
                <input type="text" class="form-control" id="purchase_order1" placeholder="Enter Purchase Order Ref" name="purchase_order" required>
            </div>
            <div class="form-group col-md-12">
                <label for="job_types">Job Type</label>
                <select name="job_types" id="job_types1" class="form-control" required>Select Job Type
                    <option selected disabled>Select Job Type</option>
                    <?php foreach($job_type as $job_types){?>
                    <option value="{{$job_types->id}}">{{$job_types->name}}</option>
                    <?php }?>
                </select>

            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="priority">Priority:</label>
                <input type="text" class="form-control" id="priority1" placeholder="Enter Priority" name="priority" required>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="alert_customer">Alert Customer:</label>
                <input type="checkbox" id="alert_customer1" name="alert_customer1" value="0"> Email
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="sms">On Route SMS:</label>
                <input type="radio"  id="sms11" name="sms1" value="1">Yes
                <input type="radio" id="sms22" name="sms2" value="2">No
            </div>
            
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="tags">Tags:</label>
                <input type="text" class="form-control" id="tags1" name="tags1" required>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="short_des">Short Description <font style="color:red">*</font>(max 250 characters) </label>
                <textarea name="short_des" id="short_des" class="form-control" cols="10" rows="5" onkeyup="get_char(1)"></textarea>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="instruction">Description / Instructions:</label>
                <textarea name="instruction" id="instruction" class="form-control" cols="10" rows="5" onkeyup="get_char(2)"></textarea>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <div class="custom-fieldset">
                    <div class="custom-legend">Recurring Pattern</div>
                    <button onclick="new_rules(2)" class="btn btn-primary mt-3 mb-3" type="button">Add New Rule</button>
                    
                    <div class="heading"> 
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Rule Number.</th>
                                        <th>User</th>
                                        <th>Job Start Date</th>
                                        <th>No. of repetitions</th>
                                        <th>Comletion By</th>
                                        <th>Job Frequency</th>
                                        <th>Next Run</th>
                                        <th>Last Run</th>
                                    </tr>
                                </thead>
                                <tbody id="result_job_recurring">
                                    <tr id='temp_result'>
                                        <td style="color:red;text-align:center" colspan="8">Sorry No data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-12 mb-3 mt-3">
                <div class="custom-fieldset">
                    <div class="custom-legend">Product Details</div>
                    <div class="mt-3">
                    <font>Select Product</font>
                        <input type="search" id="search_value" onkeyup="get_search()">
                        <button class="btn btn-primary" type="button" style="width: 30px;height: 30px;font-size: 10px;font:initial;" onclick="show_product_model(2)">+</button>
                        <p style="display:inline-block">(Type to view product or <a href="javascript:" onclick="show_product_model(2)">Click here</a> to views all products)</p>
                    </div>
                    
                    
                    <div class="heading"> 
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead id="result">
                                    <tr>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>QTY</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="details_pro">
                                    <tr id="temp_result1">
                                        <td style="color:red;text-align:center" colspan="4">Sorry No data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12 mb-3 mt-3">
                <label for="attach">Attachment:</label>
                <input type="file" class="form-control" id="attach1" name="attach1" required>
            </div>
            <input type="hidden" value="" id="old_image1" name="old_image1">
            <input type="hidden" name="form_id" value="9">
            <input type="hidden" name="job_recurring_id" value="" id="job_recurring_id">
            <input type="button" onclick="get_all_data(9)" value="submit">
            <div class="error" style="color:red; display:none"><span>Error : </span><p class="error_text" style="display:inline-block"></p></div>
        </form>
        
    </div>
    <!-- end here -->
     <!-- Recurring Model start here -->
     <div class="modal fade" id="recurring_model" tabindex="-1" role="dialog" aria-labelledby="recurringModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recurringModalLabel">New Rule</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12 mb-3 mt-3">
                        <div class="custom-fieldset">
                            <div class="custom-legend">User Appointment</div> 
                            <form id="recurring_form">
                            <div class="form-group col-md-12 mb-3 mt-3"> 
                                <label for="selected_user">Select User</label>
                                <select name="selected_user" id="selected_user" class="form-control">
                                    <option selected disabled>Select User</option>
                                    <?php foreach($ServiceUser as $userses){?>
                                        <option value="{{$userses->id}}">{{$userses->name}}</option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-3 mt-3">
                                <label for="create_before">Job Create Before</label>
                                <input type="text" name="create_before" id="create_before" class="form-control" value="7">Days
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mb-3 mt-3">
                            <div class="custom-fieldset">
                                <div class="custom-legend">Recurring Pattern</div>
                                <div class="form-group col-md-12 mb-3 mt-3">
                                    <label for="job_start_date">Job Start Date:</label>
                                    <input type="date" class="form-control" id="job_start_date" name="job_start_date" value="<?php echo date('Y-m-d');?>">
                                </div>
                                <div class="form-group col-md-12 mb-3 mt-3">
                                    <input type="radio" id="end_after" name="end" checked> End After &emsp;
                                    <input type="radio" id="end_by" name="end"> End By &emsp;
                                    <input type="radio" id="no_end_date" name="end"> No End Date &emsp;
                                </div>
                                <div class="form-group col-md-12 mb-3 mt-3">
                                    <label for="count_repetition">No of Repetition:</label>
                                    <input type="number" class="form-control" id="count_repetition" value="7">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3 mt-3">
                            <div class="custom-fieldset">
                                <div class="custom-legend">Range of Recurrence</div>
                                <div class="form-group col-md-12 mb-3 mt-3">
                                    <label for="job_frequency">Job Frequency:</label>
                                    <select name="job_frequency" id="job_frequency" class="form-control">
                                        <option selected disabled>Select Job Frequency</option>
                                        <option value="1">Yearly</option>
                                        <option value="2" selected>Monthly</option>
                                        <option value="3">Daily</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 mb-3 mt-3">
                                    <input type="radio" id="day_option" name="day" checked> Day &emsp;
                                    <input type="number" id="day1" name="day1" class="form-control d-inline w-25" value="1"> &emsp;of Every
                                    <input type="number" id="month1" name="month1" class="form-control d-inline w-25" value="1"> &emsp;Months
                                    <input type="radio" id="every_option" name="day"> Every &emsp;
                                    <input type="text" name="every1" id="every1" class="form-control d-inline w-25" value="1"> &nbsp;
                                    <input type="text" name="day2" id="day2" class="form-control d-inline w-25" value="1"> &nbsp; of Every &emsp;
                                    <input type="text" name="every2" id="every2" class="form-control d-inline w-25" value="1"> &nbsp; Months
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <p>This job will be placed in your unsigned list for you to make appointments at that time</p>
                    <p>This job is scheduled to be put in your unsigned list on <?php echo date('d/m/Y');?></p>
                    <div style="float:right">
                    <button class="btn btn-primary" type="button" onclick="get_data()">Save</button>
                    <button class="btn btn-primary" type="button" onclick="cancel_modal()">Cancel</button>
                    </div>
                    </form>
                </div>
                <!-- body end -->
            </div>
        </div>
    </div>
    <!-- Quote Product Model Start here -->
    <div class="modal fade" id="quote_product_model" tabindex="-1" role="dialog" aria-labelledby="quoteproductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quoteproductModalLabel">Product</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12 mb-3 mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Cost Price</th>
                                    <th>Margin</th>
                                    <th>Price</th>
                                    <th>Tax</th>
                                </tr>
                            </thead>
                            <tbody id="search_result">
                                @foreach($product_details1 as $details1)
                                <tr onclick="selectQuoteProduct(this)">
                                    <td>{{$details1->id}}</td>
                                    <td>{{$details1->name}}</td>
                                    <td>{{$details1->product_name}}</td>
                                    <td>{{$details1->description}}</td>
                                    <td>{{$details1->cost_price}}</td>
                                    <td>{{$details1->margin}}</td>
                                    <td>{{$details1->price}}</td>
                                    <td>{{$details1->tax_rate}}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div> 
                </div>
                <div style="float:right">
                    <button class="btn btn-primary" onclick="get_data_product(1)">Choose</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Product Model start here -->
    <div class="modal fade" id="product_model" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12 mb-3 mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody id="search_result">
                                @foreach($product_details1 as $details1)
                                <tr onclick="selectProduct(this)">
                                    <td>{{$details1->id}}</td>
                                    <td>{{$details1->name}}</td>
                                    <td>{{$details1->product_name}}</td>
                                    <td>{{$details1->description}}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div> 
                </div>
                <div style="float:right">
                    <button class="btn btn-primary" onclick="get_data_product(2)">Choose</button>
                </div>
            </div>
        </div>
    </div>
</div>

     <!-- end here -->
<!-- Script start here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function open_model(id){
            // alert(id)
            $('.all_list').hide();
            $('.error').hide();
            if(id == 1){
                $('#job_save')[0].reset();
                document.getElementById('add_job').style="display:block";
                document.getElementById('add_job_type').style="display:none";
                document.getElementById('add_work_flow').style="display:none";
                document.getElementById('add_product_category').style="display:none";
                document.getElementById('add_product').style="display:none";
                document.getElementById('add_quotes').style="display:none";
                document.getElementById('add_project').style="display:none";
                document.getElementById('add_job_recurring').style="display:none";
                document.getElementById('add_quotes_type').style="display:none";
            } else if(id == 2){
                $('#job_type_save')[0].reset();
                document.getElementById('add_job_type').style="display:block";
                document.getElementById('add_work_flow').style="display:none";
                document.getElementById('add_job').style="display:none";
                document.getElementById('add_product_category').style="display:none";
                document.getElementById('add_product').style="display:none";
                document.getElementById('add_quotes').style="display:none";
                document.getElementById('add_project').style="display:none";
                document.getElementById('add_job_recurring').style="display:none";
                document.getElementById('add_quotes_type').style="display:none";
            } else if(id == 3){
                $('#job_work_flow_save')[0].reset();
                document.getElementById('add_work_flow').style="display:block";
                document.getElementById('add_job_type').style="display:none";
                document.getElementById('add_job').style="display:none";
                document.getElementById('add_product_category').style="display:none";
                document.getElementById('add_product').style="display:none";
                document.getElementById('add_quotes').style="display:none";
                document.getElementById('add_project').style="display:none";
                document.getElementById('add_job_recurring').style="display:none";
                document.getElementById('add_quotes_type').style="display:none";
            } else if(id == 5){
                $('#product_category_save')[0].reset();
                document.getElementById('add_work_flow').style="display:none";
                document.getElementById('add_job_type').style="display:none";
                document.getElementById('add_job').style="display:none";
                document.getElementById('add_product').style="display:none";
                document.getElementById('add_product_category').style="display:block";
                document.getElementById('add_quotes').style="display:none";
                document.getElementById('add_project').style="display:none";
                document.getElementById('add_job_recurring').style="display:none";
                document.getElementById('add_quotes_type').style="display:none";
            } else if(id == 6){
                $('#product_save')[0].reset();
                document.getElementById('add_product').style="display:block";
                document.getElementById('add_work_flow').style="display:none";
                document.getElementById('add_job_type').style="display:none";
                document.getElementById('add_product_category').style="display:none";
                document.getElementById('add_job').style="display:none";
                document.getElementById('add_quotes').style="display:none";
                document.getElementById('add_project').style="display:none";
                document.getElementById('add_job_recurring').style="display:none";
                document.getElementById('add_quotes_type').style="display:none";
            } else if(id == 7){
                $('#quotes_save')[0].reset();
                document.getElementById('add_product').style="display:none";
                document.getElementById('add_work_flow').style="display:none";
                document.getElementById('add_job_type').style="display:none";
                document.getElementById('add_product_category').style="display:none";
                document.getElementById('add_job').style="display:none";
                document.getElementById('add_quotes').style="display:block";
                document.getElementById('add_project').style="display:none";
                document.getElementById('add_job_recurring').style="display:none";
                document.getElementById('add_quotes_type').style="display:none";
            } else if(id == 8){
                $('#project_save')[0].reset();
                document.getElementById('add_product').style="display:none";
                document.getElementById('add_work_flow').style="display:none";
                document.getElementById('add_job_type').style="display:none";
                document.getElementById('add_product_category').style="display:none";
                document.getElementById('add_job').style="display:none";
                document.getElementById('add_quotes').style="display:none";
                document.getElementById('add_project').style="display:block";
                document.getElementById('add_job_recurring').style="display:none";
                document.getElementById('add_quotes_type').style="display:none";
            } else if(id == 9){
                $('#job_recurring_save')[0].reset();
                document.getElementById('add_product').style="display:none";
                document.getElementById('add_work_flow').style="display:none";
                document.getElementById('add_job_type').style="display:none";
                document.getElementById('add_product_category').style="display:none";
                document.getElementById('add_job').style="display:none";
                document.getElementById('add_quotes').style="display:none";
                document.getElementById('add_project').style="display:none";
                document.getElementById('add_job_recurring').style="display:block";
                document.getElementById('add_quotes_type').style="display:none";
            } else if(id == 10){
                $("#quotes_type_save")[0].reset();
                document.getElementById('add_quotes_type').style="display:block";
                document.getElementById('add_product').style="display:none";
                document.getElementById('add_work_flow').style="display:none";
                document.getElementById('add_job_type').style="display:none";
                document.getElementById('add_product_category').style="display:none";
                document.getElementById('add_job').style="display:none";
                document.getElementById('add_quotes').style="display:none";
                document.getElementById('add_project').style="display:none";
                document.getElementById('add_job_recurring').style="display:none";
            }
            else {
                $('.all_list').show();
                document.getElementById('add_job').style="display:none";
                document.getElementById('add_job_type').style="display:none";
                document.getElementById('add_work_flow').style="display:none";
                document.getElementById('add_product_category').style="display:none";
                document.getElementById('add_product').style="display:none";
                document.getElementById('add_quotes').style="display:none";
                document.getElementById('add_project').style="display:none";
                document.getElementById('add_job_recurring').style="display:none";
                document.getElementById('add_quotes_type').style="display:none";
            }
        }

        function get_all_data(id){
            // alert(id)
            var alert_customer = $('#alert_customer');
            var alert_customer1 = $('#alert_customer1');
            if($('#alert_customer').is(':checked')){
                alert_customer.val(1);
            }
            if($('#alert_customer1').is(':checked')){
                alert_customer1.val(1);
            }
            var form_id;
            if(id == 1){
                form_id=$('#job_save');
            } else if(id == 2){
                form_id=$('#job_type_save');
            } else if(id == 3){
                form_id=$('#job_work_flow_save');
            } else if(id == 5){
                form_id=$('#product_category_save');
            } else if(id == 6){
                form_id=$('#product_save')
            } else if(id == 7){
                form_id=$("#quotes_save");
            } else if(id == 8){
                form_id=$("#project_save");
            } else if(id ==9){
                form_id=$('#job_recurring_save');
            } else if(id == 10){
                form_id=$('#quotes_type_save');
            }
            $.ajax({  
                type:"POST",
                url:"{{url('job_save_all')}}",
                data:new FormData(form_id[0]),
                async : false,
                contentType : false,
                cache : false,
                processData: false,
                success:function(data)
                {
                    console.log(data);
                    if($.trim(data)=="done"){
                        $('.alert-msg').show().fadeOut(5000);
                        
                    } else {        
                        $(".error").show();
                        $('.error_text').text(data.error);
                    }
                }
        }); 
        }
        function status_change(form_id,id,status){
            // alert("form_id "+form_id);
            // alert("id "+id);
            // alert("status "+status);
            // return false;
            var token='<?php echo csrf_token();?>'
            $.ajax({  
                type:"POST",
                url:"{{url('status_change')}}",
                data:{form_id:form_id,id:id,status:status,_token:token},
                success:function(data)
                {
                    console.log(data);
                    if($.trim(data)=="done"){
                        $('.msg').text("Status Changed");
                        $('.alert-msg').show().fadeOut(5000);
                        window.location.reload();
                    } 
                }
            }); 
        }
        function delete_job(form_id,id){
            // alert("form_id "+form_id);
            // alert("id "+id);
            // return false;
            var token='<?php echo csrf_token();?>'
            $.ajax({  
                type:"POST",
                url:"{{url('delete_job')}}",
                data:{form_id:form_id,id:id,_token:token},
                success:function(data)
                {
                    console.log(data);
                    if($.trim(data)=="done"){
                        $('.alert-del').show().fadeOut(5000);
                        window.location.reload();
                    } 
                }
            }); 
        }
        function edit_job(form_id,id){
            // alert("form_id "+form_id);
            // alert("id "+id);
            // return false;
            var token='<?php echo csrf_token();?>'
            open_model(form_id);
            $.ajax({  
                type:"POST",
                url:"{{url('edit_job')}}",
                data:{form_id:form_id,id:id,_token:token},
                success:function(data)
                {
                    console.log(data);
                    if($.trim(data.form_id)=="1"){
                        $('#customer').val(data.customer_id);
                        $('#project').val(data.project_id);
                        $('#contact').val(data.contact);
                        $('#country').val(data.country);
                        $('#customer_ref').val(data.customer_ref);
                        $('#amount').val(data.pay_amount);
                        $('#purchase_order').val(data.purchase_order_ref);
                        $('#job_type').val(data.job_type);
                        $('#priority').val(data.priorty);
                        $('#alert_customer').val(data.alert_customer);
                        if(data.alert_customer == 1){
                            document.getElementById('alert_customer').checked = true;
                        }
                        if(data.on_route_sms == 1){
                            document.getElementById('sms1').checked = true;
                        }else {
                            document.getElementById('sms2').checked = true;
                        }
                        $('#start_date').val(data.start_date);
                        $('#complete_by').val(data.complete_by);
                        $('#tags').val(data.tags);
                        $('#product_id').val(data.product_id);
                        $('#old_image').val(data.attachments);
                        $('#job_id').val(data.id);
                    } else if($.trim(data.form_id)=="2"){
                        $("#name").val(data.name);
                        $("#days").val(data.default_days);
                        $("#job_type_id").val(data.id);
                    } else if($.trim(data.form_id)=="3"){
                        $("#work_flow").val(data.flow_name);
                        $("#work_flow_id").val(data.id);
                    } else if($.trim(data.form_id)=="5"){
                        $("#cat_name").val(data.name);
                        $("#category_id").val(data.id);
                    } else if($.trim(data.form_id)=="6"){
                        $("#cat_id").val(data.cat_id);
                        $("#product_name").val(data.product_name);
                        $("#product_ids").val(data.id);
                    } else if($.trim(data.form_id)=="7"){
                        $("#quote_customer").val(data.customer_id);
                        $("#quote_project").val(data.project_id);
                        $("#quotes_id").val(data.id);
                        $('#quotes_date').val(data.quota_date);
                        $("#quotes_expiry").val(data.expiry_date);
                        $("#customer_ref_quote").val(data.customer_ref);
                        $("#customer_jobref_quote").val(data.customer_job_ref);
                        $("#purchase_ref_quote").val(data.purchase_order_ref);
                        $('#source').val(data.source);
                        $("#status").val(data.status);
                        $("#extra_information").val(data.extra_information);
                        $("#customer_notes").val(data.customer_notes);
                        $("#tearms").val(data.tearms);
                        $("#internal_notes").val(data.internal_notes);
                        $('#old_image3').val(data.attachments);
                        $("#result_job_recurring1").html(data.product_data);
                    } else if($.trim(data.form_id)=="8"){
                        $("#customer_name").val(data.customer_name);
                        $("#project_name").val(data.project_name);
                        $("#project_id").val(data.id);
                        $("#project_ref").val(data.project_ref);
                    } else if($.trim(data.form_id)=="10"){
                        $('#type_name').val(data.name);
                        $('#type_id').val(data.id);
                    } else if($.trim(data.table.form_id)=="9"){
                        $('#users').val(data.table.customer_id);
                        $('#site').val(data.table.site_id)
                        $('#mobile').val(data.table.mobile)
                        $('#sms_number').val(data.table.mobile_sms)
                        $('#customer_ref1').val(data.table.customer_ref)
                        $('#amount1').val(data.table.amount)
                        $('#purchase_order1').val(data.table.purchase_orderref)
                        $('#job_types1').val(data.table.job_type)
                        $('#priority1').val(data.table.priority)
                        if(data.table.customer_alert ==1){
                            document.getElementById('alert_customer1').checked = true;
                        } if(data.table.sms_alert ==1){
                            document.getElementById('sms11').checked = true;
                        } else {
                            document.getElementById('sms22').checked = true;
                        }
                        $('#tags1').val(data.table.tags)
                        $('#short_des').val(data.table.short_des)
                        $('#instruction').val(data.table.instruction)
                        $('#old_image1').val(data.table.attachments)
                        $('#result_job_recurring').html(data.rule);
                        $('#details_pro').html(data.product);
                        $('#job_recurring_id').val(data.table.id);
                    } 
                }
            });
        }
    </script>
    <script>
        function new_rules(id){
            // alert(id)
            if(id == 1){
                var table = document.querySelector('.product_details');
                var cells = table.querySelectorAll('td');
                console.log(cells);
                if(cells.length >1){
                    cells.forEach(function(cell) {
                        cell.remove();
                    });
                    $('#details_pro').html('<tr id="temp_result1"><td style="color:red;text-align:center" colspan="9">Sorry No data</td></tr>');
                    
                }
                
                $('#already_show').hide();
                $('#alredy_hide').show();

            } else if(id == 2){
                $("#recurring_form")[0].reset();
                $('#recurring_model').modal('show');
            }
            
        }
        function get_data(){
            var selected_user=$("#selected_user").val();
            var selected_user_name=$('#selected_user option:selected').text();
            // alert(selected_user_name)
            var create_before=$("#create_before").val();
            var job_start_date=$("#job_start_date").val();
            var end_after=$("#end_after").val();
            var end_by=$("#end_by").val();
            var no_end_date=$("#no_end_date").val();
            var count_repetition=$('#count_repetition').val();
            var job_frequency=$("#job_frequency").val();
            var job_frequency_name=$('#job_frequency option:selected').text();
            // alert(job_frequency_name)
            var day1=$("#day1").val();
            var month1=$("#month1").val();
            var every1=$("#every1").val();
            var day2=$("#day2").val();
            var every2=$("#every2").val();
            $('#temp_result').hide();
            var inc=$('#inc').val();
            var key;
            if(inc == '' || inc == undefined){
                key=1;
            } else {
                key=Number(inc)+1;
            }
            var result='';
            result='<tr><td>'+key+'<input type="hidden" value="'+key+'" id="inc" name="inc[]"></td><td>'+selected_user_name+'<input type="hidden"value="'+selected_user+'" name="user_id[]"></td><td>'+job_start_date+'<input type="hidden" value="'+job_start_date+'" name="recurringjob_start_date[]"></td><td>'+count_repetition+'<input type="hidden" value="'+count_repetition+'" name="count_repetition[]"></td><td>2024/08/20</td><td>'+job_frequency_name+'<input type="hidden" value="'+job_frequency+'" name="job_frequency_name[]"></td><input type="hidden" value="'+day1+'" name="day1[]"><input type="hidden" value="'+month1+'" name="month1[]"><input type="hidden" name="every1[]" value="'+every1+'"><input type="hidden" value="'+day2+'" name="day2[]"><input type="hidden" value="'+every2+'" name="every2[]"></tr>';
            $("#result_job_recurring").append(result);
            $('#recurring_model').modal('hide');
        }
        function show_product_model(id){
            if(id == 1){
                $("#quote_product_model").modal('show');
            } else {
                $('#product_model').modal('show');
            }
        }
        function get_data_product(id){
            // $('#product_model').modal('hide');
            if(id == 1){
                $("#quote_product_model").modal('hide');
            } else {
                $('#product_model').modal('hide');
            }
        }
    </script>
   
    <script>
    function selectProduct(row) {
        var cells = row.getElementsByTagName("td");
        var code = cells[0].innerText;
        var category = cells[1].innerText;
        var product = cells[2].innerText;
        var description = cells[3].innerText;
        var resultTable = document.getElementById("result");
        var newRow = document.createElement("tr");
        var productCell = document.createElement("td");
        productCell.innerText = product;
        var descriptionCell = document.createElement("td");
        descriptionCell.innerText = description;
        var qtyCell = document.createElement("td");
        qtyCell.innerHTML = '<input type="number" class="form-control" value="1" name="quantity[]">';
        var actionCell = document.createElement("td");
        actionCell.innerHTML = '<button class="btn btn-danger" onclick="removeRow(this)">Delete<input type="hidden" value="'+code+'" name="product_detail_id[]"></button>';
        newRow.appendChild(productCell);
        newRow.appendChild(descriptionCell);
        newRow.appendChild(qtyCell);
        newRow.appendChild(actionCell);
        resultTable.appendChild(newRow);
        // $('#product_model').modal('hide');
        $("#temp_result1").hide();
    }
    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function selectQuoteProduct(row) {
        var cells = row.getElementsByTagName("td");
        var code = cells[0].innerText;
        var category = cells[1].innerText;
        var product = cells[2].innerText;
        var description = cells[3].innerText;
        var cost =cells[4].innerText;
        var price =cells[6].innerText;
        var resultTable = document.getElementById("result1");
        var newRow = document.createElement("tr");
        var productCell = document.createElement("td");
        productCell.innerText = product;
        var code_id = document.createElement("td");
        code_id.innerText = "pro_"+code;
        var descriptionCell = document.createElement("td");
        descriptionCell.innerText = description;
        var qtyCell = document.createElement("td");
        qtyCell.innerHTML = '<input type="number" class="form-control" value="1" name="quantity[]">';
        var cost_cell = document.createElement("td");
        cost_cell.innerText = cost;
        var price_cell = document.createElement("td");
        price_cell.innerText =price;
        var vat_cell = document.createElement("td");
        vat_cell.innerHTML ='0 %';
        var discount_cell = document.createElement("td");
        discount_cell.innerHTML ='0 %';
        var actionCell = document.createElement("td");
        actionCell.innerHTML = '<button class="btn btn-danger" onclick="removequoteRow(this)">X<input type="hidden" value="'+code+'" name="product_detail_id[]" class="product_detail_id"></button>';
        newRow.appendChild(code_id);
        newRow.appendChild(productCell);
        newRow.appendChild(descriptionCell);
        newRow.appendChild(qtyCell);
        newRow.appendChild(cost_cell);
        newRow.appendChild(price_cell);
        newRow.appendChild(vat_cell);
        newRow.appendChild(discount_cell);
        newRow.appendChild(actionCell);
        resultTable.appendChild(newRow);
        // $('#product_model').modal('hide');
        $("#temp_result1").hide();
    }
    function removequoteRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
    
    
    function get_char(id){
        var text;
        // alert(id)
        if(id == 1){
            text=$('#short_des');
        } else {
            text=$('#instruction');
        }
        if(text.val().length === 250){
            text.attr('readonly','readonly');
        } else if(text.val().length >250){
            text.val('');
        }
    }
    function get_search(){
        var search_value=$("#search_value").val();
        var token='<?php echo csrf_token();?>'
        if(search_value.length>2){
            $.ajax({  
                type:"POST",
                url:"{{url('search_value')}}",
                data:{search_value:search_value,_token:token},
                success:function(data)
                {
                    console.log(data);
                    // 
                    $("#product_model").modal('show');
                    $('#search_result').html(data);
                    
                }
            });
        }
    }
    function get_values(){
        var productDetailIds = [];
        $('.product_detail_id').each(function() {
            productDetailIds.push($(this).val());
        });
        var start_date=$("#quotes_date").val();
        var end_date=$("#quotes_expiry").val();
        var status =$("#status").val();
        var token='<?php echo csrf_token();?>'
            $.ajax({  
                type:"POST",
                url:"{{url('save_get_ajax')}}",
                data:{status:status,start_date:start_date,end_date:end_date,productDetailIds:productDetailIds,_token:token},
                success:function(data)
                {
                    console.log(data);
                    $('#result_job_recurring1').html(data);
                    $('#already_show').show();
                    $('#alredy_hide').hide();
                    
                }
            });
    }
</script>
<!-- end here -->
</body>
</html>