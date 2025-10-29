<!doctype html>
<html lang="en">



<head>
    <base href="">
    <title> @yield('title')</title>
    <meta name="description" content="Kopdar Lovedbird Indonesia" />
    <meta name="keywords" content="Kopdar Lovedbird Indonesia" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Frontend/img/logo.png') }}">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('Frontend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
          type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('Frontend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/header.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    @stack('prepend-style')
    @stack('addon-style')
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed  " style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->

        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            @include('backend.includes.header')
            <!--end::Header-->
            @yield('slider')
            <!--begin::Content-->
            <div class=" d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-fluid">
                        @yield('main')
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            @include('frontend.includes.footer')
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->

@stack('prepend-script')
@stack('addon-script')
<!--end::Main-->
<script>
    var hostUrl = "assets/";
</script>
<!--end::Page Custom Javascript-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('Frontend/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('Frontend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('Frontend/assets/js/custom/widgets.j') }}"></script>
<script src="{{ asset('Frontend/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/custom/modals/create-app.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/custom/modals/upgrade-plan.js') }}"></script>
<!--end::Page Custom Javascript-->
<script>
    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
<!--end::Javascript-->
</body>

</html>
