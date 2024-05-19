<head>
    <link rel="stylesheet" href="{{ asset("assets/css/stylesAdmin.css") }}">

</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn_header btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand ps-3" href="{{ route('admin.index') }}">Админка</a>
        <a class="navbar-brand ps-3" href="{{ route('home') }}">На главную</a>

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" onClick="toggleDropdown()" aria-expanded="false" style="margin-right: 50px"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" id="dropdownMenu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Профиль</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <li><a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Выйти') }}
                            </a>
                        </li>
                    </form>
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
