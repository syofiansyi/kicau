@extends('backend.includes.index')
@section('main')
@section('title')
    Produk - Edit Produk
@endsection

<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div>
        <a href="{{ route('backend.produk.index') }}" class="btn btn-sm btn-primary"> View All Produk
        </a>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                            <div>
                                <h1>Edit Produk </h1>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-12">
                                <div class="ec-vendor-upload-detail">

                                    <form action="{{ route('backend.produk.update', $produk->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id" value="{{ $produk->id }}">
                                        <input type="hidden" name="old_image"
                                            value="Upload/produk/{{ $produk->photo }}">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Nama Produk</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Nama Produk" name="title" value="{{ $produk->title }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Description</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Description" name="description"
                                                value="{{ $produk->description }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Harga Produk</label>
                                            <input type="number" class="form-control" id="inputEmail4"
                                                placeholder="Harga Produk" name="harga" value="{{ $produk->harga }}">
                                        </div>



                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Photo</label>
                                            <input type="file" class="form-control slug-title" id="inputEmail4"
                                                name="photo" id="image">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12 text-secondary">
                                                <img id="showImage" src="{{ asset('Upload/produk/' . $produk->photo) }}"
                                                    alt="Admin" style="width:100px; height: 100px;">
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="inputEmail4">Link Shopee</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Input Link Shope" name="shopee">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="inputEmail4">Link Tiktok</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Input Link Tiktok" name="tiktok">
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
