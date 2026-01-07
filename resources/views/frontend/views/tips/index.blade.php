@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Tips & Trik
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    {{-- Hero Slider --}}
    @include('components.alert')

     <div class="mt-32">
    @include('components.searchtips')
</div>


    @include('components.sosmed')
    <h3 class="text-center text-lg font-semibold text-gray-500">Lovedbird Tips & Trik</h3>
    <h1 class="text-center text-2xl font-bold mb-6">Tips & Trik</h1>
    <div class="flex min-h-screen">
      <div class="flex-shrink-0 w-4/5">

            @include('frontend.views.tips.components.tips')

        </div>


        @include('components.banner')

    </div>
@endsection
