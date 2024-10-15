<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(#7B68EE, #E0FFFF);
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: black;
            background: linear-gradient(#f4f4f4, #E0FFFF);
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
    <div class="form-container">
        <h2 class="form-title">Login</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Coloque seu Email" required>
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Coloque sua senha" required>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button class="login-btn btn btn-primary" type="submit">Login</button>

            <p class="text-center mt-3">Não possui conta? <a href="{{ url('/register') }}">Clique aqui</a></p>
        </form>

        <div class="logout-icon mt-3">
            <a href="{{ route('inicial') }}">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
