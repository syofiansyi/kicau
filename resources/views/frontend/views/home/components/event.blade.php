<div class="event-section relative bg-gray-100 p-6">
  
 <div class="d-flex justify-content-center mb-4">
  <form method="GET" action="{{ route('home') }}" style="width: 100%;">
    <div class="input-group" style="border-radius: 25px; overflow: hidden; border: 1px solid #ddd;">
      <span
        class="input-group-text bg-white"
        style="border-right: none; padding-left: 1.5rem; padding-right: 0rem; border-top-left-radius: 25px; border-bottom-left-radius: 25px;"
      >
        <i class="fa fa-search"></i>
      </span>
      <input
        type="text"
        name="search"
        class="form-control shadow-gray-100"
        placeholder="Cari di Kopdar Loverbird Indonesia ....."
        value="{{ request('search') }}"
        aria-label="Cari Pertandingan"
        style="border-left: none; border-top-right-radius: 0; border-bottom-right-radius: 0;"
      />
      <select
        name="filter"
            class="border border-gray-300 rounded-lg p-2 w-full md:w-1/3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
        style="border-left: none; border-top-right-radius: 25px; border-bottom-right-radius: 25px;"
      >
        <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Semua</option>
        <option value="news" {{ request('filter') == 'news' ? 'selected' : '' }}>Berita</option>
        <option value="events" {{ request('filter') == 'events' ? 'selected' : '' }}>Event</option>
        <option value="jadwals" {{ request('filter') == 'jadwals' ? 'selected' : '' }}>Jadwal</option>
      </select>
    </div>
  </form>
</div>

    <h3 class="text-center text-lg font-semibold text-gray-500">Lovebird Event Agenda</h3>
    <h1 class="text-center text-2xl font-bold mb-6">Schedule</h1>

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
