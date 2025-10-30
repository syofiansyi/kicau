<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div class="app-container container-fluid">
            <!--Event-->
           
            <div ref="eventContainer"
                 class="event-carousel transition-all duration-1000 ease-in-out"
                 :class="{ 'animate-fade-in': isVisible }">
                  <div class=" mt-4">
    <div class="d-flex justify-content-center mb-4">
    <form method="GET" action="{{ route('event-all') }}" style="width: 60%;">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari Event..."
                value="{{ request('search') }}"
                aria-label="Cari Event"
            />
            <button class="btn btn-primary" type="submit">  <i class="fa fa-search"></i>
</button>
        </div>
    </form>
</div>
                <h3 class="text-center text-lg font-semibold text-gray-500">Lovedbird Event Agenda</h3>
                <h1 class="text-center text-2xl font-bold">Schedule</h1>
                
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <a href="{{ route('getDetailEvent', $event->id) }}">
                            <div class="event-card hover:scale-105 transition-transform duration-300">
                                <div class="image-container">
                                    <img src="{{ asset('Upload/event/' . $event->photo) }}" class="event-image" alt="Event Image" />
                                </div>
                                <div class="event-info">
                                    <p class="location text-sm text-gray-500 mb-1">
                                        <i class="fa fa-map-marker "></i> {{$event->lokasi}}
                                    </p>
                                    <p class="date text-sm text-gray-500 mb-1">
                                        <i class="fa fa-calendar"></i> {{$event->tanggal}}
                                    </p>
                                    <p class="fw-bold text-danger mb-2" style="font-size: 1.1rem; font-weight: bold">Rp {{ number_format($event->harga, 0, ',', '.') }}</p>
                                    <h3 class="title">{{ $event->title }}</h3>
                                    <div class="d-flex justify-content-start">
                                        <a href="{{ route('getDetailEvent', $event->id) }}" class="btn btn-sm btn-primary my-2" style="background-color: #0a0a0a">Detail Event</a>
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
