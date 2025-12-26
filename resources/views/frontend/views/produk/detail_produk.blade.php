@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Produk Unggulan KLI
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $produk->title }}">
    <meta property="og:image" content="{{ $produk->photo ? asset('Upload/produk/' . $produk->photo) : asset('Frontend/img/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection
@section('main')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0" style="cursor: pointer">
                        Produk Unggulan KLI
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a @click="changePage('produk')"  class="text-muted text-hover-primary"  style="cursor: pointer">
                                Produk Unggulan KLI
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            Produk Unggulan KLI {{$produk->title}}
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <!--Evenet-->
                <div class="container-fluid">
                    <!-- Bagian utama -->
                    <div class="d-flex flex-column flex-md-row align-items-start pt-4">
                        <!-- Gambar -->
                        <div class="mb-3 mb-md-0 me-md-4">
                            <img src="{{ asset('Upload/produk/' . $produk->photo) }}" alt="Tips Image" class="img-fluid rounded shadow" />
                        </div>

                        <!-- Keterangan -->
                        <div>
                            <h3 class="fw-bold">{{$produk->title}}</h3>
                            <p class="" style="text-align: justify;">
                                {!! $produk->description !!}
                            </p>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Content-->
    </div>
@endsection
