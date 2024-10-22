<style>
    .prductimghidemessage{display:none}
    .prductimghidemessagedanger{display:none}    
</style>

<div class="modal fade" id="uploadproductimagemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="uploadproductimagemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
    <div class="modal-content add_Customer">
        <div class="modal-header">
        <h5 class="modal-title fs-5" id="uploadproductimagemodalLabel">Add Image <span class="catname"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
            <div class="modal-body "> 
                <form class="row g-3 needs-validationi" novalidate id="productimage_form">
                    @csrf
                    <div class="alert alert-success text-center prductimgsuccess prductimghidemessage"></div>                              
                    <div class="alert alert-danger text-center prductimgsuccessdanger prductimghidemessagedanger"></div>                                 
                <div class="contantbodypopup p-0">                                                                                                
                    <div class="mb-2 row">
                        <label for="taxratename"
                            class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                           <span class="imgproname"></span>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputCity"
                            class="col-sm-3 col-form-label">File Name</label>
                        <div class="col-sm-9">
                            <input type="file"
                                class="form-control editInput"
                                id="tax_rate" name="imagename" value="" required>
                        </div>
                    </div>
                </div>                                        
            </div> <!-- end modal body -->
            <div class="modal-footer customer_Form_Popup">
                <input type="hidden" name="productID" id="imgproduct_id" value="">
                <button type="button" class="btn profileDrop" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn profileDrop" id="saveproductimage">Save</button>
            </form>                              
            </div>
        
    </div>
    </div>
</div>
<script>
    (function () {
'use strict';

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validationi');

// Loop over them and prevent submission
Array.prototype.slice.call(forms)
    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            // Check if the form is valid
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                // Prevent the default form submission
                event.preventDefault();
                var imgproduct_id = $('#imgproduct_id').val();
                //alert(imgproduct_id)
                // Here you can handle form submission using AJAX
                var formData = new FormData(form);
                fetch('{{ route("item.saveproductimages") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                   console.log(data);
                   //taxsuccess taxhidemessage   taxsuccessdanger taxhidemessagedanger
                   if(data.success==0){
                    $('.prductimghidemessagedanger').css('display','block');
                    $('.prductimgsuccessdanger').text(data.message);
                    $(".prductimgsuccessdanger").show('slow' , 'linear').delay(3000).fadeOut();
                   }else{
                    $('.prductimghidemessage').css('display','block');
                    $('.prductimgsuccess').text(data.message);
                    $(".prductimgsuccess").show('slow' , 'linear').delay(3000).fadeOut(function(){
                        
                        $('#uploadproductimagemodal').modal('hide');
                        getallproductimages(imgproduct_id)
                        
                    });
                   }
                    // Show success message
                    //alert('Form submitted successfully!'); // Replace with your own success message display logic
                })
                .catch(error => {
                    // Handle error
                    //console.error('Error:', error);
                    //alert('There was an error submitting the form.');
                    $('.productsuccessdanger').text('There was an error submitting the form.');
                });
            }

            form.classList.add('was-validated');
        }, false);
    });
})();
</script>