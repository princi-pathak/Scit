$(document).on('input', '.numberInput', function () {
    let val = $(this).val().replace(/[^0-9.]/g, '');
    if ((val.match(/\./g) || []).length > 1) {
        val = val.slice(0, -1);
    }
    $(this).val(val);
});

function calculate(){
    var cost_bfwd = parseFloat($("#cost_bfwd").val()) || 0;
    var cost_addition = parseFloat($("#cost_addition").val()) || 0;
    var cost_disposal = parseFloat($("#cost_disposal").val()) || 0;

    var depreciation_bfwd = parseFloat($("#depreciation_bfwd").val()) || 0;
    var depreciation = parseFloat($("#depreciation").val()) || 0;
    var depreciation_type = parseFloat($("#depreciation_type").val()) || 0;
    var selectedOption = $("#depreciation_type option:selected");
    var depreciation_type = selectedOption.data("attr") || 0;
    // alert(typeof(depreciation_type))

    var costCalculation=cost_bfwd+cost_addition+cost_disposal;
    var depreciationSum=depreciation_bfwd+depreciation;
    var percentage=depreciationSum*depreciation_type/100;
    var depreciationCalculation = depreciationSum+percentage;

    var nbv_cfwdCalculation=costCalculation - depreciationCalculation;
    var nbv_bfwdCalculation=cost_bfwd - depreciation_bfwd;

    $("#cost_fwd").val(costCalculation.toFixed(2));
    $("#charge").val(percentage.toFixed(2));
    $("#depreciation_cfwd").val(depreciationCalculation.toFixed(2));
    $("#nbv_cfwd").val(nbv_bfwdCalculation.toFixed(2));
    $("#nbv_bfwd").val(nbv_cfwdCalculation.toFixed(2));
}
function getSaveData(){
    var asset_name=$("#asset_name").val();
    var asset_type=$("#asset_type").val();
    var date=$("#date").val();
    if(asset_name == ''){
        $("#asset_name").css('border','1px solid red');
        return false;
    }else if(asset_type == ''){
        $("#asset_name").css('border','');
        $("#asset_type").css('border','1px solid red');
        return false;
    }else if(date == ''){
        $("#asset_name").css('border','');
        $("#asset_type").css('border','');
        $("#date").css('border','1px solid red');
        return false;
    }else{
        $("#asset_name").css('border','');
        $("#asset_type").css('border','');
        $("#date").css('border','');
        $.ajax({
            type: "POST",
            url: assetSaveUrl,
            data: new FormData($("#assetRegisterFormData")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
                success: function(response) {
                    console.log(response);
                    // return false;
                    if(response.vali_error){
                        alert(response.vali_error);
                        $(window).scrollTop(0);
                        return false;
                    }else if(response.success === true){
                        $(window).scrollTop(0);
                        $('#message_save').addClass('success-message').text(response.message).show();
                        setTimeout(function() {
                            $('#message_save').removeClass('success-message').text('').hide();
                            location.href=redirectUrl;
                        }, 3000);
                    }else if(response.success === false){
                        $('#message_save').addClass('error-message').text(response.message).show();
                        setTimeout(function() {
                            $('#error-message').text('').fadeOut();
                        }, 3000);
                    }else{
                        alert("Something went wrong");
                        return false;
                    }
                },
                error: function(xhr, status, error) {
                   var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + error);
                }
            });
    }
}