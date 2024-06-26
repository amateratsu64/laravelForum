
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
        }
	</style>
</head>
<body>
	<div class="form-container">
		<h2 class="form-title">registro</h2>
		<span>{{ session('message')}}</span>
		@if($user != null)
		<form action="{{route('Update_user',[$user->id])}}" method="post">
		@csrf 
		@method('put')
			<label for="name" class="form-label">name</label>
			<input type="text" class="input-field" name="name" value="{{$user->name}}" required>
			@error('name') <spam>{{($message)}}</spam> @enderror
			<label for="email" class="form-label">email</label>
			<input type="email" class="input-field" name="email" value="{{$user->email}}"required>
			@error('email') <spam>{{($message)}}</spam> @enderror
			<label for="password" class="form-label">password </label>
			<input type="password" class="input-field" name="password" value="{{$user->password}}" required>
			@error('password') <spam>{{($message)}}</spam> @enderror
			<button class="login-btn">atualizar</button>
		</form>
		<form action="{{route('Delete_user' , [$user->id])}}" method="post">
		@csrf 
		@method('delete')
			<input type="submit" value="Excluir">
		</form>
		@endif
	</div>
</body>
</html>
