<div class="event-section relative bg-gray-100 p-6 w-full">

    <!-- Heading -->
    <div class="mb-6 text-left">
        <h1 class="text-2xl font-bold">Daftar Juara</h1>
        <h3 class="text-gray-500 text-sm font-light">
            Pecinta Lovebird Terkemuka: Mereka yang Mengukir Sejarah
        </h3>
    </div>

    <!-- Buttons -->
    <div class="flex gap-2 mb-4">
        <button id="juara-prev"
            class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow disabled:opacity-40">
            <i class="fa fa-chevron-left"></i>
        </button>

        <button id="juara-next"
            class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow disabled:opacity-40">
            <i class="fa fa-chevron-right"></i>
        </button>
    </div>

    <!-- VIEWPORT -->
    <div class="w-full lg:w-3/4 mx-auto overflow-hidden">

        <!-- CAROUSEL -->
        <div id="carousel-juara" class="flex transition-transform duration-500 ease-in-out">

            @forelse ($juara as $event)
                <div class="w-full flex-shrink-0 px-2">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden h-full">

                        <a href="{{ route('detail_juara', [$event->id, $event->slug]) }}">
                            <img src="{{ asset('Upload/juara/' . $event->photo) }}"
                                class="w-full max-h-[30vh] object-cover">
                        </a>

                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-4">
                                {{ $event->title }}
                            </h3>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                    {{ Str::words(strip_tags($event->description), 30, '...') }}
                                    selengkapnya
                                </p>

                            <a href="{{ route('detail_juara', [$event->id, $event->slug]) }}"
                                class="inline-block px-4 py-2 text-white text-sm rounded bg-black">
                                Detail Juara
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 w-full">
                    Data juara belum tersedia
                </p>
            @endforelse

        </div>
    </div>
</div>
<script>
    const juaraCarousel = document.getElementById('carousel-juara');
    const juaraPrev = document.getElementById('juara-prev');
    const juaraNext = document.getElementById('juara-next');

    const totalJuara = juaraCarousel.children.length;
    let juaraIndex = 0;

    function updateJuaraCarousel() {
        juaraCarousel.style.transform = `translateX(-${juaraIndex * 100}%)`;

        juaraPrev.disabled = juaraIndex === 0;
        juaraNext.disabled = juaraIndex === totalJuara - 1;
    }

    juaraNext.addEventListener('click', () => {
        if (juaraIndex < totalJuara - 1) {
            juaraIndex++;
            updateJuaraCarousel();
        }
    });

    juaraPrev.addEventListener('click', () => {
        if (juaraIndex > 0) {
            juaraIndex--;
            updateJuaraCarousel();
        }
    });

    updateJuaraCarousel();
</script>
