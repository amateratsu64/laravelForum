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
		<h2 class="form-title">Login</h2>
		<form action="{{route('login')}}" method="post">
			@csrf
			<label for="email" class="form-label">email</label>
			<input type="email" class="input-field" name="Username" 
						value= "{{old('email')}}"required>
			@error('email') <spam>{{('message')}}</spam> @enderror
			<label for="passoword" class="form-label">passoword</label>
			<input type="password" class="input-field" name="Password" required>
			@error('name') <spam>{{('message')}}</spam> @enderror
			<button class="login-btn">Login</button>
			<p class="forgot-password">Forgot <a href="#">password?</a></p>
		</form>
	</div>
</body>
</html>