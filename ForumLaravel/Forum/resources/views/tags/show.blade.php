<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Fórum - {{ $tag->title }}</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="bg-light">

    <header class="bg-primary text-white py-4 text-center">
        <h1><a href="{{ url('/') }}" class="text-white text-decoration-none">Página Inicial</a></h1>
    </header>

    <nav class="bg-dark py-2">
        <div class="container text-center">
            <a href="{{ url('/user') }}" class="text-white mx-3 font-weight-bold">Listar usuários</a>
            <a href="{{ url('/post') }}" class="text-white mx-3 font-weight-bold">Postagem</a>
            <a href="{{ url('/tags') }}" class="text-white mx-3 font-weight-bold">Tag</a>
            <a href="{{ url('/topics') }}" class="text-white mx-3 font-weight-bold">Topics</a>
            <a href="{{ url('/categories') }}" class="text-white mx-3 font-weight-bold">Categoria</a>
            @if (Auth::check())
                <a href="{{ route('List_user', ['id' => Auth::user()->id]) }}" class="text-white mx-3 font-weight-bold"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                <a href="{{ route('logout') }}" class="text-white mx-3 font-weight-bold"><i class="fas fa-sign-out-alt"></i> Sair</a>
            @else
                <a href="{{ route('login') }}" class="text-white mx-3 font-weight-bold"><i class="fas fa-sign-in-alt"></i> Login</a>
            @endif
        </div>
    </nav>

    <div class="container my-5">
        <div class="bg-white p-4 rounded shadow">
            <h1>{{ $tag->title }}</h1>
            <p>{{ $tag->description }}</p>
            
            <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                @csrf
                @method("delete")
                <a href="{{ route('tags.edit', $tag->id) }}" type="button" class="btn btn-secondary">Editar</a>
                <input type="submit" value="Excluir" class="btn btn-danger">
            </form>
        </div>
    </div>
    
    <footer class="bg-primary text-white py-3 text-center fixed-bottom">
        <p>&copy; 2024 Direito autoral Matheus Peixoto</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
