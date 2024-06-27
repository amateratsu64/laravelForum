<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Página Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #7B68EE, #E0FFFF);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
        }

        header {
            background-color: #7B68EE;
            padding: 20px;
            text-align: center;
            color: white;
        }

        header h1 a {
            color: white;
            text-decoration: none;
        }

        nav {
            background-color: #483D8B;
            padding: 10px 0;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        .action-bar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .search-bar input[type="search"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-bar button {
            padding: 10px 20px;
            border: none;
            background-color: #483D8B;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .create-post-button {
            padding: 10px 20px;
            background-color: #7B68EE;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .container {
            flex: 1;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            padding: 8px;
        }

        .post {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            position: relative;
        }

        .post h3 {
            color: #483D8B;
            margin-bottom: 10px;
        }

        .post p {
            margin-bottom: 15px;
        }

        .edit-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #FFD700;
            color: #333;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .comments {
            display: flex;
            align-items: center;
        }

        .comments p {
            margin: 0;
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .comments p i {
            margin-right: 5px; 
        }

        footer {
            background-color: #7B68EE;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="{{ url('/') }}">Página Inicial</a></h1>
    </header>

    <nav>
        <a href="{{ url('/user') }}">Listar usuários</a>
        <a href="{{ url('/post') }}">Serviços</a>
        <a href="#">Contato</a>
        @if (Auth::check())
            <a href="{{ route('List_user', ['id' => Auth::user()->id]) }}" class="login-icon"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
            <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Sair</a>
        @else
            <a href="{{ route('login') }}" class="login-icon"><i class="fas fa-sign-in-alt"></i> Login</a>
        @endif
    </nav>

    <div class="action-bar">
        <div class="search-bar">
            <form>
                <input type="search" name="query" placeholder="Buscar...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <a href="{{ url('/create_post') }}" class="create-post-button">Criar Post</a>
    </div>

    <div class="container">
        <div class="main-content">
            <div class="post">
                <h3>adolf</h3>
                <button class="edit-button"><a href="{{ url('/post/list') }}">Editar</a></button>
                <p>Como que sei lá faz para passar da fase do Bowser no Mario?</p>
                <div class="comments">
                    <p><i class="fa-regular fa-thumbs-up"></i> 20</p>
                    <p><i class="fa-regular fa-thumbs-down"></i> 5</p>
                    <p><i class="fa-solid fa-comments"></i> 15</p> 
                </div>
            </div>

            <div class="post">
                <h3>matheus</h3>
                <button class="edit-button">Editar</button>
                <p>alquem sabe o konimi cod</p>
                <div class="comments">
                    <p><i class="fa-regular fa-thumbs-up"></i> 20</p>
                    <p><i class="fa-regular fa-thumbs-down"></i> 5</p>
                    <p><i class="fa-solid fa-comments"></i> 15</p> 
                </div>
            </div>

            <div class="post">
                <h3>Título do Post</h3>
                <button class="edit-button">Editar</button>
                <p>como que abaixa os graficos </p>
                <div class="comments">
                    <p><i class="fa-regular fa-thumbs-up"></i> 20</p>
                    <p><i class="fa-regular fa-thumbs-down"></i> 5</p>
                    <p><i class="fa-solid fa-comments"></i> 15</p> 
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Direito autoral Matheus Peixoto</p>
    </footer>
</body>
</html>
