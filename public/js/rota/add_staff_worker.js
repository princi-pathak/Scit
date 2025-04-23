// File: /c:/xampp/htdocs/socialcareitsolutions/public/js/rota/add_staff_worker.js

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('addStaffWorkerForm');
    const saveButton = document.getElementById('saveSatffWorkerModel'); // Make sure this ID is correct

    if (form && saveButton) {
        alert('Form and Save button found!'); // Debugging line

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


document.querySelectorAll('.openAddStaffModel').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const action = this.getAttribute('data-action');
        const modalTitle = document.getElementById('modalTitle');
        if (action === 'add') {
            modalTitle.textContent = 'Add Staff Worker';
        } else if (action === 'edit') {
            modalTitle.textContent = 'Edit Staff Worker';
            // const staffId = this.getAttribute('data-id');
        }
        $('#addStaffWorkerModal').modal('show');
    });
});  