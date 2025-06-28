<!DOCTYPE html>
<html class="no-js" lang="zxx">


<head>
    @include('partials.user.head')

    @livewireStyles
</head>

<body>
    <div id="loading-area"></div>

    @include('sweetalert::alert')

    @include('components.user.header')

    @yield('content')

    @include('components.user.footer')

    @include('partials.user.script')

    @livewireScripts
</body>

</html>