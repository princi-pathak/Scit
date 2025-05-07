$(document).ready(function() {
    const table = $('#expend_cash_table').DataTable({
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'csv',
                text: 'Export',
                bom: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                }
            }
        ],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
    
            // Helper to parse numbers safely
            var intVal = function (i) {
                return typeof i === 'string'
                    ? parseFloat(i.replace(/[£,]/g, '')) || 0
                    : typeof i === 'number'
                    ? i
                    : 0;
            };
    
            // Columns to total: netAmount (3), vatAmount (4), grossAmount (5), finalAmount (7), reclaim (8), notReclaim (9), expenseAmount (11)
            var columnsToTotal = [3, 4, 5, 7, 8, 9, 11];
    
            columnsToTotal.forEach(function (colIdx) {
                var total = api
                    .column(colIdx, { page: 'current' }) // only current page; remove this if you want all pages
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
    
                $(api.column(colIdx).footer()).html('£' + total.toFixed(2));
            });
        }
    });
});
function save_expend_card(){
    var error=0;
    $(".checkInput").each(function(){
        if($(this).val() == '' || $(this).val() == null){
            $(this).css('border','1px solid red');
            error=1;
            return false;
        }else{
            $(this).css('border','');
        }
    });
    var id=$("#id").val();
    var url=saveUrl;
    if(id != ''){
        url=editUrl;
    }
    if(error == 1){
        return false;
    }else{
        $.ajax({
            type: "POST",
            url: url,
            data: new FormData($("#expend_cardForm")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                console.log(response);
                // return false;
                if (response.vali_error) {
                    alert(response.vali_error);
                    $(window).scrollTop(0);
                    return false;
                } else if (response.success === true) {
                    $(window).scrollTop(0);
                    $('#message_save').addClass('success-message').text(response.message).show();
                    setTimeout(function() {
                        $('#message_save').removeClass('success-message').text('').hide();
                        location.href = redirectUrl
                    }, 3000);
                } else if (response.success === false) {
                    $('#message_save').addClass('error-message').text(response.message).show();
                    setTimeout(function() {
                        $('#error-message').text('').fadeOut();
                    }, 3000);
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                alert('Error - ' + errorMessage + "\nMessage: " + error);
            }
        });
    }
}
$("#fromDate").change(function() {
    var startDate = document.getElementById("fromDate").value;
    var endDate = document.getElementById("ToDate").value;

    if ((Date.parse(endDate) <= Date.parse(startDate))) {
        alert("Start date should be less than End date");
        document.getElementById("fromDate").value = "";
        return false;
    }
});
$("#ToDate").change(function() {
    var startDateStr = document.getElementById("fromDate").value;
    var endDateStr = document.getElementById("ToDate").value;
    var startDate = parseDateDMY(startDateStr);
    var endDate = parseDateDMY(endDateStr);

    if ((Date.parse(startDate) > Date.parse(endDate))) {
        alert("End date should be greater than Start date");
        document.getElementById("ToDate").value = "";
        return false;
    }
    $.ajax({
        type: "POST",
        url: filterUrl,
        data: {startDate:startDateStr,endDate:endDateStr,_token:token},
        success: function(response) {
            console.log(response);
            // return false;
            if (response.success === true) {
                if(response.data.length == 0){
                    $("#expend_result").html('<tr><td colspan="10" class="text-danger text-center">Record Not Found</td></tr>');
                }else{
                    $("#expend_result").html(response.html_data);
                }
                $("#balanceOnCard").text('£'+response.balanceOnCard);
                $("#sumPurchaseCashIn").text('£'+response.sumPurchaseCashIn);
                $("#totalBalanceFund").text('£'+response.totalBalanceFund);
                $("#totalBalancebfwd").text('£'+response.totalBalancebfwd);
                
            }
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            alert('Error - ' + errorMessage + "\nMessage: " + error);
        }
    });
});
function parseDateDMY(dateStr) {
    var parts = dateStr.split("-");
    return new Date(parts[2], parts[1] - 1, parts[0]);
}
function check_file() {
    const fileInput = document.getElementById('receipt');
    const filePath = fileInput.value;

    const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert('Only image files are allowed (JPG, JPEG, PNG).');
        fileInput.value = '';
        return false;
    }

    const file = fileInput.files[0];
    const maxSizeInMB = 2;
    const fileSize = file.size / 1024 / 1024;

    if (fileSize > maxSizeInMB) {
        alert('File size must be less than 2 MB.');
        fileInput.value = '';
        return false;
    }

    return true;
}
$(document).on('input', '.numberInput', function () {
    let val = $(this).val().replace(/[^0-9.]/g, '');
    if ((val.match(/\./g) || []).length > 1) {
        val = val.slice(0, -1);
    }
    $(this).val(val);
});