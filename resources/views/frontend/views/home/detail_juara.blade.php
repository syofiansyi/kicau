@extends('frontend.includes.index')

@section('title')
    Kopdar LoveBird Indonesia - Detail Juara
@endsection

@push('addon-style')
    <link href="{{ asset('Frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/event_style.css') }}" rel="stylesheet" type="text/css" />
    <style>
        table {
            caption-side: bottom;
            border-collapse: collapse;
            border: 1px solid #000 !important;
            width: 100%;
        }

        table th,
        table td {
            border: 1px solid #000 !important;
            padding: 8px;
        }

        /* Gambar full width tapi ada padding */
        .juara-image {
            width: 100%;
            height: auto;
            border-radius: 0.25rem; /* sedikit rounded */
        }

        /* Konten full width dengan padding */
        .juara-content {
            width: 100%;
            padding: 0 1.5rem; /* padding horizontal 24px */
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
    <!-- Toolbar -->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="d-flex flex-stack w-100 px-3">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">
                    Juara
                </h1>
            </div>
        </div>
    </div>

    <!-- Content Full Width dengan padding -->
    <div id="kt_app_content" class="app-content flex-column-fluid px-0">
        <div class="juara-content d-flex flex-column align-items-start pt-4">
            <!-- Gambar -->
            @if($juara->photo)
                <div class="mb-3 w-100">
                    <img src="{{ asset('Upload/juara/' . $juara->photo) }}" alt="Gambar Juara" class="img-fluid shadow juara-image" />
                </div>
            @endif

            <!-- Keterangan -->
            <div class="w-100">
                <h3 class="fw-bold">{{ $juara->title }}</h3>
                <p class="text-description" style="text-align: justify;">
                    {!! $juara->description !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
