<div class="event-section relative bg-gray-100 px-6 py-8 w-full">

    <!-- Heading -->
    <div class="mb-6 text-left">
        <h1 class="text-2xl font-bold">Pertandingan</h1>
        <h3 class="text-gray-500 text-sm font-light">
            Lovebird Jadwal Pertandingan
        </h3>
    </div>

    <!-- Buttons -->
    <div class="flex gap-2 mb-4">
        <button id="pertandingan-prev"
            class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow">
            <i class="fa fa-chevron-left"></i>
        </button>

        <button id="pertandingan-next"
            class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow">
            <i class="fa fa-chevron-right"></i>
        </button>
    </div>

    <!-- VIEWPORT (ACUAN NEWS) -->
    <div class="w-full lg:w-3/4 mx-auto overflow-hidden">

        <!-- CAROUSEL -->
        <div id="pertandingan-carousel"
            class="flex transition-transform duration-300 ease-in-out">

            @foreach ($jadwals as $jadwal)
            <a href="{{ route('detail.group', $jadwal->id) }}"
                class="w-full flex-shrink-0">

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('Upload/jadwal/' . $jadwal->photo) }}"
                        class="w-full max-h-[30vh] object-cover">

                    <div class="p-6">
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fa fa-calendar-week mr-2"></i>
                            {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->translatedFormat('d F Y') }}
                            -
                            {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->translatedFormat('d F Y') }}
                        </p>

                        <h3 class="font-semibold text-xl">
                            {{ $jadwal->title }}
                        </h3>
                    </div>
                </div>

            </a>
            @endforeach

        </div>
    </div>
</div>

<script>
    const pertandinganCarousel = document.getElementById('pertandingan-carousel');
    const pertandinganItems = pertandinganCarousel.children.length;
    let pertandinganIndex = 0;

    document.getElementById('pertandingan-next').addEventListener('click', () => {
        if (pertandinganIndex < pertandinganItems - 1) pertandinganIndex++;
        pertandinganCarousel.style.transform = `translateX(-${pertandinganIndex * 100}%)`;
    });

    document.getElementById('pertandingan-prev').addEventListener('click', () => {
        if (pertandinganIndex > 0) pertandinganIndex--;
        pertandinganCarousel.style.transform = `translateX(-${pertandinganIndex * 100}%)`;
    });
</script>
