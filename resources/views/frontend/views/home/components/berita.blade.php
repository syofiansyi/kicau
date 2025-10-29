<div class="news row">
    <div class="event-section relative bg-gray-100 p-6">
        <div class="pt-5 pb-2">
            <h1 class="text-left text-2xl font-bold">Berita & Artikel</h1>
            <h3 class="text-left text-lg font-semibold" style="color: #777777; font-weight: lighter;font-size: 16px">Jelajahi lebih dalam dan temukan semua tentang kegiatan kami</h3>
        </div>

        <!-- Scroll Buttons -->
        <button id="news-scroll-left" class="absolute top-1/2 left-2 -translate-y-1/2 z-10 bg-white border border-gray-300 rounded-full px-3 py-2 shadow">
            ?
        </button>
        <button id="news-scroll-right" class="absolute top-1/2 right-2 -translate-y-1/2 z-10 bg-white border border-gray-300 rounded-full px-3 py-2 shadow">
            ?
        </button>

        <!-- Carousel -->
        <div id="news-carousel" class="carousel-container flex overflow-x-auto gap-4 scroll-smooth px-8 py-4">
            <!-- Sample Cards -->
            @foreach ($news as $berita)
            <a href="{{ route('detail_berita', [$berita->id,$berita->slug]) }}" class="event-card min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('Upload/news/' . $berita->photo) }}" alt="Event Image" class="w-full h-40 object-cover event-image" />
                <div class="p-4">
                    <h3 class="event-title font-semibold text-lg mb-2">{{$berita->title}}</h3>
                    @php
                    $plainText = strip_tags($berita->description); // Hilangkan tag HTML
                    $words = explode(' ', $plainText); // Pisahkan jadi array kata
                    $excerpt = implode(' ', array_slice($words, 0, 5)); // Ambil 30 kata pertama
                    @endphp

                    <p style="color: black">{{ $excerpt }}{{ count($words) > 5 ? '...' : '' }}</p>

                    <span style="color: black">{{$berita->tanggal}}</span>
                </div>
            </a>
            @endforeach

            <!-- Tambahkan lebih banyak .event-card jika perlu -->
        </div>
    </div>
</div>
