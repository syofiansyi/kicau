<div class="w-full">
    <div class="sticky top-0 h-screen flex justify-end items-center">
        <div class="relative h-full flex items-center">

            <!-- SOCIAL POPUP -->
            <div id="socialPopup"
                class="absolute left-0 top-1/3 -translate-y-1/3
                       flex flex-col gap-4 p-2
                       translate-x-0 opacity-0
                       transition-all duration-300 ease-out">

                <a href="https://vt.tiktok.com/ZS51kyvyj/?page=Mall" target="_blank">
                    <img src="{{ asset('Upload/slider/tiktok.png') }}"
                        class="w-20 h-20 rounded-lg shadow-lg hover:scale-105 transition-transform" alt="TikTok">
                </a>

                <a href="https://s.shopee.co.id/7fT5gAwZM6" target="_blank">
                    <img src="{{ asset('Upload/slider/shopee.jpg') }}"
                        class="w-20 h-20 rounded-lg shadow-lg hover:scale-105 transition-transform" alt="Shopee">
                </a>
            </div>

            <!-- BANNER -->
            @foreach ($globalSliders as $slider)
                <div id="banner" class="w-full h-full overflow-hidden shadow-lg cursor-pointer">
                    <img src="{{ asset('Upload/slider/' . $slider->photo) }}" class="w-full h-full object-cover"
                        loading="lazy">
                </div>
            @endforeach



        </div>
    </div>
</div>

<script>
    const banner = document.getElementById('banner');
    const popup = document.getElementById('socialPopup');

    banner.addEventListener('click', () => {
        popup.classList.toggle('opacity-0');
        popup.classList.toggle('-translate-x-24');
    });
</script>
