@extends('layouts.tema')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Listar Tópicos</h2>
        <a href="{{ route('topics.createTopic') }}" class="btn btn-primary">Criar Tópico</a>
    </div>
    <div class="bg-white p-4 rounded shadow">
        @if ($topics->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topics as $topic)
                        <tr>
                            <td>{{ $topic->title }}</td>
                            <td>{{ $topic->description }}</td>
                            <td>
                                @if ($topic->post && $topic->post->image)
                                    <img src="{{ asset('storage/' . $topic->post->image) }}" alt="Imagem do tópico" width="100">
                                @endif
                            </td>
                            <td>{{ $topic->category->title }}</td>
                            <td>{{ $topic->status ? 'Ativo' : 'Inativo' }}</td>
                            <td>
                                <a href="{{ route('topics.viewTopic', $topic->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('editAndUpdateTopic', $topic->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('topics.deleteTopic', $topic->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Não há tópicos disponíveis.</p>
        @endif
    </div>
</div>
@endsection
 