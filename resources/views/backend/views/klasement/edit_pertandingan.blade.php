@extends('backend.includes.index')
@section('main')
    @section('title')
        Restoran - Edit Event
    @endsection

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div>
            <a href="{{ route('klasement_pertandingan') }}" class="btn btn-sm btn-primary"> View All Klasemement
            </a>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                                <div>
                                    <h1>Edit Klasement </h1>
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

                                        <form class="row g-3" action="{{ route('update.pertandingan') }}"
                                              enctype="multipart/form-data" method="POST">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $pertandingan->id }}">
                                            <input type="hidden" name="old_image1" value="Upload/news/{{ $pertandingan->photo1 }}">
                                            <input type="hidden" name="old_image2" value="Upload/news/{{ $pertandingan->photo2 }}">

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Nama Team 1</label>
                                                <input type="text" class="form-control" id="inputEmail4"
                                                       placeholder="Event Name" name="namateam1" value="{{ $pertandingan->namateam1 }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Skor 1</label>
                                                <input type="text" class="form-control" id="inputEmail4"
                                                       placeholder="Event Name" name="skor1" value="{{ $pertandingan->skor1 }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Nama Team 2</label>
                                                <input type="text" class="form-control" id="inputEmail4"
                                                       placeholder="Event Name" name="namateam2" value="{{ $pertandingan->namateam2 }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Skor 2</label>
                                                <input type="text" class="form-control" id="inputEmail4"
                                                       placeholder="Event Name" name="skor2" value="{{ $pertandingan->skor2 }}">
                                            </div>

                                            <!-- Gambar 1 -->
                                            <div class="col-md-6">
                                                <label class="form-label">Photo Team 1</label>
                                                <input type="file" class="form-control" name="photo1" id="image1">
                                                <img id="showImage1" src="{{ asset('Upload/hasil_pertandingan/' . $pertandingan->photo1) }}" alt="Team 1" style="width:100px; height: 100px; margin-top:10px;">
                                            </div>

                                            <!-- Gambar 2 -->
                                            <div class="col-md-6">
                                                <label class="form-label">Photo Team 2</label>
                                                <input type="file" class="form-control" name="photo2" id="image2">
                                                <img id="showImage2" src="{{ asset('Upload/hasil_pertandingan/' . $pertandingan->photo2) }}" alt="Team 2" style="width:100px; height: 100px; margin-top:10px;">
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
            $('#image1').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });

            $('#image2').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
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
