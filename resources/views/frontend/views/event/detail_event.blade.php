@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Event
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $event->title }}">
    <meta property="og:image"
        content="{{ $event->photo ? asset('Upload/event/' . $event->photo) : asset('Frontend/img/logo.png') }}">
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
                            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0"
                                style="cursor: pointer">
                                Event
                            </h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->

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
                                    <img src="{{ asset('Upload/event/' . $event->photo) }}" alt="Event Image"
                                        class="img-fluid rounded shadow" />
                                </div>

                                <!-- Keterangan -->
                                <div>
                                    <h3 class="fw-bold">{{ $event->title }}</h3>
                                    <p class="" style="text-align: justify;">
                                        {!! $event->description !!}
                                    </p>
                                </div>
                            </div>
                            <!-- Detail Harga -->
                            <div class="card mt-4 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="event-info d-flex">
                                            <p class="location">
                                                <i class="fa fa-map-marker "></i>
                                                {{ $event->lokasi }}
                                            </p>
                                            <p class="date mx-2">
                                                <i class="fa fa-calendar"></i>
                                                {{ $event->tanggal }}
                                            </p>
                                        </div>

                                    </div>
                                    <hr />
                                    <p><strong>Harga</strong></p>
                                    <p class="fw-bold">Rp {{ number_format($event->harga, 0, ',', '.') }}</p>

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
@endsection
