// $(document).ready(function () {
//     const table = $('#timeSheetTable').DataTable({
//         ajax: {
//             url: getData, // Laravel route
//             type: 'POST',  
//             dataSrc: '', // Because the response is a plain array
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         },
//         columns: [
//             {
//                 data: null,
//                 render: function (data, type, row, meta) {
//                     return meta.row + 1;
//                 }
//             },
//             { data: 'user.name', defaultContent: '' },
//             { data: 'date' },
//             { data: 'hours' },
//             { data: 'sleep' },
//             { data: 'wake_night' },
//             { data: 'disturbance' },
//             { data: 'annual_leave' },
//             { data: 'on_call' },
//             { data: 'comments' },
//             {
//                 data: null,
//                 render: function (data, type, row) {
//                     return `
//                         <a href="#!" class="openModalBtn openTimeSheetModel"
//                             data-action="edit"
//                             data-id="${row.id}"
//                             data-user_id="${row.user_id}"
//                             data-name="${row.user?.name || ''}"
//                             data-date="${row.date}"
//                             data-hours="${row.hours}"
//                             data-sleep="${row.sleep}"
//                             data-wake_night="${row.wake_night}"
//                             data-disturbance="${row.disturbance}"
//                             data-annual_leave="${row.annual_leave}"
//                             data-on_call="${row.on_call}"
//                             data-comments="${row.comments}">
//                             <i class="fa fa-pencil" aria-hidden="true"></i>
//                         </a> |
//                         <a href="#!" onclick="deleteStaff(${row.id})" class="deleteBtn">
//                             <i class="fa fa-trash radStar" aria-hidden="true"></i>
//                         </a>
//                     `;
//                 }
//             }
//         ]
//     });
// });


$(document).ready(function () {
    loadTimeSheetTable(); // Loads all data
});



let timeSheetTable;

function loadTimeSheetTable(userId = '') {
    // Destroy existing table if already initialized
    if ($.fn.DataTable.isDataTable('#timeSheetTable')) {
        timeSheetTable.destroy();
        $('#timeSheetTable').empty(); // remove old header/footer
        $('#timeSheetTable').html(`
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Hours</th>
                    <th>Sleep</th>
                    <th>Wake Night</th>
                    <th>Disturbance</th>
                    <th>Annual Leave</th>
                    <th>On Call</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </tr>
            </thead>
        `);
    }

    timeSheetTable = $('#timeSheetTable').DataTable({
        ajax: {
            url: getData, // Laravel route
            type: 'POST',
            data: {
                user_id: userId
            },
            dataSrc: '',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: 'user.name', defaultContent: '' },
            { data: 'date' },
            { data: 'hours' },
            { data: 'sleep' },
            { data: 'wake_night' },
            { data: 'disturbance' },
            { data: 'annual_leave' },
            { data: 'on_call' },
            { data: 'comments' },
            {
                data: null,
                render: function (data, type, row) {
                    return `
                        <a href="#!" class="openModalBtn openTimeSheetModel"
                            data-action="edit"
                            data-id="${row.id}"
                            data-user_id="${row.user_id}"
                            data-name="${row.user?.name || ''}"
                            data-date="${row.date}"
                            data-hours="${row.hours}"

                            data-sleep="${row.sleep}"
                            data-wake_night="${row.wake_night}"
                            data-disturbance="${row.disturbance}"
                            data-annual_leave="${row.annual_leave}"
                            data-on_call="${row.on_call}"
                            data-comments="${row.comments}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a> |
                        <a href="#!" onclick="deleteStaff(${row.id})" class="deleteBtn">
                            <i class="fa fa-trash radStar" aria-hidden="true"></i>
                        </a>
                    `;
                }
            }
        ]
    });
}


$('#getDataOnTax').on('change', function () {
    const selectedUserId = $(this).val(); // gets '' if none selected
    loadTimeSheetTable(selectedUserId);
});



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
        var time_sheetId=$("#time_sheetId").val();
        var url=timeSheetSaveUrl;
        if(time_sheetId == ''){
            url=timeSheetEditUrl;
        }
        $.ajax({
            url: url, // Replace with your actual backend endpoint
            method: 'POST',
            data: JSON.stringify(formData),
            contentType: 'application/json',
            success: function (response) {
                if (isAuthenticated(response) == false) {
                    return false;
                }
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
        alert(action);
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
                if (isAuthenticated(response) == false) {
                    return false;
                }
                alert(response.message);
                location.reload(); // or remove the row from DOM
            },
            error: function (err) {
                alert(response.message);
            }
        });
    }
}