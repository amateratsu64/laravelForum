
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f1f1f1;
		}

		.form-container {
			width: 300px;
			background-color: #fff;
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
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		.input-field:focus {
			border-color: #aaa;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.login-btn {
			width: 100%;
			padding: 10px;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		.login-btn:hover {
			background-color: #3e8e41;
		}

		.forgot-password {
			text-align: center;
			margin-top: 20px;
		}

		.forgot-password a {
			color: #4CAF50;
			text-decoration: none;
		}

		.forgot-password a:hover {
			color: #3e8e41;
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
			<input type="text" class="input-field" name="password" value="{{$user->password}}" required>
			@error('password') <spam>{{($message)}}</spam> @enderror
			<button class="login-btn">registar</button>
			<p class="forgot-password">Forgot <a href="#">password?</a></p>
		</form>
		<form action="{{route('Delete_user' , [$user->id])}}" method="delet">
		@csrf 
		@method('delete')
			<input type="submit" value="Excluir">
		</form>
		@endif
	</div>
</body>
</html>
