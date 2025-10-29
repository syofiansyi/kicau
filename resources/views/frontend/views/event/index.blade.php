@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Event
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    {{--Hero Slider--}}
    @include('frontend.views.event.components.event')
@endsection
