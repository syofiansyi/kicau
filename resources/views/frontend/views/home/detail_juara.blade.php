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

        /* Pastikan gambar full width */
        .juara-image {
            width: 100%;
            height: auto;
        }

        /* Konten full width */
        .juara-content {
            width: 100%;
        }
    </style>
@endpush

@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $juara->title }}">
    <meta property="og:image"
        content="{{ $juara->photo ? asset('Upload/juara/' . $juara->photo) : asset('Frontend/img/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('main')
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="d-flex flex-stack w-100 px-0">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">
                        Juara
                    </h1>
                </div>
            </div>
        </div>

        <!-- Content Full Width -->
        <div id="kt_app_content" class="app-content flex-column-fluid px-0">
            <div class="juara-content d-flex flex-column align-items-start pt-4 px-0">
                <!-- Gambar -->
                @if ($juara->photo)
                    <div class=" w-100">
                        <img src="{{ asset('Upload/juara/' . $juara->photo) }}" alt="Gambar Juara"
                            class="img-fluid rounded shadow juara-image" />
                    </div>
                @endif

                <!-- Keterangan -->
                <div class="d-flex w-100" style="min-height: 100vh;">
                    <!-- Konten Juara 4/5 -->
                    <div class="flex-grow-1" style="width: 300%;">
                        <h3 class="fw-bold" style="text-align: center; margin-top: 10px; margin-bottom: 0;">
                            {{ $juara->title }}
                        </h3>



                        </h3>

                        <div class="text-description" style="text-align: justify; padding: 2.5rem; display: block;">
                            {!! $juara->description !!}
                        </div>

                    </div>

                  
                        @include('components.banner')
                   
                </div>
            </div>
        </div>
    </div>
@endsection
