@extends('backend.includes.index')
@section('main')
@section('title')
    Restoran - Edit Event
@endsection

<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div>
        <a href="{{ route('event') }}" class="btn btn-sm btn-primary"> View All Event
        </a>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                            <div>
                                <h1>Edit Event </h1>
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

                                    <form class="row g-3" action="{{ route('update.event') }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $event->id }}">
                                        <input type="hidden" name="old_image" value="Upload/event/{{ $event->photo }}">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Nama Event</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Event Name" name="title" value="{{ $event->title }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Lokasi</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                   placeholder="Event Name" name="lokasi" value="{{ $event->lokasi }}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="inputEmail4">tanggal Event</label>
                                            <input type="date" class="form-control" id="inputEmail4" name="tanggal"
                                                value="{{ $event->tanggal }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Harga</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                   placeholder="Event Name" name="harga" value="{{ $event->harga }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Photo</label>
                                            <input type="file" class="form-control slug-title" id="inputEmail4"
                                                   name="photo" id="image">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12 text-secondary">
                                                <img id="showImage" src="{{ asset('Upload/event/' . $event->photo) }}"
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

@endsection
