<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div class="app-container container-fluid">
            <!--Event-->

            <div ref="eventContainer" class="event-carousel transition-all duration-1000 ease-in-out"
                :class="{ 'animate-fade-in': isVisible }">
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <a href="{{ route('getDetailEvent', $event->id) }}">
                                <div class="event-card hover:scale-105 transition-transform duration-300">
                                    <div class="image-container">
                                        <img src="{{ asset('Upload/event/' . $event->photo) }}" class="event-image"
                                            alt="Event Image" />
                                    </div>
                                    <div class="event-info">
                                        <p class="location text-sm text-gray-500 mb-1">
                                            <i class="fa fa-map-marker "></i> {{ $event->lokasi }}
                                        </p>
                                        <p class="date text-sm text-gray-500 mb-1">
                                            <i class="fa fa-calendar"></i> {{ $event->tanggal }}
                                        </p>
                                        <a href="{{ $event->link }}" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="bi bi-download"></i>
                                        </a>
                                        <h3 class="title">{{ $event->title }}</h3>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('getDetailEvent', $event->id) }}"
                                                class="btn btn-sm btn-primary my-2"
                                                style="background-color: #0a0a0a">Detail Event</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {!! $events->links('pagination::bootstrap-5') !!}
                </div>


            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
