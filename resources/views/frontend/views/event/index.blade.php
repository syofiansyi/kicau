@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Event
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    {{-- Hero Slider --}}
    @include('components.alert')

   <div class="mt-32">
    @include('components.searchevent')
</div>

    @include('components.sosmed')
    <h3 class="text-center text-lg font-semibold text-gray-500">Lovedbird Event Agenda</h3>
    <h1 class="text-center text-2xl font-bold ">Schedule</h1>
    <div class="flex min-h-screen">
        {{-- KIRI: CONTENT --}}
       <div class="flex-shrink-0 w-4/5">

            @include('frontend.views.event.components.event')

        </div>


        @include('components.banner')

    </div>
@endsection
