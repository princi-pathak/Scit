@include('frontEnd.salesAndFinance.jobs.layout.header')
<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Search Quote</h3>
                </div>
            </div>
        </div>
        @include('frontEnd.salesAndFinance.quote.quote_buttons')
        <di class="row">
            <div class="col-lg-12">
                <div class="maimTable">
                    <div class="printExpt">
                        <div class="prntExpbtn">
                            <a href="#!">Print</a>
                            <a href="#!">Export</a>
                        </div>
                        <div class="searchFilter">
                            <a href="#!" onclick="hideShowDiv()" class="hidebtn">Show Search Filter</a>
                        </div>
                    </div>
                    <div class="searchJobForm" id="divTohide">
                        <form action="" id="searchQuoteForm" class="p-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Quote Ref:</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control editInput" id="quote_ref" name="quote_ref" placeholder="Quote Ref.">
                                        </div>
                                    </div>

                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Quote Source:</label>
                                        <div class="col-md-8">
                                            <select class="form-control editInput selectOptions" name="source" id="quote_source">
                                                @foreach($quoteSources as $quoteSource)
                                                <option value="{{ $quoteSource->id }}">{{ $quoteSource->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Tag:</label>
                                        <div class="col-md-8">
                                            <select class="form-control editInput selectOptions" name="tags" id="tag">
                                                @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Accepted Date:</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" name="accepted_to" id="accepted_to">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" name="accepted_from" id="accepted_from">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Customer:</label>
                                        <div class="col-md-8">
                                            <select class="form-control editInput selectOptions" id="customer" name="customer_id">
                                                <option>--All--</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Created By:</label>
                                        <div class="col-md-8">
                                            <select class="form-control editInput selectOptions" name="user" id="user">
                                                @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Region:</label>
                                        <div class="col-md-8">
                                            <select class="form-control editInput selectOptions" name="region" id="region">
                                                @foreach($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Rejected Date:</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" id="rejected_to" name="rejected_to">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" id="rejected_from" name="rejected_from">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Project:</label>
                                        <div class="col-md-8">
                                            <select class="form-control editInput selectOptions" id="project" name="project">
                                                <option>--All--</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Date From:</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" id="date_to" name="date_to">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" id="date_from" name="date_from">
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Expiry Date:</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" id="Expiry_to" name="Expiry_to">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" id="Expiry_from" name="Expiry_from">
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Converted Date:</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" name="converted_date" id="converted_date">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Quote Type:</label>
                                        <div class="col-md-8">
                                            <select class="form-control editInput selectOptions" id="quote_type" name="quote_type">
                                                @foreach($quoteTypes as $quoteType)
                                                <option value="{{ $quoteType->id }}">{{ $quoteType->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Keywords:</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control editInput" id="address" name="address" placeholder="Address Site">
                                        </div>
                                    </div>
                                    <div class="row form-group mb-2">
                                        <label class="col-md-4 col-form-label text-end">Status:</label>
                                        <div class="col-md-8">
                                            <select class="form-control editInput selectOptions" name="status" id="status">
                                                <option value="Draft">Draft</option>
                                                <option value="Processed">Processed</option>
                                                <option value="Call Back">Call Back</option>
                                                <option value="Accepted">Accepted</option>
                                                <option value="Rejected">Rejected</option>
                                                <option value="Converted">Converted</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pageTitleBtn justify-content-center">
                                        <button type="submit" class="profileDrop px-3" id="">Search </button>
                                        <button class="profileDrop px-3">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="hideTableDiv">
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
                                        <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="productDetailTable pt-3">
                            <table class="table mb-0" id="containerA">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Quote Ref </th>
                                        <th>Quote Date</th>
                                        <th>Customer Name</th>
                                        <th>Site / Delivery</th>
                                        <th>No. Quotes </th>
                                        <th>Sub Total </th>
                                        <th>VAT</th>
                                        <th>Total </th>
                                        <th>Deposit </th>
                                        <th>Outstanding</th>
                                        <th>profit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>QU-0001</td>
                                        <td>2024-12-06</td>
                                        <td>Webnmob</td>
                                        <td>B-36 Sector 59</td>
                                        <td>1</td>
                                        <td>£220.00</td>
                                        <td>£44.00</td>
                                        <td>£264.00</td>
                                        <td>£0.00</td>
                                        <td>£264.00</td>
                                        <td>£120.00</td>
                                        <td>
                                            <div class="d-inline-flex align-items-center ">
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu fade-up m-0">
                                                        <a href="#" class="dropdown-item">Send SMS</a>
                                                        <a href="" class="dropdown-item">Preview</a>
                                                        <a href="" class="dropdown-item">Print</a>
                                                        <a href="" class="dropdown-item">Email</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>QU-0001</td>
                                        <td>2024-12-06</td>
                                        <td>Webnmob</td>
                                        <td>B-36 Sector 59</td>
                                        <td>1</td>
                                        <td>£220.00</td>
                                        <td>£44.00</td>
                                        <td>£264.00</td>
                                        <td>£0.00</td>
                                        <td>£264.00</td>
                                        <td>£120.00</td>
                                        <td>
                                            <div class="d-inline-flex align-items-center ">
                                                <div class="nav-item dropdown">
                                                    <a href="#" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu fade-up m-0">
                                                        <a href="#" class="dropdown-item">Send SMS</a>
                                                        <a href="" class="dropdown-item">Preview</a>
                                                        <a href="" class="dropdown-item">Print</a>
                                                        <a href="" class="dropdown-item">Email</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th colspan="6">Page Sub Total</th>
                                        <th>&#163;</th>
                                        <th>&#163;</th>
                                        <th>&#163;</th>
                                        <th>&#163;</th>
                                        <th>&#163;</th>
                                        <th>&#163;</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- End off main Table -->
            </div>
        </di>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        getCustomerList();
        function getCustomerList() {

            $.ajax({
                url: '{{ route("customer.ajax.getCustomerList") }}',
                success: function(response) {
                    console.log(response.message);
                    var get_customer_type = document.getElementById('customer');
                    get_customer_type.innerHTML = '';

                    response.data.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.id;
                        option.text = user.name;
                        get_customer_type.appendChild(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }


        // Hide the div
        document.getElementById('hideTableDiv').style.display = 'none';

        $('#searchQuoteForm').on('submit', function(e) {
            // alert();
            e.preventDefault(); // Prevent form from submitting normally

            // Get form data
            var formData = $(this).serialize(); // Serialize form data into a query string
            console.log("formData", formData);
            // Send AJAX request
            $.ajax({
                url: '{{ route("quote.ajax.searchQuoteData") }}', // Replace with your endpoint
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Success:', response);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>


@include('frontEnd.salesAndFinance.jobs.layout.footer')