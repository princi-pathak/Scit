@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Council Tax')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<section class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="col-md-4 col-lg-4 col-xl-4 ">
                            <div class="pageTitle">
                                <h3 class="mt-0">Council Tax</h3>
                            </div>
                        </div>
                        <!-- <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                            <div class="pageTitleBtn">
                                <a href="#" class="profileDrop openModalBtn" data-action="add" id=""><i class="fa fa-plus-circle"></i> Add</a>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="maimTable">
                                <div class="printExpt">
                                    <div class="prntExpbtn">
                                        <a href="#!">Print</a>
                                        <a href="#!">Export</a>
                                    </div>
                                    <!-- <div class="searchFilter">
                                        <a href="#!">Show Search Filter</a>
                                    </div> -->
                                </div>
                                <div class="markendDelete">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="jobsection">
                                                <a href="#" class="profileDrop openModalBtn" data-action="add" id=""> Add</a>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-5">
                                                <div class="pageTitleBtn p-0">
                                                    <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a>
                                                </div>
                                            </div> -->
                                    </div>
                                </div>
                                <!-- end here -->
                                <div class="productDetailTable pt-3">
                                    <div class="table-responsive">
                                        <table id="exampleOne" class=" tablechange table" cellspacing="0" width="100%">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Flat number if applicable</th>
                                                    <th>Address</th>
                                                    <th>PostCode</th>
                                                    <th>Council</th>
                                                    <th>No of Bedrooms?</th>
                                                    <th>Owned by Omega?</th>
                                                    <th>Occupancy</th>
                                                    <th>Exempt? Yes/No</th>
                                                    <th>Account number</th>
                                                    <th>Last bill</th>
                                                    <th>Bill period</th>
                                                    <th>Amount paid</th>
                                                    <th>Additional Notes </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($councilTaxs as $councilTax)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $councilTax->flat_number }}</td>
                                                    <td>{{ $councilTax->address }}</td>
                                                    <td>{{ $councilTax->post_code }}</td>
                                                    <td>{{ $councilTax->council }}</td>
                                                    <td>{{ $councilTax->no_of_bedrooms }}</td>
                                                    <td>{{ $councilTax->owned_by_omega }}</td>
                                                    <td>{{ $councilTax->occupancy }}</td>
                                                    <td>{{ $councilTax->exempt }}</td>
                                                    <td>{{ $councilTax->account_number }}</td>
                                                    <td>{{ $councilTax->last_bill_date }}</td>
                                                    <td>{{ $councilTax->bill_period_start_date }} - {{ $councilTax->bill_period_end_date }}</td>
                                                    <td>{{ $councilTax->amount_paid }}</td>
                                                    <td>{{ $councilTax->additional }}</td>
                                                    <td> <a href="#!" class="openModalBtn" data-action="edit" data-id="{{ $councilTax->id }}" data-flat-number="{{ $councilTax->flat_number }}" data-address="{{ $councilTax->address }}" data-post_code="{{ $councilTax->post_code}}" data-council="{{ $councilTax->council }}" data-no_of_bedrooms="{{ $councilTax->no_of_bedrooms }}" data-owned_by_omega="{{ $councilTax->owned_by_omega }}" data-occupancy="{{ $councilTax->occupancy }}" data-exempt="{{ $councilTax->exempt }}" data-account_number="{{ $councilTax->account_number }}" data-last_bill_date="{{ $councilTax->last_bill_date }}" data-bill_period_start_date="{{ $councilTax->bill_period_start_date }}" data-bill_period_end_date="{{ $councilTax->bill_period_end_date }}" data-amount_paid="{{ $councilTax->amount_paid }}" data-additional="{{ $councilTax->additional }}" id=""><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="#!" class="deleteBtn" data-id="{{ $councilTax->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="AddCouncilTax" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Council Tax</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">
                <div id="error-text"></div>
                <div class="row">
                    <form action="" id="addCouncilTaxForm" class="customerForm">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label"> Flat number if applicable </label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="council_tax_id" id="council_tax_id">
                                        <input type="text" class="form-control editInput" id="flat_num" name="flat_number" placeholder="Flat 1">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label"> Address <span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="address" name="address" placeholder="40-42 Kemble Street, Prescot">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label"> Post Code <span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="postcode" name="post_code" placeholder="L34 5SQ">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label"> Council <span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="council" name="council" placeholder="Knowsley">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">No of Bedrooms ? </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="no_of_bedrooms" id="no_of_bedrooms" placeholder="4">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Owned by Omega? <span class="radStar">*</span></label>
                                    <div class="col-sm-8 d-flex align-items-center gap-2">
                                        <input type="radio" name="owned_by_omega" value="1" id="ownedByOmegayes">
                                        <label for="ownedByOmegayes" class="m-0 pt-1">Yes</label>
                                        <input type="radio" name="owned_by_omega" id="ownedByOmegano" value="0">
                                        <label for="ownedByOmegano" class="m-0 pt-1">No</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Occupancy </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="occupancy" name="occupancy" placeholder="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Exempt? Yes/No <span class="radStar">*</span></label>
                                    <div class="col-sm-8 d-flex align-items-center gap-2">
                                        <input type="radio" name="exempt" value="1" id="exemptyes">
                                        <label for="exemptyes" class="m-0 pt-1">Yes</label>
                                        <input type="radio" name="exempt" value="0" id="exemptno">
                                        <label for="exemptno" class="m-0 pt-1">No</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Account number<span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="account_number" name="account_number" placeholder="Account number">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Last bill</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control editInput" id="last_bill_date" name="last_bill_date" placeholder="Last bill">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Bill period </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control editInput" name="bill_period_start_date" id="bill_period_start_date" placeholder="Bill period">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control editInput" id="bill_period_end_date" name="bill_period_end_date" placeholder="Bill period">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Amount paid </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="amount_paid" name="amount_paid" placeholder="Amount paid">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Additional Notes </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="additional_notes" name="additional" placeholder="Additional Notes">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="profileDrop" data-dismiss="modal">Close</button>
                <button type="button" class="profileDrop" id="saveCouncilTax">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('public/js/salesFinance/council_tax.js') }}"></script>
<script>
    deleteURL = "{{ url('finance/delete-council-tax') }}/";
    saveData = "{{ url('finance/save-council-tax') }}";
</script>

@endsection