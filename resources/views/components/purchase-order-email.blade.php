<style>
    .parent-container {
    position: absolute;
    background: #fff;
    width:71%;
    z-index:999;
}
#toList li:hover{
    cursor: pointer;
}
ul#toList {
    padding: 0 5px;
    height: 156px;
    overflow: auto;
}
span.optext {
    background-color: lightgray;
    padding: 1px 0.75em;
    margin-right: 0.5em;
    margin-bottom: 2px;
    border-radius: 4px;
    display: inline-block;
}
.emailSpan {
    margin-top:-30px;
    display: inline-block;
}
.dropdownMaltiSelect {
    position: relative;
}
.dropdownMaltiSelect #dropdownButton {
    text-align: left;
    position: relative;
    padding-right: 30px; 
    width: 100%;
}
.dropdownMaltiSelect .btn.active.focus, .dropdownMaltiSelect .btn.active:focus, .dropdownMaltiSelect .btn.focus, .dropdownMaltiSelect .btn:active.focus, .dropdownMaltiSelect .btn:active:focus, .dropdownMaltiSelect .btn:focus, .dropdownMaltiSelect label input.form-control {
    outline: none;
}
.dropdownMaltiSelect #dropdownButton::after {
    content: '';
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M7 10L12 15L17 10" stroke="%23ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>');
    background-size: 18px 18px;
    background-repeat: no-repeat;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 18px;
    height: 18px;
    transition: transform 0.2s ease;
}
.dropdownMaltiSelect #dropdownButton.active::after {
    transform: translateY(-50%) rotate(180deg);
}
.dropdownMaltiSelect .dropdown-menu {
    display: none;
    width:100%;
    position: absolute;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    padding: 0;
    max-height: 200px;
    overflow: auto;
    z-index: 1;
}
.dropdownMaltiSelect .dropdown-menu::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}
.dropdownMaltiSelect .dropdown-menu::-webkit-scrollbar-track {
    background: #f1f1f1;
}
.dropdownMaltiSelect .dropdown-menu::-webkit-scrollbar-thumb {
    background: #888;
}
.dropdownMaltiSelect .dropdown-menu::-webkit-scrollbar-thumb:hover {
    background: #555;
}
.dropdownMaltiSelect .dropdown-menu::-webkit-scrollbar-button {
    display: none;
}
.dropdownMaltiSelect .dropdown-menu label {
    display: block;
    padding: 5px 8px;
    cursor: pointer;
    margin: 0;
    user-select: none;
}
.dropdownMaltiSelect .dropdown-menu label:hover {
    background-color: #f1f0f0;
}
.dropdownMaltiSelect .dropdown-menu label.checked {
    background-color: #e0e0e0; /* Background color for checked items */
}
.dropdownMaltiSelect .dropdown-menu label input {
    margin-right: 10px;
}
.dropdownMaltiSelect .dropdown-menu label input.form-control{
display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #eee;
    border-radius: 4px;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
</style>
<div class="modal fade" id="{{ $emailModalId }}" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content add_Customer">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modalTitle }}"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="text-center mt-3" id="message_emailModal" style="display:none"></div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="formDtail">
                            <form id="{{ $emailformId }}" class="customerForm">
                                @csrf
                                <input type="hidden" name="id" id="{{ $emailId }}">
                                <input type="hidden" name="po_id" id="email_po_id">

                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-3 col-form-label">To<span class="radStar ">*</span></label>
                                    <div class="col-sm-9">
                                    <div class="dropdownMaltiSelect">
                                        <button type="button" id="dropdownButton" class="form-control editInput"></button>
                                        <div id="dropdownMenu" class="dropdown-menu">
                                            <label><input type="search" id="{{ $toField }}" class="form-control"></label>
                                            <!-- <div class="emailSpan">
                                            
                                            </div> -->
                                            <div class="parent-container to-container"></div>
                                        </div>
                                    </div>
                                        <input type="hidden" id="selectedToId" name="selectedToId">
                                        
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-3 col-form-label">Cc</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control editInput" id="{{ $ccField }}" name="vat_amount">
                                    </div>
                                </div>
                                
                                <div class="mb-2 row">
                                    <label for="inputProject" class="col-sm-3 col-form-label">Subject<span class="radStar ">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control editInput" id="{{ $subject }}" name="vat_amount">
                                    </div>
                                    <div class="col-sm-2">
                                        
                                        <select class="form-control editInput selectOptions" id="{{ $selectBoxsubject }}" name="vat_id">
                                            <option value="1">Default Purchase Order</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Body</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textareaInput CustomercheckError" id="{{ $body }}" name="notes" rows="10" maxlength="500">Hello,<br>Please find attached purchase order<br><br><br><br><br>Regards,<br>The Contructor<br><br>Thanks for using SCITS</textarea>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div> <!-- End row -->
            </div>
            <div class="modal-footer customer_Form_Popup">
                <button type="button" class="profileDrop" id="{{ $saveButtonId }}">Save</button>
                <button type="button" class="profileDrop" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js"></script>
<script>


        //Text Editer

var editor_config = {
  toolbar: [
      {name: 'basicstyles', items: ['Bold','Italic','Underline','Strike','-','RemoveFormat']},
      {name: 'format', items: ['Format']},
      {name: 'paragraph', items: ['Indent','Outdent','-','BulletedList','NumberedList']},
      {name: 'link', items: ['Link','Unlink']},
{name: 'undo', items: ['Undo','Redo']}
  ],
};

CKEDITOR.replace('{{ $body }}', editor_config );
// CKEDITOR.replace('customer_notes', editor_config );
// CKEDITOR.replace('internal_notes', editor_config );
//Text Editer
</script>
<script>
    
    $("#{{ $saveButtonId }}").on('click',function(){
        $.ajax({
            type: "POST",
            url: "{{url('purchaseOrderInviceRecieve')}}",
            data: new FormData($("#{{ $emailformId }}")[0]),
            async: false,
            contentType: false,
            cache: false,
            processData: false,
                success: function(response) {
                    // console.log(response);return false;
                    if(response.vali_error){
                        alert(response.vali_error);
                        $("#email").css('border','1px solid red');
                        $(window).scrollTop(0);
                        return false;
                    }else if(response.success === true){
                        $(window).scrollTop(0);
                        $('#message_invoiceModal').addClass('success-message').text(response.message).show();
                        setTimeout(function() {
                            $('#message_invoiceModal').removeClass('success-message').text('').hide();
                            getAllPurchaseInvices(response.data);
                        }, 3000);
                    }else{
                        // alert("Something went wrong");
                        $('#message_invoiceModal').addClass('error-message').text(response.message).show();
                        setTimeout(function() {
                            // $('#error-message').text('').fadeOut();
                            $('#message_invoiceModal').removeClass('error-message').text('').hide();
                        }, 3000);
                        return false;
                    }
                },
                error: function(xhr, status, error) {
                   var errorMessage = xhr.status + ': ' + xhr.statusText;
                    console.log('Error - ' + errorMessage + "\nMessage: " + error);
                }
            });
    });
</script>
<script>
    $(document).ready(function() {
        $('#{{ $toField }}').on('keyup click', function() {
            let to = $(this).val();
            const deptdivList = document.querySelector('.to-container');

            if (to === '') {
                deptdivList.innerHTML = '';
            }
            if (to.length > 2) {
                $.ajax({
                    url: "{{ url('search_email_list') }}",
                    method: 'post',
                    data: {
                        email: to,_token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // return false;
                        deptdivList.innerHTML = "";
                        const div = document.createElement('div');
                        div.className = 'to_container';

                      
                        const ul = document.createElement('ul');
                        ul.id = "toList";
                        if(response.all_emails.length >0){
                            response.all_emails.forEach(item => {
                                // console.log(item);return false;
                                const userType=item.userType;
                                
                                var userTypeText='';
                                if(userType == 1){
                                    userTypeText='Customer';
                                }else if(userType == 2){
                                    userTypeText='Supplier';
                                }else{
                                    userTypeText='User';
                                }
                                const li = document.createElement('li'); 
                                li.textContent = `${item.email || ''}${item.email && item.name ? '-' : ''}${item.name || ''} (${userTypeText})`;
                               
                                li.id = item.id;
                                li.name = item.email;
                                li.className = "editInput";
                                ul.appendChild(li); 
                                const hr = document.createElement('hr');
                                ul.appendChild(hr);
                            });

                            div.appendChild(ul);

                            deptdivList.appendChild(div);

                            ul.addEventListener('click', function(event) {
                                deptdivList.innerHTML = '';
                                document.getElementById('{{ $toField }}').value = '';
                                if (event.target.tagName.toLowerCase() === 'li') {
                                    const selectedToId = event.target.id;
                                    const selectedDeptName = '<span class="optext">'+event.target.name+'&emsp;<b class="removeSpan" onclick="removeSpan(this)">X</b></span>';
                                    
                                    $("#dropdownButton").append(selectedDeptName);
                                    $("#selectedToId").val(event.target.name);
                                }
                            });
                        }else{
                            const Errorli = document.createElement('li'); 
                            Errorli.textContent = 'Sorry Data Not found'; 
                            Errorli.id = 'searchError';
                            Errorli.className = "editInput";
                            ul.appendChild(Errorli); 
                            div.appendChild(ul);
                            deptdivList.appendChild(div);
                            setTimeout(function() {
                                deptdivList.innerHTML = '';
                            }, 1000);
                        }

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                deptdivList.innerHTML = '';
                $('#results').empty();
            }
        });
    });
    function removeSpan(button){
        var row = button.parentNode;
        console.log(row);
        row.parentNode.removeChild(row);
    };
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const dropdownButton = document.getElementById("dropdownButton");
    const dropdownMenu = document.getElementById("dropdownMenu");
    const selectAllCheckbox = document.getElementById("selectAll");
    const optionCheckboxes = document.querySelectorAll(".option");

    dropdownButton.addEventListener("click", function() {
        dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
        dropdownButton.classList.toggle("active");
        $("#toList").show();
    });

    document.addEventListener("click", function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = "none";
            dropdownButton.classList.remove("active");
        }
    });

    // selectAllCheckbox.addEventListener("change", function() {
    //     optionCheckboxes.forEach(function(checkbox) {
    //         checkbox.checked = selectAllCheckbox.checked;
    //         updateLabelClass(checkbox);
    //     });
    //     updateDropdownText();
    // });

    // optionCheckboxes.forEach(function(checkbox) {
    //     checkbox.addEventListener("change", function() {
    //         updateDropdownText();
    //         updateLabelClass(checkbox);
    //         if (!checkbox.checked) {
    //             selectAllCheckbox.checked = false;
    //         }
    //     });
    // });

    // function updateLabelClass(checkbox) {
    //     const label = checkbox.parentElement;
    //     if (checkbox.checked) {
    //         label.classList.add("checked");
    //     } else {
    //         label.classList.remove("checked");
    //     }
    // }

    // function updateDropdownText() {
    //     const selectedOptions = [];
    //     optionCheckboxes.forEach(function(checkbox) {
    //         if (checkbox.checked) {
    //             selectedOptions.push(checkbox.value);
    //         }
    //     });

    //     if (selectedOptions.length > 3) {
    //         dropdownButton.textContent = `${selectedOptions.length} selected`;
    //     } else if (selectedOptions.length > 0) {
    //         dropdownButton.textContent = selectedOptions.join(", ");
    //     } else {
    //         dropdownButton.textContent = "Select options";
    //     }

    //     // alert(`Selected options: ${selectedOptions.join(", ")}`);
    // }
});
</script>