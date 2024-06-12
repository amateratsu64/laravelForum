<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Página Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        nav {
            background-color: #444;
            padding: 10px 0;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .main-content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #333;
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
        <h1> @yield('header')</h1>
    </header>

    <nav>
        @yield('content')
        <a href="#">Página Inicial</a>
        <a href="#">Sobre</a>
        <a href="#">Serviços</a>
        <a href="#">Contato</a>

    </nav>

    <div class="container">
        <div class="main-content">
            <h2>Bem-vindo ao Meu Site!</h2>
            <p>Esta é a página inicial do meu site. Aqui você encontrará informações sobre nossos serviços, nossa empresa e como entrar em contato conosco.</p>
        </div>
    </div>

    

    <footer>
        <p>&copy; 2024 Meu Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
