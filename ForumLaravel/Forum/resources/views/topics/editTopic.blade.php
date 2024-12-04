@extends('layouts.tema')

@section('content')
<div class="container my-5">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="mb-4">Editar Tópico</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('editAndUpdateTopic', $topic->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $topic->title) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description', $topic->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="category">Categoria</label>
                <select class="form-control" id="category" name="category" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $topic->category_id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" {{ $topic->status ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ !$topic->status ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Imagem</label>
                <input type="file" class="form-control" id="photo" name="photo">
                @if ($topic->post->image)
                    <img src="{{ asset('storage/' . $topic->post->image) }}" alt="Imagem atual" class="img-fluid mt-3" width="200">
                @endif
            </div>
            <button type="submit" class="btn btn-warning">Salvar Alterações</button>
        </form>
    </div>
</div>
@endsection
