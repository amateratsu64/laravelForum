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

        .conteiner {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .tabela {
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 14px;
            text-align: left;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
        }

        th {
            background-color: #7B68EE;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="{{ route('logout') }}">lista de usuarios</a></h1>
    </header>

    <nav>
        <a href="{{ url('/user') }}">Listar Usuários</a>
        <a href="{{ url('/post') }}">Serviços</a>
        <a href="#">Contato</a>
        @if (Auth::check())
            <a href="{{ route('List_user', ['id' => Auth::user()->id]) }}" class="login-icon"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                <a href="{{ route('logout')}}"><i class="fas fa-sign-out-alt"></i> sair</a>
        @else
            <a href="{{ route('login') }}" class="login-icon"><i class="fas fa-sign-in-alt"></i> Login</a>
        @endif
    </nav>

    <div class="conteiner">
        <div class="tabela">
            @foreach ($users as $user)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Direito Autoral Matheus Peixoto</p>
    </footer>
</body>
</html>
