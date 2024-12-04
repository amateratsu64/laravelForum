@extends('layouts.tema  ')

@section('content')
<div class="container custom-container mt-5">
    <h1 class="text-center">Editar Tag</h1>
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $tag->title }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Atualizar</button>
    </form>
</div>
@endsection
