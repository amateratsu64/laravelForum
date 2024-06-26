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

        .main-content {
            padding: 20px;
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
        <a href="#">Serviços</a>
        <a href="#">Contato</a>
        @if (Auth::check())
            <a href="#" class="login-icon"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
        @else
            <a href="{{ route('login') }}" class="login-icon"><i class="fas fa-sign-in-alt"></i></a>
        @endif
    </nav>

    <div class="container">
        <div class="main-content">
            <h2>Bem-vindo ao Meu Site!</h2>
            @if (Auth::check())
                <p>Olá, {{ Auth::user()->name }}! Bem-vindo ao meu saite</p>
            @else
                <p>faça logui no saite para consequir assesar os conteudos</p>
            @endif
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Direito autoral Matheus Peixoto</p>
    </footer>
</body>
</html>
