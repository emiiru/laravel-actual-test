<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ trim(($title ?? 'Auth').' | '.config('app.name', 'Laravel')) }}</title>

        <meta name="color-scheme" content="light dark" />
        <meta name="theme-color" content="#0d6efd" media="(prefers-color-scheme: light)" />
        <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />

        <!-- Fonts -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
            crossorigin="anonymous"
            media="print"
            onload="this.media = 'all'"
        />

        <!-- Third Party Plugin(OverlayScrollbars) -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
            crossorigin="anonymous"
        />

        <!-- Bootstrap Icons -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
            crossorigin="anonymous"
        />

        <!-- AdminLTE (CDN) -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-rc3/dist/css/adminlte.min.css"
            crossorigin="anonymous"
        />

        @stack('styles')
    </head>

    <body class="login-page bg-body-secondary">
        {{ $slot }}

        <!-- OverlayScrollbars -->
        <script
            src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
            crossorigin="anonymous"
        ></script>

        <!-- Popper + Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

        <!-- AdminLTE (CDN) -->
        <script
            src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-rc3/dist/js/adminlte.min.js"
            crossorigin="anonymous"
        ></script>

        @stack('scripts')
    </body>
</html>
