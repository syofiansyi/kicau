@extends('frontend.includes.index')
@section('title')
    Kopdar LovedBird Indonesia - Berita
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/news.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('main')
    {{--Hero Slider--}}
    @include('frontend.views.artikel_berita.components.hero_slide')
    {{--Event--}}
    @include('frontend.views.artikel_berita.components.news_berita')

    @push('addon-script')
{{--        <script src="{{ asset('Frontend/js/event.js') }}"></script>--}}
{{--        <script src="{{ asset('Frontend/js/juara.js') }}"></script>--}}
    @endpush
@endsection
