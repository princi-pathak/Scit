$(document).ready(function() {
    $("#saveCouncilTax").on("submit", function(e) {
        e.preventDefault(); // Prevent default form submission

        $.ajax({
            url: "/save-form", // Laravel route or API endpoint
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    alert("Data saved successfully!");
                    $("#myModal").modal("hide"); // Hide modal
                    $("#myForm")[0].reset(); // Reset form
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr) {
                alert("Something went wrong. Please try again.");
            }
        });
    });
});