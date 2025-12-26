@extends('backend.includes.index')
@section('main')
@section('title')
    Tips - Edit Tips
@endsection

<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div>
        <a href="{{ route('backend.tips.index') }}" class="btn btn-sm btn-primary"> View All Tips
        </a>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                            <div>
                                <h1>Edit Tips </h1>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-12">
                                <div class="ec-vendor-upload-detail">

                                    <form action="{{ route('backend.tips.update', $tip->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id" value="{{ $tip->id }}">
                                        <input type="hidden" name="old_image" value="Upload/tips/{{ $tip->photo }}">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Judul Tips</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Tips Title" name="title" value="{{ $tip->title }}">
                                        </div>

                                       <div class="col-md-12">
                                            <label for="inputProductDescription" class="form-label">
                                                Description</label>
                                            <textarea id="editor" name="description" value="{{ $tip->description }}" rows="2" class="form-control">{{ $tip->description }}</textarea>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="inputEmail4">tanggal Tips</label>
                                            <input type="date" class="form-control" id="inputEmail4" name="tanggal"
                                                value="{{ $tip->tanggal }}">
                                        </div>

                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Photo</label>
                                            <input type="file" class="form-control slug-title" id="inputEmail4"
                                                name="photo" id="image">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12 text-secondary">
                                                <img id="showImage" src="{{ asset('Upload/tips/' . $tip->photo) }}"
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
