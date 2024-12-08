@extends('layouts.tema')

@section('content')
<div class="container my-5">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="mb-4">{{ $topic->title }}</h2>
        <p><strong>Descrição:</strong> {{ $topic->description }}</p>
        <p><strong>Status:</strong> {{ $topic->status ? 'Ativo' : 'Inativo' }}</p>
        <p><strong>Categoria:</strong> {{ $topic->category->title }}</p>
        <p><strong>Imagem:</strong></p>
    </div>
</div>
@endsection
