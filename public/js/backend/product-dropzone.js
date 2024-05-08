Dropzone.autoDiscover = false;    
    const dropzone = $("#dropzoneImage").dropzone({ 
      uploadprogress: function(file, progress, bytesSent) {
          $("button[type=submit]").prop('disabled',true);
      },
      url:  "{{ route('temp-images.create') }}",
      maxFiles: 10,
      paramName: 'image',
      addRemoveLinks: true,
      acceptedFiles: "image/jpeg,image/png,image/gif",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }, success: function(file, response){
            var html = `<div class="col-md-3 mb-3" id="product-image-row-${response.image_id}">
                            <div class="card image-card">
                                <a href="#" onclick="deleteImage(${response.image_id});" class="btn btn-danger">Delete</a>
                                <img src="${response.imagePath}" alt="" class="w-100 card-img-top">
                                <div class="card-body">
                                    <input type="text" name="caption[]"  value="" class="form-control"/>
                                    <input type="hidden" name="image_id[]" value="${response.image_id}"/>
                                </div>
                            </div>
                        </div>`;
            $("#image-wrapper").append(html);
            $("button[type=submit]").prop('disabled',false);
          this.removeFile(file);            
      }
  });

  
  $("#productForm").submit(function(event){
    event.preventDefault();
    $("button[type=submit]").prop('disabled',true);

    $.ajax({
        url: "{{ route('products.store') }}",
        data: $(this).serializeArray(),
        method: 'post',
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function(response){
            $("button[type=submit]").prop('disabled',false);

            if(response.status == true) {
                window.location.href="{{ route('products.index') }}";
            } else {
                var errors = response.errors; 
                if (errors.name) {
                    $("#name").addClass('is-invalid')
                    .siblings("p")
                    .addClass('invalid-feedback')
                    .html(errors.name);
                } else{
                    $("#name").removeClass('is-invalid')
                    .siblings("p")
                    .removeClass('invalid-feedback')
                    .html("");
                }

                if (errors.price) {
                    $("#price").addClass('is-invalid')
                    .siblings("p")
                    .addClass('invalid-feedback')
                    .html(errors.price);
                } else{
                    $("#price").removeClass('is-invalid')
                    .siblings("p")
                    .removeClass('invalid-feedback')
                    .html("");
                }
            }
        }
    });
  })


  function deleteImage(id){
    if (confirm("Are you sure you want to delete?")) {
        $("#product-image-row-"+id).remove();
    }
}