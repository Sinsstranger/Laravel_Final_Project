<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">

                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="mr-3 auth-nav-text">
                         <span class="auth-nav-span">Войти</span>
                    </a>

                @endif

                @if (Route::has('register'))

                    <a href="{{ route('register') }}" class="mr-3 auth-nav-text">
                        <span class="auth-nav-span">Регистрация</span>
                    </a>

                @endif

                @else


                    @if(Auth::user()->avatar !== null)

                        <img src="{{ Auth::user()->avatar }}" style="width:45px;">

                    @endif
            </li>
            <li class="nav-item" style="display: flex">
                <a href="{{ route('dashboard') }}" class="mr-3 auth-nav-text">
                    <span class="auth-nav-span"> {{ Auth::user()->name }} </span>
                </a>

                <div class="auth-nav-text">

                    <a class="mr-3 auth-nav-text" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        <span class="auth-nav-span">Выход</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    {{--<p class="mb-0 register-link">
        @auth()
            @if(Auth::user())
                <a href="{{ route('profile.edit') }}" class="mr-3">{{ Auth::user()->name }}</a>
                <a class="mr-3" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>


            @else
                <a href="{{ route('register') }}" class="mr-3">Регистрация</a>
                <a href="{{ route('login') }}">Войти</a>
            @endif
        @endauth


    </p>--}}
</div>