@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Expand Card')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="panel">
                    <header class="panel-heading px-5">
                        <h4>Expand Card</h4>
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="jobsection justify-content-between align-items-center">
                                <div class="jobsection mb-0">
                                    <a href="{{url('petty-cash/expend-card')}}" class="profileDrop" id="active_inactive">Expend card</a>
                                    <a href="{{url('petty-cash/petty_cash')}}" class="profileDrop">Petty Cash</a>
                                </div>
                                <div class="d-flex justify-content-end gap-4 align-items-center">
                                    <div class="d-flex justify-content-end gap-2 align-items-center">
                                        <label for="fromDate" class="mb-0"> From:</label>
                                        <input type="date" id="fromDate" class="form-control">
                                        <label for="ToDate" class="mb-0"> To:</label>
                                        <input type="date" id="ToDate" class="form-control">
                                    </div>
                                    <!-- <a href="{{url('petty-cash/expend_card_add')}}" class="profileDrop"><i class="fa fa-plus"></i> Add</a> -->
                                    <a href="javascript:void()" class="profileDrop" data-toggle="modal" data-target="#expend_card"><i class="fa fa-plus"></i> Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="mt-2">
                                <div class="balance_show">
                                    <h6>Closing Balance on Card = <span id="balanceOnCard">£0</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="productDetailTable mb-4  table-responsive">
                                <table class="table border-top border-bottom tablechange" id="" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Balance b/fwd</th>
                                            <th>Funds added to card</th>
                                            <th>Purchases</th>
                                            <th>Card Details</th>
                                            <th>Receipt</th>
                                            <th>Uploaded to DEXT</th>
                                            <th>Invoice LA</th>
                                            <th>Initials</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="expend_result">
                                        <?php
                                        $enterInLoop = 0;
                                        $index = 0;
                                        if (!empty($previous_month_data) && $previous_month_data['previousbalanceOnCard'] != 0) {
                                            $enterInLoop = 1; ?>

                                            <tr>
                                                <td>{{++$index}}</td>
                                                <td>{{$previous_month_data['prvious_date']}}</td>
                                                <td>£{{$previous_month_data['previousbalanceOnCard']}}</td>
                                                <td>£{{$previous_month_data['previousfundAmount']}}</td>
                                                <td colspan="6"></td>
                                            </tr>
                                        <?php } ?>
                                        <?php
                                        $sumBalanceFund = 0;
                                        $sumPurchaseCashIn = 0;
                                        $totalBalancebfwd = 0;
                                        $totalBalanceFund = 0;
                                        $date = null;
                                        foreach ($expendCard as $val) {
                                            $sumPurchaseCashIn = $sumPurchaseCashIn + $val->purchase_amount;
                                            $totalBalanceFund = $totalBalanceFund + $val->fund_added;
                                            if ($enterInLoop == 0) {
                                                $totalBalancebfwd = $val->balance_bfwd;
                                                $enterInLoop = 1;
                                            }
                                            $db_date = date('m', strtotime($val->expend_date));
                                        ?>
                                            <tr>
                                                <td>{{++$index}}</td>
                                                <td>{{date('Y-m-d',strtotime($val->expend_date))}}</td>
                                                <?php if ($previous_month_data['previousbalanceOnCard'] == 0) {
                                                    if ($date != $db_date || $date == null) {
                                                        $date = $db_date; ?>
                                                        <td>£{{$val->balance_bfwd}}</td>
                                                    <?php } else { ?>
                                                        <td></td>
                                                <?php }
                                                } ?>
                                                <td><?php if (isset($val->fund_added) && $val->fund_added != '') {
                                                        echo '£' . $val->fund_added;
                                                    } ?></td>
                                                <td>£{{$val->purchase_amount}}</td>
                                                <td>{{$val->card_details}}</td>
                                                <td><a href="{{url('public/images/finance_petty_cash/'.$val->receipt)}}" target="_blank"><i class="fa-solid fa-eye"></i></a></td>
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
                                        if ($totalBalancebfwd == 0) {
                                            $sum = $totalBalanceFund + $previous_month_data['previousbalanceOnCard'];
                                        } else {
                                            $sum = $totalBalanceFund + $totalBalancebfwd;
                                        }
                                        $calculation = $sum - $sumPurchaseCashIn;
                                        $balanceOnCard = $calculation - $cash;
                                        ?>
                                        <input type="hidden" id="totalBalanceOnCard" value="{{$balanceOnCard;}}">
                                    </tbody>
                                    <tfoot>
                                        <tr class="table-light">
                                            <th colspan="2">Total</th>
                                            <th id="totalBalancebfwd">£{{($totalBalancebfwd) ? $totalBalancebfwd: $previous_month_data['previousbalanceOnCard']}}</th>
                                            <th id="totalBalanceFund">£{{$totalBalanceFund}}</th>
                                            <th id="sumPurchaseCashIn">£{{number_format($sumPurchaseCashIn, 2, '.', '')}}</th>
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

<!-- Expend Card Modal start here -->
<div class="modal fade" id="expend_card" tabindex="-1" aria-labelledby="expend_cardLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="expend_cardLabel">Add Expend Card</h4>
            </div>
            <form id="expend_cardForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label> Date <span class="radStar">*</span></label>
                                    <div>
                                        <input type="date" class="form-control editInput" name="expend_date" id="date" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label> Balance b/fwd <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput checkInput" id="Balance_b" name="Balance_b">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label> Fund added to card <span class="radStar">*</span></label>
                                    <div>
                                        <input type="text" class="form-control editInput numberInput" id="fund_added" name="fund_added" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length<10">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Purchases</label>
                                    <div>
                                        <input type="text" class="form-control editInput numberInput checkInput" id="purchase_amount" name="purchase_amount" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length<10">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label> Card Details <span class="radStar">*</span></label>
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
                                        <div class=" col-form-label nq_input">
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
    $(document).ready(function() {
        var totalBalanceOnCard = $("#totalBalanceOnCard").val();
        $("#balanceOnCard").text("£" + Number(totalBalanceOnCard).toFixed(2));
        // alert(typeof(totalBalanceOnCard));
    });
</script>

<script>
    var filterUrl = "{{url('petty-cash/expand_card_filter')}}";
    var token = "<?php echo csrf_token(); ?>";
</script>
<script>
    var saveUrl="{{url('petty-cash/saveExpend')}}";
    var redirectUrl="{{url('petty-cash/expend-card')}}";
</script>


<script type="text/javascript" src="{{ url('public/js/salesFinance/petty_cash/expend_card.js') }}"></script>

@endsection