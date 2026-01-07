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
    @include('components.searchberita')


    @include('components.sosmed')

   <div class="flex min-h-screen w-full">
    
    {{-- Konten Kiri 4/5 --}}
    <div class="flex-shrink-0 w-4/5">
        @include('frontend.views.artikel_berita.components.news_berita')
    </div>

   
        @include('components.banner')
   

</div>



    @push('addon-script')
        {{--        <script src="{{ asset('Frontend/js/event.js') }}"></script> --}}
        {{--        <script src="{{ asset('Frontend/js/juara.js') }}"></script> --}}
    @endpush
@endsection
