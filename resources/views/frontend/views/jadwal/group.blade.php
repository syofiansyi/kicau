@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Jadwal - Group
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="Group {{ $jadwal->title }}">
    <meta property="og:description" content="Event group jadwal untuk {{ $jadwal->title }} yang dimulai pada {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->translatedFormat('d F Y') }}">
    <meta property="og:image" content="{{ $jadwal->photo ? asset('Upload/jadwal/' . $jadwal->photo) : asset('Frontend/img/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection
@section('main')
    {{--Hero Slider--}}
    @include('frontend.views.jadwal.components.group')
@endsection
