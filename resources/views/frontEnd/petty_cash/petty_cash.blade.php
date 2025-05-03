@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Petty Cash')

<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<style>
    .disabled-tab {
        pointer-events: none;
        opacity: 0.5;
    }
</style>
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
                                <div class="d-flex justify-content-end gap-2 align-items-center">
                                    <label for="fromDate" class="mb-0"> From:</label>
                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="" class="input-group date">
                                        <input name="date_of_birth" id="fromDate" type="text" value="" autocomplete="off" class="form-control">
                                        <span class="input-group-btn datetime-picker2 btn_height">
                                            <button class="btn btn-primary" type="button" id="openCalendarBtn">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <label for="ToDate" class="mb-0"> To:</label>
                                    <!-- <input type="date" id="ToDate" class="form-control"> -->
                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="" class="input-group date">
                                        <input name="date_of_birth" id="ToDate" type="text" value="" autocomplete="off" class="form-control">

                                        <span class="input-group-btn datetime-picker2 btn_height">
                                            <button class="btn btn-primary" type="button" id="openCalendarBtn1">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="jobsection mb-0">
                                    <!-- <a href="{{url('petty-cash/petty-cash-add')}}" class="btn btn-warning"><i class="fa fa-plus"></i> Add</a> -->
                                    <a href="javascript:void()" class="btn btn-warning" data-toggle="modal" data-target="#petty_cash"><i class="fa fa-plus"></i> Add</a>
                                    <a href="{{url('petty-cash/expend-card')}}" class="btn btn-warning">Expend card</a>
                                    <a href="{{url('petty-cash/petty_cash')}}" class="btn btn-warning" id="active_inactive">Cash</a>
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
                                        $date = null;
                                        foreach ($cash as $key => $val) {
                                            // $total_balance = $total_balance + $val->balance_bfwd + $val->petty_cashIn;
                                            $cash_out = $cash_out + $val->cash_out;
                                            $petty_cashIn = $petty_cashIn + $val->petty_cashIn;
                                            if ($count == 0) {
                                                $count = 1;
                                                $total_balance = $val->balance_bfwd;
                                                $balance_bfwd = $val->balance_bfwd;
                                            }
                                            $total_balance = $total_balance + $val->petty_cashIn;
                                            $db_date = date('m', strtotime($val->cash_date));
                                        ?>
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{date('Y-m-d',strtotime($val->cash_date))}}</td>
                                                <?php if ($previous_Cash_month_data['total_balanceInCash'] == 0) {
                                                    if ($date != $db_date || $date == null) {
                                                        $date = $db_date; ?>
                                                        <td>£{{$val->balance_bfwd}}</td>
                                                    <?php } else { ?>
                                                        <td></td>
                                                <?php }
                                                } ?>
                                                <td>£{{$val->petty_cashIn}}</td>
                                                <td>£{{$val->cash_out}}</td>
                                                <td>{{$val->card_details}}</td>
                                                <td><a href="{{url('public/images/finance_cash/'.$val->receipt)}}" target="_blank"><i class="fa fa-eye"></i></a></td>
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
            <div calss="row">
                <div class="col-md-12 col-lg-12 col-xl-12 mt-4">
                    <div class="mt-1 mb-0 text-center" style="display:none" id="message_save"></div>
                </div>
            </div>
            <form id="cashForm">
                <input type="hidden" id="id" name="id" value="">
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
                                        <?php if ($previous_Cash_month_data['total_balanceInCash'] == 0) { ?>
                                            <input type="text" class="form-control editInput numberInput checkInput 
                                            <?php if (isset($cashLastId) && $cashLastId != '') {
                                                echo "disabled-tab";
                                            } ?>" id="balance_bfwd" name="balance_bfwd" <?php if (isset($cashLastId) && $cashLastId != '') { ?> value="{{$cashLastId->balance_bfwd}}" <?php } ?> onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length<10">
                                        <?php } else { ?>
                                            <input type="text" class="form-control editInput numberInput checkInput disabled-tab" id="balance_bfwd" name="balance_bfwd" value="{{$previous_Cash_month_data['total_balanceInCash']}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length<10">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Petty Cash In <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput numberInput checkInput" id="petty_cashIn" name="petty_cashIn" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length<10">
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
                                    <!-- <div>
                                        <input type="file" class="form-control editInput checkInput" id="receipt" name="receipt" onchange="check_file()">
                                    </div> -->
                                    <div class="col-md-12 p-0">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px; min-width: 150px; min-height: 100px; line-height: 100px;">
                                                <img src="{{url('public/images/noimage.jpg')}}" alt="No Image" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; min-width: 150px; min-height: 100px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input name="receipt" type="file" class="default" id="receipt" onchange="check_file()" />
                                                </span>
                                                <!-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>Remove</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Uploaded to DEXT <span class="radStar">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <label class="form-check-label m-0" for="yes">Yes</label>
                                        <input class="form-check-input mt-0" type="radio" name="dext" value="1" id="yes">
                                        <label class="form-check-label m-0" for="no">No</label>
                                        <input class="form-check-input mt-0" type="radio" name="dext" value="0" id="no" checked>
                                    </div>
                                    <!-- <div>
                                        <div class="col-form-label nq_input">
                                            <input type="radio" name="dext" id="yes" value="1">
                                            <label for="yes">Yes</label>
                                            <input type="radio" name="dext" id="no" value="0" checked>
                                            <label for="no">NO</label>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Invoice LA</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <label class="form-check-label m-0" for="yes2">Yes</label>
                                        <input class="form-check-input mt-0" type="radio" name="invoice_la" value="1" id="yes2">
                                        <label class="form-check-label m-0" for="no2">No</label>
                                        <input class="form-check-input mt-0" type="radio" name="invoice_la" value="0" id="no2" checked>
                                    </div>
                                    <!-- <div>
                                        <div class="col-form-label nq_input">
                                            <input type="radio" name="invoice_la" id="yes2" value="1">
                                            <label for="yes2">Yes</label>
                                            <input type="radio" name="invoice_la" id="no2" value="0" checked>
                                            <label for="no2">NO</label>
                                        </div>
                                    </div> -->
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="" onclick="saveCash()">Save</button>
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
    var saveUrl = "{{url('petty-cash/saveCash')}}";
    var editUrl = "{{url('petty-cash/editCash')}}";
    var redirectUrl = "{{url('petty-cash/petty_cash')}}";
</script>
<script>
    $(document).ready(function() {
        // New Job date 
        // $('#ToDate').datepicker({
        //     format: 'dd-mm-yyyy',
        //     autoclose: true,
        //     todayHighlight: true,
        //     container: '#purchase_day_book_form'
        // });
        $('#fromDate').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

        $('#openCalendarBtn').click(function() {
            $('#fromDate').focus();
        });
        $('#ToDate').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

        $('#openCalendarBtn1').click(function() {
            $('#ToDate').focus();
        });
    });
</script>
<script type="text/javascript" src="{{ url('public/js/salesFinance/petty_cash/cash.js') }}"></script>

@endsection