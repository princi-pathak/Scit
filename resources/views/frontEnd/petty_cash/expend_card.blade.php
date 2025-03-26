@include('frontEnd.petty_cash.layout.header')

<section class="main_section_page_petty px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Expend Card</h3>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="jobsection">
                    <a href="{{url('petty-cash/expend-card')}}" class="profileDrop" id="active_inactive">Expend card</a>
                    <a href="{{url('petty-cash/petty_cash')}}" class="profileDrop">Cash</a>
                    <a href="{{url('petty-cash/expend_card_add')}}" class="profileDrop"><i class="fa-solid fa-plus"></i> Add</a>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="mt-2">
                    <div class="balance_show">
                        <h6>Closing Balance on Card = <span>£300.39</span></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-12 px-3">
                <div class="mt-3 cash_table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>18.03.2023</td>
                                    <td>£168.55</td>
                                    <td>£634.00</td>
                                    <td>£634.00</td>
                                    <td>LM weekly dinner money</td>
                                    <td>
                                        <img src="/assets/imagrs/imgad1.png" height="70" alt="">
                                    </td>
                                    <td>yes</td>
                                    <td>yes</td>
                                    <td>LH</td>
                                    <td><a href=""><i class="fa-solid fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>18.03.2023</td>
                                    <td>£168.55</td>
                                    <td>£634.00</td>
                                    <td>£634.00</td>
                                    <td>LM weekly dinner money</td>
                                    <td>
                                        <img src="/assets/imagrs/imgad1.png" height="70" alt="">
                                    </td>
                                    <td>yes</td>
                                    <td>yes</td>
                                    <td>LH</td>
                                    <td><a href=""><i class="fa-solid fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>18.03.2023</td>
                                    <td>£168.55</td>
                                    <td>£634.00</td>
                                    <td>£634.00</td>
                                    <td>LM weekly dinner money</td>
                                    <td>
                                        <img src="/assets/imagrs/imgad1.png" height="70" alt="">
                                    </td>
                                    <td>yes</td>
                                    <td>yes</td>
                                    <td>LH</td>
                                    <td><a href=""><i class="fa-solid fa-eye"></i></a></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontEnd.petty_cash.layout.footer')