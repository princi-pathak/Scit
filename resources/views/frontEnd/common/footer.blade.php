@include('frontEnd.common.modify_request')
@include('frontEnd.common.system_guide')
@include('frontEnd.common.sticky_notification')

<!--footer start-->
<footer class="footer-section">
  <div class="text-center">
    {{ date('Y')}} &copy; SCITS
    <a href="#" class="go-top">
      <!-- <i class="fa fa-angle-up"></i> -->
      <img src="{{  asset('public/images/scits_hand.png')}}" alt="system_guide" class="system_guide" height="25" width="auto" />
    </a>
  </div>

  <!-- <div class="text-left">
    <a href="#" style="color:white;" class="system_guide"> System Guide </a>
  </div> -->
</footer>
<!--footer end-->
<script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>

<script>
  function upload() {
    var fileinput = document.getElementById("finput");
    var image = new SimpleImage(fileinput);
    console.log("Image name:", image);
    const fileName = fileinput.files[0].name;

    const formData = new FormData();
    formData.append('image', fileinput.files[0]);

    const reader = new FileReader();

    // When the file is loaded, set the image source to the file's data
    reader.onload = function(e) {
      const preview = document.getElementById('formImagePreview');
      console.log(preview);
      preview.src = e.target.result;
      preview.style.display = 'block'; // Show the image
    };

    reader.readAsDataURL(fileinput.files[0]);

    fetch('{{ route("saveFormDotIoImage") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Image saved:', data.file_path);
            const elements = document.querySelectorAll('.uploded_image');
            elements.forEach(element => {
                element.value =  data.file_path;
            });
            // alert('Image uploaded successfully!');
        } else {
            alert('Failed to upload image: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while uploading the image.');
    });
  } 

  function uploadImageFun() {
 
    var fileinput = document.getElementById("finput2");
    console.log(fileinput);
    var image = new SimpleImage(fileinput);

    console.log("Image name:", image);
    const fileName2 = fileinput.files[0].name;

    const formDataEdit = new FormData();
    formDataEdit.append('image', fileinput.files[0]);

    const reader = new FileReader();

    // When the file is loaded, set the image source to the file's data
    reader.onload = function(e) {
      const preview2 = document.getElementById('previousImage');
      console.log(preview2);
      preview2.src = e.target.result;
      preview2.style.display = 'block'; // Show the image
    };

    reader.readAsDataURL(fileinput.files[0]);

    fetch('{{ route("saveFormDotIoImage") }}', {
        method: 'POST',
        body: formDataEdit,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Image saved:', data.file_path);
            const elements = document.querySelectorAll('.uploded_image');
            elements.forEach(element => {
              elements.value = "";
                element.value =  data.file_path;
            });
            // alert('Image uploaded successfully!');
        } else {
            alert('Failed to upload image: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while uploading the image.');
    });
    console.log("File Name:", fileName2);
    
  } 

  $(document).ready(function() {
    $('.system_guide').on('click', function() {
      $('#System_guide').modal('show');
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/1.1.6/choices.min.js" integrity="sha512-7PQ3MLNFhvDn/IQy12+1+jKcc1A/Yx4KuL62Bn6+ztkiitRVW1T/7ikAh675pOs3I+8hyXuRknDpTteeptw4Bw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>