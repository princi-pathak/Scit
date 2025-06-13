$(document).ready(function () {
    loadTimeSheetTable(); // Loads all data

    $('#timeSheetDt').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true, // Optional: close picker after selection
        todayHighlight: true // Optional: highlight today's date
    });
    $('#timeSheetDt').on('change', function () {
        $('#timeSheetDt').datepicker('hide');
    });


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
            {
                data: 'hours',
                render: function (data, type, row) {
                    return (parseFloat(data) % 1 === 0) ? parseInt(data) : parseFloat(data);
                }
            },
            {
                data: 'sleep',
                render: function (data, type, row) {
                    return (parseFloat(data) % 1 === 0) ? parseInt(data) : parseFloat(data);
                }
            },
            {
                data: 'wake_night',
                render: function (data, type, row) {
                    return (parseFloat(data) % 1 === 0) ? parseInt(data) : parseFloat(data);
                }
            },
            {
                data: 'disturbance',
                render: function (data, type, row) {
                    return (parseFloat(data) % 1 === 0) ? parseInt(data) : parseFloat(data);
                }
            },
            {
                data: 'annual_leave',
                render: function (data, type, row) {
                    return (parseFloat(data) % 1 === 0) ? parseInt(data) : parseFloat(data);
                }
            },
            {
                data: 'on_call',
                render: function (data, type, row) {
                    return (parseFloat(data) % 1 === 0) ? parseInt(data) : parseFloat(data);
                }
            },
            { data: 'comments' },
            {
                data: null,
                render: function (data, type, row) {
                    return `
                        <a href="#!" class="openTimeSheetModel"
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


$('#getDataOnUsers').on('change', function () {
    const selectedUserId = $(this).val(); // gets '' if none selected
    loadTimeSheetTable(selectedUserId);
});





$(document).ready(function () {
    $('#save_time_sheet').on('click', function (e) {
        e.preventDefault(); // prevent form from submitting normally

        const formArray = $('#time_sheet').serializeArray();
        const formData = {};
        formArray.forEach(item => {
            formData[item.name] = item.value;
        });
        console.log("formData", formData);
        $.ajax({
            url: timeSheetSaveUrl, // Replace with your actual backend endpoint
            method: 'POST',
            data: JSON.stringify(formData),
            contentType: 'application/json',
            success: function (response) {
                console.log("response", response.message);

                $('#addTimeSheetModal').modal('hide');
                $('#time_sheet')[0].reset();
                alert(response.message);
                location.reload();
            },
            error: function (xhr, status, error) {
                alert('Error saving data: ' + error);
            }
        });
    });
});

$(document).on('click', '.openTimeSheetModel', function () {
    const action = $(this).data('action');

    if (action === 'add') {
        $('#modalTitle').text('Add Time Sheet');
        $('#time_sheet')[0].reset();
    } else if (action === 'edit') {
        $('#modalTitle').text('Edit Time Sheet');
        $('#time_sheet_id').val($(this).data('id'));
        $('#user_id').val($(this).data('user_id'));
        const date = $(this).data('date');
        // $('#timeSheetDt').val($(this).data('date'));
        if (date) {
                // Convert from Y-m-d to d-m-Y
                const dateParts = date.split('-'); // [2025, 04, 24]
                const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`; // 24-04-2025

                $('#timeSheetDt').datepicker('setDate', formattedDate);
            }
        $('#hours').val($(this).data('hours'));
        $('#sleep').val($(this).data('sleep'));
        $('#wake_night').val($(this).data('wake_night'));
        $('#disturbance').val($(this).data('disturbance'));
        $('#annual_leave').val($(this).data('annual_leave'));
        $('#on_call').val($(this).data('on_call'));
        $('#comments').val($(this).data('comments'));
    }

    $('#addTimeSheetModal').modal('show');
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