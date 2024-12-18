@extends('layouts.tema')

@section('content')
<div class="container custom-container mt-5">
    <h1 class="text-center">Criar Nova Tag</h1>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Salvar</button>
    </form>
</div>
@endsection
