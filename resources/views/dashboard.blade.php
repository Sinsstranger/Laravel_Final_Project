<x-app-layout>
    @section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    @endsection
    {{--<x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Мои объявления') }}
    </h2>
    </x-slot>--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex">
                <div class="avatar-block">
                    <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill="#000000" d="M628.736 528.896A416 416 0 0 1 928 928H96a415.872 415.872 0 0 1 299.264-399.104L512 704l116.736-175.104zM720 304a208 208 0 1 1-416 0 208 208 0 0 1 416 0z"></path>
                        </g>
                    </svg>
                </div>
                <ul class="max-w-xl">
                    <li class="dashboard-link">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{$user->name}}
                        </h2>
                    </li>
                    <li class="dashboard-link">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{$user->email}}
                        </h2>

                    </li>
                    <li class="dashboard-link">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{$user->phone}}
                        </h2>

                    </li>
                </ul>
            </div>
        </div>
    </div>



</x-app-layout>
