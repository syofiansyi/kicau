<div class="news w-full">
    <div class="event-section relative bg-gray-100 px-6 py-8 w-full">

        <!-- Heading -->
        <div class="mb-6 text-left">
            <h1 class="text-2xl font-bold">Berita & Artikel</h1>
            <h3 class="text-gray-500 text-sm font-light">
                Jelajahi lebih dalam dan temukan semua tentang kegiatan kami
            </h3>
        </div>

        <!-- Buttons -->
        <div class="flex gap-2 mb-4">
            <button id="news-prev" class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow">
                <i class="fa fa-chevron-left"></i>
            </button>

            <button id="news-next" class="bg-white border border-gray-300 rounded-full px-4 py-2 shadow">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>

        <!-- VIEWPORT (hanya 1 card terlihat) -->
        <div class="w-full lg:w-3/4 mx-auto overflow-hidden">

            <!-- CAROUSEL -->
            <div id="news-carousel" class="flex transition-transform duration-300 ease-in-out">

                @foreach ($news as $berita)
                    <a href="{{ route('detail_berita', [$berita->id, $berita->slug]) }}" class="w-full flex-shrink-0">

                        <div class="bg-white rounded-lg shadow-md overflow-hidden">

                            <img src="{{ asset('Upload/news/' . $berita->photo) }}"
                                class="w-full max-h-[30vh] object-cover">

                            <div class="p-6">
                                <h3 class="font-semibold text-xl mb-3">
                                    {{ $berita->title }}
                                </h3>
                                <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                    {{ Str::words(strip_tags($berita->description), 30, '...') }}
                                    selengkapnya
                                </p>


                                <p class="text-sm text-gray-500">
                                    <i class="fa fa-calendar"></i> {{ $berita->tanggal }}
                                </p>
                            </div>
                        </div>

                    </a>
                @endforeach


            </div>
        </div>
    </div>
</div>

<script>
    const newsCarousel = document.getElementById('news-carousel');
    const newsItems = newsCarousel.children.length;
    let newsIndex = 0;

    document.getElementById('news-next').addEventListener('click', () => {
        if (newsIndex < newsItems - 1) newsIndex++;
        newsCarousel.style.transform = `translateX(-${newsIndex * 100}%)`;
    });

    document.getElementById('news-prev').addEventListener('click', () => {
        if (newsIndex > 0) newsIndex--;
        newsCarousel.style.transform = `translateX(-${newsIndex * 100}%)`;
    });
</script>
