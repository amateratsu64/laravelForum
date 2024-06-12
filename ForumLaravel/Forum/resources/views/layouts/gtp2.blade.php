<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Página Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #666;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
        }
        nav a:hover {
            background-color: #999;
        }
        section {
            padding: 20px;
            text-align: center;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>@yield('header')</h1>
    </header>
    <nav>
    @yield('content')
        <a href="http://127.0.0.1:8000/login">Home</a>
        <a href="#">Sobre</a>
        <a href="#">Contato</a>
    </nav>
    <section>
        <h2>Bem-vindo à minha página web!</h2>
        <p>Esta é uma página de exemplo criada com HTML e CSS.</p>
    </section>
    <footer>
        <p>&copy; 2024 Minha Página Web</p>
    </footer>
</body>
</html>
