@extends('frontend.includes.index')
@section('title')
    Kopdar LovedBird Indonesia - Berita
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/news.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('main')
    {{-- Hero Slider --}}

    @include('components.alert')

    @include('frontend.views.artikel_berita.components.hero_slide')
    <div class="d-flex justify-content-center mb-4">
        <form method="GET" action="{{ route('artikel_berita') }}" style="width: 100%;">
            <div class="input-group" style="border-radius: 25px">
                <span class="bg-white"
                    style="
          border-right: none;
          padding-left: 1.5rem;
          padding-right: 0;
          border-top-left-radius: 25px;
          border-bottom-left-radius: 25px;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-shrink: 0;
        ">
                    <i class="fa fa-search"></i>
                </span>
                <input type="text" name="search" class="form-control "
                    placeholder="Cari di Kopdar Loverbird Indonesia ....." value="{{ request('search') }}"
                    aria-label="Cari Pertandingan"
                    style="
          border: none;
          border-radius: 0;
          border-top-right-radius: 25px;
          border-bottom-right-radius: 25px;
        " />
            </div>
        </form>
    </div>

    @include('components.sosmed')

    <div class="flex min-h-screen">
        {{-- KIRI: CONTENT --}}
        <div class="w-3/5 px-4 ">

            {{-- Event --}}
            @include('frontend.views.artikel_berita.components.news_berita')
        </div>

        {{-- KANAN: FULL IMAGE --}}

        @include('components.banner')

    </div>


    @push('addon-script')
        {{--        <script src="{{ asset('Frontend/js/event.js') }}"></script> --}}
        {{--        <script src="{{ asset('Frontend/js/juara.js') }}"></script> --}}
    @endpush
@endsection
