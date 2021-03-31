<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laporan Masyarakat | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Quicksand&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="/app.css" rel="stylesheet">

    @yield('style')
</head>
<body id="body">
    <div id="particle"></div>
    <p class="copyright">© Kelompok 7</p>
    @yield('body')
    @yield('script')
    <script src="/particles.min.js"></script>
    <script>
        particlesJS.load('particle', '/particlesjs-config.json', function() {
            console.log('callback - particles.js config loaded');
        });
    </script>
</body>
</html>
