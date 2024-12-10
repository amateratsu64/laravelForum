@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="topic_id">Tópico</label>
            <select name="topic_id" id="topic_id" class="form-control" required>
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Imagem</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Criar Post</button>
    </form>
</div>
@endsection