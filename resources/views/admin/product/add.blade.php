@extends('admin.layouts.master')
@section('title', 'Add | Furniture Store')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
<link rel="stylesheet" href="/css/backend/utilities/product-dropzone.css">
<link rel="stylesheet" href="/css/backend/utilities/form.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script src="{{ asset('js/backend/product-dropzone.js') }}"></script>
@endpush
@section('page-name')
    Add Product 
@endsection
@section('content')
<section>
    <div class="container my-5">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div id="formDropzone" class="dz-default dz-message dropzone form-group">
                <div class="dz-message needsclick">
                    <br>Drop files here or click to upload.
                </div>
            </div>
            {{-- <div class="form-group">
                <input type="file" name="photo" id="photo">
            </div> --}}
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" id="name">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">category</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" id="price">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <a class="btn btn-warning" href="{{ url()->previous() }}">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Publish" class="publish-btn">
        </form>
    </div>
</section>
@endsection
@push('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script src="{{ asset('js/backend/product-dropzone.js') }}"></script> --}}
<script>
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
</script>

    @endpush
