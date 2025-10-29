@extends('backend.includes.index')
@section('main')
@section('title')
    Brand - Edit Slider {{ $slider->title }}
@endsection

<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                            <div>
                                <h1>Edit Slider </h1>
                                <p class="breadcrumbs"><span><a href="{{ route('slider') }}">Slider</a></span>
                                    <span><i class="mdi mdi-chevron-right"></i></span>Edit Slider
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('slider') }}" class="btn btn-success"> View All
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-12">
                                <div class="ec-vendor-upload-detail">

                                    <form class="row g-3" action="{{ route('update.slider') }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $slider->id }}">
                                        <input type="hidden" name="old_image" value="{{ $slider->photo }}">

                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Title</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Name Brand" name="title" value="{{ $slider->title }}">
                                        </div>

                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Link </label>
                                            <input type="text" class="form-control slug-title" id="inputEmail4"
                                                name="description" placeholder="Add Title"
                                                value="{{ $slider->description }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Photo</label>
                                            <input type="file" class="form-control slug-title" id="inputEmail4"
                                                name="photo" id="image">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12 text-secondary">
                                                <img id="showImage" src="{{ asset('Upload/slider/' . $slider->photo) }}"
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


@endsection
