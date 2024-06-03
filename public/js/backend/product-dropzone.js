Dropzone.autoDiscover = false;
const dropzone = $("#image").dropzone({
    uploadprogress: function (file, progress, bytesSent) {
        $("input[type=submit]").prop('disabled', true);
    },
    url: "/admin/product/send",
    type: 'post',
    maxFiles: 10,
    paramName: 'image',
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/png,image/gif",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (file, response) {
        const imageUrl = response.image;
        // let hiddenInput = $('input[name="uploaded_images"]');
        console.log(imageUrl);
        // if (hiddenInput.length === 0) {
            hiddenInput = $('<input>').attr({
                type: 'hidden',
                name: 'photo[]',
                value: imageUrl
            });
            $('form').append(hiddenInput);
            console.log("debug");
        // } else {
        //     console.log('test');
        //     let currentValue = hiddenInput.val();
        //     currentValue += ',' + imageUrl;
        //     hiddenInput.val(currentValue);
        // }
        $("input[type=submit]").prop('disabled', false);
    }
});

function deleteImage(id) {
    if (confirm("Are you sure you want to delete?")) {
        $("#product-image-row-" + id).remove();
    }
}