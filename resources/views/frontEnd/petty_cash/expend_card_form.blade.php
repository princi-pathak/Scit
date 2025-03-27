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
        <div class="row">
            <div class="col-md-12">
                <div class="newJobForm green_border card mt-4">
                    <form action="">
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Date</label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control editInput">
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Balance b/fwd</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput">
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Fund added to card</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Purchases</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput">
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Card Details</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput">
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Receipt</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control editInput">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Uploaded to DEXT</label>
                                    <div class="col-md-8">
                                        <div class="col-sm-9 col-form-label nq_input">
                                            <input type="radio" name="nq" id="yes">
                                            <label for="yes">Yes</label>
                                            <input type="radio" name="nq" id="no">
                                            <label for="no">NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Invoice LA</label>
                                    <div class="col-md-8">
                                        <div class="col-sm-9 col-form-label nq_input">
                                            <input type="radio" name="nq2" id="yes2">
                                            <label for="yes2">Yes</label>
                                            <input type="radio" name="nq2" id="no2">
                                            <label for="no2">NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mb-2">
                                    <label class="col-md-4 col-form-label">Initials</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control editInput">
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
                    <a href="#" class="profileDrop button_green"><i class="fa-solid fa-floppy-disk"></i> Save</a>
                    <a href="#" class="profileDrop button_green"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <!-- <a href="#" class="profileDrop button_green"> Action <i class="fa-solid fa-arrow-down"></i></a> -->
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontEnd.petty_cash.layout.footer')