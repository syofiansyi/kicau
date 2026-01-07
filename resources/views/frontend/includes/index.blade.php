<!doctype html>
<html lang="en">

<head>
    <base href="">
    <title>@yield('title')</title>

    <!-- Meta dinamis -->
    @yield('meta')
    <meta name="description" content="Kopdar Lovedbird Indonesia" />
    <meta name="keywords" content="Kopdar Lovedbird Indonesia" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Frontend/img/logo.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!-- ✅ TAILWIND CDN - POSISI PENTING (paling atas sebelum CSS lain) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- ✅ TAILWIND OVERRIDE Metronic (penting!) -->
    <style>
        /* Prioritas Tailwind > Metronic */
        [class*="tailwind-"] {
            all: initial;
        }

        [class*="tailwind-"],
        .tailwind-search,
        .tailwind-social {
            all: unset !important;
        }

        /* Custom Tailwind sections */
        .tailwind-search {
            @apply flex justify-center mb-6 px-4 max-w-4xl mx-auto;
        }

        .tailwind-social {
            @apply text-center py-16 px-4;
        }

        .tailwind-social h3 {
            @apply text-2xl font-bold text-gray-700 mb-12;
        }

        .tailwind-social-icons {
            @apply flex flex-wrap justify-center items-center gap-8 max-w-4xl mx-auto;
        }
    </style>

    <!-- Vendor CSS (setelah Tailwind) -->
    <link href="{{ asset('Frontend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Global Stylesheets -->
    <link href="{{ asset('Frontend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/header.css') }}" rel="stylesheet" type="text/css" />

    @stack('prepend-style')
    @stack('addon-style')
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px; margin:0; padding:0; width:100%;">
    
    <div class="d-flex flex-column flex-root" style="margin:0; padding:0; width:100%;">
        <div class="page d-flex flex-row flex-column-fluid w-full" style="margin:0; padding:0; width:100%;">
            <div class="wrapper d-flex flex-column flex-row-fluid w-full" id="kt_wrapper" style="margin:0; padding:0; width:100%;">
                
                @include('frontend.includes.header')
                @yield('slider')

                <div class="d-flex flex-column flex-column-fluid w-full" id="kt_content" style="margin:0; padding:0; width:100%;">
                    <div class="post d-flex flex-column-fluid w-full" id="kt_post" style="margin:0; padding:0; width:100%;">
                        <div id="kt_content_container" class="container-fluid px-0" style="margin:0; padding:0; width:100%;">
                            @yield('main')
                        </div>
                    </div>
                </div>

                @include('frontend.includes.footer')

            </div>
        </div>
    </div>

</body>


</html>

