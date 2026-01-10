@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Tips & Trik
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $tips->title }}">
    <meta property="og:image"
        content="{{ $tips->photo ? asset('Upload/tips/' . $tips->photo) : asset('Frontend/img/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection
@section('main')
    <div class="flex min-h-screen w-full">

        {{-- Konten Kiri 4/5 --}}
        <div class="flex-shrink-0 w-4/5  pt-20">
            <div class=" p-4">

              <div class=" h-[50vh] mb-4">
    <img class="h-full w-1/2 object-fill rounded shadow" 
         src="{{ asset('Upload/tips/' . $tips->photo) }}" 
         alt="Tips Image" />
</div>

<div>
      <h3 class="mb-3">{{ $tips->title }}</h3>
                <p class="" style="text-align: justify;">
                    {!! $tips->description !!}
                </p>
</div>
              
            </div>

        </div>


        @include('components.banner')


    </div>
@endsection
