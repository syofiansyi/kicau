@extends('frontend.includes.index')
@section('title')
    Kopdar LovedBird Indonesia - Berita
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/news.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $berita->title }}">
    <meta property="og:description" content="{{ strip_tags(Str::limit($berita->description, 150)) }}">
    <meta property="og:image"
        content="{{ $berita->photo ? asset('Upload/news/' . $berita->photo) : asset('Frontend/img/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection
@section('main')
    <div class="flex min-h-screen w-full">

        {{-- Konten Kiri 4/5 --}}
        <div class="flex-shrink-0 w-4/5">
            <div class="d-flex flex-column flex-column-fluid">
                <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                            <!--begin::Title-->
                            <h1
                                class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                                Artikel Berita
                            </h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a @click="changePage('artikel_berita')" class="text-muted text-hover-primary pointer">
                                        Artikel Berita
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
                                    judulBerita
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
                            <div class="d-flex flex-column  align-items-start pt-4">
                                <!-- Gambar -->
                                <div class="mb-3 mb-md-0 me-md-4">
                                    <img src="{{ asset('Upload/news/' . $berita->photo) }}" alt="Event Image"
                                        class="img-fluid rounded shadow" />
                                </div>

                                <!-- Keterangan -->
                                <div>
                                    <h3 class="fw-bold">{{ $berita->title }}</h3>
                                    <p class="text-muted">
                                        {{ $berita->tanggal }}
                                    </p>
                                    <p class="text-description" style="text-align: justify;"
                                        v-html="dataBerita.detailBerita">
                                        {!! $berita->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end::Content-->
            </div>
        </div>


        @include('components.banner')


    </div>

    @push('addon-script')
        {{--        <script src="{{ asset('Frontend/js/event.js') }}"></script> --}}
        {{--        <script src="{{ asset('Frontend/js/juara.js') }}"></script> --}}
    @endpush
@endsection
