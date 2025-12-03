<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>E-Presensi Geolocation | Login</title>
    <meta name="description" content="E-Presensi Geolocation">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="manifest" href="{{ asset('__manifest.json') }}">

    <style>
        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: #A1A1A2;
            /* Sesuaikan warna dengan template */
            cursor: pointer;
            z-index: 10;
        }
    </style>
</head>

<body class="bg-white">

    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="{{ asset('assets/img/login/login.jpg') }}" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>E-Presensi</h1>
                <h4>Silahkan Login</h4>
            </div>
            <div class="section mt-1 mb-5">

                @if (session('success'))
                    <div class="alert alert-success my-2">
                        {{ session('success') }}
                    </div>
                @endif

                @php
                    $messagewarning = Session::get('warning');
                @endphp

                @if (Session::get('warning'))
                    <div class="alert alert-outline-danger mb-1">
                        {{ $messagewarning }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-outline-danger mb-1">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('process-login') }}" method="POST">
                    @csrf

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK"
                                autocomplete="off">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password">

                            <i class="toggle-password" id="show_password">
                                <ion-icon name="eye-off-outline"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-links mt-2">
                        <div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <script src="{{ asset('assets/js/lib/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/base.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Script Toggle Password
            $("#show_password").click(function() {
                var passwordInput = $("#password");
                var icon = $(this).find("ion-icon");

                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                    icon.attr("name", "eye-outline");
                } else {
                    passwordInput.attr("type", "password");
                    icon.attr("name", "eye-off-outline");
                }
            });

            // Script Tambahan: Menghilangkan notifikasi otomatis setelah 3 detik (Opsional)
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 3000);
        });
    </script>

</body>

</html>
