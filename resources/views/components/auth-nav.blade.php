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

                        <img id="#"  src="{{ Auth::user()->avatar }}" style="width:45px;">

                    @endif
            </li>
            <li class="nav-item" style="display: flex; position: relative">
                <a id="userName"  href="{{ route('dashboard') }}" class="mr-3 auth-nav-text">
                    <span class="auth-nav-span"> {{ Auth::user()->name }} </span>
                </a>

                <div class="popUpCabinetEnter">

                    <p class="modal-text">{{Auth::user()->name}}</p>

                    <p class="modal-text">{{Auth::user()->email}}</p>

                    <p class="modal-text">{{Auth::user()->phone}}</p>
                    <hr class="hr-line">
                    <ul style="padding: 0">
                        <li style="list-style-type: none; margin: 0 0 10px 0">
                            <a class="modal-link-text"
                               href="{{route('profile.edit')}}">Личные данные</a>
                        </li>

                        <li style="list-style-type: none; margin: 0 0 10px 0">
                            <a class="modal-link-text"
                               href="{{route('user.properties.index')}}">Мои объявления</a>
                        </li>

                        <li style="list-style-type: none; margin: 0 0 10px 0">
                            <a class="modal-link-text"
                               href="{{ route('user.deals.index') }}">Мои бронирования</a>
                        </li>

                        @if(Auth::user()->is_admin)
                        <li style="list-style-type: none; margin: 0 0 10px 0">
                            <a class="modal-link-text"
                               href="{{route('admin.index')}}">Админка</a>
                        </li>
                        @endif

                        <hr class="hr-line">

                        <li style="list-style-type: none; margin: 10px 0">
                            <a class="modal-link-text" href="{{ route('logout') }}"
                               style="text-transform: uppercase; color: #6458a0;"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Выход
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>

                {{--<div class="auth-nav-text">

                    <a class="mr-3 auth-nav-text" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        <span class="auth-nav-span">Выход</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>--}}
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

@push('child-scripts')

    <script>

        let popUP = document.getElementsByClassName("popUpCabinetEnter");
        let enterLink = document.getElementById("userName");

        enterLink.onmouseover = function (){
            popUP[0].style.display="block";
        }

        /*enterLink.onmouseout = function (){
            popUP[0].style.display = "none";
        }*/

        window.onclick = function(event) {
            if (event.target !== popUP[0]) {
                popUP[0].style.display = "none";
            }
        }

    </script>

@endpush




