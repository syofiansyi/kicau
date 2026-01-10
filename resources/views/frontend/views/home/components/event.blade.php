<div class="event-section relative bg-gray-100 p-6">
    <h3 class="text-center text-lg font-semibold text-gray-500 mb-10">
        KOPDAR LOVE BIRD INDONESIA
    </h3>
    <div class="mb-6 text-left">
        <h1 class="text-2xl font-bold">Agenda</h1>
        <h3 class="text-gray-500 text-sm font-light">
            Pecinta Lovebird Terkemuka: Mereka yang Mengukir Sejarah
        </h3>
    </div>

    <!-- Buttons -->
    <div class="flex gap-2 mb-4">
        <button id="scroll-left"
            class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow disabled:opacity-40">
            <i class="fa fa-chevron-left"></i>
        </button>

        <button id="scroll-right"
            class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow disabled:opacity-40">
            <i class="fa fa-chevron-right"></i>
        </button>
    </div>

    <!-- VIEWPORT -->
    <div class="w-full lg:w-3/4 mx-auto overflow-hidden">
        <!-- CAROUSEL -->
        <div id="carousel" class="flex transition-transform duration-500 ease-in-out">

            @forelse ($events as $event)
                <div class="w-full flex-shrink-0 px-2">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">

                        <div class="w-full h-[30vh] overflow-auto">
                            <img src="{{ asset('Upload/event/' . $event->photo) }}"
                                class="min-w-full min-h-full object-fill" />
                        </div>

                        <div class="p-4">
                            <div>

                            </div>
                            <p class="text-sm text-gray-500 mb-1">
                                <i class="fa fa-map-marker"></i> {{ $event->lokasi }}
                            </p>

                            <p class="text-sm text-gray-500 mb-1">
                                <i class="fa fa-calendar"></i> {{ $event->tanggal }}
                            </p>

                            <p class="text-red-600 font-bold mb-2">
                                Rp {{ number_format($event->harga, 0, ',', '.') }}
                            </p>

                            <h3 class="font-semibold text-lg mb-2">
                                {{ $event->title }}
                            </h3>

                            <p class="text-gray-600 mb-4 text-sm max-h-5vh leading-relaxed line-clamp-4">
                                {!! strip_tags($event->description) !!}

                            </p>

                            <a href="{{ route('getDetailEvent', $event->id) }}"
                                class="inline-block mt-4 px-4 py-2 text-white text-sm rounded bg-black">
                                Detail Event
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 w-full">
                    Event belum tersedia
                </p>
            @endforelse


        </div>
    </div>
</div>
<script>
    const carousel = document.getElementById('carousel');
    const btnLeft = document.getElementById('scroll-left');
    const btnRight = document.getElementById('scroll-right');

    const totalItems = carousel.children.length;
    let index = 0;

    function updateCarousel() {
        carousel.style.transform = `translateX(-${index * 100}%)`;

        btnLeft.disabled = index === 0;
        btnRight.disabled = index === totalItems - 1;
    }

    btnRight.addEventListener('click', () => {
        if (index < totalItems - 1) {
            index++;
            updateCarousel();
        }
    });

    btnLeft.addEventListener('click', () => {
        if (index > 0) {
            index--;
            updateCarousel();
        }
    });

    updateCarousel();
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('imgScroll');
        const img = document.getElementById('eventImg');
        const up = document.getElementById('scrollUp');
        const down = document.getElementById('scrollDown');

        function checkOverflow() {
            if (img.offsetHeight > container.clientHeight) {
                up.classList.remove('hidden');
                down.classList.remove('hidden');
            } else {
                up.classList.add('hidden');
                down.classList.add('hidden');
            }
        }

        up.onclick = () => {
            container.scrollBy({
                top: -150,
                behavior: 'smooth'
            });
        };

        down.onclick = () => {
            container.scrollBy({
                top: 150,
                behavior: 'smooth'
            });
        };

        img.onload = checkOverflow;
        window.addEventListener('resize', checkOverflow);
    });
</script>
