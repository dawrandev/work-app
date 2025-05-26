<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.graygrids.com/themes/jobgrids/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 May 2025 11:28:23 GMT -->

<head>
    @include('user.partials.head')
</head>

<body>
    <div id="loading-area"></div>

    @include('sweetalert::alert')
    <!-- Start Header Area -->
    @include('user.components.header')
    <!-- End Header Area -->

    <!-- Start Content -->
    @yield('content')
    <!-- End Content -->

    <!-- Start Footer Top -->
    @include('user.components.footer')
    <!--/ End Footer Top -->

    @include('user.partials.script')
</body>

</html>