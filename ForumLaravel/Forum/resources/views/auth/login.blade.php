<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
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
        input[type=text], [type=email], [type=password] {
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .input-field {
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-btn {
            width: 85%;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Login</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="input-field" name="email" value="{{ old('email') }}" placeholder="Coloque seu Email" required>
            @error('email') <span>{{ $message }}</span> @enderror
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="input-field" name="password" placeholder="Coloque sua senha" required>
            @error('password') <span>{{ $message }}</span> @enderror
            <button class="login-btn" type="submit">Login</button>
           
            <p class="forgot-password">Não possui conta? <a href="{{ url('/register') }}">Clique aqui</a></p>
        </form>
        
        <div class="logout-icon">
            <a href="{{ route('inicial') }}">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </div>
</body>
</html>
