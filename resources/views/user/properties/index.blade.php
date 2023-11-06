@extends('layouts/app')
@section('content')


    
    

    <div class="py-12">        
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="flex justify-between items-center gap-4">
            <h1 class="text-lg font-medium text-gray-900 uppercase">Мои объявления</h1>
            <x-primary-button>
                <a href="{{ route('user.properties.create') }}"> Добавить объявление</a>
            </x-primary-button>            
        </div>    

        @forelse($propertiesUser as $property)
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                  
                <div class="max-w-xl">
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">
                            Наименование
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                            {{$property->title}}
                            </p>

                            <img src="#" alt="property photo">
                        
                            <h2 class="text-lg font-medium text-gray-900">
                            Описание
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                            {{$property->description}}
                            </p>
                       
                            <h2 class="text-lg font-medium text-gray-900">
                            Категория
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                            ...
                            </p>
                        
                            <h2 class="text-lg font-medium text-gray-900">
                            Цена за сутки
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                            {{$property->price_per_day}}
                            </p>
                        
                            <h2 class="text-lg font-medium text-gray-900">
                            Возможность временной регистрации
                            </h2>
                                <div>
                                    @if($property->is_temporary_registration_possible)
                                    <p class="mt-1 text-sm text-gray-600">Да</p>
                                    @else
                                    <p class="mt-1 text-sm text-gray-600">Нет</p>
                                    @endif  
                                </div>           
                       
                            <div class="flex items-center gap-4">
                                <x-primary-button>
                                <a href="{{ route('user.properties.edit', $property) }}"> 
                                                    Редактировать объявление
                                                </a>
                                </x-primary-button>            
                            </div>
                        </div>
                
                    </div>
                               
                </div>  
                @empty
                <h1>У Вас пока нет объявлений</h1> 
                @endforelse                       
                      
            </div>
       
        </div>       
                                         
        
        @endsection




    

