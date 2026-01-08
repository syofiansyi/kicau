@extends('frontend.includes.index')

@section('title')
    Kopdar LoveBird Indonesia - Detail Juara
@endsection

@push('addon-style')
    <link href="{{ asset('Frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/event_style.css') }}" rel="stylesheet" type="text/css" />
    <style>
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        table caption {
            caption-side: bottom;
            font-style: italic;
            padding: 8px;
            color: #555;
        }

        table th,
        table td {
            padding: 12px 16px;
            padding-left: 24px;
            /* padding kiri ekstra */
        }

        table th {
            background-color: #1e40af;
            /* biru gelap untuk header */
            color: #ffffff;
            /* teks putih */
            font-weight: 600;
            border-bottom: 2px solid #1e3a8a;
            text-align: center;
            /* header ikut center */
        }

        table td {
            text-align: center;
            /* isi tabel center */
            border-bottom: 1px solid #ddd;
        }

        table tr:nth-child(even) td {
            background-color: #f3f4f6;
        }

        table tr:hover td {
            background-color: #e0e7ff;
            transition: background-color 0.2s;
        }

        table th:first-child,
        table td:first-child {
            border-right: 1px solid #ddd;
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

        <div id="kt_app_content" class="app-content flex-column-fluid px-0">
            <div class="juara-content d-flex flex-column align-items-start pt-4">
                <!-- Gambar -->
                @if ($juara->photo)
                    <div class="w-100">
                        <img src="{{ asset('Upload/juara/' . $juara->photo) }}" alt="Gambar Juara" class="img-fluid w-100"
                            style="height: auto; display: block;" />
                    </div>
                @endif

                <!-- Keterangan -->
                <div class="d-flex" style="width: 100vw; height: 100vh; overflow: hidden;">
                    <!-- Kolom pertama 80% -->
                    <div style="flex: 0 0 80%; overflow-x: auto; padding: 1rem;">
                        <div>
                            <div>
                                <h3 class="fw-bold text-center" style="margin-bottom: 1.5rem;">
                                    {{ $juara->title }}
                                </h3>
                            </div>

                            <div>
                                <p class="text-description" style="text-align: justify;">
                                    {!! $juara->description !!}
                                </p>
                            </div>


                        </div>
                    </div>

                    @include('components.banner')

                </div>

            </div>
        </div>
    </div>
@endsection
