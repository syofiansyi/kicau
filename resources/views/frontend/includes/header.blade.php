@php
    $route = Route::current()->getName();
@endphp

<div id="kt_header" class="header bg-gray-800">
    <div class="container-fluid flex items-center p-2 md:p-4 pl-4 md:pl-6 lg:pl-8">
        <!-- Logo -->
        <div class="flex items-center px-[2vw] flex-shrink-0 mr-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('Frontend/img/logo.png') }}" alt="Logo" class="max-h-auto h-10" />
            </a>
        </div>

        <!-- Menu Horizontal rapat ke kiri -->
        <nav class="flex-1 ">
            <div class="flex items-center justify-start gap-[2vw] md:gap-6 lg:gap-8">

                <a href="{{ route('home') }}"
                    class="
      menu-link
      block text-left
      py-1

      text-[clamp(0.75rem,2.5vw,1rem)]
      leading-tight

      font-serif font-semibold tracking-wide
      transition-colors duration-300

      {{ $route == 'home' ? 'text-white' : 'text-gray-400 hover:text-white' }}
   ">
                    Home
                </a>

                <a href="{{ route('artikel_berita') }}"
                    class="
      menu-link
      block text-left
      py-1

      text-[clamp(0.75rem,2.5vw,1rem)]
      leading-tight

      font-serif font-semibold tracking-wide
      transition-colors duration-300

      {{ Str::contains(request()->url(), 'artikel_berita') ? 'text-white' : 'text-gray-400 hover:text-white' }}
   ">
                    Artikel Berita
                </a>

                <a href="{{ route('event-all') }}"
                    class="
      menu-link
      block text-left
      py-1

      text-[clamp(0.75rem,2.5vw,1rem)]
      leading-tight

      font-serif font-semibold tracking-wide
      transition-colors duration-300

      {{ Str::contains(request()->url(), 'event') ? 'text-white' : 'text-gray-400 hover:text-white' }}
   ">
                    Event
                </a>

                <a href="{{ route('tips') }}"
                    class="
      menu-link
      block text-left
      py-1

      text-[clamp(0.75rem,2.5vw,1rem)]
      leading-tight

      font-serif font-semibold tracking-wide
      transition-colors duration-300

      {{ Str::contains(request()->url(), 'tips') ? 'text-white' : 'text-gray-400 hover:text-white' }}
   ">
                    Tips & Trik
                </a>

                <a href="{{ route('about') }}"
                    class="
      menu-link
      block text-left
      py-1

      text-[clamp(0.75rem,2.5vw,1rem)]
      leading-tight

      font-serif font-semibold tracking-wide
      transition-colors duration-300

      {{ $route == 'about' ? 'text-white' : 'text-gray-400 hover:text-white' }}
   ">
                    About
                </a>


            </div>
        </nav>
    </div>
</div>
