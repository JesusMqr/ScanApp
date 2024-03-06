@extends('layouts.main')

@section('content')
<h2>Edit Post</h2>
<form action="{{ route('post.update', $post) }}" method="post">
    @csrf
    @method('put')

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ $post->title }}" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required>{{ $post->description }}</textarea>

    <label for="imageUrl">Image URL (optional):</label>
    <input type="url" name="imageUrl" id="imageUrl" value="{{ $post->imageUrl }}">

    <button type="submit">Update Post</button>
</form>
@endsection