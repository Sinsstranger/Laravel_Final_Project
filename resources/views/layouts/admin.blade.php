<!DOCTYPE html>
    <html lang="ru">
        <head>
            <meta charset="utf-8" />
            <title>Dashboard Admin</title>
            <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="{{ asset("assets/css/stylesAdmin.css") }}">
            <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        </head>

        <body class="sb-nav-fixed">
           @yield('content')
        </body>

    </html>