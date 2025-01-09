$(document).ready(function () {
    const hiddenDiv = document.getElementById('hiddenDiv');
    hiddenDiv.style.display = 'none';

    // $('#saveQuoteTaskFormData').on('click', function (e) {
    //     alert("saveQuoteTaskFormData");
    //     e.preventDefault();
    
    //     var form = $('#quoteTaskFormData')[0]; // Select form element
    //     var formData = new FormData(form);    // Create FormData object
    
    //     // Debug: Log formData contents
    //     for (var pair of formData.entries()) {
    //         console.log(pair[0] + ': ' + pair[1]);
    //     }
    
    //     $.ajax({
    //         type: 'POST',
    //         url: '/save-quote-task',
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         success: function (response) {
    //             console.log(response);
    //         },
    //         error: function (xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });
    

    // $('#savettachmentForm').on('submit', function (e) {
    //     e.preventDefault(); // Prevent the default form submission

    //     let formData = new FormData(this); // Create a FormData object for file upload

    //     $.ajax({
    //         url: '/save-attachment', // Replace with your Laravel route URL
    //         type: 'POST',
    //         data: formData,
    //         contentType: false, // Required for FormData
    //         processData: false, // Required for FormData
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for security
    //         },
    //         success: function (response) {
    //             // Handle success
    //             alert('Attachment saved successfully!');
    //             $('#new_Attachment_model').modal('hide'); // Hide the modal
    //         },
    //         error: function (xhr) {
    //             // Handle error
    //             const errors = xhr.responseJSON.errors || { message: xhr.responseJSON.message };
    //             let errorMessage = 'Error saving the attachment:\n';
    //             for (let key in errors) {
    //                 errorMessage += `${errors[key]}\n`;
    //             }
    //             alert(errorMessage);
    //         }
    //     });
    // });
});
// var inputField = document.getElementById('lead_id');

// if (inputField.value.trim() !== '') {
//     hiddenDiv.style.display = 'block'; // Show the div
// } else {
//     hiddenDiv.style.display = 'none'; // Hide the div if input is empty
// }

