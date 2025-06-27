<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.graygrids.com/themes/jobgrids/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 May 2025 11:28:26 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('code')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <div id="loading-area"></div>

    <!-- Start Error Area -->
    <div class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="error-content">
                        <h1>@yield('code')</h1>
                        <h2>@yield('message')</h2>
                        <div class="button">
                            <a href="{{ route('home', app()->getlocale() ?: 'kr') }}" class="btn">Go To Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Error Area -->

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
    <script>
        window.onload = function() {
            window.setTimeout(fadeout, 500);
        }

        function fadeout() {
            document.querySelector('#loading-area').style.opacity = '0';
            document.querySelector('#loading-area').style.display = 'none';
        }
    </script>
</body>


<!-- Mirrored from demo.graygrids.com/themes/jobgrids/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 May 2025 11:28:26 GMT -->

</html>