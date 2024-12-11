@extends('layouts.tema')

@section('content')
<div class="container">
    <h1>{{ $post->topic->title }}</h1>
    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Imagem do Post" class="img-fluid">
    @endif
    <p>Post ID: {{ $post->id }}</p>
    <p>Criado em: {{ $post->created_at }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-primary">Voltar</a>
</div>
@endsection