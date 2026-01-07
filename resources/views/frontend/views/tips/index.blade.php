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

    <div class="d-flex justify-content-center mb-4 py-6">
        <form method="GET" action="{{ route('tips') }}" style="width: 100%;">
            <div class="input-group" style="border-radius: 25px">
                <span class="bg-white"
                    style="
          border-right: none;
          padding-left: 1.5rem;
          padding-right: 0;
          border-top-left-radius: 25px;
          border-bottom-left-radius: 25px;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-shrink: 0;
        ">
                    <i class="fa fa-search"></i>
                </span>
                <input type="text" name="search" class="form-control "
                    placeholder="Cari di Kopdar Loverbird Indonesia ....." value="{{ request('search') }}"
                    aria-label="Cari Pertandingan"
                    style="
          border: none;
          border-radius: 0;
          border-top-right-radius: 25px;
          border-bottom-right-radius: 25px;
        " />
            </div>
        </form>
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
