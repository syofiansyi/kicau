<div class="event-section relative bg-gray-100 p-6">
    <div class="text-left" style="text-align: left !important;">
        <h2 class=" text-left fw-bold">Daftar Juara</h2>
        <p class=" text-left text-muted">Pecinta Lovebird Terkemuka: Mereka yang Mengukir Sejarah</p>
    </div>

    <!-- Scroll Buttons -->
    <button id="scroll-left-juara" class="absolute top-1/2 left-2 -translate-y-1/2 z-10 bg-white border border-gray-300 rounded-full px-3 py-2 shadow">
        ←
    </button>
    <button id="scroll-right-juara" class="absolute top-1/2 right-2 -translate-y-1/2 z-10 bg-white border border-gray-300 rounded-full px-3 py-2 shadow">
        →
    </button>

    <!-- Carousel -->
    <div id="carousel-juara" class="carousel-container flex overflow-x-auto gap-4 scroll-smooth px-8 py-4">
        <!-- Sample Cards -->
        @foreach ($juara as $event)
            <div class="event-card min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('detail_juara', [$event->id,$event->slug]) }}">
                    <img src="{{ asset('Upload/juara/' . $event->photo) }}" alt="Event Image" class="w-full h-40 object-cover event-image" />
                </a>

                <div class="p-4">
                    <h3 class="event-title font-semibold text-lg mb-2">{{$event->title}}</h3>
                    <a href="{{ route('detail_juara', [$event->id,$event->slug]) }}" class="btn btn-sm btn-primary my-2" style="background-color: #0a0a0a">Detail Event</a>
                </div>
            </div>
        @endforeach

        <!-- Tambahkan lebih banyak .event-card jika perlu -->
    </div>
</div>
