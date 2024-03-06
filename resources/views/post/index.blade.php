@extends('layouts.main')







@section('content')

@auth
<div class="px-3">
    <a href="{{ route('post.create') }}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
    focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
     focus:outline-none dark:focus:ring-blue-800">
       Crear Serie
    </a>
    
    <div class="my-10 overflow-x-auto shadow-md sm:rounded-lg">
       @if ($posts->count()> 0 )
       <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
           <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
               <tr>
                   <th scope="col" class="px-6 py-3">
                       Titulo
                   </th>
                   <th scope="col" class="px-6 py-3">
                       Descripcion
                   </th>
                   <th scope="col" class="px-6 py-3">
                       Imagen Portada
                   </th>
                   <th scope="col" class="px-6 py-3">
                       Acciones
                   </th>
    
               </tr>
           </thead>
           <tbody>
               @foreach($posts as $post)
               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                   <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ $post->title }}
                   </th>
                   <td class="px-6 py-4  ">
                       {{ $post->description }}
                   </td>
                   <td class="px-6 py-4">
                       <img class="max-w-sm" src="{{ $post->imageUrl }}" alt="">
                   </td>
                   <td class="px-6 py-4">
                       <div>
                           <a  href="{{ route('post.show',$post->id) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                               Ver
                           </a>
                           <a  href="{{ route('post.edit',$post->id) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                               Editar
                           </a>
                           
                           
                           <form action="{{ route('post.destroy', $post->id) }}" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?')">
                               @csrf
                               @method('DELETE')
                           
                               <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                   Eliminar
                               </button>
                           </form>
                       </div>
                   </td>
               </tr>
               @endforeach
           </tbody>
       </table>
       @else
       <h2>No hay series</h2>
   @endif
</div>

@endauth

@guest
<section class="px-3 md:max-w-screen-xl">

    @if ( $posts->count() > 0 )
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 justify-items-center ">
            @foreach ($posts as $post)
                <div class="max-w-sm w-full  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('post.show',$post->id) }}">
                        <img class="rounded-t-lg w-full h-2/3" src="{{ $post->imageUrl }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-3 overflow-hidden">
                            {{ $post->description }}</p>
                        <a href="{{ route('post.show',$post->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Ver Serie
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>

            @endforeach
        </div>

    @else
        No hay
    @endif

</section>
@endguest
@endsection
