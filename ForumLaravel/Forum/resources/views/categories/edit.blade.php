@extends('layouts.tema')

@section('content')
<div class="container custom-container mt-5">
    <h1 class="text-center">Editar Categoria</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Atualizar</button>
    </form>
</div>
@endsection
