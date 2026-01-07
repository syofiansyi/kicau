<div class="event-section relative bg-gray-100 px-6 py-8 w-full">

    <!-- Heading -->
    <div class="mb-6 text-left">
        <h1 class="text-2xl font-bold">Produk Unggulan KLI</h1>
        <h3 class="text-gray-500 text-sm font-light">
            Produk Unggulan KLI Kopdar Lovebird Indonesia
        </h3>
    </div>

    <!-- LIST PRODUK -->
    <div class="space-y-6 w-full lg:w-3/4 mx-auto">

        @forelse ($produk as $item)
            <div
                class="group relative block bg-white rounded-xl shadow-md overflow-hidden
              transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                <!-- Image -->
                <div class="overflow-hidden cursor-pointer">
                    <img src="{{ asset('Upload/produk/' . $item->photo) }}"
                        class="w-full max-h-[30vh] object-cover transition-transform duration-300 group-hover:scale-105"
                        onclick="showPopup('popup-{{ $item->id }}')">
                </div>

                <!-- Content -->
                <div class="p-6">
                    <p class="text-red-600 font-bold mb-2 text-lg">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    <h3 class="font-semibold text-lg mb-2 text-gray-800">
                        {{ $item->title }}
                    </h3>

                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                        {{ Str::words(strip_tags($item->description), 30, '...') }} selengkapnya
                    </p>
                </div>

                <!-- Popup Sosial Media -->
                @if ($item->shopee || $item->tiktok)
                    <div id="popup-{{ $item->id }}"
                        class="hidden absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                        onmouseleave="hidePopup('popup-{{ $item->id }}')">
                        <div class="bg-white rounded-xl p-6 flex gap-6 items-center relative">

                            {{-- Shopee --}}
                            @if ($item->shopee)
                                <a href="{{ $item->shopee }}" target="_blank">
                                    <img src="{{ asset('Upload/slider/shopee.jpg') }}"
                                        class="w-10 h-10 rounded-lg shadow-lg
                                hover:scale-105 transition-transform"
                                        alt="Shopee">
                                </a>
                            @endif

                            {{-- TikTok --}}
                            @if ($item->tiktok)
                                <a href="{{ $item->tiktok }}" target="_blank">
                                    <img src="{{ asset('Upload/slider/tiktok.png') }}"
                                        class="w-10 h-10 rounded-lg shadow-lg
                                hover:scale-105 transition-transform"
                                        alt="TikTok">
                                </a>
                            @endif

                        </div>
                    </div>
                @endif

            </div>
        @empty
            <p class="text-center text-gray-500">
                Produk belum tersedia
            </p>
        @endforelse

    </div>
</div>

<script>
    function showPopup(id) {
        const popup = document.getElementById(id);
        if (popup) popup.classList.remove('hidden');
    }

    function hidePopup(id) {
        const popup = document.getElementById(id);
        if (popup) popup.classList.add('hidden');
    }

    // Optional: hilangkan popup jika klik di luar area popup & gambar
    document.addEventListener('click', function(e) {
        document.querySelectorAll('[id^="popup-"]').forEach(popup => {
            const content = popup.querySelector('div');
            if (!popup.classList.contains('hidden') && !content.contains(e.target) && !e.target.matches(
                    'img')) {
                popup.classList.add('hidden');
            }
        });
    });
</script>
