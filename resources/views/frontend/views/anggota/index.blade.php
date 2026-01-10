@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Anggota
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    {{-- Hero Slider --}}
    @include('components.alert')

     

    @include('components.sosmed')
    <h3 class="text-center text-lg mb-3 font-semibold text-gray-500">Anggota Kopdar LovedBird Indonesia</h3>
    <div class="flex min-h-screen">
      <div class="flex-shrink-0 w-4/5">

            @include('frontend.views.anggota.components.anggota')

        </div>


        @include('components.banner')

    </div>
@endsection
