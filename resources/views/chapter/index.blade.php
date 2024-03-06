@extends('layouts.main')

@section('content')

    
<h1>Lista de Capitulos</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Post</th>
            <th>titulo</th>
            <th>Numero Cap</th>
        </tr>
    </thead>
    <tbody>
        @if ($chapters->count()> 0 )
            @foreach($chapters as $chapter)
            <tr>
                <td>{{ $chapter->id }}</td>
                <td>{{ $chapter->post_id }}</td>
                <td>{{ $chapter->title }}</td>
                <td>{{ $chapter->number }}</td>

                <td>
                    <a href="{{ route('chapter.show',$chapter->id) }}">Ver chapter</a>
                    <a href="{{ route('chapter.edit',$chapter->id) }}">Editar</a>
                    <form action="{{ route('chapter.destroy', $chapter->id) }}" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?')">
                        @csrf
                        @method('DELETE')
                    
                        <button type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        @else 
        <h2>No hay Posts</h2>
        @endif

    </tbody>
</table>

@endsection
