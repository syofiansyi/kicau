<div class="sticky top-0 z-40 bg-gray-50">
    <div class="text-center py-8 px-4">
        <h3 class="text-xl md:text-2xl font-semibold text-gray-600 mb-6 tracking-wide">
            Ikuti Kami di Sosial Media
        </h3>

        <div class="flex flex-wrap justify-center items-center gap-3">
            @php
                $socials = [
                    [
                        'icon' => 'whatsapp',
                        'bg' => '#dcfce7',
                        'hoverBg' => '#bbf7d0',
                        'link' => 'https://wa.me/6282123622290',
                    ],
                    [
                        'icon' => 'tiktok',
                        'bg' => '#f3f4f6',
                        'hoverBg' => '#e5e7eb',
                        'link' => 'https://www.tiktok.com/@kopdarlovebird_indonesia?_r=1&_t=ZS-95L15AqiAtu',
                    ],
                    [
                        'icon' => 'youtube',
                        'bg' => '#fee2e2',
                        'hoverBg' => '#fecaca',
                        'link' => 'https://youtube.com/@abfhobbychannel2250',
                    ],
                    [
                        'icon' => 'instagram',
                        'bg' => '#fce7f3',
                        'hoverBg' => '#fbcfe8',
                        'link' => 'https://www.instagram.com/kopdar_lovebird_indonesia',
                    ],
                    [
                        'icon' => 'facebook',
                        'bg' => '#dbeafe',
                        'hoverBg' => '#bfdbfe',
                        'link' => 'https://www.facebook.com/share/1bVw5DpxEX/',
                    ],
                ];
            @endphp

            @foreach ($socials as $s)
                <a href="{{ $s['link'] }}" target="_blank" rel="noopener noreferrer"
                    class="
                    aspect-square
                    w-14 sm:w-16 md:w-20
                    flex items-center justify-center
                    rounded-full
                    bg-[{{ $s['bg'] }}]
                    hover:bg-[{{ $s['hoverBg'] }}]
                    shadow-sm hover:shadow-lg
                    transition-all duration-300 ease-out
                    hover:scale-110
               ">

                    {{-- ICON --}}
                    @switch($s['icon'])
                        @case('facebook')
                            <svg class="w-8 h-8" viewBox="0 0 24 24">
                                <path fill="#1877F2"
                                    d="M22 12a10 10 0 1 0-11.6 9.9v-7h-2.8V12h2.8V9.8
                                                                                          c0-2.8 1.7-4.3 4.2-4.3
                                                                                          1.2 0 2.4.2 2.4.2v2.6h-1.3
                                                                                          c-1.3 0-1.7.8-1.7 1.6V12h2.9
                                                                                          l-.5 2.9h-2.4v7A10 10 0 0 0 22 12z" />
                            </svg>
                        @break

                        @case('instagram')
                            <svg class="w-8 h-8" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="ig" x1="0%" y1="100%" x2="100%" y2="0%">
                                        <stop offset="0%" stop-color="#FEDA75" />
                                        <stop offset="30%" stop-color="#FA7E1E" />
                                        <stop offset="60%" stop-color="#D62976" />
                                        <stop offset="100%" stop-color="#962FBF" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#ig)"
                                    d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10
                                                                                          c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7z" />
                                <circle cx="12" cy="12" r="3.5" fill="none" stroke="#fff"
                                    stroke-width="1.5" />
                            </svg>
                        @break

                        @case('tiktok')
                            <svg class="w-8 h-8" viewBox="0 0 24 24">
                                <path fill="#000" d="M16 2c.4 2.6 2.4 4.6 5 5v4.1
                                                                                          c-1.9 0-3.6-.6-5-1.6v6.4
                                                                                          a6.5 6.5 0 1 1-6.5-6.5
                                                                                          c.4 0 .8 0 1.2.1v4.3
                                                                                          a2.3 2.3 0 1 0 1.8 2.2V2h3.5z" />
                            </svg>
                        @break

                        @case('youtube')
                            <svg class="w-8 h-8" viewBox="0 0 24 24">
                                <path fill="#FF0000"
                                    d="M23.5 6.2s-.2-1.6-.9-2.3
                                                                                          c-.8-.9-1.7-.9-2.1-1
                                                                                          C17.5 2.5 12 2.5 12 2.5
                                                                                          s-5.5 0-8.5.4c-.4.1-1.3.1-2.1 1
                                                                                          -.7.7-.9 2.3-.9 2.3S0 8 0 9.8v1.8
                                                                                          c0 1.8.2 3.6.2 3.6s.2 1.6.9 2.3
                                                                                          c.8.9 1.9.9 2.4 1 1.7.2 7.5.4 7.5.4
                                                                                          s5.5 0 8.5-.4c.4-.1 1.3-.1 2.1-1
                                                                                          .7-.7.9-2.3.9-2.3s.2-1.8.2-3.6V9.8z" />
                                <polygon fill="#fff" points="9.5,9.5 14.5,12 9.5,14.5" />
                            </svg>
                        @break

                        @case('whatsapp')
                            <svg class="w-8 h-8" viewBox="0 0 24 24" aria-hidden="true">
                                <!-- Background -->
                                <path fill="#25D366" d="M20.52 3.48A11.91 11.91 0 0 0 12.02 0
                                                                   C5.39 0 .02 5.37.02 12
                                                                   c0 2.11.55 4.17 1.6 5.98L0 24
                                                                   l6.18-1.62a11.94 11.94 0 0 0 5.84 1.49h.01
                                                                   c6.63 0 12-5.37 12-12
                                                                   0-3.2-1.25-6.2-3.5-8.39z" />
                                <!-- Phone -->
                                <path fill="#FFFFFF" d="M17.47 14.38c-.27-.14-1.6-.79-1.85-.88
                                                                   -.25-.09-.43-.14-.61.14
                                                                   -.18.27-.7.88-.86 1.06
                                                                   -.16.18-.32.2-.59.07
                                                                   -.27-.14-1.14-.42-2.17-1.34
                                                                   -.8-.72-1.34-1.61-1.5-1.88
                                                                   -.16-.27-.02-.42.12-.56
                                                                   .13-.13.27-.32.41-.48
                                                                   .14-.16.18-.27.27-.45
                                                                   .09-.18.05-.34-.02-.48
                                                                   -.07-.14-.61-1.48-.84-2.03
                                                                   -.22-.53-.45-.46-.61-.47
                                                                   -.16-.01-.34-.01-.52-.01
                                                                   -.18 0-.48.07-.73.34
                                                                   -.25.27-.96.94-.96 2.29
                                                                   0 1.35.98 2.65 1.12 2.83
                                                                   .14.18 1.93 2.95 4.67 4.14
                                                                   .65.28 1.15.45 1.54.58
                                                                   .65.21 1.24.18 1.71.11
                                                                   .52-.08 1.6-.65 1.83-1.28
                                                                   .23-.63.23-1.17.16-1.28
                                                                   -.07-.11-.25-.18-.52-.32z" />
                            </svg>
                        @break
                    @endswitch

                </a>
            @endforeach

        </div>
    </div>
</div>
