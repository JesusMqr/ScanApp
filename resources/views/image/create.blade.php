@extends('layouts.main')

@section('content')
<div class="mx-3">
    <section class="pb-10 flex justify-between" >
        <a href="{{ route('chapter.show',$origin->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Volver
        </a>
        
    </section>
    <form action="{{ route('image.store') }}" method="post">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div >
                <input type="hidden" name="chapter_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 required  value="{{ $origin->id }}"/>   
                <label for="">Serie</label>
                 <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 required  value="{{ $origin->title }}"/>   
            </div>
                 <div>
    
                <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero de Imagen</label>
                <input type="number" name="number"  class="bg-gray-50 border border-gray-300
                 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                   dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
            </div>
        </div>
        <div class="mb-6">
            <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen (URL)</label>
            <input type="text" name="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
             focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
              dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
              placeholder="Ingrese la url de la imagen..." required />
        </div> 
        <div class="mb-6 text-end">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
        font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700
         dark:focus:ring-blue-800">Crear Imagen</button>
        </div>   
    
    </form>
</div>
@endsection