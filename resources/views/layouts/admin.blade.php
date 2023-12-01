<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}"><!--для работы скрипта на удаление-->
        <title>Dashboard Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset("assets/css/stylesAdmin.css") }}">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    @vite(['resources/css/bootstrap.min.css','resources/css/table.css'])
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
    @stack('js')
    
    <!--подставляет скрипт из @-push('js') для работы скрипта на удаление-->

</body>

</html>
