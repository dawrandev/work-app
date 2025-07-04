<!DOCTYPE html>
<html class="no-js" lang="zxx">


<head>
    @include('partials.user.head')

    @livewireStyles
</head>

<body>
    <div id="loading-area"></div>

    @include('auth.user.login-modal')

    @include('auth.user.sign-up-modal')

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    @include('sweetalert::alert')

    @include('components.user.header')

    @yield('content')

    @include('components.user.footer')

    @include('partials.user.script')

    @livewireScripts
</body>

</html>