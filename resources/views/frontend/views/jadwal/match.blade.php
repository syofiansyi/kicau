@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Jadwal
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('meta')
    @if($matches->count())
        @php $firstMatch = $matches->first(); @endphp
        <meta property="og:type" content="article">
        <meta property="og:title" content="Pertandingan {{ $firstMatch->clubHome->name }} VS {{ $firstMatch->clubAway->name }}">
        <meta property="og:description" content="Laga seru antara {{ $firstMatch->clubHome->name }} dan {{ $firstMatch->clubAway->name }} pada {{ \Carbon\Carbon::parse($firstMatch->tanggal_pertandingan)->translatedFormat('d F Y') }}">
        <meta property="og:image" content="{{ asset('Upload/club/' . $firstMatch->clubHome->photo) }}">
        <meta property="og:url" content="{{ url()->current() }}">
    @else
        <meta property="og:title" content="Belum ada pertandingan di grup {{ $groupSelected->title }}">
        <meta property="og:description" content="Belum tersedia informasi pertandingan untuk grup ini.">
        <meta property="og:image" content="{{ asset('Frontend/img/logo.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
    @endif
@endsection
@section('main')
    {{--Hero Slider--}}
    @include('frontend.views.jadwal.components.match')
@endsection
