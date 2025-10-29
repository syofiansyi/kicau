@extends('Frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - Event
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    {{--Hero Slider--}}
    <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ session('error') }}',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Tutup'
                    });
                @endif

                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                @endif
            });
    </script>
    @include('Frontend.views.event.components.event')
@endsection
