@extends('layouts.tema')

@section('content')
<div class="container">
    <h1>Editar Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="topic_id">Tópico</label>
            <select name="topic_id" id="topic_id" class="form-control" required>
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}" {{ $post->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Imagem</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Imagem do Post" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Atualizar Post</button>
    </form>
</div>
@endsection