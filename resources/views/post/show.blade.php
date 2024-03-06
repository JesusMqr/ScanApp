@extends('layouts.main')

@section('content')

<div class="px-3">
    <section class="pb-10 flex justify-between" >
        <a href="{{ route('post.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Volver
        </a>
        @auth
        <a href="{{ route('chapter.create',$post->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Crear Capitulo
        </a>
        @endauth
        
    </section>
    <div  class="flex w-full flex-col items-center  bg-white border border-gray-200 rounded-lg shadow md:flex-row 
      dark:border-gray-700 dark:bg-gray-800 ">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-2/5 md:rounded-none md:rounded-s-lg" 
        src="{{ $post->imageUrl }}" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $post->description }}</p>
        </div>
    </div>
    
        @if ($post->chapters->count() > 0)
        <div class="relative overflow-x-auto mt-10">
    
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-4">
                            N°
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Titulo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post->chapters->sortByDesc('number') as $chapter)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 w-4 text-xs"> {{-- Aplicando text-xs para hacerlo más pequeño --}}
                            {{ $chapter->number }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$chapter->title}}   
                        </th>
                        <td class="px-6 py-4">
                            <div>
                                <a href="{{ route('chapter.show',$chapter->id) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Ver
                                </a>
                                @auth
                                <a href="{{ route('chapter.edit',$chapter->id) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Editar
                                </a>
                                <form action="{{ route('chapter.destroy', $chapter->id) }}" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Eliminar
                                    </button>
                                </form>
                                @endauth
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        @else    
        <h2>No hay capitulos</h2>
        @endif
    
    </div>

@endsection