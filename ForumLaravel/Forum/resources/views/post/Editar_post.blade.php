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
            height: 100vh;
            color: #333;
        }

        header {
            background-color: #7B68EE;
            padding: 20px 0;
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

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            resize: vertical;
            height: 150px;
        }

        .form-buttons {
            text-align: right;
        }

        .form-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-buttons .btn-save {
            background-color: #7B68EE;
            color: white;
            margin-right: 10px;
        }

        .form-buttons .btn-cancel {
            background-color: #ccc;
            color: #333;
            margin-right: 10px;
        }

        .form-buttons .btn-delete {
            background-color: #FF4500;
            color: white;
        }

        footer {
            background-color: #7B68EE;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
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
        @if (Auth::check())
            <a href="{{ route('List_user', ['id' => Auth::user()->id]) }}" class="login-icon"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
            <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> sair</a>
        @else
            <a href="{{ route('login') }}" class="login-icon"><i class="fas fa-sign-in-alt"></i> Login</a>
        @endif
    </nav>

    <div class="container">
        <form >
            <div class="form-group">
                <label for="content">Conteúdo da Postagem:</label>
                <textarea id="content" name="content" required>Como que sei lá faz para passar da fase do Bowser no Mario?</textarea>
            </div>
            <div class="form-buttons">
                <button type="submit" class="btn-save">Salvar</button>
                <button type="button" class="btn-cancel" onclick="window.location.href='{{ url('/post') }}'">Cancelar</button>
                <button type="button" class="btn-delete" onclick="if(confirm('Tem certeza que deseja excluir esta postagem?')){ document.getElementById('delete-form').submit(); }">Excluir</button>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Direito autoral Matheus Peixoto</p>
    </footer>
</body>
</html>
