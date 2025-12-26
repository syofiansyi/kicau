@extends('backend.includes.index')
@section('main')
@section('title')
    Anggota - Edit Anggota
@endsection

<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div>
        <a href="{{ route('backend.anggota.index') }}" class="btn btn-sm btn-primary"> View All Anggota
        </a>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                            <div>
                                <h1>Edit Anggota </h1>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-12">
                                <div class="ec-vendor-upload-detail">

                                    <form action="{{ route('backend.anggota.update', $anggota->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id" value="{{ $anggota->id }}">
                                        <input type="hidden" name="old_image"
                                            value="Upload/anggota/{{ $anggota->photo }}">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Nama Pemilik</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Nama Pemilik" name="nama_pemilik"
                                                value="{{ $anggota->nama_pemilik }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Nama Burung</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Nama Burung" name="nama_burung"
                                                value="{{ $anggota->nama_burung }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Alamat</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Alamat" name="alamat" value="{{ $anggota->alamat }}">
                                        </div>


                                        <div class="form-group col-6">
                                            <label for="inputEmail4">tanggal Anggota</label>
                                            <input type="date" class="form-control" id="inputEmail4" name="tanggal"
                                                value="{{ $anggota->tanggal }}">
                                        </div>

                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Photo</label>
                                            <input type="file" class="form-control slug-title" id="inputEmail4"
                                                name="photo" id="image">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12 text-secondary">
                                                <img id="showImage"
                                                    src="{{ asset('Upload/anggota/' . $anggota->photo) }}"
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
