@extends('frontend.includes.index')
@section('title')
    Kopdar LovedBird Indonesia
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('Frontend/css/event.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('main')
{{--Hero Slider--}}

{{--Event--}}
@include('frontend.views.home.components.event')
{{--Berita--}}
@include('frontend.views.home.components.berita')
{{--Top Rank--}}
@include('frontend.views.home.components.top_rank')
{{--Daftar Pertandingan--}}
@include('frontend.views.home.components.pertandingan')
{{--Daftar Juara--}}
@include('frontend.views.home.components.daftar_juara')

@endsection
@section('slider')
{{--Hero Slider--}}
@include('frontend.views.home.components.hero_slider')
@push('addon-script')
<script src="{{ asset('Frontend/js/event.js') }}"></script>
<script src="{{ asset('Frontend/js/juara.js') }}"></script>
<script src="{{ asset('Frontend/js/berita.js') }}"></script>
<script src="{{ asset('Frontend/js/pertandingan.js') }}"></script>
@endpush
@endsection
