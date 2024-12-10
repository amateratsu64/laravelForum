@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Criar Novo Post</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Imagem do Post" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection