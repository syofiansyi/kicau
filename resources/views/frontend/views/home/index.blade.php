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


    <div class="d-flex justify-content-center mb-4 ">
        <form method="GET" action="{{ route('home') }}" style="width: 100%;">
            <div class="input-group d-flex" style="
        width: 100%;
        
      ">
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

                <input type="search" name="search" class="form-control"
                    placeholder="Cari di Kopdar Loverbird Indonesia ....." value="{{ request('search') }}"
                    aria-label="Cari Pertandingan" enterkeyhint="search"
                    style="
          border: none;
          border-right: 1px solid #ddd;
          flex-grow: 1;
          flex-basis: 0;
          min-width: 0;
          padding: 0.5rem 1rem;
          border-radius: 0;
        " />

                <select name="filter" class="form-select"
                    style="
          border: none;
          border-left: none;
          border-top-right-radius: 25px;
          border-bottom-right-radius: 25px;
          flex-shrink: 0;
          flex-basis: 120px;
          max-width: 120px;
          min-width: 120px;
        ">
                    <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Semua</option>
                    <option value="news" {{ request('filter') == 'news' ? 'selected' : '' }}>Berita</option>
                    <option value="events" {{ request('filter') == 'events' ? 'selected' : '' }}>Event</option>
                    <option value="tips" {{ request('filter') == 'tips' ? 'selected' : '' }}>Tips & Trick</option>
                </select>
            </div>
        </form>
    </div>

    @include('components.sosmed')

    <div class="flex min-h-screen">
        {{-- KIRI: CONTENT --}}
      <div class="w-3/5 px-4 py-6 mx-auto space-y-10">
    @include('frontend.views.home.components.event')
    @include('frontend.views.home.components.berita')
    @include('frontend.views.home.components.anggota')
    @include('frontend.views.home.components.tips')
    @include('frontend.views.home.components.daftar_juara')
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
