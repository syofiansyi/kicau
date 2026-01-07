


@extends('frontend.includes.index')
@section('title')
    Kopdar LovedBird Indonesia - Detail Juara
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/event_style.css') }}" rel="stylesheet" type="text/css" />
    <style>
    table {
        caption-side: bottom;
        border-collapse: collapse;
        border: 1px solid #000 !important;
    }

    table th,
    table td {
        border: 1px solid #000 !important;
        padding: 8px;
        /* opsional: untuk spasi di dalam sel */
    }

</style>
@endpush
@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $juara->title }}">
    <meta property="og:image" content="{{ $juara->photo ? asset('Upload/juara/' . $juara->photo) : asset('Frontend/img/logo.png') }}">
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
                        Juara
                    </h1>
                  
               
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
                 
                        <!-- Gambar -->
                        <div class="mb-3 mb-md-0 me-md-4">
                            <img src="{{ asset('Upload/juara/' . $juara->photo) }}" alt="Event Image" class="img-fluid rounded shadow" />
                        </div>

                        <!-- Keterangan -->
                        <div>
                            <h3 class="fw-bold">{{$juara->title}}</h3>
                            <p class="text-description" style="text-align: justify;" v-html="dataBerita.detailBerita">
                                {!! $juara->description !!}
                            </p>
                        </div>
                    
                </div>
            </div>

        </div>
        <!--end::Content-->
    </div>
@endsection
