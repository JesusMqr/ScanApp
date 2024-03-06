@extends('layouts.main')

@section('content')
   
<div class="mx-3">
     
    <section class="flex justify-between pb-10">
        <a href="{{ route('post.show',$chapter->post_id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Volver
        </a>
        @auth
        <a href="{{ route('image.create',$chapter->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Crear imagen
        </a>
        @endauth
    </section>
    <h2 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">{{$chapter->title }}</h2>
    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
        <li>
            Numero de capitulo: {{ $chapter->number }}
        </li>
        @auth
        <li>
            Numero de imagenes: {{ $chapter->images->count() }}
        </li>
        @endauth

    </ul>
    @if ($chapter->images->count()>0 )
    @auth
    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Numero Imagen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chapter->images->sortBy('number') as $image)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $image->number }}
                    </th>
                    <td class="px-6 py-4">
                        <img class="w-2/3" src="{{ $image->url }}" alt="">
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('image.destroy', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">
                                Eliminar 
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endauth

    @guest
    <div class="py-10">
    @foreach ($chapter->images->sortBy('number') as $image)
    
        <img class="w-full" src="{{ $image->url }}" alt="">
    @endforeach
    </div>
    <a href="{{ route('post.show',$chapter->post_id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Volver
    </a>
        
    
    @endguest

    @else
    <h2  class="py-20 text-center">No hay imagenes</h2>
    @endif
    
</div>
@endsection