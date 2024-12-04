@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="mb-4">{{ $topic->title }}</h2>
        <p><strong>Categoria:</strong> {{ $topic->category->name }}</p>
        <p><strong>Status:</strong> {{ $topic->status ? 'Ativo' : 'Inativo' }}</p>
        <p><strong>Descrição:</strong> {{ $topic->description }}</p>
        <p><strong>Imagem:</strong></p>
        <img src="{{ $topic->post->image }}" alt="Imagem do Tópico" class="img-fluid">
        <a href="{{ route('topics.listAllTopics') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>
@endsection
