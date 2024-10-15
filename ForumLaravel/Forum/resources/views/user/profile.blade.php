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
            background-color: white;
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Registro</h2>
        <span class="text-danger">{{ session('message') }}</span>
        @if($user != null)
        <form action="{{ route('Update_user', [$user->id]) }}" method="post">
            @csrf 
            @method('put')
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="input-field" name="name" value="{{ $user->name }}" required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            
            <label for="email" class="form-label">Email</label>
            <input type="email" class="input-field" name="email" value="{{ $user->email }}" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="input-field" name="password" required>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            
            <button type="submit" class="login-btn">Atualizar</button>
        </form>
        
        <form action="{{ route('Delete_user', [$user->id]) }}" method="post">
            @csrf 
            @method('delete')
            <button type="submit" class="btn btn-danger btn-block mt-2">Excluir</button>
        </form>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
