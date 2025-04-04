@extends('frontEnd.layouts.master')

@section('title','Finance')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')



<section class="wrapper px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-lg-4 col-xl-4 ">
                                <div class="pageTitle">
                                    <h3 class="mt-0">Omega Care Group Ltd - Council Tax</h3>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                                <div class="pageTitleBtn">
                                    <a href="#" class="profileDrop" data-toggle="modal" data-target="#AddCouncilTax"><i class="fa fa-plus-circle"></i> Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="maimTable">
                                    <!-- end here -->
                                    <div class="table-responsive" style="min-height: 350px;">
                                        <table id="exampleOne" class="display tablechange table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="table-light">
                                                    <!-- Ram bulk delete -->
                                                    <th class="text-center" style=" width:30px;"><input type="checkbox" id="selectAll"> <label for="selectAll"> All Select</label></th>
                                                    <th>#</th>
                                                    <th>Lead Ref.</th>
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
                                                <tr>
                                                    <td>1</td>
                                                    <td>Flat 1</td>
                                                    <td>40-42 Kemble Street, Prescot</td>
                                                    <td>L34 5SQ</td>
                                                    <td>Knowsley </td>
                                                    <td>4</td>
                                                    <td>yes</td>
                                                    <td></td>
                                                    <td>yes</td>
                                                    <td>7600198442</td>
                                                    <td>18.03.2024</td>
                                                    <td>01.04.24 - 31.03.25</td>
                                                    <td>£314 per month</td>
                                                    <td>Omega office - business rates</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Flat 1</td>
                                                    <td>40-42 Kemble Street, Prescot</td>
                                                    <td>L34 5SQ</td>
                                                    <td>Knowsley </td>
                                                    <td>4</td>
                                                    <td>yes</td>
                                                    <td></td>
                                                    <td>yes</td>
                                                    <td>7600198442</td>
                                                    <td>18.03.2024</td>
                                                    <td>01.04.24 - 31.03.25</td>
                                                    <td>£314 per month</td>
                                                    <td>Omega office - business rates</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="table-light">
                                                <tr class="table-light">
                                                    <th colspan="17">Total</th>
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
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="AddCouncilTax" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add Council Tax</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="error-text"></div>
                <div class="row">
                    <form action="" id="addCouncilTaxForm" class="customerForm">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label"> Flat number if applicable <span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="council_tax_id" >
                                        <input type="text" class="form-control editInput" id="" name="flat_num" placeholder="Flat 1">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label"> Address <span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="" name="address" placeholder="40-42 Kemble Street, Prescot">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label"> PostCode <span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="" name="postcode"  placeholder="L34 5SQ">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label"> Council <span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="" name="council" placeholder="Knowsley">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">No of Bedrooms ? <span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" name="no_of_bedrooms" id="" placeholder="4">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Owned by Omega?</label>
                                    <div class="col-sm-8">
                                        <input type="radio" name="ownedByOmega" class="" value="1" id="" ><label for="">Yes</label>
                                        <input type="radio" name="ownedByOmega" class="" id="" value="0" ><label for="">No</label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Occupancy<span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="" name="occupancy" placeholder="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="formDtail">
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Exempt? Yes/No <span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="radio" name="exempt" class="" value="1" id=""><label for="">Yes</label>
                                        <input type="radio" class="" name="exempt" value="0" id=""><label for="">No</label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Account number<span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="" name="account_number" placeholder="Account number">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Last bill<span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control editInput" id="" name="last_bill_date" placeholder="Last bill">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Bill period<span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control editInput" name="bill_period_start_date" id="" placeholder="Bill period">
                                        <input type="date" class="form-control editInput" id="" name="bill_period_end_date" placeholder="Bill period">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Amount paid<span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="" name="amount_paid" placeholder="Amount paid">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Additional Notes<span class="radStar">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control editInput" id="" name="additional_notes" placeholder="Additional Notes">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveCouncilTax">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('public/js/jobs/js/custom.js') }}"></script>
<script>
$(document).ready(function() {
    $("#saveCouncilTax").on("click", function(e) {
        // alert("hii");
        e.preventDefault(); // Prevent default form submission
        console.log($('#addCouncilTaxForm').serialize());
        $.ajax({
            url: "{{ url('finance/save-council-tax') }}", // Laravel route or API endpoint
            method: "POST",
            data: $('#addCouncilTaxForm').serialize(),
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.success) {

                    alert("Data saved successfully!");
                    $("#AddCouncilTax").modal("hide"); // Hide modal
                    $("#addCouncilTaxForm")[0].reset(); // Reset form
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr) {
                alert("Something went wrong. Please try again.");
            }
        });
    });
});
</script>

@endsection