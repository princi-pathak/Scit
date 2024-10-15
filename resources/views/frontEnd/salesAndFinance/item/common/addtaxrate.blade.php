<style>
    .taxratepopup {       
        top: 22%;
        width: 200px
    }
    .taxhidemessage{display:none}
    .taxhidemessagedanger{display:none}
    .addTaxRatePopup{
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 99999;
        transition: opacity 0.3s ease;
    }
</style>
<div id="taxratepopup" class="addTaxRatePopup">
    <div class="popup-content taxratepopup">
        <div class="popupTitle">
            <span class="">Add Tax Rate</span>
            <span class="close closetaxratepopup" id="closetaxratepopup">&times;</span>
        </div>
        <div class="contantbodypopup">
            <form action="" class="row g-3 needs-validations customerForm" novalidate>
                @csrf
                <div class="alert alert-success text-center taxsuccess taxhidemessage"></div>                              
                <div class="alert alert-danger text-center taxsuccessdanger taxhidemessagedanger"></div>  
                <div class="mb-2 row">
                    <label for="taxratename"
                        class="col-sm-3 col-form-label">Tax
                        Rate Name*</label>
                    <div class="col-sm-9">
                        <input type="text"
                            class="form-control editInput"
                            id="taxratename" name="taxratename" value="" required>
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="inputCity"
                        class="col-sm-3 col-form-label">Tax
                        Rate*</label>
                    <div class="col-sm-9">
                        <input type="text"
                            class="form-control editInput"
                            id="tax_rate" name="tax_rate" value="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="tax_rate_status"
                        class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select
                            class="form-control editInput selectOptions"
                            id="tax_rate_status" name="tax_rate_status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="tax_code"
                        class="col-sm-3 col-form-label">External
                        Tax Code</label>
                    <div class="col-sm-9">
                        <input type="text"
                            class="form-control editInput"
                            id="tax_code" name="tax_code" value="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="tax_exp_date"
                        class="col-sm-3 col-form-label">Expiry
                        Date</label>
                    <div class="col-sm-7">
                        <input type="date"
                            class="form-control editInput"
                            id="tax_exp_date" name="tax_exp_date" value="">
                    </div>
                </div>
            
        </div>

        <div class="popupF  customer_Form_Popup">
            <input type="hidden" name="taxrateID" id="taxrateID">
            <input type="hidden" name="taxratetype" id="taxratetype">

            <button type="submit"
                class="profileDrop" id="taxratesave">Save</button>
            {{-- <button type="button" class="profileDrop">Save &
                Close</button> --}}
            <button type="button"
                class="profileDrop closetaxratepopup">Cancel</button>

        </div>
        </form>
    </div>

</div>
<script>
    function taxrate(th) {
        $('#taxratetype').val(th);
        $('#taxratepopup').css('display','block');
    }

    $(".closetaxratepopup").click(function(){
        //alert()
        $('#taxratepopup').css('display','none');
    })
</script>
<script>
    (function () {
'use strict';

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validations');

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

                // Here you can handle form submission using AJAX
                var formData = new FormData(form);
                var taxratetype = $('#taxratetype').val();
                var taxratename = $('#taxratename').val();
                fetch('{{ route("item.saveTaxrateData") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                   console.log(data);
                   //taxsuccess taxhidemessage   taxsuccessdanger taxhidemessagedanger
                   if(data.success==0){
                    $('.taxhidemessagedanger').css('display','block');
                    $('.taxsuccessdanger').text(data.message);
                    $(".taxsuccessdanger").show('slow' , 'linear').delay(3000).fadeOut();
                   }else{
                    $('.taxhidemessage').css('display','block');
                    $('.taxsuccess').text(data.message);
                    $(".taxsuccess").show('slow' , 'linear').delay(3000).fadeOut(function(){
                        if(taxratetype==1){
                            $('#salestax').append($('<option>', {
                                value: data.lastid,
                                text: taxratename
                            }));
                            $('#salestax').val(data.lastid);
                            $('#taxratepopup').css('display','none');
                        }else if(taxratetype==2){                                                       
                            $('#purchasetax').append($('<option>', {
                                value: data.lastid,
                                text: taxratename
                            }));
                            $('#purchasetax').val(data.lastid);
                            $('#taxratepopup').css('display','none');                            
                        }
                        
                    });
                   }
                    // Show success message
                    //alert('Form submitted successfully!'); // Replace with your own success message display logic
                })
                .catch(error => {
                    // Handle error
                    //console.error('Error:', error);
                    //alert('There was an error submitting the form.');
                    $('.taxsuccessdanger').text('There was an error submitting the form.');
                });
            }

            form.classList.add('was-validated');
        }, false);
    });
})();
</script>