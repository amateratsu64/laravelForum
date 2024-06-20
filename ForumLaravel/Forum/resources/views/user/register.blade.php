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
		imput[type=text],[type=email],[type=password],[type=password_confirmation]{
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
            color: blak;
			background: linear-gradient(#f4f4f4, #E0FFFF);
            border: none;
            border-radius: 5px;
            cursor: pointer;
			transition: background 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">registro</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf 
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="input-field" name="name" value="{{ old('name') }}" required>
            @error('name') <span>{{ $message }}</span> @enderror
            <label for="email" class="form-label">Email</label>
            <input type="email" class="input-field" name="email" value="{{ old('email') }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="input-field" name="password" required>
            @error('password') <span>{{ $message }}</span> @enderror
			<label for="password" class="form-label">Confirmar Senha</label>
            <input type="password_confirmation" id="password_confirmation" name="password_confirmation" placeholder="Confirme a senha" required>
            <button class="login-btn">Registrar</button>
        </form>
    </div>
</body>
</html>
