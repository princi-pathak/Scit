$('#timeSheetDate').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true, // Optional: close picker after selection
    todayHighlight: true // Optional: highlight today's date
});
$('#timeSheetDate').on('change', function () {
    $('#timeSheetDate').datepicker('hide');
});

//detail option
// $(document).on('click', '.my-task-detail', function () {
//     $(this).closest('.cog-panel').find('.input-plusbox').toggle();
//     $(this).closest('.pop-notifbox').removeClass('active');
//     autosize($("textarea"));
//     return false;
// });

$(document).ready(function () {
    $('#save_time_sheet').on('click', function (e) {
        e.preventDefault(); // prevent form from submitting normally

        const formArray = $('#time_sheet').serializeArray();
        const formData = {};
        formArray.forEach(item => {
            formData[item.name] = item.value;
        });

        $.ajax({
            url: timeSheetSaveUrl, // Replace with your actual backend endpoint
            method: 'POST',
            data: JSON.stringify(formData),
            contentType: 'application/json',
            success: function (response) {
                console.log("response", response.message);

                // $('#timeSheetModal').modal('hide');
                $('#time_sheet')[0].reset();
                alert(response.message);
            },
            error: function (xhr, status, error) {
                alert('Error saving data: ' + error);
            }
        });
    });
});

document.querySelectorAll('.openTimeSheetModel').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const action = this.getAttribute('data-action');
        const user_id = document.getElementById('user_id');
        // const timeSheetDate = document.getElementById('timeSheetDate');
        const hours = document.getElementById('hours');
        const sleep = document.getElementById('sleep');
        const wake_night = document.getElementById('wake_night');
        const disturbance = document.getElementById('disturbance');
        const annual_leave = document.getElementById('annual_leave');
        const on_call = document.getElementById('on_call');
        const comments = document.getElementById('comments');
        if (action === 'add') {
            modalTitle.textContent = 'Add Time Sheet';
        } else if (action === 'edit') {
            modalTitle.textContent = 'Edit Time Sheet';
            user_id.value = this.getAttribute('data-user_id');
            // const timeSheetDate = this.getAttribute('data-date');
            //     if (timeSheetDate) {
            //     // Convert from Y-m-d to d-m-Y
            //     const dateParts = timeSheetDate.split('-'); // [2025, 04, 24]
            //     const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`; // 24-04-2025

            //     $('#timeSheetDate').datepicker('setDate', formattedDate);
            // }

            // timeSheetDate.value = ;
            hours.value = this.getAttribute('data-hours');
            sleep.value = this.getAttribute('data-sleep');
            wake_night.value = this.getAttribute('data-wake_night');
            disturbance.value = this.getAttribute('data-disturbance');
            annual_leave.value = this.getAttribute('data-annual_leave');
            on_call.value = this.getAttribute('data-on_call');
            comments.value = this.getAttribute('data-comments');
          }
        $('#addStaffWorkerModal').modal('show');
    });
});

function deleteStaff(id) {
    if (confirm('Are you sure you want to delete this staff?')) {
        $.ajax({
            url: deleteTimeSheet + "/" + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert(response.message);
                location.reload(); // or remove the row from DOM
            },
            error: function (err) {
                alert(response.message);
            }
        });
    }
}