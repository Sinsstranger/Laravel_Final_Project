<head>
    <link rel="stylesheet" href="{{ asset("assets/css/stylesAdmin.css") }}">

</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand ps-3" href="{{ route('admin.index') }}">Админка</a>
        <a class="navbar-brand ps-3" href="{{ route('home') }}">На главную</a>

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Найти" aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown" style="margin-right: 50px">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" onClick="toggleDropdown()" aria-expanded="false" style="margin-right: 50px"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" id="dropdownMenu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Настройки</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">К профилю</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="sidebarContainer" id="sidebarContainer" hidden>
        <div id="sidebarContent">
            @include('components.admin.sidebar')
        </div>
    </div>

    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            } else {
                dropdownMenu.classList.add('show');
            }
        };

        function toggleSidebar() {
            var sidebarContainer = document.getElementById('sidebarContainer');

            if (sidebarContainer.hasAttribute('hidden')) {
            // Если боковая панель скрыта, отобразите ее
                sidebarContainer.removeAttribute('hidden');
            } else {
            // Если боковая панель отображается, скройте ее
                sidebarContainer.setAttribute('hidden', 'true');
            }
        };
    </script>
</body>
