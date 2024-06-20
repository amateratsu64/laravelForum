<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #E0FFFF;
            padding: 20px 0;
            text-align: center;
        }

        nav {
            background-color:#7B68EE;
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
            background-color:#7B68EE ;
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
        <h1>pagina inicial</h1>
    </header>

    <nav>
        <a href="{{url('/register')}}">Listar usuarios</a>
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
        <p>&copy; 2024 Direito autoral matheus peixoto</p>
    </footer>
</body>
</html>
