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
    <x-admin.header></x-admin.header>
    <div id="layoutSidenav">
        <x-admin.sidebar></x-admin.sidebar>
        <div id="layoutSidenav_content">
            <main>
@yield('content')
            </main>
            <x-admin.footer></x-admin.footer>  
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
    <script src="{{ asset("assets/js/scripts.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset("assets/js/chart-area-demo.js") }}"></script>
    <script src="{{ asset("assets/js/chart-bar-demo.js") }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
    <script src="{{ asset("assets/js/datatables-simple-demo.js") }}"></script>

</body>

</html>