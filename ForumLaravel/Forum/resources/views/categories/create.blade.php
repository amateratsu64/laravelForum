@extends('layouts.tema')

@section('content')
<div class="container custom-container mt-5">
    <h1 class="text-center">Criar Nova Categoria</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Salvar</button>
    </form>
</div>
@endsection
