<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item" style="display: flex">

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
        </li>
        <li class="nav-item nav-item-user" style="display: flex; position: relative">

            @if(Auth::user()->avatar)

                <a href="{{ route('dashboard') }}"><img id="#" alt="avatar" src="{{ Auth::user()->avatar }}"
                                                        class="avatar-block">
                </a>
            @elseif(!Auth::user()->avatar)
                <div class="no-avatar-block" id="noAvatarBlock">
                    <p class="no-avatar-block-content"></p>
                </div>

            @endif
            <a id="userName" href="{{ route('dashboard') }}" class="mr-3 auth-nav-text">
                <span class="auth-nav-span"> {{ Auth::user()->name }} </span>
            </a>

            <div class="popUpCabinetEnter nav-item-user">

                <p class="modal-text">Пользователь: {{Auth::user()->name}}</p>

                <p class="modal-text">Ваша почта: {{Auth::user()->email}}</p>

                <hr class="hr-line">
                <ul style="padding: 0">
                    <li style="list-style-type: none; margin: 0 0 10px 0">
                        <a class="modal-link-text" href="{{route('dashboard')}}">Личные данные</a>
                    </li>

                    <li style="list-style-type: none; margin: 0 0 10px 0">
                        <a class="modal-link-text" href="{{route('user.properties.index')}}">
                            Мои объявления</a>
                    </li>

                    <li style="list-style-type: none; margin: 0 0 10px 0">
                        <a class="modal-link-text" href="{{ route('user.deals.index') }}">
                            Мои бронирования</a>
                    </li>

                    @if(Auth::user()->is_admin)
                    <li style="list-style-type: none; margin: 0 0 10px 0">
                        <a class="modal-link-text" href="{{route('admin.index')}}">Админка</a>
                    </li>
                    @endif

                    <hr class="hr-line">

                    <li style="list-style-type: none; margin: 10px 0">
                        <a class="modal-link-text" href="{{ route('logout') }}" style="text-transform: uppercase;     font-size: 15px;

                                    color: #6458a0;" onclick="event.preventDefault();
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
<a class="mr-3" href="{{ route('logout') }}" onclick="event.preventDefault();
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

@if(Auth::user())
    <script>
        const firstName = `{{Auth::user()->first_name}}`
        const lastName = `{{Auth::user()->last_name}}`
        document.querySelector('.no-avatar-block-content').innerText = `${firstName[0]}${lastName[0]}`;

        //Загрузка фоновых цветов в блок аватара в зависимости от id юзера и дня месяца
        const noAvatarBlock = document.getElementById('noAvatarBlock');
        // noAvatarBlock.style.background = 'navy';


        const userId = `{{Auth::user()->id}}`;

        let currentDate = new Date();


        let num = parseInt(userId + currentDate.getDate());
        // console.log(num);

        function getColorIndex(num) {
            let sum;
            do {
                let str = num.toString();
                sum = 0;
                for (let i = 0; i < str.length; i++) {
                sum += parseInt(str[i]);
                }
                num = sum;
            } while (sum > 9)

            return num;
        }

        const colorArr = ['navy', '#DC143C', '#FF4500', '#9400D3', '#1E90FF', '#2E8B57', '#20B2AA', '#2F4F4F', '#8B4513', '#FF00FF'];

        let res = getColorIndex(num);
        noAvatarBlock.style.background = colorArr[res];
        // console.log(getColorIndex(num));
    </script>
@endif



 <script>

    /*let popUP = document.getElementsByClassName("popUpCabinetEnter");
    let enterLink = document.getElementById("userName");

    enterLink.onmouseover = function() {
        popUP[0].style.display = "block";
    }

    enterLink.onmouseout = function() {
        popUP[0].style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target !== popUP[0]) {
            popUP[0].style.display = "none";
        }
    }*/
</script>


