<div class="event-section relative bg-gray-100 px-6 py-8 w-full">

    <!-- Heading -->
    <div class="mb-6 text-left">
        <h1 class="text-2xl font-bold">Daftar Juara</h1>
        <h3 class="text-gray-500 text-sm font-light">
            Pecinta Lovebird Terkemuka: Mereka yang Mengukir Sejarah
        </h3>
    </div>

    <!-- Buttons -->
    <div class="flex gap-2 mb-4">
        <button id="juara-prev" class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow disabled:opacity-40">
            <i class="fa fa-chevron-left"></i>
        </button>

        <button id="juara-next" class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow disabled:opacity-40">
            <i class="fa fa-chevron-right"></i>
        </button>
    </div>

    <!-- VIEWPORT -->
    <div class="w-full lg:w-3/4 mx-auto overflow-hidden">

        <!-- CAROUSEL -->
        <div id="juara-carousel" class="flex transition-transform duration-500 ease-in-out">

            @forelse ($juara as $juara)
                <div class="w-full flex-shrink-0 px-2">

                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden
                    transition hover:shadow-lg">

                     <div class="w-full h-[30vh] overflow-auto">
                             <img src="{{ asset('Upload/juara/' . $juara->photo) }}"
                                class="min-w-full min-h-full object-fill" />
                        </div>

                    
                        <div class="p-6">
                            <h3 class="font-semibold text-xl mb-3">
                                {{ $juara->title }}
                            </h3>

                             <p class="text-gray-600 mb-4 text-sm max-h-5vh leading-relaxed line-clamp-4">
                                {!! strip_tags($juara->description) !!}

                            </p>


                            <p class="text-sm text-gray-500">
                                <i class="fa fa-calendar"></i> {{ $juara->created_at }}
                            </p>
                              <a href="{{ route('detail_juara', [$juara->id, $juara->slug]) }}"
                                class="inline-block mt-4 px-4 py-2 text-white text-sm rounded bg-black">
                                Detail Juara
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <p class="text-center text-gray-500 w-full">
                    juara belum tersedia
                </p>
            @endforelse


        </div>
    </div>
</div>
<script>
    const juaraCarousel = document.getElementById('juara-carousel');
    const juaraPrev = document.getElementById('juara-prev');
    const juaraNext = document.getElementById('juara-next');

    const totaljuara = juaraCarousel.children.length;
    let juaraIndex = 0;

    function updatejuaraCarousel() {
        juaraCarousel.style.transform = `translateX(-${juaraIndex * 100}%)`;

        juaraPrev.disabled = juaraIndex === 0;
        juaraNext.disabled = juaraIndex === totaljuara - 1;
    }

    juaraNext.addEventListener('click', () => {
        if (juaraIndex < totaljuara - 1) {
            juaraIndex++;
            updatejuaraCarousel();
        }
    });

    juaraPrev.addEventListener('click', () => {
        if (juaraIndex > 0) {
            juaraIndex--;
            updatejuaraCarousel();
        }
    });

    updatejuaraCarousel();
</script>
