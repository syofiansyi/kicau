@extends('frontend.includes.index')
@section('title')
    Kopdar LovedBird Indonesia
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/event.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('main')
    {{-- Hero Slider --}}
    @include('components.alert')
    @include('components.search')
    @include('components.sosmed')



    <div class="flex min-h-screen">
        {{-- KIRI: CONTENT --}}
        <div class="w-4/5 px-4 py-6 mx-auto space-y-10">
            @include('frontend.views.home.components.event')
            <div class="relative w-full my-12">
                <div class="h-1 w-full bg-gradient-to-r from-purple-400 via-pink-500 to-red-400 rounded-full shadow-md">
                </div>
            </div>

            @include('frontend.views.home.components.berita')
            <div class="relative w-full my-12">
                <div class="h-1 w-full bg-gradient-to-r from-purple-400 via-pink-500 to-red-400 rounded-full shadow-md">
                </div>
            </div>

            @include('frontend.views.home.components.anggota')
            <div class="relative w-full my-12">
                <div class="h-1 w-full bg-gradient-to-r from-purple-400 via-pink-500 to-red-400 rounded-full shadow-md">
                </div>
            </div>

            @include('frontend.views.home.components.tips')
            <div class="relative w-full my-12">
                <div class="h-1 w-full bg-gradient-to-r from-purple-400 via-pink-500 to-red-400 rounded-full shadow-md">
                </div>
            </div>

            @include('frontend.views.home.components.daftar_juara')
            <div class="relative w-full my-12">
                <div class="h-1 w-full bg-gradient-to-r from-purple-400 via-pink-500 to-red-400 rounded-full shadow-md">
                </div>
            </div>

            @include('frontend.views.home.components.produk')
        </div>




        @include('components.banner')

    </div>
@endsection


@section('slider')
    {{-- Hero Slider --}}
    @include('frontend.views.home.components.hero_slider')
    @push('addon-script')
        <script src="{{ asset('Frontend/js/event.js') }}"></script>
        <script src="{{ asset('Frontend/js/juara.js') }}"></script>
        <script src="{{ asset('Frontend/js/berita.js') }}"></script>
        <script src="{{ asset('Frontend/js/pertandingan.js') }}"></script>
    @endpush
@endsection
