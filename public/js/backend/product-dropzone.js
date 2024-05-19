Dropzone.autoDiscover = false;
$('#formDropzone').dropzone({
    previewTemplate: $('#dzPreviewContainer').html(),
    url: '{{route("product.store")}}',
    method: 'post',
    addRemoveLinks: true,
    autoProcessQueue: false,
    uploadMultiple: false,
    parallelUploads: 1,
    maxFiles: 1,
    acceptedFiles: '.jpeg, .jpg, .png, .gif',
    thumbnailWidth: 900,
    thumbnailHeight: 600,
    previewsContainer: "#previews",
    timeout: 0,
    init: function () {
        myDropzone = this;

        // when file is dragged in
        this.on('addedfile', function (file) {
            $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
        });
    },
    success: function (file, response) {
        // hide form and show success message
        $('#formDropzone').fadeOut(600);
        setTimeout(function () {
            $('#successMessage').removeClass('d-none');
        }, 600);
    }
});

$('#formSubmit').on('click', function (event) {
    event.preventDefault();
    var $this = $(this);

    // show submit button spinner
    $this.children('.spinner-border').removeClass('d-none');

    // validate form & submit if valid
    if ($('#formDropzone')[0].checkValidity() === false) {
        event.stopPropagation();

        // show error messages & hide button spinner    
        $('#formDropzone').addClass('was-validated');
        $this.children('.spinner-border').addClass('d-none');

        // if dropzone is empty show error message
        if (!myDropzone.getQueuedFiles().length > 0) {
            $('.dropzone-drag-area').addClass('is-invalid').next('.invalid-feedback').show();
        }
    } else {

        // if everything is ok, submit the form
        myDropzone.processQueue();
    }
});