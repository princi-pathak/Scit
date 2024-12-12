@include('frontEnd.salesAndFinance.jobs.layout.header')
@section('title','Quotes')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Quote Multi File Uploader</h3>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 px-3">
                <div class="pageTitleBtn">
                    <a href="#" class="profileDrop">Close</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-lg-2 col-xl-2 px-3">
                <div class="col-form-label">
                    <strong>Quote</strong>
                </div>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 px-3">
                <div class="col-form-label">
                    <strong>{{ $quote_ref }}</strong>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 px-3 align-items-center">
                <div class="d-flex topbaarBtn text-center">
                    <input type="hidden" class="quote_id" name="quote_id" id="quote_id" value="{{ $quoteId }}">
                    <a href="javascript:void(0)" class="profileDrop"> <i class="material-symbols-outlined"> add </i> <input type="file" id="imageUpload" multiple name="uploadfile[]"></a>
                    <a href="#!" class="profileDrop" id="saveTableData"> <i class="material-symbols-outlined"> arrow_circle_right </i> Start Upload</a>
                    <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> close_small </i> Cancel Upload </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 px-3">
                <div class="quoteSearchRight">
                    <input type="search" class="form-control editInput" id="" placeholder="Search...">
                </div>
            </div>
        </div>
        <di class="row">
            <div class="col-lg-12">
                <div class="productDetailTable pt-3">
                    <table class="table" id="multiFileUploader">
                        <thead class="table-light">
                            <tr>
                                <th>File Name </th>
                                <th>Preview </th>
                                <th>Type</th>
                                <th>Title </th>
                                <th>Description </th>
                                <th class="text-center">Mobile User Visible</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div> <!-- End off main Table -->
            </div>
        </di>
    </div>
</section>

<script>
    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const files = event.target.files; // Get the selected files
        const QuoteId = document.getElementById('quote_id').value;
        console.log(files);
        const tableBody = $('#multiFileUploader tbody');

        if (files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Check if the file is an image
                if (file.type.startsWith('image/')) {
                    const fileSizeInBytes = file.size; // File size in bytes
                    const fileSizeInKB = (fileSizeInBytes / 1024).toFixed(2);

                    const reader = new FileReader(); // Create a FileReader instance
                    reader.onload = function(e) {
                        const row = `
                        <tr>
                            <td>
                                <div>
                                    <label>${file.name}</label>
                                    <p>${fileSizeInKB} KB</p>
                                    <input type="text" class="form-control editInput textareaInput">
                                </div>
                            </td>
                            <td>
                                <div class="uplod_img">
                                    <input type="file" class="image_file" hidden data-url="${URL.createObjectURL(file)}"/>
                                    <img src="${e.target.result}" alt="Image Preview" style="max-width: 200px;">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <select class="form-control editInput selectOptions attachmentType" name="attachment_type" onclick="getAttachmentType();" id="attachmentType">
                                        <option></option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div>
                                <input type="hidden" class="quoteId" value="${QuoteId}">
                                    <input type="text" class="form-control editInput textareaInput title" name="title" placeholder="Title">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <textarea class="form-control textareaInput rounded-1 description" name="description" rows="3" placeholder="Description"></textarea>
                                </div>
                            </td>
                            <td class="text-center mobile_user_check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input mobile_user_visible" type="checkbox" name="mobile_user_visible[]" value="1">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex topbaarBtn justify-content-end">
                                    <a href="javascript:void(0)" class="profileDrop"><i class="material-symbols-outlined">arrow_circle_right</i></a>
                                    <a href="#!" class="profileDrop"><i class="material-symbols-outlined">close_small</i></a>
                                </div>
                            </td>
                        </tr>
                    `;
                        tableBody.append(row); // Append the row to the table
                    };

                    reader.readAsDataURL(file); // Read the file as a data URL (base64 encoded)
                } else {
                    console.log(`File "${file.name}" is not a valid image.`);
                }
            }
        } else {
            console.log('No files selected.');
        }
    });


    function getAttachmentType() {
        const attachmentTypeElements = document.querySelectorAll('.attachmentType');

        $.ajax({
            url: '{{ route("quote.ajax.getAttachmentList") }}',
            method: 'GET',
            success: function(response) {
                console.log("getAttachmentList", response.data);

                attachmentTypeElements.forEach(attachmentTypeElement => {
                    const selectedValue = attachmentTypeElement.value; // Save the current selected value

                    // Check if the dropdown is already populated with options
                    if (attachmentTypeElement.options.length === 0 || !response.data.some(attachment => attachment.id === parseInt(selectedValue))) {
                        attachmentTypeElement.innerHTML = ''; // Clear the existing options

                        // Append a blank option
                        const blankOption = document.createElement('option');
                        blankOption.text = '';
                        attachmentTypeElement.appendChild(blankOption);

                        // Add options dynamically
                        response.data.forEach(attachment => {
                            const option = document.createElement('option');
                            option.value = attachment.id;
                            option.text = attachment.title;
                            attachmentTypeElement.appendChild(option);
                        });
                    }

                    // Restore the selected value if it still exists
                    if (selectedValue) {
                        attachmentTypeElement.value = selectedValue;
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

    }

    document.getElementById('saveTableData').addEventListener('click', function() {
        const tableRows = document.querySelectorAll('#multiFileUploader tbody tr');
        console.log("tableRows", tableRows);
        const formData = new FormData();

        tableRows.forEach((row, index) => {
            console.log("row", row);
            const attachment_type = row.querySelector('.attachmentType').value;
            const title = row.querySelector('.title').value;
            const description = row.querySelector('.description').value;
            const mobile_user_visible = row.querySelector('.mobile_user_visible').value;
            const quoteId = row.querySelector('.quoteId').value;

            const fileInput = document.getElementById('imageUpload');
            console.log("fileInput", fileInput);
            if (fileInput.files.length > 0) {
                Array.from(fileInput.files).forEach((file, index) => {
                    console.log(file);
                    // Append each file to the FormData object
                    formData.append(`image[${index}]`, file);
                });
            } else {
                console.log('No files selected');
            }

            formData.append(`quote_id[${index}]`, quoteId);
            formData.append(`attachment_type[${index}]`, attachment_type);
            formData.append(`title[${index}]`, title);
            formData.append(`description[${index}]`, description);
            formData.append(`mobile_user_visible[${index}]`, mobile_user_visible);

        });

        console.log("formData", formData);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Send data via AJAX
        $.ajax({
            url: '{{ Route("quote.ajax.saveQuoteAttachments") }}',
            method: 'POST',
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming the data into a query string
            contentType: false,
            success: function(response) {
                alert(response.data);
                window.location.href = response.redirect_url;
            },
            error: function(xhr) {
                console.error('Error saving data:', xhr);
            }
        });
    });
</script>

@include('frontEnd.salesAndFinance.jobs.layout.footer')