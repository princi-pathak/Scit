$(document).ready(function() {
    
});
function save_expend_card(){
    $.ajax({
        type: "POST",
        url: saveUrl,
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