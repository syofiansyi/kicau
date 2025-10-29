<!-- start header -->
@php
    $route = Route::current()->getName();
@endphp
<div id="kt_header" style="" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">

        </div>
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">

        </div>
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav"><div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}" style="">
                    <!--begin::Menu-->
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                        @if (Auth::user()->role == 'admin')
                        <div class="menu-item me-lg-1">
                            <a class="menu-link {{ $route == 'admin.user' ? 'active' : '' }} py-3" href="{{ route('admin.user') }}">
                                <span class="menu-title">User</span>
                            </a>
                        </div>
                        @else
                        @endif
                        <div class="menu-item me-lg-1">
                            <a class="menu-link {{ $route == 'admin.dashboard' ? 'active' : '' }} py-3" href="{{ route('admin.dashboard') }}">
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link {{ $route == 'slider' ? 'active' : '' }} py-3" href="{{ route('slider') }}">
                                <span class="menu-title">Slider</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link {{ $route == 'event' ? 'active' : '' }} py-3" href="{{ route('event') }}">
                                <span class="menu-title">event</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link {{ $route == 'news' ? 'active' : '' }} {{ $route == 'news' ? 'active' : '' }}  py-3" href="{{ route('news') }}">
                                <span class="menu-title">Berita</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link {{ $route == 'admin.juara' ? 'active' : '' }}  py-3" href="{{ route('admin.juara') }}">
                                <span class="menu-title">Juara </span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link {{ $route == 'klasement_pertandingan' ? 'active' : '' }}  py-3" href="{{ route('klasement_pertandingan') }}">
                                <span class="menu-title">klasement pertandingan</span>
                            </a>
                        </div>
                            <div class="menu-item me-lg-1">
                                <a class="menu-link {{ $route == 'jadwal' ? 'active' : '' }}  py-3" href="{{ route('jadwal') }}">
                                    <span class="menu-title">Jadwal Pertandingan</span>
                                </a>
                            </div>

                    </div>
                    <!--end::Menu-->
                </div>
                <!--begin::Menu wrapper-->

                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            @php
                $id = Auth::user()->id;
                $adminData = App\Models\User::find($id);

            @endphp
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--begin::Toolbar wrapper-->
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <!--begin::User-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            <img src="{{ asset($adminData->photo) }}" alt="user">
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ asset($adminData->photo) }}">
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->name }}
                                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ Auth::user()->role }}</span></div>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{ route('profile') }}" class="menu-link px-5">My Profile</a>
                            </div>
                            <!--end::Menu item-->
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{ route('admin.logout') }}" class="menu-link px-5">Sign Out</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                    <!--begin::Heaeder menu toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="black"></path>
                                    <path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Heaeder menu toggle-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
{{-- <header>
    <nav class="navbar navbar-default bg-dynamic bootsnav navbar-brand-top navbar-expand-lg navbar-fixed-top">
        <div class="container-lg nav-header-container text-center flex-wrap">
            <!-- start logo -->
            <div class="col col-lg-12 navbar-brand py-3 px-0 me-0 ">
                <a href="{{ route('home') }}" title="Gandaria City" class="logo"><img
                        src="{{ asset('Frontend/images/logo-header.png') }}"
                        data-at2x="{{ asset('Frontend/images/logo-header.png') }}"
                        class="{{ asset('Frontend/images/logo-header.png') }}" alt="Gandaria City"><img
                        src="{{ asset('Frontend/images/logo-header.png') }}"
                        data-at2x="{{ asset('Frontend/images/logo-header.png') }}" alt="Gandaria City"
                        class="logo-light"></a>
            </div>
            <!-- end logo -->
            <div class="col-auto col-lg-12 px-0 accordion-menu d-flex align-items-center justify-content-center">
                <button type="button" class="navbar-toggler collapsed" data-bs-toggle="collapse"
                    data-bs-target="#navbar-collapse-toggle-1">
                    <span class="sr-only">toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-collapse collapse d-inline-block" id="navbar-collapse-toggle-1">
                    <ul id="accordion"
                        class="nav navbar-nav navbar-left no-margin alt-font text-normal align-items-center"
                        data-in="animate__fadeIn" data-out="animate__fadeOut">
                        <!-- start menu item -->
                        <li
                            class="nav-hover dropdown megamenu-fw {{ $route == 'home' ? 'active' : '' }} {{ $route == 'home' ? 'border-bottom' : '' }}">
                            <a href="{{ route('home') }}">Home</a>
                            <!-- start sub menu -->

                        </li>
                        <!-- end menu item -->
                        <li
                            class="nav-hover dropdown simple-dropdown  {{ $route == 'shop' ? 'active' : '' }} {{ $route == 'shop' ? 'border-bottom' : '' }}">
                            <a href="{{ route('shop') }}">Shop</a>
                            <!-- start sub menu -->
                        </li>
                        <li
                            class="nav-hover dropdown megamenu-fw {{ $route == 'dine' ? 'active' : '' }}  {{ $route == 'dine' ? 'border-bottom' : '' }}">
                            <a href="{{ route('dine') }}">Dine</a>
                            <!-- start sub menu -->

                        </li>
                        <li
                            class=" nav-hover dropdown simple-dropdown {{ $route == 'art.gallery' ? 'active' : '' }}  {{ $route == 'art.gallery' ? 'border-bottom' : '' }}">
                            <a href=" {{ route('art.gallery') }}">Art</a>
                            <!-- start sub menu -->
                            <!-- end sub menu -->
                        </li>
                        <li
                            class="nav-hover dropdown simple-dropdown {{ $route == 'whats.on' ? 'active' : '' }} {{ $route == 'whats.on' ? 'border-bottom' : '' }}">
                            <a href="{{ route('whats.on') }}">What's
                                On</a>
                            <!-- start sub menu -->
                            <!-- end sub menu -->
                        </li>
                        <li
                            class="nav-hover dropdown simple-dropdown {{ $route == 'royalty' ? 'active' : '' }} {{ $route == 'royalty' ? 'border-bottom' : '' }}">
                            <a href="{{ route('royalty') }}">Loyalty
                                &
                                Privileges</a>
                            <!-- start sub menu -->
                            <!-- end sub menu -->
                        </li>
                        <li
                            class="nav-hover dropdown simple-dropdown {{ $route == 'about' ? 'active' : '' }} {{ $route == 'about' ? 'border-bottom' : '' }}">
                            <a href="{{ route('about') }}">About
                                Us</a>
                            <!-- start sub menu -->
                            <!-- end sub menu -->
                        </li>
                        <li class=" dropdown simple-dropdown disabled">
                            <a href="#">

                                <div class=" border-left white">
                                    <div class="" style="margin-left: 10px;font-size: 12px;
                                font-weight: 500; ">
                                        @php
                                        $date = \Carbon\Carbon::now();
                                        $days = App\Models\Operational::all();
                                        $ev = App\Models\Event::all();
                                        $events = App\Models\Event::where('status',0)->get();
                                        $tujuh = \Carbon\Carbon::now();

                                        $tj = $tujuh->addDays(7);

                                        foreach ($days as $day) {
                                        $beb[] = $day->title;

                                        }
                                        foreach ($events as $key=>$event) {
                                        // $key +1;
                                        $bebas[] = $event->event;
                                        }
                                        $hitung = count($events);

                                        for($x = 0; $x < $hitung; $x++) { $array=$bebas[$x]; // echo $array; } @endphp
                                            @if ($events->isEmpty())
                                            @foreach ($days as $day)
                                            @if (\Carbon\Carbon::parse($date)->format('l') === $day->title)
                                            {{ $day->title}} {{date('m-d-Y')}} <br>
                                            {{ \Carbon\Carbon::parse($day->open)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($day->closed)->format('H:i') }}
                                            @break
                                            @endif
                                            @endforeach


                                            @else

                                            @if (in_array(\Carbon\Carbon::parse($date)->format('Y-m-d'), $bebas))
                                            @foreach ($events as $key => $event)
                                            @if (\Carbon\Carbon::parse($date)->format('Y-m-d') === $event->event)
                                            {{ $event->title}} {{$event->event}} <br>
                                            {{ \Carbon\Carbon::parse($event->open)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($event->closed)->format('H:i') }}
                                            @break
                                            @endif
                                            @endforeach
                                            @elseif(in_array(\Carbon\Carbon::parse($date)->format('l'),$beb))
                                            @foreach ($days as $day)
                                            @if (\Carbon\Carbon::parse($date)->format('l') === $day->title)
                                            {{ $day->title}} {{date('m-d-Y')}} <br>
                                            {{ \Carbon\Carbon::parse($day->open)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($day->closed)->format('H:i') }}
                                            @break
                                            @endif
                                            @endforeach
                                            @endif

                                            @endif







                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown"><a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                        <p
                                            style="font-weight: 600; color:rgb(255, 255, 255)55, 255, 255);font-size:14px">
                                            Open Operation</p></i>
                                    </a>
                                </li>

                                @foreach ($days as $day)
                                <li class="dropdown"><a class="dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#">{{$day->title}}, {{ \Carbon\Carbon::parse($day->open)->format('H:i') }}
                                        -
                                        {{ \Carbon\Carbon::parse($day->closed)->format('H:i') }}</i></a>
                                </li>
                                @endforeach


                                @if ($events->isEmpty())

                                @else
                                <li class="dropdown"><a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                        <p
                                            style="font-weight: 600; color:rgb(255, 255, 255)55, 255, 255);font-size:14px">
                                            Event</p></i>
                                    </a>
                                </li>
                                @endif



                                @foreach ($events as $event)
                                @if ($tj >= $event->event)
                                <li class="dropdown"><a class="dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#">{{$event->title}} {{ $event->event}},<br>{{
                                        \Carbon\Carbon::parse($event->open)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($event->closed)->format('H:i') }}</i></a>
                                </li>

                                @else

                                @endif

                                @endforeach
                            </ul>

                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </nav>
</header> --}}
<!-- end header -->
