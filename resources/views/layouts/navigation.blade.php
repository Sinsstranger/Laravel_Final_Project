<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <p class="cabinet-title">Личный кабинет</p>

                    {{-- <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>--}}

                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Главная
                    </x-nav-link>

                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        Редактирование
                    </x-nav-link>

                    <x-nav-link :href="route('payment')" :active="request()->routeIs('payment')">
                        Оплата
                    </x-nav-link>
                    {{-- @if(Auth::user()->is_admin)
                        <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                            Чат
                        </x-nav-link>
                    @endif --}}

                    <x-nav-link-2
                        {{--                            :href="route('user.properties.index')" :active="request()->routeIs('user.properties.index')"--}}
                        id="dropdown">
                        Мои объявления
                        <i class="fa fa-caret-down downArrow "></i>
                        <div class="dropdown-content">
                            <a href="{{ route('user.properties.index') }}">
                                Опубликованные</a>
                            <a href="{{ route('user.favourites.index') }}">
                                Избранные</a>
                        </div>
                    </x-nav-link-2>

                    <x-nav-link href="{{ route('user.deals.index') }}" :active="request()->routeIs('user.deals.index')">
                        Мои бронирования
                    </x-nav-link>

                    @if(Auth::user()->is_admin)
                        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                            {{ __('Админка') }}
                        </x-nav-link>
                    @endif

                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        Выйти из кабинета
                    </x-nav-link>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('dashboard')">
                            {{ __('Профиль') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Выйти') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden hamburger" id="hamburger">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                style="margin-top: 12px">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden">
        <div class="pt-2 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Главная') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                {{ __('Редактировать') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('payment')" :active="request()->routeIs('payment')">
                {{ __('Оплата') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-1 space-y-1">
            <x-responsive-nav-link
{{--                :href="route('user.properties.index')" :active="request()->routeIs('user.properties.index')" --}}
                id="dropdown" class="dropdown">
                {{ __('Мои объявления') }}
                <i class="fa fa-caret-down downArrow "></i>
                <div class="dropdown-content-adapt show-block">
                    <a href="{{ route('user.properties.index') }}" class="ttt">Опубликованные</a>
                    <a href="{{ route('user.favourites.index') }}" class="ttt">Избранные</a>
                </div>
            </x-responsive-nav-link>

        </div>
        <div class="pt-2 pb-1 space-y-1">
            <x-responsive-nav-link href="{{ route('user.deals.index') }}" :active="request()->routeIs('user.deals.index')">
                {{ __('Мои бронирования') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                {{ __('Админка') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-1 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Выйти на главную') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200" style="border-top-width: 6px; border-color: lavender;">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    let dropDownNav = document.getElementById("dropdown");
    let dropContent = document.getElementsByClassName("dropdown-content");
    let dropAdaptContent = document.getElementsByClassName("dropdown-content-adapt");
    let dropAdapt = document.getElementsByClassName("dropdown");

    dropDownNav.onclick = function() {
        dropContent[0].style.display = "block";
    }

    dropDownNav.onmouseover = function() {
        dropContent[0].style.display = "block";
    }

    dropContent[0].onmouseover = function() {
        dropContent[0].style.display = "block";
    }

    dropDownNav.onmouseout = function() {
        dropContent[0].style.display = "none";
    }

    dropContent[0].onmouseout = function() {
        dropContent[0].style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target !== dropContent[0] && event.target !== dropDownNav) {
            dropContent[0].style.display = "none";
        }
    }

    dropAdapt[0].onclick = function() {
        dropAdaptContent[0].classList.toggle('show-block');
        console.log('hello');
    }


</script>
