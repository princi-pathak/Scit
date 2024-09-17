
// notification Div hide show on radio button for calls js start
const notify_radio1 = document.getElementById('notify_radio1');
const notify_radio2 = document.getElementById('notify_radio2');
const notification_div = document.getElementsByClassName('notification_div')[0];

// Initially hide the notification_div
notification_div.style.display = 'none';

notify_radio1.addEventListener('change', function () {
    if (notify_radio1.checked) {
        notification_div.style.display = 'none';
    }
});

notify_radio2.addEventListener('change', function () {
    if (notify_radio2.checked) {
        notification_div.style.display = 'block';
    }
});
// notification Div hide show on radio button for calls js End



// notification Div hide show on radio button for emails js start
const notify_email1 = document.getElementById('notify_email1');
const notify_email2 = document.getElementById('notify_email2');
const notification_email_div = document.getElementById('notification_email_div');

// Initially hide the notification_div
notification_email_div.style.display = 'none';

notify_email1.addEventListener('change', function () {
    if (notify_email1.checked) {
        notification_email_div.style.display = 'none';
    }
});

notify_email2.addEventListener('change', function () {
    if (notify_email2.checked) {
        notification_email_div.style.display = 'block';
    }
});
// notification Div hide show on radio button for emails js End


// notification Div hide show on radio button for notes js start
const notify_notes1 = document.getElementById('notify_notes1');
const notify_notes2 = document.getElementById('notify_notes2');
const notification_notes_div = document.getElementById('notification_notes_div');

// Initially hide the notification_div
notification_notes_div.style.display = 'none';

notify_notes1.addEventListener('change', function () {
    if (notify_notes1.checked) {
        notification_notes_div.style.display = 'none';
    }
});

notify_notes2.addEventListener('change', function () {
    if (notify_notes2.checked) {
        notification_notes_div.style.display = 'block';
    }
});
// notification Div hide show on radio button for notes js End


// notification Div hide show on radio button for emails js start
const notify_complaint1 = document.getElementById('notify_complaint1');
const notify_complaint2 = document.getElementById('notify_complaint2');
const notification_complaint_div = document.getElementById('notification_complaint_div');

// Initially hide the notification_div
notification_complaint_div.style.display = 'none';

notify_complaint1.addEventListener('change', function () {
    if (notify_complaint1.checked) {
        notification_complaint_div.style.display = 'none';
    }
});

notify_complaint2.addEventListener('change', function () {
    if (notify_complaint2.checked) {
        notification_complaint_div.style.display = 'block';
    }
});


$(document).ready(function () {
    document.getElementById('weekly').style.display = 'none';
    document.getElementById('monthly').style.display = 'none';
    document.getElementById('task_end_date').style.display = 'none';

    $('#isRecurring').on('change', function () {
        if ($(this).is(':checked')) {
            $('#recurrence_div').show();
        } else {
            $('#recurrence_div').hide();
        }
    });

    $('input[name="task_end_repe_date"]').on('change', function () {

        // Hide both divs initially
        $('#repetitation').hide();
        $('#task_end_date').hide();

        var value = $(this).val();
        // Show the appropriate div based on the selected radio button
        if (value === '1') {
            $('#repetitation').show();
        } else if (value === '2') {
            $('#task_end_date').show();
        }
    });

    document.getElementById('task_frequency').addEventListener('change', function () {
        document.getElementById('daily').style.display = 'none';
        document.getElementById('weekly').style.display = 'none';
        document.getElementById('monthly').style.display = 'none';

        var selectedValue = this.value;
        // Show the appropriate div based on the selected option
        if (selectedValue == 1) {
            document.getElementById('daily').style.display = 'block';
        } else if (selectedValue == 2) {
            document.getElementById('weekly').style.display = 'block';
        } else if (selectedValue == 3) {
            document.getElementById('monthly').style.display = 'block';
        }
    });


});


