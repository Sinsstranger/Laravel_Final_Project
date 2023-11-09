<x-app-layout>
    @section('style')
        @parent<link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
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
                    <img src="#" alt="avatar">
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
                            Телефон
                        </h2>

                    </li>
                </ul>
            </div>
        </div>
    </div>



</x-app-layout>
