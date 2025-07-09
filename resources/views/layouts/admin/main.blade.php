<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.admin.head')
</head>

<body onload="startTime()">
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
            </filter>
        </svg>
    </div>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('components.admin.header')

        <div class="page-body-wrapper">


            @include('components.admin.sidebar')

            <div class="page-body">


                @yield('content')

            </div>

            @include('components.admin.footer')

        </div>

    </div>
    @include('sweetalert::alert')

    @include('partials.admin.script')

</body>

</html>