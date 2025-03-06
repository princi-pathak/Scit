$(document).ready(function() {
    getRegions(document.getElementById('invoiceRegions'));
    getTags(document.getElementById('invoice_tags'))
});
function getTags(tags) {
    $.ajax({
        url: tagURL,
        method: 'GET',
        success: function(response) {
            console.log("jxcnjfjnfnk", response.data);
            tags.innerHTML = '';
            response.data.forEach(user => {
                const option = document.createElement('option');
                option.value = user.id;
                option.text = user.title;
                tags.appendChild(option);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}