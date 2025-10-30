<div class="event-section relative bg-gray-100 p-6">
    <h3 class="text-center text-lg font-semibold text-gray-500">Lovebird Event Agenda</h3>
    <h1 class="text-center text-2xl font-bold mb-6">Schedule</h1>
 <div class="d-flex justify-content-center mb-4">
    <form method="GET" action="{{ route('home') }}" style="width: 60%;">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Input field to searching..."
                value="{{ request('search') }}"
                aria-label="Cari Pertandingan"
            />
                    <select 
            name="filter" 
            class="border border-gray-300 rounded-lg p-2 w-full md:w-1/3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
        >
            <option value="">Semua</option>
            <option value="news" {{ request('filter') == 'news' ? 'selected' : '' }}>Berita</option>
            <option value="events" {{ request('filter') == 'events' ? 'selected' : '' }}>Event</option>
            <option value="jadwals" {{ request('filter') == 'jadwals' ? 'selected' : '' }}>Jadwal</option>
        </select>

            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
</div>
    <!-- Scroll Buttons -->
    <button id="scroll-left" class="absolute top-1/2 left-2 -translate-y-1/2 z-10 bg-white border border-gray-300 rounded-full px-3 py-2 shadow">
        ←
    </button>
    <button id="scroll-right" class="absolute top-1/2 right-2 -translate-y-1/2 z-10 bg-white border border-gray-300 rounded-full px-3 py-2 shadow">
        →
    </button>

    <!-- Carousel -->
    <div id="carousel" class="carousel-container flex overflow-x-auto gap-4 scroll-smooth px-8 py-4">
        <!-- Sample Cards -->
        @foreach ($events as $event)
        <div class="event-card min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('Upload/event/' . $event->photo) }}" alt="Event Image" class="w-full h-40 object-cover event-image" />
            <div class="p-4">
                <p class="location text-sm text-gray-500 mb-1">
                    <i class="fa fa-map-marker "></i> {{$event->lokasi}}
                </p>
                <p class="date text-sm text-gray-500 mb-1">
                    <i class="fa fa-calendar"></i> {{$event->tanggal}}
                </p>
                <p class="price text-red-600 font-bold mb-2 text-danger">Rp {{ number_format($event->harga, 0, ',', '.') }}</p>
                <h3 class="event-title font-semibold text-lg mb-2">{{$event->title}}</h3>
                <div class="d-flex justify-content-start">
                    <a href="{{ route('getDetailEvent', $event->id) }}" class="btn btn-sm btn-primary my-2" style="background-color: #0a0a0a">Detail Event</a>
                </div>

            </div>
        </div>
        @endforeach

        <!-- Tambahkan lebih banyak .event-card jika perlu -->
    </div>
</div>
