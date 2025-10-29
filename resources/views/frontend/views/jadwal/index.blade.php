@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Jadwal
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
    @section('meta')
        @if($jadwals->count())
            @php $first = $jadwals->first(); @endphp
            <meta property="og:type" content="article">
            <meta property="og:title" content="Jadwal: {{ $first->title }}">
            <meta property="og:description" content="Pertandingan akan dimulai pada {{ \Carbon\Carbon::parse($first->tanggal_mulai)->translatedFormat('d F Y') }}">
            <meta property="og:image" content="{{ $first->photo ? asset('Upload/jadwal/' . $first->photo) : asset('Frontend/img/logo.png') }}">
            <meta property="og:url" content="{{ url()->current() }}">
        @endif
    @endsection
@section('main')
    {{--Hero Slider--}}
    @include('frontend.views.jadwal.components.jadwal')
@endsection
