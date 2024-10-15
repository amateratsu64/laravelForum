<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Página de Registro</title>
    <style>
        body {
            background: linear-gradient(#7B68EE, #E0FFFF);
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .input-field {
            margin-bottom: 20px;
        }
        .register-btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .logout-icon {
            text-align: center;
            margin-top: 10px;
        }
        .logout-icon a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <header class="bg-primary text-white py-4 text-center">
        <h1><a href="{{ url('/') }}" class="text-white text-decoration-none">Página de Registro</a></h1>
    </header>

    <div class="container my-5">
        <div class="form-container">
            <h2 class="form-title">Registro</h2>
            <form action="{{ route('register') }}" method="post">
                @csrf 
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control input-field" name="name" value="{{ old('name') }}" placeholder="Coloque seu nome" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control input-field" name="email" value="{{ old('email') }}" placeholder="Coloque seu Email" required>
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control input-field" name="password" placeholder="Coloque sua senha" required>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control input-field" id="password_confirmation" name="password_confirmation" placeholder="Confirme a senha" required>
                
                <button type="submit" class="register-btn">Registrar</button>
                <p class="forgot-password">Já possui conta? <a href="{{ url('/login') }}">Clique aqui</a></p>

                <div class="logout-icon">
                    <a href="{{ route('inicial') }}">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </a>
                </div>
            </form>
        </div>
    </div>

    <footer class="bg-primary text-white py-3 text-center">
        <p>&copy; 2024 Direito autoral Matheus Peixoto</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
