<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Página Inicial</title>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Cabeçalho -->
    <header class="bg-primary text-white py-4 text-center">
        <h1><a href="{{ url('/') }}" class="text-white text-decoration-none">Página Inicial</a></h1>
    </header>

    <!-- Navegação -->
    <nav class="bg-dark py-2">
        <div class="container text-center">
            <a href="{{ url('/user') }}" class="text-white mx-3 font-weight-bold">Listar usuários</a>
            <a href="{{ url('/post') }}" class="text-white mx-3 font-weight-bold">Postagem</a>
            <a href="{{ url('/tags') }}" class="text-white mx-3 font-weight-bold">Tag</a>
            <a href="{{ url('/topics') }}" class="text-white mx-3 font-weight-bold">Topics</a>
            <a href="{{ url('/post') }}" class="text-white mx-3 font-weight-bold">Post</a>
            <a href="{{ url('categories') }}" class="text-white mx-3 font-weight-bold">Categoria</a>
            @if (Auth::check())
                <a href="{{ route('List_user', ['id' => Auth::user()->id]) }}" class="text-white mx-3 font-weight-bold"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                <a href="{{ route('logout') }}" class="text-white mx-3 font-weight-bold"><i class="fas fa-sign-out-alt"></i> Sair</a>
            @else
                <a href="{{ route('login') }}" class="text-white mx-3 font-weight-bold"><i class="fas fa-sign-in-alt"></i> Login</a>
            @endif
        </div>
    </nav>

    <!-- Barra de ações -->
    <div class="container my-4 d-flex justify-content-between align-items-center">
        <form class="d-flex">
            <input type="search" name="query" class="form-control mr-2" placeholder="Buscar...">
            <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i></button>
        </form>
        <a href="{{ url('/create_post') }}" class="btn btn-primary">Criar Post</a>
    </div>

    <!-- Conteúdo principal -->
    <div class="container flex-grow-1">
        <div class="bg-white p-4 rounded shadow mb-4">
            <h3>adolf</h3>
            <button class="btn btn-warning position-absolute" style="top: 10px; right: 10px;"><a href="{{ url('/post/list') }}" class="text-dark">Editar</a></button>
            <p>Como que sei lá faz para passar da fase do Bowser no Mario?</p>
            <div class="d-flex align-items-center">
                <p class="mr-4"><i class="fa-regular fa-thumbs-up"></i> 20</p>
                <p class="mr-4"><i class="fa-regular fa-thumbs-down"></i> 5</p>
                <p><i class="fa-solid fa-comments"></i> 15</p>
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow mb-4">
            <h3>matheus</h3>
            <button class="btn btn-warning position-absolute" style="top: 10px; right: 10px;">Editar</button>
            <p>Alguém sabe o konami code?</p>
            <div class="d-flex align-items-center">
                <p class="mr-4"><i class="fa-regular fa-thumbs-up"></i> 20</p>
                <p class="mr-4"><i class="fa-regular fa-thumbs-down"></i> 5</p>
                <p><i class="fa-solid fa-comments"></i> 15</p>
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow mb-4">
            <h3>Título do Post</h3>
            <button class="btn btn-warning position-absolute" style="top: 10px; right: 10px;">Editar</button>
            <p>Como que abaixa os gráficos?</p>
            <div class="d-flex align-items-center">
                <p class="mr-4"><i class="fa-regular fa-thumbs-up"></i> 20</p>
                <p class="mr-4"><i class="fa-regular fa-thumbs-down"></i> 5</p>
                <p><i class="fa-solid fa-comments"></i> 15</p>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="bg-primary text-white py-3 text-center mt-auto">
        <p>&copy; 2024 Direito autoral Matheus Peixoto</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
