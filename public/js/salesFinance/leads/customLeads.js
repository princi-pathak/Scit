
$(document).ready(function() {
    $('#save_lead_convert_quote').on('click', function() {

        let formData = $('#notify_lead_quote_form').serialize();
    
        $.ajax({
            url: saveLeadConvertQuote,
            method: 'POST',
            data: formData,
            // processData: false,  
            // contentType: false,  
            success: function(response) {
                alert(response.message);
                $('#sentToQuoteModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    
    });
});
