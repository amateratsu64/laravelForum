@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Tópicos</h1>
        <a href="{{ route('topics.createTopic') }}" class="btn btn-primary mb-3">Criar Novo Tópico</a>
        @if($topics->isEmpty())
            <p>Nenhum tópico encontrado.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topics as $topic)
                        <tr>
                            <td>{{ $topic->title }}</td>
                            <td>{{ $topic->category->name ?? 'Sem Categoria' }}</td>
                            <td>{{ $topic->status ? 'Ativo' : 'Inativo' }}</td>
                            <td>
                                <a href="{{ route('topics.viewTopic', $topic->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                                <a href="{{ route('topics.updateTopic', $topic->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('topics.deleteTopic', $topic->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
