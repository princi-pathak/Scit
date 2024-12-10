@include('frontEnd.salesAndFinance.jobs.layout.header')
@section('title','Quotes')

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
                    <a href="javascript:void(0)" class="profileDrop"> <i class="material-symbols-outlined"> add </i> <input type="file" id="imageUpload" name="uploadfile[]"></a>
                    <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> arrow_circle_right </i> Start Upload</a>
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
        const file = event.target.files[0]; // Get the selected file
        const preview = document.getElementById('imagePreview'); // Get the preview image element

        if (file) {
            // Check if the file is an image
            if (file.type.startsWith('image/')) {
                const reader = new FileReader(); // Create a FileReader instance

                const tableBody = $('#multiFileUploader tbody');
                console.log(tableBody);
                reader.onload = function(e) {
                const row = `
                          <tr>
                                <td>
                                    <div class="">
                                        <label>${file.name}</label>
                                        <input type="text" class="form-control editInput textareaInput" >
                                    </div>
                                </td>
                                <td>
                                    <div class="uplod_img">
                                        <img id="imagePreview" src="${e.target.result}" alt="Image Preview" style="max-width: 200px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <select class="form-control editInput selectOptions attachmentType" onclick="getAttachmentType();" id="attachmentType">
                                            <option></option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <input type="text" class="form-control editInput textareaInput" placeholder="Title">
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <textarea class="form-control textareaInput rounded-1" name="address" rows="3" placeholder="Description"></textarea>
                                    </div>
                                </td>
                                <td class="text-center mobile_user_check">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlinecheckOptions" id="" value="option1">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex topbaarBtn justify-content-end">
                                        <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> arrow_circle_right </i> </a>
                                        <a href="#!" class="profileDrop"> <i class="material-symbols-outlined"> close_small </i> </a>
                                    </div>
                                </td>
                            </tr>
                    `;
                    console.log(row);
                    tableBody.append(row);

                // Set up the FileReader to update the preview image when file reading is complete
             
                    // preview.src = e.target.result; // Set the preview image's source
                    // preview.style.display = 'block'; // Show the image preview
                };

              

                reader.readAsDataURL(file); // Read the file as a data URL (base64 encoded)
            } else {
                alert('Please upload a valid image file.');
                preview.style.display = 'none'; // Hide the preview image if the file is not valid
            }
        } else {
            preview.style.display = 'none'; // Hide the preview image if no file is selected
        }
    });

    function getAttachmentType() {
        // const attachmentType = document.getElementById('attachmentType');
        const attachmentTypeElements = document.querySelectorAll('.attachmentType');

        $.ajax({
            url: '{{ route("quote.ajax.getAttachmentList") }}',
            method: 'GET',
            success: function(response) {
                console.log("getAttachmentList", response.data);
                // attachmentType.innerHTML = '';

                attachmentTypeElements.forEach(attachmentTypeElement => {
                // attachmentTypeElement.innerHTML = ''; // Clear the existing options

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
            });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>

@include('frontEnd.salesAndFinance.jobs.layout.footer')