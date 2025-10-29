@extends('backend.includes.index')
@section('main')
@section('title')
    Restoran - Edit Event
@endsection

<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div>
        <a href="{{ route('news') }}" class="btn btn-sm btn-primary"> View All Juara
        </a>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                            <div>
                                <h1>Edit Juara </h1>
{{--                                <p class="breadcrumbs"><span><a href="{{ route('event') }}">Event</a></span>--}}
{{--                                    <span><i class="mdi mdi-chevron-right"></i></span>Edit Event--}}
{{--                                </p>--}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-12">
                                <div class="ec-vendor-upload-detail">

                                    <form class="row g-3" action="{{ route('update.juara') }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $juara->id }}">
                                        <input type="hidden" name="old_image" value="Upload/news/{{ $juara->photo }}">

                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Nama Event</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Event Name" name="title" value="{{ $juara->title }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputProductDescription" class="form-label">
                                                Description</label>
                                            <textarea id="editor" name="description" value="{{ $juara->description }}" rows="2" class="form-control">{{ $juara->description }}</textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Photo</label>
                                            <input type="file" class="form-control slug-title" id="inputEmail4"
                                                   name="photo" id="image">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12 text-secondary">
                                                <img id="showImage" src="{{ asset('Upload/juara/' . $juara->photo) }}"
                                                     alt="Admin" style="width:100px; height: 100px;">
                                            </div>
                                        </div>


                                        <div class="col-md-12 mt-4">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div> <!-- End Content -->
</div> <!-- End Content Wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#maps').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showMaps').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
