<div class="event-section relative bg-gray-100 p-6">
    <h3 class="text-center text-lg font-semibold text-gray-500">Lovebird Jadwal Pertandingan</h3>
    <h1 class="text-center text-2xl font-bold mb-6">Pertandingan</h1>

    <!-- Scroll Buttons -->
    <button id="pertandingan-scroll-left" class="absolute top-1/2 left-2 -translate-y-1/2 z-10 bg-white border border-gray-300 rounded-full px-3 py-2 shadow">
        ←
    </button>
    <button id="pertandingan-scroll-right" class="absolute top-1/2 right-2 -translate-y-1/2 z-10 bg-white border border-gray-300 rounded-full px-3 py-2 shadow">
        →
    </button>

    <!-- Carousel -->
    <div id="pertandingan-carousel" class="carousel-container flex overflow-x-auto gap-4 scroll-smooth px-8 py-4">
        <!-- Sample Cards -->
        @foreach ($jadwals as $jadwal)
        <a href="{{ route('detail.group', $jadwal->id) }}" class="event-card min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('Upload/jadwal/' . $jadwal->photo) }}" alt="Event Image" class="w-full h-40 object-cover event-image" />
            <p class="date">
                <i class="fa fa-calendar-week fs-2 mx-2"></i>
                {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->translatedFormat('d F Y') }} -
                {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->translatedFormat('d F Y') }}
            </p>
            <h3 class="title">{{ $jadwal->title }}</h3>
        </a>
        @endforeach

        <!-- Tambahkan lebih banyak .event-card jika perlu -->
    </div>
</div>
