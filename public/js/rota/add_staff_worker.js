$(document).ready(function() {

    $('#DOB').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#DOB').on('change', function() {
        $('#DOB').datepicker('hide');
    });

    $('#start_Date').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#start_Date').on('change', function() {
        $('#start_Date').datepicker('hide');
    });

    $('#probation_start_date').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#probation_start_date').on('change', function() {
        $('#probation_start_date').datepicker('hide');
    });

    $('#probation_end_date').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#probation_end_date').on('change', function() {
        $('#probation_end_date').datepicker('hide');
    });

    $('#probation_renew_date').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#probation_renew_date').on('change', function() {
        $('#probation_renew_date').datepicker('hide');
    });

    $('#leave_date').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#leave_date').on('change', function() {
        $('#leave_date').datepicker('hide');
    });

    $("#addStaffWorkerModal").scroll(function() {
        $('#DOB').datepicker('place');
        $('#start_Date').datepicker('place');
        $('#probation_start_date').datepicker('place');
        $('#probation_end_date').datepicker('place');
        $('#probation_renew_date').datepicker('place');
        $('#leave_date').datepicker('place');
    });

});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('addStaffWorkerForm');
    const saveButton = document.getElementById('saveSatffWorkerModel'); // Make sure this ID is correct

    if (form && saveButton) {
        saveButton.addEventListener('click', async function (e) {
            e.preventDefault(); // Prevent the default button action
            const formData = new FormData(form);

            try {
                form.action = addStaffWorker; // Make sure `addStaffWorker` is a valid URL

                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                });

                // Always parse the response body
                const result = await response.json();

                if (response.status === 422) {
                    // Clear any existing error messages
                    $('.text-danger').remove();

                    const errors = result.errors;
                    let errorMessages = '';

                    Object.entries(errors).forEach(([key, value]) => {
                        const inputField = document.querySelector(`[name="${key}"]`);
                        if (inputField) {
                            const errorEl = document.createElement('p');
                            errorEl.classList.add('text-danger', 'mb-0');
                            errorEl.textContent = value[0];
                            inputField.after(errorEl);
                        }
                        errorMessages += value[0] + "\n";
                    });

                    // alert("Please fix the following errors:\n" + errorMessages);
                    return;
                }

                if (!response.ok) {
                    throw new Error(result.message || 'An unknown error occurred.');
                }

                // Success block
                if (result.success || result.status === 'success') {
                    alert(result.message);
                    form.reset();
                    location.reload();
                } else {
                    alert('Error: ' + (result.message || 'Something went wrong.'));
                }

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
                alert('An error occurred. Please try again.');
            }
        });
    }
});


// document.addEventListener('DOMContentLoaded', function () {
//     const form = document.getElementById('addStaffWorkerForm');
//     const saveButton = document.getElementById('saveSatffWorkerModel'); // Make sure this ID is correct

//     if (form && saveButton) {
//         // alert('Form and Save button found!'); // Debugging line

//         saveButton.addEventListener('click', async function (e) {
//             e.preventDefault(); // Prevent the default button action
//             const formData = new FormData(form);
//             console.log('Form data:', formData); // Debugging line

//             try {
//                 form.action = addStaffWorker; // Make sure `addStaffWorker` is a defined URL
//                 const response = await fetch(form.action, {
//                     method: 'POST',
//                     body: formData,
//                     headers: {
//                         'X-Requested-With': 'XMLHttpRequest',
//                         'Accept': 'application/json' // Important to get proper JSON from Laravel
//                     },
//                 });

//                 // if (response.status === 422) {
//                 //     const errorData = await response.json();
//                 //     const errors = errorData.errors;
//                 //     const errorMessages = Object.values(errors).map(arr => arr.join(', ')).join('\n');
//                 //     alert("Validation errors:\n" + errorMessages);
//                 //     return; // Stop further execution
//                 // }

//                 if (response.status === 422) {
//                     // Validation error
//                     let errors = xhr.responseJSON.errors;
//                     let errorMessages = '';

//                     // Clear old errors first
//                     $('.text-danger').remove();

//                     $.each(errors, function (key, value) {
//                         // Display message under each input field
//                         let inputField = $(`[name="${key}"]`);
//                         if (inputField.length) {
//                             inputField.after(`<p class="text-danger mb-0">${value[0]}</p>`);
//                         }

//                         // Collect all messages for optional alert box
//                         errorMessages += value[0] + "\n";
//                     });

//                     // Optional: show all errors in a single alert box
//                     alert("Please fix the following errors:\n" + errorMessages);
//                 } else {
//                     alert("Something went wrong. Please try again.");
//                 }

                

//                 if (!response.ok) {
//                     throw new Error('Network response was not ok');
//                 }

//                 const data = await response.json();

//                 if (data.success || data.status === 'success') {
//                     alert(data.message);
//                     location.reload(); // Reload the page to see the new staff worker
//                     form.reset(); // Reset the form
//                 } else {
//                     alert('Error: ' + (data.message || 'Something went wrong.'));
//                 }

//             } catch (error) {
//                 console.error('There was a problem with the fetch operation:', error);
//                 alert('An error occurred. Please try again.');
//             }
//         });
//     }
// });

document.querySelectorAll('.openAddStaffModel').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const action = this.getAttribute('data-action');
        const modalTitle = document.getElementById('modalTitle');
        const staffId = document.getElementById('staff_id');
        const surname = document.getElementById('surname');
        const forename = document.getElementById('forename');
        const address = document.getElementById('address');
        const postcode = document.getElementById('postCode');
        let dob = document.getElementById('DOB');
        const account_num = document.getElementById('account_num');
        const sort_code = document.getElementById('sort_code');
        const status = document.getElementById('status');
        const rate_of_pay = document.getElementById('rate_of_pay');
        const level = document.getElementById('level');
        let start_Date = document.getElementById('start_Date');
        const job_role = document.getElementById('job_role');
        const NIN = document.getElementById('NIN');
        const starter_declaration = document.getElementById('starter_declaration');
        let probation_start_date = document.getElementById('probation_start_date');
        let probation_end_date = document.getElementById('probation_end_date');
        let probation_renew_date = document.getElementById('probation_renew_date'); 
        const probation_enrollered_yes = document.getElementById('probation_enrollered_yes');
        const probation_enrollered_no = document.getElementById('probation_enrollered_no');
        const student_loan = document.getElementById('student_loan');
        const dbs_clear_yes = document.getElementById('dbs_clear_yes');
        const dbs_clear_no = document.getElementById('dbs_clear_no');
        const dbs_number = document.getElementById('dbs_number');
        const leave_date = document.getElementById('leave_date');
        const email = document.getElementById('email');
        const mobile = document.getElementById('mobile');
        if (action === 'add') {
            modalTitle.textContent = 'Add Staff Worker';
        } else if (action === 'edit') {
            modalTitle.textContent = 'Edit Staff Worker';
            const staffData = JSON.parse(this.getAttribute('data-staff'));
            staffId.value = staffData.id || '';
            surname.value = staffData.surname || '';
            forename.value = staffData.forename || '';
            address.value = staffData.address || '';
            postcode.value = staffData.postCode || '';
            dob = staffData.DOB || '';
            if (dob) {
                // Convert from Y-m-d to d-m-Y
                const dateParts = dob.split('-'); // [2025, 04, 24]
                const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`; // 24-04-2025
        
                $('#DOB').datepicker('setDate', formattedDate);
            }
            account_num.value = staffData.account_num || '';
            sort_code.value = staffData.sort_code || '';
            status.value = staffData.status || '';
            rate_of_pay.value = staffData.rate_of_pay || '';
            level.value = staffData.level || '';
            start_Date = staffData.start_date || '';
            if (start_Date) {
                // Convert from Y-m-d to d-m-Y
                const datePartsStartDate = start_Date.split('-'); // [2025, 04, 24]
                const formattedStartDate = `${datePartsStartDate[2]}-${datePartsStartDate[1]}-${datePartsStartDate[0]}`; // 24-04-2025
        
                $('#start_Date').datepicker('setDate', formattedStartDate);
            }
            job_role.value = staffData.job_role || '';
            NIN.value = staffData.NIN || '';
            starter_declaration.value = staffData.starter_declaration || '';
            probation_start_date = staffData.probation_start_date || '';
            if (probation_start_date) {
                // Convert from Y-m-d to d-m-Y
                const datePartsProStart = probation_start_date.split('-'); // [2025, 04, 24]
                const formattedDateProStart = `${datePartsProStart[2]}-${datePartsProStart[1]}-${datePartsProStart[0]}`; // 24-04-2025
        
                $('#probation_start_date').datepicker('setDate', formattedDateProStart);
            }
            probation_end_date = staffData.probation_end_date || '';
            if (probation_end_date) {
                // Convert from Y-m-d to d-m-Y
                const datePartsProEnd = probation_end_date.split('-'); // [2025, 04, 24]
                const formattedDateProEnd = `${datePartsProEnd[2]}-${datePartsProEnd[1]}-${datePartsProEnd[0]}`; // 24-04-2025
        
                $('#probation_end_date').datepicker('setDate', formattedDateProEnd);
            }
            probation_renew_date = staffData.probation_renew_date || '';
            if (probation_renew_date) {
                // Convert from Y-m-d to d-m-Y
                const datePartsRenew = probation_renew_date.split('-'); // [2025, 04, 24]
                const formattedDatePro = `${datePartsRenew[2]}-${datePartsRenew[1]}-${datePartsRenew[0]}`; // 24-04-2025
        
                $('#probation_renew_date').datepicker('setDate', formattedDatePro);
            }
            probation_enrollered_yes.checked = staffData.probation_enrollered == 1;
            probation_enrollered_no.checked = staffData.probation_enrollered == 0;
            student_loan.value = staffData.student_loan || '';
            dbs_clear_yes.checked = staffData.dbs_clear == '1';
            dbs_clear_no.checked = staffData.dbs_clear === '0';
            dbs_number.value = staffData.dbs_number || '';
            leave_date.value = staffData.leave_date || '';
            email.value = staffData.email || '';
            mobile.value = staffData.mobile || '';
        }
        $('#addStaffWorkerModal').modal('show');
    });
});  

function deleteStaff(id) {
    if (confirm('Are you sure you want to delete this staff?')) {
        $.ajax({
            url: deleteStaffWorker +"/"+ id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('Deleted successfully');
                location.reload(); // or remove the row from DOM
            },
            error: function(err) {
                alert('Something went wrong!');
            }
        });
    }
}
