<!doctype html>
<html class="fixed sidebar-light" data-style-switcher-options="{'sidebarColor': 'light'}">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('Frontend/img/logo.png') }}">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/vendor/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/boxicons/css/boxicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/vendor/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/jquery-ui/jquery-ui.theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/morris/morris.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/select2/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/datatables/media/css/dataTables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/vendor/pnotify/pnotify.custom.css') }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/css/theme.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/css/custom.css') }}">
    <link rel="stylesheet" type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Head Libs -->

    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.2/datatables.min.css"/>
</head>

<body>
    <section class="body">
        <!-- start: header -->
        @include('admin.body.header')
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            @include('admin.body.sidebar')
            <!-- end: sidebar -->


            <!-- Main Body -->
            <section role="main" class="content-body">
                @yield('main')
            </section>
        </div>

    </section>
    {{-- <!--  WRAPPER  -->
    <div class="wrapper">

        @include('admin.body.sidebar')

        <!--  PAGE WRAPPER -->
        <div class="ec-page-wrapper">



            @include('admin.body.header')


            @yield('main')

            <!-- Footer -->
            @include('admin.body.footer')

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper --> --}}

    <!-- Vendor -->
    <script src="{{ asset('Backend/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('Backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="{{ asset('Backend/vendor/jquery-cookie/jquery.cookie.js') }}"></script>

    <script src="{{ asset('Backend/vendor/popper/umd/popper.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('Backend/vendor/common/common.js') }}"></script>
    <script src="{{ asset('Backend/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('Backend/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('Backend/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{ asset('Backend/vendor/select2/js/select2.js') }}"></script>
    <script src="{{ asset('Backend/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/datatables/media/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/autosize/autosize.js') }}"></script>


    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('Backend/js/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('Backend/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('Backend/js/theme.init.js') }}"></script>

    <!-- Examples -->
    <script src="{{ asset('Backend/js/examples/examples.datatables.editable.js') }}"></script>
    <script src="{{ asset('Backend/js/examples/examples.modals.js') }}"></script>
    <script src="{{ asset('Backend/js/examples/examples.advanced.form.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('Backend/vendor/elusive-icons/css/elusive-icons.css') }}" />
    <script src="{{ asset('Backend/js/examples/examples.widgets.js') }}"></script>
    <!-- Examples -->
    <script src="{{ asset('Backend/js/examples/examples.dashboard.js') }}"></script>
    <script src="{{ asset('Backend/js/examples/examples.widgets.js') }}"></script>

    <script src="{{ asset('Backend/js/validate.min.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('Backend/js/code.js') }}"></script>
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

    <script src="https://cdn.tiny.cloud/1/znhqdsa0qx18z1nof77yo59003tjppey7v03fsdjtvf9hktl/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <script src="{{ asset('Backend/vendor/modernizr/modernizr.js') }}"></script>
    <script src="{{ asset('Backend/master/style-switcher/style.switcher.localstorage.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.2/datatables.min.js"></script>
    @stack('prepend-script')
    @stack('addon-script')
</body>




</html>
