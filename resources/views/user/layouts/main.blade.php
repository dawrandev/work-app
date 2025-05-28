<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.graygrids.com/themes/jobgrids/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 May 2025 11:28:23 GMT -->

<head>
    @include('user.partials.head')
</head>

<body>
    <div id="loading-area"></div>

    @include('sweetalert::alert')

    @include('user.components.header')

    @yield('content')

    @include('user.components.footer')

    @include('user.partials.script')
</body>

</html>