<div class="event-section relative bg-gray-100 px-6 py-8 w-full">

    <!-- Heading -->
    <div class="mb-6 text-left">
        <h1 class="text-2xl font-bold">Tips & Trik</h1>
        <h3 class="text-gray-500 text-sm font-light">
            Tips bermanfaat untuk pecinta lovebird
        </h3>
    </div>

    <!-- Buttons -->
    <div class="flex gap-2 mb-4">
        <button id="tips-prev" class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow disabled:opacity-40">
            <i class="fa fa-chevron-left"></i>
        </button>

        <button id="tips-next" class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow disabled:opacity-40">
            <i class="fa fa-chevron-right"></i>
        </button>
    </div>

    <!-- VIEWPORT -->
    <div class="w-full lg:w-3/4 mx-auto overflow-hidden">

        <!-- CAROUSEL -->
        <div id="tips-carousel" class="flex transition-transform duration-500 ease-in-out">

            @forelse ($tips as $tip)
                <a href="{{ route('tips.detail', [$tip->id]) }}" class="w-full flex-shrink-0 px-2">

                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden
                    transition hover:shadow-lg">

                        <img src="{{ asset('Upload/tips/' . $tip->photo) }}" class="w-full max-h-[30vh] object-cover">

                        <div class="p-6">
                            <h3 class="font-semibold text-xl mb-3">
                                {{ $tip->title }}
                            </h3>

                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                    {{ Str::words(strip_tags($tip->description), 30, '...') }}
                                    selengkapnya
                                </p>


                            <p class="text-sm text-gray-500">
                                <i class="fa fa-calendar"></i> {{ $tip->tanggal }}
                            </p>
                        </div>
                    </div>

                </a>
            @empty
                <p class="text-center text-gray-500 w-full">
                    Tips belum tersedia
                </p>
            @endforelse


        </div>
    </div>
</div>
<script>
    const tipsCarousel = document.getElementById('tips-carousel');
    const tipsPrev = document.getElementById('tips-prev');
    const tipsNext = document.getElementById('tips-next');

    const totalTips = tipsCarousel.children.length;
    let tipsIndex = 0;

    function updateTipsCarousel() {
        tipsCarousel.style.transform = `translateX(-${tipsIndex * 100}%)`;

        tipsPrev.disabled = tipsIndex === 0;
        tipsNext.disabled = tipsIndex === totalTips - 1;
    }

    tipsNext.addEventListener('click', () => {
        if (tipsIndex < totalTips - 1) {
            tipsIndex++;
            updateTipsCarousel();
        }
    });

    tipsPrev.addEventListener('click', () => {
        if (tipsIndex > 0) {
            tipsIndex--;
            updateTipsCarousel();
        }
    });

    updateTipsCarousel();
</script>
