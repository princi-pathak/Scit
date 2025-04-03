@include('frontEnd.petty_cash.layout.header')

<section class="main_section_page_petty px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Expend Card Form</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="jobsection">
                <a href="{{url('petty-cash/expend-card')}}" class="profileDrop button_green" id="active_inactive">Expend card</a>
                <a href="{{url('petty-cash/petty_cash')}}" class="profileDrop button_green">Cash</a>
                </div>
            </div>
        </div>
        <div calss="row">
            <div class="col-md-6 col-lg-6 col-xl-6 mt-4">
                <div class="mt-1 mb-0 text-center" style="display:none" id="message_save"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="newJobForm green_border card mt-4">
                    <form id="expend_cardForm">
                        <input type="hidden" id="id" name="id" value="">
                        @csrf
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Date</label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control editInput" id="date" name="expend_date">
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Balance b/fwd</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput" id="balance_bfwd" name="balance_bfwd">
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Fund added to card</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput" id="fund_added" name="fund_added">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Purchases</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput" id="purchase_amount" name="purchase_amount">
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Card Details</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput" id="card_details" name="card_details">
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Receipt</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control editInput" id="receipt" name="receipt">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Uploaded to DEXT</label>
                                    <div class="col-md-8">
                                        <div class="col-sm-9 col-form-label nq_input">
                                            <input type="radio" name="dext" id="yes" value="1">
                                            <label for="yes">Yes</label>
                                            <input type="radio" name="dext" id="no" value="0">
                                            <label for="no">NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Invoice LA</label>
                                    <div class="col-md-8">
                                        <div class="col-sm-9 col-form-label nq_input">
                                            <input type="radio" name="invoice_la" id="yes2" value="1">
                                            <label for="yes2">Yes</label>
                                            <input type="radio" name="invoice_la" id="no2" value="0">
                                            <label for="no2">NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Initials</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput" id="initial" name="initial">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="pageTitleBtn">
                    <a href="javascript:void(0)" onclick="save_expend_card()" class="profileDrop button_green"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                    <a href="{{url('petty-cash/expend-card')}}" class="profileDrop button_green"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <!-- <a href="#" class="profileDrop button_green"> Action <i class="fa-solid fa-arrow-down"></i></a> -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var saveUrl="{{url('petty-cash/saveExpend')}}";
    var redirectUrl="{{url('petty-cash/expend-card')}}";
</script>
<script type="text/javascript" src="{{ url('public/js/salesFinance/petty_cash/expend_card.js') }}"></script>
@include('frontEnd.petty_cash.layout.footer')