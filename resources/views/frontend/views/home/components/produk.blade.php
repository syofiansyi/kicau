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
            <a href="{{ route('produk.detail', [$item->id]) }}"
                class="group block bg-white rounded-xl shadow-md overflow-hidden
              transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                <!-- Image -->
                <div class="overflow-hidden">
                    <img src="{{ asset('Upload/produk/' . $item->photo) }}"
                        class="w-full max-h-[30vh] object-cover
                        transition-transform duration-300 group-hover:scale-105">
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
                                    {{ Str::words(strip_tags($item->description), 30, '...') }}
                                    selengkapnya
                                </p>

                </div>
            </a>
        @empty
            <p class="text-center text-gray-500">
                Produk belum tersedia
            </p>
        @endforelse


    </div>
</div>
