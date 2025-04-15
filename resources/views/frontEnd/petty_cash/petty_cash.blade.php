@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Petty Cash')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Petty Cash</h4>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="jobsection justify-content-between align-items-center">
                                <div class="jobsection mb-0">
                                    <a href="{{url('petty-cash/expend-card')}}" class="profileDrop">Expend card</a>
                                    <a href="{{url('petty-cash/petty_cash')}}" class="profileDrop" id="active_inactive">Petty Cash</a>
                                </div>
                                <div class="d-flex justify-content-end gap-4 align-items-center">
                                    <div class="d-flex justify-content-end gap-2 align-items-center">
                                        <label for="fromDate" class="mb-0"> From:</label>
                                        <input type="date" id="fromDate" class="form-control">
                                        <label for="ToDate" class="mb-0"> To:</label>
                                        <input type="date" id="ToDate" class="form-control">
                                    </div>
                                    <!-- <a href="{{url('petty-cash/petty-cash-add')}}" class="profileDrop"><i class="fa fa-plus"></i> Add</a> -->
                                    <a href="javascript:void()" class="profileDrop" data-toggle="modal" data-target="#petty_cash"><i class="fa fa-plus"></i> Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="mt-2">
                                <div class="balance_show">
                                    <h6>Closing Petty Cash balance = <span id="PettyCashbalance">£0</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="table-responsive productDetailTable  mb-4">
                                <table id="" class="table border-top border-bottom tablechange" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Balance b/fwd</th>
                                            <th>Petty Cash In</th>
                                            <th>Cash Out</th>
                                            <th>Cash Details</th>
                                            <th>Receipt</th>
                                            <th>Uploaded to DEXT</th>
                                            <th>Invoice LA</th>
                                            <th>Initials</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="cash_result">
                                        <?php
                                        $total_balance = 0;
                                        $cash_out = 0;
                                        $count = 0;
                                        $balance_bfwd = 0;
                                        $petty_cashIn = 0;
                                        foreach ($cash as $key => $val) {
                                            $total_balance = $total_balance + $val->balance_bfwd + $val->petty_cashIn;
                                            $cash_out = $cash_out + $val->cash_out;
                                            $petty_cashIn = $petty_cashIn + $val->petty_cashIn;
                                            if ($count == 0) {
                                                $count = 1;
                                                $balance_bfwd = $val->balance_bfwd;
                                            }
                                        ?>
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{date('Y-m-d',strtotime($val->cash_date))}}</td>
                                                <td>£{{$val->balance_bfwd}}</td>
                                                <td>£{{$val->petty_cashIn}}</td>
                                                <td>£{{$val->cash_out}}</td>
                                                <td>{{$val->card_details}}</td>
                                                <td><a href="{{url('public/images/finance_cash/'.$val->receipt)}}" target="_blank"><i class="fa-solid fa-eye"></i></a></td>
                                                <td><?php if ($val->dext == 1) {
                                                        echo "Yes";
                                                    } else {
                                                        echo "No";
                                                    } ?></td>
                                                <td><?php if ($val->invoice_la == 1) {
                                                        echo "Yes";
                                                    } else {
                                                        echo "No";
                                                    } ?></td>
                                                <td>{{$val->initial}}</td>
                                            </tr>
                                        <?php }
                                        $total_balanceInCash = $total_balance - $cash_out; ?>
                                    </tbody>
                                    <input type="hidden" id="total_balanceInCash" value="{{$total_balanceInCash}}">
                                    <tfoot>
                                        <tr class="table-light">
                                            <th colspan="2">Total</th>
                                            <th id="total_balance">£{{$balance_bfwd}}</th>
                                            <th id="petty_cashIn">£{{$petty_cashIn}}</th>
                                            <th id="cash_out">£{{$cash_out}}</th>
                                            <th colspan="5"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Petty Cash Modal start here -->
<div class="modal fade" id="petty_cash" tabindex="-1" aria-labelledby="petty_cashLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="petty_cashLabel">Add Petty Cash</h4>
            </div>
            <form id="cashForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label> Date <span class="radStar">*</span></label>
                                    <div>
                                        <input type="date" class="form-control editInput checkInput" id="cash_date" name="cash_date">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label> Balance b/fwd <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput checkInput" id="Balance_b" name="Balance_b">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Petty Cash In <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput numberInput" id="fund_added" name="fund_added" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length<10">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Cash Out </label>
                                    <div>
                                        <input type="text" class="form-control editInput numberInput checkInput" id="cash_out" name="cash_out" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length<10">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label> Cash Details <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput checkInput" id="card_details" name="card_details">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Receipt</label>
                                    <div>
                                        <input type="file" class="form-control editInput checkInput" id="receipt" name="receipt" onchange="check_file()">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Uploaded to DEXT <span class="radStar">*</span></label>
                                    <div>
                                        <div class="col-form-label nq_input">
                                            <input type="radio" name="dext" id="yes" value="1">
                                            <label for="yes">Yes</label>
                                            <input type="radio" name="dext" id="no" value="0" checked>
                                            <label for="no">NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Invoice LA</label>
                                    <div>
                                        <div class="col-form-label nq_input">
                                            <input type="radio" name="invoice_la" id="yes2" value="1">
                                            <label for="yes2">Yes</label>
                                            <input type="radio" name="invoice_la" id="no2" value="0" checked>
                                            <label for="no2">NO</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Initials <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput checkInput" id="initial" name="initial">
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End row -->
                    </div>
                </div>
                <div class="modal-footer customer_Form_Popup">
                    <button type="button" class="btn btn-warning" id="">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end here -->

<script>
    // 
    $(document).ready(function() {
        var total_balanceInCash = $("#total_balanceInCash").val();
        $("#PettyCashbalance").text("£" + Number(total_balanceInCash).toFixed(2));
        // alert(typeof(totalBalanceOnCard));
    });
</script>
<script>
    var filterUrl = "{{url('petty-cash/cash_filter')}}";
    var token = "<?php echo csrf_token(); ?>";
</script>
<script type="text/javascript" src="{{ url('public/js/salesFinance/petty_cash/cash.js') }}"></script>

@endsection