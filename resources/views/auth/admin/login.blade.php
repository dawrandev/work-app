<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ __('Cuba admin is a powerful and clean admin template.') }}">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/admin/images/favicon.png') }}" type="image/x-icon">
    <title>{{ __('Login') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendors/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendors/themify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendors/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/admin/css/color-1.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/responsive.css') }}">
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div class="text-center">
                            <h3>Admin Panel</h3>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <h4>{{ __('Sign in to account') }}</h4>
                                <p>{{ __('Please enter your login and password') }}</p>

                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Phone') }}</label>
                                    <input class="form-control" type="number" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Your Phone') }}">
                                </div>
                                @error('phone')
                                <li style="color: red;">{{ $message }}</li>
                                @enderror

                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Password') }}</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" value="{{ old('password') }}" placeholder="{{ __('********') }}">
                                        @error('password')
                                        <li style="color: red;">{{ $message }}</li>
                                        @enderror
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox" name="remember">
                                        <label class="text-muted" for="checkbox1">{{ __('Remember me') }}</label>
                                    </div>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">{{ __('Sign in') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('assets/admin/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/icons/feather-icon/feather-icon.js') }}"></script>
        <script src="{{ asset('assets/admin/js/config.js') }}"></script>
        <script src="{{ asset('assets/admin/js/script.js') }}"></script>
    </div>
</body>

</html>