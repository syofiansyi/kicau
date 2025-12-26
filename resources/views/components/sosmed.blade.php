 <div class="text-center py-8 px-4">
     <h3 class="text-xl md:text-2xl font-semibold text-gray-600 mb-6 tracking-wide">Ikuti Kami di Sosial
         Media</h3>
     <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
         @php
             $socials = [
    [
        'icon' => 'whatsapp',
        'color' => 'green',
        'bg' => '#dcfce7',
        'hoverBg' => '#bbf7d0',
        'link' => 'https://wa.me/628xxxxxxxxxx',
    ],
    [
        'icon' => 'tiktok',
        'color' => 'black',
        'bg' => '#f3f4f6',
        'hoverBg' => '#e5e7eb',
        'link' => 'https://www.tiktok.com/@kopdarlovebirdindonesia',
    ],
    [
        'icon' => 'youtube',
        'color' => 'red',
        'bg' => '#fee2e2',
        'hoverBg' => '#fecaca',
        'link' => 'https://www.youtube.com/@kopdarlovebirdindonesia',
    ],
    [
        'icon' => 'instagram',
        'color' => 'pink',
        'bg' => '#fce7f3',
        'hoverBg' => '#fbcfe8',
        'link' => 'https://www.instagram.com/kopdarlovebirdindonesia',
    ],
    [
        'icon' => 'facebook',
        'color' => 'blue',
        'bg' => '#dbeafe',
        'hoverBg' => '#bfdbfe',
        // bisa page atau profile
        'link' => 'https://www.facebook.com/kopdarlovebirdindonesia',
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
      border border-[{{ $s['color'] }}]

      bg-[{{ $s['bg'] }}]
      hover:bg-[{{ $s['hoverBg'] }}]

      shadow-sm hover:shadow-lg
      transition-all duration-300 ease-out
      hover:scale-110

      group
   ">
                 <i
                     class="
        fab fa-{{ $s['icon'] }}
        text-xl sm:text-2xl
        text-gray-800
        transition-colors duration-300
        group-hover:text-[{{ $s['color'] }}]
    "></i>
             </a>
         @endforeach
     </div>
 </div>
