// File: /c:/xampp/htdocs/socialcareitsolutions/public/js/rota/add_staff_worker.js

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('addStaffWorkerForm');
    const saveButton = document.getElementById('saveSatffWorkerModel'); // Make sure this ID is correct

    if (form && saveButton) {
        // alert('Form and Save button found!'); // Debugging line

        saveButton.addEventListener('click', async function (e) {
            e.preventDefault(); // Prevent the default button action
            const formData = new FormData(form);
            console.log('Form data:', formData); // Debugging line

            try {
                form.action = addStaffWorker; // Make sure `addStaffWorker` is a defined URL
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json' // Important to get proper JSON from Laravel
                    },
                });

                if (response.status === 422) {
                    const errorData = await response.json();
                    const errors = errorData.errors;
                    const errorMessages = Object.values(errors).map(arr => arr.join(', ')).join('\n');
                    alert("Validation errors:\n" + errorMessages);
                    return; // Stop further execution
                }

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();

                if (data.success || data.status === 'success') {
                    alert('Staff worker added successfully!');
                    location.reload(); // Reload the page to see the new staff worker
                    form.reset(); // Reset the form
                } else {
                    alert('Error: ' + (data.message || 'Something went wrong.'));
                }

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
                alert('An error occurred. Please try again.');
            }
        });
    }
});



$('.calenderDiv').datepicker({
    dateFormat: 'dd-mm-yy', // sets the display format
    onSelect: function(dateText, inst) {
        console.log("Formatted Date: ", dateText); // already in d-m-Y format
    }
});

document.querySelectorAll('.openAddStaffModel').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const action = this.getAttribute('data-action');
        const modalTitle = document.getElementById('modalTitle');
        const staffId = document.getElementById('staff_id');
        const surname = document.getElementById('surname');
        const forename = document.getElementById('forename');
        const address = document.getElementById('address');
        const postcode = document.getElementById('postCode');
        const dob = document.getElementById('DOB');
        const account_num = document.getElementById('account_num');
        const sort_code = document.getElementById('sort_code');
        const status = document.getElementById('status');
        const rate_of_pay = document.getElementById('rate_of_pay');
        const level = document.getElementById('level');
        const start_Date = document.getElementById('start_Date');
        const job_role = document.getElementById('job_role');
        const NIN = document.getElementById('NIN');
        const starter_declaration = document.getElementById('starter_declaration');
        const probation_start_date = document.getElementById('probation_start_date');
        const probation_end_date = document.getElementById('probation_end_date');
        const probation_renew_date = document.getElementById('probation_renew_date'); 
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
            dob.value = staffData.dob || '';
            account_num.value = staffData.account_num || '';
            sort_code.value = staffData.sort_code || '';
            status.value = staffData.status || '';
            rate_of_pay.value = staffData.rate_of_pay || '';
            level.value = staffData.level || '';
            start_Date.value = staffData.start_Date || '';
            job_role.value = staffData.job_role || '';
            NIN.value = staffData.NIN || '';
            starter_declaration.value = staffData.starter_declaration || '';
            probation_start_date.value = staffData.probation_start_date || '';
            probation_end_date.value = staffData.probation_end_date || '';
            probation_renew_date.value = staffData.probation_renew_date || '';
            probation_enrollered_yes.checked = staffData.probation_enrollered === 1;
            probation_enrollered_no.checked = staffData.probation_enrollered === 0;
            student_loan.value = staffData.student_loan || '';
            dbs_clear_yes.checked = staffData.dbs_clear === 'yes';
            dbs_clear_no.checked = staffData.dbs_clear === 'no';
            dbs_number.value = staffData.dbs_number || '';
            leave_date.value = staffData.leave_date || '';
            email.value = staffData.email || '';
            mobile.value = staffData.mobile || '';
        }
        $('#addStaffWorkerModal').modal('show');
    });
});  